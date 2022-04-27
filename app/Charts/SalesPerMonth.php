<?php

namespace App\Charts;

use App\Models\Payment;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class SalesPerMonth
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $payments = Payment::query()->with('user')->get();
        $clubs = [];
        foreach ($payments as $payment) {
            $clubs[] .= $payment->user->club->name;
        }
        $clubs = array_unique($clubs);


        return $this->chart->horizontalBarChart()
            ->setTitle('Sales Payments Per Club')
            ->setSubtitle('Period ' . Carbon::now()->format('Y'))
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Test club 1', [6, 9, 3, 4, 10, 8, 4, 8, 5, 2, 3, 8])
            ->addData('Test Club 2', [7, 3, 8, 2, 6, 4, 9, 5, 2, 6, 4, 7])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
