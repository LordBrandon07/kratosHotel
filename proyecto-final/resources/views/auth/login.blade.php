  @extends ('layouts.app')
    @section('content')

    @section('title')
    Inicio Sesión
    @endsection

    <div class="container px-4 py-5 my-5 col-4">
    <form class="form-control card text-light" action="{{ route('login') }}" method="POST" novalidate>
      @csrf
      <h1>INICIO DE SESION</h1>
      @if (session('mensaje'))
        <h6>{{ session('mensaje') }}</h6>   
      @endif

      <div class="mb-3">
        <label for="" class="form-label">USUARIO</label>
        <input type="text" class="form-control" name="documento" placeholder="Documento" value="{{ old('documento') }}">
        @error('documento')
          <h6>{{ $message }}</h6>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="" class="form-label">CONTRASEÑA</label>
        <input type="password" class="form-control" name="password" id="" placeholder="Contraseña">
        @error('password')
          <h6>{{ $message }}</h6>
        @enderror
      </div>
      <button type="submit" class="btn pepe">Continuar</button>
    </form>
  </div>
  @endsection