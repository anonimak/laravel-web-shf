<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News as ModelNews;
use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Inertia\Inertia;

class CsrNewsController extends Controller
{
    public function index(Request $request)
    {
        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('CsrNews', [
            'lists' => ModelNews::getCsrNewsWhereStatus($request->input('search')),
            'listBanner' => ModelNews::where('status',true)->where('id_type',2)->orderBy('created_at', 'DESC')->skip(0)->take(4)->get(),
            'filters' => $request->all(),
        ]);
    } 


    public function detail($id)
    {
        Inertia::share('app.name', Config::get('app.name'));
        // data news
        $datanews = ModelNews::find($id);
        $listnews = ModelNews::where('id_type',2)
                        ->where('id', '<>' , $datanews->id)
                        ->where('status',true)
                        ->inRandomOrder()
                        ->limit(4)->get();
        if(count($listnews) <= 0){
            $listnews = ModelNews::where('id_type', 2)
                        ->where('id', '<>' , $datanews->id)
                        ->where('status',true)
                        ->inRandomOrder()
                        ->limit(4)->get();
        }

        return Inertia::render('CsrNews/detail', [
            'data' => $datanews,
            'listNews'  => $listnews,
        ]);
    }
}
