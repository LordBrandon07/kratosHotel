@extends('layouts.app')

@section('template_title')
    {{ $reserva->name ?? "{{ __('Show') Reserva" }}
@endsection

@section('content')
    <section class="content container-fluid col-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Reserva</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cant Hab:</strong>
                            {{ $reserva->cant_hab }}
                        </div>
                        <div class="form-group">
                            <strong>Adultos:</strong>
                            {{ $reserva->adultos }}
                        </div>
                        <div class="form-group">
                            <strong>Ninos:</strong>
                            {{ $reserva->ninos }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $reserva->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Final:</strong>
                            {{ $reserva->fecha_final }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $reserva->valor }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            {{ $reserva->documento }}
                        </div>
                        <div class="form-group">
                            <strong>Est Id:</strong>
                            {{ $reserva->est_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
