<Script>




    var CurrentDay =0;
    

    function addHotel(dayId,day_date){
                        

                     $('#txt_sr_id').val('');
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
                     $('#con_from_date').val('');
                     $('#con_to_date').val('');
                     
                     $('#cmb_r_type_htmd').val('0').trigger('change');

                     $('#cmb_meal_plane_htmd').val('0').trigger('change');

                     $('#cmb_hotel_htmd').val('0').trigger('change');
                     
                     $('#con_market').val('1').trigger('change');
                
                     $('#con_agent').val('1').trigger('change');
                    
           $('#model_date').val(day_date);                
           $('#md_header').append().html('Select Hotels & Contracts to <span class=""> &nbsp;&nbsp;&nbsp;Day &nbsp;&nbsp;'+dayId+'&nbsp;&nbsp; Date &nbsp: &nbsp;&nbsp;'+ day_date+'</span>');
           $('#model_date_2').val(day_date);                
           $('#md_header_2').append().html('Select Hotels Supplement to <span class=""> &nbsp;&nbsp;&nbsp;Day &nbsp;&nbsp;'+dayId+'&nbsp;&nbsp; Date &nbsp: &nbsp;&nbsp;'+ day_date+'</span>');
           CurrentDay = dayId;
           fetch_quotation_data();

           
   }
   

   function sltr(id){
  //  alert('asdw');
    if($('#pktr_'+id).attr("class")!='selectedTr'){
       
        $('.selectedTr').removeClass('selectedTr');
       $('#pktr_'+id).addClass("selectedTr");
       
       //$(this).attr('id');
       var slrowPkID = id; //$(this).attr('name');
       var o =0;
       
       $('.textBox').prop('disabled', true);
       $('#sgl_'+slrowPkID).prop('disabled', false);
       $('#dbl_'+slrowPkID).prop('disabled', false);
       $('#tbl_'+slrowPkID).prop('disabled', false);
       $('#qtb_'+slrowPkID).prop('disabled', false);
       $('#gr_'+slrowPkID).prop('disabled', false);
       $('#child_rt_'+slrowPkID).prop('disabled', false);
       
    }
   }

   function addtoList(pkgid){

       

           //alert(pkgid);
      var bcCode_sup = '{{$baseCurrncyCode}}';
      var hotelName = $('#h_nm_'+pkgid).html();
      var pkgName = $('#pkgn_'+pkgid).html();
      var MarketCode = $('#mkt_'+pkgid).val();
      var roomType = $('#r_type_'+pkgid).val();
      var mealPlane = $('#mp_'+pkgid).val();
      var crCode = $('#cr_code_'+pkgid).html();
      var periodCode = $('#prd_'+pkgid).html();
      var supid = $('#supID_'+pkgid).val();   
      var cur_id = $('#curID_'+pkgid).val();
      
      var sgl = $('#sgl_'+pkgid).val();
      var dbl = $('#dbl_'+pkgid).val();
      var tbl = $('#tbl_'+pkgid).val();
      var qtb = $('#qtb_'+pkgid).val();
      var gr_rate = $('#gr_'+pkgid).val();
      var child_rt = $('#child_rt_'+pkgid).val();
      var cmpsupCount_ml = 0;
      var opsupCount_ml = 0;
      
      $('#cmp_sup_div_'+pkgid+' span').each(function(index) {

        cmpsupCount_ml++;

        });

        $('#ops_sup_div_'+pkgid+' span').each(function(index) {

        opsupCount_ml++;

        });
        
       // alert(cmpsupCount_ml);

      var baseComRate = parseFloat('{{$basecomisionRate}}');
     // var baseCrCode = parseFloat('{{$baseCurrncyCode}}');
    
     // alert(sgl); 
      var sglCom = sgl/100 * baseComRate;
      var dblCom = dbl/100 * baseComRate;
      var tblCom = tbl/100 * baseComRate;
      var qtbCom = qtb/100 * baseComRate;
      var childCom = child_rt/100 * baseComRate;
     // alert(sglCom);
    if(pkgid!=0)
    {
        var Rowcount = 0;
        var check_avb=0;
        $("#dttb_"+CurrentDay+" tr").each(function(index) {
            
            if($('#pkid_add_'+(Rowcount+1)+'_'+CurrentDay).val()==pkgid){
                check_avb=1;
            }

            Rowcount++;				
        });
        Rowcount++;
        
        if(check_avb==0)
        {

        

        //alert(Rowcount);
        let tableBody = $('#dttb_'+CurrentDay);

        // if(Rowcount==0){
        //     Rowcount=1;
        // }

        var cm_sup_out ='';
        var op_sup_out ='';
        var str_cmpsup_prnt ='<b class="m-badge m-badge--danger m-badge--wide Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">';

        var sup_comp_total = 0;
        var sup_opt_total = 0;
        var suplimt_countcmp =0;
        var suplimt_countopt =0;
        
        for(var ncmpsupPos = 1; ncmpsupPos<=cmpsupCount_ml; ncmpsupPos++){
            suplimt_countcmp++;
            var cmp_supId_lp_m = parseInt($('#cmpsup_id_added_lst_'+ncmpsupPos).val());
            var cmp_supamt_lp_m = parseFloat($('#cmpsup_amt_added_lst_'+ncmpsupPos).val());
            var cmp_supexrate_lp_m = parseFloat($('#cmpsup_exrate_added_lst_'+ncmpsupPos).val());
            var cmp_suprateType_lp_m = parseInt($('#cmpsup_rtype_added_lst_'+ncmpsupPos).val());

            var cmp_supType_lp = '';

            if(cmp_suprateType_lp_m==0){
                cmp_supType_lp = 'PP Rate';
            }else{
                cmp_supType_lp = 'PR Rate';
            }

            sup_comp_total += (cmp_supamt_lp_m/cmp_supexrate_lp_m);
            
            str_cmpsup_prnt +='CMP SUP/'+cmp_supType_lp+'/'+bcCode_sup+'/'+(cmp_supamt_lp_m/cmp_supexrate_lp_m).toFixed(2)+' , ';
            
            cm_sup_out += '<span class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                          '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" id="cmpsup_id_added_'+ncmpsupPos+'_'+Rowcount+'_'+CurrentDay+'" type="hidden" value = "'+cmp_supId_lp_m+'">'+
                          '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" id="cmpsup_amt_added_'+ncmpsupPos+'_'+Rowcount+'_'+CurrentDay+'" type="hidden" value = "'+cmp_supamt_lp_m+'">'+
                          '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" id="cmpsup_exrate_added_'+ncmpsupPos+'_'+Rowcount+'_'+CurrentDay+'" type="hidden" value = "'+cmp_supexrate_lp_m+'">'+
                          '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" id="cmpsup_ratetype_added_'+ncmpsupPos+'_'+Rowcount+'_'+CurrentDay+'" type="hidden" value = "'+cmp_suprateType_lp_m+'"></span>';
        }
        str_cmpsup_prnt+='</b>'

        var str_optsup_prnt ='<b class="m-badge m-badge--warning m-badge--wide Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">';


        for(var noptsupPos = 1; noptsupPos<=opsupCount_ml; noptsupPos++){
            suplimt_countopt++;
           var opt_supId_lp_m = parseInt($('#optsup_id_added_lst_'+noptsupPos).val());
           var opt_supamt_lp_m = parseFloat($('#optsup_amt_added_lst_'+noptsupPos).val());           
           var opt_suprateType_lp_m = parseInt($('#optsup_rtype_added_lst_'+noptsupPos).val());
           sup_opt_total += opt_supamt_lp_m;
            
           var opt_supType_lp = '';

            if(opt_suprateType_lp_m==0){
                opt_supType_lp = 'PP Rate';
            }else{
                opt_supType_lp = 'PR Rate';
            }
            str_optsup_prnt +='OPT SUP/'+opt_supType_lp+'/'+crCode+'/'+(sup_opt_total.toFixed(2))+' , ';

           op_sup_out += '<span class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                         '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" id="optsup_id_added_'+noptsupPos+'_'+Rowcount+'_'+CurrentDay+'" type="hidden" value = "'+opt_supId_lp_m+'">'+
                         '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" id="optsup_amt_added_'+noptsupPos+'_'+Rowcount+'_'+CurrentDay+'" type="hidden" value = "'+opt_supamt_lp_m+'">'+                         
                         '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" id="optsup_ratetype_added_'+noptsupPos+'_'+Rowcount+'_'+CurrentDay+'" type="hidden" value = "'+opt_suprateType_lp_m+'"></span>';
       }
       str_optsup_prnt+='</b>'; 

          if(suplimt_countcmp==0){
            str_cmpsup_prnt='';
          }   
          if(suplimt_countopt==0){
            str_optsup_prnt='';
          }    
        //alert(cm_sup_out);
            
        tableBody.append($('<tr class="table-primary Remove_Hotel_'+Rowcount+'_'+CurrentDay+' sm"></tr>').attr('id','tbr_'+Rowcount+'_'+CurrentDay)
        .html('<td  class="table-primary Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                    // '<button type="button" class="btn btn-brand m-btn btn-sm m-btn m-btn--icon Remove_Hotel">'+
                    '<b class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                    '<span class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'"><i class="la la-hotel Remove_Hotel_'+Rowcount+'_'+CurrentDay+'"></i>'+
                    '<span class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">&nbsp;'+hotelName+'/'+roomType+'-'+mealPlane+' / SG '+sgl+' / DB '+dbl+' / TR '+tbl+' / QTB '+qtb+' / GR '+gr_rate+' / CR '+child_rt+ ' &nbsp; ('+periodCode+')'+
                    '&nbsp;&nbsp;'+str_cmpsup_prnt+' '+str_optsup_prnt+'</span>'+
                    '</span></b>'+
                    '<input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="sgl_add_'+Rowcount+'_'+CurrentDay+'" value="'+sgl+'"></input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="dbl_add_'+Rowcount+'_'+CurrentDay+'" value="'+dbl+'">'+
                    '</input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="tbl_add_'+Rowcount+'_'+CurrentDay+'" value="'+tbl+'"></input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="qtb_add_'+Rowcount+'_'+CurrentDay+'" value="'+qtb+'"></input>'+
                    '</input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="gr_add_'+Rowcount+'_'+CurrentDay+'" value="'+gr_rate+'">'+
                    '</input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="child_rt_add_'+Rowcount+'_'+CurrentDay+'" value="'+child_rt+'">'+
                    '</input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="pkid_add_'+Rowcount+'_'+CurrentDay+'" value="'+pkgid+'"></input>'+
                    '</input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="supid_add_'+Rowcount+'_'+CurrentDay+'" value="'+supid+'"></input>'+
                    '</input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="curID_'+Rowcount+'_'+CurrentDay+'" value="'+cur_id+'"></input>'+
                    '</input> <input class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" type="hidden" id="status_add_'+Rowcount+'_'+CurrentDay+'" value="1"></input>'+

                    '<div id="comsup_mlist_'+Rowcount+'_'+CurrentDay+'" class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+cm_sup_out+'</div>'+
                    '<div id="optsup_mlist_'+Rowcount+'_'+CurrentDay+'" class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+op_sup_out+'</div>'+
               '</td>'+
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                        crCode+
                '</td>'+
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                    '<input onkeyup="CalAll()" id="cr_rate_add_'+Rowcount+'_'+CurrentDay+'" value="1" placeholder="0.00" style="text-align: center;" type="text" class="form-control form-control-sm cal Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                '</td>'+ 
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                    '<input onkeyup="CalAll()" id="sglCom_add_'+Rowcount+'_'+CurrentDay+'"  value="'+sglCom.toFixed(2)+'" placeholder="0.00" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                '</td>'+
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                    '<input onkeyup="CalAll()" id="dblCom_add_'+Rowcount+'_'+CurrentDay+'" value="'+dblCom.toFixed(2)+'" placeholder="0.00" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                '</td>'+
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                    '<input onkeyup="CalAll()" id="tblCom_add_'+Rowcount+'_'+CurrentDay+'" value="'+tblCom.toFixed(2)+'" placeholder="0.00" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                '</td>'+
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                    '<input onkeyup="CalAll()" id="qtbCom_add_'+Rowcount+'_'+CurrentDay+'" value="'+qtbCom.toFixed(2)+'" placeholder="0.00" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                '</td>'+
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                    '<input onkeyup="CalAll()" id="childCom_add_'+Rowcount+'_'+CurrentDay+'" value="'+childCom.toFixed(2)+'" placeholder="0.00" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                '</td>'+
                '<td class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'" style="text-align: center;">'+
                    '<button type="button" onClick="RemovePkg('+Rowcount+','+CurrentDay+')" class="btn btn-danger m-btn btn-sm m-btn--icon Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">'+
                    '<span class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'"><i class="la la-trash Remove_Hotel_'+Rowcount+'_'+CurrentDay+'"></i><span class="Remove_Hotel_'+Rowcount+'_'+CurrentDay+'">Remove</span></span></button>'+                    
                '</td>'));                        
        }
        else{
            swal("Sorry! you cannot add same package on same day.",""+'', "error");
        }

    }

       CalHotelrate();
   }
   
 function RemovePkg(rowid,tday){
     var rcout = 0;
     $("#dttb_"+tday+" tr").each(function(index) {
        
        rcout++;
    });
    //alert(rcout);

    if(rowid==rcout){
    $('.Remove_Hotel_'+rowid+'_'+tday).remove();
    CalHotelrate();
    }else{
        //alert('Sorry! You cannt remove this item');
        swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
    }

 }
    
