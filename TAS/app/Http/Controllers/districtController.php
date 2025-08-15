<?php

namespace App\Http\Controllers;

use App\District;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class districtController extends Controller
{
        private $add_pv_dis;
        private $edit_pv_dis;
        private $del_pv_dis;

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_dis=1;
        $this->edit_pv_dis=1;
        $this->del_pv_dis=1;
    }
    
    public function index()
    {
         
       try{

        $district_view=DB::table('districts')
        ->join('countries','countries.id','=','districts.country_id')
        ->select('districts.*','countries.country_name')
        //->orderBy('country_id', 'desc')
        ->get();
                 $add_pv=$this->add_pv_dis;
                 $edit_pv=$this->edit_pv_dis;
                 $del_pv=$this->del_pv_dis;

        return view('districts.index',compact('district_view','add_pv','edit_pv','del_pv'));

       }
       
       catch(\Exception $e){

          return abort(404);
    }
    }

    public function selectIndexByCountry(Request $request)
    {
        
        if($request->ajax()){            
            $countrID = $request->country;
            $districts = District::where('country_id',$countrID)->select('id','dist_name')->get();
            
    		return json_encode($districts);
           
    	}

    }


    public function create()
    {
        try{
            $country_name=Country::all();
            return view('districts.create',compact('country_name'));  

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
             
            $code_district=$request->input('code');
            $name_district=$request->input('name');
 
            $district_code=District::where('code',$code_district)->first();
            $district_name=District::where('dist_name',$name_district)->first();
             
            
        
               if($request->name==''){
                return "*District name cannot be empty ";
               }
               else if($request->code==''){
                return "*District code cannot be empty ";
               }
               else if($request->country==0){
                return "*Please select the country ";
               }
               
             elseif($district_code['code']!=''){
             return "*District code  already exist!, Please enter unique District code ";
            }
            else if($district_name['dist_name']!=''){
             return "*District name  already exist!, Please enter unique District name ";
            }
            
               
            else{
             try{
             
                 $district_add =new District;
                 $district_add->code=$request->code;
                 $district_add->dist_name=$request->name;
                 $district_add->country_id=$request->country;
                 $district_add->save();
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
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
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
               
                       
                $data=DB::table('districts')
                ->join('countries','countries.id','=','districts.country_id')
                ->select('districts.*','countries.country_name')   
                ->where('dist_name','LIKE','%'.$queryd.'%')
                ->orWhere('code','LIKE','%'.$queryd.'%')
                ->get();

                $total_row = $data->count();
                 
              
                    
            }else{
                $data=DB::table('districts')
                ->join('countries','countries.id','=','districts.country_id')
                ->select('districts.*','countries.country_name')    
                ->get();

                $total_row=$data->count();

            }
           
            
            if($total_row > 0){
                   foreach($data as $row){
                    
                    $output_edit='';
                    $output_del='';
                    
                    if($edit_pv==1){
                            
                        $output_edit='
                                       <a href="'.route('edit_district',$row->id).'"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                       <i class="la la-edit"></i></a>
                                       </a>
                                      ';

                    }else{

                        $output_edit='';
                    }
                    if($del_pv==1){
                              
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
                       <td style="text-align: center">'.$row->code.'</td>
                       <td>'.$row->dist_name.'</td>
                       <td>'.$row->country_name.'</td>
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
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           try{
               
            $districts=District::findOrFail($id);
            $countrys=Country::all();
     
            return view('districts.edit',compact('districts','countrys'));   
             
           }catch(\Exception $e){

               return abort(404);
           }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->name==''){
            return "*District name cannot be empty ";
           }
           else if($request->code==''){
            return "*District code cannot be empty ";
           }

        $id=$request->id;

        try{
            

        $districts=District::findOrFail($id);

        $districts->code=$request->code;  
        $districts->dist_name=$request->name;
        $districts->country_id=$request->country;
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
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

           try{
            $district_ID=$request->id;
            District::findOrFail($district_ID)->delete();
            return 'deleted';
           }
           catch(\Exception $e){

            return 'NotDeleted';
            
        }

        //
    }
}
