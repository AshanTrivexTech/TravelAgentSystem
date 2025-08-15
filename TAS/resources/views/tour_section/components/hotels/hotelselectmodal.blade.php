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

<div class="modal" id="m_modal_6" tabindex="-1" role="dialog">
        <div class="slmd-main modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header slmd-header">
                                
                                    <span class="mdsp-header" id="mod_title"><h6 class="mdsp-header" id="md_header"></h6></span>
                              
                                <input type="hidden" id="mod_hidden">
                                <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                                <i class="fa fa-close"></i>
                                </a>
                        </div>
                        <div class="modal-body slmd-body">
                                <input type="hidden" id="model_date" value="">
                                        <div class="form-group m-form__group row">
                                                 <div class="col-md-3">
                                                  <label class="form-control-label">Contract Name</label>                                                   
                                                    <input type="text"  value="" class="form-control m-input" placeholder="Search Contracts.." id="txt_sr_id">                                                                
                                                 </div>
                                                 <div class="col-md-2">
                                                                <label class="form-control-label">City</label>                                                   
                                                                      <select  class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="cmb_city_htmd">
                                                                              {{-- @foreach($citys as $city) --}}
                                                                              {{-- <option value="{{$city->id}}">{{$city->city_name}}</option> --}}
                                                                            {{-- @endforeach --}}
                                                                      </select>
                                                               </div>
                                                <div class="col-md-2">
                                                  <label class="form-control-label">Hotel</label>                                                   
                                                        <select onchange="fetch_quotation_data()" class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="cmb_hotel_htmd">
                                                                <option value="0" selected>All</option>
                                                                @foreach ($hotels as $hotel)
                                                                <option value="{{$hotel->id}}">{{$hotel->sup_s_name}}</option>
                                                               @endforeach
                                                        </select>
                                                 </div>

                                                   <div class="col-md-2">
                                                  <label class="form-control-label">Room Type</label>                                                   
                                                        <select onchange="fetch_quotation_data()" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="cmb_r_type_htmd">
                                                                <option value="0" selected>All</option>
                                                                @foreach ($roomTypes as $roomType)
                                                                 <option value="{{$roomType->id}}">{{$roomType->r_type}}</option>
                                                                @endforeach
                                                        </select>
                                                 </div>
                                                   <div class="col-md-1">
                                                  <label class="form-control-label">Meal Plan</label>                                                   
                                                        <select onchange="fetch_quotation_data()" class="form-control m-bootstrap-select m_selectpicker"  data-live-search="true" id="cmb_meal_plane_htmd">
                                                                <option value="0" selected>All</option>
                                                                @foreach ($mealPlans as $mealPlan)
                                                                <option value="{{$mealPlan->id}}">{{$mealPlan->meal_plane}}</option>
                                                               @endforeach
                                                        </select>
                                                 </div>
                                                  <div  class="col-md-2" >
                                                                <label class="form-control-label">&nbsp;
                                                                                &nbsp;
                                                                                &nbsp;
                                                                                &nbsp;
                                                                                &nbsp;
                                                                        </label>
                                                                @if($quickQtMode==0)
                                                                        <button type="button" onclick="" class="btn btn-success btn-md m-btn m-btn--icon" data-toggle="modal" data-target="#m_modal_9">
                                                                        <span>
                                                                        <i class="fa fa-plus-square"></i>
                                                                                <span style="font-size:14px;">Add New Contracts</span>
                                                                        </span>
                                                                        </button>
                                                                @elseif($quickQtMode==1)
                                                                        <button type="button" onclick="clear_data_qk_con_create()" class="btn btn-success btn-md m-btn m-btn--icon" data-toggle="modal" data-target="#m_modal_10">
                                                                                        <span>
                                                                                        <i class="fa fa-plus-square"></i>
                                                                                        <span>Add Manual</span>
                                                                                        </span>
                                                                        </button>  
                                                                @endif
                                                 </div>
                                              
                                        </div>
                               <div style="overflow-x:auto; overflow-y:auto;">
                                 <table class="table table-bordered table table-sm" width="100%">
                                        <thead>
                                                <tr style="text-align: center;">
                                                        <th width="6%">ID</th>
                                                        <th>Hotel Name</th>
                                                        <th>Contract Name</th>
                                                        <th>Details</th>
                                                        <th width="6%">Currency</th>                                                        
                                                        <th width="8%">SGL</th>
                                                        <th width="8%">DBL</th>
                                                        <th width="8%">TBL</th>
                                                        <th width="8%">QTB</th>
                                                        <th width="8%">GR</th>
                                                        <th width="8%">CR</th>                                                                                                                
                                                        <th width="8%">Period</th>
                                                        <th width="10%">Add</th>
                                                </tr>  
                                        </thead>
                                        <tbody id="slmdtb">                                               
                                        </tbody>

                                </table>
                               </div>
                        </div>
                        
        


                        <div class="slmd-footer">
                                &nbsp;
                                {{-- <button type="button" class="btn btn-success">Select</button> --}}
                        </div>
                </div>
        </div>
</div>
