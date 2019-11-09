<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        
        body{
              margin:0;
              padding:0;
              font-size:100%;
              line-height: 1.6;
              font-family: Arial, Helvetica, sans-serif;
            }

            #wrapper{
              position: relative;
              width:100%;
              min-height:55vw;
              overflow: hidden;
            }

            .layer{
              position: absolute;
              width:100vw;
              min-height: 55vw;
              overflow: hidden;
            }

            .layer .content-wrap{
              position: absolute;
              width:100vw;
              min-height: 55vw;
            }

            .layer .content-body{
              width:25%;
              position:absolute;
              top:50%;
              text-align: center;
              transform:translateY(-50%);
              color:#fff;
            }

            .layer img{
              position: absolute;
              width:35%;
              top:50%;
              left: 50%;
              transform:translate(-50%, -50%);
            }

            .layer h1{
            }

            .bottom{
              background:#222;
              z-index:1;
            }

            .bottom .content-body{
              right:5%;
            }

            .bottom h1{
              color:#FDAB00;
            }

            .top{
              background:#eee;
              color:#222;
              z-index:2;
              width:50vw;
            }

            .top .content-body{
              left: 5%;
              color:#222;
            }

            .handle{
              position: absolute;
              height: 100%;
              display: block;
              background-color: #FDAB00;
              width:5px;
              top:0;
              left: 50%;
              z-index:3;
            }

            .skewed .handle{
              top:50%;
              transform:rotate(30deg) translateY(-50%);
              height: 200%;
              transform-origin:top;
            }

            .skewed .top{
              transform: skew(-30deg);
              margin-left:-1000px;
              width: calc(50vw + 1000px);
            }

            .skewed .top .content-wrap{
              transform: skew(30deg);
              margin-left:1000px;
            }

            @media(max-width:768px){
              body{
              }
            }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <li class="p-3"><a href="">Home</a></li>
                      <li class="p-3"><a href="">Work</a></li>
                      <li class="p-3"><a href="">About Me</a></li>
                      <li class="p-3"><a href="">Contact Us</a></li>
                    </ul>
                    
                    <div class="row">
                        
                        <a class="navbar-brand bg-white jumbotron" href="{{ url('/') }}">
                            <h1>WeConnect</h1>
                            <h6>Coding life to your ideas</h6>
                        </a><br>
                        
                    </div>

                     
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
  let wrapper = document.getElementById('wrapper');
  let topLayer = wrapper.querySelector('.top');
  let handle = wrapper.querySelector('.handle');
  let skew = 0;
  let delta = 0;

  if(wrapper.className.indexOf('skewed') != -1){
    skew = 1000;
  }
  
  wrapper.addEventListener('mousemove', function(e){
    delta = (e.clientX - window.innerWidth / 2) * 0.5;
  
    handle.style.left = e.clientX + delta + 'px';

    topLayer.style.width= e.clientX + skew + delta + 'px';
  });
});
</script>
</html>
