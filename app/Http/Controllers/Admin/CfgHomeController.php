<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

    public function createSlider()
    {
        return Inertia::render('Admin/CfgHome/slideradd', [
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

    public function storeSlider(Request $request)
    {

        $request->validate([
            'show'      => 'required',
            'text'      => 'nullable|max:250',
            'index'     => 'nullable',
            'image'     => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

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

    public function detailSlider(Slider $slider)
    {
        return Inertia::render('Admin/CfgHome/slideredit', [
            'dataSlider' => [
                'id'        => $slider->id,
                'caption'   => $slider->caption,
                'text'      => $slider->text,
                'image'     => $slider->image,
                'show'      => $slider->show,
                'index'     => $slider->index,
            ],
            '_update_url' => URL::route('admin.page.home.slider.update', $slider->id),
            '_updateImage_url' => URL::route('admin.page.home.slider.updateImage', $slider->id),
            '_delete_url' => URL::route('admin.page.home.slider.delete', $slider->id),
            '_token' => csrf_token(),
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
                    'title'   => "Detail Slider",
                    'active'  => true,
                ],
            )

        ]);
    }

    public function updateSliderImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:1024',
            ]);
        if ($request->hasFile('image')) {
            $slider = Slider::where('id',$request->id)->first();
            if(File::exists(public_path($slider->image))){
                File::delete(public_path($slider->image));
            }
            $path = $request->file('image')->store('public/sliders');
            Slider::where('id',$request->id)->update(
                [
                    'image' => $path
                ]
            );
        }
        return Redirect::back()->with('success', 'Successful updating image Slider.');
    }

    public function updateSlider(Slider $slider)
    {
        // $request->validate([
        //     'show'      => 'required',
        //     'text'      => 'nullable|max:250',
        //     'index'     => 'nullable',
        // ]);

        // $slider->update([
        //     'show'  => $request->show,
        //     'text'  => $request->text,
        //     'index' => $request->index,
        // ]);

        $slider->update(
            $request->validate([
                'show'      => 'required',
                'text'      => 'nullable|max:250',
                'index'     => 'nullable',
            ])
        );

        return Redirect::back()->with('success', 'Info Slider updated.');
    }

    public function destroySlider(Slider $slider)
    {
        $slider->delete();
        return Redirect::back()->with('success', 'Slider deleted.');
    }

    public function restoreSlider(Organization $organization)
    {
        $organization->restore();
        return Redirect::back()->with('success', 'Organization restored.');
    }
}
