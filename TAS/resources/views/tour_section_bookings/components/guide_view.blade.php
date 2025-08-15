@extends('layouts.tas_app') 
@section('content')
@php
 $tour_ID=$tourQuotHeader->tour_id;
 $tour_code= $tourQuotHeader->tour_code;
 $no_of_days=($tourQuotHeader->Days)+1;
 $from_date=$tourQuotHeader->frm_date;
 $to_date=$tourQuotHeader->to_date;
 $tq_Gdt_ID= $tourQuotHeader->id;
 $tourID = $tourQuotHeader->tour_id;
 $basecomisionRate = $tourQuotHeader->com_rate; 
 $tourQuotHeaderId = $tourQuotHeader->id;

 $tourStDate = $tourQuotHeader->frm_date;
 $tourEnDate = $tourQuotHeader->to_date;
 $tourVersion =$tourQuotHeader->version_id;
 $tourCode = $tourQuotHeader->tour_code;

 $qtn_type = $tourQuotHeader->qtn_type;
 $noOfDays = ($tourQuotHeader->Days)+1;
 $frmdate = $tourQuotHeader->frm_date;
 $baseCurrncyCode  = $tourQuotHeader->cr_code;

@endphp
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        Guide Allocation
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
                     
                    <h3 class="m-portlet__head-text">
                           
                              
                            Tour Code :{{$tour_code}} 
                                   
                            
                            
                       </h3>
                </div>
              
            </div>
            <div class="m-portlet__head-tools">
                    <a href="{{route('load_dashboard',$tour_ID)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    <div class="col-sm-12">
                            <ul class="nav nav-tabs" role="tablist">
                                    @if($qtn_type==2)
                                    <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Guides Details</a>
                                    </li>
                                    @endif

                                    <li class="nav-item">
                                        <a class="nav-link @if($qtn_type==1) active show @endif" data-toggle="tab" href="#" data-target="#m_tabs_1_2">Guides</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Guide Voucher</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Guide Hotel Voucher</a>
                                    </li> --}}
                                </ul>
                                  <div class="tab-content">

                                    @if($qtn_type==2)
                                        <div class="tab-pane @if($qtn_type==1) active show @endif" id="m_tabs_1_1" role="tabpanel">
                                                @include('tour_section_bookings.components.gp_guide_add_form')
                                        </div>
                                    @endif

                                    <div class="tab-pane active show" id="m_tabs_1_2" role="tabpanel">

                                <form class="cleafix" method="POST" action="">
                                                    <table class="table table-sm" width="100%">
                                                        <thead>
                                                                <tr class="table-secondary">    
                                                                        <th style="text-align: center;" width="5%">Day</th>
                                                                         <th style="text-align: center;">Guide Details</th>
                                                                         
                                                                 </tr>     
                                                        </thead>    
                                                    </table>    
                                                    {{-- <div style="height:700px;">  --}}
                                                        <table class="table table-sm" width="100%">
                                                            <thead>
                                                                                                 
                                                            </thead>
                                                           
                                                            <tbody>
                                                            @for($i = 1; $i <= $no_of_days; $i++)
                                                                    @php                                                        
                                                                       $date = date('Y-m-d', strtotime($from_date. ' + '.($i-1).' days'));                                            
                                                                    @endphp      
                                                                
                                                                <tr>
                                                                    <th class="table-primary" width="5%" style="text-align: center;">
                                                                       {{$i}}
                                                                    </th>
                                <td width="95%">
                                    @php
                                        $dt_cnt=0;
                                    @endphp
                                        @foreach($tourQuoteguide_details as $day =>$guide_details) 
                                        @php
                                               $dt_cnt++;
                                        @endphp                         
                                        @if($day == $i) 
                                    @foreach($guide_details as $guide_detail)
                                          @php
                                             $block_state = 0;
                                             
                                             foreach($tour_guiderserv as $t_guide){
                                                 if(($t_guide->tour_day==$i) && ($t_guide->pos==$guide_detail->pos)){

                                                    $block_state=$t_guide->status;
                                                 }
                                             }

                                          @endphp

                                <table class="table table-bordered table-sm" width="100%">
                                  <thead>
                                    <tr class="bg-secondary">                                            
                                    <th style="text-align: right;" width="10%"><b>Guide Type &nbsp;&nbsp;:&nbsp;</b></th>
                                    <td width="30%" ><b>{{$guide_detail->g_type}}</b> &nbsp;&nbsp;&nbsp;</td>
                                    <th style="text-align: right;" width="10%" colspan="4"><b>Lanuage :</b> </th>  
                                    <td style="text-align: left;" width="20%" colspan="2"><b>{{$guide_detail->lang_name}}</b></td>
                                                                                 
                                    <th style="text-align: right;" width="10%"><b> &nbsp;&nbsp;&nbsp;&nbsp;Date &nbsp;&nbsp;:&nbsp;</b></th>
                                    <td style="text-align: center;" width="20%"><b>{{$date}}</b></td>                                      
                                    </tr>
                                    <tr class="table-success" style="text-align: center;">
                                                            <th  colspan="8">Guide Details</th>
                                                            <th  colspan="2">Fee(LKR)</th>                                                      
                                                             
                                                                                                                                             
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-info" style="text-align: center;">
                                         <td colspan="8" style="text-align: left;">                                            
                                            <select id="sup_id_{{$guide_detail->pos}}_{{$day}}" class="form-control  m-bootstrap-select m_selectpicker" data-live-search="true"  name="g_name" id="g_name">
                                                    @foreach($sup_guide->all() as $guide_name)
                                              
                                                    @if($guide_name->guide_type_id==$guide_detail->guide_type_id) 
                                                       <option value="{{$guide_name->id}}">{{$guide_name->sup_s_name}}</option>
                                                    @endif   
                                                    @endforeach
                                            {{-- <input  type="hidden" value="{{$guide_name->id}}"> --}}

                                            </select>
                                         </td>
                                        <th style="text-align: center;" colspan="2"><span>Rs.{{number_format($guide_detail->guide_fee,2)}}</span></th>                                                            
                                                                                     
                                    </tr> 
                                    {{-- <tr  class="table-info" style="text-align: center;">
                                        <th width="60%" style="text-align: center;" colspan="10" >                                            
                                                  Guide Accommodation
                                        </th>
                                    </tr>  --}}
                                    {{-- <tr class="table-success" style="text-align:center">
                                    <th style="text-align: center" colspan="8"><b>Hotel Name</b></th>
                                    <th  style="text-align: center"><b>Room Type </b></th>
                                    <th  style="text-align: center"><b> Room rate</b></th>
                                    </tr> --}}
                                    {{-- <tr>               
                                               @foreach($guide_hotels->all() as $guide_hotel)
                                                @if($guide_detail->guide_room_id==$guide_hotel->id)    
                                            <td style="text-align: center;" colspan="8"><b>{{$guide_hotel->sup_s_name}}</b></td>
                                                 @else
                                                 
                                                @endif
                                               @endforeach  
                                                
                                               @foreach($guide_room_types->all() as $guide_room_type)
                                                  @if($guide_detail->guide_room_id==$guide_room_type->id)
                                            <td style="text-align: center;" ><b>{{$guide_room_type->gr_types}}</b></td>
                                                  @else
                                                  
                                                  @endif
                                               @endforeach
                                               
                                               @if($guide_detail->room_rate==0)
                                                 
                                               @else
                                            <td style="text-align: right;"><b>{{number_format($guide_detail->room_rate,2)}}</b></td>
                                               @endif
                                               
                                    </tr>                                              --}}
                                    <input id="tour_qt_gdt_id_{{$guide_detail->pos}}_{{$day}}" type="hidden" value="{{$guide_detail->id}}"> 
                                    <tr style="text-align: center;" class="table-secondary">
                                                                                            
                                    <th colspan="6">
                                                                                                                                                                        
                                    </th>
                                                                                                                                                    
                                     <th style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="4">
                                            <button @if($block_state!=0) disabled @endif onclick="storeGuide('{{$guide_detail->pos}}','{{$day}}')" type="button" class="btn btn-success m-btn m-btn--icon">
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
                                                                       
                   @endif
                        
                @endforeach     
            </td>
        </tr>
          @endfor
    </tbody>
