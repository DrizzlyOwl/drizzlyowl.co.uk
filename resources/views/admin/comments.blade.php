@extends('admin.master')

@section('title', 'Admin - Comments')

@section('content')

    <h1>Comments</h1>

    <table class="table table--striped table--vatop">
        <thead>
        <tr>
            <th>ID</th>
            <th>Post title</th>
            <th>Comments</th>
        </tr>
        </thead>
        <tbody>
        @if ( count($posts) )
            @foreach( $posts as $key => $post )
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $post["post_title"] }}</td>
                    <td>
                        @if ( count($post["comments"]) )
                            <ol>
                                @foreach ( $post["comments"] as $comment )
                                    <li>{{ str_limit($comment["body"], 100, '...') }}</li>
                                @endforeach
                            </ol>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">No comments found</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
