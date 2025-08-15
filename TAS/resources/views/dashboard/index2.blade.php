@extends('layouts.tas_app')
@section('content')
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
				 Admin	Dashboard
				</h3>
			</div>    
			<div>
				<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
					<span class="m-subheader__daterange-label">
						<span class="m-subheader__daterange-title"></span>
						<span class="m-subheader__daterange-date m--font-brand"></span>
					</span>
					<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
						<i class="la la-angle-down"></i>
					</a>
				</span>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	{{-- <div class="m-content">
			<div class="m-portlet m-portlet--mobile bg-secondary">
				<div class="m-portlet__body"> --}}
					<div style="padding-left:20px;" class="form-group m-form__group row">
						<div class="col-lg-12">
							<table>
							<tbody>
								<tr>
									<td colspan="4" style="padding:6px;">
											<div style="width: 74rem; height: 6.7rem; background-color:white;" class="card">
													<div style="padding:6px;" class="card-body text-center">
														<table class="table table-bordered" width="100%">
															<tbody class="table-secoundary">
																<tr style="text-align:left;">
																	<td style="padding-top:10px; padding-left:10px;" width="40%">
																			<h5 class="m-portlet__head-text m--font-info">Tour Code &nbsp;:&nbsp;UK/GFT/CMB/102018-26-V1</h5>
																	</td>
																	<td style="padding-top:10px; padding-left:10px;" width="40%">
																			<h5 class="m-portlet__head-text m--font-success">Tour Title &nbsp;:&nbsp; TEST TOUSR WKSJJQLS</h5>	
																	</td>
																	<td rowspan="2" style="text-align: center; padding-top:10px;" width="10%">
																		<span class="m-badge m-badge--info m-badge--wide"><b>NewSSSSSa</b></span>
																	</td>
																</tr>
																<tr>
																	<td style="text-align:left; padding-left:10px; padding-top:7px; padding-right:10px;" colspan="2">
																		<span class="text-muted">Created By : Hashan</span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <span class="text-muted">Created By : Hashan</span>
																	</td>
																</tr>
																
															</tbody>
														</table>
													</div>									
											</div>
									</td>
								</tr>
								<tr>
									<td style="padding:6px;">
											
											<a href="" style="width: 20rem; height: 12.5rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
													<div class="card-body text-center">
														<h5 class="card-title text-left text-success">GUEST LIST</h5>
														<i class="la la-users text-success" style="font-size:48px;"></i>
														<hr>
														<h6 class="card-subtitle mb-2 text-muted text-success">106</h6>
													 
													</div>									
											</a>
									</td>
									
									<td style="padding:6px;">
											
											<a href="" style="width: 20rem; height: 12.5rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
													<div class="card-body text-center">
														<h5 class="card-title text-success">GUIDES</h5>
														<i class="la la-user-secret text-success" style="font-size:48px;"></i>
														<hr>
														<h6 class="card-subtitle mb-2 text-muted text-success">106</h6>
													 
													</div>									
											</a>
									</td>
									<td style="padding:6px;">
											
											<a href="" style="width: 20rem; height: 12.5rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
													<div class="card-body text-center">
														<h5 class="card-title text-left text-success">TRANSPORTS</h5>
														<i class="la la-taxi text-success" style="font-size:48px;"></i>
														<hr>
														<h6 class="card-subtitle mb-2 text-muted text-success">106</h6>
													 
													</div>									
											</a>
									</td>
									<td style="padding:6px;">											
											<a href="" style="width: 10rem; height: 12.5rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
													<div class="card-body text-center">
														<h5 class="card-title text-success">AMEND</h5>
														<i class="m-menu__link-icon flaticon-file text-success" style="font-size:48px;"></i>
														<hr>
														<h6 class="card-subtitle mb-2 text-muted text-success">Booking</h6>
													 
													</div>									
											</a>
									</td>
									
								</tr>
								<tr>
										<td>
												<table width="100%">
													<tbody>
														<tr>
															<td colspan="2" style="padding:6px;">
																	<a href="" style="width: 20rem; height: 6rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
																			<div class="card-body text-center">
																				<div class="row">
																					<div class="col-sm-6">
																							<h5 class="card-title text-left text-success">ITINERARY</h5>																	
																					</div>
																					<div class="col-sm-6">
																							<i class="la la-file-text-o text-success text-right" style="font-size:45px;"></i>
																					</div>
																																						
																				</div>
																				
																			</div>									
																	</a>
															</td>
														</tr>
														<tr>
															<td style="padding:6px;">
																	<a href="" style="width: 9.5rem; height: 6rem; background-color:white; padding:0px;" class="card btn btn-secondary m-btn m-btn--icon">
																			<div style="padding:5px;" class="card-body text-center">
																				 {{-- <div class="row"> --}}

																					 {{-- <div style="text-align: center;" class="col-sm-12"> --}}
																							{{-- <h5 style="padding-left:13px; padding-top:10px;" class="card-title text-left text-success">ROUTE
																							</h5> --}}
																							
																								<i class="m-menu__link-icon flaticon-route text-center text-success" style="font-size:55px;"></i>																	
																							</div>
																					{{-- </div>  --}}
																				{{-- </div> --}}
																				{{-- <div class="row"> --}}
																					{{-- <div  style="padding-top:6px;" style="text-align: center;" class="col-sm-12"> --}}
																						
																							
																					{{-- </div>
																				</div>																	 --}}
																				 
																			</div>									
																	</a>
															</td>
															<td>
																	<a href="" style="width: 9.5rem; height: 6rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
																			<div class="card-body text-center">
																					
																							<i class="m-menu__link-icon flaticon-file text-success text-right" style="font-size:40px;"></i>
																																						
																			</div>									
																	</a>
															</td>
														</tr>
													</tbody>	
												</table>												
										</td>
										<td colspan="3">

											<table width="100%">
												<tbody>
													<tr>
														<td style="padding:6px;" colspan="3">
															<a href="" style="width: 31rem; height: 13rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
																<div class="card-body text-left">
																	<h5 class="card-title text-left text-success">ACCOMMODATION</h5>
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="la la-hotel text-success" style="font-size:48px;"></i>
																	<hr>
																	<h6 class="card-subtitle mb-2 text-muted text-success">Manage</h6>
																	
																</div>									
														</a>
														</td>
														<td style="padding:6px;">
															<a href="" style="width: 21rem; height: 13rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
																<div class="card-body text-center">
																	<h5 class="card-title text-success">MISCELLANEOUS</h5>
																	<i class="la la-paperclip text-success" style="font-size:48px;"></i>
																	<hr>
																	<h6 class="card-subtitle mb-2 text-muted text-success">Manage</h6>
																	
																</div>									
															</a>
														</td>
													</tr>
												</tbody>
											</table>

										</td>									
								</tr>
								<tr>
									<td colspan="4">
										<table width="100%">
											<tbody>
												<tr>
														<td style="padding:6px;">
																<a disable style="width: 23.7rem; height: 6rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
																		<div class="card-body text-center">
																			<div class="row">
																				<div class="col-sm-6">
																						<h5 class="card-title text-left text-success"></h5>																	
																				</div>
																				<div class="col-sm-6">
																						{{-- <i class="la la-file-text-o text-success text-right" style="font-size:45px;"></i> --}}
																				</div>
																																					
																			</div>
																			
																		</div>									
																</a>
														</td>
														<td colspan="2" style="padding:6px;">
																<a href="" style="width: 38rem; height: 6rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
																		<div style="padding:5px 0px 0px ; margin:0px;" class="card-body text-center">
																			{{-- <div class="row"> --}}
																				{{-- <div class="col-sm-12"> --}}
																						<h5 style="margin:0px;" class="card-title text-left text-success">OPRTATION CHECKLIST</h5>
																				{{-- </div> --}}
																			{{-- </div> --}}
																			
																				{{-- <div class="col-sm-6"> --}}
																					    <i class="la la-users text-success text-right" style="font-size:35px;"></i>
																						<i class="la la-car text-success text-right" style="font-size:35px;"></i>
																						<i class="la la-hotel text-success text-right" style="font-size:35px;"></i>
																						<i class="la la-file-text-o text-success text-right" style="font-size:35px;"></i>
																				{{-- </div> --}}
																																																							
																			
																			
																		</div>									
																</a>
														</td>
														<td style="padding:6px;">
																<a href="" style="width: 10rem; height: 6rem; background-color:white; padding:0px;" class="card btn btn-secondary m-btn m-btn--icon">
																		<div style="padding:0px;" class="card-body text-center">
																			{{-- <div class="row">
																				<div class="col-sm-8"> --}}
																						<h6 style="padding-left:12px; padding-top:9px; margin:0px;" class="card-title text-left text-success">Comment List</h6>																	
																				{{-- </div> --}}
																				{{-- <div class="col-sm-4"> --}}
																						<i class="la la-comment-o text-success text-right" style="font-size:55px;"></i>
																				{{-- </div> --}}
																																					
																			</div>
																			
																		</div>									
																</a>
														</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									
										<td colspan="4" style="padding:6px;">											
													  
												<div href="" style="width: 74.5rem; background-color:white;" class="card">
														<div style="padding:10px;" class="card-body text-left">
															
																			<p>
																				<span style="text-indent: 50px; text-align: justify;" class="text-muted"><b>Tour Remarks&nbsp;:&nbsp;</b></span>
																				<hr>
																				<span style="text-indent: 50px; text-align: justify;" class="text-muted">
																					is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
																					standard dummy text ever since the 1500s, when an unknown printer took a galley of type and 
																					scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
																					remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
																					and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
																					
																				</span>																				
																			</p>
																																	
																		</div>									
												</div>
										</td>
									
								</tr>
								
							</tbody>
						</table>
						</div>				
					
	</div>
@endsection     

