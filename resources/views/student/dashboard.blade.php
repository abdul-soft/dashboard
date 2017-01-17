@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts
                    <a class="btn btn-primary" href="{{ url('create_post') }}">Add Post</a>
                </div>

                <div class="panel-body">

                    @foreach($posts as $post)
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ $post->title }}</h2>
                                <h4>{{ $post->description }}</h4>
                                <a href="{{ $post->file_url }}">{{ $post->file_url }}</a>
                            </div>
                        </div>
                    @endforeach

                        <div class="pagination-wrapper"> {!! $posts->render() !!} </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
