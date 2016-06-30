@extends('admin.master')

@section('title', 'Create a new Post')

@section('content')

    <!-- New Task Form -->
    <h1>New {{ title_case($post_type) }}</h1>

    <form action="{{ action('AdminController@store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="post_type" value="{{ $post_type }}">
            <div class="field-row">
                <label for="post_title">{{ title_case($post_type) }} title</label>
                <input type="text" name="post_title" id="post_title">
            </div>
            <div class="field-row">
                <label for="post_excerpt">{{ title_case($post_type) }} excerpt</label>
                <textarea name="post_excerpt" id="post_excerpt" rows="3"></textarea>
            </div>
            <div class="field-row">
                <label for="post_content">{{ title_case($post_type) }} content</label>
                <textarea name="post_content" id="post_content" rows="10"></textarea>
            </div>
            <div class="clear">
                <button type="submit" class="btn align-right">
                    <i class="fa fa-plus"></i> Add {{ $post_type }}
                </button>
            </div>
        </div>
    </form>

@endsection
