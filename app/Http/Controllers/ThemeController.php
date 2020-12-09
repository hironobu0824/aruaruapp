<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
   public function index(Theme $theme)
   {
       return view('index')->with([ 'themes' => $theme->get() ]);
   }
   
   public function show(Theme $theme)
   {
      return view('theme/show')->with([ 'theme' => $theme ]);
   }
   
   public function store(Request $request, Theme $theme)
   {
      $input = $request['theme'];
      $theme->fill($input)->save();
      return redirect('/themes/' . $theme->id);
   }
   
   public function edit(Theme $theme)
   {
       return view('theme/edit')->with([ 'theme' => $theme ]);
   }
   
   public function update(Request $request, Theme $theme)
   {
      $input_theme = $request['theme'];
      $theme->fill($input_theme)->save();
      return redirect('/themes/' . $theme->id);
   }
   
   public function destroy(Theme $theme)
   {
      $theme->delete();
      return redirect('/');
   }
}
