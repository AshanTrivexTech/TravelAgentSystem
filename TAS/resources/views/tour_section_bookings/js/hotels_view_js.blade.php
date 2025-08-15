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


    function save_as_pdf()
    {

    
     
    }

        function calAll(dayid,rowid){
            
            var sgl_rate = parseFloat($('#pkg_sgl_'+rowid+'_'+dayid).val());
            var dbl_rate = parseFloat($('#pkg_dbl_'+rowid+'_'+dayid).val());
            var twn_rate = parseFloat($('#pkg_dbl_'+rowid+'_'+dayid).val());
            var tbl_rate = parseFloat($('#pkg_tbl_'+rowid+'_'+dayid).val());
            var qd_rate = parseFloat($('#pkg_qd_'+rowid+'_'+dayid).val());
            
            var sgl_rm_qty = parseFloat($('#sgl_qty_'+rowid+'_'+dayid).val());
            var dbl_rm_qty = parseFloat($('#dbl_qty_'+rowid+'_'+dayid).val());
            var twn_rm_qty = parseFloat($('#twn_qty_'+rowid+'_'+dayid).val());
            var tbl_rm_qty = parseFloat($('#tbl_qty_'+rowid+'_'+dayid).val());
            var qd_rm_qty = parseFloat($('#qd_qty_'+rowid+'_'+dayid).val());
        
            if(isNaN(sgl_rm_qty)==true){
                sgl_rm_qty=0;
        
            }

            if(isNaN(dbl_rm_qty)==true){
                dbl_rm_qty=0;
        
            }

            if(isNaN(twn_rm_qty)==true){
                twn_rm_qty=0;
                
            }

            if(isNaN(tbl_rm_qty)==true){
                tbl_rm_qty=0;
        
            }

            if(isNaN(qd_rm_qty)==true){
                qd_rm_qty=0;
            }
        
        
            var sgl_tot = sgl_rate*sgl_rm_qty;
            var dbl_tot = dbl_rate*dbl_rm_qty;
            var twn_tot = twn_rate*twn_rm_qty;
            var tbl_tot = tbl_rate*tbl_rm_qty;
            var qd_tot = qd_rate*qd_rm_qty;
            
            var totalRoomCost = (sgl_tot + dbl_tot + twn_tot + tbl_tot + qd_tot)



            var pkgs_netTotal =0;
            var pkgs_netCmpSup = 0;
            var pkgs_netOptSup = 0;
           
            var cmpCount = 0;
            var OptCount = 0;

            $('#comsup_mlist_'+rowid+'_'+dayid+' tr').each(function(index) {
                            
            
                cmpCount++;
            });

             $('#optsup_mlist_'+rowid+'_'+dayid+' tr').each(function(index) {
                            
            
                OptCount++;
              
            });            
            
            for(var i = 1; i<=cmpCount; i++){
                
                
                if($('#cmpsup_chk_'+i+'_'+rowid+'_'+dayid).prop('checked')){
                    
                    var cmpspqty = parseFloat($('#cmp_sup_qty_'+i+'_'+rowid+'_'+dayid).val());
                    var cmprate = parseFloat($('#cmpsup_amt_added_'+i+'_'+rowid+'_'+dayid).val());
                    if(isNaN(cmpspqty)==false){
                        
                        if(cmpspqty !=0){
                            pkgs_netCmpSup += (cmprate*cmpspqty);
                        }    
                    }
                    
                    
                }


            }


            for(var i = 1; i<=OptCount; i++){
                
                
                if($('#opssup_chk_'+i+'_'+rowid+'_'+dayid).prop('checked')){
                    
                    var optspqty = parseFloat($('#optsup_qty_'+i+'_'+rowid+'_'+dayid).val());
                    var optrate = parseFloat($('#optsup_amt_added_'+i+'_'+rowid+'_'+dayid).val());
                   
                    if(isNaN(optspqty)==false){
                        
                        if(optspqty !=0){
                            pkgs_netOptSup += (optrate*optspqty);
                        }    
                    }
                    
                    
                }


            }
           //alert(pkgs_netSup);
            // 
                        

            $('#pkg_suptot_'+rowid+'_'+dayid).html((pkgs_netCmpSup+pkgs_netOptSup).toFixed(2));
                        
            $('#sgl_rmcost_'+rowid+'_'+dayid).html((sgl_tot).toFixed(2));
            $('#dbl_rmcost_'+rowid+'_'+dayid).html((dbl_tot).toFixed(2));
            $('#twn_rmcost_'+rowid+'_'+dayid).html((twn_tot).toFixed(2));
            $('#tbl_rmcost_'+rowid+'_'+dayid).html((tbl_tot).toFixed(2));
            $('#qd_rmcost_'+rowid+'_'+dayid).html((qd_tot).toFixed(2));
            
            $('#pkg_total_'+rowid+'_'+dayid).html((totalRoomCost).toFixed(2));
            

        }

        function storeSave(dayid,rowid){

               
            var cmpSupListData = [];
            var OptSupListData = [];
            

            var sgl_rate = parseFloat($('#pkg_sgl_'+rowid+'_'+dayid).val());
            var dbl_rate = parseFloat($('#pkg_dbl_'+rowid+'_'+dayid).val());
            var twn_rate = parseFloat($('#pkg_dbl_'+rowid+'_'+dayid).val());
            var tbl_rate = parseFloat($('#pkg_tbl_'+rowid+'_'+dayid).val());
            var qd_rate = parseFloat($('#pkg_qd_'+rowid+'_'+dayid).val());
            
            var sgl_rm_qty = parseFloat($('#sgl_qty_'+rowid+'_'+dayid).val());
            var dbl_rm_qty = parseFloat($('#dbl_qty_'+rowid+'_'+dayid).val());
            var twn_rm_qty = parseFloat($('#twn_qty_'+rowid+'_'+dayid).val());
            var tbl_rm_qty = parseFloat($('#tbl_qty_'+rowid+'_'+dayid).val());
            var qd_rm_qty = parseFloat($('#qd_qty_'+rowid+'_'+dayid).val());
        
            if(isNaN(sgl_rm_qty)==true){
                sgl_rm_qty=0;
        
            }

            if(isNaN(dbl_rm_qty)==true){
                dbl_rm_qty=0;
        
            }

            if(isNaN(twn_rm_qty)==true){
                twn_rm_qty=0;
                
            }

            if(isNaN(tbl_rm_qty)==true){
                tbl_rm_qty=0;
        
            }

            if(isNaN(qd_rm_qty)==true){
                qd_rm_qty=0;
            }
        
        
            var sgl_tot = sgl_rate*sgl_rm_qty;
            var dbl_tot = dbl_rate*dbl_rm_qty;
            var twn_tot = twn_rate*twn_rm_qty;
            var tbl_tot = tbl_rate*tbl_rm_qty;
            var qd_tot = qd_rate*qd_rm_qty;
            
            var totalRoomCost = (sgl_tot + dbl_tot + twn_tot + tbl_tot + qd_tot)



            
            var pkgs_netCmpSup = 0;
            var pkgs_netOptSup = 0;
           
            var cmpCount = 0;
            var OptCount = 0;

            $('#comsup_mlist_'+rowid+'_'+dayid+' tr').each(function(index) {
                            
            
                cmpCount++;
            });

             $('#optsup_mlist_'+rowid+'_'+dayid+' tr').each(function(index) {
                            
            
                OptCount++;
              
            });            
            
            for(var i = 1; i<=cmpCount; i++){
                
                var chk =0;
                var tblRowId = parseInt($('#cmpsup_rowID_added_'+i+'_'+rowid+'_'+dayid).val());
                var cmprate = parseFloat($('#cmpsup_amt_added_'+i+'_'+rowid+'_'+dayid).val());
                var cm_qty = 0;
                var cmpspqty = parseFloat($('#cmp_sup_qty_'+i+'_'+rowid+'_'+dayid).val()); 

                     if(isNaN(cmpspqty)==false){
                        
                        if(cmpspqty !=0){                            
                            cm_qty = cmpspqty;
                        }    
                    }


                if($('#cmpsup_chk_'+i+'_'+rowid+'_'+dayid).prop('checked')){

                    // if(isNaN(cmpspqty)==false){
                        
                    //     if(cmpspqty !=0){
                            pkgs_netCmpSup += (cmprate*cm_qty);
                            cm_qty = cmpspqty;
                    //     }    
                    // }
                    
                    chk=1; 
                }
                
                     cmpSupListData.push({
                    tblRowId:tblRowId,                   
                    cmp_qty:cm_qty,
                    chk:chk         

                });


            }


            for(var i = 1; i<=OptCount; i++){
                
                    var chk_opt =0;

                     var optspqty = parseFloat($('#optsup_qty_'+i+'_'+rowid+'_'+dayid).val());
                    var optrate = parseFloat($('#optsup_amt_added_'+i+'_'+rowid+'_'+dayid).val());
                    var tblRowId_opt = parseInt($('#optsup_rowID_added_'+i+'_'+rowid+'_'+dayid).val());
                    
                    var op_qty =0;

                    if(isNaN(optspqty)==false){
                        
                        if(optspqty !=0){
                           // pkgs_netOptSup += (optrate*optspqty);
                            op_qty = optspqty;
                        }    
                    }

                        if($('#opssup_chk_'+i+'_'+rowid+'_'+dayid).prop('checked')){
                            
                            pkgs_netOptSup += (optrate*op_qty);
                            
                            chk_opt = 1;
                        }
                
                    OptSupListData.push({
                    tblRowId:tblRowId_opt,                    
                    opt_qty:op_qty,
                    chk:chk_opt        

                });

            }


            
            var tourID = '{{$tourID}}';
            var qoutheaderId ='{{$tourQuotHeaderId}}';
            var ht_dt_id = parseInt($('#tour_qt_htd_id_'+rowid+'_'+dayid).val());
            var totSup = pkgs_netCmpSup+pkgs_netOptSup;
            if(totalRoomCost!=0)
            {
            //=========================================================================
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('reservation_store_accmd')}}',
                method: "POST",
                data: {cmpSupListData:JSON.stringify(cmpSupListData),OptSupListData:JSON.stringify(OptSupListData),sgl_rm_qty:sgl_rm_qty,dbl_rm_qty:dbl_rm_qty,twn_rm_qty:twn_rm_qty,
                        tbl_rm_qty:tbl_rm_qty,qd_rm_qty:qd_rm_qty,totSup:totSup,totalRoomCost:totalRoomCost,
                        tourID:tourID,qoutheaderId:qoutheaderId,ht_dt_id:ht_dt_id},

                success: function(data) {

                    console.log('data');
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Hotels Reservation Added successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                        location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
        
        }else{
            $('.alert').show();
            $('#notify').html('* Please Enter Details Room Qty');
        }

        
        }
        
        // $('.alert').hide();

    function amend_Accmd_Voucher(dayid,rowid)
    {   
        var accmd_reserved_id = parseInt($('#accmd_reserve_up_id_'+rowid+'_'+dayid).val());
        var cmpSupListData = [];
        var OptSupListData = [];
            

            var sgl_rate = parseFloat($('#pkg_sgl_'+rowid+'_'+dayid).val());
            var dbl_rate = parseFloat($('#pkg_dbl_'+rowid+'_'+dayid).val());
            var twn_rate = parseFloat($('#pkg_dbl_'+rowid+'_'+dayid).val());
            var tbl_rate = parseFloat($('#pkg_tbl_'+rowid+'_'+dayid).val());
            var qd_rate = parseFloat($('#pkg_qd_'+rowid+'_'+dayid).val());
            
            var sgl_rm_qty = parseFloat($('#sgl_qty_'+rowid+'_'+dayid).val());
            var dbl_rm_qty = parseFloat($('#dbl_qty_'+rowid+'_'+dayid).val());
            var twn_rm_qty = parseFloat($('#twn_qty_'+rowid+'_'+dayid).val());
            var tbl_rm_qty = parseFloat($('#tbl_qty_'+rowid+'_'+dayid).val());
            var qd_rm_qty = parseFloat($('#qd_qty_'+rowid+'_'+dayid).val());
        
            if(isNaN(sgl_rm_qty)==true){
                sgl_rm_qty=0;
        
            }

            if(isNaN(dbl_rm_qty)==true){
                dbl_rm_qty=0;
        
            }

            if(isNaN(twn_rm_qty)==true){
                twn_rm_qty=0;
                
            }

            if(isNaN(tbl_rm_qty)==true){
                tbl_rm_qty=0;
        
            }

            if(isNaN(qd_rm_qty)==true){
                qd_rm_qty=0;
            }
        
        
            var sgl_tot = sgl_rate*sgl_rm_qty;
            var dbl_tot = dbl_rate*dbl_rm_qty;
            var twn_tot = twn_rate*twn_rm_qty;
            var tbl_tot = tbl_rate*tbl_rm_qty;
            var qd_tot = qd_rate*qd_rm_qty;
            
            var totalRoomCost = (sgl_tot + dbl_tot + twn_tot + tbl_tot + qd_tot)



            
            var pkgs_netCmpSup = 0;
            var pkgs_netOptSup = 0;
           
            var cmpCount = 0;
            var OptCount = 0;

            $('#comsup_mlist_'+rowid+'_'+dayid+' tr').each(function(index) {
                            
            
                cmpCount++;
            });

             $('#optsup_mlist_'+rowid+'_'+dayid+' tr').each(function(index) {
                            
            
                OptCount++;
              
            });            
            
            for(var i = 1; i<=cmpCount; i++){
                
                var chk =0;
                var tblRowId = parseInt($('#cmpsup_rowID_added_'+i+'_'+rowid+'_'+dayid).val());
                var cmprate = parseFloat($('#cmpsup_amt_added_'+i+'_'+rowid+'_'+dayid).val());
                var cm_qty = 0;
                var cmpspqty = parseFloat($('#cmp_sup_qty_'+i+'_'+rowid+'_'+dayid).val()); 

                     if(isNaN(cmpspqty)==false){
                        
                        if(cmpspqty !=0){                            
                            cm_qty = cmpspqty;
                        }    
                    }


                if($('#cmpsup_chk_'+i+'_'+rowid+'_'+dayid).prop('checked')){

                    // if(isNaN(cmpspqty)==false){
                        
                    //     if(cmpspqty !=0){
                            pkgs_netCmpSup += (cmprate*cm_qty);
                            cm_qty = cmpspqty;
                    //     }    
                    // }
                    
                    chk=1; 
                }
                
                     cmpSupListData.push({
                    tblRowId:tblRowId,                   
                    cmp_qty:cm_qty,
                    chk:chk         

                });


            }


            for(var i = 1; i<=OptCount; i++){
                
                    var chk_opt =0;

                     var optspqty = parseFloat($('#optsup_qty_'+i+'_'+rowid+'_'+dayid).val());
                    var optrate = parseFloat($('#optsup_amt_added_'+i+'_'+rowid+'_'+dayid).val());
                    var tblRowId_opt = parseInt($('#optsup_rowID_added_'+i+'_'+rowid+'_'+dayid).val());
                    
                    var op_qty =0;

                    if(isNaN(optspqty)==false){
                        
                        if(optspqty !=0){
                           // pkgs_netOptSup += (optrate*optspqty);
                            op_qty = optspqty;
                        }    
                    }

                        if($('#opssup_chk_'+i+'_'+rowid+'_'+dayid).prop('checked')){
                            
                            pkgs_netOptSup += (optrate*op_qty);
                            
                            chk_opt = 1;
                        }
                
                    OptSupListData.push({
                    tblRowId:tblRowId_opt,                    
                    opt_qty:op_qty,
                    chk:chk_opt        

                });

            }


            
            var tourID = '{{$tourID}}';
            var qoutheaderId ='{{$tourQuotHeaderId}}';
            var ht_dt_id = parseInt($('#tour_qt_htd_id_'+rowid+'_'+dayid).val());
            var totSup = pkgs_netCmpSup+pkgs_netOptSup;
            if(totalRoomCost!=0)
            {
            //=========================================================================
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('reservation_amend_accmd')}}',
                method: "POST",
                data: {cmpSupListData:JSON.stringify(cmpSupListData),OptSupListData:JSON.stringify(OptSupListData),sgl_rm_qty:sgl_rm_qty,dbl_rm_qty:dbl_rm_qty,twn_rm_qty:twn_rm_qty,
                        tbl_rm_qty:tbl_rm_qty,qd_rm_qty:qd_rm_qty,totSup:totSup,totalRoomCost:totalRoomCost,
                        tourID:tourID,qoutheaderId:qoutheaderId,ht_dt_id:ht_dt_id},
                success: function(data) {

                    console.log(data);
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Hotels Reservation Amended successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                        location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }
        })
        
        }else{
            $('.alert').show();
            $('#notify').html('* Please Enter Details Room Qty');
        }
    }


    function ganarate_voucher(supId,rowId_rg){
          
          
        
            var tourID = '{{$tourID}}';
            var qoutheaderId ='{{$tourQuotHeaderId}}';            
            var rates = $('#rates_'+rowId_rg).val();
            var remarks = $('#remarks_'+rowId_rg).val();           
            var conf_to = $('#conf_to_'+rowId_rg).val();
            var conf_by = $('#conf_by_'+rowId_rg).val();
            var conf_date = $('#m_datetimepicker_conf_date_'+rowId_rg).val();
            var noof_pax = parseInt($('#noof_pax_'+rowId_rg).val());
            var client_name = $('#client_name_'+rowId_rg).val();
            
            
            
            var condition1 = 1;
           

            var pkgrowCount = parseInt($('#pkg_count_'+rowId_rg).val());
            var pkgdata =[];
            for(var p = 1; p<=pkgrowCount; p++){

                var rowid_pkg = parseInt($('#accmd_reser_id_'+p+'_'+rowId_rg).val());

                pkgdata.push({
                    pos:p,
                    rowId:rowid_pkg
                });
            }
                     

            //alert(pkgdata);
            //console.log(pkgdata)
         //=========================================================================
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('reservation_genarate_voucher_accmd')}}',
                method: "POST",
                data: {pkgdata:JSON.stringify(pkgdata),tourID:tourID,qoutheaderId:qoutheaderId,condition1:condition1,rates:rates,remarks:remarks,
                    conf_to:conf_to,conf_by:conf_by,conf_date:conf_date,noof_pax:noof_pax,client_name:client_name
                    ,supId:supId,rowId_rg:rowId_rg},
                success: function(data) {

                   // console.log(data);
                    
                    if(data=='added'){

                        $('.alert').hide();
                        swal("Hotels Reservation Submited successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                        window.location.reload();                          
                    }else{

                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })

    }
    



        </script>