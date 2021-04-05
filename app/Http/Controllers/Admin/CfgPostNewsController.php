<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use App\News as ModelNews;

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
            'breadcrumbItems' => array(
                [
                    'icon'    => "fa-home",
                    'title'   => "Dashboard",
                    'href'    => "admin.dashboard"
                ],
                [
                    'title'   => "Post News",
                    'href'    => "admin.post.news.index"
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
            'image'             => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        // store in storage
        $path = $request->file('image')->store('public/posts');
        $post = ModelNews::create([
            'title'             => $request->input('title'),
            'description'       => $request->input('description'),
            'image'             => $path,
            'status'            => $request->input('status'),
            'id_type'       => 1
        ]);

        return Redirect::route('admin.post.news.detail', $post->id )->with('success', 'Post created.');
        // return Redirect::back()->with('success', 'Successful updating image Post.');
    }

    public function detailPost(ModelNews $news)
    {

        return Inertia::render('Admin/CfgPostNews/edit', [
            'dataPost' => [
                'id'            => $news->id,
                'description'   => $news->description,
                'title'         => $news->title,
                'status'        => $news->status,
                'image'         => $news->image,
            ],
            '_update_url' => URL::route('admin.post.news.update', $news->id),
            '_updateImage_url' => URL::route('admin.post.news.updateImage', $news->id),
            '_delete_url' => URL::route('admin.post.news.delete', $news->id),
            '_token' => csrf_token(),
            'breadcrumbItems' => array(
                [
                    'icon'    => "fa-home",
                    'title'   => "Dashboard",
                    'href'    => "admin.dashboard"
                ],
                [
                    'title'   => "Post News",
                    'href'    => "admin.post.news.index"
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
            'description'       => 'nullable',
        ]);

        ModelNews::where('id',$request->id)->update([
            'title'  => $request->title,
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
        return Redirect::route('admin.post.news.index')->with('success', 'Post deleted.');
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
        return Redirect::route('admin.post.news.index')->with('success', 'Post deleted.');
    }

    public function restorePost(ModelNews $news)
    {
        $news->restore();
        return Redirect::back()->with('success', 'Post restored.');
    }

}
