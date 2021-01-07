<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Category $category, User $user)
    {
        return view('home')->with([
            'categories' => $category->all(),
            'top_users' => $user->getTopUsers(),
        ]);
    }
}
