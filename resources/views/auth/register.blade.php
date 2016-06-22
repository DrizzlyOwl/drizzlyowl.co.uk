@extends('public.master')

@section('title', 'Ash Davies - Web Developer from Huddersfield')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group">

            <div class="field-row">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="field-row">
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="field-row">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
            </div>

            <div class="field-row">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>

            <div class="clear">
                <button type="submit" class="btn align-right">
                    <i class="fa fa-lock"></i> Register
                </button>
            </div>
        </div>

    </form>

@endsection