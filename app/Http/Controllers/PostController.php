<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\chat;
use Auth;

class PostController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function createPostForm(){
    return view("postform");
  }
  public function myPosts(){
    //$chats = Chat::where("")
    $posts = Post::where("user_id", Auth::user()->id)->get();
    return view("myposts" , compact("posts"));
  }
  public function editPostForm(Request $request){
    $post =  Post::where("id" ,$request->input("id"))->get();
    return view("editpost" , compact("post"));
  }
  public function editPost(Request $request){
    $this->validate(
      $request,
                  [
                      'amount' => 'required|numeric',
                      'comission' => 'required|numeric',
                  ],
                  [
                      'amount.required' => "El nombre es requerido",
                      'amount.numeric' => "El nombre debe tener entre 2 y 20 caracteres",
                      'comission.required' => 'El numero de telefono es requerido',
                      'comission.numeric' => 'El numero debe contener solo caracteres numericos'

                  ]);
                  $post = Post::findOrFail($request->input("id"));
                  $post->fill($request->all());
                  $comission = $request->input("sing");
                  $comission .= $request->input("comission");
                  $post->comission = $comission;
                  $post->save();
                  return redirect(route("home"));


  }

  public function post(Request $request){
    $this->validate(
      $request,
                  [
                      'amount' => 'required|numeric',
                      'comission' => 'required|numeric',
                  ],
                  [
                      'amount.required' => "El nombre es requerido",
                      'amount.numeric' => "El nombre debe tener entre 2 y 20 caracteres",
                      'comission.required' => 'El numero de telefono es requerido',
                      'comission.numeric' => 'El numero debe contener solo caracteres numericos'

                  ]);

          $post = new Post($request->all());
          $comission = $request->input("sing");
          $comission .= $request->input("comission");
          $post->comission = $comission;
          $post->user_id = Auth::user()->id;
          $post->save();

          return redirect()->route('home');
    }
}
