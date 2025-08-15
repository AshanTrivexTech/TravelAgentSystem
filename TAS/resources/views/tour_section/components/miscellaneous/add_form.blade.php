<form class="cleafix" method="POST" action="">
      
    <div class="m-portlet__body">
          
          <div style="overflow-x:auto;">
              <table class="table table-bordered">
                  <thead>
                          <tr style="text-align: center;" class="table-secondary">
                                  <th colspan="6">Miscellaneous Details</th>
                         </tr>
                  </thead>
              <tbody>
                  <tr>
                      <td colspan="6">
                      @php

                        if($cur_ex_dt_rate !='')
                        {
                            $mis_bctolkr=$cur_ex_dt_rate->amount;
                        }
                        else {
                            $mis_bctolkr=0;
                        }
                        
                      @endphp
          
              <table class="table table-bordered">
                      <thead>
                         
                          <tr class="table-primary" style="text-align: center;">
                                          
                                      {{-- <th>Total Milage : <label id="trtotMilageRoute">0.00</label> km</th> --}}
                          <th width="15%">Total Pax :&nbsp;&nbsp;<label id="trtotpaxCount">{{$totaladltPax}}</label></th>
                                      <th colspan="8"></th>
                          </tr>

                          <tr class="table-secondary" style="text-align: center;">
                              <th width="10%">Miscellaneous</th>
                              <th width="7%">No Of Units</th>                                
                              <th width="10%">Rate</th>
                              <th width="3%"></th>
                          <th width="10%">1 &nbsp;&nbsp;{{$baseCurrncyCode}}</th>
                              <th width="10%">Qty</th>                                
                              {{-- <th width="15%">Rate Per Km In {{$baseCurrncyCode}}</th> --}}
                              <th width="12%">Total</th>
                              <th width="12%">Markup</th>
                              <th width="8%">Acction</th>
                          </tr>                          
                          <tr class="table-secondary" style="text-align: center;">
                              <th>
                                      <select onchange="miscOnchange()" id="sl_mis" class="form-control m-bootstrap-select m_selectpicker sm" data-live-search="true">
                                              <option selected value="0">Please Select</option>
                                              @foreach ($misc_list as $misc_lt)

                                              <option value="{{$misc_lt->id}}">{{$misc_lt->category}} - {{$misc_lt->rate_ctgry}}</option>
                                                  
                                              @endforeach
                                          </select>

                              </th>
                              <th><input id="mis_noofpax_add" disabled style="text-align: center;" type="text" value="0" class="form-control m-input sm"></th>
                             
                              <th><input onkeyup="misc_addCall()" id="mis_rate_add" style="text-align: center;" type="text" value="0" maxlength="8" class="form-control m-input sm numeric_only"></th>
                              <th id="lb_dta"></th>
                              <input id="lb_dtex_rate" type="hidden" value="">
                              <input id="lb_misc_rate_ctgry_id" type="hidden" value="">
                              
                              <th><input onkeyup="misc_addCall()" style="text-align: center;" type="text" value="0.00" id="base_cur_sel" class="form-control m-input"></th>
                              <th><input onkeyup="misc_addCall()" id="mis_qty_add" style="text-align: center;" type="text" value="1" maxlength="8" class="form-control m-input sm numeric_only"></th>
                             
                              <th><input id="mis_totlkr_add" disabled style="text-align: right;" type="text" value="0.00" class="form-control m-input sm"></th>
                              <th><input id="mis_mkp_add" maxlength="8" style="text-align: center;" type="text" value="0.00" class="form-control m-input sm numeric_only"></th>
                              <th>
                                  <button class="btn btn-success" type="button" onclick="addMisc()">
                                          <span>
                                                  <i class="fa fa-plus-square"></i>
                                                  <span>Add</span>
                                              </span>
                                  </button>
                              </th>
                          </tr>                           
                          <tr class="table-secondary" style="text-align: center;">
                              
                              <th>Miscellaneous</th>
                              <th>No Of Units</th>
                              <th>Rate</th>
                              <th></th>
                              <th>1 &nbsp;&nbsp;{{$baseCurrncyCode}}</th>

                              <th>Qty</th>
                              {{-- <th>LKR to {{$baseCurrncyCode}}</th> --}}
                              <th>Total</th>
                              <th>Markup</th>
                              <th>Action</th>
                          </tr>
                      </thead> 
                          <tbody id="mis_tbl">

                              @foreach ($tourQuotMisc as $misc_tq)
                                   
                              @php
                                //   $addedst_val = 1;
                                  $mis_bctolkr=$misc_tq->baserate;
                              @endphp 
                              
                               <tr id="misc_tbltr_id_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}">    
                              <td style="text-align: center;" class="Rm_misc_{{$misc_tq->pos}}" >{{$misc_tq->category}}</td>

                                  <input id="misc_id_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->misc_categorie_id}}">
                                  <input id="misc_qty_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->qty}}">
                                  <input id="misc_ratelkr_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->rate_lkr}}">
                                  <input id="misc_totallkr_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->totlkr}}">
                                  <input id="misc_markup_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->ms_Mkp}}">
                                  <input id="misc_exrate_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->ex_rate}}">
                                  <input id="misc_rate_ctgry_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->msicrtctgry}}">
                                  <input autocomplete="off" id="misc_addd_state_{{$misc_tq->pos}}" class="Rm_misc_{{$misc_tq->pos}}" type="hidden" value="{{$misc_tq->pos}}">

                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: center;">{{$misc_tq->mc_pax}}</td>
                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: right;">{{number_format($misc_tq->rate_lkr,2)}}</td>
                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: center;">{{$misc_tq->code}}</td>
                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: right;">{{$misc_tq->ex_rate}}</td>
                                
                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: right;">{{number_format($misc_tq->qty,2)}}</td>
                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: right;">{{number_format($misc_tq->totlkr,2)}}</td>
                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: right;">{{number_format($misc_tq->ms_Mkp,2)}}</td>
                                                      
                                  <td class="Rm_misc_{{$misc_tq->pos}}" style="text-align: center;">
                                              <button onclick="removeMisc({{$misc_tq->pos}})" type="button" class="btn btn-danger m-btn btn-sm m-btn--icon Rm_misc_{{$misc_tq->pos}}">
                                                      <span class="Rm_misc_{{$misc_tq->pos}}">
                                                          <i class="la la-trash Rm_misc_{{$misc_tq->pos}}"></i>
                                                          <span class="Rm_misc_{{$misc_tq->pos}}">Remove</span>
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
                  <th colspan="6">Summary</th>
          </tr>
          

              <tr style="text-align: center;">
                  <th width="30%">Description</th>
                  {{-- <th width="20%">LKR</th> --}}
                  <th width="20%">In {{$baseCurrncyCode}} (Adult)</th>
                  <th width="20%">In {{$baseCurrncyCode}} (Child)</th>
                  <th colspan="2"></th> 
             </tr>
              
             <tr style="text-align: right;">
              <td><b>Total Cost :</b></td>
              {{-- <td><label id="mis_totCost_lk">0.00</label></td> --}}
              <td>{{$baseCurrncyCode}} <label id="mis_totCost_bc">0.00</label></td>
              <td>{{$baseCurrncyCode}} <label id="mis_totCost_bc_chld">0.00</label></td>

             </tr>
             
             <tr style="text-align: right;">
                <td><b>Total Markup :</b></td> 
                {{-- <td><label id="mis_ttmkp_lk">0.00</label></td> --}}
                <td>{{$baseCurrncyCode}}  <label id="mis_ttmkp_bc">0.00</label></td>
                <td>{{$baseCurrncyCode}}  <label id="mis_ttmkp_bc_chld">0.00</label></td>
                
             </tr style="text-align: right;">
             <tr class="table-success" style="text-align: right;">
                  <td><b>Selling Rate :</b></td>
                  {{-- <td><label id="mis_sr_lkr">0.00</label></td> --}}
                  <td>{{$baseCurrncyCode}}  <label id="mis_sr_bc">0.00</label></td>
                  <td>{{$baseCurrncyCode}}  <label id="mis_sr_bc_chld">0.00</label></td>
              </tr>
              <tr class="table-warning" style="text-align: right;">
                      <td><b>Per Person Selling Rate :</b></td>
                      {{-- <td><label id="mis_ppsr_lkr">0.00</label></td> --}}
                      <td>{{$baseCurrncyCode}}  <label id="mis_ppsr_bc">0.00</label></td>
                      <td>{{$baseCurrncyCode}}  <label id="mis_ppsr_bc_chld">0.00</label></td>
                     
              </tr>
              <tr class="table-primary" style="text-align: right;">
                      <td><b>Markup Percentage:</b></td>
                      {{-- <td id="mis_mkp_pc_lkr">0.00%</td> --}}
                      <td id="mis_mkp_pc_bc">0.00%</td>
                      <td id="mis_mkp_pc_bc_chld">0.00%</td>
                     
              </tr>
      </tbody>
  </table>
          </div>
      <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions--solid">
              <div class="row">
                  <div class="col-lg-6">
                  
                      <button id="btn_save_tab_5"  @if($data_status->confirmed==0 && $data_status->status==4) disabled @endif onclick="saveMiscellaneous()" class="btn btn-primary onClick_save" type="button">Save Miscellaneous Details</button>
                      
                  </div>
              </div>
          </div>
      </div>
        
   </div>
  
   </form>
  
  
  