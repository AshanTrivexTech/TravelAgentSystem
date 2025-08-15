
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
                      Edit a Hotel Contract
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
                    Edit a Hotel Contract
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="">
 
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-3">
                        <label class="form-control-label">
                            Hotel :
                        </label>
                       
                        <select class="form-control" name="h_package" id="h_package">
                            @foreach($hotels->all() as $hotel)
                        <option value="{{$hotel->id}}" @if($hotel->id==$periods->supplier_id) selected @endif>{{$hotel->sup_name}}</option>
                            @endforeach
                         </select>
                         <span class="m-form__help text-danger">
                                * Required
                            </span>
                    </div>
                    <div class="col-lg-4">
                            <label class="form-control-label">
                             Contract Name:
                            </label> 
                            <input id="p_name" placeholder="Package Name"  class="form-control" name="p_name" type="text" value="{{$periods->Package_name}}" > 
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                        </div> 

                    <div class="col-lg-3">
                        <label class="form-control-label">
                         Market :
                        </label>
                        <select class="form-control" name="market" id="market">
                            
                            @foreach($markets->all() as $market)
                        <option value="{{$market->id}}" @if($market->id==$periods->market_id) selected @endif>{{$market->market_name}}</option>
                            @endforeach
                         </select>
                         <span class="m-form__help text-danger">
                                * Required
                            </span>
                       
                    </div>
                    <div class="col-lg-2">
                            <label class="form-control-label">
                             Agent :
                            </label>
                            <select class="form-control" name="agent" id="agent">
                                
                                @foreach($agents->all() as $agent)
                            <option value="{{$agent->id}}" @if($agent->id==$periods->agent_id) selected @endif>{{$agent->ag_name}}</option>
                                @endforeach
                             </select>
                             <span class="m-form__help text-danger">
                                    * Required
                                </span>
                           
                        </div>
                    
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                Currency type :
                                </label>
                              
                                <select class="form-control" name="currency" id="currency">
                                @foreach($currencys->all() as $currency)
                                <option value="{{$currency->id}}" @if($currency->id==$periods->currency_id) selected @endif>{{$currency->type}}</option>
                                @endforeach
                              </select>
                              <span class="m-form__help text-danger">
                                    * Required
                                </span>
                            </div>
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                  Room Type :
                                </label>
                                <select class="form-control" name="room" id="room">
                                @foreach($room_types->all() as $type)
                                <option value="{{$type->id}}" @if($type->id==$periods->room_type_id) selected @endif >{{$type->r_type}}</option>
                                @endforeach
                              </select>
                              <span class="m-form__help text-danger">
                                    * Required
                                </span>
                            </div>
                <div class="col-lg-3">
                        <label class="form-control-label">
                         Meal Plane:
                        </label>
                        <select class="form-control" name="meal_plane" id="meal_plane">
                           
                            @foreach($meals->all() as $meal)
                        <option value="{{$meal->id}}" @if($meal->id==$periods->meal_plane_id ) selected @endif >{{$meal->meal_plane}}</option>
                            @endforeach
                      </select>
                      <span class="m-form__help text-danger">
                            * Required
                        </span>
                    </div>
                    {{-- <div class="col-lg-3">
                            <label class="form-control-label">
                             Period :
                            </label>
                            <select class="form-control" name="period" id="period">
                            @foreach($period_types->all() as $period_type)
                            <option value="{{$period_type->id}}" @if($period_type->id==$periods->title) selected @endif >{{$period_type->type}}</option>
                            @endforeach
                             </select>
                             <span class="m-form__help text-danger">
                                    * Required
                                </span>
                        </div>                             --}}
                                               
                </div>
                <div class="form-group m-form__group has-danger row">
                        <div class="col-lg-3">

                                <label class="form-control-label">
                                       Valid Form Date :
                                    </label>
                                <input placeholder="Periods From Date" id="from_date"
                       name="from_date" type="text"
                       class="form-control dtpic-format" value="{{$periods->from_date}}">
                       <span class="m-form__help text-danger">
                            * Required
                       </span>
                        </div>
                        <div class="col-lg-3">

                                <label class="form-control-label">
                                       Valid To Date :
                                    </label>
                                <input placeholder="Periods To date Date" id="to_date"
                       name="to_date" type="text"
                       class="form-control dtpic-format" value="{{$periods->to_date}}">
                       <span class="m-form__help text-danger">
                            * Required
                        </span>
                        </div>
                    </div>         
                <div class="form-group m-form__group  row">
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                 Single Rate:
                                </label>
                                <input id="sgl" placeholder="Single Rate"  class="form-control" name="sgl" type="text" value="{{$periods->SGL}}" > 
                                <span class="m-form__help text-danger">
                                        * Required
                                    </span>
                            </div>                            
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                 Double Rate:
                                </label> 
                            <input id="dbl" placeholder="Double Rate"  class="form-control" name="dbl" type="text" value="{{$periods->DBL}}" > 
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                            </div> 
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                 Trible Rate:
                                </label> 
                            <input id="tbl" placeholder="Trible Rate"  class="form-control" name="tbl" type="text" value="{{$periods->TBL}}" > 
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                            </div>
                            <div class="col-lg-3">
                                    <label class="form-control-label">
                                     Quad Trible Rate:
                                    </label> 
                                    <input id="qbl" placeholder="Quad trible Rate"  class="form-control" name="qbl" type="text" value="{{$periods->QBL}}" > 
                                    <span class="m-form__help text-danger">
                                            * Required
                                        </span>
                                </div>  
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                 Child Rate:
                                </label> 
                            <input id="child" placeholder="Child Rate"  class="form-control" name="child" type="text" value="{{$periods->child_rate}}" >
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                            </div> 
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                 Extra Bed  Rate:
                                </label> 
                            <input id="exb" placeholder="Extra Bed Rate"  class="form-control" name="exb" type="text" value="{{$periods->extra_bed_charge}}" > 
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                            </div> 
                </div>
                <div class="form-group m-form__group  row">                      
                        <div class="col-lg-6">
                            <label class="form-control-label">
                                Status:
                            </label>
                            <div class="m-radio-list">
                                <label class="m-radio m-radio--state-success">
                                    <input type="radio" name="status" id="active" @if(($periods->status)==1) checked @endif > Active
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--state-brand">
                                    <input type="radio" name="status" id="status"@if(($periods->status)==0)  @endif> In-active
                                    <span></span>
                                </label>
                                <span class="m-form__help text-danger">
                                        * Required
                                     </span>
                            </div>                       
                        </div>
                    </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-primary" id="frm_submit">
                                Save
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
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
		$(document).ready( function(){
		  
			//To hide the alert window on load the page
			$('.alert').hide();
			
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
	
					//form data to Variable
                    var p_name = $('#p_name').val();
					var h_package = $('#h_package').val();
					var market = $('#market').val();
                    var agent = $('#agent').val();
					var currency = $('#currency').val();
					var room = $('#room').val();
					var meal_plane = $('#meal_plane').val();
					var period = $('#period').val();
					var sgl = $('#sgl').val();
					var dbl = $('#dbl').val();
					var tbl = $('#tbl').val();
					var child = $('#child').val();
					var exb = $('#exb').val();
					var qbl = $('#qbl').val();
                    var from_date=$('#from_date').val();
                    var to_date=$('#to_date').val();
					//var status = $('#status').val();
                    var id='{{$periods->id}}';
                    var cur_url=window.location.href;
					// console.log(currency_id);
					// console.log(name);
					 //console.log(data);
                 if($('#active').attr('checked')==true)
                 {
                    status=1
                 }
                 else
                 {
                    status = 0;
                 }				
					
						//Send Ajax request 
					  $.ajax({
						
						url: '{{Route('package_update')}}',
						method: "POST",
						data: {id:id,h_package:h_package,market:market,agent:agent,currency:currency,room:room,meal_plane:meal_plane,period:period,sgl:sgl,dbl:dbl,tbl:tbl,child:child,exb:exb,qbl:qbl,p_name:p_name,from_date:from_date,to_date:to_date,status:status},
						success: function(data) {
								
							console.log(data);
							//if Added 
							if(data=='updated'){
								$('.alert').hide();
								swal("Hotel Package Update successfully completed!",""+p_name,  "success");
								window.location.replace('{{route('package_index')}}');
								$("html, body").animate({
										scrollTop: 0
									});                               
							}else{
								// pop up error
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
	
	
				
			 });
		});
	
	</script>
@endsection