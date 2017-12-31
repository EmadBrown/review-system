@extends('welcome')

@section('content')

<div class="columns">
      <div class="column is-12">
              <a  href="{{ route('review.add') }}" class="button is-primary is-block is-alt is-large column is-3">Add Review</a>
      </div>
</div>
<div id='app'>
    <reviews-permit></reviews-permit>
   </div>
 
@endsection
 
