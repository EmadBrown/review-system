
require('./bootstrap');

window.Vue = require('vue');

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

Vue.component('reviews', require('./components/dashboard.vue'));
Vue.component('reviews-permit', require('./components/index.vue'));



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
    }
 
  },
  data: {
    rating: "No Rating Selected",
    currentRating: "No Rating",
    currentSelectedRating: "No Current Rating",
    boundRating: 3
  }
  
 });

  
