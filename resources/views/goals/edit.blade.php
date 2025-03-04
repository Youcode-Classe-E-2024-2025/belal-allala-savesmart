@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-edit text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">Edit Goal</h2>
                        <p class="text-muted">Update your financial goal</p>
                    </div>

                    <form method="POST" action="{{ route('goals.update', $goal->id) }}" class="needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="description" class="form-label fw-medium">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" value="{{ $goal->description }}" required autofocus>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="target_amount" class="form-label fw-medium">Target Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control @error('target_amount') is-invalid @enderror" 
                                    id="target_amount" name="target_amount" step="0.01" value="{{ $goal->target_amount }}" required>
                            </div>
                            @error('target_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="current_amount" class="form-label fw-medium">Current Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control @error('current_amount') is-invalid @enderror" 
                                    id="current_amount" name="current_amount" step="0.01" value="{{ $goal->current_amount }}">
                            </div>
                            @error('current_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deadline" class="form-label fw-medium">Deadline</label>
                            <input type="date" class="form-control @error('deadline') is-invalid @enderror" 
                                id="deadline" name="deadline" value="{{ $goal->deadline }}" required>
                            @error('deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-medium">
                                <i class="fas fa-save me-2"></i> Update Goal
                            </button>
                            <a href="{{ route('goals.show', $goal->id) }}" class="btn btn-outline-secondary py-2 fw-medium">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <a href="{{ route('goals.index') }}" class="btn btn-link text-muted">
                                <i class="fas fa-arrow-left me-2"></i> Back to Goals
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection