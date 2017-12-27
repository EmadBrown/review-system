@extends('welcome')

@section('content')

<div class="columns">
      <div class="column is-12">
              <a  href="{{ route('review.add') }}" class="button is-primary is-block is-alt is-large column is-3">Add Review</a>
      </div>
</div>
<div id='app'>
 @foreach ($reviews as $review )
   <div class="column is-12">
           <div class="box content">
             <article class="post">
                 <h4><strong>{{$review->name}}:</strong> {{$review->description}}</h4>
               <div class="media">
                 <div class="media-left">
                   <p class="image is-32x32">
                     <img src="http://bulma.io/images/placeholders/128x128.png">
                   </p>
                 </div>
                 <div class="media-content">
                   <div class="content">
                       <p>
                       <a href="#">@star</a>
                                                      <star-rating :show-rating="false"  :rating="{{$review->rating}}" :star-size="30" ></star-rating>
                       <span class="tag">Rating</span>
                     </p>
                   </div>
                 </div>
               </div>
             </article>
           </div>
   </div>
 @endforeach
   </div>
  
<!-- Pagination -->
 <pagination v-bind:pagedata="tagsData" v-on:page-clicked="getTagsList"></pagination>
    <nav class="is-centered" role="navigation" aria-label="pagination">
        <a  href="{{$reviews->previousPageUrl()}}" class="pagination-previous">Previous</a>
        <a  href="{{ $reviews->nextPageUrl() }}" class="pagination-next">Next page</a>
   </nav>
 

@endsection

@section('script')

<!--<script >
    var test = new Vue({
   el: '#test',
   data:{
       test: {{ route('review.add') }}
   }
   
   });
</script>-->

@endsection
