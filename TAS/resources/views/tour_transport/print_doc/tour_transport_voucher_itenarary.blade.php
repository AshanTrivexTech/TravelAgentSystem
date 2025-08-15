@extends('layouts.print_doc') 
@section('content')

<style>
    #m_subhead {
  /* width: 150px; */
  min-width: 1000px;
  max-width: 1000px;
  white-space: nowrap; 
  overflow: hidden;
}
</style>
{{-- @php
    $noOfDays =$days_tour;
	$frmdate = $tourQuotHeader->frm_date;
	$tourCode = $tourQuotHeader->tour_code;
	$tourID = $tourQuotHeader->tour_id;
	$tourVersion =$tourQuotHeader->version_id;
	$tourStDate = $tourQuotHeader->frm_date;
    $tourEnDate = $tourQuotHeader->to_date;
    $total=0;
@endphp --}}

<div id="m_subhead" class="m-subheader ">
    <br>
    <br>
    <div class="row">
        <div width="200px" class="col-md-3">
                <img width="200px" src="{{URL::asset('assets/app/media/img/logos/logo1.png')}}">
        </div>
        <div style="text-align: left;" class="col-md-8">
            <h1 class="m-subheader__title">
                {{-- {{$companyName}} --}}
            </h1>

                {{-- <h5>{{$address}}</h5>
                <h5>{{$telephone}}</h5>
                <h5>{{$web_mail}}</h5>   --}}
        </div>
        <div class="col-md-12"><hr></div>
                    
    </div>
    <div class="row">
            <div style="text-align: center;" class="col-md-12">
              <table width="100%" class="table table-sm table-bordered">
                  <thead>
                      <tr width="200px" style="text-align: center;">
                          <th colspan="4"><h3>PARTICULARS OF HIRE </h3></th>
                      </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
              </table>
           </div>
      </div>
      <br>
      <br>
      <div class="row">
            <div class="col-md-12">
                
                <table width="100%" class="table table-sm table-bordered">
                    <thead>
                        <tr class="bg-secondary" style="text-align: center;">
                                <th width="15%">Date</th>
                                <th width="70%">Itinerary</th>
                                <th width="15%">Total Mileage</th>
                        </tr>

                    </thead>
                
                <tbody style="text-align: center;">
                       <tr>
                           
                           <td></td>
                           <td></td>
                           <td></td>
                       </tr>

                </tbody>
            </table>
            </div>
      </div>
      

   
    {{-- <div class="row">
        <div class="col-md-12">
                <table width="100%" class="table table-bordered">
                        <thead>
                                <tr style="text-align: center;"  class="bg-secondary" >
                                    
                                    <th width="8%">Date</th>
                                     <th >Locations</th>
                                   
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
            
            
                                        
                                        
                                      
                                        <td style="text-align: center;">{{$date}}</td>
                                     
                                            <td>
                                                <div id="dist_{{$i}}" style="text-align: left;" >
                                                    
                                                    @foreach ($LocationDtList_gp as $day => $LcDist)
                                                   
                                          
                                                            @if($day == $i)
                                                                        
                                                                        @foreach ($LcDist as $Dist)                                               
            
                                                                          
                                                                          
                                                                            {{$Dist->lc_name}}&nbsp;/&nbsp;                                           
                                                                            
                                                                                
                                                                        @endforeach
                                                                        
                                                                
                                                            @endif
                                                            
                                                    @endforeach
                                                    
            
                                                </div>
                                            </td>
                                     
                                     
                                    </tr>
                                    
            
                                @endfor
                              
                                
                            </tbody>  
                </table>
        </div>
    </div> --}}
    
        {{-- <div class="row">
                <div class="col-md-12">
                    <hr>
                    <table width="100%" class="table table-sm table-bordered">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th width="15%"><h6>VEHICLE No:</h6></th>
                                    <td width="20%"><b>{{strtoupper($trns_vouchers[0]->reg_no)}}</b></td>
                                    <th width="15%"><h6>VEHICLE OWNER: </h6></th>
                                    <td width="35%">{{strtoupper($trns_vouchers[0]->sup_s_name)}}</td>
                                    
                                </tr>
                                <tr>
                                      <th><h6>DRIVER: </h6></th>
                                      <td>{{strtoupper($trns_vouchers[0]->driver_name)}}</td>
                                      <th><h6>CONDUCTOR  : </h6></th>
                                      <td>{{strtoupper($trns_vouchers[0]->driver_name)}}</td>
                                      
                                </tr>
                                <tr>
                                      <th><h6>REMARKS: </h6></th>
                                      <td>{{$trns_vouchers[0]->remarks}}</td>
                                      
                                </tr>
                               
                                
                            </tbody>
                        </table>           
              </div>
            </div> --}}
            <hr>
            <div class="row">
                    <div class="col-md-12">
                        <div><h6><span class="dot" >*<span> transport bills should be submitted to the accounts department
                            three days after the completion<br>&nbsp;&nbsp;&nbsp;of the hire.If the bills are not
                            submitted before the dead line,your payment will be calculated on the<br>
                            &nbsp;&nbsp;&nbsp;standard mileage basis.</h6></div>
                        
                    </div>
                </div>
                <br>
                <div class="row">
                        <div class="col-md-12">
                            <div><h6><span class="dot" >*<span>The above checklist must be completed by the driver prior to every hire.Payment will not be made if the checklist is incomplete
                                
                                </h6></div>
                            
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                    <table width="100%" class="table table-sm table-bordered">
                                            <thead>
                                                <tr class="" style="text-align: center;">
                                                        <th width="15%">
                                                            <tr>
                                                                   <th><h6>_______________ </h6></th>
                                                                   <td></td>
                                                                    
                                                            </tr>
                                                            <tr>
                                                                    <th>
                                                                     <h6>Transport Dept</h6>
                                                                    </th>
                                                                    <td></td>
                                                                        
                                                            </tr>
                                                        </th>
                                                </tr>
                                            </thead>
                                    </table>
                                
                            </div>
                        </div>

</div>
{{-- <div class="m-content">
       
</div> --}}
@endsection @section('Page_Scripts') @parent
{{-- <script>

window.print();</script> --}}
@endsection