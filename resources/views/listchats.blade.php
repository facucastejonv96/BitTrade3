@extends('layouts.app')
@section("content")


<div class="col-lg-4 col-lg-offset-4">
  <div class="">
    <div class="panel panel-default">
      <div class="">

      </div>
      <div class="panel-heading">
        <h1>Chats</h1>
      </div>
      <div class="panel-body">
        @foreach($chats as $key => $value)
        <div class="mychats">
          @if($value->user1 == Auth::user()->email)
            <h2>{{$value->name2}}</h2>
              <form class="" action="{{route('openexistentchat')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="chat_id" value="{{$value->id}}" style="display:none">
                <input type="submit" name="" class="openchat btn btn-primary"value="abrir chat">
              </form>
          @endif
          @if($value->user2 == Auth::user()->email)
            <h2>{{$value->name1}}</h2>
              <form class="" action="{{route('openexistentchat')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="chat_id" value="{{$value->id}}" style="display:none">
                <input type="submit" name="" class="openchat btn btn-primary" value="abrir chat">
              </form>
          @endif
          </div>
          @endforeach
      </div>

    </div>
  </div>
</div>


@endsection
