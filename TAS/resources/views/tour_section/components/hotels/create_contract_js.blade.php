<script>
		//  $(document).ready( function(){
		  
		 //	To hide the alert window on load the page
		 $('#alert_con').hide();
			
		// 	// //to close the alert window after popup 
		 $('#notify_close_con').click(function(event){
		 	$('#alert_con').hide();
		 });

  function change_contract()

  {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if(dd<10) {

        dd = '0'+dd
     } 

     if(mm<10) {

      mm = '0'+mm
     } 

    today = yyyy + '-' + mm + '-' + dd;

   var annual_dat=$('#h_contract').val();

   if(annual_dat == 0)
   {
    
       document.getElementById("con_from_date").disabled = true;
       document.getElementById("con_to_date").disabled = true;
       
       $('#con_from_date').val(today);
       $('#con_to_date').val(today);
    
   }
   else{
       document.getElementById("con_from_date").disabled = false;
       document.getElementById("con_to_date").disabled = false;

       $('#con_from_date').val('');
       $('#con_to_date').val('');
   }
 }

function add_sup(){

    var hpdCount = 0;
    $("#dat tr").each(function(index) {

    hpdCount++;
    });
    
    if(hpdCount!=0){

        var sup_code= $('#sup_code').val();
        var sup_rtype= $('#sup_rate_type').val();
        var sup_rtype_str = $('#sup_rate_type :selected').text();
        var sup_rate= $('#sup_rate').val();
        var sup_desc= $('#sup_desc').val();
       //
        if(sup_code==''){
            $('#alert_con').show();
            $('#notify_con').html('* Please Enter Supliment Code.');
        }else if(sup_rate==0 || isNaN(sup_rate)){
            $('#alert_con').show();
            $('#notify_con').html('* Please Enter Supliment Rate.');
        }else if(sup_desc==''){
            $('#alert_con').show();
            $('#notify_con').html('* Please Enter Supliment Description.');
        }else{
            
            var chk_sup_codes = '';
            var chk_pos = 0;
            var chk_error = 0;
            
            $("#dat_optsup tr").each(function(index) {                
                chk_pos++;
                chk_sup_codes = $('#sup_code_adde_'+chk_pos).html();
                
              //  alert(chk_sup_codes);
                
                if(sup_code == chk_sup_codes){
                    chk_error++;
                }
                
                
            });           

            chk_pos = chk_pos+1;

            if(chk_error==0)
            {
                       
            var out_data_sup ='<td class="rm_supadd_'+chk_pos+'" id="sup_code_adde_'+chk_pos+'" style="text-align: center">'+sup_code+'</td>'+
              '<td class="rm_supadd_'+chk_pos+'" style="text-align: center">'+sup_rtype_str+
              '<input class="rm_supadd_'+chk_pos+'" id="rtype_added_'+chk_pos+'" type="hidden" value="'+sup_rtype+'"'+
              '</td>'+              
              '<td class="rm_supadd_'+chk_pos+'" id="sup_rate_adde_'+chk_pos+'" style="text-align: right">'+sup_rate+'</td>'+
              '<td class="rm_supadd_'+chk_pos+'" id="sup_desc_adde_'+chk_pos+'">'+sup_desc+'</td>'+
              '<td class="rm_supadd_'+chk_pos+'" style="text-align: center">'+
                     '<button class="btn btn-danger btn-sm rm_supadd_'+chk_pos+'" type="button" onclick="remove_suplmt('+chk_pos+')">'+
                             '<span class="rm_supadd_'+chk_pos+'">'+
                                '<i class="la la-trash rm_supadd_'+chk_pos+'"></i>'+
                                '<span class="rm_supadd_'+chk_pos+'">Remove</span>'+
                            '</span>'+
                     '</button>'+
              '</td>';

                $('#sup_code').val('');                              
                $('#sup_rate').val('');
                $('#sup_desc').val('');

            }else{
                $('#alert_con').show();
                $('#notify_con').html('* Supplements Code already added');
            }

          let hpDatasup = $('#dat_optsup');  
            hpDatasup.append($('<tr class="rm_supadd_'+chk_pos+'"></tr>')
                .html(out_data_sup));
        }

    }else{
        $('#alert_con').show();
        $('#notify_con').html('* Please Add Hotel Contract before enter optional supliments');
    }
}

function remove_suplmt(rowId_rm)
{
    var hpdCount = 0;
    $("#dat_optsup tr").each(function(index) {

    hpdCount++;
    });

   
    if(rowId_rm == hpdCount){

        $('.rm_supadd_'+rowId_rm).remove(); 

    }else{
         swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
     }   
}

