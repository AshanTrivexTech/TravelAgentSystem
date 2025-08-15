@php
$noofhotels=0;
@endphp

@foreach ($reservation_voucher_list_gp as $sup_id => $reserv)

@php
  $noofhotels++;
@endphp

<div class="modal" id="m_modal_vch_{{$noofhotels}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="slmd-main modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header slmd-header">
                                
                                    <span class="mdsp-header" id="mod_title"><h6 class="mdsp-header" id="md_header_2"></h6></span>

                                <input type="hidden" id="mod_hidden_2">
                                <input type="hidden" id="sup_hid_pkgid" value="0">
                                <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                                <i class="fa fa-close"></i>
                                </a>
                        </div>
                        <div class="modal-body slmd-body">
                                <input type="hidden" id="model_date_2" value="">
                                        
                               <div>
                                        <table class="table table-sm table-bordered" width="100%">
                                                                                                                                               
                                                        <tbody>
                                                          
                                                            
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
                                                                    {{-- <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                                                            
                                                                                    
                                                                            
                                                                    </td> --}}
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="13"></td>
                                                                </tr>
                                                                
                                                            
                                                        </tbody>
                                                        
                                                    </table>

                                </div>
                        </div>
                        
                        <div class="slmd-footer">
                                        <button @if($reserv[0]->status !=1) disabled @endif onclick="ganarate_voucher('{{$reser_lst->supid}}','{{$noofhotels}}')" type="button" class="btn btn-primary m-btn m-btn--icon">
                                                        <span>
                                                            <i class="la la-level-up"></i>
                                                            <span>Submit</span>
                                                        </span>
                                                </button>
                                                <span>&nbsp;</span>
                                                {{-- {{Route('reservation_voucher_accmd',$voucher_no_vc)}} --}}
                                                <a href="{{Route('reservation_voucher_accmd',$voucher_no_vc)}}" @if($status_vc ==0) disabled @endif type="button" class="btn btn-warning m-btn m-btn--icon">
                                                        <span>
                                                            <i class="la la-print"></i>
                                                            <span>Print Voucher</span>
                                                        </span>
                                                </a>
                                                <span>&nbsp;</span>
                                                <button onclick="save_as_pdf()" @if($status_vc ==0) disabled @endif type="button" class="btn btn-info m-btn m-btn--icon">
                                                        <span>
                                                            <i class="la la-floppy-o"></i>
                                                            <span>Save as PDF</span>
                                                        </span>
                                                </button>
                                                <span>&nbsp;</span>
                                                <button @if($status_vc ==0) disabled @endif type="button" class="btn btn-success m-btn m-btn--icon">
                                                        <span>
                                                            <i class="la la-calendar-check-o"></i>
                                                            <span>Confirm</span>
                                                        </span>
                                                </button>
                                                <span>&nbsp;</span>
                                                <button type="button" class="btn btn-danger m-btn m-btn--icon" data-dismiss="modal">
                                                        <span>
                                                            <i class="la la-times-circle"></i>
                                                            <span>Close</span>
                                                        </span>
                                                </button>
                                <span>&nbsp;</span>
                                {{-- <button type="button" class="btn btn-danger m-btn m-btn--icon" data-dismiss="modal">
                                        <span>
                                            <i class="la la-times-circle"></i>
                                            <span>Close</span>
                                        </span>
                                </button> --}}
                                
                                
                                
                        </div>

                </div>
        </div>
</div>

@endforeach