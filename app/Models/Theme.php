<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Theme extends Model
{
    use SoftDeletes;
    
    const DEFAULT_PAGINATE_COUNT = 15;
    
    protected $fillable = [
        'theme',
        'user_id',
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
    
    public function getPopularThemesPaginate()
    {
        return Theme::withCount('posts')->orderBy('posts_count','desc')->paginate(self::DEFAULT_PAGINATE_COUNT);
    }

    public function getNewThemesPaginate()
    {
        return $this->orderBy('created_at','desc')->paginate(self::DEFAULT_PAGINATE_COUNT);
    }

    public function getPostsPaginate()
    {
        return $this->posts()->orderBy('created_at','desc')->paginate(self::DEFAULT_PAGINATE_COUNT);
    }
    
    public function createWithRelation($input)
    {
        try {
            $theme = $this->create($input);
            $theme->categories()->attach($input['categories']);
            return $theme;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function updateWithRelation($input)
    {
        try {
            $this->fill($input)->save();
            $this->categories()->sync($input['categories']);
            return $this;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function deleteWithRelation()
    {
        try{
            $this->posts()->delete();
            $this->categories()->detach();
            $this->delete();
        } catch (\Ecxeption $e) {
            throw new Exception($e->getMessage());
        }
    }
    
}
