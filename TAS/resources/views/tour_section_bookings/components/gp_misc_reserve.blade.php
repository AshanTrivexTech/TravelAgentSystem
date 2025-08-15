@extends('layouts.tas_app') 
@section('content')
@php
    
    // $noOfDays = ($tourQuotHeader->Days)+1;
	// $frmdate = $tourQuotHeader->frm_date;
	// $tourCode = $tourQuotHeader->tour_code;
	// $tourID = $tourQuotHeader->tour_id;
	// $tourVersion =$tourQuotHeader->version_id;
	// $tourStDate = $tourQuotHeader->frm_date;
    // $tourEnDate = $tourQuotHeader->to_date;
    // $tourQuotHeaderId = $tourQuotHeader->id;
    // $total=0;

          
@endphp
 
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        Tour Group Miscellaneous
            </h3>
            
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
</div>

<div class="m-content">

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong><div id="notify"></div>
                <button type="button" class="close" id="notify_close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">                
                <div class="m-portlet__head-title">                  
                       <h3 class="m-portlet__head-text m--font-info">
                            Tour Code &nbsp;:&nbsp;
                            {{-- {{$tourQuotHeader->tour_code}}  --}}
                            <span style="text-transform: uppercase;"></span> 
                        </h3>
                
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h3 class="m-portlet__head-text m--font-success">
                            Tour Title &nbsp;:&nbsp;
                            {{-- {{$tourQuotHeader->title}} --}}
                        </h3>
                </div>
              
            </div>
            <div class="m-portlet__head-tools">
                    {{-- <a href="{{route('load_dashboard',$tourID)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> --}}
                        <a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-angle-left"></i>
                                <span>
                                    Back
                                </span>
                            </span>
                        </a>
            </div>
        </div>
        
        <div class="m-portlet__body">           
                        
                <div class="form-group m-form__group row">
                  <div class="col-md-12" style="overflow-x:auto;"> 
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th class="table-primary text-center" colspan="10">Miscellaneous Details</th>
                                
                            </tr>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Miscellaneous Description</th>
                                <th>No of Units</th>
                                <th>Currency</th>
                                <th>Rate</th>
                                <th>Ex Rate</th>
                                <th>In base rate</th>
                                <th>Requred Qty</th>
                                <th>Total Amount</th>
                                <th>Markup</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">01</td>
                                <td>Saffary jeep</td>
                                <td class="text-center">6</td>
                                <td class="text-center">LKR</td>
                                <td class="text-right">3500.00</td>
                                <td class="text-right">175.00</td>
                                <td class="text-right">26.25</td>
                                <td class="text-center">
                                    <input id="qd_qty_" placeholder="0.00" id="" style="text-align: center;" type="text"  value="" class="form-control form-control-sm">
                                </td>
                                <td class="text-right">26.25</td>
                                <td class="text-right">5.00</td>

                            </tr>
                            <tr>
                                <td class="text-center">01</td>
                                <td>Saffary jeep</td>
                                <td class="text-center">6</td>
                                <td class="text-center">LKR</td>
                                <td class="text-right">3500.00</td>
                                <td class="text-right">175.00</td>
                                <td class="text-right">26.25</td>
                                <td class="text-center">
                                    <input id="qd_qty_" placeholder="0.00" id="" style="text-align: center;" type="text"  value="" class="form-control form-control-sm">
                                </td>
                                <td class="text-right">26.25</td>
                                <td class="text-right">5.00</td>

                            </tr>
                            <tr>
                                <td class="text-center">01</td>
                                <td>Saffary jeep</td>
                                <td class="text-center">6</td>
                                <td class="text-center">LKR</td>
                                <td class="text-right">3500.00</td>
                                <td class="text-right">175.00</td>
                                <td class="text-right">26.25</td>
                                <td class="text-center">
                                    <input id="qd_qty_" placeholder="0.00" id="" style="text-align: center;" type="text"  value="" class="form-control form-control-sm">
                                </td>
                                <td class="text-right">26.25</td>
                                <td class="text-right">5.00</td>

                            </tr>
                            <tr>
                                <td class="text-center">01</td>
                                <td>Saffary jeep</td>
                                <td class="text-center">6</td>
                                <td class="text-center">LKR</td>
                                <td class="text-right">3500.00</td>
                                <td class="text-right">175.00</td>
                                <td class="text-right">26.25</td>
                                <td class="text-center">
                                    <input id="qd_qty_" placeholder="0.00" id="" style="text-align: center;" type="text"  value="" class="form-control form-control-sm">
                                </td>
                                <td class="text-right">26.25</td>
                                <td class="text-right">5.00</td>

                            </tr>
                            
                        </tbody>
                    </table>
                        
                  </div>
                
                </div>
            
                       
                        
                 
            

            
       
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent

{{-- @include('tour_section_bookings.js.hotels_view_js')
@include('tour_section_bookings.js.rooming_list_js') --}}

@endsection