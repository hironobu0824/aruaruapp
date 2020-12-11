<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use SoftDeletes;
    
    const DEFAULT_PAGINATE_COUNT = 5;
    
    protected $fillable = [
        'theme'    
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function getPostsPaginate()
    {
        return $this->posts()->orderBy('updated_at')->paginate(self::DEFAULT_PAGINATE_COUNT);
    }
    
    public function deleteWithRelation()
    {
        try{
            $this->posts()->delete();
            $this->delete();
        } catch (\Ecxeption $e) {
            throw new Exception($e->getMessage());
        }
    }
    
}
