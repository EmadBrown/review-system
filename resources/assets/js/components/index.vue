
 <template>
        <div class="column is-12">
                     <article class="post" v-for="review in list" >
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
        </div>
</template>

<script>
    export default {

 data: function(){
     return {
         list: []
     };
 },
 
    created: function(){
      
            $.getJSON('api' , function(reviews){
           this.list = reviews;
            }.bind(this));
    }
    }
 
</script>
