@extends('layouts.app')

@section('content')
    <h1>Welcome!</h1>

    @auth
        <p>You are logged in.</p>
    @else
        <p>Please <a href="{{ route('login') }}">log in</a> to access this page.</p>
    @endauth
@endsection