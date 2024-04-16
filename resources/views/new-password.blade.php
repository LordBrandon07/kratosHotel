@extends ('layouts.app')
@section('content')
<div class="container px-4 py-5 my-5 col-5">
    <form class="form-control card "  action="{{ route('reset.password.post') }}" method="POST" >


	@if($errors->any())
	  <div class="col-12">
	@foreach ($errors->all() as $error)

		<div class="alert alert-danger">{{$error}}</div>

	@endforeach
	</div>
	@endif

	@if(session()->has('error'))
	<div class="alert alert-danger">{{session('error')}}</div>
	
	@endif
	
	@if(session()->has ('success'))
	<div class="alert alert-success">{{session('success')}}</div>

	@endif
      @csrf
      <input type="text" name="token" hidden value="{{$token}}">
      <div class="mb-3">
        <label for="" class="form-label">Correo electronico</label>
        <input type="text" class="form-control" name="email">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Ingrese la nueva contraseña</label>
        <input type="text" class="form-control" name="password">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Confirme contraseña</label>
        <input type="text" class="form-control" name="password_confirmation" >
      </div>
      
      
      <button type="submit" class="btn pepe">Continuar</button>

    </form>
  </div>  
@endsection
  