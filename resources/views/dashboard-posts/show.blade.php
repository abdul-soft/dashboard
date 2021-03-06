@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">DashboardPost {{ $dashboardpost->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('dashboard-posts/' . $dashboardpost->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit DashboardPost"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['dashboardposts', $dashboardpost->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete DashboardPost',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $dashboardpost->id }}</td>
                                    </tr>
                                    <tr><th> Dashboard Id </th><td> {{ $dashboardpost->dashboard_id }} </td></tr>
                                    <tr><th> User </th><td> {{ $dashboardpost->user->name }} </td></tr>
                                    <tr><th> Title </th><td> {{ $dashboardpost->title }} </td></tr>
                                    <tr><th> Description </th><td> {{ $dashboardpost->description }} </td></tr>
                                    <tr><th> File </th><td> <a href="{{ $dashboardpost->file_url }}">{{ $dashboardpost->file_url }}</a> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection