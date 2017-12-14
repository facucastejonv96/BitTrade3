@extends('layouts.app')


@section('content')
<script src="{{asset('js/homefilter.js')}}" charset="utf-8"></script>
<div class="container" style="overflow:hidden;">
  <div class="row">
    <div class="col">
      <form class="form-inline" style="width:85%; margin-left:7.5%; margin-right:7.5%; padding:15px;"  method="get">
        <label for="amount">Ordenar por:</label>
        <select class="" id="amount" name="amount">
          <option value="">no filtrar</option>
          <option value="asc">Mas baja primero</option>
          <option value="desc">Mas alta primero</option>
        </select>
        <label for="">Entre:</label>
        <input type="text" style="width:55px;" id="min" name="min" value="{{isset($_GET['min']) ? $_GET['min'] : ''}}"> -
        <input type="text" style="width:55px;" id="max" name="max" value="{{isset($_GET['max']) ? $_GET['max'] : ''}}">
        <select class="" name="currency" id="currency">
          <option value="USD">Dolares</option>
          <option value="ARS">Pesos</option>
        </select>
        <label for="fraccion">acepten fraccionar</label>
        <input type="checkbox" name="fraction" value="1" <?php if(isset($_GET['fraction'])) echo "checked='checked'"; ?>>
        <label for="fraccion">acepta ambas monedas</label>
        <input type="checkbox"  name="both" value="1" <?php if(isset($_GET['both'])) echo "checked='checked'"; ?>>
        <button type="submit" class="btn btn-primary" name="">Filtrar</button>
      </form>
      @foreach($errors->all() as $error)
				<li style="color:red">{{ $error }}</li>
			@endforeach
      <?php if(isset($_GET["amount"])){?>
        <script type="text/javascript">
          window.onload = function(){
            document.getElementById('amount').value = "<?php echo $_GET['amount'];?>";
            document.getElementById('currency').value = "<?php echo $_GET['currency'];?>";
          };
        </script>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Compras</h2>
        </div>

       <div class="panel-body">
          @foreach ($posts as $key => $value)
            @if($value->type == "buy")
            <div class="post">
              <h3>{{$value->user->name}}</h3>
                Cantidad: {{$value->amount}} {{$value->currency}} comision: {{$value->comission}} %<br>
                @if($value->accepts_both == 1)
                  Acepta Ambas Monedas!!<br>
                @endif
                @if($value->fraction == 1)
                  Puedes vender por igual o menor valor!!<br>
                @endif
                @if($value->user->email != Auth::user()->email)
                <form class="" action="{{route('openchat')}}" method="GET">
                  <input type="text" name="user2" value="{{$value->user->email}}" style="display:none">
                  <input type="text" name="name2" value="{{$value->user->name}}" style="display:none">
                  <input type="text" name="post_id" value="{{$value->id}}" style="display:none">
                  <input type="submit" name="" class="openchat btn btn-primary"value="Chatear con {{$value->user->name}}">
                </form>
              @endif
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Ventas</h2>
        </div>

        <div class="panel-body">
          @foreach ($posts as $key => $value)
            @if($value->type == "sell")
            <div class="post">
              <h3>{{$value->user->name}}</h3>
              Cantidad:{{$value->amount}}{{$value->currency}} {{$value->comission}} %<br>
                @if($value->accepts_both == 1)
                  Acepta Ambas Monedas!!<br>
                @endif
                @if($value->fraction == 1)
                  Puedes Comprar por igual o menor valor!!<br>
                @endif
                @if($value->user->email != Auth::user()->email)
                <form class="" action="{{route('openchat')}}" method="GET">
                  <input type="text" name="user2" value="{{$value->user->email}}" style="display:none">
                  <input type="text" name="name2" value="{{$value->user->name}}" style="display:none">
                  <input type="text" name="post_id" value="{{$value->id}}" style="display:none">
                  <input type="submit" name="" class="openchat btn btn-primary" value="Chatear con {{$value->user->name}}">
                </form>
                @endif
              </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
