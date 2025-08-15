@extends('layouts.tas_app') 
@section('content')

 
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        Tour Vehicle Request
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

    @php
        $totmilageTour = $tourQuotHeader->millage;
        $basecomisionRate = $tourQuotHeader->com_rate; 
        $tourID = $tourQuotHeader->tour_id;
        $tourQuotHeaderId = $tourQuotHeader->id;
        $tourVersion =$tourQuotHeader->version_id;
        $tourCode = $tourQuotHeader->tour_code;   

        $totaladltPax = $tourQuotHeader->pax_adult;
        $totalChildPax = $tourQuotHeader->pax_child; 
        
        $baseCurrncyCode  = $tourQuotHeader->cr_code;
        $qtn_type = $tourQuotHeader->qtn_type; 
    @endphp

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                
                <div class="m-portlet__head-title">
                     
                    <h3 class="m-portlet__head-text">                           
                              
                    Tour Code :  {{$tourQuotHeader->tour_code}}                                  
                            
                            
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
                              
                            @if($qtn_type==2)
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Vehicle Details</a>
                                </li>
                            @endif
                                <li class="nav-item">
                                    <a class="nav-link @if($qtn_type==1) active show @endif" data-toggle="tab" href="#" data-target="#m_tabs_1_2">Transport Details</a>
                                </li>											
                                <li class="nav-item">
                                    <a class="nav-link"  data-toggle="tab" href="#m_tabs_1_3">Request</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" data-toggle="tab" href="#m_tabs_1_4">Status</a>
                                </li>
                            </ul>


                        

                            <div class="tab-content">

                               @if($qtn_type==2)
                                    <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                            
                                                @include('tour_section_bookings.components.gp_transport_details')
                                            
                                    </div>
                                @endif
                                

                        <div class="tab-pane @if($qtn_type==1) active show @endif" id="m_tabs_1_2" role="tabpanel">
                        <form class="cleafix" method="POST" action="">
                            <div style="overflow-x:auto;">
                                <table class="table table-sm" width="100%">
                                    <thead>
                                        <tr class="table-secondary">    
                                            
                                        <th style="text-align: center;" colspan="12" >Transport Details</th>
                                                
                                        </tr>                                        
                                    </thead>
                                    <tbody>
                                        @php
                                            $count=0;
                                        @endphp
                                    </tbody>
                                   </table>
                                    <table class="table table-bordered table-sm" width="100%">
                                      <thead>
                                      <tr class="table-success" style="text-align:left;">
                                      <th width="100%" colspan="12">
                                        &nbsp;  Tour Start Date:&nbsp;&nbsp;<b>{{$tourQuotHeader->frm_date}}</b>&nbsp;&nbsp;&nbsp; Tour End Date:&nbsp;&nbsp;<b>{{$tourQuotHeader->to_date}}</b>
                                      </th>

                                      </tr>
                                      </thead>
                                      <tbody>
                                      <tr class="table-info" style="text-align: center;">
                                            <th width="10%" colspan="2">Vehicle Type</th>                                                            
                                            <th width="10%">No Of Seats</th>
                                        
                                            <th width="15%" colspan="2">From Date</th>
                                            <th width="15%" colspan="2">To Date</th>
                                            <th width="10%">Mileage</th>
                                            <th width="15%">Rate Per KM</th>
                                            <th width="15%">Total</th> 
                                            <th  width="5%">

                                                <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                    <input id="row_chk" onchange="select_chkbox_one({{$count}})" type="checkbox" >&nbsp;
                                                            <span></span>
                                                </label>


                                            </th>
                                        </tr>
                                        @php
                                             $count=0;
                                             $has_added=0;
                                        @endphp
                                        <tbody id="sel_td">
                                        @foreach($transport_details as $transport_detail)
                                        @php

                                            $count++;

                                               foreach($tr_reserve as $dt)
                                               {
                                                   if($transport_detail->trns_id==$dt->tour_quotation_transport_id)
                                                   {
                                                       $has_added=1;
                                                   }
                                               }

                                        @endphp
                                        {{-- {{$transport_detail->frm_date}} --}}
                                        
                                        {{-- <input type="hidden" value="10" id="frm_A_"{{1}}> --}}
                                        <input id="to_A_{{$count}}" type="hidden" value="{{$transport_detail->to_date}}">
                                        <input id="frm_A_{{$count}}" type="hidden" value="{{$transport_detail->frm_date}}">
                                        <tr id="sel_" @if($has_added==1) class="table-danger" @endif style="text-align: center;">
                                          {{-- {{$transport_detail}} --}}
                                        <input type="hidden" id="tr_id_{{$count}}" value="{{$transport_detail->trns_id}}">
                                            <td width="10%" colspan="2">{{$transport_detail->type}}</td>
                                            <td width="10%" >{{$transport_detail->no_of_seats}}</td>
                                            <td width="15%" colspan="2"><input id="m_datetimepicker_frm_date_{{$count}}" type="text" value="{{$tourQuotHeader->frm_date}}" class="form-control dtpic-format form-control-sm"></td>
                                            <td width="15%" colspan="2"><input id="m_datetimepicker_to_date_{{$count}}" type="text" value="{{$tourQuotHeader->to_date}}" class="form-control dtpic-format form-control-sm"></td>
                                            <td width="10%" >{{$transport_detail->millage}}</td>
                                            <td width="15%" >{{$transport_detail->rate_pkm}}</td>
                                            <td width="15%" >{{number_format($transport_detail->totlkr,2)}}</td>
                                            <td width="5%" >

                                                <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                <input id="row_chk_dt_{{$count}}"  @if($has_added==1) {{$has_added=0}}  @endif type="checkbox" >&nbsp;
                                                            <span></span>
                                                </label>

                                            </td>

                                        </tr>
                                        @endforeach
                                        <tbody/>
                                        </tbody>
                                        </table>
                                                   
                                        </td>                                                                               
                                        <table class="table table-bordered table-sm" width="100%">
                                        <thead>
                                        <tr style="text-align:right;">
                                                            
                                        <th class="table-secondary" colspan="6"></th>                                                           
                                        <th class="table-secondary" style="text-align: right;" colspan="2">Net Total Amount :</th>
                                        <th style="text-align: right;" colspan="2"><b id="pkg_total_"></b></th>
                            
                                        </tr>   
                                        </thead>
                                        <tbody id="comsup_mlist_">                                                                               
                                        <tr style="text-align: center;" class="table-secondary">
                                                                    
                                        <th colspan="6">
                                                                                                                                                                        
                                        </th>
                                                                                                                                                    
                                        <th style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="4">
                                        <button onclick="add_reserve_transpoart({{$count}})" type="button" class="btn btn-success m-btn m-btn--icon">
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
                                                            
   
                                            </td>
                                        </tr>
                                    
                                    </tbody>
                                </table>

                                </div>
                               <br>
                                      
                           </form>
                         </div>

                         {{-- abc --}}



                         @php
                             $count1=0;
                         @endphp

                         <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                <form class="cleafix" method="POST" action="">
                                    <div style="overflow-x:auto;"> 
                                        <table class="table table-sm" width="100%">
                                            <thead>
                                                <tr class="table-secondary">    
                                                    
                                                <th style="text-align: center;" colspan="10" >Transport Details</th>
                                                        
                                                </tr>                                        
                                            </thead>
                                            <tbody>
                                               
                                            </tbody>
                                           </table>
                                            <table class="table table-bordered table-sm" width="100%">
                                              <thead>
                                              <tr class="table-success" style="text-align: center;">
                                              <th width="100%" colspan="17">Vehicle Details</th>
                                                                                                                                     
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr class="table-info" style="text-align: center;">
                                                    <th width="5%" colspan="1">Vehicle Type</th>                                                            
                                                    <th width="10%" colspan="1">No Of Seats</th>
                                                    <th width="10%" colspan="2">Mileage</th>
                                                    <th width="10%" colspan="2">From Date</th>
                                                    <th width="10%" colspan="2">To Date</th>
                                                    <th width="10%" colspan="1">Rate Per KM</th>
                                                    <th width="10%" colspan="1">Total</th> 
                                                    <th width="5%" colspan="2">Status</th> 
                                                    <th  width="5%" colspan="1">
        
                                                        <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                            <input id="chk" onchange="select_chkbox_({{$count1}})" type="checkbox" >&nbsp;
                                                                    <span></span>
                                                        </label>
        
        
                                                    </th>
                                                </tr>
                                                @php
                                                    $count1=0;
                                                     
        
                                                @endphp
                                                <tbody id="sel_tdd">
                                                @foreach($reserve_transpoarts as $reserve_transpoart)
                                               
                                                @php

                                                    $count1++;
                                                     
        
                                                @endphp
                                               
                                                <tr style="text-align: center;">
                                                       
                                                        <input type="hidden" id="dta_{{$count1}}" value="{{$reserve_transpoart->id}}">
                                                    <td width="20%" colspan="1">{{$reserve_transpoart->type}}</td>
                                                    <td width="20%" colspan="1">{{$reserve_transpoart->no_of_seats}}</td>
                                                    <td width="10%" colspan="2">{{$reserve_transpoart->millage}}</td>
                                                    <td width="10%" colspan="2">{{$reserve_transpoart->frm_date}}</td>
                                                    <td width="10%" colspan="2">{{$reserve_transpoart->to_date}}</td>
                                                    <td width="10%" colspan="1">{{$reserve_transpoart->rate_pkm}}</td>
                                                    <td width="10%" colspan="1">{{$reserve_transpoart->totlkr}}</td>
                                                    <td width="5%" colspan="2">
                                                       @if($reserve_transpoart->status == 0)

                                                       <span class="m-badge m-badge--info m-badge--wide">New</span>
                                                        
                                                        @elseif($reserve_transpoart->status == 1)
                                                        <span class="m-badge m-badge--warning m-badge--wide">Pending</span>
                                                    @endif
                                                    
                                                        </td>
                                                    <td width="5%" colspan="2">
        
                                                        <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                        <input id="reserve_row{{$count1}}"  type="checkbox" >&nbsp;
                                                                    <span></span>

                                                        </label>
                                                        
                                                       
                                                    </td>
        
                                                </tr>
                                                @endforeach
                                                @php
                                                $count1=0;
                                                 
    
                                                 @endphp
                                                </tbody>
                                                </tbody>
                                                </table> 
                                                           
                                                </td>                                                                               
                                                <table class="table table-bordered table-sm" width="100%">
                                                <thead>
                                                <tr style="text-align:right;">
                                                                    
                                                <th class="table-secondary" colspan="6"></th>                                                           
                                                <th class="table-secondary" style="text-align: right;" colspan="2">Net Total Amount :</th>
                                                <th style="text-align: right;" colspan="2"><b id="pkg_total_"></b></th>
                                    
                                                </tr>   
                                                </thead>
                                                <tbody id="comsup_mlist_">                                                                               
                                                <tr style="text-align: center;" class="table-secondary">
                                                                            
                                                <th colspan="6">
                                                                                                                                                                                
                                                </th>
                                                                                                                                                            
                                                <th style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="4">
                                                <button onclick="send_request()" type="button" class="btn btn-success m-btn m-btn--icon">
                                                <span>
                                                <i class="la la-calendar-check-o"></i>
                                                <span>Request</span>
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
                                                                    
           
                                                    </td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
        
                                        </div>
                                       <br>
                                              
                                   </form>
                                 </div>

                         {{-- acb --}}

                        
                        </div>  
                        </div>

                        {{-- vouvjer --}}
                        
                                       
                                
                        </div>
                        
                </div>
        </div>
    </div>

</div>

@endsection
@section('Page_Scripts') @parent
@include('tour_section_bookings.js.transport_view_js')
@include('tour_section_bookings.js.gp_transport_details_js')

@endsection