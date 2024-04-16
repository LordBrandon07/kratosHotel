@extends ('layouts.app')
@section('content')
<main>
<div class="container px-4 py-5 my-5 col-5">
    <form class="form-control card " action="{{ route('forget.password.post') }}" method="POST" >
    @csrf
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
	@if(session()->has('success'))
		<div class="alert alert-success">{{session('success')}}</div>
	@endif

      <div class="mb-3">
        <label for="" class="form-label">Digite su correo electrónico</label>
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
      </div>
      <a href=""> <button type="submit" class="btn pepe">Continuar</button></a>
    </form>
  </div> 
</main>
@endsection
  