@extends('layouts.tas_app')
@section('content')
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">  
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator ">
                Master Data
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
											Master Files
											</span>
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
                                            Agents
											</span>
										</a>
									</li>
								</ul>
			</div>    
			<div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<a href="{{route('agent_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Update an Agent
												</h3>
											</div>
										</div>
									</div>
				
									<form  class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  method="POST" >
                                  
                                    <input type="hidden" name="_method" value="PUT">
                                    
                                        <div class="m-portlet__body">
											<div class="form-group m-form__group  row">
												<div class="col-lg-6">
													<label class="form-control-label">
                                                         Agent Code:
													</label>
                                                    <input required placeholder="unique code" id="code" name="code" type="text" class="form-control m-input mxl_code"  value="{{$agent->ag_code}}">
                                                    <span class="form-group text-danger"> * Required</span>
                                                    
												</div>
												<div class="col-lg-6">
													<label class="form-control-label">
														Agent Name :
													</label>
												<input required placeholder="unique name" id="name" name="name" type="text" class="form-control m-input mxl_name"  value="{{$agent->ag_name}}">
												<span class="form-group text-danger"> * Required</span>
                                                    
												</div>
											</div>
											<div class="form-group m-form__group  row">
												<div class="col-lg-6">
													<label class="form-control-label">
														Market :
                                                    </label>
                                                   	 <select class="form-control" name="market_id" id="market_id">
														   @foreach($markets->all() as $market)
														<option value="{{$market->id}}"  @if($market->id==$agent->market_id) selected @endif   >{{$market->market_name}}</option>
														   @endforeach
                                           			</select>
													   <span class="form-group text-danger"> * Required</span>
													
												</div>
											</div>
											<div class="form-group m-form__group  row">
													<div class="col-lg-4">
														<label class="form-control-label">
															Email 1:
														</label>
													<input required   @if($email_a!='')  value="{{$email_a->contact}}"   @else   placeholder="Not Available"  @endif   id="email_1" name="email_1" type="email" class="form-control m-input"  >
													<span class="form-group text-danger"> * Required</span>
												</div>
													<div class="col-lg-4">
															<label class="form-control-label">
															Email 2:
															</label>
															<input required id="email_2" name="email_2" type="email" class="form-control m-input"  @if($email_b!='')  value="{{$email_b->contact}}"  @else  placeholder="Not Available" @endif >
														</div>
														<div class="col-lg-4">
																<label class="form-control-label">
															Email 3:
																</label>
																<input required  id="email_3" name="email_3" type="email" class="form-control m-input"  @if($email_c!='') value="{{$email_c->contact}}"   @else  placeholder="Not Available"    @endif>
															</div>
												</div>
												<div class="form-group m-form__group  row">
														<div class="col-lg-4">
															<label class="form-control-label">
																Fax :
															</label>  
														<input required  id="fax" name="fax" type="tel" class="form-control m-input mxl_phone"  @if($agent_fax!='') value="{{$agent_fax->contact}}" @else placeholder="Not Available"       @endif >
														</div>
														<div class="col-lg-4">
																<label class="form-control-label">
																Tel :
																</label>
																<input required @if($agent_tel!='') value="{{$agent_tel->contact}}" @else placeholder="Not Available"       @endif      id="tel" name="tel" type="tel" class="form-control m-input mxl_phone"  >
															</div>
													</div>
													<div class="form-group m-form__group  row">
															<div class="col-lg-4">
																<label class="form-control-label">
																  Address :
																</label>
															<textarea placeholder="Address" id="address" name="address" class="form-control" required>{{$agent->address}}</textarea>                       
															</div>
															
														</div>
														<div class="form-group m-form__group  row">
																<div class="col-lg-4">
																	<label class="form-control-label">
																	  Remarks :
																	</label>
																	<textarea placeholder="Remarks" id="remarks" name="remarks" class="form-control" required>{{$agent->remarks}}</textarea>                       
																</div>
																
															</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-6">
														<button type="button"  id="frm_submit"  class="btn btn-primary">
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

@endsection 

@section('Page_Scripts')
@parent
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
			$("#frm_submit").click(function(event) {
					
					//setup Ajax token ( without this function cannot pass data to controller)
					$.ajaxSetup({
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					  }
					});
	
					//form data to Variable
				   // var code = $('#code').val();
				   // var name = $('#name').val();
					var code=$('#code').val();
					var name=$('#name').val();
					var market_id = $('#market_id').val();
					var email_1 = $('#email_1').val();
					var email_2 = $('#email_2').val();
					var email_3 = $('#email_3').val();
					var fax = $('#fax').val();
					var address = $('#address').val();
					var remarks = $('#remarks').val();
					var tel = $('#tel').val();
					var id='{{$agent->id}}';
					
				   // console.log('dsf');
						//Send Ajax request 
						$.ajax({
						
							url: '{{Route('agent_update')}}',
							method: "POST",
								data: {code:code,name:name,market_id:market_id,email_1:email_1,email_2:email_2,email_3:email_3,fax:fax,address:address,remarks:remarks,id:id,tel:tel},
								success: function(data) {
									
								console.log(data);
								//if Added 
									if(data=='updated'){
										$('.alert').hide();
										swal("Agent Updated successfully!", ""+name+"","success");
										window.location.replace('{{Route('agent_index')}}');
	
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


	















