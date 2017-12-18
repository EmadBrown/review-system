@extends('welcome')

@section('content')

<div class="columns">
      <div class="column is-12">
          <form action="{{ route('review.add') }}" method="GET" >
                {{ csrf_field() }}
              <button  type="submit" class="button is-primary is-block is-alt is-large column is-3">Add Review</button>
          </form>
      </div>
</div>
<div id="app">
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
 
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        <a  href="{{$reviews->previousPageUrl()}}" class="pagination-previous">Previous</a>
        <a  href="{{ $reviews->nextPageUrl() }}" class="pagination-next">Next page</a>
        <ul class="pagination-list">
            <li><a  href="{{$reviews->previousPageUrl()}}" class="pagination-link" aria-label="Goto page {{$reviews->currentPage() - 1}}">{{$reviews->currentPage() - 1}}</a></li>
            <li><a class="pagination-link is-current" aria-label="{{$reviews->currentPage()}}" aria-current="page">{{$reviews->currentPage()}}</a></li>
            <li><a   href="{{ $reviews->nextPageUrl() }}" class="pagination-link {{  $reviews->currentPage() == $reviews->lastPage() ? 'is-invisible'  : ''}} " aria-label="Goto page {{$reviews->currentPage() + 1}}">{{$reviews->currentPage() + 1}}</a></li>
        </ul>
   </nav>
 
 
@endsection