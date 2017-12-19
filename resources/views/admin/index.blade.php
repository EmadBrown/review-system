@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
        <tr>
                <th>#</th>
               <th><abbr title="Position">Name</abbr></th>
               <th><abbr title="Played">Description</abbr></th>
               <th>Rating</th>
                <th>Premition</th>
        </tr>
    </thead>
    <tfoot>
            <tr>
              <th>#</th>
              <th><abbr title="Position">Name</abbr></th>
              <th><abbr title="Played">Description</abbr></th>
              <th>Rating</th>
               <th>Premition</th>
            </tr>
    </tfoot>
    <tbody>
        @foreach($reviews as $review)
            <tr>
              <th>{{ $review->id }}</th>
              <th>{{ $review->name }}</th>
              <td>{{ $review->description }}</td>
                <td> 
                        <star-rating :show-rating="false"  :rating="{{$review->rating}}" :star-size="10" ></star-rating>
                </td>
              @if($review->permit == true)
                    <td>
                             <span class="icon has-text-success">
                                   <i class="fa fa-check-square"></i>
                            </span>
                    </td>
               @else
                    <td>
                            <span class="icon has-text-danger">
                                <i class="fa fa-ban"></i>
                            </span>
                   </td>
               @endif
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