// function addSupliment(rowIdPosSp,dayID_sp){

//    //alert('sdawda');

// }
  

  
  


   function CalHotelrate()
   {
      
    var countRw = parseFloat('{{$noOfDays}}');
    //alert(countRw);
    var tot_sgl_cost =0;
    var tot_dbl_cost =0;
    var tot_tbl_cost =0;
    var tot_qtb_cost =0;
    var tot_chld_cost =0;
    
    var tot_sgl_mkup =0;
    var tot_dbl_mkup =0;
    var tot_tbl_mkup =0;
    var tot_qtb_mkup =0;
    var tot_chld_mkup =0;
    
    var totComp_supliment_sgl =0;
    var totOpt_supliment_sgl =0;

    var totComp_supliment_dbl =0;
    var totOpt_supliment_dbl =0;

    var totComp_supliment_tbl =0;
    var totOpt_supliment_tbl =0;

    var totComp_supliment_qd =0;
    var totOpt_supliment_qd =0;
    


    var rowId = 0;
    //------------------------
    
    for(rowId = 1; rowId <= countRw; rowId++){
        
        var sglcost,dblcost,tblcost,qtbcost,chlcost;
        var sglmkup,dblmkup,tblmkup,qtbmkup,chlmkup;
            sglcost=0;dblcost=0;tblcost=0;qtbcost=0,chlcost=0;
            sglmkup=0,dblmkup=0,tblmkup=0,qtbmkup=0,chlmkup=0;
        var htpos=0;
        
        // var rowCountSupcmp =0;
        // var rowCountSupopt =0;
        
        var bkdate = $('date_'+rowId).val();
          
         $("#dttb_"+rowId+" tr").each(function(index) {
            
            htpos++;
            var sglVal = parseFloat($('#sgl_add_'+htpos+'_'+rowId).val());
            var dblVal = parseFloat($('#dbl_add_'+htpos+'_'+rowId).val());
            var tblVal = parseFloat($('#tbl_add_'+htpos+'_'+rowId).val());
            var qtbVal = parseFloat($('#qtb_add_'+htpos+'_'+rowId).val());
            var chlVal = parseFloat($('#child_rt_add_'+htpos+'_'+rowId).val());
            
            var sglmk = parseFloat($('#sglCom_add_'+htpos+'_'+rowId).val());
            var dblmk = parseFloat($('#dblCom_add_'+htpos+'_'+rowId).val());
            var tblmk = parseFloat($('#tblCom_add_'+htpos+'_'+rowId).val());
            var qtbmk = parseFloat($('#qtbCom_add_'+htpos+'_'+rowId).val());
            var chlmk = parseFloat($('#childCom_add_'+htpos+'_'+rowId).val());
            
            var BaseCrRatetoPkRate = 1;
           
           if(isNaN(parseFloat($('#cr_rate_add_'+htpos+'_'+rowId).val() )) == false)
           {   
               
                BaseCrRatetoPkRate = parseFloat($('#cr_rate_add_'+htpos+'_'+rowId).val());
                if(BaseCrRatetoPkRate==0){
                    BaseCrRatetoPkRate=1;
                }

           }

            var suppos = 0;
            
            $('#comsup_mlist_'+htpos+'_'+rowId+' span').each(function(index) {
                suppos++;
                var csup_val = parseFloat($('#cmpsup_amt_added_'+suppos+'_'+htpos+'_'+rowId).val());
                var csup_Exrateval = parseFloat($('#cmpsup_exrate_added_'+suppos+'_'+htpos+'_'+rowId).val());
                var csup_rt_type = parseFloat($('#cmpsup_ratetype_added_'+suppos+'_'+htpos+'_'+rowId).val());
                
                if(csup_rt_type==0){
                    totComp_supliment_sgl += (csup_val/csup_Exrateval);
                    totComp_supliment_dbl += (csup_val/csup_Exrateval)*2;
                    totComp_supliment_tbl += (csup_val/csup_Exrateval)*3;
                    totComp_supliment_qd  += (csup_val/csup_Exrateval)*4;
                }else{
                    totComp_supliment_sgl += (csup_val/csup_Exrateval);
                    totComp_supliment_dbl += (csup_val/csup_Exrateval);
                    totComp_supliment_tbl += (csup_val/csup_Exrateval);
                    totComp_supliment_qd  += (csup_val/csup_Exrateval); 
                }
            });
            
            suppos =0;

            $('#optsup_mlist_'+htpos+'_'+rowId+' span').each(function(index) {
                suppos++;
                var opsup_val = parseFloat($('#optsup_amt_added_'+suppos+'_'+htpos+'_'+rowId).val());               
                var opsup_rt_type = parseFloat($('#optsup_ratetype_added_'+suppos+'_'+htpos+'_'+rowId).val());
                
                if(opsup_rt_type==0){

                    totOpt_supliment_sgl += (opsup_val/BaseCrRatetoPkRate);
                    totOpt_supliment_dbl += (opsup_val/BaseCrRatetoPkRate)*2;
                    totOpt_supliment_tbl += (opsup_val/BaseCrRatetoPkRate)*3;
                    totOpt_supliment_qd +=(opsup_val/BaseCrRatetoPkRate)*4;

                }else{
                    totOpt_supliment_sgl += (opsup_val/BaseCrRatetoPkRate);
                    totOpt_supliment_dbl += (opsup_val/BaseCrRatetoPkRate);
                    totOpt_supliment_tbl += (opsup_val/BaseCrRatetoPkRate);
                    totOpt_supliment_qd +=(opsup_val/BaseCrRatetoPkRate);
                }
            });
           
            
            
           // alert(sglmk);
            
            if(isNaN(sglVal) == false){
                 sglcost += parseFloat(sglVal/BaseCrRatetoPkRate);
            }
            if(isNaN(dblVal) == false){
                dblcost += parseFloat(dblVal/BaseCrRatetoPkRate);
            }
            if(isNaN(tblVal) == false){
                tblcost += parseFloat(tblVal/BaseCrRatetoPkRate);
            }
            if(isNaN(qtbVal) == false){
                qtbcost += parseFloat(qtbVal/BaseCrRatetoPkRate);
            }
            if(isNaN(chlVal) == false){
                chlcost += parseFloat(chlVal/BaseCrRatetoPkRate);
            }


            //==============================
            if(isNaN(sglmk) == false){
                sglmkup += parseFloat(sglmk);
            }
            if(isNaN(dblmk) == false){
                dblmkup += parseFloat(dblmk);
            }
            if(isNaN(tblmk) == false){
                tblmkup += parseFloat(tblmk);
            }
            if(isNaN(qtbmk) == false){
                qtbmkup += parseFloat(qtbmk);
            }
            if(isNaN(chlmk) == false){
                chlmkup += parseFloat(chlmk);
            }

           //alert(sglcost);
         });
        
        tot_sgl_cost += sglcost;
        tot_dbl_cost += dblcost;
        tot_tbl_cost += tblcost;
        tot_qtb_cost += qtbcost;
        tot_chld_cost += chlcost;
         

        tot_sgl_mkup += sglmkup;
        tot_dbl_mkup += dblmkup;
        tot_tbl_mkup += tblmkup;
        tot_qtb_mkup += qtbmkup;
        tot_chld_mkup += chlmkup;
         

    }
    
       

    $('#ttcost_sgl').html(parseFloat(tot_sgl_cost).toFixed(2));
    $('#ttcost_dbl').html(parseFloat(tot_dbl_cost).toFixed(2));
    $('#ttcost_tbl').html(parseFloat(tot_tbl_cost).toFixed(2));
    $('#ttcost_qtb').html(parseFloat(tot_qtb_cost).toFixed(2));
    $('#ttcost_chld').html(parseFloat(tot_chld_cost).toFixed(2));
    
    $('#ttcom_sup_sgl').html(parseFloat(totComp_supliment_sgl).toFixed(2));
    $('#ttcom_sup_dbl').html(parseFloat(totComp_supliment_dbl).toFixed(2));
    $('#ttcom_sup_tbl').html(parseFloat(totComp_supliment_tbl).toFixed(2));
    $('#ttcom_sup_qtb').html(parseFloat(totComp_supliment_qd).toFixed(2));

    $('#ttopt_sup_sgl').html(parseFloat(totOpt_supliment_sgl).toFixed(2));
    $('#ttopt_sup_dbl').html(parseFloat(totOpt_supliment_dbl).toFixed(2));
    $('#ttopt_sup_tbl').html(parseFloat(totOpt_supliment_tbl).toFixed(2));
    $('#ttopt_sup_qtb').html(parseFloat(totOpt_supliment_qd).toFixed(2));

    var totalwithsup_sgl = (tot_sgl_cost+totComp_supliment_sgl+totOpt_supliment_sgl);
    var totalwithsup_dbl = (tot_dbl_cost+totComp_supliment_dbl+totOpt_supliment_dbl);
    var totalwithsup_tbl = (tot_tbl_cost+totComp_supliment_tbl+totOpt_supliment_tbl);
    var totalwithsup_qd = (tot_qtb_cost+totComp_supliment_qd+totOpt_supliment_qd);

    $('#ttCostwith_sup_sgl').html(parseFloat(tot_sgl_cost+totComp_supliment_sgl+totOpt_supliment_sgl).toFixed(2));
    $('#ttCostwith_sup_dbl').html(parseFloat(tot_dbl_cost+totComp_supliment_dbl+totOpt_supliment_dbl).toFixed(2));
    $('#ttCostwith_sup_tbl').html(parseFloat(tot_tbl_cost+totComp_supliment_tbl+totOpt_supliment_tbl).toFixed(2));
    $('#ttCostwith_sup_qtb').html(parseFloat(tot_qtb_cost+totComp_supliment_qd+totOpt_supliment_qd).toFixed(2));
    
    
    $('#ttmarkup_sgl').html(parseFloat(tot_sgl_mkup).toFixed(2));
    $('#ttmarkup_dbl').html(parseFloat(tot_dbl_mkup).toFixed(2));
    $('#ttmarkup_trb').html(parseFloat(tot_tbl_mkup).toFixed(2));
    $('#ttmarkup_qtb').html(parseFloat(tot_qtb_mkup).toFixed(2));
    $('#ttmarkup_chld').html(parseFloat(tot_chld_mkup).toFixed(2));
    
    $('#ttselling_sgl').html(parseFloat(tot_sgl_mkup+totalwithsup_sgl).toFixed(2));
    $('#ttselling_dbl').html(parseFloat(tot_dbl_mkup+totalwithsup_dbl).toFixed(2));
    $('#ttselling_trb').html(parseFloat(tot_tbl_mkup+totalwithsup_tbl).toFixed(2));
    $('#ttselling_qtb').html(parseFloat(tot_qtb_mkup+totalwithsup_qd).toFixed(2));
    $('#ttselling_chld').html(parseFloat(tot_chld_mkup+tot_chld_cost).toFixed(2));
    
    $('#ttppr_sgl').html(parseFloat(tot_sgl_mkup+totalwithsup_sgl).toFixed(2));
    $('#ttppr_dbl').html(parseFloat((tot_dbl_mkup+totalwithsup_dbl)/2.0).toFixed(2));
    $('#ttppr_trb').html(parseFloat((tot_tbl_mkup+totalwithsup_tbl)/3.0).toFixed(2));
    $('#ttppr_qtb').html(parseFloat((tot_qtb_mkup+totalwithsup_qd)/4.0).toFixed(2));
    $('#ttppr_chld').html(parseFloat(tot_chld_mkup+tot_chld_cost).toFixed(2));
    
    $('#avgmarkup_sgl').html(parseFloat((tot_sgl_mkup*100.00)/(totalwithsup_sgl)).toFixed(3)+'%');
    $('#avgmarkup_dbl').html(parseFloat((tot_dbl_mkup*100.00)/(totalwithsup_dbl)).toFixed(3)+'%');
    $('#avgmarkup_trb').html(parseFloat((tot_tbl_mkup*100.00)/(totalwithsup_tbl)).toFixed(3)+'%');
    $('#avgmarkup_qtb').html(parseFloat((tot_qtb_mkup*100.00)/(totalwithsup_qd)).toFixed(3)+'%');
    $('#avgmarkup_chld').html(parseFloat((tot_chld_mkup*100.00)/(tot_chld_cost)).toFixed(3)+'%');
    
    $('#single_sup').html(parseFloat((tot_sgl_mkup+totalwithsup_sgl)-((tot_dbl_mkup+totalwithsup_dbl)/2.0)).toFixed(2));
    $('#trp_reduc').html(parseFloat(((tot_dbl_mkup+totalwithsup_dbl)/2)-((tot_tbl_mkup+totalwithsup_tbl)/3.0)).toFixed(2));
    $('#qtr_reduc').html(parseFloat(((tot_dbl_mkup+totalwithsup_dbl)/2)-((tot_qtb_mkup+totalwithsup_qd)/4.0)).toFixed(2));
    

}
      

