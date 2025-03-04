@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">
                            <i class="fas fa-money-bill-wave text-primary me-2"></i> My Revenues
                        </h2>
                        <a href="{{ route('revenues.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i> Add New Revenue
                        </a>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Family Accounts</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($families as $family)
                                <a href="{{ route('revenues.create') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-users me-2"></i> {{$family->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if($revenues->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-money-bill-wave text-muted fa-3x mb-3"></i>
                            <p class="lead text-muted">You haven't recorded any revenues yet. Start by adding a new revenue.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Category</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revenues as $revenue)
                                        <tr>
                                            <td>{{ $revenue->description }}</td>
                                            <td>${{ number_format($revenue->amount, 2) }}</td>
                                            <td>{{ $revenue->date->format('M d, Y') }}</td>
                                            <td>{{ $revenue->category->name }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('revenues.show', $revenue->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a href="{{ route('revenues.edit', $revenue->id) }}" class="btn btn-sm btn-outline-secondary">
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
@endsection