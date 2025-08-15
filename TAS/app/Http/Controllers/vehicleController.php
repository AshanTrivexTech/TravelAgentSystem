<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Supplier;
use App\Country;
use App\City;
use App\District;
use App\SupContactDetails;
use DB;
use App\VehicleType;
use PHPUnit\Runner\Exception;

class vehicleController extends Controller
{
     private $add_pv_vs;
     private $edit_pv_vs;
     private $del_pv_vs;

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_vs=1;
        $this->edit_pv_vs=1;
        $this->del_pv_vs=1;
    }
    
    public function index()
    {
            try
            {
            $VehiclesSup = DB::table('suppliers')
            ->join('cities','suppliers.city_id','=','cities.id')
            ->select('suppliers.id','suppliers.code','suppliers.sup_name','suppliers.address','suppliers.status','cities.city_name')
            ->where('suppliers.type','Vehicle')
            ->get();
                
                  $add_pv =$this->add_pv_vs;
                  $edit_pv =$this->edit_pv_vs;
                  $del_pv =$this->del_pv_vs;

                return view('vehicles.vehicle_supplier_index',compact('VehiclesSup','add_pv','edit_pv','del_pv'));

            }catch(\Exception $e){

                return abort(404);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function allSearch(Request $request)
     {

        if($request->ajax()){

            $queryd=$request->get('query');
            
       //return json_encode($queryd);
            

            $output='';
            if($queryd!=''){
               
                       
                $data=DB::table('suppliers')
                ->join('vehicles', 'suppliers.id', '=', 'vehicles.supplier_id')
                ->join('vehicle_types','vehicles.vehicle_type_id','=','vehicle_types.id')            
                ->select('vehicles.id','suppliers.sup_name','vehicle_types.type',
                        'vehicles.title','vehicles.reg_no','vehicles.licence_exp_date',
                            'vehicles.insurance_exp_date','vehicles.status','vehicle_types.rate_per_km')
                ->where('suppliers.type','Vehicle')
                ->where('sup_name','LIKE','%'.$queryd.'%')
                ->get();
                   

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data=DB::table('suppliers')
                ->join('vehicles', 'suppliers.id', '=', 'vehicles.supplier_id')
                ->join('vehicle_types','vehicles.vehicle_type_id','=','vehicle_types.id')            
                ->select('vehicles.id','suppliers.sup_name','vehicle_types.type',
                        'vehicles.title','vehicles.reg_no','vehicles.licence_exp_date',
                            'vehicles.insurance_exp_date','vehicles.status','vehicle_types.rate_per_km')
                ->where('suppliers.type','Vehicle')
                ->get();

                $total_row=$data->count();
                

            }
   
            
            if($total_row > 0){
                

           

                foreach($data as $row){
              
                    $status='';
                    if($row->status==1)
                    {
                        $status=' <span class="m-badge m-badge--success m-badge--wide">Active</span>';
                    }
                    else
                    {
                        $status='<span class="m-badge m-badge--danger m-badge--wide">In Active</span>';
                    }
                                        
                    $output.='
                    <tr>
                    <td style="text-align: center;">'.$row->id.'</td>
                    <td>'.$row->sup_name.'</td>
                    <td>'.$row->type.'</td>
                    <td>'.$row->title.'</td>
                    <td style="text-align: center;">'.$row->reg_no.'</td>
                    <td>'.$row->licence_exp_date.'</td>
                    <td>'.$row->insurance_exp_date.'</td>
                    <td style="text-align: center;">'.$row->rate_per_km.'</td>
                    <td style="text-align: center;"> '.$status.' </td>
                    <td style="text-align: center;">                                
                            
                            <a href="'.Route('vehicle_edit',$row->id).'"
                               class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                title="Edit View">
                                <i class="la la-edit"></i>

                            </a>
                             <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.') "
                               class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                               title="Delete">
                                <i class="la la-trash"></i>

                            </a>
                        </td>

                
                </tr>    
             ';
                }
                

         }
         else{
             $output='<tr>
             <td align="center" colspan="10">No records found</td>
             </tr>';

             }


             $data=array(
                'table_data'=>$output,
                'total_data'=>$total_row
            );
            
            return json_encode($data);
        }

     }




    public function vSup_liveSearch(Request $request)
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
               
                       
                $data=DB::table('suppliers')
                ->join('cities','suppliers.city_id','=','cities.id')
                ->select('suppliers.id','suppliers.code','suppliers.sup_name','suppliers.address','suppliers.status','cities.city_name')
                ->where('suppliers.type','Vehicle')
                ->where('sup_name','LIKE','%'.$queryd.'%') 
                ->get();

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data=DB::table('suppliers')
                ->join('cities','suppliers.city_id','=','cities.id')
                ->select('suppliers.id','suppliers.code','suppliers.sup_name','suppliers.address','suppliers.status','cities.city_name')
                ->where('suppliers.type','Vehicle')
                ->get();

                $total_row=$data->count();
                

            }
            if($total_row > 0){
                

           

                foreach($data as $row){

                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){

                        $output_edit='
                                       <a href="'.Route('vehicle_sup_edit',$row->id).'"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Edit View">
                                       <i class="la la-edit"></i>
                                       </a>
                                           ';  
                    }else{

                        $output_edit=''; 

                    }if($del_pv==1){

                        $output_del='
                                      <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.') "
                                      class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                      title="Delete">
                                      <i class="la la-trash"></i>
                                      </a>';

                    }else{

                        $output_del='';
                    }
              
                         $status='';
                         if($row->status==1)
                         {
                            $status='<span class="m-badge m-badge--success m-badge--wide">Active</span>';
                         }
                         else
                         {
                                $status='  <span class="m-badge m-badge--danger m-badge--wide">In Active</span>';
                         }

                    $output.='
                    <tr>
                    <td  style="text-align: center;" >'.$row->id.'</td>
                    <td  style="text-align: center;" >'.$row->code.'</td>
                    <td>'.$row->sup_name.'</td>
                    <td>'.$row->address.'</td>
                    <td>'.$row->city_name.'</td>                            
                    <td style="text-align: center;">'.$status.' </td>
                    
                    <td style="text-align: center;">
                            <a href="'.Route('vehicle_index',$row->id).'"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill"
                             title="View Vehicles">
                             <i class="la la-automobile"></i>
                                    
                            </a>
                            <a href=""
                                class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill"
                                 title="Email">
                                 <i class="la la-envelope"></i>

                            </a>
                            <a href=""
                                class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill"
                                 title="Phone">
                                 <i class="la la-tty"></i>
                                
                            </a>

                                  '.$output_edit.'
                                  '.$output_del.'

                             

                        </td>                            
                </tr>                  
             ';
                }
                

         }
         else{
             $output='<tr>
             <td align="center" colspan="7">No records found</td>
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
        //
        try{
                 $country_list = Country::all();
                 //$city_list = City::all();
                 //$district_list =
                   //return $countys_list; 
                return view('vehicles.create_vehicle_supplier',compact('country_list'));
                
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

            $code_h = $request->input('code');
            $name_h = $request->input('name');

            $sup_code = Supplier::where('code',$code_h)->where('type','Vehicle')->first();
            $sup_name = Supplier::where('sup_name',$name_h)->first();
            
          
            // if(($code_h =='') ||  ($name_h == '')) {
                    
            //     return "* Some field cannot be empty!, Please check before save"; 

            // }
            if($sup_code['code'] !='') {

                return "* Code already exist!, Please enter unique code ";

            }elseif($sup_name['sup_name'] !=''){   
                return "* Name already exist!, Please enter unique name "; 

            }
            // elseif((strlen($request->tel)) !=10){ 
                
            //     return "* Invalied Tel Number!, Please enter again";  
                             
            // }
              elseif($request->code==''){
                return "*Code cannot be empty ";
               }
              else if($request->name==''){
                return "*Name cannot be empty ";
               }
               if($request->address==''){
                return "*Address cannot be empty ";
               }
              else if($request->country==0){
                return "*Please select the country ";
               }
               if($request->district==0){
                return "*Please select the district ";
               }
              else if($request->city==0){
                return "*Please select the city";
               }
               if($request->tel==''){
                return "*Telephone number cannot be empty";
               }
               else if(($this->my_email($request->email)=='') && (($request->email) !='')){
                       return "* Invalid Email Address ";
               }

            else{


                try{

                DB::beginTransaction();

                        $supDetails = new Supplier();
                 
                        $supDetails->code = $request->code;
                        $supDetails->sup_name = $request->name;
                        $supDetails->type = 'Vehicle';
                        $supDetails->address = $request->address;
                        $supDetails->city_id = $request->city;
                        $supDetails->district_id = $request->district;
                        $supDetails->country_id = $request->country;
                        $supDetails->status = $request->status;
                        
                 $supDetails->save();

                 $sup_id = Supplier::select('id')->orderBy('id','DESC')->first();
                    
                        
                 $supContacts = array(
                    array('supplier_id'=>$sup_id->id, 'type'=>'Email_A','contact'=>$request->email),
                    array('supplier_id'=>$sup_id->id, 'type'=>'Tel','contact'=>$request->tel),                
                 );

                 SupContactDetails::insert($supContacts);                               
               

                DB::commit();

                return 'added';

                }catch(\Exception $tr){

                    DB::rollBack();

                    // $error_des =$tr->getMessage();

                    // $data=array(
                    // 'Error_code'=>"505",
                    // 'Exp_dtl'=>$error_des
                    //           );
                    // return ($data);
                    return "* Some field cannot be empty!, Please check before save"; 

                }


            }
             
            

        }catch(\Exception $e)
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
     
    function my_email($email)
     {
       
        return filter_var($email, FILTER_VALIDATE_EMAIL);

     }
    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }


    public function view_contacts(Request $request){
        
        $email; $tel;
        if($request->ajax()){

        $id=$request->id;
        
        $contacts=SupContactDetails::where('supplier_id',$id)->select('type','contact')->get();
        
        foreach($contacts as $contact){
            
            if($contact->type=='Email_A'){
                 
                $email=$contact->contact;
                 
            }elseif($contact->type=='Tel'){
            
                 $tel=$contact->contact;

            }   
        }

        $data=array(
            'email'=>$email,
            'tel'=>$tel
        );

            return json_encode($data);
                
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        try{
            
            $country_list = Country::all();
            $city_list=City::all();
            $district_list=District::all();
            $vehicleSupplier = Supplier::find($id);
            $vehicleSupTel = Supplier::find($id)->contacts()->where('type','Tel')->first();
            $vehicleSupEmail = Supplier::find($id)->contacts()->where('type','Email_A')->first();
           return view('vehicles.edit_vehicle_supplier',compact('country_list','vehicleSupplier','vehicleSupTel','vehicleSupEmail','city_list','district_list'));
             
            
        }catch(Exception $e){
    
            return abort(404); 
        }
        
    }
    
    public function update(Request $request)
    {
        //
           if($request->code==''){
            return "*Code cannot be empty ";
           }
          else if($request->name==''){
            return "*Name cannot be empty ";
           }
           if($request->address==''){
            return "*Address cannot be empty ";
           }
          else if($request->country==0){
            return "*Please select the country ";
           }
           if($request->district_id==0){
            return "*Please select the district ";
           }
          else if($request->city==0){
            return "*Please select the city";
           }
           if($request->tel==''){
            return "*Telephone number cannot be empty";
           }
           else if(($this->my_email($request->email)=='') && (($request->email) !='')){
                   return "* Invalid Email Address ";
           }


                try{
                    $supID= $request->id;

                      DB::beginTransaction();

                     $supDetails = Supplier::findOrfail($supID);
                    
                        $supDetails->code = $request->code;
                        $supDetails->sup_name = $request->name;
                        //$supDetails->type = 'Vehicle';
                        $supDetails->address = $request->address;
                        $supDetails->city_id = $request->city;
                        $supDetails->district_id = $request->district_id;
                        $supDetails->country_id = $request->country;
                        $supDetails->status = $request->status;
                        
                 $supDetails->save();

                 SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Email_A'])
                 ->update(['contact'=>$request->email]);

                 SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Tel'])
                 ->update(['contact'=>$request->tel]); 

                DB::commit();

                return 'Updated';

                }catch(\Exception $tr){

                    DB::rollBack();
                    $error_des =$tr->getMessage();

                    $data=array(
                    'Error_code'=>"505",
                    'Exp_dtl'=>$error_des
                              );
                    return ($data);
                    // return "* Some field cannot be empty!, Please check before save"; 

                }


            // }
             
            

        // }catch(\Exception $e)
        // {
        //     return "Exception Error : ". $e;
        // }

    }

   
    public function destroy(Request $request)
    {
        //
        try {
              $sup_ID = $request->input('id');

            try{
                   $check_vehicles = Supplier::find($sup_ID)->vehicles()->first();

                   if($check_vehicles == ''){

                   
                   //Start transaction
                   DB::beginTransaction();
                   Supplier::find($sup_ID)->delete();
                   SupContactDetails::where('supplier_id',$sup_ID)->delete();
                 

                   // Commit transaction
                   DB::commit();

                   return "deleted";
                }else
                {
                    return "Cannot Delete".$sup_ID;
                }     
            }catch(\Exception $e){
                 // if transaction faile Rollback and return response
                 DB::rollBack();
                 return 'Cannot Delete';

            }

        }catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }

    // Vehicles Section
    public function indexVehicleAll()
    {   
        try{

        
        $Vehicles_list = DB::table('suppliers')
        ->join('vehicles', 'suppliers.id', '=', 'vehicles.supplier_id')
        ->join('vehicle_types','vehicles.vehicle_type_id','=','vehicle_types.id')            
        ->select('vehicles.id','suppliers.sup_name','vehicle_types.type',
                'vehicles.title','vehicles.reg_no','vehicles.licence_exp_date',
                    'vehicles.insurance_exp_date','vehicles.status','vehicle_types.rate_per_km')
        ->where('suppliers.type','Vehicle')
        ->get();
           // return $Vehicles_list;
        return view('vehicles.index_all',compact('Vehicles_list'));

        }catch(Exception $e)
        {
            return abort(404);
        }
    }    
    public function indexVehicle($supID)
    {   
        try{

            $VehicleSupDetails = Supplier::findOrFail($supID);
            $vehicle_list = DB::table('vehicles')           
            ->join('vehicle_types','vehicles.vehicle_type_id','=','vehicle_types.id')            
            ->select('vehicles.id','vehicle_types.type',
                    'vehicles.title','vehicles.reg_no','vehicles.licence_exp_date',
                        'vehicles.insurance_exp_date','vehicles.status','vehicle_types.rate_per_km')
            ->where('supplier_id',$supID)
            ->get();        


            return view('vehicles.index',compact('vehicle_list','VehicleSupDetails'));
           
        }catch(\Exception $e){

            return abort(404);
        }
        
    }

    public function createVehicle()
    {
        try{

           $vehicleSup_List = Supplier::where('type','Vehicle')->get();
           $vehicleType_list = VehicleType::all();
           // return $vehicleSup_List;
           return view('vehicles.create',compact('vehicleSup_List','vehicleType_list'));

        }catch(\Exception $e){
            return abort(404);
        }
    }
    public function storeVehicle(Request $request)
    {   
        try{

           
            $vehicle_title = Vehicle::where('title',$request->title)->where('vehicle_type_id',$request->vehicle_type)->first();
            $vehicle_regNo = Vehicle::where('reg_no',$request->vehicle_no)->first();
            
          
            if($vehicle_title['title'] !='') {

                return "* Title already exist!, Please enter unique Title ";
                
            }elseif($vehicle_regNo['reg_no'] !=''){   
                return "* This Vehicle Registration No already exist! "; 

            }
              elseif($request->title==''){
                return "*Title cannot be empty ";
               }
              else if($request->vehicle_type==0){
                return "*Please select vehicle type ";
               }
               if($request->supplier==0){
                return "*Please select supplier ";
               }
              else if($request->vehicle_no==''){
                return "*Vehicle No cannot be empty ";
               }
               if($request->lc_exDate==''){
                return "*Please select License Expire Date ";
               }
              else if($request->ins_exDate==''){
                return "*Please select Insurance  Expire Date";
               }
               if($request->mf_year==''){
                return "*Year of manufacture cannot be empty";
               }
              else if($request->reg_year==''){
                return "*Year of registration cannot be empty ";
               }
            else
            {
                try{

                 $vehicle = new Vehicle();

                 $vehicle->title = $request->title;
                 $vehicle->supplier_id = $request->supplier;
                 $vehicle->vehicle_type_id = $request->vehicle_type;
                 $vehicle->reg_no = $request->vehicle_no;
                 $vehicle->licence_exp_date = $request->lc_exDate;
                 $vehicle->insurance_exp_date = $request->ins_exDate;
                 $vehicle->mf_year = $request->mf_year;
                 $vehicle->reg_year = $request->reg_year;
                 $vehicle->remarks = $request->remarks;
                 $vehicle->status = $request->status;
                
                 $vehicle->save();                 
          

                return "added";

                }catch(\Exception $tr){

                    
                    return "* Some field cannot be empty!, Please check before save".$tr; 

                }


            }

        }catch(\Exception $e)
        {              
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "Exception Error : ">$e;
        }

       
    }
    public function editVehicle($id)
    {
        try{
            
            
            $vehicleDetail = Vehicle::findOrFail($id);
            $vehicleType_list = VehicleType::all();
            $vehicleSup_List = Supplier::where('type','Vehicle')->get();
            // $vehicleSupTel = Supplier::find($id)->contacts()->where('type','Tel')->first();
            // $vehicleSupEmail = Supplier::find($id)->contacts()->where('type','Email_A')->first();

           return view('vehicles.edit_form',compact('vehicleDetail','vehicleType_list','vehicleSup_List'));
            
        }catch(Exception $e){
    
            return abort(404); 
        }
        
    }


    public function updateVehicle(Request $request)
    {

        try{

           
            $vehicle_title = Vehicle::where('title',$request->title)->first();
            $vehicle_regNo = Vehicle::where('reg_no',$request->vehicle_no)->first();
            
              if($request->title==''){
                return "*Title cannot be empty ";
               }
              else if($request->vehicle_type==0){
                return "*Please select vehicle type ";
               }
               if($request->supplier==0){
                return "*Please select supplier ";
               }
              else if($request->vehicle_no==''){
                return "*Vehicle No cannot be empty ";
               }
               if($request->lc_exDate==''){
                return "*Please select License Expire Date ";
               }
              else if($request->ins_exDate==''){
                return "*Please select Insurance  Expire Date";
               }
               if($request->mf_year==''){
                return "*Year of manufacture cannot be empty";
               }
              else if($request->reg_year==''){
                return "*Year of registration cannot be empty ";
               }
            // if($vehicle_title['title'] !='' && ($vehicle_title->id != $request->id)) {

            //     return "* Title already exist!, Please enter unique Title ";
                
            // }elseif($vehicle_regNo['reg_no'] !='' &&($vehicle_regNo->id !=$request->id) ){   
            //     return "* This Vehicle Registration No already exist! "; 
            //  }
             else
            {
                try{

                 $vehicle = Vehicle::find($request->id);

                 $vehicle->title = $request->title;
                 $vehicle->supplier_id = $request->supplier;
                 $vehicle->vehicle_type_id = $request->vehicle_type;
                 $vehicle->reg_no = $request->vehicle_no;
                 $vehicle->licence_exp_date = $request->lc_exDate;
                 $vehicle->insurance_exp_date = $request->ins_exDate;
                 $vehicle->mf_year = $request->mf_year;
                 $vehicle->reg_year = $request->reg_year;
                 $vehicle->remarks = $request->remarks;
                 $vehicle->status = $request->status;
                
                 $vehicle->save();                 
          

                return "Updated";

                }catch(\Exception $tr){

                    
                    return "* Some field cannot be empty!, Please check before save"; 

                }


            }

        }catch(\Exception $e)
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



    public function destroyVehicle(Request $request)
    {   
        try {
            $VehicleID = $request->input('id');

            try{

                   Vehicle::find($VehicleID)->delete();
                                    
                   return "deleted";

            }catch(\Exception $e){
                 // if transaction faile Rollback and return response
                  return 'Cannot Delete';

            }

        }catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
    


}