function CalAll(){
        
    CalHotelrate();
}

function save_Hotels(){
        
    var hotesPkgData =[];
    var hotelbkDays =[];
    var comp_supliments =[];
    var Opti_supliments =[];
   // totOpt_supliment_qd =2;
    var SavetotComp_supliment_sgl =0;
    var SavetotOpt_supliment_sgl =0;

    var SavetotComp_supliment_dbl =0;
    var SavetotOpt_supliment_dbl =0;

    var SavetotComp_supliment_tbl =0;
    var SavetotOpt_supliment_tbl =0;

    var SavetotComp_supliment_qd =0;
    var SavetotOpt_supliment_qd =0;

    var no_of_adtPax = parseInt('{{$totaladltPax}}');

    var countRw = parseFloat('{{$noOfDays}}');
    //alert(countRw);
    var tot_sgl_cost =0;
    var tot_dbl_cost =0;
    var tot_tbl_cost =0;
    var tot_qtb_cost =0;
    
    var tot_sgl_mkup =0;
    var tot_dbl_mkup =0;
    var tot_tbl_mkup =0;
    var tot_qtb_mkup =0;
    
    var rowId = 0;
    //------------------------
    var NoofHotels=0;
    var tourID = '{{$tourID}}';
    var qoutheaderId ='{{$tourQuotHeaderId}}';
    var tourStDate = '{{$tourStDate}}';
    var tourVersion ='{{$tourVersion}}';
    var exp_pkgs = 0;
    for(rowId = 1; rowId <= countRw; rowId++){
        
        var sglcost,dblcost,tblcost,qtbcost;
        var sglmkup,dblmkup,tblmkup,qtbmkup;
            sglcost=0;dblcost=0;tblcost=0;qtbcost=0;
            sglmkup=0,dblmkup=0,tblmkup=0,qtbmkup=0;
        var htpos=0;
        var hotelRowCount=0;

        hotelbkDays.push({
            tour_qout_headerID:qoutheaderId,
            tourID:tourID,
            tourDay:rowId
        });
        
        $("#dttb_"+rowId+" tr").each(function(index) {
            
            hotelRowCount++;
        });

     //   console.log(hotelRowCount);

        var bkdate = $('date_'+rowId).val();
        var  ratesNull = 0;
        
        
        
        for(htpos=1; htpos <= hotelRowCount; htpos++){
                            
            var SavetotComp_supliment_sgl = 0;
            var SavetotOpt_supliment_sgl = 0;

            var SavetotComp_supliment_dbl =0;
            var SavetotOpt_supliment_dbl =0;

            var SavetotComp_supliment_tbl =0;
            var SavetotOpt_supliment_tbl =0;

            var SavetotComp_supliment_qd =0;
            var SavetotOpt_supliment_qd =0;
            
            var sglVal = parseFloat($('#sgl_add_'+htpos+'_'+rowId).val());
            var dblVal = parseFloat($('#dbl_add_'+htpos+'_'+rowId).val());
            var tblVal = parseFloat($('#tbl_add_'+htpos+'_'+rowId).val());
            var qtbVal = parseFloat($('#qtb_add_'+htpos+'_'+rowId).val());
            var grVal  = parseFloat($('#gr_add_'+htpos+'_'+rowId).val());
            var ch_rate  = parseFloat($('#child_rt_add_'+htpos+'_'+rowId).val());
            
            var sglmk = parseFloat($('#sglCom_add_'+htpos+'_'+rowId).val());
            var dblmk = parseFloat($('#dblCom_add_'+htpos+'_'+rowId).val());
            var tblmk = parseFloat($('#tblCom_add_'+htpos+'_'+rowId).val());
            var qtbmk = parseFloat($('#qtbCom_add_'+htpos+'_'+rowId).val());
            var ch_com = parseFloat($('#childCom_add_'+htpos+'_'+rowId).val());
            
            var sup_id = $('#supid_add_'+htpos+'_'+rowId).val();
            var pkg_id = $('#pkid_add_'+htpos+'_'+rowId).val();
            var cr_id = $('#curID_'+htpos+'_'+rowId).val();
           // var base_cr_rate = $('#cr_rate_add_'+htpos+'_'+rowId).val();
             //console.log(cr_id);

            if(parseInt($('#status_add_'+htpos+'_'+rowId).val())==4){
                exp_pkgs++;
            }

           var BaseCrRatetoPkRate = 1;
           
            if(isNaN(parseFloat( $('#cr_rate_add_'+htpos+'_'+rowId).val() )) == false)
            {   
                
                 BaseCrRatetoPkRate = parseFloat($('#cr_rate_add_'+htpos+'_'+rowId).val());
                 if(BaseCrRatetoPkRate==0){
                     BaseCrRatetoPkRate=1;
                     ratesNull++;

                 }

            }

    //============================================================================================

        var suppos =0 ;
            
            $('#comsup_mlist_'+htpos+'_'+rowId+' span').each(function(index) {
                suppos++;
                var csup_id = parseInt($('#cmpsup_id_added_'+suppos+'_'+htpos+'_'+rowId).val());   
                var csup_val = parseFloat($('#cmpsup_amt_added_'+suppos+'_'+htpos+'_'+rowId).val());
                var csup_Exrateval = parseFloat($('#cmpsup_exrate_added_'+suppos+'_'+htpos+'_'+rowId).val());
                var csup_rt_type = parseFloat($('#cmpsup_ratetype_added_'+suppos+'_'+htpos+'_'+rowId).val());

                comp_supliments.push({
                        cm_sup_day:rowId,
                        cm_htpos:htpos,
                        cm_spos:suppos,
                        cm_sup_id:csup_id,
                        cm_sup_am:csup_val,
                        cm_sup_exrt:csup_Exrateval,
                        cm_sup_rtype:csup_rt_type
                });
                
                if(csup_rt_type==0){
                    SavetotComp_supliment_sgl += (csup_val/csup_Exrateval);
                    SavetotComp_supliment_dbl += (csup_val/csup_Exrateval)*2;
                    SavetotComp_supliment_tbl += (csup_val/csup_Exrateval)*3;
                    SavetotComp_supliment_qd  += (csup_val/csup_Exrateval)*4;
                }else{
                    SavetotComp_supliment_sgl += (csup_val/csup_Exrateval);
                    SavetotComp_supliment_dbl += (csup_val/csup_Exrateval);
                    SavetotComp_supliment_tbl += (csup_val/csup_Exrateval);
                    SavetotComp_supliment_qd  += (csup_val/csup_Exrateval); 
                }

            });
            
            suppos =0;

            $('#optsup_mlist_'+htpos+'_'+rowId+' span').each(function(index) {
                suppos++;
                var osup_id = parseInt($('#optsup_id_added_'+suppos+'_'+htpos+'_'+rowId).val());   
                var opsup_val = parseFloat($('#optsup_amt_added_'+suppos+'_'+htpos+'_'+rowId).val());               
                var opsup_rt_type = parseFloat($('#optsup_ratetype_added_'+suppos+'_'+htpos+'_'+rowId).val());
                
                Opti_supliments.push({
                        op_sup_day:rowId,
                        op_htpos:htpos,
                        op_spos:suppos,
                        op_sup_id:osup_id,
                        op_sup_am:opsup_val,                        
                        op_sup_rtype:opsup_rt_type

                });
                
                if(opsup_rt_type==0){

                    SavetotOpt_supliment_sgl += (opsup_val/BaseCrRatetoPkRate);
                    SavetotOpt_supliment_dbl += (opsup_val/BaseCrRatetoPkRate)*2;
                    SavetotOpt_supliment_tbl += (opsup_val/BaseCrRatetoPkRate)*3;
                    SavetotOpt_supliment_qd +=(opsup_val/BaseCrRatetoPkRate)*4;
                    
                    }else{
                    SavetotOpt_supliment_sgl += (opsup_val/BaseCrRatetoPkRate);
                    SavetotOpt_supliment_dbl += (opsup_val/BaseCrRatetoPkRate);
                    SavetotOpt_supliment_tbl += (opsup_val/BaseCrRatetoPkRate);
                    SavetotOpt_supliment_qd +=(opsup_val/BaseCrRatetoPkRate);
                }

            });


            
        //====================================================================================================    


            hotesPkgData.push({
                bk_date:bkdate,
                days:rowId,
                pos:htpos,
                supID:sup_id,
                pkgId:pkg_id,
                sgl_rate:sglVal,
                sgl_com:sglmk,
                dbl_rate:dblVal,
                dbl_com:dblmk,
                tbl_rare:tblVal,
                tb_com:tblmk,
                qtb_rate:qtbVal,
                qtb_com:qtbmk,
                ch_rate:ch_rate,
                ch_com:ch_com,
                grVal:grVal,
                currency_id:cr_id,
                ss_splm:(SavetotComp_supliment_sgl+SavetotOpt_supliment_sgl).toFixed(2),
                db_splm:(SavetotComp_supliment_dbl+SavetotOpt_supliment_dbl).toFixed(2),
                tb_splm:(SavetotComp_supliment_tbl+SavetotOpt_supliment_tbl).toFixed(2),
                qd_splm:(SavetotComp_supliment_qd+SavetotOpt_supliment_qd).toFixed(2),
                rate_to_base:BaseCrRatetoPkRate
            });

            
           // alert(sglmk);
           NoofHotels++;
    }

}
   // console.log(comp_supliments);
    //console.log(Opti_supliments);
    // alert(comp_supliments)
    var pp_hotel_price,pp_ss_price,pp_tpre_price,pp_qtre_price;

    pp_hotel_price = $('#ttppr_dbl').html();
    pp_ss_price = parseFloat($('#single_sup').html());
    pp_tpre_price =parseFloat($('#trp_reduc').html());
    pp_qtre_price = parseFloat($('#qtr_reduc').html());

    if(NoofHotels == 0){
        $('.alert').show();
        $('#notify').html('Nothing to save');

    }else if(ratesNull != 0){
        $('.alert').show();
        $('#notify').html('Please Chech the details before save.');
    }else if(exp_pkgs!=0){

        $('.alert').show();
        $('#notify').html('Some contract are not in a valid pereiad, Please Check the details before save.');

    }else{    
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('location_updatehotels')}}',
                method: "POST",
                data: {hotesPkgData:JSON.stringify(hotesPkgData),hotelbkDays:JSON.stringify(hotelbkDays),
                    comp_supliments:JSON.stringify(comp_supliments),Opti_supliments:JSON.stringify(Opti_supliments),pp_hotel_price:pp_hotel_price,tourStDate:tourStDate,
                    tourID:tourID,tourVersion:tourVersion,qoutheaderId:qoutheaderId,pp_ss_price:pp_ss_price,pp_tpre_price:pp_tpre_price,pp_qtre_price:pp_qtre_price,no_of_adtPax:no_of_adtPax},
                success: function(data) {

                   // console.log(data);
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Hotels Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                       // localStorage.setItem('activeTab', (tab_id+1));
                        location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
    }


}

function move_up_hotels(day_id_mv){

    var noOfDays = parseInt('{{$noOfDays}}');

    var cr_htpkg_count = 0;
    var up_row_htpkg_count =0 ;

    if(noOfDays>1)
    {
        $("#dttb_"+(day_id_mv+1)+" tr").each(function(index) {                
            up_row_htpkg_count++;
        });

        $("#dttb_"+day_id_mv+" tr").each(function(index) {
            
            cr_htpkg_count++;
        });

        if(cr_htpkg_count>0){
            
            var tourID = '{{$tourID}}';
            var qoutheaderId ='{{$tourQuotHeaderId}}';
            var tourStDate = '{{$tourStDate}}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.getJSON({ 
                    
                    url: '{{Route('quote_day_move_up')}}',
                    method: "POST",
                    data: {row_day:day_id_mv,tourID:tourID,qoutheaderId:qoutheaderId,tourStDate:tourStDate},
                    success: function(data) {

                        console.log(data);                    
                        if(data=='moved_up'){
                            window.location.reload();
                        }
                    }                                   
            })
            
        }
        
    }else{

        
             
    }
    

    


}

function move_down_hotels(day_id_mv){
    

var noOfDays = parseInt('{{$noOfDays}}');

var cr_htpkg_count = 0;
var up_row_htpkg_count =0 ;

if(noOfDays>1)
{
    $("#dttb_"+(day_id_mv+1)+" tr").each(function(index) {                
        up_row_htpkg_count++;
    });

    $("#dttb_"+day_id_mv+" tr").each(function(index) {
        
        cr_htpkg_count++;
    });

    if(cr_htpkg_count>0){
        
        var tourID = '{{$tourID}}';
        var qoutheaderId ='{{$tourQuotHeaderId}}';
        var tourStDate = '{{$tourStDate}}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('quote_day_move_down')}}',
                method: "POST",
                data: {row_day:day_id_mv,tourID:tourID,qoutheaderId:qoutheaderId,tourStDate:tourStDate},
                success: function(data) {

                    console.log(data);                    
                    if(data=='moved_down'){
                        window.location.reload();
                    }
                }                                   
        })
        
    }
    
}


}

function enable_disb_movebtn(){

    var noOfDays = parseInt('{{$noOfDays}}');
    
    for(var day_pos = 1; day_pos <=noOfDays;day_pos++)
    {   
        var day_rows = 0;

        $("#dttb_"+day_pos+" tr").each(function(index) {
            
            day_rows++;
        });
        
        if(day_rows>0){
            
           if(day_pos!=1){

                $('#row_up_btn_'+day_pos).prop('disabled', false);
           }else{
                $('#row_up_btn_'+day_pos).prop('disabled', true);
           }
           
           if(day_pos==noOfDays){
                $('#row_dw_btn_'+day_pos).prop('disabled', true);
           }
           else{
                $('#row_dw_btn_'+day_pos).prop('disabled', false);
           }

            
            
        }else{

            $('#row_up_btn_'+day_pos).prop('disabled', true);
            $('#row_dw_btn_'+day_pos).prop('disabled', true);            
        }

    }
   
}





CalHotelrate();
enable_disb_movebtn();

   </Script>
