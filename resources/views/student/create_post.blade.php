@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New DashboardPost</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/create_post', 'class' => 'form-horizontal', 'files' => true]) !!}

                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                                {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div><div class="form-group {{ $errors->has('file_url') ? 'has-error' : ''}}">
                                {!! Form::label('file_url', 'File Url', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::file('file_url', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('file_url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection