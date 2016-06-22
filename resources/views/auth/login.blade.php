@extends('public.master')

@section('title', 'Ash Davies - Web Developer from Huddersfield')

@section('content')

    <!-- Display Validation Errors -->
    @include('errors.notices')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-group">

        <div class="field-row">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field-row">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password">
        </div>

        <div class="field-row">
            <div class="checkbox">
                <label for="remember">Remember Me</label>
                <input type="checkbox" name="remember">
            </div>
        </div>

        <div class="clear">
            <a class="align-left" href="{{ url('/password/reset') }}">Forgot Your Password?</a>

            <button type="submit" class="btn align-right">
                <i class="fa fa-lock"></i> Login
            </button>
        </div>
    </div>


</form>

@endsection