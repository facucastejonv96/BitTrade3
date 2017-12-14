@extends('layouts.app')

@section('content')
  <div class="col-lg-6 col-lg-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Publicar Anuncio</h1>
      </div>
      <div class="panel-body">
        <ul>
    			@foreach($errors->all() as $error)
    				<li style="color:red">{{ $error }}</li>
    			@endforeach
    		</ul>
        <form class="postform" method="post">
          {{ csrf_field() }}
          <label for="type">Tipo de Operacion:</label>
          <select name="type">
            <option value="buy">Compra</option>
            <option value="sell">Venta</option>
          </select><br>
          <label for="amount">Cantidad:</label>
          <input type="text" name="amount" value="">
          <select name="currency">
            <option value="USD">USD</option>
            <option value="ARS">ARS</option>
          </select><br>
          <label for="accepts_both">Acepta comprar/vender tanto en moneda local como en USD?</label>
          <select name="accepts_both">
            <option value="1">Si</option>
            <option value="0">No</option>
          </select><br>
          <label for="sing">Comision:</label>
          <select name="sing">
            <option value="+ ">+</option>
            <option value="- ">-</option>
          </select>
          <input type="text" name="comission" value="">%<br>
          <label for="fraction">Acepta comprar/vender por menor volumen?</label>
          <select name="fraction">
            <option value="1">Si</option>
            <option value="0">No</option>
          </select><br>
          <button type="submit" class="btn btn-success" name="button">Publicar</button>

        </form>
      </div>
    </div>
  </div>

@endsection
