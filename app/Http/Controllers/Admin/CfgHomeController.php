<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Slider;

class CfgHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // Synchronously
        return Inertia::render('Admin/CfgHome', [
            'meta' => [
                'title'     => 'tests',
                'foo'       => 'bar'
            ],
            'dataSlider'    => Slider::orderBy('index')->get()
            ,
            'breadcrumbItems' => array(
                [
                    'icon'    => "fa-home",
                    'title'   => "Dashboard",
                    'href'    => "admin.dashboard"
                ],
                [
                    'title'   => "Page",
                    'active'  => true
                ],
                [
                    'title'   => "Home",
                    'active'  => true,
                    'href'    => "admin.page.home"
                ],
            )
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/CfgHome/add', [
            '_store_url' => URL::route('admin.page.home.slider.store'),
            '_token' => csrf_token()
            ,
            'breadcrumbItems' => array(
                [
                    'icon'    => "fa-home",
                    'title'   => "Dashboard",
                    'href'    => "admin.dashboard"
                ],
                [
                    'title'   => "Page",
                    'active'  => true
                ],
                [
                    'title'   => "Home",
                    'href'    => "admin.page.home"
                ],
                [
                    'title'   => "Add Slider",
                    'active'  => true,
                ],
            )
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'caption' => 'required',
            'show'  => 'required',
            'text'  => 'nullable|max:250',
            'index' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
        
        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('img/slider'), $imageName);
        // $path = base_path('img/slider/'.$imageName);
        // store in storage
        $path = $request->file('image')->store('public/sliders');
        Slider::create([
            'caption'   => $request->input('caption'),
            'text'      => $request->input('text'),
            'image'     => $path,
            'show'      => $request->boolean('show'),
            'index'     => $request->input('index')
        ]);

        return Redirect::route('admin.page.home')->with('success', 'Slider created.');
    }

    public function edit(Slider $slider)
    {
        return Inertia::render('Admin/CfgHome/edit', [
            'organization' => [
                'id' => $slider->id,
                'name' => $slider->caption,
                'email' => $slider->text,
                'phone' => $slider->show,
                'address' => $slider->index,
            ],
        ]);
    }

    public function update(Slider $organization)
    {
        $organization->update(
            Request::validate([
                'name' => ['required', 'max:100'],
                'email' => ['nullable', 'max:50', 'email'],
                'phone' => ['nullable', 'max:50'],
                'address' => ['nullable', 'max:150'],
                'city' => ['nullable', 'max:50'],
                'region' => ['nullable', 'max:50'],
                'country' => ['nullable', 'max:2'],
                'postal_code' => ['nullable', 'max:25'],
            ])
        );

        return Redirect::back()->with('success', 'Organization updated.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return Redirect::back()->with('success', 'Organization deleted.');
    }

    public function restore(Organization $organization)
    {
        $organization->restore();

        return Redirect::back()->with('success', 'Organization restored.');
    }
}
