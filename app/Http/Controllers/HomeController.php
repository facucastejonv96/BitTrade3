<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $this->validate(
        $request,
                  [
                      'min' => 'nullable|numeric',
                      'max' => 'nullable|numeric'
                  ],
                  [
                      'min.numeric' => "El minimo debe ser un numero",
                      'max.numeric' => "El maximo debe ser un numero"
                  ]);

      $posts = Post::ammount($request->get("amount"))
      ->min($request->get("min"), $request->get("currency"))
      ->max($request->get("max"), $request->get("currency"))
      ->fraction($request->get("fraction"))
      ->both($request->get("both"))
      ->get();
      return view('home' , compact("posts"));
    }


}
