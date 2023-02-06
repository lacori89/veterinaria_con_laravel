<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="mb-3">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $citum->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-3">
            {{ Form::label('mascota_id') }}
            {{ Form::select('mascota_id', $mascota, $citum->mascota_id, ['class' => 'form-control' . ($errors->has('mascota_id') ? ' is-invalid' : ''), 'placeholder' => 'Mascota Id']) }}
            {!! $errors->first('mascota_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>