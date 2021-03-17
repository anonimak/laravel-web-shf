<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SimulasiKredit extends Controller
{
    //
    function index()
    {
        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('Product/SimulasiKredit', [
            'data_offices' => DB::table('m_offices')->select('short_name as text', 'email as value')->get(),
            'meta' => [
                'title' => 'tests',
                'foo' => 'bars'
            ]
        ]);
    }
}
