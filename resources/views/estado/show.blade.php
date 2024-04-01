@extends('layouts.app')

@section('template_title')
    {{ $estado->name ?? "{{ __('Show') Estado" }}
@endsection

@section('content')
    <section class="container col-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left text-center text-success">
                            <span class="card-title">{{ __('Ver') }} Estado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn pepe" href="{{ route('estados.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estado->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
