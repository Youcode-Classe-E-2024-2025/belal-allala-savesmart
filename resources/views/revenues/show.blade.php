@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-money-bill-wave text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">Revenue Details</h2>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">{{ $revenue->description }}</h5>
                        <p class="mb-1"><strong>Amount:</strong> ${{ number_format($revenue->amount, 2) }}</p>
                        <p class="mb-1"><strong>Date:</strong> {{ $revenue->date->format('M d, Y') }}</p>
                        <p class="mb-1"><strong>Category:</strong> {{ $revenue->category->name }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('revenues.edit', $revenue->id) }}" class="btn btn-primary py-2 fw-medium">
                            <i class="fas fa-edit me-2"></i> Edit Revenue
                        </a>
                        <form method="POST" action="{{ route('revenues.destroy', $revenue->id) }}" onsubmit="return confirm('Are you sure you want to delete this revenue?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger py-2 fw-medium w-100">
                                <i class="fas fa-trash-alt me-2"></i> Delete Revenue
                            </button>
                        </form>
                        <a href="{{ route('revenues.index') }}" class="btn btn-link text-muted">
                            <i class="fas fa-arrow-left me-2"></i> Back to Revenues
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection