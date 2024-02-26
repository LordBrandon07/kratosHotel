<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cant_hab') }}
            {{ Form::text('cant_hab', $reserva->cant_hab, ['class' => 'form-control' . ($errors->has('cant_hab') ? ' is-invalid' : ''), 'placeholder' => 'Cant Hab']) }}
            {!! $errors->first('cant_hab', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('adultos') }}
            {{ Form::text('adultos', $reserva->adultos, ['class' => 'form-control' . ($errors->has('adultos') ? ' is-invalid' : ''), 'placeholder' => 'Adultos']) }}
            {!! $errors->first('adultos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ninos') }}
            {{ Form::text('ninos', $reserva->ninos, ['class' => 'form-control' . ($errors->has('ninos') ? ' is-invalid' : ''), 'placeholder' => 'Ninos']) }}
            {!! $errors->first('ninos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $reserva->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_final') }}
            {{ Form::date('fecha_final', $reserva->fecha_final, ['class' => 'form-control' . ($errors->has('fecha_final') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_final', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valor') }}
            {{ Form::text('valor', $reserva->valor, ['class' => 'form-control' . ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('documento') }}
            {{ Form::text('documento', $reserva->documento, ['class' => 'form-control' . ($errors->has('documento') ? ' is-invalid' : ''), 'placeholder' => 'Documento']) }}
            {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('est_id') }}
            {{ Form::text('est_id', $reserva->est_id, ['class' => 'form-control' . ($errors->has('est_id') ? ' is-invalid' : ''), 'placeholder' => 'Est Id']) }}
            {!! $errors->first('est_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>