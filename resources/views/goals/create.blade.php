@extends('layouts.app')

@section('content')
    <h1>Add New Goal</h1>

    <form method="POST" action="{{ route('goals.store') }}">
        @csrf

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>

        <div>
            <label for="target_amount">Target Amount:</label>
            <input type="number" id="target_amount" name="target_amount" step="0.01" required>
        </div>

        <div>
            <label for="current_amount">Current Amount:</label>
            <input type="number" id="current_amount" name="current_amount" step="0.01" value="0">
        </div>

        <div>
            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" required>
        </div>

        <button type="submit">Add Goal</button>
    </form>

    <a href="{{ route('goals.index') }}">Back to Goals</a>
@endsection