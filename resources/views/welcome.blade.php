<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de evaluaciones</title>
@vite(['resources/js/app.js', 'resources/css/app.scss'])
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Sistema | Digital Mind</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link active" aria-current="page" >Home</a>
                    </li>    
                    @else
                     <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Registro</a>
                        </li>
                            @endif
                    @endauth
            @endif
                  <li class="nav-item">
                    <a class="nav-link" href="#">Proyectos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Empleados</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
    </header>
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://cdn.pixabay.com/photo/2020/11/24/10/37/tokyo-5772125_960_720.jpg" class="d-block w-100" alt="..." height="auto">
          </div>
          <div class="carousel-item">
            <img src="https://www.amuntalent.com/wp-content/uploads/2022/11/pexels-photo-3183197-1110x550.webp" class="d-block w-100" alt="..." height="auto">
          </div>
          <div class="carousel-item">
            <img src="https://idesaa.edu.mx/blog/wp-content/uploads/2020/02/beneficios-trabajo-en-equipo.jpg" class="d-block w-100" alt="..." height="auto">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </body>
</html>