<?php

namespace App\Http\Controllers;

use App\Itineray;
use App\Location;
use App\Itineray_Location;
use Illuminate\Http\Request;
use DB;

class itinerayController extends Controller
{
     private $add_pv_ity;
     private $edit_pv_ity;
     private $del_pv_ity;

     public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_ity =1;
        $this->edit_pv_ity=1;
        $this->del_pv_ity =1;
    }

    public function index()
    {
        
         try{
               
            $itinerays = DB::table('itinerays')
            ->join('itineray__locations','itinerays.id','=','itineray__locations.itineray_id')
            ->join('locations','locations.id','=','itineray__locations.l_id')
           ->select('itinerays.id','itineray__locations.itineray_id','itinerays.route_code','itinerays.dec','itineray__locations.l_id','locations.id as loc_id','locations.location_code')
            ->orderBy('itineray__locations.id')
           ->get();
       
               $itinerays_data=$itinerays->groupBy('id');
           //  return $itinerays_data;
               // $itinerays=Itineray::All();
                    $add_pv=$this->add_pv_ity;
                    $edit_pv=$this->edit_pv_ity;
                    $del_pv=$this->del_pv_ity;
       
              return view('itineray.index',compact('itinerays_data','add_pv','edit_pv','del_pv'));

         }catch(\Exception $e){

              return abort(404);
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

                $location_list = DB::table('locations')                               
                ->join('districts','districts.id','=','locations.district_id')                              
                ->where('locations.status',1)
                ->select('locations.id','districts.id as dstid','districts.dist_name','locations.location_name','locations.location_code')                                                            
                ->get();
                $DistanceDtList = DB::table('tour_quot_locations')
                ->join('tour_quot_distances','tour_quot_distances.tour_quot_location_id','=','tour_quot_locations.id')
                ->select('tour_quot_distances.*','tour_quot_locations.tour_day','tour_quot_locations.ttkms')
                ->orderBy('tour_quot_distances.pos')
                ->where('tour_quot_locations.tour_id',9)
                ->get();
        
                $LocationDtList_gp = $DistanceDtList->groupBy('tour_day');
        
        
                $location_gp = $location_list->groupBy('dist_name');
                $location_gp->toArray(); 
                $noOfDays=10;
                return view('itineray.create_form',compact('noOfDays','location_gp','LocationDtList_gp'));

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
           
            $output='';
            $d1='';
            $td='';
            $td2='';
            $output_edit='';
            $output_del='';

           
            if($queryd!=''){
                
                $data = DB::table('itinerays')
                 ->join('itineray__locations','itinerays.id','=','itineray__locations.itineray_id')
                 ->join('locations','locations.id','=','itineray__locations.l_id')
                 ->select('itinerays.id','itineray__locations.itineray_id','itinerays.route_code','itinerays.dec','itineray__locations.l_id','locations.id as loc_id','locations.location_code')
                 ->where('itinerays.route_code','LIKE','%'.$queryd.'%')
                 ->orderBy('itineray__locations.id')
                 ->get();
           
                   $itinerays_data=$data->groupBy('id');
                

                $total_row = $itinerays_data->count();
                 
              
                    
            }else{


                $data = DB::table('itinerays')
                ->join('itineray__locations','itinerays.id','=','itineray__locations.itineray_id')
                ->join('locations','locations.id','=','itineray__locations.l_id')
                ->select('itinerays.id','itineray__locations.itineray_id','itinerays.route_code','itinerays.dec','itineray__locations.l_id','locations.id as loc_id','locations.location_code')
                // ->where('itinerays.route_code','LIKE','%'.$queryd.'%')
                ->orderBy('itineray__locations.id')
                ->get();
          
                  $itinerays_data=$data->groupBy('id');
               

                $total_row = $itinerays_data->count();
             
            //     $data = DB::table('itinerays')
            //     ->join('itineray__locations','itinerays.id','=','itineray__locations.itineray_id')
            //     ->join('locations','locations.id','=','itineray__locations.l_id')
            //    ->select('itinerays.id','itineray__locations.itineray_id','itinerays.route_code','itinerays.dec','itineray__locations.l_id','locations.id as loc_id','locations.location_code')
            //     ->orderBy('itineray__locations.id')
            //    ->get();


               // return json_encode('no_data');
                //    $itinerays_data=$data->groupBy('id');

                // $total_row = $itinerays_data->count();
                 

            }
           

            if($total_row > 0){
               

                foreach($itinerays_data as $itnery =>$it_data){
                    $pos=$itnery;
                    $po2=0;
                    foreach($it_data as $i_data){
                        
                        
                         if (($itnery == $i_data->itineray_id) && $po2==0){

                            $po2++;
                            if($pos == $i_data->itineray_id){
                                
                                $d1.='<td style="text-align: center">'.$i_data->id.'</td>
                                <td>'.$i_data->route_code.'</td>';


                            }
                           
                            foreach($it_data as $loc){
            
                                if($i_data->itineray_id ==$loc->itineray_id){
                            
                                $td.='<span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded">'.$loc->location_code.'</span>';
            
                                }
            
                            }
                            if($pos==$i_data->itineray_id){

                                $td2.='<td>'.str_limit($i_data->dec,45).'</td>';
                            }
                    
                            

                         }
                                  $output_edit='';
                                  $output_del='';
                    }

                }
                         if($edit_pv==1){

                            $output_edit='
                                          <a href="'.route('itineray_edit',$i_data->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                          title="Edit details">
                                          <i class="la la-edit"></i>
                                          </a> 
                                               ';

                         }else{

                            $output_edit='';


                         }if($del_pv==1){
                                  
                            $output_del='
                                         <a id="" onclick="deleteAccept('.$i_data->id.') "
                                         class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Edit View">
                                         <i class="la la-trash"></i>
                                         </a>
                                           ';

                         }else{
                                  
                            $output_del='';

                         }


                $output.='<tr>
                '.$d1.'
                <td>
                '.$td.'
                </td>
                <td>'.$td2.'</td>
                <td style="text-align: center">
                <td style="text-align: center">

                          '.$output_edit.'
                          '.$output_del.'
                        
                  
    
    
                    </td>
                </tr>';
                
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

    
   // return json_encode($data);
           

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


        public function getDistance(Request $request)
        {

            $loc=Location::where('id',$request->locationId)->select('location_code')->first();
           
            return $loc;


        }



    public function store(Request $request)
    {
        //
        
        try
        {
            DB::beginTransaction();
              
            $itineray=new Itineray;
            $itineray->route_code=$request->code;
            $itineray->startin_tag=$request->start_tag;
            $itineray->route_name=$request->route_nme;
            $itineray->dec=$request->desc;
            $itineray->save();
            $i_id=Itineray::select('id')->orderBy('id','DESC')->first();
         
            $locations_nm=0;
            $distDetails = json_decode($request->dist_details);
            foreach($distDetails as $dist_dt){
            
                $l_dt=new Itineray_Location;
                $l_dt->itineray_id=$i_id->id;
                $l_dt->l_id=$dist_dt->l_id;
                $l_dt->save();


            }
            DB::commit();

            return 'added';
         

        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            $error_des =$ex->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "*Some Fields Cannot Be Null";
         }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Itineray  $itineray
     * @return \Illuminate\Http\Response
     */
    public function show(Itineray $itineray)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Itineray  $itineray
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{

            $itinerays=Itineray::find($id);
            return view('itineray.edt_form',compact('itinerays'));
             
         }catch(\Exception $e){

             return abort(404);
         }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Itineray  $itineray
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        try
        {

           
            $id=$request->id;

            $dat=Itineray::find($id);
           
            $dat->dec=$request->desc;
            $dat->startin_tag=$request->start_tag;
            $dat->route_name=$request->route_nme;
            $dat->save();
            return 'added';
          


        }catch(\Excption $e)
        {          
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "Some field cannot be null";
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Itineray  $itineray
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

    try
    {
        Itineray::find($request->id)->delete();
        return 'deleted';
        

    }
    catch(\Exception $x)
    {
        return "An Error Accured";

    }


    }
}
