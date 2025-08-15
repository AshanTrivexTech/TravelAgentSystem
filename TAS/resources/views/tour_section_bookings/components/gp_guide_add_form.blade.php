<form class="cleafix" method="POST">
    @php

   if($gp_tour_guide_data != '')
   {     
        $exrateGuidelkrtobase = $gp_tour_guide_data->bsratelkr;
        
   }else{
       $exrateGuidelkrtobase=0;
   }
        
    @endphp
        <div style="overflow-x:auto;">
               <table class="table table-bordered" width:"100%">                  
                       <thead style="text-align: center;" >
                               <tr>
                                   <td colspan="4">
                                         <strong>Guides / Translators Details</strong>
                                   </td>
                               </tr>
                               <tr>
                                   <td style="text-align: right;" colspan="4">
                                        <button type="button" onclick="appyAll()" class="btn btn-warning m-btn btn-sm m-btn--icon">
                                                <span>
                                                    <i class="la la-copy"></i>
                                                    <span>Apply All</span>
                                                </span>
                                        </button>

                                        <button type="button" onclick="removeAll()" class="btn btn-danger m-btn btn-sm m-btn--icon">
                                                <span>
                                                    <i class="la la-trash"></i>
                                                    <span>Remove All</span>
                                                </span>
                                        </button>
                                   </td>
                               </tr>
                       </thead>
                        <tbody>
                              
                            @for ($i = 1; $i <= $noOfDays; $i++)
                                
                                    @php
                                    
                                        $date = date('Y-m-d', strtotime($frmdate. ' + '.($i-1).' days'));
                                        

                                    @endphp

                        <tr  id="gmtr_{{$i}}">                                                                    
                                   
                                    <td colspan="4">                                        
                                        
                                        <div style="text-align: left;">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">

                                                    <tr  style="text-align: left;">

                                                            <th style="text-align: center;" width="20%"> 
                                                                    <Strong>Day &nbsp;&nbsp;{{$i}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$date}}   </Strong>                                        
                                                            <input id="date_{{$i}}" type="hidden" value="{{$date}}">
                                                            </th> 

                                                            <th width="15%">
                                                                    Guide Type :
                                                                <select id="sl_guide_type_{{$i}}" onchange="LoadGuideRooms('{{$i}}')" class="form-control m-bootstrap-select m_selectpicker sm" data-live-search="true">                                                                    
                                                                
                                                                    <option selected value="0">Select Type</option>
                                                                    @foreach ($guide_types_list as $guide_types)

                                                                    <option value="{{$guide_types->id}}">{{$guide_types->g_type}}</option>
                                                                        
                                                                    @endforeach
                                                                </select>

                                                            </th>
                                                            <th width="15%">
                                                                    Language :
                                                                <select id="sl_lang_{{$i}}" onchange="LoadGuideRooms('{{$i}}')" class="form-control m-bootstrap-select m_selectpicker sm" data-live-search="true">
                                                                        <option selected value="0">Select Language</option>
                                                                        @foreach ($guide_lang_list as $guide_lang)

                                                                        <option value="{{$guide_lang->id}}">{{$guide_lang->lang_name}}</option>
                                                                                
                                                                        @endforeach
                                                                </select>
                                                                
                                                            </th>
                                                                <th width="15%" colspan="4">
                                                                    Hotel Name :
                                                                    <select id="sl_hotel_{{$i}}" class="form-control">                                                                    
                                                                            
                                                                            <option selected value="0">None</option>
                                                                                
                                                                                {{-- @foreach ($hotels as $hotel_list)

                                                                                    <option value="{{$hotel_list->id}}">{{$hotel_list->sup_s_name}}</option>
                                                                                    
                                                                                @endforeach --}}
                                                                    </select>
                                                               
                                                                </th>
                                                                

                                                            {{-- <th  width="54%">
                                                                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                                                                   <option value="0">Select Guide Name</option>
                                                                </select>       
                                                            </th> --}}
                                                                                                                                                                                 
                                                            <th  width="5%">
                                                                    <button type="button" onclick="addGuide({{$i}})" class="btn btn-success m-btn btn-sm m-btn--icon">
                                                                            <span>
                                                                                <i class="la la-plus"></i>
                                                                                <span>Add</span>
                                                                            </span>
                                                                    </button>
                                                            </th>
                                                    </tr>

                                                </thead>
                                                <tbody id="gdttb_{{$i}}">
                                                    {{-- {{$cur_ex_dt_rate->amount}} --}}
                                                        
                                                        @foreach ($tourQoutGuide_gp as $guideDay => $guideSl)
                                                            
                                                            @if ($guideDay == $i)

                                                                @foreach ($guideSl as $guideSl_list)

                                                                <tr style="text-align: center;" class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}">

                                                                        <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}">
                                                                        <strong id="guide_typelngname_{{$i}}_{{$guideSl_list->pos}}" class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}">{{$guideSl_list->g_type}} - {{$guideSl_list->lang_name}}</strong>
                                                                                <input class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" id="guide_type_id_{{$i}}_{{$guideSl_list->pos}}" type="hidden" value="{{$guideSl_list->gtid}}">
                                                                                <input class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" id="guide_lang_id_{{$i}}_{{$guideSl_list->pos}}" type="hidden" value="{{$guideSl_list->glangid}}">
                                                                                </td>
                                                                                <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" style="white-space: nowrap; overflow: hidden;" width="15%">
                                                                                  Guide fee (LKR) :
                                                                                  <input id="guide_fee_{{$i}}_{{$guideSl_list->pos}}" style="text-align: center;" onkeyup="CalGuidefees()" value="{{$guideSl_list->guide_fee}}" type="text" class="form-control m-input sm RemoveGuide_{{$i}}_{{$guideSl_list->pos}} cal_guide_row numeric_only">
                                                                                </td>
                                                                                <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" style="white-space: nowrap; overflow: hidden;" width="15%">
                                                                                           Guide fee Markup (LKR)
                                                                                           <input id="guide_com_{{$i}}_{{$guideSl_list->pos}}" style="text-align: center;" onkeyup="CalGuidefees()" value="{{$guideSl_list->guide_com}}" type="text" class="form-control m-input sm RemoveGuide_{{$i}}_{{$guideSl_list->pos}} cal_guide_row numeric_only">
                                                                                           
                                                                               </td>
                                                                               <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" style="white-space: nowrap; overflow: hidden;" width="10%">
                                                                                        Room P.C  
                                                                                        @php
                                                                                            $exrateGuidelkrtobase = $guideSl_list->lkr_rate;

                                                                                            if($guideSl_list->has_room ==1){
                                                                                                $guiderRoomhas = $guideSl_list->crcode; 
                                                                                            }else{
                                                                                                $guiderRoomhas= "None";
                                                                                            }   
                                                                                        @endphp

                                                                                        <input disabled id="guide_rm_crid_{{$i}}_{{$guideSl_list->pos}}" style="text-align: center;" value="{{$guiderRoomhas}}" type="text" class="form-control m-input sm RemoveGuide_{{$i}}_{{$guideSl_list->pos}}">
                                                                                </td>
                                                                                <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" style="white-space: nowrap; overflow: hidden;" width="12%">
                                                                                         Room Rate
                                                                                         <input id="guide_rm_am_{{$i}}_{{$guideSl_list->pos}}" disabled style="text-align: center;" onkeyup="CalGuidefees()" value="{{number_format($guideSl_list->room_rate,2)}}" type="text" class="form-control m-input sm RemoveGuide_{{$i}}_{{$guideSl_list->pos}} cal_guide_row">
                                                                                         <input class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" id="guide_rm_id_{{$i}}_{{$guideSl_list->pos}}" type="hidden" value="@if($guideSl_list->has_room ==0) 0 @else {{$guideSl_list->grmId}} @endif">
                                                                                </td>
                                                                              
                                                                                <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" style="white-space: nowrap; overflow: hidden;" width="10%">
                                                                                        1&nbsp;&nbsp;&nbsp; @if($guideSl_list->has_room == 0) None @else {{$baseCurrncyCode}} @endif
                                                                                       <input disabled id="guide_rm_cr_exrate_{{$i}}_{{$guideSl_list->pos}}" style="text-align: center;" onkeyup="CalGuidefees()" value="{{number_format($guideSl_list->room_excrate,2)}}" type="text" class="form-control m-input sm RemoveGuide_{{$i}}_{{$guideSl_list->pos}} cal_guide_row numeric_only">
                                                                                </td>
                                                                                <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" style="white-space: nowrap; overflow: hidden;" width="25%">
                                                                                           Room Markup
                                                                                           <input id="guide_rm_com_{{$i}}_{{$guideSl_list->pos}}" @if($guideSl_list->has_room == 0) disabled @endif value="{{number_format($guideSl_list->room_com,2)}}" onkeyup="CalGuidefees()" style="text-align: center;" type="text" class="form-control m-input sm RemoveGuide_{{$i}}_{{$guideSl_list->pos}} cal_guide_row numeric_only">
                                                                                           
                                                                               </td>
                                                                               <td class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}" style="text-align: center;">
                                                                               <button type="button" onclick="RemoveGuide('{{$i}}','{{$guideSl_list->pos}}')" class="btn btn-danger m-btn btn-sm m-btn--icon RemoveGuide_{{$i}}_{{$guideSl_list->pos}}">
                                                                                                    <span class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}"><i class="la la-trash RemoveGuide_{{$i}}_{{$guideSl_list->pos}}"></i>
                                                                                                        <span class="RemoveGuide_{{$i}}_{{$guideSl_list->pos}}">Remove</span>
                                                                                                    </span>
                                                                                            </button>
                                               
                                                                                </td>
                                                                </tr>
                                                                @endforeach

                                                            @endif

                                                        @endforeach

                                                    
                                                 
                                                </tbody>
                                            </table>
                                                                                       
    
    
                                        </div>   
                                         
                                    
                                    </td>                                                        
                            
                           </tr>
                              

                            @endfor
                                                       
                            <tr style="text-align: center;">
                                <th colspan="4">Summery</th>
                            </tr>
                            <tr style="text-align: center;">
                                    <th>{{$baseCurrncyCode}} to LKR Exchange Rate :</th>
                                     <th><input id="basetocrguide" style="text-align: center;" value="{{$exrateGuidelkrtobase}}" type="text" class="form-control m-input sm cal_guide_row numeric_only" onkeyup="CalGuidefees()"></th>
                                    <th colspan="2"></th>
                            </tr>

                           <tr style="text-align: center;">
                                <th>Description</th>
                                <th>Guide fee (LKR)</th>
                                <th>Guide fee In {{$baseCurrncyCode}}</th>                                                               
                                <th>Accommodation</th>
                           </tr>
                            
                           <tr class="table-warning" style="text-align: right;">
                            <td><b>Total Cost :</b></td>
                            <td >LKR <label id="guide_costlk">0.00</label></td>
                            <td>{{$baseCurrncyCode}}  <label id="guide_costex">0.00</label></td>
                            <td>{{$baseCurrncyCode}}  <label id="guide_rmcost">0.00</label></td>
                           </tr>
                           
                           <tr style="text-align: right;">
                              <td><b>Total Markup :</b></td> 
                              <td>LKR <label id="guide_mklk">0.00</label></td>
                              <td>{{$baseCurrncyCode}}  <label id="guide_mkex">0.00</label></td>
                              <td>{{$baseCurrncyCode}}  <label id="guide_mkrm">0.00</label></td>
                           </tr style="text-align: right;">
                           <tr class="table-success" style="text-align: right;">
                                <td><b>Selling Rate :</b></td>
                                <td>LKR <label id="guide_tot">0.00</label></td>
                                <td>{{$baseCurrncyCode}}  <label id="guide_totexr">0.00</label></td>
                                <td>{{$baseCurrncyCode}}  <label id="guide_totrm">0.00</label></td>
                            </tr>
                            <tr class="table-primary" style="text-align: right;">
                                    <td><b>Markup Percentage:</b></td>
                                    <td id="guide_mkp">0.00%</td>
                                    <td id="guide_2mkp">0.00%</td>
                                    <td id="guide_rmmkp">0.00%</td>
                            </tr>
                            
                        </tbody>
                            
               </table>
           </div>
          
           <br>
                   <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                           <div class="m-form__actions m-form__actions--solid">
                               <div class="row">
                                   <div class="col-lg-2">
                                    
                                       <button class="btn btn-primary" type="button" onclick="guideSave()" >Save Guide Details</button>
                                 </div>
                               </div>
                           </div>
                   </div>
           
       </form>
    