
@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Hotel Packages
				</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/dashboard" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
											Master Data
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Hotel Packages
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Create a   Hotel Package
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('package_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la la-angle-left"></i>
													<span>
														Back
													</span>
                    </span>
                </a>
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
                    <span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                    <h3 class="m-portlet__head-text">
                    Create a   Hotel Package
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="add_HPdFrm"">
 
            <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                    <div class="col-lg-3"> 
                        <label class="form-control-label">
                            Hotel :
                        </label> 
                       
                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="h_package" id="h_package">
                            
                        <option value=""></option>
                           
                         </select>
                         <span class="m-form__help text-danger">
                                * Required
                        </span>
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                             Package Name:
                            </label> 
                            <input id="p_name" placeholder="Package Name"  class="form-control" name="p_name" type="text" value="" > 
                            <span class="m-form__help text-danger">
                                    * Required
                            </span>
                        </div> 

                </div>
                <form class="cleafix" method="POST" action="">
      
                        <div class="m-portlet__body">
                              
                              <div style="overflow-x:auto;">
                                  <table class="table table-bordered">
                                      <thead>
                                                            <tr class="table-secondary" style="text-align: center" rowspan="2">
                                                                    <th width="12%" colspan="3">Form</th>
                                                                    <th width="12%" colspan="3">To</th>
                                                                    <th width="10%" >SR</th>
                                                                    <th width="10%" >DR</th>
                                                                    <th width="10%" >TR</th>
                                                                    <th width="13%" >QR</th>
                                                                    <th width="10%" >CR</th>
                                                                    <th width="10%" >EBR</th>
                                                                    <th width="8%"  rowspan="2"><button class="btn btn-success" type="button" onclick="addDetails()">
                                                                            <span>
                                                                                    <i class="fa fa-plus-square"></i>
                                                                                    <span>Add</span>
                                                                                </span>
                                                                    </button>
                                                                    </th>
                                                              </tr>

                                                    <tr>
                                                        <th colspan="3"><input placeholder="From Date" id="from_date" name="from_date" type="text"  class="form-control dtpic-format" value=""></th>
                                                        <th colspan="3"><input placeholder="To Date" id="to_date" name="to_date" type="text"  class="form-control dtpic-format" value=""></th>     
                                                        <th colspan="1"><input id="sgl" placeholder="Single Rate"  class="form-control m_input numeric_only" name="sgl" type="text"  value="" ></th>
                                                        <th colspan="1"><input id="dbl" placeholder="Double Rate"  class="form-control numeric_only" name="dbl" type="text" value="" ></th>
                                                        <th colspan="1"><input id="tbl" placeholder="Trible Rate"  class="form-control numeric_only" name="tbl" type="text" value="" ></th>
                                                        <th colspan="1"><input id="qbl" placeholder="Quadruple Rate"  class="form-control numeric_only" name="qbl" type="text" value="" ></th>
                                                        <th colspan="1"><input id="child" placeholder="Child Rate"  class="form-control numeric_only" name="child" type="text" value="" ></th>
                                                        <th colspan="1"><input id="exb" placeholder="Extra Bed Rate"  class="form-control numeric_only" name="exb" type="text" value="" ></th>     
                                                                    
                                                 </tr> 
                                      </thead>
                                      <tr style="text-align: center;" class="table-secondary">
                                            <th colspan="13"></th>
                                        </tr>
                                        <tr style="text-align: center" class="table-secondary">
                                            <th colspan="13"></th>
                                        </tr>
                                        <tr style="text-align:center" class="table-primary">
                                            <th>Market</th>
                                            <th>Currency Type</th>
                                            <th>Room Type</th>
                                            <th>Meal Plan</th>
                                            <th width="8%">SR</th>
                                            <th width="8%">DR</th>
                                            <th width="8%">TR</th>
                                            <th width="8%">QR</th>
                                            <th width="8%">CR</th>
                                            <th width="8%">EBR</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Action</th>
                                        </tr>

                          <tbody id="dat">
                                    
                              
                          </tbody>
                      </table>
                              </div>
                          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                              <div class="m-form__actions m-form__actions--solid">
                                  <div class="row">
                                      <div class="col-lg-6">
                                      
                                          <button onclick="saveHPDetails()" class="btn btn-primary" type="button">Save Details</button>
                                          

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
         	
function addDetails(){

                 var market = $('#market :selected').val();
                 var market_show = $('#market :selected').text();
		 		 var currency = $('#currency :selected').val();
                 var currency_show = $('#currency :selected').text();
				 var room_show = $('#room :selected').text();
                 var room = $('#room :selected').val();
		 		 var meal_plane_show = $('#meal_plane :selected').text();
                 var meal_plane = $('#meal_plane :selected').val();
				 var sgl = $('#sgl').val();
		 		 var dbl = $('#dbl').val();
				 var tbl = $('#tbl').val();
		 		 var child = $('#child').val();
				 var exb = $('#exb').val();
				 var qbl = $('#qbl').val();
                 var from_date=$('#from_date').val();
                 var to_date=$('#to_date').val();
                

 if(market==0){
    $('.alert').show();
    $('#notify').html('* Please Select Market.');
}else if(currency==0){
    $('.alert').show();
    $('#notify').html('* Please Select Currency Type.');
}else if(room==0){
    $('.alert').show();
    $('#notify').html('* Please Select Room Type.');
}else if(meal_plane==0){
    $('.alert').show();
    $('#notify').html('* Please Select Meal Plane.');
}else if(from_date==0){
    $('.alert').show();
    $('#notify').html('* Please Select From Date.');
}else if(to_date==0){
    $('.alert').show();
    $('#notify').html('* Please Select To Date.');
}else if((sgl <1) || isNaN(sgl)==true){
    $('.alert').show();
    $('#notify').html('* Single Rate Can not be zero or null.');
}else if((dbl <1) || isNaN(dbl)==true){
    $('.alert').show();
    $('#notify').html('*Double Rate Can not be zero or null.');
}else if((tbl <1)|| isNaN(tbl)==true){
    $('.alert').show();
    $('#notify').html('* Trible Rate Can not be zero or null');
}else if((qbl <1)|| isNaN(qbl)==true){
    $('.alert').show();
    $('#notify').html('* Quadruple Can not be zero or null');
}else if((child <1)|| isNaN(child)==true){
    $('.alert').show();
    $('#notify').html('* Child Rate Can not be zero or null');
}else if((exb <1)|| isNaN(exb)==true){
    $('.alert').show();
    $('#notify').html('* Extra Bed Rate Can not be zero or null');
 }else if(from_date>to_date || from_date==to_date){
    $('.alert').show();
    $('#notify').html('*Package Period Is Invalid');
 }

else
{
    $('.alert').hide();

         var hpdCount = 1;

          $("#dat tr").each(function(index) {

           hpdCount++;
          });
            
          //console.log(miscCount);

    let hpData = $('#dat');  
    hpData.append($('<tr class="ht_hpd_'+hpdCount+'"></tr>')
    .html(
            '<input id="market_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+market+'">'+
            '<input id="currency_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+currency+'">'+
            '<input id="room_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+room+'">'+
            '<input id="mealplan_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+meal_plane+'">'+
            '<input id="sgl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+sgl+'">'+
            '<input id="dbl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+dbl+'">'+
            '<input id="tbl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+tbl+'">'+
            '<input id="qbl_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+qbl+'">'+
            '<input id="child_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+child+'">'+
            '<input id="exb_id_'+hpdCount+'"  class="ht_hpd_'+hpdCount+'" type="hidden" value="'+exb+'">'+
            '<input id="fdate_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+from_date+'">'+
            '<input id="tdate_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+to_date+'">'+
             
            '<td style="text-align: center;" class="ht_hpd_'+hpdCount+'" >'+market_show+'</td>'+
            '<td style="text-align: center;" class="ht_hpd_'+hpdCount+'" >'+currency_show+'</td>'+
            '<td style="text-align: center;" class="ht_hpd_'+hpdCount+'" >'+room_show+'</td>'+
            '<td style="text-align: center;" class="ht_hpd_'+hpdCount+'" >'+meal_plane_show+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+sgl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+dbl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+tbl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+qbl+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+child+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: right;">'+exb+'</td>'+
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: center;">'+from_date+'</td>'+ 
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: center;">'+to_date+'</td>'+ 
            
                                
            '<td class="ht_hpd_'+hpdCount+'" style="text-align: center;">'+
                        '<button onclick="removeHpd('+hpdCount+')"  type="button" class="btn btn-danger m-btn btn-sm m-btn--icon ht_hpd_'+hpdCount+'">'+
                                '<span class="ht_hpd_'+hpdCount+'">'+
                                    '<i class="la la-trash ht_hpd_'+hpdCount+'"></i>'+
                                    '<span class="ht_hpd_'+hpdCount+'">Remove</span>'+
                                '</span>'+
                        '</button>'+
            '</td>'));

    
}    
             
		}

 
    
  function removeHpd(hpdrowId){
   var  hpdCountRm = 0;
    

    $("#dat tr").each(function(index){

      hpdCountRm++;

    });


    
     if(hpdCountRm == hpdrowId){
        $('.ht_hpd_'+hpdrowId).remove(); 
        hpdCountRm = 0;
        hpdrowId=0;
       
    }
    else{
         swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
     }
  }


function saveHPDetails(){

var hpdCountRm = 0;

$("#dat tr").each(function(index) {

hpdCountRm++;

});
//alert(hpdCountRm);

var hpd_dataStore = [];
var hasErrors =0;
if(hpdCountRm!=0){
    
    for(var pos = 1; pos<=hpdCountRm; pos++){

        var market=$('#market_id_'+pos).val();
        var currency=$('#currency_id_'+pos).val();
        var room=$('#room_id_'+pos).val();
        var meal_plane=$('#mealplan_id_'+pos).val();
        var sgl = parseFloat($('#sgl_id_'+pos).val());
        var dbl = parseFloat($('#dbl_id_'+pos).val());
        var tbl = parseFloat($('#tbl_id_'+pos).val());
        var qbl = parseFloat($('#qbl_id_'+pos).val());
        var child = parseFloat($('#child_id_'+pos).val());
        var exb = parseFloat($('#exb_id_'+pos).val());
        var from_date = $('#fdate_id_'+pos).val();
        var to_date = $('#tdate_id_'+pos).val();
        
        if(isNaN(sgl)==true){
            hasErrors++;
        }

        if(isNaN(dbl) == true){
            hasErrors++;
        }

        if(isNaN(tbl) == true){
            hasErrors++;
        }

        if(isNaN(qbl) == true){
            hasErrors++;
        }
        if(isNaN(child) == true){
            hasErrors++;
        }
        if(isNaN(exb) == true){
            hasErrors++;
        }
        
        hpd_dataStore.push({

            pos:pos,
            hpsgl:sgl,
            hpdbl:dbl,
            hptbl:tbl,
            hpqbl:qbl,
            hpchild:child,
            hpexb:exb,
            hpfrom_date:from_date,
            hpto_date:to_date,
            hpmarket:market,
            hpcurrency:currency,
            hproom:room,
            hpmealplan:meal_plane
            

        });          
        
    }
    
}

var hotel =$('#h_package').val();
var hotel_package =$('#p_name').val();

if(hotel==''){
 $('.alert').show();
   $('#notify').html('*Please Select The the Hotel');
}else if(hotel_package==''){
   $('.alert').show();
    $('#notify').html('*Please Enter Package Name');
 }


if(hasErrors == 0){
       
       $.ajaxSetup({
               headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                  });
                  

       $.getJSON({
        
      
               url: '{{Route('store_package')}}',
               method: "POST",
               data:{hpd_dataStoree:JSON.stringify(hpd_dataStore),hotel:hotel,hotel_package:hotel_package},
                   
               success: function(data) {
                
                  console.log(data);

                  if(data=='saved'){
                   $('.alert').hide();
                   swal("Hotel Package Details Added Successfully!", "Success");
                   window.location.replace('{{route('package_index')}}');
                   $("#add_HPdFrm")[0].reset();
                   
                   
               }else{
                   $('.alert').show();
                   $('#notify').html(data);
               }
                   
               }                                   
           })

}
//alert(hasErrors);

}
	    
	</script>
@endsection