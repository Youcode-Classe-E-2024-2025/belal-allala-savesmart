@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-users text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">Create New Family</h2>
                        <p class="text-muted">Set up a new family account to manage expenses together</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <div class="d-flex">
                                <i class="fas fa-exclamation-circle me-2 mt-1"></i>
                                <div>
                                    <strong>Whoops! Something went wrong.</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('families.store') }}" class="needs-validation">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-medium">Family Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-home text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" 
                                    id="name" name="name" required autofocus
                                    placeholder="e.g., The Smiths">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-medium">
                                <i class="fas fa-plus-circle me-2"></i> Create Family
                            </button>
                            <a href="{{ route('families.index') }}" class="btn btn-outline-secondary py-2 fw-medium">
                                <i class="fas fa-arrow-left me-2"></i> Back to Families
                            </a>
                        </div>
                    </form>
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
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        });
    });
</script>
@endsection