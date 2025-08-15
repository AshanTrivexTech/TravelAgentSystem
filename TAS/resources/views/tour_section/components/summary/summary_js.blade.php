<script>
$(document).ready(function(event){
    
    var taxCount = parseInt('{{$taxCount}}');
    var totalTaxAm = 0;
    var totalPaxCount = parseInt('{{$totaladltPax}}');
    var totalPaxCount_chld = parseInt('{{$totalChildPax}}');
    
    var guidefeecost_sm = parseFloat($('#guide_costex').html());
    var guideRmcost_sm = parseFloat($('#guide_rmcost').html());

    var accmd_pp_rate = parseFloat('{{$tourQuotHeader->pp_hotel_price}}');

    var guide_totCost_sm = guidefeecost_sm+guideRmcost_sm;


    var guidefeeMk_sm = parseFloat($('#guide_mkex').html());
    var guideRmMk_sm = parseFloat($('#guide_mkrm').html());    

    var guide_totMkp_sm = parseFloat(guidefeeMk_sm+guideRmMk_sm);

    
    var trp_totCost_sm = parseFloat($('#trp_totCost_bc').html());
    var trp_totMkp_sm = parseFloat($('#trp_ttmkp_bc').html());

    var misc_totCost_sm = parseFloat($('#mis_totCost_bc').html());
    var misc_totMkp_sm = parseFloat($('#mis_ttmkp_bc').html());

    var acmd =parseFloat($('#ttCostwith_sup_dbl').html());
    //var acmd_splmt_cmp = parseFloat($('#ttcost_dbl').html());
    var acmdMkp =parseFloat($('#ttmarkup_dbl').html());
    
    var chld_accmd_tot = 0;
    var chld_trsp_tot = 0;
    var chld_guide_tot =0;
    var chld_misc_tot = 0;

    var chld_total_forVat = 0;

    var totalforVat = ((guide_totCost_sm+guide_totMkp_sm))+
                         ((trp_totCost_sm+trp_totMkp_sm))+
                         ((misc_totCost_sm+misc_totMkp_sm));

    var totalPPrateforVat = ((guide_totCost_sm+guide_totMkp_sm)/totalPaxCount)+
                         ((trp_totCost_sm+trp_totMkp_sm)/totalPaxCount)+
                         ((misc_totCost_sm+misc_totMkp_sm)/totalPaxCount);
    
    if(totalPaxCount_chld>0){
        
        if('{{$chk_chld_acmd}}'==1){
            chld_accmd_tot = parseFloat($('#ttppr_chld').html());
            
        }
        
        if('{{$chk_chld_misc}}'==1){

            chld_misc_tot = parseFloat($('#mis_ppsr_bc_chld').html());
            
        }



         if('{{$chk_chld_guide}}'==1){
                            
            chld_guide_tot = ((((guide_totCost_sm+guide_totMkp_sm)/((totalPaxCount_chld/2)+totalPaxCount))/2.00));
        }

         if('{{$chk_chld_trsp}}'==1){
            
            chld_trsp_tot = ((((trp_totCost_sm+trp_totMkp_sm)/((totalPaxCount_chld/2)+totalPaxCount))/2.00));
            

        }
        

    }

  


    var acmd_pp_rate_ro = acmd/2.00;
    var acmdMkp_pp_rate_mkp = acmdMkp/2.00;
    $('#guideAc_cost').html(guide_totCost_sm.toFixed(2));
    $('#guideAc_mkp').html(guide_totMkp_sm.toFixed(2));
    $('#guideAc_total').html((guide_totCost_sm+guide_totMkp_sm).toFixed(2));
    

    $('#trport_cost').html(trp_totCost_sm.toFixed(2));
    $('#trport_mkp').html(trp_totMkp_sm.toFixed(2));
    $('#trport_total').html((trp_totCost_sm+trp_totMkp_sm).toFixed(2));
    
    $('#miscla_cost').html(misc_totCost_sm.toFixed(2));
    $('#miscla_mkp').html(misc_totMkp_sm.toFixed(2));
    $('#miscla_total').html((misc_totCost_sm+misc_totMkp_sm).toFixed(2));
    
        
    //alert(totalto_addVat);

    var guide_tax =0;
    var transport_tax =0;
    var misc_tax = 0;
    var htVatRate = 0;
    var tottaxAllAm = 0;
    var totalTaxAllForChld =0;
    for(var tp =1;tp<=taxCount; tp++ ){  

        var vatRate = $('#tax_ls_'+tp).val();
        
        htVatRate = parseFloat($('#tax_ls_'+1).val());

        if(vatRate!=0 || isNaN(vatRate) == false){
           
            totalTaxAm = ((totalPPrateforVat/100.00) * vatRate);    
            totalTaxAllForChld += (((chld_guide_tot+chld_misc_tot+chld_trsp_tot)/ 100.00) * vatRate); 
            guide_tax += ((guide_totCost_sm+guide_totMkp_sm)/100.00) * vatRate;
            transport_tax += ((trp_totCost_sm+trp_totMkp_sm)/100.00) * vatRate;
            misc_tax += ((misc_totCost_sm+misc_totMkp_sm)/100.00) * vatRate;
            
            tottaxAllAm += totalTaxAm;

           // alert(tottaxAllAm);
        }else{
            totalTaxAm = 0; 
        }
        
        var child_accmd_Vat = parseFloat(chld_accmd_tot-((chld_accmd_tot/(htVatRate+100)) * 100));
        var acmd_tttax_row = parseFloat((acmd_pp_rate_ro-((acmd_pp_rate_ro/(htVatRate+100)) * 100)));
        var acmdMkp_tttxa_row = parseFloat((acmdMkp_pp_rate_mkp-((acmdMkp_pp_rate_mkp/(htVatRate+100)) * 100)));
       // alert(acmd_tttax_row);
       if(tp==1){

            $('#taxlb_'+tp).html((totalTaxAm+acmd_tttax_row+acmdMkp_tttxa_row).toFixed(2));
            $('#taxlb_chld_'+tp).html((totalTaxAllForChld+child_accmd_Vat).toFixed(2));
       }
        //totalTaxAm +=totalTaxAm;
    }    
    
    var acm_cost_withoutVat = parseFloat((acmd/(htVatRate+100)) * 100);
    var acm_mkp_withoutvat = parseFloat((acmdMkp/(htVatRate+100)) * 100);

    var ppAcmd_withoutTax = parseFloat((acmd_pp_rate_ro/(htVatRate+100)) * 100);    
    var pp_chld_Acmd_withoutTax = parseFloat((chld_accmd_tot/(htVatRate+100)) * 100);

   // alert(ppAcmd_withoutTax);
    
    var acmdtotalVat = ((acm_cost_withoutVat+acm_mkp_withoutvat) / 100 * htVatRate);
    
    if(totalPaxCount_chld>0){

        $('#pprate_withoutTax_chld').html((pp_chld_Acmd_withoutTax+((chld_guide_tot+chld_misc_tot+chld_trsp_tot)-totalTaxAllForChld)).toFixed(2));
        
        if(tp==1){
           
        }
        
        $('#pp_with_taxs_chld').html((chld_accmd_tot+chld_guide_tot+chld_misc_tot+chld_trsp_tot).toFixed(2));
    }

    $('#guideAc_tax').html(guide_tax.toFixed(2));
    $('#trport_tax').html(transport_tax.toFixed(2));
    $('#miscla_tax').html(misc_tax.toFixed(2));
    $('#total_tax').html((guide_tax+transport_tax+misc_tax+acmdtotalVat).toFixed(2));
    $('#acm_rtw_tax').html(((acm_cost_withoutVat+acm_mkp_withoutvat)+(acmdtotalVat)).toFixed(2));
    $('#guideAc_rtw_tax').html(((guide_totCost_sm+guide_totMkp_sm)+(guide_tax)).toFixed(2));
    $('#trport_rtw_tax').html(((trp_totCost_sm+trp_totMkp_sm)+(transport_tax)).toFixed(2));
    $('#miscla_rtw_tax').html(((misc_totCost_sm+misc_totMkp_sm)+(misc_tax)).toFixed(2));
    
    
    $('#acm_cost').html(acm_cost_withoutVat.toFixed(2));
    $('#acm_mkp').html(acm_mkp_withoutvat.toFixed(2));
    $('#acm_total').html((acm_cost_withoutVat+acm_mkp_withoutvat).toFixed(2));
    $('#acm_tax').html(acmdtotalVat.toFixed(2));
    
    $('#total_cost').html((acm_cost_withoutVat+guide_totCost_sm+trp_totCost_sm+misc_totCost_sm).toFixed(2));
    $('#total_mkp').html((acmdMkp+guide_totMkp_sm+trp_totMkp_sm+misc_totMkp_sm).toFixed(2));
    $('#total_total').html((
        (acm_cost_withoutVat+acm_mkp_withoutvat)+
        (guide_totCost_sm+guide_totMkp_sm)+
        (trp_totCost_sm+trp_totMkp_sm)+
        (misc_totCost_sm+misc_totMkp_sm)).toFixed(2));
    $('#total_rwt_tax').html((((acm_cost_withoutVat+acm_mkp_withoutvat)+(acmdtotalVat))+((guide_totCost_sm+guide_totMkp_sm)+(guide_tax))+((trp_totCost_sm+trp_totMkp_sm)+(transport_tax))+((misc_totCost_sm+misc_totMkp_sm)+(misc_tax))).toFixed(2));

    var totalPPRateWithoutTax = totalPPrateforVat+ppAcmd_withoutTax+(acm_mkp_withoutvat/2.00);

    var totalPPRateWithTax = totalPPrateforVat+ppAcmd_withoutTax+(acm_mkp_withoutvat/2.00)+tottaxAllAm+(acmdtotalVat/2.00);
   
    //alert(acmdtotalVat);

    if(isNaN(totalPPRateWithoutTax)){
        totalPPRateWithoutTax=0;
    }

     if(isNaN(totalPPRateWithTax)){
        totalPPRateWithTax=0;
    }
    
    $('#pprate_withoutTax').html((totalPPRateWithoutTax).toFixed(2));

    $('#pp_with_taxs').html((totalPPRateWithTax).toFixed(2));
    


   





    //confirm
$('.alert').hide();
			
			//to close the alert window after popup 
$('#notify_close').click(function(event){
				$('.alert').hide();
			});
			// submit the form
			$( "#_b_final").click(function( event ) {
					
					//setup Ajax token ( without this function cannot pass data to controller)
                    
                    swal({
                            title: "Are you sure you want to Finalize this Quotation?",
                            text: "You also do modifications after the finalize",
                            icon: "info",
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willOk) => {
                                if (willOk) {
								

                    $.ajaxSetup({
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					  }
					});
	                      
                        var id='{{$tourID}}';

                        var sql_al = parseInt($('#sgl_room_al').val());
                        var dbl_al = parseInt($('#dbl_room_al').val());
                        var twn_al = parseInt($('#twn_room_al').val());
                        var tbl_al = parseInt($('#tbl_room_al').val());
                        var qd_al = parseInt($('#qd_room_al').val());

                        if(isNaN(sql_al)==true)
                        {
                            sql_al=0;
                        }
                        if(isNaN(dbl_al)==true)
                        {
                            dbl_al=0;
                        }
                        if(isNaN(twn_al)==true)
                        {
                            twn_al=0;
                        }
                        if(isNaN(tbl_al)==true)
                        {
                            tbl_al=0;
                        }
                        if(isNaN(qd_al)==true)
                        {
                            qd_al=0;
                        }
                    // console.log(id)
                        
                        var gp_paxrate = [];
                        var pax_slot_count = parseInt('{{$gp_paxSltCount}}');

                        for(var pax_slt =1; pax_slt<=pax_slot_count; pax_slt++){
                            
                            var pax_slt_rate_bnd = parseFloat($('#pax_slot_'+pax_slt).val());
                            var pax_slt_id_bnd = parseInt($('#pax_slot_id_'+pax_slt).val());
                            
                            gp_paxrate.push({
                                pos:pax_slt,
                                paxlstid:pax_slt_id_bnd,
                                pp_rate:pax_slt_rate_bnd.toFixed(2)
                            });

                        }

                        var pp_tour_adlt_rate = 0;
                        var pp_tour_chld_rate =0;

                        if('{{$tourQuotHeader->qtn_type}}'==1){
                            pp_tour_adlt_rate = parseFloat($('#pp_with_taxs').html());
                            pp_tour_chld_rate = parseFloat($('#pp_with_taxs_chld').html());;
                        }

                        //console.log(gp_paxrate);

					  $.ajax({
						
						url: '{{Route('quotation_finalize')}}',
						method: "POST",
						data: {id:id,sgl:sql_al,dbl:dbl_al,twn:twn_al,tbl:tbl_al,qd:qd_al,gp_paxrate:JSON.stringify(gp_paxrate),
                        pp_tour_adlt_rate:pp_tour_adlt_rate,pp_tour_chld_rate:pp_tour_chld_rate},
						success: function(data) {
								
							//console.log(data);
							//if Added 
							if(data=='added'){
								
                                $('.alert').hide();
								swal("Tour Quotation Finalized success!", "", "success");                                
                                window.location.reload();
							
								$("html, body").animate({
										scrollTop: 0
                                    });     
                                                              
							}else{
								// pop up error
                                 $('.alert').hide();
								swal("you cannot finalize in stage!", "", "error");
                               // window.location.reload();
									
									//$('#emp_listGrid').append(data);
																 
							}
							
							
						}
						})

                              
                                }
                                
                            });
	
	
				
			 });




$( "#_b_confirm").click(function( event ) {
					
					//setup Ajax token ( without this function cannot pass data to controller)
                    
                    swal({
                            title: "Are you sure you want to Confirm this Quotation?",
                            text: "You cannot do any modification after confirmation!, After start the Booking stage!",
                            icon: "info",
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willOk) => {
                                if (willOk) {
								

                                    $.ajaxSetup({
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					  }
					});
	                      
                        var t_id='{{$tourID}}';
                       // var pp_adult_rate = parseFloat($('#'))
                        
                    // console.log(id)
					  $.getJSON({


						
						url: '{{Route('quotation_confirm')}}',
						method: "POST",
						data: {id:t_id},
						success: function(data) {
								
							console.log(data);
							//if Added 
							if(data == 'added'){
								$('.alert').hide();
								swal("Tour Quotation Confirm success!", "", "success");
								
                                window.location.replace('{{route('quotation_index')}}');
								$("html, body").animate({
										scrollTop: 0
									});                               
							}else{
								// pop up error
                                 $('.alert').hide();
								swal("you cannot Confirm in stage!", "", "error");
									
									//$('#emp_listGrid').append(data);
																 
							}
							
							
						}
						})

                              
                                }
                                
                            });
	
	
				
			 });



});

function save_roomAllocation()
{
     $.ajaxSetup({
	  headers: {
		  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	  }
	});
	                      
        var tourid='{{$tourID}}';

        var sql_al = parseInt($('#sgl_room_al').val());
         var dbl_al = parseInt($('#dbl_room_al').val());
         var twn_al = parseInt($('#twn_room_al').val());
         var tbl_al = parseInt($('#tbl_room_al').val());
         var qd_al = parseInt($('#qd_room_al').val());

         if(isNaN(sql_al)==true)
          {
             sql_al=0;
         }

          if(isNaN(dbl_al)==true)
          {
             dbl_al=0;
         }
         

         if(isNaN(twn_al)==true)
                        {
                            twn_al=0;
         }
         if(isNaN(tbl_al)==true)
         {
             tbl_al=0;
         }

         if(isNaN(qd_al)==true)
         {
            qd_al=0;
         }
               
					  $.ajax({						
						url: '{{Route('update_room_allocation')}}',
						method: "POST",
						data: {tourid:tourid,sgl:sql_al,dbl:dbl_al,twn:twn_al,tbl:tbl_al,qd:qd_al},
						success: function(data) {
								
							console.log(data);
                            //swal("Room Allocation Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
							if(data == '"added"'){                                
								//$('.alert').hide();
								swal("Room Allocation Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                                
                                //window.location.reload();                                								                         
							}
							
							
						}
			})
}



</script>