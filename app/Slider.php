<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    public static function getWhereShow()
    {
        return Self::where('show', '=', 1)->get();
    }
}
