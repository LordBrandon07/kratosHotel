@extends('layouts.app')

@section('template_title')
    {{ $role->name ?? "{{ __('Show') Role" }}
@endsection

@section('content')
    <section class="container col-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left text-center text-success">
                            <span class="card-title">{{ __('Ver') }} Rol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('roles.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $role->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $role->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
