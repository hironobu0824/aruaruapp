<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user/show')->with([
            'user' => $user
        ]);
    }
}
