@extends('layouts.app')

@section('template_title')
    {{ $factura->name ?? "{{ __('Show') Factura" }}
@endsection

@section('content')
    <section class="container col-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left text-center text-success">
                            <span class="card-title">{{ __('Ver') }} Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('facturas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $factura->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Impuesto:</strong>
                            {{ $factura->impuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $factura->total }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $factura->id_cliente }}
                        </div>
                    </div>
                    <a class="btn pepe" onclick="window.print()">imprimir</a>

                </div>
            </div>
        </div>
    </section>
@endsection
