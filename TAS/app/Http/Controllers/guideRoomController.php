<?php

namespace App\Http\Controllers;

use App\GuideRoom;
use App\Hotel;
use App\Currency;
use App\GuideRoomType;
use App\Supplier;
use DB;
use Illuminate\Http\Request;

class guideRoomController extends Controller
{
     
     private $add_pv_gr;
     private $edit_pv_gr;
     private $del_pv_gr; 

     public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_gr =1;
        $this->edit_pv_gr=1;
        $this->del_pv_gr =1;
    }

    public function index()
    {
         try{
            $guide_rooms=DB::table('guide_rooms')
            ->join('guide_room_types','guide_room_types.id','=','guide_rooms.guide_room_type_id')
            ->join('currencies','currencies.id','=','guide_rooms.currency_id')
            ->join('suppliers','suppliers.id','=','guide_rooms.supplier_id')
            ->select('guide_rooms.id','guide_rooms.amount','currencies.type','suppliers.sup_name','guide_room_types.gr_types')
            ->get();
                  
            $add_pv  = $this->add_pv_gr;
            $edit_pv = $this->edit_pv_gr;
            $del_pv  = $this->del_pv_gr;
    
            return view('guides.guide_roomindex',compact('guide_rooms','add_pv','edit_pv','del_pv'));     
                
         }catch(\Exception $e){
               
               return abort(404);
         }
        
    }

    public function liveSearch(Request $request)
    {

        if($request->ajax()){

            $queryd=$request->get('query');
            $edit_pv=$request->get('edit_pv');
            $del_pv=$request->get('del_pv');
       //return json_encode($queryd);
            
            $output='';
            $output_edit='';
            $output_del='';
            
            if($queryd!=''){
               
                       
                $data=DB::table('guide_rooms')
                ->join('guide_room_types','guide_room_types.id','=','guide_rooms.guide_room_type_id')
                ->join('currencies','currencies.id','=','guide_rooms.currency_id')
                ->join('suppliers','suppliers.id','=','guide_rooms.supplier_id')
                ->select('guide_rooms.id','guide_rooms.amount','currencies.type','suppliers.sup_name','guide_room_types.gr_types')
                ->where('gr_types','LIKE','%'.$queryd.'%')
                ->orwhere('sup_name','LIKE','%'.$queryd.'%')
                ->get();
        
                   

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data=DB::table('guide_rooms')
                ->join('guide_room_types','guide_room_types.id','=','guide_rooms.guide_room_type_id')
                ->join('currencies','currencies.id','=','guide_rooms.currency_id')
                ->join('suppliers','suppliers.id','=','guide_rooms.supplier_id')
                ->select('guide_rooms.id','guide_rooms.amount','currencies.type','suppliers.sup_name','guide_room_types.gr_types')
                ->get();
        
                   

                $total_row=$data->count();
                

            }

       
            if($total_row > 0){
                

           

                foreach($data as $row){
                        
                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){

                        $output_edit='
                                      <a href="'.route('guideroom_edit',$row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" 
                                      title="Edit details"><i class="la la-edit"></i>
                                      </a>
                                      ';
                    }else{

                        $output_edit='';
                    }if($del_pv==1){

                        $output_del='
                                     <a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                     class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                     title="Delete details"><i class="la la-trash"></i>
                                     </a>
                                     ';

                    }else{
                        
                        $output_del='';
                    }
                                        
                    $output.='
                    
                    <tr> 
                    <td style="text-align: center">'.$row->id.'</td>
                    <td>'.$row->sup_name.'</td>
                    <td>'.$row->gr_types.'</td>
                    <td>'.$row->type.'</td>
                    <td>'.$row->amount.'</td>
                  <td class="m-datatable__cell--right" style="text-align: center">


                        '.$output_edit.'
                        '.$output_del.'
                  </td>
            </tr>
             ';
                }
                

         }
         else{
             $output='<tr>
             <td align="center" colspan="5">No records found</td>
             </tr>';

             }


             $data=array(
                'table_data'=>$output,
                'total_data'=>$total_row
            );
            return json_encode($data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         try{

            $hotels=supplier::where('type','Hotel')->get();
            $currencys=Currency::all();
            $guideroomtypes=GuideRoomType::all();
    
            return view('guides.guide_roomcreate',compact('currencys','guideroomtypes','hotels'));

         }catch(\Exception $e){

             return abort(404);
         }
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            if($request->hotel==0){
            return "*Please select the Hotel ";
            }
            elseif($request->room_type==0){
                return "*Please select the Room type ";
            }
            elseif($request->currency_type==0){
                    return "*Please select the Currency type ";
            }
             elseif($request->amount==''){
                 return "*Please enter the amount";
            }
             try{
                 $guideRoom=new GuideRoom;
                 $guideRoom->supplier_id =$request->hotel;
                 $guideRoom->guide_room_type_id =$request->room_type; 
                 $guideRoom->currency_id=$request->currency_type; 
                 $guideRoom->amount=$request->amount;
                 $guideRoom->save();
                 return 'added';
             }
             catch(\Exception $e){

                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                          );
                return ($data); 
                // return "* Some field cannot be empty!, Please check before save"; 
             }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GuideRoom  $guideRoom
     * @return \Illuminate\Http\Response
     */
    public function show(GuideRoom $guideRoom)
    {
        //
    }

    public function listIndexRooms(Request $req)
    {
        if($req->ajax()){
            
            // $hotelID = $req->hotelID;
            // $groomsList = DB::table('guide_rooms')
            //                 ->join('guide_room_types','guide_room_types.id','=','guide_rooms.guide_room_type_id')
            //                 ->select('guide_rooms.id','guide_rooms.amount','guide_room_types.gr_types')
            //                 ->where('supplier_id',$hotelID)
            //                 ->get();

            $tour_day_id = $req->dayidHt;
            $tour_id = $req->tourID;

            

            $groomsHotelList = DB::table('tour_quotation_hotel_details')
                                ->join('tour_quotation_hotels','tour_quotation_hotels.id','=','tour_quotation_hotel_details.tour_quotation_hotel_id')
                                ->join('suppliers','suppliers.id','=','tour_quotation_hotel_details.supplier_id')
                                ->join('hotel_packages','hotel_packages.id','=','tour_quotation_hotel_details.hotel_package_id')
                                ->join('currencies','currencies.id','=','hotel_packages.currency_id')
                                ->select('suppliers.id','suppliers.sup_s_name','tour_quotation_hotel_details.pos','tour_quotation_hotel_details.guide',
                                    'currencies.code','tour_quotation_hotel_details.rate_to_base')
                                ->where('tour_quotation_hotels.tour_id',$tour_id)
                                ->where('tour_quotation_hotels.tour_day',$tour_day_id)                                
                                ->get();


           // return json_encode('asdadwada');

            return json_encode($groomsHotelList);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GuideRoom  $guideRoom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{

            $guiderooms=GuideRoom::findOrFail($id);
            $hotels=Supplier::all();
            $currencys=Currency::all();
            $room_types=GuideRoomType::all();
    
            return view('guides.guide_roomedit',compact('guiderooms','hotels','currencys','room_types'));

         }catch(\Exception $e){

              return abort(404);
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GuideRoom  $guideRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
            if($request->hotel==0){
            return "*Please select the Hotel ";
            }
            elseif($request->room_type==0){
                return "*Please select the Room type ";
            }
            elseif($request->currency_type==0){
                    return "*Please select the Currency type ";
            }
             elseif($request->amount==''){
                 return "*Please enter the amount";
            }
                    $id=$request->id;
             try{
                 $guideRoom=GuideRoom::find($id);
                 $guideRoom->supplier_id =$request->hotel;
                 $guideRoom->guide_room_type_id =$request->room_type; 
                 $guideRoom->currency_id=$request->currency_type; 
                 $guideRoom->amount=$request->amount;
                 $guideRoom->save();

                 return 'updated';
             }
             catch(\Exception $e){

                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                          );
                return ($data);
                // return "* Some field cannot be empty!, Please check before save"; 
             }
                   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GuideRoom  $guideRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{

        

        $guideRoom=$request->input('id');

        GuideRoom::find($guideRoom)->delete();

         return 'deleted';
        }
        catch(\Exception $e){

            return "Error";
        }
    }
}
