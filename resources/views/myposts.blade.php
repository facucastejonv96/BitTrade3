@extends('layouts.app')


@section('content')
<div class="col-lg-4 col-lg-offset-4">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Mis Publicaciones</h1>
    </div>
    <div class="panel-body">
      @if(sizeof($posts) == 0)
        <h2>Usted no ha realizado ninguna publicacion aun.</h2>
        <form class="" action="{{ route('create-post-form') }}" method="get">
          <input type="submit" name="" value="Publicar Ahora!">
        </form>
      @endif
      @foreach ($posts as $key => $value)
      <div class="post">


        Cantidad:{{$value->amount}}{{$value->currency}} {{$value->comission}} %<br>
        @if($value->accepts_both == 1)
          Acepta Ambas Monedas!!<br>
        @endif
        @if($value->fraction == 1)
          Puedes vender por igual o menor valor!!<br>
        @endif
        <form class="" action="{{ route('editpostform') }}" method="POST">
          {{ csrf_field() }}
          <input type="text" name="id" value="{{$value->id}}" style="display:none;">
          <input type="submit" name="" class="openchat btn btn-primary" value="Editar">
        </form>
        </div>
      @endforeach
    </div>
  </div>
</div>


@endsection
