<?php

namespace App\Http\Controllers;

use App\Charts\Registrations;
use App\Charts\ClubsChart;
use App\Charts\SalesPerMonth;
use App\Models\Club;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome(ClubsChart $clubsChart, Registrations $registrations, SalesPerMonth $sales)
    {

        $registrations = $registrations->build();
        $clubs = $clubsChart->build();
        $sales = $sales->build();

        return view('adminHome', compact('registrations', 'clubs', 'sales'));
    }
}
