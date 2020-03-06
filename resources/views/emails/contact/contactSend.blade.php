@component('mail::message')

<!-- Message conent here -->
 {{ $data['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
