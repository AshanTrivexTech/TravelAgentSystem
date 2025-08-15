<script>
 $(document).ready(function(event){
        $('.alert').hide();
				
				//to close the alert window after popup 
		$('#notify_close').click(function(event){
					$('.alert').hide();
		});
	
		$("input[type='text']").click(function (event) {
			   $(this).select();
		});

    });




function ganarate_voucher_misc_advance(supID,Row_Counts)
{
    var mis_dt_type_advance=[];

    var tourID = '{{$tourID}}';
    var qoutheaderId ='{{$tourQuotHeaderId}}';            
  
    var remarks = $('#remarks_'+Row_Counts).val();    
    var rq_for =$('#rq_for_'+Row_Counts).val();
    var rq_ad_dt= $('#rq_dt_'+Row_Counts).val();
    var setle_dt=$('#st_dt_'+Row_Counts).val();
    var pkg_count_ad=$('#pkg_count__advance_'+Row_Counts).val();
    var page_tab=3;
    
    for(var i=1;i<=pkg_count_ad;i++)
    {
        var _mis_row_id =parseInt($('#mis_res__add_'+i+'_'+Row_Counts).val());
        mis_dt_type_advance.push({
            mi_pos:i,
            mis_row_id:_mis_row_id
        });
      
    }
   


   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
  
            $.getJSON({ 
                
                url: '{{Route('reservation_store_advance_misc')}}',
                method: "POST",
                data: {mis_dt_type_advance:JSON.stringify(mis_dt_type_advance),tourID:tourID,qoutheaderId:qoutheaderId,
                    remarks:remarks,rq_ad_dt:rq_ad_dt,setle_dt:setle_dt,supID:supID,Row_Count:Row_Counts,rq_for:rq_for,page_tab:page_tab},
                success: function(data) {

                   console.log(data);
                    
                    if(data=='added'){

                        $('.alert').hide();
                        swal("Hotels Reservation Submited successfully!","", "success");
                        window.location.reload();                          
                    }else{

                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
    
}






function ganarate_voucher_misc(supID,Row_Count)
{
    var mis_dt_type =[];

           var tourID = '{{$tourID}}';
            var qoutheaderId ='{{$tourQuotHeaderId}}';            
            var rates = $('#rates_'+Row_Count).val();
            var remarks = $('#remarks_'+Row_Count).val();           
            var conf_to = $('#conf_to_'+Row_Count).val();
            var conf_by = $('#conf_by_'+Row_Count).val();
            var conf_date = $('#m_datetimepicker_conf_date_'+Row_Count).val();
            var noof_pax = parseInt($('#noof_pax_'+Row_Count).val());
            var client_name = $('#client_name_'+Row_Count).val();
            
       
            var condition1 = 1;
    var pg_tab=2;
    var pkg_count=$('#pkg_count_'+Row_Count).val();

// console.log(pkg_count);
    for(var i=1;i<=pkg_count;i++)
    {
        var _mis_row_id =parseInt($('#mis_res_'+i+'_'+Row_Count).val());
        mis_dt_type.push({
            mi_pos:i,
            mis_row_id:_mis_row_id
        });
      
    }

        // console.log(mis_dt_type);qtn_type
        
    //    alert(i);
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
  
            $.getJSON({ 
                
                url: '{{Route('reservation_generate_voucher_misc')}}',
                method: "POST",
                data: {condition1:condition1,mis_dt_type:JSON.stringify(mis_dt_type),tourID:tourID,qoutheaderId:qoutheaderId,rates:rates,
                    remarks:remarks,conf_to:conf_to,conf_by:conf_by,conf_date:conf_date,noof_pax:noof_pax,client_name:client_name,supID:supID,Row_Count:Row_Count,pg_tab:pg_tab},
                success: function(data) {

                   console.log(data);
                    
                    if(data=='added'){

                        $('.alert').hide();
                        swal("Hotels Reservation Submited successfully!","", "success");
                        window.location.reload();                          
                    }else{

                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
   

  


}



   var get_chk_status =0;
   var chk_a=0;




  function cancel_misc(id)
  {
        
     $('#btn_'+id).attr('disabled',true);
     

  }


  function uncheking()
  {   
      $rowCount=0
      $('#row_chk').prop('checked' , false);

        
        $("#sel_ tr").each(function(index) {
            
            $rowCount++;
            
            
            })

            

  }



function select_all_sn(){


    var check_state = 0;

    if($('#row_chk').prop('checked')){
    
        check_state = 1;
    }else{
        check_state = 0;
    }
 

    var countR = 0;
    $("#sel_ tr").each(function(index) {
        countR++;
        if(check_state==1){

            if($('#row_chk'+countR).prop('disabled'))
            {
                $('#row_chk'+countR).prop('checked' , false);
            }else
            {
                $('#row_chk'+countR).prop('checked' , true);
            }
           
        }else{
           
             $('#row_chk'+countR).prop('checked' , false);
            
        }
    })
}

  function abcc(count)
  {
    // $('#row_chk'+countR).prop('checked' , false);
    alert(count);
     
  }

function save_data(count_dt)
{




var count=0;
var i =0;
var data_dt=[];
// data:JSON.stringify(data);
// Json_decode(data);
// get array countt
// then foreach

    $("#sel_ tr").each(function(index) {

        count++;

        if($('#row_chk'+count).prop('checked')){

            var s_advance=0;
            var sup_id=$('#supplier_').val();
            var advance=$('#opssup_chk_').prop('checked');
            if(advance==true)
            {
                s_advance=1;
            }
            else
            {
                s_advance =0;

            }
            var mis_id=$('#mis_id_'+count).val();
            var misc_qty_req_update = parseInt($('#misc_qty_ch_'+count).val());
            var status=1;
            
            
          if(count <= count_dt){

        data_dt.push({
            sup_id:sup_id,
            s_advance:s_advance,
            status:status,
            mis_id:mis_id,
            id:count,
            misc_qty:misc_qty_req_update


        });

         }

        }
    

    

        
      
     

    })


    

   // alert(data_dt);
    

     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });


         $.getJSON({ 
                
                url: '{{Route('misc_view_store_reserve')}}',
                method: "POST",
                data: {data_dt:JSON.stringify(data_dt)},
                success: function(data) {

                  //  console.log(data);
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Miscellanies Reservation Added successfully!","", "success");
                     window.location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })



}


</script>