<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use App\Slider;

class CfgHomeController extends Controller
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
        return Inertia::render('Admin/CfgHome', [
            'meta' => [
                'title'     => 'tests',
                'foo'       => 'bar'
            ],
            'dataSlider'    => Slider::get()
        ]);
    }

    public function add()
    {
        return Inertia::render('Admin/CfgHome/add', [
            'meta' => [
                'title'     => 'tests',
                'foo'       => 'bar'
            ],
            'dataSlider'    => Slider::get()
        ]);
    }
}
