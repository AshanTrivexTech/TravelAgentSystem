<?php

namespace App\Http\Controllers;

use App\VehicleType;
use Illuminate\Http\Request;
use \Exception;


class vehicleTypeController extends Controller
{
    private $add_pv_vt;
    private $edit_pv_vt;
    private $del_pv_vt;

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_vt=1;
        $this->edit_pv_vt=1;
        $this->del_pv_vt=1;
    }
    
    public function index()
    {
          try{
                  
            $vehicles=VehicleType::all();

            $add_pv =$this->add_pv_vt;
            $edit_pv =$this->edit_pv_vt;
            $del_pv =$this->del_pv_vt;
   
           return view('vehicle_types.index',compact('vehicles','add_pv','edit_pv','del_pv'));
              
          }catch(\Exception $e){

              return abort(404);
          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function v_typeLiveSearch(Request $request)
    {
        if($request->ajax()){

            $queryd=$request->get('query');
            
       //return json_encode($queryd);
            
            $output='';

            if($queryd!=''){
               
                       
                $data=VehicleType::where('type','LIKE','%'.$queryd.'%')->get();

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data=VehicleType::all();
                   

                $total_row=$data->count();
                

            }


           
               
            if($total_row > 0){
                

           

                foreach($data as $row){
              
                                        
                    $output.='
                    <tr style="text-align: center">
                    <td >'.$row->id.'</td>
                    <td>'.$row->type.'</td>
                    <td>'.$row->no_of_seats.'</td>
                    <td>'.$row->rate_per_km.'</td>
                    <td>
                                <a href="'.route('edit_vehicle',$row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i></a> 
                          

                               <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.') "
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                    title="Edit View">
                                     <i class="la la-trash"></i>

                                 </a>

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

    public function create()
    {
          try{

            return view('vehicle_types.create');

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
        try{

            $type_vehicle = $request->type;
            
            $vehicle_type =VehicleType::where('type',$type_vehicle)->first();
            
             if($vehicle_type['type'] !='') {

                return "*Vehicle type  already exist!, Please enter unique vehicle type ";
             }
             elseif($request->type==''){
                return "*Vehicle type cannot be empty ";
               }
              elseif($request->nos==''){
                return "*No of seats cannot be empty ";
               }
             elseif($request->rate_per_km==''){
                return "*Rate per KM cannot be empty ";
                } 
            else
            {
                try{

                    $vehicle_types = new VehicleType;
                    $vehicle_types->type = $request->type;
                    $vehicle_types->no_of_seats=$request->nos;
                    $vehicle_types->rate_per_km =$request->rate_per_km;      
                    $vehicle_types->save();
       
                    return 'added';
                }
                      catch(\Exception $tr){
                                 
                        // $error_des =$tr->getMessage();

                        // $data=array(
                        // 'Error_code'=>"505",
                        // 'Exp_dtl'=>$error_des
                        //           );
                        // return ($data);
                        return 'Some field cannot be empty!, Please check before save';
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
            //  return "Exception Error : ";

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          try{

            $vehicles_type=VehicleType::findOrFail($id);
            return view('vehicle_types.edit_form',compact('vehicles_type'));

          }catch(\Exception $e){

               return abort(404);
          }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->type==''){
            return "*Vehicle type cannot be empty ";
           }
        elseif($request->nos==''){
            return "*No of seats cannot be empty ";
           }
        elseif($request->rpkm==''){
            return "*Rate per KM cannot be empty ";
            } 
            else{

                try{
                    $vehicle=$request->id;
                    $vehicle_type=VehicleType::find($vehicle);
                    $vehicle_type->no_of_seats=$request->nos;
                    $vehicle_type->rate_per_km=$request->rpkm;
                    $vehicle_type->type=$request->type;
                    $vehicle_type->save();
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
                        // return "Exception Error : ";
            
                    }
            
            }
        


    }

    public function findVehilceDetailsIndex(Request $req)
    {
        if($req->ajax()){

            try{
                $typeId = $req->vehilceTypeID;
                $vehicle_typeData = VehicleType::where('id',$typeId)
                                  ->select('id','no_of_seats','rate_per_km')
                                  ->first();
                
                 return json_encode($vehicle_typeData); 
            }catch(Exception $ex){
                return json_encode('Error Something Wrog!');
            }

           // return json_encode('awdasda');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //


        $v_id=VehicleType::find($request->id)->delete();
        return 'deleted';
        

    }
}