</table>                                             
</div>
</form>

<div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                       
        <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
          <table class="table table-sm table-bordered" width="100%">
              
              <thead>
                                                                
              </thead>                                            
              <tbody>
                   
                  
                   <tr style="text-align: center;">
                          <th class="bg-secondary" colspan="13">Guide Vouchers</th>
                  </tr> 
                  @php
                  $no_of_guides=0; 
               @endphp
               @foreach ($tourQuoteguide_voucher as $supid => $voucher)
               @php
                   $no_of_guides++;
               @endphp
                      <tr>                                                        
                          <th class="table-success" colspan="13">Guide Name&nbsp;&nbsp;: &nbsp; &nbsp;<b>{{$voucher[0]->sup_s_name}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$voucher[0]->lang_name}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$voucher[0]->g_type}}</b></th>
                          <input id="supid_voucher_{{$no_of_guides}}" type="hidden" value="{{$voucher[0]->supid}}">
                      </tr>
                       @php
                        $row_count=0;
                        $voucher_no_vc=0;
                        $Remarks_vc = '';
                        $rates_vc = '';
                        $conf_to_vc = Auth::user()->name;
                        $conf_by_vc = '';
                        $conf_date_vc = '';
                        $status_vc =0;   
                       @endphp
                      <tr class="table-info" style="text-align: center;">
                            <th>No</th>
                            <th>Date</th>                                         
                            <th>Rate(LKR)</th>                                                        
                            <th>Status</th>
                            
                    </tr>
                      

                          
                      <div id="guide_alcte_voucher_{{$no_of_guides}}">
                            @foreach($voucher as $voucher_list)

                            @php
                                                        
                                $state ='';
                                $state_name ='';

                                if($voucher_list->status == 1){
                                   $state ='brand';
                                   $state_name = 'New';
                                }elseif($voucher_list->status == 2){
                                   $state ='metal';
                                   $state_name = 'Pending';
                                                                    
                                }elseif($voucher_list->status == 3){
                                   $state ='success';
                                   $state_name = 'Confirmed';
                                                                    
                                }elseif($voucher_list->status == 4){
                                   $state ='danger';
                                   $state_name = 'Canceled';
                                                                    
                                }
                                foreach ($hasVoucher_list as $voucherheadDt) {
                                                            
                                if($voucher[0]->supid == $voucherheadDt->supplier_id){
                                                                
                                    if($voucher[0]->status == $voucherheadDt->status){
                                                                     
                                        $voucher_no_vc = $voucherheadDt->guide_voucher_no;
                                        $Remarks_vc = $voucherheadDt->remarks;
                                        $rates_vc = $voucherheadDt->rates;
                                        $conf_to_vc = $voucherheadDt->user_name;
                                        $conf_by_vc = $voucherheadDt->confirmed_by_name;
                                        $conf_date_vc = $voucherheadDt->confirmed_date;
                                        $status_vc = $voucherheadDt->status;
                                    }
                                                                
                                     }

                                    }                                 
                                @endphp

                            @php
                                $row_count++;
                             @endphp
                          <tr style="text-align: center;">
                              
                            <input id="guide_allocate_id_{{$row_count}}_{{$no_of_guides}}" type="hidden" value="{{$voucher_list->id}}">                                                        
                              
                              <td>{{$row_count}}</td>
                              <td>{{$voucher_list->tour_date}}</td>                                                            
                              <td>{{number_format($voucher_list->guide_fee,2)}}</td>
                              <td><span class="m-badge m-badge--{{$state}} m-badge--wide">{{$state_name}}</span></td> 
                               
                              
                          </tr>
                          @endforeach
                      
                  </div>
                      <tr>
                            <input id="guide_count_{{$no_of_guides}}" type="hidden" value="{{$row_count}}">
                              <td width="100%" colspan="12">
                                      <div class="form-group m-form__group">
                                              <label for="exampleTextarea"><strong>Rates:</strong></label>
                                      <textarea  class="form-control m-input" id="rates_{{$no_of_guides}}" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">{{$rates_vc}}</textarea>
                                      </div>
                              </td>
                              
                      </tr>
                      <tr>
                              <td colspan="12">
                                      <div class="form-group m-form__group">
                                              <label for="exampleTextarea"><strong>Remarks:</strong></label>
                                              <textarea class="form-control m-input" id="remarks_{{$no_of_guides}}" style="margin-top: 0px; margin-bottom: 0px; height: 50px;">{{$Remarks_vc}}</textarea>
                                      </div>
                              </td>
                      </tr>
                     
                      <tr>
                         
                          <td style="vertical-align: top; text-align: left;" colspan="10">
                              <table class="table table-sm table-bordered" width="100%">
                                  <thead>
                                      <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                              <th width="20%">CONFIRMED TO :</th>
                                      <td><input disabled id="conf_to_{{$no_of_guides}}" type="text" value="{{$conf_to_vc}}" class="form-control form-control-sm"></td>
                                              <th width="20%">CONFIRMED BY :</th>
                                      <td><input id="conf_by_{{$no_of_guides}}" type="text" class="form-control form-control-sm" value="{{$conf_by_vc}}"></td>
                                      </tr>
                                      <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                              <th width="20%">CONFIRMED DATE :</th>
                                              <td><input id="m_datetimepicker_conf_date_{{$no_of_guides}}" type="text" value="{{$conf_date_vc}}" class="form-control dtpic-format form-control-sm"></td>

                                      </tr>
                                      
                                  </thead> 
                              </table>
                          </td>
                          
                              
                      </tr>
                      <tr class="bg-secondary" >
                          
                          <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                  
                                <button @if($voucher[0]->status !=1) disabled @endif onclick="ganarate_voucher('{{$voucher_list->supid}}','{{$no_of_guides}}')" type="button" class="btn btn-primary m-btn m-btn--icon">
                                                  <span>
                                                      <i class="la la-level-up"></i>
                                                      <span>Submit</span>
                                                  </span>
                                          </button>
                                          
                                          <a href="{{Route('reservation_voucher_guide',$voucher_no_vc)}}" @if($status_vc ==0) disabled @endif type="button" class="btn btn-warning m-btn m-btn--icon">
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

      <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                       
            <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
              <table class="table table-sm table-bordered" width="100%">
                  
                  <thead>
                                                                    
                  </thead>                                            
                  <tbody>
                       
                      
                       <tr style="text-align: center;">
                              <th class="bg-secondary" colspan="13">Guide Hotel Vouchers</th>
                      </tr> 
                      @php
                      $no_of_guides=0; 
                   @endphp
                   @foreach ($tourQuoteguidehotel_voucher as $supid => $hotelvoucher)
                   @php
                       $no_of_guides++;
                   @endphp
                          <tr>                                                        
                              <th class="table-success" colspan="13">Hotel Name   &nbsp;&nbsp;: &nbsp; &nbsp;{{$hotelvoucher[0]->supname}}</th>
                              <input id="supid_voucher_{{$no_of_guides}}" type="hidden" value="{{$hotelvoucher[0]->supid}}">
                          </tr>
                           @php
                            $row_count=0;
                            $voucher_no_vc=0;
                            $Remarks_vc = '';
                            $rates_vc = '';
                            $conf_to_vc = Auth::user()->name;
                            $conf_by_vc = '';
                            $conf_date_vc = '';
                            $status_vc =0;   
                           @endphp
                          <tr class="table-info" style="text-align: center;">
                                <th>No</th>
                                <th>Date</th> 
                                <th>Guide Name</th>
                                <th>Guide Type</th>                                      
                                <th>Room Type</th>
                                <th>Room Rate</th>                                                        
                                <th>Status</th>
                                
                        </tr>
                          
    
                              
                          <div id="guide_hotel_reserv_voucher_{{$no_of_guides}}">
                                @foreach($hotelvoucher as $voucher_hlist)
    
                                @php
                                                            
                                    $state ='';
                                    $state_name ='';
    
                                    if($voucher_hlist->status == 1){
                                       $state ='brand';
                                       $state_name = 'New';
                                    }elseif($voucher_hlist->status == 2){
                                       $state ='metal';
                                       $state_name = 'Pending';
                                                                        
                                    }elseif($voucher_hlist->status == 3){
                                       $state ='success';
                                       $state_name = 'Confirmed';
                                                                        
                                    }elseif($voucher_hlist->status == 4){
                                       $state ='danger';
                                       $state_name = 'Canceled';
                                                                        
                                    }
                                    foreach ($hashotelVoucher_list as $voucherhotelDt) {
                                                                
                                    if($hotelvoucher[0]->supid == $voucherhotelDt->supplier_id){
                                                                    
                                        if($hotelvoucher[0]->status == $voucherhotelDt->status){
                                                                         
                                            $voucher_no_vc = $voucherhotelDt->guide_hotel_voucher_no;
                                            $Remarks_vc = $voucherhotelDt->remarks;
                                            $rates_vc = $voucherhotelDt->rates;
                                            $conf_to_vc = $voucherhotelDt->user_name;
                                            $conf_by_vc = $voucherhotelDt->confirmed_by_name;
                                            $conf_date_vc = $voucherhotelDt->confirmed_date;
                                            $status_vc = $voucherhotelDt->status;
                                        }
                                                                    
                                         }
    
                                        }                                 
                                    @endphp
    
                                @php
                                    $row_count++;
                                 @endphp
                              <tr style="text-align: center">
                                  
                                <input id="guide_hotel_id_{{$row_count}}_{{$no_of_guides}}" type="hidden" value="{{$voucher_hlist->id}}">                                                        
                                  
                                  <td>{{$row_count}}</td>
                                  <td>{{$voucher_hlist->tour_date}}</td>
                                    @foreach($sup_guide->all() as $supguide)
                                    @if($supguide->id==$voucher_hlist->supplier_id)                                                         
                                   <td>{{($supguide->sup_s_name)}}</td>
                                      @endif
                                      @endforeach
                                  <td>{{($voucher_hlist->g_type)}}</td>
                                  <td>{{($voucher_hlist->gr_types)}}</td>
                                  <td>{{($voucher_hlist->room_rate)}}</td>
                                  <td><span class="m-badge m-badge--{{$state}} m-badge--wide">{{$state_name}}</span></td> 
                                   
                                  
                              </tr>
                              @endforeach
                          
                      </div>
                          <tr>
                                <input id="guide_hotel_count_{{$no_of_guides}}" type="hidden" value="{{$row_count}}">
                                  <td width="100%" colspan="12">
                                          <div class="form-group m-form__group">
                                                  <label for="exampleTextarea"><strong>Rates:</strong></label>
                                          <textarea  class="form-control m-input" id="rates_{{$no_of_guides}}" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">{{$rates_vc}}</textarea>
                                          </div>
                                  </td>
                                  
                          </tr>
                          <tr>
                                  <td colspan="12">
                                          <div class="form-group m-form__group">
                                                  <label for="exampleTextarea"><strong>Remarks:</strong></label>
                                                  <textarea class="form-control m-input" id="remarks_{{$no_of_guides}}" style="margin-top: 0px; margin-bottom: 0px; height: 50px;">{{$Remarks_vc}}</textarea>
                                          </div>
                                  </td>
                          </tr>
                         
                          <tr>
                             
                              <td style="vertical-align: top; text-align: left;" colspan="10">
                                  <table class="table table-sm table-bordered" width="100%">
                                      <thead>
                                          <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                  <th width="20%">CONFIRMED TO :</th>
                                          <td><input disabled id="conf_to_{{$no_of_guides}}" type="text" value="{{$conf_to_vc}}" class="form-control form-control-sm"></td>
                                                  <th width="20%">CONFIRMED BY :</th>
                                          <td><input id="conf_by_{{$no_of_guides}}" type="text" class="form-control form-control-sm" value="{{$conf_by_vc}}"></td>
                                          </tr>
                                          <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                  <th width="20%">CONFIRMED DATE :</th>
                                                  <td><input id="m_datetimepicker_conf_date_{{$no_of_guides}}" type="text" value="{{$conf_date_vc}}" class="form-control dtpic-format form-control-sm"></td>
    
                                          </tr>
                                          
                                      </thead> 
                                  </table>
                              </td>
                              
                                  
                          </tr>
                          <tr class="bg-secondary" >
                              
                              <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                      
                                    <button @if($hotelvoucher[0]->status !=1) disabled @endif onclick="genarate_hotel_voucher('{{$voucher_hlist->supid}}','{{$no_of_guides}}')" type="button" class="btn btn-primary m-btn m-btn--icon">
                                                      <span>
                                                          <i class="la la-level-up"></i>
                                                          <span>Submit</span>
                                                      </span>
                                              </button>
                                              
                                              <a href="{{Route('reservation_voucher_guide_hotel',$voucher_no_vc)}}" @if($status_vc ==0) disabled @endif type="button" class="btn btn-warning m-btn m-btn--icon">
                                                      <span>
                                                          <i class="la la-print"></i>
                                                          <span>Print Voucher</span>
                                                      </span>
                                              </a>
                                              
                                              <button  type="button" class="btn btn-info m-btn m-btn--icon">
                                                      <span>
                                                          <i class="la la-floppy-o"></i>
                                                          <span>Save as PDF</span>
                                                      </span>
                                              </button>
                                              <button   type="button" class="btn btn-success m-btn m-btn--icon">
                                                      <span>
                                                          <i class="la la-calendar-check-o"></i>
                                                          <span>Confirm</span>
                                                      </span>
                                              </button>
                                              <button  type="button" class="btn btn-danger m-btn m-btn--icon">
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
@endsection @section('Page_Scripts') @parent
    @include('tour_section_bookings.js.guide_view_js')

    @if($qtn_type==2)
        @include('tour_section_bookings.js.gp_guide_add_form_js')  
    @endif


@endsection