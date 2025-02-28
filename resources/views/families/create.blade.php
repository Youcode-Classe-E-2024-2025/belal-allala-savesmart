@extends('layouts.app')

@section('content')
    <h1>Create New Family</h1>

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

    <form method="POST" action="{{ route('families.store') }}">
        @csrf

        <div>
            <label for="name">Family Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <button type="submit">Create Family</button>
    </form>
@endsection