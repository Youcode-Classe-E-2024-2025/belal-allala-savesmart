@extends('layouts.app')

@section('content')
    <h1>Login</h1>

    @if ($errors->any())
        <div>
            <strong>Whoops! Something went wrong.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="remember">Remember Me:</label>
            <input type="checkbox" id="remember" name="remember">
        </div>

        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Register</a>
@endsection