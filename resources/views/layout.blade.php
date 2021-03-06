<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('National University Sports', 'National University Sports') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')

 

    <!-- Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('National University Sports', 'National University Sports') }} --}}

                    <img src="/images/logo_size_new.jpg" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="/sports">Sports</a>
                        </li>
                        <li class="nav-item">
                            @if(isset($user->member->team_id))
                          <a class="nav-link" href="/sports/{{$user->member->team->division->sport->name}}/{{$user->member->team->division->id}}/fixtures">Fixtures</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if(isset($user->member->team_id))
                          <a class="nav-link" href="/sports/{{$user->member->team->division->sport->name}}/{{$user->member->team->division->id}}/results">Results</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if(isset($user->member->team_id))
                          <a class="nav-link" href="/teams/{{$user->member->team_id}}">My Team</a>
                            @endif
                        <li class="nav-item">
                            @if(isset($user->member->team_id))
                            @if(isset($user->profile->id))
                          <a class="nav-link" href="/profile/{{$user->profile->id}}">My Profile</a>
                            @else
                            <a class="nav-link" href="/profile/create">My Profile</a>
                            @endif
                            @endif
                            @if(isset($user))
                            @if($user->user_group == 1)
                          <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin</a>
                        </li>
                            @endif
                            @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
       {{--  Footer --}}
        
       {{-- <footer class="page-footer font-small blue" style="position: absolute;left: 0;right: 0;bottom: 0;">

         <!-- Copyright -->
         <div class="footer-copyright text-center py-3">© 2020 Copyright
           National University Sports
         </div>
         <!-- Copyright -->

       </footer>
        --}}
</body>
</html>
