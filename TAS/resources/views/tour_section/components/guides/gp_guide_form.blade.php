<form class="cleafix" method="POST" action="">
<div style="overflow-x:auto;">
        <table class="table table-bordered table-sm" width="100%">
                <thead style="text-align: center;">
                    <tr>
                        <th class="table-success" colspan="13">Guide</th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>
                        <th class="table-primary" colspan="3">National Guide (LKR)</th>
                        <th class="table-info" colspan="3">Chauffeur Guide (LKR)</th>
                        <th rowspan="2" class="table-secondary"> LKR to {{$baseCurrncyCode}}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Language</th>
                        <th class="table-primary">Fee</th>
                        <th class="table-primary">MKP</th>
                        <th class="table-primary">Fee + MKP</th>
                        
                        <th class="table-info">Fee</th>
                        <th class="table-info">MKP</th>
                        <th class="table-info">Fee + MKP</th>
                        
                    </tr>
                        @php
                            $selected_lang = 0;
                            $saved_nat_fee = 0;
                            $saved_nat_mkp = 0;
                            $saved_chf_fee = 0;
                            $saved_chf_mkp = 0;

                            $saved_baserate_gp =0;
                            
                           if($gp_guide_dataSaved->count()!=0){
                           
                                $selected_lang = $gp_guide_dataSaved[0]->language_id;
                                $saved_nat_fee = $gp_guide_dataSaved[0]->na_guide_rate;
                                $saved_nat_mkp = $gp_guide_dataSaved[0]->na_guide_mkp;
                                $saved_chf_fee = $gp_guide_dataSaved[0]->ch_guide_rate;
                                $saved_chf_mkp = $gp_guide_dataSaved[0]->ch_guide_mkp;
                                $saved_baserate_gp = $gp_guide_dataSaved[0]->bsratelkr;

                           }
                            
                            
                        @endphp
                    <tr>
                        
                        <th class="table-secondary" colspan="3">
                                <select id="gpsl_lang" onchange="onChange_lang_gp()" class="form-control m-bootstrap-select m_selectpicker sm" data-live-search="true">
                                        <option selected value="0">Select Language</option>
                                            @foreach ($guide_lang_list as $guide_lang)

                                            <option @if($selected_lang == $guide_lang->id) selected @endif value="{{$guide_lang->id}}">{{$guide_lang->lang_name}}</option>
                                                    
                                            @endforeach
                                </select>
                        </th>
                        
                        <th>
                            <input onkeyup="cal_head_gp_guide()" id="gp_nat_guide_rate" style="text-align: center;" value="{{number_format($saved_nat_fee,2)}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </th>
                        <th>
                            <input onkeyup="cal_head_gp_guide()" id="gp_nat_guide_mkp" style="text-align: center;" value="{{number_format($saved_nat_mkp,2)}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </th>
                        <th>
                            <input disabled id="gp_nat_guide_tot" style="text-align: center;" value="{{number_format(($saved_nat_fee+$saved_nat_mkp),2)}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </th>
                        <th>
                            <input onkeyup="cal_head_gp_guide()" id="gp_chf_guide_rate" style="text-align: center;" value="{{number_format($saved_chf_fee,2)}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </th>
                        <th>
                                <input onkeyup="cal_head_gp_guide()" id="gp_chf_guide_mkp" style="text-align: center;" value="{{number_format($saved_chf_mkp,2)}}" maxlength="" class="form-control m-input sm numeric_only" type="text"> 
                        </th>
                        <th>
                                <input disabled id="gp_chf_guide_tot" style="text-align: center;" value="{{number_format(($saved_chf_fee+$saved_chf_mkp),2)}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </th>
                        <th>
                            <input id="gp_guide_lkrrate" style="text-align: center;" value="{{number_format($saved_baserate_gp,2)}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </th>
                    </tr>
                    <tr>
                        <th class="bg-secondary" style="text-transform: uppercase;" colspan="13">National Guide Accommodation</th>
                    </tr>
                    <tr>
                        <th class="bg-secondary" width="5%">Day</th>
                        <th class="bg-secondary" width="8%">Date</th>
                        <th class="bg-secondary" width="5%">Guiding fee</th>
                        {{-- <th class="bg-secondary" width="8%">National Rate</th>
                        <th class="bg-secondary" width="8%">National MKP</th>
                        <th class="bg-secondary" width="8%">Chauffeur Rate</th>                       
                        <th class="bg-secondary" width="8%">Chauffeur MKP</th> --}}
                        <th colspan="5" class="bg-secondary" width="40%">Hotel Name</th>
                        <th class="bg-secondary" width="8%">P.C</th>
                        <th class="bg-secondary" width="10%">ACCMD Rate</th>
                        <th class="bg-secondary" width="9%">1 {{$baseCurrncyCode}}</th>                        
                        <th class="bg-secondary" width="10%">Rate in {{$baseCurrncyCode}}</th>
                        <th class="bg-secondary" width="10%" data-html="true"  data-placement="top" data-toggle="m-tooltip" data-original-title="<b>Accommodation Markup</b>">ACCMD MKP</th>                       
                    </tr>                   
                </thead>
                <tbody style="text-align: center;">
                    
                    

                    @for ($i = 1; $i <= $noOfDays; $i++)


                                
                        @php
                            $sld_hotel = 0;
                            $sld_ht_mkp = 0;
                            
                            $pc_cr_code = '';
                            $sld_pc_rate = 0.00;
                            $sld_excRate = 0.00;
                            $sld_inbcRate = 0.00;


                            $date = date('Y-m-d', strtotime($frmdate. ' + '.($i-1).' days'));

                            foreach($groomsHotelList as $groomsHotelList_lst){
                                
                                if ($groomsHotelList_lst->tour_day == $i){
                                    
                                    $sld_hotel = 1;
                                    $pc_cr_code = $groomsHotelList_lst->code;
                                    $sld_pc_rate = $groomsHotelList_lst->guide;
                                    $sld_excRate = $groomsHotelList_lst->rate_to_base;
                                    $sld_inbcRate = ($sld_pc_rate/$sld_excRate);
                                    $sld_guding_fee = 1;

                                    $sld_ht_mkp = (($groomsHotelList_lst->guide/$groomsHotelList_lst->rate_to_base)/100.00 * $basecomisionRate);
                                    
                                    foreach($gp_guide_dataSaved as $gp_guide_dataSaved_lst){

                                        if ($gp_guide_dataSaved_lst->tour_day == $i){

                                            $sld_hotel = $gp_guide_dataSaved_lst->pos;
                                            $sld_ht_mkp = $gp_guide_dataSaved_lst->accmd_mkp;
                                            $sld_guding_fee = $gp_guide_dataSaved_lst->gf_ad;
                                            
                                            if($sld_hotel==0){
                                                
                                                $pc_cr_code = '';
                                                $sld_pc_rate = 0.00;
                                                $sld_excRate = 0.00;
                                                $sld_inbcRate = 0.00;

                                            }

                                        }
                                    }

                                }
                               
 

                            }
                            
                            

                        @endphp
                    <tr>
                        <td style="text-align: center;">{{$i}}</td>
                        <td style="text-align: center;">{{$date}}</td>
                        <td style="text-align: center;">
                            <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                            <input id="guideing_fee_apply_{{$i}}" @if($sld_guding_fee==1) checked @endif type="checkbox">&nbsp;
                                    
                                    <span></span>

                            </label>
                        </td>
                        <td colspan="5">
                                <select onchange="onChange_accmd_gp_guide('{{$i}}')" id="gp_guide_hotel_{{$i}}" class="form-control">
                                                                            
                                        <option value="0">None</option>

                                        @foreach ($groomsHotelList as $groomsHotelList_lst)
                                            
                                        
                                            @if ($groomsHotelList_lst->tour_day == $i)
                                                <option @if($sld_hotel == $groomsHotelList_lst->pos) selected @endif value="{{$groomsHotelList_lst->pos}}">{{$groomsHotelList_lst->sup_s_name}}</option> 
                                            @endif    
                                             

                                        @endforeach
                                            
                                </select>
                        </td>
                        
                        <td>
                            
                            <input disabled id="gp_nat_guide_accmd_crcode_{{$i}}" style="text-align: center;" value="{{$pc_cr_code}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </td>
                        <td>
                            <input disabled id="gp_nat_guide_accmd_rate_{{$i}}" style="text-align: center;" value="{{$sld_pc_rate}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </td>   
                        <td>
                            <input disabled id="gp_nat_guide_accmd_excrate_{{$i}}" style="text-align: center;" value="{{$sld_excRate}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </td>
                        <td>
                            <input disabled id="gp_nat_guide_accmd_inbrate_{{$i}}" style="text-align: center;" value="{{$sld_inbcRate}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </td>
                        <td>
                            <input id="gp_nat_guide_accmd_mkp_{{$i}}" style="text-align: center;" value="{{$sld_ht_mkp}}" maxlength="4" class="form-control m-input sm numeric_only" type="text"> 
                        </td>                     
                    </tr>

                @endfor
                </tbody>
        </table>
</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                <div class="col-lg-2">                        
                    <button id="btn_save_tab_3" @if($data_status->confirmed==0 && $data_status->status==4) disabled @endif class="btn btn-primary onClick_save" onclick="save_gp_guides()" type="button">Save Guides Details</button>
                </div>
            </div>
        </div>
</div>
</form>