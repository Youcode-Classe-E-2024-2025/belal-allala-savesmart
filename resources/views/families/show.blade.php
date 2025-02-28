@extends('layouts.app')

@section('content')
    <h1>{{ $family->name }}</h1>

    <p>Family Members:</p>
    <ul>
        @foreach ($family->users as $user)
            <li>{{ $user->name }} ({{ $user->email }})
                 @if($user->pivot->is_owner)
                    (Owner)
                @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('families.manage', $family->id) }}">Manage Family</a>
@endsection