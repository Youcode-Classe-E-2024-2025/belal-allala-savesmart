@component('mail::message')
# Welcome to SaveSmart, {{ $name }}!

Thanks for registering on SaveSmart. We're excited to help you manage your finances and achieve your goals.

@component('mail::button', ['url' => config('app.url')])
Get Started
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent