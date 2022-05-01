<?php

namespace App\Http\Livewire;

use App\Http\Traits\Analytics;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class Dashboard extends Component
{
    use Analytics;

    public $showAnimation = true;
    public $showDataLabels = true;
    public $showLegend = true;

    public $colors = [
        '#003f5c',
        '#2f4b7c',
        '#665191',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#ff7c43',
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
        $usersPerClub = $this->usersPerClub()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->Club, $item->value, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(0.9)
                    ->setTitle('Total Users Count Per Club')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );
        $registrationsPerMonth = $this->registrationsPerMonth()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->period, $item->value, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(0.9)
                    ->setTitle('Registrations')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        $subscriptions = $this->subscriptions()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addSlice($item->Subscription, $item->value, $this->colors[$key]);
                },
                LivewireCharts::pieChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(0.9)
                    ->setTitle('Active vs In-Active Subscriptions')
                    ->withOnSliceClickEvent('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        $payments = $this->payments()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->club, $item->value, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(0.9)
                    ->setTitle('Payments Per Club')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        $membership_plans = $this->plans()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->plan_name, $item->value, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(0.9)
                    ->setTitle('Plans Purchased Comparison')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        return view('livewire.dashboard')
            ->with([
                'usersPerClub' => $usersPerClub,
                'registrationsPerMonth'=>$registrationsPerMonth,
                'subscriptions'=>$subscriptions,
                'payments'=>$payments,
                'membership_plans'=>$membership_plans
            ]);
    }
}
