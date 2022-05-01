<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use \Illuminate\Support\Collection;

class AppointmentsCalendar extends LivewireCalendar
{
    public function events(): Collection
    {
        return collect([
            [
                'id' => 1,
                'title' => 'Breakfast',
                'description' => 'Pancakes! 🥞',
                'date' => Carbon::today(),
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::tomorrow(),
            ],  [
                'id' => 3,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::yesterday(),
            ],  [
                'id' => 4,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::tomorrow(),
            ],  [
                'id' => 5,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::tomorrow(),
            ],
        ]);
    }

}
