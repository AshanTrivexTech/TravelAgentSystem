@extends('layouts.tas_app')
@section('content')
<meta name="_token" content="{{csrf_token()}}" />

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
                                         Itineray 
											</span>
										</a>
									</li>
								</ul>
			</div>    
			
			<div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<a href="{{route('itineray_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Create a   Itinerary 
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->

									
									<form method="POST" action=""  id="add_ItineraryFrm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                    {{csrf_field()}}
                                        <div class="m-portlet__body">
											<div class="form-group m-form__group has-danger row">
												<div class="col-lg-3">
													<label class="form-control-label">
                                                       Route Code:
													</label>
                                                    <input required placeholder="unique code" id="code" name="code" type="text" class="form-control m-input mxl_code"  value="">
                                                    
															
															<span class="form-group text-danger">
																	* Required
                                                        </span>
                                                        
                                                    
                                                </div>
												<div class="col-lg-3">
													<label class="form-control-label">
                                                      Starting Tag:
													</label>
                                                    <input required placeholder="unique code" id="start_tag" name="code" type="text" class="form-control"  value="">
                                                    
															
															<span class="form-group text-danger">
																	
                                                        </span>
                                                        
                                                    
                                                </div>
												<div class="col-lg-3">
													<label class="form-control-label">
                                                      Route Name:
													</label>
                                                    <input required placeholder="unique code" id="route_nme" name="code" type="text" class="form-control"  value="">
                                                    
															
															<span class="form-group text-danger">
																	* Required
                                                        </span>
                                                        
                                                    
                                                </div>
                                              
											
											</div>
											<div class="form-group m-form__group has-danger row">
											<table class="table table-bordered" width:"100%">
                <thead>
                    <tr style="text-align: center;">
                       
                        <th width="15%">Destination</th>
                        <th width="60%">Locations</th>
                        <th width="10%">Action</th>
                        <th width="15%">Distance</th>
                       
                     
                    </tr>
                </thead>
                <tbody>
                 
                   
                        <tr>
                              
                            <td style="text-align: center;">
                              
                                    <select class="form-control m-bootstrap-select m_selectpicker"  id="sl_" name="sl_" data-live-search="true">
                                            
                                        <Option value="0" selected>Select locations</Option>
                                            
                                         @foreach ($location_gp as $key =>$locations)
                                            <optgroup label="{{$key}}">
                                                @foreach ($locations as $location)
                                                    <option value="{{$location->id}}">{{$location->location_name}} - {{$location->location_code}}</option>
                                                @endforeach
                                             </optgroup>
                                         @endforeach
                                       
                                    </select>
                                </td>
                                <td>
                                    <div id="dist_" style="text-align: left;" >
                                        
                                       
                                             
                                           
                                    </div>
                                </td>
                                <td style="text-align: center">
                                        <button type="button" id="btn_rm" class="m-btn btn btn-primary" title="Back">
                                                <i class="la la-arrow-circle-o-left"></i>
                                         </button>
                                        <button type="button" id="btn_rm_all" class="btn btn-danger" title="Back">
                                                <i class="la la-trash-o"></i>
                                         </button>
                                        
                                </td>
                                <td style="text-align: center;">

                                   <label class="form-control-label" id="totlb" >0.00</label>
        
        
                                </td>
                        </tr>
                </tbody>
                 </table>
											</div>
											<div class="form-group m-form__group has-danger row">
                                                    <div class="col-lg-12">
                                                            <label class="form-control-label">
                                                                Description :
                                                            </label>
                                                            <textarea placeholder="Description" id="desc" name="desc" class="form-control" required></textarea> 
                                                                
                                                                <span class="form-group text-danger">
                                                                            * Required
                                                                </span>	
                                                            
                                                            
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
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
<script>
		$(document).ready( function(){

              var sid=1;
              var id=1;
              
              var count_sp=0;
			  var totalKm=0;
			  let dirDiv = $('#dist_');
              var lc_id_last=0;
              var lc_count=1;


                $('#btn_rm_all').click(function(event){
									lc_count=1;
									$("#dist_ span").each(function(index) {
							
										$('#i'+lc_count).remove();
										$('#sp1_'+lc_count).remove();
										$('#hdLC_id'+lc_count).remove();
										$('#totlb').html(parseFloat(0.00).toFixed(2));
										
										lc_count++;	
								});
						 sid=1;
            			 id=1;
            			
            			 count_sp=0;
						 totalKm=0;
					 	lc_id_last=0;
            			 lc_count=1;

				});





                $('#sl_').change(function(event){

	        	var locationId = $('#sl_').val();
                  
                $("#dist_ span").each(function(index) {
                
                    count_sp++;

                });

							if(count_sp!= 0){	
								totalKm=0;

								for(j=1; j < count_sp+1; j++){                      
									
									totalKm += parseFloat($('#hdLC_id1_'+j).val());
								}
								
					  		 }
							   
                             if(count_sp!=0){
								
                                     lc_id_last = $('#hdLC_id1_'+count_sp).attr('name');
								  }
									 

								
									 
				    	$.ajaxSetup({
					        headers: {
						    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						}
					});
                 $.getJSON({
                  
						url: '{{Route('location_checkdistance')}}',
						method: "POST",
                        data: {lc_id_last:lc_id_last,lc_id_next:locationId},
					
						success: function(data) {
								
						   if(lc_id_last==0){
							dirDiv.append($('<span id="sp1_'+sid+'" class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"></span>')
											.attr('title',data.location_code).html('<input id="hdLC_id1_'+sid+'" value="0" type="hidden" name="'+data.id+'">'+data.location_code));
											dirDiv.append($('<i id="i1_'+sid+'" name="'+data.location_code+'">&nbsp</i>'));
                                             sid++;
											 //console.log(data.distance);

						  						 }
						  							 else{
							  						 if(lc_id_last!=data.id){
							
														var GrtotalKm = totalKm + data.distance;

													dirDiv.append($('<span id="sp1_'+sid+'" class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"></span>')
														.attr('title',data.location_code).html('<input id="hdLC_id1_'+sid+'" value="'+data.distance+'" type="hidden" name="'+data.id+'">'+data.location_code));
														dirDiv.append($('<i id="i1_'+sid+'" name="'+data.location_code+'">&nbsp</i>'));
														sid++;
														$('#totlb').html(parseFloat(GrtotalKm).toFixed(2));
														console.log(GrtotalKm);			
						
							   										}

						  				 }

                                 }				
							})                               
					
                  		count_sp=0;	
					
	            });
                    
                      
                            $('#btn_rm').click(function(event){
                    
									
							if(count_sp!= 0){	
								totalKm=0;

								for(j=1; j < count_sp+1; j++){                      
									
									totalKm += parseFloat($('#hdLC_id1_'+j).val());
								}
								
					  			 }
							 		 			 if(sid!=0){
                                               sid--;
											  
											   	$('#i'+sid).remove();
												$('#sp1_'+sid).remove();
												$('#hdLC_id'+sid).remove();
												$('#totlb').html(parseFloat(totalKm).toFixed(2));
												
											
                                       			  	}
                                     			 else if(sid<=1){
									  
									 				  	$('#totlb').html(parseFloat(0.00).toFixed(2));
														 $('#i'+sid).remove();
														$('#sp1_'+sid).remove();
														$('#hdLC_id'+sid).remove();	 //count_sp=0;
														sid=1;
														id=0;
														count_sp=0; 
														totalKm=0;
														lc_id_last=0;
														}
													});
	
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
					var route = $('#route').val();
					var desc = $('#desc').val();
					var count_spn=1;
					var dist_details = [];
					var start_tag= $('#start_tag').val();
					var route_nme =$('#route_nme').val();
					var cur_url=window.location.href;
					$("#dist_ span").each(function(index) {
				
				
				var lcnm=''; 
				
							
				lcnm = $('#sp1_'+count_spn).attr('title');
				lcId = $('#hdLC_id1_'+count_spn).attr('name');	
				
				
	
				dist_details.push({
					
				
					l_id:lcId,
				
												                                               
				});		
			
				count_spn++;
				
			});	
			//console.log(dist_details);
			//alert(dist_details);
			
					
				
					
					 
					  $.ajax({
						
						url: '{{Route('itineray_store')}}',
						method: "POST",
						data: {route_nme:route_nme,start_tag:start_tag,code:code,route:route,desc:desc,dist_details:JSON.stringify(dist_details)},
						success: function(data) {
								
							console.log(data);
							//if Added 
							if(data=='added'){
								$('.alert').hide();
								swal("Itinerary Add successfully completed!", "success");
								$("#add_ItineraryFrm")[0].reset();
							window.location.replace('{{route('itineray_index')}}');
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
	<script>
	$(".My").select2();
	</script>
@endsection 


	















