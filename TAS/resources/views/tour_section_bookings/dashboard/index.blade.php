 @extends('layouts.tas_app') 
 @section('content')
 <!-- BEGIN: Subheader -->
 @php
    
    $noOfDays = ($t_header_data->Days)+1;
	$frmdate = $t_header_data->frm_date;
	$tourCode = $t_header_data->tour_code;
	$tourID = $t_header_data->tour_id;
	$tourVersion =$t_header_data->version_id;
	$tourStDate = $t_header_data->frm_date;
    $tourEnDate = $t_header_data->to_date;
    $total=0;
@endphp
<style>
        .slmd-header{
               
               background-color: #282a3c;
               text-align: center;
        }
        .mdsp-header{
                padding-top: 5px;
                padding-left: 10px;
                text-align: center;
                color: white;
        }
       .slmd-body{
               /* background-color: #f4f5f6; */
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
        /* color:#fff; */
        /* vertical-align: middle; */
        /* padding: 1.5em; */
    }

      </style>
 <div class="m-subheader ">
     <div class="d-flex align-items-center">
         <div class="mr-auto">
             <h3 class="m-subheader__title m-subheader__title--separator ">
                         Tour Booking 
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
                   
                         <span class="m-nav__link-text">
                     Tour Manager
                                             </span>
                    
                 </li>
                 <li class="m-nav__separator">
                     -
                 </li>
                 <li class="m-nav__item">
                     <a href="" class="m-nav__link">
                         <span class="m-nav__link-text">
                         Tour Bookings 
                                             </span>
                     </a>
                 </li>
                 <li class="m-nav__separator">
                     -
                 </li>
                 <li class="m-nav__item">
                  
                         <span class="m-nav__link-text">
                         Reservation 
                                             </span>
                   
                 </li>
             </ul>
         </div>
         <div>
             <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                 
                 <div class="m-separator m-separator--dashed d-xl-none"></div>
             </div>
         </div>
     </div>
 </div>
 <!-- END: Subheader -->
 <div class="m-content">

@php

    $tour_state = '<span class="m-badge m-badge--info m-badge--wide"><b>NEW</b></span>';

    $guest_state = 'primary';
    $guide_state ='success';
    $trans_state ='warning';
    $accmd_state='warning';
    $misc_state = 'info';

