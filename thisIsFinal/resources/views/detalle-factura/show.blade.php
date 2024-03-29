@extends('layouts.app')

@section('template_title')
    {{ $detalleFactura->name ?? "{{ __('Show') Detalle Factura" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-center text-success">
                            <span class="card-title">{{ __('Ver') }} Detalle Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('detalle-facturas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Factura Id:</strong>
                            {{ $detalleFactura->factura_id }}
                        </div>
                        <div class="form-group">
                            <strong>Reserva Id:</strong>
                            {{ $detalleFactura->reserva_id }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio Id:</strong>
                            {{ $detalleFactura->servicio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleFactura->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $detalleFactura->valor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
