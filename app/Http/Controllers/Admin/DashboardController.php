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

        return Inertia::render('Admin/Dashboard', [
            'widget' => $this->getWidgets(),
            'chartweek' => [
                'label' => 'Graph Visitor This Week',
                'labels' => $this->getThisWeek()["label"],
                'data' => $this->getThisWeek()["data"],
            ],
            'chartmonth' => [
                'label' => 'Graph Visitor This Month',
                'labels' => $this->getThisMonth()["label"],
                'data' => $this->getThisMonth()["data"],
            ],
            'chartyear' => [
                'label' => 'Graph Visitor Last One Year',
                'labels' => $this->getLastOneYear()["label"],
                'data' => $this->getLastOneYear()["data"],
            ],
            'chartdevice' => [
                'labels' => $this->getGroupByDevice()["label"],
                'data' => $this->getGroupByDevice()["data"]
            ],
            'chartdevicemonth' => [
                'labels' => $this->getGroupByDeviceMonth()["label"],
                'data' => $this->getGroupByDeviceMonth()["data"]
            ],
            'chartdevicelastoneyear' => [
                'labels' => $this->getGroupByDeviceLastOneYear()["label"],
                'data' => $this->getGroupByDeviceLastOneYear()["data"]
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

    private function getLastOneYear(): array {

        $arraylabel = array();
        $arraydata = array();
        $dt = Carbon::now()->subMonths(11);

        for ($i=0; $i <= 11; $i++) { 
            $row = DB::table('shetabit_visits')
            ->select(DB::raw('count(id) as views'), DB::raw("MONTHNAME(created_at) as monthname"))
            ->whereMonth('created_at', $dt->month)
            ->whereYear('created_at', $dt->year)
            ->groupBy('monthname')
            ->first();

            if($row){
                if($i === 11){
                    array_push($arraylabel,"This Month");
                } else {
                    array_push($arraylabel,$row->monthname.'/'.$dt->year);
                }
                array_push($arraydata,$row->views);
            } else {
                if($i === 11){
                    array_push($arraylabel,"This Month");
                } else {
                    array_push($arraylabel,$dt->localeMonth.'/'.$dt->year);
                }
                array_push($arraydata,0);
            }
            $dt->addMonths(1);
        }

        return array( 'label' => $arraylabel, 'data' => $arraydata);
    }

    private function getGroupByDevice(): array {
        $datavisit = DB::table('shetabit_visits')
            ->select(DB::raw('count(id) as views'), DB::raw('platform'))
            ->groupBy('platform')
            ->get()->toArray();
        
        $arraydata = array_map(function($item){
            return $item->views;
        }, $datavisit);

        $arraylabel = array_map(function($item){
            return $item->platform;
        }, $datavisit);

        return array( 'label' => $arraylabel, 'data' => $arraydata);
    }

    private function getGroupByDeviceMonth(): array {
        $datavisit = DB::table('shetabit_visits')
            ->select(DB::raw('count(id) as views'), DB::raw('platform'))
            ->whereMonth('created_at', $this->currentDate->month)
            ->whereYear('created_at', $this->currentDate->year)
            ->groupBy('platform')
            ->get()->toArray();
        
        $arraydata = array_map(function($item){
            return $item->views;
        }, $datavisit);

        $arraylabel = array_map(function($item){
            return $item->platform;
        }, $datavisit);

        return array( 'label' => $arraylabel, 'data' => $arraydata);
    }
    
    private function getGroupByDeviceLastOneYear(): array {
        $datavisit = DB::table('shetabit_visits')
            ->select(DB::raw('count(id) as views'), DB::raw('platform'))
            ->whereDate('created_at','<=', $this->currentDate)
            ->whereDate('created_at','>=', $this->currentDate->subYear())
            ->groupBy('platform')
            ->get()->toArray();
        
        $arraydata = array_map(function($item){
            return $item->views;
        }, $datavisit);

        $arraylabel = array_map(function($item){
            return $item->platform;
        }, $datavisit);

        return array( 'label' => $arraylabel, 'data' => $arraydata);
    }

    // get widget
    private function getWidgets(): object {

        $countall = VisitorUser::count();
        $count = VisitorUser::select(DB::raw('COUNT(id) as devices'),'platform')
                    ->groupBy('platform')
                    ->orderBy('devices', 'desc')
                    ->first();
        $mostDevices = round($count->devices/$countall*100,1);
        $strmostDevices = "$count->platform $mostDevices%";

        $widget = (object) [
                'mapHitToday' => VisitorUser::where(DB::raw('RIGHT(url,8)'),'=','/contact')->whereDate('created_at','=',$this->currentDate)->count(),
                'mapHitMonth' => VisitorUser::where(DB::raw('RIGHT(url,8)'),'=','/contact')->whereMonth('created_at','=',$this->currentDate->month)->count(),
                'mostDevices' => $strmostDevices,
                'totalVisitor' => $countall
        ];

        return $widget;
    }
}
