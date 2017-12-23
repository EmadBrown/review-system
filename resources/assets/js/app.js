
require('./bootstrap');

window.Vue = require('vue');

// ES6 Modules or TypeScript
import swal from 'sweetalert2'
Vue.use(swal);

import Buefy from 'buefy'
Vue.use(Buefy);

import Router from './routes.js'
 

Vue.component('example', require('./components/example.vue'));

import StarRating from 'vue-star-rating'
 
Vue.component('star-rating', StarRating);

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
              }).then((result) => {
                if (result.value) {
                  swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
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

  
