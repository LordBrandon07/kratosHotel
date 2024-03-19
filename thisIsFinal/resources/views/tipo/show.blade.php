@extends('layouts.app')

@section('template_title')
    {{ $tipo->name ?? "{{ __('Show') Tipo" }}
@endsection

@section('content')
    <section class="container col-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left text-center text-success">
                            <span class="card-title">{{ __('Ver') }} Tipo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('tipos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $tipo->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $tipo->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
