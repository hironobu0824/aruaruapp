<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Theme;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Theme $theme, Post $post, Comment $comment)
    {
        $input = $request['comment'];
        $input['user_id'] = Auth::id();
        $post->comments()->create($input);
        return redirect('/themes/' . $theme->id . '/posts/' . $post->id );
    }
    
    public function edit($theme_id,$post_id,$comment_id, Category $category, User $user)
    {
        return view('comment/edit')->with([
          'post' => Post::find($post_id),
          'theme' => Theme::find($theme_id),
          'comment' => Comment::find($comment_id),
          'categories' => $category->all(),
          'top_users' => $user->getTopUsers(),
        ]);
    }
    
    public function update(CommentRequest $request,$theme_id, $post_id, Comment $comment)
    {
        $input_comment = $request['comment'];
        $comment->fill($input_comment)->save();
        return redirect('/themes/' . $theme_id . '/posts/' . $post_id );
    }
    
    public function destroy($theme_id, $post_id,$comment_id)
    {
        $this_comment = Comment::find($comment_id);
        $this_comment->delete();
        return redirect('/themes/' . $theme_id . '/posts/' . $post_id );
    }
}
