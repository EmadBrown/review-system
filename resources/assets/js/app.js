
require('./bootstrap');

window.Vue = require('vue');

 
// ES6 Modules or TypeScript
import swal from 'sweetalert2'

import Buefy from 'buefy'
Vue.use(Buefy);

import StarRating from 'vue-star-rating'
 Vue.component('star-rating', StarRating);
 
import VueResource from 'vue-resource'
Vue.use(VueResource);

import VueRouter from 'vue-router'
Vue.use(VueRouter);

Vue.component('example', require('./components/example.vue'));

var router = new VueRouter();

Vue.component('reviews' , {
    template: '#reviews-template',
 
 data: function(){
     return {
         list: []
     };
 },
    created: function(){
      
            $.getJSON('api#/dashboard' , function(reviews){
                this.list = reviews;
            }.bind(this));
        
    }
});

 var app = new Vue({
   el: '#app',
   resource: VueResource,
   
  methods: {
    setRating: function(rating) {
      this.rating = rating ;
    },
    showCurrentRating: function(rating) {
      this.currentRating = (rating === 0) ? this.currentSelectedRating : rating;
    },
    setCurrentSelectedRating: function(rating) {
      this.currentSelectedRating = "You have Selected: " + rating + " stars";
    },
    switchOn: function(routes){
                swal(
                            'Review has given permission On successfully!',
                            'Click the button "OK"!',
                            'success'
                      );
                    this.$http.get(routes);

    },
    switchOff: function(routes){
                swal(
                            'Review has given permission Off successfully!',
                            'Click the button "OK"!',
                            'success'
                          );
                    this.$http.get(routes);
    },
    deleteReview: function(routes){
                    swal({
                             title: 'Are you sure?',
                             text: "You won't be able to revert this!",
                             type: 'warning',
                             showCancelButton: true,
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'Yes, delete it!'
                           }).then((result) => {
                             if (result.value) {
                               swal(
                                 'Deleted!',
                                 'Your file has been deleted.',
                                 'success'
                               );
                          this.$http.get(routes);
                             }
                           });
                }
  },
  routing(){
       
  },
  data: {
    rating: "No Rating Selected",
    currentRating: "No Rating",
    currentSelectedRating: "No Current Rating",
    boundRating: 3
  }
  
 });

  
