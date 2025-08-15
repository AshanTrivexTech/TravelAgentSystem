<script>
    function add_to_list(){

        var tour_id =parseInt('{{$tourID}}');

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('add_invoice_to_list')}}',
                method: "POST",
                data: {tour_id:tour_id},
                success: function(data) {

                    console.log(data);
                    
                    if(data!='Error'){
                        $('.alert').hide();
                        $('#inv_body').html(data.inv_data);
                        $('#inv_total').html(data.inv_total.toFixed(2));
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
    }
</script>