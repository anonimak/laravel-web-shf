<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    //
    use SoftDeletes;


    public static function getPromoWhereStatus($search = null)
    {
        $promo = Self::select('id', 'title', 'image', 'start_date', 'end_date')
            ->where('status', '=', 1)
            ->orderBy('created_at', 'desc');

        if ($search) {
            $promo->where('title', 'LIKE', '%' . $search . '%');
        }
        return $promo->paginate(18);
    }

    public static function getAllBanner()
    {
        return Self::select('id', 'title', 'image', 'start_date', 'end_date')
            ->where('status', '=', 1)
            ->where('set_banner', '=', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
