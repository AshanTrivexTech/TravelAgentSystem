<form class="cleafix" method="POST" action="">
        <div style="overflow-x:auto;">  
    <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th class="table-secondary" style="text-align: center;" colspan="8">Transport</th>
                    <th class="table-secondary" style="text-align: center;" colspan="3">Other Setup</th>                    
                </tr>
                <tr style="text-align: center;">
                    <th class="table-success" colspan="5">Main Vehicle</th>
                    <th class="table-info" colspan="3">Extra Vehicle (Ex:- Bags)</th>
                    <th class="table-warning" colspan="2">Guide Plan</th>
                    <th width="5%" rowspan="2" class="table-danger">Accommodation FOC</th>
                </tr>
                <tr style="text-align: center;">
                    <th class="table-success">No</th>
                    <th class="table-success">PAX Range</th>
                    <th class="table-success">Vehilce Type</th>
                    <th class="table-success">No of Seats</th>
                    <th class="table-success">Rate Km/per</th>
                    <th class="table-info">Extra Vehicle (Ex:- Bags)</th>
                    <th class="table-info">Rate Km/per</th>
                    <th class="table-info">Millage</th>

                    <th style="white-space: nowrap; overflow: hidden;" width="10%" class="table-warning">Guide Type</th>
                    <th style="white-space: nowrap; overflow: hidden;" class="table-warning"  width="5%">ACCMD</th>
                                        
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            @php
                



               // $vtypeCount = $VehicleTypes->count();
                $noofSeat_gp = 0;
                $no_row_gp_vt_setup = 0;
                $main_vt_mk_pr = 0;
                $extr_vt_mk_pr = 0;

                $main_vt_mk_pr = $basecomisionRate;
                $extr_vt_mk_pr = $basecomisionRate;
                
                $exrchg_rate = 1;
            @endphp
                <tbody id="gp_vtype_tbody" style="text-align: center;">
                    @foreach ($gp_vehicletype_list as $gp_vtype)
                    
                        @php
                            $no_row_gp_vt_setup++;
                            $pax_str = '';
                            

                            if($gp_vtype->pax_frm == $gp_vtype->pax_to)
                            {
                                $pax_str = $gp_vtype->pax_to;

                            }else{
                               
                                $pax_str = $gp_vtype->pax_frm.' - '.$gp_vtype->pax_to;
                            }
                            $rateperkm = $gp_vtype->rate_per_km;
                            $noofSeat_gp = $gp_vtype->no_of_seats;
                            
                            $selected_vhtype = $gp_vtype->vehicle_type_id;
                            $selected_vhtype_extr = 0;
                            
                            $selected_guide_type = $gp_vtype->guide_type;
                            $selected_guide_accmd = $gp_vtype->guide_accmd_add;
                            $accmd_foc_qty = $gp_vtype->accmd_foc;
                            
                            
                            $gp_extvhc_totmilageTour = $totmilageTour;
                            
                            $extra_perkmrate = 0;

                            if($gp_vehivletypeDataSaved->count()!=0){
                                
                                foreach ($gp_vehivletypeDataSaved as $gpvtype_saved) 
                                {
                                    
                                    if($gp_vtype->id == $gpvtype_saved->group_qt_pax_setup_id){
                                        
                                        $rateperkm = number_format($gpvtype_saved->rate_per_km,2);
                                        $selected_vhtype = $gpvtype_saved->vehicle_type_id;
                                        $selected_vhtype_extr = $gpvtype_saved->extr_vehicle_type_id;
                                        $extra_perkmrate = number_format($gpvtype_saved->extr_rate_per_km,2);
                                        $gp_extvhc_totmilageTour = $gpvtype_saved->extr_vht_millage;                                       
                                        
                                        $main_vt_mk_pr = $gpvtype_saved->main_vt_mk_pc;
                                        $extr_vt_mk_pr = $gpvtype_saved->extr_vt_mk_pc;
                                        
                                        $exrchg_rate = $gpvtype_saved->exrchg_rate;

                                        $selected_guide_type = $gpvtype_saved->guide_type;
                                        $selected_guide_accmd = $gpvtype_saved->guide_accmd;

                                        $accmd_foc_qty = $gpvtype_saved->accmd_foc;
                                        
                                    }

                                     

                                }
                   
                            }

                            
                        @endphp  
                        
                        
                    <tr>
                            <td>{{$no_row_gp_vt_setup}}</td>
                            <td>{{$pax_str}}</td>
                                <td class="table-secondary">                                                                    
                                    <input type="hidden" id="gp_pax_stupid_{{$no_row_gp_vt_setup}}" value="{{$gp_vtype->id}}">
                                        <select id="gp_vehicle_type_{{$no_row_gp_vt_setup}}" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                                            @foreach ($VehicleTypes as $vtypes)
                                                <option @if($vtypes->id == $selected_vhtype) Selected @endif value="{{$vtypes->id}}">{{$vtypes->type}}</option>
                                            @endforeach                                    
                                        </select>
                                </td>
                                <td>
                                    {{$noofSeat_gp}}
                                </td>
                                <td>
                                    <input id="gp_vehicle_rate_{{$no_row_gp_vt_setup}}" style="text-align: center;" value="{{number_format($rateperkm,2)}}" maxlength="8" class="form-control m-input sm numeric_only" type="text">
                                </td>
                                <td class="table-secondary">
                                        <select onchange="extra_vehicle_onChange('{{$no_row_gp_vt_setup}}')" id="gp_extr_vehicle_type_{{$no_row_gp_vt_setup}}" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                                                <option @if($selected_vhtype_extr == 0) Selected @endif value="0">None</option>    
                                                @foreach ($VehicleTypes as $vtypes)
                                                 <option @if(($vtypes->id == $selected_vhtype_extr) && ($selected_vhtype_extr!=0)) Selected @endif value="{{$vtypes->id}}">{{$vtypes->type}}</option>
                                                @endforeach                                    
                                        </select>
                                </td>
                                <td>
                                <input id="gp_extr_vehicle_rate_{{$no_row_gp_vt_setup}}" style="text-align: center;" value="{{$extra_perkmrate}}" maxlength="8" class="form-control m-input sm numeric_only" type="text">
                                </td>
                                <td>
                                        <input id="gp_extr_vehicle_milage_{{$no_row_gp_vt_setup}}" style="text-align: center;" value="{{$gp_extvhc_totmilageTour}}" maxlength="8" class="form-control m-input sm numeric_only" type="text">
                                </td>
                                <td>
                                    <select id="gpsld_guide_type_{{$no_row_gp_vt_setup}}" class="form-control">
                                                                
                                            <option value="0">None</option>

                                            @foreach ($guide_types_list as $guide_types)

                                                <option @if($selected_guide_type == $guide_types->id) selected @endif value="{{$guide_types->id}}">{{$guide_types->g_type}}</option>
                                                
                                            @endforeach
                                    </select>
                                </td>

                                <td>                               
                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                        <input id="gp_guide_accmd_{{$no_row_gp_vt_setup}}" @if($selected_guide_accmd == 1) checked @endif type="checkbox">&nbsp;
                                            
                                            <span></span>

                                    </label>
                                </td>
                                <td>
                                    
                                    <input id="gp_accmd_foc_{{$no_row_gp_vt_setup}}" style="text-align: center;" value="{{$accmd_foc_qty}}" maxlength="8" class="form-control m-input sm numeric_only" type="text">
                                    
                                </td>
                        
                    </tr>


                    @endforeach
            
                                               
            </tbody>
            <tfoot>
                <tr>
                   <td colspan="8">
                        <table width="100%">
                            <tbody>
                                <tr>
                                <th style="text-align: right;" width="20%">{{$baseCurrncyCode}} to LKR Exchange Rate :</th>
                                <th width="10%">
                                <input id="gp_mvehicle_exchng_rate" style="text-align: center;" value="{{$exrchg_rate}}" maxlength="3" class="form-control m-input sm numeric_only" type="text">
                                </th>
                                <th style="text-align: right;" width="25%">Main Vehicle Mark Up (%) :</th>
                                <th width="10%">
                                    <input id="gp_mvehicle_markup" style="text-align: center;" value="{{$main_vt_mk_pr}}" maxlength="3" class="form-control m-input sm numeric_only" type="text">
                                </th>
                                <th style="text-align: right;" width="25%">Extra Vehicle Mark Up (%) :</th>
                                <th width="10%">
                                    <input id="gp_extrvehicle_markup" style="text-align: center;" value="{{$extr_vt_mk_pr}}" maxlength="3" class="form-control m-input sm numeric_only" type="text">
                                </th>
                                    
                                </tr>
                            </tbody>
                        </table>
                   </td>
                </tr>
            </tfoot>
        </table>
    </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-2">                        
                            <button id="btn_save_tab_4" @if($data_status->confirmed==0 && $data_status->status==4) disabled @endif class="btn btn-primary onClick_save" onclick="save_gp_vehicleTypes()" type="button">Save Transport Details</button>
                        </div>
                    </div>
                </div>
        </div>
 
</form>

