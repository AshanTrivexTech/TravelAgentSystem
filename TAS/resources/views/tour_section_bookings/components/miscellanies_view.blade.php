@extends('layouts.tas_app') 
@section('content')

@php
    
  
	$tourCode = $tourQuotHeader->tour_code;
	$tourID = $tourQuotHeader->tour_id;
	$tourVersion =$tourQuotHeader->version_id;
	$tourStDate = $tourQuotHeader->frm_date;
    $tourEnDate = $tourQuotHeader->to_date;
    $tourQuotHeaderId = $tourQuotHeader->id;
    $sup_id=
    $total=0;
    $title_tour=$tourQuotHeader->title;
    $count=0;
     $pos=0;
     $conf_to=Auth::user()->name;
     $pos=0;
     $advance=0;
     $tbpos=$tab_pos;

     $qtn_type = $tourQuotHeader->qtn_type;
@endphp
 
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        Tour Miscellaneous
            </h3>
            
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong><div id="notify"></div>
        <button type="button" class="close" id="notify_close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="m-content">

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                
                <div class="m-portlet__head-title">
                     
                    <h3 class="m-portlet__head-text">                                                        
                            Tour Code : &nbsp; {{$tourCode}}                            
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
        {{-- {{$tbpos}} --}}
        <div class="m-portlet__body">           
            <div class="form-group m-form__group row">
                <div class="col-sm-12">
                        <ul class="nav nav-tabs" role="tablist">
                           
                                <li class="nav-item">
                                    <a  @if($tbpos == 1)   class="nav-link active show" @else class="nav-link"  @endif data-toggle="tab" href="#" data-target="#m_tabs_1_1"  >Miscellanies Details</a>
                                </li>											
                                <li class="nav-item">
                                    <a  @if($tbpos == 2)   class="nav-link active show" @else class="nav-link"  @endif  data-toggle="tab" href="#m_tabs_1_2" >Voucher</a>
                                </li>
                                <li class="nav-item">
                                    <a   @if($tbpos == 3)   class="nav-link active show" @else class="nav-link"  @endif  data-toggle="tab" href="#m_tabs_1_3">Tour Advance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" data-toggle="tab" href="#m_tabs_1_3">Status</a>
                                </li>
                            </ul>
                            <div class="tab-content">




                        
                             

                        <div @if($tbpos == 1) class="tab-pane active show" @else class="tab-pane" @endif  id="m_tabs_1_1" role="tabpanel">
                       
                        <form class="cleafix" method="POST" action="">
                                <div style="overflow-x:auto;"> 
                                    <table class="table table-sm" width="100%">
                                        <thead>
                                            <tr class="table-secondary">    
                                                  
                                            <th style="text-align: center;" colspan="10" >Miscellanies Details</th>
                                                    
                                            </tr>
                                            <tr>
                                                <th colspan="10">
                                                    <table class="table table-bordered table-sm" width="100%">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th width="15%">Adult PAX :</th>    
                                                                <td width="10%">{{$tourQuotHeader->pax_adult}}</td>
                                                                <th width="15%">Child PAX :</th>
                                                                <td width="10%">{{$tourQuotHeader->pax_child}}</td>
                                                                <th width="50%"></th>
                                                            </tr>    
                                                        </thead>    
                                                    </table>    
                                                </th>    
                                            </tr>                                        
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                       </table>
                                      
                                       
                                   
                                      <table class="table table-bordered table-sm" width="100%">
                                            <thead>
                                            <tr class="table-success" style="text-align: center;">
                                            <th width="100%" colspan="10">Miscellanies Details</th>
                                                                                                                                   
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="table-info" style="text-align: center;">
                                                  <th width="5%">

                                                     <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                        <input id="row_chk" onchange="select_all_sn()" type="checkbox" >&nbsp;
                                                                <span></span>
                                                    </label>
                                                </th>
                                                  <th width="20%" colspan="2">Miscellanie</th>                                                            
                                                  <th width="20%" colspan="1">No Of Units</th>
                                                  <th width="20%" colspan="1">Rate</th>
                                                  <th width="20%" colspan="1">Qty</th>
                                                  <th width="20%" colspan="2">Total</th> 
                                              </tr>
                                             
                                              </tbody>
                                              </table>
                                             @php
                                                 $has_added_mis=0;
                                                 $has_added_mis_adv=0;
                                                 $count=0;
                                             @endphp
                                             
                                              <table class="table table-bordered table-sm" width="100%">

                                             
                                                    @foreach($misc_views as $mis_data)

                                                    @php
                                                    
                                                    $has_added_mis=0;
                                                    $has_added_mis_adv=0;
                                                    $has_add_status=1;

                                                    $misc_req_qty = 0;
                                                    $rate = 0;
                                                    
                                                    if($qtn_type==2){

                                                    }


                                                    foreach($get_adv as $itm)
                                                    {
                                                        if($mis_data->id == $itm->tour_quote_misc_id)
                                                        {
                                                           $has_added_mis_adv++; 
                                                        }
                                                     
                                                    }
                                                    
                                                    foreach ($drp_voucher as $mis => $chk_mis) {
                                                        
                                                        foreach ($chk_mis as $m_dt) {
                                                            
                                                            if($m_dt->mis_qut_id == $mis_data->id )
                                                            {
                                                                $has_added_mis++;
                                                            }

                                                          
                                                      
                                                        }

                                                  
                                                        
                                                       
                                                    }

                                               
                                               $count++;
                                                    @endphp
                                               
                                                @php
                                                    if($mis_data->Rate>0){

                                                        $rate = (($mis_data->Rate)/$mis_data->ex_rate);
                                                    }

                                                    $total_r = number_format(($rate * $mis_data->qty),2);

                                                @endphp
                                              <thead id="sel_">
                                                
                                                 
                                              <tr  style="text-align: center;" @if($has_added_mis_adv ==1)   class="table-danger" @endif>
                                                <td>   <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                        <input id="row_chk{{$count}}" @if($has_added_mis_adv==1) disabled onload="abcc($count)"   @endif  onchange="uncheking()"  type="checkbox" >&nbsp;
                                                                <span></span>
                                                        </label>
                                                 </td>
                                               {{-- {{$has_added_mis_adv}} --}}
                                              <td width="20%" colspan="2">{{$mis_data->category}}</td>  
                                              <input type="hidden" id="ctgry_{{$count}}">
                                              <td width="20%" colspan="1">{{$mis_data->mc_pax}}</td>  
                                              <input type="hidden" id="mc_pax_{{$count}}">
                                              <td class="text-right" width="20%" colspan="1">{{number_format($rate,2)}}</td>  
                                              <input type="hidden" id="rate_{{$count}}">
                                                 <td  width="20%" colspan="1">                                                     
                                                        <input @if($qtn_type==1) disabled @endif @if($has_added_mis_adv ==1) disabled @endif placeholder="0.00" id="misc_qty_ch_{{$count}}" style="text-align: center;" type="text"  value="{{$mis_data->qty}}" class="form-control form-control-sm">                                                   
                                                    
                                                </td>  
                                                 <input type="hidden" id="qty_{{$count}}">
                                              <td class="text-right" width="20%" colspan="2">{{$total_r}}
                                              <input type="hidden" id="tot_klr_{{$count}}">
                                                <input id="mis_id_{{$count}}" type="hidden"  value="{{$mis_data->id}}">
                                                </td> 
                                                                                                                                                                                       
                                              </tr>
                                              
                                              @endforeach
                                                
                                              <tr class="table-success" style="text-align: center;">
                                                   <td width="50%" colspan="5">Select Supplier</td>
                                                   <td width="20%" colspan="2">Advance</td>
                                              </tr>
                                              
                                         
                                              </thead>
      
                                              <tbody id="comsup_mlist_"> 
                                                                                                                              
                                              <td width="25%" colspan="3">
                                             </td>
                                             <td width="25%" colspan="2" style="text-align: center;">
                                               
                                            
  
                                             <select required name="vehicle" id="supplier_" class="form-control">  
                                                      <option value="0">Please select supplier...</option>
                                                          @foreach($supplier_data as $sup_data)
  
                                                         
                                                              <option value="{{$sup_data->id}}" >{{$sup_data->sup_s_name}}</option>          
                                                        
                                                         
                                                         
                                                           @endforeach          
                                                                                                      
                                            </select>
                                            
                                             </td>
                                              <td width="25%" colspan="3" style="text-align: center;">
                                                      <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                      <input  id="opssup_chk_" type="checkbox" >&nbsp;
                                                              <span></span>
                                                      </label>
      
                                              </td>
                                                                                            
                                              </tbody>
                                              </table>
                                                                              
                                              </td>                                                                           
                                              <table class="table table-bordered table-sm" width="100%">
                                              
                                              <tbody>                                                                              
                                              <tr style="text-align: center;" class="table-secondary">
                                                                          
                                              <th colspan="6" style="text-align: left">
                                                  <span class="table-danger"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;Already added                                                                                                                     
                                              </th>
                                                                                                                                                          
                                              <th style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="4">
                                                    <button type="button" onclick="save_data({{$count}})" class="btn btn-success m-btn m-btn--icon" id="btn_">
                                                    <span>
                                                    <i class="la la-calendar-check-o"></i>
                                                    <span>Add to Reserve</span>
                                                    </span>
                                                    </button>
                                              
                                                        <button type="button" onclick="cancel_misc()" id="cancel_mis_" class="btn btn-danger m-btn m-btn--icon">
                                                    <span>
                                                    <i class="la la-times-circle"></i>
                                                    <span>Cancel</span>
                                                    </span>
                                                    </button>
                                              </th>
                                      
                                              </tr>       
                                                                                               
                                                                                     
                                              </tbody>
                                              </table>
                                                              
         
                                                  </td>
                                              </tr>
                                          
                                      
                                      
                                          
                                        </tbody>
                                    </table>
    
                                    </div>
                                   <br>
                                          
                               </form>
                     
                         </div>


                            {{-- Voucher --}}
                            
                            <div @if($tbpos == 2) class="tab-pane active show" @else class="tab-pane" @endif id="m_tabs_1_2" role="tabpanel">
                                     
                                <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
                                        <table class="table table-sm table-bordered" width="100%">
                                            
                                            <thead>
                                                                                              
                                            </thead>                                            
                                            <tbody>
                                           
                                            @foreach($drp_voucher as $voucher => $dt)
                                            @php
                                                $count++;
                                                $pos=0;
                                            @endphp
                                                 <tr style="text-align: center;">
                                                        <th class="bg-secondary" colspan="12">Miscellanies Vouchers</th>
                                                </tr> 

                                                @php
                                                $chk_available_mis=0;
                                                $rowCount_voucher =0;
                                                $voucher_no_vc_mis=0;
                                                $Remarks_vc = '';
                                                $rates_vc = '';
                                                $condition_vc =1;
                                                $conf_to_vc = Auth::user()->name;
                                                $conf_by_vc = '';
                                                $conf_date_vc = '';
                                                $noofPax_vc = 0;
                                                $client_name_vc ='';
                                                $status_vc =0;

                                                foreach ($hasVoucher_list_misc as $voucherheadDt) {
                                                    
                                                    if($dt[0]->sup_id == $voucherheadDt->supplier_id){
                                                        
                                                      $chk_available_mis=1;
                                                             
                                                             $voucher_no_vc_mis = $voucherheadDt->misc_voucher_no;
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
                                                

                                            @endphp
                                                <tr class="table-info" style="text-align: center;">
                                                        
                                                        <th width="20%" colspan="2">Miscellanie</th>
                                                        <th width="20%" colspan="2">No Of Units</th>                                         
                                                        <th width="20%" colspan="2">Rate</th>
                                                        <th width="20%" colspan="2">Qty</th>
                                                        <th width="20%" colspan="4">Total</th>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                        <input id="mis_voucher_sup" type="hidden" value="">
                                                           <td style="text-align: left" class="table-success" width="100%" colspan="12">
                                                             <b>Supplier &nbsp; :&nbsp; {{$dt[$pos]->sup_s_name}} </b>&nbsp;&nbsp;
                                                            </td>
                                                           
                                                 </tr>

                                                 @foreach ($dt as $item)
                                              
                                                 @php
                                                     $pos++;
                                                 @endphp
                                                 <input type="hidden" id="mis_res_{{$pos}}_{{$count}}" value="{{$item->id}}">
                                                    <tr>                                                        
                                                        <td  style="text-align: center" colspan="2">{{$item->category}} &nbsp;&nbsp; &nbsp; &nbsp;  </td>
                                                        <input id="mis_voucher_mis" type="hidden" value="">
                                                    <td  style="text-align: center" colspan="2">{{$item->mc_pax}}</td>
                                                         <input id="mis_voucher_nos" type="hidden" value="">
                                                    <td style="text-align: center" colspan="2"> {{number_format($item->Rate)}}</td>
                                                         <input id="mis_voucher_rate" type="hidden" value="">
                                                    <td   style="text-align: center" colspan="2">{{$item->qty}}</td>
                                                         <input id="mis_voucher_qty" type="hidden" value="">
                                                    <td  style="text-align: center" colspan="4">{{number_format($item->totlkr)}}</td>
                                                         <input id="mis_voucher_tot" type="hidden" value="">
                                                    </tr>
                                                    
                                                @endforeach
                                                       
                                                    <tr>
                                                    <input id="pkg_count_{{$count}}" type="hidden" value="{{$pos}}">
                                                            <td width="100%" colspan="12">
                                                                    <div class="form-group m-form__group">
                                                                            <label for="exampleTextarea"><strong>Rates:</strong></label>
                                                                    <textarea  class="form-control m-input" id="rates_{{$count}}" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">{{$rates_vc}}</textarea>
                                                                    </div>
                                                            </td>
                                                            
                                                    </tr>
                                                    <tr>
                                                            <td colspan="12">
                                                                    <div class="form-group m-form__group">
                                                                            <label for="exampleTextarea"><strong>Remarks:</strong></label>
                                                                    <textarea class="form-control m-input" id="remarks_{{$count}}" style="margin-top: 0px; margin-bottom: 0px; height: 50px;">{{$Remarks_vc}}</textarea>
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
                                                                                <input type="radio" id="condi_sl1_{{$count}}" name="cndi_{{$count}}" checked value="1">&nbsp;
                                                                                        <span></span>
                                                                                </label>
                                                                        </th>                                                                      
                                                                    </tr>    
                                                                    <tr>
                                                                            <th  style="padding-left: 10px; margin-bottom: 0px; padding-top:5px; white-space: nowrap; overflow: hidden;">* All Bill Including Extras.</th>    
                                                                            <th style="text-align: center;">
                                                                                    
                                                                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-radio m-radio--state-success">
                                                                                            <input type="radio" id="condi_sl2_{{$count}}" name="cndi_{{$count}}" value="2">&nbsp;
                                                                                            <span></span>
                                                                                    </label>
                                                                            </th>
                                                                                
                                                                    </tr>
                                                                    <tr>
                                                                            <th  style="padding-left: 10px; margin-bottom: 0px; padding-top:5px; white-space: nowrap; overflow: hidden;">* All Payment/s from direct by Group or Clien.</th>    
                                                                            <th style="text-align: center;">
                                                                                    
                                                                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-radio m-radio--state-success">
                                                                                            <input type="radio" id="condi_sl3_{{$count}}" name="cndi_{{$count}}" value="3">&nbsp;
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
                                                                    <td><input disabled id="conf_to_{{$count}}" type="text" value="{{$conf_to}}" class="form-control form-control-sm"></td>
                                                                            <th width="20%">CONFIRMED BY :</th>
                                                                            <td><input id="conf_by_{{$count}}" type="text" value="{{$conf_by_vc}}" class="form-control form-control-sm" ></td>
                                                                    </tr>
                                                                    <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">CONFIRMED DATE :</th>
                                                                            <td><input id="m_datetimepicker_conf_date_{{$count}}" type="text" value="{{$conf_date_vc}}" class="form-control dtpic-format form-control-sm"></td>
                                                                            <th width="20%">NO OF PAX :</th>
                                                                            <td><input id="noof_pax_{{$count}}"  value="{{$noofPax_vc}}"  type="text" class="form-control form-control-sm"></td>
                                                                    </tr>
                                                                    <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">CLIENT NAME :</th>
                                                                            <td colspan="3"><input id="client_name_{{$count}}" type="text" value="{{$client_name_vc}}" class="form-control form-control-sm"></td>
                                                                            
                                                                    </tr>
                                                                    
                                                                </thead> 
                                                            </table>
                                                        </td>
                                                        
                                                        {{-- @if($chk_available_mis == 1) disabled @endif --}}
                                                    </tr>
                                                    
                                                    <tr class="bg-secondary" >
                                                      
                                                        <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                                         
                                                        <button  onclick="ganarate_voucher_misc('{{$voucher}}','{{$count}}')"  type="button" class="btn btn-primary m-btn m-btn--icon"> 
                                                                                <span>
                                                                                    <i class="la la-level-up"></i>
                                                                                    <span>Submit</span>
                                                                                </span>
                                                                        </button>

                                                                    <a href="{{route('generate_misc_voucher_dtails',$voucher_no_vc_mis)}}" > <button type="button" class="btn btn-warning m-btn m-btn--icon">
                                                                                <span>
                                                                                    <i class="la la-print"></i>
                                                                                    <span>Print Voucher</span>
                                                                                </span>
                                                                        </button>
                                                                    </a>
                                                                        <button type="button" class="btn btn-info m-btn m-btn--icon">
                                                                                <span>
                                                                                    <i class="la la-floppy-o"></i>
                                                                                    <span>Save as PDF</span>
                                                                                </span>
                                                                        </button>
                                                                        <button type="button" class="btn btn-success m-btn m-btn--icon">
                                                                                <span>
                                                                                    <i class="la la-calendar-check-o"></i>
                                                                                    <span>Confirm</span>
                                                                                </span>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger m-btn m-btn--icon">
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


                        {{-- advance --}}

                

                        
                        <div @if($tbpos == 3) class="tab-pane active show" @else class="tab-pane" @endif id="m_tabs_1_3" role="tabpanel">
                                     
                            <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
                                    <table class="table table-sm table-bordered" width="100%">
                                        
                                        <thead>
                                                                                          
                                        </thead>                                            
                                        <tbody>
                                           
                                       @php
                                           $val=0;
                                           $get_count_advc=0;
                                           $ab=0;
                                           $pos_advance=0;
                                           $b_dt=0;
                                           $count_pos=0;
                                       @endphp
                                           @foreach($drp_voucher_advance as $voucher => $dt )
                                        @php
                                        $get_count_advc++;
                                      $b_dt++;
                                         if($b_dt == 1)
                                         {
                                            $ab=0;
                                         }
                                         else {
                                             $ab++;
                                         }
                                          if($get_count_advc == 1)
                                          {
                                              $val=0;

                                          }
                                          else{
                                              $val++;
                                          }
                                          
                                            $count_pos++;
                                            $pos_advance=0;
                                        @endphp
                                             <tr style="text-align: center;">
                                                    <th class="bg-secondary" colspan="12">Miscellanies Tour Advance Request</th>
                                            </tr> 

                                            @php
                                            $rowCount_voucher =0;
                                            $voucher_no_vc_ad=0;
                                            $Remarks_vc = '';
                                          
                                         
                                            $conf_to_vc = Auth::user()->name;
                                            
                                            $status_vc =0;
                                            $has_vs=0;

                                            foreach($tour_reserve as $m_ad_dt)
                                            {
                                                foreach($dt as $trdt)
                                                {
                                                if($trdt->sup_id == $m_ad_dt->sup_id)
                                                {
                                                    $has_vs=1;
                                                }
                                                }

                                            }


                                                $voucher_no_vc_ad=0;
                                                $req_adv_date=0;
                                                $setle_dt_adv=0;
                                                $chk_available_mis_adv=0;

                                                foreach($has_dt as $get_voucher)
                                                {
                                                   
                                                    if($dt[0]->sup_id == $get_voucher->supplier_id)
                                                    {
                                                        $chk_available_mis_adv=1;
                                                        $voucher_no_vc_ad=$get_voucher->misc_voucher_no;
                                                        $req_adv_date=$get_voucher->Required_Date;
                                                        $setle_dt_adv=$get_voucher->Settlement_Date;
                                                        $Remarks_vc=$get_voucher->remarks;
                                                    }
                                                }
                                                        
                                          
                                            

                                        @endphp

                                 
                                        
                                       
                                        
                                            <tr class="table-info" style="text-align: center;">
                                                    
                                                    <th width="20%" colspan="2">Miscellanie</th>
                                                    <th width="20%" colspan="2">No Of Units</th>                                         
                                                    <th width="20%" colspan="2">Rate</th>
                                                    <th width="20%" colspan="2">Qty</th>
                                                    <th width="20%" colspan="4">Total</th>
                                                
                                            </tr>
                                            
                                            <tr>
                                                    <input id="mis_voucher_sup" type="hidden" value="">
                                                       <td style="text-align: left" class="table-success" width="100%" colspan="12">
                                                         <b>Supplier &nbsp; :&nbsp; {{$dt[$pos_advance]->sup_s_name}} </b>&nbsp;&nbsp;
                                                        </td>
                                                       
                                             </tr>

                                             @foreach ($dt as $item)
                                          
                                             @php
                                                 $pos_advance++;
                                             @endphp
                                            
                                             <input type="hidden" id="mis_res__add_{{$pos_advance}}_{{$count_pos}}" value="{{$item->id}}">
                                                <tr >                                                        
                                                    <td  style="text-align: center" colspan="2">{{$item->category}} &nbsp;&nbsp; &nbsp; &nbsp;  </td>
                                                    <input id="mis_voucher_mis" type="hidden" value="">
                                                <td  style="text-align: center" colspan="2">{{$item->mc_pax}}</td>
                                                     <input id="mis_voucher_nos" type="hidden" value="">
                                                <td style="text-align: center" colspan="2"> {{number_format($item->Rate)}}</td>
                                                     <input id="mis_voucher_rate" type="hidden" value="">
                                                <td   style="text-align: center" colspan="2">{{$item->qty}}</td>
                                                     <input id="mis_voucher_qty" type="hidden" value="">
                                                <td  style="text-align: center" colspan="4">{{number_format($item->totlkr)}}</td>
                                                     <input id="mis_voucher_tot" type="hidden" value="">
                                                </tr>
                                                
                                            @endforeach
                                                  
                                                <tr>
                                                <input id="pkg_count__advance_{{$count_pos}}" type="hidden" value="{{$pos_advance}}">
                                                    
                                                </tr>
                                                <tr>
                                                        <td colspan="12">
                                                                <div class="form-group m-form__group">
                                                                        <label for="exampleTextarea"><strong>Remarks:</strong></label>
                                                                <textarea class="form-control m-input" id="remarks_{{$count_pos}}" style="margin-top: 0px; margin-bottom: 0px; height: 50px;">{{$Remarks_vc}}</textarea>
                                                                </div>
                                                        </td>
                                                </tr>
                            
                                                <tr>
                                                    <td style="vertical-align: top; text-align: left;" colspan="4">
                                                         <table class="table-secondary" width="100%">
                                                            <thead>
                                                                   {{-- {{$pos}}  --}}
                                                                    <tr  style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">Requested For :</th>
                                                                    <td><input disabled  id="rq_for_{{$count_pos}}" type="text" value="{{$title_tour}}" class="form-control form-control"></td>
                                                                        
                                                                    </tr>   
                                                                    <tr  style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">Required Date :</th>
                                                                    <td><input  id="rq_dt_{{$count_pos}}" type="text" value="{{$req_adv_date}}" class="form-control dtpic-format form-control-sm"></td>
                                                                        
                                                                    </tr>   
                                                                    <tr style="text-align: right; padding-left: 5px; margin-bottom: 0px; padding-top:5px;">
                                                                            <th width="20%">Settlement Date :</th>
                                                                    <td><input  id="st_dt_{{$count_pos}}" type="text" value="{{$setle_dt_adv}}" class="form-control dtpic-format form-control-sm"></td>
                                                                        
                                                                    </tr>   
                                                               
                                                            </thead>     
                                                        </table>      
                                                    </td>
                                                   
                                                        
                                                </tr>

                                                <tr class="bg-secondary">
                                                    {{-- {{$a}} --}}
                                                  
                                                    {{-- {{$hasVoucher_list_misc_advacne[$a]->misc_voucher_no}} --}}
                                                    <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                                          
                                                    <button  onclick="ganarate_voucher_misc_advance('{{$voucher}}','{{$count_pos}}')" @if($chk_available_mis_adv ==1) disabled  @endif type="button" class="btn btn-primary m-btn m-btn--icon"> 
                                                                            <span>
                                                                                <i class="la la-level-up"></i>
                                                                                <span>Submit</span>
                                                                            </span>
                                                                    </button>

                                                                <a href="{{route('misc_reserve_advance_generate_voucher_dt',$voucher_no_vc_ad)}}" > <button type="button" class="btn btn-warning m-btn m-btn--icon">
                                                                            <span>
                                                                                <i class="la la-print"></i>
                                                                                <span>Print Voucher</span>
                                                                            </span>
                                                                    </button>
                                                                </a>
                                                                    <button type="button" class="btn btn-info m-btn m-btn--icon">
                                                                            <span>
                                                                                <i class="la la-floppy-o"></i>
                                                                                <span>Save as PDF</span>
                                                                            </span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-success m-btn m-btn--icon">
                                                                            <span>
                                                                                <i class="la la-calendar-check-o"></i>
                                                                                <span>Confirm</span>
                                                                            </span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger m-btn m-btn--icon">
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
@include('tour_section_bookings.js.misc_view_js')

@endsection