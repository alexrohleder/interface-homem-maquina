<div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    {!! Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ano') ? 'has-error' : ''}}">
    {!! Form::label('ano', 'Ano', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ano', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('ano', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('data') ? 'has-error' : ''}}">
    {!! Form::label('data', 'Data', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('data', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ativo') ? 'has-error' : ''}}">
    {!! Form::label('ativo', 'Ativo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ativo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ativo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
