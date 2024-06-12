<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('Nombre', $eventos->Nombre, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('Descripcion', $eventos->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::date('Fecha', $eventos->Fecha, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : '')]) }}
            {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Hora') }}
            {{ Form::time('Hora', $eventos->Hora, ['class' => 'form-control' . ($errors->has('Hora') ? ' is-invalid' : '')]) }}
            {!! $errors->first('Hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-info">{{ __('Guardar') }}</button>
    </div>
</div>
