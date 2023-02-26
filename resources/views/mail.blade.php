
@component('mail::message')

<h4>{{ $details['title'] }}</h4>

<p>{{ $details['body'] }}</p>
{{-- @component('mail::button', ['url' => $details['url']]) --}}
{{-- Verify --}}
{{-- @endcomponent --}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent