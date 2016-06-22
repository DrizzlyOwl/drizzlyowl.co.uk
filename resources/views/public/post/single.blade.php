@extends('public.master')

@section('title', "{{ $post->post_title }} - Ash Davies - Web Developer")

@section('content')

    <!-- Current Post -->
    <section class="posts">
        <article class="post">
            <h1>{{ $post->post_title }}</h1>
            <time datetime="{{ $post->created_at }}">
                Published: {{ $post->created_at }}
                @if( $post->updated_at != $post->created_at)
                    - Last Edited: {{ $post->updated_at }}
                @endif
            </time>
            <p>{{ $post->post_excerpt }}</p>
            <p>{{ $post->post_content }}</p>

            @if ( count($comments) )

                <div class="comments">
                    <p>Comments</p>
                    @foreach ( $comments as $comment )
                        <blockquote>
                            {{ $comment->comment_body }}
                            - {{ $comment->time_diff }}
                        </blockquote>
                    @endforeach
                </div>

            @endif

            @if ( Auth::user() )
                <div class="post__meta">
                    <a href="{{ url('edit') . '/' . $post->post_slug }}" class="btn--reset"><i class="fa fa-fw fa-edit"></i></a>
                    <form action="{{ url('delete/' . $post->id) }}" method="POST" class="inline-form">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn--link btn--reset">
                            <i class="fa fa-fw fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endif

        </article>
    </section>
@endsection

