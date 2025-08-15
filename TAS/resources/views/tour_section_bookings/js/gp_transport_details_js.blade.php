<script>
        expences_cal();
            function rate_cal_totDT()
            {
                var quantity=$('#rate_cal_tot').val();
                var rate=$('#rate_lkr').val();
                var sum=quantity*rate;
                var millage=((sum*10)/100);
               $('#total_val').val(parseFloat(sum));
               $('#mis_mkp_add').val(parseFloat(millage));
                
            }
        
        
        function ExpencesTypeslOnchange(){
        
        var expencesTypeID = $('#expene_Type').val();
        //var tottourmillage = parseFloat('{{$totmilageTour}}');
        //var baseComtrp = '{{$basecomisionRate}}';
        
        $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
            });
        
        //console.log(tottourmillage);
        
        
        
            if(expencesTypeID!=0){
            
                $.getJSON({
                        
                        url: '{{Route('expences_list_filter')}}',
                        method: "POST",
                        data: {expencesTypeID:expencesTypeID},
                        success: function(data) {
                            
                            //console.log(data);
        
                            $('#rate_lkr').val(parseFloat(data.amount));
        
                      
                        }                                   
                    })   
            }
        }
        
        
        
        
        
        function addTranspoart(){
            expences_cal();
        var tottourmillage = parseFloat('{{$totmilageTour}}');
        
        var expene_Type = $('#expene_Type').val();
        var expenceTypeName = $('#expene_Type option:selected').text();
        var rate_pr_lkr=parseFloat($('#rate_lkr').val());
        var e_qty=parseInt($('#rate_cal_tot').val());
        var totLkr_add_ex=parseFloat($('#total_val').val());
        var markup_ex=parseFloat($('#mis_mkp_add_trns').val());
        
            $('.alert').hide();
        
                 var exp_count = 1;
        
                  $("#sss tr").each(function(index) {
        
                    exp_count++;
                  });
        
                    //console.log(exp_count);
        
                               
                  //console.log(vehicleCount);
        
                  if(expene_Type!=0){
                      if(totLkr_add_ex!=0){
        
            let vehicleDgv = $('#sss');
            vehicleDgv.append($('<tr class="Rm_exp'+exp_count+'"></tr>')
            .html(
        
                       
                        '<input id="exp_type'+exp_count+'" class="Rm_exp'+exp_count+'" type="hidden" value="'+expene_Type+'">'+
                        '<input id="exp_rate'+exp_count+'" class="Rm_exp'+exp_count+'" type="hidden" value="'+rate_pr_lkr+'">'+
                        '<input id="qty_exp'+exp_count+'" class="Rm_exp'+exp_count+'" type="hidden" value="'+e_qty+'">'+
                        '<input id="total_exp'+exp_count+'" class="Rm_exp'+exp_count+'" type="hidden" value="'+totLkr_add_ex+'">'+
                        '<input id="totalMk_exp'+exp_count+'" class="Rm_exp'+exp_count+'" type="hidden" value="'+markup_ex+'">'+
                       
                        '<td style="text-align: center;" class="Rm_exp'+exp_count+'" >'+expenceTypeName+'</td>'+
                        '<td class="Rm_exp'+exp_count+'" style="text-align: center;">'+rate_pr_lkr.toFixed(2)+'</td>'+                
                        '<td class="Rm_exp'+exp_count+'" style="text-align: right;">'+e_qty+'</td>'+
                        '<td class="Rm_exp'+exp_count+'" style="text-align: right;">'+totLkr_add_ex+'</td>'+
                        '<td class="Rm_exp'+exp_count+'" style="text-align: right;">'+markup_ex.toFixed(2)+'</td>'+
                      
                                            
                        '<td class="Rm_exp'+exp_count+'" style="text-align: center;">'+
                                    '<button onclick="remove_expences('+exp_count+')" type="button" class="btn btn-danger m-btn btn-sm m-btn--icon Rm_exp'+exp_count+'">'+
                                            '<span class="Rm_exp'+exp_count+'">'+
                                                '<i class="la la-trash Rm_exp'+exp_count+'"></i>'+
                                                '<span class="Rm_exp'+exp_count+'">Remove</span>'+
                                            '</span>'+
                                    '</button>'+
                        '</td>'
            )); 
        
                    expences_cal();
                                            }else{
                                                $('.alert').show();
                                                $("html, body").animate({
                                                        scrollTop: 0
                                                    });  
                                                    $('#notify').html('*Please enter quantity.');
                                            }
        
                     }else{
            $('.alert').show();
            $('#notify').html('*please select expences.');
        }
        
        
        }
        
        
        expences_cal();
        
        function addvehicle(){
        
            var tottourmillage = parseFloat('{{$totmilageTour}}');
        
            var vehilceTypeID = $('#sl_vehicleType').val();
            var vehicleTypeName = $('#sl_vehicleType option:selected').text();
            var vnos = $('#noofseat_add').val();
            var milage_ad = parseFloat($('#milage_add').val());
            var rateper_km_ad = parseFloat($('#rate_perkm_add').val());
            var totLkr_add = parseFloat($('#vtotlkr_add').val());
            var vmkp_add = parseFloat($('#vmkp_add').val());
        
            if(vehilceTypeID==0){
                $('.alert').show();
                $('#notify').html('* Please Select Vehicle Type.');
            }else if((milage_ad <1) || isNaN(milage_ad)==true){
                $('.alert').show();
                $('#notify').html('* Millage Can not be zero.');
            }else if((rateper_km_ad <1) || isNaN(rateper_km_ad)==true){
                $('.alert').show();
                $('#notify').html('* Rate per Km Not valid.');
            }else if((vmkp_add <0)|| isNaN(vmkp_add)==true){
                $('.alert').show();
                $('#notify').html('* Markup Not valid');
            }else if((tottourmillage == 0 ) || isNaN(tottourmillage) == true ){
                $('.alert').show();
                $('#notify').html('* Sorry! You cannot add Transport details without having location details, <br>     Please update location details.');
            }else
            {
                $('.alert').hide();
        
                     var vehicleCount = 1;
        
                      $("#vehicle_tbl tr").each(function(index) {
        
                        vehicleCount++;
                      });
        
                                   
                      //console.log(vehicleCount);
        
                let vehicleDgv = $('#vehicle_tbl');
                vehicleDgv.append($('<tr class="Rm_vehicle_'+vehicleCount+'"></tr>')
                .html('<td style="text-align: center;" class="Rm_vehicle_'+vehicleCount+'" >'+vehicleTypeName+'</td>'+
        
                        '<input id="vehicle_typ_id_'+vehicleCount+'" class="Rm_vehicle_'+vehicleCount+'" type="hidden" value="'+vehilceTypeID+'">'+
                        '<input id="millage_km_'+vehicleCount+'" class="Rm_vehicle_'+vehicleCount+'" type="hidden" value="'+milage_ad+'">'+
                        '<input id="rateperKm_'+vehicleCount+'" class="Rm_vehicle_'+vehicleCount+'" type="hidden" value="'+rateper_km_ad+'">'+
                        '<input id="totallkr_'+vehicleCount+'" class="Rm_vehicle_'+vehicleCount+'" type="hidden" value="'+totLkr_add+'">'+
                        '<input id="markup_tr_'+vehicleCount+'" class="Rm_vehicle_'+vehicleCount+'" type="hidden" value="'+vmkp_add+'">'+
        
                        '<td class="Rm_vehicle_'+vehicleCount+'" style="text-align: center;">'+vnos+'</td>'+                
                        '<td class="Rm_vehicle_'+vehicleCount+'" style="text-align: right;">'+milage_ad.toFixed(2)+' km</td>'+
                        '<td class="Rm_vehicle_'+vehicleCount+'" style="text-align: right;">'+rateper_km_ad.toFixed(2)+'</td>'+
                        '<td class="Rm_vehicle_'+vehicleCount+'" style="text-align: right;">'+totLkr_add.toFixed(2)+'</td>'+
                        '<td class="Rm_vehicle_'+vehicleCount+'" style="text-align: right;">'+vmkp_add.toFixed(2)+'</td>'+
                                            
                        '<td class="Rm_vehicle_'+vehicleCount+'" style="text-align: center;">'+
                                    '<button onclick="removeVehicle('+vehicleCount+')" type="button" class="btn btn-danger m-btn btn-sm m-btn--icon Rm_vehicle_'+vehicleCount+'">'+
                                            '<span class="Rm_vehicle_'+vehicleCount+'">'+
                                                '<i class="la la-trash Rm_vehicle_'+vehicleCount+'"></i>'+
                                                '<span class="Rm_vehicle_'+vehicleCount+'">Remove</span>'+
                                            '</span>'+
                                    '</button>'+
                        '</td>'));
        
                trspCallAll();
            }
        
            
        
        }
        
        
        function remove_expences(Vr_ID)
        {
        
         var rm_expences=0;
         $("#sss tr").each(function(index){
            rm_expences++;
         });
        
         if(rm_expences == Vr_ID)
         {
        
            $('.Rm_exp'+Vr_ID).remove();
            expences_cal();
        
         }
         else
         {
           
             swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
         }
        
        
        // write delete functoion ande
        // write save data to mdatabsee 
        
        }
        
        function removeVehicle(vhrowId){
            
            var vehicleCountRm = 0;
        
            $("#vehicle_tbl tr").each(function(index) {
        
            vehicleCountRm++;
            });
           // console.log(vehicleCountRm);
            if(vehicleCountRm == vhrowId){
                $('.Rm_vehicle_'+vhrowId).remove(); 
                trspCallAll();
                expences_cal();
            }else{
                swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
            }
        }
        
        function vehicleTypeslOnchange(){
        
            var vehilceTypeID = $('#sl_vehicleType').val();
            var tottourmillage = parseFloat('{{$totmilageTour}}');
            var baseComtrp = '{{$basecomisionRate}}';
           // alert(tottourmillage);
            $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                          }
                });
            
            //console.log(tottourmillage);
        
            if((tottourmillage != 0 ) && isNaN(tottourmillage) == false )
            {
        
                if(vehilceTypeID!=0){
                
                    $.getJSON({
                            
                            url: '{{Route('transport_listFilter')}}',
                            method: "POST",
                            data: {vehilceTypeID:vehilceTypeID},
                            success: function(data) {
                                
                               var bcom_trp = ((data.rate_per_km)*(tottourmillage)/100.00 * baseComtrp);
                                //console.log(data);
                                $('#noofseat_add').val(parseFloat(data.no_of_seats));
                                $('#milage_add').val(parseFloat(tottourmillage).toFixed(2));
                                $('#rate_perkm_add').val(parseFloat(data.rate_per_km).toFixed(2));
                                $('#vtotlkr_add').val(parseFloat((data.rate_per_km)*(tottourmillage)).toFixed(2));
                                $('#vmkp_add').val(parseFloat(bcom_trp).toFixed(2));
        
                                loadtransport();
                                //trspbfAddCall();
                             
                            }                                   
                        }) 
                }
            }else{
                $('.alert').show();
                $('#notify').html('* Sorry! You cannot add Transport details without having location details, <br>    Please update location details.');
            }
        }
        
        function loadtransport()
        {   
            
            var tottourmillage = parseFloat('{{$totmilageTour}}');
            
            if(isNaN(tottourmillage) == true){
                
                tottourmillage=0;
            }
        
            //var totadpaxcount = parseFloat($('#no_of_packs_adult').val());
            
            // $('#trtotMilageRoute').html(parseFloat(tottourmillage).toFixed(2));
            // $('#trtotpaxCount').html(parseFloat(totadpaxcount));
        
            if(tottourmillage==0){
        
            }
            
        }
        
        function trspbfAddCall(){
        
            var milage_ = parseFloat($('#milage_add').val());
            var rateper_km = parseFloat($('#rate_perkm_add').val());
              
                totLkr_ = milage_ * rateper_km;
        
        
             
            $('#vtotlkr_add').val(parseFloat(totLkr_).toFixed(2));
            
        
            var baseComtrp = '{{$basecomisionRate}}';
          
            var bcom_trp = ((totLkr_)/100.00 * baseComtrp);
            
            $('#vmkp_add').val(parseFloat(bcom_trp).toFixed(2));
        
              loadtransport();
        }
        
        
        function expences_cal()
        {
        
          
        var exp_count=0;
        var other_tot_exp=0;
        var ex=0;
        $('#sss tr').each(function(index){
            exp_count++;
        });
        
        
        for(ex=1;ex<=exp_count;ex++)
        {
          var tot_other_val=parseFloat($('#total_exp'+ex).val());
          if(isNaN(tot_other_val)==false)
          {
              other_tot_exp+=tot_other_val;
        
          }
        }
        
        var vehical_cost=parseFloat($('#get_exp_data').val());
        
        var total=vehical_cost+other_tot_exp;
        // alert(total);
        var trp_lkrtobscrrate =$('#trp_bslkr').val();
            if((isNaN(trp_lkrtobscrrate)==true) || trp_lkrtobscrrate==0 ){
                trp_lkrtobscrrate=1;
            }
        
        
            if(isNaN(parseFloat(other_tot_exp/trp_lkrtobscrrate))!=true && isNaN(parseFloat(total/trp_lkrtobscrrate))!=true && isNaN(parseFloat(other_tot_exp))!=true && isNaN(parseFloat(total))!=true)
            {
              $('#trp_other_cost').html(parseFloat(other_tot_exp).toFixed(2));
             $('#trp_totCost_bc_other').html(parseFloat(other_tot_exp/trp_lkrtobscrrate).toFixed(2));
        
             $('#trp_toal_cost').html(parseFloat(total).toFixed(2));
             $('#trp_totCost_bc_cost').html(parseFloat(total/trp_lkrtobscrrate).toFixed(2));
            
            }
              else
            {
             $('#trp_other_cost').html(parseFloat(0).toFixed(2));
             $('#trp_totCost_bc_other').html(parseFloat(0).toFixed(2));
        
             $('#trp_toal_cost').html(parseFloat(0).toFixed(2));
             $('#trp_totCost_bc_cost').html(parseFloat(0).toFixed(2));
            }
        
            
        
        }
        
        function trspCallAll(){
            loadtransport();
            
        
        
            var vehicleCountRm =0;
            var trp_totadpaxcount = parseFloat('{{$totaladltPax}}');

            $("#vehicle_tbl tr").each(function(index) {
        
                 vehicleCountRm++;
            });
        
            var trppos = 0;
            var trp_totMkp =0;
            var trp_totalLkr =0;
        
            var trp_lkrtobscrrate =$('#trp_bslkr').val();
            if((isNaN(trp_lkrtobscrrate)==true) || trp_lkrtobscrrate==0 ){
                trp_lkrtobscrrate=1;
            }
            //console.log(vehicleCountRm);
            for(trppos =1; trppos<=vehicleCountRm;trppos++){
                
                var trp_totMkp_tmp = parseFloat($('#markup_tr_'+trppos).val());
                var trp_totalLkr_tmp = parseFloat($('#totallkr_'+trppos).val());
                
                if(isNaN(trp_totMkp_tmp)==false){
                    trp_totMkp += trp_totMkp_tmp;
                }
        
                if(isNaN(trp_totalLkr_tmp)==false){
                    trp_totalLkr += trp_totalLkr_tmp;
                }
            }
           
        
            // $('#get_exp_data').val(parseFloat(trp_totalLkr).toFixed(2));
            // $('#trp_totCost_lk').html(parseFloat(trp_totalLkr).toFixed(2));
            // $('#trp_totCost_bc').html(parseFloat((trp_totalLkr/trp_lkrtobscrrate)).toFixed(2));
            
            // $('#trp_ttmkp_lk').html(parseFloat((trp_totMkp)).toFixed(2));
            // $('#trp_ttmkp_bc').html(parseFloat((trp_totMkp/trp_lkrtobscrrate)).toFixed(2));
        
            // $('#trp_sr_lkr').html(parseFloat((trp_totalLkr+trp_totMkp)).toFixed(2));
            // $('#trp_sr_bc').html(parseFloat((trp_totalLkr+trp_totMkp)/trp_lkrtobscrrate).toFixed(2));
            
            //$('#trp_ppsr_lkr').html(parseFloat((trp_totalLkr+trp_totMkp)/trp_totadpaxcount).toFixed(2));
            $('#trp_ppsr_bc').val(parseFloat(((trp_totalLkr+trp_totMkp)/trp_lkrtobscrrate)/trp_totadpaxcount).toFixed(2));
           
            // if(isNaN(parseFloat((trp_totMkp*100.00)/trp_totalLkr))!=true){
            //   $('#trp_mkp_pc_lkr').html(parseFloat((trp_totMkp*100.00)/trp_totalLkr).toFixed(2));
            //   $('#trp_mkp_pc_bc').html('USD &nbsp;'+parseFloat((trp_totMkp*100.00)/trp_totalLkr).toFixed(2));
            // }
            // else{
            //     $('#trp_mkp_pc_lkr').html(parseFloat(0).toFixed(2));
            // $('#trp_mkp_pc_bc').html('USD &nbsp;'+parseFloat(0).toFixed(2));
            // }
                
        }
        
        function saveTransportdata(){
                
            loadtransport();
        
             var vehicleCountRm =0;
             var exp_count=0;
             var trp_totadpaxcount = parseFloat('{{$totaladltPax}}');
                
             $("#vehicle_tbl tr").each(function(index) {
        
                    vehicleCountRm++;
               });
               $("#sss tr").each(function(index){
                   exp_count++;
               });
              
            var trppos = 0;
            var exp_=0;
            // var trp_totMkp =0;
            // var trp_totalLkr =0;
        
            var trp_lkrtobscrrate =$('#trp_bslkr').val();
            var trp_hasError =0;
            if((isNaN(trp_lkrtobscrrate)==true) || trp_lkrtobscrrate==0 ){
                trp_lkrtobscrrate=1;
            }
            //console.log(vehicleCountRm);
            var trsp_data =[];
            var exp_data=[];
        
            for(exp_=1;exp_<=exp_count;exp_++){
                var exp_typeId=$('#exp_type'+exp_).val();
                var exp_rate=parseFloat($('#exp_rate'+exp_).val());
                var expences_qty=$('#qty_exp'+exp_).val();
                var exp_total=parseFloat($('#total_exp'+exp_).val());
                var totalMk_exp=parseFloat($('#totalMk_exp'+exp_).val());
                
        
                 exp_data.push({
                     pos_i:exp_ ,
                exp_typeId:exp_typeId,
                exp_rate:exp_rate,
                expences_qty:expences_qty,
                exp_total:exp_total,
                totalMk_exp:totalMk_exp
        
            });
        
        
            }
        
            
        
           
            
        
            for(trppos =1; trppos <= vehicleCountRm; trppos++){
                
                var trp_ls_vtypeId = parseInt($('#vehicle_typ_id_'+trppos).val());
                var trp_ls_millage = parseFloat($('#millage_km_'+trppos).val());
                var trp_ls_rtpkm = parseFloat($('#rateperKm_'+trppos).val());
                var trp_ls_totlLkr = parseFloat($('#totallkr_'+trppos).val());
                var trp_ls_Mkp = parseFloat($('#markup_tr_'+trppos).val());
                
                
        
                if(isNaN(trp_ls_rtpkm)==true){
                    trp_hasError++;
                }
        
                if(isNaN(trp_ls_millage)==true){
                    trp_hasError++;
                }
                
                if(isNaN(trp_ls_Mkp)==true){
                    trp_hasError++;
                }
        
                trsp_data.push({
                    
                    pos:trppos,
                    vtype:trp_ls_vtypeId,
                    millage:trp_ls_millage,
                    rate_pkm:trp_ls_rtpkm,
                    totlkr:trp_ls_totlLkr,
                    mkp:trp_ls_Mkp
        
                });
            
                
            }
        
            var tourID = '{{$tourID}}';
            var qoutheaderId ='{{$tourQuotHeaderId}}';
            var tourVersion ='{{$tourVersion}}';
            var trp_pprate = parseFloat($('#trp_ppsr_bc').val());
            
         
            if(trp_hasError==0){
                   
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                    });
        
                    $.getJSON({
                            
                            url: '{{Route('transport_update')}}',
                            method: "POST",
                            data: {trsp_data:JSON.stringify(trsp_data),tourID:tourID,qoutheaderId:qoutheaderId,
                                tourVersion:tourVersion,trp_pprate:trp_pprate,baserate:trp_lkrtobscrrate,exp_data:JSON.stringify(exp_data)},
                            success: function(data) {
                               
                               console.log(data);
                               if(data=='saved'){
                                $('.alert').hide();
                                swal("Transport Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                                location.reload();
                            }else{
                                $('.alert').show();
                                $('#notify').html(data);
                            }
                                
                            }                                   
                        })
        
            }
        
        }
        trspCallAll();
        </script>
        