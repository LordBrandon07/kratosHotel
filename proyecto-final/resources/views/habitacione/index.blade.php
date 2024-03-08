@extends('layouts.app')

@section('template_title')
    Habitacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Habitacione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('habitaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Hab Numero</th>
										<th>Estado</th>
										<th>Tipo Hab</th>
										<th>Tarifa</th>
										<th>Capacidad</th>
										<th>Ruta Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($habitaciones as $habitacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $habitacione->hab_numero }}</td>
											<td>{{ $habitacione->estado }}</td>
											<td>{{ $habitacione->tipo_hab }}</td>
											<td>{{ $habitacione->tarifa }}</td>
											<td>{{ $habitacione->capacidad }}</td>
											<td>{{ $habitacione->ruta_imagen }}</td>

                                            <td>
                                                <form action="{{ route('habitaciones.destroy',$habitacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('habitaciones.show',$habitacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('habitaciones.edit',$habitacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
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
