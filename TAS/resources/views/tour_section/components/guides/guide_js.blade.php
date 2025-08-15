<script>
function addGuide(dayId){
   // alert(dayId);
    var RowsCount =0;
    var GuideTypeId = $('#sl_guide_type_'+dayId).val();
    var guidetype = $('#sl_guide_type_'+dayId+' option:selected').text();
    var guidelangname = $('#sl_lang_'+dayId+' option:selected').text();

    var langId = $('#sl_lang_'+dayId).val();
    var hotel_pos = $('#sl_hotel_'+dayId).val();
    // var guideRoomtypeID = $('#sl_gr_type_'+dayId).val();
    var tour_id = parseInt('{{$tourID}}');

    $("#gdttb_"+dayId+" tr").each(function(index) {

        RowsCount++;
    });

    

    if (GuideTypeId == 0){

        $('.alert').show();
        $('#notify').html('* Please Select Guide type and Language');
    }else if(langId == 0)
    {
        $('.alert').show();
        $('#notify').html('Please Select Guide Language');
    }
    // else if(isNaN(guidefee)==true ){

    //      $('.alert').show();
    //      $('#notify').html('Please Select Rate Type'); 
    // }
    else{
            
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({
                
                url: '{{Route('guide_fee_find')}}',
                method: "POST",
                data: {GuideTypeId:GuideTypeId,langId:langId,hotel_pos:hotel_pos,dayId:dayId,tour_id:tour_id},
                success: function(data) {
                    
                   console.log(data);

                    if(data!='none'){
                        
                        RowsCount++;
                        let cur_Date = $('#gdttb_'+dayId);
                        var enableRoom ='';
                        var baseCom = '{{$basecomisionRate}}';

                        var guidefee = parseFloat(data.guide_lang_Rate);
                        var guideRoomid = data.guide_room_id;
                        var guideRoomsupId = data.guide_room_supId;
                        var guideRoomcrID = data.guide_room_crId;
                        var guideRoomcrCode = data.guide_room_crcode;
                        var GuideRoomamount = data.guide_room_amount;
                        var baseCurrncyGuide ='{{$baseCurrncyCode}}';
                        var langCom = guidefee/100.00 * baseCom;                        
                        var roomCom =0.00;
                        var guide_exrate_accmd = data.guide_room_exrate;

                        

                        if(hotel_pos==0){
                            enableRoom ='disabled';
                            guideRoomid=0;
                            guideRoomcrCode='None';
                            guide_exrate_accmd = 0.00;
                            GuideRoomamount = 0.00;
                        }else{ 
                            roomCom = GuideRoomamount/100.00 * baseCom;
                        }
                           // console.log(data);

                        cur_Date.append($('<tr style="text-align: center;" class="RemoveGuide_'+dayId+'_'+RowsCount+'"></tr>').attr('id','gtbtr_'+dayId+'_'+RowsCount)                                 
                                 .html('<td class="RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                        '<strong class="RemoveGuide_'+dayId+'_'+RowsCount+'">'+guidetype+' - '+guidelangname+'</strong>'+
                                        '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_type_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+GuideTypeId+'">'+
                                        '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_lang_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+langId+'">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="15%">'+
                                          'Guide fee (LKR) :'+
                                          '<input id="guide_fee_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+guidefee.toFixed(2)+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                        '</td>'+                                        
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="15%">'+
                                                   'Guide fee Mark Up (LKR)'+
                                                   '<input id="guide_com_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+langCom.toFixed(2)+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                   
                                       '</td>'+                               
                                       '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="10%">'+
                                                'Room P.C'+
                                                '<input id="guide_rm_crid_'+dayId+'_'+RowsCount+'" disabled style="text-align: center;" value="'+guideRoomcrCode+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="12%">'+
                                                 'Room Rate'+
                                                 '<input id="guide_rm_am_'+dayId+'_'+RowsCount+'" disabled style="text-align: center;" onkeyup="CalGuidefees()" value="'+GuideRoomamount+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                 '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_rm_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+guideRoomid+'">'+
                                        '</td>'+
                                        
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="10%">'+
                                                '1&nbsp;&nbsp;&nbsp;'+baseCurrncyGuide+
                                                '<input disabled id="guide_rm_cr_exrate_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+guide_exrate_accmd+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="25%">'+
                                                   'Room Mark Up'+
                                                   '<input id="guide_rm_com_'+dayId+'_'+RowsCount+'" '+enableRoom+' value="'+roomCom.toFixed(2)+'" onkeyup="CalGuidefees()" style="text-align: center;" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                   
                                       '</td>'+
                                       '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="text-align: center;">'+
                                                    '<button type="button" onclick="RemoveGuide('+dayId+','+RowsCount+')" class="btn btn-danger m-btn btn-sm m-btn--icon RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                                            '<span class="RemoveGuide_'+dayId+'_'+RowsCount+'"><i class="la la-trash RemoveGuide_'+dayId+'_'+RowsCount+'"></i>'+
                                                                '<span class="RemoveGuide_'+dayId+'_'+RowsCount+'">Remove</span>'+
                                                            '</span>'+
                                                    '</button>'+
       
                                        '</td>'));

                                         CalGuidefees();
                                       
                    }else{
                        $('.alert').show();
                        $('#notify').html('Sorry! Guide Rate not available for this Language, Please enter data before select');
                    }
                }                                   
        })
    }
 
}

