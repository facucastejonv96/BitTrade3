<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bittrade</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      <script src="{{asset('js/jquery-3.2.1.min.js')}}" charset="utf-8"></script>
      <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h1 style="font-size:60px;">BitTrade</h1>
                  </div>
                  <div class="panel-body">
                    <p style="font-size:40px;">Bittrade es un sitio donde las personas pueden comprar y vender bitcoins face 2 face sin intermediarios y sin comisiones. La comunidad utiliza el precio del bitcoin de bitstamp.</p>
                    <div style="font-size:80px;">
                      El precio actual del bitcoin es de:
                    </div>
                    <div id="price"style="font-size:80px;">

                    </div>
                    <br>

                    </div>

                  </div>

                </div>
              </div>
            </div>
        </div>
    </body>
</html>