<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="mb-3">
            {{ Form::label('responsable_id') }}
            {{ Form::select('responsable_id', $cliente, $mascotum->responsable_id, ['class' => 'form-control' . ($errors->has('responsable_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Responsable de la Mascota']) }}
            {!! $errors->first('responsable_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="mb-3">
            {{ Form::label('identificacion') }}
            {{ Form::text('identificacion', $mascotum->identificacion, ['class' => 'form-control' . ($errors->has('identificacion') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion de la mascota']) }}
            {!! $errors->first('identificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $mascotum->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el Nombre de la mascota']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="mb-3">
            {{ Form::label('tipomascota_id') }}
            {{ Form::select('tipomascota_id', $tipo, $mascotum->tipomascota_id, ['class' => 'form-control' . ($errors->has('tipomascota_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Tipo de mascota']) }}
            {!! $errors->first('tipomascota_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>