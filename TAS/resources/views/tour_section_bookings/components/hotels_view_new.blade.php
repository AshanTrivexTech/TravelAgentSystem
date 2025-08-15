@extends('layouts.tas_app') 
@section('content')
@php
    
    $noOfDays = ($tourQuotHeader->Days)+1;
	$frmdate = $tourQuotHeader->frm_date;
	$tourCode = $tourQuotHeader->tour_code;
	$tourID = $tourQuotHeader->tour_id;
	$tourVersion =$tourQuotHeader->version_id;
	$tourStDate = $tourQuotHeader->frm_date;
    $tourEnDate = $tourQuotHeader->to_date;
    $tourQuotHeaderId = $tourQuotHeader->id;
    $total=0;

        $al_sgl = 0;
        $al_dbl = 0;
        $al_twn = 0;
        $al_tbl = 0;
        $al_qd = 0;

    $rmllcount = $roomAllocation->count();
    
    if($rmllcount!=0){
               
                $al_sgl = $roomAllocation[0]->sgl;
                $al_dbl = $roomAllocation[0]->dbl;
                $al_twn = $roomAllocation[0]->twn;
                $al_tbl = $roomAllocation[0]->tbl;
                $al_qd = $roomAllocation[0]->qd;
    }
    
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
                            Tour Code &nbsp;:&nbsp;{{$tourQuotHeader->tour_code}} <span style="text-transform: uppercase;"></span> 
                        </h3>
                
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h3 class="m-portlet__head-text m--font-success">
                            Tour Title &nbsp;:&nbsp;{{$tourQuotHeader->title}}
                        </h3>
                </div>
              
            </div>
            <div class="m-portlet__head-tools">
                    <a href="{{route('load_dashboard',$tourID)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Hotel Packages</a>
                                    </li>											
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Voucher</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Rooming List</a>
                                    </li>
                            </ul>
                                  <div class="tab-content">

                                    <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                            <form class="cleafix" method="POST" action="">
                                                    <table class="table table-sm" width="100%">
                                                        <thead>
                                                                <tr class="table-secondary">    
                                                                        <th style="text-align: center;" width="5%">Day</th>
                                                                         <th style="text-align: center;">Accommodation Details</th>
                                                                         
                                                                 </tr>     
                                                        </thead>    
                                                    </table>    
                                                   
                                                        <table class="table table-sm" width="100%">
                                                            <thead>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                    @for ($i = 1; $i <= $noOfDays; $i++)
                                                                            @php                                                        
                                                                                $date = date('Y-m-d', strtotime($frmdate. ' + '.($i-1).' days'));                                            
                                                                            @endphp
                                                                        
                                                                        <tr>
                                                                            <th class="table-primary" width="5%" style="text-align: center;">
                                                                                {{$i}}
                                                                            </th>
                                                                            <td width="95%">
                                                                                <table class="table table-sm" width="100%">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td>Hotel Name & Details</td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    @endfor
                                                            </tbody>
                                                        </table>
                                                        
                                                        
                                                       <br>
                                                                                                                      
                                                   </form>
                                    </div>

                                    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                       
                                      <div> 
                                        <table class="table table-sm table-bordered" width="100%">
                                            
                                            <thead>
                                                                                              
                                            </thead>                                            
                                            <tbody>
                                                @php
                                                    $noofhotels=0;
                                                @endphp

                                            @foreach ($reservation_voucher_list_gp as $sup_id => $reserv)
                                                @php
                                                    $noofhotels++;
                                                @endphp
                                                 <tr style="text-align: center;">
                                                        <th class="bg-secondary" colspan="13">Hotel Vouchers</th>
                                                </tr> 
                                                <tr class="table-info" style="text-align: center;">
                                                        <th width="5%">No</th>
                                                        <th width="44%">Description</th>
                                                        <th width="7%">Date</th>                                         
                                                        <th width="4%">MP</th>
                                                        <th width="4%">SGL</th>
                                                        <th width="4%">DBL</th>
                                                        <th width="4%">TWIN</th>
                                                        <th width="4%">TBL</th>
                                                        <th width="4%">QD</th>
                                                        <th width="8%">Sup Total</th>
                                                        <th width="8%">Room Total</th>                                                        
                                                        <th width="8%">Status</th>
                                                        {{-- <th width="10%">Action</th> --}}
                                                </tr>
                                                    <tr>                                                        
                                                        <th class="table-success" colspan="12">Hotel Name   &nbsp;&nbsp;: &nbsp; &nbsp;  {{$reserv[0]->sup_s_name}}</th>
                                                        <input id="supid_voucher_{{$noofhotels}}" type="hidden" value="{{$reserv[0]->supid}}">
                                                    </tr>
                                                    @php
                                                        $rowCount_voucher =0;
                                                        $voucher_no_vc=0;
                                                        $Remarks_vc = '';
                                                        $rates_vc = '';
                                                        $condition_vc =1;
                                                        $conf_to_vc = Auth::user()->name;
                                                        $conf_by_vc = '';
                                                        $conf_date_vc = '';
                                                        $noofPax_vc = 0;
                                                        $client_name_vc ='';
                                                        $status_vc =0;

                                                        foreach ($hasVoucher_list as $voucherheadDt) {
                                                            
                                                            if($reserv[0]->supid == $voucherheadDt->supplier_id){
                                                                
                                                                if($reserv[0]->status == $voucherheadDt->status){
                                                                     
                                                                     $voucher_no_vc = $voucherheadDt->hotel_voucher_no;
                                                                     $Remarks_vc = $voucherheadDt->remarks;
                                                                     $rates_vc = $voucherheadDt->rates;
                                                                     $condition_vc = $voucherheadDt->condi;
                                                                     $conf_to_vc = $voucherheadDt->user_name;
                                                                     $conf_by_vc = $voucherheadDt->confirmed_by_name;
                                                                     $conf_date_vc = $voucherheadDt->confirmed_date;
                                                                     $noofPax_vc = $voucherheadDt->pax;
                                                                     $client_name_vc = $voucherheadDt->client_name;
                                                                     $status_vc = $voucherheadDt->status;
                                                                }
                                                                
                                                            }

                                                        }
                                                        

                                                    @endphp
                                                    <div id="pkgs_count_voucher_{{$noofhotels}}">
                                                    @foreach ($reserv as $reser_lst)

                                                        @php
                                                        
                                                                $state ='';
                                                                $state_name ='';

                                                                if($reser_lst->status == 1){
                                                                    $state ='brand';
                                                                    $state_name = 'New';
                                                                }elseif($reser_lst->status == 2){
                                                                    $state ='metal';
                                                                    $state_name = 'Pending';
                                                                    // $state ='<span class="m-badge m-badge--metal m-badge--wide">Pending</span>';
                                                                }elseif($reser_lst->status == 3){
                                                                    $state ='success';
                                                                    $state_name = 'Confirmed';
                                                                    // $state ='<span class="m-badge m-badge--metal m-badge--wide"></span>';
                                                                }elseif($reser_lst->status == 4){
                                                                    $state ='danger';
                                                                    $state_name = 'Canceled';
                                                                    // $state ='<span class="m-badge m-badge--danger m-badge--wide">Canceled</span>';
                                                                }
                                                                  
                                                        @endphp 
                                                        @php
                                                        $rowCount_voucher++;
                                                        @endphp
                                                    
                                                        <tr style="text-align: center;">
                                                            <td>{{$rowCount_voucher}}</td>
                                                            <input id="accmd_reser_id_{{$rowCount_voucher}}_{{$noofhotels}}" type="hidden" value="{{$reser_lst->id}}">                                                       
                                                            
                                                            <td style="text-align: left;">{{$reser_lst->Package_name}} / {{$reser_lst->r_type}}</td>
                                                            <td>{{$reser_lst->tour_date}}</td>                                                            
                                                            <td>{{$reser_lst->meal_plane}}</td>
                                                            <td>{{$reser_lst->sgl_qty}}</td>
                                                            <td>{{$reser_lst->dbl_qty}}</td>
                                                            <td>{{$reser_lst->twn_qty}}</td>
                                                            <td>{{$reser_lst->tbl_qty}}</td>
                                                            <td>{{$reser_lst->qd_qty}}</td>
                                                            <td>{{number_format($reser_lst->total_sup,2)}}</td>
                                                            <td>{{number_format($reser_lst->total_rmc,2)}}</td> 
                                                            <td><span class="m-badge m-badge--{{$state}} m-badge--wide">{{$state_name}}</span></td>
                                                            
                                                        </tr>
                                                        
                                                    @endforeach
                                                </div>
                                                    <tr>
                                                         <input id="pkg_count_{{$noofhotels}}" type="hidden" value="{{$rowCount_voucher}}">
                                                            <td width="100%" colspan="12">
                                                                    <div class="form-group m-form__group">
                                                                            <label for="exampleTextarea"><strong>Rates:</strong></label>
                                                                    <textarea  class="form-control m-input" id="rates_{{$noofhotels}}" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">{{$rates_vc}}</textarea>
                                                                    </div>
                                                            </td>
                                                            
                                                    </tr>
                                                    <tr>
                                                            <td colspan="12">
                                                                    <div class="form-group m-form__group">
                                                                            <label for="exampleTextarea"><strong>Remarks:</strong></label>
                                                                            <textarea class="form-control m-input" id="remarks_{{$noofhotels}}" style="margin-top: 0px; margin-bottom: 0px; height: 50px;">{{$Remarks_vc}}</textarea>
                                                                    </div>
                                                            </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td style="vertical-align: top; text-align: left;" colspan="2">
                                                             <table class="table-secondary" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th  style="padding-left: 10px; margin-bottom: 0px; padding-top:5px; white-space: nowrap; overflow: hidden;">* All Extras to be collected direct from Group/Clien.</th>    
                                                                        <th style="text-align: center;">
                                                                                
                                                                                <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-radio m-radio--state-success">
                                                                                        <input type="radio" id="condi_sl1_{{$noofhotels}}" name="cndi_{{$noofhotels}}" @if($condition_vc==1) checked @endif value="1">&nbsp;
                                                                                        <span></span>
                                                                                </label>
                                                                        </th>                                                                      
                                                                    </tr>    
                                                                    <tr>
                                                                            <th  style="padding-left: 10px; margin-bottom: 0px; padding-top:5px; white-space: nowrap; overflow: hidden;">* All Bill Including Extras.</th>    
                                                                            <th style="text-align: center;">
                                                                                    
                                                                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-radio m-radio--state-success">
                                                                                            <input type="radio" id="condi_sl2_{{$noofhotels}}" name="cndi_{{$noofhotels}}" @if($condition_vc==2) checked @endif value="2">&nbsp;
                                                                                            <span></span>
                                                                                    </label>
                                                                            </th>
                                                                                
                                                                    </tr>
                                                                    <tr>
                                                                            <th  style="padding-left: 10px; margin-bottom: 0px; padding-top:5px; white-space: nowrap; overflow: hidden;">* All Payment/s from direct by Group or Clien.</th>    
                                                                            <th style="text-align: center;">
                                                                                    
                                                                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-radio m-radio--state-success">
                                                                                            <input type="radio" id="condi_sl3_{{$noofhotels}}" name="cndi_{{$noofhotels}}" @if($condition_vc==3) checked @endif value="3">&nbsp;
                                                                                            <span></span>
                                                                                    </label>
                                                                            </th>
                                                                    </tr>
                                                                </thead>     
                                                            </table>      
                                                        </td>
                                                        <td style="vertical-align: top; text-align: left;" colspan="10">
                                                            <table class="table table-sm table-bordered" width="100%">
                                                                <thead>
                                                                    <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">CONFIRMED TO :</th>
                                                                    <td><input disabled id="conf_to_{{$noofhotels}}" type="text" value="{{$conf_to_vc}}" class="form-control form-control-sm"></td>
                                                                            <th width="20%">CONFIRMED BY :</th>
                                                                            <td><input id="conf_by_{{$noofhotels}}" type="text" class="form-control form-control-sm" value="{{$conf_by_vc}}"></td>
                                                                    </tr>
                                                                    <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">CONFIRMED DATE :</th>
                                                                            <td><input id="m_datetimepicker_conf_date_{{$noofhotels}}" type="text" value="{{$conf_date_vc}}" class="form-control dtpic-format form-control-sm"></td>
                                                                            <th width="20%">NO OF PAX :</th>
                                                                            <td><input id="noof_pax_{{$noofhotels}}" value="{{$noofPax_vc}}"  type="text" class="form-control form-control-sm"></td>
                                                                    </tr>
                                                                    <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">CLIENT NAME :</th>
                                                                            <td colspan="3"><input id="client_name_{{$noofhotels}}" value="{{$client_name_vc}}" type="text" class="form-control form-control-sm"></td>
                                                                            
                                                                    </tr>
                                                                    
                                                                </thead> 
                                                            </table>
                                                        </td>
                                                        
                                                            
                                                    </tr>
                                                    <tr class="bg-secondary" >
                                                        {{-- <td colspan=""></td> --}}
                                                        <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                                                
                                                                        <button @if($reserv[0]->status !=1) disabled @endif onclick="ganarate_voucher('{{$reser_lst->supid}}','{{$noofhotels}}')" type="button" class="btn btn-primary m-btn m-btn--icon">
                                                                                <span>
                                                                                    <i class="la la-level-up"></i>
                                                                                    <span>Submit</span>
                                                                                </span>
                                                                        </button>
                                                                        {{-- {{Route('reservation_voucher_accmd',$voucher_no_vc)}} --}}
                                                                        <a href="{{Route('reservation_voucher_accmd',$voucher_no_vc)}}" @if($status_vc ==0) disabled @endif type="button" class="btn btn-warning m-btn m-btn--icon">
                                                                                <span>
                                                                                    <i class="la la-print"></i>
                                                                                    <span>Print Voucher</span>
                                                                                </span>
                                                                        </a>
                                                                        
                                                                        <button onclick="save_as_pdf()" @if($status_vc ==0) disabled @endif type="button" class="btn btn-info m-btn m-btn--icon">
                                                                                <span>
                                                                                    <i class="la la-floppy-o"></i>
                                                                                    <span>Save as PDF</span>
                                                                                </span>
                                                                        </button>
                                                                        <button @if($status_vc ==0) disabled @endif type="button" class="btn btn-success m-btn m-btn--icon">
                                                                                <span>
                                                                                    <i class="la la-calendar-check-o"></i>
                                                                                    <span>Confirm</span>
                                                                                </span>
                                                                        </button>
                                                                        <button @if($status_vc ==0) disabled @endif type="button" class="btn btn-danger m-btn m-btn--icon">
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
                                            @include('tour_section_bookings.components.rooming_list')
                                            @include('tour_section_bookings.components.rooming_list_select_clients_model')
                                    </div>
                                    
                                </div>



                           
                           
                    </div>
                        
                    
                
                </div>
            
                       
                        
                 
            

            
       
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent

@include('tour_section_bookings.js.hotels_view_js')
@include('tour_section_bookings.js.rooming_list_js')

@endsection