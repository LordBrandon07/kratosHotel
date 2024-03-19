<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipo_doc') }}
            {{ Form::select('tipo_doc', ['CC' => 'Cedula de Ciudadania', 'CE' => 'Cedula de Extranjeria', 'PS' => 'Pasaporte', 'PEP' => 'PEP'], $user->tipo_doc, ['class' => 'form-control' . ($errors->has('tipo_doc') ? ' is-invalid' : '')]) }}            {!! $errors->first('tipo_doc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('documento') }}
            {{ Form::text('documento', $user->documento, ['class' => 'form-control' . ($errors->has('documento') ? ' is-invalid' : ''), 'placeholder' => 'Documento']) }}
            {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $user->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_nacimiento') }}
            {{ Form::date('fecha_nacimiento', $user->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">Necesitas ser mayor de edad</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">El correo electronico no es valido</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => '********']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">La contraseña no es valida, se necesita minimo 8 caracteres una mayuscula y un numero</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $user->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @guest
        {{form::hidden('id_rol', $user->id_rol ?? '3')}}
        @endguest
        @auth
        @if (auth()->user()->id_rol==1)
        <div class="form-group">
            {{ Form::label('Rol') }}
            {{ Form::select('id_rol', $roles, '3', ['class' => 'form-control' . ($errors->has('id_rol') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_rol', '<div class="invalid-feedback">:message</div>') !!}
        @elseif (auth()->user()->id_rol==2 || auth()->user()->id_rol==3 || auth()->user()->id_rol==4)
            {{form::hidden('id_rol', $user->id_rol ?? '3')}}
        @endif
        @endauth
        </div>

    </div>
    <div class="box-footer mt-20">
        <button type="submit" class="btn pepe">{{ __('Confirmar') }}</button>
    </div>
</div>