@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-edit text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">Edit Revenue</h2>
                        <p class="text-muted">Update your revenue record</p>
                    </div>

                    <form method="POST" action="{{ route('revenues.update', $revenue->id) }}" class="needs-validation">
                        @csrf
                        @  $revenue->id) }}" class="needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="description" class="form-label fw-medium">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" value="{{ $revenue->description }}" required autofocus>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="form-label fw-medium">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                                    id="amount" name="amount" step="0.01" value="{{ $revenue->amount }}" required>
                            </div>
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="date" class="form-label fw-medium">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" 
                                id="date" name="date" value="{{ $revenue->date }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-medium">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" 
                                id="category_id" name="category_id" required>
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $revenue->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-medium">
                                <i class="fas fa-save me-2"></i> Update Revenue
                            </button>
                            <a href="{{ route('revenues.show', $revenue->id) }}" class="btn btn-outline-secondary py-2 fw-medium">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <a href="{{ route('revenues.index') }}" class="btn btn-link text-muted">
                                <i class="fas fa-arrow-left me-2"></i> Back to Revenues
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection