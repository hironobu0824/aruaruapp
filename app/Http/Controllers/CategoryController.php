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
         'themes' => $category->getThemesPaginate(),
         'categories' => $category->all(),
         'top_users' => $user->getTopUsers(),
         'the_category' => $category,
      ]);
    }
}
