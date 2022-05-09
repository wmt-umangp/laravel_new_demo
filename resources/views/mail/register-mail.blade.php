@component('mail::message')
# Successfully Registered

Hello,{{$user->name}} You have successfully registered on our portal



Thanks,<br>
{{ config('app.name') }}
@endcomponent
