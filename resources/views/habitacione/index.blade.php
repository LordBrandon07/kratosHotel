@extends('layouts.app')

@section('template_title')
    Habitacione
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Habitaciones') }}
                            </span>

                             <div class="float-right">
                             @if (auth()->user()->id_rol==1) <!-- Administrador -->
                                <a href="{{ route('habitaciones.create') }}" class="btn pepe btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva') }}
                                </a>
                            @endif
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
										<th>Hab. Numero</th>
										<th>Tipo Hab.</th>
										<th>Tarifa</th>
										<th>Capacidad</th>
										<th>Disponible</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($habitaciones as $habitacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $habitacione->hab_numero }}</td>
											<td>{{ $habitacione->tipo->name }}</td>
											<td>{{ $habitacione->tarifa }}</td>
											<td>{{ $habitacione->capacidad }}</td>
											<td>{{ $habitacione->disponible ? 'Sì' : 'No' }}</td>
                                            <td>
                                                <form class="btn-group" role="group" action="{{ route('habitaciones.destroy',$habitacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info " href="{{ route('habitaciones.show',$habitacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @if (auth()->user()->id_rol==1)
                                                    <a class="btn btn-sm btn-primary" href="{{ route('habitaciones.edit',$habitacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endif
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
                {!! $habitaciones->links() !!}
            </div>
        </div>
    </div>
@endsection
