
@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
@php
//  $tour_ID=$tourQuotHeader->tour_id;
 $tour_code= $tourQuotHeader->tour_code;
 $tourID = $tourQuotHeader->tour_id;
    
@endphp
<div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator ">
                            Guest Allocation
                </h3>
                
            </div>
            <div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END: Subheader -->
<div class="m-content">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong><div id="notify"></div>
                <button type="button" class="close" id="notify_close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
    <div class="m-portlet">
            <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        
                        <div class="m-portlet__head-title">
                             
                            <h3 class="m-portlet__head-text">
                                   
                                      
                                    Tour Code :{{$tour_code}}
                                           
                                    
                                    
                               </h3>
                        </div>
                      
                    </div>
                    <div class="m-portlet__head-tools">
                            <a href="{{route('booking_guest_allocate_index_load',$tourID)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="la la-angle-left"></i>
                                        <span>
                                            Back
                                        </span>
                                    </span>
                                </a>
                    </div>
                </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="add_GuestFrm"">
 
            <div class="m-portlet__body">
                <form class="cleafix" method="POST" action="">
      
                        <div class="m-portlet__body">
                              
                              <div style="overflow-x:auto;">
                                  <table class="table table-bordered">
                                      <thead>
                                        <tr class="table-secondary" style="text-align: center">
                                            <th width="30%">Name</th>
                                            <th width="10%">Date Of Birth</th>
                                            <th width="10%">Passport No</th>
                                            <th width="10%">Flight No</th>
                                            <th width="10%">Arrival</th>
                                            <th width="10%">Depature</th>
                                            <th width="20%">Remarks</th>
                                            <th>Action</th>
                                            
                                        </tr>

                                    <tr>
                                        <th><input id="guest_name" placeholder="Guest Name"  class="form-control" name="guest_name" type="text"  value="" ></th>
                                        <th><input placeholder="Date Of Birth" id="dob" name="dob" type="text"  class="form-control dtpic-format" value=""></th>
                                        <th><input id="pass_no" placeholder="Passport Number"  class="form-control" name="pass_no" type="text"  value="" ></th>   
                                        <th><input id="flight_no" placeholder="Flight Number"  class="form-control timepicker " name="flight_no" type="text"  value="" ></th>
                                        <th><input placeholder="Arrival Date" id="arvl_date" name="arvl_date" type="text"  class="form-control dtpic-format" value=""></th>
                                        <th><input placeholder="Depature Date" id="dept_date" name="dept_date" type="text"  class="form-control dtpic-format" value=""></th>   
                                        <th><input id="remarks" placeholder="remarks"  class="form-control " name="remarks" type="text"  value="" ></th>
                                        <th><button class="btn btn-success" type="button" onclick="addDetails()" >
                                                <span>
                                                    <i class="fa fa-plus-square"></i>
                                                    <span>Add</span>
                                                </span>
                                                    </button></th>            
                                    </tr> 
                                        <tr style="text-align: center;">
                                                    <th colspan="8"></th>
                                        </tr>
                                              <tr style="text-align: center">
                                                    <th colspan="8"></th>
                                              </tr>
                                              <tr style="text-align:center" class="table-primary">
                                                        <th width="30%">Name</th>
                                                        <th width="10%">D.O.B</th>
                                                        <th width="10%">Passport No</th>
                                                        <th width="10%">Flight No</th>
                                                        <th width="10%">Arrival</th>
                                                        <th width="10%">Depature</th>
                                                        <th width="20%">Remarks</th>
                                                        <th>Action</th>
                                              </tr>
                                      </thead>
                                     

                          <tbody id="dat">
                              {{-- @php
                                  $rowCount = 0;
                              @endphp
                            @foreach($guest_allocate_data as $guest_dt)

                                    @php
                                        $rowCount++;
                                    @endphp

                                    <tr class="gst_alc_{{$rowCount}}">
                                        <input id="g_name_id_{{$rowCount}}" class="gst_alc_{{$rowCount}}" type="hidden" value="{{$guest_dt->guest_name}}">
                                        <input id="dob_id_{{$rowCount}}" class="gst_alc_{{$rowCount}}" type="hidden" value="{{$guest_dt->dob}}">
                                        <input id="passno_id_{{$rowCount}}" class="gst_alc_{{$rowCount}}" type="hidden" value="{{$guest_dt->flight_no}}">
                                        <input id="flino_id_{{$rowCount}}" class="gst_alc_{{$rowCount}}" type="hidden" value="{{$guest_dt->passport_no}}">
                                        <input id="arvdt_id_{{$rowCount}}" class="gst_alc_{{$rowCount}}" type="hidden" value="{{$guest_dt->arrival_date}}">
                                        <input id="dptdt_id_{{$rowCount}}" class="gst_alc_{{$rowCount}}" type="hidden" value="{{$guest_dt->depature_date}}">
                                        <input id="remark_id_{{$rowCount}}" class="gst_alc_{{$rowCount}}" type="hidden" value="{{$guest_dt->remarks}}">
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: left;">{{$guest_dt->guest_name}}</td>
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: center;">{{$guest_dt->dob}}</td>
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: left;">{{$guest_dt->flight_no}}</td>
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: left;">{{$guest_dt->passport_no}}</td>
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: center;">{{$guest_dt->arrival_date}}</td>
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: center;">{{$guest_dt->depature_date}}</td>
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: left;">{{$guest_dt->remarks}}</td>
                                        <td class="gst_alc_{{$rowCount}}" style="text-align: center;">
                                            <button onclick="removeGuest({{$rowCount}})" type="button" class="btn btn-danger m-btn btn-sm m-btn--icon ht_hpd_1">
                                                <span class="gst_alc_{{$rowCount}}"><i class="la la-trash gst_alc_{{$rowCount}}"></i>
                                                    <span class="gst_alc_{{$rowCount}}">Remove</span>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>

                              @endforeach --}}
                          </tbody>
                      </table>
                              </div>
                          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                              <div class="m-form__actions m-form__actions--solid">
                                  <div class="row">
                                      <div class="col-lg-6">
                                      
                                          <button onclick="saveGuestdetails()" class="btn btn-primary" type="button">Save Details</button>
                                          

                                      </div>
                                  </div>
                              </div>
                          </div>   
                       </div>
                       </form>
            </div>
        </form>  
    </div>
</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script>
		//  $(document).ready( function(){
		  
		 //	To hide the alert window on load the page
		 $('.alert').hide();
			
		// 	// //to close the alert window after popup 
		 $('#notify_close').click(function(event){
		 	$('.alert').hide();
		 });

//     $(function () {
//     $('#flight_no').timepicker({
//         use24hours: true
//     });
// });
         	
 function addDetails(){

                 
				 var name = $('#guest_name').val();
		 		 var dob = $('#dob').val();
				 var pass_no = $('#pass_no').val();
		 		 var flight_no = $('#flight_no').val();
				 var arv_date = $('#arvl_date').val();
				 var dpt_date = $('#dept_date').val();
                 var remarks=$('#remarks').val();
                 
                

 if(name==''){
    $('.alert').show();
    $('#notify').html('* Please Enter Name.');
}else if(dob==''){
    $('.alert').show();
    $('#notify').html('* Please Enter Date Of Birth.');
}else if(pass_no==''){
    $('.alert').show();
    $('#notify').html('* Please Enter Passport Number.');
}else if(flight_no==''){
    $('.alert').show();
    $('#notify').html('* Please Enter Flight Number.');
}else if(arv_date==''){
    $('.alert').show();
    $('#notify').html('* Please Select Arrival Date.');
}else if(dpt_date==''){
    $('.alert').show();
    $('#notify').html('* Please Select Depature Date.');
}else if(arv_date==dpt_date){
    $('.alert').show();
    $('#notify').html('*Date Period Is Invalid');
 }

else
{
    $('.alert').hide();

         var guestCount = 1;

          $("#dat tr").each(function(index) {

           guestCount++;
          });
            
          //console.log(miscCount);

    let gstData = $('#dat');  
    gstData.append($('<tr class="gst_alc_'+guestCount+'"></tr>')
    .html(
            '<input id="g_name_id_'+guestCount+'" class="gst_alc_'+guestCount+'" type="hidden" value="'+name+'">'+
            '<input id="dob_id_'+guestCount+'"    class="gst_alc_'+guestCount+'" type="hidden" value="'+dob+'">'+
            '<input id="passno_id_'+guestCount+'" class="gst_alc_'+guestCount+'" type="hidden" value="'+pass_no+'">'+
            '<input id="flino_id_'+guestCount+'"  class="gst_alc_'+guestCount+'" type="hidden" value="'+flight_no+'">'+
            '<input id="arvdt_id_'+guestCount+'"  class="gst_alc_'+guestCount+'" type="hidden" value="'+arv_date+'">'+
            '<input id="dptdt_id_'+guestCount+'"  class="gst_alc_'+guestCount+'" type="hidden" value="'+dpt_date+'">'+
            '<input id="remark_id_'+guestCount+'" class="gst_alc_'+guestCount+'" type="hidden" value="'+remarks+'">'+
            
             
            
            '<td class="gst_alc_'+guestCount+'" style="text-align: left;" >'+name+'</td>'+
            '<td class="gst_alc_'+guestCount+'" style="text-align: center;">'+dob+'</td>'+
            '<td class="gst_alc_'+guestCount+'" style="text-align: left;" >'+pass_no+'</td>'+
            '<td class="gst_alc_'+guestCount+'" style="text-align: left;" >'+flight_no+'</td>'+
            '<td class="gst_alc_'+guestCount+'" style="text-align: center;">'+arv_date+'</td>'+
            '<td class="gst_alc_'+guestCount+'" style="text-align: center;">'+dpt_date+'</td>'+
            '<td class="gst_alc_'+guestCount+'" style="text-align: left;">'+remarks+'</td>'+ 
                         
            '<td class="gst_alc_'+guestCount+'" style="text-align: center;">'+
                        '<button onclick="removeGuest('+guestCount+')"  type="button" class="btn btn-danger m-btn btn-sm m-btn--icon ht_hpd_'+guestCount+'">'+
                                '<span class="gst_alc_'+guestCount+'">'+
                                    '<i class="la la-trash gst_alc_'+guestCount+'"></i>'+
                                    '<span class="gst_alc_'+guestCount+'">Remove</span>'+
                                '</span>'+
                        '</button>'+
            '</td>'));

    
}    
             
}

 
    
  function removeGuest(gstrowId){
   var  guestCountRm = 0;
    

    $("#dat tr").each(function(index){

      guestCountRm++;

    });


    
     if(guestCountRm == gstrowId){
        $('.gst_alc_'+gstrowId).remove(); 
        guestCountRm = 0;
        gstrowId=0;
       
    }
    else{
         swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
     }
  }


