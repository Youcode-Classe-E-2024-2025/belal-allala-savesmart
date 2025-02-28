@extends('layouts.app')

@section('content')
    <h1>Goal Details</h1>

    <p><strong>Description:</strong> {{ $goal->description }}</p>
    <p><strong>Target Amount:</strong> ${{ $goal->target_amount }}</p>
    <p><strong>Current Amount:</strong> ${{ $goal->current_amount }}</p>
    <p><strong>Deadline:</strong> {{ $goal->deadline }}</p>

    <a href="{{ route('goals.edit', $goal->id) }}">Edit</a>
    <a href="{{ route('goals.index') }}">Back to Goals</a>

    <form method="POST" action="{{ route('goals.destroy', $goal->id) }}" onsubmit="return confirm('Are you sure you want to delete this goal?');">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Goal</button>
    </form>
@endsection