function addGuide_Auto(dayId){
   // alert(dayId);
    var RowsCount =0;
    var GuideTypeId = $('#sl_guide_type_1').val();
    var guidetype = $('#sl_guide_type_1 option:selected').text();
    var guidelangname = $('#sl_lang_1 option:selected').text();

    var langId = $('#sl_lang_1').val();
    //var hotel_pos = $('#sl_hotel_'+dayId).val();
    var hotel_pos = 1;
    // var guideRoomtypeID = $('#sl_gr_type_'+dayId).val();
    var tour_id = parseInt('{{$tourID}}');

    $("#gdttb_"+dayId+" tr").each(function(index) {

        RowsCount++;
    });
   

    if (GuideTypeId == 0){

        $('.alert').show();
        $('#notify').html('* Please Select Guide type and Language');
    }else if(langId == 0)
    {
        $('.alert').show();
        $('#notify').html('Please Select Guide Language');
    }else{
            
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({
                
                url: '{{Route('guide_fee_find')}}',
                method: "POST",
                data: {GuideTypeId:GuideTypeId,langId:langId,hotel_pos:hotel_pos,dayId:dayId,tour_id:tour_id},
                success: function(data) {
                    
                   // console.log(data);

                    if(data!='none'){
                        
                        RowsCount++;
                        let cur_Date = $('#gdttb_'+dayId);
                        var enableRoom ='';
                        var baseCom = '{{$basecomisionRate}}';

                        var guidefee = parseFloat(data.guide_lang_Rate);
                        var guideRoomid = data.guide_room_id;
                        var guideRoomsupId = data.guide_room_supId;
                        var guideRoomcrID = data.guide_room_crId;
                        var guideRoomcrCode = data.guide_room_crcode;
                        var GuideRoomamount = data.guide_room_amount;
                        var baseCurrncyGuide ='{{$baseCurrncyCode}}';
                        var langCom = guidefee/100.00 * baseCom;                        
                        var roomCom =0.00;
                        var guide_exrate_accmd = data.guide_room_exrate;

                        

                        
                        if(hotel_pos==0){
                            enableRoom ='disabled';
                            guideRoomid=0;
                            guideRoomcrCode='None';
                            guide_exrate_accmd = 0.00;
                            GuideRoomamount = 0.00;
                        }else{ 
                            roomCom = GuideRoomamount/100.00 * baseCom;
                        }
                        
                           // console.log(data);
                             
                           cur_Date.append($('<tr style="text-align: center;" class="RemoveGuide_'+dayId+'_'+RowsCount+'"></tr>').attr('id','gtbtr_'+dayId+'_'+RowsCount)                                 
                                 .html('<td class="RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                        '<strong class="RemoveGuide_'+dayId+'_'+RowsCount+'">'+guidetype+' - '+guidelangname+'</strong>'+
                                        '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_type_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+GuideTypeId+'">'+
                                        '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_lang_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+langId+'">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="15%">'+
                                          'Guide fee (LKR) :'+
                                          '<input id="guide_fee_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+guidefee.toFixed(2)+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                        '</td>'+                                        
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="15%">'+
                                                   'Guide fee Mark Up (LKR)'+
                                                   '<input id="guide_com_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+langCom.toFixed(2)+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                   
                                       '</td>'+                               
                                       '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="10%">'+
                                                'Room P.C'+
                                                '<input id="guide_rm_crid_'+dayId+'_'+RowsCount+'" disabled style="text-align: center;" value="'+guideRoomcrCode+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="12%">'+
                                                 'Room Rate'+
                                                 '<input id="guide_rm_am_'+dayId+'_'+RowsCount+'" disabled style="text-align: center;" onkeyup="CalGuidefees()" value="'+GuideRoomamount+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                 '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_rm_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+guideRoomid+'">'+
                                        '</td>'+
                                        
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="10%">'+
                                                '1&nbsp;&nbsp;&nbsp;'+baseCurrncyGuide+
                                                '<input disabled id="guide_rm_cr_exrate_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+guide_exrate_accmd+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="25%">'+
                                                   'Room Mark Up'+
                                                   '<input id="guide_rm_com_'+dayId+'_'+RowsCount+'" '+enableRoom+' value="'+roomCom.toFixed(2)+'" onkeyup="CalGuidefees()" style="text-align: center;" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                   
                                       '</td>'+
                                       '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="text-align: center;">'+
                                                    '<button type="button" onclick="RemoveGuide('+dayId+','+RowsCount+')" class="btn btn-danger m-btn btn-sm m-btn--icon RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                                            '<span class="RemoveGuide_'+dayId+'_'+RowsCount+'"><i class="la la-trash RemoveGuide_'+dayId+'_'+RowsCount+'"></i>'+
                                                                '<span class="RemoveGuide_'+dayId+'_'+RowsCount+'">Remove</span>'+
                                                            '</span>'+
                                                    '</button>'+
       
                                        '</td>'));

                                         CalGuidefees();
                                       
                    }else if(isNaN(guidefee)==false){
                        $('.alert').show();
                        $('#notify').html('Sorry! Guide Rate not available for this Language, Please enter data before select');
                    }
                }                                   
        })
    }
 
}

