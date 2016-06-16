@extends('master')

@section('title', 'Blog - Ash Davies - Web Developer')

@section('content')

    <!-- Current Posts -->
    <section class="posts">
        @if ( !isset($single) )
            <h1>Latest Posts</h1>
        @endif

        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <article class="post">
                    @if ( isset($single) )
                        <h1>{{ $post->post_title }}</h1>
                    @else
                        <h2><a href="/post/{{ $post->post_slug }}">{{ $post->post_title }}</a></h2>
                    @endif
                    <time datetime="{{ $post->created_at }}">
                        Published: {{ $post->created_at }}
                        @if( $post->updated_at != $post->created_at)
                            - Last Edited: {{ $post->updated_at }}
                        @endif
                    </time>
                    @if ( isset($single) )
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
                    @else
                        <p>{{ $post->post_excerpt }}</p>
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
            @endforeach

            @if (count($posts) > 1)
                {!! $posts->links() !!}
            @endif
        @else
            <p>No posts available</p>
        @endif
    </section>
@endsection

