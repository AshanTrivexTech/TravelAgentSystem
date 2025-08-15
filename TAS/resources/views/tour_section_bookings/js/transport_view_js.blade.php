<script>

function send_request()
{
  

 var dt=0;
 var trns_data_new=[];
 
// $t_trns->id
    var count=0;
    $("#sel_tdd tr").each(function(index) {
        // alert('a');
     
        count++;
        if($('#reserve_row'+count).prop('checked'))
        {
            dt++;
        
        var tr_quot_dt_id=$('#dta_'+count).val();
        var status=1;

        trns_data_new.push({
            tr_quot_id:tr_quot_dt_id,
            status:status

        });


        }


})

// alert(dt);



   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });


           $.getJSON({ 
                
                url: '{{Route('reserve_update_trns')}}',
                method: "POST",
                data: {trns_data_new:JSON.stringify(trns_data_new)},
                success: function(data) {

                    console.log(data);
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Transport Request was Sent success!","", "success");
                      window.location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
 

}

function select_chkbox_(rows)
{
    var chk_state = 0;
    var cnt=0;

        if($('#chk').prop('checked')){

            chk_state = 1;
        }else{
            chk_state = 0;
        }
      
        
        $("#sel_tdd tr").each(function(index) {
            cnt++;
            if(chk_state==1){
       
                // alert('abc');
                $('#reserve_row'+cnt).prop('checked' , true);
       
         }
    else{
       
         $('#reserve_row'+cnt).prop('checked' , false);
        
        
    }
        });

    

       
        
}

function add_reserve_transpoart(row_id)
{

 var dt=0;
 var trns_data=[];
 
 

    var count=0;
    $("#sel_td tr").each(function(index) {
        // alert('a');
     
        count++;
      
        if($('#row_chk_dt_'+count).prop('checked'))
        {
            var t_frm=$('#frm_A_'+count).val();
            var t_to=$('#to_A_'+count).val();
      

        var tr_quot_dt_id=$('#tr_id_'+count).val();
        var status=1;
        var tr_frm_dt=$('#m_datetimepicker_frm_date_'+count).val();
        var tr_to_dt=$('#m_datetimepicker_to_date_'+count).val();
        if(tr_frm_dt != '' && tr_to_dt !='' ){

            if(t_frm <= tr_frm_dt && t_to>=tr_to_dt ){

                   trns_data.push({
            tr_quot_id:tr_quot_dt_id,
            status:status,
            tr_frm_dt:tr_frm_dt,
            tr_to_dt:tr_to_dt

        });
            }
            else{
                swal("Date range is not valid","", "error");

            }


        }else{
            // alert('a');
            swal("Please select valid date range","", "error");

        }



        }


})


   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });


           $.getJSON({ 
                
                url: '{{Route('transport_add_to_reserve')}}',
                method: "POST",
                data: {trns_data:JSON.stringify(trns_data)},
                success: function(data) {

                    console.log(data);
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Transport Reservation Added successfully!","", "success");
                      window.location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })


  

}





    function select_chkbox_one(id)
    {
      
            var check_state = 0;

        if($('#row_chk').prop('checked')){

            check_state = 1;
        }else{
            check_state = 0;
        }



var countR = 0;
$("#sel_td tr").each(function(index) {
    countR++;
    if(check_state==1){
        if($('#row_chk_dt_'+countR).prop('disabled'))
        {
            $('#row_chk_dt_'+countR).prop('checked' , false);
        }else
        {
            $('#row_chk_dt_'+countR).prop('checked' , true);
        }
       
    }else{
       
         $('#row_chk_dt_'+countR).prop('checked' , false);
        
    }
        })

    }

</script>