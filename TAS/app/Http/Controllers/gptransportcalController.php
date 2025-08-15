<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourQuotationHeader;
use Exception;
use DB;
use App\Tax;
use App\TourQuotGuideDetails;
use App\TourQuotGuide;
use App\TourQuoteGpGuidesDetails;


class gptransportcalController extends Controller
{
    //

    public function quotation_cal_gp_data(Request $req){
        
        if($req->ajax()){
           

        try{

            $tourQtHeaderID = $req->tourQtHdID;
            
           
            $summary_Data = DB::table('tour_qoute_gp_vehicle_types')
                            ->join('group_qt_pax_setups','group_qt_pax_setups.id','=','tour_qoute_gp_vehicle_types.group_qt_pax_setup_id')
                            ->join('vehicle_types as main_vehicle','main_vehicle.id','=','tour_qoute_gp_vehicle_types.vehicle_type_id')
                            ->leftJoin('vehicle_types as extra_vehicle','extra_vehicle.id','=','tour_qoute_gp_vehicle_types.extr_vehicle_type_id')                            
                            ->select('tour_qoute_gp_vehicle_types.*','main_vehicle.no_of_seats as mv_noofseats','main_vehicle.type as mv_type','extra_vehicle.type as ext_type',
                                        'group_qt_pax_setups.pax_frm','group_qt_pax_setups.pax_to','group_qt_pax_setups.guide_accmd_add')
                            ->where('tour_qoute_gp_vehicle_types.tour_quotation_header_id',$tourQtHeaderID)
                            ->orderBy('tour_qoute_gp_vehicle_types.id','ASC')
                            ->get();
                       

            // return json_encode($summary_Data);
                
            

            if($summary_Data->count()!=0){
                //return json_encode($summary_Data);
                $tourMillage=0;

                $tourQtHeaderData = TourQuotationHeader::where('id',$tourQtHeaderID)->first();

                // return json_encode($tourQtHeaderData);

                $tourMillage = $tourQtHeaderData->millage;

                
                $gp_summary_head='';
                $gp_summary_head ='<tr style="text-align: right;" class="bg-secondary">';
                $gp_summary_head .='<th style="text-align: right; padding-right:10px;">Vehicle Type</th>';

                $gp_summary_pax='';
                $gp_summary_pax ='<tr class="bg-secondary">';
                $gp_summary_pax .='<th style="text-align: right;">Description</th>';

                $outputgp_vehicleCost = '';
                $outputgp_vehicleCost = '<tr>';
                $outputgp_vehicleCost .= '<th class="table-secondary" style="text-align: right;">Transport</th>';

                
                $gp_summary_accmd='';
                $gp_summary_accmd ='<tr>';
                $gp_summary_accmd .='<th class="table-secondary" style="text-align: right;">Accommodation</th>';
                

                $gp_summary_guide='';
                $gp_summary_guide ='<tr>';
                $gp_summary_guide .='<th class="table-secondary" style="text-align: right;">Guide fee <strong class="text-info">NAT</strong>/<strong class="text-success">CHF</strong></th>';


                $gp_summary_guide_accmd='';
                $gp_summary_guide_accmd ='<tr>';
                $gp_summary_guide_accmd .='<th class="table-secondary" style="text-align: right;">Guide Accommodation</th>';
                

                $gp_summary_misc='';
                $gp_summary_misc ='<tr>';
                $gp_summary_misc .='<th class="table-secondary" style="text-align: right;">Miscellaneous</th>';
                

                $gp_summary_cost_tot='';
                $gp_summary_cost_tot ='<tr class="table-warning">';
                $gp_summary_cost_tot .='<th></th>';
                
                $gp_summary_mkp_tot='';
                $gp_summary_mkp_tot ='<tr style="text-align: right;">';
                $gp_summary_mkp_tot .='<th>Mark Up</th>';

                $gp_summary_cost_mkp_tot='';
                $gp_summary_cost_mkp_tot ='<tr style="text-align: right;">';
                $gp_summary_cost_mkp_tot .='<th>Cost + Mark Up</th>';

                $vat_rate = 0;       

                $vat_rate_data = Tax::where('id',1)->where('status',1)->first();

                if($vat_rate_data->count()!=0){
                    $vat_rate = $vat_rate_data->rate;
                }
                
                $gp_summary_vat_tot='';
                $gp_summary_vat_tot ='<tr class="table-danger" style="text-align: right;">';
                $gp_summary_vat_tot .='<th>VAT '.$vat_rate.'%</th>';
                
               $gp_summary_other_tax_head = '<tr class="table-secondary" style="text-align: right;"><th>Other Taxes</th><th colspan="'.($summary_Data->count()).'"></th> </tr>';
                
               $gp_summary_other_tax ='';

            //    $gp_summary_tot_withTax='';
            //    $gp_summary_tot_withTax ='<tr class="table-warning" style="text-align: right;">';
            //    $gp_summary_tot_withTax .='<th></th>';

                $gp_summary_selling_price='';
                $gp_summary_selling_price ='<tr class="table-success" style="text-align: right;">';
                $gp_summary_selling_price .='<th>Selling Price</th>';

                $pax_slot_Count =0;
                
                foreach($summary_Data as $summary_Data_lst)
                {   
                    $pax_slot_Count++;

                    $extr_v_amount = 0;
                    
                    if($summary_Data_lst->extr_vehicle_type_id!=0){

                        $gp_summary_head .='<th style="text-align: center;">'.$summary_Data_lst->mv_type.' + Extra '.$summary_Data_lst->ext_type.'</th>';

                        $extr_v_amount = (($summary_Data_lst->extr_rate_per_km) * ($summary_Data_lst->extr_vht_millage));

                    }else{

                        $gp_summary_head .='<th style="text-align: center;">'.$summary_Data_lst->mv_type.'</th>';

                    }                    

                            $pax_pln_str ='';

                            if($summary_Data_lst->pax_frm==$summary_Data_lst->pax_to){
                                $pax_pln_str =$summary_Data_lst->pax_frm.' PAX';
                            }else{
                                $pax_pln_str =$summary_Data_lst->pax_frm.'-'.$summary_Data_lst->pax_to.' PAX';
                            }
                    
                    $gp_summary_pax .= '<th style="text-align: center;">'.$pax_pln_str.'</th>';

                    $outputgp_vehicleCost .= '<td style="text-align: right; padding-right:10px;">';
                    
                    $rate_trp_pp = (($tourMillage * $summary_Data_lst->rate_per_km)+$extr_v_amount)/$summary_Data_lst->pax_frm; 
                    
                    $rate_trp_pp = ($rate_trp_pp/$summary_Data_lst->exrchg_rate);

                    $trp_mkp_temp = ((($tourMillage * $summary_Data_lst->rate_per_km)/100*$summary_Data_lst->main_vt_mk_pc)+(($extr_v_amount)/100 * $summary_Data_lst->main_vt_mk_pc))/$summary_Data_lst->pax_frm;

                    $trp_mkp_temp = ($trp_mkp_temp/$summary_Data_lst->exrchg_rate); 

                    $outputgp_vehicleCost .= number_format($rate_trp_pp,2);

                    $outputgp_vehicleCost .= '</td>';
                    
                    //=============================ACCMD==================================

                    $accmd_dbl_rate = $req->gp_pp_dbl_cost;
                    $accmd_sgl_pprate = $req->gp_pp_sgl_cost;
                    
                    $accmd_vat_total = 0;


                    $rate_accmd_pax = 0;

                    if($summary_Data_lst->pax_to !=1){
                        //$rate_accmd_pax = (($accmd_dbl_rate/2.0) * ($summary_Data_lst->pax_to));
                        $rate_accmd_pax = (($accmd_dbl_rate/2.0))/(100+$vat_rate) * 100.00;
                        $accmd_vat_total = ($accmd_dbl_rate/2.0) - $rate_accmd_pax;

                    }else{
                        $rate_accmd_pax = $accmd_sgl_pprate/(100+$vat_rate) * 100.00;
                        $accmd_vat_total = $accmd_sgl_pprate - $rate_accmd_pax;
                    }
                    
                    $gp_summary_accmd .= '<td style="text-align: right; padding-right:10px;">'.number_format($rate_accmd_pax,2).'</td>';
                    
                    
                    //=================================GUIDE=======================================================
                    //guide_fee

                    $guide_exc_rate = 0;

                    $guide_am = 0;
                    $totalGuidemkp = 0;
                    $guide_accmd = 0;
                    $guide_accmd_mkp = 0;
                    $guide_accmd_accmd = 0;
                    $guide_color = '';
                    //return $summary_Data_lst->guide_type;

                    if($summary_Data_lst->guide_type==1){

                                $guide_color = 'class="table-info"';

                                $totalGuide_amount = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeaderID)->where('gf_ad',1)->sum('na_guide_rate');

                                $totalGuidemkp = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeaderID)->where('gf_ad',1)->sum('na_guide_mkp'); 

                                $guide_exc_ratedata =TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeaderID)->first(); 


                               
                                                      //return $guide_accmd_accmd;

                                if($guide_exc_ratedata !='')
                                {
                                    $guide_exc_rate = $guide_exc_ratedata->bsratelkr;
                                
                                }else{
                                    $guide_exc_rate = 0;
                                }

                                

                                if($totalGuide_amount =='' || $totalGuide_amount==0){
                                    $totalGuide_amount = 0;     

                                }else{

                                    if($guide_exc_rate>0){

                                        $totalGuidemkp = ($totalGuidemkp/$summary_Data_lst->pax_frm)/$guide_exc_rate;
                                        $guide_am = ($totalGuide_amount/$summary_Data_lst->pax_frm)/$guide_exc_rate;

                                    }else{
                                        $guide_am = ($totalGuide_amount/$summary_Data_lst->pax_frm);
                                        $totalGuidemkp = ($totalGuidemkp/$summary_Data_lst->pax_frm);
                                    }
                
                                }



                                if($summary_Data_lst->guide_accmd_add==1){

                                    $guide_exc_Accmdratedata = DB::table('tour_quote_gp_guides_details')
                                                                ->join('tour_quotation_hotels','tour_quotation_hotels.tour_quotation_header_id','=','tour_quote_gp_guides_details.tour_quotation_header_id')
                                                                ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.tour_quotation_hotel_id','=','tour_quotation_hotels.id')
                                                                // ->select('(tour_quotation_hotel_details.guide / tour_quotation_hotel_details.rate_to_base) as guide_accmd_rate')        
                                                                ->select(DB::raw('(tour_quotation_hotel_details.guide / tour_quotation_hotel_details.rate_to_base) as guide_accmd_rate'))                                                    
                                                                // ->where('tour_quote_gp_guides_details.pos','=','tour_quotation_hotel_details.pos')
                                                                ->whereRaw('tour_quote_gp_guides_details.pos = tour_quotation_hotel_details.pos')
                                                                ->where('tour_quote_gp_guides_details.tour_quotation_header_id',$tourQtHeaderData->id)
                                                                ->get();

                                    foreach($guide_exc_Accmdratedata as $guide_exc_Accmdratedata_lst){

                                        $guide_accmd_accmd += $guide_exc_Accmdratedata_lst->guide_accmd_rate;

                                    }

                                    $guide_accmd = $guide_accmd_accmd;
                                    $guide_accmd_mkp =  TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeaderData->id)->sum('accmd_mkp'); 

                                    /*
                                    foreach($guide_accmd_details as $guide_accmd_details_list){

                                        if($guide_accmd_details_list->has_room !=0){

                                            if($guide_accmd_details_list->room_excrate !=0){
                                                
                                                $guide_accmd += $guide_accmd_details_list->room_rate/$guide_accmd_details_list->room_excrate;
                                                $guide_accmd_mkp += $guide_accmd_details_list->room_com/$guide_accmd_details_list->room_excrate;

                                            }                                                                                       

                                        }

                                    }
                                    */

                                        $guide_accmd_mkp = ($guide_accmd_mkp/$summary_Data_lst->pax_frm);
                                        $guide_accmd = ($guide_accmd/$summary_Data_lst->pax_frm);


                                }

                                

                    }else if($summary_Data_lst->guide_type == 2){

                        $guide_color = 'class="table-success"';

                        $totalGuide_amount = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeaderID)->where('gf_ad',1)->sum('ch_guide_rate');

                        $totalGuidemkp = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeaderID)->where('gf_ad',1)->sum('ch_guide_mkp'); 

