<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use App\News as ModelNews;
use App\CategoryNews;

class CfgPostNewsController extends Controller
{
    public function index(Request $request)
    {
        // Synchronously
        return Inertia::render('Admin/CfgPostNews', [
            'meta' => [
                'title'     => 'tests',
                'foo'       => 'bar'
            ],
            'tableNews' => ModelNews::getNews($request->input('search')),
            'filters' => $request->all(),
            'breadcrumbItems' => array(
                [
                    'icon'    => "fa-home",
                    'title'   => "Dashboard",
                    'href'    => "admin.dashboard"
                ],
                [
                    'title'   => "Post News",
                    'active'  => true
                ]
            )
        ]);
    }

    public function createPost()
    {
        return Inertia::render('Admin/CfgPostNews/add', [
            '_token' => csrf_token(),
            'categories' => CategoryNews::orderBy('created_at', 'asc')->get(),
            'breadcrumbItems' => array(
                [
                    'icon'    => "fa-home",
                    'title'   => "Dashboard",
                    'href'    => "admin.dashboard"
                ],
                [
                    'title'   => "Post News",
                    'href'    => "admin.post.index"
                ],
                [
                    'title'   => "Add Post News",
                    'active'  => true,
                ],
            )
        ]);
    }

    public function storePost(Request $request)
    {

        $request->validate([
            'title'             => 'required',
            'description'       => 'nullable',
            'id_category'       => 'required',
            'image'             => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        // store in storage
        $path = $request->file('image')->store('public/posts');
        $post = ModelNews::create([
            'title'             => $request->input('title'),
            'description'       => $request->input('description'),
            'image'             => $path,
            'status'            => $request->input('status'),
            'id_category'       => (null !== $request->input('id_category'))? $request->input('id_category') : 1
        ]);

        return Redirect::route('admin.post.detail', $post->id )->with('success', 'Post created.');
        // return Redirect::back()->with('success', 'Successful updating image Post.');
    }

    public function detailPost(ModelNews $news)
    {

        return Inertia::render('Admin/CfgPostNews/edit', [
            'dataPost' => [
                'id'            => $news->id,
                'id_category'   => $news->id_category,
                'description'   => $news->description,
                'title'         => $news->title,
                'status'        => $news->status,
                'image'         => $news->image,
            ],
            'categories' => CategoryNews::orderBy('created_at', 'asc')->get(),
            '_update_url' => URL::route('admin.post.update', $news->id),
            '_updateImage_url' => URL::route('admin.post.updateImage', $news->id),
            '_delete_url' => URL::route('admin.post.delete', $news->id),
            '_token' => csrf_token(),
            'breadcrumbItems' => array(
                [
                    'icon'    => "fa-home",
                    'title'   => "Dashboard",
                    'href'    => "admin.dashboard"
                ],
                [
                    'title'   => "Post News",
                    'href'    => "admin.post.index"
                ],
                [
                    'title'   => $news->id,
                    'active'  => true,
                ],
            )
        ]);
    }

    public function updatePostImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5000',
            ]);
        if ($request->hasFile('image')) {
            $slider = ModelNews::where('id',$request->id)->first();
            if(File::exists(public_path($slider->image))){
                File::delete(public_path($slider->image));
            }
            $path = $request->file('image')->store('public/posts');
            ModelNews::where('id',$request->id)->update(
                [
                    'image' => $path
                ]
            );
        }
        return Redirect::back()->with('success', 'Successful updating image Post.');
    }

    public function updatePost(Request $request)
    {
        $request->validate([
            'title'             => 'required',
            'status'             => 'required',
            'id_category'       => 'required',
            'description'       => 'nullable',
        ]);

        ModelNews::where('id',$request->id)->update([
            'title'  => $request->title,
            'id_category'  => $request->id_category,
            'description'  => $request->description,
            'status' => $request->status,
        ]);

        return Redirect::back()->with('success', 'Successful update Post.');
    }
    
    public function destroyPost(ModelNews $news)
    {
        $news = ModelNews::where('id',$news->id)->first();
        // if(File::exists(public_path($post->image))){
        //     File::delete(public_path($post->image));
        // }
        $news->delete();
        return Redirect::route('admin.post.index')->with('success', 'Post deleted.');
    }

    public function deletePostAll($id)
    {
        $id = explode(",", $id);
        // print_r($id);
        $post = ModelNews::whereIn('id',$id)->get();
        // foreach($post as $item) {
        //     // delete file
        //     if(File::exists(public_path($item->image))){
        //         File::delete(public_path($item->image));
        //     }
        // }
        // delete record
        $post->destroy($id);
        return Redirect::route('admin.post.index')->with('success', 'Post deleted.');
    }

    public function restorePost(ModelNews $news)
    {
        $news->restore();
        return Redirect::back()->with('success', 'Post restored.');
    }

}
