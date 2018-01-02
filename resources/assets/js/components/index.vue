
 <template>
        <div class="column is-12">
                     <article class="post" v-for="review in list.data">
                            <div class="box content">
                                    <h4> <strong>{{review.name}}:</strong> {{review.description}}</h4>
                                  <div class="media">
                                    <div class="media-left">
                                      <p class="image is-32x32">
                                        <img src="http://bulma.io/images/placeholders/128x128.png">
                                      </p>
                                    </div>
                                    <div class="media-content">
                                      <div class="content">
                                          <p>
                                          <a href="#">@star</a>
                                                <star-rating :show-rating="false"  :rating="review.rating" :star-size="15" ></star-rating>
                                          <span class="tag">Rating</span>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                     </article>
                    <div>
                        <hr>
                            <nav class="pagination" role="navigation" aria-label="pagination">


                                 <a  v-bind="{disabled: list.current_page === 1}" href="#" v-on:click="prevPage" class="pagination-previous">Previous</a>
          
                                  <a  v-bind="{disabled: list.current_page === list.last_page}" href="#" v-on:click="nextPage" class="pagination-next">Next page</a>

                              <ul class="pagination-list">

                                <li>
                                  <a class="pagination-link is-current" :aria-label="list.current_page" aria-current="page">{{list.current_page}}</a>
                                </li>

                              </ul>
                            </nav>
                            
                          <hr>
                    </div>

                </div>
        </div>

</template>

<script>
    export default {

 data: function(){
     return {
         list: []
     };
 },
 
methods : {
 nextPage: function() {
                     $.getJSON(this.list.next_page_url , function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },


   prevPage: function() {
                     $.getJSON('api?page=' + (this.list.current_page-1) , function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },

   firstPage: function() {
                     $.getJSON(this.list.first_page_url, function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },
   lastPage: function() {
                     $.getJSON(this.list.last_page_url, function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },

   fetchReviewList: function() {
                     $.getJSON('api?page=' + this.list.current_page , function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },
},
    created: function(){
      
            $.getJSON('api' , function(reviews){
           this.list = reviews;
            }.bind(this));
    }
    }
 
</script>
