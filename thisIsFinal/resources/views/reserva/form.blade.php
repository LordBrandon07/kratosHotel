<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Cant. adultos') }}
            {{ Form::select('adultos', range(0, 8), $reserva->adultos, ['class' => 'form-control' . ($errors->has('adultos') ? ' is-invalid' : '')]) }}
            {!! $errors->first('adultos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cant. ninos') }}
            {{ Form::select('ninos', range(0, 8), $reserva->ninos, ['class' => 'form-control' . ($errors->has('ninos') ? ' is-invalid' : '')]) }}
            {!! $errors->first('ninos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $reserva->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">La fecha seleccionada ya no esta disponible</div>') !!}
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
    @auth
    @if (auth()->user()->id_rol==1 || auth()->user()->id_rol==2)
        <div class="form-group">
            {{ Form::label('documento') }}
            {{ Form::select('documento', $user, $reserva->documento, ['class' => 'form-control' . ($errors->has('documento') ? ' is-invalid' : '')]) }}
            {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    @elseif (auth()->user()->id_rol==3)
        {{form::hidden('documento', $reserva->documento ?? auth()->user()->documento)}}
    @endif
    @endauth
        <div class="form-group">
            {{ Form::label('nro_hab') }}
            {{ Form::select('nro_hab', $nro_hab, $reserva->nro_hab, ['class' => 'form-control' . ($errors->has('nro_hab') ? ' is-invalid' : '')]) }}
            {!! $errors->first('nro_hab', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{form::hidden('est_id', $reserva->est_id ?? '2')}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn pepe">{{ __('Confirmar') }}</button>
    </div>
</div>