function saveGuestdetails(){

var guestCountRm = 0;

$("#dat tr").each(function(index) {

guestCountRm++;

});


var guest_dataStore = [];
var hasErrors =0;
if(guestCountRm!=0){
    
    for(var pos = 1; pos<=guestCountRm; pos++){

                 var name = $('#g_name_id_'+pos).val();
		 		 var dob = $('#dob_id_'+pos).val();
				 var pass_no = $('#passno_id_'+pos).val();
		 		 var flight_no = $('#flino_id_'+pos).val();
				 var arv_date = $('#arvdt_id_'+pos).val();
				 var dpt_date = $('#dptdt_id_'+pos).val();
                 var remarks=$('#remark_id_'+pos).val();
        
            guest_dataStore.push({

            pos:pos,
            gst_name:name,
            gst_dob:dob,
            gst_passno:pass_no,
            gst_flino:flight_no,
            gst_arvdt:arv_date,
            gst_dptdt:dpt_date,
            gst_remark:remarks
            
        });          
        
    }
    
}

   var id='{{$tourID}}';
if(hasErrors == 0){
       
       $.ajaxSetup({
               headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                  });
                  

       $.getJSON({
        
      
               url: '{{Route('store_guestdetails')}}',
               method: "POST",
               data:{guest_dataStore:JSON.stringify(guest_dataStore),id:id},
                   
               success: function(data) {
                
                 // console.log(data);

                  if(data=='saved'){
                   $('.alert').hide();
                   swal("Guest Details Added Successfully!", "Success");
                   window.location.replace('{{route('booking_guest_allocate_index_load',$tourID)}}');
                  // $("#add_GuestFrm")[0].reset();
                   
                   
               }else{
                   $('.alert').show();
                   $('#notify').html(data);
               }
                   
               }                                   
           })

}
// //alert(hasErrors);

}
	    
	</script>
@endsection