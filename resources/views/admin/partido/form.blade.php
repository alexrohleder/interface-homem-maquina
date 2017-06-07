<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    {!! Form::label('numero', 'Numero', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('numero', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    {!! Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
