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
    public function index(Category $category)
    {
        return view('category/index')->with([
            'categories' => $category->all(),
            'category' => $category,
            'category_themes' => $category->getThemesPaginate(),
        ]);
    }
}
