<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
     
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new PasswordResetNotification($token));
    }
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function themes()
    {
        return $this->hasMany('App\Theme');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getTopUsers()
    {
        return User::withCount('posts')->orderBy('posts_count','desc')->paginate(3);
    }
}
