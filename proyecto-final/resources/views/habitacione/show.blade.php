@extends('layouts.app')

@section('template_title')
    {{ $habitacione->name ?? "{{ __('Ver') Habitacion" }}
@endsection

@section('content')
    <section class="content container-fluid col-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Habitacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('habitaciones.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Hab Numero:</strong>
                            {{ $habitacione->hab_numero }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $habitacione->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Hab:</strong>
                            {{ $habitacione->tipo_hab }}
                        </div>
                        <div class="form-group">
                            <strong>Tarifa:</strong>
                            {{ $habitacione->tarifa }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $habitacione->capacidad }}
                        </div>
                        <div class="form-group">
                            <strong>Ruta Imagen:</strong>
                            {{ $habitacione->ruta_imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
