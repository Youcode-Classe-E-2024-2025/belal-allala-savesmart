@extends('layouts.app')

@section('content')
    <h1>Manage Family: {{ $family->name }}</h1>

    <p>Family Members:</p>
    <ul>
        @foreach ($family->users as $user)
            <li>{{ $user->name }} ({{ $user->email }})
                @if(auth()->user()->families()->where('family_id', $family->id)->wherePivot('is_owner', true)->exists())
                    (Owner)
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Invite New Member</h2>
    <form method="POST" action="{{ route('families.generateInvitation', $family->id) }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <button type="submit">Send Invitation</button>
    </form>

    <form method="POST" action="{{ route('families.destroy', $family->id) }}" onsubmit="return confirm('Are you sure you want to delete this family?');">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Family</button>
    </form>
@endsection