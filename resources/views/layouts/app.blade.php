<!doctype html class="h-100">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   <!--  <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

</head>

<body class="h-100">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div id="app" class="h-100">


        <b-navbar toggleable="sm" type="dark" variant="primary">
            <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>

            <b-navbar-brand href="{{ route('chat') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>

            <b-collapse id="nav-text-collapse" is-nav>

                <b-navbar-nav class="ml-auto">

                    <!-- Authentication Links -->
                    @guest
                    <b-nav-item href="{{ route('login') }}">Ingresar</b-nav-item>
                    <b-nav-item href="{{ route('register') }}">Registrarse</b-nav-item>
                    @else
                    <!-- Navbar dropdowns -->

                    <b-nav-item-dropdown text="{{  Auth::user()->name  }}" right>
                          <b-dropdown-item href="{{ url('/profile')}}" >
                            Modificar perfil
                        </b-dropdown-item>
                        <b-dropdown-item href="#" @click="logout">
                            Cerrar Sesión
                        </b-dropdown-item>

                    </b-nav-item-dropdown>
                    @endguest

                </b-navbar-nav>



            </b-collapse>
        </b-navbar>




        <main class="py-0">
            @yield('content')
        </main>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
