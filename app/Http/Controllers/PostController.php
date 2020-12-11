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
    
    public function show($theme,$post)
    {
        return view('post/show')->with([
          'post' => Post::find($post),
          'theme' => Theme::find($theme),
        ]);
        
    }
    
    public function edit($theme,$post)
    {
        return view('post/edit')->with([
          'post' => Post::find($post),
          'theme' => Theme::find($theme),
        ]);
    }
    
    public function update(Request $request,$theme_id, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/themes/' . $post->theme_id . '/posts/' . $post->id);
    }
}