function removeAll(){
    var grcout = 0;    
    var noofDays_aplall = '{{$noOfDays}}';

    $("#gdttb_1 tr").each(function(index) {
        
        grcout++;
    });
    
        for(var dayId =1;dayId<=noofDays_aplall;dayId++)
        { 
            $('#gdttb_'+dayId).html('');
        }    
    CalGuidefees();
}

function appyAll(){
    
    var grcout = 0;    
    var noofDays_aplall = '{{$noOfDays}}';

    $("#gdttb_1 tr").each(function(index) {
        
        grcout++;
    });

    if(grcout!=0){
        for(var dayId =2;dayId<=noofDays_aplall;dayId++)
        {   
            $('#gdttb_'+dayId).html('');

            // addGuide_Auto(dayId);
            
            for(var RowsCount=1; RowsCount<=grcout;RowsCount++)
            {   
                var guidetypeguidelangname = $('#guide_typelngname_1_1').html();
                var GuideTypeId = $('#guide_type_id_1_1').val();
                var guideType=$('#sl_guide_type_1 :selected').text();
                var langId = $('#guide_lang_id_1_1').val();
                var glang=$('#sl_lang_1 :selected').text();
                var guidefee = parseFloat($('#guide_fee_1_1').val());
                var langCom = parseFloat($('#guide_com_1_1').val());
                var guideRoomcrCode = $('#guide_rm_crid_1_1').val();
                var GuideRoomamount = parseFloat($('#guide_rm_am_1_1').val());
                var guideRoomid = $('#guide_rm_id_1_1').val();
                var baseCurrncyGuide ='{{$baseCurrncyCode}}';
                var guideRm_ex_rate = parseFloat($('#guide_rm_cr_exrate_1_1').val());
                var roomCom = parseFloat($('#guide_rm_com_1_1').val());
               
                var enableRoom='';
                
                if(guideRoomid==0){
                    enableRoom ='disabled';                            
                }

               let cur_Date = $('#gdttb_'+dayId);
                
               cur_Date.append($('<tr style="text-align: center;" class="RemoveGuide_'+dayId+'_'+RowsCount+'"></tr>').attr('id','gtbtr_'+dayId+'_'+RowsCount)                                 
                                 .html('<td class="RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                        '<strong id="guide_typelngname_'+dayId+'_'+RowsCount+'" class="RemoveGuide_'+dayId+'_'+RowsCount+'">'+guideType+' - '+glang+'</strong>'+
                                        '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_type_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+GuideTypeId+'">'+
                                        '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_lang_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+langId+'">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="15%">'+
                                          'Guide fee (LKR) :'+
                                          '<input id="guide_fee_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+guidefee.toFixed(2)+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                        '</td>'+                                        
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="15%">'+
                                                   'Guide fee Mark Up (LKR)'+
                                                   '<input id="guide_com_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+langCom.toFixed(2)+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                   
                                       '</td>'+                               
                                       '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="10%">'+
                                                'Room P.C'+
                                                '<input id="guide_rm_crid_'+dayId+'_'+RowsCount+'" disabled style="text-align: center;" value="'+guideRoomcrCode+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="12%">'+
                                                 'Room Rate'+
                                                 '<input id="guide_rm_am_'+dayId+'_'+RowsCount+'" '+enableRoom+' style="text-align: center;" onkeyup="CalGuidefees()" value="'+GuideRoomamount+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                 '<input class="RemoveGuide_'+dayId+'_'+RowsCount+'" id="guide_rm_id_'+dayId+'_'+RowsCount+'" type="hidden" value="'+guideRoomid+'">'+
                                        '</td>'+
                                        
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="10%">'+
                                                '1&nbsp;&nbsp;&nbsp;'+baseCurrncyGuide+
                                                '<input '+enableRoom+' id="guide_rm_cr_exrate_'+dayId+'_'+RowsCount+'" style="text-align: center;" onkeyup="CalGuidefees()" value="'+guideRm_ex_rate+'" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                        '</td>'+
                                        '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="white-space: nowrap; overflow: hidden;" width="25%">'+
                                                   'Room Mark Up'+
                                                   '<input id="guide_rm_com_'+dayId+'_'+RowsCount+'" '+enableRoom+' value="'+roomCom.toFixed(2)+'" onkeyup="CalGuidefees()" style="text-align: center;" type="text" class="form-control m-input sm RemoveGuide_'+dayId+'_'+RowsCount+' cal_guide_row">'+
                                                   
                                       '</td>'+
                                       '<td class="RemoveGuide_'+dayId+'_'+RowsCount+'" style="text-align: center;">'+
                                                    '<button type="button" onclick="RemoveGuide('+dayId+','+RowsCount+')" class="btn btn-danger m-btn btn-sm m-btn--icon RemoveGuide_'+dayId+'_'+RowsCount+'">'+
                                                            '<span class="RemoveGuide_'+dayId+'_'+RowsCount+'"><i class="la la-trash RemoveGuide_'+dayId+'_'+RowsCount+'"></i>'+
                                                                '<span class="RemoveGuide_'+dayId+'_'+RowsCount+'">Remove</span>'+
                                                            '</span>'+
                                                    '</button>'+
       
                                        '</td>'));
            }
        }
    }
    CalGuidefees();
}


function LoadGuideRooms(dayidHt){
    

    var guide_type = $('#sl_guide_type_'+dayidHt).val();
    var guide_lan = $('#sl_lang_'+dayidHt).val();
    var tourID = '{{$tourID}}';

    $('#sl_hotel_'+dayidHt).empty();

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });
            

    if(guide_type==1 && guide_lan!=0){
                  
            $.getJSON({
                
                url: '{{Route('guide_rlistFilter')}}',
                method: "POST",
                data: {dayidHt:dayidHt,tourID:tourID},
                success: function(data) {

                  //console.log(data);
                   $('#sl_hotel_'+dayidHt).empty();
                            
                             $('#sl_hotel_'+dayidHt).append('<option value="0">None</option>');                      
                             $.each(data, function (key, entry) {
                                 if(entry.pos == 1){
                                    $('#sl_hotel_'+dayidHt).append($('<option selected></option>').attr('value', entry.pos).text(entry.sup_s_name));
                                 }else{
                                    $('#sl_hotel_'+dayidHt).append($('<option></option>').attr('value', entry.pos).text(entry.sup_s_name));
                                 }
                              
                   })
                    
                }                                   
        })
    }
}

function RemoveGuide(dayidguide,guideRow){
    //RemoveGuide_'+dayId+'_'+RowsCount+'
    var grcout = 0;
     $("#gdttb_"+dayidguide+" tr").each(function(index) {
        
        grcout++;
    });

    //alert(rcout);

    if(guideRow==grcout){
    $('.RemoveGuide_'+dayidguide+'_'+guideRow).remove(); 
    CalGuidefees();   
    }else{
        //alert('Sorry! You cannt remove this item');
        swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
    }
}

