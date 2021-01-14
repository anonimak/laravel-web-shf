<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Config;
use App\M_Office as ModelOffice;

class ContactController extends Controller
{
    //
    public function index()
    {
        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        // return view('public.home');
        return Inertia::render('Contact', [
            'data_offices' => ModelOffice::get(),
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ]
        ]);
    }
}
