@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Reserva
@endsection

@section('content')
    <section class="content container-fluid col-sm-12 col-md-8 col-lg-6">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center text-success">
                        <span class="card-title">{{ __('Crear') }} Reserva</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('reserva.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
