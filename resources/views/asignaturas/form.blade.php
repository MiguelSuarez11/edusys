<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $asignatura->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nomenclatura') }}
            {{ Form::text('nomenclatura', $asignatura->nomenclatura, ['class' => 'form-control' . ($errors->has('nomenclatura') ? ' is-invalid' : ''), 'placeholder' => 'Nomenclatura']) }}
            {!! $errors->first('nomenclatura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-info">{{ __('Guardar') }}</button>
    </div>
</div>