<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use SoftDeletes;
    
    const DEFAULT_PAGINATE_COUNT = 10;
    
    protected $fillable = [
        'theme',
        'user_id',
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function getThemesPaginate()
    {
        return $this->orderBy('updated_at')->paginate(self::DEFAULT_PAGINATE_COUNT);
    }

    public function getPostsPaginate()
    {
        return $this->posts()->orderBy('updated_at')->paginate(self::DEFAULT_PAGINATE_COUNT);
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
