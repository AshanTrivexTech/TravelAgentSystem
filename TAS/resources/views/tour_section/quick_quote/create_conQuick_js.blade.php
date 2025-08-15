<script>

$('#qk_notify_close_con').click(function(event){
					$('.alert').hide();
});

    function saveHPDetails_quick()
{


var hpdCountRm = 0;

var hpd_dataStore = [];
var hpd_sup_list =[];

var chk_pos = 0;
                  

var hasErrors =0;
// if(hpdCountRm!=0){

                 var qk_agent = $('#qk_con_agent :selected').val();
                 var qk_market = $('#qk_con_market :selected').val();
		 		 var qk_currency = $('#qk_con_currency :selected').val();

    //  $("#dat_optsup tr").each(function(index) {                
    //     chk_pos++;
    //     var add_sup_codes = $('#sup_code_adde_'+chk_pos).html();
    //     var add_sup_rtype = $('#rtype_added_'+chk_pos).val();
    //     var add_sup_rate = $('#sup_rate_adde_'+chk_pos).html();
    //     var add_sup_desc = $('#sup_desc_adde_'+chk_pos).html();

    //     hpd_sup_list.push({

    //         code:add_sup_codes,
    //         rtype:add_sup_rtype,
    //         rate:add_sup_rate,
    //         desc:add_sup_desc
            
    //     });
    // }); 
    
    // for(var pos = 1; pos<=hpdCountRm; pos++){
        
        // var agent=$('#con_agent_id_'+pos).val();
        // var market=$('#con_market_id_'+pos).val();
        // var currency=$('#con_currency_id_'+pos).val();
        var qk_room=$('#qk_con_rmtype').val();
        var qk_meal_plane=$('#qk_con_meal_plane').val();
        var qk_sgl = parseFloat($('#qk_con_sgl').val()).toFixed(2);
        var qk_dbl = parseFloat($('#qk_con_dbl').val()).toFixed(2);
        var qk_tbl = parseFloat($('#qk_con_tbl').val()).toFixed(2);
        var qk_qbl = parseFloat($('#qk_con_qbl').val()).toFixed(2);
        var qk_child = parseFloat($('#qk_con_child').val()).toFixed(2);
        var qk_exb = 0;
        //parseFloat($('#exb_id_').val()).toFixed(2);
        var qk_from_date = '{{$tourQuotHeader->vld_frm_date}}';
        var qk_to_date = '{{$tourQuotHeader->vld_to_date}}';
        
        // if(isNaN(sgl)==true){
        //     hasErrors++;
        // }
            
        // if(isNaN(dbl) == true){
        //     hasErrors++;
        // }

        // if(isNaN(tbl) == true){
        //     hasErrors++;
        // }

        // if(isNaN(qbl) == true){
        //     hasErrors++;
        // }
        // if(isNaN(child) == true){
        //     hasErrors++;
        // }
        // if(isNaN(exb) == true){
        //     hasErrors++;
        // }
        
        hpd_dataStore.push({

            pos:1,
            hpsgl:qk_sgl,
            hpdbl:qk_dbl,
            hptbl:qk_tbl,
            hpqbl:qk_qbl,
            hpchild:qk_child,
            hpexb:qk_exb,
            hpfrom_date:qk_from_date,
            hpto_date:qk_to_date,
            hpmarket:qk_market,
            hpagent:qk_agent,
            hpcurrency:qk_currency,
            hproom:qk_room,
            hpmealplan:qk_meal_plane
            

        });          
        
    // }
    
// }

// alert('sda'+qk_sgl);

var qk_hotel =$('#qk_con_hotel').val();
var qk_hotel_package =$('#qk_con_name').val();
var qk_cnt_term=$('#qk_h_contract').val();

if(qk_hotel==''){
 $('#qk_alert_con').show();
   $('#qk_notify_con').html('*Please Select The the Hotel');
}else if(qk_hotel_package==''){
   $('#qk_alert_con').show();
    $('#qk_notify_con').html('*Please Enter Package Name');
 }


if(hasErrors == 0){
       
       $.ajaxSetup({
               headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                  });
                  

       $.getJSON({
        
      
               url: '{{Route('store_package')}}',
               method: "POST",
               data:{hpd_dataStoree:JSON.stringify(hpd_dataStore),
               hpd_sup_list:JSON.stringify(hpd_sup_list),hotel:qk_hotel,hotel_package:qk_hotel_package,cnt_term:qk_cnt_term},
                   
               success: function(data) {
                
                 // console.log(data);

                  if(data=='saved'){
                   $('#qk_alert_con').hide();
                   swal("Hotel Rates Saved Successfully!", "Success");
                    

                     $('#qk_con_sgl').val('0.00');
                     $('#qk_con_dbl').val('0.00');
                     $('#qk_con_tbl').val('0.00');
                     $('#qk_con_qbl').val('0.00');
                     $('#qk_con_child').val('0.00');
                     $('#qk_con_exb').val('0.00');
                     $('#qk_con_name').val('Default');
                    
                    // $('#dat_optsup').html('');
                    // $('#dat').html('');

                    $('#txt_sr_id').val('');
                    fetch_quotation_data();


                   
               }else{
                   $('#qk_alert_con').show();
                   $('#qk_notify_con').html(data);
               }
                   
               }                                   
           })

}
//alert(hasErrors);

}

function clear_data_qk_con_create(){

    $('#qk_con_sgl').val('0.00');
    $('#qk_con_dbl').val('0.00');
    $('#qk_con_tbl').val('0.00');
    $('#qk_con_qbl').val('0.00');
    $('#qk_con_child').val('0.00');
    $('#qk_con_exb').val('0.00');
    $('#qk_con_name').val('Default');
    
}

</script>