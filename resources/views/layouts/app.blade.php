<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de evaluaciones</title>

    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar navbar- bg-primary">
            <div class="container">
              <a class="navbar-brand"  href="#">
                <img src="{{asset ('digitalmind.png')}}" height="30" >
                Sistema de evaluaciones</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                @if(auth()->check())
                
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Proyectos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="{{ route('proyectos.index')}}">Ver proyectos</a></li>
                      <li><a class="dropdown-item" href="{{ route('tareas.index')}}">Tareas</a></li>
                      
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link" href="{{ route('empleados.index')}}">Empleados</a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Areas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="{{ route('areas.index')}}">Areas</a></li>
                      <li><a class="dropdown-item" href="{{ route('criterios.index')}}">Criterios</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link" href="{{ route('periodos.index')}}">Periodos</a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  </li>
                  @php
                  $rolUsuario = auth()->check() ? auth()->user()->role : null;
                  @endphp
                  @if ($rolUsuario == 'admin')
                  <!-- <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('register') }}">Registrar Usuario</a>
                  </li> -->
                  @endif
                  @else
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('login') }}">Login</a>
                  </li>
                  
                  @endif
                </ul>
              </div>
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {

        $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-dismissible").alert('close');
        });

        $('[data-toggle="tooltip"]').tooltip({
            trigger : 'hover'
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.checkbox-tarea').change(function() {
            // Obtener el ID de la tarea asociada al checkbox
            var id_tarea = $(this).data('tarea-id');

            // Desmarcar todos los checkboxes de la misma tarea
            $('.checkbox-tarea[data-tarea-id="' + id_tarea + '"]').not(this).prop('checked', false);
        });
    });
</script>
  </body>
</html>
