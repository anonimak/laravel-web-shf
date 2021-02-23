<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Carbon\Carbon;
use App\VisitorUser;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // Synchronously

        return Inertia::render('Admin/Dashboard', [
            'meta' => [
                'title' => 'testsa',
                'foo' => 'bar',
            ],
            'chartweek' => [
                'labels' => $this->getThisWeek()["label"],
                'datasets' => array([
                    'label' => 'Visitor',
                    'backgroundColor' => '#2874a6',
                    'data' => $this->getThisWeek()["data"]
                ])
            ]
        ]);
    }

    private function getThisWeek(): array {
        $currentDate = Carbon::now();
        
        $groups = DB::table('shetabit_visits')
                ->select(DB::raw('count(id) as views'), DB::raw("CONCAT(DAYNAME(created_at),' ',DATE_FORMAT(created_at,'%d')) as day"), DB::raw("DATE(created_at) as date"))
                ->whereDate('created_at','>=', $currentDate->subDays($currentDate->dayOfWeek)->subWeek())
                ->groupBy('date','day')
                ->get()->toArray();

        $label = array_map(function($item){
            return $item->day;
        },$groups);
                
        $data = array_map(function($item){
            return $item->views;
        },$groups);

        return array( 'label' => $label, 'data' => $data);
    }
}
