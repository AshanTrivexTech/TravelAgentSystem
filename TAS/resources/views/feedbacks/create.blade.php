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
                                                    FeedBacks
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                             FeedBacks  Data
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
													Create a FeedBack 
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->

									
							<form method="POST" action="{{Route('store_feedback')}}"  id="add_feedbcFrm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" enctype="multipart/form-data">
											{{csrf_field()}}
                                        <div class="m-portlet__body">
											<div class="form-group m-form__group has-danger row">
												
												<div class="col-lg-3">
													<label class="form-control-label">
                                                           FeedBack Type:
                                                    </label>
                                                    

                                                    <select class="form-control m-bootstrap-select m_selectpicker"  id="fed_type" name="fed_type">
                                                            <option value="0" selected>Please select...</option>
                                                            <option value="1">Suggestions</option>
															<option value="2">Bugs</option>
															<option value="2">General</option>
                                                    </select>
                                                   
															<div class="form-control-feedback">
																	
															</div>
														<span class="form-group text-danger">
																	* Required
														</span>	
													
                                                </div>
                                                <div class="col-lg-9">
														<label class="form-control-label">
																Description:
														</label>
													<textarea placeholder="Type Your Description Here...." class="form-control" name="des" id="des" cols="50" rows="5"></textarea>
														
																<div class="form-control-feedback">
																		
																</div>
																<span class="form-group text-danger">
																		* Required
															    </span>	
													</div>
                                            
                                            </div>
                                            <div class="form-group m-form__group has-danger row">
													<div class="col-lg-6">
													
															<input type="file" class="form-control" name="custom_file" id="custom_file" onchange="ValidateFileUpload()">
															
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
																
											        </div>
                                            </div>
											<div class="form-group m-form__group has-danger row">
													<div class="col-lg-12" >
													    
															<img src="k" id="image"  style="height:700px;width:1200px; margin-left:80px;">
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
			
			
			$('#frm_submit').click(function(event){

				    var feedback_type=$('#fed_type').val();
                    var description=$('#des').val();
					var file_choose=$('#custom_file').val();
					
					
                    	 
				        if(feedback_type==0){
                            $('.alert').show();
							$('#notify').html('* Please Select FeedBack Type.');
							$("html, body").animate({
										scrollTop: 0
									});
						}
						else if(description==''){
						    $('.alert').show();
						
							$('#notify').html('* Please Enter Something About Feedback.');
							$("html, body").animate({
										scrollTop: 0
									});
						}
						// else if(file_choose==''){
                        //     $('.alert').show();
						// 	$('#notify').html('* Please Attache Something.');
						// 	$("html, body").animate({
						// 				scrollTop: 0
						// 			});
						// }
						else{
							
							
							$('#add_feedbcFrm').submit();
                            // swal("Feedback Submitted Successfully Completed!");
							// console.log(contents);
							
							}
						

				
				// var formData = new FormData();
                // formData.append('file', $('input[type=file]')[0].files[0]);
                	   
				
				// $.ajax({
				// 			url: '{{Route('store_feedback')}}',
				// 			type: "POST",             
				// 			data: formData, 
				// 			contentType: false,       
				// 			cache: false,             
				// 			processData:false,        
				// 			success: function(data)   
				// 			{
				// 				  console.log(data);

				// 			if(data=='added'){

                //             $('.alert').hide();
                //             swal("Feedback Report successfully completed!");
                //             $("html, body").animate({
                //                     scrollTop: 0
                //                 });                               
                //         }else{
                //                     // pop up error
                //                     $("html, body").animate({
                //                     scrollTop: 0
                //                     });
                //                     $('.alert').show();
                //                     $('#notify').html(data);                          
                //         }

				// 			}
				// 			});

            });
				
			});

		function ValidateFileUpload() {

        var file_Data = document.getElementById('custom_file');
		var FileUploadPath = file_Data.value;
		var filename = FileUploadPath.replace(/^.*\\/, "");

        if (filename == '') {
            $('.alert').show();
			$('#notify').html('* Please Upload Image.');

        } else {
            var Extension = filename.substring(filename.lastIndexOf('.') + 1).toLowerCase();
                    
        if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg"){
                     
                if (file_Data.files && file_Data.files[0]) {
                    var reader = new FileReader();
					// console.log(reader);

                    reader.onload = function(e) {
                        $('#image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(file_Data.files[0]);
                }

            } 
       else {
            
				$('.alert').show();
			    $('#notify').html("*Only allows file types of GIF, PNG, BMP, JPEG, JPG . ");
				$('#custom_file').val('');	
            }
        }
    }
	
	</script>
	<script>
	$(".My").select2();
	</script>
@endsection 


	















