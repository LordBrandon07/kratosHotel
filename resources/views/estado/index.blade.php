@extends('layouts.app')

@section('template_title')
    Estado
@endsection

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estados.create') }}" class="btn pepe btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo ') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estados as $estado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $estado->name }}</td>

                                            <td>
                                                <form class="btn-group" role="group" action="{{ route('estados.destroy',$estado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info " href="{{ route('estados.show',$estado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('estados.edit',$estado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @if (session('error'))
                                            <script>
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Oops...",
                                                    text: "Estamos trabajando en ello!",
                                                }).then((result) => {
                                                    if (result.isConfirmed || result.isDismissed) {
                                                        setTimeout(function(){
                                                            window.location.href = "/";
                                                        }, 3000); // 3000 milliseconds = 3 seconds
                                                    }
                                                });
                                            </script>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $estados->links() !!}
            </div>
        </div>
    </div>
@endsection
