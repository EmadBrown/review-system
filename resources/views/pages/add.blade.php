@extends('welcome')

@section('content')

    @include('partials._messages')
    <form action="{{route('review.add')}}" method="POST">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" id="name" name='name' type="text" placeholder="Name" required autofocus>
                 @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                    @endif
            </div>
        </div>

        <div class="field">
            <label class="label">Review</label>
            <div class="control">
                <textarea class="textarea" name='description' placeholder="Textarea" required autofocus></textarea>
                    @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                    @endif
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <div id="app">
                   <star-rating :show-rating="false" @rating-selected="setRating" :star-size="30" ></star-rating>
                   <input  type="hidden" name="rating" v-bind:value="rating" required autofocus>
                             @if ($errors->has('rating'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('rating') }}</strong>
                                       </span>
                              @endif
                </div>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Submit</button>
            </div>
             <div class="control">
                <a href="{{ route('home') }}" class="button is-text">Cancel</a>
             </div>
        </div>

    </form>
@endsection