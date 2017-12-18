@extends('welcome')

@section('content')

<div class="columns">
      <div class="column is-3">
        <a class="button is-primary is-block is-alt is-large" href="#">Add Review</a>
      </div>
      <div class="column is-9">
        <div class="box content">
          <article class="post">
            <h4>Bulma: How do you center a button in a box?</h4>
            <span class="pull-right has-text-grey-light"><i class="fa fa-comments"></i> 1</span>
            <div class="media">
              <div class="media-left">
                <p class="image is-32x32">
                  <img src="http://bulma.io/images/placeholders/128x128.png">
                </p>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="#">@jsmith</a> replied 34 minutes ago  &nbsp; 
                    <span class="tag">Question</span>
                  </p>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
</div>

 @foreach ($reviews as $review )
   <div class="column is-12">
           <div class="box content">
             <article class="post">
               <h4>{{$review->name}}: How do you center a button in a box?</h4>
               <span class="pull-right has-text-grey-light"><i class="fa fa-comments"></i> 1</span>
               <div class="media">
                 <div class="media-left">
                   <p class="image is-32x32">
                     <img src="http://bulma.io/images/placeholders/128x128.png">
                   </p>
                 </div>
                 <div class="media-content">
                   <div class="content">
                     <p>
                       <a href="#">@jsmith</a> replied 34 minutes ago  &nbsp; 
                       <span class="tag">Question</span>
                     </p>
                   </div>
                 </div>
               </div>
             </article>
           </div>
   </div>
 @endforeach
 
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