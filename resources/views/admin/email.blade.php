@component('mail::message')

Hello!<br>
    
You have a new review.<br>
<strong>Name</strong>: {{$review->name}}.<br>
<strong>Description</strong>: {{$review->description}}.<br>

@component('mail::button', ['url' =>  route('review.permit.mail', $review->id) , 'color' => 'green'])
Permits on
@endcomponent

@component('mail::button', ['url' => route('review.delete.mail', $review->id), 'color' => 'red'])
Delete Review
@endcomponent


Thanks,<br>
{{$review->name}}
@endcomponent
