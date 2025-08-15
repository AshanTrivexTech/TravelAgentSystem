
<!DOCTYPE html>

<html lang="en">
	
	<head>
		<meta charset="utf-8" />
		<meta name="_token" content="{{csrf_token()}}" />
		<title>Travel Mate |Page Not Found</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Web font -->

		<!--begin::Base Styles -->
		<link href="{{ URL::asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />	
		<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{ URL::asset('assets/demo/default/media/img/logo/favicon.ico') }}" />

		<style>
				.slmd-header{
					   
					   background-color:#323c48;
					   text-align: center;
				}
				.mdsp-header{

						padding-top: 5px;
						padding-left: 10px;
						text-align: center;
						color: white;
				}
			   
			   .slmd-footer{

					   display: flex;
					   align-items: center;
					   justify-content: flex-end;
					   padding: 10px;
					   border-top: 1px solid #e9ecef;
			   }
			   .slmd-main{

					   max-width: 1200px;
					   margin: 1.75rem auto;
			   }
			   .center-text{

				text-align: center;
			   }
		
			  tr.selectedTr {

				background-color: lightskyblue;
				
			}
		
			  </style>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
			{{ csrf_field() }}
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
				<div class="m-grid__item m-grid__item--fluid m-grid  m-error-3" style="background-image: url({{URL::asset('assets/app/media/img//error/bg3.jpg')}});">
					<div class="m-error_container">
						<span class="m-error_number">
							<h1>404</h1>
						</span>
						<p class="m-error_title m--font-light">
							How did you get here
						</p>
						<p class="m-error_subtitle">
							Sorry we can't seem to find the page you're looking for.
						</p>
						<p class="m-error_description">
							There may be amisspelling in the URL entered,
							<br> or the page you are looking for may no longer exist.
						</p>
						<br>
						<button type="button" class="btn btn-warning" id="frm_submit" style="margin-left:110px; border-radius:5px;"
					            data-toggle="modal" data-target="#m_modal_1">
                            <b style="font-family:verdana;">Report</b>
			            </button>
					</div>
				</div>
			</div>
			
						
		<div class="modal" id="m_modal_1" tabindex="-1" role="dialog">
				<div class="slmd-main modal-lg modal-dialog-centered" role="document">
						<div class="modal-content">
								<div class="modal-header slmd-header">
										
											<span class="mdsp-header" id="qk_mod_title"><h5 class="mdsp-header">Report Error</h5></span>
		
										<input type="hidden" id="mod_hidden">
										<a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
														<i class="fa fa-close"></i>
										</a>
								</div>
								<div class="modal-body slmd-body">
										<input type="hidden" id="model_date" value="">
										
												<div class="form-group m-form__group row">
														<div class="col-md-12">
														<label class="form-control-label">
															   Remarks :
														</label>
														<textarea placeholder="Enter Remarks" id="remark" name="remark" class="form-control" cols="50" rows="7" ></textarea> 
		
														</div>
																									   													
												</div>
												
								</div>
								
								<div class="slmd-footer">
										<button type="button" class="btn btn-success" onclick=""  id="frmrp_submit">Submit</button>
										<span>&nbsp;</span>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
								</div>
						</div>
				</div>
		</div>
		  
		<input type="hidden"  id="error_details" name="error_details" value="" >
		<input type="hidden"  id="curnt_url"  name="curnt_url" value="">
		<!-- end:: Page -->

		<!--begin::Base Scripts -->
        <script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
		
		
		<!--end::Base Scripts -->
	</body>

	<!-- end::Body -->
</html>
<script>
		$(document).ready( function(){
		  
			//To hide the alert window on load the page
			$('.alert').hide();
			
			//to close the alert window after popup 
			$('#notify_close').click(function(event){
				$('.alert').hide();
			});

            
			  
			// submit the form
			$( "#frmrp_submit").click(function( event ) {
					
					//setup Ajax token ( without this function cannot pass data to controller)
					$.ajaxSetup({
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					  }
					});
	
					//form data to Variable
					var remark = $('#remark').val();
					var exp_dtl =$('#error_details').val();
					var c_url =$('#curnt_url').val();
				   
								// alert(remark);	  
						//Send Ajax request 
					  $.ajax({
						
						url: '{{Route('save_error')}}',
						method: "POST",
						data: {remark:remark,c_url:c_url,exp_dtl:exp_dtl},
						success: function(data) {
								
							// console.log(exp_dtl);
							//if Added 
							if(data=='added'){
								$('.alert').hide();
								swal("Error Reported successfully completed!");
								setTimeout(function(){

                                         document.location = document.referrer}
                                       ,300)
								
								//    history.go(-1);
								// $("#remark").html(null);
								// $("#m_modal_1")[0].close();
								                               
							}else{
								// pop up error
										
										$('.alert').show();
										$('#notify').html(data);
													 
							}
							
						}
						})
			 });
		});
	
	</script>
