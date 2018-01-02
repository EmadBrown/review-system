 

 <template>
 <div class="countiner">
        <table class="table">
                <thead>
                    <tr>
                            <th>#</th>
                            <th><abbr title="Position">Name</abbr></th>
                            <th><abbr title="Played">Description</abbr></th>
                            <th>Rating</th>
                            <th>permission </th>
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
                            <th>Permation</th>
                            <th>permission </th>
                            <th>Delete</th>
                        </tr>
                </tfoot>

                <tbody>

                           <tr v-for="review in list.data">
                                   <th> {{review.id}}</th>
                                   <th> {{review.name}}</th>
                                   <th> {{review.description }}</th>
                                   <th> 
                                           <star-rating :show-rating="false"  :rating="review.rating" :star-size="15" ></star-rating>
                                   </th>
                                       <th v-if="review.permit === 1">
                                              <span class="icon has-text-success">
                                                  <i class="fa fa-check-square"></i>
                                             </span>
                                       </th>
                                        <th v-else>
                                                <span class="icon has-text-danger">
                                                  <i class="fa fa-ban"></i>
                                           </span>
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

    <div>
        <hr>
            <nav>
              <ul class="pagination">
                <li class="page-item" v-bind:class="{disabled: list.current_page === 1}">
                  <a class="page-link" href="#"  v-on:click="prevPage">Previous</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">{{list.current_page}}<span class="sr-only">(current)</span></a>
                </li>

                <li class="page-item" v-bind:class="{disabled: list.current_page === list.last_page}">
                  <a class="page-link" href="#" v-on:click="nextPage">Next</a>
                </li>
              </ul>
            </nav>
          <hr>
    </div>

</div>

</template>

 

<script>
import swal from 'sweetalert2'
 

export default {

 data: function(){
     return {
         list: []
     }
},
   methods: {
   nextPage: function() {
                     $.getJSON(this.list.next_page_url , function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },


   prevPage: function() {
                     $.getJSON('json/dashboard?page=' + (this.list.current_page-1) , function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },

   fetchReviewList: function() {
                     $.getJSON('json/dashboard?page=' + this.list.current_page , function(reviews){
                        this.list = reviews;
                    }.bind(this));
        },
    switchOn: function(id){
                this.$http.get('dashboard/permit_on/'+ id);
                  this.fetchReviewList();
             swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                      });
                   
                this.fetchReviewList();
    },
    switchOff: function(id){
                 this.$http.get('dashboard/permit_off/'+ id);
                 this.fetchReviewList();
                swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                          });
                this.fetchReviewList();
    },
    deleteReview: function(id){
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
                             this.$http.get('dashboard/delete/'+ id);
                               swal(
                                 'Deleted!',
                                 'Your file has been deleted.',
                                 'success'
                               );
                          this.fetchReviewList(); 
                             }
                           });
                           this.fetchReviewList();
                }
  },
    created: function(){
      
            $.getJSON('json/dashboard' , function(reviews){
           this.list = reviews;
            }.bind(this));
    }
    }
 
</script>
