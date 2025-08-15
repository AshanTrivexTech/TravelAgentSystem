@extends('layouts.tas_app')
@section('content')
<meta name="_token" content="{{csrf_token()}}" />

	<!-- BEGIN: Subheader -->  
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator ">
					Miscellanies
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
                                                    Miscellanies
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                         Create a   Miscellanies 
											</span>
										</a>
									</li>
								</ul>
			</div>    
			
			<div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
			<a href="{{route('index_miscellanies')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Create a   Miscellanies 
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->

									
									<form method="POST" id="add_marketFrm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                   
                                        <div class="m-portlet__body">


												<div class="form-group m-form__group has-danger row">
														<div class="col-lg-2">
																<label class="form-control-label">
																	Code :
																</label>
										
																<input required placeholder="unique code" id="code" name="code" type="text" class="form-control mxl_code"  value="">
																  <span class="form-group text-danger"> * Required</span>
															</div>
										
															<div class="col-lg-6">
																<label class="form-control-label">
																  Name :
																</label>
															<input required placeholder=" name" id="name" name="name" type="text"  class="form-control mxl_name"  value="">
																<span class="form-group text-danger"> * Required</span>
															</div>
															
												</div>

												<div class="form-group m-form__group  row">
															<div class="col-lg-4">
																<label class="form-control-label">
																Address :
																</label>
																<textarea placeholder="Address" id="address" name="address" class="form-control" required></textarea>                       
															</div>
														
													</div>

													{{-- <div class="form-group m-form__group  row">
															<div class="col-lg-3">
																	<label class="form-control-label">
																	Country :
																	</label>
																	<select required name="country" id="country" class="form-control">  
																   <option value="0" selected>Please Select...</option>
																	@foreach($countries->all() as $country)
									
																	<option value="{{$country->id}}">{{$country->country_name}}</option>
																	 @endforeach  
																	
										
										 
																	</select>
																	<span class="form-group text-danger"> * Required</span>
															</div>
															<div class="col-lg-3">
																<label class="form-control-label">
																District :
																</label>
																<select required name="district" id="district" class="form-control"> 
																	
																		
									
									
																</select>
																<span class="form-group text-danger"> * Required</span>
														</div>
															<div class="col-lg-3">
																	<label class="form-control-label">
																	City :
																	</label>
																	<select required name="city" id="city" class="form-control">
																		
																			
																			
																	</select>
																	<span class="form-group text-danger"> * Required</span>
															</div>
													</div> --}}

									
													<div class="form-group m-form__group  row">
														<div class="col-lg-6">
															<label class="form-control-label">
															   Mobile :
															</label>
														  <input placeholder="011XXXXXXXX" id="mobile" name="mobile" type="tel" class="form-control mxl_phone"  value="" >
														</div>
														
														<div class="col-lg-6">
															<label class="form-control-label">
															 Email  :
															</label>
														<input placeholder="Email" id="email" name="email" type="email" class="form-control" value="">		                      
														</div>
													   
													</div>
											
											<div class="form-group m-form__group has-danger row">
												<div class="col-lg-4">
													<label class="form-control-label">
														Types:
													</label>
													<div class="m-input-icon m-input-icon--right">
															<select class="form-control" name="msc_type" id="msc_type">

																@foreach($misc->all() as $type)
															<option value="{{$type->id}}">{{$type->type}}</option>
																@endforeach

															</select>
															<span class="m-form__help text-danger">
																	* Required
															</span>
															<span>
																
															</span>
													
													</div>
											
												</div>

												<div class="col-lg-4">
														<label class="form-control-label">
															Category:
														</label>
														<div class="m-input-icon m-input-icon--right">
					
																<select class="form-control" name="msc_cat" id="msc_cat">

																@foreach($categorys->all() as $cat)
																<option value="{{$cat->id}}">{{$cat->category}}</option>
																@endforeach
																</select>
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
					var code = $('#code').val();
					var name = $('#name').val();
					var email = $('#email').val();
					var address = $('#address').val();
					var mobile = $('#mobile').val();
					var mtitle = $('#mtitle').val();
					var rate = $('#rate').val();
					var msc_type = $('#msc_type').val();
					var msc_cat = $('#msc_cat').val();
					var cur_url=window.location.href;
					// console.log(name);
					// console.log(code);
									
					
						//Send Ajax request 
					  $.ajax({
						
						url: '{{Route('store_miscellanies')}}',
						method: "POST",
						data: {mobile:mobile,address:address,email:email,name:name,code:code,mtitle:mtitle,rate:rate,msc_type:msc_type,msc_cat:msc_cat},
						success: function(data) {
								
							console.log(data);
							//if Added 
							if(data=='added'){
								$('.alert').hide();
								swal("Miscellanies Add successfully completed!", ""+name, "success");
								window.location.replace('{{route('index_miscellanies')}}');
								$("#add_marketFrm")[0].reset();
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

			


	// 		  $('#country').change(function(event){
           
	// 	   $.ajaxSetup({
	// 		headers: {
	// 			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	// 		}
	// 	  });

	// 	  var country = $('#country').val();
	// 	  let dd_district = $('#district');  
		  
	// 	  if(country!=0){
		  
	// 		  $.getJSON({
			  
	// 		  url: '{{Route('select_districts')}}',
	// 		  method: "POST",
	// 		  data: {country:country},
	// 		  success: function(data) {

	// 			 //console.log(data);
	// 			  $('#district').empty();
	// 			 $('#district').append('<option value="0">Please Select</option>');                      
	// 			 $('#city').empty();
	// 			 $('#city').append('<option value="0">Please Select</option>');
	// 			 $.each(data, function (key, entry) {
	// 			  dd_district.append($('<option></option>').attr('value', entry.id).text(entry.dist_name));
	// 			})
	// 		  }                                   
	// 	  }) 
	// 	  }else{
	// 		$('#district').empty();
    //                  $('#city').empty();
    //                  $('#district').append('<option value="0">Please Select</option>');  
    //                  $('#city').append('<option value="0">Please Select</option>');   
	// 	  }
	//   });
		  



		  // City dropdown Load data
		//   $('#district').change(function(event){
			
		// 			$.ajaxSetup({
		// 			 headers: {
		// 				 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		// 			 }
		// 		   });
   
		// 		   var district = $('#district').val();
		// 		   let dd_city = $('#city');  
				   
		// 		   if(country!=0){
				   
		// 			   $.getJSON({
					   
		// 			   url: '{{Route('select_city')}}',
		// 			   method: "POST",
		// 			   data: {district:district},
		// 			   success: function(data) {
							  
		// 				   //console.log(data);
		// 				   $('#city').empty();
		// 				  $('#city').append('<option value="0">Please Select</option>');                      
		// 				  $.each(data, function (key, entry) {
		// 					  dd_city.append($('<option></option>').attr('value', entry.id).text(entry.city_name));
		// 				 })
		// 			   }                                   
		// 		   }) 
		// 		   }else{
		// 			$('#city').empty();
        //                   $('#city').append('<option value="0">Please Select</option>');   
		// 		   }
		// 	   });




		});
	
	</script>
@endsection 


	















