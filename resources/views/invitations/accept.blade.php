@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-envelope-open-text text-primary fs-1 mb-3"></i>
                        <h2 class="fw-bold">{{ __('Accept Invitation') }}</h2>
                        <p class="text-muted">Join the family account and start managing finances together</p>
                    </div>

                    <p class="mb-4">You have been invited to join the family: <strong>{{ $family->name }}</strong></p>

                    <form method="POST" action="{{ route('invitations.accept', $invitation->code) }}">
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 fw-medium">
                                <i class="fas fa-check-circle me-2"></i> Accept Invitation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection