<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    
    protected $fillable = ['theme_id','post'];
    
    public function theme()
    {
        return $this->belongsTo('App\Theme');
    }
}
