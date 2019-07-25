<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Kategori</title>
    <meta charset="utf-8">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



  </head>
  <body>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color: white">

  <div class="collapse navbar-collapse">
    <div class="navbar-nav">
      <a href="{{route('kategori.index')}}" class="nav-item nav-link"> List Kategori</a>
      <a href="{{route('buku.index')}}" class="nav-item nav-link">  List Buku</a>
      <a href="{{route('member.index')}}" class="nav-item nav-link">  List Member</a>
    </div>
  </div>

  <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
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
</nav>

<div class="container">
  @yield('content')
</div>
  </body>
</html>
