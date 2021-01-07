<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Theme;
use App\Comment;
use App\Category;
use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function show($theme_id,$post_id, Category $category, User $user)
    {
        return view('post/show')->with([
          'post' => Post::find($post_id),
          'theme' => Theme::find($theme_id),
          'comments' => Comment::where('post_id','=',$post_id)->get(),
          'categories' => $category->all(),
          'top_users' => $user->getTopUsers(),
        ]);
    }

    public function store(Request $request, Theme $theme, Post $post)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $theme->posts()->create($input);
        return redirect('/themes/' . $theme->id );
    }
    
    public function edit($theme_id, $post_id, Category $category, User $user)
    {
        return view('post/edit')->with([
          'post' => Post::find($post_id),
          'theme' => Theme::find($theme_id),
          'categories' => $category->all(),
          'top_users' => $user->getTopUsers(),
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
        $this_post = Post::find($post_id);
        $this->authorize('delete',$this_post);
        $this_post->deleteWithRelation();
        return redirect('/themes/' . $theme_id );
    }

    public function like($id)
    {
        Like::create([
          'post_id' => $id,
          'user_id' => Auth::id(),
        ]);

        session()->flash('success','You Liked the Post');

        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('post_id',$id)->where('user_id',Auth::id())->first();
        $like->delete();
        session()->flash('success', 'You Unliked the Post.');
        return redirect()->back();
    }
}
