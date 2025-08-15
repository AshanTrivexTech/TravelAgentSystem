<?php

namespace App\Http\Controllers;

use App\Driver;
use App\DriverContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class driverController extends Controller
{
    private $add_pv_dv;
    private $edit_pv_dv;
    private $del_pv_dv;

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_dv=1;
        $this->edit_pv_dv=1;
        $this->del_pv_dv= 1;
    }
    
    public function index()
    {
        try{
            $driver_view=Driver::all();
            $add_pv  = $this->add_pv_dv;
            $edit_pv = $this->edit_pv_dv;
            $del_pv  = $this->del_pv_dv;
    
            return view('drivers.index',compact('driver_view','add_pv','edit_pv','del_pv'));  

        }catch(\Exception $e){

             return abort(404);
        }
    }

    public function view_contacts(Request $request){
        
          $email; $tel;
        if($request->ajax()){
        $id=$request->id;
       
        $contacts=DriverContact::where('driver_id',$id)->select('type','contact')->get();
        
        foreach($contacts as $contactsl){
            
            if($contactsl->type=='Email_A'){
                 
                $email=$contactsl->contact;
                 
            }elseif($contactsl->type=='Tel'){
            
                 $tel=$contactsl->contact;

            }

              
        }

        $data =array(
            'email'=> $email,
            'tel'=> $tel
        );

            return json_encode($data);
                
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
             $out_new='';
             $output_new_2='';

             if($queryd!=''){
               
                       
                $data=Driver::where('driver_name','LIKE','%'.$queryd.'%')->get();

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data=Driver::all();
                   

                $total_row=$data->count();
                

            }
            if($total_row > 0){
                

           

                foreach($data as $row){
                 
           
                  $out_new='';
                  $output_new_2='';

                    if($edit_pv==1)
                    {
                        $out_new.='
                        <a href="'.route('driver_edit',$row->id).'" id=""
                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                         title="Edit View">
                         <i class="la la-edit"></i>
                          </a>

                        ';
                    }
                    else
                    {
                        
                        $out_new.='';
                    }

                    if($del_pv==1)
                    {
                        $output_new_2.='
                        
                        <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                        class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                        title="Delete details">
                         <i class="la la-trash"></i>
                      </a>
                        
                        ';
                    }
                    else{
                       
                        $output_new_2.='';
                    }
                                        
                    $output.='
                    <tr>
                    <td style="text-align: center">'.$row->id.'</td>
                    <td>'.$row->driver_name.'</td>
                    <td>'.$row->licence_no.'</td> 
                    <td >'.$row->driver_address.'</td> 
                    <td style="text-align: center">

                        

                             <a id=""
                                class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" 
                                
                                onclick="load('.$row->id.')"
                                title="Email">
                                 <i class="la  la-envelope"></i>
                              </a>

                              <a id="_mdl" onclick="loadTel('.$row->id.')"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" 
                                        title="Telephone">
                                        <i class="la  la-tty"></i>
                              </a>

                              '.$out_new.'
                              '.$output_new_2.'
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


    

        public function retrive(Request $request)
        {

       
            if($request->ajax()){  
                $id=$request->id;
            $contacts=DriverContact::where('driver_id',$id)->where('type','Email')->get();

            $total_row = count((array)$contacts);
             $output='';
             if($total_row>0){
                

                foreach($contacts as $c)
                {

                    $output .= 
                    
                  '
                
                  <tr>
                
                  <td>   <div class="alert alert-success">' .$c->contact.' </div>  </td>  
                    
                  <td>  <input type="button" value="Send" class="btn btn-primary"/>   </td>
                 
                   </tr>
                  

                    
                    ';
                 }  

                 }

             }
             return $output; 

        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         try{
              
            return view('drivers.create');

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
        if($request->name==''){
            return "*Driver name cannot be empty ";
           }
          else if($request->l_no==''){
            return "*Driver licence no cannot be empty ";
           }
           if($request->address==''){
            return "*Driver address cannot be empty ";
           }
          else if($request->tel==''){
            return "*Driver telephone number cannot be empty ";
            
           }else if(($this->my_email($request->email)=='') && (($request->email) !='')){
                return "* Invalid Email Address ";
           }

           else{

            try{
                $Licence_no=$request->l_no;

                $dlicence_no=Driver::where('licence_no',$Licence_no)->first();
    
                if($dlicence_no['licence_no']!=''){
                 return "*Licence No already exist!, Please enter unique number ";
                }

             else{
                try{
            
                    //  $licence_driver=$request->input('licence');
                      DB::beginTransaction();
                      $driver_add=new Driver;
                      $driver_add->driver_name=$request->name;
                      $driver_add->licence_no=$request->l_no;
                      $driver_add->driver_address=$request->address;
                      $driver_add->save();
          
                      //$driver_ID = DB::table('drivers')->orderBy('id', 'DESC')->first();
                      $driver_ID =Driver::select('id')->orderBy('id', 'DESC')->first();
          
                      $driverContacts = array(
                          array('driver_id'=> $driver_ID->id, 'type'=>'Tel','contact'=>$request->tel),
                          array('driver_id'=> $driver_ID->id, 'type'=>'Email_A','contact'=>$request->email),
                                        
                       );
          
                       DriverContact::insert($driverContacts);
          
                       DB::commit();
          
                          return 'added';
                  }
                  catch(\Exception $tr){
          
                      DB::rollBack();
                      
                      $error_des =$tr->getMessage();

                      $data=array(
                      'Error_code'=>"505",
                      'Exp_dtl'=>$error_des
                                );
                      return ($data);
                    //   return "* Some field cannot be empty!, Please check before save"; 
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
              

              
       
     //   return  $driver_ID;
        
    }

    function my_email($email)
     {
       
        return filter_var($email, FILTER_VALIDATE_EMAIL);

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{
            $driver_edit=Driver::findOrFail($id);
            $lan=DriverContact::where('type','Tel')->where('driver_id',$id)->first();
            $email=DriverContact::where('type','Email_A')->where('driver_id',$id)->first();
    
            return view('drivers.edit_form',compact('driver_edit','lan','email'));   

         }catch(\Exception $e){

             return abort(404);
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->name==''){
            return "*Driver name cannot be empty ";
           }
          else if($request->l_no==''){
            return "*Driver licence no cannot be empty ";
           }
           if($request->address==''){
            return "*Driver address cannot be empty ";
           }
          else if($request->tel==''){
            return "*Driver telephone number cannot be empty ";
            
           }else if(($this->my_email($request->email)=='') && (($request->email) !='')){
                return "* Invalid Email Address ";
           }
        try{
            
            DB::beginTransaction();
            
            $driver_id=$request->id;

            $driver_details=Driver::find($driver_id);
            $driver_details->driver_address=$request->address;
            $driver_details->driver_name=$request->name;
            $driver_details->licence_no=$request->l_no;
            $driver_details->save();

           // SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Email_A'])
           // ->update(['contact'=>$request->email_one]);

            DriverContact::where('driver_id', $driver_id)->where(['type'=>'Tel'])
                  ->update(['contact'=>$request->tel]);

            DriverContact::where('driver_id', $driver_id)->where(['type'=>'Email_A'])
                  ->update(['contact'=>$request->email]);

                  DB::commit();
                  return 'updated';
                  
        }
        catch(\Exception $tr){
            // if transaction faile Rollback and return response
            DB::rollBack();
            $error_des =$tr->getMessage();

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
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try {
            $Driver_ID = $request->input('id');

            try{
                   //Start transaction
                   DB::beginTransaction();
                   Driver::find($Driver_ID)->delete();
                   DriverContact::where('driver_id',$Driver_ID)->delete();
                   // Commit transaction
                   DB::commit();

                   return "deleted";

            }catch(\Exception $e){
                 // if transaction faile Rollback and return response
                 DB::rollBack();
                 return 'Cannot Delete';

            }

        }catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
}
