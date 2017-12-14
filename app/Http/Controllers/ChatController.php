<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatmessage;
use App\Chat;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{
  public function listChats(){
    $chats = Chat::where("user1" , Auth::user()->email)->orWhere("user2" ,  Auth::user()->email)->get();
    return view ("listchats" , compact("chats"));
  }
  public function openExistentChat(){
    $chat = Chat::where("id" , $_POST["chat_id"])->get();
    $chat = $chat[0];
    if($chat->user1 == Auth::user()->email){
      $info = [
        "name1" => $chat->name1,
        "user1" => $chat->user1,
        "chat_id" => $chat->id,
        "name2"=> $chat->name2,
        "user2" => $chat->user2
      ];
      return view("chats" , compact("info"));
    }else{
      $info = [
        "name1" => $chat->name2,
        "user1" => $chat->user2,
        "chat_id" => $chat->id,
        "name2"=> $chat->name1,
        "user2" => $chat->user1
      ];
      return view("chats" , compact("info"));
    }
  }


    public function openChat(Request $request){
        $post_id = $_GET["post_id"];
        $post = Post::where("id" , $post_id)->get();
        $user1 = Auth::user()->email;
        $name1 = Auth::user()->name;
        $user2 = $_GET["user2"];
        $name2 = $_GET["name2"];
        $chat = Chat::where("user1" , $user1)->where("user2" , $user2)->orWhere("user2" , $user1)->where("user1" , $user2)->get();
        if($chat->count() == 0){
          $chat = new Chat();
          $chat->user1 = $user1;
          $chat->name1 = $name1;
          $chat->user2 = $user2;
          $chat->name2 = $name2;
          $chat->save();
        }
        $chat = Chat::where("user1" , $user1)->where("user2" , $user2)->orWhere("user2" , $user1)->where("user1" , $user2)->get();
        $chat_id = $chat[0]->id;
        $info = [
          "name1" => $name1,
          "user1" => $user1,
          "chat_id" => $chat_id,
          "name2"=> $name2,
          "user2" => $user2
        ];
        return view("chats" , compact("info"));
    }


    public function sendMessage(Request $request){
      $name1 = $_GET["name1"];
      $text = $_GET["text"];
      $user1 = $_GET["user1"];
      $chatid = $_GET["chatid"];
      $message = new Chatmessage();
      $message->sender_mail = $user1;
      $message->message = $text;
      $message->sender_name = $name1;
      $message->chat_id = $chatid;
      $message->save();
    }

    function retrieveChatMessages(Request $request){
      $chatmessage = Chatmessage::where("chat_id", $_GET["chatid"])->where("read", 0)->where("sender_mail" , "!=" , $_GET["user1"])->first();
      if($chatmessage != null){
        $chatmessage->read = true;
        $chatmessage->save();
        return response()->json(
        $chatmessage
      );}
    }

    function brignOldMessages(){
      $messages = Chatmessage::where("chat_id" , $_GET["chatid"])->orderBy("created_at" , "asc")->get();
      return response()->json(
      $messages
    );
    }
}
