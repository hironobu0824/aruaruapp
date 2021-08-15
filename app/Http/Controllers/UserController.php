<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
