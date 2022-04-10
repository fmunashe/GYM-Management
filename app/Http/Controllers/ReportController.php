<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\HealthStatus;
use App\Models\Payment;
use App\Models\TimeTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OwenIt\Auditing\Models\Audit;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = User::query()->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->paginate(10);
        $date_range = $request->query('date_range');
        if ($date_range) {
            $date = explode('-', $date_range);
            $start = Carbon::createFromDate($date[0])->startOfDay()->format('Y-m-d H:i:s');
            $end = Carbon::createFromDate($date[1])->endOfDay()->format('Y-m-d H:i:s');
            $members = User::query()->whereBetween('created_at', [$start, $end])->latest()->paginate(10);
        }
        return view('reports.members.index', compact('members'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function clients()
    {

        $clients = HealthStatus::query()->where('trainer_id', '=', auth()->user()->id)->latest()->paginate(10);
        if (auth()->user()->user_type == UserTypeEnum::ADMIN) {
            $clients = HealthStatus::query()->latest()->paginate(10);
        }
        return view('reports.clients.index', compact('clients'));
    }

    public function audits()
    {

        $audits = Audit::query()->latest()->paginate(10);

        return view('reports.audits.index', compact('audits'));
    }

    public function income(Request $request)
    {
        $incomes = Payment::query()->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->paginate(10);
        $date_range = $request->query('date_range');
        if ($date_range) {
            $date = explode('-', $date_range);
            $start = Carbon::createFromDate($date[0])->startOfDay()->format('Y-m-d H:i:s');
            $end = Carbon::createFromDate($date[1])->endOfDay()->format('Y-m-d H:i:s');
            $incomes = Payment::query()->whereBetween('created_at', [$start, $end])->latest()->paginate(10);
        }
        $total = 0;
        foreach ($incomes as $inco) {
            $total += $inco->plan->amount;
        }

        return view('reports.members.income', compact('incomes', 'total'));
    }
}
