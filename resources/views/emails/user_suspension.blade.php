@component('mail::message')
Hi,
{{ $user->name }}

Your Account is suspended by the admin.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
