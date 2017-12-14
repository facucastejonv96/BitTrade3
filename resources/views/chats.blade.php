@extends('layouts.app')
@section("head")
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{asset('css/chats.css')}}">
@endsection
@section('content')
<span id="chatid" style="display:none">{{$info["chat_id"]}}</span>
<span id="name1" style="display:none">{{$info["name1"]}}</span>
<span id="user1" style="display:none">{{$info["user1"]}}</span>
<span id="name2" style="display:none">{{$info["name2"]}}</span>
<span id="user2" style="display:none">{{$info["user2"]}}</span>
<script src="{{asset('js/jquery-3.2.1.min.js')}}" charset="utf-8"></script>
<script src="{{asset('js/chatprueba.js')}}" charset="utf-8"></script>

<div class="col-lg-4 col-lg-offset-4">

  <h1 id="greeting" class="greeting"><span id="username">Chat con  {{$info["name2"]}}</span> </h1>
  <div class="col-lg-12" id="chat-window">

  </div>
    <input type="text" id="text" name="" class="form-control col-lg-12" value="" autofocus="" onblur="">
</div>
@endsection