function CalGuidefees()
{   //var guideRowCount;
    var dayCount = '{{$noOfDays}}';

    var totguidefeeLKR=0;
    var totguideComLKR=0;
    var totguideRmRate=0;
    var totguideRmCom=0;
    var rowid_guide = 0;

    for(rowid_guide = 1; rowid_guide <= dayCount; rowid_guide++){
        var gcostval=0;
        var gcomval=0;
        var grmrateval=0;        
        var grmcomval=0;

        var guidpos=0;
        
        $("#gdttb_"+rowid_guide+" tr").each(function(index) {
            
            guidpos++;            
            var gcost=0;
            var gcom=0;
            var grmrate=0;
            var grmbscr=0;
            var grmcom=0;
            
            gcost = parseFloat($('#guide_fee_'+rowid_guide+'_'+guidpos).val());
            gcom = parseFloat($('#guide_com_'+rowid_guide+'_'+guidpos).val());
            grmrate = parseFloat($('#guide_rm_am_'+rowid_guide+'_'+guidpos).val());
            //grmbscr = parseFloat($('#guide_rm_cr_exrate_'+rowid_guide+'_'+guidpos).val());
            grmcom = parseFloat($('#guide_rm_com_'+rowid_guide+'_'+guidpos).val());
            
            var grmbscr = 1;
           // console.log(gcost);

            if(isNaN(parseFloat($('#guide_rm_cr_exrate_'+rowid_guide+'_'+guidpos).val())) == false)
            {                  
                grmbscr = parseFloat($('#guide_rm_cr_exrate_'+rowid_guide+'_'+guidpos).val());
                 if(grmbscr==0){
                    grmbscr=1;
                 }
            }

            if(isNaN(gcost)==false){
                gcostval += parseFloat(gcost);
                
            }
            if(isNaN(gcom)==false){
                gcomval += parseFloat(gcom);
                
            }
            if(isNaN(grmrate)==false){
                grmrateval += parseFloat(grmrate/grmbscr);
            }
            if(isNaN(grmcom)==false){
                grmcomval += parseFloat(grmcom);
                
            }

    });

          totguidefeeLKR +=gcostval;
          totguideComLKR +=gcomval;
          totguideRmRate +=grmrateval;
          totguideRmCom  +=grmcomval;

    }


    //console.log(totguidefeeLKR);

    var basratetoguide = parseFloat($('#basetocrguide').val());

    if(isNaN(basratetoguide)==true){
        basratetoguide=1;
    }else if(basratetoguide==0){
        basratetoguide=1;
    }

    $('#guide_costlk').html(parseFloat(totguidefeeLKR).toFixed(2));
    $('#guide_costex').html(parseFloat(totguidefeeLKR/basratetoguide).toFixed(2));    
    $('#guide_rmcost').html(parseFloat(totguideRmRate).toFixed(2));
    
    $('#guide_mklk').html(parseFloat(totguideComLKR).toFixed(2));
    $('#guide_mkex').html(parseFloat(totguideComLKR/basratetoguide).toFixed(2));
    $('#guide_mkrm').html(parseFloat(totguideRmCom).toFixed(2));

    $('#guide_tot').html(parseFloat(totguideComLKR+totguidefeeLKR).toFixed(2));
    $('#guide_totexr').html(parseFloat((totguideComLKR+totguidefeeLKR)/basratetoguide).toFixed(2));
    $('#guide_totrm').html(parseFloat(totguideRmRate+totguideRmCom).toFixed(2));
    
    $('#guide_mkp').html(parseFloat((totguideComLKR*100.00)/totguidefeeLKR).toFixed(3)+'%');
    $('#guide_2mkp').html(parseFloat((totguideComLKR*100.00)/totguidefeeLKR).toFixed(3)+'%');
    $('#guide_rmmkp').html(parseFloat((totguideRmCom*100.00)/totguideRmRate).toFixed(3)+'%');
    
    



}

