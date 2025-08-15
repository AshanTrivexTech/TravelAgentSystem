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
    $total=0;
@endphp
 
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        Tour Route 
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
                    <div class="col-sm-8">
                        <form class="cleafix" method="POST" action="">
                     
                            {{-- <div style="overflow-x:auto;"> --}}
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
                                                           
                                                       {{-- <td style="text-align: center;">
                                                         
                                                               <select class="form-control m-bootstrap-select m_selectpicker" id="sl_{{$i}}" onchange="OnChagedselect({{$i}})" data-live-search="true">
                                                                       
                                                                   <Option value="0" selected>Select locations</Option>
                                                                       
                                                                    @foreach ($location_gp as $key =>$locations)
                                                                       <optgroup label="{{$key}}">
                                                                           @foreach ($locations as $location)
                                                                               <option value="{{$location->id}}">{{$location->location_name}} - {{$location->location_code}}</option>
                                                                           @endforeach
                                                                        </optgroup>
                                                                    @endforeach
                                                                  
                                                               </select>
                                                           </td> --}}
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
                                                           
                                                       {{-- <td style="text-align: center;">
                                                              
                                                               <div class="btn-group" role="group" aria-label="First group">
                                                               <button type="button" id="btn_rm{{$i}}" onclick="removeLocation({{$i}})" class="m-btn btn btn-primary" title="Back">
                                                                           <i class="la la-arrow-circle-o-left"></i>
                                                                       </button>
                                                                       <button type="button" id="btn_rmall{{$i}}" onclick="removeLocationAll({{$i}})" class="m-btn btn btn-danger" title="Delete All" >
                                                                           <i class="la la-trash-o"></i>
                                                                       </button>                                           
                                                                   </div>
                                                       </td> --}}
                                                       <td style="text-align: center;">
                           
                                                           
                                                           <label class="form-control-label" id="totlb_{{$i}}" >{{$ttlRowkms}}</label>
                           
                           
                                                       </td>
                                                       {{-- <td style="text-align: center;">
                                                       
                                                       <input placeholder="0.00" id="tottb_{{$i}}" style="text-align: center;" type="text" onchange="totalSum()" value="{{$ttkm}}" class="form-control m-input">                              
                                                           
                                                       </td>    --}}
                                                   </tr>
                                                   
                           
                                               @endfor
                           
                                               <tr style="text-align: center;">                       
                                                   <td style="text-align: right; padding: 8px 0px 0px 0px" colspan="3"><label><b>Total Milage&nbsp;:&nbsp;&nbsp;</b></label></td>
                                               <td style="text-align: center; padding: 8px 0px 0px 0px"><label><b id="totlb">{{$total}}</b></label></td>
                                                   {{-- <td style="text-align: center; padding: 8px 0px 0px 0px" ><label><b id="tottb">0.00</b></label></td> --}}
                                               </tr>
                                               
                                           </tbody>
                                           
                                   </table>
                               {{-- </div> --}}
                               <br>
                                       {{-- <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                               <div class="m-form__actions m-form__actions--solid">
                                                   <div class="row">
                                                       <div class="col-lg-2">
                                                       
                                                           <button class="btn btn-primary" type="button" id="save_direction" >Save Route Details</button>
                                                       
                                                       </div>
                                                   </div>
                                               </div>
                                       </div> --}}
                               
                           </form>
                           
                    </div>
                        
                    
                
                </div>
            
                       
                        
                 
            

            
       
        </div>
    </div>

</div>

@endsection
