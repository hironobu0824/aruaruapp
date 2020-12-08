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
      return view('show')->with([ 'theme' => $theme ]);
   }
   
   public function store(Request $request, Theme $theme)
   {
      $input = $request['theme'];
      $theme->fill($input)->save();
      return redirect('/themes/' . $theme->id);
   }
}
