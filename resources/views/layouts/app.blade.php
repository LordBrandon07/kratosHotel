<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('app.css')}}">
    <title>Hoteleria</title>
</head>
<body>
    <!-- Nav tabs -->
    <div class="headerr">
    <a class="navbar-brand logoo" href="/"><img src="img/logow.png" width="40px" alt="Logo"></a>
      <div class="container py-3 ">
  
        <header>
        
          <nav class="navbar navbar-expand-md navv">
          <div class="container-fluid ">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbar-toggler">
          @auth
          
          <ul class="ull navbar-nav d-flex justify-content-center align-items-center">
            <li class="nav-item nav-text-p"><a href="/" class="nav-link nav-text-p" aria-current="page">Inicio</a></li>
            @if (auth()->user()->id_rol==1)     <!-- Administrador -->
              <li class="nav-item"><a href="/users" class="nav-link nav-text">Usuarios</a></li>
              <li class="nav-item"><a href="/roles" class="nav-link nav-text">Roles</a></li>
              <li class="nav-item"><a href="/habitaciones" class="nav-link nav-text">Habitaciones</a></li>
              <li class="nav-item"><a href="/tipos" class="nav-link nav-text">Tipos Habitaciones</a></li>
              <li class="nav-item"><a href="/reservas" class="nav-link nav-text">Reserva</a></li>
              <li class="nav-item"><a href="/estados" class="nav-link nav-text">Estados</a></li>
              <li class="nav-item"><a href="/servicios" class="nav-link nav-text">Servicios</a></li>
              <li class="nav-item"><a href="/detalle-facturas" class="nav-link nav-text ">Detalle Factura</a></li>
              <li class="nav-item"><a href="/facturas" class="nav-link nav-text">Facturación</a></li>


            @elseif (auth()->user()->id_rol==2)  <!-- Recepcion -->
              <li class="nav-item"><a href="/users" class="nav-link nav-text">Usuarios</a></li>
              <li class="nav-item"><a href="/habitaciones" class="nav-link nav-text">Habitaciones</a></li>
              <li class="nav-item"><a href="/reservas" class="nav-link nav-text">Reserva</a></li>
              <li class="nav-item"><a href="/servicios" class="nav-link nav-text">Servicios</a></li>
              <li class="nav-item"><a href="/facturas" class="nav-link nav-text">Facturación</a></li>
              <li class="nav-item"><a href="/detalle-facturas" class="nav-link nav-text">Detalle Factura</a></li>


            @elseif (auth()->user()->id_rol==3)  <!-- Cliente -->
            <li class="nav-item"><a href="/reservas" class="nav-link nav-text">Reserva</a></li>
              <li class="nav-item"><a href="/habitaciones" class="nav-link nav-text">Habitaciones</a></li>
              <li class="nav-item"><a href="/servicios" class="nav-link nav-text">Servicios</a></li>
              <li class="nav-item"><a href="/users" class="nav-link nav-text">Mi perfil</a></li>


            @elseif (auth()->user()->id_rol==4)  <!-- Camarero/mesero -->
              <li class="nav-item"><a href="/habitaciones" class="nav-link nav-text">Habitaciones</a></li>
              <li class="nav-item"><a href="/detalle-facturas" class="nav-link nav-text ">Detalle Factura</a></li>
            @endif
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn nav-text-p">
                  Salir
              </button>
            </form>
          </ul>
          <p class="welcome text-uppercase text-light">Bienvenido {{ auth()->user()->nombres }} {{ auth()->user()->apellidos }}</p>
          @endauth
          @guest
          <ul class="nav nav-pills d-flex justify-content-center py-3">
          <li class="nav-item register"><a href="{{ route('users.create') }}" class="nav-link nav-text">Registro</a></li>
          <li class="nav-item register"><a href="{{ route('login') }}" class="nav-link nav-text">Iniciar sesion</a></li>
          </ul>
          @endguest
          </div>
          </div>
          </nav>
        </header>
      </div>
    </div>
    
    <!-- Tab panes -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
    </div>

    @yield ('content')

    <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
    <script>
        var triggerEl = document.querySelector('#navId a')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
    </script>
    
    <!-- footer -->
  <div class="bg-dark footer">
      <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-white">© 2024 Kratos, S.A.S</p>

        <a href="/" width="20px" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img src="img/logow.png" width="15%" alt="">
        </a>

        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Home</a></li>
          <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>-->
          <li class="nav-item"><a href="#services" class="nav-link px-2 text-body-secondary">Services</a></li>
          <li class="nav-item"><a href="#about-me" class="nav-link px-2 text-body-secondary">About</a></li> 
        </ul>
      </footer>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</html>