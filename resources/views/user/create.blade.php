@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content')
    <section class="content container-fluid col-sm-12 col-md-8 col-lg-6">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Usuario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
