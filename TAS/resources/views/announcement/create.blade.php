@extends('layouts.tas_app')
@section('content')
<meta name="_token" content="{{csrf_token()}}" />

	<!-- BEGIN: Subheader -->  
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator ">
				Dashboard Data
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
                                                    Announcement
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                             Announcement  Data
											</span>
										</a>
									</li>
								
								
								</ul>
			</div>    
			
			<div>
            {{-- <div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-angle-left"></i>
													<span>
														Back
													</span>
												</span>
											</a>
				<div class="m-separator m-separator--dashed d-xl-none"></div>
			</div> --}}
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
													Create an Announcement 
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->

									
									<form method="POST" action=""  id="add_marketFrm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                
                                        <div class="m-portlet__body">
											<div class="form-group m-form__group has-danger row">
												<div class="col-lg-2">
													<label class="form-control-label">
                                                         User Name:
													</label>
                                                <input required disabled  type="text" class="form-control m-input mxl_code"  value="{{$user_name}}">
                                                <input type="hidden" value="{{$u_id}}" id="user_id">
															<div class="form-control-feedback">
																	
															</div>
														
													
                                                    
												</div>
												<div class="col-lg-3">
													<label class="form-control-label">
														From Date:
													</label>
                                                    
                                                    <input id="m_datetimepicker_frm_date1" type="text" value="" class="form-control dtpic-format form-control-sm">
															<div class="form-control-feedback">
																	
															</div>
														<span class="form-group text-danger">
																	* Required
														</span>	
													
                                                    
												</div>
												<div class="col-lg-3">
													<label class="form-control-label">
														To Date:
													</label>
                                                    <input id="m_datetimepicker_frm_date2" type="text" value="" class="form-control dtpic-format form-control-sm">
                                                  
															<div class="form-control-feedback">
																	
															</div>
														<span class="form-group text-danger">
																	* Required
														</span>	
													
                                                    
                                                </div>
												<div class="col-lg-3">
													<label class="form-control-label">
                                                            Announcement Priority:
                                                    </label>
                                                    

                                                    <select class="form-control m-bootstrap-select m_selectpicker"  id="priority">
                                                            <option value="0" selected>Please select...</option>
                                                            <option value="1">Max Priority</option>
                                                            <option value="2">Low Priority</option>
                                                     
                                                    </select>
                                                   
															<div class="form-control-feedback">
																	
															</div>
														<span class="form-group text-danger">
																	* Required
														</span>	
													
                                                    
                                                </div>
                                                
                                            
                                            </div>
                                            <div class="form-group m-form__group has-danger row">

                                                    <div class="col-lg-6">
                                                            <label class="form-control-label">
                                                                    Announcement:
                                                            </label>
                                                        <textarea placeholder="Type Your Annoucement Here...." class="form-control" name="" id="annoucement" cols="50" rows="5"></textarea>
                                                            
                                                                    <div class="form-control-feedback">
                                                                            
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

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
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
	                      

                    var user_name=$('#user_id').val();
                    var frm_date=$('#m_datetimepicker_frm_date1').val();
                    var to_date=$('#m_datetimepicker_frm_date2').val();      
                    var priority=$('#priority').val();
                    var annoucement=$('#annoucement').val();

                 
                        if(frm_date==''){
                            $('.alert').show();
							$('#notify').html('*Please Select From Date.');
						}else if(to_date==''){
                            $('.alert').show();
							$('#notify').html('*Please Select To Date.');
						}else if(frm_date>to_date || frm_date==to_date){
							$('.alert').show();
							$('#notify').html('*Invalid Time Period.');
						}else if(priority==0){
                            $('.alert').show();
							$('#notify').html('*Please Select Priority Type.');
						}else if(annoucement==''){
							$('.alert').show();
							$('#notify').html("*Please Enter Announcement.");
						}
						
					  $.ajax({

						url: '{{Route('store_annoucement')}}',
						method: "POST",
						data: {user_name:user_name,frm_date:frm_date,to_date:to_date,priority:priority,annoucement:annoucement},
						success: function(data) {
								
							console.log(data);
							//if Added 
							if(data=='added'){
								$('.alert').hide();
								swal("Annoucement Add successfully completed!", "success");
								$("#add_marketFrm")[0].reset();
								
								$("html, body").animate({
										scrollTop: 0
									});   
                                    window.location.reload();                            
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
	<script>
	$(".My").select2();
	</script>
@endsection 


	















