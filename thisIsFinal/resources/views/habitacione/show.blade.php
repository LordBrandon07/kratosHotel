@extends('layouts.app')

@section('template_title')
    {{ $habitacione->name ?? "{{ __('Show') Habitacione" }}
@endsection

@section('content')
    <section class="container col-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left text-center text-success">
                            <span class="card-title">{{ __('Ver') }} Habitaciones</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('habitaciones.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Numero:</strong>
                            {{ $habitacione->hab_numero }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Hab:</strong>
                            {{ $habitacione->tipo->name }}
                        </div>
                        <div class="form-group">
                            <strong>Tarifa:</strong>
                            {{ $habitacione->tarifa }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $habitacione->capacidad }} personas
                        </div>
                        <div class="form-group">
                            <strong>Disponible:</strong>
                            {{ $habitacione->disponible }}
                        </div>
                        <div class="form-group">
                            <img src="{{ $habitacione->ruta_imagen }}" alt="{{ $habitacione->ruta_imagen }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
