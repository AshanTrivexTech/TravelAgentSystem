


<script>    
    function save_gp_vehicleTypes(){
        //quotation_save_gp_vehicleTypes

            var gpvtypeData =[];
            var gp_posvtype =0;
            var touqthdid_gp = parseInt('{{$tourQuotHeaderId}}');

        $("#gp_vtype_tbody tr").each(function(index) {
            
            gp_posvtype++;
            
            
            var gp_vtype_id = parseInt($('#gp_vehicle_type_'+gp_posvtype).val());
            var gp_vtye_rate = parseFloat($('#gp_vehicle_rate_'+gp_posvtype).val());
            var gpextr_vtype_id = parseInt($('#gp_extr_vehicle_type_'+gp_posvtype).val());
            var gpextr_vtye_rate = parseFloat($('#gp_extr_vehicle_rate_'+gp_posvtype).val());
            var gppaxstpid = parseInt($('#gp_pax_stupid_'+gp_posvtype).val());
            var millage_extr_vh = parseInt($('#gp_extr_vehicle_milage_'+gp_posvtype).val());
            
            var gpguide_type = parseInt($('#gpsld_guide_type_'+gp_posvtype).val());            
            var gpfoc_accmd = parseInt($('#gp_accmd_foc_'+gp_posvtype).val());
            
            var gpguide_accmd = 0;
            
            if($('#gp_guide_accmd_'+gp_posvtype).prop('checked') == true){
                gpguide_accmd=1;
            }else{
                gpguide_accmd=0;
            }
            
            gpvtypeData.push({

                gp_vtype_id:gp_vtype_id,
                gppaxstpid:gppaxstpid,
                gp_vtye_rate:gp_vtye_rate,
                gpextr_vtype_id:gpextr_vtype_id,
                gpextr_vtye_rate:gpextr_vtye_rate,
                millage_extr_vh:millage_extr_vh,
                gpguide_type:gpguide_type,
                gpguide_accmd:gpguide_accmd,
                gpfoc_accmd:gpfoc_accmd

            });
        });	
        
        //console.log(gpvtypeData);

            var main_vmkprate = parseFloat($('#gp_mvehicle_markup').val());
            var extr_vmkprate = parseFloat($('#gp_extrvehicle_markup').val());
            var lkr_toBaserate_vtype = parseFloat($('#gp_mvehicle_exchng_rate').val());

            if(isNaN(lkr_toBaserate_vtype)){
                lkr_toBaserate_vtype=0;
            }

            if(isNaN(main_vmkprate)){
                main_vmkprate=0;
            }
            if(isNaN(extr_vmkprate)){
                extr_vmkprate=0;
            }

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                }
                        });
                            
                            $.getJSON({
                                
                                url: '{{Route('quotation_save_gp_vehicleTypes')}}',
                                method: "POST",
                                data: {gpvtypeData:JSON.stringify(gpvtypeData),touqthdid_gp:touqthdid_gp,
                                        main_vmkprate:main_vmkprate,extr_vmkprate:extr_vmkprate,exchar_rate:lkr_toBaserate_vtype},

                                success: function(data) {
        
                                     console.log(data);

                                    if(data=='saved'){
                                        $('.alert').hide();
                                        swal("Vehicles Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                                       // localStorage.setItem('activeTab', (tab_id+1));
                                        location.reload();
                                        
                                    }else{
                                        $('.alert').show();
                                        $('#notify').html(data);
                                    }
                                }                                   
                            })

    }

    function extra_vehicle_onChange(id){

      
            var vtype_id = parseInt($('#gp_extr_vehicle_type_'+id).val());

            $.ajaxSetup({
             headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }
             });

             $.getJSON({                                
                url: '{{Route('quotation_get_gp_vehicle_data')}}',
                method: "POST",
                data: {vtype_id:vtype_id},
                success: function(data) { 

                  
                   if(data!=0){
                     
                     $('#gp_extr_vehicle_rate_'+id).val(data.toFixed(2));

                   }else{
                    $('#gp_extr_vehicle_rate_'+id).val(0.00);
                   }
                    
                }                          
            })
       
    }

    function calgp_summary(){
             
        var touqthdid_gp = parseInt('{{$tourQuotHeaderId}}');
        var gp_pp_dbl_cost = parseFloat($('#ttCostwith_sup_dbl').html());
        var gp_pp_sgl_cost = parseFloat($('#ttCostwith_sup_sgl').html());
        var gp_pp_sglMkp = parseFloat($('#ttmarkup_sgl').html());
        var gp_pp_dblMkp = parseFloat($('#ttmarkup_dbl').html());
        
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
             }); 

                    $.getJSON({                                
                        url: '{{Route('quotation_cal_gp_vehicle_data')}}',
                        method: "POST",
                        data: {tourQtHdID:touqthdid_gp,gp_pp_sgl_cost:gp_pp_sgl_cost,
                                gp_pp_dbl_cost:gp_pp_dbl_cost,gp_pp_sglMkp:gp_pp_sglMkp,gp_pp_dblMkp:gp_pp_dblMkp},
                        success: function(data) { 

                            // console.log(data);
                             $('#gp_summary_head').html(data.head_data);
                             $('#gp_summary_body').html(data.body_data);
                            
                        }                          
                })
    }

    function cal_gp_summary(){
        
        
    }

calgp_summary();

</script>