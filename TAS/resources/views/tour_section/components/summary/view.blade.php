<form class="cleafix" method="POST" action="">
    
  <div class="m-portlet__body">
    <div style="overflow-x:auto;">
        <table width="100%" style="min-width: 1000px" class="table table-bordered sm">
            <thead> 
                <tr style="text-align: center;">
                    <th class="table-success" colspan="4"><Strong>Tour Quotation Summary</Strong></th>
                </tr>
                      
                @php
                     
                @endphp
            </thead>
            <tbody>
                <tr>
                    <th width="20%" class="table-secondary" style="text-align: right;">Tour Title :</th>
                    <td colspan="3">{{$tourQuotHeader->title}}</td>
                    
                </tr>
                <tr>
                    <th width="20%" class="table-secondary" style="text-align: right;">Tour Code :</th>
                <td width="30%">{{$tourCode}}</td>
                    <th width="30%" class="table-secondary" style="text-align: right;">No of Pax Adult :</th>
                <td width="20%" style="text-align: center;">{{$totaladltPax}}</td>
                </tr>

                <tr>
                        <th width="20%" class="table-secondary" style="text-align: right;">Agent Name :</th>
                        <td width="30%" >{{$tourQuotHeader->ag_name}}</td>
                        <th width="30%" class="table-secondary" style="text-align: right;">No of Pax Children :</th>
                <td width="20%" style="text-align: center;">{{$totalChildPax}}</td>
                </tr>
                    @php
                        //date('l jS \of F Y')

                        $tstdate = date_create($tourStDate);
                        $tenddate = date_create($tourEnDate);
                        //date_format($date, 'Y-m-d H:i:s');
                    @endphp
                <tr>
                        <th width="20%" class="table-secondary" style="text-align: right;">Period Of Stay :</th>
                        <td width="30%" >{{date_format($tstdate, 'D jS \of M Y')}} - {{date_format($tenddate, 'D jS \of M Y')}}</td>
                        <th width="30%" class="table-secondary" style="text-align: right;">Base Currency :</th>
                <td width="20%" style="text-align: center;">{{$baseCurrncyCode}}</td>
                </tr>
              
                
                <tr>
                    <th colspan="4">&nbsp;</th>

                </tr>
                <tr>                  
                    <td style="vertical-align: top; text-align: left;" colspan="4">

                        <table width="100%">
                            <thead class="table-secondary">
                                <tr style="text-align: center;" >
                                    <th class="table-info" colspan="4"><i class="la la-compass"></i>&nbsp;&nbsp;&nbsp;Locations Details</th>
                                    <th class="table-info" colspan="8"><i class="la la-hotel"></i>&nbsp;&nbsp;&nbsp;Hotel Details &nbsp;(&nbsp;Hotel Rates + Supplements&nbsp;) &nbsp;/&nbsp;<i class="la la-user-secret"></i>&nbsp;&nbsp;&nbsp;Guides</th>
                                </tr>
                                
                                <tr style="text-align: center;">
                                        <th width="5%">Day</th>
                                        <th width="10%">Date</th>
                                        <th width="30%">Location Details</th>
                                        <th width="5%">KM/S</th>
                                        <th width="15%">Hotel</th>
                                        <th width="5%">MEAL.P</th>
                                        <th width="5%">SGL</th>
                                        <th width="5%">DBL</th>
                                        <th width="5%">TPL</th>
                                        <th width="5%">QDB</th>
                                        <th width="5%">Guide Fee</th>
                                        <th width="5%">Guide ACM</th>
                                        
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $lastDay = 0;
                                    $lastDayic = 0;
                                @endphp

                                
                                @for ($i_day = 1; $i_day <= $noOfDays; $i_day++)
                                    
                                @php
                                    $date_sm =  date('Y-m-d', strtotime($frmdate. ' + '.($i_day-1).' days'));
                                    
                                    $ttkm_sm = 0;

                                    $gude_fee_day = 0;
                                    $gude_Acm_day = 0;
                                    $guidebsRate_sm = 0;

                                    foreach($tourQoutGuide_gp as $gday => $guideFA)
                                    {   
                                      
                                        if($gday ==$i_day){

                                        if($gday == $gday){

                                            foreach ($guideFA as $gfa) {
                                                //guide_com
                                                //room_com
                                                //room_excrate
                                                $guidebsRate_sm = $gfa->lkr_rate;
                                                $room_excrate_sm = $gfa->room_excrate;
                                                    
                                                $gude_fee_day += (($gfa->guide_fee + $gfa->guide_com)/$guidebsRate_sm);
                                                $gude_Acm_day += ((($gfa->room_rate)/$room_excrate_sm) + ($gfa->room_com));
                                                
                                                //$totGuideCost += ((($gfa->guide_fee)/$guidebsRate_sm) + (($gfa->room_rate)/$room_excrate_sm));                                                
                                                //$totGuideMarkup += ((($gfa->guide_com)/$guidebsRate_sm)+($gfa->room_com));

                                               // $gude_Acm_day += $gfa->room_rate;
                                            }

                                        }
                                     }
                                    }


                                @endphp

                                
                                

                                    <tr style="text-align: center;">
                                    <td class="table-secondary">{{$i_day}}</td>
                                    <td class="table-secondary">{{$date_sm}}</td>
                                    <td style="text-align: left;" >
                                        @php
                                            $ttkm_sm = 0;

                                            $gude_fee_day = number_format($gude_fee_day,2);
                                            $gude_Acm_day = number_format($gude_Acm_day,2);

                                        @endphp
                                        @foreach ($LocationDtList_gp as $day_lc => $route_lst)
                                                                                   
                                            
                                                @if ($day_lc == $i_day)
                                                    
                                                    
                                                        @foreach ($route_lst as $routeLst)
                                                                {{$routeLst->lc_code}}&nbsp;/&nbsp;
                                                            
                                                            @php                                                   
                                                                $ttkm_sm = $routeLst->ttkms;
                                                                
                                                            @endphp

                                                        @endforeach
                                                    
                                               
                                                @endif
                                                  
                                                    
                                        @endforeach
                                    </td>
                                        @php
                                            $ttlRowkms_sm += $ttkm_sm;
                                            $dayPkg_count =0;
                                        @endphp
                                    <td>{{$ttkm_sm}}</td>
                                    
                                    <td colspan="8">
                                        <table width="100%">
                                            <tbody>
                                            @foreach ($tourQuoteHotel_gp as $day => $tourQtHt)
                                                
                                                
                                                @if ($day == $i_day)
                                                   @php
                                                       $dayPkg_count=0;
                                                   @endphp
                                                    @foreach ($tourQtHt as $htpkg)
                                                        @php
                                                             $lastDay = $i_day;
                                                             $dayPkg_count++
                                                        @endphp
                                                        @php
                                                            $ss_com_sm = $htpkg->ss_com;
                                                            $db_com_sm = $htpkg->db_com;
                                                            $tb_com_sm = $htpkg->trp_com;
                                                            $qd_com_sm = $htpkg->qtb_com;

                                                            $ss_splm = $htpkg->sql_splm;
                                                            $db_splm = $htpkg->dbl_splm;
                                                            $tb_splm = $htpkg->tbl_splm;
                                                            $qd_splm = $htpkg->qd_splm;

                                                            $ss_rate_sm = number_format((($htpkg->ss_rate)/($htpkg->rate_to_base)+$ss_com_sm+$ss_splm),2);
                                                            $db_rate_sm = number_format((($htpkg->db_rate)/($htpkg->rate_to_base)+$db_com_sm+$db_splm),2);
                                                            $trp_rate_sm = number_format((($htpkg->trp_rate)/($htpkg->rate_to_base)+$tb_com_sm+$tb_splm),2);
                                                            $qtb_rate_sm = number_format((($htpkg->qtb_rate)/($htpkg->rate_to_base)+$qd_com_sm+$qd_splm),2);

                                                                // $totHtp_sgl_rate +=$ss_rate_sm;
                                                                // $totHtp_dbl_rate +=$db_rate_sm;
                                                                // $totHtp_trb_rate +=$trp_rate_sm;
                                                                // $totHtp_qd_rate +=$qtb_rate_sm;

                                                                // $totHtp_sgl_com =0;
                                                                // $totHtp_dbl_com =0;
                                                                // $totHtp_trb_com =0;
                                                                // $totHtp_qd_com =0;
                                                                $totalHotelCost_sm += (($htpkg->db_rate)/($htpkg->rate_to_base));
                                                                $totalHotelMarkup_sm += $db_com_sm;

                                                        @endphp
                                                    
                                                        <tr>
                                                            <td width="30%">{{$htpkg->sup_s_name}}/{{$htpkg->r_type}}</td>                                                          
                                                            <td width="10%">{{$htpkg->meal_plane}}</td>
                                                            <td width="10%">{{$ss_rate_sm}}</td>                                    
                                                            <td width="10%">{{$db_rate_sm}}</td>                                    
                                                            <td width="10%">{{$trp_rate_sm}}</td>
                                                            <td width="10%">{{$qtb_rate_sm}}</td>
                                                            @if ($dayPkg_count==1)
                                                                <td width="10%">{{$gude_fee_day}}</td>
                                                                <td width="10%">{{$gude_Acm_day}}</td>
                                                            @endif
                                                            
                                                        </tr>
                                                    @endforeach                                                                                                       
                                                 @endif

                                                
                                            @endforeach  
                                          
                                            @if($lastDay < $i_day)
                                               
                                               
                                                        <tr>
                                                                <td width="30%">-</td>                                                          
                                                                <td width="10%">-</td>
                                                                <td width="10%">-</td>                                    
                                                                <td width="10%">-</td>                                    
                                                                <td width="10%">-</td>
                                                                <td width="10%">-</td>
                                                                <td width="10%">{{$gude_fee_day}}</td>
                                                                <td width="10%">{{$gude_Acm_day}}</td>
                                                        </tr>
                                                            
                                            
                                            @endif
                                            
                                            
                                        </tbody>
                                    </table>        
                                    </td>
                                    </tr>
                                        {{-- {{$lastDay}} --}}
                                      
                            
                               @endfor
                                   
                               
                                    <tr>
                                        <th class="table-secondary" style="text-align: right;" colspan="3">Total Millage :</th>
                                        <th style="text-align: Center;">{{$ttlRowkms_sm}} Km</th>
                                        <th class="table-secondary" style="text-align: right;">PP Rate (Double Sharing) :</th>
                                    <th style="text-align: right;" colspan="7">{{number_format($tourQuotHeader->pp_hotel_price,2)}}</th>
                                        
                                    </tr>                           
                                    <tr>
                                            <th colspan="4"></th>
                                            <th class="table-secondary" style="text-align: right;">Supliment :</th>
                                            <th class="table-secondary" style="text-align: center;" colspan="7">
                                                <Span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"><strong>SGL + {{number_format($tourQuotHeader->pp_ss_price,2)}}</strong></Span>
                                                <Span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"><strong>TBL - {{number_format($tourQuotHeader->pp_tpre_price,2)}}</strong></Span>
                                                <Span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"><strong>QD  - {{number_format($tourQuotHeader->pp_qtre_price,2)}}</strong></Span>
                                            </th>
                                    </tr>
                                    <tr>
                                            <th colspan="4"></th>
                                            <th class="table-secondary" style="text-align: right;">Guide Fee :</th>
                                            <th style="text-align: right;" colspan="7">{{number_format($tourQuotHeader->tot_guide_price,2)}}</th> 
                                    </tr>
                                    <tr>
                                            <th colspan="4"></th>
                                            <th class="table-secondary" style="text-align: right;">Guide Accommodation :</th>
                                            <th style="text-align: right;" colspan="7">{{number_format($tourQuotHeader->tot_guide_acmd,2)}}</th> 
                                    </tr>
                                                       
                                      
                            </tbody>
                        </table>

                    </td>                    
                   
                </tr>
                <tr>
{{--                     
                    <td>
                        
                    </td> --}}

                    @if ($tourQuotHeader->qtn_type == 1)
                     
                      <td style="vertical-align: top; text-align: left;" colspan="4">
                            <table width="100%">
                                    <thead class="table-secondary">
                                        <tr style="text-align: center;" >
                                            <th class="table-warning" colspan="8"><i class="la la-car"></i>&nbsp;&nbsp;&nbsp; Transport Details</th>                                            
                                        </tr>
                                        <tr style="text-align: center;" >
                                            <th width="5%">No</th>
                                            <th width="35%">Vehilce Type</th>
                                            <th width="10%">No of Seats</th>
                                            <th width="10%">Millage Km</th>
                                            <th width="10%">Rate Per Km</th>
                                            <th width="10%">Total</th>
                                            <th width="10%">Markup</th>
                                            <th width="15%">Total With Markup</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    
                                    @php
                                        $trp_pos_sm =1;
                                    @endphp
                                    
                                    @foreach ($tourQuotTransp as $transport_sm)
                                        
                                        @php

                                            $basetorareTr_sm =$transport_sm->baserate;
                                            $pr_kmRate_sm = ($transport_sm->rate_pkm/$basetorareTr_sm);
                                            $totAmTr_sm = ($transport_sm->totlkr/$basetorareTr_sm);
                                            $totMkpTr_sm = ($transport_sm->trp_ls_Mkp/$basetorareTr_sm);

                                            $totTrp_Cost_sm +=$totAmTr_sm;
                                            $totTrp_Mkp_sm +=$totMkpTr_sm;
                                            
                                        @endphp
                                    
                                        <tr>
                                            <td style="text-align: center;">{{$trp_pos_sm}}</td>
                                            <td style="text-align: center;">{{$transport_sm->vtype}}</td>
                                            <td style="text-align: center;">{{$transport_sm->no_of_seats}}</td>
                                            <td style="text-align: center;">{{number_format($transport_sm->millage,2)}} km</td>
                                            <td style="text-align: right;">{{number_format($pr_kmRate_sm,2)}}</td>
                                            <td style="text-align: right;">{{number_format($totAmTr_sm,2)}}</td>
                                            <td style="text-align: right;">{{number_format($totMkpTr_sm,2)}}</td>
                                            <td style="text-align: right;">{{number_format($totAmTr_sm+$totMkpTr_sm,2)}}</td>
                                        </tr>

                                        @php
                                            $trp_pos_sm++;
                                        @endphp
                                        
                                    @endforeach

                                    <tr style="text-align: right;">
                                        <th class="table-secondary" colspan="2">Total Cost :</th>
                                    <td>{{number_format($totTrp_Cost_sm,2)}}</td>
                                        <th class="table-secondary">Markup :</th>
                                        <td>{{number_format($totTrp_Mkp_sm,2)}}</td>
                                        <th class="table-secondary" colspan="2">Salling Rate :</th>
                                        <td>{{number_format(($totTrp_Cost_sm+$totTrp_Mkp_sm),2)}}</td>
                                    </tr>
                                    <tr style="text-align: right;">
                                        <th colspan="2" class="table-secondary">Markup Percentage :</th>
                                        @php
                                            if($totTrp_Cost_sm==0){
                                                $trpMkp_smtemp = 0.00;
                                            }else{
                                                $trpMkp_smtemp = ($totTrp_Mkp_sm*100.00)/$totTrp_Cost_sm;
                                            }

                                        @endphp
                                        <td style="text-align: right;" colspan="2">{{number_format($trpMkp_smtemp,2)}}%</td>
                                        <th colspan="3" class="table-secondary">Per Person Rate :</th>
                                        <td>{{number_format((($totTrp_Cost_sm+$totTrp_Mkp_sm)/$totaladltPax),2)}}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                    </td>

                    @endif
                </tr>
                <tr>
                      <td style="vertical-align: top; text-align: left;" colspan="4">
                            <table width="100%">
                                    <thead class="table-secondary">
                                        <tr style="text-align: center;" >
                                            <th class="table-primary" colspan="8"><i class="la la-cog"></i>&nbsp;&nbsp;&nbsp; Miscellaneous Details</th>                                            
                                        </tr>
                                        <tr style="text-align: center;" >
                                            <th width="5%">No</th>
                                            <th width="35%">Miscellaneous</th>
                                            <th width="10%">No of Units</th>
                                            <th width="10%">Rate</th>
                                            <th width="10%">Qty</th>
                                            <th width="10%">Total Cost</th>
                                            <th width="10%">Markup</th>
                                            <th width="15%">Total</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @php
                                            
                                        $misc_pos_sm = 1;
                                        $totMisc_Cost_sm = 0;
                                        $totMisc_Mkp_sm = 0;
                                    @endphp

                                    @foreach ($tourQuotMisc as $tourQuotMisc_sm)

                                        @php
                                             $mis_bctolkr_sm = $tourQuotMisc_sm->baserate;

                                             $mis_unt_cost_sm = number_format(($tourQuotMisc_sm->rate_lkr)/$tourQuotMisc_sm->ex_rate,2);
                                             $mis_tot_cost_sm =(($tourQuotMisc_sm->totlkr)/$mis_bctolkr_sm);
                                             $mis_tot_mkp_sm = (($tourQuotMisc_sm->ms_Mkp)/$mis_bctolkr_sm);
                                             $mis_qty_sm =  number_format($tourQuotMisc_sm->qty,2);
                                            
                                            

                                            $totMisc_Cost_sm +=$mis_tot_cost_sm;
                                            $totMisc_Mkp_sm +=$mis_tot_mkp_sm;

                                        @endphp
                                        <tr>
                                                <td style="text-align: center;">{{$misc_pos_sm}}</td>
                                                <td style="text-align: center;">{{$tourQuotMisc_sm->category}}</td>
                                                <td style="text-align: center;">{{$tourQuotMisc_sm->mc_pax}}</td>
                                                <td style="text-align: center;">{{$mis_unt_cost_sm}}</td>
                                                <td style="text-align: right;">{{$mis_qty_sm}}</td>
                                                <td style="text-align: right;">{{number_format($mis_tot_cost_sm,2)}}</td>
                                                <td style="text-align: right;">{{number_format($mis_tot_mkp_sm,2)}}</td>
                                                <td style="text-align: right;">{{(number_format($mis_tot_cost_sm+$mis_tot_mkp_sm,2))}}</td>
                                        </tr>
                                        @php
                                            $misc_pos_sm++;
                                        @endphp
                                    @endforeach    
                                        <tr style="text-align: right;">
                                                <th class="table-secondary" colspan="2">Total Cost :</th>
                                                <td>{{number_format($totMisc_Cost_sm,2)}}</td>
                                                <th class="table-secondary">Total Markup :</th>
                                                <td>{{number_format($totMisc_Mkp_sm,2)}}</td>
                                                <th class="table-secondary" colspan="2">Salling Rate :</th>
                                                <td>{{number_format($totMisc_Cost_sm+$totMisc_Mkp_sm,2)}}</td>
                                            </tr>
                                            <tr style="text-align: right;">
                                                <th colspan="2" class="table-secondary">Markup Percentage :</th>
                                                @php
                                                    if($totMisc_Cost_sm==0){
                                                        $misMkp_smtemp = 0.00;
                                                    }else{
                                                        $misMkp_smtemp = ($totMisc_Mkp_sm*100.00)/$totMisc_Cost_sm;
                                                    }

                                                @endphp
                                                <td style="text-align: right;" colspan="2">{{number_format($misMkp_smtemp,2)}}%</td>
                                                <th colspan="3" class="table-secondary">Per Person Rate :</th>
                                                <td>{{number_format((($totMisc_Cost_sm+$totMisc_Mkp_sm)/$totaladltPax),2)}}</td>
                                            </tr>
                                </tbody>
                            </table>
                    </td>
                </tr>

                @if ($tourQuotHeader->qtn_type == 1)
                    
                
                <tr>
                        <td style="vertical-align: top; text-align: left;" colspan="2">
                            <table width="100%">
                                <thead>                                
                                    <tr class="table-warning" style="text-align: center;">
                                        <th width="40%">Description</th>
                                        <th>Cost</th>
                                        <th>Mark Up</th>
                                        <th>Selling Price</th>
                                        <th>Tax</th>
                                        <th>Selling Rate With Tax</th>
                                    </tr>
                                </thead>
                            <tbody style="text-align: right;">
                                <tr>
                                    <td>Accommodation (Double Sharing) :</td>
                                    <td id="acm_cost"></td>                                    
                                    <td id="acm_mkp"></td>
                                    <td id="acm_total"></td>
                                    <td id="acm_tax"></td> 
                                    <td id="acm_rtw_tax"></td>                              
                                </tr>
                                <tr>
                                    <td>Guide fee & Accommodation :</td>
                                    <td id="guideAc_cost"></td>
                                    <td id="guideAc_mkp"></td>
                                    <td id="guideAc_total"></td>
                                    <td id="guideAc_tax"></td>
                                    <td id="guideAc_rtw_tax"></td>                                
                                </tr>
                                <tr>
                                    <td>Transport :</td>
                                    <td id="trport_cost"></td>
                                    <td id="trport_mkp"></td>
                                    <td id="trport_total"></td>
                                    <td id="trport_tax"></td>
                                    <td id="trport_rtw_tax"></td>                               
                                </tr>
                                <tr>
                                    <td>Miscellaneous :</td>
                                    <td id="miscla_cost"></td>
                                    <td id="miscla_mkp"></td>
                                    <td id="miscla_total"></td>
                                    <td id="miscla_tax"></td>
                                    <td id="miscla_rtw_tax"></td>                                
                                </tr>
                                <tr>
                                    
                                <tr>
                                    <td colspan="6">&nbsp;</td>
                                </tr>
                                 <tr>
                                    <th>TOTAL :</th>
                                    <th id="total_cost"></th>
                                    <th id="total_mkp"></th>
                                    <th id="total_total"></th>
                                    <th id="total_tax"></th>
                                    <th id="total_rwt_tax"></th>                                
                                </tr>                            
                            </tbody>
                            </table>
                        </td>
                        <td style="vertical-align: top; text-align: left;" colspan="2">
                                <table width="100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th class="table-danger" colspan="3">Summary</th>
                                            </tr>                                        
                                            <tr style="text-align: center;">
                                                <th class="table-secondary"></th>
                                                <th class="table-secondary">Adult</th>
                                                <th class="table-secondary">Child</th>
                                                
                                            </tr>
                                        </thead>
                                    <tbody style="text-align: right;">
                                        <tr>
                                            <th width="60%" >Total Per Person Rate Without Tax :</th>
                                            <td><strong><label id="pprate_withoutTax"></label></strong></td>
                                            <td><strong><label id="pprate_withoutTax_chld">00.00</label></strong></td>
                                                                                                                  
                                        </tr>
                                        @php
                                            
                                            $taxPos = 1;
    
                                        @endphp
                                    
                                        @foreach ($Taxs_lisl as $Taxes)                                    
                                            
                                            <tr>
    
                                                <th width="60%"><input type="hidden" value="{{$Taxes->rate}}">
                                                    {{$Taxes->tax_name}}&nbsp;&nbsp;&nbsp;{{$Taxes->rate}}%&nbsp;:
                                                <input id="tax_ls_{{$taxPos}}" type="hidden" value="{{$Taxes->rate}}" >
                                                </th>
                                                <td>
                                                <strong><label id="taxlb_{{$taxPos}}"></label></strong>
                                                </td>
                                                <td>
                                                <strong><label id="taxlb_chld_{{$taxPos}}">00.00</label></strong>
                                                </td>
    
                                            </tr> 
                                            @php
                                                $taxPos++;
                                            @endphp
                                        @endforeach                                      
                                            
                                        <tr>
                                            <td width="60%"><b><i>Total Per Person Rate With Tax :</i></b></td>
                                            <td><strong><label id="pp_with_taxs"></label></strong></td>  
                                            <td><strong><label id="pp_with_taxs_chld">00.00</label></strong></td>                                                                      
                                        </tr>
                                        <tr>                                        
                                            <th width="60%">Single Room Supliment :</th>
                                            <td><b><i>{{number_format($tourQuotHeader->pp_ss_price,2)}}</i></b></td>
                                            <td class="text-center"><b><i>-</i></b></td>
                                            
                                        </tr>                          
                                        <tr>
                                            <th width="60%">Trible Reduction :</th>
                                            <td><b><i>{{number_format($tourQuotHeader->pp_tpre_price,2)}}</i></b></td>
                                            <td class="text-center"><b><i>-</i></b></td>
                                        </tr>
                                        <tr>
                                            <th width="60%">Quad Reduction :</th>
                                            <td><b><i>
                                                    {{number_format($tourQuotHeader->pp_qtre_price,2)}}
                                            </i></b></td>
                                            <td class="text-center"><b><i>-
                                                {{-- {{number_format($tourQuotHeader->pp_qtre_price,2)}} --}}
                                            </i></b></td>
                                        </tr>
                                    </tbody>
                                    </table>
                        </td>
                     
                </tr>

                @endif

                <tr>
                    {{-- <td colspan="4">
                       <i> Created @ :2018-08-12 12:34 PM - Updated @ LC :2018-08-12 12:34 PM /
                         HT :2018-08-12 12:34 PM / GD : 2018-08-12 12:34 PM / TP :2018-08-12 12:34 PM / MS :2018-08-12 12:34 PM</i>
                    </td> --}}
                </tr>
                
            </tbody>
        </table>
    </div>        
           
         
 </div>

 </form>


