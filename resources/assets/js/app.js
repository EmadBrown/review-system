
require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy'
Vue.use(Buefy);


Vue.component('example', require('./components/example.vue'));

import StarRating from 'vue-star-rating'
 
Vue.component('star-rating', StarRating);

 var app = new Vue({
   el: '#app',
  methods: {
    setRating: function(rating) {
      this.rating = rating ;
    },
    showCurrentRating: function(rating) {
      this.currentRating = (rating === 0) ? this.currentSelectedRating : rating;
    },
    setCurrentSelectedRating: function(rating) {
      this.currentSelectedRating = "You have Selected: " + rating + " stars";
    }
  },
  data: {
    rating: "No Rating Selected",
    currentRating: "No Rating",
    currentSelectedRating: "No Current Rating",
    boundRating: 3
  }
 });

  
