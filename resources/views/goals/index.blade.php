@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">
                            <i class="fas fa-bullseye text-primary me-2"></i> My Goals
                        </h2>
                        <a href="{{ route('goals.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i> Add New Goal
                        </a>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Family Accounts</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($families as $family)
                                <a href="{{ route('goals.create') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-users me-2"></i> {{$family->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if($goals->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-bullseye text-muted fa-3x mb-3"></i>
                            <p class="lead text-muted">You haven't set any goals yet. Start by adding a new goal.</p>
                        </div>
                    @else
                        <div class="list-group">
                            @foreach ($goals as $goal)
                                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">{{ $goal->description }}</h5>
                                        <p class="mb-1 text-muted">Target: ${{ number_format($goal->target_amount, 2) }} | Deadline: {{ $goal->deadline }}</p>
                                        <div class="progress" style="height: 5px; width: 200px;">
                                            <div class="progress-bar" role="progressbar" style="width: {{ ($goal->current_amount / $goal->target_amount) * 100 }}%;" aria-valuenow="{{ ($goal->current_amount / $goal->target_amount) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('goals.show', $goal->id) }}" class="btn btn-sm btn-outline-primary me-2">View</a>
                                        <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection