<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    //

    protected $fillable = ['caption','text','image','show', 'index'];

    public static function getWhereShow()
    {
        return Self::where('show', '=', 1)->get();
    }

    public function getImageAttribute($value)
    {
        return Storage::url($value);
    }
}
