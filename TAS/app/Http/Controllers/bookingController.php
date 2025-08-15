<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourQuotationHeader;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\AccmdReservation;
use App\TourQoutHotelComSupliment;
use App\TourQoutHotelOptmSupliment;
use App\TourQuotTransport;
use App\VehicleType;
use App\Supplier;
use App\ReservationMisc;
use App\AccmdResevationVoucherHeader;
use App\TrData;
use App\AccmdResevationVoucherDetails;
use Illuminate\Support\Facades\DB;
use App\MiscReserveVoucherHeader;
use App\MiscReserveVoucherDetail;
use App\TransportReserve;
use App\GuideAllocation;
use App\MisTourAdvReqHeader;
use App\MisTourAdvReqDetail;
use App\GuestAllocation;
use App\GuideAllocateVoucherHeader;
use App\GuideAllocateVoucherDetail;
use App\TourQuotGuideDetails;
use App\GuideHotelVoucherHeader;
use App\GuideHotelVoucherDetail;
use App\GuideHotelReserve;
use App\TourQuoteRoomAllocation;
use App\TourQuotationHotelDetails;
use App\Tax;
use App\Currency;
use App\Market;
use App\Branch;
use App\Agent;
use App\TourType;
use App\TourQuotMisc;
use App\GuideType;
use App\Language;
use Spatie\Browsershot\Browsershot;
use PDF;


class bookingController extends companyController
{
    //

    private $page_postion;
    private $tb_pos;



    public function __construct()
    {
        $this->middleware('auth');


        //
        $this->page_postion=1;

    }

    public function index()
    {
           try{

            return view('tour_section_bookings.list.index');

           }catch(\Exception $e){

                return abort(404);
           }

    }

    public function dashboard_index($t_id)
    {

        try{


                $t_header_data=TourQuotationHeader::where('tour_id',$t_id)->first();
                // return $t_header_data;

                $noofguestadded = GuestAllocation::where('tour_id',$t_id)->count();

                $noofHotels_lst = TourQuotationHotelDetails::where('tour_id',$t_id)->where('status',1)->select('supplier_id')->get();
                $noofHotels_lst_gp =  $noofHotels_lst->groupBy('supplier_id');
                $noofHotels = collect($noofHotels_lst_gp)->count();

                $noofGuides_lst = DB::table('tour_quot_guide_details')
                                    ->join('guide_allocations','guide_allocations.tour_quot_guide_detail_id','=','tour_quot_guide_details.id')
                                    ->where('tour_quot_guide_details.tour_id',$t_id)->where('guide_allocations.status',2)->select('guide_allocations.supplier_id')->get();
                $noofGuides_lst_gp =  $noofGuides_lst->groupBy('supplier_id');

                $noofGuides = collect($noofGuides_lst_gp)->count();

                $noofVehicles = DB::table('tour_quot_transports')
                                ->join('transport_reserves','transport_reserves.tour_quot_transport_id','=','tour_quot_transports.id')
                                ->where('tour_quot_transports.tour_id',$t_id)
                                ->where('transport_reserves.status',1)
                                ->count();

                $DistanceDtList = DB::table('tour_quot_locations')
                                ->join('tour_quot_distances','tour_quot_distances.tour_quot_location_id','=','tour_quot_locations.id')
                                ->select('tour_quot_distances.*','tour_quot_locations.tour_day','tour_quot_locations.ttkms')
                                ->orderBy('tour_quot_distances.pos')
                                ->where('tour_quot_locations.tour_id',$t_id)
                                ->get();

            $LocationDtList_gp = $DistanceDtList->groupBy('tour_day');
            // return $noofGuides;

            return view('tour_section_bookings.dashboard.index',compact('t_header_data','noofguestadded','noofHotels','noofGuides',
                         'noofVehicles','LocationDtList_gp'));

          }catch(\Exception $e){

               return 'sasdad'.$e;
          }


    }

    public function amalgamate_create($id){

         try{

            $currency_list = Currency::all();
            $maket_list = Market::all();
            $branch_list =Branch::all();
            $tourType = TourType::all();
            $agents = Agent::all();

            $amalgamate = 1;

            $tour_quote_data = TourQuotationHeader::where('tour_id',$id)->first();
            return view('tour_section_bookings.amalgamate.create',compact('currency_list','maket_list','branch_list','tourType','agents','amalgamate','tour_quote_data'));

         }catch(\Exception $e){

              return abort(404);
         }


    }

    public function generate_misc_voucher($id)
    {
           try{

        $companyName = companyController::$companyName;
        $address = companyController::$Address_details;
        $telephone = companyController::$telephone_details;
        $web_mail = companyController::$web_mail_details;
        //return $companyName;
        try{




                        $tour_datd=DB::table('misc_reserve_voucher_details')
                                    ->join('misc_reserve_voucher_headers','misc_reserve_voucher_headers.id','=','misc_reserve_voucher_details.misc_reserve_voucher_header_id')
                                    ->join('tour_quotation_headers','tour_quotation_headers.id','=','misc_reserve_voucher_headers.tour_quotation_header_id')
                                    ->join('users','users.id','=','misc_reserve_voucher_headers.user_id')
                                    ->where('misc_reserve_voucher_headers.misc_voucher_no',$id)
                                    ->select('misc_reserve_voucher_details.id')
                                    ->first();


                                    $dt_mis_tbl=DB::table('misc_reserve_voucher_details')
                                             ->join('misc_reserve_voucher_headers','misc_reserve_voucher_headers.id','=','misc_reserve_voucher_details.misc_reserve_voucher_header_id')
                                            ->join('reservation_miscs','reservation_miscs.id','=','misc_reserve_voucher_details.reservation_misc_id')
                                            ->join('tour_quot_miscs','tour_quot_miscs.id','=','reservation_miscs.tour_quote_misc_id')
                                            ->join('suppliers','suppliers.id','=','reservation_miscs.supplier_id')
                                            ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')
                                            ->where('misc_reserve_voucher_headers.misc_voucher_no',$id)
                                            ->select('misc_reserve_voucher_headers.pax','misc_categories.category','tour_quot_miscs.qty','tour_quot_miscs.rate_lkr','suppliers.sup_name')
                                            ->get();


                                // return $dt_mis_tbl;


                                    $tour_data_dt=DB::table('misc_reserve_voucher_headers')
                                            ->join('tour_quotation_headers','tour_quotation_headers.id','=','misc_reserve_voucher_headers.tour_quotation_header_id')
                                            ->join('users','users.id','=','misc_reserve_voucher_headers.user_id')
                                            ->join('suppliers','suppliers.id','=','misc_reserve_voucher_headers.supplier_id')
                                            ->where('misc_reserve_voucher_headers.misc_voucher_no',$id)
                                            ->select('misc_reserve_voucher_headers.*','suppliers.id','suppliers.sup_name','tour_quotation_headers.remarks as tour_remarks','users.name','tour_quotation_headers.title',
                                            'tour_quotation_headers.tour_code','tour_quotation_headers.frm_date','tour_quotation_headers.tour_code_no','tour_quotation_headers.to_date')
                                            ->get();

                //    return $tour_data_dt;

            $rowCount = $tour_data_dt->count();

            // return $rowCount;

            if($rowCount != 0){

                return view('tour_section_bookings.print_doc.misc_resrvation',compact('companyName','address','telephone','web_mail','tour_data_dt','dt_mis_tbl'));
            }else{
                return back();
            }

        }catch(Exception $ex){

            return "Error";
            return back();

        }
    }catch(\Exception $e){

         return abort(404);
    }

    }



