@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboardposts</div>
                    <div class="panel-body">

                        <a href="{{ url('/dashboard-posts/create') }}" class="btn btn-primary btn-xs" title="Add New DashboardPost"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Dashboard Id </th><th> User Id </th><th> Title </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dashboardposts as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->dashboard_id }}</td><td>{{ $item->user_id }}</td><td>{{ $item->title }}</td>
                                        <td>
                                            <a href="{{ url('/dashboard-posts/' . $item->id) }}" class="btn btn-success btn-xs" title="View DashboardPost"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/dashboard-posts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit DashboardPost"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/dashboard-posts', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete DashboardPost" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete DashboardPost',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $dashboardposts->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection