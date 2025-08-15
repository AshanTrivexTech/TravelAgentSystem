<script>
function addMisc(){

var trp_totadpaxcount = parseFloat($('#no_of_packs_adult').val());

var miscID = parseInt($('#sl_mis').val());
var miscName = $('#sl_mis option:selected').text();
var miscrate = parseFloat($('#mis_rate_add').val());
var miscpax = parseFloat($('#mis_noofpax_add').val());
var miscqty = parseFloat($('#mis_qty_add').val());
var mistotlkr = parseFloat($('#mis_totlkr_add').val());
// var totLkr_add = parseFloat($('#vtotlkr_add').val());
var miscmkp = parseFloat($('#mis_mkp_add').val());
var mis_ex_rate=parseFloat($('#base_cur_sel').val());
var totpax_add = miscpax * miscqty;
var ex_code=$('#lb_dtex_rate').val();

var mist_rate_ctgry_id =  parseInt($('#lb_misc_rate_ctgry_id').val());

if(miscID==0){
    $('.alert').show();
    $('#notify').html('* Please Select Miscellaneous.');
}else if((miscqty <1) || isNaN(miscqty)==true){
    $('.alert').show();
    $('#notify').html('* Qty Can not be zero or null.');
}else if(isNaN(miscrate)==true){
    $('.alert').show();
    $('#notify').html('* Rate Can not be zero or null.');
}else if((miscmkp <0)|| isNaN(miscmkp)==true){
    $('.alert').show();
    $('#notify').html('* Markup Can not be zero or null');
}
// else if(totpax_add < trp_totadpaxcount){
//     $('.alert').show();
//     $('#notify').html('* Qty not enough.');
// }

else
{
    $('.alert').hide();

         var miscCount = 1;

          $("#mis_tbl tr").each(function(index) {

            miscCount++;
          });
                      
          //console.log(miscCount);

    let miscDgv = $('#mis_tbl');

    miscDgv.append($('<tr id="misc_tbltr_id_'+miscCount+'" class="Rm_misc_'+miscCount+'"></tr>')
    .html('<td style="text-align: center;" class="Rm_misc_'+miscCount+'" >'+miscName+'</td>'+

            '<input id="misc_id_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="'+miscID+'">'+
            '<input id="misc_qty_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="'+miscqty+'">'+
            '<input id="misc_ratelkr_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="'+miscrate+'">'+
            '<input id="misc_totallkr_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="'+mistotlkr+'">'+
            '<input id="misc_markup_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="'+miscmkp+'">'+
            '<input id="misc_exrate_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="'+mis_ex_rate+'">'+
            '<input id="misc_rate_ctgry_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="'+mist_rate_ctgry_id+'">'+
            '<input id="misc_addd_state_'+miscCount+'" class="Rm_misc_'+miscCount+'" type="hidden" value="1">'+

            '<td class="Rm_misc_'+miscCount+'" style="text-align: center;">'+miscpax+'</td>'+                
            '<td class="Rm_misc_'+miscCount+'" style="text-align: right;">'+miscrate.toFixed(2)+'</td>'+
            '<td class="Rm_misc_'+miscCount+'" style="text-align: center;">'+ex_code+'</td>'+
            '<td class="Rm_misc_'+miscCount+'" style="text-align: right;">'+mis_ex_rate+'</td>'+
            '<td class="Rm_misc_'+miscCount+'" style="text-align: right;">'+miscqty.toFixed(2)+'</td>'+
            '<td class="Rm_misc_'+miscCount+'" style="text-align: right;">'+mistotlkr.toFixed(2)+'</td>'+
            '<td class="Rm_misc_'+miscCount+'" style="text-align: right;">'+miscmkp.toFixed(2)+'</td>'+

            '<td class="Rm_misc_'+miscCount+'" style="text-align: center;">'+
                        '<button onclick="removeMisc('+miscCount+')" type="button" class="btn btn-danger m-btn btn-sm m-btn--icon Rm_misc_'+miscCount+'">'+
                                '<span class="Rm_misc_'+miscCount+'">'+
                                    '<i class="la la-trash Rm_misc_'+miscCount+'"></i>'+
                                    '<span class="Rm_misc_'+miscCount+'">Remove</span>'+
                                '</span>'+
                        '</button>'+
            '</td>'));

    
}


misc_CallAll();
}



function miscOnchange(){


var invalid_status=0;

                         var cur_a='{{$cur_id}}';
                        // var cur_b=data.cu_id;
    
    var miscID = $('#sl_mis').val();
    var trp_totadpaxcount = parseFloat($('#no_of_packs_adult').val());
    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
        });
    

   

        if(miscID!=0){
        
            $.getJSON({
                    
                    url: '{{Route('misc_findData')}}',
                    method: "POST",
                    data: {miscID:miscID,cur_a:cur_a},
                    success: function(data) {
                        
                        // console.log(data);

                        $('#lb_dta').html(data.code);
                        
                         $('#lb_dtex_rate').val(data.code);
                                
                       
                        if(data.code == '{{$baseCurrncyCode}}')
                        {
                            $('#base_cur_sel').val(1);
                        }
                        else{

                                 $('#base_cur_sel').val(data.data_mis);

                        }

                        
                        var baseCom = '{{$basecomisionRate}}';
                        var requredQty = 1;
                        var misc_mxpax = data.mc_pax;
                        var mspos =0;
                        var mscp =0;

                         

                        for(mspos=1; mspos <= trp_totadpaxcount; mspos++ ){
                            

                            if(mscp == (misc_mxpax)){
                                requredQty++;
                                mscp=0;
                            }

                            mscp++;
                        }
                      
                            // $('#mis_totlkr_add').val(mis_tot_ex);


                        var misc_bmkp = ((data.rate)*requredQty)/100.00 * baseCom;
                        var misc_tot_c = ((data.rate)*requredQty);
                        
                        $('#mis_noofpax_add').val(data.mc_pax);                       
                        $('#mis_rate_add').val((data.rate).toFixed(2));
                        $('#mis_qty_add').val(requredQty);
                        $('#mis_mkp_add').val(misc_bmkp.toFixed(2));
                        $('#lb_misc_rate_ctgry_id').val(data.misc_rt_ctgry);
                        // $('#mis_totlkr_add').val((mis_tot_ex).toFixed(2));   

                        var ex_st=$('#base_cur_sel').val();

                        var mis_rate=$('#mis_rate_add').val();

                        var mis_qt=$('#mis_qty_add').val();
                        
                        
                        var mis_tot_ex=(mis_rate/ex_st).toFixed(2);
                       

                        
                          var mis_e_tot=(mis_tot_ex*mis_qt).toFixed(2);
                        //   console.log(mis_e_tot); 
                          $('#mis_totlkr_add').val(mis_e_tot);
                          
                    }                                   
                }) 

             
        }

             
            
}

function misc_addCall(){

                        
        var baseCom = '{{$basecomisionRate}}';                     
                        
        var misc_ratelkrAcal = $('#mis_rate_add').val();
        var misc_qtyAcal = $('#mis_qty_add').val();
        var bscr_rate = parseFloat($('#base_cur_sel').val()); 
        
        var misc_bmkpadcal = ((misc_ratelkrAcal*misc_qtyAcal)/bscr_rate)/100.00 * baseCom;
        var misc_tot_cadcal = misc_ratelkrAcal*misc_qtyAcal;

        $('#mis_mkp_add').val(misc_bmkpadcal.toFixed(2));
        $('#mis_totlkr_add').val((misc_tot_cadcal).toFixed(2)); 

                        var ex_st=$('#base_cur_sel').val();

                        var mis_rate=$('#mis_rate_add').val();

                        var mis_qt=$('#mis_qty_add').val();
                        
                        
                        var mis_tot_ex=(mis_rate/ex_st).toFixed(2);
                       
                       
                          var mis_e_tot=(mis_tot_ex*mis_qt).toFixed(2);
                          //console.log(mis_e_tot); 
                          $('#mis_totlkr_add').val(mis_e_tot);

}


function misc_CallAll(){

    var trp_totadpaxcount = parseFloat($('#no_of_packs_adult').val());
    var trp_totadpaxcount_chld = parseFloat('{{$totalChildPax}}');
    var child_misc_cheked = parseInt('{{$chk_chld_misc}}');
    var miscCount = 0;

    var misc_totAm = 0;
    var misc_totMk = 0;

    var misc_totAm_chld = 0;
    var misc_totMk_chld = 0;

    $("#mis_tbl tr").each(function(index) {

        miscCount++;
    });

  // console.log(miscCount);

    for(var ms_i = 1;ms_i<= miscCount; ms_i++){
            var row_add_state = parseInt($('#misc_addd_state_'+ms_i).val());
        
        if(row_add_state > 0){
        
                var miscctid = parseInt($('#misc_rate_ctgry_'+ms_i).val());

                if(miscctid==1){

                    misc_totAm += parseFloat($('#misc_totallkr_'+ms_i).val());
                    misc_totMk += parseFloat($('#misc_markup_'+ms_i).val());
                
                    if(child_misc_cheked==1){
                        misc_totAm_chld += parseFloat($('#misc_totallkr_'+ms_i).val());
                        misc_totMk_chld += parseFloat($('#misc_markup_'+ms_i).val());
                    }
                

                }else if(miscctid==2){

                    misc_totAm += parseFloat($('#misc_totallkr_'+ms_i).val());
                    misc_totMk += parseFloat($('#misc_markup_'+ms_i).val());
                
                }else{
                    if(child_misc_cheked==1){

                        misc_totAm_chld += parseFloat($('#misc_totallkr_'+ms_i).val());
                        misc_totMk_chld += parseFloat($('#misc_markup_'+ms_i).val());

                    }
                }
        

        }
        
    }

    

    

    var ms_totAm_bs = parseFloat(misc_totAm);

    var ms_totMk_bs = parseFloat(misc_totMk);

    var ms_Mk_P = parseFloat((misc_totMk * 100.00)/misc_totAm);

     //var ms_totslrateLkr = parseFloat(misc_totAm+misc_totMk);
    var ms_totslrateBc = parseFloat(ms_totAm_bs+ms_totMk_bs);
   
    // var ms_ppsl_lkr = ms_totslrateLkr/trp_totadpaxcount;
    var ms_ppsl_Bc = ms_totslrateBc/trp_totadpaxcount;
    
    
    
    var ms_totAm_bs_chld = parseFloat(misc_totAm_chld);

    var ms_totMk_bs_chld = parseFloat(misc_totMk_chld);

    var ms_Mk_P_chld = parseFloat((misc_totMk_chld * 100.00)/misc_totAm_chld);

     //var ms_totslrateLkr = parseFloat(misc_totAm+misc_totMk);
    var ms_totslrateBc_chld = parseFloat(ms_totAm_bs_chld+ms_totMk_bs_chld);
   
    // var ms_ppsl_lkr = ms_totslrateLkr/trp_totadpaxcount;
    var ms_ppsl_Bc_chld = ms_totslrateBc_chld/trp_totadpaxcount_chld;
    

    // $('#mis_totCost_lk').html(parseFloat(misc_totAm).toFixed(2));
    $('#mis_totCost_bc').html(parseFloat(ms_totAm_bs).toFixed(2));
    
    //  $('#mis_ttmkp_lk').html(parseFloat(misc_totMk).toFixed(2));
    $('#mis_ttmkp_bc').html(parseFloat(ms_totMk_bs).toFixed(2));

    // $('#mis_sr_lkr').html(parseFloat(ms_totslrateLkr).toFixed(2));
    $('#mis_sr_bc').html(parseFloat(ms_totslrateBc).toFixed(2));

    // $('#mis_ppsr_lkr').html(parseFloat(ms_ppsl_lkr).toFixed(2));
    $('#mis_ppsr_bc').html(parseFloat(ms_ppsl_Bc).toFixed(2));

    // $('#mis_mkp_pc_lkr').html(parseFloat(ms_Mk_P).toFixed(3));
    $('#mis_mkp_pc_bc').html(parseFloat(ms_Mk_P).toFixed(3));

    // ==============================================================

    $('#mis_totCost_bc_chld').html(parseFloat(ms_totAm_bs_chld).toFixed(2));
    
    //  $('#mis_ttmkp_lk').html(parseFloat(misc_totMk).toFixed(2));
    $('#mis_ttmkp_bc_chld').html(parseFloat(ms_totMk_bs_chld).toFixed(2));

    // $('#mis_sr_lkr').html(parseFloat(ms_totslrateLkr).toFixed(2));
    $('#mis_sr_bc_chld').html(parseFloat(ms_totslrateBc_chld).toFixed(2));

    // $('#mis_ppsr_lkr').html(parseFloat(ms_ppsl_lkr).toFixed(2));
    $('#mis_ppsr_bc_chld').html(parseFloat(ms_ppsl_Bc_chld).toFixed(2));

    // $('#mis_mkp_pc_lkr').html(parseFloat(ms_Mk_P).toFixed(3));
    $('#mis_mkp_pc_bc_chld').html(parseFloat(ms_Mk_P_chld).toFixed(3));


} 

