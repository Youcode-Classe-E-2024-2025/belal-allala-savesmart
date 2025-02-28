@extends('layouts.app')

@section('content')
    <h1>Add New Revenue</h1>

    <form method="POST" action="{{ route('revenues.store') }}">
        @csrf

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>

        <div>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" required>
        </div>

        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Add Revenue</button>
    </form>

    <a href="{{ route('revenues.index') }}">Back to Revenues</a>
@endsection