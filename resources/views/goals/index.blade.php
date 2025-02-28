@extends('layouts.app')

@section('content')
    <h1>My Goals</h1>

    <a href="{{ route('goals.create') }}">Add New Goal</a>
       <ul>
    @foreach($families as $family)
             <a href="{{ route('goals.create') }}">   {{$family->name}}</a>
    @endforeach

    </ul>

    <ul>
        @foreach ($goals as $goal)
            <li>
                {{ $goal->description }} - ${{ $goal->target_amount }} - {{ $goal->deadline }}
                <a href="{{ route('goals.show', $goal->id) }}">View</a>
                <a href="{{ route('goals.edit', $goal->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection