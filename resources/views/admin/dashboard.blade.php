@extends('admin.master')

@section('title', 'Admin - Dashboard')

@section('content')

    <div class="grid">
        <div class="span--1-1">
            <h1>Dashboard</h1>
            <p>{{ count($posts["post"]) }} Posts, {{ count($posts["page"]) }} Pages, and {{ $comment_count }} Comments.</p>
        </div>
        <div class="span--1-2">
            <h2>Posts</h2>
            <ul class="list list--reset">
                @if ( $posts["post"] )
                    @foreach ( $posts["post"] as $post )
                        <li><a href="{{ url('admin/edit/' . $post["post_slug"]) }}">{{ $post["post_title"] }}</a></li>
                    @endforeach
                @else
                    <li><p>No posts found</p></li>
                @endif
            </ul>
        </div>
        <div class="span--1-2">
            <h2>Pages</h2>
            <ul class="list list--reset">
                @if ( $posts["page"] )
                    @foreach ( $posts["page"] as $post )
                        <li><a href="{{ url('admin/edit/' . $post["post_slug"]) }}">{{ $post["post_title"] }}</a></li>
                    @endforeach
                @else
                    <li><p>No pages found</p></li>
                @endif
            </ul>
        </div>
    </div>
@endsection
