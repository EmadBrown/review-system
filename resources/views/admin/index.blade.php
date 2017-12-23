@extends('layouts.app')

@section('stylesheet')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
            integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
                <th>#</th>
                <th><abbr title="Position">Name</abbr></th>
                <th><abbr title="Played">Description</abbr></th>
                <th>Rating</th>
                <th>Premition</th>
                <th>Switching </th>
                <th>Delete</th>
        </tr>
    </thead>
    <tfoot>
            <tr>
                <th>#</th>
                <th><abbr title="Position">Name</abbr></th>
                <th><abbr title="Played">Description</abbr></th>
                <th>Rating</th>
                <th>Premition</th>
                <th>Switching </th>
                <th>Delete</th>
            </tr>
    </tfoot>
    <tbody>
        @foreach($reviews as $review)
            <tr>
              <th>{{ $review->id }}</th>
              <th>{{ $review->name }}</th>
              <th>{{ $review->description }}</th>
                <th> 
                        <star-rating :show-rating="false"  :rating="{{$review->rating}}" :star-size="15" ></star-rating>
                </th>
              @if($review->permit == true)
                        <th>
                                 <span class="icon has-text-success">
                                       <i class="fa fa-check-square"></i>
                                </span>
                        </th>
                        <th>
                                <div class="field">
                                            <input  id="{{ $review->id }}" type="checkbox" name="switch" class="switch"  v-on:click="switchOff"  checked route="{{ route('review.permit.off' , $review->id) }}">
                                            <label for="{{ $review->id }}" ></label>
                                </div>
                        </th>
                   @else
                        <th>
                                <span class="icon has-text-danger">
                                    <i class="fa fa-ban"></i>
                                </span>
                       </th>
                        <th>
                                <div class="field">
                                            <input  id="{{ $review->id }}" type="checkbox" class="switch"  name="switch" v-on:click="switchOn" route="{{ route('review.permit.on' , $review->id) }}">
                                            <label for="{{ $review->id }}" ></label>
                                </div>
                        </th>
                   @endif
                        <th>
                            <button  id="deleteReview"  class="button is-danger" v-on:click="deleteReview" route="{{ route('review.delete' , $review->id) }}" >Delete</button>
                        </th>
                </tr>
            @endforeach
    </tbody>
   
</table>
<!-- Pagination -->
 <pagination v-bind:pagedata="tagsData" v-on:page-clicked="getTagsList"></pagination>
    <nav class="is-centered" role="navigation" aria-label="pagination">
        <a  href="{{$reviews->previousPageUrl()}}" class="pagination-previous">Previous</a>
        <a  href="{{ $reviews->nextPageUrl() }}" class="pagination-next">Next page</a>
   </nav>


@endsection

@section('script')
<script type="text/javascript">
    
 $(document).ready(function () {
    $('input[name="switch"] , #deleteReview').on('click',function () {
                var route = $(this).attr('route') ;
                $('.swal2-confirm').on('click',function (){
                        window.location.replace(route);
                  });
    });
});
</script>

@endsection