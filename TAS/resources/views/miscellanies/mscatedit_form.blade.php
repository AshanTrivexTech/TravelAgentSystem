@extends('layouts.tas_app')
@section('content')
<meta name="_token" content="{{csrf_token()}}" />

	<!-- BEGIN: Subheader -->  
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator ">
					Miscellaneous
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
                                                    Miscellaneous
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                         Update a  Miscellaneous  Type
											</span>
										</a>
									</li>
								</ul>
			</div>    
			
			<div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
			<a href="{{route('miscellaneousCategory_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Update a Miscellaneous category
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form method="POST" id="" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                   
                                        <div class="m-portlet__body">


												<div class="form-group m-form__group has-danger row">
														<div class="col-lg-6">
																<label class="form-control-label">
																		Miscellaneous Category Name :
																</label>
										
																<input required placeholder="Miscellaneous Category Name" id="mcat_name" name="mcat_name" type="text" class="form-control mxl_name"  value="{{$misCategory_edit->category}}">
																  <span class="form-group text-danger"> * Required</span>
															</div>

															<div class="col-lg-6">
																	<label class="form-control-label">
																			Miscellaneous Category PAX :
																	</label>
											
																	<input required placeholder="Miscellaneous Category PAX" id="mcat_pax" name="mcat_pax" type="text" class="form-control mxl_phone"  value="{{$misCategory_edit->mc_pax}}">
																	  <span class="form-group text-danger"> * Required</span>
																</div>
												</div>
												<div class="form-group m-form__group has-danger row">
														
													<div class="col-lg-6">
															<label class="form-control-label">
															Rate :
															</label>
									
														<input required placeholder="Rate" id="mcat_rate" name="mcat_rate" type="text" class="form-control mxl_phone"  value="{{$misCategory_edit->Rate}}">
															  <span class="form-group text-danger"> * Required</span>
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
			$( "#frm_submit").click(function( event ) {
					
					//setup Ajax token ( without this function cannot pass data to controller)
					$.ajaxSetup({
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					  }
					});
	
					//form data to Variable
					var mcat_name = $('#mcat_name').val();
					var mcat_pax = $('#mcat_pax').val();
					var mcat_rate = $('#mcat_rate').val();		 
					var id='{{$misCategory_edit->id}}';
					var cur_url=window.location.href;		  
						//Send Ajax request 
					  $.ajax({
						
						url: '{{Route('miscellaneousCategory_update')}}',
						method: "POST",
						data: {mcat_name:mcat_name,mcat_pax:mcat_pax,id:id,mcat_rate:mcat_rate},
						success: function(data) {
								
							//console.log(data);
							//if Added 
							if(data=='updated'){
								$('.alert').hide();
								swal("Miscellaneous category update successfully completed!", ""+mcat_name, "success");
								window.location.replace('{{route('miscellaneousCategory_index')}}');
								                              
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


	















