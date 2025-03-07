@extends('layouts.app')

@section('content')
    <h1>Budget Optimization Results</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <ul>
        <li><strong>Needs:</strong> ${{ number_format($result['needs'], 2) }}</li>
        <li><strong>Wants:</strong> ${{ number_format($result['wants'], 2) }}</li>
        <li><strong>Savings:</strong> ${{ number_format($result['savings'], 2) }}</li>
    </ul>
@endsection