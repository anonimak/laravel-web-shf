<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\VisitorUser;

class DashboardController extends Controller
{
    private $currentDate;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentDate = CarbonImmutable::now();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // Synchronously
        $firstdaymonth = $this->currentDate->firstOfMonth();
        $diffday = $firstdaymonth->diffInDays($this->currentDate);

        return Inertia::render('Admin/Dashboard', [
            'meta' => [
                'title' => 'testsa',
                'foo' => 'bar',
                'diff' => $diffday
            ],
            'chartweek' => [
                'label' => 'Graph Visitor This Week',
                'labels' => $this->getThisWeek()["label"],
                'data' => $this->getThisWeek()["data"],
            ],
            'chartmonth' => [
                'label' => 'Graph Visitor This Month',
                'labels' => $this->getThisMonth()["label"],
                'data' => $this->getThisMonth()["data"],
            ]
        ]);
    }

    private function getThisWeek(): array {
  
        $arraylabel = array();
        $arraydata = array();
        for ($i=6; $i >= 0; $i--) { 
            $daycount = CarbonImmutable::now()->add(-$i, 'day');
            $row = DB::table('shetabit_visits')
            ->select(DB::raw('count(id) as views'), DB::raw("CONCAT(DAYNAME(created_at),' ',DATE_FORMAT(created_at,'%d')) as day"), DB::raw("DATE(created_at) as date"))
            ->whereDate('created_at','=', $daycount)
            ->groupBy('date','day')
            ->first();

            if($row){
                if($i === 0){
                    array_push($arraylabel,"Today");
                } else {
                    array_push($arraylabel,$row->day);
                }
                array_push($arraydata,$row->views);
            } else {
                if($i === 0){
                    array_push($arraylabel,"Today");
                } else {
                    array_push($arraylabel,$daycount->englishDayOfWeek.' '.$daycount->day);
                }
                array_push($arraydata,0);
            }
        }

        return array( 'label' => $arraylabel, 'data' => $arraydata);
    }

    private function getThisMonth(): array {

        $arraylabel = array();
        $arraydata = array();

        $firstdaymonth = $this->currentDate->firstOfMonth();
        $diffday = $firstdaymonth->diffInDays($this->currentDate);
        for ($i=$diffday; $i >= 0; $i--) { 
            $daycount = CarbonImmutable::now()->add(-$i, 'day');
            $row = DB::table('shetabit_visits')
            ->select(DB::raw('count(id) as views'), DB::raw("DATE_FORMAT(created_at,'%d') as day"), DB::raw("DATE(created_at) as date"))
            ->whereDate('created_at','=', $daycount)
            ->groupBy('date','day')
            ->first();

            if($row){
                if($i === 0){
                    array_push($arraylabel,"Today");
                } else {
                    array_push($arraylabel,$row->day);
                }
                array_push($arraydata,$row->views);
            } else {
                if($i === 0){
                    array_push($arraylabel,"Today");
                } else {
                    array_push($arraylabel,$daycount->day);
                }
                array_push($arraydata,0);
            }
        }

        return array( 'label' => $arraylabel, 'data' => $arraydata);
    }

    private function getThisYear(): array {

        $arraylabel = array();
        $arraydata = array();

        $firstmonthyears = $this->currentDate->firstOfYear();
        $diffmonth = $firstmonthyears->diffInMonths($this->currentDate);
        for ($i=$diffmonth; $i >= 0; $i--) { 
            $row = DB::table('shetabit_visits')
            ->select(DB::raw('count(id) as views'), DB::raw("MONTHNAME(created_at) as monthname"))
            ->whereMonth('created_at', $i)
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname')
            ->first();

            if($row){
                if($i === 0){
                    array_push($arraylabel,"This Month");
                } else {
                    array_push($arraylabel,$row->monthname);
                }
                array_push($arraydata,$row->views);
            } else {
                if($i === 0){
                    array_push($arraylabel,"This Month");
                } else {
                    array_push($arraylabel,$daycount->monthname);
                }
                array_push($arraydata,0);
            }
        }

        return array( 'label' => $arraylabel, 'data' => $arraydata);
    }
}