@endphp
 <div class="row">
     <div class="col-xl-12">
                <div class="form-group m-form__group row">
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
                                                                    <h5 class="m-portlet__head-text m--font-info">Tour Code &nbsp;:&nbsp;{{$t_header_data->tour_code}}</h5>
																	</td>
																	<td style="padding-top:10px; padding-left:10px;" width="40%">
																			<h5 class="m-portlet__head-text m--font-success">Tour Title &nbsp;:&nbsp;{{$t_header_data->title}}</h5>	
																	</td>
																	<td rowspan="2" style="text-align: center; padding-top:10px;" width="10%">
																		
																	</td>
																</tr>
																<tr>
																	<td style="text-align:left; padding-left:10px; padding-top:7px; padding-right:10px;" colspan="2">
																		{{-- <span class="text-muted">Created By : Hashan</span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <span class="text-muted">Created By : Hashan</span> --}}
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
											
											<a href="{{route('booking_guest_allocate_index_load',$t_header_data->tour_id)}}" style="width: 20rem; height: 12.5rem; background-color:white;" class="card btn btn-{{$guest_state}} m-btn m-btn--icon">
													<div class="card-body text-center">
                                                        <h5 class="card-title text-center text-{{$guest_state}}">GUEST ALLOCATION</h5>
                                                         <i class="la la-users text-{{$guest_state}}" style="font-size:48px;"></i>
														<hr>
                                                        <h2 class="card-subtitle mb-2 text-muted text-{{$guest_state}}">{{$noofguestadded}}</h2>													 
													</div>									
											</a>
									</td>
									
									<td style="padding:6px;">
											
											<a href="{{route('guide_view_load',$t_header_data->tour_id)}}" style="width: 20rem; height: 12.5rem; background-color:white;" class="card btn btn-{{$guide_state}} m-btn m-btn--icon">
													<div class="card-body text-center">
                                                    <h5 class="card-title text-center text-{{$guide_state}}">GUIDES</h5>
                                                    <i class="la la-user-secret text-{{$guide_state}}" style="font-size:48px;"></i>
														<hr>
                                                    <h2 class="card-subtitle mb-2 text-muted text-{{$guide_state}}">{{$noofGuides}}</h2>
													 
													</div>									
											</a>
									</td>
                                    
                                    <td style="padding:6px;">
											
											<a href="{{route('transport_view_load',$t_header_data->tour_id)}}" style="width: 20rem; height: 12.5rem; background-color:white;" class="card btn btn-{{$trans_state}} m-btn m-btn--icon">
													<div class="card-body text-center">
														<h5 class="card-title text-center text-{{$trans_state}}">TRANSPORT</h5>
                                                    <i class="la la-taxi text-{{$trans_state}}" style="font-size:48px;"></i>
														<hr>
                                                    <h2 class="card-subtitle mb-2 text-muted text-{{$trans_state}}">{{$noofVehicles}}</h2>
													 
													</div>									
											</a>
                                    </td>
                                    
									<td style="padding:6px;">											
											<a href="" style="width: 10rem; height: 12.5rem; background-color:white;" class="card btn btn-success m-btn m-btn--icon">
													<div style="padding:0px; padding-top:5px;" class="card-body text-center">
														<h5 class="card-title text-success">AMENDMENT</h5>
														<i class="m-menu__link-icon flaticon-file text-success text-center" style="font-size:48px;"></i>
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
																	<a href="" style="width: 20rem; height: 6rem; background-color:white;" class="card btn btn-success m-btn m-btn--icon">
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
																	<button type="button" style="width: 9.5rem; height: 6rem; background-color:white; padding:0px;" class="card btn btn-primary m-btn m-btn--icon" data-toggle="modal" data-target="#m_modal_route">
																			<div style="padding:5px;" class="card-body text-center">
																				 																							
																								<i class="m-menu__link-icon flaticon-route text-center text-primary" style="font-size:55px;"></i>																	
																			</div>
																					
																											
																	</button>
															</td>
															<td>
																	<a style="width: 9.5rem; height: 6rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
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
															<a href="{{route('load_dashboard_accmd',$t_header_data->tour_id)}}" style="width: 31rem; height: 13rem; background-color:white;" class="card btn btn-{{$accmd_state}} m-btn m-btn--icon">
                                                            
                                                            <div class="card-body text-left">
                                                                <h5 class="card-title text-left text-{{$accmd_state}}">ACCOMMODATION</h5>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="la la-hotel text-{{$accmd_state}}" style="font-size:48px;"></i>
																	<hr>
                                                                <h4 class="card-subtitle mb-2 text-muted text-{{$accmd_state}}">{{$noofHotels}}</h4>																	
                                                                
                                                            </div>
														</a>
														</td>
														<td style="padding:6px;">
															<a href="{{route('misc_view_load',$t_header_data->tour_id)}}" style="width: 21rem; height: 13rem; background-color:white;" class="card btn btn-{{$misc_state}} m-btn m-btn--icon">
																<div class="card-body text-center">
                                                                <h5 class="card-title text-{{$misc_state}}" style="font-size:15px;">MISCELLANEOUS/TOUR ADVANCED</h5>
                                                                <i class="la la-paperclip text-{{$misc_state}}" style="font-size:48px;"></i>
																	<hr>
                                                                    <h6 class="card-subtitle mb-2 text-muted text-{{$misc_state}}">Manage</h6>
																	
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
                                                        <a href="{{route('agent_invoice_genarate',$t_header_data->tour_id)}}" style="width: 16.85rem; height: 6rem; background-color:white;" class="card btn btn-warning m-btn m-btn--icon">
																		<div style="padding-top:0px;" class="card-body text-center">
																			<div style="padding-top:9px;" class="row">
																				<div class="col-sm-6">
																						<h5 class="card-title text-left text-warning">INVOICE</h5>																	
																				</div>

																				<div class="col-sm-6">
																						<i class="la la-file-picture-o text-warning text-right" style="font-size:45px;"></i>
																				</div>


																																					
																			</div>
																			
																		</div>									
																</a>
                                                        </td>
                                                        <td style="padding:6px;">
																<a disable style="width: 16.85rem; height: 6rem; background-color:white;" class="card btn btn-info m-btn m-btn--icon">
																		<div style="padding-top:0px;" class="card-body text-center">
																			<div style="padding-top:9px;" class="row">
																				<div class="col-sm-6">
																						<h5 class="card-title text-left text-info">FINALIZE</h5>																	
																				</div>
																				<div class="col-sm-6">
																						<i class="la la-check-circle text-info text-right" style="font-size:45px;"></i>
																				</div>

																																					
																			</div>
																			
																		</div>									
																</a>
														</td>
														<td style="padding:6px;">
																<a href="" style="width: 28rem; height: 6rem; background-color:white;" class="card btn btn-secondary m-btn m-btn--icon">
																		<div style="padding:5px 0px 0px ; margin:0px;" class="card-body text-center">
																			
																						<h5 style="margin:0px;" class="card-title text-left text-success">OPRTATION CHECKLIST</h5>
																			
																					    <i class="la la-users text-success text-right" style="font-size:35px;"></i>
																						<i class="la la-car text-success text-right" style="font-size:35px;"></i>
																						<i class="la la-hotel text-success text-right" style="font-size:35px;"></i>
																						<i class="la la-file-text-o text-success text-right" style="font-size:35px;"></i>
																			
																																																							
																			
																			
																		</div>									
																</a>
														</td>
														<td style="padding:6px;">
																<a  style="width: 10rem; height: 6rem; background-color:white; padding:0px;" class="card btn btn-metal m-btn m-btn--icon">
																		<div style="padding:0px;" class="card-body text-center">
																		
																						<h6 style="padding-left:12px; padding-top:9px; margin:0px; color:#999999;" class="card-title text-left">Comment List</h6>																	
																				
																						<i class="la la-comment-o text-right" style="font-size:55px; color:#999999;"></i>
																																					
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
                                                                                        {{$t_header_data->remarks}}
                                                                                       
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
                        
     </div> 
        
