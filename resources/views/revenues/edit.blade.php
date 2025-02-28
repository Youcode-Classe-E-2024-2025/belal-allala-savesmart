@extends('layouts.app')

@section('content')
    <h1>Edit Revenue</h1>

    <form method="POST" action="{{ route('revenues.update', $revenue->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{ $revenue->description }}" required>
        </div>

        <div>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" value="{{ $revenue->amount }}" required>
        </div>

        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $revenue->date }}" required>
        </div>

        <div>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="{{ $revenue->category }}">
        </div>

        <button type="submit">Update Revenue</button>
    </form>

    <a href="{{ route('revenues.show', $revenue->id) }}">Cancel</a>
@endsection