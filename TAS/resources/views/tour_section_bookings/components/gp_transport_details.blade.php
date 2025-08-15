<form class="cleafix" method="POST" action="">
        
    <div style="overflow-x:auto;">
        <div class="m-portlet__body">
             
                  <table class="table table-bordered">
                      <thead>
                              <tr style="text-align: center;" class="table-secondary">
                                    <th colspan="6">Vehicles Details</th>
                              </tr>
                      </thead>
                  <tbody>
                      <tr>
                
                  <td colspan="6">
                                       
                  <table class="table table-bordered">
                          <thead>
                              
                              <tr class="table-primary" style="text-align: center;">
                                              
                                          <th>Total Milage : <label>{{$totmilageTour}}</label> km</th>
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
  
                                  @foreach ($transport_details as $vh_Typ)
                                      
                                  @php
                                      $trp_bctolkr=0;
                                  @endphp
                                  
                                  <tr class="Rm_vehicle_{{$vh_Typ->pos}}">    
                                  <td style="text-align: center;" class="Rm_vehicle_{{$vh_Typ->pos}}" >{{$vh_Typ->type}}</td>
  
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
          </tbody>
      </table>
    
    </div>
    </div>    
        <input type="hidden" id="trp_ppsr_bc" value="0">
          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
              <div class="m-form__actions m-form__actions--solid">
                  <div class="row">
                      <div class="col-lg-6">
                      
                          <button onclick="saveTransportdata()" class="btn btn-primary" type="button">Save Transport Details</button>
                          
                      </div>
                  </div>
              </div>
        
            
       </div>
        
       </form>