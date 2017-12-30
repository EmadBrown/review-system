@extends('layouts.app')

@section('stylesheet')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
            integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

@endsection

@section('content')

<div id="app"> 
 
    <reviews></reviews>
    

</div>
 
<template id="reviews-template">
      
              
        <table class="table">
                <thead>
                    <tr>
                            <th>#</th>
                            <th><abbr title="Position">Name</abbr></th>
                            <th><abbr title="Played">Description</abbr></th>
                            <th>Rating</th>
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
                            <th>Switching </th>
                            <th>Delete</th>
                        </tr>
                </tfoot>

                <tbody>

                           <tr v-for="review in list">
                                   <th> @{{review.id}}</th>
                                   <th>         @{{review.name}}</th>
                                   <th> @{{review.description }}</th>
                                   <th> 
                                           <star-rating :show-rating="false"  :rating="review.rating" :star-size="15" ></star-rating>
                                   </th>
                                   <th v-if="review.permit === 1">
                                           <div class="field">
                                                   <input  :id="review.id" type="checkbox" name="switch" class="switch"  checked v-on:click="switchOff(review.id)">
                                                   <label :for="review.id" ></label>
                                           </div>
                                   </th>
                                   <th v-else>
                                           <div class="field">
                                                   <input  :id="review.id" type="checkbox" class="switch"  name="switch"  v-on:click="switchOn(review.id)">
                                                   <label :for="review.id" ></label>
                                           </div>
                                   </th>
                                   <th>
                                          <button  id="deleteReview"  class="button is-danger" v-on:click="deleteReview(review.id)" >Delete</button>
                                   </th>
                           </tr>
                   </tbody>
        </table>
</template>

 


@endsection

 