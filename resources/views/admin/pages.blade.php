@extends('admin.master')

@section('title', 'Admin - Pages')

@section('content')

    <h1>Pages</h1>

    <table class="table table--striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Post title</th>
            <th>Created at</th>
            <th>Last Modified</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @if ( count($posts) )
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="{{ url('admin/edit/' . $post->post_slug) }}">{{ $post->post_title }}</a></td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <form action="{{ url('admin/delete/' . $post->id) }}" method="POST" class="inline-form">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn--link btn--reset">
                                <i class="fa fa-fw fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No pages found</td>
            </tr>
        @endif
        </tbody>
    </table>

    <a href="{{ action('AdminController@create', ['post_type' => 'page']) }}" class="btn">Create</a>

@endsection
