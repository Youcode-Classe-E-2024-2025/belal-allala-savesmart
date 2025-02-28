@component('mail::message')
# Invitation to join {{ $invitation->family->name }}

You have been invited to join the family account {{ $invitation->family->name }}.

Click the button below to accept the invitation:

@component('mail::button', ['url' => route('invitations.accept', $invitation->code)])
Accept Invitation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent