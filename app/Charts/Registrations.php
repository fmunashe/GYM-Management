<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class Registrations
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $jan = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::JANUARY)->count();
        $feb = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::FEBRUARY)->count();
        $mar = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::MARCH)->count();
        $apr = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::APRIL)->count();
        $may = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::MAY)->count();
        $jun = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::JUNE)->count();
        $july = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::JULY)->count();
        $aug = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::AUGUST)->count();
        $sep = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::SEPTEMBER)->count();
        $oct = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::OCTOBER)->count();
        $nov = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::NOVEMBER)->count();
        $dec = User::query()->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::DECEMBER)->count();

        return $this->chart->donutChart()
            ->setTitle('Registrations per month for year ')
            ->setSubtitle(Carbon::now()->format('Y'))
            ->addData([$jan, $feb, $mar, $apr, $may, $jun, $july, $aug, $sep, $oct, $nov, $dec])
            ->setLabels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
