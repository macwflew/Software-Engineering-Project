@component('mail::message')
## New Order!
<br>

{{ 'A new order has been created.' }}
<br>

{{ __('Order ID:') }}
{{ __($order->id) }}<br>
<br>
<br>
<br>

{{ __('If you did not expect to receive an invitation to this team, you may discard this email.') }}
@endcomponent
