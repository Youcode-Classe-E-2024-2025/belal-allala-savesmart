@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">
                            <i class="fas fa-users text-primary me-2"></i> My Families
                        </h2>
                        <a href="{{ route('families.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i> Create New Family
                        </a>
                    </div>

                    @if($families->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-users text-muted fa-3x mb-3"></i>
                            <p class="lead text-muted">You haven't created or joined any families yet.</p>
                        </div>
                    @else
                        <div class="list-group">
                            @foreach ($families as $family)
                                <a href="{{ route('families.show', $family->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">{{ $family->name }}</h5>
                                        @if (auth()->user()->families()->where('family_id', $family->id)->wherePivot('is_owner', true)->exists())
                                            <span class="badge bg-primary">Owner</span>
                                        @endif
                                    </div>
                                    <i class="fas fa-chevron-right text-muted"></i>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection