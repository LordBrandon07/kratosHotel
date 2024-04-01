@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Reserva
@endsection

@section('content')
    <section class="container col-6">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center text-success">
                        <span class="card-title">{{ __('Editar') }} Reserva</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservas.update', $reserva->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('reserva.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
