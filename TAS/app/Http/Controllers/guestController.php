<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Country;
use App\GuestContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class guestController extends Controller
{
     private $add_pv_cry;
     private $edit_pv_cry;
     private $del_pv_cry; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_cry =1;
        $this->edit_pv_cry=1;
        $this->del_pv_cry =1;

    }
    
    public function index()
    {
            $add_pv = $this->add_pv_cry;
            $edit_pv = $this->edit_pv_cry;
            $del_pv  = $this->del_pv_cry;
        
            $guest_view=DB::table('guests')
            ->join('countries','countries.id','=','guests.country_id')
            ->select('guests.id','guests.guest_name','guests.guest_address','guests.PN','guests.dob','guests.remarks','countries.country_name')
            ->get();
            return view('Guest.index',compact('guest_view','add_pv','edit_pv','del_pv'));
        
       
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
            return view('Guest.create',compact('country_id'));
        }
        catch(\Exception $e){

            return "Exception Error : "; 

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
             $guest_passportNo=$request->input('passport_no');

             $PassportNo_guest=Guest::where('PN',$guest_passportNo)->first();

            if($request->name==''){
               return '* Guest Name Cannot be empty';

            }elseif($request->country==0){
                return '* Please Select the country';

            }elseif($request->address==''){
                return '* Address cannot be empty';

            }elseif($request->dob==''){
                return  '* Date Of Birth cannot be empty';

            }elseif($request->passport_no==''){
                return '* Passport No cannot be empty';

            }elseif($request->email==''){
                return '* Email cannot be empty';

            }elseif($request->email !='' && $this->my_email($request->email)=='')
            {
                return "* Invalid Email Address ";

            }elseif($PassportNo_guest['PN']!=''){
                 
                return "* Passport Number Already Exists";
            }

        
        try{
            DB::beginTransaction();
            $guest_add=new Guest();
            $guest_add->guest_name=$request->name;
            $guest_add->country_id=$request->country;
            $guest_add->guest_address=$request->address;
            $guest_add->dob=$request->dob;
            $guest_add->PN=$request->passport_no;
            $guest_add->remarks=$request->remarks;
            $guest_add->save();

            $guest_ID = DB::table('guests')->orderBy('id', 'DESC')->first();

            $guestContacts = array(
                array('guest_id'=> $guest_ID->id, 'type'=>'Tel','contact'=>$request->tel),
                array('guest_id'=> $guest_ID->id, 'type'=>'Mobile','contact'=>$request->mobile),
                array('guest_id'=> $guest_ID->id, 'type'=>'Email_A','contact'=>$request->email),
               
             );

             GuestContact::insert($guestContacts);

             DB::commit();

                return 'added';
        }
        catch(\Exception $e){

            DB::rollBack();
            return "* Some field cannot be empty!, Please check before save"; 
        }
                 
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
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

                $data=DB::table('guests')
                         ->join('countries','countries.id','=','guests.country_id')
                         ->select('guests.id','guests.guest_name','guests.guest_address','guests.PN','guests.dob','guests.remarks','countries.country_name')
                         ->where('guest_name','LIKE','%'.$queryd.'%')
                         ->orWhere('PN','LIKE','%'.$queryd.'%')
                         ->get();

                         $total_row=$data->count();
            }else{

                $data=DB::table('guests')
                          ->join('countries','countries.id','=','guests.country_id')
                          ->select('guests.id','guests.guest_name','guests.guest_address','guests.PN','guests.dob','guests.remarks','countries.country_name')
                          ->get();

                         $total_row=$data->count();

                }
                
              //  return json_encode($data);

            if($total_row >0){

                 foreach($data as $row){

                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){
                             
                        $output_edit='
                                       <a href="'.route('guest_edit',$row->id).'"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                       <i class="la la-edit"></i></a>
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
                        
                    $output.='
                    <tr> 
                    <td style="text-align: center">'.$row->id.'</td>
                    <td>'.$row->guest_name.'</td>
                    <td>'.$row->country_name.'</td>
                    <td>'.$row->guest_address.'</td>
                    <td style="text-align: center">'.$row->dob.'</td>
                    <td style="text-align: center">'.$row->PN.'</td>
                    <td>'.$row->remarks.'</td>
                   <td class="m-datatable__cell--right" >
                   <a href=""  onclick="viewEmail('.$row->id.')"
                   class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                   title="Email">
                   <i class="la la-envelope"></i>
                   </a>

                   <a href=""   onclick="viewTel('.$row->id.')"
                   class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                   title="Phone">
                   <i class="la la-tty"></i>                      
                   </a>

                   <a id="" onclick="viewMobile('.$row->id.')"
                   class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                   title="Phone">
                   <i class="la la-mobile"></i>                 
                   </a>
                   '.$output_edit.'
                   '.$output_del.'
                  
                   </td>
                  </tr>';
                 }
                   
            }else{
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


    function my_email($email)
    {
      
       return filter_var($email, FILTER_VALIDATE_EMAIL);

    }
    
    public function view_contacts(Request $request){
        
        $email; $tel; $mobile;
      if($request->ajax()){
         $id=$request->id;
      
      $contacts=GuestContact::where('guest_id',$id)->select('type','contact')->get();
      
      foreach($contacts as $contactsl){
          
          if($contactsl->type=='Email_A'){
               
              $email=$contactsl->contact;
               
          }elseif($contactsl->type=='Tel'){
          
               $tel=$contactsl->contact;

          }elseif($contactsl->type=='Mobile'){

               $mobile=$contactsl->contact;
          }
               
      }

      $data =array(
          'email'=> $email,
          'tel'=> $tel,
          'mobile'=>$mobile
      );

          return json_encode($data);
              
      }
  }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       
        $guest_edit=Guest::findOrFail($id);
        $cid=Guest::where('id',$id)->select('country_id')->get();
        $country=country::find($cid)->first();


        
       
        $lan=GuestContact::where('type','Tel')->where('guest_id',$id)->first();
        $email=GuestContact::where('type','Email')->where('guest_id',$id)->first();
        $mobile=GuestContact::where('type','Mobile')->where('guest_id',$id)->first();


       

        return view('Guest.edit_form',compact('guest_edit','country','mobile','lan','email'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->g_name==''){
            return '* Guest Name Cannot be empty';

         }elseif($request->address==''){
             return '* Address cannot be empty';

         }elseif($request->dob==''){
             return  '* Date Of Birth cannot be empty';

         }elseif($request->passport_no==''){
             return '* Passport No cannot be empty';

         }elseif($request->email==''){
             return '* Email cannot be empty';

         }elseif($request->email !='' && $this->my_email($request->email)=='')
         {
             return "* Invalid Email Address ";

         }
 

       try{
            DB::beginTransaction();
            
            $guest_id=$request->id;

            $guest_details=Guest::find($guest_id);
            $guest_details->guest_name=$request->g_name;
            $guest_details->guest_address=$request->address;
            $guest_details->remarks=$request->remarks;
            $guest_details->dob=$request->dob;
            $guest_details->PN=$request->passport_no;
            $guest_details->save();

            GuestContact::where('guest_id', $guest_id)->where('type','Tel')
                  ->update(['contact'=>$request->tel]);
                  GuestContact::where('guest_id', $guest_id)->where(['type'=>'Mobile'])
                  ->update(['contact'=>$request->mobile]);
                  GuestContact::where('guest_id', $guest_id)->where(['type'=>'Email'])
                  ->update(['contact'=>$request->email]);

                  DB::commit();
                  return 'updated';
        }
        catch(\Exception $tr){
            // if transaction faild Rollback and return response
            DB::rollBack();
            return "* Some field cannot be empty!, Please check before save"; 

        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try {
            $guest_ID = $request->input('id');

            try{
                   //Start transaction
                   DB::beginTransaction();
                   Guest::find($guest_ID)->delete();
                   GuestContact::where('guest_id',$guest_ID)->delete();
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
