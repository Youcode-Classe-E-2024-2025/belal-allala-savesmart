@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-4">
                        <i class="fas fa-users-cog text-primary me-2"></i> Manage Family: {{ $family->name }}
                    </h2>

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
                                @if(auth()->user()->families()->where('family_id', $family->id)->wherePivot('is_owner', true)->exists() && !$user->pivot->is_owner)
                                    <button class="btn btn-sm btn-outline-danger">Remove</button>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                    <h5 class="mb-3">Invite New Member</h5>
                    <form method="POST" action="{{ route('families.generateInvitation', $family->id) }}" class="mb-4">
                        @csrf
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i> Send Invitation
                            </button>
                        </div>
                    </form>

                    @if(auth()->user()->families()->where('family_id', $family->id)->wherePivot('is_owner', true)->exists())
                        <form method="POST" action="{{ route('families.destroy', $family->id) }}" onsubmit="return confirm('Are you sure you want to delete this family? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt me-2"></i> Delete Family
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection