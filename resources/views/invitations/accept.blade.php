@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Accept Invitation') }}</div>

                    <div class="card-body">
                        <p>You have been invited to join the family: {{ $family->name }}</p>
                        <p>Click the button below to accept the invitation.</p>

                        <form method="POST" action="{{ route('invitations.accept', $invitation->code) }}">
                            @csrf

                            <button type="submit" class="btn btn-primary">Accept Invitation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection