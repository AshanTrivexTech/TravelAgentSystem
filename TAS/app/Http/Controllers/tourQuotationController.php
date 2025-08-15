<?php
//sssss
namespace App\Http\Controllers;

use App\TourQuotationHeader;
use App\TourQuotationHotel;
use App\TourQuotationHotelDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Currency;
use App\Market;
use App\Branch;
use Exception;
use App\TrData;
use App\Agent;
use App\QuotationCode;
use App\TourType;
use DB;
use App\Location;
use App\Distance;
use App\TourQuotLocation;
use App\TourQuotDistance;
use App\Supplier;
use App\RoomType;
use App\MealPlane;
use App\PackagePeriod;
use App\HotelPackage;
use App\Guide;
use App\GuideType;
use App\GuideLanguage;
use App\Language;
use App\GuideLanuageRate;
use App\GuideRoomType;
use App\GuideRoom;
use App\TourQuotGuide;
use App\TourQuotGuideDetails;
use App\VehicleType;
use App\TourQuotTransport;
use App\Miscellanie;
use App\TourQuotMisc;
use App\miscCategory;
use App\Tax;
use App\CompulsorySupliment;
use App\OptionalSupliment;
use App\TourQoutHotelComSupliment;
use App\TourQoutHotelOptmSupliment;
use App\TransportExpenses;
use App\TourQuoteTrpExp;
use App\Itineray;
use App\CurrencyExchangeRate;
use App\TourQuoteRoomAllocation;
use App\Events\TourQuoteEvent;
use App\TourBookingList;
use App\GroupQtPaxSetup;
use App\tourQouteGpVehicleTypes;
use App\TourQuoteGpGuidesDetails;
use App\City;

class tourQuotationController extends Controller
{
   

    private $qtn_page_pos;

    public function __construct()
    {
        $this->middleware('auth');
        //$this->qtn_page_pos =10;
    }
    
    public function index()
    {    
         try{
            return view('tour_section.list.tour_list');    

         }catch(\Exception $e){

              return abort(404);
         }
       
    }
    
    public function create()
    {
             try{
                  
                $currency_list = Currency::all();  
                $maket_list = Market::all();
                $branch_list =Branch::all();
                $tourType = TourType::all();
                $agents = Agent::all();
    
                $amalgamate = 0;
    
            return view('tour_section.new.create',compact('currency_list','maket_list','branch_list','tourType','agents','amalgamate'));

             }catch(\Exception $e){

                 return abort(404);
             }
        
    }

