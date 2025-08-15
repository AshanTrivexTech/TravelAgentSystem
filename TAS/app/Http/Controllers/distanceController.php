<?php

namespace App\Http\Controllers;

use App\Distance;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;
use App\Location;
use \DB;
class distanceController extends Controller
{
    private $add_pv_dt;
    private $edit_pv_dt;
    private $del_pv_dt; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_dt =1;
        $this->edit_pv_dt=1;
        $this->del_pv_dt =1;
    }
    
    public function index()
    {       
           try{
                  
            try
            {
              
           // $distance_list = Distance::all();
                $distance_list = DB::table('distances')
                ->join('locations as frm_lo','distances.frm','=','frm_lo.id')
                ->join('locations as to_lo','distances.to','=','to_lo.id')            
                ->select('distances.id','frm_lo.location_name as frmlc','to_lo.location_name as tolc','distances.distance')
                ->orderBy('id')
                ->take(25)
                 ->get();
    
              
            //    return $distance_list;
    
                   $add_pv  = $this->add_pv_dt;
                   $edit_pv = $this->edit_pv_dt;
                   $del_pv  = $this->del_pv_dt;
    
             return view('Location_details.index',compact('distance_list','add_pv','edit_pv','del_pv'));
    
            }catch(Exception $e)
            {
                return "Exception :error";
            }
           }catch(\Exception $e){

               return abort(404);
           }         
        

    }  

    public function create()
    {
         try{
            try
            {
              
            $location_list = Location::where('status','0')->get();
    
             return view('Location_details.create',compact('location_list'));
    
            }catch(Exception $e)
            {
                return "Exception :error";
            }

         }catch(\Exception $e){

             return abort(404);
         }
        
    }


    public function store(Request $request)
    {
        //
        
        try
        {
            $lID=$request->location;
            $locationData=json_decode($request->jsData, true);            
            $tot_record =$request->numrow;
            $Check_distance = Distance::where('frm',$lID)->first();
            
            if($Check_distance ==''){
               // $distanceData = $request->distanceData;
               try{
               
               DB::beginTransaction();
               Distance::insert($locationData);


                $LocationStatusUpdate= Location::findOrFail($lID);
                $LocationStatusUpdate->status ='1';
                $LocationStatusUpdate->save();

                if($tot_record == 1){

                   $LocationStatusUpdaten = Location::where('status',0)->get();

                  // $lcid = $LocationStatusUpdaten->id;
                    $lcid=0;
                        foreach ($LocationStatusUpdaten as $lcst)
                        {
                            $lcid=$lcst->id;
                        }
                   // return 'sadasdw';


                   if(($LocationStatusUpdaten->count()) == 1 ){

                       $LocationStatusUpdate2 = Location::findOrFail($lcid);
                       $LocationStatusUpdate2->status ='1';
                       $LocationStatusUpdate2->save();
                   }

               }

                
               DB::commit();
               return "added";

               }catch(Exception $tr)
               {

                DB::rollBack();
                return "Sorry! Not Added Location Distance Details";
               }    

                
            }else{

                return "All Ready Added";
            }
            
          
        }catch(Exception $e){

            $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                        );
                return ($data);
            // return "Exception :error";
        }        
    }

  
    public function show(Distance $distance)
    {
        //
    }
  
    public function livesearch(request $request){
        if($request->ajax()){

            $queryd=$request->get('from_query');
            $to_loc=$request->get('to_query');
            $edit_pv=$request->get('edit_pv');

            $output_edit='';
           
      

            if($queryd!=''){
               
                try{
              
                   
                $data=DB::table('distances')
                 ->join('locations as frm_lo','distances.frm','=','frm_lo.id')
                 ->join('locations as to_lo','distances.to','=','to_lo.id')            
                 ->select('distances.id','frm_lo.location_name as frmlc','to_lo.location_name as tolc','distances.distance')
                ->where('frm_lo.location_name','LIKE','%'.$queryd.'%')
                 ->where('to_lo.location_name','LIKE','%'.$to_loc.'%')
                ->orderBy('id')
                ->take(25)
                ->get();

                 // return json_encode($data);
                $total_row = $data->count();
                }catch(\Exception $e)
                {
                    return json_encode("Error");  

                }
                 
            
              
                    
            }else{
                $data=DB::table('distances')
                 ->join('locations as frm_lo','distances.frm','=','frm_lo.id')
                 ->join('locations as to_lo','distances.to','=','to_lo.id')            
                 ->select('distances.id','frm_lo.location_name as frmlc','to_lo.location_name as tolc','distances.distance')    
                 ->orderBy('id')
                 ->take(25)
                 ->get();

                $total_row=$data->count();

            }
            $output='';
            
            if($total_row > 0){
               
                   foreach($data as $row){

                       $output_edit='';

                       if($edit_pv==1){
                               
                        $output_edit='
                                      <a href="'.route('distance_edit',$row->id).'"
                                      class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                      <i class="la la-edit"></i></a>
                                      </a>
                                     ';

                       }else{
                                $output_edit='';

                       }
                    
                                                  
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td style="text-align: center">'.$row->frmlc.'</td>
                       <td style="text-align: center">'.$row->tolc.'</td>
                       <td style="text-align: center">'.$row->distance.'</td>
                       <td style="text-align: center">

                                  '.$output_edit.'

                       </td>
                    </tr>';
                   }
                   

            }
            else{
                $output='<tr>
                <td align="center" colspan="8">No records found</td>
                </tr>';

                }
       $data=array(
           'table_data'=>$output,
           'total_data'=>$total_row
       );

       
      return json_encode($data);
        }

}

    public function edit($id)
    {
           try{

            $distance_edit = DB::table('distances')
            ->join('locations as frm_lo','distances.frm','=','frm_lo.id')
            ->join('locations as to_lo','distances.to','=','to_lo.id')            
            ->select('distances.id','frm_lo.location_name as frmlc','to_lo.location_name as tolc','distances.distance')
            ->where('distances.id',$id)
            ->first();

        return view('Location_details.edit_form',compact('distance_edit'));

           }catch(\Exception $e){

              return abort(404);
           }

    }
    
    public function update(Request $request)
    {
        //

        if($request->distance==''){
            return "*Distance cannot be empty ";
           }
        $distance_id=$request->id;

        try{
             
                    $distance_Details =Distance::find($distance_id);
                    $distance_Details->distance = $request->distance;       
                    $distance_Details->save();
       
                    return 'updated';
        
           }
          catch(\Exception $e){
                 
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            //  return "Exception Error : ";
    
        }
    }

  
    public function destroy(Distance $distance)
    {
        //
    }

    public function selectIndexLocations(Request $request)
    {
        try
        {   
            if($request->ajax()){ 
                $rqlID =$request->locationId;

            $location_list = Location::where('id','!=',$rqlID)->select('id','location_name')->get();



            foreach ($location_list as $key =>$location){

                $c_lcid = $location->id;

                $findDistance_A = Distance::where('frm',$rqlID)->where('to',$c_lcid)->first();
                $findDistance_B = Distance::where('to',$rqlID)->where('frm',$c_lcid)->first();


                    if(($findDistance_A !='') || ($findDistance_B !='')){
                        unset($location_list[$key]);

                    }

            }



          // unset($location_list[1]);



            return json_encode($location_list);
            }

        }catch(Exception $e)
        {
            return "Exception :error";
        }

           
        // if($request->ajax()){            
        //     $countrID = $request->country;
        //     $districts = District::where('country_id',$countrID)->select('id','dist_name')->get();
            
    	// 	return json_encode($districts);
           
    	// }
    }

}
