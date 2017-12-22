<template>
<deleteButton>
  <a :href="url" class="button is-danger" @click= "deleteReview">Delete</a>
</deleteButton>
</template>

<script>
    export default {
 
            data(){
            return {
                url: route('name.routeinlaravel')
            }
        },

     method:{
                        deleteReview(){
                            swal({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonText: 'No, cancel!',
                                    confirmButtonClass: 'btn btn-success',
                                    cancelButtonClass: 'btn btn-danger',
                                    buttonsStyling: false,
                                    reverseButtons: true
                                  }).then((result) => {
                                    if (result.value) {
                                      swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                      )
                                    // result.dismiss can be 'cancel', 'overlay',
                                    // 'close', and 'timer'
                                    } else if (result.dismiss === 'cancel') {
                                      swal(
                                        'Cancelled',
                                        'Your imaginary file is safe :)',
                                        'error'
                                      )
                                }
                              })    
                       }   
                    }
    }
</script>