    public function hotelSelectmodelSrch(Request $request)
    {
        if($request->ajax())
        {


            try{
                
            $queryd=$request->get('query');

            $qtMode = $request->get('qtMode');
            $cmb_hotel=$request->get('cmb_hotel');
            $cm_r_type=$request->get('cm_r_type');
            $cmb_meal_plane=$request->get('cmb_meal_plane');
            $cmb_period=$request->get('cmb_period');
            
            
            
            $model_date=$request->get('model_date');
            
             $output ='';

            if($queryd != '') {

                
                // if($qtMode==0){



                    // $data = DB::table('hotel_packages')
                    //             ->join('suppliers','suppliers.id','=','hotel_packages.supplier_id')
                    //             ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                    //             ->join('markets','markets.id','=','hotel_packages.market_id')
                    //             ->join('room_types','room_types.id','=','hotel_packages.room_type_id')
                    //             ->join('meal_planes','meal_planes.id','=','hotel_packages.meal_plane_id')                
                    //             ->select('hotel_packages.id','hotel_packages.Package_name','suppliers.sup_s_name','suppliers.id as supid','currencies.code','currencies.id as crid',
                    //                         'markets.m_code','room_types.r_type','meal_planes.meal_plane',
                    //                         'hotel_packages.SGL','hotel_packages.DBL','hotel_packages.TBL',
                    //                         'hotel_packages.QBL','hotel_packages.child_rate',
                    //                         'hotel_packages.extra_bed_charge','hotel_packages.from_date','hotel_packages.to_date') 
                    //             ->where('hotel_packages.from_date','<=',$model_date)
                    //             ->where('hotel_packages.to_date','>=',$model_date)
                    //             // ->orWhere('ctr_term',0)
                    //             ->where('hotel_packages.status',1)               
                    //             ->where('hotel_packages.Package_name','like','%'.$queryd.'%')
                    //             ->orWhere('suppliers.sup_s_name','like','%'.$queryd.'%')
                    //             ->orderBy('id','DESC')
                    //             ->take(30)
                    //             ->get();

                    

                $data_s = DB::table('hotel_packages')
                            ->join('suppliers','suppliers.id','=','hotel_packages.supplier_id')
                            ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                            ->join('markets','markets.id','=','hotel_packages.market_id')
                            ->join('room_types','room_types.id','=','hotel_packages.room_type_id')
                            ->join('meal_planes','meal_planes.id','=','hotel_packages.meal_plane_id')
                            ->select('hotel_packages.id','hotel_packages.Package_name','suppliers.sup_s_name','suppliers.id as supid','currencies.code','currencies.id as crid',
                                            'markets.m_code','room_types.r_type','meal_planes.meal_plane',
                                            'hotel_packages.SGL','hotel_packages.DBL','hotel_packages.TBL',
                                            'hotel_packages.QBL','hotel_packages.child_rate',
                                            'hotel_packages.extra_bed_charge','hotel_packages.from_date','hotel_packages.to_date');

                            if($cm_r_type!=0){
                                $data_s->where('hotel_packages.room_type_id','=',$cm_r_type);                                
                            }

                            if($cmb_meal_plane!=0){
                                $data_s->where('hotel_packages.meal_plane_id','=',$cmb_meal_plane);                                
                            }

                            if($cmb_hotel==0){

                                $data_s->where(function ($data_s) use ($queryd, $model_date){

                                    return $data_s->where('hotel_packages.Package_name','like','%'.$queryd.'%')
                                                ->where('hotel_packages.from_date','<=',$model_date)
                                                ->where('hotel_packages.to_date','>=',$model_date)
                                                ->where('hotel_packages.status',1);

                                });
                            }else{

                                $data_s->where('suppliers.id','=',$cmb_hotel);
                                $data_s->where(function ($data_s) use ($queryd, $model_date){

                                    return $data_s->where('hotel_packages.Package_name','like','%'.$queryd.'%')
                                                ->where('hotel_packages.from_date','<=',$model_date)
                                                ->where('hotel_packages.to_date','>=',$model_date)
                                                ->where('hotel_packages.status',1);

                            });
                        }
                            
                        $data_s->orderBy('id','DESC');
                        $data_s->take(30);

                        $data = $data_s->get();
                        
                   


                // }else{

                //     $data = DB::table('hotel_packages')
                //                 ->join('suppliers','suppliers.id','=','hotel_packages.supplier_id')
                //                 ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                //                 ->join('markets','markets.id','=','hotel_packages.market_id')
                //                 ->join('room_types','room_types.id','=','hotel_packages.room_type_id')
                //                 ->join('meal_planes','meal_planes.id','=','hotel_packages.meal_plane_id')                
                //                 ->select('hotel_packages.id','hotel_packages.Package_name','suppliers.sup_s_name','suppliers.id as supid','currencies.code','currencies.id as crid',
                //                             'markets.m_code','room_types.r_type','meal_planes.meal_plane',
                //                             'hotel_packages.SGL','hotel_packages.DBL','hotel_packages.TBL',
                //                             'hotel_packages.QBL','hotel_packages.child_rate',
                //                             'hotel_packages.extra_bed_charge','hotel_packages.from_date','hotel_packages.to_date') 
                //                 ->where('hotel_packages.from_date','<=',$model_date)
                //                 ->where('hotel_packages.to_date','>=',$model_date)
                //                 // ->orWhere('ctr_term',0)
                //                 ->where('hotel_packages.status',1)
                //                 ->where('hotel_packages.Package_name','like','%'.$queryd.'%')
                //                 ->orWhere('suppliers.sup_s_name','like','%'.$queryd.'%')
                //                 ->orderBy('id','DESC')
                //                 ->take(30)
                //                 ->get();
                // }

                $total_row = $data->count();

        // return json_encode( $total_row);
             }else{
                
               
                
                $data_s = DB::table('hotel_packages')
                 ->join('suppliers','suppliers.id','=','hotel_packages.supplier_id')
                 ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                 ->join('markets','markets.id','=','hotel_packages.market_id')
                 ->join('room_types','room_types.id','=','hotel_packages.room_type_id')
                 ->join('meal_planes','meal_planes.id','=','hotel_packages.meal_plane_id')                 
                 ->select('hotel_packages.id','hotel_packages.Package_name','suppliers.sup_s_name','suppliers.id as supid','currencies.code','currencies.id as crid',
                             'markets.m_code','room_types.r_type','meal_planes.meal_plane',
                             'hotel_packages.SGL','hotel_packages.DBL','hotel_packages.TBL',
                             'hotel_packages.QBL','hotel_packages.child_rate',
                             'hotel_packages.extra_bed_charge','hotel_packages.from_date','hotel_packages.to_date')
                ->where('hotel_packages.from_date','<=',$model_date)
                ->where('hotel_packages.to_date','>=',$model_date);

                if($cm_r_type!=0){
                    $data_s->where('hotel_packages.room_type_id','=',$cm_r_type);                                
                }

                if($cmb_meal_plane!=0){
                    $data_s->where('hotel_packages.meal_plane_id','=',$cmb_meal_plane);                                
                }

                if($cmb_hotel!=0){
                    $data_s->where('suppliers.id','=',$cmb_hotel);                               
                }

                $data_s->where('hotel_packages.status',1);
                $data_s->orderBy('id','DESC');
                $data_s->take(50);

                $data = $data_s->get();   
                
               
 
                 $total_row = $data->count();
             }

             //return json_encode($total_row);


             
            


            if($total_row > 0 ){

                foreach ($data as $row){
                   
                  

                    $output .= '
                             <tr onClick="sltr('.$row->id.')" id="pktr_'.$row->id.'" name="'.$row->id.'">
                                <td style="text-align: center;">'.$row->id.'</td>
                                <td id="h_nm_'.$row->id.'" style="text-align: center;">'.$row->sup_s_name.'</td>
                                <td id="pkgn_'.$row->id.'" style="text-align: center;">'.$row->Package_name.'</td>
                                <td >'.$row->m_code.'/'.$row->r_type.'/'.$row->meal_plane.'
                                    <input type="hidden" id="mkt_'.$row->id.'" value="'.$row->m_code.'">
                                    <input type="hidden" id="r_type_'.$row->id.'" value="'.$row->r_type.'">
                                     <input type="hidden" id="mp_'.$row->id.'" value="'.$row->meal_plane.'">
                                     <input type="hidden" id="supID_'.$row->id.'" value="'.$row->supid.'">
                                     <input type="hidden" id="curID_'.$row->id.'" value="'.$row->crid.'">
                                    </td>
                                     <td id="cr_code_'.$row->id.'" style="text-align: center;">'.$row->code.'</td>                 
                                     <td><input id="sgl_'.$row->id.'" disabled type="text" class="form-control m-input form-control-sm center-text textBox" value="'.$row->SGL.'"></td>
                                      <td><input id="dbl_'.$row->id.'" disabled type="text" class="form-control m-input form-control-sm center-text textBox" value="'.$row->DBL.'"></td>
                                      <td><input id="tbl_'.$row->id.'" disabled type="text" class="form-control m-input form-control-sm center-text textBox" value="'.$row->TBL.'"></td>
                                      <td><input id="qtb_'.$row->id.'" disabled type="text" class="form-control m-input form-control-sm center-text textBox" value="'.$row->QBL.'"></td>
                                      <td><input id="gr_'.$row->id.'" disabled type="text" class="form-control m-input form-control-sm center-text textBox" value="'.$row->child_rate.'"></td>
                                      <td><input id="child_rt_'.$row->id.'" disabled type="text" class="form-control m-input form-control-sm center-text textBox" value="'.$row->extra_bed_charge.'"></td>
                                      <td id="prd_'.$row->id.'" >'.$row->from_date.' - '.$row->to_date.'</td>
                                     <td>
                                        <button type="button" onclick="supliment_Listload('.$row->supid.','.$row->id.')" class="btn btn-warning btn-sm center-text" data-toggle="modal" data-target="#m_modal_7">SUP</button>
                                        <button type="button" onclick="addtoList('.$row->id.')" class="btn btn-success btn-sm center-text" data-dismiss="modal">Add</button>
                                        <div id="cmp_sup_div_'.$row->id.'">

                                        </div>
                                        <div id="ops_sup_div_'.$row->id.'">
        
                                        </div>
                                     </td>
                                                               
                             </tr>
                             ';
                }

            }else{

                $output = '
                        <tr>
                            <td align="center" colspan="13">No records found</td>
                        </tr>';
              
            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

             return json_encode($data);


        

    }catch(Exception $exc){

        return json_encode('sads'.$exc);
    }

    }

    }

    public function supliment_list(Request $req){
       
        if($req->ajax()){

            try{

                $tour_date = $req->model_date;
                $supID = $req->supID;
                $pkgid = $req->pkgid;
                $cmp_out='';
                $op_out='';                              

                $cmp_supList = DB::table('compulsory_supliments')
                                ->join('currencies','currencies.id','=','compulsory_supliments.currency_id')
                                ->whereDate('fr_date','<=',$tour_date)
                                ->whereDate('to_date','>=',$tour_date)
                                ->where('supplier_id',$supID)
                                ->select('compulsory_supliments.id','compulsory_supliments.currency_id','compulsory_supliments.cs_code',
                                            'compulsory_supliments.amt','compulsory_supliments.fr_date',
                                            'compulsory_supliments.des','compulsory_supliments.to_date','currencies.code','compulsory_supliments.rate_type')
                                ->get();

               // return json_encode($cmp_supList);
               
                $op_supList = DB::table('optional_supliments')
                                    ->join('hotel_package_optional_supliment','hotel_package_optional_supliment.optional_supliment_id','=','optional_supliments.id')
                                    ->join('hotel_packages','hotel_packages.id','hotel_package_optional_supliment.hotel_package_id')
                                    ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                                    ->where('hotel_packages.id',$pkgid)
                                    ->where('hotel_packages.from_date','<=',$tour_date)
                                    ->where('hotel_packages.to_date','>=',$tour_date)
                                    ->select('optional_supliments.*','currencies.code')
                                    ->get();

                //return json_encode($cmp_supList);
                 
                

                $total_row_cmp = $cmp_supList->count();
                $total_row_op = $op_supList->count();

                if($total_row_cmp > 0){
                    
                    $cmp_out='';
                    $pos=0;
                    
                    foreach($cmp_supList as $cmpSup)
                    {   $pos++;

                        $ratetype='';

                        if($cmpSup->rate_type==0){
                            $ratetype ='Per Person';
                        }else{
                            $ratetype ='Per Room';
                        }

                        $cmp_out.='<tr>
                            <td style="text-align: center;">'.$cmpSup->id.'</td>
                            <td style="text-align: center;">'.$cmpSup->cs_code.'</td>
                            <td style="text-align: center;">'.$cmpSup->des.'</td>                            
                            <td style="text-align: center;">'.$ratetype.'</td>
                            <td style="text-align: center;">'.$cmpSup->code.'</td>
                            <td style="text-align: right;">
                                <input id="cmpsup_amt_'.$pos.'" value="'.(number_format($cmpSup->amt,2)).'" style="text-align: center;" type="text" maxlenth = "8" class="form-control form-control-sm">
                                <input id="cmpsup_id_'.$pos.'" type="hidden" value="'.$cmpSup->id.'">
                                <input id="cmpsup_rtp_'.$pos.'" type="hidden" value="'.$cmpSup->rate_type.'">
                            </td>
                            <td width="8%">
                                <input id="cmpsup_exrate_'.$pos.'" value="1.00" style="text-align: center;" type="text" maxlenth = "8" class="form-control form-control-sm">
                            </td>                            
                            <td style="text-align: center;">'.$cmpSup->fr_date.'-'.$cmpSup->to_date.'</td>
                            <td style="text-align: center;">
                                &nbsp;
                                <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                    <input id="cmpsup_chk_'.$pos.'" type="checkbox" checked>&nbsp;
                                    <span></span>
                                </label>

                            </td>                        
                            </tr>';

                    }
                    
                    
                    
                }

                if($total_row_op > 0){
                    
                    $op_out='';
                    $pos = 0;
                   
                    foreach($op_supList as $opSup)
                    {   $pos++;
                        $ratetype='';
                        if($opSup->rate_type==0){
                            $ratetype ='Per Person';
                        }else{
                            $ratetype ='Per Room';
                        }
                        $op_out.='<tr>
                            <td style="text-align: center;">'.$opSup->id.'</td>
                            <td style="text-align: center;">'.$opSup->ops_code.'</td>
                            <td>'.$opSup->des.'</td>
                            <td>'.$ratetype.'</td>
                            <td style="text-align: center;">'.$opSup->code.'</td>                            
                            <td style="text-align: right;">
                                <input id="opsup_amt_'.$pos.'" value="'.number_format($opSup->amt,2).'" style="text-align: center;" type="text" maxlenth = "8" class="form-control form-control-sm">
                                <input id="opsup_id_'.$pos.'" type="hidden" value="'.$opSup->id.'">
                                <input id="opsup_rtp_'.$pos.'" type="hidden" value="'.$opSup->rate_type.'">
                                
                            </td>
                            <td style="text-align: center;">
                                &nbsp;
                                <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                    <input id="opsup_chk_'.$pos.'" type="checkbox">&nbsp;
                                    <span></span>
                                </label>
                            </td>                        
                            </tr>';

                    }

                }
               

                //return json_encode($cmp_out);

                $sup_data = array(
                'cmp_data' => $cmp_out,
                'opdata' => $op_out
                );

            return json_encode($sup_data);

            }catch(Exception $ex ){

                return json_encode('Error');
            }
        }
    }

    public function liveSearch(Request $request)
    {   
         if($request->ajax()){
        

            $queryd = $request->get('query');
            

            $output1 ='';
            $output2 ='';
            $output ='';
          

            if($queryd != '') {


            $grp_data = DB::table('tour_quotation_headers')
                        ->select('tour_id','tour_code_no','tour_code','title','pax_adult','remarks','frm_date','to_date','status','version_id','amgmt','qtn_type','agent_id')
                        // ->where('amgmt',0)
                        ->where('confirmed','=',0)
                        ->where('promotion','=',0)
                        ->where('qtn_type','=',1)
                        ->where('tour_id','LIKE','%'.$queryd.'%')
                        ->orWhere('tour_code','LIKE','%'.$queryd.'%')
                        ->orWhere('remarks','LIKE','%'.$queryd.'%')
                        ->orWhere('title','LIKE','%'.$queryd.'%')
                        ->orWhere('frm_date','LIKE','%'.$queryd.'%')
                        ->orderBy('tour_id','DESC')                        
                        ->get();

            $data = $grp_data->groupBy('qtn_type');
            
            $total_row = $data->count();

                                
            }else{

                $grp_dataa = DB::table('tour_quotation_headers')
                        ->select('tour_id','tour_code_no','tour_code','title','pax_adult','remarks','frm_date','to_date','status','version_id','confirmed','amgmt','qtn_type','agent_id')
                        // ->where('amgmt',0)
                        ->where('promotion','0')
                        ->where('confirmed','0')
                        ->where('qtn_type','1')
                        ->orderBy('tour_id','DESC')
                        // ->orderBy('version_id','ASC')

                        ->get();
                        
                $data=$grp_dataa->groupBy('tour_code_no');
                $total_row = $data->count();
               
                
            }

            
            //return $total_row;

            $output ='';
            $output1 ='';
            $output2 ='';
            $status_dt='';
            $cancel_btn='';
            
         
            $state ='';
            $ammds='';
            $ammds_disable='';
            $qtn_type ='';

            if($total_row > 0 ){
                $state ='';
                $ammds='';
                $qtn_type ='';


                foreach ($data as $datas => $rows){               
                   
                    $qtn_type ='';

                    $qtn_type_tr = '';

                    if($rows[0]->qtn_type ==2){
                         $qtn_type ='&nbsp;&nbsp;-&nbsp;&nbsp;<span class="m-badge m-badge--primary m-badge--wide">Group</span>';
                         $qtn_type_tr = 'class="table-primary"';
                    }else{
                         $qtn_type ='&nbsp;&nbsp;-&nbsp;&nbsp;<span class="m-badge m-badge--secondary m-badge--wide">FIT</span>';
                         $qtn_type_tr = 'class="table-secondary"';
                    }

                    $output1.='                    
                    <tr '.$qtn_type_tr.'>                    
                          <th class="table-secondary active" colspan="8">Tour Title : '.str_limit($rows[0]->title,30).''.$qtn_type.'</th>                                     
                    </tr>
                    ';
                    
                    // <th class="table-secondary active" colspan="4">'.$qtn_type.'</th>   
                                       
                    foreach($rows as $row){
                        
                        if($rows[0]->agent_id == $row->agent_id){

                       

                        $qtn_type ='';
                        $state='';
                        $ammds='';

                        if($row->amgmt != 0){

                            $ammds='<span class="m-badge m-badge--info m-badge--wide">Amalgamate</span>';
                            
                        }

                        if($row->status == 1){
                            $state ='<span class="m-badge m-badge--brand m-badge--wide">New</span>';
                        }elseif($row->status == 2){
                            $state ='<span class="m-badge m-badge--warning m-badge--wide">In Process</span>';
                        }elseif($row->status == 3){
                            $state ='<span class="m-badge m-badge--metal m-badge--wide">Pending</span>';
                        }elseif($row->status == 4){
                            $state ='<span class="m-badge m-badge--success m-badge--wide">Confirmed</span>';
                        }
                        elseif($row->status == 5){
                            $state ='<span class="m-badge m-badge--danger m-badge--wide">Canceled</span>';
                        }
                       
                       // $editRoute = Route('quotation_edit');
                        
                        //return $editRoute;
                        $versionAdd ='';
                        
                         if($row->amgmt == 0){
                            $versionAdd ='<button '.$ammds_disable.' onclick="qouteNewVersion('.$row->tour_id.')" 
                                          class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only '.$ammds_disable.'" 
                                          title="New Version">
                                          <i class="fa fa-copy"></i>
                                          </button>';
                         }else{

                            $versionAdd ='<button disabled 
                            class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only disabled" 
                            title="New Version">
                            <i class="fa fa-copy"></i>
                            </button>';
                         }
                      
                        if($row->status == 4 && $row->confirmed == 0)
                        {
                            $status_dt.='<i class="la la-th-list"></i>';
                            $cancel_btn.='  <a href="" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only disabled" title="Cancel">
                            <i class="fa fa-window-close"></i>
                            </a>';
                        }
                        else
                        {
                            $status_dt.='<i class="fa fa-edit"></i> ';
                            $cancel_btn.=' <a href="" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" title="Cancel">
                            <i class="fa fa-window-close"></i>
                            </a>';
                        }
                       
                      
                    $output2.= '
                    <tr>
                    <td style="text-align: center">'.$row->tour_id.'</td>
                    <td>'.$row->tour_code.' - '.$ammds.'</td>
                    <td style="text-align: center">'.$row->pax_adult.'</td>
                    <td style="text-align: center">'.$row->frm_date.'</td>
                    <td style="text-align: center">'.$row->to_date.'</td>
                    <td>'.str_limit($row->remarks,35).'</td>               
                    <td style="text-align: center">'.$state.'</td>
        
                    <td style="text-align: center; white-space: nowrap; overflow: hidden;">
                               
                            <a href="/tour/quotation/'.$row->tour_id.'/manage"  class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only" title="Update Quotation">
                             '.$status_dt.'
                            </a>
                            <a href="/tour/quotation/'.$row->tour_id.'/manage/quick" class="btn btn-primary m-btn m-btn--icon btn-sm m-btn--icon-only" title="Quick Update Quotation">
                             '.$status_dt.'
                            </a>
                            '.$versionAdd.' 
                                                        
                            '.$cancel_btn.'
                           
                            
                  </td>

                </tr>
                     ';
                     $output.='
                     '.$output1.'
                     '.$output2.'
                     ';
                     
                     $output1='';
                     $output2='';
                     $state='';
                     $status_dt='';
                     $cancel_btn='';
                    }

                


                }

                }
              
                

            }else{

                $output = '
                        <tr>
                            <td align="center" colspan="9">No records found</td>
                        </tr>';


            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

           return json_encode($data);

       }

    }
    public function gpliveSearch(Request $request)
    {   
         if($request->ajax()){
        

            $queryd = $request->get('Gpquery');
            

            $output1 ='';
            $output2 ='';
            $output ='';
          

            if($queryd != '') {


            $grp_data = DB::table('tour_quotation_headers')
                        ->select('tour_id','tour_code_no','tour_code','title','pax_adult','remarks','frm_date','to_date','status','version_id','amgmt','qtn_type','agent_id')
                        // ->where('amgmt',0)
                        ->where('confirmed','=',0)
                        ->where('promotion','=',0)
                        ->where('qtn_type','=',2)
                        ->where('tour_id','LIKE','%'.$queryd.'%')
                        ->orWhere('tour_code','LIKE','%'.$queryd.'%')
                        ->orWhere('remarks','LIKE','%'.$queryd.'%')
                        ->orWhere('title','LIKE','%'.$queryd.'%')
                        ->orWhere('frm_date','LIKE','%'.$queryd.'%')
                        ->orderBy('tour_id','DESC')                        
                        ->get();

            $data = $grp_data->groupBy('tour_code_no');
            
            $total_row = $data->count();

                                
            }else{

                $grp_dataa = DB::table('tour_quotation_headers')
                        ->select('tour_id','tour_code_no','tour_code','title','pax_adult','remarks','frm_date','to_date','status','version_id','confirmed','amgmt','qtn_type','agent_id')
                        // ->where('amgmt',0)
                        ->where('promotion','0')
                        ->where('confirmed','0')
                        ->where('qtn_type','2')
                        ->orderBy('tour_id','DESC')
                        // ->orderBy('version_id','ASC')
                        ->get();
                        
                $data=$grp_dataa->groupBy('tour_code_no');
                $total_row = $data->count();
               
            }

            //return $total_row;

            $output ='';
            $output1 ='';
            $output2 ='';
            $status_dt='';
            $cancel_btn='';
            
         
            $state ='';
            $ammds='';
            $ammds_disable='';
            $qtn_type ='';

            if($total_row > 0 ){
                $state ='';
                $ammds='';
                $qtn_type ='';


                foreach ($data as $datas => $rows){               
                   
                    $qtn_type ='';

                    $qtn_type_tr = '';

                    if($rows[0]->qtn_type ==2){
                         $qtn_type ='&nbsp;&nbsp;-&nbsp;&nbsp;<span class="m-badge m-badge--primary m-badge--wide">Group</span>';
                         $qtn_type_tr = 'class="table-primary"';
                    }else{
                         $qtn_type ='&nbsp;&nbsp;-&nbsp;&nbsp;<span class="m-badge m-badge--secondary m-badge--wide">FIT</span>';
                         $qtn_type_tr = 'class="table-secondary"';
                    }

                    $output1.='                    
                    <tr '.$qtn_type_tr.'>                    
                          <th class="table-secondary active" colspan="8">Tour Title : '.str_limit($rows[0]->title,30).''.$qtn_type.'</th>                                     
                    </tr>
                    ';
                    
                    // <th class="table-secondary active" colspan="4">'.$qtn_type.'</th>   
                                       
                    foreach($rows as $row){
                        
                        if($rows[0]->agent_id == $row->agent_id){

                       

                        $qtn_type ='';
                        $state='';
                        $ammds='';

                        if($row->amgmt != 0){

                            $ammds='<span class="m-badge m-badge--info m-badge--wide">Amalgamate</span>';
                            
                        }

                        if($row->status == 1){
                            $state ='<span class="m-badge m-badge--brand m-badge--wide">New</span>';
                        }elseif($row->status == 2){
                            $state ='<span class="m-badge m-badge--warning m-badge--wide">In Process</span>';
                        }elseif($row->status == 3){
                            $state ='<span class="m-badge m-badge--metal m-badge--wide">Pending</span>';
                        }elseif($row->status == 4){
                            $state ='<span class="m-badge m-badge--success m-badge--wide">Confirmed</span>';
                        }
                        elseif($row->status == 5){
                            $state ='<span class="m-badge m-badge--danger m-badge--wide">Canceled</span>';
                        }
                       
                       // $editRoute = Route('quotation_edit');
                        
                        //return $editRoute;
                        $versionAdd ='';
                         
                         if($row->amgmt == 0){
                            $versionAdd ='<button '.$ammds_disable.' onclick="qouteNewVersion('.$row->tour_id.')" 
                                          class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only '.$ammds_disable.'" 
                                          title="New Version">
                                          <i class="fa fa-copy"></i>
                                          </button>';
                         }else{

                            $versionAdd ='<button disabled 
                            class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only disabled" 
                            title="New Version">
                            <i class="fa fa-copy"></i>
                            </button>';
                         }
                      
                        if($row->status == 4 && $row->confirmed == 0)
                        {
                            $status_dt.='<i class="la la-th-list"></i>';
                            $cancel_btn.='  <a href="" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only disabled" title="Cancel">
                            <i class="fa fa-window-close"></i>
                            </a>';
                        }
                        else
                        {
                            $status_dt.='<i class="fa fa-edit"></i> ';
                            $cancel_btn.=' <a href="" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" title="Cancel">
                            <i class="fa fa-window-close"></i>
                            </a>';
                        }
                       
                      
                    $output2.= '
                    <tr>
                    <td style="text-align: center">'.$row->tour_id.'</td>
                    <td>'.$row->tour_code.' - '.$ammds.'</td>
                    <td style="text-align: center">'.$row->pax_adult.'</td>
                    <td style="text-align: center">'.$row->frm_date.'</td>
                    <td style="text-align: center">'.$row->to_date.'</td>
                    <td>'.str_limit($row->remarks,35).'</td>               
                    <td style="text-align: center">'.$state.'</td>
        
                    <td style="text-align: center; white-space: nowrap; overflow: hidden;">
                               
                            <a href="/tour/quotation/'.$row->tour_id.'/manage"  class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only" title="Update Quotation">
                             '.$status_dt.'
                            </a>
                            <a href="/tour/quotation/'.$row->tour_id.'/manage/quick" class="btn btn-primary m-btn m-btn--icon btn-sm m-btn--icon-only" title="Quick Update Quotation">
                             '.$status_dt.'
                            </a>
                            '.$versionAdd.' 
                                                        
                            '.$cancel_btn.'
                           
                            
                  </td>

                </tr>
                     ';
                     $output.='
                     '.$output1.'
                     '.$output2.'
                     ';
                     
                     $output1='';
                     $output2='';
                     $state='';
                     $status_dt='';
                     $cancel_btn='';
                    }
                    

                }

                }
              
                

            }else{

                $output = '
                        <tr>
                            <td align="center" colspan="9">No records found</td>
                        </tr>';


            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

           return json_encode($data);

       }

    }

 
    public function store(Request $request)
    {
        //
        
       
            try{

                if($request->title ==''){
                   return '* Tour Title is empty! Please Enter Tour title.';
                }else if($request->days < 1){

                    return '* Invalid No of Days ! Please Select Valid Date range.';
                }else if($request->frm_date < date("Y-m-d")){

                    return '* Selected Start date is not valied! Please Select Valid Date range.';
                }else if($request->frm_date > $request->to_date){

                    return '* Selected Start date is greater than to end date! Please Select Valid Date range.';

                }else if($request->com_rate < 0){

                    return '* Invalid Commission Rate! Please enter valid rate.';
                }else if($request->com_rate == ''){
                    return '* Invalid Commission Rate! Please enter valid rate.';
                }
                else if($request->base_cr == 0 ){

                    return '* Base Currency not selected! Please select.';
                }else if($request->market_id == 0 ){

                    return '* Market not selected! Please select.';
                }else if($request->agent_id == 0 ){

                    return '* Agent not selected! Please select.';
                }
                // else if($request->branch_id == 0 ){

                //     return '* Branch not selected! Please select.';
                // }
                else if($request->pax_adult < 1 ){

                    return '* Invalid Adult Pax! Please enter valid no of pax.';
                }else if($request->pax_child < 0 ){

                    return '* Invalid Child Pax! Please enter valid no of pax.';
                }else if($request->tourType == 0 ){

                    return '* Tour Type not selected! Please enter tour type.';
                }
                else if($request->con_rate == '' ){

                    return '* Please Enter LKR Rate.';
                }
                else
                {
                        
                DB::beginTransaction();

                 $tourID=0;
                 $tourIDUpdate = TrData::where('id',1)->select('id','tour_id')->first();
                
                 
                 $tourID =($tourIDUpdate->tour_id)+1;
                 $tourIDUpdate->tour_id = $tourID;
                 $tourIDUpdate->save();

                 $currentYear =date("Y");
                 $currentMonth =date("m");
                    
                 //-------------Agent year Code--------------
                $tourCodeNo =0;

               $QuotationCodeNoUpdate = QuotationCode::where('code_year',$currentYear)->where('agent_id',$request->agent_id)->first();

                if($QuotationCodeNoUpdate !=''){
                    $tourCodeNo = ($QuotationCodeNoUpdate->code_no) +1;
                    $QuotationCodeNoUpdate->code_no = $tourCodeNo;
                    $QuotationCodeNoUpdate->save();

                }else{
                    $QuotationCodeNoUpdate = new QuotationCode();
                    $QuotationCodeNoUpdate->agent_id = $request->agent_id;
                    $QuotationCodeNoUpdate->code_year = $currentYear;
                    $QuotationCodeNoUpdate->code_no = 1;
                    $QuotationCodeNoUpdate->save();
                    $tourCodeNo=1;
                }

                
                 $tourQt_versionNo = $request->version_no;
                 
                 $mkCode = Market::where('id',$request->market_id)->select('m_code')->first();
                //  $agCode = Agent::where('id',$request->agent_id)->select('ag_code')->first();
                 $brCode = Branch::where('id',$request->branch_id)->select('branch_code')->first();

                   // return $mkCode;

                  // return $tourQt_versionNo;
                 $tourCode = ($mkCode->m_code).'/'.$brCode->branch_code.'/'.$currentMonth.$currentYear.'-'.$tourCodeNo.'-V'.($tourQt_versionNo+1);

                // return $tourCode;

                $base_on = $request->base_on;


                if($base_on=='day'){
                    
                   $bs_onid = 2;

                    $to_date_tour = date('Y-m-d', strtotime($request->frm_date . ' + ' . ($request->days) . ' days'));

                }else{
                    
                    $to_date_tour = $request->to_date;
                    $bs_onid = 1;

                }

                $chk_chld_acmd = 0;
                $chk_chld_misc = 0;
                                
                if($request->pax_child>0){
                    $chk_chld_acmd = 1;
                    $chk_chld_misc = 1;
                }


                //return $to_date_tour;

                 $tourQt = new TourQuotationHeader();
                // return 'ws';$tourCodeNo
                 $tourQt->tour_id = $tourID;
                 $tourQt->tour_code = $tourCode;
                 $tourQt->tour_code_no = $tourCodeNo;
                 $tourQt->market_id = $request->market_id;
                 $tourQt->agent_id = $request->agent_id;
                 $tourQt->branch_id =$request->branch_id;
                 $tourQt->version_id = ($tourQt_versionNo+1);;
                 $tourQt->tour_type = $request->tourType;
                 $tourQt->title = $request->title;
                 
                 $tourQt->frm_date = $request->frm_date;
                 $tourQt->to_date = $to_date_tour;

                 $tourQt->vld_frm_date = $request->frm_date;
                 $tourQt->vld_to_date = $request->to_date;
                 
                 $tourQt->Days = $request->days;
                 $tourQt->pax_adult = $request->pax_adult;
                 $tourQt->pax_child = $request->pax_child;
                 $tourQt->remarks = $request->remarks;
                 $tourQt->currency_id = $request->base_cr;
                 $tourQt->promotion = 0;
                 $tourQt->confirmed = 0;
                 $tourQt->com_rate = $request->com_rate;
                 $tourQt->status = 1;
                 $tourQt->amgmt = 0;
                 
                 $tourQt->millage = 0;

                 $tourQt->base_on = $bs_onid;                              
                 
                 $tourQt->user_id = Auth::user()->id;
                 $tourQt->qtn_type = $request->qtType;
                 $tourQt->bc_to_lkr= $request->con_rate;
                 $tourQt->child_pp_rate= 0.00;
                 $tourQt->child_chk_accmd = $chk_chld_acmd;
                 $tourQt->child_chk_trsp = 0;
                 $tourQt->child_chk_guide = 0;
                 $tourQt->child_chk_misc = $chk_chld_misc;

                 $tourQt->save();
                    
                DB::commit();

                

                return 'added';
            }

            }catch(Exception $e){

                DB::rollBack();
                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                          );
               return ($data);
                //  return "* Some field cannot be empty!, Please check before save".$e;
                   // return $e;

            }

        //return $request->all();


    }

    public function amlgmate_store(Request $request){
        
        //     
       
        try{

            if($request->title ==''){
               return '* Tour Title is empty! Please Enter Tour title.';
            }else if($request->days < 1){

                return '* Invalid No of Days ! Please Select Valid Date range.';
            }else if($request->frm_date < date("Y-m-d")){

                return '* Selected Start date is not valied! Please Select Valid Date range.';
            }else if($request->frm_date > $request->to_date){

                return '* Selected Start date is greater than to end date! Please Select Valid Date range.';

            }else if($request->com_rate < 0){

                return '* Invalid Commission Rate! Please enter valid rate.';
            }else if($request->com_rate == ''){
                return '* Invalid Commission Rate! Please enter valid rate.';
            }
            else if($request->base_cr == 0 ){

                return '* Base Currency not selected! Please select.';
            }else if($request->market_id == 0 ){

                return '* Market not selected! Please select.';
            }else if($request->agent_id == 0 ){

                return '* Agent not selected! Please select.';
            }else if($request->branch_id == 0 ){

                return '* Branch not selected! Please select.';
            }else if($request->pax_adult < 1 ){

                return '* Invalid Adult Pax! Please enter valid no of pax.';
            }else if($request->pax_child < 0 ){

                return '* Invalid Child Pax! Please enter valid no of pax.';
            }else if($request->tourType == 0 ){

                return '* Tour Type not selected! Please enter tour type.';
            }
            else
            {
                $t_id = $request->tour_id;
                    
            DB::beginTransaction();

             $tourID=0;
             $tourIDUpdate = TrData::where('id',1)->select('id','tour_id')->first();
            
             $tour_quote_data = TourQuotationHeader::where('tour_id',$t_id)
                                                    ->where('amgmt',0)    
                                                    ->first(); 
             
             $tourID =($tourIDUpdate->tour_id)+1;
             $tourIDUpdate->tour_id = $tourID;
             $tourIDUpdate->save();
                    
             $currentYear = date("Y");
             $currentMonth = date("m");

             //-------------Agent year Code--------------
            $tourCodeNo = $tour_quote_data->tour_code_no;
           
             $tourCode = $tour_quote_data->tour_code;


             $tourQt = new TourQuotationHeader();
             

             $tourQt->tour_id = $tourID;
             $tourQt->tour_code = $tourCode;
             $tourQt->tour_code_no = $tourCodeNo;
             $tourQt->market_id = $tour_quote_data->market_id;
             $tourQt->agent_id = $tour_quote_data->agent_id;
             $tourQt->branch_id = $tour_quote_data->branch_id;
             $tourQt->version_id = ($tour_quote_data->version_id);
             $tourQt->version_id = ($tour_quote_data->version_id);
             $tourQt->tour_type = $request->tourType;
             $tourQt->title = $request->title;
             $tourQt->frm_date = $request->frm_date;
             $tourQt->to_date = $request->to_date;

             $tourQt->vld_frm_date = $tour_quote_data->vld_frm_date;
             $tourQt->vld_to_date = $tour_quote_data->vld_to_date;

             $tourQt->Days = $request->days;
             $tourQt->pax_adult = $request->pax_adult;
             $tourQt->pax_child = $request->pax_child;
             $tourQt->remarks = $request->remarks;
             $tourQt->currency_id = $request->base_cr;
             $tourQt->promotion = 0;
             $tourQt->confirmed = 0;
             $tourQt->com_rate = $request->com_rate;
             $tourQt->status = 1;
             $tourQt->amgmt = 1;
             //child_pp_rate
             $tourQt->base_on = $request->base_on;
             $tourQt->child_pp_rate = 0.00;
             $tourQt->bc_to_lkr = 0.00;

             $tourQt->user_id = Auth::user()->id;
             $tourQt->qtn_type = 1;
             $tourQt->save();

             //$t_id
             

             $tourBooking_ammd_nxtno = TourBookingList::where('tour_ammd_id',$t_id)
                                                    ->where('tour_ammd_type',1)
                                                    ->select('tour_ammd')
                                                    ->orderBy('tour_ammd','DESC')->value('tour_ammd');
            
            // $ammdType='0';

            // if($tour_quote_data->to_date < $request->to_date){
            //     $ammdType=1;
            // }elseif($tour_quote_data->frm_date > $request->frm_date){
            //     $ammdType=2;
            // }

            

             $Booking_Ammd = new TourBookingList();
                    
             $Booking_Ammd->tour_id = $tourID;             
             $Booking_Ammd->tour_ammd_id = $t_id;
             $Booking_Ammd->tour_ammd = ($tourBooking_ammd_nxtno+1);
             $Booking_Ammd->tour_ammd_type = $request->qtType;
             $Booking_Ammd->save();


            //  $gp_vtData = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tour_quote_data->id)->get();

            //  $tourQtHeadId = TourQuotationHeader::where('tour_id',$tourID)->value('id');

            //  foreach($gp_vtData as $gp_vtDatas){
                    
            //     $newgpvtype = new tourQouteGpVehicleTypes();
                
            //     $newgpvtype->tour_quotation_header_id = $tourQtHeadId;
            //     $newgpvtype->group_qt_pax_setup_id = $gp_vtDatas->group_qt_pax_setup_id;
            //     $newgpvtype->vehicle_type_id = $gp_vtDatas->vehicle_type_id;                    
            //     $newgpvtype->rate_per_km = $gp_vtDatas->rate_per_km;
            //     $newgpvtype->extr_vehicle_type_id = $gp_vtDatas->extr_vehicle_type_id;
            //     $newgpvtype->extr_rate_per_km = $gp_vtDatas->extr_rate_per_km;
            //     $newgpvtype->extr_vht_millage = $gp_vtDatas->extr_vht_millage;
                 
            //     $newgpvtype->main_vt_mk_pc = $gp_vtDatas->main_vt_mk_pc;
            //     $newgpvtype->extr_vt_mk_pc = $gp_vtDatas->extr_vt_mk_pc;
            //     $newgpvtype->exrchg_rate = $gp_vtDatas->exrchg_rate;
                
            //     $newgpvtype->save();
                
            // }
                
            DB::commit();

            

            return 'added';
        }

        }catch(Exception $e){

            DB::rollBack();
            return "* Some field cannot be empty!, Please check before save".$e;
               // return $e;

        }

    //return $request->all();

    }


  

    public function newVersion(Request $req)
    {
       if($req->ajax()){
               
        try
        {
            $TourID_ORG = $req->tour_id;
            $tourQoute = TourQuotationHeader::where('tour_id',$TourID_ORG)->first();



                 DB::beginTransaction();

                 $tourID=0;
                 $tourIDUpdate = TrData::where('id',1)->select('id','tour_id')->first();
                
                 
                 $tourID =($tourIDUpdate->tour_id)+1;
                 $tourIDUpdate->tour_id = $tourID;
                 $tourIDUpdate->save();

                 $currentYear =date("Y");
                 $currentMonth =date("m");

                 //-------------Agent year Code--------------
                $tourCodeNo =0;

               //$QuotationCodeNoUpdate = QuotationCode::where('code_year',$currentYear)->where('agent_id',$request->agent_id)->first();

               // if($QuotationCodeNoUpdate !=''){
                    $tourCodeNo = $tourQoute->tour_code_no;
                    // $QuotationCodeNoUpdate->code_no = $tourCodeNo;
                    // $QuotationCodeNoUpdate->save();

                ///}


                 $tourQt_versionNo = $tourQoute->version_id;
                 
                //  $tourQoute->version_no = $tourQt_versionNo+1;
                //  $tourQoute->save();

                 $tourQouteVid = TourQuotationHeader::where('tour_id',$TourID_ORG)
                                        ->where('tour_code_no',$tourCodeNo)
                                        ->where('promotion',0)
                                        ->where('confirmed',0)
                                        ->first();
                 $tourQouteVid->version_id = $tourQt_versionNo+1;
                 $tourQouteVid->save();
                 
                 $mkCode = Market::where('id',$tourQoute->market_id)->select('m_code')->first();
                //  $agCode = Agent::where('id',$tourQoute->agent_id)->select('ag_code')->first();
                 $brCode = Branch::where('id',$tourQoute->branch_id)->select('branch_code')->first();

                 
                  // return $tourQt_versionNo;
                 $tourCode = ($mkCode->m_code).'/'.$brCode->branch_code.'/'.$currentMonth.$currentYear.'-'.$tourCodeNo.'-V'.($tourQt_versionNo+1);


                 $tourQt = new TourQuotationHeader();
              
                 $tourQt->tour_id = $tourID;
                 $tourQt->tour_code = $tourCode; 
                 $tourQt->tour_code_no = $tourCodeNo;
                 $tourQt->market_id = $tourQoute->market_id;
                 $tourQt->agent_id = $tourQoute->agent_id;
                 $tourQt->branch_id = $tourQoute->branch_id;
                 $tourQt->version_id = $tourQt_versionNo+1;
                 $tourQt->version_no = $tourQt_versionNo+1;
                 $tourQt->tour_type = $tourQoute->tour_type;
                 $tourQt->title = $tourQoute->title;
                 $tourQt->frm_date = $tourQoute->frm_date;
                 $tourQt->to_date = $tourQoute->to_date;

                 $tourQt->vld_frm_date = $tourQoute->vld_frm_date;
                 $tourQt->vld_to_date = $tourQoute->vld_to_date;

                 

                 $tourQt->Days = $tourQoute->Days;
                 $tourQt->pax_adult = $tourQoute->pax_adult;
                 $tourQt->pax_child = $tourQoute->pax_child;
                 $tourQt->remarks = $tourQoute->remarks;
                 $tourQt->currency_id = $tourQoute->currency_id;
                 $tourQt->promotion = 0;
                 $tourQt->confirmed = 0;
                 $tourQt->com_rate = $tourQoute->com_rate;

                 $tourQt->user_id = $tourQoute->user_id;
                 $tourQt->qtn_type = $tourQoute->qtn_type;
                 $tourQt->status = 2;
                 $tourQt->amgmt = 0;

                
                 $tourQt->base_on = $tourQoute->base_on;
                 //$tourQt->user_id = $tourQoute->user_id;
                 
                 $tourQt->pp_misc_price =$tourQoute->pp_misc_price;
                 
                 $tourQt->trp_pp_price =$tourQoute->trp_pp_price; 
                 

                 $tourQt->tot_guide_price =$tourQoute->tot_guide_price;
                 $tourQt->tot_guide_acmd =$tourQoute->tot_guide_acmd;

                 $tourQt->millage = $tourQoute->millage;

                 $tourQt->pp_hotel_price =$tourQoute->pp_hotel_price;
                 $tourQt->pp_ss_price =$tourQoute->pp_ss_price;
                 $tourQt->pp_tpre_price =$tourQoute->pp_tpre_price;
                 $tourQt->pp_qtre_price =$tourQoute->pp_qtre_price;
                 $tourQt->bc_to_lkr=$tourQoute->bc_to_lkr;
                 $tourQt->child_pp_rate = $tourQoute->child_pp_rate;
                 $tourQt->child_chk_accmd=$tourQoute->child_chk_accmd;
                 $tourQt->child_chk_trsp=$tourQoute->child_chk_trsp;
                 $tourQt->child_chk_guide=$tourQoute->child_chk_guide;
                 $tourQt->child_chk_misc=$tourQoute->child_chk_misc;

                 $tourQt->save();
                 

                $qoutHeaderID = TourQuotationHeader::select('id')->orderBy('id','DESC')->first();
                    
                $tourQuoteLocations = TourQuotLocation::where('tour_id',$TourID_ORG)->orderBy('tour_day','ASC')->get();
               
                $tourQouteDistance = DB::table('tour_quot_distances')
                                        ->join('tour_quot_locations','tour_quot_locations.id','=','tour_quot_distances.tour_quot_location_id')                                        
                                        ->select('tour_quot_locations.tour_day','tour_quot_distances.pos','tour_quot_distances.location_id',
                                                'tour_quot_distances.lc_name','tour_quot_distances.lc_code','tour_quot_distances.kms')
                                        ->orderBy('tour_quot_distances.pos')
                                        ->where('tour_quot_locations.tour_id',$TourID_ORG)
                                        ->get();                                                    
               // $tourQouteDistance_gp = $tourQouteDistance->groupBy('tour_day');


                foreach($tourQuoteLocations as $quoteLocation){
                    
                    $tourDays = date('Y-m-d', strtotime($quoteLocation->tour_date. ' + ' . (0) . ' days'));

                    $qoutLocation = new TourQuotLocation();

                    $qoutLocation->tour_quotation_header_id = $qoutHeaderID->id;
                    $qoutLocation->tour_id = $tourID;
                    $qoutLocation->tour_date = $tourDays;
                    $qoutLocation->tour_day = $quoteLocation->tour_day;
                    $qoutLocation->ttkms = $quoteLocation->ttkms;
                    $qoutLocation->itineray_id = $quoteLocation->itineray_id;      
                    $qoutLocation->save();
                                        
                    $LcLastID = TourQuotLocation::select('id')->orderBy('id','DESC')->first();

                                       
                    foreach($tourQouteDistance as $distanceSp){
                        
                        if($distanceSp->tour_day == $quoteLocation->tour_day){
                           
                                $QutDistance = new TourQuotDistance();

                                $QutDistance->tour_quot_location_id = $LcLastID->id;
                                $QutDistance->tour_id = $tourID;
                                $QutDistance->pos = $distanceSp->pos;
                                $QutDistance->location_id = $distanceSp->location_id;                        
                                $QutDistance->lc_name = $distanceSp->lc_name;
                                $QutDistance->lc_code = $distanceSp->lc_code;
                                $QutDistance->kms = $distanceSp->kms;
                                $QutDistance->save();                     
                        }
                    }


                }

                $hotelbkDays = TourQuotationHotel::where('tour_id',$TourID_ORG)->get();
                
                $hotelPkgData = DB::table('tour_quotation_hotel_details')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.*')
                                    ->orderBy('tour_quotation_hotel_details.pos')
                                    ->where('tour_quotation_hotels.tour_id',$TourID_ORG)
                                    ->get();

                                    //return json_encode('sadsd');
                $comp_supliments = DB::table('tour_qout_hotel_com_supliments')
                                        ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_com_supliments.tour_quotation_hotel_detail_id')
                                        ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                        ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos','tour_qout_hotel_com_supliments.*')
                                        ->orderBy('tour_qout_hotel_com_supliments.spos')
                                        ->where('tour_qout_hotel_com_supliments.tour_id',$TourID_ORG)->get();

                $Opti_supliments = DB::table('tour_qout_hotel_optm_supliments')
                                        ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_optm_supliments.tour_quotation_hotel_detail_id')
                                        ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                        ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos','tour_qout_hotel_optm_supliments.*')
                                        ->orderBy('tour_qout_hotel_optm_supliments.spos')
                                        ->where('tour_qout_hotel_optm_supliments.tour_id',$TourID_ORG)->get();

                foreach ($hotelbkDays as $bkdays) {
                    
                    $tourDaysh = date('Y-m-d', strtotime($bkdays->tour_date. ' + ' . (0) . ' days'));

                    $tourQoutHotel = new TourQuotationHotel();
                    $tourQoutHotel->tour_quotation_header_id = $qoutHeaderID->id;
                    $tourQoutHotel->tour_id = $tourID;
                    $tourQoutHotel->tour_date = $tourDaysh;
                    $tourQoutHotel->tour_day = $bkdays->tour_day;
                    $tourQoutHotel->save();

                    $touhtLastID = TourQuotationHotel::select('id')->orderBy('id', 'DESC')->first();                    //return json_encode($LcLastID);

                    foreach ($hotelPkgData as $pakgs) {

                        if ($bkdays->tour_day == $pakgs->tour_day) {

                            

                            $tourQoutHotelDetails = new TourQuotationHotelDetails();

                            $tourQoutHotelDetails->tour_quotation_hotel_id = $touhtLastID->id;
                            $tourQoutHotelDetails->tour_id = $tourID;
                            $tourQoutHotelDetails->pos = $pakgs->pos;
                            $tourQoutHotelDetails->supplier_id = $pakgs->supplier_id;
                            $tourQoutHotelDetails->hotel_package_id = $pakgs->hotel_package_id;
                            $tourQoutHotelDetails->ss_rate = $pakgs->ss_rate;
                            $tourQoutHotelDetails->ss_com = $pakgs->ss_com;
                            $tourQoutHotelDetails->db_rate = $pakgs->db_rate;
                            $tourQoutHotelDetails->db_com = $pakgs->db_com;
                            $tourQoutHotelDetails->trp_rate = $pakgs->trp_rate;
                            $tourQoutHotelDetails->trp_com = $pakgs->trp_com;
                            $tourQoutHotelDetails->qtb_rate = $pakgs->qtb_rate;
                            $tourQoutHotelDetails->qtb_com = $pakgs->qtb_com;

                            $tourQoutHotelDetails->sql_splm = $pakgs->sql_splm;
                            $tourQoutHotelDetails->dbl_splm = $pakgs->dbl_splm;
                            $tourQoutHotelDetails->tbl_splm = $pakgs->tbl_splm;
                            $tourQoutHotelDetails->qd_splm = $pakgs->qd_splm;
                            $tourQoutHotelDetails->guide = $pakgs->guide;

                            $tourQoutHotelDetails->child_rate = $pakgs->child_rate;
                            $tourQoutHotelDetails->child_com = $pakgs->child_com;
                            
                            
                            $tourQoutHotelDetails->currency_id = $pakgs->currency_id;
                            $tourQoutHotelDetails->rate_to_base = $pakgs->rate_to_base;
                            $tourQoutHotelDetails->status = $pakgs->status;
                            $tourQoutHotelDetails->save();

                            $touhtDtailsLastID = TourQuotationHotelDetails::select('id')->orderBy('id', 'DESC')->first();



                             foreach($comp_supliments as $cmpsup){
                                    
                                if($bkdays->tour_day == $cmpsup->tour_day){
                                   
                                    if($pakgs->pos == $cmpsup->pos){    

                                        $tourqouteComSup = new TourQoutHotelComSupliment();
                                    
                                        $tourqouteComSup->tour_quotation_hotel_detail_id = $touhtDtailsLastID->id;
                                        $tourqouteComSup->tour_id = $tourID;
                                        $tourqouteComSup->spos = $cmpsup->spos;
                                        $tourqouteComSup->compulsory_supliment_id = $cmpsup->compulsory_supliment_id;
                                        $tourqouteComSup->rate_type = $cmpsup->rate_type;
                                        $tourqouteComSup->exrate = $cmpsup->exrate;
                                        $tourqouteComSup->csup_amount = $cmpsup->csup_amount;
                                        $tourqouteComSup->qty = $cmpsup->qty;
                                        $tourqouteComSup->cheked = $cmpsup->cheked;
                                        $tourqouteComSup->save();
                                    }

                                }

                             }
                             
                             foreach($Opti_supliments as $opssup){
                                    
                                if($bkdays->tour_day == $opssup->tour_day){
                                    
                                    if($pakgs->pos == $opssup->pos){   
                                        
                                        $tourqouteOptSup = new TourQoutHotelOptmSupliment();
                                        
                                        $tourqouteOptSup->tour_quotation_hotel_detail_id = $touhtDtailsLastID->id;
                                        $tourqouteOptSup->tour_id = $tourID;
                                        $tourqouteOptSup->spos = $opssup->spos;
                                        $tourqouteOptSup->optional_supliment_id = $opssup->optional_supliment_id;
                                        $tourqouteOptSup->rate_type = $opssup->rate_type;                                        
                                        $tourqouteOptSup->opsup_amount = $opssup->opsup_amount;
                                        $tourqouteOptSup->qty = $opssup->qty;
                                        $tourqouteOptSup->cheked = $opssup->cheked;
                                        $tourqouteOptSup->save();
                                    }
                                }

                             }



                        }

                    }

                   
                }

                $guideData = TourQuotGuide::where('tour_id',$TourID_ORG)->get();               
                $guideDataDetails = DB::table('tour_quot_guide_details')
                                ->join('tour_quot_guides','tour_quot_guides.id','=','tour_quot_guide_details.tour_quot_guide_id')
                                ->select('tour_quot_guides.tour_day','tour_quot_guide_details.*')
                                ->orderBy('tour_quot_guide_details.pos')
                                ->where('tour_quot_guides.tour_id',$TourID_ORG)
                                ->get();


                foreach ($guideData as $bkdaysGuide) {

                    $TourGuiddate = date('Y-m-d', strtotime($bkdaysGuide->tour_date . ' + ' . (0) . ' days'));

                    $tourQoutGuide = new TourQuotGuide();
                    $tourQoutGuide->tour_quotation_header_id = $qoutHeaderID->id;
                    $tourQoutGuide->tour_id = $tourID;
                    $tourQoutGuide->tour_date = $TourGuiddate;
                    $tourQoutGuide->tour_day = $bkdaysGuide->tour_day;
                    $tourQoutGuide->lkr_rate = $bkdaysGuide->lkr_rate;                        
                    $tourQoutGuide->save();

                    $touguideLastID = TourQuotGuide::select('id')->orderBy('id', 'DESC')->first();
                    //return json_encode($LcLastID);

                    foreach ($guideDataDetails as $gdetails) {

                        if ($bkdaysGuide->tour_day == $gdetails->tour_day) {

                            //return json_encode($pakgs);

                            
                            $tourQoutGuideDetails = new TourQuotGuideDetails();
                           
                            $tourQoutGuideDetails->tour_quot_guide_id = $touguideLastID->id;
                            $tourQoutGuideDetails->tour_id = $tourID;
                            $tourQoutGuideDetails->pos = $gdetails->pos;
                            $tourQoutGuideDetails->guide_type_id = $gdetails->guide_type_id;
                            $tourQoutGuideDetails->language_id = $gdetails->language_id;
                            $tourQoutGuideDetails->has_room = $gdetails->has_room;
                            $tourQoutGuideDetails->guide_room_id = $gdetails->guide_room_id;
                            $tourQoutGuideDetails->guide_fee = $gdetails->guide_fee;
                            $tourQoutGuideDetails->guide_com = $gdetails->guide_com;
                            $tourQoutGuideDetails->room_rate = $gdetails->room_rate;
                            $tourQoutGuideDetails->room_excrate = $gdetails->room_excrate;
                            $tourQoutGuideDetails->room_com = $gdetails->room_com;
                           
                            //$tourQoutGuideDetails->status = 1;
                            $tourQoutGuideDetails->save();


                        }

                    }

                    
                }

                $trpData = TourQuotTransport::where('tour_id',$TourID_ORG)->get();

                foreach($trpData as $trp_vhdata){

                    $tourQuteTrp = new TourQuotTransport();
                    
                    $tourQuteTrp->tour_quotation_header_id =$qoutHeaderID->id;
                    $tourQuteTrp->tour_id = $tourID;
                    $tourQuteTrp->pos = $trp_vhdata->pos;
                    $tourQuteTrp->vehicle_type_id = $trp_vhdata->vehicle_type_id;
                    $tourQuteTrp->millage = $trp_vhdata->millage;
                    $tourQuteTrp->rate_pkm = $trp_vhdata->rate_pkm;
                    $tourQuteTrp->totlkr = $trp_vhdata->totlkr;
                    $tourQuteTrp->trp_ls_Mkp = $trp_vhdata->trp_ls_Mkp;
                    $tourQuteTrp->baserate = $trp_vhdata->baserate;
                    $tourQuteTrp->save();

                }

                
                $trexData=TourQuoteTrpExp::where('tour_id',$TourID_ORG)->get();

                   
                foreach($trexData as $tr_dt){

                    $tr_data_ex = new TourQuoteTrpExp();
                    $tr_data_ex->tour_quotation_header_id = $qoutHeaderID->id;
                    $tr_data_ex->tour_id=$tourID;
                    $tr_data_ex->pos=$tr_dt->pos;
                    $tr_data_ex->transport_expense_id=$tr_dt->transport_expense_id;
                    $tr_data_ex->exp_rate=$tr_dt->exp_rate;
                    $tr_data_ex->exp_qty=$tr_dt->exp_qty;
                    $tr_data_ex->exp_total=$tr_dt->exp_total;
                    $tr_data_ex->exp_markup=$tr_dt->exp_markup;
                    $tr_data_ex->save();


                }


            $gp_vtData = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tourQoute->id)->get();

            

             foreach($gp_vtData as $gp_vtDatas){
                    
                $newgpvtype = new tourQouteGpVehicleTypes();
                
                $newgpvtype->tour_quotation_header_id = $qoutHeaderID->id;
                $newgpvtype->group_qt_pax_setup_id = $gp_vtDatas->group_qt_pax_setup_id;
                $newgpvtype->vehicle_type_id = $gp_vtDatas->vehicle_type_id;                    
                $newgpvtype->rate_per_km = $gp_vtDatas->rate_per_km;
                $newgpvtype->extr_vehicle_type_id = $gp_vtDatas->extr_vehicle_type_id;
                $newgpvtype->extr_rate_per_km = $gp_vtDatas->extr_rate_per_km;
                $newgpvtype->extr_vht_millage = $gp_vtDatas->extr_vht_millage;
                 
                $newgpvtype->main_vt_mk_pc = $gp_vtDatas->main_vt_mk_pc;
                $newgpvtype->extr_vt_mk_pc = $gp_vtDatas->extr_vt_mk_pc;
                $newgpvtype->exrchg_rate = $gp_vtDatas->exrchg_rate;
                
                $newgpvtype->guide_type = $gp_vtDatas->guide_type;
                $newgpvtype->guide_accmd = $gp_vtDatas->guide_accmd;
                $newgpvtype->accmd_foc = $gp_vtDatas->accmd_foc;

                $newgpvtype->save();
                
            }


            $tourQtgp_guideData_lst = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQoute->id)->get();

            foreach ($tourQtgp_guideData_lst as $tourQtgp_guideData) {
               
                    $new_gp_guide_deatails = new TourQuoteGpGuidesDetails();

                    $new_gp_guide_deatails->tour_quotation_header_id = $qoutHeaderID->id;
                    $new_gp_guide_deatails->tour_day = $tourQtgp_guideData->tour_day;
                    $new_gp_guide_deatails->language_id = $tourQtgp_guideData->language_id;
                    $new_gp_guide_deatails->supplier_id = $tourQtgp_guideData->supplier_id;
                    $new_gp_guide_deatails->pos = $tourQtgp_guideData->pos;
                    $new_gp_guide_deatails->na_guide_rate = $tourQtgp_guideData->na_guide_rate;
                    $new_gp_guide_deatails->na_guide_mkp = $tourQtgp_guideData->na_guide_mkp;
                    $new_gp_guide_deatails->ch_guide_rate = $tourQtgp_guideData->ch_guide_rate;
                    $new_gp_guide_deatails->ch_guide_mkp = $tourQtgp_guideData->ch_guide_mkp;
                    $new_gp_guide_deatails->accmd_mkp = $tourQtgp_guideData->accmd_mkp;
                    $new_gp_guide_deatails->bsratelkr = $tourQtgp_guideData->bsratelkr;
                    
                    $new_gp_guide_deatails->save();

        }


                $miscData = TourQuotMisc::where('tour_id',$TourID_ORG)->get();

                foreach($miscData as $msdata){
    
                    $tourQuteMisc = new TourQuotMisc();
                    
                    $tourQuteMisc->tour_quotation_header_id =$qoutHeaderID->id;
                    $tourQuteMisc->tour_id = $tourID;
                    $tourQuteMisc->pos = $msdata->pos;
                    $tourQuteMisc->misc_categorie_id = $msdata->misc_categorie_id;
                    $tourQuteMisc->qty = $msdata->qty;
                    $tourQuteMisc->rate_lkr = $msdata->rate_lkr;
                    $tourQuteMisc->totlkr = $msdata->totlkr;
                    $tourQuteMisc->ms_Mkp = $msdata->ms_Mkp;
                    $tourQuteMisc->baserate = $msdata->baserate;
                    $tourQuteMisc->ex_rate = $msdata->ex_rate;
                    $tourQuteMisc->save();

                }


                $roomAllocation_sl = TourQuoteRoomAllocation::where('tour_id',$TourID_ORG)->get();

                   
                   
    
                // if($roomAllocation!=''){
                     foreach($roomAllocation_sl as $roomAllocation_lst){

                     
                     $roomAllocation_new = new TourQuoteRoomAllocation();
                     
                     $roomAllocation_new->tour_id = $tourID;
                     $roomAllocation_new->sgl = $roomAllocation_lst->sgl;
                     $roomAllocation_new->dbl = $roomAllocation_lst->dbl;
                     $roomAllocation_new->twn = $roomAllocation_lst->twn;
                     $roomAllocation_new->tbl = $roomAllocation_lst->tbl;
                     $roomAllocation_new->qd = $roomAllocation_lst->qd;
                     $roomAllocation_new->save();
                     
                     }




                DB::commit();

                return json_encode('added');
            
            }catch(Exception $e){

                DB::rollBack();
                return json_encode("* Some field cannot be empty!, Please check before save".$e);
                   // return $e;

            }




            return json_encode('okkk');
       }
    }

