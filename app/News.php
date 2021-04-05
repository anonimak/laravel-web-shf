<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = ['title','image','description','status', 'id_type'];
    protected $dates = ['deleted_at'];
    //
    use SoftDeletes;

    public function type()
    {
        return $this->belongsTo('App\TypeNews','id_type');
    }

    public static function getNews($search = null)
    {
        $news = Self::select('*')
            ->where('id_type',1)
            ->orderBy('created_at', 'asc');

        if ($search) {
            $news->where('title', 'LIKE', '%' . $search . '%');
        }
        return $news->paginate(18);
    }

    public static function getCsrNews($search = null)
    {
        $news = Self::select('*')
            ->where('id_type',2)
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
            ->where('id_type',1)
            ->with('type')
            ->orderBy('created_at', 'desc');

        if ($search) {
            $news->where('title', 'LIKE', '%' . $search . '%');
        }
        return $news->paginate(18);
    }

    public static function getCsrNewsWhereStatus($search = null)
    {
        $news = Self::select('*')
            ->where('status', '=', 1)
            ->where('id_type',2)
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
