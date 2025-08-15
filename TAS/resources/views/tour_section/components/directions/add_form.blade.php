<form class="cleafix" method="POST" action="">
    


 {{-- <div style="overflow-x:auto;"> --}}
        <table class="table table-bordered" width:="100%">
                <thead>
                    <tr style="text-align: center;">
                        <th width="5%">Day</th>
                        <th width="8%">Date</th>
                        <th width="15%">Destination</th>
                        <th >Locations</th>
                        <th width="8%">Action</th>
                        <th width="8%">Total(Km)</th>
                        <th hidden width="8%">Edit Mileage</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $totalTrmlg = 0;
                    @endphp

                    @for ($i = 1; $i <= $noOfDays; $i++)
                        
                        <tr>
                           
                           @php
                            
                                $date = date('Y-m-d', strtotime($frmdate. ' + '.($i-1).' days'));
                                $ttlRowkms = 0;
                                $ttkm = 0;

                            @endphp
                            
                            
                            <td style="text-align: center;">{{$i}} </td>
                            <td style="text-align: center;">{{$date}}</td>    
                            <td style="text-align: center;">
                              
                                   

                                    <select style="width:200px;" class="form-control m-bootstrap-select m_selectpicker newmpikdir" data-live-search="true" id="m_select2_{{$i}}_dir" onchange="OnChagedselect({{$i}})">
                                       
                                       
                                       
                                        <Option value="0" selected >Select locations</Option>                                       
                                        
                                        @foreach ($location_gp as $key =>$locations)
                                            
                                                @foreach ($locations as $location)
                                                    
                                                    <option value="{{$location->id}}">{{$location->location_name}} - {{$location->location_code}}</option>

                                                @endforeach
                                            
                                            @endforeach
                                    </select>

                                   
                              

                                </td>
                                <td>
                                    <div id="dist_{{$i}}" style="text-align: left;" >
                                        
                                        @foreach ($LocationDtList_gp as $day => $LcDist)
                                       
                                                @if($day == $i)
                                                            
                                                            @foreach ($LcDist as $Dist)                                               

                                                                <span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"  id="sp{{$Dist->pos}}_{{$day}}" title="{{$Dist->lc_name}}">
                                                                <input id="hdLC_id{{$Dist->pos}}_{{$day}}" value="{{$Dist->kms}}" type="hidden" name="{{$Dist->location_id}}">
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
                                       @php
                                           $totalTrmlg = $totalTrmlg+$ttlRowkms;
                                       @endphp                         
                                    </div>
                                </td>
                                
                            <td style="text-align: center;">
                                   
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <button type="button" id="btn_rm{{$i}}" onclick="removeLocation({{$i}})" class="m-btn btn btn-primary" title="Back">
                                                <i class="la la-arrow-circle-o-left"></i>
                                            </button>
                                            <button type="button" id="btn_rmall{{$i}}" onclick="removeLocationAll({{$i}})" class="m-btn btn btn-danger" title="Delete All" >
                                                <i class="la la-trash-o"></i>
                                            </button>
                                            <button type="button" id="add_route{{$i}}" onclick="addRoute({{$i}})" class="m-btn btn btn-success" data-toggle="modal" data-target="#m_modal_6_route" title="Select Route" >
                                                    <i class="fa fa-plus-square"></i>
                                            </button>                                      
                                        </div>
                                    <input type="hidden" id="add_route_id_{{$i}}" value="0">
                            </td>
                            <td style="text-align: center;">
                                
                                <label class="form-control-label" id="totlb_{{$i}}" >{{$ttlRowkms}}</label>

                            </td>
                            <td hidden style="text-align: center;">
                            
                                <input hidden disabled placeholder="0.00" id="tottb_{{$i}}" style="text-align: center;" type="text" onchange="totalSum()" value="{{$ttkm}}" class="form-control m-input">                              
                                
                            </td>   
                        </tr>
                        

                    @endfor

                    @php
                        
                        $rounoff = $totmilageTour-$totalTrmlg;

                    @endphp

                    <tr style="text-align: center;">                       
                        <td style="text-align: right; padding: 8px 0px 0px 0px" colspan="5"><label><b>Milage&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</b></label></td>
                        <td style="text-align: center; padding: 8px 0px 0px 0px"><label><b id="totlb_a">0.00</b></label></td>
                        <td hidden style="text-align: center; padding: 8px 0px 0px 0px"></td>
                    </tr>

                    <tr style="text-align: center;">                       
                        <td style="text-align: right; padding: 8px 0px 0px 0px" colspan="5"><label><b>Round Off Millage&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</b></label></td>
                    <td style="text-align: center; padding: 8px 0px 0px 0px"><input id="round_of" placeholder="0" type="text" style="text-align: center;" type="text" onkeyup="totalSum()" value="{{$rounoff}}" class="form-control m-input sm"></td>
                        <td hidden style="text-align: center; padding: 8px 0px 0px 0px"></td>
                    </tr>

                    <tr style="text-align: center;">                       
                        <td style="text-align: right; padding: 8px 0px 0px 0px" colspan="5"><label><b>Total Milage&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</b></label></td>
                        <td style="text-align: center; padding: 8px 0px 0px 0px"><label><b id="totlb">0.00</b></label></td>
                        <td hidden style="text-align: center; padding: 8px 0px 0px 0px"></td>
                    </tr>
                    
                </tbody>
                
        </table>
    {{-- </div> --}}
    <br>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2">
                            
                                <button @if($data_status->confirmed==0 && $data_status->status==4) disabled @endif class="btn btn-primary onClick_save" type="button" id="save_direction" >Save Route Details</button>

                            </div>
                        </div>
                    </div>
            </div>
            @include('tour_section.components.directions.select_route_modal')
        {{-- </div> --}}
</form>

@if ($quickQtMode == 1)

    <ul class="m-nav-sticky" style="margin-top: 30px;">
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="" data-placement="left" data-original-title="Route & Locations">
                <a id="tb_routedata" class="js-scroll-trigger" href="#routedata">
                    <i class="la la-compass"></i>
                </a>
            </li>
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="" data-placement="left" data-original-title="Accommodation">
                <a id="tb_accmddata" class="js-scroll-trigger" href="#accmddata">
                    <i class="la la-hotel"></i>
                </a>
            </li>
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="" data-placement="left" data-original-title="Guides">
                <a id="tb_guidesdata" class="js-scroll-trigger" href="#guidesdata">
                    <i class="la la-user-secret"></i>
                </a>
            </li>
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="" data-placement="left" data-original-title="Transport">
                <a id="tb_transportdataui" class="js-scroll-trigger" href="#transportdataui">
                    <i class="la la-car"></i>
                </a>
            </li>
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="" data-placement="left" data-original-title="Miscellaneous">
                <a id="tb_micsdataui" class="js-scroll-trigger" href="#micsdataui">
                    <i class="la la-paperclip"></i>
                </a>
            </li>
    </ul>

@endif

<script>

// $(document).ready(function() {


// $('.newmpikdir').select2({


 

   
// });

 


</script>