    public function qtCancel($id)
    {
       
    }


    

    public function show(TourQuotationHeader $tourQuotationHeader)
    {
        // 
    }

    

    public function edit($tourId)
    {   
        

        
        try
        {
          
         //$tourType = TourType::all();
         $hotels = Supplier::where('type','Hotel')->where('status',1)->select('id','sup_s_name')->get();
         $roomTypes = RoomType::select('id','r_type')->get();
         $mealPlans = MealPlane::select('id','meal_plane')->get();   
         $periods = PackagePeriod::select('id','title')->get();
         $tourStDate = TourQuotationHeader::where('tour_id',$tourId)->value('frm_date');
         $tourEnDate = TourQuotationHeader::where('tour_id',$tourId)->value('to_date');
         $guide_types_list = GuideType::all();
         $guide_lang_list = Language::all();
         $guide_RoomType = GuideRoomType::all();
         $VehicleTypes = VehicleType::all();
         
         $expences=TransportExpenses::all();         
         $Taxs_lisl = Tax::where('status',1)->select('id','tax_name','rate')->get();
         $agents = Agent::all();
         $markets = Market::all();
         $currencys = Currency::all();
         $data_status=TourQuotationHeader::where('tour_id',$tourId)->select('confirmed','status')->first();
            
         $tourRoomallocation = TourQuoteRoomAllocation::where('tour_id',$tourId)->first();
         //  return $data_status;
       // return $Taxs_lisl;
           //$page_pos = $this->qtn_page_pos;
            //$this->qtn_page_pos = 14;
            // $data = $request->session()->all();
            // return $data;
            
           // $this->qtn_page_pos = 12;
        
        $citys=City::select('id','city_name')->get();   

         $location_list = DB::table('locations')                               
         ->join('districts','districts.id','=','locations.district_id')                              
         ->where('locations.status',1)
         ->select('locations.id','districts.id as dstid','districts.dist_name','locations.location_name','locations.location_code')                                                            
         ->get();


         $location_gp = $location_list->groupBy('dist_name');
         $location_gp->toArray();
         
         $LocationDtList = TourQuotLocation::where('tour_id',$tourId)->get();
        // $DistanceDtList = TourQuotDistance::where('tour_id',$tourId)->get();
        $DistanceDtList = DB::table('tour_quot_locations')
                            ->join('tour_quot_distances','tour_quot_distances.tour_quot_location_id','=','tour_quot_locations.id')
                            ->select('tour_quot_distances.*','tour_quot_locations.tour_day','tour_quot_locations.ttkms')
                            ->orderBy('tour_quot_distances.pos')
                            ->where('tour_quot_locations.tour_id',$tourId)
                            ->get();

         $LocationDtList_gp = $DistanceDtList->groupBy('tour_day');
        //return  $LocationDtList_gp;
         $tourQuotHeader = DB::table('tour_quotation_headers')
                                                ->join('markets','markets.id','=','tour_quotation_headers.market_id')
                                                ->join('agents','agents.id','=','tour_quotation_headers.agent_id')
                                                ->join('branches','branches.id','=','tour_quotation_headers.branch_id')
                                                ->join('tour_types','tour_types.id','=','tour_quotation_headers.tour_type')
                                                ->join('currencies','currencies.id','=','tour_quotation_headers.currency_id')
                                                ->where('tour_id',$tourId)
                                                ->where('confirmed',0)
                                                ->select('tour_quotation_headers.*','markets.market_name','agents.ag_name',
                                                        'branches.branch_code','branches.branch_name','tour_types.tour_type_name',
                                                        'currencies.code as cr_code','currencies.id as cur_id')                                           
                                                ->first();
                                               
            $tourQuoteHotels = DB::table('tour_quotation_hotels')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->join('suppliers','tour_quotation_hotel_details.supplier_id','suppliers.id')
                                    ->join('currencies','tour_quotation_hotel_details.currency_id','=','currencies.id')
                                    ->join('hotel_packages','tour_quotation_hotel_details.hotel_package_id','=','hotel_packages.id')
                                    ->join('room_types','hotel_packages.room_type_id','=','room_types.id')
                                    ->join('meal_planes','hotel_packages.meal_plane_id','=','meal_planes.id')
                                    ->where('tour_quotation_hotels.tour_id',$tourId)
                                    ->select('tour_quotation_hotels.id as qt_hote_id','suppliers.sup_s_name','hotel_packages.from_date','hotel_packages.to_date','meal_planes.meal_plane','room_types.r_type','currencies.code as crcode','tour_quotation_header_id','tour_quotation_hotels.tour_date','tour_quotation_hotels.tour_day',
                                               'tour_quotation_hotel_details.id','tour_quotation_hotel_details.tour_quotation_hotel_id','tour_quotation_hotel_details.tour_id',
                                               'tour_quotation_hotel_details.pos','tour_quotation_hotel_details.supplier_id','tour_quotation_hotel_details.hotel_package_id','tour_quotation_hotel_details.ss_rate',
                                               'tour_quotation_hotel_details.ss_com','tour_quotation_hotel_details.db_rate','tour_quotation_hotel_details.db_com','tour_quotation_hotel_details.trp_rate',
                                               'tour_quotation_hotel_details.trp_com','tour_quotation_hotel_details.trp_com','tour_quotation_hotel_details.trp_com',
                                               'tour_quotation_hotel_details.qtb_rate','tour_quotation_hotel_details.qtb_com','tour_quotation_hotel_details.currency_id',
                                               'tour_quotation_hotel_details.rate_to_base','tour_quotation_hotel_details.sql_splm','tour_quotation_hotel_details.dbl_splm','tour_quotation_hotel_details.guide',
                                               'tour_quotation_hotel_details.tbl_splm','tour_quotation_hotel_details.qd_splm','tour_quotation_hotel_details.status',
                                               'tour_quotation_hotel_details.child_rate','tour_quotation_hotel_details.child_com')
                                    ->get();
                                   

            $tourQuoteHotel_gp = $tourQuoteHotels->groupBy('tour_day');
           // glangid
            $tourQoutGuide = DB::table('tour_quot_guides')
                                ->join('tour_quot_guide_details','tour_quot_guide_details.tour_quot_guide_id','=','tour_quot_guides.id')
                                ->join('guide_types','guide_types.id','=','tour_quot_guide_details.guide_type_id')
                                ->join('languages','languages.id','=','tour_quot_guide_details.language_id')
                                ->leftJoin('guide_rooms','guide_rooms.id','=','tour_quot_guide_details.guide_room_id')                                
                                ->leftJoin('currencies','currencies.id','=','guide_rooms.currency_id')
                                ->where('tour_quot_guides.tour_id',$tourId)   
                                ->select('tour_quot_guides.id','tour_quot_guides.tour_id','tour_quot_guides.tour_day','tour_quot_guides.lkr_rate',
                                            'tour_quot_guide_details.pos','tour_quot_guide_details.has_room','tour_quot_guide_details.guide_room_id',
                                                'tour_quot_guide_details.guide_fee','tour_quot_guide_details.guide_com','tour_quot_guide_details.room_rate',
                                                'tour_quot_guide_details.room_com','guide_types.g_type','guide_types.id as gtid','currencies.code as crcode',
                                                    'guide_rooms.id as grmId','tour_quot_guide_details.room_excrate','languages.id as glangid','languages.lang_name')
                                ->orderBy('tour_quot_guide_details.pos', 'ASC')
                                ->get();
                //glangid

            $tourQoutGuide_gp =$tourQoutGuide->groupBy('tour_day');
            //return $tourQoutGuide_gp;
            $tourQuotTransp = DB::table('tour_quot_transports')
                            ->join('vehicle_types','vehicle_types.id','=','tour_quot_transports.vehicle_type_id')
                            ->select('tour_quot_transports.pos','tour_quot_transports.vehicle_type_id','tour_quot_transports.millage',
                                    'tour_quot_transports.rate_pkm','tour_quot_transports.totlkr','tour_quot_transports.trp_ls_Mkp',
                                    'tour_quot_transports.baserate','vehicle_types.type as vtype','vehicle_types.no_of_seats')
                            ->where('tour_quot_transports.tour_id',$tourId)
                            ->orderBy('tour_quot_transports.pos', 'ASC') 
                            ->get();

             $tourQuot_ex_data=DB::table('tour_quote_trp_exps')
                                    ->join('transport_expenses','transport_expenses.id','=','tour_quote_trp_exps.transport_expense_id')
                                    ->select('tour_quote_trp_exps.*','transport_expenses.category')
                                    ->where('tour_quote_trp_exps.tour_id',$tourId)
                                    ->orderBy('tour_quote_trp_exps.pos', 'ASC')
                                    ->get();   
                            
                            // misc_categories.category
                            $tourQuotMisc = DB::table('tour_quot_miscs')
                            // ->join('miscellanies','miscellanies.id','=','tour_quot_miscs.miscellanie_id')
                                                ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')
                                                ->join('currencies','currencies.id','=','misc_categories.currencie_id')
                                                ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                                ->select('tour_quot_miscs.id','tour_quot_miscs.pos','tour_quot_miscs.misc_categorie_id','tour_quot_miscs.ex_rate',
                                                        'tour_quot_miscs.qty','tour_quot_miscs.rate_lkr','tour_quot_miscs.totlkr',
                                                        'tour_quot_miscs.ms_Mkp','tour_quot_miscs.baserate','misc_categories.category','misc_categories.mc_pax',
                                                        'misc_rate_categories.rate_ctgry','misc_rate_categories.id as msicrtctgry','currencies.code')
                                                ->where('tour_quot_miscs.tour_id',$tourId)
                                                ->orderBy('tour_quot_miscs.pos', 'ASC')
                                                ->get();

            $tourQouHotelComSup = DB::table('tour_qout_hotel_com_supliments')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_com_supliments.tour_quotation_hotel_detail_id')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos',
                                            'tour_qout_hotel_com_supliments.spos','tour_qout_hotel_com_supliments.compulsory_supliment_id',
                                            'tour_qout_hotel_com_supliments.rate_type','tour_qout_hotel_com_supliments.exrate','tour_qout_hotel_com_supliments.csup_amount')
                                    ->where('tour_qout_hotel_com_supliments.tour_id',$tourId)
                                    ->orderBy('tour_qout_hotel_com_supliments.spos', 'ASC')
                                    ->get();
            $tourQouHotelComSup_gp =$tourQouHotelComSup->groupBy('tour_day');

            $tourQouHotelOptSup = DB::table('tour_qout_hotel_optm_supliments')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_optm_supliments.tour_quotation_hotel_detail_id')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos',
                                            'tour_qout_hotel_optm_supliments.spos','tour_qout_hotel_optm_supliments.optional_supliment_id',
                                            'tour_qout_hotel_optm_supliments.rate_type','tour_qout_hotel_optm_supliments.opsup_amount')
                                    ->where('tour_qout_hotel_optm_supliments.tour_id',$tourId)
                                    ->orderBy('tour_qout_hotel_optm_supliments.spos', 'ASC')
                                    ->get();
            $tourQouHotelOptSup_gp = $tourQouHotelOptSup->groupBy('tour_day');
            $tour_types=DB::table('tour_quotation_headers')
                        ->join('tour_types','tour_quotation_headers.tour_type','=','tour_types.id')
                        ->select('tour_quotation_headers.tour_type')
                        ->where('tour_quotation_headers.tour_id','=',$tourId)
                        ->first();
                     
