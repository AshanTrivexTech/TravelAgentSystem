<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelType;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\District;
use App\Country;
use App\City;
use App\SupContactDetails;
use App\HotelGroup;
use App\HotelStarRate;

use App\TourType;


class hotelController extends Controller
{   
    
     private $add_pv_ht;
     private $edit_pv_ht;
     private $del_pv_ht; 
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_ht =1;
        $this->edit_pv_ht=1;
        $this->del_pv_ht =1;
    }
    
    
    public function index()
    {        try{
        try{  
              
             $hotelsAll = DB::table('suppliers')
                ->join('hotels', 'suppliers.id', '=', 'hotels.supplier_id')
                ->join('hotel_types','hotels.hotel_type_id','=','hotel_types.id')            
                ->select('suppliers.id' ,'suppliers.sup_name','suppliers.sup_s_name','suppliers.code' ,'suppliers.status', 'hotel_types.type_name', 'hotels.star_rate', 'hotels.web_url')
                ->get();
                      
            

            //return $this->add_pv_ht;
            
             $add_pv  = $this->add_pv_ht;
             $edit_pv = $this->edit_pv_ht;
             $del_pv  = $this->del_pv_ht;   

            return view('hotels.index',compact('hotelsAll','add_pv','edit_pv','del_pv'));
            
        }catch(\Exception $e){
            return "Exception Error : ";
        }
    }catch(\Exception $e){

         return abort(404);
    }               
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function live_Search(Request $request)
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
               
                       
                $data = DB::table('suppliers')
                ->join('hotels', 'suppliers.id', '=', 'hotels.supplier_id')
                ->join('hotel_types','hotels.hotel_type_id','=','hotel_types.id')            
                ->select('suppliers.id' ,'suppliers.sup_name','suppliers.sup_s_name','suppliers.code' ,'suppliers.status', 'hotel_types.type_name', 'hotels.star_rate', 'hotels.web_url')
                ->where('sup_s_name','LIKE','%'.$queryd.'%')
                ->orWhere('sup_name','LIKE','%'.$queryd.'%')
                ->get();

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data = DB::table('suppliers')
                ->join('hotels', 'suppliers.id', '=', 'hotels.supplier_id')
                ->join('hotel_types','hotels.hotel_type_id','=','hotel_types.id')            
                ->select('suppliers.id' ,'suppliers.sup_name','suppliers.sup_s_name','suppliers.code' ,'suppliers.status', 'hotel_types.type_name', 'hotels.star_rate', 'hotels.web_url')
                ->get();
                    
                $total_row=$data->count();
                

            }
           
          
            if($total_row > 0){
                

           

                   foreach($data as $row){
                    $la='';
                    $state='';


                    if($row->star_rate==0)
                    {
                          $la=' None';
                    }
                    else{

                     for($i = 1; $i <= $row->star_rate; $i++){
                            

                            $la.=' <i class="la la-star"></i>';
                            }
                           
                    }



                    if($row->status==1)
                    {
                        $state='<span class="m-badge m-badge--success m-badge--wide">Active</span>';

                    }
                    else
                    {
                        $state='<span class="m-badge m-badge--danger m-badge--wide">In Active</span>';
                    }

                            $output_edit='';
                            $output_del='';

                            if($edit_pv==1){

                                $output_edit='
                                              <a href="'.Route('add_edit',$row->id).'" id="'.$row->id.'"
                                              class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                              title="Edit View">
                                              <i class="la la-edit"></i>
                                              </a>
                                                 '; 


                            }else{
                                $output_edit='';  

                            }
                            if($del_pv==1){
                                         
                                $output_del='
                                             <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.') "
                                             class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                             title="Edit View">
                                             <i class="la la-trash"></i>
                                             </a>
                                             ';

                            }else{
                                      
                                $output_del='';

                            }
                 
                                                  
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td style="text-align: center">'.$row->code.'</td>
                       <td>'.$row->sup_s_name.'</td>
                       <td>'.$row->sup_name.'</td> 
                       <td style="text-align: center;">
                       '.$la.'                  
                       </td>     
                       <td style="text-align: center;">'.$row->type_name.'</td>
                       <td style="text-align: center;">'.$state.' </td>
                       
                       <td style="text-align: center;">

                               <a href="'.$row->web_url.'"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Vist Web">
                                        <i class="la la-chrome"></i>

                               </a>

                               <a id=""  onclick="viewEmail('.$row->id.')"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Email">
                                         <i class="la la-envelope"></i>
 
                                    </a>
                                    <a id="" onclick="viewTel('.$row->id.')"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Phone">
                                         <i class="la la-tty"></i>
                                        
                                    </a>

                                    <a id="" onclick="viewFax('.$row->id.')"
                                            class="m-portlet__nav-link btn m-btn m-btn--hover-metal m-btn--icon m-btn--icon-only m-btn--pill" 
                                            title="Fax">
                                            <i class="la  la-fax"></i>
                                         </a>
                                    
                                            '.$output_edit.'
                                            '.$output_del.'
                                 
                                
                           </td>
               </tr> ';
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
     
    public function create()
    {    
         try{
        try
        {

        
        $hotel_type_list = HotelType::all();
        $district_list = District::all();
        $city_list = city::all();
        $country_list = Country::all();
        $hotel_gp_list =HotelGroup::all();
        $hotel_starts=HotelStarRate::all();
       

        
        //$hotel_group =
        //$hotel_ratting =

        return view('hotels.create',compact('hotel_type','hotel_type_list','district_list','city_list','country_list','hotel_gp_list','hotel_starts'));
        
        }catch(\Exception $e){

            return "Exception Error : ";
        }
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



 

     function my_email($email)
     {
       
        return filter_var($email, FILTER_VALIDATE_EMAIL);

     }

    public function store(Request $request)
    {
       

       
        try{

            $code_h = $request->input('code');
            $name_h = $request->input('name');

            $sup_code = Supplier::where('code',$code_h)->first();
            $sup_name = Supplier::where('sup_name',$name_h)->first();
            
          if($sup_code['code'] !='') {

                return "* Code already exist!, Please enter unique code ";

            }elseif($this->my_email($request->email_one)==''){
                return "* Invalid Email Address : Reservation";

            }elseif( $request->email_two!='' && $this->my_email($request->email_two)==''){

                return "* Invalid Email Address : 2";
               
            }elseif( $request->email_three!='' && $this->my_email($request->email_three)==''){
                return "* Invalid Email Address : 3";

            } elseif($sup_name['sup_name'] !=''){   
                return "* Name already exist!, Please enter unique name "; 

            }
            // elseif((strlen($request->fax)) >0 && (strlen($request->fax)) <10){ 
                
            //     return "* Invalied Fax Number!, Please enter again";  
                             
            // }elseif((strlen($request->tel)) >0 && (strlen($request->tel)) <10  ){ 
                
            //     return "* Invalied Tel Number!, Please enter again";  
                             
            
            // }
            
            else{


                try{

                DB::beginTransaction();

                $supDetails = new Supplier();
                 
                        $supDetails->code = $request->code;

                        if($request->s_name ==''){
                         
                             $supDetails->sup_s_name = $request->l_name;
                         }
                         else{
                            $supDetails->sup_s_name = $request->s_name;
                         }

                      
                        $supDetails->sup_name = $request->l_name;
                        $supDetails->type = 'Hotel';
                        $supDetails->address = $request->address;
                        $supDetails->city_id = $request->city;
                        $supDetails->district_id = $request->district_id;
                        $supDetails->country_id = $request->country;
                        $supDetails->status = $request->status;
                        
                // $ids = DB::table('suppliers')->insertGetId($supDetails);
                 $supDetails->save();




                // $id = DB::table('users');

                 $sup_id = Supplier::select('id')->orderBy('id','DESC')->first();

                    
                 
                 if($request->email_one!=''){

                    

                 $supContacts = array(
                    array('supplier_id'=>$sup_id->id, 'type'=>'Email_A','contact'=>$request->email_one),
                    array('supplier_id'=>$sup_id->id, 'type'=>'Email_B','contact'=>$request->email_two),
                    array('supplier_id'=>$sup_id->id, 'type'=>'Email_C','contact'=>$request->email_three),
                    array('supplier_id'=>$sup_id->id, 'type'=>'Fax','contact'=>$request->fax),
                    array('supplier_id'=>$sup_id->id, 'type'=>'Tel','contact'=>$request->tel),

                
                 );
                }
                else {
                    return "* Atleast One Email Compulsory";  
                }

                 SupContactDetails::insert($supContacts);
                  
                 
                $hotel = new Hotel();     

                        $hotel->supplier_id = $sup_id->id;
                        $hotel->hotel_type_id = $request->hotel_type;                    
                        $hotel->desc = $request->desc;
                        $hotel->postal_code = $request->postal_code;
                        $hotel->hotel_group_id = $request->hotel_group;
                        $hotel->star_rate = $request->star_rate;
                        $hotel->web_url = $request->website_url;                      
                        // //$hotel->Hotel_features = $request->code;
                       
                    
                $hotel->save();


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

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    public function view_contacts(Request $request){
        
        $email_A; $email_B; $email_C; $tel; $fax;
        if($request->ajax()){

        $id=$request->id;
        
        $contacts=SupContactDetails::where('supplier_id',$id)->select('type','contact')->get();
        
        foreach($contacts as $contact){
            
            if($contact->type=='Email_A'){
                 
                $email_A=$contact->contact;
                 
            }elseif($contact->type=='Tel'){
            
                 $tel=$contact->contact;

            }elseif($contact->type=='Email_B'){
                $email_B=$contact->contact;

            }elseif($contact->type=='Email_C'){
                $email_C=$contact->contact;

            }elseif($contact->type=='Fax'){
                $fax=$contact->contact;
            }    
        }

        $data=array(
            'email_A'=>$email_A,
            'email_B'=>$email_B,
            'email_C'=>$email_C,
            'tel'=>$tel,
            'fax'=>$fax
        );

            return json_encode($data);
                
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($hotel_supID)
    {   
        try{
                     
        // Row Quary
        $hotel_type_list = HotelType::all();
        $district_list = District::all();
        $city_list = city::all();
        $country_list = Country::all();
        $hotel_group = HotelGroup::all();;
        
        $supplier = Supplier::find($hotel_supID);
        $hotel_data = Supplier::find($hotel_supID)->hotel;
        
        $email_A =Supplier::find($hotel_supID)->contacts()->where('type','Email_A')->first();
        $email_B =Supplier::find($hotel_supID)->contacts()->where('type','Email_B')->first();
        $email_C =Supplier::find($hotel_supID)->contacts()->where('type','Email_C')->first();
        $fax =Supplier::find($hotel_supID)->contacts()->where('type','Fax')->first();
        $tel =Supplier::find($hotel_supID)->contacts()->where('type','Tel')->first();
        
     

      return view('hotels.edit_form',compact('supplier','hotel_data','hotel_type_list',
         'district_list','city_list','country_list','hotel_group','sup_contacts',
        'email_A','email_B','email_C','fax','tel'));

              }catch(\Exception $e){

                  return abort(404);
              }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        //
        try{




            if( $request->email_one!='' && $this->my_email($request->email_one)==''){
                return "* Invalid Email Address : Reservation";

            }elseif( $request->email_two!='' && $this->my_email($request->email_two)==''){

                return "* Invalid Email Address : 2";
               
            }elseif( $request->email_three!='' && $this->my_email($request->email_three)==''){
                return "* Invalid Email Address : 3";

            } 
            $supID=$request->sup_ID;
          
            if((strlen($request->fax)) >0 && (strlen($request->fax)) <10){ 
                
                return "* Invalied Fax Number!, Please enter again";  
                             
            }elseif((strlen($request->tel)) >0 && (strlen($request->tel)) <10  ){ 
                
                return "* Invalied Tel Number!, Please enter again";  
                             
            }else{


                try{

                //Start transaction
                DB::beginTransaction();

                //update Suplier Details
                $supDetails = Supplier::findOrFail($supID);
                        
                        //$supDetails->code = $request->code;
                        $supDetails->sup_s_name =$request->s_name;
                        //$supDetails->type = 'Hotel';
                        $supDetails->address = $request->address;
                        $supDetails->city_id = $request->city;
                        $supDetails->district_id = $request->district_id;
                        $supDetails->country_id = $request->country;
                        $supDetails->status = $request->status;
                        
                 $supDetails->save();

                // Update Supplier Conatct Details

                if($request->email_one!=''){

                    
                  SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Email_A'])
                  ->update(['contact'=>$request->email_one]);
                  SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Email_B'])
                  ->update(['contact'=>$request->email_two]);
                  SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Email_C'])
                  ->update(['contact'=>$request->email_three]);
                  SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Fax'])
                  ->update(['contact'=>$request->fax]);
                  SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Tel'])
                  ->update(['contact'=>$request->tel]);

                } else {
                    return "* Atleast One Email Compulsory";  
                }
                // Update Hotel Details
                Hotel::where('supplier_id', $supID)
                ->update(['hotel_type_id' => $request->hotel_type,
                'desc' => $request->desc,'postal_code' => $request->postal_code,
                'hotel_group_id'=> $request->hotel_group,'star_rate' => $request->star_rate,
                'web_url' => $request->website_url]);

                // Commit transaction
                DB::commit();

                // if success return value as response
                return 'updated';

                }catch(\Exception $tr){
                    // if transaction faile Rollback and return response
                    DB::rollBack();
                    // $error_des =$tr->getMessage();

                    // $data=array(
                    // 'Error_code'=>"505",
                    // 'Exp_dtl'=>$error_des
                    //           );
                    // return ($data);
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
            // return "Exception Error : ";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try {
            $sup_ID=$request->input('id');

            try{
                   //Start transaction
                   DB::beginTransaction();
                   Supplier::find($sup_ID)->delete();
                   SupContactDetails::where('supplier_id',$sup_ID)->delete();
                   Hotel::where('supplier_id',$sup_ID)->delete();

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
