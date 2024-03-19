@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Habitacione
@endsection

@section('content')
    <section class="container">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center text-success">
                        <span class="card-title">{{ __('Editar') }} Habitacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('habitaciones.update', $habitacione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('habitacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