            $tour_currency=DB::table('tour_quotation_headers')
                            ->join('currencies','currencies.id','=','tour_quotation_headers.currency_id')
                            ->select('currencies.id')
                            ->where('tour_quotation_headers.tour_id','=',$tourId)
                            ->first();
                            // return $tour_currency;
                            
            $itenery_data = DB::table('itinerays')
                            ->join('tour_quot_locations','itinerays.id','=','tour_quot_locations.itineray_id')
                            ->select('tour_quot_locations.tour_day','tour_quot_locations.tour_date','itinerays.dec')
                            ->where('tour_quot_locations.tour_id',$tourId)
                            ->orderBy('tour_quot_locations.tour_day', 'ASC')
                            ->get();

                          // $base_to_lkr_date=TourQuotationHeader::where('tour_id',$tourId)->select('created_at')->first();
                           
                           $cur_ex_dt_rate=CurrencyExchangeRate::whereDate('created_at','<=',$tourQuotHeader->created_at)
                                                            ->select('amount')
                                                            ->where('currency_A',$tourQuotHeader->currency_id)
                                                            ->where('currency_B',1)
                                                            ->orderBy('id','DESC')
                                                            ->first();
            
            $gp_vehicletype_list = DB::table('group_qt_pax_setups')
                                   ->join('vehicle_types','vehicle_types.id','=','group_qt_pax_setups.vehicle_type_id')
                                   ->select('group_qt_pax_setups.*','vehicle_types.rate_per_km','vehicle_types.no_of_seats')->get();
                            
                                   
            $gp_vehivletypeDataSaved = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tourQuotHeader->id)->get();

           
            $groomsHotelList = DB::table('tour_quotation_hotel_details')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->join('suppliers','suppliers.id','=','tour_quotation_hotel_details.supplier_id')
                                    ->join('hotel_packages','hotel_packages.id','=','tour_quotation_hotel_details.hotel_package_id')
                                    ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                                    ->select('suppliers.id','suppliers.sup_s_name','tour_quotation_hotel_details.pos','tour_quotation_hotel_details.guide',
                                        'currencies.code','tour_quotation_hotel_details.rate_to_base','tour_quotation_hotels.tour_day')
                                    ->where('tour_quotation_hotels.tour_id',$tourId)
                                    // ->where('tour_quotation_hotels.tour_day',$tour_day_id)                                
                                    ->get();


            $gp_guide_dataSaved = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQuotHeader->id)->get();

            if($tourQuotHeader->pax_child>0){
                
                $misc_list = DB::table('misc_categories')
                                ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                ->select('misc_categories.*','misc_rate_categories.rate_ctgry')
                                ->get();
            }else{
              
                $misc_list = DB::table('misc_categories')
                                ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                ->select('misc_categories.*','misc_rate_categories.rate_ctgry')
                                ->whereIn('misc_rate_categorie_id',[1,2])
                                ->get();
            }
            

            $quickQtMode = 0;
            
            if($tourQuotHeader !=''){

                 return view('tour_section.manage.index',compact('tourQuotHeader','cur_ex_dt_rate',
                    'location_gp','LocationDtList_gp','LocationDtList','hotels','roomTypes','periods','mealPlans','tourQuoteHotel_gp','citys',
                    'guide_lang_list','guide_types_list','guide_RoomType','tourQoutGuide_gp','VehicleTypes','tourQuotTransp','misc_list',
                    'Taxs_lisl','tourQuotMisc','tourQouHotelComSup_gp','tourQouHotelOptSup_gp','expences','tourQuot_ex_data','data_status','tour_types','tour_currency',
                    'itenery_data','agents','markets','currencys','tourRoomallocation','gp_vehicletype_list','gp_vehivletypeDataSaved','quickQtMode','gp_guide_dataSaved','groomsHotelList'));

            }else{
                
                return 'Invalid Url!';
            }
            

        }catch(\Exception $ex){

            return 'sda'.$ex;
        }
    }
    public function create_quick(){
          
           try{

            $currency_list = Currency::all();  
            $maket_list = Market::all();
            $branch_list =Branch::all();
            $tourType = TourType::all();
            $agents = Agent::all();

            $amalgamate = 0;
    
            return view('tour_section.quick_quote.create',compact('currency_list','maket_list','branch_list','tourType','agents','amalgamate'));

           }catch(\Exception $e){
                 
                return abort(404);
           }
    }

    public function edit_quick($tourId){
        try
        {
          
         //$tourType = TourType::all();
         $hotels = Supplier::where('type','Hotel')->where('status',1)->select('id','sup_s_name')->get();
         $roomTypes = RoomType::select('id','r_type')->get();
         $mealPlans = MealPlane::select('id','meal_plane')->get();   
         $periods = PackagePeriod::select('id','title')->get();
         $tourStDate = TourQuotationHeader::where('tour_id',$tourId)->value('frm_date');
         $tourEnDate = TourQuotationHeader::where('tour_id',$tourId)->value('to_date');
         $guide_types_list = GuideType::all();
         $guide_lang_list = Language::all();
         $guide_RoomType = GuideRoomType::all();
         $VehicleTypes = VehicleType::all();
        //  $misc_list = miscCategory::all();
         $expences=TransportExpenses::all();         
         $Taxs_lisl = Tax::where('status',1)->select('id','tax_name','rate')->get();

         $market_ID=TourQuotationHeader::where('tour_id',$tourId)->value('market_id');
         $agent_ID=TourQuotationHeader::where('tour_id',$tourId)->value('agent_id');

         $agents = Agent::whereIn('id',[1,$agent_ID])->get();
         $markets = Market::whereIn('id',[1,$market_ID])->get(); 
         $currencys = Currency::all();
         $data_status=TourQuotationHeader::where('tour_id',$tourId)->select('confirmed','status')->first();
                   
        
         $gp_vehicletype_list = DB::table('group_qt_pax_setups')
                                ->join('vehicle_types','vehicle_types.id','=','group_qt_pax_setups.vehicle_type_id')
                                ->select('group_qt_pax_setups.*','vehicle_types.rate_per_km','vehicle_types.no_of_seats')->get();

        
         $tourRoomallocation = TourQuoteRoomAllocation::where('tour_id',$tourId)->first();


         //  return $data_status;
       // return $Taxs_lisl;
           //$page_pos = $this->qtn_page_pos;
            //$this->qtn_page_pos = 14;
            // $data = $request->session()->all();
            // return $data;
            
           // $this->qtn_page_pos = 12;


         $location_list = DB::table('locations')                               
            ->join('districts','districts.id','=','locations.district_id')                              
            ->where('locations.status',1)
            ->select('locations.id','districts.id as dstid','districts.dist_name','locations.location_name','locations.location_code')                                                            
            ->get();


         $location_gp = $location_list->groupBy('dist_name');
         $location_gp->toArray();
         
         $LocationDtList = TourQuotLocation::where('tour_id',$tourId)->get();
        // $DistanceDtList = TourQuotDistance::where('tour_id',$tourId)->get();
        $DistanceDtList = DB::table('tour_quot_locations')
                            ->join('tour_quot_distances','tour_quot_distances.tour_quot_location_id','=','tour_quot_locations.id')
                            ->select('tour_quot_distances.*','tour_quot_locations.tour_day','tour_quot_locations.ttkms')
                            ->orderBy('tour_quot_distances.pos')
                            ->where('tour_quot_locations.tour_id',$tourId)
                            ->get();

         $LocationDtList_gp = $DistanceDtList->groupBy('tour_day');
        //return  $LocationDtList_gp;
         $tourQuotHeader = DB::table('tour_quotation_headers')
                                                ->join('markets','markets.id','=','tour_quotation_headers.market_id')
                                                ->join('agents','agents.id','=','tour_quotation_headers.agent_id')
                                                ->join('branches','branches.id','=','tour_quotation_headers.branch_id')
                                                ->join('tour_types','tour_types.id','=','tour_quotation_headers.tour_type')
                                                ->join('currencies','currencies.id','=','tour_quotation_headers.currency_id')
                                                ->where('tour_id',$tourId)
                                                ->where('confirmed',0)
                                                ->select('tour_quotation_headers.*','markets.market_name','agents.ag_name',
                                                        'branches.branch_code','branches.branch_name','tour_types.tour_type_name',
                                                        'currencies.code as cr_code','currencies.id as cur_id')                                           
                                                ->first();

         $gp_vehivletypeDataSaved = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tourQuotHeader->id)->get();
         
           

         $tourQuoteHotels = DB::table('tour_quotation_hotels')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->join('suppliers','tour_quotation_hotel_details.supplier_id','suppliers.id')
                                    ->join('currencies','tour_quotation_hotel_details.currency_id','=','currencies.id')
                                    ->join('hotel_packages','tour_quotation_hotel_details.hotel_package_id','=','hotel_packages.id')
                                    ->join('room_types','hotel_packages.room_type_id','=','room_types.id')
                                    ->join('meal_planes','hotel_packages.meal_plane_id','=','meal_planes.id')
                                    ->where('tour_quotation_hotels.tour_id',$tourId)
                                    ->select('tour_quotation_hotels.id as qt_hote_id','suppliers.sup_s_name','hotel_packages.from_date','hotel_packages.to_date','meal_planes.meal_plane','room_types.r_type','currencies.code as crcode','tour_quotation_header_id','tour_quotation_hotels.tour_date','tour_quotation_hotels.tour_day',
                                               'tour_quotation_hotel_details.id','tour_quotation_hotel_details.tour_quotation_hotel_id','tour_quotation_hotel_details.tour_id',
                                               'tour_quotation_hotel_details.pos','tour_quotation_hotel_details.supplier_id','tour_quotation_hotel_details.hotel_package_id','tour_quotation_hotel_details.ss_rate',
                                               'tour_quotation_hotel_details.ss_com','tour_quotation_hotel_details.db_rate','tour_quotation_hotel_details.db_com','tour_quotation_hotel_details.trp_rate',
                                               'tour_quotation_hotel_details.trp_com','tour_quotation_hotel_details.trp_com','tour_quotation_hotel_details.trp_com',
                                               'tour_quotation_hotel_details.qtb_rate','tour_quotation_hotel_details.qtb_com','tour_quotation_hotel_details.currency_id',
                                               'tour_quotation_hotel_details.rate_to_base','tour_quotation_hotel_details.sql_splm','tour_quotation_hotel_details.dbl_splm','tour_quotation_hotel_details.guide',
                                               'tour_quotation_hotel_details.tbl_splm','tour_quotation_hotel_details.qd_splm','tour_quotation_hotel_details.status',
                                               'tour_quotation_hotel_details.child_rate','tour_quotation_hotel_details.child_com')
                                    ->get();
                                   

            $tourQuoteHotel_gp = $tourQuoteHotels->groupBy('tour_day');
           // glangid
            $tourQoutGuide = DB::table('tour_quot_guides')
                                ->join('tour_quot_guide_details','tour_quot_guide_details.tour_quot_guide_id','=','tour_quot_guides.id')
                                ->join('guide_types','guide_types.id','=','tour_quot_guide_details.guide_type_id')
                                ->join('languages','languages.id','=','tour_quot_guide_details.language_id')
                                ->leftJoin('guide_rooms','guide_rooms.id','=','tour_quot_guide_details.guide_room_id')                                
                                ->leftJoin('currencies','currencies.id','=','guide_rooms.currency_id')
                                ->where('tour_quot_guides.tour_id',$tourId)   
                                ->select('tour_quot_guides.id','tour_quot_guides.tour_id','tour_quot_guides.tour_day','tour_quot_guides.lkr_rate',
                                            'tour_quot_guide_details.pos','tour_quot_guide_details.has_room','tour_quot_guide_details.guide_room_id',
                                                'tour_quot_guide_details.guide_fee','tour_quot_guide_details.guide_com','tour_quot_guide_details.room_rate',
                                                'tour_quot_guide_details.room_com','guide_types.g_type','guide_types.id as gtid','currencies.code as crcode',
                                                    'guide_rooms.id as grmId','tour_quot_guide_details.room_excrate','languages.id as glangid','languages.lang_name')
                                ->orderBy('tour_quot_guide_details.pos', 'ASC')
                                ->get();
                //glangid

            $tourQoutGuide_gp =$tourQoutGuide->groupBy('tour_day');
            //return $tourQoutGuide_gp;
            $tourQuotTransp = DB::table('tour_quot_transports')
                            ->join('vehicle_types','vehicle_types.id','=','tour_quot_transports.vehicle_type_id')
                            ->select('tour_quot_transports.pos','tour_quot_transports.vehicle_type_id','tour_quot_transports.millage',
                                    'tour_quot_transports.rate_pkm','tour_quot_transports.totlkr','tour_quot_transports.trp_ls_Mkp',
                                    'tour_quot_transports.baserate','vehicle_types.type as vtype','vehicle_types.no_of_seats')
                            ->where('tour_quot_transports.tour_id',$tourId)
                            ->orderBy('tour_quot_transports.pos', 'ASC') 
                            ->get();

             $tourQuot_ex_data=DB::table('tour_quote_trp_exps')
                                    ->join('transport_expenses','transport_expenses.id','=','tour_quote_trp_exps.transport_expense_id')
                                    ->select('tour_quote_trp_exps.*','transport_expenses.category')
                                    ->where('tour_quote_trp_exps.tour_id',$tourId)
                                    ->orderBy('tour_quote_trp_exps.pos', 'ASC')
                                    ->get();
                            
                            // misc_categories.category miscrtid
                            $tourQuotMisc = DB::table('tour_quot_miscs')
                            // ->join('miscellanies','miscellanies.id','=','tour_quot_miscs.miscellanie_id')
                                                ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')
                                                ->join('currencies','currencies.id','=','misc_categories.currencie_id')
                                                ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                                ->select('tour_quot_miscs.id','tour_quot_miscs.pos','tour_quot_miscs.misc_categorie_id','tour_quot_miscs.ex_rate',
                                                        'tour_quot_miscs.qty','tour_quot_miscs.rate_lkr','tour_quot_miscs.totlkr',
                                                        'tour_quot_miscs.ms_Mkp','tour_quot_miscs.baserate','misc_categories.category','misc_categories.mc_pax',
                                                        'misc_rate_categories.rate_ctgry','misc_rate_categories.id as msicrtctgry','currencies.code')
                                                ->where('tour_quot_miscs.tour_id',$tourId)
                                                ->orderBy('tour_quot_miscs.pos', 'ASC')
                                                ->get();

            $tourQouHotelComSup = DB::table('tour_qout_hotel_com_supliments')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_com_supliments.tour_quotation_hotel_detail_id')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos',
                                            'tour_qout_hotel_com_supliments.spos','tour_qout_hotel_com_supliments.compulsory_supliment_id',
                                            'tour_qout_hotel_com_supliments.rate_type','tour_qout_hotel_com_supliments.exrate','tour_qout_hotel_com_supliments.csup_amount')
                                    ->where('tour_qout_hotel_com_supliments.tour_id',$tourId)
                                    ->orderBy('tour_qout_hotel_com_supliments.spos', 'ASC')
                                    ->get();
            $tourQouHotelComSup_gp =$tourQouHotelComSup->groupBy('tour_day');

            $tourQouHotelOptSup = DB::table('tour_qout_hotel_optm_supliments')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_optm_supliments.tour_quotation_hotel_detail_id')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos',
                                            'tour_qout_hotel_optm_supliments.spos','tour_qout_hotel_optm_supliments.optional_supliment_id',
                                            'tour_qout_hotel_optm_supliments.rate_type','tour_qout_hotel_optm_supliments.opsup_amount')
                                    ->where('tour_qout_hotel_optm_supliments.tour_id',$tourId)
                                    ->orderBy('tour_qout_hotel_optm_supliments.spos', 'ASC')
                                    ->get();
            $tourQouHotelOptSup_gp = $tourQouHotelOptSup->groupBy('tour_day');
            $tour_types=DB::table('tour_quotation_headers')
                        ->join('tour_types','tour_quotation_headers.tour_type','=','tour_types.id')
                        ->select('tour_quotation_headers.tour_type')
                        ->where('tour_quotation_headers.tour_id','=',$tourId)
                        ->first();
                     
            $tour_currency=DB::table('tour_quotation_headers')
                            ->join('currencies','currencies.id','=','tour_quotation_headers.currency_id')
                            ->select('currencies.id')
                            ->where('tour_quotation_headers.tour_id','=',$tourId)
                            ->first();
                            // return $tour_currency;
                            
            $itenery_data = DB::table('itinerays')
                            ->join('tour_quot_locations','itinerays.id','=','tour_quot_locations.itineray_id')
                            ->select('tour_quot_locations.tour_day','tour_quot_locations.tour_date','itinerays.dec')
                            ->where('tour_quot_locations.tour_id',$tourId)
                            ->orderBy('tour_quot_locations.tour_day', 'ASC')
                            ->get();

                           $base_to_lkr_date=TourQuotationHeader::where('tour_id',$tourId)->select('created_at')->first();
                           
                           $cur_ex_dt_rate=CurrencyExchangeRate::whereDate('created_at','<=',$base_to_lkr_date->created_at)
                                                            ->select('amount')
                                                            ->orderBy('id','DESC')
                                                            ->first();

        $gp_guide_dataSaved = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQuotHeader->id)->get();
                                      
        $groomsHotelList = DB::table('tour_quotation_hotel_details')
                                ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                ->join('suppliers','suppliers.id','=','tour_quotation_hotel_details.supplier_id')
                                ->join('hotel_packages','hotel_packages.id','=','tour_quotation_hotel_details.hotel_package_id')
                                ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                                ->select('suppliers.id','suppliers.sup_s_name','tour_quotation_hotel_details.pos','tour_quotation_hotel_details.guide',
                                    'currencies.code','tour_quotation_hotel_details.rate_to_base','tour_quotation_hotels.tour_day')
                                ->where('tour_quotation_hotels.tour_id',$tourId)
                                // ->where('tour_quotation_hotels.tour_day',$tour_day_id)                                
                                ->get();


                                if($tourQuotHeader->pax_child>0){
                                    $misc_list = DB::table('misc_categories')
                                                    ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                                    ->select('misc_categories.*','misc_rate_categories.rate_ctgry')
                                                    ->get();
                                }else{
                                  
                                    $misc_list = DB::table('misc_categories')
                                                    ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                                    ->select('misc_categories.*','misc_rate_categories.rate_ctgry','misc_rate_categories.id as miscrtid')
                                                    ->whereIn('misc_rate_categorie_id',[1,2])
                                                    ->get();
                                }


                        //    return $cur_ex_dt_rate;
            $quickQtMode = 1;
           // return $itenery_data;
           // return $tourQouHotelOptSup_gp;
            if($tourQuotHeader !=''){

                 return view('tour_section.quick_quote.index',compact('tourQuotHeader','cur_ex_dt_rate',
                    'location_gp','LocationDtList_gp','LocationDtList','hotels','roomTypes','periods','mealPlans','tourQuoteHotel_gp',
                    'guide_lang_list','guide_types_list','guide_RoomType','tourQoutGuide_gp','VehicleTypes','tourQuotTransp','misc_list',
                    'Taxs_lisl','tourQuotMisc','tourQouHotelComSup_gp','tourQouHotelOptSup_gp','expences','tourQuot_ex_data','data_status','tour_types','tour_currency',
                    'itenery_data','agents','markets','currencys','tourRoomallocation','gp_vehicletype_list','gp_vehivletypeDataSaved','quickQtMode','gp_guide_dataSaved','groomsHotelList'));

            }else{
                
                return 'Invalid Url!';
            }
            

        }catch(\Exception $ex){

               // return 'sawdd'.$ex;
            return abort(404);
        }
    }

    public function quotation_get_gp_vehicle_data(Request $req){
        
        if($req->ajax()){

            $vtype_id = $req->vtype_id;
            
            $rate=0;
            $rate = VehicleType::where('id',$vtype_id)->value('rate_per_km');
            if($rate!=''){
                return json_encode($rate);
            }else{
                return json_encode(0.00);
            }
            
        }
    }


    public function get_gp_guide_fee(Request $req){
        if($req->ajax()){
            try{

                $lang_id = $req->lng_id;

                $nationa_guide_fee = 0;
                $chf_guide_fee = 0;

                $nationa_guide_fee_dat = GuideLanuageRate::where('guide_type_id',1)
                                                ->where('language_id',$lang_id) 
                                                ->select('rate')
                                                ->first();

                // return json_encode($lang_id);  

                if($nationa_guide_fee_dat!=''){
                    $nationa_guide_fee = $nationa_guide_fee_dat->rate;
                }
                

                $chf_guide_fee_dat =  GuideLanuageRate::where('guide_type_id',2)
                                                ->where('language_id',$lang_id)   
                                                ->select('rate')                                            
                                                ->first();
                if($chf_guide_fee_dat!=''){
                    $chf_guide_fee = $chf_guide_fee_dat->rate;
                }
                // if(isNan(($nationa_guide_fee) || $nationa_guide_fee==0)){

                //     $nationa_guide_fee = 0;
                // }

                // if(isNan(($chf_guide_fee) || $chf_guide_fee==0)){

                //     $chf_guide_fee = 0;
                // }

                $data=array(
                    'nat_guide_rate'=>$nationa_guide_fee,
                    'chf_guide_rate'=>$chf_guide_fee
                );

                return json_encode($data);

            }catch(Exception $ex){

                return json_encode('* Something wrong!'.$ex);
            }

        }
    }


    public function gp_guide_data_save(Request $req){

        if($req->ajax()){

            $gp_nat_guide_data = json_decode($req->gudide_gp_data);

            if(count((array)$gp_nat_guide_data)!=0){
                try{


                
                DB::beginTransaction();

                $tourQtHeadId = $req->qoutheaderId; 

                $tourQtgp_guideData = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeadId)->first();

                    if($tourQtgp_guideData!=''){

                        $tourQtgp_guideData = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQtHeadId)->delete();
                    }

                    foreach($gp_nat_guide_data as $gp_nat_guide_data_lst){

                        $sup_id_id = 0;

                        $sup_id = DB::table('tour_quotation_hotel_details')
                                        ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')                                        
                                        ->select('tour_quotation_hotel_details.supplier_id')
                                        ->where('tour_quotation_hotels.tour_quotation_header_id',$tourQtHeadId)
                                        ->where('tour_quotation_hotels.tour_day',$gp_nat_guide_data_lst->dayI)
                                        ->where('tour_quotation_hotel_details.pos',$gp_nat_guide_data_lst->ht_pos)
                                        ->first();
                                        
                        if($sup_id!=''){
                            $sup_id_id = $sup_id->supplier_id;
                        }
                        
                        $new_gp_guide_deatails = new TourQuoteGpGuidesDetails();

                        $new_gp_guide_deatails->tour_quotation_header_id = $tourQtHeadId;
                        $new_gp_guide_deatails->tour_day = $gp_nat_guide_data_lst->dayI;
                        $new_gp_guide_deatails->gf_ad = $gp_nat_guide_data_lst->gf_ad;
                        
                        $new_gp_guide_deatails->language_id = $req->guide_lan;
                        $new_gp_guide_deatails->supplier_id = $sup_id_id;
                        $new_gp_guide_deatails->pos = $gp_nat_guide_data_lst->ht_pos;
                        $new_gp_guide_deatails->na_guide_rate = $req->na_guide_fee;
                        $new_gp_guide_deatails->na_guide_mkp = $req->na_guide_mkp;
                        $new_gp_guide_deatails->ch_guide_rate = $req->chf_guide_fee;
                        $new_gp_guide_deatails->ch_guide_mkp = $req->chf_guide_mkp;
                        $new_gp_guide_deatails->accmd_mkp = $gp_nat_guide_data_lst->accmd_mkp;
                        $new_gp_guide_deatails->bsratelkr = $req->gp_guide_lkr_to_baserate;
                        
                        $new_gp_guide_deatails->save();
                        


                    }
                    
                    DB::commit();

                    return json_encode('saved');

                }catch(Exception $ex){

                    DB::rollBack();
                    return json_encode('* Some field cannot be empty!, Please check before save'.$ex);
            
                }
            }

        }

    }
       

    public function save_gp_vehicleTypes(Request $req){
       
        if($req->ajax()){
                
            try{

                $gp_vtData = json_decode($req->gpvtypeData);
                $tourQtHeadId = $req->touqthdid_gp;

               if(count((array)$gp_vtData)!=0){
                
                DB::beginTransaction();

                $tourQtVehicleType = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tourQtHeadId)->first();

                if($tourQtVehicleType!=''){

                    $tourQtVehicleType = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tourQtHeadId)->delete();
                }


                foreach($gp_vtData as $gp_vtDatas){
                    
                    $newgpvtype = new tourQouteGpVehicleTypes();
                    
                    $newgpvtype->tour_quotation_header_id = $tourQtHeadId;
                    $newgpvtype->group_qt_pax_setup_id = $gp_vtDatas->gppaxstpid;
                    $newgpvtype->vehicle_type_id = $gp_vtDatas->gp_vtype_id;                    
                    $newgpvtype->rate_per_km = $gp_vtDatas->gp_vtye_rate;
                    $newgpvtype->extr_vehicle_type_id = $gp_vtDatas->gpextr_vtype_id;
                    $newgpvtype->extr_rate_per_km = $gp_vtDatas->gpextr_vtye_rate;
                    $newgpvtype->extr_vht_millage = $gp_vtDatas->millage_extr_vh;
                    
                    $newgpvtype->main_vt_mk_pc = $req->main_vmkprate;
                    $newgpvtype->extr_vt_mk_pc = $req->extr_vmkprate;
                    $newgpvtype->exrchg_rate = $req->exchar_rate;
                    $newgpvtype->pp_rate = 0.00;
                    $newgpvtype->guide_type = $gp_vtDatas->gpguide_type;
                    $newgpvtype->guide_accmd = $gp_vtDatas->gpguide_accmd;
                    $newgpvtype->accmd_foc = $gp_vtDatas->gpfoc_accmd;
                    
                    $newgpvtype->save();
                    
                }

                DB::commit();
                return json_encode('saved');

               }

              


            }catch(Exception $ex){
                DB::rollBack();
                return json_encode('* Some field cannot be empty!, Please check before save'.$ex);
            }

           

            
        }
    }

    public function route_itinerary_search(Request $req){

        if($req->ajax()){
            
            try
            {
                
            $actiom_td = '';
            $d1 ='';
            $td ='';
            $dnew ='';
            $output='';
            $row_pos =0;
            $sp_pos =0;
            $itn_id=0;
            $queryd = $req->querys;
            
            //return json_encode($req->querys);

            if($queryd!=''){
                
                $data = DB::table('itinerays')
                 ->join('itineray__locations','itinerays.id','=','itineray__locations.itineray_id')
                 ->join('locations','locations.id','=','itineray__locations.l_id')
                 ->select('itinerays.id','itineray__locations.itineray_id','itinerays.route_code','itinerays.startin_tag','itinerays.route_name','itineray__locations.l_id','locations.id as loc_id','locations.location_code')
                 ->where('itinerays.route_code','LIKE','%'.$queryd.'%')
                 ->orWhere('itinerays.route_name','LIKE','%'.$queryd.'%')
                 ->orWhere('itinerays.startin_tag','LIKE','%'.$queryd.'%')
                 ->orderBy('itineray__locations.id')
                 ->get();
           
                   $itinerays_data=$data->groupBy('id');
                

                $total_row = $itinerays_data->count();
                 
              
                    
            }else
            {
             
                $data = DB::table('itinerays')
                ->join('itineray__locations','itinerays.id','=','itineray__locations.itineray_id')
                ->join('locations','locations.id','=','itineray__locations.l_id')
                ->select('itinerays.id','itineray__locations.itineray_id','itinerays.route_code','itinerays.startin_tag','itinerays.route_name','itineray__locations.l_id','locations.id as loc_id','locations.location_code')                
                ->orderBy('itineray__locations.id')
                ->get();
          
                  $itinerays_data=$data->groupBy('id');
               

               $total_row = $itinerays_data->count();

            }

            if($total_row > 0){
               
                $output='';

                foreach($itinerays_data as $itnery =>$it_data){
                    $pos=$itnery;
                    // $po2=0;
                    $itn_id=0;
                   // $row_pos=0;

                    foreach($it_data as $i_data){
                        
                        
                         if (($itnery == $i_data->itineray_id)){
                            
                            // $po2++;
                            if($pos == $i_data->itineray_id){
                               
                                $actiom_td = '';
                                $td ='';
                                $d1 ='';
                                $row_pos++;
                                $sp_pos =0;
                                $itn_id=$i_data->id;
                                $d1.='<td style="text-align: center">'.$i_data->id.'</td>
                                <td>'.$i_data->route_code.'</td>';
                                $actiom_td='<button type="button" onclick="addtoroute('.$i_data->id.')" class="btn btn-success btn-sm center-text" data-dismiss="modal">Add</button>';
                                $dnew ='<td>'.$i_data->startin_tag.'</td><td>'.$i_data->route_name.'</td>';     
                            }
                            
                            // foreach($it_data as $loc){
            
                            //     if($i_data->itineray_id ==$loc->itineray_id){
                            //         $sp_pos++;
                            //     $td.='<span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded">'.$loc->location_code.'</span>
                            //         <input id="route_lc_sp_'.$itn_id.'_'.$sp_pos.'" type="hidden" value="'.$loc->loc_id.'">';

                            //     }
            
                            // }                           

                         }
                                
                    }

                    $output.='<tr id="route_row_'.$itn_id.'">
                    '.$d1.''.$dnew.'                                   
                    <td style="text-align: center;">
                    '.$actiom_td.'
                    </td>                  
                    </tr>';

                }
                        
               
                
         }
         else{

             $output='<tr>
             <td align="center" colspan="5">No records found</td>
             </tr>';

             }

             $data=array(
                'table_data'=>$output               
            );
        
            
            return json_encode($data);
                   
        }catch(Exception $ex){
            return json_encode('* Error! Something Wrong!'.$ex);
        }
            // return json_encode('Hellows...');
     }
        
    }

    public function select_itinerary(Request $req){
        
        if($req->ajax()){ 
           // return json_encode('sadwasad');
            try
            {
            $itn_id = $req->intid;
            $day_id = $req->day_id;
            $output='';
           
            $locationList = DB::table('itineray__locations')
                            ->join('itinerays','itinerays.id','=','itineray__locations.itineray_id')
                            ->select('itineray__locations.id','itineray__locations.l_id')
                            ->orderBy('itineray__locations.id','ASC')
                            ->where('itinerays.id',$itn_id)
                            ->get();

            $rowCount = $locationList->count();
            $row_pos  = 0;
            $last_lcid =0;
            $llbID = 0;
            $total_km =0;
            
            $lst_row_pos=0;

            foreach($locationList as $location){
                
                if($row_pos==0){
                    $location_dt = Location::where('id',$location->l_id)
                    ->where('status',1) 
                    ->select('id','location_name','location_code')
                    ->first();
                    $lcid=0; $lc_name=''; $lc_code ='';
                        
                    $lcid = $location_dt->id;
                    $lc_name = $location_dt->location_name;
                    $lc_code = $location_dt->location_code;
                    
                    $last_lcid =$lcid;
                    $llbID=0;

                $output.='<span id="sp1_'.$day_id.'" title="'.$lc_name.'" class="m-badge m-badge--secondary m-badge--wide m-badge--rounded">
                <input id="hdLC_id1_'.$day_id.'" value="0" type="hidden" name="'.$lcid.'">'.$lc_code.'
                </span> <i id="i1_'.$day_id.'" name="'.$lc_code.'">&nbsp</i>';
                
            }else{

                //$findLCID = $request->lc_id_last;
                                
                $location_dt_lst = Location::where('id',$last_lcid)
                                ->where('status',1) 
                                ->select('ss')
                                ->first();

                // if(($lst_row_pos+1)){
                    
                // }

                if($location_dt_lst->ss == 0){                                     

                    // $findLCID = $last_lcid;
                    
                }else{
                    
                    if($llbID !=0){
                        $last_lcid = $llbID;
                    }
                    
                }

                
                                
                $location_dt = Location::where('id',$location->l_id)
                                        ->where('status',1) 
                                        ->select('id','location_name','location_code')
                                        ->first();

                 $distance_details = Distance::where('frm',$last_lcid)
                                              ->where('to',$location->l_id)
                                              ->select('id','distance','frm','to')
                                              ->first();
               
                if($distance_details == ''){

                    $distance_details = Distance::where('to',$last_lcid)
                                                ->where('frm',$location->l_id)
                                                ->select('id','distance','frm','to')
                                                ->first();
                }
                
                $llbID = $last_lcid;
                $last_lcid = $location_dt->id;

                $disId=0; $frm=0; $to=0; $km=0; 
                
               
                    $disId =  $distance_details->id;
                    $frm = $distance_details->frm;
                    $to = $distance_details->to;
                    $km = $distance_details->distance;
                    
                

                $lcid=0; $lc_name=''; $lc_code ='';
                
                
                    $lcid=$location_dt->id;
                    $lc_name=$location_dt->location_name;
                    $lc_code=$location_dt->location_code;
                    
                    $total_km= $total_km+$km;

                $output.='<span id="sp'.($row_pos+1).'_'.$day_id.'" title="'.$lc_name.'" class="m-badge m-badge--secondary m-badge--wide m-badge--rounded">
                <input id="hdLC_id'.($row_pos+1).'_'.$day_id.'" value="'.$km.'" type="hidden" name="'.$lcid.'">'.$lc_code.'
                </span> <i id="i'.($row_pos+1).'_'.$day_id.'" name="'.$lc_code.'">&nbsp</i>';



                }

                $row_pos++;
            }

            //return json_encode('sadwdasa');

            $data = array(
                'row_data' => $output,                
                'tot_kms' => $total_km                     
            );
            
            return json_encode($data);
            
        }catch(Exception $ex){
           // return json_encode('asdawas'.$ex);
        }
          //  return 'sdasdd';
        }

    }

    public function checkdistance(Request $request)
    {   
    
        if($request->ajax()){ 
           

           try
           {

            if($request->lc_id_last == 0){
                   
                    $location_dt = Location::where('id',$request->lc_id_next)
                                                ->where('status',1) 
                                                ->select('id','location_name','location_code')
                                                ->first();


                  $lcid=0; $lc_name=''; $lc_code ='';
                                
                    $lcid = $location_dt->id;
                    $lc_name = $location_dt->location_name;
                    $lc_code = $location_dt->location_code;
              
                $data = array(
                    'id' => $lcid,
                    'location_name' => $lc_name,
                    'location_code' => $lc_code                     
                );

             
            }else{
                
                $total_km =0;

                //llBid
                $findLCID = $request->lc_id_last;
                                
                $location_dt_lst = Location::where('id',$request->lc_id_last)
                                ->where('status',1) 
                                ->select('ss')
                                ->first();


                if($location_dt_lst->ss == 0){                                     

                    $findLCID =$request->lc_id_last;

                }else{
                    
                    if($request->llBid !=0){
                        $findLCID = $request->llBid;
                    }else{
                        $findLCID = $request->lc_id_last;
                    }
                    
                }


                $location_dt = Location::where('id',$request->lc_id_next)
                                        ->where('status',1) 
                                        ->select('id','location_name','location_code')
                                        ->first();

               
                 $distance_details = Distance::where('frm',$findLCID)
                                              ->where('to',$request->lc_id_next)
                                              ->select('id','distance','frm','to')
                                              ->first();

               

                if($distance_details == ''){

                    $distance_details = Distance::where('to',$findLCID)
                                                ->where('frm',$request->lc_id_next)
                                                ->select('id','distance','frm','to')
                                                ->first();
                }

                //return json_encode('ssa'.$distance_details);

                $disId=0; $frm=0; $to=0; $km=0; 
                
                    
                    // $disId =  $distance_details->id;
                    $frm = $distance_details->frm;
                    $to = $distance_details->to;
                    $km = $distance_details->distance;
                    
                

                $lcid=0; $lc_name=''; $lc_code ='';
                
                   
                    $lcid=$location_dt->id;
                    $lc_name=$location_dt->location_name;
                    $lc_code=$location_dt->location_code;
                    
                               

                    $data = array(

                        'id' => $lcid,
                        'location_name' => $lc_name,
                        'location_code' => $lc_code, 
                        'distance' => $km,
                        'frm' => $frm,
                        'to' => $to
                        
                    );

                 
            }   
            return json_encode($data);
           
          //  return 'sdasdd';
        }catch(Exception $ex)
        {
           // return json_encode('error :'.$ex);
        }

     }   
    }

    public function find_miscMisdata(Request $req){
        
        if($req->ajax()){
           
            $db_dta=[];

            try{

                $misc_ID = $req->miscID;
               
                $misc_data = DB::table('misc_categories')
                                ->join('currencies','currencies.id','=','misc_categories.currencie_id')
                                ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                ->select('misc_categories.Rate','misc_categories.mc_pax','currencies.code','currencies.id as cu_id','misc_categories.id as misc_tr_ctrgy')
                                ->where('misc_categories.id',$misc_ID)
                                ->first();
             
                               
            
                                $data_misdata_am=0;

                                $data_mis = DB::table('currency_exchange_rates')
                                                ->select('currency_exchange_rates.amount')
                                                ->where('currency_exchange_rates.currency_A',$req->cur_a)
                                                ->where('currency_exchange_rates.currency_B',$misc_data->cu_id)                         
                                                ->first();
                                            
                                            
                                     if($data_mis!=''){

                                        $data_misdata_am = $data_mis->amount;

                                     }else{

                                        $data_misdata_am=1;
                                     }      
                         //return json_encode('asdadsawda');
                    if($misc_data!=''){
                        $db_dta= array(
                        
                            'code' => $misc_data->code,
                            'rate' => $misc_data->Rate,
                            'mc_pax' => $misc_data->mc_pax,
                            'cu_id' => $misc_data->cu_id,
                            'misc_rt_ctgry' =>  $misc_data->misc_tr_ctrgy,   
                            'data_mis' => $data_misdata_am
    
    
    
                          );  
                    }else{
                        $db_dta= array(
                        
                            'code' => '',
                            'rate' => 0.00,
                            'mc_pax' => 0,
                            'cu_id' => 0,
                            'misc_rt_ctgry' => 0, 
                            'data_mis' =>0    
                          );  
                    }
                     
                                          
            return json_encode($db_dta);

            }catch(Exception $ex){
                return json_encode('* Error! Something Wrong!'.$ex);
            }


            //return json_encode('asdwadswd');
        }
    }

    public function find_guidefee(Request $req){
        
        if($req->ajax()){
            try{

            $lang_rate='';
            $lang_rate = GuideLanuageRate::where('guide_type_id',$req->GuideTypeId)
                                         ->where('language_id',$req->langId)
                                         ->first();
            
            $tour_id = $req->tour_id;
            $hotel_pos = $req->hotel_pos;
            $dayId = $req->dayId;
                                       
            
            if(($req->hotel_pos !=0)){
                $guide_room = DB::table('tour_quotation_hotel_details')
                                ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                ->join('suppliers','suppliers.id','=','tour_quotation_hotel_details.supplier_id')
                                ->join('hotel_packages','hotel_packages.id','=','tour_quotation_hotel_details.hotel_package_id')
                                ->join('currencies','currencies.id','=','hotel_packages.currency_id')                                
                                ->select('suppliers.id','suppliers.sup_s_name','tour_quotation_hotel_details.pos',
                                        'currencies.code','tour_quotation_hotel_details.guide','tour_quotation_hotel_details.supplier_id','hotel_packages.currency_id',
                                        'tour_quotation_hotel_details.rate_to_base')
                                ->where('tour_quotation_hotels.tour_id',$tour_id)
                                ->where('tour_quotation_hotels.tour_day',$dayId)
                                ->where('tour_quotation_hotel_details.pos',$hotel_pos)
                                ->first();
            }

            if(($req->hotel_pos !=0) && $guide_room !=''){
                
                //return json_encode('asdwdaw');

               

                
                // $guide_room = DB::table('guide_rooms')
                //                 ->join('currencies','currencies.id','=','guide_rooms.currency_id')
                //                 ->where('guide_rooms.supplier_id',$req->hotelID)
                //                 ->where('guide_rooms.guide_room_type_id',$req->guideRoomtypeID)
                //                 ->select('guide_rooms.id','guide_rooms.supplier_id','guide_rooms.amount','currencies.id as crid','currencies.code as crcode')
                //                 ->first();
                               
                                $data = array(
                                    'guide_lang_Rate' => $lang_rate->rate,
                                    'guide_room_id' => $guide_room->pos,
                                    'guide_room_supId' => $guide_room->supplier_id,
                                    'guide_room_crId' => $guide_room->currency_id,
                                    'guide_room_crcode' => $guide_room->code,
                                    'guide_room_amount' => $guide_room->guide,
                                    'guide_room_exrate' => $guide_room->rate_to_base
                                );
            }else{
                
                $data = array(
                    'guide_lang_Rate' => 0.00,
                    'guide_room_id' => 0.00,
                    'guide_room_supId' => 0.00,
                    'guide_room_crId' => 0.00,
                    'guide_room_crcode' => 'None',
                    'guide_room_amount' => 0.00,
                    'guide_room_exrate' => 0.00
                );
            }
            
            

            if($lang_rate !=''){
                
                return json_encode($data);

            }else{

                return json_encode('none');
            }

        }catch (\Exception $ex){
            return json_encode('* Error! Something Wrong!'.$ex);
        
        }

        }
    }

    public function update_misc(Request $req)
    {
        if($req->ajax()){

            $miscPPRate = $req->ms_pprate;
            $LkrtoBaserate =$req->baserate;
            $tourID = $req->tourID;
            $qoutHeaderID =$req->qoutheaderId;
            //return json_encode('hsjdkjasd');
            $miscData = json_decode($req->ms_dataStore);
            $rowCount = count((array)$miscData);


            

            try{

                
                DB::beginTransaction();
                
               
                $checkAVBLc_details = TourQuotMisc::where('tour_id', $tourID)->select('id')->first();
    
                
                if ($checkAVBLc_details != '') {
                    // /Vehicle::find($VehicleID)->delete();
                    TourQuotMisc::where('tour_id', $tourID)->delete();
                   
                }
               
                if($rowCount!=0){
    
                    foreach($miscData as $msdata){
    
                        $tourQuteMisc = new TourQuotMisc();
                        
                        $tourQuteMisc->tour_quotation_header_id =$qoutHeaderID;
                        $tourQuteMisc->tour_id = $tourID;
                        $tourQuteMisc->pos = $msdata->pos;
                        $tourQuteMisc->misc_categorie_id = $msdata->msid;
                        $tourQuteMisc->qty = $msdata->msqty;
                        $tourQuteMisc->rate_lkr = $msdata->msrate;
                        $tourQuteMisc->totlkr = $msdata->mstotlkr;
                        $tourQuteMisc->ms_Mkp = $msdata->msmk;
                        $tourQuteMisc->baserate = $LkrtoBaserate;
                        $tourQuteMisc->ex_rate = $msdata->mis_ex_rt;
                        $tourQuteMisc->save();
    
                    }
                }
                
                $tourQuteheader = TourQuotationHeader::find($qoutHeaderID);
                $tourQuteheader->pp_misc_price =$miscPPRate;
                $tourQuteheader->status = 2;
                $tourQuteheader->save();
    
                DB::commit();
                
            return json_encode('saved');
    
            }catch(Exception $ex){
    
                DB::rollBack();
                return json_encode("* Some field cannot be empty!, Please check before save");
            }

            
        }
    }

    public function update_trasport(Request $req){
    
        if($req->ajax()){

            $trpPPRate = $req->trp_pprate;
            $LkrtoBaserate =$req->baserate;
            $tourID = $req->tourID;
            $qoutHeaderID = $req->qoutheaderId;
            //return json_encode('hsjdkjasd');
            $trpData = json_decode($req->trsp_data);
            $tr_exp_data=json_decode($req->exp_data);
            $rowCount = count((array)$trpData);
            $exp_row=count((array)$tr_exp_data);
           
            try{

            
            DB::beginTransaction();
            
           
            $checkAVBLc_details = TourQuotTransport::where('tour_id', $tourID)->select('id')->first();

            
            if ($checkAVBLc_details != '') {
                // /Vehicle::find($VehicleID)->delete();
                TourQuotTransport::where('tour_id', $tourID)->delete();
                TourQuoteTrpExp::where('tour_id', $tourID)->delete();
            }
            if($exp_row!=0){

              
                foreach($tr_exp_data as $exp_data){
                  
                    $tr_data = new TourQuoteTrpExp();
                    $tr_data->tour_quotation_header_id = $req->qoutheaderId;
                    $tr_data->tour_id=$tourID;
                    $tr_data->pos=$exp_data->pos_i;
                    $tr_data->transport_expense_id=$exp_data->exp_typeId;
                    $tr_data->exp_rate=$exp_data->exp_rate;
                    $tr_data->exp_qty=$exp_data->expences_qty;
                    $tr_data->exp_total=$exp_data->exp_total;
                    $tr_data->exp_markup=$exp_data->totalMk_exp;
                    $tr_data->save();
                 
                }

            }
            
            if($rowCount!=0){

                foreach($trpData as $trp_vhdata){

                    $tourQuteTrp = new TourQuotTransport();
                    
                    $tourQuteTrp->tour_quotation_header_id =$req->qoutheaderId;
                    $tourQuteTrp->tour_id = $tourID;
                    $tourQuteTrp->pos = $trp_vhdata->pos;
                    $tourQuteTrp->vehicle_type_id = $trp_vhdata->vtype;
                    $tourQuteTrp->millage = $trp_vhdata->millage;
                    $tourQuteTrp->rate_pkm = $trp_vhdata->rate_pkm;
                    $tourQuteTrp->totlkr = $trp_vhdata->totlkr;
                    $tourQuteTrp->trp_ls_Mkp = $trp_vhdata->mkp;
                    $tourQuteTrp->baserate = $LkrtoBaserate;
                    $tourQuteTrp->save();

                }
            }

            $tourQuteheader = TourQuotationHeader::find($qoutHeaderID);
            $tourQuteheader->trp_pp_price =$trpPPRate; 
            $tourQuteheader->status = 2;
            $tourQuteheader->save();

            DB::commit();

             return json_encode('saved');

        }catch(Exception $ex){

            DB::rollBack();
            return json_encode("* Some field cannot be empty!, Please check before save".$ex);
        }

        }


    }

