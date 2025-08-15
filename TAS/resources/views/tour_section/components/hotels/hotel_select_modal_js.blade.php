
<script>



        function fetch_quotation_data() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        var query =$('#txt_sr_id').val();
        var cmb_hotel =$('#cmb_hotel_htmd').val();
        var cm_r_type =$('#cmb_r_type_htmd').val();
        var cmb_meal_plane =$('#cmb_meal_plane_htmd').val();
        // var cmb_period =$('#cmb_period').val();
        var model_date =$('#model_date').val();
        var qtMode = '{{$quickQtMode}}';
        
        
        $.getJSON({
            url:'{{Route('hotel_model_livesearch')}}',
            method:'POST',
            data:{query:query,cmb_hotel:cmb_hotel,cmb_meal_plane:cmb_meal_plane,cm_r_type:cm_r_type,model_date:model_date,qtMode:qtMode},
            //dataType:'json',
        
            success:function (data) {

              //console.log(data);
                $('#slmdtb').html(data.table_data);


            }
        })
        }




    $(document).ready(function() {
        
       
    
        
    
    //quote_supliment_list

    
        $(document).on('keyup','#txt_sr_id',function () {
          
            fetch_quotation_data();
            

        });

          $(document).on('change','#cmb_hotel',function () {

            fetch_quotation_data();

           });
          $(document).on('change','#cm_r_type',function () {

            fetch_quotation_data();

           });
          $(document).on('change','#cmb_meal_plane',function () {

              
            fetch_quotation_data($('#model_date').val());

           });
          $(document).on('change','#cmb_period',function () {

            fetch_quotation_data($('#model_date').val()); 

           });

           fetch_quotation_data($('#model_date').val());
           
        //fetch_quotation_data('');
        //fetch_quotation_data();
           
        $('#cmb_city_htmd').change(function(event){
           //
                 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

                var city = $('#cmb_city_htmd').val();
                let hotel = $('#cmb_hotel_htmd');  
                
                if(city!=0){
                
                    $.getJSON({
                    
                    url: '{{Route('select_hotels')}}',
                    method: "POST",
                    data: {city:city},
                    success: function(data) {

                        //console.log(data);
                       $('#cmb_hotel_htmd').empty();
                       $('#cmb_hotel_htmd').append('<option value="0">Please Select</option>');                      
                       $.each(data, function (key, entry) {
                       hotel.append($('<option></option>').attr('value', entry.id).text(entry.sup_s_name));
                      })
                    }                                   
                }) 
                }else{
                    $('#cmb_hotel_htmd').empty();
                }
            });




    });

    function supliment_Listload(supID_sp,pkgID_sp){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            
            
            var model_date =$('#model_date').val();
            
            $.getJSON({
                url:'{{Route('quote_supliment_list')}}',
                method:'POST',
                data:{pkgid:pkgID_sp,model_date:model_date,supID:supID_sp},
                //dataType:'json',                
                success:function (data) {

                //console.log(supID_sp+'-'+pkgID_sp+'-'+model_date);

                //console.log(data);
                 $('#cp_supliment_body').html(data.cmp_data);
                 $('#op_supliment_body').html(data.opdata); 
                 $('#sup_hid_pkgid').val(pkgID_sp);
                }
            })

}

function addSuplimentToList(){
    
    
    var htpkg_id = parseInt($('#sup_hid_pkgid').val());
    
    let cmpSupList = $('#cmp_sup_div_'+htpkg_id);
    let optSupList = $('#ops_sup_div_'+htpkg_id);

    var cmpsupCount = 0;
    var optsupCount = 0;
    var errorCountSup =0;

    $("#cp_supliment_body tr").each(function(index) {

        cmpsupCount++;

    });

    $("#op_supliment_body tr").each(function(index) {

        optsupCount++;

    });


        //alert(cmpsupCount);

        var cmp_optput='';
        var opt_optput='';
        var itm_pos =1;

        for(var cmp_i = 1; cmp_i <= cmpsupCount; cmp_i++){

        
        // var add_check = false; 

       // alert($('#cmpsup_chk_'+cmp_i).prop('checked'));

        if($('#cmpsup_chk_'+cmp_i).prop('checked') == true){
            
            
            

            var cmp_supId_lp = parseInt($('#cmpsup_id_'+cmp_i).val());
            var cmp_supamt_lp = parseFloat($('#cmpsup_amt_'+cmp_i).val());
            var cmp_supexrate_lp = parseFloat($('#cmpsup_exrate_'+cmp_i).val());
            var cmp_suprtype_lp = parseInt($('#cmpsup_rtp_'+cmp_i).val());
            
           // alert(cmp_supamt_lp);

            if(isNaN(cmp_supexrate_lp) == true || cmp_supexrate_lp == 0){
                errorCountSup++;
            }

            if(isNaN(cmp_supamt_lp) == true || cmp_supamt_lp  == 0){
                errorCountSup++;
            }

            // add_check = true;
            cmp_optput += '<span><input id="cmpsup_id_added_lst_'+itm_pos+'" type="hidden" value ="'+cmp_supId_lp+'">'+
                          '<input id="cmpsup_amt_added_lst_'+itm_pos+'" type="hidden" value = "'+cmp_supamt_lp+'">'+
                          '<input id="cmpsup_exrate_added_lst_'+itm_pos+'" type="hidden" value = "'+cmp_supexrate_lp+'">'+
                          '<input id="cmpsup_rtype_added_lst_'+itm_pos+'" type="hidden" value = "'+cmp_suprtype_lp+'"></span>';
                          
            itm_pos++;            
        }

     //   alert(cmp_optput);

        //alert(cmp_optput+' error'+errorCountSup);
    }

      
    itm_pos=1;

    for(var opt_i = 1; opt_i <= optsupCount; opt_i++){

   
    // var op_add_check = false;

    if($('#opsup_chk_'+opt_i).prop('checked')==true){

             var opt_supId_lp = parseInt($('#opsup_id_'+opt_i).val());
             var opt_supamt_lp = parseFloat($('#opsup_amt_'+opt_i).val());   
             var opt_suprtype_lp = parseInt($('#opsup_rtp_'+opt_i).val());
   

        if(isNaN(opt_supamt_lp)==true || opt_supamt_lp==0){
                errorCountSup++;
        }

        // op_add_check = true;
        opt_optput += '<span><input id="optsup_id_added_lst_'+itm_pos+'" type="hidden" value = "'+opt_supId_lp+'">'+
                    '<input id="optsup_amt_added_lst_'+itm_pos+'" type="hidden" value = "'+opt_supamt_lp+'">'+
                    '<input id="optsup_rtype_added_lst_'+itm_pos+'" type="hidden" value = "'+opt_suprtype_lp+'"></span>';
                    
        itm_pos++;            
    }
    
       // alert(opt_optput+' error'+errorCountSup);
    }

    if(errorCountSup == 0){
        cmpSupList.html(cmp_optput);
        optSupList.html(opt_optput);
        $('#m_modal_7').modal('toggle');
    }else{
        swal("Sorry!, Some fields cannot be empty", "Error", "error");
    }

    //alert(i);


   
}


</script>
