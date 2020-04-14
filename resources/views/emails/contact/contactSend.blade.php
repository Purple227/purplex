@component('mail::message')

<!-- Message conent here -->
 {{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}

@endcomponent
