  @extends ('layouts.app')
    @section('content')

    @section('title')
    Inicio Sesión
    @endsection

    <div class="container px-4 py-5 my-5 col-md-4">
    <form class="form-control card " action="{{ route('login') }}" method="POST" novalidate>
      @csrf
      <center><h1>INICIO DE SESION</h1></center>
      @if (session('mensaje'))
        <h6 class="text-danger">{{ session('mensaje') }}</h6>   
      @endif

      <div class="mb-3">
        <label for="" class="form-label">USUARIO</label>
        <input type="text" class="form-control" name="documento" placeholder="Documento" value="{{ old('documento') }}">
        @error('documento')
          <h6 class="text-danger">{{ $message }}</h6>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="" class="form-label">CONTRASEÑA</label>
        <input type="password" class="form-control" name="password" id="" placeholder="Password">
        @error('password')
          <h6 class="text-danger">{{ $message }}</h6>
        @enderror
      </div>
      <button type="submit" class="btn pepe">Continuar</button>

      <a type="submit" href="{{ route('forget.password') }}">¿olvidaste tu contraseña?</a>

    </form>
  </div>
  @endsection

