@extends('layouts.app')

@section('template_title')
    {{ $servicio->name ?? "{{ __('Show') Servicio" }}
@endsection

@section('content')
    <section class="container col-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left text-center text-success">
                            <span class="card-title">{{ __('Ver') }} Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('servicios.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $servicio->valor }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Serv:</strong>
                            {{ $servicio->tipo_serv }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
