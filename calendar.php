<?php

namespace App\View\Components;

use Illuminate\View\Component;
use DateTime;
class calendar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $month, $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year= $year;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(isset($this->year) || isset($this->month)){
            $year = 2020;
            $month = 01;
        }

        $date = DateTime::createFromFormat("Y-m-d", "$this->year-$this->month-01");
        $first_day =  $date->format("l");
        $number_of_days = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        return view('components.calendar')
            ->with('date', $date)
            ->with('first_day', $first_day)
            ->with('number_of_days', $number_of_days)
            ->with('days', $days);
    }
}
