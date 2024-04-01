<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('factura_id') }}
            {{ Form::select('factura_id', $factura, $detalleFactura->factura_id, ['class' => 'form-control' . ($errors->has('factura_id') ? ' is-invalid' : ''), 'placeholder' => 'Factura Id']) }}
            {!! $errors->first('factura_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('servicio_id') }}
            {{ Form::select('servicio_id', $servicio, $detalleFactura->servicio_id, ['class' => 'form-control' . ($errors->has('servicio_id') ? ' is-invalid' : ''), 'placeholder' => 'Servicio Id']) }}
            {!! $errors->first('servicio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $detalleFactura->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn pepe">{{ __('Confirmar') }}</button>
    </div>
</div>