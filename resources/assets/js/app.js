
require('./bootstrap');

window.Vue = require('vue');

// ES6 Modules or TypeScript
import swal from 'sweetalert2'

 

import Buefy from 'buefy'
Vue.use(Buefy);

import Router from './routes.js'

Vue.component('example', require('./components/example.vue'));

Vue.component('delete', require('./components/delete.vue'));

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
  },
  data: {
    rating: "No Rating Selected",
    currentRating: "No Rating",
    currentSelectedRating: "No Current Rating",
    boundRating: 3
  }
 });

  
