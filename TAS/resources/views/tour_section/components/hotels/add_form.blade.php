<form class="cleafix" method="POST">
    
                    <div style="overflow-x:auto;">
                           <table class="table table-bordered" width:"100%">                  
                                   <thead >
                                           <tr>
                                                   <td style="text-align: center;" colspan="9">
                                                           <strong>Hotels & Package Details</strong>
                                                   </td>
                                           </tr>
                                   </thead>
                                    <tbody>  
                                          
                                        @for ($i = 1; $i <= $noOfDays; $i++)
                                            
                                                @php
                                                
                                                    $date = date('Y-m-d', strtotime($frmdate. ' + '.($i-1).' days'));
                                                     
                                                     $btn_up='';
                                                     $btn_dw='';
                                                     
                                                     if($i<2){
                                                        $btn_up='disabled';
                                                     }
                                                     if($noOfDays==$i){
                                                        $btn_dw='disabled';
                                                     }

                                                @endphp
            
                                    <tr  id="mtr_{{$i}}">
                                              
                                                <td style="text-align: center;" width="5%"> 
                
                                                       
                                                       
                                                       
                                                         <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                                            <button type="button" onclick="addHotel('{{$i}}','{{$date}}')" 
                                                            class="btn btn-success btn-md m-btn" data-toggle="modal" data-target="#m_modal_6">
                                                                <span>
                                                                    <i class="fa fa-plus-circle"></i>
                                                                    <span>Add</span>
                                                                </span>
                                                            </button>  
                                                        <button id="row_up_btn_{{$i}}" {{$btn_up}} type="button" onclick="move_up_hotels('{{$i}}')" 
                                                            class="btn btn-secondary btn-md m-btn">
                                                           <span>
                                                                &nbsp;
                                                               <i class="fa fa-arrow-circle-up"></i>
                                                               <span>&nbsp;</span>
                                                           </span>
                                                            </button>
                                                            <button id="row_dw_btn_{{$i}}" {{$btn_dw}} type="button" onclick="move_down_hotels('{{$i}}')" 
                                                            class="btn btn-secondary btn-md m-btn">
                                                           <span>
                                                                &nbsp;
                                                               <i class="fa fa-arrow-circle-down"></i>
                                                               <span>&nbsp;</span>
                                                           </span>
                                                            </button>                                                  
                                                                                                              
                                                        </div>
                                                </td>
                                               
                                                <td colspan="8">
                                                    
                                                    
                                                    <div style="text-align: left;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr height="10px">
                                                                    <td class="bg-secondary" colspan="9">
                                                                            
                                                                                    {{-- <strong> --}}
                                                                                            @foreach ($LocationDtList_gp as $day => $LcDist)
                                                                                                @php
                                    
                                                                                                $firts_tag =0;
                                                                                                @endphp
                                                                                            @if($day == $i)
                                                                                                        
                                                                                                        @foreach ($LcDist as $Dist)
                                                                                                            @php
                                                                                                                $firts_tag++;
                                                                                                                
                                                                                                            @endphp                                              
                                                                                                             @if ($firts_tag !=1)
                                                                                                                    &nbsp;/&nbsp;
                                                                                                             @endif
                                                                                                             {{$Dist->lc_name}}
                                                                                                        @endforeach
                                                                                                
                                                                                            @endif
                                                                                    @endforeach                                                                        
                                                                                    {{-- </strong> --}}
                                                                                
                                                                    </td>
                                                                </tr>
                                                                <tr class="t" style="text-align: center;">    
                                                                        <th style="text-align: left;">
                                                                        <span ><strong>Day &nbsp;{{$i}} &nbsp;-&nbsp; Date : &nbsp;{{$date}}&nbsp;</strong></span>

                                                                        <input id="date_{{$i}}" type="hidden" value="{{$date}}">
                                                                        </th>                                                                                                                                    
                                                                        <th width="5%">P.C</th>
                                                                        <th width="8%">1 &nbsp;&nbsp;{{$baseCurrncyCode}}</th>
                                                                        <th width="8%">SS MP</th>
                                                                        <th width="8%">DB MP</th>
                                                                        <th width="8%">TR MP</th>
                                                                        <th width="8%">QD MP</th>
                                                                        <th width="8%">CR MP</th>
                                                                        <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            @php
                                                                $status_get=0;
                                                            @endphp
                                                            <tbody id="dttb_{{$i}}">

                                                                @foreach ($tourQuoteHotel_gp as $day => $htpkg)

                                                                @if($day == $i)
                                                                    
                                                                @foreach ($htpkg as $hotepkgs)

                                                                @php

                                                                if($hotepkgs->crcode == $baseCurrncyCode)
                                                                {
                                                                    $status_get++;
                                                                        
                                                                }
                                                                else {
                                                                    $status_get=0;
                                                                }

                                                                $rowColour = 'primary';
                                                                if($hotepkgs->status == 4){
                                                                    $rowColour = 'danger';
                                                                }else{
                                                                    $rowColour = 'primary';
                                                                }
                                                                    
                                                                @endphp

                                                                <tr id="tbr_{{$hotepkgs->pos}}_{{$day}}" class="table-{{$rowColour}} Remove_Hotel_{{$hotepkgs->pos}}_{{$day}} sm">
                                                                    <td class="table-primary Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">                                                                        
                                                                        <b class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                        <span class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}"><i class="la la-hotel Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}"></i>
                                                                        <span class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">&nbsp;{{$hotepkgs->sup_s_name}}/{{$hotepkgs->r_type}}-{{$hotepkgs->meal_plane}} / SG {{$hotepkgs->ss_rate}} / DB {{$hotepkgs->db_rate}} / TR {{$hotepkgs->trp_rate}} / QTB {{$hotepkgs->qtb_rate}} / GR {{$hotepkgs->guide}} / CR {{$hotepkgs->child_rate}}&nbsp; ({{$hotepkgs->from_date}}-{{$hotepkgs->to_date}})</span>
                                                                        </span></b>
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="sgl_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->ss_rate}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="dbl_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->db_rate}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="tbl_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->trp_rate}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="qtb_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->qtb_rate}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="gr_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->guide}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="gr_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->guide}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="child_rt_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->child_rate}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="status_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->status}}">

                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="pkid_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->hotel_package_id}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="supid_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->supplier_id}}">
                                                                        <input class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" type="hidden" id="curID_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->currency_id}}">
                                                                    <div id="comsup_mlist_{{$hotepkgs->pos}}_{{$day}}" class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                    
                                                                            @foreach ($tourQouHotelComSup_gp as $csupDay => $c_sup_sp)
                                                                                
                                                                                @if ($csupDay == $i)
                                                                                  
                                                                                  @php  
                                                                                        $supCount=0;                                                                                     
                                                                                        $str_comsup ='';
                                                                                    
                                                                                  @endphp


                                                                                    @foreach ($c_sup_sp as $cmp_supLs)
                                                                                    @if ($cmp_supLs->pos == $hotepkgs->pos)
                                                                                       @php
                                                                                            $supCount++;
                                                                                        @endphp    
                                                                                        
                                                                                        <span class="Remove_Hotel_{{$cmp_supLs->pos}}_{{$i}}">
                                                                                            <input class="Remove_Hotel_{{$cmp_supLs->pos}}_{{$i}}" id="cmpsup_id_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->compulsory_supliment_id}}">
                                                                                            <input class="Remove_Hotel_{{$cmp_supLs->pos}}_{{$i}}" id="cmpsup_amt_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->csup_amount}}">
                                                                                            <input class="Remove_Hotel_{{$cmp_supLs->pos}}_{{$i}}" id="cmpsup_exrate_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->exrate}}">
                                                                                            <input class="Remove_Hotel_{{$cmp_supLs->pos}}_{{$i}}" id="cmpsup_ratetype_added_{{$cmp_supLs->spos}}_{{$cmp_supLs->pos}}_{{$i}}" type="hidden" value = "{{$cmp_supLs->rate_type}}">
                                                                                        </span>

                                                                                         @php
                                                                                            
                                                                                            if($cmp_supLs->rate_type==0){
                                                                                                $rateTypeCmp = 'PP Rate';
                                                                                            }else{
                                                                                                $rateTypeCmp = 'PR Rate';
                                                                                            }
                                                                                             $str_comsup .='CMP SUP/'.$rateTypeCmp.'/'.$baseCurrncyCode.' '.number_format(($cmp_supLs->csup_amount/$cmp_supLs->exrate),2).'/- , ';
                                                                                         @endphp
                                                                                    @endif   
                                                                                    @endforeach
                                                                                        @if ($supCount != 0)
                                                                                            <b class="m-badge m-badge--danger m-badge--wide Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                                                    {{$str_comsup}}
                                                                                            </b>
                                                                                        @endif         
                                                                                @endif           

                                                                            @endforeach


                                                                    
                                                                    
                                                                    
                                                                    </div>
                                                                        <div id="optsup_mlist_{{$hotepkgs->pos}}_{{$day}}" class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                        
                                                                        
                                                                            @foreach ($tourQouHotelOptSup_gp as $opsupDay => $op_sup_sp)
                                                                                
                                                                            @if ($opsupDay == $i)

                                                                            
                                                                                
                                                                           
                                                                              
                                                                              @php  
                                                                                    $opsupCount=0;                                                                                     
                                                                                    $str_Optsup ='';
                                                                                
                                                                              @endphp

                                                                                @foreach ($op_sup_sp as $ops_supLs)
                                                                                 
                                                                                 @if ($ops_supLs->pos == $hotepkgs->pos)
                                                                                 
                                                                                   @php
                                                                                        $opsupCount++;
                                                                                    @endphp    
                                                                                    
                                                                                    <span class="Remove_Hotel_{{$ops_supLs->pos}}_{{$i}}">
                                                                                        <input class="Remove_Hotel_{{$ops_supLs->pos}}_{{$i}}" id="optsup_id_added_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="hidden" value = "{{$ops_supLs->optional_supliment_id}}">
                                                                                        <input class="Remove_Hotel_{{$ops_supLs->pos}}_{{$i}}" id="optsup_amt_added_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="hidden" value = "{{$ops_supLs->opsup_amount}}">                                                                                       
                                                                                        <input class="Remove_Hotel_{{$ops_supLs->pos}}_{{$i}}" id="optsup_ratetype_added_{{$ops_supLs->spos}}_{{$ops_supLs->pos}}_{{$i}}" type="hidden" value = "{{$ops_supLs->rate_type}}">
                                                                                    </span>

                                                                                     @php
                                                                                        
                                                                                        if($ops_supLs->rate_type==0){
                                                                                            $rateTypeCmp = 'PP Rate';
                                                                                        }else{
                                                                                            $rateTypeCmp = 'PR Rate';
                                                                                        }
                                                                                         $str_Optsup .='OPT SUP/'.$rateTypeCmp.'/'.$hotepkgs->crcode.' '.number_format(($ops_supLs->opsup_amount),2).'/- , ';
                                                                                     @endphp
                                                                                @endif   
                                                                                @endforeach
                                                                                    @if ($opsupCount != 0)
                                                                                        <b class="m-badge m-badge--warning m-badge--wide Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                                                {{$str_Optsup}}
                                                                                        </b>
                                                                                        <br>
                                                                                    @endif     
                                                                             @endif 
                                                                                    

                                                                        @endforeach                                                                     
                                                                        
                                                                        
                                                                        </div>
                                                                        
                                                                        
                                                                            

                                                                        {{-- {{$day}} ok  {{$hotepkgs->pos}} --}}
                                                                   </td>                                                                   
                                                                   <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                    {{$hotepkgs->crcode}}
                                                                    </td>
                                                                    <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                      <input onkeyup="CalAll()" id="cr_rate_add_{{$hotepkgs->pos}}_{{$day}}"  value="{{$hotepkgs->rate_to_base}}"  style="text-align: center;" type="text" class="form-control form-control-sm cal Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                    </td> 
                                                                    <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                        <input onkeyup="CalAll()" id="sglCom_add_{{$hotepkgs->pos}}_{{$day}}"  value="{{$hotepkgs->ss_com}}" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                    </td>
                                                                    <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                        <input onkeyup="CalAll()" id="dblCom_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->db_com}}" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                    </td>
                                                                    <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                       <input onkeyup="CalAll()" id="tblCom_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->trp_com}}" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                    </td>
                                                                    <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                        <input onkeyup="CalAll()" id="qtbCom_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->qtb_com}}" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                    </td>
                                                                    <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                            <input onkeyup="CalAll()" id="childCom_add_{{$hotepkgs->pos}}_{{$day}}" value="{{$hotepkgs->child_com}}" style="text-align: center;" type="text" class="form-control form-control-sm Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                        </td>
                                                                    <td class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}" style="text-align: center;">
                                                                    <button type="button" onClick="RemovePkg({{$hotepkgs->pos}},'{{$day}}')" class="btn btn-danger m-btn btn-sm m-btn--icon Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">
                                                                        <span class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}"><i class="la la-trash Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}"></i><span class="Remove_Hotel_{{$hotepkgs->pos}}_{{$day}}">Remove</span></span></button>
                                                                    </td>

                                                                @endforeach       
                                                                            
                                                                @endif
                                                                </tr>

                                                                @endforeach    
                                                            </tbody>
                                                        </table>
                                                                                                   
                
                
                                                    </div>   
                                                     
                                                
                                                </td>
                                                
                                              
                                        
                                       </tr>
                                          
                                         
                                        @endfor
                                        <table class="table table-bordered" width:"100%">
                                            <tbody>
                                       <tr style="text-align: center;"><th colspan="9">Summary</th></tr>
                                       <tr style="text-align: center;">
                                            <th colspan="2">Description</th>
                                            <th>Single</th>
                                            <th>Double</th>
                                            <th>Triple</th>
                                            <th>Quadruple</th>
                                            <th>Child</th>
                                            <th>Details</th>
                                            <th>Rate</th>
                                            </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><b>Total without Supliment Cost :</b>&nbsp;&nbsp;</td>
                                            <td style="text-align: right;" id="ttcost_sgl"></td>
                                            <td style="text-align: right;" id="ttcost_dbl"></td>
                                            <td style="text-align: right;" id="ttcost_tbl"></td> 
                                            <td style="text-align: right;" id="ttcost_qtb"></td>
                                            <td style="text-align: right;" id="ttcost_chld"></td>
                                            <td style="text-align: right;"><b>Single Supliment :</b>&nbsp;&nbsp;</td>
                                            <td style="text-align: right;">+&nbsp;<b id="single_sup"></b></td>                                
                                       </tr>
                                       <tr>
                                            <td colspan="2" style="text-align: right;"><b>Total Compulsory Suppliment :</b>&nbsp;&nbsp;</td>
                                            <td style="text-align: right;" id="ttcom_sup_sgl"></td>
                                            <td style="text-align: right;" id="ttcom_sup_dbl"></td>
                                            <td style="text-align: right;" id="ttcom_sup_tbl"></td> 
                                            <td style="text-align: right;" id="ttcom_sup_qtb"></td>
                                            <td style="text-align: center;" >-</td>
                                            <td style="text-align: right;"><b>Triple Reduction :</b>&nbsp;&nbsp;</td>
                                            <td style="text-align: right;">&nbsp;<b id="trp_reduc"></b></td>
                                       </tr>
                                       
                                       <tr>
                                            <td colspan="2" style="text-align: right;"><b>Total Optional Suppliment :</b>&nbsp;&nbsp;</td>
                                            <td style="text-align: right;" id="ttopt_sup_sgl"></td>
                                            <td style="text-align: right;" id="ttopt_sup_dbl"></td>
                                            <td style="text-align: right;" id="ttopt_sup_tbl"></td> 
                                            <td style="text-align: right;" id="ttopt_sup_qtb"></td>
                                            <td style="text-align: center;">-</td>
                                            <td style="text-align: right;"><b>Quadruple Reduction :</b>&nbsp;&nbsp;</td>    
                                            <td style="text-align: right;" >&nbsp;<b id="qtr_reduc"></b></td>
                                       </tr>
                                       <tr>
                                            <td colspan="2" style="text-align: right;"><b>Total Cost with Suppliment :</b>&nbsp;&nbsp;</td>
                                            <td style="text-align: right;" id="ttCostwith_sup_sgl"></td>
                                            <td style="text-align: right;" id="ttCostwith_sup_dbl"></td>
                                            <td style="text-align: right;" id="ttCostwith_sup_tbl"></td> 
                                            <td style="text-align: right;" id="ttCostwith_sup_qtb"></td> 
                                            <td style="text-align: center;">-</td>                                           
                                       </tr>

                                       <tr>
                                                    <td colspan="2" style="text-align: right;"><b>Total Markup :</b>&nbsp;&nbsp;</td>
                                                    <td style="text-align: right;" id="ttmarkup_sgl"></td>
                                                    <td style="text-align: right;" id="ttmarkup_dbl"></td>
                                                    <td style="text-align: right;" id="ttmarkup_trb"></td> 
                                                    <td style="text-align: right;" id="ttmarkup_qtb"></td>
                                                    <td style="text-align: right;" id="ttmarkup_chld"></td>
                                                                                    
                                      </tr> 
                                      <tr class="table-success">
                                                    <td colspan="2" style="text-align: right;"><b>Selling Price :</b>&nbsp;&nbsp;</td>
                                                    <td style="text-align: right;" id="ttselling_sgl"></td>
                                                    <td style="text-align: right;" id="ttselling_dbl"></td>
                                                    <td style="text-align: right;" id="ttselling_trb"></td> 
                                                    <td style="text-align: right;" id="ttselling_qtb"></td>
                                                    <td style="text-align: right;" id="ttselling_chld"></td>
                                                                                 
                                      </tr> 
                                      <tr class="table-warning">
                                                    <td colspan="2" style="text-align: right;"><b>Per Person Selling Rate :</b>&nbsp;&nbsp;</td>
                                                    <td style="text-align: right;" id="ttppr_sgl"></td>
                                                    <td style="text-align: right;" id="ttppr_dbl"></td>
                                                    <td style="text-align: right;" id="ttppr_trb"></td> 
                                                    <td style="text-align: right;" id="ttppr_qtb"></td>
                                                    <td style="text-align: right;" id="ttppr_chld"></td>                                  
                                      </tr>
                                      <tr class="table-primary">
                                                    <td colspan="2" style="text-align: right;"><b>Markup Percentage:</b>&nbsp;&nbsp;</td>
                                                    <td style="text-align: right;" id="avgmarkup_sgl"></td>
                                                    <td style="text-align: right;" id="avgmarkup_dbl"></td>
                                                    <td style="text-align: right;" id="avgmarkup_trb"></td> 
                                                    <td style="text-align: right;" id="avgmarkup_qtb"></td>
                                                    <td style="text-align: right;" id="avgmarkup_chld"></td>  
                                                                             
                                      </tr> 
                                       
                                    </tbody>
                                        
                           </table>
                           </tbody>
                           </table>
                       </div>

                   
                       <br>
                               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                       <div class="m-form__actions m-form__actions--solid">
                                           <div class="row">
                                               <div class="col-lg-2">
                                               
                                                   <button id="btn_save_tab_2" @if($data_status->confirmed==0 && $data_status->status==4) disabled @endif class="btn btn-primary onClick_save" type="button" onclick="save_Hotels()" id="save_direction" >Save Hotels Details</button>
                                               
                                               </div>
                                           </div>
                                       </div>
                               </div>
                       
                   </form>
                  
            @include('tour_section.components.hotels.hotelselectmodal')
            @include('tour_section.components.hotels.hotel_supliment_modal')
            @include('tour_section.components.hotels.create_Contract')
            
            
            
                   
                  