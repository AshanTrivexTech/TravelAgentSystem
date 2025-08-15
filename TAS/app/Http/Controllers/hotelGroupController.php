<?php

namespace App\Http\Controllers;

use App\HotelGroup;
use Illuminate\Http\Request;

class hotelGroupController extends Controller
{
     private $add_pv_hg;
     private $edit_pv_hg;
     private $del_pv_hg; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_hg =1;
        $this->edit_pv_hg=1;
        $this->del_pv_hg =1;
    }
    
    public function index()
    {
           try{

            $hotel_groups=HotelGroup::all();
             
            $add_pv  = $this->add_pv_hg;
            $edit_pv = $this->edit_pv_hg;
            $del_pv  = $this->del_pv_hg;
    
            return view('hotel_groups.index',compact('hotel_groups','add_pv','edit_pv','del_pv'));

           }catch(\Exception $e){

               return abort(404);
           }
        
    }

    public function gropu_live_search(Request $request)
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
               
                       
                $data = HotelGroup::where('hotel_gp_name','LIKE','%'.$queryd.'%')->get();

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data =HotelGroup::all();
                $total_row=$data->count();
                

            }
            if($total_row > 0){
                

           

                foreach($data as $row){
                        
                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){
                          
                        $output_edit='
                                      <a href="'.route('hotelgroup_edit',$row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                      title="Edit details">
                                      <i class="la la-edit"></i>
                                      </a>
                                      ';

                    }else{
                        $output_edit='';
                          
                    }if($del_pv==1){
                                
                            $output_del='
                                         <a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Delete details">
                                         <i class="la la-trash"></i>
                                         </a>
                                         ';

                    }else{
                               
                        $output_del='';
                    }
                                               
                    $output.='
                    <tr>
                    <td style="text-align: center">'.$row->id.'</td>
                    <td style="text-align: center">'.$row->group_code.'</td>
                    <td>'.$row->hotel_gp_name.'</td>
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

            return view('hotel_groups.create');

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
            $code_hotelgroup=$request->input('group_code');
            $name_hotelgroup=$request->input('hotel_gp_name');
    
            $hotelgroup_code=HotelGroup::where('group_code',$code_hotelgroup)->first();
            $hotelgroup_name=HotelGroup::where('hotel_gp_name',$name_hotelgroup)->first();
    
            if($hotelgroup_code['group_code']!=''){
    
                return "*Hotel Group code  already exist!, Please enter unique code ";
            }
            elseif($hotelgroup_name['hotel_gp_name']!='')
            {
                return "*Hotel Group  already exist!, Please enter unique name ";
            }
            elseif($request->code==''){
                return "*Hotel Group code cannot be empty ";
               }
              else if($request->name==''){
                return "*Hotel Group name cannot be empty ";
               }
            else{
                try{
                    $hotelgroup_details=new HotelGroup;
                    $hotelgroup_details->group_code=$request->code;
                    $hotelgroup_details->hotel_gp_name=$request->name;
                    $hotelgroup_details->save();
        
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
     * @param  \App\HotelGroup  $hotelGroup
     * @return \Illuminate\Http\Response
     */
    public function show(HotelGroup $hotelGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelGroup  $hotelGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           try{

            $hotel_group_edit=HotelGroup::findOrFail($id);
            return view('hotel_groups.edit_form',compact('hotel_group_edit'));

           }catch(\Exception $e){

               return abort(404);
           }
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelGroup  $hotelGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        
          if($request->code==''){
            return "*Hotel Group code cannot be empty ";
           }
          else if($request->name==''){
            return "*Hotel Group name cannot be empty ";
           }

            $hotelgroup_id=$request->id;

            try{
                 
                $hotelgroup_details=HotelGroup::find($hotelgroup_id);
                $hotelgroup_details->group_code=$request->code;
                $hotelgroup_details->hotel_gp_name=$request->name;
                $hotelgroup_details->save();
        
                   return 'updated';
                            
                 }
                catch(\Exception $e){
                              
                    $error_des =$e->getMessage();

                    $data=array(
                    'Error_code'=>"505",
                    'Exp_dtl'=>$error_des
                              );
                    return ($data);
                    //   return "Exception Error : ";
        
                }



        
         
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelGroup  $hotelGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $hotelgroup_ID=$request->input('id');
            HotelGroup::find($hotelgroup_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
}