                        $guide_exc_ratedata =TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeaderID)->first(); 

                       
                                

                        if($guide_exc_ratedata !='')
                        {
                            $guide_exc_rate = $guide_exc_ratedata->bsratelkr;
                        
                        }else{
                            $guide_exc_rate = 0;
                        }

                        

                        if($totalGuide_amount =='' || $totalGuide_amount==0){
                            
                            $totalGuide_amount = 0;     

                        }else{

                            if($guide_exc_rate>0){

                                $totalGuidemkp = ($totalGuidemkp/$summary_Data_lst->pax_frm)/$guide_exc_rate;
                                $guide_am = ($totalGuide_amount/$summary_Data_lst->pax_frm)/$guide_exc_rate;

                            }else{
                                $guide_am = ($totalGuide_amount/$summary_Data_lst->pax_frm);
                                $totalGuidemkp = ($totalGuidemkp/$summary_Data_lst->pax_frm);
                            }
        
                        }


                    }

                   

                    $gp_summary_guide .='<td '.$guide_color.' style="text-align: right; padding-right:10px;" >'.number_format($guide_am,2).'</td>';
                    $gp_summary_guide_accmd .='<td '.$guide_color.' style="text-align: right; padding-right:10px;" >'.number_format($guide_accmd,2).'</td>';

                    //========================================================================================
                    
                    $Misc_amount =0;
                    $Misc_mkp_temp = 0;

                    $tourQtMisc_Data = DB::table('tour_quot_miscs')
                                        ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')
                                        ->select('tour_quot_miscs.*','misc_categories.mc_pax')
                                        ->where('tour_id',$tourQtHeaderData->tour_id)->get();
                     

                    foreach($tourQtMisc_Data as $misc_qtData){
                        
                        $requredQty = 1;                        
                        $mspos=0;
                        $mscp =0;

                        

                        for( $mspos=1; $mspos <= $summary_Data_lst->pax_to; $mspos++ ){

                            if($mscp == ($misc_qtData->mc_pax)){
                                $requredQty++;
                                $mscp=0;
                            }

                            $mscp++;

                        
                        
                    }

                    $Misc_mkp_temp += (($misc_qtData->ms_Mkp * ($requredQty * $misc_qtData->qty))/$summary_Data_lst->pax_frm);

                    $Misc_amount += (($misc_qtData->rate_lkr/$misc_qtData->ex_rate) * ($requredQty * $misc_qtData->qty))/$summary_Data_lst->pax_frm;

                    
                    
                }

                //$Misc_amount = $Misc_amount/$summary_Data_lst->pax_to;

                    $gp_summary_misc .='<td style="text-align: right; padding-right:10px;">'.number_format($Misc_amount,2).'</td>';

                //=====================================================================================

                $cost_total = $Misc_amount+$guide_am+$rate_accmd_pax+$rate_trp_pp;


                $gp_summary_cost_tot .='<th style="text-align: right; padding-right:10px;">'.number_format($cost_total,2).'</th>';
                
                //======================================================================================

                //main_vt_mk_pc

                    $trp_mkp_total = $trp_mkp_temp;
                    $accmd_mkp_sgl_total = (($req->gp_pp_sglMkp)/$summary_Data_lst->pax_frm);
                    $accmd_mkp_dbl_total = (($req->gp_pp_dblMkp)/$summary_Data_lst->pax_frm)/2.00;
                    $guide_mkp_total = $totalGuidemkp;
                    $misc_mkp_total = $Misc_mkp_temp;

                    $accmdMkP = 0;

                    if($summary_Data_lst->pax_to !=1){
                        $accmdMkP = $accmd_mkp_sgl_total;
                    }else{
                        $accmdMkP = $accmd_mkp_dbl_total;
                    }

                    $totalMKP_pp = ($trp_mkp_total+$accmdMkP+$guide_mkp_total+$misc_mkp_total+$guide_accmd_mkp);

                    $gp_summary_mkp_tot .='<td style="text-align: right; padding-right:10px;">'.number_format($totalMKP_pp,2).'</td>';
                    
                //======================================================================================
                
                    $gp_summary_cost_mkp_tot .='<td style="text-align: right; padding-right:10px;">'.number_format(($totalMKP_pp+$cost_total),2).'</td>';

                //============================VAT=============================================================
                
                    $total_for_vat = (($trp_mkp_total+$accmdMkP+$guide_mkp_total+$misc_mkp_total)+
                                     ($Misc_amount+$guide_am+$rate_trp_pp))/100 *$vat_rate;

                    $gp_summary_vat_tot .='<td style="text-align: right; padding-right:10px;">'.number_format(($total_for_vat+$accmd_vat_total),2).'</td>';


                //=========================================Selling RATEs======================================
                
                $gp_summary_selling_price .='<td style="text-align: right; padding-right:10px;">
                <input type="hidden" id="pax_slot_id_'.$pax_slot_Count.'" value="'.$summary_Data_lst->id.'">
                <input type="hidden" id="pax_slot_'.$pax_slot_Count.'" value="'.(($total_for_vat+$accmd_vat_total)+($totalMKP_pp+$cost_total)).'">
                <strong><i>'.number_format((($total_for_vat+$accmd_vat_total)+($totalMKP_pp+$cost_total)),2).'</i></strong</td>';
                    //


                }

                                    
                $gp_summary_head .='</tr>';
                $gp_summary_pax .='</tr>';                
                $outputgp_vehicleCost .= '</tr>';
                $gp_summary_accmd .= '</tr>';
                $gp_summary_guide .='</tr>';
                $gp_summary_misc .='</tr>';
                $gp_summary_cost_tot .='</tr>';
                $gp_summary_mkp_tot .='</tr>';
                $gp_summary_cost_mkp_tot .='</tr>';
                $gp_summary_vat_tot .='</tr>';
                $gp_summary_selling_price .='</tr>';
                $gp_summary_guide_accmd .='</tr>';
                

                $body_output=$outputgp_vehicleCost.''.$gp_summary_accmd.''.$gp_summary_guide.''.$gp_summary_guide_accmd.''
                            .$gp_summary_misc.''.$gp_summary_cost_tot.''.$gp_summary_mkp_tot.''
                            .$gp_summary_cost_mkp_tot.''.$gp_summary_vat_tot.''.$gp_summary_other_tax_head.''.$gp_summary_selling_price;

                $table_dataOut= array(

                    'head_data' => $gp_summary_head.''.$gp_summary_pax,
                    'body_data' => $body_output

                  );  

                 // return json_encode($paxtsr);
             return json_encode($table_dataOut);
            
            
            
            } 

            

            
        }catch(Exception $ex){

         return json_encode('Error: '.$ex);

        }
}

}

}