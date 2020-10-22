<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Promo as ModelPromo;
use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class Promo extends Controller
{

    public function index(Request $request)
    {
        // Synchronously
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('Product/Promosi', [
            'lists' => ModelPromo::getPromoWhereStatus($request->input('search')),
            'listBanner' => ModelPromo::getAllBanner(),
            'filters' => $request->all(),
        ]);
    }


    public function detail($id)
    {
        Inertia::share('app.name', Config::get('app.name'));
        return Inertia::render('Product/Promosi/detail', [
            'data' => ModelPromo::find($id)
        ]);
    }

    public function delete($id)
    {
        ModelPromo::find($id)->delete();
        return Redirect::route('promo');
    }

    public function restore($id)
    {
        ModelPromo::onlyTrashed()
            ->where('id', $id)
            ->restore();
        return Redirect::route('promo');
    }
}
