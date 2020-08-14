<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;

class Test extends Controller
{
    //
    public function index()
    {

        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        // return view('public.home');
        return Inertia::render('Test', [
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ]
        ]);

        // contoh redirect
        //return Redirect::route('users.edit', $parameter)->with('success', 'User created.');
    }
}
