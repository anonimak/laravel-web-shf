<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Promo as ModelPromo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Promo extends Controller
{

    function index(Request $request)
    {
        $lists = ModelPromo::where('status', '=', 1);
        if ($request->has('search')) {
            $lists->where('title', 'LIKE', '%' . $request->input('search') . '%');
        }

        $itemsBanner = ModelPromo::select('id', 'title', 'image', 'start_date', 'end_date')
            ->where('status', '=', 1)
            ->where('set_banner', '=', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('Product/Promosi', [
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ], 'lists' => $lists->orderBy('created_at', 'desc')->paginate(18),
            'listBanner' => $itemsBanner,
            'filters' => $request->all(),
        ]);
    }

    function detail($id)
    {
        $promo = ModelPromo::find($id);
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('Product/Promosi/detail', [
            'meta' => [
                'title' => 'tests',
                'foo' => 'bar'
            ], 'data' => $promo
        ]);
    }
}
