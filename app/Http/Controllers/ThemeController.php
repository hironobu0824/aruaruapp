<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
   public function index(Theme $theme, Category $category, User $user)
   {
      return view('index')->with([
         'themes' => $theme->getThemesPaginate(),
         'categories' => $category->all(),
         'top_users' => $user->getTopUsers(),
      ]);
   }
   
   public function show(Theme $theme, Category $category, User $user)
   {
      return view('theme/show')->with([
         'theme' => $theme,
         'posts' => $theme->getPostsPaginate(),
         'categories' => $category->all(),
         'top_users' => $user->getTopUsers(),
      ]);
   }
   
   public function store(Request $request, Theme $theme)
   {
      $input = $request['theme'];
      $input['user_id'] = Auth::id();
      if(empty($input['categories'])){
         $created_theme = $theme->create($input);
      }else{
         $created_theme = $theme->createWithRelation($input);
      }
      return redirect('/themes/' . $created_theme->id);
   }
   
   public function edit(Theme $theme, Category $category, User $user)
   {
      return view('theme/edit')->with([
         'theme' => $theme,
         'categories' => $category->all(),
         'top_users' => $user->getTopUsers(),
      ]);
   }
   
   public function update(Request $request, Theme $theme)
   {
      $this->authorize('update',$theme);
      $input = $request['theme'];
      $target_theme = $theme->updateWithRelation($input);
      return redirect('/themes/' . $target_theme->id);
   }
   
   public function destroy(Theme $theme)
   {
      $this->authorize('delete',$theme);
      $theme->deleteWithRelation();
      return redirect('/');
   }
}
