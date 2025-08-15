<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TourQuotationHeader;
use App\Driver;
use App\TourTransportReserve;
use App\VehicleType;
use App\TransportReserve;
use App\Supplier;
use App\Vehicle;
use App\TourQuotTransport;

use App\TrnsReserveVoucherHeader;
use App\TrnsReserveVoucherDetail;
use App\TrData;

use App\TourQuotationHotel;
use Illuminate\Support\Facades\Auth;

class transportController extends Controller
{
    public function index()
    {
          try{
               
            $transport_views=DB::table('transport_reserves')
            ->join('tour_quot_transports','transport_reserves.tour_quot_transport_id','=','tour_quot_transports.id')
            ->join('tour_quotation_headers','tour_quot_transports.tour_quotation_header_id','=','tour_quotation_headers.id')
            ->where('transport_reserves.status',1)
            ->select('tour_quotation_headers.id','tour_quotation_headers.tour_code',
                     'tour_quotation_headers.frm_date','tour_quotation_headers.to_date','tour_quotation_headers.remarks',
                     'tour_quotation_headers.title','transport_reserves.status')
       
             ->get();        
             
            return view('tour_transport.list.index', compact('transport_views'));

          }catch(\Exception $e){

              return abort(404);
          }
        
    }

    public function liveSearch(Request $request)
    {   
         if($request->ajax()){
        

            $queryd = $request->get('query');
         
            $output ='';
            // $data ='';

            if($queryd != '') {
               
               
            $data=DB::table('transport_reserves')
                ->join('tour_quot_transports','transport_reserves.tour_quot_transport_id','=','tour_quot_transports.id')
                ->join('tour_quotation_headers','tour_quot_transports.tour_quotation_header_id','=','tour_quotation_headers.id')
                ->select('tour_quotation_headers.id','tour_quotation_headers.tour_code',
                         'tour_quotation_headers.frm_date','tour_quotation_headers.to_date','tour_quotation_headers.remarks',
                         'tour_quotation_headers.title','transport_reserves.status')
                ->where('transport_reserves.status',1)
                ->where('tour_code','LIKE','%'.$queryd.'%')         
                 ->get();
                   
                    
                  
                
                 
                $total_row = count((array)$data);

            }else{

            $asd=DB::table('transport_reserves')
                ->join('tour_quot_transports','transport_reserves.tour_quot_transport_id','=','tour_quot_transports.id')
                ->join('tour_quotation_headers','tour_quot_transports.tour_quotation_header_id','=','tour_quotation_headers.id')
                ->where('transport_reserves.status',1)
                ->select('tour_quotation_headers.id','tour_quotation_headers.tour_code',
                         'tour_quotation_headers.frm_date','tour_quotation_headers.to_date','tour_quotation_headers.remarks',
                         'tour_quotation_headers.title','transport_reserves.status','tour_quotation_headers.tour_id')
                ->orderBy('id','DESC')                
                 ->get();
                    
                $data=$asd->unique('id');
                $total_row = $data->count();

                
            }
          
               
              

            //return $total_row;

            if($total_row > 0 ){

                foreach ($data as $row){
                   
                    $state ='';

                        if($row->status == 1){
                            $state ='<span class="m-badge m-badge--brand m-badge--wide">New</span>';
                        }elseif($row->status == 2){
                            $state ='<span class="m-badge m-badge--warning m-badge--wide">In Process</span>';
                        }elseif($row->status == 3){
                            $state ='<span class="m-badge m-badge--metal m-badge--wide">Pending</span>';
                        }elseif($row->status == 4){
                            $state ='<span class="m-badge m-badge--danger m-badge--wide">Canceled</span>';
                        }

                        
                        $rt=route('load_tour_trns_view',$row->tour_id);
                        


                    $output .= '
                             <tr>
                                <td style="text-align: center;">'.$row->id.'</td>                                
                                <td style="text-align: center;">'.$row->tour_code.'</td>
                                <td style="text-align: left;">'.$row->title.'</td>                              
                                <td style="text-align: center;">'.$row->frm_date.'</td>
                                <td style="text-align: center;">'.$row->to_date.'</td>
                                <td>'.$row->remarks.'</td>
                                <td style="text-align: center;">'.$state.'</td>
                                <td style="text-align: center; white-space: nowrap; overflow: hidden;">
                                
                            

                                <a href="'.$rt.'"  
                                class="btn btn-warning m-btn m-btn--icon btn-sm m-btn--icon-only" 
                                title="Reservation">
                                <i class="fa fa-id-card-o"></i>
                                </a>
                                
                                <a href="" 
                                class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" 
                                title="Cancel">
                                <i class="fa fa-window-close"></i>
                                </a>

                                
                             
                                </td>
                             </tr>
                             ';
                }
                

            }else{

                $output = '
                        <tr>
                            <td align="center" colspan="8">No records found</td>
                        </tr>';


            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            return json_encode($data);
          

       }

    }

  public function view_vehicle_types($t_id){

      try{
        $tourQuotHeader =TourQuotationHeader::where('tour_id',$t_id)->first();
         
        $vehicle_types=DB::table('transport_reserves')
                ->join('tour_quot_transports','transport_reserves.tour_quot_transport_id','=','tour_quot_transports.id')
                ->join('tour_quotation_headers','tour_quot_transports.tour_quotation_header_id','=','tour_quotation_headers.id')
                ->join('vehicle_types','tour_quot_transports.vehicle_type_id','=','vehicle_types.id')
                ->where('transport_reserves.status',1)
                ->where('tour_quot_transports.tour_id',$t_id)
                ->select('transport_reserves.frm_date','transport_reserves.to_date','vehicle_types.type','vehicle_types.id',
                         'tour_quotation_headers.frm_date','tour_quotation_headers.to_date')   
                ->get();        
    
              return view('tour_transport.components.vehicle_type_list', compact('vehicle_types','tourQuotHeader'));   

      }catch(\Exception $e){

            return abort(404);
      }

  }
  public function load_view_transport($id){

       try{

    $vehicle_details=DB::table('transport_reserves')
    ->join('tour_quot_transports','transport_reserves.tour_quot_transport_id','=','tour_quot_transports.id')
    ->join('tour_quotation_headers','tour_quot_transports.tour_quotation_header_id','=','tour_quotation_headers.id')
    ->join('vehicle_types','tour_quot_transports.vehicle_type_id','=','vehicle_types.id')
    ->where('transport_reserves.status',1)
    ->where('tour_quot_transports.tour_id',$id)
    ->select('transport_reserves.frm_date','transport_reserves.to_date','vehicle_types.type','vehicle_types.id','transport_reserves.id as trns_id',
             'tour_quotation_headers.frm_date as t_frm_dt','tour_quotation_headers.to_date as t_to_date','tour_quotation_headers.tour_code','tour_quot_transports.id as tour_quot_trns_id','tour_quotation_headers.tour_id')   
    ->get();  

    // return $vehicle_details;

    $trns_reserves=TourQuotTransport::all();

    $tour_trns_reservs=TourTransportReserve::all();
    // return $tour_trns_reservs;
    
    $DistanceDtList = DB::table('tour_quot_locations')
                            ->join('tour_quot_distances','tour_quot_distances.tour_quot_location_id','=','tour_quot_locations.id')
                            ->select('tour_quot_distances.*','tour_quot_locations.tour_day','tour_quot_locations.ttkms')
                            ->orderBy('tour_quot_distances.pos')
                            ->where('tour_quot_locations.tour_id',$id)
                            ->get();

    $transport_voucher=DB::table('tour_transport_reserves')
                            ->join('transport_reserves','transport_reserves.id','=','tour_transport_reserves.transport_reserve_id')
                            ->join('tour_quot_transports','transport_reserves.tour_quot_transport_id','=','tour_quot_transports.id')
                            ->join('drivers','tour_transport_reserves.driver_id','=','drivers.id')
                            ->join('vehicle_types','tour_transport_reserves.vehicle_type_id','=','vehicle_types.id')
                            ->join('vehicles','tour_transport_reserves.vehicle_id','=','vehicles.id')
                            ->join('suppliers','vehicles.supplier_id','=','suppliers.id')
                            ->where('tour_transport_reserves.tour_id',$id)
                            ->select('transport_reserves.frm_date','transport_reserves.to_date','vehicle_types.id as v_id',
                                      'drivers.driver_name','vehicle_types.type','transport_reserves.status','transport_reserves.id as trns_reserve_id','drivers.licence_no',
                                      'tour_transport_reserves.tour_id','vehicles.title','suppliers.sup_s_name','tour_quot_transports.id as t_trns_id')
                                               
                            ->get(); 
    
    $hasVoucher_list= DB::table('trns_reserve_voucher_headers')
                            ->join('users','users.id','=','trns_reserve_voucher_headers.user_id')
                            ->select('trns_reserve_voucher_headers.*','users.name as user_name')    
                            ->where('tour_id',$id)
                            ->get();                        
                            
     $tourtransportvouchers=$transport_voucher->groupBy('v_id');            
    //  return $tourtransportvouchers;          
    //  return $hasVoucher_list;          

  $toutQoutHeader=TourQuotationHeader::where('tour_id',$id)->first();
  $tourQuoteTransport=TourQuotTransport::where('tour_id',$id)->first();


  $tour_drivers=Driver::all();
  $vehicle_types=VehicleType::all();
  $supplier_details=Supplier::where('type','Vehicle')->get();
  $vehicls=Vehicle::all();  

//   $trans_status=TrnsReserveVoucherHeader::


        $LocationDtList_gp = $DistanceDtList->groupBy('tour_day');
    return view('tour_transport.components.vehicle_type_list',compact('trns_reserves','tour_trns_reservs','vehicle_details','LocationDtList_gp','toutQoutHeader','tour_drivers','vehicle_types','supplier_details','vehicls','tourtransportvouchers','hasVoucher_list','tourQuoteTransport'));
       }catch(\Exception $e){
              
             return abort(404);
       }
  }

  public function transport_voucher()
    {
          try{

            $companyName = companyController::$companyName;
            $address = companyController::$Address_details;
            $telephone = companyController::$telephone_details;
            $web_mail = companyController::$web_mail_details;
    
        return view('tour_transport.print_doc.tour_transport_voucher',compact('companyName','address','telephone','web_mail'));

          }catch(\Exception $e){

               return abort(404);
          }
    }

    public function add_to_reserve(Request $request){

        if($request->ajax()){

            if($request->driver_id == 0){
                return json_encode('Please select driver..');
            }
            else if($request->vehicle_sup == 0){
                return json_encode('Plesse select vehicle supplier..');
            }
            else if($request->vehicle == 0){
                return json_encode('Please select Vehicle');
            }
            else if($request->v_type == 0)
            {
                return json_encode("please select vehicle type..");
            }
            else{
            
               
                try{

                  
                    

                   
                 

                    $trns_data= new TourTransportReserve;
                    
                    $trns_data->vehicle_type_id=$request->v_type;
                    $trns_data->driver_id=$request->driver_id;
                    $trns_data->transport_reserve_id=$request->trns_reserve_id;
                    $trns_data->tour_id=$request->t_id;
                    $trns_data->supplier_id=$request->vehicle_sup;
                    $trns_data->vehicle_id=$request->vehicle;
                 
                    $trns_data->save();

    

                   
                    
                    return json_encode('added');
                    
                   }catch(Exception $ex){
            
                       return json_encode($ex);
                   }
            }

               

        }

    }
    public function allocate_vehicle(Request $request){

              if($request->ajax()){
                
                $vtype_id=$request->vId;
                $tour_ID=$request->tourID;
                $tour_quot_transport=$request->qouttransId;
                $comment=$request->comments;
                $remarks=$request->remarks;
                $confirm_to=$request->conf_to;
                $confirm_by=$request->conf_by;
                $confirm_date=$request->conf_date;
                $report_to=$request->rep_to;
                $avl_fl_no=$request->av_fl_no;
                $dept_fl_no=$request->dp_fl_no;
                $avl_time=$request->av_time;
                $dept_time=$request->dp_time;
                $vpos=$request->rowId_rg;
                $t_pax=$request->t_pax;
                $trns_res_id=$request->trns_reserve_id;
                $v_no=$request->v_no_;
                
            // return json_encode($t_pax);
            
                try{

                    
                    // $dt_vc = TrData::where('id',7)->select('id','tour_id')->first();
                        $hasActiveVoucher = TrnsReserveVoucherHeader::where('trns_voucher_no',$v_no)->first();

                        // return json_encode($hasActiveVoucher);
                                                            
                        if($hasActiveVoucher ==''){
                            try{
                               
                             
                                
                               
                                DB::beginTransaction();
                                
                                $voucherNoUpdate = TrData::where('id',7)->select('id','tour_id')->first();
                                // return json_encode('an');
                                // return json_encode($voucherNoUpdate);
                                $voucherNo =($voucherNoUpdate->tour_id)+1;
                               
                                $voucherNoUpdate->tour_id = $voucherNo;
                                $voucherNoUpdate->save();

                               
                          
                                $newVoucher = new TrnsReserveVoucherHeader();
                           
                                $newVoucher->trns_voucher_no= $voucherNo;
                        
                                $newVoucher->tour_quot_trnsport_id =$tour_quot_transport;
                               
                                $newVoucher->tour_id = $tour_ID;
                             
                                $newVoucher->v_pos =$vpos;  
                               
                                $newVoucher->user_id = Auth::user()->id;
                                    
               
                                $newVoucher->pax= $t_pax;
                                $newVoucher->vehicle_type_id=$vtype_id;
                                $newVoucher->report_to=$report_to;
                                $newVoucher->confirm_by=$confirm_by;
                                $newVoucher->confirm_date=$confirm_date;
                                $newVoucher->arrival_flight_no=$avl_fl_no;
                                $newVoucher->depature_flight_no= $dept_fl_no;
                                $newVoucher->arrival_time=$avl_time;
                                $newVoucher->depature_time=$dept_time;
                                $newVoucher->remarks= $remarks;
                                $newVoucher->comments= $comment;
                                $newVoucher->status = 2;
                                
                                $newVoucher->save();
                                
                                $voucherHeaderLastID = TrnsReserveVoucherHeader::select('id')->orderBy('id','DESC')->first();
        
                                
        
                                    $newVoucherDetails = new TrnsReserveVoucherDetail();
                                    $newVoucherDetails->trns_reserve_voucher_header_id= $voucherHeaderLastID->id;
                                    $newVoucherDetails->tour_transport_reserve_id=$trns_res_id;
                                    $newVoucherDetails->save();
                                    
                                    // $updateStatetransport = TransportReserve::find($trns_res_id);
                                    // $updateStatetransport->status = 2;
                                    // $updateStatetransport->save();
        
                                
        
                                
                                DB::commit();
                                return json_encode('added');
        
                            }catch(Exception $ex)
                            {   
                                DB::rollBack();
                                return json_encode('* Some field cannot be empty!, Please check before save'.$ex);
                            }
        
        
                        }else{
                            return json_encode('exceed');
                        }
        
                    }
                    catch(Exception $ex)
                    {
                        return json_encode("error");
                    }

                //return json_encode($request->all());
              }
            // return json_encode($request->all());

    }


    public function generate_voucher($voucher_no){
                                     
                try{
                    try{

                        
            
                        $tr_id=TrnsReserveVoucherHeader::where('trns_voucher_no',$voucher_no)->select('tour_id')->orderBy('trns_voucher_no','DESC')->first();
                        $tourQuotHeader = TourQuotationHeader::where('tour_id',$tr_id->tour_id)->first();
                        $data=DB::table('trns_reserve_voucher_headers')
                                ->join('trns_reserve_voucher_details','trns_reserve_voucher_headers.id','=','trns_reserve_voucher_details.trns_reserve_voucher_header_id')
                                ->join('transport_reserves','transport_reserves.id','=','trns_reserve_voucher_details.tour_transport_reserve_id')
                                ->where('trns_reserve_voucher_headers.trns_voucher_no',$voucher_no)
                                ->select('transport_reserves.frm_date','transport_reserves.to_date')
                                ->first();
            
                                // return $data;
            
            
                                $dta=TourQuotationHotel::whereBetween('tour_date',array($data->frm_date,$data->to_date))
                                                        ->where('tour_id',$tr_id->tour_id)
                                                        
                                                        ->get();
            
                                                        //  return $dta;
                                $days_tour=$dta->count();
                                // $days_tour=5;
                                // return $days_tour;
            
                                // $dta=TourQuotationHotel::whereBetween('tour_date',array($data->frm_date,$data->to_date))
                                // ->where('tour_id',$tr_id->tour_id)
                                
                                // ->get();
                                                        
                    $DistanceDtList = DB::table('tour_quot_locations')
                                        ->join('tour_quot_distances','tour_quot_distances.tour_quot_location_id','=','tour_quot_locations.id')
                                        ->select('tour_quot_distances.*','tour_quot_locations.tour_day','tour_quot_locations.ttkms')
                                        ->orderBy('tour_quot_distances.pos')
                                        ->where('tour_quot_locations.tour_id',$tr_id->tour_id)
                                        ->whereBetween('tour_quot_locations.tour_date', array($data->frm_date,$data->to_date))
                                        ->get();
            
                    $LocationDtList_gp = $DistanceDtList->groupBy('tour_day');
                    // return $LocationDtList_gp;
            
            
            
                    
            
            
                    $tour_hotels=DB::table('tour_quotation_hotels')
                                ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.tour_quotation_hotel_id','=','tour_quotation_hotels.id')
                                ->join('suppliers','suppliers.id','=','tour_quotation_hotel_details.supplier_id')
                                ->select('suppliers.sup_name','suppliers.id','tour_quotation_hotels.tour_day')
                                ->where('tour_quotation_hotels.tour_id',$tr_id->tour_id)
                                ->whereBetween('tour_quotation_hotels.tour_date',array($data->frm_date,$data->to_date))
                                ->get();
                                // return $tour_hotels;
                                // return $tour_hotels;
            
                    $trns_vouchers=DB::table('trns_reserve_voucher_headers')
                                ->join('trns_reserve_voucher_details','trns_reserve_voucher_details.trns_reserve_voucher_header_id','=','trns_reserve_voucher_headers.id')
                                ->join('tour_quot_transports','tour_quot_transports.id','=','trns_reserve_voucher_headers.tour_quot_trnsport_id')
                                ->join('tour_transport_reserves','tour_transport_reserves.id','=','trns_reserve_voucher_details.tour_transport_reserve_id')
                                ->join('transport_reserves','transport_reserves.id','=','trns_reserve_voucher_details.tour_transport_reserve_id')
                                ->join('users','users.id','=','trns_reserve_voucher_headers.user_id')
                                ->join('vehicle_types','trns_reserve_voucher_headers.vehicle_type_id','=','vehicle_types.id')
                                ->join('drivers','tour_transport_reserves.driver_id','=','drivers.id')
                                ->join('vehicles','tour_transport_reserves.vehicle_id','=','vehicles.id')
                                ->join('suppliers','tour_transport_reserves.supplier_id','=','suppliers.id')
                                ->join('tour_quotation_headers','tour_quot_transports.tour_quotation_header_id','=','tour_quotation_headers.id')
                                ->select('transport_reserves.frm_date','transport_reserves.to_date','trns_reserve_voucher_headers.*','drivers.driver_name',
                                          'vehicles.reg_no','suppliers.sup_s_name','vehicle_types.type','tour_quot_transports.rate_pkm','tour_quotation_headers.tour_code','users.name as user_name')
                                ->where('trns_reserve_voucher_headers.trns_voucher_no',$voucher_no)
                                ->where('transport_reserves.status',1)
                                ->get();
            
                                            // return $trns_vouchers;
            
            
                                 
                                        $companyName = companyController::$companyName;
                                        $address = companyController::$Address_details;
                                        $telephone = companyController::$telephone_details;
                                        $web_mail = companyController::$web_mail_details;               
            
            
                                    if($trns_vouchers->count() !=0){
                                        return view('tour_transport.print_doc.tour_transport_voucher',compact('tour_hotels','days_tour','data','tourQuotHeader','LocationDtList_gp','trns_vouchers','companyName','address','telephone','web_mail'));
                                    }else{
                                        return back();
                                    }
            
                    }catch(Exception $ex)
                    {
                        return back();  
                    }
                     

                }catch(\Exception $e){

                     return abort(404);
                }
        

    }
      

}
