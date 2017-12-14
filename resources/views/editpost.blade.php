@extends('layouts.app')


@section('content')
<?php
  $mypost = $post[0];
?>
<script src="{{asset('js/checkanuncio.js')}}" charset="utf-8"></script>
<div class="col-lg-6 col-lg-offset-3">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Editar Publicacion</h1>
    </div>
    <div class="panel-body">
      <form class="" action="" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <label for="type">Tipo de Operacion:</label>
        <select name="type" id="type">
          <option value="buy">Compra</option>
          <option value="sell">Venta</option>
        </select><br>
        <label for="amount">Cantidad:</label>
        <input type="text" id="amount" name="amount" value="{{$mypost->amount}}">
        <select name="currency" id="currency">
          <option value="USD">USD</option>
          <option value="ARS">ARS</option>
        </select><br>
        <label for="accepts_both">Acepta comprar/vender tanto en moneda local como en USD?</label>
        <select name="accepts_both" id="accepts_both">
          <option value="1">Si</option>
          <option value="0">No</option>
        </select><br>
        <label for="sing">Comision:</label>
        <select name="sing" id="sing">
          <option value="+ ">+</option>
          <option value="- ">-</option>
        </select>
        <input type="text" id="comission" name="comission" value="{{$mypost->comission}}">%<br>
        <label for="fraction">Acepta comprar/vender por menor volumen?</label>
        <select name="fraction" id="fraction">
          <option value="1">Si</option>
          <option value="0">No</option>
        </select><br>
        <input type="text" name="id" value="{{$mypost->id}}"style="display:none;">
        <button type="submit" class="btn btn-success" name="button">Editar</button>
      </form>
    </div>
  </div>
</div>


  <script type="text/javascript">
    window.onload = function(){
    document.getElementById('type').value = "<?php echo $mypost->type; ?>";
    document.getElementById('currency').value = "<?php echo $mypost->currency;?>";
    document.getElementById('accepts_both').value = "<?php echo $mypost->accepts_both;?>";
    var com = document.getElementById("comission").value;
    if(com >= 0){
      document.getElementById('sing').value = "+ ";
    }else{
      document.getElementById('sing').value = "- ";
      document.getElementById("comission").value = com * -1;
    }
    document.getElementById('fraction').value = "<?php echo $mypost->fraction;?>";
  };
  </script>
@endsection
