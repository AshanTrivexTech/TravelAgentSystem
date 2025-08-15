<form class="cleafix" method="POST" action="">
      
      <div class="m-portlet__body">
            
            <div style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                            <tr style="text-align: center;" class="table-secondary">
                                    <th colspan="6">Vehicles Details</th>
                                </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td colspan="6">
                        @php
                        if($cur_ex_dt_rate != '')
                        {
                            $trp_bctolkr =$cur_ex_dt_rate->amount;
                        }
                        else {
                            $trp_bctolkr=0;
                        }
                              
                        @endphp
            
                <table class="table table-bordered">
                        <thead>
                            
                            <tr class="table-primary" style="text-align: center;">
                                            
                                        <th>Total Milage : <label id="trtotMilageRoute">0.00</label> km</th>
                                        <th width="15%">Total Pax :&nbsp;&nbsp;<label id="trtotpaxCount">0</label></th>
                                        <th colspan="5"></th>
                            </tr>

                            <tr class="table-secondary" style="text-align: center;">
                                <th width="20%">Vehicle Type</th>
                                <th width="10%">No Of Seats</th>                                
                                <th width="10%">Millage Km</th>
                                <th width="10%">Rate Per Km (LKR)</th>                                
                                {{-- <th width="15%">Rate Per Km In {{$baseCurrncyCode}}</th> --}}
                                <th width="12%">Total LKR</th>
                                <th width="12%">Markup LKR</th>
                                <th width="8%">Acction</th>
                            </tr>
                            
                            <tr class="table-secondary" style="text-align: center;">
                                <th>
                                        <select onchange="vehicleTypeslOnchange()" id="sl_vehicleType" class="form-control m-bootstrap-select m_selectpicker sm" data-live-search="true">
                                                <option selected value="0">Please Select</option>
                                                @foreach ($VehicleTypes as $VehicleType_ls)
            
                                                <option value="{{$VehicleType_ls->id}}">{{$VehicleType_ls->type}}</option>
                                                    
                                                @endforeach
                                      </select>

                                </th>
                                <th><input id="noofseat_add" disabled style="text-align: center;" type="text" value="0" class="form-control m-input sm"></th>
                                <th><input onkeyup="trspbfAddCall()" id="milage_add" style="text-align: center;" type="text" value="0" class="form-control m-input sm numeric_only"></th>
                                <th><input onkeyup="trspbfAddCall()" id="rate_perkm_add" style="text-align: center;" type="text" value="0.00" class="form-control m-input sm numeric_only"></th>
                                {{-- <th><input style="text-align: center;" type="text" value="" class="form-control m-input"></th> --}}
                                <th><input id="vtotlkr_add" disabled style="text-align: right;" type="text" value="0.00" class="form-control m-input sm"></th>
                                <th><input id="vmkp_add" style="text-align: center;" type="text" value="0.00" class="form-control m-input sm numeric_only"></th>
                                <th>
                                    <button class="btn btn-success" type="button" onclick="addvehicle()">
                                            <span>
                                                    <i class="fa fa-plus-square"></i>
                                                    <span>Add</span>
                                                </span>
                                    </button>
                                </th>
                            </tr>                           
                            <tr class="table-secondary" style="text-align: center;">
                                
                                <th>Vehicle Type</th>
                                <th>No Of Seats</th>
                                <th>Millage Km</th>
                                <th>Rate LKR</th>
                                {{-- <th>LKR to {{$baseCurrncyCode}}</th> --}}
                                <th>Total LKR</th>
                                <th>Markup LKR</th>
                                <th>Action</th>
                            </tr>
                        </thead> 
                            <tbody id="vehicle_tbl">
                                @foreach ($tourQuotTransp as $vh_Typ)
                                    
                                @php
                                    $trp_bctolkr=$vh_Typ->baserate;
                                @endphp
                                
                                <tr class="Rm_vehicle_{{$vh_Typ->pos}}">    
                                <td style="text-align: center;" class="Rm_vehicle_{{$vh_Typ->pos}}" >{{$vh_Typ->vtype}}</td>

                                    <input id="vehicle_typ_id_{{$vh_Typ->pos}}" class="Rm_vehicle_{{$vh_Typ->pos}}" type="hidden" value="{{$vh_Typ->vehicle_type_id}}">
                                    <input id="millage_km_{{$vh_Typ->pos}}" class="Rm_vehicle_{{$vh_Typ->pos}}" type="hidden" value="{{$vh_Typ->millage}}">
                                    <input id="rateperKm_{{$vh_Typ->pos}}" class="Rm_vehicle_{{$vh_Typ->pos}}" type="hidden" value="{{$vh_Typ->rate_pkm}}">
                                    <input id="totallkr_{{$vh_Typ->pos}}" class="Rm_vehicle_{{$vh_Typ->pos}}" type="hidden" value="{{$vh_Typ->totlkr}}">
                                    <input id="markup_tr_{{$vh_Typ->pos}}" class="Rm_vehicle_{{$vh_Typ->pos}}" type="hidden" value="{{$vh_Typ->trp_ls_Mkp}}">
                    
                                    <td class="Rm_vehicle_{{$vh_Typ->pos}}" style="text-align: center;">{{$vh_Typ->no_of_seats}}</td>
                                    <td class="Rm_vehicle_{{$vh_Typ->pos}}" style="text-align: right;">{{number_format($vh_Typ->millage,2)}} km</td>
                                    <td class="Rm_vehicle_{{$vh_Typ->pos}}" style="text-align: right;">{{number_format($vh_Typ->rate_pkm,2)}}</td>
                                    <td class="Rm_vehicle_{{$vh_Typ->pos}}" style="text-align: right;">{{number_format($vh_Typ->totlkr,2)}}</td>
                                    <td class="Rm_vehicle_{{$vh_Typ->pos}}" style="text-align: right;">{{number_format($vh_Typ->trp_ls_Mkp,2)}}</td>
                                                        
                                    <td class="Rm_vehicle_{{$vh_Typ->pos}}" style="text-align: center;">
                                                <button onclick="removeVehicle({{$vh_Typ->pos}})" type="button" class="btn btn-danger m-btn btn-sm m-btn--icon Rm_vehicle_{{$vh_Typ->pos}}">
                                                        <span class="Rm_vehicle_{{$vh_Typ->pos}}">
                                                            <i class="la la-trash Rm_vehicle_{{$vh_Typ->pos}}"></i>
                                                            <span class="Rm_vehicle_{{$vh_Typ->pos}}">Remove</span>
                                                        </span>
                                                </button>
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                           
                    </table>
                </td>
            </tr>
            <tr class="table-warning"  style="text-align: center;">
                    <th colspan="7">Other Transport Expences</th>
            </tr>
            <tr class="table-secondary"  style="text-align: center;">
                    <td colspan="7">
                            <table class="table table-bordered">
                            <thead>
      
                                <tr class="table-secondary" style="text-align: center;">
                                    <th >Expences Category</th>                                                                   
                                    <th >Rate LKR</th>
                                    <th >Qty</th>                                
                                    <th >Total LKR</th>
                                    <th >Markup LKR</th>
                                    <th >Acction</th>
                                </tr>
                                
                                <tr class="table-secondary" style="text-align: center;">
                                    <th>
                                            <select onchange="ExpencesTypeslOnchange()" id="expene_Type" class="form-control m-bootstrap-select m_selectpicker sm" data-live-search="true">
                                                    <option selected value="0">Please Select</option>
                                                    @foreach ($expences as $expence)
                
                                                    <option value="{{$expence->id}}">{{$expence->category}}</option>
                                                        
                                                    @endforeach
                                          </select>
    
      
                                    </th>
                                    <th><input id="rate_lkr" style="text-align: center;" type="text" value="0" maxlength="8" class="form-control m-input sm numeric_only"></th>
                                    <th><input onkeyup="rate_cal_totDT()" id="rate_cal_tot" style="text-align: center;" type="text" value="0.00" maxlength="8" class="form-control m-input sm numeric_only"></th>
                                  
                                    <th><input id="total_val" disabled style="text-align: right;" type="text" value="0.00" class="form-control m-input sm"></th>
                                    <th><input id="mis_mkp_add_trns" maxlength="8" style="text-align: center;" type="text" value="0.00" class="form-control m-input sm numeric_only"></th>
                                    <th>
                                        <button class="btn btn-success" onclick="addTranspoart()" type="button">
                                                <span>
                                                        <i class="fa fa-plus-square"></i>
                                                        <span>Add</span>
                                                </span>

                                        </button>
                                    </th>
                                </tr>                          
                                <tr class="table-secondary" style="text-align: center;">
                                    <th>Expences Category</th>                                   
                                    <th>Rate LKR</th> 
                                    <th>Qty</th>
                                    <th>Total LKR</th>
                                    <th>Markup LKR</th>                                  
                                    <th>Action</th>
                                </tr>
                            </thead> 
                                <tbody id="sss">
                                    @foreach($tourQuot_ex_data as $quot_data)
                                <tr class="Rm_exp{{$quot_data->pos}}">
                                <input id="exp_type{{$quot_data->pos}}" class="Rm_exp{{$quot_data->pos}}" type="hidden" value="{{$quot_data->transport_expense_id}}">
                                <input id="exp_rate{{$quot_data->pos}}" class="Rm_exp{{$quot_data->pos}}" type="hidden" value="{{$quot_data->exp_rate}}">
                                <input id="qty_exp{{$quot_data->pos}}" class="Rm_exp{{$quot_data->pos}}" type="hidden" value="{{$quot_data->exp_qty}}">
                                <input id="total_exp{{$quot_data->pos}}" class="Rm_exp{{$quot_data->pos}}" type="hidden" value="{{$quot_data->exp_total}}">
                                <input id="totalMk_exp{{$quot_data->pos}}" class="Rm_exp{{$quot_data->pos}}" type="hidden" value="{{$quot_data->exp_markup}}">
                               
                                <td style="text-align: center;" class="Rm_exp{{$quot_data->pos}}" >{{$quot_data->category}}</td>
                                <td class="Rm_exp{{$quot_data->pos}}" style="text-align: center;">{{$quot_data->exp_rate}}</td>              
                                <td class="Rm_exp{{$quot_data->pos}}" style="text-align: right;">{{$quot_data->exp_qty}}</td>
                                <td class="Rm_exp{{$quot_data->pos}}" style="text-align: right;">{{$quot_data->exp_total}}</td>
                                <td class="Rm_exp{{$quot_data->pos}}" style="text-align: right;">{{$quot_data->exp_markup}}</td>
                              
                                                    
                                <td class="Rm_exp{{$quot_data->pos}}" style="text-align: center;">
                                            <button onclick="remove_expences({{$quot_data->pos}})" type="button" class="btn btn-danger m-btn btn-sm m-btn--icon Rm_exp{{$quot_data->pos}}">
                                                    <span class="Rm_exp{{$quot_data->pos}}">
                                                        <i class="la la-trash Rm_exp{{$quot_data->pos}}"></i>
                                                        <span class="Rm_exp{{$quot_data->pos}}">Remove</span>
                                                    </span>
                                            </button>
                                </td>
                            </tr>
                                    @endforeach
                                    
                                </tbody>
                               
                        </table>
                        
                    </td>
            </tr>
            <tr class="table-secondary"  style="text-align: center;">
                    <th colspan="6">Summery</th>
            </tr>

                <tr style="text-align: center;">
                        <th>{{$baseCurrncyCode}} to LKR Exchange Rate :</th>
                <th><input onkeyup="trspCallAll()" id="trp_bslkr" style="text-align: center;" value="{{number_format($trp_bctolkr,2)}}" type="text" class="form-control m-input sm numeric_only"></th>
                <th colspan="3"></th>                                        
                </tr>

                <tr style="text-align: center;">
                    <th width="30%">Description</th>
                    <th width="20%">LKR</th>
                    <th width="20%">In {{$baseCurrncyCode}}</th>
                    <th colspan="3"></th>
               </tr>
               
               <tr style="text-align: right;">
                <td><b>All Vehicles Cost :</b></td>
                <td><label id="trp_totCost_lk">0.00</label></td><input type="hidden" id="get_exp_data"/>
                <td>{{$baseCurrncyCode}} <label id="trp_totCost_bc">0.00</label></td>
                   
               </tr>

               <tr style="text-align: right;">
                <td><b>Other Expences :</b></td>
                <td><label id="trp_other_cost">0.00</label></td>
                <td>{{$baseCurrncyCode}} <label id="trp_totCost_bc_other">0.00</label></td>
                   
               </tr>

               <tr style="text-align: right;">
                <td><b>Total Cost :</b></td>
                <td><label id="trp_toal_cost">0.00</label></td>
                <td>{{$baseCurrncyCode}} <label id="trp_totCost_bc_cost">0.00</label></td>
                   
               </tr>
               
               <tr style="text-align: right;">
                  <td><b>Total Markup :</b></td> 
                  <td><label id="trp_ttmkp_lk">0.00</label></td>
                  <td>{{$baseCurrncyCode}}  <label id="trp_ttmkp_bc">0.00</label></td>
                  
               </tr style="text-align: right;">
               <tr class="table-success" style="text-align: right;">
                    <td><b>Selling Rate :</b></td>
                    <td><label id="trp_sr_lkr">0.00</label></td>
                    <td>{{$baseCurrncyCode}}  <label id="trp_sr_bc">0.00</label></td>
                   
                </tr>
                <tr class="table-warning" style="text-align: right;">
                        <td><b>Per Person Selling Rate :</b></td>
                        <td><label id="trp_ppsr_lkr">0.00</label></td>
                        <td>{{$baseCurrncyCode}}  <label id="trp_ppsr_bc">0.00</label></td>
                       
                </tr>
                <tr class="table-primary" style="text-align: right;">
                        <td><b>Markup Percentage:</b></td>
                        <td id="trp_mkp_pc_lkr">0.00%</td>
                        <td id="trp_mkp_pc_bc">0.00%</td>
                       
                </tr>
        </tbody>
    </table>
            </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                    
                        <button id="btn_save_tab_4" onclick="saveTransportdata()" @if($data_status->confirmed==0 && $data_status->status==4) disabled @endif class="btn btn-primary onClick_save" type="button">Save Transport Details</button>
                        
                    </div>
                </div>
            </div>
        </div>
          
     </div>
    
     </form>
    
    
    