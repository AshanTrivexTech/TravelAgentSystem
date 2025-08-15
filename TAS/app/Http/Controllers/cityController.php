<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Country;
use Illuminate\Http\Request;
use DB;


class cityController extends Controller
{
    private $add_pv_cty;
    private $edit_pv_cty;
    private $del_pv_cty; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_cty =1;
        $this->edit_pv_cty=1;
        $this->del_pv_cty =1;
    }
    public function index()
    {
        try{
            
            $cities= DB::table('districts')
            ->join('cities', 'districts.id', '=', 'cities.district_id')
            ->select('cities.*', 'districts.dist_name')
            ->orderby('district_id','asc')
            ->get();
    
                 $add_pv = $this->add_pv_cty;
                 $edit_pv = $this->edit_pv_cty;
                 $del_pv  = $this->del_pv_cty;
    
             return view('cities.index',compact('cities','add_pv','edit_pv','del_pv'));
             
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
            $districts=District::all();
            $countrys=Country::all();
            return view('cities.create',compact('districts','countrys'));

        }catch(\Exception $e){

            return abort(404);
        }

        
    }

    public function selectIndexByCity(Request $request)
    {
        if($request->ajax()){            
            $districtID = $request->district;
            $cities = City::where('district_id',$districtID)->select('id','city_name')->get();
            
    		return json_encode($cities);
           
    	}
    }

    public function store(Request $request)
    {        
        //
                try{
                    $code_city=$request->input('code');
                    $name_city=$request->input('name');
         
                    $city_code=City::where('city_code',$code_city)->first();
                    $city_name=City::where('City_name',$name_city)->first();
        
                      
         
                    if($city_code['city_code']!=''){
                     return "*City code  already exist!, Please enter unique City code ";
                    }
                    elseif($city_name['city_name']!=''){
                     return "*City name  already exist!, Please enter unique City name ";
                    }
                    elseif($request->name==''){
                        return "*City name cannot be empty ";
                       }
                      elseif($request->code==''){
                        return "*City code cannot be empty ";
                       }
                     elseif($request->district_id==0){
                        return "*Please select the Country & district ";
                        } 
                    else{
                     try{
                     
                         $city_add =new City;
                         $city_add->city_code=$request->code;
                         $city_add->city_name=$request->name;
                         $city_add->district_id=$request->district_id;
                         $city_add->save();
                         return 'added';
                         
                     }
                     catch(\Exception $tr){

                        // $error_des =$tr->getMessage();

                        // $data=array(
                        // 'Error_code'=>"505",
                        // 'Exp_dtl'=>$error_des
                        //         );
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
        
               }

            

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
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
               
                       
                $data= DB::table('districts')
                ->join('cities', 'districts.id', '=', 'cities.district_id')
                ->select('cities.*', 'districts.dist_name')   
                ->where('city_name','LIKE','%'.$queryd.'%')
                ->orWhere('city_code','LIKE','%'.$queryd.'%')
                ->orWhere('dist_name','LIKE','%'.$queryd.'%')
                ->get();

                $total_row = $data->count();
                 
              
                    
            }else{
                $data= DB::table('districts')
                ->join('cities', 'districts.id', '=', 'cities.district_id')
                ->select('cities.*', 'districts.dist_name')   
                ->get();

                $total_row=$data->count();

            }
           
            
            if($total_row > 0){
                   foreach($data as $row){

                        $output_edit='';
                        $output_del='';

                        if($edit_pv==1){

                            $output_edit='<a href="'.route('city_edit',$row->id).'"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                            <i class="la la-edit"></i></a>
                            </a>
                            ';    
                               
                        }else{
                            $output_edit='';

                        }
                        if($del_pv==1){
                               
                                $output_del='<a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                  class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                   title="Delete details"><i class="la la-trash"></i>
                                </a>
                                  '; 
                        }else{

                            $output_del='';

                        }
                    
                                                  
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td style="text-align: center">'.$row->city_code.'</td>
                       <td>'.$row->city_name.'</td>
                       <td>'.$row->dist_name.'</td>
                       <td style="text-align: center">

                            '.$output_edit.'
                            '.$output_del.'

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
           'table_data'=>$output,
           'total_data'=>$total_row
       );

       
       return json_encode($data);
        }

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $city=City::findOrFail($id);
            $districts=District::all();
            return view('cities.edit_form',compact('city','districts'));

        }catch(\Exception $e){

            return abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->name==''){
            return "*City name cannot be empty ";
           }
           else if($request->code==''){
            return "*City code cannot be empty ";
           }

        $id=$request->id;

        try{
            

        $districts=City::findOrFail($id);

        $districts->city_name=$request->name;  
        $districts->city_code=$request->code;
        $districts->district_id=$request->district_id;
        $districts->save();

        return 'updated';


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
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    $city=$request->input('id');

        City::find($city)->delete();

    return 'deleted';
    }
}
