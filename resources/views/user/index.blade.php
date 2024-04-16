@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Usuarios') }}
                            </span>

                             <div class="float-right">
                                @auth
                                @if (auth()->user()->id_rol==1 || auth()->user()->id_rol==2 || auth()->user()->id_rol==4)
                                <a href="{{ route('users.create') }}" class="btn pepe btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                @endif
                                @endauth
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
										<th>Tipo doc.</th>
										<th>Documento</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Fecha Nacimiento</th>
										<th>Email</th>
										<th>Telefono</th>
										<th>Id Rol</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                        @auth
                                        @if (auth()->user()->id_rol==1)     <!-- Administrador -->
                                            <td>{{ ++$i }}</td>
											<td>{{ $user->tipo_doc }}</td>
											<td>{{ $user->documento }}</td>
											<td>{{ $user->nombres }}</td>
											<td>{{ $user->apellidos }}</td>
											<td>{{ $user->fecha_nacimiento }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->telefono }}</td>
											<td>{{ $user->role->nombre }}</td>
                                            <td>
                                                <form class="btn-group" role="group" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
                                        
                                        @if (auth()->user()->id_rol==3 && $user->documento == auth()->user()->documento)     <!-- Cliente -->
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->tipo_doc }}</td>
                                            <td>{{ $user->documento }}</td>
                                            <td>{{ $user->nombres }}</td>
                                            <td>{{ $user->apellidos }}</td>
                                            <td>{{ $user->fecha_nacimiento }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>{{ $user->role->nombre }}</td>
                                            <td>
                                                <form class="btn-group" role="group" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                </form>
                                            </td>

                                        @elseif (auth()->user()->id_rol==2 || auth()->user()->id_rol==4 && $user->id_rol == 3)     <!-- recep-camar-mese -->
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->tipo_doc }}</td>
                                            <td>{{ $user->documento }}</td>
                                            <td>{{ $user->nombres }}</td>
                                            <td>{{ $user->apellidos }}</td>
                                            <td>{{ $user->fecha_nacimiento }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>{{ $user->role->nombre }}</td>
                                            <td>
                                                <form class="btn-group" role="group" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                </form>
                                            </td>
                                        @endif
                                        @endauth
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
