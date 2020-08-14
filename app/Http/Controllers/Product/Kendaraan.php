<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;

class Kendaraan extends Controller
{
    //
    function index()
    {
        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('Product/Kendaraan', [
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ]
        ]);
    }
}
