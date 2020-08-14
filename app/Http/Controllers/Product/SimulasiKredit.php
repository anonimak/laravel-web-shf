<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;

class SimulasiKredit extends Controller
{
    //
    function index()
    {
        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('Product/SimulasiKredit', [
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ]
        ]);
    }
}
