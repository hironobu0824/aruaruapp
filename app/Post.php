<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    
    protected $fillable = ['theme_id','post','user_id'];
    
    public function theme()
    {
        return $this->belongsTo('App\Theme');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function deleteWithRelation()
    {
        try{
            $this->comments()->delete();
            $this->delete();
        } catch (\Ecxeption $e) {
            throw new Exception($e->getMessage());
        }
    }
}