function guideSave(){

var dayCount = '{{$noOfDays}}';
var tourID = '{{$tourID}}';
var qoutheaderId ='{{$tourQuotHeaderId}}';
var tourStDate = '{{$tourStDate}}';
var tourVersion ='{{$tourVersion}}';

var totguidefeeLKR=0;
var totguideComLKR=0;
var totguideRmRate=0;
var totguideRmCom=0;
var rowid_guide = 0;

var guideData =[];
var guideDataDetails =[];
var growsCount =0;
var grmrateNull=0;



for(rowid_guide = 1; rowid_guide <= dayCount; rowid_guide++){
    
    var gcostval = 0;
    var gcomval = 0;
    var grmrateval = 0;        
    var grmcomval = 0;

    var guidpos = 0;
    
    guideData.push({
        tour_qout_headerID:qoutheaderId,
            tourID:tourID,
            tourDay:rowid_guide
    });

   // var bkdate = $('date_'+rowid_guide).val();

    $("#gdttb_"+rowid_guide+" tr").each(function(index) {
        
        guidpos++;            
        var gcost=0;
        var gcom=0;
        var grmrate=0;
        var grmbscr=0;
        var grmcom=0;
        growsCount++

       var glangID = parseInt($('#guide_lang_id_'+rowid_guide+'_'+guidpos).val());
       var gtypeID = parseInt($('#guide_type_id_'+rowid_guide+'_'+guidpos).val());
        gcost = parseFloat($('#guide_fee_'+rowid_guide+'_'+guidpos).val());
        gcom = parseFloat($('#guide_com_'+rowid_guide+'_'+guidpos).val());
        grmrate = parseFloat($('#guide_rm_am_'+rowid_guide+'_'+guidpos).val());
        //grmbscr = parseFloat($('#guide_rm_cr_exrate_'+rowid_guide+'_'+guidpos).val());
        grmcom = parseFloat($('#guide_rm_com_'+rowid_guide+'_'+guidpos).val());
        var groomID = $('#guide_rm_id_'+rowid_guide+'_'+guidpos).val();
        var groomhas = 1;

        if($('#guide_rm_crid_'+rowid_guide+'_'+guidpos).val()=='None'){
            groomID=0;
            groomhas=0;
        }
        


        var grmbscr = 1;
       // console.log(gcost);
        
        if(isNaN(parseFloat($('#guide_rm_cr_exrate_'+rowid_guide+'_'+guidpos).val())) == false)
        {                  
            grmbscr = parseFloat($('#guide_rm_cr_exrate_'+rowid_guide+'_'+guidpos).val());
             if(grmbscr==0){
                grmrateNull++;
                grmbscr=1;
             }

        }else{
            grmrateNull++;
        }

        if(isNaN(gcost)==false){
            if(gcost==0){
            grmrateNull++;
            }
        }else{
            grmrateNull++;
        }


        if(isNaN(gcom)==false){
            if(gcom==0){
            
            }
        }else{
            grmrateNull++;
        }

        if(isNaN(grmcom)==false){
            if(grmcom==0){
            
            }
        }else{
            grmrateNull++;
        }

        if(isNaN(grmrate)==false){
            if(grmrate==0){
                grmrate=0;
            }
        }else{
            grmrateNull++;
        }


        guideDataDetails.push({

               
                days:rowid_guide,
                pos:guidpos,
                gtype:gtypeID,
                glang:glangID,                
                groomid:groomID,
                grmhas:groomhas,                
                gfee:gcost,
                gmk:gcom,
                groomrate:grmrate,
                groomexrate:grmbscr,
                groommk:grmcom              

        });

       
});

     

}

var basratetoguide = parseFloat($('#basetocrguide').val());

if(isNaN(basratetoguide)==true){
    basratetoguide=1;
}else if(basratetoguide==0){
    basratetoguide=1;
}

var totalGuidefee = parseFloat($('#guide_totexr').html());
var totalGuideAcmd = parseFloat($('#guide_totrm').html());
//console.log(guideData);
//console.log(guideDataDetails);



if(growsCount == 0){

        $('.alert').show();
        $('#notify').html('Nothing to save');

    // }else if(grmrateNull != 0){
    //     $('.alert').show();
    //     $('#notify').html('Please Chech the details before save.');
        
    }else{    
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({
                
                url: '{{Route('guide_update_qoute')}}',
                method: "POST",
                data: {guidedata:JSON.stringify(guideData),guideDataDetails:JSON.stringify(guideDataDetails),baserate:basratetoguide,
                    totalGuidefee:totalGuidefee,totalGuideAcmd:totalGuideAcmd,
                    tourID:tourID,tourVersion:tourVersion,qoutheaderId:qoutheaderId,
                    tourStDate:tourStDate},
                success: function(data) {

                    console.log(data);
                    
                    if(data=='saved'){
                        $('.alert').hide();
                        swal("Guides Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
                        location.reload();
                    }else{
                        $('.alert').show();
                        $('#notify').html(data);
                    }
                }                                   
        })
    }










}

CalGuidefees();



// $('.cal_guide_row').keydown(function(event){

//     alert('asdasd');
// });







</script>