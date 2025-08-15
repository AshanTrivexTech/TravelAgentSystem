<style>
        .slmd-header{
               
               background-color: #282a3c;
               text-align: center;
        }
        .mdsp-header{
                padding-top: 5px;
                padding-left: 10px;
                text-align: center;
                color: white;
        }
       .slmd-body{
               /* background-color: #f4f5f6; */
       }
       .slmd-footer{
               display: flex;
               align-items: center;
               justify-content: flex-end;
               padding: 10px;
               border-top: 1px solid #e9ecef;
       }
       .slmd-main{
               max-width: 1200px;
               margin: 1.75rem auto;
       }
       .center-text{
        text-align: center;
       }

      tr.selectedTr {
        background-color: lightskyblue;
        /* color:#fff; */
        /* vertical-align: middle; */
        /* padding: 1.5em; */
    }

      </style>

<div class="modal" id="m_modal_9" tabindex="-1" role="dialog">
        <div class="slmd-main modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header slmd-header">
                                
                                    <span class="mdsp-header" id="mod_title"><h6 class="mdsp-header">New Contracts</h6></span>

                                <input type="hidden" id="mod_hidden">
                                <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                                <i class="fa fa-close"></i>
                                </a>
                        </div>
                        <div class="modal-body slmd-body">
                                <input type="hidden" id="model_date" value="">
                                <div id="alert_con" class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Warning!</strong><div id="notify_con"></div>
                                        <button type="button" class="close" id="notify_close_con">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                        <div class="form-group m-form__group row">
                                                <div class="col-md-3">
                                                        <label class="form-control-label">Market</label>                                                   
                                                              <select class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="con_market">
                                                                     
                                                                      @foreach ($markets as $markets_lst)
                                                                      <option value="{{$markets_lst->id}}">{{$markets_lst->market_name}}</option>
                                                                     @endforeach
                                                              </select>
                                                </div>
                                                <div class="col-md-3">
                                                        <label class="form-control-label">Agent</label>                                                   
                                                              <select class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="con_agent">
                                                                      
                                                                      @foreach ($agents as $agents_lst)
                                                                      <option value="{{$agents_lst->id}}">{{$agents_lst->ag_name}}</option>
                                                                     @endforeach
                                                              </select>
                                                </div>                                                 
                                                <div class="col-md-6">
                                                  <label class="form-control-label">Hotel Name</label>                                                   
                                                        <select class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="con_hotel">
                                                                
                                                                @foreach ($hotels as $hotel)
                                                                <option value="{{$hotel->id}}">{{$hotel->sup_s_name}}</option>
                                                               @endforeach
                                                        </select>
                                                 </div>                                                 
                                                  
                                              
                                        </div>

                                        <div class="form-group m-form__group row">
                                                <div class="col-md-4">
                                                        <label class="form-control-label">Contract Name</label>                                                   
                                                        <input type="text"  value="" class="form-control m-input" placeholder="Enter Contract name" id="con_name">
      
                                                </div>
                                                <div class="col-md-2">
                                                        <label class="form-control-label">Currency Type</label>                                                   
                                                        <select class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="con_currency">
                                                               
                                                                @foreach ($currencys as $currency_slt)
                                                                <option value="{{$currency_slt->id}}">{{$currency_slt->code}}</option>
                                                               @endforeach
                                                        </select>
      
                                                </div>
                                                <div class="col-md-2">
                                                        <label class="form-control-label">Room Type</label>                                                   
                                                              <select class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="con_rmtype">
                                                                     
                                                                      @foreach ($roomTypes as $roomType)
                                                                       <option value="{{$roomType->id}}">{{$roomType->r_type}}</option>
                                                                      @endforeach
                                                              </select>
                                                       </div>
                                                         <div class="col-md-2">
                                                        <label class="form-control-label">Meal Plan</label>                                                   
                                                              <select class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="con_meal_plane">
                                                                     
                                                                      @foreach ($mealPlans as $mealPlan)
                                                                      <option value="{{$mealPlan->id}}">{{$mealPlan->meal_plane}}</option>
                                                                     @endforeach
                                                              </select>
                                                       </div>
                                                       <div class="col-md-2"> 
                                                                <label class="form-control-label">
                                                                    Contract Term
                                                                </label> 
                                                            
                                                                <select class="form-control m-bootstrap-select m_selectpicker" onchange="change_contract()"  id="h_contract">
                                                                {{-- <option value="" selected>Please Select...</option>     --}}
                                                                <option value="1" selected >Period</option>
                                                                <option value="0">Annual</option>  
                                                                </select>
                                                                
                                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-md-12">
                                                    <div style="overflow-x:auto;">
                                                            <table class="table table-bordered table-sm" width="100%">
                                                                <thead>
                                                                        {{-- <tr style="text-align: center;">
                                                                                <th class="bg-secondary" colspan="14">Hotel Package Details</th>
                                                                            </tr>                                                                                                                                                                                --}}
                                                                               <tr class="table-secondary" style="text-align: center">
                                                                                              <th colspan="2">Form</th>
                                                                                              <th colspan="2">To</th>
                                                                                              <th width="10%">SGL</th>
                                                                                              <th width="10%">DBL</th>
                                                                                              <th width="10%">TPL</th>
                                                                                              <th width="10%">QRD</th>
                                                                                              <th width="10%">GR</th>
                                                                                              <th width="10%">EBR</th>
                                                                                              <th width="16%"></th>
                                                                                              
                                                                                              
                                                                                </tr>
                          
                                                                              <tr>
                                                                                  <th colspan="2"><input style="text-align: center" placeholder="From Date" id="con_from_date" name="from_date" type="text"  class="form-control dtpic-format form-control-sm" value=""></th>
                                                                                  <th colspan="2"><input style="text-align: center" placeholder="To Date" id="con_to_date" name="to_date" type="text"  class="form-control dtpic-format form-control-sm" value=""></th>     
                                                                                  <th><input style="text-align: center" id="con_sgl" placeholder="Single Rate"  class="form-control m_input numeric_only form-control-sm" name="sgl" type="text"  value="0.00" ></th>
                                                                                  <th><input style="text-align: center" id="con_dbl" placeholder="Double Rate"  class="form-control numeric_only form-control-sm" name="dbl" type="text" value="0.00" ></th>
                                                                                  <th><input style="text-align: center" id="con_tbl" placeholder="Trible Rate"  class="form-control numeric_only form-control-sm" name="tbl" type="text" value="0.00" ></th>
                                                                                  <th><input style="text-align: center" id="con_qbl" placeholder="Quadruple Rate"  class="form-control numeric_only form-control-sm" name="qbl" type="text" value="0.00" ></th>
                                                                                  <th><input style="text-align: center" id="con_child" placeholder="Guide Room Rate"  class="form-control numeric_only form-control-sm" name="child" type="text" value="0.00" ></th>
                                                                                  <th><input style="text-align: center" id="con_exb" placeholder="Extra Bed Rate"  class="form-control numeric_only form-control-sm" name="exb" type="text" value="0.00" ></th>                                                               
                                                                                  <th colspan="3" style="text-align: center">
                                                                                      <button class="btn btn-success btn-sm" type="button" onclick="addDetails()">
                                                                                           <span>
                                                                                              <i class="fa fa-plus-square"></i>
                                                                                              <span>Add</span>
                                                                                          </span>
                                                                                      </button>
                                                                                  </th>
                                                                              </tr> 
                                                                         
                                                                </thead>
                                                                
                          
                                                        <tbody>
                                                              <tr>
                                                                  <td colspan="11">
                                                                      <table class="table table-bordered table-sm" width="100%">
                                                                          <thead>                                                    
                                                                              <tr style="text-align:center" class="table-primary">
                                                                                  
                                                                                  <th width="8%">Room Type</th>
                                                                                  <th width="8%">Meal Plan</th>
                                                                                  <th width="4%">SGL</th>
                                                                                  <th width="4%">DBL</th>
                                                                                  <th width="4%">TPL</th>
                                                                                  <th width="4%">QRD</th>
                                                                                  <th width="4%">GR</th>
                                                                                  <th width="4%">EBR</th>
                                                                                  <th width="8%">From</th>
                                                                                  <th width="8%">To</th>
                                                                                  <th width="8%">Action</th>
                                                                              </tr>
                                                                          </thead>
                                                                          <tbody id="dat">
                          
                                                                          </tbody>
                                                                      </table>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <th class="bg-secondary" style="text-align: center" colspan="11">Optional Supplements</th>
                                                              </tr>
                                                              <tr style="text-align: center">
                                                                      <th colspan="2" width="20%">Code</th>
                                                                      <th colspan="3" width="25%">Rate Type</th>
                                                                      <th colspan="2" width="10%">Rate</th>
                                                                      <th colspan="3" width="35%">Description</th>                                                          
                                                                      <th width="10%">Action</th>
                                                              </tr>
                                                              <tr>
                                                                      <th colspan="2" width="20%">
                                                                          <input style="text-align: center" id="sup_code" placeholder="Code"  class="form-control m_input form-control-sm" maxlength="6" type="text"  value="" >
                                                                      </th>
                                                                      <th colspan="3" width="25%">
                                                                              <select class="form-control form-control-sm" id="sup_rate_type">
                                                                                      <option value="0">Per-Person</option>
                                                                                      <option value="1">Per-Room</option>
                                                                              </select>
                                                                      </th>
                                                                      <th colspan="2" width="10%">
                                                                              <input style="text-align: center" id="sup_rate" placeholder="0.00"  class="form-control m_input numeric_only form-control-sm" type="text"  value="" >
                                                                      </th>
                                                                      <th colspan="3" width="35%">
                                                                              <input style="text-align: center" id="sup_desc" placeholder="Description"  class="form-control m_input form-control-sm" type="text"  value="" >
                                                                      </th>                                                          
                                                                      <th width="10%">
                                                                              <button class="btn btn-success btn-sm" type="button" onclick="add_sup()">
                                                                                      <span>
                                                                                         <i class="fa fa-plus-square"></i>
                                                                                         <span>Add</span>
                                                                                     </span>
                                                                              </button>
                                                                      </th>
                                                              </tr>
                                                              <tr>
                                                                      <td colspan="11">
                                                                              <table class="table table-bordered" width="100%">
                                                                                      <thead>                                                    
                                                                                          <tr style="text-align:center" class="table-primary">                                                                                                                        
                                                                                              <th width="20%">Code</th>
                                                                                              <th width="20%">Rate Type</th>
                                                                                              <th width="15%">Rate</th>
                                                                                              <th width="35%">Description</th>                                                          
                                                                                              <th width="10%">Action</th>
                                                                                          </tr>
                                                                                      </thead>
                                                                                      <tbody id="dat_optsup">
                                                                                         
                                                                                      </tbody>
                                                                                  </table>
                                                                      </td>
                                                              </tr>
                                                        
                                                      </tbody>
                                                  </table>
                                              </div>

                                            </div>
                                        </div>
                                        
                        </div>
                        
                        


                        <div class="slmd-footer">
                                {{-- &nbsp; --}}
                                <button type="button" class="btn btn-success" onclick="saveHPDetails()" >Save</button>
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                </div>
        </div>
</div>
