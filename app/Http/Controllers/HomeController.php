<?php

namespace App\Http\Controllers;

use App\ConfigApp;
use App\Promo;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        // retrieve visitor info
        // $request->session()->put('key', 'value');
        // session(['key' => 'value']);

        // if ($request->session()->has('key')) {
        //     echo $request->session()->get('key');
        //     echo $request->session()->pull('key', 'default');
        // } else {
        //     echo 'Tidak ada data dalam session.';
        // }
        // get

        // Synchronously
        Inertia::share([
            'app.name', Config::get('app.name')
        ]);

        // return view('public.home');
        return Inertia::render('Home', [
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ],
            'dataSlider' => Slider::getWhereShow(),
            'listPromo' => Promo::getAllBanner(),
            '__config' => $request['__config']
        ]);

        // contoh redirect
        //return Redirect::route('users.edit', $parameter)->with('success', 'User created.');
    }
}
