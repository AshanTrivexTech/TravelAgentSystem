
@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Hotel Contracts
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
                      Hotel Contracts
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Create a   Hotel Contract
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
                    Create a   Hotel Contract
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
                                <option value="0" selected>Please Select...</option>
                                @foreach($hotels->all() as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->sup_name}}</option>
                                @endforeach
                            </select>
                            <span class="m-form__help text-danger">
                                    * Required
                            </span>
                        </div>
                        <div class="col-lg-6">
                                <label class="form-control-label">
                                Contract Name:
                                </label> 
                                <input id="p_name" placeholder="Contract Name"  class="form-control" name="p_name" type="text" value="" > 
                                <span class="m-form__help text-danger">
                                        * Required
                                </span>
                            </div> 

                           
                            <div class="col-lg-3"> 
                                    <label class="form-control-label">
                                        Contract Term:
                                    </label> 
                                
                                    <select class="form-control m-bootstrap-select m_selectpicker" onchange="change_contract()"  id="h_contract">
                                    {{-- <option value="" selected>Please Select...</option>     --}}
                                    <option value="1" selected >Period</option>
                                    <option value="0">Annual</option>  
                                    </select>
                                    <span class="m-form__help text-danger">
                                            * Required
                                    </span>
                                </div>
                                
                </div>

                {{-- <form class="cleafix" method="POST" action=""> --}}
      
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12"> 
                              <div style="overflow-x:auto;">
                                  <table class="table table-bordered table-sm">
                                      <thead>
                                              <tr style="text-align: center;">
                                                      <th class="bg-secondary" colspan="14">Hotel Contract Details</th>
                                                  </tr>
                                                  <tr class="table-secondary" style="text-align: center">
                                                        
                                                        <th colspan="4">Agent</th>
                                                        <th colspan="4">Markets</th>
                                                        <th colspan="2">Currency Type</th>                                
                                                        <th colspan="2">Room Type</th>
                                                        <th colspan="2">Meal Plan</th>                                                       
                                                        
                                                    </tr>
                                                    <tr class="table-secondary" style="text-align: center" >
                                                           <th colspan="4">
                                                                <select class="form-control form-control-sm" name="agent" id="agent">
                                                                     <option value="0" selected>Please Select...</option>
                                                                        @foreach($agents->all() as $agent)
                                                                    <option value="{{$agent->id}}">{{$agent->ag_name}}</option>
                                                                        @endforeach
                                                                     </select> 
                                                           </th>
                                                            <th colspan="4">
                                                                  <select class="form-control form-control-sm" name="market" id="market">
                                                                           <option value="0" selected>Please Select...</option>
                                                                          @foreach($markets->all() as $market)
                                                                      <option value="{{$market->id}}">{{$market->market_name}}</option>
                                                                          @endforeach
                                                                       </select>   
                              
                                                            </th>
                                                            <th colspan="2">
                                                                  <select class="form-control form-control-sm" name="currency" id="currency">
                                                                      <option value="0" selected>Please Select...</option>
                                                                          @foreach($currencys->all() as $currency)
                                                                          <option value="{{$currency->id}}">{{$currency->type}}</option>
                                                                          @endforeach
                                                                  </select>  
                              
                                                            </th>
                                                            <th colspan="2">
                                                                  <select class="form-control form-control-sm" name="room" id="room">
                                                                      <option value="0" selected>Please Select...</option>
                                                                          @foreach($room_types->all() as $type)
                                                                          <option value="{{$type->id}}">{{$type->r_type}}</option>
                                                                          @endforeach
                                                                        </select>  
                              
                                                            </th>
                                                            <th colspan="2">
                                                                  <select class="form-control form-control-sm" name="meal_plane" id="meal_plane">
                                                                        <option value="0" selected>Please Select...</option>
                                                                          @foreach($meals->all() as $meal)
                                                                      <option value="{{$meal->id}}">{{$meal->meal_plane}}</option>
                                                                          @endforeach
                                                                    </select> 
                              
                                                            </th>

                                                            </tr >

                                                            <tr class="table-secondary" style="text-align: center">
                                                                    <th colspan="3">Form</th>
                                                                    <th colspan="3">To</th>
                                                                    <th width="10%">SGL</th>
                                                                    <th width="10%">DBL</th>
                                                                    <th width="10%">TPL</th>
                                                                    <th width="10%">QRD</th>
                                                                    <th width="10%">GR</th>
                                                                    <th width="10%">EBR</th>
                                                                    <th colspan="2">Action</th>
                                                                    
                                                                    
                                                              </tr>
                                                              {{-- @if($anual==1) disabled @endif --}}
                                                    <tr>
                                                        <th colspan="3"><input  style="text-align: center" placeholder="From Date" id="from_date" name="from_date" type="text"  class="form-control dtpic-format form-control-sm" value=""></th>
                                                        <th colspan="3"><input style="text-align: center" placeholder="To Date" id="to_date" name="to_date" type="text"  class="form-control dtpic-format form-control-sm" value=""></th>     
                                                        <th width="10%"><input style="text-align: center" id="sgl" placeholder="Single Rate"  class="form-control m_input numeric_only form-control-sm" name="sgl" type="text"  value="0.00" ></th>
                                                        <th width="10%"><input style="text-align: center" id="dbl" placeholder="Double Rate"  class="form-control numeric_only form-control-sm" name="dbl" type="text" value="0.00" ></th>
                                                        <th width="10%"><input style="text-align: center" id="tbl" placeholder="Trible Rate"  class="form-control numeric_only form-control-sm" name="tbl" type="text" value="0.00" ></th>
                                                        <th width="10%"><input style="text-align: center" id="qbl" placeholder="Quadruple Rate"  class="form-control numeric_only form-control-sm" name="qbl" type="text" value="0.00" ></th>
                                                        <th width="10%"><input style="text-align: center" id="child" placeholder="Child Rate"  class="form-control numeric_only form-control-sm" name="child" type="text" value="0.00" ></th>
                                                        <th width="10%"><input style="text-align: center" id="exb" placeholder="Extra Bed Rate"  class="form-control numeric_only form-control-sm" name="exb" type="text" value="0.00" ></th>                                                               
                                                        <th  colspan="2"style="text-align: center" width="8%" >
                                                            <button class="btn btn-success" type="button" onclick="addDetails()">
                                                                 <span>
                                                                    <i class="fa fa-plus-square"></i>
                                                                    <span>Add</span>
                                                                </span>
                                                            </button>
                                                        </th>
                                                    </tr> 
                                               
                                      </thead>
                                      

                              <tbody>
                                    <tr>
                                        <td colspan="14">
                                            <table class="table table-bordered table-sm" width="100%">
                                                <thead>                                                    
                                                    <tr style="text-align:center" class="table-primary">
                                                        
                                                        <th width="8%">Room Type</th>
                                                        <th width="8%">Meal Plan</th>
                                                        <th width="4%">SGL</th>
                                                        <th width="4%">DBL</th>
                                                        <th width="4%">TBL</th>
                                                        <th width="4%">QRD</th>
                                                        <th width="4%">CR</th>
                                                        <th width="4%">EBR</th>
                                                        <th width="8%">From</th>
                                                        <th width="8%">To</th>
                                                        <th width="8%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="dat">

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-secondary" style="text-align: center" colspan="14">Optional Supplements</th>
                                    </tr>
                                    <tr style="text-align: center">
                                            <th colspan="3" width="20%">Code</th>
                                            <th colspan="3" width="25%">Rate Type</th>
                                            <th colspan="2" width="10%">Rate</th>
                                            <th colspan="5" width="35%">Description</th>                                                          
                                            <th  width="10%">Action</th>
                                    </tr>
                                    <tr>
                                            <th colspan="3" width="20%">
                                                <input style="text-align: center" id="sup_code" placeholder="Code"  class="form-control m_input form-control-sm" maxlength="6" type="text"  value="" >
                                            </th>
                                            <th colspan="3" width="25%">
                                                    <select class="form-control form-control-sm" id="sup_rate_type">
                                                            <option value="" selected>Please Select...</option>
                                                            <option value="0">Per-Person</option>
                                                            <option value="1">Per-Room</option>
                                                    </select>
                                            </th>
                                            <th colspan="2" width="10%">
                                                    <input style="text-align: center" id="sup_rate" placeholder="0.00"  class="form-control m_input numeric_only form-control-sm" type="text"  value="" >
                                            </th>
                                            <th colspan="5" width="35%">
                                                    <input style="text-align: center" id="sup_desc" placeholder="Description"  class="form-control m_input form-control-sm" type="text"  value="" >
                                            </th>                                                          
                                            <th width="10%">
                                                    <button class="btn btn-success" type="button" onclick="add_sup()">
                                                            <span>
                                                               <i class="fa fa-plus-square"></i>
                                                               <span>Add</span>
                                                           </span>
                                                    </button>
                                            </th>
                                    </tr>
                                    <tr>
                                            <td colspan="14">
                                                    <table class="table table-bordered" width="100%">
                                                            <thead>                                                    
                                                                <tr style="text-align:center" class="table-primary">                                                                                                                        
                                                                    <th width="20%">Code</th>
                                                                    <th width="20%">Rate Type</th>
                                                                    <th width="15%">Rate</th>
                                                                    <th width="35%">Description</th>                                                          
                                                                    <th width="10%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="dat_optsup">
                                                               
                                                            </tbody>
                                                        </table>
                                            </td>
                                    </tr>
                              
                            </tbody>
                        </table>
                    </div>
                 </div>
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
                        
                       {{-- </form> --}}
            </div>
        </form> 
        <form method="POST" id="frm_report" action="{{route('report_page')}}">
            {{ csrf_field() }}
            <input type="hidden"  id="error_details" name="error_details" value="" >
            <input type="hidden"  id="curnt_url"  name="curnt_url" value="">
          </form> 
    </div>
