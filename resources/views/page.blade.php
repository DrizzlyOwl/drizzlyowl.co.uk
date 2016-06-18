@extends('master')

@section("title", "{{ $page->post_title }} - Ash Davies - Web Developer")

@section('content')

    <!-- Current Page -->
    {{--<section class="page">--}}
        {{--<h1>{{ $page->title() }}</h1>--}}

        {{--<p>{{ $page->post_excerpt }}</p>--}}
        {{--<p>{{ $page->post_content }}</p>--}}
    {{--</section>--}}

    <section class="page">
        <h1>Hello World.</h1>
    </section>
@endsection

