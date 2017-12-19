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
              <td>{{ $review->rating }}</td>
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

@endsection
