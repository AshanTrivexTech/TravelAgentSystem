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
                                                                        
                                                                       @foreach ($tourQuoteHotel_gp as $day => $htpkg)
                                                                           
                                                                       @if($day == $i)
                                                                         @foreach ($htpkg as $hotepkgs)
                                                                                
                                                                                @php
                                                                                    $sgl_qty = $al_sgl;
                                                                                    $dbl_qty = $al_dbl;
                                                                                    $twn_qty = $al_twn;
                                                                                    $tbl_qty = $al_tbl;
                                                                                    $qd_qty = $al_qd;
                        
                                                                                    $sgl_totcost =0;
                                                                                    $dbl_totcost =0;
                                                                                    $twn_totcost =0;
                                                                                    $tbl_totcost =0;
                                                                                    $qd_totcost =0;
                        
                        
                                                                                    $totalRMCost = 0;
                                                                                    $totalSUPCost = 0;
                                                                                    $hotel_dt_id_qt =0;
                                                                                    $block_state = 0;

                                                                                    $reserve_ID = 0;
                                                                                    
                                                                                     foreach($tour_resr_rmQty as $rmqty){
                        
                                                                                            if(($rmqty->tour_day == $i) && ($rmqty->pos == $hotepkgs->pos)){
                                                                                                
                                                                                                $sgl_qty = $rmqty->sgl_qty;
                                                                                                $dbl_qty = $rmqty->dbl_qty;
                                                                                                $twn_qty = $rmqty->twn_qty;
                                                                                                $tbl_qty = $rmqty->tbl_qty;
                                                                                                $qd_qty = $rmqty->qd_qty;
                        
                        
                                                                                                $sgl_totcost = $hotepkgs->ss_rate * $sgl_qty;
                                                                                                $dbl_totcost = $hotepkgs->db_rate * $dbl_qty;
                                                                                                $twn_totcost = $hotepkgs->db_rate * $twn_qty;
                                                                                                $tbl_totcost = $hotepkgs->trp_rate * $tbl_qty;
                                                                                                $qd_totcost = $hotepkgs->qtb_rate * $qd_qty;
                        
                                                                                                $totalRMCost = $rmqty->total_rmc;
                                                                                                $totalSUPCost = $rmqty->total_sup;
                                                                                                $block_state=$rmqty->status;
                                                                                                $reserve_ID = $rmqty->id;
                                                                                                $hotel_dt_id_qt = $rmqty->tqhtd_id;
                                                                                            }
                                                                                        
                                                                                     }
                                                                                @endphp
                        
                        
                                                                          <table class="table table-bordered table-sm" width="100%">
                                                                                <thead>
                                                                                    <tr class="bg-secondary">                                            
                                                                                        <th style="text-align: right;" width="10%"><b>Hotel Name &nbsp;&nbsp;:&nbsp;</b></th>
                                                                                        <td width="30%"colspan="3"><b>{{$hotepkgs->sup_s_name}}</b></td>
                                                                                        <th style="text-align: right;" width="10%" width="10%"><b>Adult PAX &nbsp;&nbsp;:&nbsp;</b></th>
                                                                                        <td style="text-align: center;" width="5%"><b>{{$tourQuotHeader->pax_adult}}</b></td>
                                                                                        <th style="text-align: right;" width="10%" width="10%"><b>Children PAX &nbsp;&nbsp;:&nbsp;</b></th>
                                                                                        <td style="text-align: center;" width="5%"><b>{{$tourQuotHeader->pax_child}}</b></td>
                                                                                        <th style="text-align: right;" width="10%"><b>Day &nbsp;&nbsp;{{$i}}&nbsp;&nbsp;  Date &nbsp;&nbsp;:&nbsp;</b></th>
                                                                                        <td style="text-align: center;" width="20%"><b>{{$date}}</b></td>                                          
                                                                                    </tr>
                                                                                    <tr class="table-success" style="text-align: center;">
                                                                                        <th width="55%" colspan="5">Package Details</th>
                                                                                        <th width="5%">P.C</th>                                                            
                                                                                        <th width="10%">SGL</th>
                                                                                        <th width="10%">DBL</th>
                                                                                        <th width="10%">TBL</th>
                                                                                        <th width="10%">&nbsp;QD&nbsp;</th>                                                            
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="table-info" style="text-align: center;">
                                                                                        <td colspan="5" style="text-align: left;">
                                                                                            <b>
                                                                                               <span>&nbsp;{{$hotepkgs->Package_name}} &nbsp;-&nbsp; {{$hotepkgs->r_type}}-{{$hotepkgs->meal_plane}}  &nbsp;&nbsp; {{$hotepkgs->from_date}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$hotepkgs->to_date}}</span>
                                                                                            </b>
                                                                                        </td>
                                                                                        <th style="text-align: center;">{{$hotepkgs->crcode}}</th>                                                            
                                                                                        <td><b>{{number_format($hotepkgs->ss_rate,2)}}</b></td>
                                                                                        <td><b>{{number_format($hotepkgs->db_rate,2)}}</b></td>
                                                                                        <td><b>{{number_format($hotepkgs->trp_rate,2)}}</b></td>
                                                                                        <td><b>{{number_format($hotepkgs->qtb_rate,2)}}</b></td>
                                                                                        <input id="accmd_reserve_up_id_{{$hotepkgs->pos}}_{{$day}}" type="hidden" value="{{$reserve_ID}}">
                                                                                        <input id="tour_qt_htd_id_{{$hotepkgs->pos}}_{{$day}}" type="hidden" value="{{$hotepkgs->id}}">
                                                                                        <input id="pkg_sgl_{{$hotepkgs->pos}}_{{$day}}" type="hidden" value="{{$hotepkgs->ss_rate}}">
                                                                                        <input id="pkg_dbl_{{$hotepkgs->pos}}_{{$day}}" type="hidden" value="{{$hotepkgs->db_rate}}">
                                                                                        <input id="pkg_tbl_{{$hotepkgs->pos}}_{{$day}}" type="hidden" value="{{$hotepkgs->trp_rate}}">
                                                                                        <input id="pkg_qd_{{$hotepkgs->pos}}_{{$day}}" type="hidden" value="{{$hotepkgs->qtb_rate}}">
                                                                                        <input type="hidden" id="pkg_htdtId_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotel_dt_id_qt}}">
                                                                                  </tr> 
                                                                                    <tr style="text-align: center;"> 
                                                                                            <td style="vertical-align: top; text-align: left;" colspan="6">
                                                                                                <table class="table table-bordered table-sm" width="100%">
                                                                                                    <thead>
                                                                                                            <tr style="text-align: center;" class="table-danger">
                                                                                                                    <th width="44%">Compulsory Supliments</th>
                                                                                                                    {{-- <th>SP.C</th>
                                                                                                                    <th>Ex Rate</th> --}}                                                                                            
                                                                                                                    <th width="18%">Sup Rate</th>
                                                                                                                    <th  width="18%">Pax/Rooms</th>
                                                                                                                    <th width="10%">Amount</th>                                                                                            
                                                                                                                    <th width="10%">Appy</th> 
                                                                                                            </tr>
                                                                                                    </thead>
                                                                                                    <tbody id="comsup_mlist_{{$hotepkgs->pos}}_{{$day}}">                                                                               
                                                                                                        
                                                                                                          @foreach ($tourQouHotelComSup_gp as $csupDay => $c_sup_sp)
                        
                                                                                                              @if ($csupDay == $i)
                                                                                                              
                                                                                                              @foreach ($c_sup_sp as $cmp_supLs)
                                                                                                                 @if ($cmp_supLs->pos == $hotepkgs->pos)
                                                                                                                    @php
                                                                                                                        $str_comsup='';     
                                                                                                                        if($cmp_supLs->rate_type==0){
                                                                                                                            $rateTypeCmp = 'PP Rate';
                                                                                                                        }else{
                                                                                                                            $rateTypeCmp = 'PR Rate';
                                                                                                                        }
                                                                                                                        // $str_comsup .='CMP SUP/'.$rateTypeCmp.'/'.$baseCurrncyCode.' '.number_format(($cmp_supLs->csup_amount/$cmp_supLs->exrate),2).'/- , ';
                                                                                                                    @endphp
                                                                                                                    <tr style="text-align: center;">
                                                                                                                            <td style="text-align: left;">{{$cmp_supLs->cs_code}} / {{$cmp_supLs->des}} /{{$hotepkgs->crcode}}  - {{$rateTypeCmp}}</td>
                                                                                                                            {{-- <td>{{$baseCurrncyCode}}</td> --}}
                                                                                                                            {{-- <td>{{$cmp_supLs->exrate}}</td> --}}
                                                                                                                            <td>{{number_format($cmp_supLs->csup_amount,2)}}</td>
                                                                                                                            <td>
                                                                                                                            <input placeholder="0" onkeyup="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="cmp_sup_qty_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" style="text-align: center;" type="text"  value="{{$cmp_supLs->qty}}" class="form-control form-control-sm">
                                                                                                                            </td>
                                                                                                                            <td>{{number_format($cmp_supLs->csup_amount,2)}}</td>
                                                                                                                            
                                                                                                                            <td>
                                                                                                                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                                                                                                            <input onchange="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="cmpsup_chk_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="checkbox" @if($cmp_supLs->cheked == 1) checked @endif>&nbsp;
                                                                                                                                            <span></span>
                                                                                                                                    </label>
                                                                                                                            </td>
                                                                                                                    <input id="cmpsup_id_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->compulsory_supliment_id}}">
                                                                                                                    <input id="cmpsup_amt_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->csup_amount}}">
                                                                                                                    <input id="cmpsup_exrate_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->exrate}}">
                                                                                                                    <input id="cmpsup_ratetype_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->rate_type}}">
                                                                                                                    <input id="cmpsup_rowID_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->id}}">
                                                                                                                    
                                                                                                                </tr>
                                                                                                                @endif
                                                                                                              @endforeach
                                                                                                            @endif
                                                                                                         @endforeach   
                                                                                                       
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <table class="table table-bordered table-sm" width="100%">
                                                                                                        <thead>
                                                                                                                <tr style="text-align: center;" class="table-warning">
                                                                                                                        <th width="44%">Optional Supliments</th>                                                                                                                                                                                               
                                                                                                                        <th width="18%">Sup Rate</th>
                                                                                                                        <th width="18%">Pax/Rooms</th>
                                                                                                                        <th width="10%">Amount</th>
                                                                                                                        <th width="10%">Appy</th> 
                                                                                                                </tr>
                                                                                                        </thead>
                                                                                                        <tbody id="optsup_mlist_{{$hotepkgs->pos}}_{{$day}}">                                                                               
                                                                                                                @foreach ($tourQouHotelOptSup_gp as $opsupDay => $op_sup_sp)
                        
                                                                                                                @if ($opsupDay == $i)
                                                                                                                
                                                                                                                @foreach ($op_sup_sp as $ops_supLs)
                                                                                                                   @if ($ops_supLs->pos == $hotepkgs->pos)
                                                                                                                      @php
                                                                                                                          $str_comsup='';     
                                                                                                                          if($ops_supLs->rate_type==0){
                                                                                                                              $rateTypeops = 'PP Rate';
                                                                                                                          }else{
                                                                                                                              $rateTypeops = 'PR Rate';
                                                                                                                          }
                                                                                                                          // $str_comsup .='CMP SUP/'.$rateTypeCmp.'/'.$baseCurrncyCode.' '.number_format(($cmp_supLs->csup_amount/$cmp_supLs->exrate),2).'/- , ';
                                                                                                                      @endphp
                        
                                                                                                                      <tr style="text-align: center;">
                                                                                                                              <td style="text-align: left;">{{$ops_supLs->ops_code}} / {{$ops_supLs->des}} /{{$hotepkgs->crcode}}  - {{$rateTypeops}}</td>                                                                                                      
                                                                                                                              <td>{{number_format($ops_supLs->opsup_amount,2)}}</td>
                                                                                                                              <td>
                                                                                                                              <input placeholder="0" onkeyup="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="optsup_qty_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" style="text-align: center;" type="text"  value="{{$ops_supLs->qty}}" class="form-control form-control-sm">
                                                                                                                              </td>
                                                                                                                              <td>{{number_format($ops_supLs->opsup_amount,2)}}</td>
                                                                                                                              
                                                                                                                              <td>
                                                                                                                                      <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                                                                                                              <input onchange="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="opssup_chk_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="checkbox" @if($ops_supLs->cheked == 1) checked @endif >&nbsp;
                                                                                                                                              <span></span>
                                                                                                                                      </label>
                                                                                                                              </td>
                        
                                                                                                                            <input id="optsup_id_added_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="hidden" value = "{{$ops_supLs->optional_supliment_id}}">
                                                                                                                            <input id="optsup_amt_added_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="hidden" value = "{{$ops_supLs->opsup_amount}}">                                                                                       
                                                                                                                            <input id="optsup_ratetype_added_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="hidden" value = "{{$ops_supLs->rate_type}}">
                                                                                                                            <input id="optsup_rowID_added_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="hidden" value = "{{$ops_supLs->id}}">
                                                                                                                      </tr>
                                                                                                                  @endif
                                                                                                                @endforeach
                                                                                                              @endif
                                                                                                           @endforeach 
                                                                                                            
                                                                                                           
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                            </td>
                                                                                            <td style="vertical-align: top; text-align: left;" colspan="4">
                                                                                                <table class="table table-bordered table-sm" width="100%">
                                                                                                    <thead style="text-align: right;" class="table-secondary">
                                                                                                        <tr style="text-align: center;">
                                                                                                                <th>Room</th>
                                                                                                                <th width="25%">QTY</th>
                                                                                                                <th>Amount</th>
                                                                                                                {{--<th>Sup Amount</th>--}}
                                                                                                                {{--<th>Room+SUP</th>--}}
                                                                                                        </tr>                                                                                
                                                                                                        <tr>
                                                                                                            <td>SGL :</td>
                                                                                                            <td style="text-align: center;">                                                                                        
                                                                                                                
                                                                                                            <input  onkeyup="calAll('{{$day}}','{{$hotepkgs->pos}}')" placeholder="0.00" id="sgl_qty_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;" type="text"  value="{{$sgl_qty}}" class="form-control form-control-sm">
                                                                                                            </td>
                                                                                                        <td id="sgl_rmcost_{{$hotepkgs->pos}}_{{$day}}">{{number_format($sgl_totcost,2)}}</td>
                                                                                                            
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>DBL :</td>
                                                                                                            <td style="text-align: center;">
                                                                                                                    <input onkeyup="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="dbl_qty_{{$hotepkgs->pos}}_{{$day}}" placeholder="0.00" id="" style="text-align: center;" type="text"  value="{{$dbl_qty}}" class="form-control form-control-sm">
                                                                                                            </td>
                                                                                                            <td id="dbl_rmcost_{{$hotepkgs->pos}}_{{$day}}">{{number_format($dbl_totcost,2)}}</td>
                                                                                                            {{--<td id="dbl_supcost_{{$hotepkgs->pos}}_{{$day}}">0.00</td>--}}
                                                                                                            {{--<td id="dbl_rs_tot_{{$hotepkgs->pos}}_{{$day}}">0.00</td>--}}
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                                <td>TWIN :</td>
                                                                                                                <td style="text-align: center;">
                                                                                                                        <input  onkeyup="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="twn_qty_{{$hotepkgs->pos}}_{{$day}}" placeholder="0.00" id="" style="text-align: center;" type="text"  value="{{$twn_qty}}" class="form-control form-control-sm">
                                                                                                                </td>
                                                                                                                <td id="twn_rmcost_{{$hotepkgs->pos}}_{{$day}}">{{number_format($twn_totcost,2)}}</td>
                                                                                                                {{--<td id="twn_supcost_{{$hotepkgs->pos}}_{{$day}}">0.00</td>--}}
                                                                                                                {{--<td id="twn_rs_tot_{{$hotepkgs->pos}}_{{$day}}">0.00</td>--}}
                                                                                                            </tr>
                                                                                                        <tr>
                                                                                                            <td>TBL :</td>
                                                                                                            <td style="text-align: center;">
                                                                                                                    <input  onkeyup="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="tbl_qty_{{$hotepkgs->pos}}_{{$day}}" placeholder="0.00" id="" style="text-align: center;" type="text"  value="{{$tbl_qty}}" class="form-control form-control-sm">
                                                                                                            </td>
                                                                                                            <td id="tbl_rmcost_{{$hotepkgs->pos}}_{{$day}}">{{number_format($tbl_totcost,2)}}</td>
                                                                                                            {{--<td id="tbl_supcost_{{$hotepkgs->pos}}_{{$day}}">0.00</td>--}}
                                                                                                            {{--<td id="tbl_rs_tot_{{$hotepkgs->pos}}_{{$day}}">0.00</td> --}}
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>QD :</td>
                                                                                                            <td style="text-align: center;">
                                                                                                                    {{-- @if($block_state!=0) disabled @endif --}}
                                                                                                                    <input  onkeyup="calAll('{{$day}}','{{$hotepkgs->pos}}')" id="qd_qty_{{$hotepkgs->pos}}_{{$day}}" placeholder="0.00" id="" style="text-align: center;" type="text"  value="{{$qd_qty}}" class="form-control form-control-sm">
                                                                                                            </td>
                                                                                                            <td id="qd_rmcost_{{$hotepkgs->pos}}_{{$day}}">{{number_format($qd_totcost,2)}}</td>
                                                                                                            {{--<td id="qd_supcost_{{$hotepkgs->pos}}_{{$day}}">0.00</td>--}}
                                                                                                            {{--<td id="qd_rs_tot_{{$hotepkgs->pos}}_{{$day}}">0.00</td>--}}
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                </table>
                                                                                            </td>                                                         
                                                                                    </tr>
                                                                                    <tr  style="text-align: center;">
                                                                                    
                                                                                        <th style="text-align: right;" class="table-secondary" colspan="4">Total Supplement :</th>
                                                                                    <th colspan="2"><b id="pkg_suptot_{{$hotepkgs->pos}}_{{$day}}">{{number_format($totalSUPCost,2)}}</b></th>
                                                                                        <th class="table-secondary" style="text-align: right;" colspan="2">Net Total Amount :</th>
                                                                                        <th style="text-align: right;" colspan="2"><b id="pkg_total_{{$hotepkgs->pos}}_{{$day}}">{{number_format($totalRMCost,2)}}</b></th>
                        
                                                                                    </tr>
                                                                                    <tr style="text-align: center;" class="table-secondary">
                                                                                            
                                                                                            <th colspan="6">
                                                                                                                                                                        
                                                                                            </th>
                                                                                                                                                    
                                                                                            <th style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="4">
                                                                                                    @if($block_state!=0)
                                                                                                            <button @if($block_state!=2) disabled @else @endif type="button" class="btn btn-info m-btn m-btn--icon" onclick="amend_Accmd_Voucher('{{$day}}','{{$hotepkgs->pos}}')">
                                                                                                                    <span>
                                                                                                                        <i class="la la-calendar-check-o"></i>
                                                                                                                        <span>Amend Voucher</span>
                                                                                                                    </span>
                                                                                                            </button>
                                                                                                    @endif
                                                                                                    <button @if($block_state==2) disabled @else onclick="storeSave('{{$day}}','{{$hotepkgs->pos}}')" @endif type="button" class="btn btn-success m-btn m-btn--icon">
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
                        
                        
                                                                                    {{-- <tr style="text-align: center;" class="table-secondary">
                                                                                                                                                
                                                                                        </tr> --}}
                                                                                
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
                                                        
                                                        
                                                       <br>
                                                                                                                      
                                                   </form>
                                    </div>

                                    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                            
                                    
                                    <div>
                                        @include('tour_section_bookings.components.hotel_voucher_view_list')  
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                            @include('tour_section_bookings.components.rooming_list')
                                            @include('tour_section_bookings.components.rooming_list_select_clients_model')
                                    </div>
                                    @include('tour_section_bookings.components.hotel_voucher_view_modal')
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