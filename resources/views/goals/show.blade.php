@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-bullseye text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">Goal Details</h2>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">{{ $goal->description }}</h5>
                        <div class="progress mb-3" style="height: 20px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ ($goal->current_amount / $goal->target_amount) * 100 }}%;" aria-valuenow="{{ ($goal->current_amount / $goal->target_amount) * 100 }}" aria-valuemin="0" aria-valuemax="100">
                                {{ number_format(($goal->current_amount / $goal->target_amount) * 100, 0) }}%
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-muted">
                            <span>Current: ${{ number_format($goal->current_amount, 2) }}</span>
                            <span>Target: ${{ number_format($goal->target_amount, 2) }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p><strong>Deadline:</strong> {{ $goal->deadline }}</p>
                        <p><strong>Days Remaining:</strong> {{ now()->diffInDays($goal->deadline) }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-primary py-2 fw-medium">
                            <i class="fas fa-edit me-2"></i> Edit Goal
                        </a>
                        <form method="POST" action="{{ route('goals.destroy', $goal->id) }}" onsubmit="return confirm('Are you sure you want to delete this goal?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger py-2 fw-medium w-100">
                                <i class="fas fa-trash-alt me-2"></i> Delete Goal
                            </button>
                        </form>
                        <a href="{{ route('goals.index') }}" class="btn btn-link text-muted">
                            <i class="fas fa-arrow-left me-2"></i> Back to Goals
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection