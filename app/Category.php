<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const DEFAULT_PAGINATE_COUNT = 10;

    public function themes()
    {
        return $this->belongsToMany('App\Theme');
    }

    public function getThemesPaginate()
    {
        return $this->themes()->orderBy('created_at','desc')->paginate(self::DEFAULT_PAGINATE_COUNT);
    }
}