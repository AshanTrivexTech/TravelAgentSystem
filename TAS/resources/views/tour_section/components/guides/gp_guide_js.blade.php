<script>

function save_gp_guides(){
    
    var totdays = parseInt('{{$noOfDays}}');
    var guide_lan = $('#gpsl_lang').val();
    var qoutheaderId ='{{$tourQuotHeaderId}}';
   

    var na_guide_fee = parseFloat($('#gp_nat_guide_rate').val());
    var na_guide_mkp = parseFloat($('#gp_nat_guide_mkp').val());
    var chf_guide_fee = parseFloat($('#gp_chf_guide_rate').val());
    var chf_guide_mkp = parseFloat($('#gp_chf_guide_mkp').val());  
    var gp_guide_lkr_to_baserate = parseFloat($('#gp_guide_lkrrate').val());  

    var gudide_gp_data = [];
    
    for(var dayI = 1; dayI<=totdays; dayI++){
        
       // var gp_hotel_sup_id = parseInt($('#gp_guide_hotel_sup_'+dayI).val());
        var gp_hotel_pos = parseInt($('#gp_guide_hotel_'+dayI).val());
        var gp_hotel_accmd_mkp = parseFloat($('#gp_nat_guide_accmd_mkp_'+dayI).val());
        var gp_guiding_fee_ad = 0;

        
        if($('#guideing_fee_apply_'+dayI).prop('checked') == true){
            gp_guiding_fee_ad=1;
        }else{
            gp_guiding_fee_ad=0;
        }

         if(gp_hotel_pos==0){
            gp_hotel_accmd_mkp =0;
         }

                gudide_gp_data.push({                    
                    dayI:dayI,
                    gf_ad:gp_guiding_fee_ad,
                    ht_pos:gp_hotel_pos,
                    accmd_mkp:gp_hotel_accmd_mkp

                });

        
    }

    console.log(gudide_gp_data);

    if(gp_guide_lkr_to_baserate == 0 || isNaN(gp_guide_lkr_to_baserate)==true){
        
        $('.alert').show();
        $('#notify').html('Please Enter Exchange Rate before save');

    }else
    {

    if(guide_lan!=0){

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });
        

        $.getJSON({
                
                url: '{{Route('quotation_gp_guide_data_save')}}',
                method: "POST",
                data: {guide_lan:guide_lan,na_guide_fee:na_guide_fee,na_guide_mkp:na_guide_mkp,chf_guide_fee:chf_guide_fee,qoutheaderId:qoutheaderId,
                        chf_guide_mkp:chf_guide_mkp,gp_guide_lkr_to_baserate:gp_guide_lkr_to_baserate,gudide_gp_data:JSON.stringify(gudide_gp_data)},
                success: function(data) {

                   // console.log(data);

                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Guides Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                        //localStorage.setItem('activeTab', (tab_id+1));
                        location.reload();

                    }else{

                        $('.alert').show();
                        $('#notify').html(data);
                    }
                    
                }                                   
        })


    }
}


}

function onChange_accmd_gp_guide(gpdayID){

    var hote_pos_sld = parseInt($('#gp_guide_hotel_'+gpdayID).val());
    
    gpLoadGuideRooms(gpdayID,hote_pos_sld);


}


function gpLoadGuideRooms(dayidHt,hotel_pos){
    

    var guide_type = 1;
    var guide_lan = $('#gpsl_lang').val();
    var tourID = '{{$tourID}}';
    var basemkpRate = parseFloat('{{$basecomisionRate}}');

    
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });
            

    //if(guide_type==1 && guide_lan!=0){
                  
            $.getJSON({
                
                url: '{{Route('guide_rlistFilter')}}',
                method: "POST",
                data: {dayidHt:dayidHt,tourID:tourID},
                success: function(data) {

                                     
                             $.each(data, function (key, entry) {
                                 if(entry.pos == hotel_pos){
                                                                       
                                    $('#gp_nat_guide_accmd_crcode_'+dayidHt).val(entry.code);
                                    $('#gp_nat_guide_accmd_rate_'+dayidHt).val((entry.guide).toFixed(2));
                                    $('#gp_nat_guide_accmd_excrate_'+dayidHt).val((entry.rate_to_base).toFixed(2));

                                    $('#gp_nat_guide_accmd_inbrate_'+dayidHt).val((entry.guide/entry.rate_to_base).toFixed(2));
                                    $('#gp_nat_guide_accmd_mkp_'+dayidHt).val(((entry.guide/entry.rate_to_base)/100.00 * basemkpRate).toFixed(2));
                                    
                                 }
                              
                   })
                    
                }                                   
        })
        // cal_Gp_Guide();
    // }
}

function cal_Gp_Guide(){

    var totdays = parseInt('{{$noOfDays}}');
    var basemkpRate = parseFloat('{{$basecomisionRate}}');

    for(var dayI = 1; dayI<=totdays; dayI++){
        
        var gp_guide_rate = parseFloat($('#gp_nat_guide_accmd_rate_'+dayI).val());
        var gp_guide_ExCrate = parseFloat($('#gp_nat_guide_accmd_excrate_'+dayI).val());        
        
        if((gp_guide_ExCrate==0) || (isNaN(gp_guide_ExCrate)==true)){
            gp_guide_ExCrate = 1;
            $('#gp_nat_guide_accmd_excrate_'+dayI).val(0)
        }
        
        $('#gp_nat_guide_accmd_inbrate_'+dayI).val((gp_guide_rate/gp_guide_ExCrate).toFixed(2));
        $('#gp_nat_guide_accmd_mkp_'+dayI).val(((gp_guide_rate/gp_guide_ExCrate)/100.00 * basemkpRate).toFixed(2));
        

    }

    
}

function cal_head_gp_guide(){
    
    var basemkpRate = parseFloat('{{$basecomisionRate}}');
    
    var nat_guide_rate = parseFloat($('#gp_nat_guide_rate').val());
    var chf_guide_rate = parseFloat($('#gp_chf_guide_rate').val());
    

      if((nat_guide_rate==0) || (isNaN(nat_guide_rate)==true)){
        nat_guide_rate=0;
      }
      if((chf_guide_rate==0) || (isNaN(chf_guide_rate)==true)){
        chf_guide_rate=0;
      }

      var nat_mkptot = parseFloat($('#gp_nat_guide_mkp').val());
      var chf_mkptot = parseFloat($('#gp_chf_guide_mkp').val());

      //$('#gp_nat_guide_mkp').val((nat_guide_rate/100.00 * basemkpRate).toFixed(2));
      //$('#gp_chf_guide_mkp').val((chf_guide_rate/100.00 * basemkpRate).toFixed(2));
      
      $('#gp_nat_guide_tot').val((nat_mkptot+nat_guide_rate).toFixed(2));
      $('#gp_chf_guide_tot').val((chf_mkptot+chf_guide_rate).toFixed(2));
      
}

function onChange_lang_gp(){


    var lng_id = parseInt($('#gpsl_lang').val());
    var basemkpRate = parseFloat('{{$basecomisionRate}}');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });
        
        //alert(lng_id);

        $.getJSON({
                
                url: '{{Route('quotation_get_gp_guide_fee')}}',
                method: "POST",
                data: {lng_id:lng_id},
                success: function(data) {

                    console.log(data);
                    
                    if(data!=''){
                        
                        $('#gp_nat_guide_rate').val((data.nat_guide_rate).toFixed(2));
                        $('#gp_chf_guide_rate').val((data.chf_guide_rate).toFixed(2));
                        
                       
                        var basemkpRate = parseFloat('{{$basecomisionRate}}');
    
                        var nat_guide_rate = parseFloat($('#gp_nat_guide_rate').val());
                        var chf_guide_rate = parseFloat($('#gp_chf_guide_rate').val());
                        

                        if((nat_guide_rate==0) || (isNaN(nat_guide_rate)==true)){
                            nat_guide_rate=0;
                        }
                        if((chf_guide_rate==0) || (isNaN(chf_guide_rate)==true)){
                            chf_guide_rate=0;
                        }
                      

                        $('#gp_nat_guide_mkp').val((nat_guide_rate/100.00 * basemkpRate).toFixed(2));
                        $('#gp_chf_guide_mkp').val((chf_guide_rate/100.00 * basemkpRate).toFixed(2));
                        
                        var nat_mkptot = parseFloat($('#gp_nat_guide_mkp').val());
                        var chf_mkptot = parseFloat($('#gp_chf_guide_mkp').val());

                        $('#gp_nat_guide_tot').val((nat_mkptot+nat_guide_rate).toFixed(2));
                        $('#gp_chf_guide_tot').val((chf_mkptot+chf_guide_rate).toFixed(2));
                        


                        
                    }

                }                                   
        })

}

</script>