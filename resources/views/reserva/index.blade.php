@extends('layouts.app')

@section('template_title')
    Reserva
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reserva') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reservas.create') }}" class="btn pepe btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
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
										<th>Adultos</th>
										<th>Ninos</th>
										<th>Fecha Inicio</th>
										<th>Fecha Final</th>
										<th>Noches</th>
										<th>Habitacion</th>
										<th>Valor</th>
										<th>Documento</th>
										<th>Est Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservas as $reserva)
                                        <tr>
                                        @auth
                                        @if (auth()->user()->id_rol==1 || auth()->user()->id_rol==2 || auth()->user()->id_rol==4)
                                            <td>{{ ++$i }}</td>
											<td>{{ $reserva->adultos }}</td>
											<td>{{ $reserva->ninos }}</td>
											<td>{{ $reserva->fecha_inicio }}</td>
											<td>{{ $reserva->fecha_final }}</td>
											<td><?php
                                                $fechaInicio = new DateTime($reserva->fecha_inicio);
                                                $fechaFinal = new DateTime($reserva->fecha_final);
                                                $diferencia = $fechaInicio->diff($fechaFinal)->days;
                                                echo $diferencia;?></td>
											<td>{{ $reserva->nro_hab }}</td>
											<td>{{ $reserva->valor }}</td>
											<td>{{ $reserva->documento }}</td>
											<td>{{ $reserva->estado->name }}</td>
                                            <td>
                                                <form class="btn-group" role="group" action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info " href="{{ route('reservas.show',$reserva->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('reservas.edit',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
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
                                        @endif    
                                        @if (auth()->user()->id_rol==3 && $reserva->documento == auth()->user()->documento)     <!-- Cliente -->
                                            <td>{{ ++$i }}</td>
                                                <td>{{ $reserva->adultos }}</td>
                                                <td>{{ $reserva->ninos }}</td>
                                                <td>{{ $reserva->fecha_inicio }}</td>
                                                <td>{{ $reserva->fecha_final }}</td>
                                                <td><?php
                                                    $fechaInicio = new DateTime($reserva->fecha_inicio);
                                                    $fechaFinal = new DateTime($reserva->fecha_final);
                                                    $diferencia = $fechaInicio->diff($fechaFinal)->days;
                                                    echo $diferencia;?></td>
                                                <td>{{ $reserva->nro_hab }}</td>
                                                <td>{{ $reserva->valor }}</td>
                                                <td>{{ $reserva->documento }}</td>
                                                <td>{{ $reserva->estado->name }}</td>
                                                <td>
                                                    <form class="btn-group" role="group" action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-info " href="{{ route('reservas.show',$reserva->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                        <a class="btn btn-sm btn-primary" href="{{ route('reservas.edit',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                        @endauth
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reservas->links() !!}
            </div>
        </div>
    </div>
@endsection
