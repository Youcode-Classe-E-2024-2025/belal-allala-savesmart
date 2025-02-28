@extends('layouts.app')

@section('content')
    <h1>Revenue Details</h1>

    <p><strong>Description:</strong> {{ $revenue->description }}</p>
    <p><strong>Amount:</strong> ${{ $revenue->amount }}</p>
    <p><strong>Date:</strong> {{ $revenue->date }}</p>
    <p><strong>Category:</strong> {{ $revenue->category->name }}</p>

    <a href="{{ route('revenues.edit', $revenue->id) }}">Edit</a>
    <a href="{{ route('revenues.index') }}">Back to Revenues</a>

    <form method="POST" action="{{ route('revenues.destroy', $revenue->id) }}" onsubmit="return confirm('Are you sure you want to delete this revenue?');">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Revenue</button>
    </form>
@endsection