</div>
<div class="modal" id="m_modal_route" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="slmd-main modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header slmd-header">                            
                            <span class="mdsp-header">
                                <h6 class="mdsp-header" id="md_header_2"></h6>
                            </span>
                                                        
                            <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                            <i class="fa fa-close"></i>
                            </a>
                    </div>
                    <div class="modal-body slmd-body">
                        <div>
                                <table class="table table-bordered" width:="100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th width="5%">Day</th>
                                                <th width="8%">Date</th>
                                                {{-- <th width="15%">Destination</th> --}}
                                                <th >Locations</th>
                                                {{-- <th width="8%">Action</th> --}}
                                                <th width="8%">Total(Km)</th>
                                                {{-- <th width="8%">Edit Mileage</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                        
                                            @for ($i = 1; $i <= $noOfDays; $i++)
                                                
                                                <tr>
                                                   
                                                   @php
                                                    
                                                        $date = date('Y-m-d', strtotime($frmdate. ' + '.($i-1).' days'));
                                                        $ttlRowkms = 0;
                                                        $ttkm = 0;
                        
                                                    @endphp
                        
                        
                                                    
                                                    
                                                    <td style="text-align: center;">{{$i}} </td>
                                                    <td style="text-align: center;">{{$date}}</td>
                                                                                                          
                                                        <td>
                                                            <div id="dist_{{$i}}" style="text-align: left;" >
                                                                
                                                                @foreach ($LocationDtList_gp as $day => $LcDist)
                                                               
                                                                        @if($day == $i)
                                                                                    
                                                                                    @foreach ($LcDist as $Dist)                                               
                        
                                                                                        <span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"  id="sp{{$Dist->pos}}_{{$day}}" title="{{$Dist->lc_name}}">
                                                                                        <input id="hdLC_id{{$Dist->pos}}_{{$day}}" value="{{$Dist->kms}}" type="hidden" name="{{$Dist->location_id}}">
                                                                                       @php
                                                                                           $total+=$Dist->kms;
                                                                                           
                                                                                       @endphp
                                                                                        {{$Dist->lc_code}}                                                       
                                                                                        </span>
                                                                                            <i id="i{{$Dist->pos}}_{{$i}}" name="{{$Dist->lc_code}}"></i> 
                                                                                            
                                                                                            @php
                                                                                                $ttlRowkms = $ttlRowkms + ($Dist->kms);
                                                                                                $ttkm = $Dist->ttkms;
                                                                                            @endphp
                        
                        
                                                                                            
                                                                                    @endforeach
                                                                            
                                                                        @endif
                                                                @endforeach
                        
                                                            </div>
                                                        </td>
                                                    
                                                    <td style="text-align: center;">
                        
                                                        
                                                        <label class="form-control-label" id="totlb_{{$i}}" >{{$ttlRowkms}}</label>
                        
                        
                                                    </td>
                                                  
                                                </tr>
                                                
                        
                                            @endfor
                        
                                            <tr style="text-align: center;">                       
                                                <td style="text-align: right; padding: 8px 0px 0px 0px" colspan="3"><label><b>Total Milage&nbsp;:&nbsp;&nbsp;</b></label></td>
                                            <td style="text-align: center; padding: 8px 0px 0px 0px"><label><b id="totlb">{{$total}}</b></label></td>
                                                {{-- <td style="text-align: center; padding: 8px 0px 0px 0px" ><label><b id="tottb">0.00</b></label></td> --}}
                                            </tr>
                                            
                                        </tbody>
                                        
                                </table>      
                        
                        </div>                                     
                        
                    </div>
            </div>
        </div>
</div>

 </div>
 
@endsection @section('Page_Scripts') @parent
 
@endsection