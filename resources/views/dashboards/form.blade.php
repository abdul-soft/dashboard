<div class="form-group {{ $errors->has('class_id') ? 'has-error' : ''}}">
    {!! Form::label('class_id', 'Class', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('class_id', $classes, null, ['class' => 'form-control']) !!}
        {!! $errors->first('class_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('session_id') ? 'has-error' : ''}}">
    {!! Form::label('session_id', 'Session', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('session_id', $sessions, null, ['class' => 'form-control']) !!}
        {!! $errors->first('session_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>