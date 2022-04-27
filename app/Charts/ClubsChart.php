<?php

namespace App\Charts;

use App\Models\Club;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ClubsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $clubs = Club::query()->withCount('users')->get();
        $names = [];
        $total = [];
        foreach ($clubs as $club) {
            $names[] .= $club->name;
            $total[] .= $club->users_count;
        }
        return $this->chart->barChart()
            ->setTitle('Members Per Club')
            ->setSubtitle('Total Count')
            ->addData('Totals Members', $total)
            ->setXAxis($names);
    }
}
