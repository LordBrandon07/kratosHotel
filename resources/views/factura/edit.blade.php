@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Factura
@endsection

@section('content')
    <section class="container col-6">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center text-success">
                        <span class="card-title">{{ __('Editar') }} Factura</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('facturas.update', $factura->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('factura.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
