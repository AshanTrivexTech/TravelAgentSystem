@extends('layouts.tas_app')
@section('content')  
	<!-- BEGIN: Subheader -->
	<meta name="_token" content="{{csrf_token()}}" />
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
                                            Market
											</span>
										</a>
									</li>
								</ul>
			</div>    
			<div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<a href="{{route('market_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Update a Market
												</h3>
											</div>
										</div>
									</div>

									
									<!--begin::Form-->
									<form id="add_market" method="POST"  class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                    {{csrf_field()}}
								 
								
                                        <div class="m-portlet__body">
											<div class="form-group m-form__group has-danger row">
												<div class="col-lg-6">
													<label class="form-control-label">
                                                         Market Code:
													</label>
                                                    <input required placeholder="unique code" id="m_code" name="m_code" type="text" class="form-control m-input mxl_code"  value="{{$market_data->m_code}}">
                                                   <span class="form-group text-danger">

													* Required
												   </span>
                                                    
												</div>
												<div class="col-lg-6">
													<label class="form-control-label">
														Market Title :
													</label>
													
                                                    <input required placeholder="unique name" id="m_name" name="m_name" type="text" class="form-control m-input" maxlength="191" value="{{$market_data->market_name}}">
                                                   
													<span class="form-group text-danger">

															* Required
														   </span>
												</div>
											</div>
											{{-- <div class="form-group m-form__group has-danger row">
												<div class="col-lg-6">
													<label class="form-control-label">
														Currencies:
													</label>
													<div class="m-input-icon m-input-icon--right">
                                            <select class="form-control" id="currency" name="currency">
										  
												@foreach($Currencies->all() as $currency)
												
											<option value="{{$currency->id}}" @if($currency->id==$market_data->currency_id)selected @endif >{{$currency->code}}</option>
																						
												@endforeach
											</select>
											<span class="form-group text-danger">

													* Required
												   </span>
													</div>
													
															<div class="form-control-feedback">
																	
															</div>													
												</div>
											</div> --}}
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-6">
														<button type="button" id="frm_submit" class="btn btn-primary">
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
					var id =  '{{$market_data->id}}';
					var m_code = $('#m_code').val();
					var m_name = $('#m_name').val();
					var cur_url=window.location.href;
					// var currency = $('#currency').val();
					//console.log('checked');
				
					//console.log(id);		  
						//Send Ajax r;equest 
						$.ajax({
							// console.log("a");
						
							url: '{{Route('market_update')}}',
							method: "POST",
								data: {id:id,m_code:m_code,m_name:m_name},
								
								success: function(data) {
									
								console.log(data);
								
								
								//if Added 
									if(data=='updated'){
										$('.alert').hide();
										swal("Hotel Updated successfully!", ""+m_name, "success");
										window.location.replace('{{Route('market_index')}}');
	
									}else{
										// pop up error
										if(data.Error_code=='505'){

											$('#error_details').val(data.Exp_dtl);
											$('#curnt_url').val(cur_url);
																					
											$('#frm_report').submit();
											}
												else{
																					
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
	<script>
	$(".My").select2();
	
	</script>

@endsection 


	