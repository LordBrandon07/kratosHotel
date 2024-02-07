@extends('layouts.app')

@section('template_title')
    {{ $factura->name ?? "{{ __('Show') Factura" }}
@endsection

@section('content')
    <section class="content container-fluid col-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facturas.index') }}"> {{ __('Back') }}</a>
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
                            <strong>Descuento:</strong>
                            {{ $factura->descuento }}
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
                </div>
            </div>
        </div>
    </section>
@endsection
