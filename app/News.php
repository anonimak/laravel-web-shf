<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = ['title','image','description','status', 'id_category'];
    protected $dates = ['deleted_at'];
    //
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo('App\CategoryNews','id_category');
    }

    public static function getNews($search = null)
    {
        $news = Self::select('*')
            ->with('category')
            ->orderBy('created_at', 'asc');

        if ($search) {
            $news->where('title', 'LIKE', '%' . $search . '%');
        }
        return $news->paginate(18);
    }

    public static function getNewsWhereStatus($search = null)
    {
        $news = Self::select('*')
            ->where('status', '=', 1)
            ->with('category')
            ->orderBy('created_at', 'desc');

        if ($search) {
            $news->where('title', 'LIKE', '%' . $search . '%');
        }
        return $news->paginate(18);
    }

    public static function getAll()
    {
        return Self::select('id', 'title', 'image')
            ->where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    
    public function getImageAttribute($value)
    {
        // return "/public".Storage::url($value);
        return "".Storage::url($value);
    }
}
