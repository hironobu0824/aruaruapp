<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use softDeletes;
    
    const DEFAULT_PAGINATE_COUNT = 15;

    protected $fillable = ['theme_id','post','user_id'];
    
    public function theme()
    {
        return $this->belongsTo('App\Models\Theme');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
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
