@component('mail::message')
 Hello!  <br>

 You have a new review form {{ $review->name }}. <br>
 {{ $review->review }}. <br>

@component('mail::button', ['url' => '' ,  'class' => 'green'])
Save Review

@component('mail::button', ['url' => '' , 'class' => 'red'])
Delete Review
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
