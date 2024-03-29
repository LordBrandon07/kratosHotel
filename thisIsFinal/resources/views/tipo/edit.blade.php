@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tipo
@endsection

@section('content')
    <section class="container">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center text-success">
                        <span class="card-title">{{ __('Editar') }} Tipo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipos.update', $tipo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
