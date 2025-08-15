<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Country;
use App\District;
use App\City;
use Illuminate\Support\Facades\DB;
use App\Distance;

class locationController extends Controller
{
    private $add_pv_lc;
    private $edit_pv_lc;
    private $del_pv_lc;

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_lc=1;
        $this->edit_pv_lc=1;
        $this->del_pv_this=1;
    }
    
    public function index()
    {
        
        try{
            $location_view= DB::table('locations')
            ->join('countries','countries.id','=','locations.country_id')
            ->join('districts','districts.id','=','locations.district_id')
            ->select('locations.id','locations.location_code','locations.location_name','locations.short_des','countries.country_name','districts.dist_name')
            ->get();

               $add_pv=$this->add_pv_lc;
               $edit_pv=$this->edit_pv_lc;
               $del_pv=$this->del_pv_lc;

            return view('locations.index',compact('location_view','add_pv','edit_pv','del_pv'));
        }
        catch(\Exception $e){

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
        //
        try{
            $country_id=Country::all();
            $district_id=District::all();
          
        return view('locations.create',compact('country_id','district_id'));
        }
        catch(\Exception $e){

            return abort(404); 

        }
        
    }


    public function siteSeen_create()
    {

        try
        {
            $country_id=Country::all();
            $district_id=District::all();
            $locations=Location::all();
          
         return view('locations.site_seen',compact('country_id','district_id','locations'));
        }
        catch(\Excption $e)
        {
              return abort(404);
        }
    }

    public function stieSeen_store(Request $request)
    {

        try
        {

            $code_location=$request->input('location_code');
            $name_location=$request->input('location_name');
 
            $location_code=Location::where('location_code',$code_location)->first();
            $location_name=Location::where('location_name',$name_location)->first();
 
            if($location_code['location_code']!=''){
             return "*Location code  already exist!, Please enter unique location code ";
            }
            else if($location_name['location_name']!=''){
             return "*Location name  already exist!, Please enter unique location name ";
            }
            if($request->code==''){
                return "*Location code cannot be empty ";
               }
              else if($request->name==''){
                return "*Location name cannot be empty ";
               }
             
             else if($request->country==0){
              return "*Please select the country ";
                   }
                   else if($request->district==0){
                    return "*Please select the district ";
                   }
                   
            else{
              


            DB::beginTransaction();
            $location_add =new Location();
            $location_add->location_code=$request->code;
            $location_add->location_name=$request->name;
            $location_add->long_name=$request->long_name;
            $location_add->geo_name=$request->geo_name;
            $location_add->country_id=$request->country;
            $location_add->district_id=$request->district;
           
            $location_add->short_des=$request->short_discription;
            $location_add->narration=$request->narration;
            $location_add->status=1;
            $location_add->ss=1;
            $location_add->save();
            
            $loc_max=Location::select('id')->orderBy('id','DESC')->first();


            $distance=new Distance;
            $distance->frm=$request->site;
            $distance->to=$loc_max->id;
            $distance->distance=$request->milage;
             $distance->save();

            DB::commit();
            return 'added';
            
        }

        }catch(\Excption $e)
        {
            DB::rollBack();
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "*Some Fields Cannot Be Null";
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
             
            $code_location=$request->input('location_code');
            $name_location=$request->input('location_name');
 
            $location_code=Location::where('location_code',$code_location)->first();
            $location_name=Location::where('location_name',$name_location)->first();
 
            if($location_code['location_code']!=''){
             return "*Location code  already exist!, Please enter unique location code ";
            }
            else if($location_name['location_name']!=''){
             return "*Location name  already exist!, Please enter unique location name ";
            }
            if($request->code==''){
                return "*Location code cannot be empty ";
               }
              else if($request->name==''){
                return "*Location name cannot be empty ";
               }
             
             else if($request->country==0){
              return "*Please select the country ";
                   }
                   else if($request->district==0){
                    return "*Please select the district ";
                   }
                   
            else{
             try{
             
                 $location_add =new Location();
                 $location_add->location_code=$request->code;
                 $location_add->location_name=$request->name;
                 $location_add->long_name=$request->long_name;
                 $location_add->geo_name=$request->geo_name;
                 $location_add->country_id=$request->country;
                 $location_add->district_id=$request->district;
                
                 $location_add->short_des=$request->short_discription;
                 $location_add->narration=$request->narration;
                 $location_add->status=0;
                 $location_add->ss=0;
                 $location_add->save();
                 return 'added';
                 
             }
             catch(\Exception $tr){
      
                // $error_des =$tr->getMessage();

                // $data=array(
                // 'Error_code'=>"505",
                // 'Exp_dtl'=>$error_des
                //           );
                // return ($data);   
                 return "* Some field cannot be empty!, Please check before save"; 
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
            // return "Exception Error : ";

       }
           
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    public function livesearch(request $request){
        if($request->ajax()){

            $queryd=$request->get('query');
            $edit_pv=$request->get('edit_pv');
            $del_pv=$request->get('del_pv');
            
            $output='';
            $output_edit='';
            $output_del='';
        

            if($queryd!=''){
               
                       
                $data= DB::table('locations')
                 ->join('countries','countries.id','=','locations.country_id')
                 ->join('districts','districts.id','=','locations.district_id')
                
                 ->select('locations.id','locations.location_code','locations.location_name','locations.short_des','countries.country_name','districts.dist_name')  
                 ->where('location_code','LIKE','%'.$queryd.'%')
                 ->orWhere('location_name','LIKE','%'.$queryd.'%')
                 ->orWhere('country_name','LIKE','%'.$queryd.'%')
                 ->orWhere('dist_name','LIKE','%'.$queryd.'%')
                
                 ->get();

                $total_row = $data->count();
                 
              
                    
            }else{
                $data= DB::table('locations')
                 ->join('countries','countries.id','=','locations.country_id')
                 ->join('districts','districts.id','=','locations.district_id')
                
                 ->select('locations.id','locations.location_code','locations.location_name','locations.short_des','countries.country_name','districts.dist_name')    
                 ->get();

                $total_row=$data->count();

            }
           
            
            if($total_row > 0){
                   foreach($data as $row){
                       
                     $output_edit='';
                     $output_del='';

                     if($edit_pv==1){
                          
                        $output_edit='
                                       <a href="'.route('location_edit',$row->id).'"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                       <i class="la la-edit"></i>
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
                                                  
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td>'.$row->location_code.'</td>
                       <td>'.$row->location_name.'</td>
                       <td>'.$row->country_name.'</td>
                       <td>'.$row->dist_name.'</td>
                     
                       <td>'.$row->short_des.'</td>
                       <td style="text-align: center">

                             '.$output_edit.'
                             '.$output_del.'


                       

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{

            $countrys=Country::all();
            $districts=District::all();
            $citys=City::all();
            
            $location_edit=Location::findOrFail($id);
            return view('locations.edit_form',compact('location_edit','countrys','districts','citys'));

         }catch(\Excepption $e){

             return abort(404);
         }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->geo_name==''){
            return "*Geo name cannot be empty ";
           }
              
                $location_id=$request->id;

    try{
         
                $location_Details =Location::find($location_id);
                $location_Details->geo_name = $request->geo_name;
                $location_Details->short_des = $request->short_discription;
                $location_Details->narration = $request->narration;       
                $location_Details->save();
   
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{

            $location_ID=$request->input('id');
            DB::beginTransaction();
            Location::find($location_ID)->delete();
            Distance::where('frm',$location_ID)->delete();
            Distance::where('to',$location_ID)->delete();           
            DB::commit();

            return 'deleted';
        }
        catch(\Exception $e){
            DB::rollBack();
            return 'NotDeleted';
            
        }
    }
}