</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script>
		//  $(document).ready( function(){

        //  });
		  
		 //	To hide the alert window on load the page
		 $('.alert').hide();
			
		// 	// //to close the alert window after popup 
		 $('#notify_close').click(function(event){
		 	$('.alert').hide();
		 });

    

function change_contract()
{
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if(dd<10) {

        dd = '0'+dd
     } 

     if(mm<10) {

      mm = '0'+mm
     } 

    today = yyyy + '-' + mm + '-' + dd;

   var annual_dat=$('#h_contract').val();

   if(annual_dat == 0)
   {
    
       document.getElementById("from_date").disabled = true;
       document.getElementById("to_date").disabled = true;
       
       $('#from_date').val(today);
       $('#to_date').val(today);
    
   }
   else{
       document.getElementById("from_date").disabled = false;
       document.getElementById("to_date").disabled = false;

       $('#from_date').val('');
       $('#to_date').val('');
   }
}




function add_sup(){

    var hpdCount = 0;
    $("#dat tr").each(function(index) {

    hpdCount++;
    });
    
    if(hpdCount!=0){

        var sup_code= $('#sup_code').val();
        var sup_rtype= $('#sup_rate_type').val();
        var sup_rtype_str= $('#sup_rate_type :selected').text();
        var sup_rate= $('#sup_rate').val();
        var sup_desc= $('#sup_desc').val();
       
        if(sup_code==''){
            $('.alert').show();
            $('#notify').html('* Please Enter Supplement Code.');
        }else if(sup_rtype==''){
            $('.alert').show();
            $('#notify').html('* Please Select Rate Type.');
        }else if(sup_rate==0 || isNaN(sup_rate)){
            $('.alert').show();
            $('#notify').html('* Please Enter Supplement Rate.');
        }else if(sup_desc==''){
            $('.alert').show();
            $('#notify').html('* Please Enter Supplement Description.');
        }
        
        
        else{
            
            var chk_sup_codes = '';
            var chk_pos = 0;
            var chk_error = 0;
            
            $("#dat_optsup tr").each(function(index) {                
                chk_pos++;
                chk_sup_codes = $('#sup_code_adde_'+chk_pos).html();
                
              //  alert(chk_sup_codes);
                
                if(sup_code == chk_sup_codes){
                    chk_error++;
                }
                
                
            });           

            chk_pos = chk_pos+1;

            if(chk_error==0)
            {
                       
            var out_data_sup ='<td class="rm_supadd_'+chk_pos+'" id="sup_code_adde_'+chk_pos+'" style="text-align: center">'+sup_code+'</td>'+
              '<td class="rm_supadd_'+chk_pos+'" style="text-align: center">'+sup_rtype_str+
              '<input class="rm_supadd_'+chk_pos+'" id="rtype_added_'+chk_pos+'" type="hidden" value="'+sup_rtype+'"'+
              '</td>'+              
              '<td class="rm_supadd_'+chk_pos+'" id="sup_rate_adde_'+chk_pos+'" style="text-align: right">'+sup_rate+'</td>'+
              '<td class="rm_supadd_'+chk_pos+'" id="sup_desc_adde_'+chk_pos+'">'+sup_desc+'</td>'+
              '<td class="rm_supadd_'+chk_pos+'" style="text-align: center">'+
                     '<button class="btn btn-danger btn-sm rm_supadd_'+chk_pos+'" type="button" onclick="remove_suplmt('+chk_pos+')">'+
                             '<span class="rm_supadd_'+chk_pos+'">'+
                                '<i class="la la-trash rm_supadd_'+chk_pos+'"></i>'+
                                '<span class="rm_supadd_'+chk_pos+'">Remove</span>'+
                            '</span>'+
                     '</button>'+
              '</td>';

                $('#sup_code').val('');                              
                $('#sup_rate').val('');
                $('#sup_desc').val('');

            }else{
                $('.alert').show();
                $('#notify').html('* Supplements Code already added');
            }

          let hpDatasup = $('#dat_optsup');  
            hpDatasup.append($('<tr class="rm_supadd_'+chk_pos+'"></tr>')
                .html(out_data_sup));
        }

    }else{
        $('.alert').show();
        $('#notify').html('* Please Add Hotel Contract before enter optional supliments');
    }
}

