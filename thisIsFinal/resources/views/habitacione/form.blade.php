<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('hab_numero') }}
            {{ Form::text('hab_numero', $habitacione->hab_numero, ['class' => 'form-control' . ($errors->has('hab_numero') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese nro de habitacion']) }}
            {!! $errors->first('hab_numero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_hab') }}
            {{ Form::select('tipo_hab', $tipos, $habitacione->tipo_hab, ['class' => 'form-control' . ($errors->has('tipo_hab') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Hab']) }}
            {!! $errors->first('tipo_hab', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tarifa') }}
            {{ Form::text('tarifa', $habitacione->tarifa, ['class' => 'form-control' . ($errors->has('tarifa') ? ' is-invalid' : ''), 'placeholder' => 'Tarifa']) }}
            {!! $errors->first('tarifa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('capacidad') }}
            {{ Form::text('capacidad', $habitacione->capacidad, ['class' => 'form-control' . ($errors->has('capacidad') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad']) }}
            {!! $errors->first('capacidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ruta_imagen') }}
            {{ Form::text('ruta_imagen', $habitacione->ruta_imagen, ['class' => 'form-control' . ($errors->has('ruta_imagen') ? ' is-invalid' : ''), 'placeholder' => 'Ruta Imagen']) }}
            {!! $errors->first('ruta_imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('disponible') }}
            {{ Form::select('disponible', ['1' => 'Sí', '0' => 'No'], $habitacione->disponible, ['class' => 'form-control' . ($errors->has('disponible') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('disponible', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn pepe">{{ __('Confirmar') }}</button>
    </div>
</div>