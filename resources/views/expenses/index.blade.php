@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">
                            <i class="fas fa-file-invoice-dollar text-primary me-2"></i> My Expenses
                        </h2>
                        <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i> Add New Expense
                        </a>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Family Accounts</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($families as $family)
                                <a href="{{ route('expenses.create') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-users me-2"></i> {{$family->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if($expenses->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-receipt text-muted fa-3x mb-3"></i>
                            <p class="lead text-muted">No expenses found. Start by adding a new expense.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->description }}</td>
                                            <td>${{ number_format($expense->amount, 2) }}</td>
                                            <td>{{ $expense->date->format('M d, Y') }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
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