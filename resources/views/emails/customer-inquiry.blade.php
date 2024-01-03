@component('mail::message')
## New Inquiry!
<br>

{{ 'You have received a new inquiry.' }}
<br>

{{ __('From:') }}
{{ __($inquiry->name) }}<br>
Email: [{{ $inquiry->email }}](mailto:{{ $inquiry->email }})<br>


{{ __('Message:') }}<br>
{{ __($inquiry->message) }}
<br>
<br>
<br>

{{ __('If you did not expect to receive an invitation to this team, you may discard this email.') }}
@endcomponent
