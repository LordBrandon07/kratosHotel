<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('valor') }}
            {{ Form::text('valor', $servicio->valor, ['class' => 'form-control' . ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_serv') }}
            {{ Form::text('tipo_serv', $servicio->tipo_serv, ['class' => 'form-control' . ($errors->has('tipo_serv') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Serv']) }}
            {!! $errors->first('tipo_serv', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>