function addDetails(){

                 var agent = $('#con_agent :selected').val();
                 var agent_show = $('#con_agent :selected').text();
                 var market = $('#con_market :selected').val();
                 var market_show = $('#con_market :selected').text();
		 		 var currency = $('#con_currency :selected').val();
                 var currency_show = $('#con_currency :selected').text();
				 var room_show = $('#con_rmtype :selected').text();
                 var room = $('#con_rmtype :selected').val();
		 		 var meal_plane_show = $('#con_meal_plane :selected').text();
                 var meal_plane = $('#con_meal_plane :selected').val();
				 var sgl  = parseFloat($('#con_sgl').val()).toFixed(2);
		 		 var dbl  = parseFloat($('#con_dbl').val()).toFixed(2);
				 var tbl  = parseFloat($('#con_tbl').val()).toFixed(2);
		 		 var child = parseFloat($('#con_child').val()).toFixed(2);
				 var exb  = parseFloat($('#con_exb').val()).toFixed(2);
				 var qbl = parseFloat($('#con_qbl').val()).toFixed(2);
                 var from_date=$('#con_from_date').val();
                 var to_date=$('#con_to_date').val();
                 var cnt_term=$('#h_contract').val();
                
if((cnt_term==1) && (from_date==0)){
    $('#alert_con').show();
    $('#notify_con').html('* Please Select From Date.');
}else if((cnt_term==1) && (to_date==0)){
    $('#alert_con').show();
    $('#notify_con').html('* Please Select To Date.');
}else if((cnt_term==1) && (from_date>to_date || from_date==to_date)){
    $('#alert_con').show();
    $('#notify_con').html('* Contract Period Is Invalid.');
}else if(agent==0){
    $('#alert_con').show();
    $('#notify_con').html('* Please Select Agent.'); 
}else if(market==0){
    $('#alert_con').show();
    $('#notify_con').html('* Please Select Market.');
}else if(currency==0){
    $('#alert_con').show();
    $('#notify_con').html('* Please Select Currency Type.');
}else if(room==0){
    $('#alert_con').show();
    $('#notify_con').html('* Please Select Room Type.');
}else if(meal_plane==0){
    $('#alert_con').show();
    $('#notify_con').html('* Please Select Meal Plane.');
}
// else if((sgl <1) || isNaN(sgl)==true){
//     $('#alert_con').show();
//     $('#notify_con').html('* Single Rate Can not be zero or null.');
// }else if((dbl <1) || isNaN(dbl)==true){
//     $('#alert_con').show();
//     $('#notify_con').html('* Double Rate Can not be zero or null.');
// }else if((tbl <1)|| isNaN(tbl)==true){
//     $('#alert_con').show();
//     $('#notify_con').html('* Trible Rate Can not be zero or null');
// }
 

else
{
    $('#alert_con').hide();

         var hpdCount = 1;

          $("#dat tr").each(function(index) {

           hpdCount++;
          });
            
          //console.log(miscCount);

    let hpData = $('#dat');  
    hpData.append($('<tr class="ht_hpd_'+hpdCount+'"></tr>')
    .html(   
            '<input id="agent_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+agent+'">'+
            '<input id="market_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+market+'">'+
            '<input id="currency_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+currency+'">'+
            '<input id="room_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+room+'">'+
            '<input id="mealplan_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+meal_plane+'">'+
            '<input id="sgl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+sgl+'">'+
            '<input id="dbl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+dbl+'">'+
            '<input id="tbl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+tbl+'">'+
            '<input id="qbl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+qbl+'">'+
            '<input id="child_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+child+'">'+
            '<input id="exb_id_'+hpdCount+'"  class="ht_hpd_'+hpdCount+'" type="hidden" value="'+exb+'">'+
            '<input id="fdate_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+from_date+'">'+
            '<input id="tdate_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+to_date+'">'+
            
            '<td style="text-align: center;" class="ht_hpd_'+hpdCount+'" >'+room_show+'</td>'+
            '<td style="text-align: center;" class="ht_hpd_'+hpdCount+'" >'+meal_plane_show+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+sgl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+dbl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+tbl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+qbl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+child+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+exb+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: center;">'+from_date+'</td>'+ 
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: center;">'+to_date+'</td>'+ 
            
                                
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: center;">'+
                        '<button onclick="removeHpd('+hpdCount+')"  type="button" class="btn btn-danger m-btn btn-sm m-btn--icon ht_hpd_'+hpdCount+'">'+
                                '<span class="ht_hpd_'+hpdCount+'">'+
                                    '<i class="la la-trash ht_hpd_'+hpdCount+'"></i>'+
                                    '<span class="ht_hpd_'+hpdCount+'">Remove</span>'+
                                '</span>'+
                        '</button>'+
            '</td>'));

    
}    
             
		}

 
    
  function removeHpd(hpdrowId){
   var  hpdCountRm = 0;
    

    $("#dat tr").each(function(index){

      hpdCountRm++;

    });


    
     if(hpdCountRm == hpdrowId){
        $('.ht_hpd_'+hpdrowId).remove(); 
        hpdCountRm = 0;
        hpdrowId=0;
       
    }
    else{
         swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
     }
  }


