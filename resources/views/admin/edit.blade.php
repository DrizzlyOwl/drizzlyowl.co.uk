@extends('admin.master')

@section('title', 'Edit Post: ' . $post->post_title)

@section('content')

    <!-- New Task Form -->
    <h1>Edit Post</h1>

    <form action="{{ url('admin/update/' . $post->post_slug) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <div class="field-row">
                <label for="post_title">Post title</label>
                <input type="text" name="post_title" id="post_title" value="{{ $post->post_title }}">
            </div>
            <div class="field-row">
                <label for="post_excerpt">Post excerpt</label>
                <textarea name="post_excerpt" id="post_excerpt" rows="3" >{{ $post->post_excerpt }}</textarea>
            </div>
            <div class="field-row">
                <label for="post_content">Post content</label>
                <textarea name="post_content" id="post_content" rows="10" >{{ $post->post_content }}</textarea>
            </div>
            <div class="clear">
                <button type="submit" class="btn align-right">
                    <i class="fa fa-edit"></i> Update Post
                </button>
            </div>
        </div>
    </form>

@endsection