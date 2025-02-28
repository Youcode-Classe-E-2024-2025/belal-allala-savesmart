@extends('layouts.app')

@section('content')
    <h1>My Revenues</h1>

    <a href="{{ route('revenues.create') }}">Add New Revenue</a>
    <ul>
    @foreach($families as $family)
             <a href="{{ route('revenues.create') }}">   {{$family->name}}</a>
    @endforeach

    </ul>

    <ul>
        @foreach ($revenues as $revenue)
            <li>
                {{ $revenue->description }} - ${{ $revenue->amount }} - {{ $revenue->date }}
                <a href="{{ route('revenues.show', $revenue->id) }}">View</a>
                <a href="{{ route('revenues.edit', $revenue->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection