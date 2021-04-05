<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeNews extends Model
{
    use SoftDeletes;
    protected $table = 'type_news';

    public function news()
    {
        return $this->hasMany('App\News');
    }
}
