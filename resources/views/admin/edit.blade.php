@extends('admin.master')

@section('title', 'Edit Post: ' . $post->post_title)

@section('content')

    <!-- New Task Form -->
    <h1>Edit {{ title_case($post->post_type) }}</h1>

    <form action="{{ url('admin/update/' . $post->post_slug) }}" method="POST" class="">
        {{ csrf_field() }}

        <div class="form-group">
            <div class="field-row">
                <label for="post_title" class="hidden">{{ title_case($post->post_type) }} title</label>
                <input type="text" name="post_title" id="post_title" placeholder="Post title" required value="{{ $post->post_title }}">
            </div>
            <div class="field-row">
                <label for="post_excerpt" class="hidden">{{ title_case($post->post_type) }} excerpt</label>
                <textarea name="post_excerpt" id="post_excerpt" rows="3" placeholder="Post excerpt">{{ $post->post_excerpt }}</textarea>
            </div>
            <div class="field-row">
                <label for="post_content" class="hidden">{{ title_case($post->post_type) }} content</label>
                <textarea name="post_content" id="post_content" rows="10" placeholder="Post content">{{ $post->post_content }}</textarea>
            </div>
            <div class="clear">
                <button type="submit" class="btn align-right">
                    <i class="fa fa-edit"></i> Update {{ $post->post_type }}
                </button>
            </div>
        </div>
    </form>

@endsection