function remove_suplmt(rowId_rm)
{
    var hpdCount = 0;
    $("#dat_optsup tr").each(function(index) {

    hpdCount++;
    });

   
    if(rowId_rm == hpdCount){

        $('.rm_supadd_'+rowId_rm).remove(); 

    }else{
         swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
     }   
}

function addDetails(){

                 var agent = $('#agent :selected').val();
                 var agent_show = $('#agent :selected').text();
                 var market = $('#market :selected').val();
                 var market_show = $('#market :selected').text();
		 		 var currency = $('#currency :selected').val();
                 var currency_show = $('#currency :selected').text();
				 var room_show = $('#room :selected').text();
                 var room = $('#room :selected').val();
		 		 var meal_plane_show = $('#meal_plane :selected').text();
                 var meal_plane = $('#meal_plane :selected').val();
				 var sgl  = parseFloat($('#sgl').val()).toFixed(2);
		 		 var dbl  = parseFloat($('#dbl').val()).toFixed(2);
				 var tbl  = parseFloat($('#tbl').val()).toFixed(2);
		 		 var child = parseFloat($('#child').val()).toFixed(2);
				 var exb  = parseFloat($('#exb').val()).toFixed(2);
				 var qbl = parseFloat($('#qbl').val()).toFixed(2);
                 var from_date=$('#from_date').val();
                 var to_date=$('#to_date').val();
                 var cnt_term=$('#h_contract').val();
                 
                 
if((cnt_term==1) && (from_date==0)){
    $('.alert').show();
    $('#notify').html('* Please Select From Date.');
}else if((cnt_term==1) && (to_date==0)){
    $('.alert').show();
    $('#notify').html('* Please Select To Date.');
}else if((cnt_term==1) && (from_date>to_date || from_date==to_date)){
    $('.alert').show();
    $('#notify').html('* Contract Period Is Invalid.');
}else if(agent==0){
    $('.alert').show();
    $('#notify').html('* Please Select Agent.'); 
}else if(market==0){
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
}
// else if((sgl <1) || isNaN(sgl)==true){
//     $('.alert').show();
//     $('#notify').html('* Single Rate Can not be zero or null.');
// }else if((dbl <1) || isNaN(dbl)==true){
//     $('.alert').show();
//     $('#notify').html('* Double Rate Can not be zero or null.');
// }else if((tbl <1)|| isNaN(tbl)==true){
//     $('.alert').show();
//     $('#notify').html('* Trible Rate Can not be zero or null');
// }
 

else
{
       
    $('.alert').hide();

         var hpdCount = 1;

          $("#dat tr").each(function(index) {

           hpdCount++;
          });

              
          
    let hpData = $('#dat');  
    hpData.append($('<tr class="ht_hpd_'+hpdCount+'"></tr>')
    .html(   
            '<input id="agent_id_'+hpdCount+'" class="ht_hpd_'+hpdCount+'" type="hidden" value="'+agent+'">'+
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

                    //   document.getElementById("h_contract").disabled = true;
                  
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


function saveHPDetails()
{

var hpdCountRm = 0;

$("#dat tr").each(function(index) {

hpdCountRm++;

});

// alert(hpdCountRm);

var hpd_dataStore = [];
var hpd_sup_list =[];

var chk_pos = 0;

    

var hasErrors =0;
if(hpdCountRm!=0){

                 var agent = $('#agent :selected').val();
                 var market = $('#market :selected').val();
		 		 var currency = $('#currency :selected').val();

     $("#dat_optsup tr").each(function(index) {                
        chk_pos++;
        var add_sup_codes = $('#sup_code_adde_'+chk_pos).html();
        var add_sup_rtype = $('#rtype_added_'+chk_pos).val();
        var add_sup_rate = $('#sup_rate_adde_'+chk_pos).html();
        var add_sup_desc = $('#sup_desc_adde_'+chk_pos).html();
        
        hpd_sup_list.push({

            code:add_sup_codes,
            rtype:add_sup_rtype,
            rate:add_sup_rate,
            desc:add_sup_desc
            
        });
    }); 
  
    for(var pos = 1; pos<=hpdCountRm; pos++){
        
        var agent=$('#agent_id_'+pos).val();
        var market=$('#market_id_'+pos).val();
        var currency=$('#currency_id_'+pos).val();
        var room=$('#room_id_'+pos).val();
        var meal_plane=$('#mealplan_id_'+pos).val();
        var sgl = parseFloat($('#sgl_id_'+pos).val()).toFixed(2);
        var dbl = parseFloat($('#dbl_id_'+pos).val()).toFixed(2);
        var tbl = parseFloat($('#tbl_id_'+pos).val()).toFixed(2);
        var qbl = parseFloat($('#qbl_id_'+pos).val()).toFixed(2);
        var child = parseFloat($('#child_id_'+pos).val()).toFixed(2);
        var exb = parseFloat($('#exb_id_'+pos).val()).toFixed(2);
        var from_date = $('#fdate_id_'+pos).val();
        var to_date = $('#tdate_id_'+pos).val();
        
        
        // if(isNaN(sgl)==true){
        //     hasErrors++;
        // }

        // if(isNaN(dbl) == true){
        //     hasErrors++;
        // }

        // if(isNaN(tbl) == true){
        //     hasErrors++;
        // }

        // if(isNaN(qbl) == true){
        //     hasErrors++;
        // }
        // if(isNaN(child) == true){
        //     hasErrors++;
        // }
        // if(isNaN(exb) == true){
        //     hasErrors++;
        // }
        
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
            hpagent:agent,
            hpcurrency:currency,
            hproom:room,
            hpmealplan:meal_plane
            

        });          
         
        // console.log(hpd_dataStore);
    }
    
}

var hotel =$('#h_package').val();
var hotel_package =$('#p_name').val();
var cnt_term=$('#h_contract').val();
var cur_url=window.location.href;

if(hotel==0){
 $('.alert').show();
   $('#notify').html('*Please Select The the Hotel');
}else if(hotel_package==''){
   $('.alert').show();
    $('#notify').html('*Please Enter Contract Name');
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
               data:{hpd_dataStoree:JSON.stringify(hpd_dataStore),
               hpd_sup_list:JSON.stringify(hpd_sup_list),hotel:hotel,hotel_package:hotel_package,cnt_term:cnt_term},
                   
               

               success: function(data) {
                
                console.log(data);

                  if(data=='saved'){
                   $('.alert').hide();
                   swal("Hotel Package Details Added Successfully!", "Success");
                   window.location.replace('{{route('package_index')}}');
                     window.location.reload();
                   $("#add_HPdFrm")[0].reset();
                   
                   
               }else{
                   
                    if(data.Error_code=='505'){

                    $('#error_details').val(data.Exp_dtl);
                    $('#curnt_url').val(cur_url);
                                                            
                    $('#frm_report').submit();
                    }else{
                                                            
                    $("html, body").animate({
                    scrollTop: 0
                        });
                    $('.alert').show();
                    $('#notify').html(data);
                    }
               }
                   
               }                                   
           })

}
//alert(hasErrors);

}
	    
	</script>
@endsection