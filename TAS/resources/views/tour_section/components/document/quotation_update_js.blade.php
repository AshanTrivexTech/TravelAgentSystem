<script>
      $(document).ready( function(){
      
      //To hide the alert window on load the page
      $('.alert').hide();
        
    // function onPresKeyChild(){

    //     var child_pax_count = parseInt($('#no_of_packs_children').val());
        
    //     // if(isNaN(child_pax_count) || child_pax_count==0){
    //     //    // $('.chkbx').prop("disabled", true);
    //     //    //$('#child_accmd_chkb').attr('disabled',true);
    //        $('#child_accmd_chkb').prop('disabled', false);
    //     //     //$('.m-checkbox').prop("disabled", false);
    //     // }else{
    //     //     $('#child_accmd_chkb').attr('disabled',false);
    //     // }
    // }
    
        
        

      //to close the alert window after popup 
      $('#notify_close').click(function(event){
          $('.alert').hide();
      });
      // submit the form
      $( "#frm_submit").click(function( event ) {
              
              //setup Ajax token ( without this function cannot pass data to controller)
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
              });
            
              

              var id='{{$tourQuotHeaderId}}';
              var market=$('#market_v').val();
              var agent=$('#t_agent').val();
              var branch=$('#t_branch').val();
              var packs=$('#no_of_packs_adult').val();
              var packs_child=$('#no_of_packs_children').val();
              var t_type=$('#t_type').val();
              var start_date=$('#start_date').val();
              var end_date=$('#end_date').val();
              var c_rate=$('#commission_rate').val();
              var base_currencies=$('#base_currencies').val();
              var remarks=$('#remarks').val();
              var t_code='{{$tourCode}}';
              
              var chk_chld_accmd=0;
              var chk_chld_trsp=0;
              var chk_chld_guide=0;
              var chk_chld_misc=0;
              var bcTo_LKR=$('#bc_toLKR').val();

              if($('#child_accmd_chkb').prop('checked')){

                chk_chld_accmd =1;
                  
              }
              if($('#child_trp_chkb').prop('checked')){

                chk_chld_trsp =1;
                  
              }
              if($('#child_guide_chkb').prop('checked')){

                chk_chld_guide =1;
                  
              }
              if($('#child_misc_chkb').prop('checked')){

                chk_chld_misc =1;
                  
              }

                      
                $.ajax({
                  
                  url: '{{Route('quotation_update')}}',
                  method: "POST",
                  data: {id:id,market:market,agent:agent,branch:branch,packs:packs,packs_child:packs_child,
                    t_type:t_type,start_date:start_date,end_date:end_date,
                    c_rate:c_rate,base_currencies:base_currencies,remarks:remarks,
                    chk_chld_accmd:chk_chld_accmd,chk_chld_trsp:chk_chld_trsp,chk_chld_guide:chk_chld_guide,
                    chk_chld_misc:chk_chld_misc,bcTo_LKR:bcTo_LKR},
                  success: function(data) {
                          
                      console.log(data);
                      //if Added 
                      if(data=='updated'){
                          $('.alert').hide();
                          swal("Quotation update successfully completed!", ""+t_code, "success");
                         
                          $("html, body").animate({
                                  scrollTop: 0
                              });     

                                                   
                      }else{
                          // pop up error
                              $("html, body").animate({
                                  scrollTop: 0
                              });
                              $('.alert').show();
                              $('#notify').html(data);
                              
                              //$('#emp_listGrid').append(data);
                                                           
                      }
                      
                      
                  }
                  })

       });
  });
</script>