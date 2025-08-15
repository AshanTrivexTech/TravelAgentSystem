@extends('layouts.tas_app') 
@section('content')

@php
       
      $no_of_vehicles=0; 
                                         
    $noOfDays = ($toutQoutHeader->Days)+1;
	$frmdate = $toutQoutHeader->frm_date;
	$tourCode = $toutQoutHeader->tour_code;
    $tour_ID = $toutQoutHeader->tour_id;
    $trans_ID = $tourQuoteTransport->id;
	// $tourVersion =$tourQuotHeader->version_id;
	// $tourStDate = $tourQuotHeader->frm_date;
    // $tourEnDate = $tourQuotHeader->to_date;
    $total=0;
 
@endphp


@php
$row_count=0;
$voucher_no_vc=0;
$Remarks_vc='';
$comments_vc='';
$conf_to_vc=Auth::user()->name;
$conf_by_vc ='';
$conf_date_vc='';
$rep_to_vc='';
$av_fl_no='';
$dp_fl_no='';
$av_time='';
$dp_time='';
$status_vc='';   
$t_pax=0;
@endphp
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        Tour Accommodation
            </h3>
            
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

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                
                <div class="m-portlet__head-title">
                     
                    <h3 class="m-portlet__head-text">
                           
                              
                            Tour Code : {{$tourCode}}
                                   
                            
                            
                       </h3>
                </div>
              
            </div>
            <div class="m-portlet__head-tools">
                    <a href="{{route('tourtransport_load')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-angle-left"></i>
                                <span>
                                    Back
                                </span>
                            </span>
                        </a>
            </div>
        </div>
        {{-- {{$tbpos}} --}}

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong><div id="notify"></div>
                <button type="button" class="close" id="notify_close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <div class="m-portlet__body">           
            <div class="form-group m-form__group row">
                <div class="col-sm-12">
                        <ul class="nav nav-tabs" role="tablist">
                           
                                <li class="nav-item">
                                    <a     class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1"  >Tour Transport Details</a>
                                </li>											
                                <li class="nav-item">
                                    <a     class="nav-link "  data-toggle="tab" href="#m_tabs_1_2" >Voucher</a>
                                </li>
                                <li class="nav-item">
                                    <a      class="nav-link"    data-toggle="tab" href="#m_tabs_1_3">Status</a>
                                </li>
                              
                            </ul>
                            <div class="tab-content">

                        <div   class="tab-pane active show"   id="m_tabs_1_1" role="tabpanel">
                            <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
                                   
                                    <table class="table table-sm" width="100%">
                                            <thead>
                                                <tr class="table-secondary">    
                                                    
                                                <th style="text-align: center;" colspan="12" >Transport Details</th>
                                                        
                                                </tr>                                        
                                            </thead>
                                            @php
                                                $count=0;
                                                $tr_dt=0;
                                            @endphp

                                            @foreach ($vehicle_details as $vehicle_detail)
                                  
                                            @php
                                            $tr_dt=0;
                                                $count++;

                                                // foreach ($tour_trns_reservs as $tour_trns_reserv) {

                                                //     if($tour_trns_reserv->vehicle_type_id == $vehicle_detail->id)
                                                //     {
                                                //         $tr_dt++;
                                                //     }
                                                   
                                                // }

                                                foreach($tour_trns_reservs as $trn)
                                                {
                                                    if($vehicle_detail->id == $trn->id)
                                                    {
                                                        $tr_dt++;
                                                    }
                                                }
                                            @endphp

                                           {{-- {{$tr_dt}} --}}
                                                    {{-- {{$vehicle_details}} --}}
                                           
                                            <tbody>
                                               
                                            </tbody>
                                           </table>
                                           <table  class="table table-bordered table-sm" width="100%">
                                                <thead>
                                                <tr class="table-success" style="text-align:left;">
                                                <th width="100%" colspan="12"><b>Requested Vehicle Type:&nbsp;&nbsp;{{$vehicle_detail->type}}</b></th>
                                                                                                                                       
                                                </tr>
                                                {{-- {{$tour_trns_reservs}} --}}
                                            <input type="hidden" id="trns_id_{{$count}}" value="{{$vehicle_detail->id}}">
                                            {{-- <input type="hidden" id="quot_trns_id_{{$count}}" value="{{$vehicle_detail->tour_quot_trns_id}}"> --}}
                                                </thead>
                                                <tbody>
                                                <tr class="table-info" style="text-align:center">
                                                      <th colspan="4">Vehicle Type</th>                                                            
                                                      <th colspan="4">Vehicle Supplier</th>
                                                      <th colspan="4">Vehicle</th>
                                                 </tr>
                                                 <tr id=""   style="text-align: center;">
                                                        <td colspan="4">
                                                        <select required id="vehicle_type_{{$count}}" id="vehicle_type" class="form-control">  
                                                                        <option value="0">Please select Vehicle Type...</option>
                                                                      @foreach($vehicle_types as $vehicle_type)     
                                                                       <option value="{{$vehicle_type->id}}">{{$vehicle_type->type}}</option>
                                                                       @endforeach                                
                                                                    </select>
                                                        </td>
                                                        <td colspan="4">
                                                                <select required id="vehicle_sup_{{$count}}"  class="form-control">  
                                                                        <option value="0">Please select Supplier...</option>
                                                                       @foreach($supplier_details as $supplier_detail)   
                                                                <option value="{{$supplier_detail->id}}">{{$supplier_detail->sup_name}}</option>
                                                                        @endforeach                               
                                                                    </select>
                                                        </td>
                                                        <td colspan="4">
                                                        <select required id="vehicle_{{$count}}"  class="form-control">  
                                                                        <option value="0">Please select Vehicle...</option>
                                                                    @foreach($vehicls as $vehicl)
                                                                      
                                                        <option value="{{$vehicl->id}}">{{$vehicl->title}}</option>
                                                                     @endforeach                                   
                                                                    </select>
                                                                </td>
                                                    </tr>
                                                 <tr class="table-info" style="text-align:center">
                                                         
                                                      <th colspan="4">Driver Name</th>                                                            
                                                      <th colspan="4">From Date</th>
                                                      <th colspan="4">To Date</th>
                                                  </tr>
                                                  
                                                  <tbody id="sel_td">
                                                 
                                                <tr style="text-align: center;">      
                                                <td colspan="4" >
                                                <select required  id="driver_{{$count}}" class="form-control">  
                                                                <option value="0">Please select Driver...</option>
                                                                   @foreach($tour_drivers as $driver)
                                                            <option value="{{$driver->id}}">{{$driver->driver_name}}</option>
                                                                   @endforeach                            
                                                            </select>
                                                </td>
                                                <td colspan="4" style="text-align: center;"><input id="m_datetimepicker_frm_date_" type="text" value="{{$vehicle_detail->frm_date}}" disabled class="form-control dtpic-format form-control-sm"></td>
                                                <td colspan="4" style="text-align: center;"><input id="m_datetimepicker_to_date_" type="text" value="{{$vehicle_detail->to_date}}" disabled class="form-control dtpic-format form-control-sm"></td>
                                                      
                                                  </tr>
                                                 
                                                  <tbody/>
                                                  </tbody>
                                                  </table>
                                                  <table class="table table-bordered table-sm" width="100%">
                                                        
                                                        <tbody id="comsup_mlist_">                                                                               
                                                        <tr style="text-align: center;" class="table-secondary">
                                                                                    
                                                        <th colspan="6">
                                                                                                                                                                                        
                                                        </th>
                                                    
                                                                                                                                                                    
                                                        <th style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="4">
                                                        <button id="btn_add_{{$count}}" @if($tr_dt ==1) disabled @endif  type="button" class="btn btn-success m-btn m-btn--icon"onclick="save_tour_trns_vehicls({{$count}})" >
                                                        <span>
                                                        <i class="la la-calendar-check-o"></i>
                                                        <span>Add to Reserve</span>
                                                        </span>
                                                        </button>
                                        
                                                        <button type="button" class="btn btn-danger m-btn m-btn--icon">
                                                        <span>
                                                        <i class="la la-times-circle"></i>
                                                        <span>Cancel</span>
                                                        </span>
                                                        </button>
                                                        </th>
                                                
                                                        </tr>       
                                                                                               
                                                                                               
                                                        </tbody>
                                                        </table>
                                                        @endforeach
                                        
                               
                              

                            </div>
                            
                        </div>
                        <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                       
                                <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
                                  <table class="table table-sm table-bordered" width="100%">
                                      
                                      <thead>
                                                                                        
                                      </thead>                                            
                                      <tbody>
                                           
                                          
                                        <tr style="text-align: center;">
                                            <th class="bg-secondary" colspan="13">TR Vouchers</th>
                                        </tr>
                                        
                                          @php
                                             $no_of_vehicles=0; 
                                          @endphp 
                                        @foreach ($tourtransportvouchers as $V_id=> $tourtransportvoucher)
                                        {{-- {{$V_id}} --}}
                                             @php
                                                $no_of_vehicles++; 
                                                $has_dt=0;

                                            //   $t_pax=$toutQoutHeader->pax_adult + $toutQoutHeader->pax_child;
                                            
                                            $voucher_no_vc=0;
                                        $row_count=0;
                                        $comments_vc='';
                                        $Remarks_vc='';
                                        $conf_by_vc ='';
                                        $conf_to_vc=Auth::user()->name;
                                        $rep_to_vc='';
                                        $conf_date_vc='';
                                        $dp_fl_no='';
                                        $av_time='';
                                        $dp_time='';
                                        $status_vc='';   
                                        $t_pax=0;
                                        $av_fl_no='';
                                        
                                        $t_pax=$toutQoutHeader->pax_adult + $toutQoutHeader->pax_child;

                                              @endphp           
                                                 {{-- @php
                                                   $trans_ID =$tourtransportvoucher->t_trns_id;  
                                                 @endphp   --}}
                                              <tr>                                                        
                                                  <th class="table-success" colspan="13"><b>Vehicle Type&nbsp;&nbsp;:&nbsp;&nbsp;{{$tourtransportvoucher[0]->type}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total PAX&nbsp;&nbsp;:&nbsp;&nbsp;{{$toutQoutHeader->pax_adult + $toutQoutHeader->pax_child}}</b></th>
                                                  <input id="trans_voucher_{{$no_of_vehicles}}" type="hidden" value="{{$tourtransportvoucher[0]->v_id}}">
                                              </tr>
                                              
                                              
                                              <tr class="table-info" style="text-align: center;">
                                                    <th width="5%">No</th>
                                                    <th width="10%">From</th>
                                                    <th width="10%">To</th>
                                                    <th width="20%">Vehicle Supplier</th>                                           
                                                    <th width="15%">Vehicle</th>
                                                    <th width="10%">Vehicle No</th>
                                                    <th width="20%">Driver</th>                                                        
                                                    <th width="10%">Status</th>
                                              </tr>
                                              
                        
                                                  
                                              <div id="vehicle_alcte_voucher_{{$no_of_vehicles}}">
                                                @foreach($tourtransportvoucher as $trans_voucher)
                                              <input id="trns_reserve_{{$no_of_vehicles}}" type="hidden" value="{{$trans_voucher->trns_reserve_id}}">
                                              {{-- {{$trans_voucher->status}} --}}
                                              <input type="hidden" id="t_pax_{{$no_of_vehicles}}" value="{{$t_pax}}">
                                                  @php
                                                    $state ='';
                                                    $state_name ='';
                                                    $status_v='';

                                                 
                                                    
                                                    foreach($hasVoucher_list as $voucherHeader){

                                                         if($tourtransportvoucher[0]->v_id == $voucherHeader->vehicle_type_id){

                                                               
                                                                $voucher_no_vc=$voucherHeader->trns_voucher_no; 
                                                                $Remarks_vc=$voucherHeader->remarks;
                                                                $comments_vc=$voucherHeader->comments;
                                                                $conf_by_vc=$voucherHeader->confirm_by; 
                                                                $conf_date_vc=$voucherHeader->confirm_date; 
                                                                $rep_to_vc=$voucherHeader->report_to; 
                                                                $av_fl_no=$voucherHeader->arrival_flight_no; 
                                                                $dp_fl_no=$voucherHeader->depature_flight_no;
                                                                $av_time=$voucherHeader->arrival_time; 
                                                                $dp_time=$voucherHeader->depature_time;
                                                                $conf_to_vc =$voucherHeader->user_name; 
                                                                $status_v=$voucherHeader->status; 
                                                                $has_dt++;
                                                            }
                                                         
                                                    }



                                                       if($status_v == 1 || $status_v == '' ){
                                                       $state ='brand';
                                                       $state_name = 'New';
                                                    }elseif($status_v == 2){
                                                        $state ='metal';
                                                        $state_name = 'Pending';
                                                                    
                                                    }elseif($status_v == 3){
                                                        $state ='success';
                                                        $state_name = 'Confirmed';
                                                                    
                                                    }elseif($status_v == 4){
                                                         $state ='danger';
                                                         $state_name = 'Canceled';
                                                                    
                                                    }



                                                  @endphp
                                                        
                                                        @php
                                                          $row_count++;   
                                                        @endphp

                                                <input type="hidden" id="v_no_{{$no_of_vehicles}}" value="{{$voucher_no_vc}}">
                                                  <tr style="text-align: center;">
                                                    {{-- <input id="vehicle_allocate_id_{{$row_count}},{{$no_of_vehicles}}" type="hidden" value="{{$trans_voucher->v_id}}">                                                         --}}
                                                      <td>{{$row_count}}</td>
                                                      <td>{{$trans_voucher->frm_date}}</td>                                                            
                                                      <td>{{$trans_voucher->to_date}}</td>
                                                      <td>{{$trans_voucher->sup_s_name}}</td>
                                                      <td>{{$trans_voucher->title}}</td>
                                                      <td>{{$trans_voucher->licence_no}}</td> 
                                                      <td>{{$trans_voucher->driver_name}}</td>
                                                      <td>
                                                          
                                                     <span class="m-badge m-badge--{{$state}} m-badge--wide">{{$state_name}}</span>
                                                    
                                                    
                                                    </td>
                                                  </tr>
                                                 @endforeach
                                              
                                          </div>
                                              <tr>
                                                    {{-- <input id="vehicle_count_{{$no_of_vehicles}}" type="hidden" value="{{$row_count}}"> --}}
                                                      <td width="100%" colspan="12">
                                                              <div class="form-group m-form__group">
                                                                      <label for="exampleTextarea"><strong>Comments:</strong></label>
                                                              <textarea  class="form-control m-input" id="comments_{{$no_of_vehicles}}" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">{{$comments_vc}}</textarea>
                                                              </div>
                                                      </td>
                                                      
                                              </tr>
                                              <tr>
                                                      <td colspan="12">
                                                              <div class="form-group m-form__group">
                                                                      <label for="exampleTextarea"><strong>Remarks:</strong></label>
                                                                      <textarea class="form-control m-input" id="remarks_{{$no_of_vehicles}}" style="margin-top: 0px; margin-bottom: 0px; height: 50px;">{{$Remarks_vc}}</textarea>
                                                              </div>
                                                      </td>
                                              </tr>
                                             
                                              <tr>
                                                 
                                    <td style="vertical-align: top; text-align: left;" colspan="10">
                                        <table class="table table-sm table-bordered" width="100%">
                                            <thead>
                                            <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                    <th width="20%">CONFIRMED TO :</th>
                                             <td><input disabled id="conf_to_{{$no_of_vehicles}}" type="text" value="{{$conf_to_vc}}" class="form-control form-control-sm"></td>
                                                    <th width="20%">CONFIRMED BY :</th>
                                            <td><input id="conf_by_{{$no_of_vehicles}}" type="text" class="form-control form-control-sm" value="{{$conf_by_vc}}"></td>
                                            </tr>
                                            <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                    <th width="20%">CONFIRMED DATE :</th>
                                                     <td><input id="m_datetimepicker_conf_date_{{$no_of_vehicles}}" type="text" value="{{$conf_date_vc}}" class="form-control dtpic-format form-control-sm">
                                                      
                                                    </td>
                                                     <th width="20%">REPORT TO :</th>
                                                     <td><input id="report_to_{{$no_of_vehicles}}" type="text" value="{{$rep_to_vc}}" class="form-control  form-control-sm"></td>
                                            </tr>
                                            <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                 <th width="20%">ARRIVAL FLIGHT NO:</th>
                                                <td><input id="arvl_fno_{{$no_of_vehicles}}" type="text" value="{{$av_fl_no}}" class="form-control"></td>
                                                <th width="20%">ARRIVAL TIME :</th>
                                                <td><input id="m_datetimepicker_arvl_time_{{$no_of_vehicles}}" type="text" value="{{$av_time}}" class="form-control dtpic-format form-control-sm"></td>
                                        </tr>
                                        <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                <th width="20%">DEPATURE FLIGHT NO:</th>
                                                <td><input id="dept_fno_{{$no_of_vehicles}}" type="text" value="{{$dp_fl_no}}" class="form-control"></td>
                                                <th width="20%">DEPATURE TIME :</th>
                                                <td><input id="m_datetimepicker_dept_time_{{$no_of_vehicles}}" type="text" value="{{$dp_time}}" class="form-control dtpic-format form-control-sm"></td>
                                        </tr>
                                                              
                                            </thead> 
                                            </table>
                                    </td>
                                                  
                                                      
                                              </tr>
                                              <tr class="bg-secondary">
                                                  
                                                  <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                                          
                                                        <button @if($has_dt ==1) disabled @endif  onclick="genarate_transvoucher('{{$trans_voucher->v_id}}','{{$no_of_vehicles}}')" type="button" class="btn btn-primary m-btn m-btn--icon">
                                                                          <span>
                                                                              <i class="la la-level-up"></i>
                                                                              <span>Submit</span>
                                                                          </span>
                                                         </button>
                                                                  
                                                                <a href="{{route('generate_voucher',$voucher_no_vc)}}"   type="button" class="btn btn-warning m-btn m-btn--icon">
                                                                          <span>
                                                                              <i class="la la-print"></i>
                                                                              <span>Print Voucher</span>
                                                                          </span>
                                                                  </a>
                                                                  
                                                                  <button   type="button" class="btn btn-info m-btn m-btn--icon">
                                                                          <span>
                                                                              <i class="la la-floppy-o"></i>
                                                                              <span>Save as PDF</span>
                                                                          </span>
                                                                  </button>
                                                                  <button    type="button" class="btn btn-success m-btn m-btn--icon">
                                                                          <span>
                                                                              <i class="la la-calendar-check-o"></i>
                                                                              <span>Confirm</span>
                                                                          </span>
                                                                  </button>
                                                                  <button    type="button" class="btn btn-danger m-btn m-btn--icon">
                                                                          <span>
                                                                              <i class="la la-times-circle"></i>
                                                                              <span>Cancel</span>
                                                                          </span>
                                                                  </button>
                                                          
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td colspan="13"></td>
                                              </tr>
                                              @endforeach  
                                              
                                      </tbody>
                                      
                                  </table>
                                  
                              </div>
                              </div>

                              
                        </div>  
                    </div>
                        
                </div>
        </div>
    </div>

</div>

@endsection
@section('Page_Scripts') @parent
@include('tour_transport.js.vehicle_type_list_js')
@endsection