public function update_guides(Request $req)
{
    if($req->ajax()){
    
    

    
        $guideData = json_decode($req->guidedata);
        $guideDataDetails = json_decode($req->guideDataDetails);

        $tot_guide_fee = $req->totalGuidefee;
        $LkrtoBaserate =$req->baserate;
        $totaGuideAcmd =$req->totalGuideAcmd;
        $tourID = $req->tourID;
        $tourStDate = $req->tourStDate;
        $qoutHeaderID =$req->qoutheaderId;
        
        
    try {


       
        $rowCount = count((array)$guideData);

        //return json_encode($rowCount);

        DB::beginTransaction();
        $checkAVBLc_details = TourQuotGuide::where('tour_id', $tourID)->select('id')->first();

                if ($checkAVBLc_details != '') {
                    // /Vehicle::find($VehicleID)->delete();
                    TourQuotGuide::where('tour_id', $tourID)->delete();
                    TourQuotGuideDetails::where('tour_id', $tourID)->delete();
                }
                
                $dayCount = 1;
                

                if ($rowCount != 0) {

                    foreach ($guideData as $bkdays) {

                        $date = date('Y-m-d', strtotime($tourStDate . ' + ' . ($dayCount - 1) . ' days'));

                        $tourQoutGuide = new TourQuotGuide();
                        $tourQoutGuide->tour_quotation_header_id = $qoutHeaderID;
                        $tourQoutGuide->tour_id = $tourID;
                        $tourQoutGuide->tour_date = $date;
                        $tourQoutGuide->tour_day = $dayCount;
                        $tourQoutGuide->lkr_rate = $LkrtoBaserate;                        
                        $tourQoutGuide->save();

                        $touguideLastID = TourQuotGuide::select('id')->orderBy('id', 'DESC')->first();
                        //return json_encode($LcLastID);

                        foreach ($guideDataDetails as $pakgs) {

                            if ($bkdays->tourDay == $pakgs->days) {

                                //return json_encode($pakgs);

                                
                                $tourQoutGuideDetails = new TourQuotGuideDetails();
                               
                                $tourQoutGuideDetails->tour_quot_guide_id = $touguideLastID->id;
                                $tourQoutGuideDetails->tour_id = $tourID;
                                $tourQoutGuideDetails->pos = $pakgs->pos;
                                $tourQoutGuideDetails->guide_type_id = $pakgs->gtype;
                                $tourQoutGuideDetails->language_id = $pakgs->glang;
                                $tourQoutGuideDetails->has_room = $pakgs->grmhas;
                                $tourQoutGuideDetails->guide_room_id = $pakgs->groomid;
                                $tourQoutGuideDetails->guide_fee = $pakgs->gfee;
                                $tourQoutGuideDetails->guide_com = $pakgs->gmk;
                                $tourQoutGuideDetails->room_rate = $pakgs->groomrate;
                                $tourQoutGuideDetails->room_excrate = $pakgs->groomexrate;
                                $tourQoutGuideDetails->room_com = $pakgs->groommk;
                               
                                //$tourQoutGuideDetails->status = 1;
                                $tourQoutGuideDetails->save();


                            }

                        }

                        $dayCount++;
                    }


                   

                }
                
                $tourQuteheader = TourQuotationHeader::find($qoutHeaderID);
                $tourQuteheader->tot_guide_price =$req->totalGuidefee;
                $tourQuteheader->tot_guide_acmd =$req->totalGuideAcmd;
                $tourQuteheader->status = 2;
                $tourQuteheader->save();

             DB::commit();

             return json_encode('saved');
            
      
            }catch (\Exception $ex){

               DB::rollBack();
                return json_encode("* Some field cannot be empty!, Please check before save");

            }
    }

}


    public function updatelocation(Request $req)
    {

    if($req->ajax()){
            
            

        try{

        
        $distDetails = json_decode($req->dist_details);
        $distUpdatedKms = json_decode($req->dist_updatedkms);
        $totalKms = $req->totalkm;
        $tourID = $req->tourID;
        $tourStDate = $req->tourStDate;
        $qoutHeaderID =$req->qoutheaderId;
        $totalMilage=$req->totalkm;
        DB::beginTransaction();

        $rowCount = count((array)$distUpdatedKms);
         //return json_encode($cnt);
        $checkAVBLc_details = TourQuotLocation::where('tour_id',$tourID)->select('id')->first();

        if($checkAVBLc_details != ''){
            // /Vehicle::find($VehicleID)->delete();
            TourQuotLocation::where('tour_id',$tourID)->delete();
            TourQuotDistance::where('tour_id',$tourID)->delete();

        }

        $dayCount = 1;
       //$totalMilage =0;
        if($rowCount !=0){ 
                    
                    foreach($distUpdatedKms as $itm)
                    {   
                        $date = date('Y-m-d', strtotime($tourStDate. ' + '.($dayCount-1).' days'));
                        //return json_encode($distUpdatedKms);
                        $qoutLocation = new TourQuotLocation;
                        //route_id_added
                        $qoutLocation->tour_quotation_header_id = $qoutHeaderID;
                        $qoutLocation->tour_id = $tourID;
                        $qoutLocation->tour_date = $date;
                        $qoutLocation->tour_day = $dayCount;
                        $qoutLocation->ttkms = $itm->ttkms;
                        $qoutLocation->itineray_id = $itm->route_id_added;
                            
                        $qoutLocation->save();
                        //$totalMilage +=$itm->ttkms;
                        
                        $LcLastID = TourQuotLocation::select('id')->orderBy('id','DESC')->first();

                    
                    
                        foreach($distDetails as $distanceSp){

                            if($distanceSp->day_b == $itm->day_a){
                                
                            $QutDistance = new TourQuotDistance;

                                    $QutDistance->tour_quot_location_id = $LcLastID->id;
                                    $QutDistance->tour_id = $tourID;
                                    $QutDistance->pos = $distanceSp->pos;
                                    $QutDistance->location_id = $distanceSp->location_id;                        
                                    $QutDistance->lc_name = $distanceSp->lc_name;
                                    $QutDistance->lc_code = $distanceSp->lc_code;
                                    $QutDistance->kms = $distanceSp->kms;
                                    $QutDistance->save();                     
                            }
                        }
                    

                        $dayCount++;
                    }
         }
             
         $tourQuteheader = TourQuotationHeader::find($qoutHeaderID);
         $tourQuteheader->millage = $totalMilage; 
         $tourQuteheader->status = 2;
         $tourQuteheader->save();
    
        DB::commit();
        //event( new TourQuoteEvent());
        return json_encode('saved');

        }catch(\Exception $ex){

            DB::rollBack();

            return json_encode("* Something Wrong!".$ex); 
            //return $ex;
        }     

    }        
       
    }

    public function updatehotels(Request $req){
        
        if($req->ajax()){
            $hotelPkgData = json_decode($req->hotesPkgData);
            $hotelbkDays = json_decode($req->hotelbkDays);
            $tourID = $req->tourID;
            $tourStDate = $req->tourStDate;
            $qoutHeaderID =$req->qoutheaderId;
            $noofpax = $req->no_of_adtPax;
            
            $comp_supliments =json_decode($req->comp_supliments);
            $Opti_supliments =json_decode($req->Opti_supliments);

            try {
                DB::beginTransaction();

                $rowCount = count((array)$hotelbkDays);
                //return json_encode($cnt);
                $checkAVBLc_details = TourQuotationHotel::where('tour_id', $tourID)->select('id')->first();

                if ($checkAVBLc_details != '') {
                    // /Vehicle::find($VehicleID)->delete();
                    TourQuotationHotel::where('tour_id', $tourID)->delete();
                    TourQuotationHotelDetails::where('tour_id', $tourID)->delete();
                    TourQoutHotelComSupliment::where('tour_id', $tourID)->delete();
                    TourQoutHotelOptmSupliment::where('tour_id', $tourID)->delete();
                }

                $dayCount = 1;

                $tourQoutHeaderUpdate = TourQuotationHeader::find($qoutHeaderID);
                $tourQoutHeaderUpdate->pp_hotel_price =$req->pp_hotel_price;
                $tourQoutHeaderUpdate->pp_ss_price =$req->pp_ss_price;
                $tourQoutHeaderUpdate->pp_tpre_price =$req->pp_tpre_price;
                $tourQoutHeaderUpdate->pp_qtre_price =$req->pp_qtre_price;
                $tourQoutHeaderUpdate->status = 2;
                $tourQoutHeaderUpdate->save();



                if ($rowCount != 0) {


                    foreach ($hotelbkDays as $bkdays) {

                        $date = date('Y-m-d', strtotime($tourStDate . ' + ' . ($dayCount - 1) . ' days'));

                        $tourQoutHotel = new TourQuotationHotel();
                        $tourQoutHotel->tour_quotation_header_id = $qoutHeaderID;
                        $tourQoutHotel->tour_id = $tourID;
                        $tourQoutHotel->tour_date = $date;
                        $tourQoutHotel->tour_day = $dayCount;
                        $tourQoutHotel->save();

                        $touhtLastID = TourQuotationHotel::select('id')->orderBy('id', 'DESC')->first();
                        //return json_encode($LcLastID);

                        foreach ($hotelPkgData as $pakgs) {

                            if ($bkdays->tourDay == $pakgs->days) {
                                
                                 
                                $tourQoutHotelDetails = new TourQuotationHotelDetails();

                                $tourQoutHotelDetails->tour_quotation_hotel_id = $touhtLastID->id;
                                $tourQoutHotelDetails->tour_id = $tourID;
                                $tourQoutHotelDetails->pos = $pakgs->pos;
                                $tourQoutHotelDetails->supplier_id = $pakgs->supID;
                                $tourQoutHotelDetails->hotel_package_id = $pakgs->pkgId;
                                $tourQoutHotelDetails->ss_rate = $pakgs->sgl_rate;
                                $tourQoutHotelDetails->ss_com = $pakgs->sgl_com;
                                $tourQoutHotelDetails->db_rate = $pakgs->dbl_rate;
                                $tourQoutHotelDetails->db_com = $pakgs->dbl_com;
                                $tourQoutHotelDetails->trp_rate = $pakgs->tbl_rare;
                                $tourQoutHotelDetails->trp_com = $pakgs->tb_com;
                                $tourQoutHotelDetails->qtb_rate = $pakgs->qtb_rate;
                                $tourQoutHotelDetails->qtb_com = $pakgs->qtb_com;

                                $tourQoutHotelDetails->sql_splm = $pakgs->ss_splm;
                                $tourQoutHotelDetails->dbl_splm = $pakgs->db_splm;
                                $tourQoutHotelDetails->tbl_splm = $pakgs->tb_splm;
                                $tourQoutHotelDetails->qd_splm = $pakgs->qd_splm;
                                $tourQoutHotelDetails->guide = $pakgs->grVal;
                                
                                $tourQoutHotelDetails->child_rate = $pakgs->ch_rate;
                                $tourQoutHotelDetails->child_com = $pakgs->ch_com;

                                $tourQoutHotelDetails->currency_id = $pakgs->currency_id;
                                $tourQoutHotelDetails->rate_to_base = $pakgs->rate_to_base;
                                $tourQoutHotelDetails->status = 1;
                                $tourQoutHotelDetails->save();

                                $touhtDtailsLastID = TourQuotationHotelDetails::select('id')->orderBy('id', 'DESC')->first();


                                 foreach($comp_supliments as $cmpsup){
                                        
                                    if($bkdays->tourDay == $cmpsup->cm_sup_day){
                                        
                                        if($cmpsup->cm_htpos == $pakgs->pos){
                                            $qtyPax = 1;
                                            
                                            if($cmpsup->cm_sup_rtype==0){
                                                $qtyPax = $noofpax;
                                            }
                                            
                                            $tourqouteComSup = new TourQoutHotelComSupliment();
                                                                                        
                                            $tourqouteComSup->tour_quotation_hotel_detail_id = $touhtDtailsLastID->id;
                                            $tourqouteComSup->tour_id = $tourID;
                                            $tourqouteComSup->spos = $cmpsup->cm_spos;
                                            $tourqouteComSup->compulsory_supliment_id = $cmpsup->cm_sup_id;
                                            $tourqouteComSup->rate_type = $cmpsup->cm_sup_rtype;
                                            $tourqouteComSup->exrate = $cmpsup->cm_sup_exrt;
                                            $tourqouteComSup->csup_amount = $cmpsup->cm_sup_am;
                                            $tourqouteComSup->qty = $qtyPax;
                                            $tourqouteComSup->cheked = 0;
                                            $tourqouteComSup->save();

                                        }

                                    }

                                 }
                                 
                                 foreach($Opti_supliments as $opssup){
                                        
                                    if($bkdays->tourDay == $opssup->op_sup_day){
                                     
                                        if($opssup->op_htpos == $pakgs->pos){
                                          
                                            $tourqouteOptSup = new TourQoutHotelOptmSupliment();
                                            
                                            $tourqouteOptSup->tour_quotation_hotel_detail_id = $touhtDtailsLastID->id;
                                            $tourqouteOptSup->tour_id = $tourID;
                                            $tourqouteOptSup->spos = $opssup->op_spos;
                                            $tourqouteOptSup->optional_supliment_id = $opssup->op_sup_id;
                                            $tourqouteOptSup->rate_type = $opssup->op_sup_rtype;                                        
                                            $tourqouteOptSup->opsup_amount = $opssup->op_sup_am;
                                            $tourqouteOptSup->qty=1;
                                            $tourqouteOptSup->cheked = 0;
                                            $tourqouteOptSup->save();
                                      }

                                    }

                                 }



                            }

                        }

                        $dayCount++;
                    }


                }

                DB::commit();

                return json_encode('saved');

            }catch (\Exception $ex){

                DB::rollBack();
                return json_encode("* Some field cannot be empty!, Please check before save");

            }

          // return json_encode($rowCount);
        }

    }

    public function day_move_up(Request $req){
        
        if($req->ajax()){

        try
        {
            
         //  $tourQtHdId = $req->$qoutheaderId;
           $tour_ID = $req->tourID;
           $row_day = $req->row_day;
           $tourStDate = $req->tourStDate;

           $tour_day_lst = TourQuotationHotel::where('tour_id',$tour_ID)->get();

           $check_Has_emptyRow = DB::table('tour_quotation_hotels')
                                 ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.tour_quotation_hotel_id','=','tour_quotation_hotels.id')
                                 ->select('tour_quotation_hotels.tour_day','tour_quotation_hotels.tour_date')                                     
                                 ->where('tour_quotation_hotels.tour_id',$tour_ID)
                                 ->get();

            $check_Has_emptyRow_gp = $check_Has_emptyRow->groupBy('tour_day');
            
            $last_empt_day = 0;
            
            $pos = 0;
            $lastday=0;

            if($row_day!=1)
            {   
               
                for($row_day_pos = ($row_day-1); $row_day_pos >= 1; $row_day_pos--){
                    
                    $hasRow = 0;
                    
                    foreach($check_Has_emptyRow_gp as $day => $Has_emptyRow){

                        if($row_day_pos==$day){

                            $hasRow++;

                        }

                    }
                    
                    if($hasRow==0){
                        $last_empt_day=$row_day_pos;
                        break; 
                    }
                }
               
            }

            if($last_empt_day!=0){
                
                for($move_up = ($last_empt_day+1); $move_up <= $row_day; $move_up++){

                    // $check_Has_emptyRow = DB::table('tour_quotation_hotels')
                    //                 ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.tour_quotation_hotel_id','=','tour_quotation_hotels.id')
                    //                 ->select('tour_quotation_hotels.tour_day','tour_quotation_hotels.tour_date','tour_quotation_hotel_details.*')                                     
                    //                 ->where('tour_quotation_hotels.tour_id',$tour_ID)
                    //                 ->where('tour_quotation_hotels.tour_day',$row_day)                                 
                    //                 ->get();
                    $tour_qt_hotels_id = TourQuotationHotel::where('tour_id',$tour_ID)->where('tour_day',($move_up-1))->select('id','tour_date')->first();
                  //  return json_encode($tour_qt_hotels_id); 
                    $move_upDate = $tour_qt_hotels_id->tour_date;
                                 
                    $move_hotelUp = TourQuotationHotel::where('tour_id',$tour_ID)
                                                        ->where('tour_day',$move_up)->select('id','tour_id','tour_day')->first();
                   

                   // $move_htDetailsUp = TourQuotationHotelDetails::where('tour_quotation_hotel_id',$move_hotelUp->id);

                    $DayHotels = DB::table('tour_quotation_hotel_details')
                                   ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                   ->where('tour_quotation_hotels.tour_id',$tour_ID)
                                   ->where('tour_quotation_hotels.tour_day',$move_up)
                                   ->select('tour_quotation_hotel_details.id','tour_quotation_hotel_details.tour_quotation_hotel_id',
                                            'tour_quotation_hotel_details.hotel_package_id')
                                   ->get();
                               // ->update(['tour_quotation_hotel_id' => $tour_qt_hotels_id->id]);

                               foreach($DayHotels as $DayHotels_lst){

                                    $check_pkg = HotelPackage::where('id',$DayHotels_lst->hotel_package_id)                                                                
                                                                ->where('hotel_packages.from_date','<=',$move_upDate)
                                                                ->where('hotel_packages.to_date','>=',$move_upDate)
                                                                ->select('id')->first();
                                    

                                    if($check_pkg!=''){
                                        
                                        $updateHotelsMove = TourQuotationHotelDetails::find($DayHotels_lst->id);
                                        $updateHotelsMove->tour_quotation_hotel_id = $tour_qt_hotels_id->id;                                        
                                        $updateHotelsMove->save();

                                    }else{

                                        $updateHotelsMove = TourQuotationHotelDetails::find($DayHotels_lst->id);
                                        $updateHotelsMove->tour_quotation_hotel_id = $tour_qt_hotels_id->id;
                                        $updateHotelsMove->status = 4;                                                                               
                                        $updateHotelsMove->save();

                                    }

                                    $check_com_suplmt = DB::table('tour_quotation_hotel_details')
                                                            ->join('tour_qout_hotel_com_supliments','tour_quotation_hotel_details.id','=','tour_qout_hotel_com_supliments.tour_quotation_hotel_detail_id')                                                           
                                                            ->where('tour_quotation_hotel_details.id',$DayHotels_lst->id)
                                                            ->select('tour_qout_hotel_com_supliments.id')
                                                            ->get();

                                    // return json_encode($check_com_suplmt);

                                    foreach($check_com_suplmt as $check_com_suplmt_lst){
                                        
                                        $check_com_suplmt_st = DB::table('tour_qout_hotel_com_supliments')                                                            
                                                                    ->join('compulsory_supliments','compulsory_supliments.id','=','tour_qout_hotel_com_supliments.compulsory_supliment_id')
                                                                    ->where('tour_qout_hotel_com_supliments.id',$check_com_suplmt_lst->id)
                                                                    ->where('compulsory_supliments.fr_date','<=',$move_upDate)
                                                                    ->where('compulsory_supliments.to_date','>=',$move_upDate)
                                                                    ->select('tour_qout_hotel_com_supliments.id')
                                                                    ->get();
                                        $rowCount_Comsup = $check_com_suplmt_st->count();
                                        
                                        if($rowCount_Comsup == 0){

                                            TourQoutHotelComSupliment::find($check_com_suplmt_lst->id)->delete();

                                        }
                                    }

                               }
                    
                                   
                }

                

                return json_encode('moved_up');                                 
                //moved_down
            }




           // return json_encode($last_empt_day);

        }catch(Exception $ex)
        {
            return json_encode('Error :'.$ex);
        }
        }
    }

    public function day_move_down(Request $req){
        
        if($req->ajax()){

            try
            {
                
             //  $tourQtHdId = $req->$qoutheaderId;
               $tour_ID = $req->tourID;
               $row_day = $req->row_day;
               $tourStDate = $req->tourStDate;
    
               $tour_day_lst = TourQuotationHotel::where('tour_id',$tour_ID)->get();
               
               $tourLastDay = $tour_day_lst->count();

               $check_Has_emptyRow = DB::table('tour_quotation_hotels')
                                     ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.tour_quotation_hotel_id','=','tour_quotation_hotels.id')
                                     ->select('tour_quotation_hotels.tour_day','tour_quotation_hotels.tour_date')                                     
                                     ->where('tour_quotation_hotels.tour_id',$tour_ID)
                                     ->get();
    
                $check_Has_emptyRow_gp = $check_Has_emptyRow->groupBy('tour_day');
                
                $last_empt_day = 0;
                
               
                $lastday=0;
    
                if($row_day != $tourLastDay)
                {   
                   
                    for($row_day_pos = ($row_day+1); $row_day_pos <= $tourLastDay; $row_day_pos++){
                        
                        $hasRow = 0;
                        
                        foreach($check_Has_emptyRow_gp as $day => $Has_emptyRow){
    
                            if($row_day_pos==$day){
    
                                $hasRow++;
    
                            }
    
                        }
                        
                        if($hasRow==0){
                            $last_empt_day=$row_day_pos;
                            break; 
                        }
                    }
                   
                }
    

                //return json_encode($last_empt_day);

                
                if($last_empt_day!=0){
                    
                    for($move_up = ($last_empt_day-1); $move_up >= $row_day; $move_up--){
    
                        // $check_Has_emptyRow = DB::table('tour_quotation_hotels')
                        //                 ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.tour_quotation_hotel_id','=','tour_quotation_hotels.id')
                        //                 ->select('tour_quotation_hotels.tour_day','tour_quotation_hotels.tour_date','tour_quotation_hotel_details.*')                                     
                        //                 ->where('tour_quotation_hotels.tour_id',$tour_ID)
                        //                 ->where('tour_quotation_hotels.tour_day',$row_day)                                 
                        //                 ->get();
                        $tour_qt_hotels_id = TourQuotationHotel::where('tour_id',$tour_ID)->where('tour_day',($move_up+1))->select('id','tour_date')->first();
                      //  return json_encode($tour_qt_hotels_id); 
                        $move_upDate = $tour_qt_hotels_id->tour_date;
                                     
                        $move_hotelUp = TourQuotationHotel::where('tour_id',$tour_ID)
                                                            ->where('tour_day',$move_up)->select('id','tour_id','tour_day')->first();
                       
    
                       // $move_htDetailsUp = TourQuotationHotelDetails::where('tour_quotation_hotel_id',$move_hotelUp->id);
    
                        $DayHotels = DB::table('tour_quotation_hotel_details')
                                       ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                       ->where('tour_quotation_hotels.tour_id',$tour_ID)
                                       ->where('tour_quotation_hotels.tour_day',$move_up)
                                       ->select('tour_quotation_hotel_details.id','tour_quotation_hotel_details.tour_quotation_hotel_id',
                                                'tour_quotation_hotel_details.hotel_package_id')
                                       ->get();
                                   // ->update(['tour_quotation_hotel_id' => $tour_qt_hotels_id->id]);
    
                                   foreach($DayHotels as $DayHotels_lst){
    
                                        $check_pkg = HotelPackage::where('id',$DayHotels_lst->hotel_package_id)                                                                
                                                                    ->where('hotel_packages.from_date','<=',$move_upDate)
                                                                    ->where('hotel_packages.to_date','>=',$move_upDate)
                                                                    ->select('id')->first();
                                        
    
                                        if($check_pkg!=''){
                                            
                                            $updateHotelsMove = TourQuotationHotelDetails::find($DayHotels_lst->id);
                                            $updateHotelsMove->tour_quotation_hotel_id = $tour_qt_hotels_id->id;
                                            $updateHotelsMove->status = 1;                                         
                                            $updateHotelsMove->save();
    
                                        }else{
    
                                            $updateHotelsMove = TourQuotationHotelDetails::find($DayHotels_lst->id);
                                            $updateHotelsMove->tour_quotation_hotel_id = $tour_qt_hotels_id->id;
                                            $updateHotelsMove->status = 4;                                                                               
                                            $updateHotelsMove->save();
    
                                        }
    
                                        $check_com_suplmt = DB::table('tour_quotation_hotel_details')
                                                                ->join('tour_qout_hotel_com_supliments','tour_quotation_hotel_details.id','=','tour_qout_hotel_com_supliments.tour_quotation_hotel_detail_id')                                                           
                                                                ->where('tour_quotation_hotel_details.id',$DayHotels_lst->id)
                                                                ->select('tour_qout_hotel_com_supliments.id')
                                                                ->get();
    
                                        // return json_encode($check_com_suplmt);
    
                                        foreach($check_com_suplmt as $check_com_suplmt_lst){
                                            
                                            $check_com_suplmt_st = DB::table('tour_qout_hotel_com_supliments')                                                            
                                                                        ->join('compulsory_supliments','compulsory_supliments.id','=','tour_qout_hotel_com_supliments.compulsory_supliment_id')
                                                                        ->where('tour_qout_hotel_com_supliments.id',$check_com_suplmt_lst->id)
                                                                        ->where('compulsory_supliments.fr_date','<=',$move_upDate)
                                                                        ->where('compulsory_supliments.to_date','>=',$move_upDate)
                                                                        ->select('tour_qout_hotel_com_supliments.id')
                                                                        ->get();
                                            $rowCount_Comsup = $check_com_suplmt_st->count();
                                            
                                            if($rowCount_Comsup == 0){
    
                                                TourQoutHotelComSupliment::find($check_com_suplmt_lst->id)->delete();
    
                                            }
                                        }
    
                                   }
                        
                                       
                    }
    
                    
    
                    return json_encode('moved_down');                                 
                    //moved_down
                }
    
    
    
    
               // return json_encode($last_empt_day);
    
            }catch(Exception $ex)
            {
                return json_encode('Error :'.$ex);
            }
            }

    }


    public function update(Request $request)
    {
        
        try
        {
            if($request->packs<=0)
            {
                return "Minimum value should be greater thand one in Number of Pax (Adult): ";
            }

            // elseif($request->packs_child<=0){
                
            //     return "Minimum value should be greater thand one in Number of Pax (Children):  ";
            // }

            elseif($request->c_rate=='')
            {
                return "Commission Rate cannot be null";
            }
            elseif ($request->base_currencies=='') {
                
                return "Base Currency cannot be null";
            }

            $id=$request->id;

            $chk_chld_acmd = 0;
            $chk_chld_misc = 0;
            $chk_chld_guide = 0;
            $chk_chld_trsp = 0;

            if($request->packs_child>0){
                $chk_chld_acmd = $request->chk_chld_accmd;
                $chk_chld_misc = $request->chk_chld_misc;
                $chk_chld_guide = $request->chk_chld_guide;
                $chk_chld_trsp = $request->chk_chld_trsp;
            }


            $tourQuotation_data=TourQuotationHeader::find($id);
           
            $tourQuotation_data->pax_adult=$request->packs; 
            $tourQuotation_data->pax_child=$request->packs_child;
            $tourQuotation_data->com_rate=$request->c_rate; 
            $tourQuotation_data->currency_id=$request->base_currencies; 
            $tourQuotation_data->remarks=$request->remarks;
            $tourQuotation_data->bc_to_lkr=$request->bcTo_LKR; 

            $tourQuotation_data->child_chk_accmd = $chk_chld_acmd;
            $tourQuotation_data->child_chk_trsp = $chk_chld_trsp;
            $tourQuotation_data->child_chk_guide = $chk_chld_guide;
            $tourQuotation_data->child_chk_misc = $chk_chld_misc;
            
            
            $tourQuotation_data->save();
            
            return 'updated';


        }catch(\Exception $e)
        {
            return "* Some Fields Cannot be Null".$e;
        }
        
    }


    public function confirm_quotation(Request $request)
    {
        
     if($request->ajax()){
        
        try
        {
        
            $TourID_ORG =$request->id;

            $quotaion_data=TourQuotationHeader::where('tour_id',$TourID_ORG)->select('status')->first();
            
            if($quotaion_data->status==3)
            {

              try{

                    
               

                DB::beginTransaction();

                $t_qt_dt=TourQuotationHeader::where('tour_id',$TourID_ORG)->first();
                
                $t_qt_dt->status=4;
                $t_qt_dt->save();

                
                $tourQoute = TourQuotationHeader::where('tour_id',$TourID_ORG)->first();
    
    
    
                    
    
                    $tourID=0;
                    $tourIDUpdate = TrData::where('id',1)->select('id','tour_id')->first();
                    
                    
                    $tourID =($tourIDUpdate->tour_id)+1;
                    $tourIDUpdate->tour_id = $tourID;
                    $tourIDUpdate->save();
    
                    $currentYear =date("Y");
                    $currentMonth =date("m");
    
                    //-------------Agent year Code--------------
                    $tourCodeNo =0;
    
                    //$QuotationCodeNoUpdate = QuotationCode::where('code_year',$currentYear)->where('agent_id',$request->agent_id)->first();
    
                    // if($QuotationCodeNoUpdate !=''){
                        $tourCodeNo = $tourQoute->tour_code_no;
                        // $QuotationCodeNoUpdate->code_no = $tourCodeNo;
                        // $QuotationCodeNoUpdate->save();
    
                    ///}
    
    
                    $tourQt_versionNo = $tourQoute->version_no;
                    // $tourQoute->version_no = $tourQt_versionNo;
                    // $tourQoute->save();
    
                    
                    $mkCode = Market::where('id',$tourQoute->market_id)->select('m_code')->first();
                    // $agCode = Agent::where('id',$tourQoute->agent_id)->select('ag_code')->first();
                    $brCode = Branch::where('id',$tourQoute->branch_id)->select('branch_code')->first();
                        
                    
    
                    // return $tourQt_versionNo;
                    //$tourCode = ($mkCode->m_code).'/'.$brCode->branch_code.'/'.$currentMonth.$currentYear.'-'.$tourCodeNo.'-V'.($tourQt_versionNo);
    
    
                    $tourQt = new TourQuotationHeader();
                
                    $tourQt->tour_id = $tourID;
                    $tourQt->tour_code = $tourQoute->tour_code; 
                    $tourQt->tour_code_no = $tourQoute->tour_code_no;
                    $tourQt->market_id = $tourQoute->market_id;
                    $tourQt->agent_id = $tourQoute->agent_id;
                    $tourQt->branch_id = $tourQoute->branch_id;
                    $tourQt->version_id = $tourQoute->version_id;
                    $tourQt->version_no = $tourQoute->version_no;
                    $tourQt->tour_type = $tourQoute->tour_type;
                    $tourQt->title = $tourQoute->title;
                    $tourQt->frm_date = $tourQoute->frm_date;
                    $tourQt->to_date = $tourQoute->to_date;

                    $tourQt->vld_frm_date = $tourQoute->vld_frm_date;
                    $tourQt->vld_to_date = $tourQoute->vld_to_date;

                    $tourQt->Days = $tourQoute->Days;
                    $tourQt->pax_adult = $tourQoute->pax_adult;
                    $tourQt->pax_child = $tourQoute->pax_child;
                    $tourQt->remarks = $tourQoute->remarks;
                    $tourQt->currency_id = $tourQoute->currency_id;
                    $tourQt->promotion = 0;
                    $tourQt->confirmed = 1;
                    $tourQt->com_rate = $tourQoute->com_rate;
                    $tourQt->qtn_type = $tourQoute->qtn_type;
                   $tourQt->user_id = $tourQoute->user_id;

                    $tourQt->status = 1;
                    $tourQt->amgmt = $tourQoute->amgmt;

                    $tourQt->vld_frm_date = $tourQoute->vld_frm_date;
                    $tourQt->vld_to_date = $tourQoute->vld_to_date;

                    $tourQt->base_on = $tourQoute->base_on;
    
                    $tourQt->pp_misc_price =$tourQoute->pp_misc_price;
                    
                    $tourQt->trp_pp_price =$tourQoute->trp_pp_price; 
                    
    
                    $tourQt->tot_guide_price =$tourQoute->tot_guide_price;
                    $tourQt->tot_guide_acmd =$tourQoute->tot_guide_acmd;
    
                    $tourQt->millage = $tourQoute->millage;
    
                    $tourQt->pp_hotel_price =$tourQoute->pp_hotel_price;
                    $tourQt->pp_ss_price =$tourQoute->pp_ss_price;
                    $tourQt->pp_tpre_price =$tourQoute->pp_tpre_price;
                    $tourQt->pp_qtre_price =$tourQoute->pp_qtre_price;
                    $tourQt->bc_to_lkr=$tourQoute->bc_to_lkr;
                    $tourQt->child_pp_rate=$tourQoute->child_pp_rate;

                    $tourQt->child_chk_accmd = $tourQoute->child_chk_accmd;
                    $tourQt->child_chk_trsp = $tourQoute->child_chk_trsp;
                    $tourQt->child_chk_guide = $tourQoute->child_chk_guide;
                    $tourQt->child_chk_misc = $tourQoute->child_chk_misc;

    
                    $tourQt->save();
                    
                    
    
                    $qoutHeaderID = TourQuotationHeader::select('id')->orderBy('id','DESC')->first();
                        
                    $tourQuoteLocations = TourQuotLocation::where('tour_id',$TourID_ORG)->orderBy('tour_day','ASC')->get();
                    
                    $tourQouteDistance = DB::table('tour_quot_distances')
                                            ->join('tour_quot_locations','tour_quot_locations.id','=','tour_quot_distances.tour_quot_location_id')                                        
                                            ->select('tour_quot_locations.tour_day','tour_quot_distances.pos','tour_quot_distances.location_id',
                                                    'tour_quot_distances.lc_name','tour_quot_distances.lc_code','tour_quot_distances.kms')
                                            ->orderBy('tour_quot_distances.pos')
                                            ->where('tour_quot_locations.tour_id',$TourID_ORG)
                                            ->get();                                                    
                    // $tourQouteDistance_gp = $tourQouteDistance->groupBy('tour_day');
    
    
                    foreach($tourQuoteLocations as $quoteLocation){
                        
                        $tourDays = date('Y-m-d', strtotime($quoteLocation->tour_date. ' + ' . (0) . ' days'));
    
                        $qoutLocation = new TourQuotLocation();
    
                        $qoutLocation->tour_quotation_header_id = $qoutHeaderID->id;
                        $qoutLocation->tour_id = $tourID;
                        $qoutLocation->tour_date = $tourDays;
                        $qoutLocation->tour_day = $quoteLocation->tour_day;
                        $qoutLocation->ttkms = $quoteLocation->ttkms;
                        $qoutLocation->itineray_id = $quoteLocation->itineray_id;

                        $qoutLocation->save();
                                            
                        $LcLastID = TourQuotLocation::select('id')->orderBy('id','DESC')->first();
    
                                            
                        foreach($tourQouteDistance as $distanceSp){
                            
                            if($distanceSp->tour_day == $quoteLocation->tour_day){
                                
                                    $QutDistance = new TourQuotDistance();
    
                                    $QutDistance->tour_quot_location_id = $LcLastID->id;
                                    $QutDistance->tour_id = $tourID;
                                    $QutDistance->pos = $distanceSp->pos;
                                    $QutDistance->location_id = $distanceSp->location_id;                        
                                    $QutDistance->lc_name = $distanceSp->lc_name;
                                    $QutDistance->lc_code = $distanceSp->lc_code;
                                    $QutDistance->kms = $distanceSp->kms;
                                    $QutDistance->save();                     
                            }
                        }
    
    
                    }
                    
                    $hotelbkDays = TourQuotationHotel::where('tour_id',$TourID_ORG)->get();
                    
                    $hotelPkgData = DB::table('tour_quotation_hotel_details')
                                        ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                        ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.*')
                                        ->orderBy('tour_quotation_hotel_details.pos')
                                        ->where('tour_quotation_hotels.tour_id',$TourID_ORG)
                                        ->get();
    
                                        //return json_encode('sadsd');
                    $comp_supliments = DB::table('tour_qout_hotel_com_supliments')
                                            ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_com_supliments.tour_quotation_hotel_detail_id')
                                            ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                            ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos','tour_qout_hotel_com_supliments.*')
                                            ->orderBy('tour_qout_hotel_com_supliments.spos')
                                            ->where('tour_qout_hotel_com_supliments.tour_id',$TourID_ORG)->get();
    
                    $Opti_supliments = DB::table('tour_qout_hotel_optm_supliments')
                                            ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_optm_supliments.tour_quotation_hotel_detail_id')
                                            ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                            ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos','tour_qout_hotel_optm_supliments.*')
                                            ->orderBy('tour_qout_hotel_optm_supliments.spos')
                                            ->where('tour_qout_hotel_optm_supliments.tour_id',$TourID_ORG)->get();
    
                    foreach ($hotelbkDays as $bkdays) {
                        
                        $tourDaysh = date('Y-m-d', strtotime($bkdays->tour_date. ' + ' . (0) . ' days'));
    
                        $tourQoutHotel = new TourQuotationHotel();
                        $tourQoutHotel->tour_quotation_header_id = $qoutHeaderID->id;
                        $tourQoutHotel->tour_id = $tourID;
                        $tourQoutHotel->tour_date = $tourDaysh;
                        $tourQoutHotel->tour_day = $bkdays->tour_day;
                        $tourQoutHotel->save();
    
                        $touhtLastID = TourQuotationHotel::select('id')->orderBy('id', 'DESC')->first();
                        //return json_encode($LcLastID);
    
                        foreach ($hotelPkgData as $pakgs) {
    
                            if ($bkdays->tour_day == $pakgs->tour_day) {
    
                                
    
                                $tourQoutHotelDetails = new TourQuotationHotelDetails();
    
                                $tourQoutHotelDetails->tour_quotation_hotel_id = $touhtLastID->id;
                                $tourQoutHotelDetails->tour_id = $tourID;
                                $tourQoutHotelDetails->pos = $pakgs->pos;
                                $tourQoutHotelDetails->supplier_id = $pakgs->supplier_id;
                                $tourQoutHotelDetails->hotel_package_id = $pakgs->hotel_package_id;
                                $tourQoutHotelDetails->ss_rate = $pakgs->ss_rate;
                                $tourQoutHotelDetails->ss_com = $pakgs->ss_com;
                                $tourQoutHotelDetails->db_rate = $pakgs->db_rate;
                                $tourQoutHotelDetails->db_com = $pakgs->db_com;
                                $tourQoutHotelDetails->trp_rate = $pakgs->trp_rate;
                                $tourQoutHotelDetails->trp_com = $pakgs->trp_com;
                                $tourQoutHotelDetails->qtb_rate = $pakgs->qtb_rate;
                                $tourQoutHotelDetails->qtb_com = $pakgs->qtb_com;
                                
                                $tourQoutHotelDetails->sql_splm = $pakgs->sql_splm;
                                $tourQoutHotelDetails->dbl_splm = $pakgs->dbl_splm;
                                $tourQoutHotelDetails->tbl_splm = $pakgs->tbl_splm;
                                $tourQoutHotelDetails->qd_splm = $pakgs->qd_splm;
                                $tourQoutHotelDetails->guide = $pakgs->guide;
                                $tourQoutHotelDetails->child_rate = $pakgs->child_rate;
                                $tourQoutHotelDetails->child_com = $pakgs->child_com;

                                $tourQoutHotelDetails->currency_id = $pakgs->currency_id;
                                $tourQoutHotelDetails->rate_to_base = $pakgs->rate_to_base;
                                $tourQoutHotelDetails->status = $pakgs->status;
                                $tourQoutHotelDetails->save();
    
                                $touhtDtailsLastID = TourQuotationHotelDetails::select('id')->orderBy('id', 'DESC')->first();
    
    
    
                                foreach($comp_supliments as $cmpsup){
                                        
                                    if($bkdays->tour_day == $cmpsup->tour_day){
                                        
                                        if($pakgs->pos == $cmpsup->pos){    
    
                                            $tourqouteComSup = new TourQoutHotelComSupliment();
                                        
                                            $tourqouteComSup->tour_quotation_hotel_detail_id = $touhtDtailsLastID->id;
                                            $tourqouteComSup->tour_id = $tourID;
                                            $tourqouteComSup->spos = $cmpsup->spos;
                                            $tourqouteComSup->compulsory_supliment_id = $cmpsup->compulsory_supliment_id;
                                            $tourqouteComSup->rate_type = $cmpsup->rate_type;
                                            $tourqouteComSup->exrate = $cmpsup->exrate;
                                            $tourqouteComSup->csup_amount = $cmpsup->csup_amount;
                                            $tourqouteComSup->qty = $cmpsup->qty;
                                            $tourqouteComSup->cheked = $cmpsup->cheked;
                                            $tourqouteComSup->save();
                                        }
    
                                    }
    
                                }
                                
                                foreach($Opti_supliments as $opssup){
                                        
                                    if($bkdays->tour_day == $opssup->tour_day){
                                        
                                        if($pakgs->pos == $opssup->pos){   
                                            
                                            $tourqouteOptSup = new TourQoutHotelOptmSupliment();
                                            
                                            $tourqouteOptSup->tour_quotation_hotel_detail_id = $touhtDtailsLastID->id;
                                            $tourqouteOptSup->tour_id = $tourID;
                                            $tourqouteOptSup->spos = $opssup->spos;
                                            $tourqouteOptSup->optional_supliment_id = $opssup->optional_supliment_id;
                                            $tourqouteOptSup->rate_type = $opssup->rate_type;                                        
                                            $tourqouteOptSup->opsup_amount = $opssup->opsup_amount;
                                            $tourqouteOptSup->qty = $opssup->qty;
                                            $tourqouteOptSup->cheked = $opssup->cheked;
                                            $tourqouteOptSup->save();
                                        }
                                    }
    
                                }
    
    
    
                            }
    
                        }
    
                        
                    }
    
                    $guideData = TourQuotGuide::where('tour_id',$TourID_ORG)->get();               
                    $guideDataDetails = DB::table('tour_quot_guide_details')
                                    ->join('tour_quot_guides','tour_quot_guides.id','=','tour_quot_guide_details.tour_quot_guide_id')
                                    ->select('tour_quot_guides.tour_day','tour_quot_guide_details.*')
                                    ->orderBy('tour_quot_guide_details.pos')
                                    ->where('tour_quot_guides.tour_id',$TourID_ORG)
                                    ->get();
    
    
                    foreach ($guideData as $bkdaysGuide) {
    
                        $TourGuiddate = date('Y-m-d', strtotime($bkdaysGuide->tour_date . ' + ' . (0) . ' days'));
    
                        $tourQoutGuide = new TourQuotGuide();
                        $tourQoutGuide->tour_quotation_header_id = $qoutHeaderID->id;
                        $tourQoutGuide->tour_id = $tourID;
                        $tourQoutGuide->tour_date = $TourGuiddate;
                        $tourQoutGuide->tour_day = $bkdaysGuide->tour_day;
                        $tourQoutGuide->lkr_rate = $bkdaysGuide->lkr_rate;                        
                        $tourQoutGuide->save();
    
                        $touguideLastID = TourQuotGuide::select('id')->orderBy('id', 'DESC')->first();
                        //return json_encode($LcLastID);
    
                        foreach ($guideDataDetails as $gdetails) {
    
                            if ($bkdaysGuide->tour_day == $gdetails->tour_day) {
    
                                //return json_encode($pakgs);
    
                                
                                $tourQoutGuideDetails = new TourQuotGuideDetails();
                                
                                $tourQoutGuideDetails->tour_quot_guide_id = $touguideLastID->id;
                                $tourQoutGuideDetails->tour_id = $tourID;
                                $tourQoutGuideDetails->pos = $gdetails->pos;
                                $tourQoutGuideDetails->guide_type_id = $gdetails->guide_type_id;
                                $tourQoutGuideDetails->language_id = $gdetails->language_id;
                                $tourQoutGuideDetails->has_room = $gdetails->has_room;
                                $tourQoutGuideDetails->guide_room_id = $gdetails->guide_room_id;
                                $tourQoutGuideDetails->guide_fee = $gdetails->guide_fee;
                                $tourQoutGuideDetails->guide_com = $gdetails->guide_com;
                                $tourQoutGuideDetails->room_rate = $gdetails->room_rate;
                                $tourQoutGuideDetails->room_excrate = $gdetails->room_excrate;
                                $tourQoutGuideDetails->room_com = $gdetails->room_com;
                                
                                //$tourQoutGuideDetails->status = 1;
                                $tourQoutGuideDetails->save();
    
    
                            }
    
                        }
    
                        
                    }
    
                    $trpData = TourQuotTransport::where('tour_id',$TourID_ORG)->get();
    
                    
                    foreach($trpData as $trp_vhdata){
    
                        $tourQuteTrp = new TourQuotTransport();
                        
                        $tourQuteTrp->tour_quotation_header_id =$qoutHeaderID->id;
                        $tourQuteTrp->tour_id = $tourID;
                        $tourQuteTrp->pos = $trp_vhdata->pos;
                        $tourQuteTrp->vehicle_type_id = $trp_vhdata->vehicle_type_id;
                        $tourQuteTrp->millage = $trp_vhdata->millage;
                        $tourQuteTrp->rate_pkm = $trp_vhdata->rate_pkm;
                        $tourQuteTrp->totlkr = $trp_vhdata->totlkr;
                        $tourQuteTrp->trp_ls_Mkp = $trp_vhdata->trp_ls_Mkp;
                        $tourQuteTrp->baserate = $trp_vhdata->baserate;
                        $tourQuteTrp->save();
    
                    }

                    // return 'abc';
                    $trexData=TourQuoteTrpExp::where('tour_id',$TourID_ORG)->get();

                   
                   foreach($trexData as $tr_dt){

                    $tr_data_ex = new TourQuoteTrpExp();
                    $tr_data_ex->tour_quotation_header_id = $qoutHeaderID->id;
                    $tr_data_ex->tour_id=$tourID;
                    $tr_data_ex->pos=$tr_dt->pos;
                    $tr_data_ex->transport_expense_id=$tr_dt->transport_expense_id;
                    $tr_data_ex->exp_rate=$tr_dt->exp_rate;
                    $tr_data_ex->exp_qty=$tr_dt->exp_qty;
                    $tr_data_ex->exp_total=$tr_dt->exp_total;
                    $tr_data_ex->exp_markup=$tr_dt->exp_markup;
                    $tr_data_ex->save();


                   }
                   

                   $gp_vtData = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tourQoute->id)->get();

            

                   foreach($gp_vtData as $gp_vtDatas){
                          
                      $newgpvtype = new tourQouteGpVehicleTypes();
                      
                      $newgpvtype->tour_quotation_header_id = $qoutHeaderID->id;
                      $newgpvtype->group_qt_pax_setup_id = $gp_vtDatas->group_qt_pax_setup_id;
                      $newgpvtype->vehicle_type_id = $gp_vtDatas->vehicle_type_id;                    
                      $newgpvtype->rate_per_km = $gp_vtDatas->rate_per_km;
                      $newgpvtype->extr_vehicle_type_id = $gp_vtDatas->extr_vehicle_type_id;
                      $newgpvtype->extr_rate_per_km = $gp_vtDatas->extr_rate_per_km;
                      $newgpvtype->extr_vht_millage = $gp_vtDatas->extr_vht_millage;
                       
                      $newgpvtype->main_vt_mk_pc = $gp_vtDatas->main_vt_mk_pc;
                      $newgpvtype->extr_vt_mk_pc = $gp_vtDatas->extr_vt_mk_pc;
                      $newgpvtype->exrchg_rate = $gp_vtDatas->exrchg_rate;
                      $newgpvtype->pp_rate = $gp_vtDatas->pp_rate;
                      
                      $newgpvtype->guide_type = $gp_vtDatas->guide_type;
                      $newgpvtype->guide_accmd = $gp_vtDatas->guide_accmd;
                      $newgpvtype->accmd_foc = $gp_vtDatas->accmd_foc;


                      $newgpvtype->save();
                      
                  }


                        $tourQtgp_guideData_lst = TourQuoteGpGuidesDetails::where('tour_quotation_header_id',$tourQoute->id)->get();

                        foreach ($tourQtgp_guideData_lst as $tourQtgp_guideData) {
                           
                                $new_gp_guide_deatails = new TourQuoteGpGuidesDetails();

                                $new_gp_guide_deatails->tour_quotation_header_id = $qoutHeaderID->id;
                                $new_gp_guide_deatails->tour_day = $tourQtgp_guideData->tour_day;
                                $new_gp_guide_deatails->language_id = $tourQtgp_guideData->language_id;
                                $new_gp_guide_deatails->supplier_id = $tourQtgp_guideData->supplier_id;
                                $new_gp_guide_deatails->pos = $tourQtgp_guideData->pos;
                                $new_gp_guide_deatails->na_guide_rate = $tourQtgp_guideData->na_guide_rate;
                                $new_gp_guide_deatails->na_guide_mkp = $tourQtgp_guideData->na_guide_mkp;
                                $new_gp_guide_deatails->ch_guide_rate = $tourQtgp_guideData->ch_guide_rate;
                                $new_gp_guide_deatails->ch_guide_mkp = $tourQtgp_guideData->ch_guide_mkp;
                                $new_gp_guide_deatails->accmd_mkp = $tourQtgp_guideData->accmd_mkp;
                                $new_gp_guide_deatails->bsratelkr = $tourQtgp_guideData->bsratelkr;
                                
                                $new_gp_guide_deatails->save();

                    }
    
                    $miscData = TourQuotMisc::where('tour_id',$TourID_ORG)->get();
    
                    foreach($miscData as $msdata){
        
                        $tourQuteMisc = new TourQuotMisc();
                        
                        $tourQuteMisc->tour_quotation_header_id =$qoutHeaderID->id;
                        $tourQuteMisc->tour_id = $tourID;
                        $tourQuteMisc->pos = $msdata->pos;
                        $tourQuteMisc->misc_categorie_id = $msdata->misc_categorie_id;
                        $tourQuteMisc->qty = $msdata->qty;
                        $tourQuteMisc->rate_lkr = $msdata->rate_lkr;
                        $tourQuteMisc->totlkr = $msdata->totlkr;
                        $tourQuteMisc->ms_Mkp = $msdata->ms_Mkp;
                        $tourQuteMisc->baserate = $msdata->baserate;
                        $tourQuteMisc->ex_rate = $msdata->ex_rate;
                        $tourQuteMisc->save();
    
                    }



                    $roomAllocation_sl = TourQuoteRoomAllocation::where('tour_id',$TourID_ORG)->get();

                   
                   
    
                   // if($roomAllocation!=''){
                        foreach($roomAllocation_sl as $roomAllocation_lst){

                        
                        $roomAllocation_new = new TourQuoteRoomAllocation();
                        
                        $roomAllocation_new->tour_id = $tourID;
                        $roomAllocation_new->sgl = $roomAllocation_lst->sgl;
                        $roomAllocation_new->dbl = $roomAllocation_lst->dbl;
                        $roomAllocation_new->twn = $roomAllocation_lst->twn;
                        $roomAllocation_new->tbl = $roomAllocation_lst->tbl;
                        $roomAllocation_new->qd = $roomAllocation_lst->qd;
                        $roomAllocation_new->save();
                        
                        }
                   // }
                    if($tourQoute->amgmt==0){

                    
                        $Booking_Ammd = new TourBookingList();

                        $Booking_Ammd->tour_id = $tourID;             
                        $Booking_Ammd->tour_ammd_id = $tourID;
                        $Booking_Ammd->tour_ammd = 0;
                        $Booking_Ammd->tour_ammd_type = 0;
                        $Booking_Ammd->save();
                        
                    }else{

                        $Booking_Ammd = TourBookingList::where('tour_id',$TourID_ORG)->first();

                        $Booking_Ammd->tour_id = $tourID;                                     
                        $Booking_Ammd->save();
                        
                    }

                    DB::commit();
    
                    return json_encode('added');

                }catch(Exception $ex){
                    DB::rollBack();
                    return json_encode('Error'.$ex);
                }
            }
            else
            {   
               
                return json_encode('You cannot confirm in this statge');
                
            }


        }
        catch(Exception $e)
        {   
            return json_encode("Error Please Cheak Again");  
            
        }
    }

    }

    public function finalize(Request $request)
    {
        try
        {
            $id=$request->id;

            $get_status=TourQuotationHeader::where('tour_id',$id)->select('status','qtn_type')->first();

            DB::beginTransaction();

            if($get_status->status==2)
            {   
                $qt_data=TourQuotationHeader::where('tour_id',$id)->first();
                
                $qt_data->status=3;
                $qt_data->pp_rate=$request->pp_tour_adlt_rate;
                $qt_data->child_pp_rate=$request->pp_tour_chld_rate;
                
                $qt_data->save();
               
               if($get_status->qtn_type==2){                                  

                    $paxSlotData = json_decode($request->gp_paxrate);

                    foreach($paxSlotData as $paxSlotData_lst){

                        $update_qtgp_paxRate = TourQouteGpVehicleTypes::where('id',$paxSlotData_lst->paxlstid)->first();
                        
                        $update_qtgp_paxRate->pp_rate = $paxSlotData_lst->pp_rate;
                        
                        $update_qtgp_paxRate->save();
                       
                    }
               }

               DB::commit();
               return 'added';               
               
            }
            
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            return 'Error please check again';

        }
    }

    public function update_room_allocation(Request $req){
        
        if($req->ajax()){
            
            $tour_id = $req->tourid;
            $sgl = $req->sgl;
            $dbl = $req->dbl;
            $twn = $req->twn;
            $tbl = $req->tbl;
            $qd = $req->qd;
            
            try{

                DB::beginTransaction();

                
                $del_roomAllocation = TourQuoteRoomAllocation::where('tour_id',$tour_id)->first();

                if($del_roomAllocation!=''){
                    $del_roomAllocation = TourQuoteRoomAllocation::where('tour_id',$tour_id)->delete();
                }



                $roomAllocation = new TourQuoteRoomAllocation();

                $roomAllocation->tour_id = $tour_id;
                $roomAllocation->sgl = $sgl;
                $roomAllocation->dbl = $dbl;
                $roomAllocation->twn = $twn;
                $roomAllocation->tbl = $tbl;
                $roomAllocation->qd = $qd;
                $roomAllocation->save();

                DB::commit();

                return json_encode('added');                           

            }catch(Exception $ex){
                DB::rollBack();
                return json_encode('* Some field cannot be empty!, Please check before save ');
                
            }
            


           // return json_encode('added');
        }
    }

    public function get_excg_mis(Request $request)
    {
        if($request->ajax()){

               
           $data_mis=DB::table('currency_exchange_rates')
                        ->select('currency_exchange_rates.amount')
                        ->where('currency_exchange_rates.currency_A',$request->cur_a)
                        ->where('currency_exchange_rates.currency_B',$request->cur_b)
                        ->first();
                        return json_encode($data_mis);        
        }
    }
    
    public function destroy(TourQuotationHeader $tourQuotationHeader)
    {
        //
    }

    public function selectHotelByCity(Request $request)
    {
        
        if($request->ajax()){            
            $cityID = $request->city;
            $hotels=Supplier::where('city_id',$cityID)->where('type','Hotel')->select('id','sup_s_name')->get();
            
    		return json_encode($hotels);
           
    	}

    }
}
