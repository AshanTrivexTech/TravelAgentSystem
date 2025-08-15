<script>



 $(document).ready(function() {
 
 function fetch_quotation_data(query = '') {
     var ID='{{$tour_id}}';

              $.ajaxSetup({
                      headers: {
                                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                              }
                  });


                     $.getJSON({
                     url:'{{Route('lv_srch')}}',
                 method:'POST',
                 data:{query:query,ID:ID},
                 //dataType:'json',
                 success:function (data) {

                    // console.log(data);
                     $('#tb_sr').html(data.table_data);
                       }
                     })
                     }

     $(document).on('keyup','#generalSearch',function () {
         
         var query = $(this).val();
          fetch_quotation_data(query);
                     });
                fetch_quotation_data('')
                ; });


function deleteAccept(id)
{
    
    
    swal({
 
        title:"Are you sure you want to delete",
        text : "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode:true, 

     
    })

    .then((willDelete_data) =>{

        if(willDelete_data){
        
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                      
                }

            });

            $.ajax({
                 url : '{{Route('guest_allocation_delete')}}',
                method : "POST",
                data : {id:id},
                success: function(data){
                    console.log(data);

                    if(data == "deleted"){
                    
                        swal("Poof! Your imaginary file has been deleted! ",{
                            icon: "success",
                        });
                        window.location.reload();
                    }
                    else{
                        swal("Something went wrong" ,"error");
                    }
                     

              }

                

            })
        
        }

      
    });

}
</script>