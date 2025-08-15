<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourQuotationHeader;
use App\TourQuoteRoomAllocation;
use Exception;
class agentInvoceController extends Controller
{
    //

    public function add_invoice_to_list(Request $req){
        
        if($req->ajax()){
            
            try{

            
            $tour_id = $req->tour_id;
            $invdata ='';   
            $lineCountNo =1;
            $invTotal =0;
            $tour_qoute_Header = TourQuotationHeader::where('tour_id',$tour_id)->first();
            $tourQouteRoomAllocation = TourQuoteRoomAllocation::where('tour_id',$tour_id)->first();
            //return json_encode('asdawdeadas');
            if($tour_qoute_Header->qtn_type ==1){
                
                $invdata='<tr>
                            <td style="text-align: center;">'.$lineCountNo.'</td>
                            <td>
                                <textarea  class="form-control m-input" id="desc_'.$lineCountNo.'" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">'.$tour_qoute_Header->title.' - ADULT</textarea>
                            </td>
                            <td style="text-align: center;">'.$tour_qoute_Header->pax_adult.'</td>
                            <td style="text-align: right;">'.number_format($tour_qoute_Header->pp_rate,2).'</td>
                            <td style="text-align: right;">'.number_format(((($tour_qoute_Header->pax_adult)*$tour_qoute_Header->pp_rate)),2).'</td>                            
                        </tr>';
                        
                        $invTotal +=(($tour_qoute_Header->pax_adult)*$tour_qoute_Header->pp_rate);

                if($tour_qoute_Header->pax_child > 0){
                    $lineCountNo++;
                    $invdata .='<tr>
                            <td style="text-align: center;">'.$lineCountNo.'</td>
                            <td>
                                <textarea  class="form-control m-input" id="desc_'.$lineCountNo.'" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">'.$tour_qoute_Header->title.' - CHILD</textarea>
                            </td>
                            <td style="text-align: center;">'.$tour_qoute_Header->pax_child.'</td>
                            <td style="text-align: right;">'.number_format($tour_qoute_Header->child_pp_rate,2).'</td>
                            <td style="text-align: right;">'.number_format(((($tour_qoute_Header->pax_child)*$tour_qoute_Header->child_pp_rate)),2).'</td>                            
                        </tr>';
                    
                        $invTotal +=(($tour_qoute_Header->pax_child)*$tour_qoute_Header->child_pp_rate);
                }

                if($tourQouteRoomAllocation!='')
                {

                        

                        if($tourQouteRoomAllocation->sgl > 0){
                            $lineCountNo++;
                            $invdata .='<tr>
                                    <td style="text-align: center;">'.$lineCountNo.'</td>                                    
                                    <td>
                                        <textarea  class="form-control m-input" id="desc_'.$lineCountNo.'" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">Single Room Supplements</textarea>
                                    </td>
                                    <td style="text-align: center;">'.$tourQouteRoomAllocation->sgl.'</td>
                                    <td style="text-align: right;">'.number_format($tour_qoute_Header->pp_ss_price,2).'</td>
                                    <td style="text-align: right;">'.number_format(((($tourQouteRoomAllocation->sgl)*$tour_qoute_Header->pp_ss_price)),2).'</td>                            
                                </tr>';

                            $invTotal +=((($tourQouteRoomAllocation->sgl)*$tour_qoute_Header->pp_ss_price));
                        }

                        if($tourQouteRoomAllocation->tbl > 0){
                            $lineCountNo++;
                            $invdata .='<tr>
                                    <td style="text-align: center;">'.$lineCountNo.'</td>                                   
                                    <td>
                                        <textarea  class="form-control m-input" id="desc_'.$lineCountNo.'" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">Triple Room Reduction</textarea>
                                    </td>
                                    <td style="text-align: center;">'.$tourQouteRoomAllocation->tbl.'</td>
                                    <td style="text-align: right;">'.number_format($tour_qoute_Header->pp_tpre_price,2).'</td>
                                    <td style="text-align: right;">-'.number_format(((($tourQouteRoomAllocation->tbl)*$tour_qoute_Header->pp_tpre_price)),2).'</td>                            
                                </tr>';
                            
                            $invTotal  -=(($tourQouteRoomAllocation->tbl)*$tour_qoute_Header->pp_tpre_price);
                        }

                        if($tourQouteRoomAllocation->qd > 0){
                            $lineCountNo++;
                            $invdata .='<tr>
                                    <td style="text-align: center;">'.$lineCountNo.'</td>                                    
                                    <td>
                                        <textarea  class="form-control m-input" id="desc_'.$lineCountNo.'" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">Quadruple Room Reduction</textarea>
                                    </td>
                                    <td style="text-align: center;">'.$tourQouteRoomAllocation->qd.'</td>
                                    <td style="text-align: right;">'.number_format($tour_qoute_Header->pp_qtre_price,2).'</td>
                                    <td style="text-align: right;">-'.number_format(((($tourQouteRoomAllocation->qd)*$tour_qoute_Header->pp_qtre_price)),2).'</td>                            
                                </tr>';
                            
                                $invTotal -=(($tourQouteRoomAllocation->qd)*$tour_qoute_Header->pp_qtre_price);
                        }
                }
            }else {
                
                

            }
            
            $data=array(
                'inv_data'=>$invdata,
                'inv_total'=>$invTotal               
            );

            return json_encode($data);

            }catch(Exception $ex){
                return json_encode('error'.$ex);
            }
        }

    }
}
