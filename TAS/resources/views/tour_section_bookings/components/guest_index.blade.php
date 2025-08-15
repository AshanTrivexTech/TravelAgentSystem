@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
@php
    $tour_code=$touer_qt_header->tour_code;
    $tour_id=$touer_qt_header->tour_id;
    $tour_title=$touer_qt_header->titl;
@endphp
<div class="m-subheader ">  
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
					Tour Guest
				</h3>
          
        </div>
        
        <a href="{{route('guest_view_load',$tour_id)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-right:10px;" >
                    <span>
													<i class="la la-plus" ></i>
													<span >
														Add
													</span>
                    </span>
        </a>
                
                <div class="m-separator m-separator--dashed d-xl-none"></div>
                
        <a href="{{route('load_dashboard',$tour_id)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" >
                    <span>
													<i class="la la-angle-left" ></i>
													<span > 
														Back
													</span>
                    </span>
        </a>

    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                       Tour Code &nbsp; : &nbsp; {{$tour_code}}
                    
										</h3>
                </div>
                
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                       
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
            <table class="table table-bordered table-hover table-checkable">
                <thead>
                    <tr style="text-align: center">
                        <th>ID</th>
                        
                        <th>Guest Name</th>
                        <th>DOB</th>
                        <th>Filght No</th>
                        <th>Passport No</th>
                        <th>Arrival Date</th>
                        <th>Depature Date</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tb_sr">
                    @foreach($guest_allocate_data as $guest_dt)
                        <tr> 
                            
                            <td style="text-align: center">{{$guest_dt->id}} </td>
                            
                            <td style="text-align: left">{{$guest_dt->guest_name}} </td>
                            <td style="text-align: center">{{$guest_dt->dob}} </td>
                            <td style="text-align: center">{{$guest_dt->flight_no}} </td>
                            <td style="text-align: center">{{$guest_dt->passport_no}} </td>
                            <td style="text-align: center">{{$guest_dt->arrival_date}} </td>
                            <td style="text-align: center">{{$guest_dt->depature_date}} </td>
                            <td style="text-align: center">{{$guest_dt->remarks}} </td>
                            <td style="text-align: center">                                  
                                   
                                   <a id="{{$guest_dt->id}}" onclick="deleteAccept({{$guest_dt->id}})"
                                                 class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                                 title="Edit View">
                                                  <i class="la la-trash"></i>
             
                                              </a>
                                        
             
                                     </td>
                        </tr>
                      


                    @endforeach
                    
                </tbody>
            </table>
        </div>
            <!--end: Datatable -->
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent
@include('tour_section_bookings.js.guest_allocation_js')
@endsection