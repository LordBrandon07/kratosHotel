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
      <div class="container py-3 ">
        <header>
          <div>
          <a href="/home"><img src="{{asset('img/logow.png')}}" alt="" width="2.5%" class="logoo"></a>
          </div>
          @auth
          <p class="d-flex justify-content-end text-uppercase text-light">Bienvenido {{ auth()->user()->name }}</p>
          <ul class="nav nav-pills d-flex justify-content-center">
            <li class="nav-item nav-text-p"><a href="/" class="nav-link nav-text-p" aria-current="page">Inicio</a></li>
            @if (auth()->user()->id_rol==1)     <!-- Administrador -->
              <li class="nav-item"><a href="../users" class="nav-link nav-text">Usuarios</a></li>
              <li class="nav-item"><a href="../roles" class="nav-link nav-text">Roles</a></li>
              <li class="nav-item"><a href="../habitaciones" class="nav-link nav-text">Habitaciones</a></li>
              <li class="nav-item"><a href="../tipos" class="nav-link nav-text">Tipos Habitaciones</a></li>
              <li class="nav-item"><a href="../reservas" class="nav-link nav-text">Reserva</a></li>
              <li class="nav-item"><a href="../estados" class="nav-link nav-text">Estados</a></li>
              <li class="nav-item"><a href="../servicios" class="nav-link nav-text">Servicios</a></li>
              <li class="nav-item"><a href="../facturas" class="nav-link nav-text">Facturación</a></li>


            @elseif (auth()->user()->id_rol==2)  <!-- Recepcion -->
              <li class="nav-item"><a href="../users" class="nav-link">Usuarios</a></li>
              <li class="nav-item"><a href="../habitaciones" class="nav-link">Habitaciones</a></li>
              <li class="nav-item"><a href="../reservas" class="nav-link">Reserva</a></li>
              <li class="nav-item"><a href="../servicios" class="nav-link">Servicios</a></li>
              <li class="nav-item"><a href="../facturas" class="nav-link">Facturación</a></li>
              <li class="nav-item"><a href="../detalle-facturas" class="nav-link">Detalle Factura</a></li>


            @elseif (auth()->user()->id_rol==3)  <!-- Cliente -->
            <li class="nav-item"><a href="../reservas" class="nav-link">Reserva</a></li>
              <li class="nav-item"><a href="../habitaciones" class="nav-link">Habitaciones</a></li>
              <li class="nav-item"><a href="../servicios" class="nav-link">Servicios</a></li>


            @elseif (auth()->user()->id_rol==4)  <!-- Camarero/mesero -->
              <li class="nav-item"><a href="../habitaciones" class="nav-link">Habitaciones</a></li>
              <li class="nav-item"><a href="../detalle" class="nav-link ">Detalle Factura</a></li>
            @endif
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn nav-text-p">
                  Salir
              </button>
            </form>
          </ul>
          @endauth
          @guest
          <ul class="nav nav-pills d-flex justify-content-center py-3">
            <li class="nav-item "><a href="../users/create" class="nav-link nav-text">Registro</a></li>
          </ul>
          @endguest
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
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</html>