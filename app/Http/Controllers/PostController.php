<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Theme;

class PostController extends Controller
{
    public function store(Request $request, Theme $theme, Post $post)
    {
        $input = $request['post'];
        $theme->posts()->create($input);
        return redirect('/themes/' . $theme->id );
    }
    
    public function show($post)
    {
        return view('post/show')->with([
          'post' => Post::find($post),
        ]);
    }
}
