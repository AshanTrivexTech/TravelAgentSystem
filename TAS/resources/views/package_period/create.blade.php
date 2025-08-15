@extends('layouts.tas_app')
@section('content')
<meta name="_token" content="{{csrf_token()}}" />

	<!-- BEGIN: Subheader -->  
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator ">
					Package Period
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
											Period Data
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                                    Package Period
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                         Create a Package Period 
											</span>
										</a>
									</li>
								</ul>
			</div>    
			
			<div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Create a Package Period
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->

									<form method="POST" id="add_marketFrm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                  
                                        <div class="m-portlet__body">
											<div class="form-group m-form__group has-danger row">
												<div class="col-lg-6">
													<label class="form-control-label">
                                                        Title :
													</label>
                                                    <input required placeholder="Title" id="title" name="title" type="text" class="form-control m-input" maxlength="25" value="">
                                                    
                                                    <span class="m-form__help text-danger">
															* Required
														</span>
												</div>
												<div class="col-lg-6">
                                                        <label class="form-control-label">
                                                            Type  :
                                                        </label>
                                                        {{-- <input required placeholder="Titler Title" id="title" name="title" type="text" class="form-control m-input" maxlength="5" value=""> --}}
                                                        <select class="form-control"  name="type" id="type">
                                                        @foreach($periods->all() as $period)
                                                        <option value="{{$period->type}}">{{$period->type}}</option>
                                                        @endforeach

                                                        </select>   
                                                        <span class="m-form__help text-danger">
																* Required
															</span>
                                                    </div>
											</div>
											<div class="form-group m-form__group has-danger row">
												<div class="col-lg-3">

                                                        <label class="form-control-label">
                                                                Form Date :
                                                            </label>
													    <input placeholder="Periods From Date" id="m_datepicker_1"
                                               name="ins_exDate" type="text"
											   class="form-control dtpic-format" value="">
											   <span class="m-form__help text-danger">
													* Required
												</span>
                                                </div>
                                                <div class="col-lg-3">

                                                        <label class="form-control-label">
                                                                To Date :
                                                            </label>
													    <input placeholder="Periods To date Date" id="m_datepicker_2"
                                               name="ins_exDate1" type="text"
											   class="form-control dtpic-format" value="">
											   <span class="m-form__help text-danger">
													* Required
												</span>
												</div>
                                            </div>
                                            
                                            <div class="form-group m-form__group has-danger row">

                                                    <div class="col-lg-6">
                                                            <label class="form-control-label">
                                                                Status:
                                                            </label>
                                                            <div class="m-radio-list">
                                                                <label class="m-radio m-radio--state-success">
                                                                    <input type="radio" name="status" id="status" value="1" checked> Active
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio m-radio--state-brand">
                                                                    <input type="radio" name="status" id="status" value="0"> In-active
                                                                    <span></span>
                                                                </label>
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
					var title = $('#title').val();
					var type = $('#type').val();
					var m_datepicker_1 = $('#m_datepicker_1').val();
					var m_datepicker_2 = $('#m_datepicker_2').val();
					var status = $('#status').val();
					
					// console.log(currency_id);
					// console.log(name);
					// console.log(code);
									
					
						//Send Ajax request 
					  $.ajax({
						
						url: '{{Route('store_period')}}',
						method: "POST",
						data: {title:title,type:type,m_datepicker_1:m_datepicker_1,m_datepicker_2:m_datepicker_2,status:status},
						success: function(data) {
								
							console.log(data);
							//if Added 
							if(data=='added'){
								$('.alert').hide();
								swal("Package Period Add successfully completed!", ""+title, "success");
								window.location.replace('{{route('period_index')}}');
								$("#add_marketFrm")[0].reset();
								$("html, body").animate({
										scrollTop: 0
									});                               
							}else{
								// pop up error
									$("html, body").animate({
										scrollTop: 0
									});
									$('.alert').show();
									$('#notify').html(data);
									
									//$('#emp_listGrid').append(data);
																 
							}
							
							
						}
						})
	
	
				
			 });
		});
	
	</script>
@endsection 


	















