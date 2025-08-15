<script>
  $(document).ready(function(event){
      $('.alert').hide();

      $('#notify_close').click(function(event){
          $('.alert').hide();

      });

  });

  function storeGuide(rowid,dayid){

  
       //var guide_dataStore=[];
        //alert(rowid);
        // for(var pos = 1; pos<=rowid; pos++){
       var sup_id =$('#sup_id_'+rowid+'_'+dayid).val();

       //alert(sup_id);
        
    //    guide_dataStore.push({
    //     //pos:pos,
    //       guide_ID:sup_id      
         
    //    });
        // }
         
        var tour_ID='{{$tour_code}}'; 
        var gt_gdt_id = parseInt($('#tour_qt_gdt_id_'+rowid+'_'+dayid).val());

          $.ajaxSetup({
            headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                     }
                     });
            
            $.getJSON({ 
                
                url:'{{Route('guide_allocate')}}',
                method: "POST",
                data: {sup_id:sup_id,gt_gdt_id:gt_gdt_id},
                        
                success: function(data) {

                    console.log(data);
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Guide Allocated successfully!","Tour Code  :{{$tour_code}}"+'', "success");
                        location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })

  }


  function ganarate_voucher(supId,rowId_rg){
          
        
          var tourID = '{{$tour_ID}}';
          var qoutheaderId ='{{$tq_Gdt_ID}}';            
          var rates = $('#rates_'+rowId_rg).val();
          var remarks = $('#remarks_'+rowId_rg).val();           
          var conf_to = $('#conf_to_'+rowId_rg).val();
          var conf_by = $('#conf_by_'+rowId_rg).val();
          var conf_date = $('#m_datetimepicker_conf_date_'+rowId_rg).val();
          
        
          var gdrowCount = parseInt($('#guide_count_'+rowId_rg).val());
          var guidedata =[];
          for(var g = 1; g<=gdrowCount; g++){

              var rowid_guide = parseInt($('#guide_allocate_id_'+g+'_'+rowId_rg).val());

             guidedata.push({
                  pos:g,
                  rowId:rowid_guide
              });
          }
                   

          //alert(pkgdata);
          //console.log(pkgdata)
       
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          
          $.getJSON({ 
              
              url: '{{Route('guide_voucher_store')}}',
              method: "POST",
              data: {guidedata:JSON.stringify(guidedata),tourID:tourID,qoutheaderId:qoutheaderId,rates:rates,remarks:remarks,
                     conf_to:conf_to,conf_by:conf_by,conf_date:conf_date
                     ,supId:supId,rowId_rg:rowId_rg},
              success: function(data) {

                 console.log(data);
                  
                  if(data=='added'){

                      $('.alert').hide();
                      swal("Guide Allocation Submited successfully!","Tour Code  :  {{$tour_code}}"+'', "success");
                      window.location.reload();                          
                  }else{

                      $('.alert').show();
                      $('#notify').html(data);
                  }
              }                                   
      })

  }

  function genarate_hotel_voucher(supId,rowId_rg){
          
        
          var tourID = '{{$tour_ID}}';
          var qoutheaderId ='{{$tq_Gdt_ID}}';            
          var rates = $('#rates_'+rowId_rg).val();
          var remarks = $('#remarks_'+rowId_rg).val();           
          var conf_to = $('#conf_to_'+rowId_rg).val();
          var conf_by = $('#conf_by_'+rowId_rg).val();
          var conf_date = $('#m_datetimepicker_conf_date_'+rowId_rg).val();
          
        
          var ghtrowCount = parseInt($('#guide_hotel_count_'+rowId_rg).val());
          var g_hoteldata =[];
          for(var h = 1; h<=ghtrowCount; h++){

              var rowid_ghotel = parseInt($('#guide_hotel_id_'+h+'_'+rowId_rg).val());

             g_hoteldata.push({
                  pos:h,
                  rowId:rowid_ghotel
              });
          }
                   

          //alert(pkgdata);
          //console.log(pkgdata)
       
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          
          $.getJSON({ 
              
              url:'{{Route('guide_voucher_hotel_store')}}',
              method: "POST",
              data: {g_hoteldata:JSON.stringify(g_hoteldata),tourID:tourID,qoutheaderId:qoutheaderId,rates:rates,remarks:remarks,
                  conf_to:conf_to,conf_by:conf_by,conf_date:conf_date
                  ,supId:supId,rowId_rg:rowId_rg},
              success: function(data) {

                 console.log(data);
                  
                  if(data=='added'){

                      $('.alert').hide();
                      swal("Guide Allocation Submited successfully!","Tour Code  :  {{$tour_code}}"+'', "success");
                      window.location.reload();                          
                  }else{

                      $('.alert').show();
                      $('#notify').html(data);
                  }
              }                                   
      })

  }
    
</script>