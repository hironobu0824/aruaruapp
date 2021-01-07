<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Category $category, User $user)
    {
        return view('category/index')->with([
            'categories' => $category->all(),
            'the_category' => $category,
            'category_themes' => $category->getThemesPaginate(),
            'top_users' => $user->getTopUsers(),
        ]);
    }
}
