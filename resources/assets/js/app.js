
require('./bootstrap');

window.Vue = require('vue');

// ES6 Modules or TypeScript
import swal from 'sweetalert2'

import Buefy from 'buefy'
Vue.use(Buefy);

import StarRating from 'vue-star-rating'
 Vue.component('star-rating', StarRating);
 
import Router from './routes.js'


Vue.component('example', require('./components/example.vue'));
Vue.component('slugWidget', require('./components/slugWidget.vue'));


 var app = new Vue({
   el: '#app',
   router: Router,
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
    switchOn (){
                swal(
                            'Review has given permission On!',
                            'Click the button "OK"! to continue ',
                            'success'
                      )
    },
    switchOff (){
                swal(
                            'Review has given permission Off!',
                            'Click the button "OK"! to continue ',
                            'success'
                          )
    },
    deleteReview(){
        
        swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              })
        }
  },
  data: {
    rating: "No Rating Selected",
    currentRating: "No Rating",
    currentSelectedRating: "No Current Rating",
    boundRating: 3
  }
  
 });

  
