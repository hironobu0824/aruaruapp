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
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'reply_id');
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

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers,$like->user_id);
        }

        if (in_array($id,$likers)) {
            return true;
        } else {
            return false;
        }
    }
}
