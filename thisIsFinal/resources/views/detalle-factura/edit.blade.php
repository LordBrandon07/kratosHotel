@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Detalle Factura
@endsection

@section('content')
    <section class="container col-6">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center text-success">
                        <span class="card-title">{{ __('Editar') }} Detalle Factura</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detalle-facturas.update', $detalleFactura->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('detalle-factura.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