function removeMisc(msrowId){
    
    var miscCountRm = 0;

    $("#mis_tbl tr").each(function(index) {

    miscCountRm++;
    
    });
   

    if(miscCountRm == msrowId){
        $('.Rm_misc_'+msrowId).remove(); 
        // misc_CallAll();
    }else{
        
        $('#misc_tbltr_id_'+msrowId).hide();
        $('#misc_addd_state_'+msrowId).val(0);
        // swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
        // misc_CallAll();
    }

    misc_CallAll();
}

function saveMiscellaneous(){

    var miscCountRm = 0;

    $("#mis_tbl tr").each(function(index) {

    miscCountRm++;
    });

    

    var ms_dataStore = [];
    var hasErrors =0;

    if(miscCountRm!=0){
        var saved_pos = 1;

        for(var pos = 1; pos<=miscCountRm; pos++){
           
            if($('#misc_addd_state_'+pos).val()>0){
                // alert(pos);
                var mis_id = parseInt($('#misc_id_'+pos).val());
                var mis_qty = parseFloat($('#misc_qty_'+pos).val());
                var mis_rate = parseFloat($('#misc_ratelkr_'+pos).val());
                var mis_totlkr = parseFloat($('#misc_totallkr_'+pos).val());
                var mis_mkp = parseFloat($('#misc_markup_'+pos).val());
                var mis_ex_rt=$('#misc_exrate_'+pos).val();
                if(isNaN(mis_qty)==true){
                    hasErrors++;
                }
                if(isNaN(mis_ex_rt)==true){

                    hasErrors++;
                }

                if(isNaN(mis_rate) == true){
                    hasErrors++;
                }

                if(isNaN(mis_totlkr) == true){
                    hasErrors++;
                }

                if(isNaN(mis_mkp) == true){
                    hasErrors++;
                }
                
                ms_dataStore.push({

                    pos:saved_pos,
                    msid:mis_id,
                    msqty:mis_qty,
                    msrate:mis_rate,
                    mstotlkr:mis_totlkr,
                    msmk:mis_mkp,
                    mis_ex_rt:mis_ex_rt

                });  
                
                saved_pos++; 

             }
        }
    }

    // console.log(ms_dataStore);

    var misc_lkrtobscrrate =$('#misc_bstolkr').val();

    if((isNaN(misc_lkrtobscrrate) == true) || misc_lkrtobscrrate==0 ){
        misc_lkrtobscrrate = 1;
    }
 
    var tourID = '{{$tourID}}';
    var qoutheaderId ='{{$tourQuotHeaderId}}';
    var tourVersion ='{{$tourVersion}}';
    var ms_pprate = parseFloat($('#mis_ppsr_bc').html());

    console.log(ms_dataStore);
    if(hasErrors == 0){
           
           $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   }
           });

           $.getJSON({
                   
                   url: '{{Route('quot_misc_update')}}',
                   method: "POST",
                   data: {ms_dataStore:JSON.stringify(ms_dataStore),tourID:tourID,qoutheaderId:qoutheaderId,
                       tourVersion:tourVersion,ms_pprate:ms_pprate,baserate:misc_lkrtobscrrate},
                   success: function(data) {
                      
                      console.log(data);

                      if(data=='saved'){
                       $('.alert').hide();
                       $('#mis_tbl').html();
                       swal("Miscellaneous Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                       
                       //localStorage.setItem('activeTab', (7));
                       location.reload();
                   }else{
                       $('.alert').show();
                       $('#notify').html(data);
                   }
                       
                   }                                   
               })

   }



}

$(document).ready(function () {
    misc_CallAll();
});


</script>