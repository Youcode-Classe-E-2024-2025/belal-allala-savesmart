@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">
                            <i class="fas fa-users text-primary me-2"></i> {{ $family->name }}
                        </h2>
                        <a href="{{ route('families.manage', $family->id) }}" class="btn btn-primary">
                            <i class="fas fa-cog me-2"></i> Manage Family
                        </a>
                    </div>

                    <h5 class="mb-3">Family Members:</h5>
                    <ul class="list-group mb-4">
                        @foreach ($family->users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $user->name }} <span class="text-muted">({{ $user->email }})</span>
                                    @if($user->pivot->is_owner)
                                        <span class="badge bg-primary ms-2">Owner</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- You can add more family-related information or features here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection