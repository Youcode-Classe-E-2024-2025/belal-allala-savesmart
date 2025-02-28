@extends('layouts.app')

@section('content')
    <h1>Edit Goal</h1>

    <form method="POST" action="{{ route('goals.update', $goal->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{ $goal->description }}" required>
        </div>

        <div>
            <label for="target_amount">Target Amount:</label>
            <input type="number" id="target_amount" name="target_amount" step="0.01" value="{{ $goal->target_amount }}" required>
        </div>

        <div>
            <label for="current_amount">Current Amount:</label>
            <input type="number" id="current_amount" name="current_amount" step="0.01" value="{{ $goal->current_amount }}">
        </div>

        <div>
            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" value="{{ $goal->deadline }}" required>
        </div>

        <button type="submit">Update Goal</button>
    </form>

    <a href="{{ route('goals.show', $goal->id) }}">Cancel</a>
    <a href="{{ route('goals.index') }}">Back to Goals</a>
@endsection