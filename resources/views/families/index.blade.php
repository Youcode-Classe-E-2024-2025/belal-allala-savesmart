@extends('layouts.app')

@section('content')
    <h1>My Families</h1>

    <ul>
        @foreach ($families as $family)
            <li>
                <a href="{{ route('families.show', $family->id) }}">{{ $family->name }}</a>
                 @if (auth()->user()->families()->where('family_id', $family->id)->wherePivot('is_owner', true)->exists())
                (Owner)
                  @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('families.create') }}">Create New Family</a>
@endsection