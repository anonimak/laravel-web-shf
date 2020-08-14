<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;

class VisiController extends Controller
{
    //
    public function index()
    {
        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        // return view('public.home');
        return Inertia::render('Profile/Visi', [
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ]
        ]);
    }
}
