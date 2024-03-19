@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? "{{ __('Show') User" }}
@endsection

@section('content')
    <section class="container col-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left text-center text-success">
                            <span class="card-title">{{ __('Ver') }} Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('users.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo documento:</strong>
                            {{ $user->tipo_doc }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            {{ $user->documento }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $user->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $user->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $user->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $user->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Id Rol:</strong>
                            {{ $user->role->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
