@extends('public.master')

@section('title', 'Archive - Ash Davies - Web Developer')

@section('content')

    <!-- Current Posts -->
    <section class="posts">
        <h1>Latest Posts</h1>

        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <article class="post">
                    <h2><a href="/blog/{{ $post->post_slug }}">{{ $post->post_title }}</a></h2>
                    <time datetime="{{ $post->created_at }}">
                        Published: {{ $post->created_at }}
                        @if( $post->updated_at != $post->created_at)
                            - Last Edited: {{ $post->updated_at }}
                        @endif
                    </time>

                    <p>{{ $post->post_excerpt }}</p>

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

