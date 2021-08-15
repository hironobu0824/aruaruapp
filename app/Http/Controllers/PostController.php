<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Theme;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use App\Models\Like;
use App\Jobs\PutLike;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    const DEFAULT_PAGINATE_COUNT = 15;

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function show($theme_id,$post_id, Category $category, User $user)
    {
        return view('post/show')->with([
          'post' => Post::find($post_id),
          'theme' => Theme::find($theme_id),
          'comments' => Comment::where('post_id','=',$post_id)->orderBy('created_at','desc')->paginate(self::DEFAULT_PAGINATE_COUNT),
          'categories' => $category->all(),
          'top_users' => $user->getTopUsers(),
        ]);
    }

    public function store(PostRequest $request, Theme $theme, Post $post)
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
    
    public function update(PostRequest $request,$theme_id, Post $post)
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
        //LIKEの非同期処理の試行錯誤
        
        // PutLike::dispatch($id);

        // session()->flash('success','You Liked the Post');

        // return redirect()->back();
        
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
