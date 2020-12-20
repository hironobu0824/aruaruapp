<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Theme;
use App\Comment;

class PostController extends Controller
{
    public function show($theme_id,$post_id)
    {
        return view('post/show')->with([
          'post' => Post::find($post_id),
          'theme' => Theme::find($theme_id),
          'comments' => Comment::where('post_id','=',$post_id)->get(),
        ]);
    }
    
    public function store(Request $request, Theme $theme, Post $post)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $theme->posts()->create($input);
        return redirect('/themes/' . $theme->id );
    }
    
    public function edit($theme_id,$post_id)
    {
        return view('post/edit')->with([
          'post' => Post::find($post_id),
          'theme' => Theme::find($theme_id),
        ]);
    }
    
    public function update(Request $request,$theme_id, Post $post)
    {
        $this->authorize('update',$post);
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/themes/' . $post->theme_id . '/posts/' . $post->id);
    }
    
    public function destroy($theme_id,$post_id)
    {
        $this->authorize('delete',$post);
        $this_post = Post::find($post_id);
        $this_post->deleteWithRelation();
        return redirect('/themes/' . $theme_id );
    }
}
