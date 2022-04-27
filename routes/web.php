<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HealthStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequisitionsController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::group(['prefix' => 'admin', 'middleware' => ['is_admin', 'auth']], function () {
    Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts');
    Route::post('/upload-adverts', [AdvertController::class, 'store'])->name('upload-adverts');
    Route::delete('/delete-advert/{advert}', [AdvertController::class, 'destroy'])->name('delete-advert');
    Route::put('/publish-advert/{advert}', [AdvertController::class, 'update'])->name('publish-advert');

    Route::post('/save-plan', [PlanController::class, 'store'])->name('save-plan');
    Route::delete('/delete-plan/{plan}', [PlanController::class, 'destroy'])->name('delete-plan');
    Route::put('/plan-update/{plan}', [PlanController::class, 'update'])->name('update-plan');

    Route::post('/save-club', [ClubController::class, 'store'])->name('save-club');
    Route::delete('/delete-club/{club}', [ClubController::class, 'destroy'])->name('delete-club');
    Route::put('/club-update/{club}', [ClubController::class, 'update'])->name('update-club');

    Route::delete('/delete-routine/{routine}', [TimeTableController::class, 'destroy'])->name('delete-routine');
    Route::put('/routine-update/{routine}', [TimeTableController::class, 'update'])->name('update-routine');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/save-user', [UserController::class, 'store'])->name('save-user');
    Route::delete('/delete-user/{user}', [UserController::class, 'destroy'])->name('delete-user');
    Route::put('/user-update/{user}', [UserController::class, 'update'])->name('update-user');

    Route::get('/members', [ReportController::class, 'index'])->name('members');
    Route::post('/search-member', [ReportController::class, 'filterUsers']);

    Route::get('/income', [ReportController::class, 'income'])->name('income');

    Route::get('/audits', [ReportController::class, 'audits'])->name('audits');
});


Route::group(['prefix' => 'generic', 'middleware' => ['auth', 'payment_expired']], function () {
    Route::post('/save-routine', [TimeTableController::class, 'store'])->name('save-routine');
    Route::get('/clubs', [ClubController::class, 'index'])->name('clubs');
    Route::get('/plans', [PlanController::class, 'index'])->name('plans');
    Route::get('/routines', [TimeTableController::class, 'index'])->name('routines');
    Route::get('/training-clients', [ReportController::class, 'clients'])->name('training-clients')->middleware('is_trainer');

    Route::get('/health-status', [HealthStatusController::class, 'index'])->name('health-status');
    Route::post('/save-health-status', [HealthStatusController::class, 'store'])->name('save-health-status');
    Route::delete('/delete-health-status/{healthStatus}', [HealthStatusController::class, 'destroy'])->name('delete-health-status');
    Route::put('/health-status-update/{healthStatus}', [HealthStatusController::class, 'update'])->name('update-health-status');
});

Route::group(['prefix' => 'payments', 'middleware' => ['auth']], function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/save-payment', [PaymentController::class, 'store'])->name('save-payment');
    Route::delete('/delete-payment/{payment}', [PaymentController::class, 'destroy'])->name('delete-payment');
    Route::put('/payment-update/{payment}', [PaymentController::class, 'update'])->name('update-payment');
    Route::get('search-client/{search}', [PaymentController::class, 'searchClient']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('requisitions', RequisitionsController::class);
});
