<script>
 
 $(document).ready(function(event){
        $('.alert').hide();
      
				
				//to close the alert window after popup 
		$('#notify_close').click(function(event){
					$('.alert').hide();
		});
	
    });


function save_tour_trns_vehicls(id){

 var v_type=$('#vehicle_type_'+id).val();
 var driver_id=$('#driver_'+id).val();
 var trns_reserve_id=$('#trns_id_'+id).val();
 var vehicle_sup=$('#vehicle_sup_'+id).val();
 var vehicle=$('#vehicle_'+id).val();
 var quot_trns_id=$('#quot_trns_id_'+id).val();



 var t_id='{{$toutQoutHeader->tour_id}}';




        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

             $.getJSON({ 
                
                url: '{{Route('tour_trn_addto_reserve')}}',
                method: "POST",
                data: {v_type:v_type,driver_id:driver_id,trns_reserve_id:trns_reserve_id,t_id:t_id,vehicle_sup:vehicle_sup,vehicle:vehicle,quot_trns_id:quot_trns_id},
                success: function(data) {

                   console.log(data);
                    
                    if(data=='added'){

                        $('.alert').hide();
                        swal("Transport Reservation Submited successfully!","", "success");
                        
                        
                        window.location.reload(); 
                        // $('#btn_add_'+id).prop('disabled',true);                         
                    }else{

                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
  
    
}


function genarate_transvoucher(vId,rowId_rg){


          var tourID = '{{$tour_ID}}';
          var qouttransId ='{{$trans_ID}}';            
          var comments = $('#comments_'+rowId_rg).val();
          var remarks = $('#remarks_'+rowId_rg).val();           
          var conf_to = $('#conf_to_'+rowId_rg).val();
          var conf_by = $('#conf_by_'+rowId_rg).val();
          var conf_date =$('#m_datetimepicker_conf_date_'+rowId_rg).val();
          var rep_to= $('#report_to_'+rowId_rg).val();
          var av_fl_no= $('#arvl_fno_'+rowId_rg).val();
          var dp_fl_no= $('#dept_fno_'+rowId_rg).val();
          var av_time= $('#m_datetimepicker_arvl_time_'+rowId_rg).val();
          var dp_time= $('#m_datetimepicker_dept_time_'+rowId_rg).val();
        //   var t_pax='{{$t_pax}}';
          var t_pax=$('#t_pax_'+rowId_rg).val();
          var trns_reserve_id=$('#trns_reserve_'+rowId_rg).val();
       
            var v_no_=$('#v_no_'+rowId_rg).val();
        
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          
          $.getJSON({ 
        
              url: '{{Route('vehicle_voucher_store')}}',
              method: "POST",
              data: {tourID:tourID,qouttransId:qouttransId,comments:comments,remarks:remarks,
                     conf_to:conf_to,conf_by:conf_by,conf_date:conf_date,rep_to:rep_to,av_fl_no:av_fl_no,dp_fl_no:dp_fl_no,av_time:av_time,v_no_:v_no_,
                     dp_time:dp_time,vId:vId,rowId_rg:rowId_rg,t_pax:t_pax,trns_reserve_id:trns_reserve_id},
              success: function(data) {

                 console.log(data);
                  
                  if(data=='added'){

                      $('.alert').hide();
                      swal("Vehicle Allocation Submited successfully!","Tour Code  : ", "success");
                      window.location.reload();                          
                  }else{

                      $('.alert').show();
                      $('#notify').html(data);
                  }
              }                                   
      })

  }




</script>