    public function liveSearch(Request $request)
    {
         if($request->ajax()){

            try
            {

            $queryd = $request->get('query');

            $output = '';
            // $data ='';

            if($queryd != '') {



              $grp_data = DB::table('tour_quotation_headers')
                   ->join('tour_booking_lists','tour_booking_lists.tour_id','=','tour_quotation_headers.tour_id')
                   ->select('tour_quotation_headers.tour_id','tour_quotation_headers.tour_code_no',
                   'tour_quotation_headers.tour_code','tour_quotation_headers.title','tour_quotation_headers.pax_adult',
                   'tour_quotation_headers.remarks','tour_quotation_headers.frm_date','tour_quotation_headers.to_date',
                   'tour_quotation_headers.status','tour_quotation_headers.version_id','tour_booking_lists.tour_ammd_id','tour_booking_lists.tour_ammd','tour_booking_lists.tour_ammd_type')
                   ->where('tour_quotation_headers.confirmed','=',1)
                   ->where('tour_quotation_headers.promotion','=',0)
                   ->where('tour_quotation_headers.tour_id','LIKE','%'.$queryd.'%')
                   ->orWhere('tour_quotation_headers.tour_code','LIKE','%'.$queryd.'%')
                   ->orWhere('tour_quotation_headers.remarks','LIKE','%'.$queryd.'%')
                   ->orWhere('tour_quotation_headers.title','LIKE','%'.$queryd.'%')
                   ->orWhere('tour_quotation_headers.frm_date','LIKE','%'.$queryd.'%')
                   ->orderBy('tour_booking_lists.tour_ammd','ASC')
                   ->get();


                 $data = $grp_data->groupBy('tour_ammd_id');

                $total_row = count((array)$data);

               // return json_encode($grp_data);

            }else{

                $grp_data = DB::table('tour_quotation_headers')
                ->join('tour_booking_lists','tour_booking_lists.tour_id','=','tour_quotation_headers.tour_id')
                ->select('tour_quotation_headers.tour_id','tour_quotation_headers.tour_code_no',
                'tour_quotation_headers.tour_code','tour_quotation_headers.title','tour_quotation_headers.pax_adult',
                'tour_quotation_headers.remarks','tour_quotation_headers.frm_date','tour_quotation_headers.to_date',
                'tour_quotation_headers.status','tour_quotation_headers.version_id','tour_booking_lists.tour_ammd_id','tour_booking_lists.tour_ammd','tour_booking_lists.tour_ammd_type')
                        ->where('tour_quotation_headers.promotion','0')
                        ->where('tour_quotation_headers.confirmed','1')
                        ->orderBy('tour_booking_lists.tour_ammd','ASC')->get();

                $data = $grp_data->groupBy('tour_ammd_id');

                $total_row = $data->count();
            }

           // return json_encode($data);

            if($total_row > 0 ){

                $state = '';
                //$output='';

            foreach($data as $datas => $rows)
            {
                $output.='
                <tr>
                      <th class="bg-secondary active" colspan="9">&nbsp;&nbsp;&nbsp;Tour Code : '.$rows[0]->tour_code.'</th>
                </tr>
                ';

                foreach ($rows as $row){

                    $state = '';
                    // $pre_post = 'Main Tour';

                    $btn_amlgmt='';
                    $mt_row_color ='';
                    $tilteammd = '';
                    $amlgmt='';

                        if($row->status == 1){
                            $state ='<span class="m-badge m-badge--brand m-badge--wide">New</span>';
                        }elseif($row->status == 2){
                            $state ='<span class="m-badge m-badge--warning m-badge--wide">In Process</span>';
                        }elseif($row->status == 3){
                            $state ='<span class="m-badge m-badge--metal m-badge--wide">Pending</span>';
                        }elseif($row->status == 4){
                            $state ='<span class="m-badge m-badge--danger m-badge--wide">Canceled</span>';
                        }


                        if($row->tour_ammd_type == 0){

                            $pre_post='<i class="la la-align-center text-warning" title="Main Tour"></i>';

                            $mt_row_color ='table-secondary';
                            $tilteammd = '';

                            $btn_amlgmt='
                                <a href="/tour/booking/amalgamate/'.$row->tour_id.'/create"
                                class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"
                                title="Amalgamate">
                                <i class="fa fa-copy"></i>
                                </a>
                            ';

                        }else if($row->tour_ammd_type == 1){
                            $pre_post='<i class="la la-angle-double-up text-metal" title="Pre Bookings"></i>';
                            $tilteammd = '<span class="m-badge m-badge--info m-badge--wide">>> <b>Amalgamate '.$row->tour_ammd.' </b> << </span>';
                            $btn_amlgmt='
                                        <a href=""  class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only" title="Update Quotation">
                                        <i class="fa fa-edit"></i>
                                        </a>
                            ';
                        }else if($row->tour_ammd_type == 2){
                            $amlgmt='disabled';
                            $pre_post='<i class="la la-angle-double-down text-metal" title="Post Bookings"></i>';
                            $tilteammd = '<span class="m-badge m-badge--info m-badge--wide">>> <b>Amalgamate '.$row->tour_ammd.' </b> << </span>';
                            $btn_amlgmt='
                                        <a href="" '.$amlgmt.' class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only" title="Update Quotation">
                                        <i class="fa fa-edit"></i>
                                        </a>
                            ';
                        }



                        $rt=route('load_dashboard',$row->tour_id);


                    $output .= '
                             <tr class="'.$mt_row_color.'">
                                <td style="text-align: center;">'.$row->tour_id.'</td>
                                <td style="text-align: left;">'.str_limit($row->title,30).' '.$tilteammd.'</td>
                                <td style="text-align: center;">'.$row->pax_adult.'</td>
                                <td style="text-align: center;">'.$row->frm_date.'</td>
                                <td style="text-align: center;">'.$row->to_date.'</td>
                                <td style="text-align: center;">'.$pre_post.'</td>

                                <td>'.str_limit($row->remarks,35).'</td>
                                <td style="text-align: center;">'. $state.'</td>
                                <td style="text-align: center; white-space: nowrap; overflow: hidden;">
                                '.$btn_amlgmt.'
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


       }catch(Exception $ex){

        return json_encode('Error:'.$ex);

        }
    }

    }





public function guest_allocation($tour_id){

       try{

        $tourQuotHeader =TourQuotationHeader::where('tour_id',$tour_id)->first();


        $guest_allocate_data=DB::table('guest_allocations')
                            ->join('tour_quotation_headers','tour_quotation_headers.tour_id','=','guest_allocations.tour_id')
                            ->select('tour_quotation_headers.title','guest_allocations.*')
                            ->where('tour_quotation_headers.tour_id',$tour_id)
                            ->get();

         return view('tour_section_bookings.components.guest_allocation',compact('tourQuotHeader','guest_allocate_data'));

       }catch(\Exception $e){

            return abort(404);
       }
    }

    public function save_guestDetails(Request $request){

        if($request->ajax()){



            try{

                $guest_details=json_decode($request->guest_dataStore);
                $rowCount = count((array)$guest_details);

                $tour_ID=$request->id;

                if($rowCount!=0){

                    foreach($guest_details as $guest_detail){

                        $guest_allocate = new GuestAllocation;
                        $guest_allocate->tour_id=$tour_ID;
                        $guest_allocate->guest_name=$guest_detail->gst_name;
                        $guest_allocate->dob=$guest_detail->gst_dob;
                        $guest_allocate->flight_no=$guest_detail->gst_passno;
                        $guest_allocate->passport_no=$guest_detail->gst_flino;
                        $guest_allocate->arrival_date=$guest_detail->gst_arvdt;
                        $guest_allocate->depature_date=$guest_detail->gst_dptdt;
                        $guest_allocate->remarks=$guest_detail->gst_remark;
                        $guest_allocate->save();
                    }

                   return json_encode('saved');

                }

            }
            catch(Exception $ex){

                return json_encode("* Some field cannot be empty!, Please check before save");
                // return json_encode($ex);
            }
        }



    }



    public function misc_view($id)
    {
          try{

        $misc_views=Db::table('tour_quot_miscs')
        ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')

        ->select('misc_categories.Rate','misc_categories.mc_pax','misc_categories.category','misc_categories.id',
        'tour_quot_miscs.qty','tour_quot_miscs.totlkr','tour_quot_miscs.ex_rate','tour_quot_miscs.id','tour_quot_miscs.pos as t_pos',
        'tour_quot_miscs.tour_id','tour_quot_miscs.misc_categorie_id','tour_quot_miscs.id')
        ->where('tour_quot_miscs.tour_id',$id)
        ->orderBy('tour_quot_miscs.pos')
        ->get();

        // return $misc_views;
            $tourQuotHeader = TourQuotationHeader::where('tour_id',$id)->where('confirmed',1)->first();



                                $get_adv=ReservationMisc::all();
                                        //    return $get_adv;




            // $supplier_data=Supplier::where('type','Misc')->select('id','sup_s_name')->get();
            $supplier_data=DB::table('suppliers')
                    ->where('suppliers.type','Guide')
                    ->orwhere('suppliers.type','Misc')
                    ->select('suppliers.id','suppliers.sup_s_name')
                    ->get();
            // return $supplier_data;

            $mis_data_dt=DB::table('tour_quot_miscs')
            ->join('reservation_miscs','reservation_miscs.tour_quote_misc_id','=','tour_quot_miscs.id')
            ->where('tour_quot_miscs.tour_id',$id)
            ->select('tour_quot_miscs.pos','tour_quot_miscs.ex_rate','tour_quot_miscs.rate_lkr','reservation_miscs.*')
            ->get();


            $mis_vocher=DB::table('reservation_miscs')
            ->join('suppliers','suppliers.id','=','reservation_miscs.supplier_id')
            ->join('tour_quot_miscs','tour_quot_miscs.id','=','reservation_miscs.tour_quote_misc_id')
            ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')
            ->select('reservation_miscs.status','suppliers.sup_s_name','suppliers.id as sup_id','misc_categories.category','misc_categories.mc_pax','misc_categories.Rate','tour_quot_miscs.qty','tour_quot_miscs.totlkr','reservation_miscs.id','tour_quot_miscs.id as mis_qut_id','tour_quot_miscs.ex_rate')
            ->where('reservation_miscs.advance',0)
            ->where('tour_quot_miscs.tour_id',$id)
           ->orderBy('reservation_miscs.id','ASC')
            ->get();
         $drp_voucher=$mis_vocher->groupBy('sup_id');



        //  return $drp_voucher;
            $chk_mis_status=DB::table('reservation_miscs')
                               ->where('reservation_miscs.status',1)
                               ->select('reservation_miscs.status')
                               ->get();




            $tour_advance_voucher=DB::table('reservation_miscs')
            ->join('suppliers','suppliers.id','=','reservation_miscs.supplier_id')
            ->join('tour_quot_miscs','tour_quot_miscs.id','=','reservation_miscs.tour_quote_misc_id')
            ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')
            ->join('tour_quotation_headers','tour_quotation_headers.id','=','tour_quot_miscs.tour_quotation_header_id')
            // ->join('mis_tour_adv_req_headers','tour_quotation_headers.id','=','mis_tour_adv_req_headers.tour_quotation_header_id')
            ->select('tour_quotation_headers.title','reservation_miscs.status','suppliers.sup_s_name','suppliers.id as sup_id','misc_categories.category','misc_categories.mc_pax','misc_categories.Rate','tour_quot_miscs.qty','tour_quot_miscs.totlkr','reservation_miscs.id','tour_quot_miscs.id as mis_qut_id')
            ->where('reservation_miscs.advance',1)
            ->where('tour_quot_miscs.tour_id',$id)
            ->orderBy('reservation_miscs.id','ASC')
            ->get();




            $drp_voucher_advance=$tour_advance_voucher->groupBy('sup_id');



            $tour_advance_vouchers=DB::table('reservation_miscs')
                                    ->join('mis_tour_adv_req_details','mis_tour_adv_req_details.reservation_misc_id','=','reservation_miscs.id')
                                    ->join('tour_quot_miscs','tour_quot_miscs.id','=','reservation_miscs.tour_quote_misc_id')
                                    ->join('mis_tour_adv_req_headers','mis_tour_adv_req_headers.id','=','mis_tour_adv_req_details.mis_tour_adv_req_header_id')
                                     ->select('reservation_miscs.status',

                                    'reservation_miscs.id','mis_tour_adv_req_headers.Requested_For','mis_tour_adv_req_headers.Required_Date',
                                    'mis_tour_adv_req_headers.Settlement_Date','mis_tour_adv_req_headers.remarks')
                                    ->where('reservation_miscs.advance',1)
                                    ->where('tour_quot_miscs.tour_id',$id)
                                    ->orderBy('reservation_miscs.id','ASC')
                                    ->get();









         $hasVoucher_list_misc = DB::table('misc_reserve_voucher_headers')
         ->join('users','users.id','=','misc_reserve_voucher_headers.user_id')
         ->join('misc_reserve_voucher_details','misc_reserve_voucher_details.misc_reserve_voucher_header_id','=','misc_reserve_voucher_headers.id')
         ->join('reservation_miscs','reservation_miscs.id','=','misc_reserve_voucher_details.reservation_misc_id')
         ->select('misc_reserve_voucher_headers.*','users.name as user_name','reservation_miscs.advance')
         ->where('tour_id',$id)
         ->where('reservation_miscs.advance',0)
         ->get();






         $hasVoucher_list_misc_advacne= DB::table('mis_tour_adv_req_headers')
         ->join('users','users.id','=','mis_tour_adv_req_headers.user_id')
         ->join('mis_tour_adv_req_details','mis_tour_adv_req_details.mis_tour_adv_req_header_id','=','mis_tour_adv_req_headers.id')
         ->join('reservation_miscs','reservation_miscs.id','=','mis_tour_adv_req_details.reservation_misc_id')
         ->select('mis_tour_adv_req_headers.*','users.name as user_name','reservation_miscs.advance')
         ->where('tour_id',$id)
         ->where('reservation_miscs.advance',1)
         ->get();

         $has_dt=DB::table('mis_tour_adv_req_details')
                      ->join('mis_tour_adv_req_headers','mis_tour_adv_req_headers.id','=','mis_tour_adv_req_details.mis_tour_adv_req_header_id')
                      ->join('reservation_miscs','reservation_miscs.id','=','mis_tour_adv_req_details.reservation_misc_id')
                      ->join('tour_quot_miscs','tour_quot_miscs.id','=','reservation_miscs.tour_quote_misc_id')
                      ->join('users','users.id','=','mis_tour_adv_req_headers.user_id')
                      ->select('mis_tour_adv_req_headers.*','users.name as user_name','reservation_miscs.advance' )
                      ->where('tour_quot_miscs.tour_id',$id)
                      ->where('reservation_miscs.advance',1)
                      ->get();


         $tour_reserve=MisTourAdvReqHeader::where('tour_id',$id)->get();

//    $tab_pos=$this->tb_pos;
            //  $tab_pos=$this->page_postion;
             $this->tb_pos=$this->page_postion;
             $tab_pos= $this->tb_pos;


            //  $tb=02;
        //    return $this->page_postion;
             $this->page_postion=1;

            //  return $this->page_postion;
            //  return $tab_pos;

            // return $this->tb_pos;
        // return $tab_pos;

        // return $tab_pos;

        // return $this->tb_pos;
        //    return $drp_voucher;

        return view('tour_section_bookings.components.miscellanies_view',compact('tab_pos','get_adv','has_dt','tour_advance_vouchers','tour_reserve','chk_mis_status','hasVoucher_list_misc_advacne','misc_views','supplier_data','mis_data_dt','tourQuotHeader','drp_voucher','hasVoucher_list_misc','drp_voucher_advance'));
    }catch(\Exception $e){

          return abort(404);
    }

    }



    public function misc_reserve_store(Request $request)
    {

    //    $this->page_postion=$requet->pg_tab;
    //    return json_encode($requet->pg_tab);


        if($request->ajax())
        {

            try{



                $mis_vies_data = json_decode($request->data_dt);
                $_rowCount = count((array)$mis_vies_data);



              if($_rowCount!=0)
              {


                foreach($mis_vies_data as $mis)
                {
                    $misc_id=$mis->mis_id;

                    $mis_data=ReservationMisc::where('tour_quote_misc_id',$misc_id)->select('id')->first();

                    if($mis_data !='')
                    {

                     ReservationMisc::where('tour_quote_misc_id',$misc_id)->delete();
                    }


                        if($mis->sup_id == 0)
                        {
                            return json_encode('Please select suppler');
                        }
                        else
                        {

                            // return json_encode($mis->id);

                        $reservation_mis= new ReservationMisc();
                        $reservation_mis->tour_quote_misc_id=$mis->mis_id;
                        $reservation_mis->supplier_id=$mis->sup_id;
                        $reservation_mis->advance=$mis->s_advance;
                        $reservation_mis->status=$mis->status;
                        $reservation_mis->pos = $mis->id;
                        $reservation_mis->save();

                        $tour_qt_reserve_misc_req_qty_update = TourQuotMisc::findOrFail($mis->mis_id);
                        $tour_qt_reserve_misc_req_qty_update->qty = $mis->misc_qty;
                        $tour_qt_reserve_misc_req_qty_update->save();

                    }
                }


                return json_encode('saved');
              }
            }
            catch(\Exception $e)
            {
                return Json_encode("Error".$e);
            }
        }

    }


    public function route_view($id){

          try{
            $tourQuotHeader = TourQuotationHeader::where('tour_id',$id)->first();

            $DistanceDtList = DB::table('tour_quot_locations')
                                ->join('tour_quot_distances','tour_quot_distances.tour_quot_location_id','=','tour_quot_locations.id')
                                ->select('tour_quot_distances.*','tour_quot_locations.tour_day','tour_quot_locations.ttkms')
                                ->orderBy('tour_quot_distances.pos')
                                ->where('tour_quot_locations.tour_id',$id)
                                ->get();

            $LocationDtList_gp = $DistanceDtList->groupBy('tour_day');
            // return $LocationDtList_gp;

            return view('tour_section_bookings.components.route_view',compact('tourQuotHeader','LocationDtList_gp'));

          }catch(\Exception $e){

              return abort(404);
          }

    }

    public function hotel_reserve($tourId){
          try{

        $tourQuotHeader = TourQuotationHeader::where('tour_id',$tourId)->first();


        $tourQuoteHotels = DB::table('tour_quotation_hotels')
        ->join('tour_quotation_hotel_details','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
        ->join('suppliers','tour_quotation_hotel_details.supplier_id','suppliers.id')
        ->join('currencies','tour_quotation_hotel_details.currency_id','=','currencies.id')
        ->join('hotel_packages','tour_quotation_hotel_details.hotel_package_id','=','hotel_packages.id')
        ->join('room_types','hotel_packages.room_type_id','=','room_types.id')
        ->join('meal_planes','hotel_packages.meal_plane_id','=','meal_planes.id')
        ->where('tour_quotation_hotels.tour_id',$tourId)
        ->select('tour_quotation_hotels.id as qt_hote_id','suppliers.sup_s_name','hotel_packages.Package_name','hotel_packages.from_date','hotel_packages.to_date','meal_planes.meal_plane','room_types.r_type','currencies.code as crcode','tour_quotation_header_id','tour_quotation_hotels.tour_date','tour_quotation_hotels.tour_day',
                   'tour_quotation_hotel_details.id','tour_quotation_hotel_details.tour_quotation_hotel_id','tour_quotation_hotel_details.tour_id',
                   'tour_quotation_hotel_details.pos','tour_quotation_hotel_details.supplier_id','tour_quotation_hotel_details.hotel_package_id','tour_quotation_hotel_details.ss_rate',
                   'tour_quotation_hotel_details.ss_com','tour_quotation_hotel_details.db_rate','tour_quotation_hotel_details.db_com','tour_quotation_hotel_details.trp_rate',
                   'tour_quotation_hotel_details.trp_com','tour_quotation_hotel_details.trp_com','tour_quotation_hotel_details.trp_com',
                   'tour_quotation_hotel_details.qtb_rate','tour_quotation_hotel_details.qtb_com','tour_quotation_hotel_details.currency_id',
                   'tour_quotation_hotel_details.rate_to_base','tour_quotation_hotel_details.sql_splm','tour_quotation_hotel_details.dbl_splm',
                   'tour_quotation_hotel_details.tbl_splm','tour_quotation_hotel_details.qd_splm')
        ->get();



        $tourQuoteHotel_gp = $tourQuoteHotels->groupBy('tour_day');
        //des
        $tourQouHotelComSup = DB::table('tour_qout_hotel_com_supliments')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_com_supliments.tour_quotation_hotel_detail_id')
                                    ->join('compulsory_supliments','compulsory_supliments.id','=','tour_qout_hotel_com_supliments.compulsory_supliment_id')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos','compulsory_supliments.des','compulsory_supliments.cs_code',
                                            'tour_qout_hotel_com_supliments.spos','tour_qout_hotel_com_supliments.compulsory_supliment_id',
                                            'tour_qout_hotel_com_supliments.rate_type','tour_qout_hotel_com_supliments.exrate','tour_qout_hotel_com_supliments.csup_amount',
                                            'tour_qout_hotel_com_supliments.qty','tour_qout_hotel_com_supliments.id','tour_qout_hotel_com_supliments.cheked')
                                    ->where('tour_qout_hotel_com_supliments.tour_id',$tourId)
                                    ->orderBy('tour_qout_hotel_com_supliments.spos', 'ASC')
                                    ->get();
            $tourQouHotelComSup_gp =$tourQouHotelComSup->groupBy('tour_day');

            $tourQouHotelOptSup = DB::table('tour_qout_hotel_optm_supliments')
                                    ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','tour_qout_hotel_optm_supliments.tour_quotation_hotel_detail_id')
                                    ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                    ->join('optional_supliments','optional_supliments.id','=','tour_qout_hotel_optm_supliments.optional_supliment_id')
                                    ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos','optional_supliments.ops_code','optional_supliments.des',
                                            'tour_qout_hotel_optm_supliments.spos','tour_qout_hotel_optm_supliments.optional_supliment_id',
                                            'tour_qout_hotel_optm_supliments.rate_type','tour_qout_hotel_optm_supliments.opsup_amount',
                                            'tour_qout_hotel_optm_supliments.qty','tour_qout_hotel_optm_supliments.id','tour_qout_hotel_optm_supliments.cheked')
                                    ->where('tour_qout_hotel_optm_supliments.tour_id',$tourId)
                                    ->orderBy('tour_qout_hotel_optm_supliments.spos', 'ASC')
                                    ->get();

            $tourQouHotelOptSup_gp = $tourQouHotelOptSup->groupBy('tour_day');

            $tour_resr_rmQty = DB::table('accmd_reservations')
                                 ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','accmd_reservations.tour_quotation_hotel_detail_id')
                                 ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                 ->select('tour_quotation_hotels.tour_day','tour_quotation_hotel_details.pos','accmd_reservations.*','tour_quotation_hotel_details.id as tqhtd_id')
                                 ->where('tour_quotation_hotels.tour_id',$tourId)
                                 ->get();

            $reservation_voucher_list = DB::table('accmd_reservations')
                                            ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','accmd_reservations.tour_quotation_hotel_detail_id')
                                            ->join('suppliers','suppliers.id','=','tour_quotation_hotel_details.supplier_id')
                                            ->join('hotel_packages','hotel_packages.id','=','tour_quotation_hotel_details.hotel_package_id')
                                            ->join('room_types','hotel_packages.room_type_id','=','room_types.id')
                                            ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                            ->join('meal_planes','meal_planes.id','=','hotel_packages.meal_plane_id')
                                            ->select('tour_quotation_hotels.tour_day','suppliers.id as supid','tour_quotation_hotels.tour_date','suppliers.sup_s_name',
                                                    'tour_quotation_hotel_details.pos','accmd_reservations.*','hotel_packages.Package_name','meal_planes.meal_plane','room_types.r_type')
                                            ->where('tour_quotation_hotels.tour_id',$tourId)
                                            ->where('accmd_reservations.status','!=',0)
                                            ->orderBy('tour_quotation_hotels.tour_day', 'ASC')
                                            ->get();

            $reservation_voucher_list_gp = $reservation_voucher_list->groupBy('supid');

            $hasVoucher_list = DB::table('accmd_resevation_voucher_headers')
                                ->join('users','users.id','=','accmd_resevation_voucher_headers.user_id')
                                ->select('accmd_resevation_voucher_headers.*','users.name as user_name')
                                ->where('tour_id',$tourId)->get();

            $roomAllocation = TourQuoteRoomAllocation::where('tour_id',$tourId)->get();
            //return $roomAllocation->all();

        return view('tour_section_bookings.components.hotels_view',compact('tourQuoteHotel_gp','tourQouHotelComSup_gp',
                    'tourQouHotelOptSup_gp','tourQuotHeader','tour_resr_rmQty','reservation_voucher_list_gp','hasVoucher_list','roomAllocation'));


          }catch(\Exception $e){
            //return 'SADASD'.$e;
              return abort(404);
          }


    }

    public function accmd_reserve_store(Request $req){

        if($req->ajax()){

            $resv_cmpdata = json_decode($req->cmpSupListData);
            $resv_optdata = json_decode($req->OptSupListData);

            $qoutHTDHeaderID =$req->ht_dt_id;
            $tourID = $req->tourID;

            $cmp_rowCount = count((array)$resv_cmpdata);
            $opt_rowCount = count((array)$resv_optdata);


                try{
                    DB::beginTransaction();

                    $checkAVBLc_details = AccmdReservation::where('tour_quotation_hotel_detail_id', $qoutHTDHeaderID)->select('id')->first();

                    if ($checkAVBLc_details != '') {

                        AccmdReservation::where('tour_quotation_hotel_detail_id', $qoutHTDHeaderID)->delete();
                    }
                            //return json_encode($tourID);
                            $tourQoutHeaderUp = TourQuotationHeader::where('tour_id',$tourID)->first();
                            $tourQoutHeaderUp->status = 2;
                            $tourQoutHeaderUp->save();

                           // return json_encode($tourID);
                            $amcdRes = new AccmdReservation();

                            $amcdRes->tour_quotation_hotel_detail_id  = $qoutHTDHeaderID;
                            // $amcdRes->vpos = $req->sgl_rm_qty;
                            $amcdRes->sgl_qty = $req->sgl_rm_qty;
                            $amcdRes->dbl_qty = $req->dbl_rm_qty;
                            $amcdRes->twn_qty = $req->twn_rm_qty;
                            $amcdRes->tbl_qty = $req->tbl_rm_qty;
                            $amcdRes->qd_qty = $req->qd_rm_qty;

                            $amcdRes->total_sup = $req->totSup;
                            $amcdRes->total_rmc = $req->totalRoomCost;
                            //$amcdRes->amnd = 0;
                            $amcdRes->status = 1;
                            $amcdRes->save();



                        if($cmp_rowCount !=0){

                                foreach($resv_cmpdata as $resv_cmpdata_lst)
                                {

                                    $rowID = $resv_cmpdata_lst->tblRowId;

                                    $tourHotelCmpSup = TourQoutHotelComSupliment::find($rowID);
                                    $tourHotelCmpSup->qty = $resv_cmpdata_lst->cmp_qty;
                                    $tourHotelCmpSup->cheked = $resv_cmpdata_lst->chk;
                                    $tourHotelCmpSup->save();



                                }

                            }

                            if($opt_rowCount !=0){

                                foreach($resv_optdata as $resv_optdata_lst)
                                {

                                    $rowID = $resv_optdata_lst->tblRowId;

                                    $tourHotelOptSup = TourQoutHotelOptmSupliment::find($rowID);
                                    $tourHotelOptSup->qty = $resv_optdata_lst->opt_qty;
                                    $tourHotelOptSup->cheked = $resv_optdata_lst->chk;
                                    $tourHotelOptSup->save();

                                }

                            }




                    DB::commit();

                return json_encode('saved');


                }catch(Exception $ex){

                    DB::rollBack();
                    return json_encode('Sorry!, Something went wrong. Error');

                }



       }

    }

    public function reservation_amend_accmd(Request $req){

        if($req->ajax()){

            $resv_cmpdata = json_decode($req->cmpSupListData);
            $resv_optdata = json_decode($req->OptSupListData);

            $qoutHTDHeaderID =$req->ht_dt_id;
            $tourID = $req->tourID;

            $cmp_rowCount = count((array)$resv_cmpdata);
            $opt_rowCount = count((array)$resv_optdata);


                try{



                    $checkAVBLc_details = AccmdReservation::where('tour_quotation_hotel_detail_id', $qoutHTDHeaderID)->get();

                    if ($checkAVBLc_details != '') {

                        DB::beginTransaction();

                            $amcdRes = AccmdReservation::where('tour_quotation_hotel_detail_id',$qoutHTDHeaderID)->first();

                            //$amcdRes->tour_quotation_hotel_detail_id  = $qoutHTDHeaderID;
                            // $amcdRes->vpos = $req->sgl_rm_qty;
                            $amcdRes->sgl_qty = $req->sgl_rm_qty;
                            $amcdRes->dbl_qty = $req->dbl_rm_qty;
                            $amcdRes->twn_qty = $req->twn_rm_qty;
                            $amcdRes->tbl_qty = $req->tbl_rm_qty;
                            $amcdRes->qd_qty = $req->qd_rm_qty;

                            $amcdRes->total_sup = $req->totSup;
                            $amcdRes->total_rmc = $req->totalRoomCost;
                            // $amcdRes->amnd = 0;
                            $amcdRes->status = 2;
                            $amcdRes->save();

                            $accmd_reserverVoucher_added = DB::table('accmd_resevation_voucher_details')
                                                                    ->join('accmd_resevation_voucher_headers','accmd_resevation_voucher_headers.id','=','accmd_resevation_voucher_details.accmd_resevation_voucher_header_id')
                                                                    ->join('accmd_reservations','accmd_reservations.id','=','accmd_resevation_voucher_details.accmd_reservation_id')
                                                                    ->select('accmd_resevation_voucher_headers.hotel_voucher_no','accmd_resevation_voucher_headers.amnd')
                                                                    ->where('accmd_reservations.tour_quotation_hotel_detail_id',$qoutHTDHeaderID)
                                                                    ->first();

                                                                    //return json_encode($accmd_reserverVoucher_added);


                            if($accmd_reserverVoucher_added!=''){

                                $voucherNo = $accmd_reserverVoucher_added->hotel_voucher_no;

                                $Accmd_reserved_Vch_change = AccmdResevationVoucherHeader::where('hotel_voucher_no',$voucherNo)->first();
                                $Accmd_reserved_Vch_change->amnd = ($accmd_reserverVoucher_added->amnd + 1);
                                $Accmd_reserved_Vch_change->save();

                            }

                        if($cmp_rowCount !=0){

                                foreach($resv_cmpdata as $resv_cmpdata_lst)
                                {

                                    $rowID = $resv_cmpdata_lst->tblRowId;

                                    $tourHotelCmpSup = TourQoutHotelComSupliment::find($rowID);
                                    $tourHotelCmpSup->qty = $resv_cmpdata_lst->cmp_qty;
                                    $tourHotelCmpSup->cheked = $resv_cmpdata_lst->chk;
                                    $tourHotelCmpSup->save();

                                }

                            }

                            if($opt_rowCount !=0){

                                foreach($resv_optdata as $resv_optdata_lst)
                                {

                                    $rowID = $resv_optdata_lst->tblRowId;

                                    $tourHotelOptSup = TourQoutHotelOptmSupliment::find($rowID);
                                    $tourHotelOptSup->qty = $resv_optdata_lst->opt_qty;
                                    $tourHotelOptSup->cheked = $resv_optdata_lst->chk;
                                    $tourHotelOptSup->save();

                                }

                            }

                    DB::commit();

                    session(['alert-type' => 'success']);
                    session(['message' => 'Hotels Reservation Amended successfully!']);

                return json_encode('saved');

                }

                }catch(Exception $ex){

                    DB::rollBack();
                    return json_encode('Sorry!, Something went wrong. Error'.$ex);

                }



       }
    }

    public function accmd_reserve_voucher($id){

    try{

        $companyName = companyController::$companyName;
        $address = companyController::$Address_details;
        $telephone = companyController::$telephone_details;
        $web_mail = companyController::$web_mail_details;
        //return $companyName;
        try{


        // $tableData = '';
                $voucherData = DB::table('accmd_resevation_voucher_details')
                                ->join('accmd_reservations','accmd_reservations.id','=','accmd_resevation_voucher_details.accmd_reservation_id')
                                ->join('accmd_resevation_voucher_headers','accmd_resevation_voucher_headers.id','accmd_resevation_voucher_details.accmd_resevation_voucher_header_id')
                                ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','accmd_reservations.tour_quotation_hotel_detail_id')
                                ->join('hotel_packages','tour_quotation_hotel_details.hotel_package_id','=','hotel_packages.id')
                                ->join('room_types','hotel_packages.room_type_id','=','room_types.id')
                                ->join('meal_planes','hotel_packages.meal_plane_id','=','meal_planes.id')
                                ->join('tour_quotation_hotels','tour_quotation_hotels.id','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                ->where('accmd_resevation_voucher_headers.hotel_voucher_no',$id)
                                ->select('accmd_reservations.sgl_qty','accmd_reservations.dbl_qty','accmd_reservations.twn_qty',
                                    'accmd_reservations.tbl_qty','accmd_reservations.qd_qty','tour_quotation_hotels.tour_date',
                                    'tour_quotation_hotels.tour_day','tour_quotation_hotel_details.hotel_package_id','room_types.r_type','meal_planes.meal_plane',
                                    'hotel_packages.id as pkgid')
                                ->orderBy('tour_quotation_hotels.tour_day', 'ASC')
                                ->get();

            $voucherHead = DB::table('accmd_resevation_voucher_headers')
                                ->join('users','users.id','=','accmd_resevation_voucher_headers.user_id')
                                ->join('suppliers','suppliers.id','=','accmd_resevation_voucher_headers.supplier_id')
                                ->join('tour_quotation_headers','tour_quotation_headers.id','accmd_resevation_voucher_headers.tour_quotation_header_id')
                                ->where('accmd_resevation_voucher_headers.hotel_voucher_no',$id)
                                ->select('accmd_resevation_voucher_headers.hotel_voucher_no','users.name as user_name','tour_quotation_headers.tour_code',
                                    'accmd_resevation_voucher_headers.confirmed_date','accmd_resevation_voucher_headers.confirmed_by_name',
                                    'accmd_resevation_voucher_headers.client_name','accmd_resevation_voucher_headers.rates',
                                    'accmd_resevation_voucher_headers.remarks','accmd_resevation_voucher_headers.condi',
                                    'accmd_resevation_voucher_headers.pax','suppliers.sup_s_name','accmd_resevation_voucher_headers.amnd')
                                ->get();

        //return $voucherData;

            $rowCount = $voucherData->count();


            if($rowCount != 0){

                return view('tour_section_bookings.print_doc.hotel_voucher',compact('companyName','address','telephone','web_mail','voucherData','voucherHead'));
            }else{
                return back();
            }

        }catch(Exception $ex){

            return back();

        }
    }catch(\Exception $e){

          return abort(404);
    }

    }

    public function misc_reserve_generate(Request $request)
    {
        $this->page_postion=$request->pg_tab;
        // return json_encode($this->page_postion);

        // return json_encode('Assigned');
        if($request->ajax())
        {
            try
            {

                $tourID = $request->tourID;
                $tourQouteHeaderID = $request->qoutheaderId;
                $supid = $request->supID;



                $rates = $request->rates;
                $remarks = $request->remarks;
                $conf_to = $request->conf_to;
                $conf_by = $request->conf_by;
                $conf_date = $request->conf_date;
                $noof_pax = $request->noof_pax;
                $client_name = $request->client_name;
                $condition1 =$request->condition1;

                $mis_pax_data=json_decode($request->mis_dt_type);
                $packs_count=count((array)$mis_pax_data);

                if($packs_count!=0)
                {

                $hasActiveVouchermis = MiscReserveVoucherHeader::where('supplier_id',$supid)
                                                                ->where('tour_id',$tourID)
                                                                ->where('status',1)->first();


                if($hasActiveVouchermis ==''){

                    try{


                        DB::beginTransaction();

                        $voucherNoUpdate = TrData::where('id',3)->select('id','tour_id')->first();

                        $voucherNo =($voucherNoUpdate->tour_id)+1;
                        $voucherNoUpdate->tour_id = $voucherNo;
                        $voucherNoUpdate->save();

                        $newVoucher = new MiscReserveVoucherHeader();

                        $newVoucher->misc_voucher_no = $voucherNo;
                        $newVoucher->tour_quotation_header_id = $tourQouteHeaderID;
                        $newVoucher->tour_id = $tourID;
                        $newVoucher->vpos = $request->Row_Count;
                        $newVoucher->user_id = Auth::user()->id;
                        $newVoucher->supplier_id = $supid;
                        $newVoucher->confirmed_date = $conf_date;
                        $newVoucher->confirmed_by_name = $conf_by;
                        $newVoucher->client_name = $client_name;
                        $newVoucher->rates = $rates;
                        $newVoucher->remarks = $remarks;
                        $newVoucher->condi = $condition1;
                        $newVoucher->pax = $noof_pax;

                        $newVoucher->status = 1;
                        $newVoucher->save();

                        $voucherHeaderLastID = MiscReserveVoucherHeader::select('id')->orderBy('id', 'DESC')->first();

                        foreach($mis_pax_data as $pkgs){

                            $newVoucherDetails = new MiscReserveVoucherDetail();
                            $newVoucherDetails->misc_reserve_voucher_header_id = $voucherHeaderLastID->id;
                            $newVoucherDetails->reservation_misc_id = $pkgs->mis_row_id;
                            $newVoucherDetails->save();

                            $updateStateAccmd_reservation = ReservationMisc::find($pkgs->mis_row_id);
                            $updateStateAccmd_reservation->status = 2;
                            $updateStateAccmd_reservation->save();

                        }


                        DB::commit();

                        return json_encode('added');

                    }catch(Exception $ex)
                    {
                        DB::rollBack();
                        return json_encode('* Some field cannot be empty!, Please check before save');
                    }

                }
                else
                {
                    return json_encode('exceed');
                }

                }

            }
            catch(Exception $eeex)
            {
                    return json_encode('error');
            }




        }

    }

    public function find_rm_list_data(Request $req){

        if($req->ajax()){

            $sup_id = $req->sup_id;
            $tour_id = $req->tour_id;

            try{
                $output='';

                $pkgdata = DB::table('accmd_resevation_voucher_details')
                            ->join('accmd_resevation_voucher_headers','accmd_resevation_voucher_headers.id','=','accmd_resevation_voucher_details.accmd_resevation_voucher_header_id')
                            ->join('accmd_reservations','accmd_reservations.id','=','accmd_resevation_voucher_details.accmd_reservation_id')
                            ->join('tour_quotation_hotel_details','tour_quotation_hotel_details.id','=','accmd_reservations.tour_quotation_hotel_detail_id')
                            ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                            ->join('hotel_packages','hotel_packages.id','=','tour_quotation_hotel_details.hotel_package_id')
                            ->join('meal_planes','meal_planes.id','=','hotel_packages.meal_plane_id')
                            ->join('room_types','room_types.id','=','hotel_packages.room_type_id')

                            ->select('accmd_reservations.*','tour_quotation_hotels.tour_date','tour_quotation_hotels.tour_day','meal_planes.meal_plane',
                                        'room_types.r_type','hotel_packages.Package_name')
                            ->where('accmd_resevation_voucher_headers.supplier_id',$sup_id)
                            ->where('accmd_resevation_voucher_headers.tour_id',$tour_id)
                            ->get();
                            //accmd_resevation_voucher_details.hotel_package_id
                    $row_no =0;
                    foreach($pkgdata as $pkgdata_lst){
                        $row_no++;

                        $output.='
                            <tr style="text-align: center;">
                                <td>
                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                        <input id="rm_lst_pkg_chk_'.$row_no.'" onchange="" type="checkbox" >&nbsp;
                                                <span></span>
                                    </label>
                                     <input id="rm_lst_accmd_reserve_id_'.$row_no.'" type="hidden" value="'.$pkgdata_lst->id.'">
                                </td>
                                <td>'.$row_no.'</td>
                                <td style="text-align: left;">'.$pkgdata_lst->Package_name.' / '.$pkgdata_lst->r_type.'</td>
                                <td>'.$pkgdata_lst->tour_date.'</td>
                                <td>'.$pkgdata_lst->meal_plane.'</td>
                                <td>'.$pkgdata_lst->sgl_qty.'</td>
                                <td>'.$pkgdata_lst->dbl_qty.'</td>
                                <td>'.$pkgdata_lst->twn_qty.'</td>
                                <td>'.$pkgdata_lst->tbl_qty.'</td>
                                <td>'.$pkgdata_lst->qd_qty.'</td>
                            </tr>
                        ';

                    }
                    return json_encode($output);

            }catch(Exception $ex){

                return json_encode('Error:');
            }


        }

    }
    public function search_rm_list_data(Request $req)
    {

        if($req->ajax()){

            try{

                $output='';

                $tour_id = $req->tour_id;
                $sql_qry = $req->sql_qry;

                if($tour_id!=0){

                    if($sql_qry !='')
                    {
                        $guestData = GuestAllocation::where('tour_id',$tour_id)
                                                    ->where('guest_name','LIKE','%'.$sql_qry.'%')
                                                    ->orWhere('passport_no','LIKE','%'.$sql_qry.'%')
                                                    ->get();

                                                                                         // return json_encode($guestData);
                    }else{

                        $guestData = GuestAllocation::where('tour_id',$tour_id)
                                                    ->get();
                    }
                    $rowCount = $guestData->count();

                    if($rowCount!=0)
                    {
                        $row_pos = 0;
                        foreach($guestData as $guest_list)
                        {

                            $row_pos++;

                                $output.='
                                    <tr style="text-align: center;">
                                        <td>
                                            <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                    <input id="rm_guetsmd_chk_'.$row_pos.'" onchange="" type="checkbox" >&nbsp;
                                                    <span></span>
                                            </label>
                                        </td>
                                        <td>'.$guest_list->id.'</td>
                                        <input id="guest_id_'.$row_pos.'" type="hidden" value="'.$guest_list->id.'">
                                        <td id="guest_name_'.$row_pos.'" style="text-align: left;">'.$guest_list->guest_name.'</td>
                                        <td>'.$guest_list->passport_no.'</td>
                                        <td>'.$guest_list->arrival_date.'</td>
                                        <td>'.$guest_list->depature_date.'</td>
                                        <td id="guest_remarks_'.$row_pos.'" style="text-align: left;">'.$guest_list->remarks.'</td>
                                    </tr>';
                        }

                    }else{
                        $output='
                                    <tr>
                                        <td colspan="6"></td>
                                    </tr>';
                    }

                    return json_encode($output);
                }
            }catch(Exception $ex){
                return json_encode('Error:'.$ex);
            }

        }
    }

    public function accmd_reserve_genarate(Request $req)
    {

        if($req->ajax()){

            $tourID = $req->tourID;
            $tourQouteHeaderID = $req->qoutheaderId;
            $supid = $req->supId;

            $rates = $req->rates;
            $remarks = $req->remarks;
            $conf_to = $req->conf_to;
            $conf_by = $req->conf_by;
            $conf_date = $req->conf_date;
            $noof_pax = $req->noof_pax;
            $client_name = $req->client_name;
            $condition1 = $req->condition1;

            $pkgdata = json_decode($req->pkgdata);
            $pkgdata_count =count((array)$pkgdata);
            // try{
                //return json_encode($req->all());

        if($pkgdata_count!=0)
           {

                $hasActiveVoucher = AccmdResevationVoucherHeader::where('supplier_id',$supid)
                                                                 ->where('tour_id',$tourID)
                                                                 ->where('status',1)->first();

                if($hasActiveVoucher ==''){
                    try{


                        DB::beginTransaction();

                        $voucherNoUpdate = TrData::where('id',2)->select('id','tour_id')->first();

                        $voucherNo =($voucherNoUpdate->tour_id)+1;
                        $voucherNoUpdate->tour_id = $voucherNo;
                        $voucherNoUpdate->save();

                        $newVoucher = new AccmdResevationVoucherHeader();

                        $newVoucher->hotel_voucher_no = $voucherNo;
                        $newVoucher->tour_quotation_header_id = $tourQouteHeaderID;
                        $newVoucher->tour_id = $tourID;
                        $newVoucher->vpos = $req->rowId_rg;
                        $newVoucher->user_id = Auth::user()->id;
                        $newVoucher->supplier_id = $supid;
                        $newVoucher->confirmed_date = $conf_date;
                        $newVoucher->confirmed_by_name = $conf_by;
                        $newVoucher->client_name = $client_name;
                        $newVoucher->rates = $rates;
                        $newVoucher->remarks = $remarks;
                        $newVoucher->condi = $condition1;
                        $newVoucher->pax = $noof_pax;
                        $newVoucher->amnd = 0;
                        $newVoucher->status = 2;
                        $newVoucher->save();

                        $voucherHeaderLastID = AccmdResevationVoucherHeader::select('id')->orderBy('id', 'DESC')->first();

                        foreach($pkgdata as $pkgs){

                            $newVoucherDetails = new AccmdResevationVoucherDetails();
                            $newVoucherDetails->accmd_resevation_voucher_header_id = $voucherHeaderLastID->id;
                            $newVoucherDetails->accmd_reservation_id = $pkgs->rowId;

                            $newVoucherDetails->save();

                            $updateStateAccmd_reservation = AccmdReservation::find($pkgs->rowId);
                            $updateStateAccmd_reservation->status = 2;
                            $updateStateAccmd_reservation->save();

                        }


                        DB::commit();
                        return json_encode('added');

                    }catch(Exception $ex)
                    {
                        DB::rollBack();
                        return json_encode('* Some field cannot be empty!, Please check before save');
                    }


                }else{
                    return json_encode('exceed');
                }

            }

            // }catch(Exception $ex)
            // {   //DB::rollBack();
            //     return json_encode('Sorry!, Something went wrong. Error'.$ex);
            // }



        }


    }

    public function misc_reserve_voucher(Request $req){

        $companyName = companyController::$companyName;
        $address = companyController::$Address_details;
        $telephone = companyController::$telephone_details;
        $web_mail = companyController::$web_mail_details;
        //return $companyName;




        return view('tour_section_bookings.print_doc.misc_resrvation',compact('companyName','address','telephone','web_mail'));

    }


    public function transport_allocation($id){

          try{

       // $gp_vehivletypeDataSaved = tourQouteGpVehicleTypes::where('tour_quotation_header_id',$tourQuotHeader->id)->get();


        $VehicleTypes = VehicleType::all();

        $tourQuotHeader = TourQuotationHeader::where('tour_id',$id)->first();

        $transport_details=DB::table('tour_quot_transports')
                                ->join('tour_quotation_headers','tour_quotation_headers.id',"=",'tour_quot_transports.tour_quotation_header_id')
                                ->join('vehicle_types','vehicle_types.id',"=",'tour_quot_transports.vehicle_type_id')
                                ->select('tour_quot_transports.pos','tour_quotation_headers.to_date','tour_quotation_headers.frm_date','vehicle_types.type',
                                            'vehicle_types.no_of_seats','tour_quot_transports.millage','tour_quot_transports.rate_pkm','tour_quot_transports.totlkr',
                                            'tour_quotation_headers.tour_code','tour_quot_transports.id as trns_id','tour_quot_transports.vehicle_type_id','tour_quot_transports.trp_ls_Mkp')
                                ->where('tour_quot_transports.tour_id',"=",$id)
                                ->where('tour_quotation_headers.confirmed',1)
                                ->get();


        // return $transport_details;
       // $t_trns=TourQuotTransport::where('tour_id',$id)->first();

        $tr_reserve=TransportReserve::all();

        $reserve_transpoarts=DB::table('transport_reserves')
                            ->join('tour_quot_transports','tour_quot_transports.id','=','transport_reserves.tour_quot_transport_id')
                            ->join('vehicle_types','vehicle_types.id',"=",'tour_quot_transports.vehicle_type_id')
                            ->where('tour_quot_transports.tour_id',$id)
                            ->select('transport_reserves.frm_date','transport_reserves.to_date','tour_quot_transports.millage','tour_quot_transports.rate_pkm','tour_quot_transports.totlkr','vehicle_types.type','vehicle_types.no_of_seats','transport_reserves.id','transport_reserves.status','tour_quot_transports.id as trns_id')
                            ->get();

                            // return $reserve_transpoarts;
        // return $reserve_transpoart;
        // return $tr_reserve;
        // return $transport_details;

        // if($transport_details->count()!=0){

            return view('tour_section_bookings.components.transport_view',compact('transport_details','id','tr_reserve','reserve_transpoarts','VehicleTypes','tourQuotHeader'));

        // }
        // else
        // {
        //     return back();
        // }

    }catch(\Exception $e){

          return abort(404);
    }

    }

    public function transport_addto_reserve(Request $request)
    {

        try
        {

            // $checkAVBLc_details = AccmdReservation::where('tour_quotation_hotel_detail_id', $qoutHTDHeaderID)->select('id')->first();

            // if ($checkAVBLc_details != '') {

            //     AccmdReservation::where('tour_quotation_hotel_detail_id', $qoutHTDHeaderID)->delete();
            // }


            if($request->ajax())
            {
                    $aa=0;

                $tr_data=json_decode($request->trns_data);
                $tr_count=count((array)$tr_data);

                if($tr_count!=0)
                {
                    foreach($tr_data as $t_dta)
                    {
                        $t_id=$t_dta->tr_quot_id;
                        $dt=TransportReserve::where('tour_quot_transport_id',$t_id)->select('id')->first();
                        if($dt !='')
                        {
                            TransportReserve::where('tour_quot_transport_id',$t_id)->delete();

                        }

                        $tr_dt=new TransportReserve;
                           $tr_dt->user_id= Auth::user()->id;
                           $tr_dt->tour_quot_transport_id=$t_dta->tr_quot_id;
                           $tr_dt->frm_date=$t_dta->tr_frm_dt;
                           $tr_dt->to_date=$t_dta->tr_to_dt;
                           $tr_dt->status=$t_dta->status;
                           $tr_dt->save();



                    }
                    return json_encode('saved');
                }


            }






        }catch(Exception $ex)
        {
            return  json_encode("Error");
        }


    }




    public function misc_reserve_advance_store(Request $request)
    {

        $this->page_postion=$request->page_tab;

        if($request->ajax())
        {
            try
            {

                $tourID = $request->tourID;
                $tourQouteHeaderID = $request->qoutheaderId;
                $supid = $request->supID;




                $remarks = $request->remarks;
                $rq_for = $request->rq_for;
                $rq_ad_dt = $request->rq_ad_dt;
                $setle_dt = $request->setle_dt;

                $mis_pax_data=json_decode($request->mis_dt_type_advance);
                $packs_count=count((array)$mis_pax_data);

                if($packs_count!=0)
                {

                $hasActiveVouchermis_advance = MisTourAdvReqHeader::where('supplier_id',$supid)
                                                                ->where('tour_id',$tourID)
                                                                ->where('status',1)->first();


                if($hasActiveVouchermis_advance ==''){

                    try{


                        DB::beginTransaction();

                        $voucherNoUpdate = TrData::where('id',4)->select('id','tour_id')->first();

                        $voucherNo =($voucherNoUpdate->tour_id)+1;
                        $voucherNoUpdate->tour_id = $voucherNo;
                        $voucherNoUpdate->save();

                        $newVoucher = new MisTourAdvReqHeader();

                        $newVoucher->misc_voucher_no = $voucherNo;
                        $newVoucher->tour_quotation_header_id = $tourQouteHeaderID;
                        $newVoucher->tour_id = $tourID;
                        $newVoucher->vpos = $request->Row_Count;
                        $newVoucher->user_id = Auth::user()->id;
                        $newVoucher->supplier_id = $supid;
                        $newVoucher->Requested_For = $rq_for;
                        $newVoucher->Required_Date = $rq_ad_dt;
                        $newVoucher->Settlement_Date = $setle_dt;

                        $newVoucher->remarks = $remarks;
                        $newVoucher->status = 1;
                        $newVoucher->save();

                        $voucherHeaderLastID = MisTourAdvReqHeader::select('id')->orderBy('id', 'DESC')->first();

                        foreach($mis_pax_data as $pkgs){

                            $newVoucherDetails = new MisTourAdvReqDetail();
                            $newVoucherDetails->mis_tour_adv_req_header_id = $voucherHeaderLastID->id;
                            $newVoucherDetails->reservation_misc_id = $pkgs->mis_row_id;
                            $newVoucherDetails->save();

                            $updateStateAccmd_reservation = ReservationMisc::find($pkgs->mis_row_id);
                            $updateStateAccmd_reservation->status = 1;
                            $updateStateAccmd_reservation->save();

                        }


                        DB::commit();
                        return json_encode('added');

                    }catch(Exception $ex)
                    {
                        DB::rollBack();
                        return json_encode('* Some field cannot be empty!, Please check before save');
                    }

                }
                else
                {
                    return json_encode('exceed');
                }

                }

            }
            catch(Exception $eeex)
            {
                    return json_encode('error');
            }




        }

    }


    public function misc_reserve_advance_generate_voucher($v_id)
    {
        try{

        $companyName = companyController::$companyName;
        $address = companyController::$Address_details;
        $telephone = companyController::$telephone_details;
        $web_mail = companyController::$web_mail_details;



        $dt_mis_tbl_advance=DB::table('mis_tour_adv_req_details')
        ->join('mis_tour_adv_req_headers','mis_tour_adv_req_headers.id','=','mis_tour_adv_req_details.mis_tour_adv_req_header_id')
       ->join('reservation_miscs','reservation_miscs.id','=','mis_tour_adv_req_details.reservation_misc_id')
       ->join('tour_quot_miscs','tour_quot_miscs.id','=','reservation_miscs.tour_quote_misc_id')
       ->join('misc_categories','misc_categories.id','=','tour_quot_miscs.misc_categorie_id')
       ->where('mis_tour_adv_req_headers.misc_voucher_no',$v_id)
       ->select('misc_categories.category','misc_categories.Rate','misc_categories.id')
       ->get();

    //    return $dt_mis_tbl_advance;

        $tour_data_dt_advance=DB::table('mis_tour_adv_req_headers')
       ->join('tour_quotation_headers','tour_quotation_headers.id','=','mis_tour_adv_req_headers.tour_quotation_header_id')
       ->join('users','users.id','=','mis_tour_adv_req_headers.user_id')
       ->join('suppliers','suppliers.id','=','mis_tour_adv_req_headers.supplier_id')
       ->where('mis_tour_adv_req_headers.misc_voucher_no',$v_id)
       ->select('suppliers.code','suppliers.sup_s_name','mis_tour_adv_req_headers.*','tour_quotation_headers.pax_adult','tour_quotation_headers.pax_child','users.name','tour_quotation_headers.title','tour_quotation_headers.tour_code','tour_quotation_headers.frm_date','tour_quotation_headers.tour_code_no',
       'tour_quotation_headers.frm_date','tour_quotation_headers.to_date')
       ->get();

    //    return $tour_data_dt_advance;

    // return $v_id;


        $rowCount = $dt_mis_tbl_advance->count();
        if($rowCount != 0)
        {
            return view('tour_section_bookings.print_doc.tour_advanced',compact('companyName','address','telephone','web_mail','tour_data_dt_advance','dt_mis_tbl_advance'));

        }
        else
        {
            return back();
        }
    }catch(\Exception $e){

          return abort(404);
    }



    }

    public function guide_view($t_id)
    {


        try{


                    $tourQuotHeader =TourQuotationHeader::where('tour_id',$t_id)->first();


                    $tourQuoteGuides=DB::table('tour_quot_guide_details')
                    ->join('tour_quot_guides','tour_quot_guides.id','=','tour_quot_guide_details.tour_quot_guide_id')
                    ->join('tour_quotation_headers','tour_quot_guides.tour_quotation_header_id','=','tour_quotation_headers.id')
                    ->join('guide_types','guide_types.id','=','tour_quot_guide_details.guide_type_id')
                    ->join('languages','tour_quot_guide_details.language_id','=','languages.id')
                    ->where('tour_quot_guide_details.tour_id',$t_id)
                    ->select('languages.lang_name','guide_types.g_type',
                            'tour_quot_guide_details.guide_fee','tour_quot_guide_details.room_rate','tour_quot_guide_details.guide_type_id',
                            'tour_quot_guide_details.guide_room_id',
                            'tour_quot_guide_details.pos','tour_quot_guides.tour_day','tour_quot_guide_details.id')

                    ->get();

                    $tour_guiderserv = DB::table('guide_allocations')
                        ->join('tour_quot_guide_details','tour_quot_guide_details.id','=','guide_allocations.tour_quot_guide_detail_id')
                        ->join('tour_quot_guides','tour_quot_guides.id','=','tour_quot_guide_details.tour_quot_guide_id')
                        ->select('tour_quot_guides.tour_day','tour_quot_guide_details.pos','guide_allocations.*')
                        ->where('tour_quot_guides.tour_id',$t_id)
                        ->get();

                    $guide_room_types=DB::table('guide_room_types')
                            ->join('guide_rooms','guide_rooms.guide_room_type_id','=','guide_room_types.id')
                            ->select('guide_room_types.gr_types','guide_rooms.id')
                            ->get();


                    $sup_guide=DB::table('guides')
                                ->join('suppliers','guides.supplier_id','=','suppliers.id')
                                ->join('guide_types','guide_types.id','=','guides.guide_type_id')
                                ->where('suppliers.type','Guide')
                                ->select('suppliers.sup_s_name','suppliers.id','guides.guide_type_id')
                                ->get();



                    $guide_hotels=DB::table('suppliers')
                            ->join('guide_rooms','guide_rooms.supplier_id','=','suppliers.id')
                            ->select('suppliers.sup_s_name','guide_rooms.id')
                            ->get();

                    $guide_voucher=DB::table('guide_allocations')
                                ->join('suppliers','guide_allocations.supplier_id','=','suppliers.id')
                                ->join('tour_quot_guide_details','guide_allocations.tour_quot_guide_detail_id','=','tour_quot_guide_details.id')
                                ->join('tour_quot_guides','tour_quot_guides.id','=','tour_quot_guide_details.tour_quot_guide_id')
                                ->join('guide_types','guide_types.id','=','tour_quot_guide_details.guide_type_id')
                                ->join('languages','tour_quot_guide_details.language_id','=','languages.id')
                                ->where('tour_quot_guide_details.tour_id',$t_id)
                                ->select('languages.lang_name','guide_types.g_type',
                                            'tour_quot_guide_details.guide_fee','tour_quot_guides.tour_date',
                                            'tour_quot_guide_details.tour_id',
                                            'tour_quot_guides.tour_day','suppliers.sup_s_name','suppliers.id as supid','guide_allocations.*')
                                ->orderBy('tour_quot_guides.tour_day','ASC')
                                ->get();

                    $guide_hotel_voucher=DB::table('guide_hotel_reserves')
                                ->join('tour_quot_guide_details','guide_hotel_reserves.tour_quot_guide_detail_id','=','tour_quot_guide_details.id')
                                ->join('guide_allocations','guide_allocations.tour_quot_guide_detail_id','=','tour_quot_guide_details.id')
                                ->join('tour_quot_guides','tour_quot_guides.id','=','tour_quot_guide_details.tour_quot_guide_id')
                                ->join('guide_types','guide_types.id','=','tour_quot_guide_details.guide_type_id')
                                ->join('guide_rooms','tour_quot_guide_details.guide_room_id','=','guide_rooms.id')
                                ->join('guide_room_types','guide_rooms.guide_room_type_id','=','guide_room_types.id')
                                ->join('suppliers','suppliers.id','=','guide_rooms.supplier_id')
                                ->where('tour_quot_guide_details.tour_id',$t_id)
                                ->select('guide_types.g_type','tour_quot_guide_details.guide_room_id','tour_quot_guide_details.guide_type_id',
                                        'tour_quot_guide_details.room_rate','tour_quot_guides.tour_date','guide_allocations.supplier_id',
                                        'tour_quot_guide_details.tour_id','guide_types.g_type','guide_room_types.gr_types',
                                        'tour_quot_guides.tour_day','suppliers.sup_s_name as supname','suppliers.id as supid','guide_hotel_reserves.*')
                                ->get();



                    $tourQuoteguidehotel_voucher=$guide_hotel_voucher->groupBy('supid');

                    $tourQuoteguide_details=$tourQuoteGuides->groupBy('tour_day');

                    $tourQuoteguide_voucher=$guide_voucher->groupBy('supid');

                    $hasVoucher_list = DB::table('guide_allocate_voucher_headers')
                                            ->join('users','users.id','=','guide_allocate_voucher_headers.user_id')
                                            ->select('guide_allocate_voucher_headers.*','users.name as user_name')
                                            ->where('tour_id',$t_id)
                                            ->get();

                    $hashotelVoucher_list = DB::table('guide_hotel_voucher_headers')
                                            ->join('users','users.id','=','guide_hotel_voucher_headers.user_id')
                                            ->select('guide_hotel_voucher_headers.*','users.name as user_name')
                                            ->where('tour_id',$t_id)
                                            ->get();

                    $gp_tour_guide_data = DB::table('tour_quote_gp_guides_details')
                                            ->join('tour_quotation_headers','tour_quotation_headers.id','=','tour_quote_gp_guides_details.tour_quotation_header_id')
                                            ->select('tour_quote_gp_guides_details.bsratelkr')
                                            ->where('tour_quotation_headers.tour_id',$t_id)
                                            ->first();


                    $guide_types_list = GuideType::all();
                    $guide_lang_list = Language::all();

                    $tourQoutGuide = DB::table('tour_quot_guides')
                                    ->join('tour_quot_guide_details','tour_quot_guide_details.tour_quot_guide_id','=','tour_quot_guides.id')
                                    ->join('guide_types','guide_types.id','=','tour_quot_guide_details.guide_type_id')
                                    ->join('languages','languages.id','=','tour_quot_guide_details.language_id')
                                    ->leftJoin('guide_rooms','guide_rooms.id','=','tour_quot_guide_details.guide_room_id')
                                    ->leftJoin('currencies','currencies.id','=','guide_rooms.currency_id')
                                    ->where('tour_quot_guides.tour_id',$t_id)
                                    ->select('tour_quot_guides.id','tour_quot_guides.tour_id','tour_quot_guides.tour_day','tour_quot_guides.lkr_rate',
                                                'tour_quot_guide_details.pos','tour_quot_guide_details.has_room','tour_quot_guide_details.guide_room_id',
                                                    'tour_quot_guide_details.guide_fee','tour_quot_guide_details.guide_com','tour_quot_guide_details.room_rate',
                                                    'tour_quot_guide_details.room_com','guide_types.g_type','guide_types.id as gtid','currencies.code as crcode',
                                                        'guide_rooms.id as grmId','tour_quot_guide_details.room_excrate','languages.id as glangid','languages.lang_name')
                                    ->orderBy('tour_quot_guide_details.pos', 'ASC')
                                    ->get();
    //glangid

$tourQoutGuide_gp =$tourQoutGuide->groupBy('tour_day');


        return view('tour_section_bookings.components.guide_view',
                    compact('tourQuotHeader','tourQuoteDetail','tourQuoteguide_details','sup_guide','room_types','guide_hotels','tourQuoteguide_voucher',
                            'hasVoucher_list','guide_room_types','tourQuoteguidehotel_voucher','hashotelVoucher_list','tour_guiderserv','gp_tour_guide_data',
                            'guide_types_list','guide_lang_list','tourQoutGuide_gp'));
           }catch(\Exception $e){

               return abort(404);
           }
    }

    public function save_guideDetails(Request $request){

        if($request->ajax()){

            $tq_gdt_ID=$request->gt_gdt_id;
            $sup_ID=$request->sup_id;

            try{
                $check_details = GuideAllocation::where('tour_quot_guide_detail_id', $tq_gdt_ID)->select('supplier_id')->first();

                if ($check_details != '') {

                    return "You cannot add same supplier for one day";
                }
                // else{

                    $guide_allocate = new GuideAllocation;
                    $guide_allocate->tour_quot_guide_detail_id=$tq_gdt_ID;
                    $guide_allocate->supplier_id=$sup_ID;
                    $guide_allocate->status=1;
                    $guide_allocate->save();

                    $guide_hotel = new GuideHotelReserve;
                    $guide_hotel->tour_quot_guide_detail_id=$tq_gdt_ID;
                    $guide_hotel->status=1;
                    $guide_hotel->save();

                    return json_encode('saved');





                // }

            }
            catch(\Exception $ex){

                return json_encode("* Some field cannot be empty!, Please check before save");

            }
        }
    }

    public function guide_allocate_store(Request $req)
    {

        if($req->ajax()){


            $tourID = $req->tourID;
            $tourQouteHeaderID = $req->qoutheaderId;
            $supid = $req->supId;

            $rates = $req->rates;
            $remarks = $req->remarks;
            $conf_to = $req->conf_to;
            $conf_by = $req->conf_by;
            $conf_date = $req->conf_date;

            $guide_data = json_decode($req->guidedata);
            $guidedata_count =count((array)$guide_data);
            // try{
                //return json_encode($req->all());


        if($guidedata_count!=0)
           {
               try{

            // return json_encode($supid);
                $hasActiveVoucher = GuideAllocateVoucherHeader::where('supplier_id',$supid)
                                                                 ->where('tour_id',$tourID)
                                                                 ->where('status',1)->first();

                if($hasActiveVoucher ==''){
                    try{



                        DB::beginTransaction();

                        $voucherNoUpdate = TrData::where('id',5)->select('id','tour_id')->first();

                        $voucherNo =($voucherNoUpdate->tour_id)+1;
                        $voucherNoUpdate->tour_id = $voucherNo;
                        $voucherNoUpdate->save();

                        $newVoucher = new GuideAllocateVoucherHeader();

                        $newVoucher->guide_voucher_no = $voucherNo;
                        $newVoucher->tour_quotation_header_id = $tourQouteHeaderID;
                        $newVoucher->tour_id = $tourID;
                        $newVoucher->vpos = $req->rowId_rg;
                        $newVoucher->user_id = Auth::user()->id;
                        $newVoucher->supplier_id = $supid;
                        $newVoucher->confirmed_date = $conf_date;
                        $newVoucher->confirmed_by_name = $conf_by;
                        $newVoucher->rates = $rates;
                        $newVoucher->remarks = $remarks;

                        $newVoucher->status = 2;
                        $newVoucher->save();

                        $voucherHeaderLastID = GuideAllocateVoucherHeader::select('id')->orderBy('id', 'DESC')->first();

                        foreach($guide_data as $guides){

                            $newVoucherDetails = new GuideAllocateVoucherDetail();
                            $newVoucherDetails->guide_allocate_voucher_header_id= $voucherHeaderLastID->id;
                            $newVoucherDetails->guide_allocation_id= $guides->rowId;
                            $newVoucherDetails->save();

                            $updateStateGuide_Allocation = GuideAllocation::find($guides->rowId);
                            $updateStateGuide_Allocation->status = 2;
                            $updateStateGuide_Allocation->save();

                        }


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
            }




        }

    }

    public function guide_hotel_store(Request $req)
    {

        if($req->ajax()){


            $tourID = $req->tourID;
            $tourQouteHeaderID = $req->qoutheaderId;
            $supid = $req->supId;

            $rates = $req->rates;
            $remarks = $req->remarks;
            $conf_to = $req->conf_to;
            $conf_by = $req->conf_by;
            $conf_date = $req->conf_date;

            $guide_data = json_decode($req->g_hoteldata);
            $guidedata_count =count((array)$guide_data);
            // try{
                //return json_encode($req->all());


        if($guidedata_count!=0)
           {
               try{

            // return json_encode($supid);
                $hasActiveVoucher = GuideHotelVoucherHeader::where('supplier_id',$supid)
                                                                 ->where('tour_id',$tourID)
                                                                 ->where('status',1)->first();

                if($hasActiveVoucher ==''){
                    try{



                        DB::beginTransaction();

                        $voucherNoUpdate = TrData::where('id',6)->select('id','tour_id')->first();

                        $voucherNo =($voucherNoUpdate->tour_id)+1;
                        $voucherNoUpdate->tour_id = $voucherNo;
                        $voucherNoUpdate->save();

                        $newVoucher = new GuideHotelVoucherHeader();

                        $newVoucher->guide_hotel_voucher_no = $voucherNo;
                        $newVoucher->tour_quotation_header_id = $tourQouteHeaderID;
                        $newVoucher->tour_id = $tourID;
                        $newVoucher->vpos = $req->rowId_rg;
                        $newVoucher->user_id = Auth::user()->id;
                        $newVoucher->supplier_id = $supid;
                        $newVoucher->confirmed_date = $conf_date;
                        $newVoucher->confirmed_by_name = $conf_by;
                        $newVoucher->rates = $rates;
                        $newVoucher->remarks = $remarks;

                        $newVoucher->status = 2;
                        $newVoucher->save();

                        $voucherHeaderLastID = GuideHotelVoucherHeader::select('id')->orderBy('id', 'DESC')->first();

                        foreach($guide_data as $guides){

                            $newVoucherDetails = new GuideHotelVoucherDetail();
                            $newVoucherDetails->guide_hotel_voucher_header_id= $voucherHeaderLastID->id;
                            $newVoucherDetails->guide_hotel_reserve_id= $guides->rowId;
                            $newVoucherDetails->save();

                            $updateStateGuide_Hotel = GuideHotelReserve::find($guides->rowId);
                            $updateStateGuide_Hotel->status = 2;
                            $updateStateGuide_Hotel->save();

                        }


                        DB::commit();
                        return json_encode('added');

                    }catch(Exception $ex)
                    {
                        DB::rollBack();
                        return json_encode('* Some field cannot be empty!, Please check before save');
                    }


                }else{
                    return json_encode('exceed');
                }

            }
            catch(Exception $ex)
            {
                return json_encode("error");
            }
            }




        }

    }



    public function guide_generate_voucher($id)
    {

          try{
        $companyName = companyController::$companyName;
        $address = companyController::$Address_details;
        $telephone = companyController::$telephone_details;
        $web_mail = companyController::$web_mail_details;

        try{



        $voucherData = DB::table('guide_allocate_voucher_details')
            ->join('guide_allocations','guide_allocations.id','=','guide_allocate_voucher_details.guide_allocation_id')
            ->join('guide_allocate_voucher_headers','guide_allocate_voucher_headers.id','=','guide_allocate_voucher_details.guide_allocate_voucher_header_id')
            ->join('tour_quot_guide_details','tour_quot_guide_details.id','=','guide_allocations.tour_quot_guide_detail_id')
            ->join('tour_quot_guides','tour_quot_guide_details.tour_quot_guide_id','=','tour_quot_guides.id')
            ->join('suppliers','guide_allocations.supplier_id','suppliers.id')
            ->where('guide_allocate_voucher_headers.guide_voucher_no',$id)
            ->select('suppliers.sup_s_name','tour_quot_guide_details.guide_fee','tour_quot_guides.tour_date')
            ->orderBy('tour_quot_guides.tour_day', 'ASC')
            ->get();

        $voucherHead = DB::table('guide_allocate_voucher_headers')
                                    ->join('users','users.id','=','guide_allocate_voucher_headers.user_id')
                                    ->join('tour_quotation_headers','tour_quotation_headers.id','guide_allocate_voucher_headers.tour_quotation_header_id')
                                    ->where('guide_allocate_voucher_headers.guide_voucher_no',$id)
                                    ->select('guide_allocate_voucher_headers.guide_voucher_no','users.name as user_name','tour_quotation_headers.tour_code',
                                             'guide_allocate_voucher_headers.confirmed_date','guide_allocate_voucher_headers.confirmed_by_name',
                                             'guide_allocate_voucher_headers.rates',
                                             'guide_allocate_voucher_headers.remarks')
                                    ->get();

            //return $voucherData;

                $rowCount = $voucherData->count();


                if($rowCount != 0){

                    return view('tour_section_bookings.print_doc.guide_voucher',compact('companyName','address','telephone','web_mail','voucherData','voucherHead'));
                }else{
                    return back();
                }

            }catch(Exception $ex){

                return back();

            }
        }catch(\Exception $e){

             return abort(404);
        }

    }

    public function guide_hotel_voucher($id)
    {
          try{
        $companyName = companyController::$companyName;
        $address = companyController::$Address_details;
        $telephone = companyController::$telephone_details;
        $web_mail = companyController::$web_mail_details;

        try{


            // $tableData = '';
        $voucherData = DB::table('guide_hotel_voucher_details')
            ->join('guide_hotel_reserves','guide_hotel_reserves.id','=','guide_hotel_voucher_details.guide_hotel_reserve_id')
            ->join('guide_hotel_voucher_headers','guide_hotel_voucher_headers.id','=','guide_hotel_voucher_details.guide_hotel_voucher_header_id')
            ->join('tour_quot_guide_details','tour_quot_guide_details.id','=','guide_hotel_reserves.tour_quot_guide_detail_id')
            ->join('guide_allocations','guide_allocations.tour_quot_guide_detail_id','=','tour_quot_guide_details.id')
            ->join('guide_types','guide_types.id','=','tour_quot_guide_details.guide_type_id')
            ->join('guide_rooms','tour_quot_guide_details.guide_room_id','=','guide_rooms.id')
            ->join('guide_room_types','guide_rooms.guide_room_type_id','=','guide_room_types.id')
            ->join('tour_quot_guides','tour_quot_guide_details.tour_quot_guide_id','=','tour_quot_guides.id')
            ->join('suppliers as hotel_sup','hotel_sup.id','=','guide_rooms.supplier_id')
            ->join('suppliers as g_sup','guide_allocations.supplier_id','=','g_sup.id')
            ->where('guide_hotel_voucher_headers.guide_hotel_voucher_no',$id)
            ->select('tour_quot_guide_details.room_rate','tour_quot_guides.tour_date','hotel_sup.sup_s_name as hotel_name','g_sup.sup_s_name as guide_name',
                     'guide_types.g_type','guide_room_types.gr_types','guide_allocations.supplier_id')
            ->orderBy('tour_quot_guides.tour_day', 'ASC')
            ->get();

        $voucherHead = DB::table('guide_hotel_voucher_headers')
                ->join('users','users.id','=','guide_hotel_voucher_headers.user_id')
                ->join('tour_quotation_headers','tour_quotation_headers.id','guide_hotel_voucher_headers.tour_quotation_header_id')
                ->where('guide_hotel_voucher_headers.guide_hotel_voucher_no',$id)
                ->select('guide_hotel_voucher_headers.guide_hotel_voucher_no','users.name as user_name','tour_quotation_headers.tour_code',
                         'guide_hotel_voucher_headers.confirmed_date','guide_hotel_voucher_headers.confirmed_by_name',
                         'guide_hotel_voucher_headers.rates',
                         'guide_hotel_voucher_headers.remarks')
                ->get();


         $sup_guide=DB::table('guides')
                ->join('suppliers','guides.supplier_id','=','suppliers.id')
                ->join('guide_types','guide_types.id','=','guides.guide_type_id')
                ->where('suppliers.type','Guide')
                ->select('suppliers.sup_s_name','suppliers.id','guides.guide_type_id')
                ->get();

            //return $voucherData;

                $rowCount = $voucherData->count();


                if($rowCount != 0){

                    return view('tour_section_bookings.print_doc.guide_hotel_voucher',compact('companyName','address','telephone','web_mail','voucherData','voucherHead','sup_guide'));
                }else{
                    return back();
                }

            }catch(Exception $ex){

                return back();

            }
        }catch(\Exception $e){

              return abort(404);
        }

    }
    public function rooming_list_voucher()
    {
          try{
            $companyName = companyController::$companyName;
            $address = companyController::$Address_details;
            $telephone = companyController::$telephone_details;
            $web_mail = companyController::$web_mail_details;

        return view('tour_section_bookings.print_doc.rooming_list',compact('companyName','address','telephone','web_mail'));

          }catch(\Exception $e){

              return abort(404);
          }

    }


    public function tour_booking_guest_allocate_index($t_id)
    {
          try{

                // $guest_allocate_data=GuestAllocation::where('tour_id',$t_id)->get();

        $touer_qt_header=TourQuotationHeader::where('tour_id',$t_id)->select('tour_code','tour_id')->first();
        $guest_allocate_data=DB::table('guest_allocations')
                            ->join('tour_quotation_headers','tour_quotation_headers.tour_id','=','guest_allocations.tour_id')
                            ->select('tour_quotation_headers.title','guest_allocations.*')
                            ->where('tour_quotation_headers.tour_id',$t_id)
                            ->get();


        //return $guest_allocate_data;

       return view('tour_section_bookings.components.guest_index',compact('guest_allocate_data','touer_qt_header'));

          }catch(\Exception $e){

              return abort(404);
          }

    }

    public function guests_allocation_delete_records(Request $request){

        try{
        GuestAllocation::find($request->id)->delete();
        return "deleted";
        }
        catch(Exception $ex){
            return "Error";
        }



    }

    public function guests_allocation_livesearch(Request $request){

        if($request->ajax()){
            $output='';

           $_id=$request->ID;
            try
            {
                $queryd=$request->get('query');

                if($queryd != ''){

                    $data=DB::table('guest_allocations')
                            ->join('tour_quotation_headers','tour_quotation_headers.tour_id','=','guest_allocations.tour_id')
                            ->select('tour_quotation_headers.title','guest_allocations.*')
                            ->where('tour_quotation_headers.tour_id',$_id)
                            ->where('guest_allocations.guest_name','LIKE','%'.$queryd.'%')
                            ->get();

                            $total_row = $data->count();
                            // return json_encode($total_row);

                }
                else{
                    $data=DB::table('guest_allocations')
                    ->join('tour_quotation_headers','tour_quotation_headers.tour_id','=','guest_allocations.tour_id')
                    ->select('tour_quotation_headers.title','guest_allocations.*')
                    ->where('tour_quotation_headers.tour_id',$_id)
                     ->get();
                     $total_row = $data->count();
                    //  return json_encode($data);
                }


                $output='';
             if($total_row > 0){

                foreach($data as $dt)
                {
                    $output.='


                    <tr>

                    <td style="text-align: center">'.$dt->id.'</td>

                    <td style="text-align: left">'.$dt->guest_name.' </td>
                    <td style="text-align: center">'.$dt->dob.' </td>
                    <td style="text-align: center">'.$dt->flight_no.' </td>
                    <td style="text-align: center">'.$dt->passport_no.' </td>
                    <td style="text-align: center">'.$dt->arrival_date.' </td>
                    <td style="text-align: center">'.$dt->depature_date.' </td>
                    <td style="text-align: center">'.$dt->remarks.' </td>
                    <td style="text-align: center">


                           <a id="'.$dt->id.'" onclick="deleteAccept('.$dt->id.')"
                                         class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Edit View">
                                          <i class="la la-trash"></i>

                                      </a>


                             </td>
                </tr>

                    ';
                }

             }else{


                    $output='<tr>
                    <td align="center" colspan="9">No records found</td>
                    </tr>';


             }

             $data=array(
                'table_data'=>$output,
                'total_data'=>$total_row
            );


            return json_encode($data);




            }catch(Exception $ex){
                return json_encode('Error');
            }

        }

    }

    public function transport_addto_reserve_update(Request $request){

        if($request->ajax()){


            try{

                $trns_reqs = json_decode($request->trns_data_new);
                $trns_req_count =count((array)$trns_reqs);
                    // return json_encode($trns_reqs);
                if($trns_req_count != 0){



                    foreach($trns_reqs as $trns_req){

                        $tr_dt=TransportReserve::find($trns_req->tr_quot_id);
                        $tr_dt->status=$trns_req->status;
                        $tr_dt->save();

                    }


                    return json_encode('saved');

                }

            }catch(Exception $ex){

                return json_encode($ex);
            }

        }

    }

    public function booking_pnl_generate()
    {
           try{

            $companyName = companyController::$companyName;
            $address = companyController::$Address_details;
            $telephone = companyController::$telephone_details;
            $web_mail = companyController::$web_mail_details;


        return view('tour_section_bookings.print_doc.booking_pnl',compact('companyName','address','telephone','web_mail'));

           }catch(\Exception $e){

               return abort(404);
           }

    }

    public function agent_invoice_gen()
    {
            try{

                $companyName = companyController::$companyName;
                $address = companyController::$Address_details;
                $telephone = companyController::$telephone_details;
                $web_mail = companyController::$web_mail_details;

                return view('tour_section_bookings.print_doc.agent_invoice',compact('companyName','address','telephone','web_mail'));

            }catch(\Exception $e){

                 return abort(404);
            }

    }

    public function agent_invoice_window($id){

    try{

        $tourQuotHeader = TourQuotationHeader::where('tour_id',$id)->first();

    //     $accmd_pp_rate = $tourQuotHeader->pp_hotel_price;
    //     $accmd_ss_rate = $tourQuotHeader->pp_ss_price;
    //     $accmd_tplr_rate = $tourQuotHeader->pp_tpre_price;
    //     $accmd_qdr_rate = $tourQuotHeader->pp_qtre_price;

    //     $vat_rate=0;

    //             $vat_rate_data = Tax::where('id',1)->where('status',1)->first();

    //             if($vat_rate_data->count()!=0){
    //                 $vat_rate = $vat_rate_data->rate;
    //             }



    //     $trp_pp_rate = $tourQuotHeader->trp_pp_price;

    //     $trp_pp_rate = (($trp_pp_rate * $tourQuotHeader->pax_adult)/($tourQuotHeader->pax_adult+$tourQuotHeader->pax_child));

    //     $trp_vat = $trp_pp_rate/100 * $vat_rate;

    //     $trp_pp_rate = $trp_pp_rate+$trp_vat;



    //     $misc_AdltAllpp_rate = $tourQuotHeader->pp_misc_price;

    //     $misc_Adpp_rate = ($misc_AdltAllpp_rate * $tourQuotHeader->pax_adult);

    //     $misc_vat = $misc_Adpp_rate / 100 * $trp_vat;

    //     //Adult misc Rate
    //     $misc_Adpp_rate = ($misc_Adpp_rate/($tourQuotHeader->pax_adult+(($tourQuotHeader->pax_child)/2.00)));

    //     //Child misc rate
    //     $misc_childpp_rate = $misc_Adpp_rate/2;

    //     //return $misc_childpp_rate;


    //     $guide_pp_rate = ($tourQuotHeader->tot_guide_price)/$tourQuotHeader->pax_adult;



    //     $total_ppAdultRate = ($accmd_pp_rate+$trp_pp_rate+$misc_Adpp_rate+$guide_pp_rate);
    //     $total_ppchildtRate = (($accmd_pp_rate/2)+$misc_childpp_rate+($trp_pp_rate));

    //    // return number_format($total_ppAdultRate,2).' Child:'.number_format($total_ppchildtRate,2);



    //     $room_allocation = TourQuoteRoomAllocation::where('tour_id',$id)->first();



         return view('tour_section_bookings.invoice.new_invoice',compact('tourQuotHeader'));


    }catch(\Exception $e){

          return abort(404);
    }

    }



    public function gp_misc_reserve($id){

        return view('tour_section_bookings.components.gp_misc_reserve');
    }

    public function invoice_gen()

    {
            try{

                $companyName = companyController::$companyName;
                $address = companyController::$Address_details;
                $telephone = companyController::$telephone_details;
                $web_mail = companyController::$web_mail_details;

                return view('grid_dashboard',compact('companyName','address','telephone','web_mail'));

            }catch(\Exception $e){

                 return abort(404);
            }

    }

    public function manage_confirm()
    {
        try{

           $confirmedBookings = DB::table('tour_quotation_headers')
                ->where('confirmed',1)
                ->get();

            // return $confirmedBookings;
            return view('booking_section.confirm.manage_confirm',compact('confirmedBookings'));
        }catch(\Exception $e){
            return abort(404);
        }
    }

    public  function  download_quotation($id)
    {
        $quotation =(array) DB::table('tour_quotation_headers')
        ->join('agents', 'agents.id', '=', 'tour_quotation_headers.agent_id')
        ->where('tour_quotation_headers.id', $id)
        ->first();

        $adult_price=$quotation['pp_hotel_price']*$quotation['pax_adult'];
        $child_price=$quotation['pp_hotel_price']*$quotation['pax_child'];

        $trp_pp_price=$quotation['trp_pp_price']*$quotation['millage'];

        $total=$adult_price+$child_price+$trp_pp_price;


    if (!$quotation) {
        abort(404, 'Quotation not found.');
    }

    // Convert object to array to pass to the view
    $data = ['quotation' => (array) $quotation,'adult_price'=>$adult_price,'child_price'=>$child_price,
    'trp_pp_price' =>$trp_pp_price,
        'total'=>$total
        ];

    // Load the Blade view and pass data
    $pdf = PDF::loadView('booking_section.confirm.TourQuatationPdf', $data);

    // Define PDF file name
    $fileName = 'quotation_' . $id . '.pdf';

    // Stream or download the PDF
    return $pdf->download($fileName);
    }

}
