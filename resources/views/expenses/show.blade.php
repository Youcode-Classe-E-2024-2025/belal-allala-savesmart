@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-file-invoice-dollar text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">Expense Details</h2>
                    </div>

                    <div class="mb-4">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="bg-light rounded p-3">
                                    <h6 class="fw-bold mb-1">Description</h6>
                                    <p class="mb-0">{{ $expense->description }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bg-light rounded p-3">
                                    <h6 class="fw-bold mb-1">Amount</h6>
                                    <p class="mb-0 text-primary fw-bold">${{ number_format($expense->amount, 2) }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bg-light rounded p-3">
                                    <h6 class="fw-bold mb-1">Date</h6>
                                    <p class="mb-0">{{ $expense->date->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bg-light rounded p-3">
                                    <h6 class="fw-bold mb-1">Category</h6>
                                    <p class="mb-0">
                                        <span class="badge bg-secondary">{{ $expense->category->name }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('expenses.destroy', $expense->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this expense?');">
                                <i class="fas fa-trash-alt me-2"></i> Delete
                            </button>
                        </form>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('expenses.index') }}" class="btn btn-link text-muted">
                            <i class="fas fa-arrow-left me-2"></i> Back to Expenses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <i class="fas fa-check-circle me-2"></i>
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
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