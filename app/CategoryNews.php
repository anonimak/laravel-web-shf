<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryNews extends Model
{
    use SoftDeletes;
    protected $table = 'category_news';

    public function news()
    {
        return $this->hasMany('App\News');
    }
}
