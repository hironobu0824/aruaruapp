<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use softDeletes;
    
    protected $fillable = [
        'body'    
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
