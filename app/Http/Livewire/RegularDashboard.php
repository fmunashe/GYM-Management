<?php

namespace App\Http\Livewire;

use App\Http\Traits\Analytics;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class RegularDashboard extends Component
{
    use Analytics;

    public $showAnimation = true;
    public $showDataLabels = true;
    public $showLegend = true;

    public $colors = [
        '#f6ad55',
        '#fc8181',
        '#003438',
        '#d3004d',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#ff7c43',
        '#90cdf4',
        '#66DA26',
        '#cbd5e0',
        '#73b641',
        '#1a151a',
        '#003f5c',
        '#2f4b7c',
        '#665191',
        '#ffa600',
        '#ffa600',
        '#f6ad55',
        '#fc8181',
        '#90cdf4',
        '#66DA26',
        '#cbd5e0',
        '#73b641',
        '#1a151a',
        '#003438',
        '#d3004d',
        '#003f5c',
        '#2f4b7c',
        '#665191',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#ff7c43'
    ];

    public function render()
    {

        $weight = $this->weightProgress()
            ->reduce(
                function ($chart, $item, $key) {
                     return $chart->addColumn($item->period, $item->value, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(5)
                    ->setTitle('Weight Loss/Gain Progress')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );
        $payments = $this->totalPayments()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->period, $item->value, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(0.9)
                    ->setTitle('My Payments')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        return view('livewire.regular-dashboard')
            ->with([
                'payments'=>$payments,
                'weight_progress'=>$weight
            ]);
    }
}
