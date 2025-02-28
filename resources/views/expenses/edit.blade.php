@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-edit text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">Edit Expense</h2>
                        <p class="text-muted">Update the details of your expense</p>
                    </div>

                    <form method="POST" action="{{ route('expenses.update', $expense->id) }}" class="needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="description" class="form-label fw-medium">Description</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-pen text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('description') is-invalid @enderror" 
                                    id="description" name="description" value="{{ $expense->description }}" required autofocus>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="form-label fw-medium">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-dollar-sign text-muted"></i>
                                </span>
                                <input type="number" class="form-control border-start-0 ps-0 @error('amount') is-invalid @enderror" 
                                    id="amount" name="amount" step="0.01" value="{{ $expense->amount }}" required>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="date" class="form-label fw-medium">Date</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-calendar-alt text-muted"></i>
                                </span>
                                <input type="date" class="form-control border-start-0 ps-0 @error('date') is-invalid @enderror" 
                                    id="date" name="date" value="{{ $expense->date }}" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-medium">Category</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-folder text-muted"></i>
                                </span>
                                <select class="form-select border-start-0 ps-0 @error('category_id') is-invalid @enderror" 
                                    id="category_id" name="category_id" required>
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $expense->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-medium">
                                <i class="fas fa-save me-2"></i> Update Expense
                            </button>
                            <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-outline-secondary py-2 fw-medium">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <a href="{{ route('expenses.index') }}" class="btn btn-link text-muted">
                                <i class="fas fa-arrow-left me-2"></i> Back to Expenses
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap toasts
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        });
    });
</script>
@endsection