function saveHPDetails()
{

var hpdCountRm = 0;

$("#dat tr").each(function(index) {

hpdCountRm++;

});

//alert(hpdCountRm);

var hpd_dataStore = [];
var hpd_sup_list =[];

var chk_pos = 0;

            
      

var hasErrors =0;
if(hpdCountRm!=0){

                 var agent = $('#con_agent :selected').val();
                 var market = $('#con_market :selected').val();
		 		 var currency = $('#con_currency :selected').val();

     $("#dat_optsup tr").each(function(index) {                
        chk_pos++;
        var add_sup_codes = $('#sup_code_adde_'+chk_pos).html();
        var add_sup_rtype = $('#rtype_added_'+chk_pos).val();
        var add_sup_rate = $('#sup_rate_adde_'+chk_pos).html();
        var add_sup_desc = $('#sup_desc_adde_'+chk_pos).html();

        hpd_sup_list.push({

            code:add_sup_codes,
            rtype:add_sup_rtype,
            rate:add_sup_rate,
            desc:add_sup_desc
            
        });
    }); 
    
    for(var pos = 1; pos<=hpdCountRm; pos++){
        
        // var agent=$('#con_agent_id_'+pos).val();
        // var market=$('#con_market_id_'+pos).val();
        // var currency=$('#con_currency_id_'+pos).val();
        var room=$('#room_id_'+pos).val();
        var meal_plane=$('#mealplan_id_'+pos).val();
        var sgl = parseFloat($('#sgl_id_'+pos).val()).toFixed(2);
        var dbl = parseFloat($('#dbl_id_'+pos).val()).toFixed(2);
        var tbl = parseFloat($('#tbl_id_'+pos).val()).toFixed(2);
        var qbl = parseFloat($('#qbl_id_'+pos).val()).toFixed(2);
        var child = parseFloat($('#child_id_'+pos).val()).toFixed(2);
        var exb = parseFloat($('#exb_id_'+pos).val()).toFixed(2);
        var from_date = $('#fdate_id_'+pos).val();
        var to_date = $('#tdate_id_'+pos).val();
        
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

            pos:pos,
            hpsgl:sgl,
            hpdbl:dbl,
            hptbl:tbl,
            hpqbl:qbl,
            hpchild:child,
            hpexb:exb,
            hpfrom_date:from_date,
            hpto_date:to_date,
            hpmarket:market,
            hpagent:agent,
            hpcurrency:currency,
            hproom:room,
            hpmealplan:meal_plane
            

        });          
        
    }
    
}

var hotel =$('#con_hotel').val();
var hotel_package =$('#con_name').val();
var cnt_term=$('#h_contract').val();

if(hotel==''){
 $('#alert_con').show();
   $('#notify_con').html('*Please Select The the Hotel');
}else if(hotel_package==''){
   $('#alert_con').show();
    $('#notify_con').html('*Please Enter Package Name');
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
               hpd_sup_list:JSON.stringify(hpd_sup_list),hotel:hotel,hotel_package:hotel_package,cnt_term:cnt_term},
                   
               success: function(data) {
                
                  //console.log(data);

                  if(data=='saved'){
                   $('#alert_con').hide();
                   swal("Hotel Package Details Added Successfully!", "Success");
                  // window.location.replace('{{route('package_index')}}');
                     //window.location.reload();
                   //$("#add_HPdFrm")[0].reset();
                    $('#sup_code').val('');                              
                    $('#sup_rate').val('');
                    $('#sup_desc').val('');

                     $('#con_sgl').val('');
                     $('#con_dbl').val('');
                     $('#con_tbl').val('');
                     $('#con_qbl').val('');
                     $('#con_child').val('');
                     $('#con_exb').val('');
                     $('#con_name').val('');
                    
                    $('#dat_optsup').html('');
                    $('#dat').html('');

                    $('#txt_sr_id').val('');
                    fetch_quotation_data();


                   
               }else{
                   $('#alert_con').show();
                   $('#notify_con').html(data);
               }
                   
               }                                   
           })

}
//alert(hasErrors);

}
	    
	</script>