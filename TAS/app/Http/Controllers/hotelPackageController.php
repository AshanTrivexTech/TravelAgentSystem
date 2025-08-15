<?php

namespace App\Http\Controllers;

use App\HotelPackage;
use App\Supplier;
use App\RoomType;
use App\MealPlane;
use App\Market;
use App\Currency;
use Illuminate\Support\Facades\DB;
use App\PackagePeriod;
use App\Package_period_type;
use Illuminate\Http\Request;
use App\Agent;
use PHPUnit\Framework\Constraint\Exception;
use App\OptionalSupliment;


class hotelPackageController extends Controller
{
     private $add_pv_hp;
     private $edit_pv_hp;
     private $del_pv_hp; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_hp= 1;
        $this->edit_pv_hp=1;
        $this->del_pv_hp= 1;
    }
    
    public function index()
    {
         try{

            $hotel_packages=DB::table('hotel_packages')
            ->join('suppliers', 'suppliers.id', '=', 'hotel_packages.supplier_id')    
            ->join('currencies', 'currencies.id', '=', 'hotel_packages.currency_id')    
            ->join('markets', 'markets.id', '=', 'hotel_packages.market_id') 
            ->join('agents','agents.id','=','hotel_packages.agent_id')      
            ->join('meal_planes', 'meal_planes.id', '=', 'hotel_packages.meal_plane_id')    
            ->join('room_types', 'room_types.id', '=', 'hotel_packages.room_type_id')    
            ->select('suppliers.sup_name','hotel_packages.id','hotel_packages.Package_name','hotel_packages.extra_bed_charge',
                     'hotel_packages.child_rate','hotel_packages.SGL','hotel_packages.DBL','hotel_packages.TBL','hotel_packages.QBL',
                     'currencies.type','markets.market_name','meal_planes.meal_plane','room_types.r_type','agents.ag_name')
            ->where('suppliers.type','=','Hotel')
            ->get();
               
                 $add_pv  = $this->add_pv_hp;
                 $edit_pv = $this->edit_pv_hp;
                 $del_pv  = $this->del_pv_hp;
               
              return view('hotel_packages.index',compact('hotel_packages','add_pv','edit_pv','del_pv'));

         }catch(\Exception $e){

              return abort(404);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function live_Search(Request $request)
     {

        if($request->ajax()){
            
            $queryd=$request->get('query');
            $edit_pv=$request->get('edit_pv');
            $del_pv=$request->get('del_pv');
            
            //return json_encode($queryd);
            
            $output='';
            $output_edit='';
            $output_del='';
           

            // return json_encode('udifg');

            if($queryd!=''){
              
                         
                $data=DB::table('hotel_packages')
                ->join('suppliers','suppliers.id','=','hotel_packages.supplier_id')    
                ->join('currencies','currencies.id','=','hotel_packages.currency_id')    
                ->join('markets','markets.id','=','hotel_packages.market_id')       
                ->join('meal_planes','meal_planes.id','=','hotel_packages.meal_plane_id')    
                ->join('agents','agents.id','=','hotel_packages.agent_id')  
                ->join('room_types','room_types.id','=','hotel_packages.room_type_id')   
                ->select('suppliers.sup_s_name','hotel_packages.id','hotel_packages.Package_name','hotel_packages.extra_bed_charge',
                'hotel_packages.child_rate','hotel_packages.SGL','hotel_packages.DBL','hotel_packages.TBL','hotel_packages.QBL',
                'currencies.type','markets.market_name','meal_planes.meal_plane','room_types.r_type','agents.ag_name')
                ->where('suppliers.type','Hotel')
                ->Where('hotel_packages.Package_name','LIKE','%'.$queryd.'%')
                ->orWhere('suppliers.sup_s_name','LIKE','%'.$queryd)
                ->get();


         
                    // return json_encode($data);
                $total_row = $data->count();
             
                // return json_encode($data);

             
  
            }else{
            
                // return json_encode('CHECK');
               
                $data=DB::table('hotel_packages')
                ->join('suppliers', 'suppliers.id', '=', 'hotel_packages.supplier_id')    
                ->join('currencies', 'currencies.id', '=', 'hotel_packages.currency_id')    
                ->join('markets', 'markets.id', '=', 'hotel_packages.market_id') 
                ->join('agents','agents.id','=','hotel_packages.agent_id')      
                ->join('meal_planes', 'meal_planes.id', '=', 'hotel_packages.meal_plane_id')    
                ->join('room_types', 'room_types.id', '=', 'hotel_packages.room_type_id')    
                ->select('suppliers.sup_name','hotel_packages.id','hotel_packages.Package_name','hotel_packages.extra_bed_charge',
                         'hotel_packages.child_rate','hotel_packages.SGL','hotel_packages.DBL','hotel_packages.TBL','hotel_packages.QBL',
                         'currencies.type','markets.market_name','meal_planes.meal_plane','room_types.r_type','agents.ag_name')
                ->where('suppliers.type','=','Hotel')
                ->get();
                

                $total_row=$data->count();
                
                // return json_encode('max');
              
            }

               
            if($total_row > 0){
                
                $output='';
           

                foreach($data as $row){

                  
                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){
                      
                        $output_edit='
                                       <a href="'.route('edit_packages',$row->id).'" 
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Edit details"><i class="la la-edit"></i>
                                       </a> 
                                       ';     
                                     
                    }else{

                        $output_edit='';
                        ;


                    }if($del_pv==1){

                        $output_del='
                                      <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.') "
                                      class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                      title="Edit View">
                                      <i class="la la-trash"></i>
                                      </a> 
                                        ';  

                                     

                    }else{
                               
                        $output_del='';

                    }
              
                    // return $row; 
                        
                            
                    $output.='
                    <tr>
                     <td style="text-align: center">'.$row->id.'</td>
                     <td>'.$row->Package_name.'</td>
                     <td>'.$row->sup_s_name.'</td>
                     <td>'.$row->market_name.'</td>
                     <td>'.$row->ag_name.'</td>
                     <td>'.$row->r_type.'</td>   
                     <td>'.$row->meal_plane.'</td>   
                     <td style="text-align: center">'.$row->SGL.'</td>   
                     <td style="text-align: center">'.$row->DBL.'</td>   
                     <td style="text-align: center">'.$row->TBL.'</td>   
                     <td style="text-align: center">'.$row->QBL.'</td>
                     <td style="text-align: center">'.$row->child_rate.'</td>   
                     <td style="text-align: center" width="10%">
               
                        <a href="'.route('osupplement_index',$row->id).'" 
                        class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" 
                        title="View Hotel Optional Supplement"><i class="la la-archive"></i></a> 
                         
                            '.$output_edit.'
                            '.$output_del.'
    
                        </td>
                    </tr> 
             ';
            
            
                }

              
                

         }
         else{
             $output='<tr>
             <td align="center" colspan="13">No records found</td>
             </tr>';
           
             }
           

             $data=array(
                'table_data'=>$output,
                'total_data'=>$total_row
            );


            return json_encode($data);
      
        }

     }


    public function create()
    {
          try{

            $hotels=Supplier::where('type','Hotel')->select('id','sup_name')->get();

            $room_types=RoomType::all();
            $meals=MealPlane::all();
            $markets=Market::all();
            $currencys=Currency::all();
            $agents=Agent::all();
    
            return view('hotel_packages.create',compact('hotels','room_types','meals','currencys','markets','agents'));

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

         if($request->ajax()){

       
          
            $hpdData = json_decode($request->hpd_dataStoree);
           
            $rowCount = count((array)$hpdData);
            $opt_sup_data = json_decode($request->hpd_sup_list);

            $hotel_id=$request->hotel;
            $package_name=$request->hotel_package;
            $contract_term=$request->cnt_term;
           
            try{

                  
                if($rowCount!=0){
                    try
                    {
                    DB::beginTransaction();
                        $sup_arry = array();
                        
                    foreach($opt_sup_data as $optups){

                        $optionalSupliment_Details = new OptionalSupliment;
                        $optionalSupliment_Details ->ops_code = $optups->code;
                        $optionalSupliment_Details ->des = $optups->desc;  
                        $optionalSupliment_Details ->amt = $optups->rate;     
                        $optionalSupliment_Details ->rate_type= $optups->rtype; 
                        $optionalSupliment_Details->save();

                        // return $optionalSupliment_Details;

                        $sup_idAdded = OptionalSupliment::select('id')->orderBy('id','DESC')->first();
                        array_push($sup_arry,$sup_idAdded->id);
                        
                    }


                   // return json_encode($sup_arry);

                    foreach($hpdData as $hpData){
                      
                        $hotel_package = new HotelPackage;
                        $hotel_package->package_name=$package_name;
                        $hotel_package->supplier_id=$hotel_id;
                        $hotel_package->ctr_term=$contract_term;
                        
                        return $hotel_package;
                        $hotel_package->currency_id=$hpData->hpcurrency;
                        $hotel_package->market_id=$hpData->hpmarket;
                        $hotel_package->agent_id=$hpData->hpagent;
                        $hotel_package->meal_plane_id=$hpData->hpmealplan;
                        $hotel_package->room_type_id=$hpData->hproom;
                        $hotel_package->extra_bed_charge=$hpData->hpexb;
                        $hotel_package->child_rate=$hpData->hpchild;
                            
                        $hotel_package->SGL=$hpData->hpsgl; 
                        $hotel_package->DBL=$hpData->hpdbl; 
                        $hotel_package->TBL=$hpData->hptbl;
                        $hotel_package->QBL=$hpData->hpqbl;
                        $hotel_package->from_date=$hpData->hpfrom_date;
                        $hotel_package->to_date=$hpData->hpto_date;
                        $hotel_package->status=1;
                         
                        $hotel_package->save(); 
                        
                        // return $hotel_package;
                        
                        $htpkglstid = HotelPackage::select('id')->orderBy('id','DESC')->first();
                        // $htsup =HotelPackageOptionalSupliment::all();
                            
                        
                        
                        $rowCountsup =sizeof($sup_arry);

                        for($pos_sp=0; $pos_sp<$rowCountsup; $pos_sp++){                           

                            DB::table('hotel_package_optional_supliment')->insert([
                                ['optional_supliment_id' => $sup_arry[$pos_sp], 'hotel_package_id' => $htpkglstid->id]]);                           
                        }

                    }

                    DB::commit();
                   return json_encode('saved');
                }catch(Exception $ex){

                    DB::rollBack();

                    // $error_des =$ex->getMessage();

                    // $data=array(
                    // 'Error_code'=>"505",
                    // 'Exp_dtl'=>$error_des
                    //           );
                    // return ($data);
                    return json_encode('* Some field cannot be empty!, Please check before save :'.$ex);    
                }
                    
                }
               
                
    
            }
            catch(\Exception $e){
                           
                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                          );
                return ($data);
                // return "* Some field cannot be empty!, Please check before save".$e;
                // return json_encode($ex);
            }
                      
            
        }
            //   return $request->all();
    }
        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelPackage  $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function show(HotelPackage $hotelPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelPackage  $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
             try{
        try
        {
        $hotels=Supplier::where('type','Hotel')->select('id','sup_name')->get();

        $room_types=RoomType::all();
        $meals=MealPlane::all();
        $markets=Market::all();
        $agents=Agent::all();
        $currencys=Currency::all();
        $periods=HotelPackage::find($id);
        // $period_types=Package_period_type::all();
        //$periods=PackagePeriod::all();

        //$packages=HotelPackage::find($id);
        // $periods=DB::table('hotel_packages')
        // ->join('package_periods','package_periods.hotel_package_id','=','hotel_packages.id')
        // ->select('package_periods.title','package_periods.id','package_periods.fr_date','package_periods.to_date','hotel_packages.*')
        // ->where('hotel_packages.id',$id)
        // ->first();

       // return $periods;
        
        return view('hotel_packages.edit_form',compact('hotels','room_types','meals','currencys','markets','periods','agents'));
        }
        catch(\Exception $ex)
        {
            return "Exception Error :";
        }
    }catch(\Excepiton $e){

          return abort(404);
    }

    }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelPackage  $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //   
           if($request->p_name==''){
            return "*Package name cannot be empty ";
           }
           elseif($request->from_date==''){
            return "*Please select From Date";
           }
           else if($request->to_date==''){
            return "*Please select To Date ";
           }
           elseif($request->sgl==''){
            return "*Single rate cannot be empty ";
           }
           else if($request->dbl==''){
            return "*Double rate cannot be empty ";
           }
           else if($request->tbl==''){
            return "*Trible rate cannot be empty ";
           }
           else if($request->qbl==''){
            return "*Quad trible rate cannot be empty ";
           }  
           if($request->child==''){
            return "*Child rate cannot be empty";
           }
           else if($request->exb==''){
            return "*Extra bed rate cannot be empty ";
           }

           $hotelpackage_id=$request->id;
         try
         {
            // DB::beginTransaction();

        $hotel_package=HotelPackage::find($hotelpackage_id);
        $hotel_package->package_name=$request->p_name;
        $hotel_package->supplier_id=$request->h_package;
        $hotel_package->currency_id=$request->currency;
        $hotel_package->market_id=$request->market;
        $hotel_package->agent_id=$request->agent;
        $hotel_package->meal_plane_id=$request->meal_plane;
        $hotel_package->room_type_id=$request->room;
        $hotel_package->extra_bed_charge=$request->exb;
        $hotel_package->child_rate=$request->child;
        $hotel_package->SGL=$request->sgl; 
        $hotel_package->DBL=$request->dbl; 
        $hotel_package->TBL=$request->tbl;
        $hotel_package->QBL=$request->qbl;
        $hotel_package->from_date=$request->from_date;
        $hotel_package->to_date=$request->to_date;
        $hotel_package->status=$request->status; 
        $hotel_package->save();
         
        // PackagePeriod::where('hotel_package_id',$hotelpackage_id)
        // ->update(['title'=>$request->period,'fr_date'=>$request->from_date,'to_date'=>$request->to_date]);

        //   DB::commit();

                
          return 'updated';

        }
        catch(\Exception $e)
        {             
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return  "Exception Error : ";
        }
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelPackage  $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

            $package_ID=$request->input('id');

            try{
                   
                   HotelPackage::find($package_ID)->delete();
                  
                   return "deleted";

            }catch(\Exception $e){
                 
                 
                 return 'Cannot Delete';

            }

        }

    
}
