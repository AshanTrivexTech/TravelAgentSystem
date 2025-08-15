<?php

namespace App\Http\Controllers;

use App\Guide;
use App\GuideType;
use App\GuideLanuage;
use App\Country;
use App\District;
use App\City;
use App\Language;
use App\Supplier;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use App\GuideLanguage;
use App\SupContactDetails;
use \DB;
use phpDocumentor\Reflection\Types\Array_;
class guideController extends Controller
{
     private $add_pv_gd;
     private $edit_pv_gd;
     private $del_pv_gd; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_gd =1;
        $this->edit_pv_gd=1;
        $this->del_pv_gd =1;
    }
    
    public function index()
    {
         try{
            $guide_list = DB::table('guides')
            ->join('suppliers','suppliers.id','=','guides.supplier_id')
            ->join('guide_types','guides.guide_type_id','=','guide_types.id')
            // ->where('guide_types.g_type','Chauffeur')
            ->select('suppliers.id','suppliers.sup_name','suppliers.sup_s_name','suppliers.code','suppliers.address','suppliers.status','guide_types.g_type','guides.id as gid')
            ->get();
            //return $guide_list;
    
            $add_pv  = $this->add_pv_gd;
            $edit_pv = $this->edit_pv_gd;
            $del_pv  = $this->del_pv_gd;
    
            return view('guides.index',compact('guide_list','add_pv','edit_pv','del_pv'));
              
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
               
            $guide_types=GuideType::all();
            $lanuages=Language::all();
            $countries=Country::all();
           
            return view('guides.create',compact('guide_types','lanuages','countries')); 

          }catch(\Exception $e){
                   
                return abort(404);
          } 
    }
    public function selectIndexOnLang(Request $request)
    {
        
        if($request->ajax()){          
            
            $lang = Language::all();
            
    		return json_encode($lang);
           
    	}

    }


    public function view_contacts(Request $request){
        
        $email; $tel; $mobile;
      if($request->ajax()){
         $id=$request->id;
      
      $contacts=SupContactDetails::where('supplier_id',$id)->select('type','contact')->get();
      
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


       

        try{

            $code_h = $request->code;
            $name_g = $request->g_name;
           // return 'added';
            $sup_code = Supplier::where('code',$code_h)->first();
            $sup_name = Supplier::where('sup_name',$name_g)->first();
            
            //return 'added';
            
            if($sup_code['code'] !='') {

                return "* Code already exist!, Please enter unique code ";

            }elseif($sup_name['sup_name'] !=''){   
                return "* Name already exist!, Please enter unique name "; 

            }
            elseif($request->code==''){
                return "* Code cannot be null";
            }
            elseif($request->g_name=='')
            {
                return "* Name annot be null";
            }
            elseif($request->gtype=='')
            {
                return "* Guide Type Cannot Be null";
            }
            elseif($request->country==0)
            {
                return "* Please Select country ";
            }
            elseif($request->district==0)
            {
                return "* Please Select District";
            }
            elseif($request->city==0)
            {
                return "* Please Select City";
            }
            elseif($this->my_email($request->email)==''){
                return "* Invalid Email Address";

            }
            elseif((strlen($request->tel)) >0 && (strlen($request->tel)) <10  ){ 
                
                return "* Invalied Telephone Number!, Please enter again";  
                             
            }
            elseif((strlen($request->mobile)) >0 && (strlen($request->mobile)) <10  ){ 
                
                return "* Invalied Mobile Number!, Please enter again";  
                             
            }
            else{


                try{

                DB::beginTransaction();

                $supDetails = new Supplier();
                 
                        $supDetails->code = $request->code;
                        $supDetails->sup_name = $request->g_name;
                        $supDetails->sup_s_name = $request->g_name;
                        $supDetails->type = 'Guide';
                        $supDetails->address = $request->address;
                        $supDetails->city_id = $request->city;
                        $supDetails->district_id = $request->district;
                        $supDetails->country_id = $request->country;
                        $supDetails->status = $request->status;
                        
                        $supDetails->save();


                $sup_id=Supplier::select('id')->orderBy('id','DESC')->first();
                   //return $sup_id;
                 $supContacts = array(
                    array('supplier_id'=>$sup_id->id, 'type'=>'Email_A','contact'=>$request->email),                
                    array('supplier_id'=>$sup_id->id, 'type'=>'Mobile','contact'=>$request->mobile),
                    array('supplier_id'=>$sup_id->id, 'type'=>'Tel','contact'=>$request->tel),
                                    
                 );

                SupContactDetails::insert($supContacts);
               

                 
                $guide = new Guide();     

                        $guide->supplier_id = $sup_id->id;
                        $guide->guide_type_id = $request->gtype;                    
                        $guide->guide_name = $request->g_name;                      
                    
                $guide->save();



                $guide_Id = Guide::select('id')->orderBy('id','DESC')->first();

                $Guide_lang=json_decode($request->jsData);
                 
                foreach($Guide_lang as $item ){

                    $glan = new GuideLanguage();
                    $glan->guide_id = $guide_Id->id;
                    $glan->language_id = $item->language_id;
                     $glan->save();         
                 }

               DB::commit();

                return 'added';

                }catch(\Exception $tr){

                   DB::rollBack();
                //    $error_des =$tr->getMessage();

                //     $data=array(
                //     'Error_code'=>"505",
                //     'Exp_dtl'=>$error_des
                //             );
                //     return ($data);

                    return  "* Some field cannot be empty!, Please check before save"; 

                }

            }

        }catch(Exception $e){
                
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return 'error';
        }
        // return $request->all();

       
                
}

    
    public function show(Guide $guide)
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
               
                       
                $data=DB::table('suppliers')
                 ->join('guides','Suppliers.id','=','guides.Supplier_id')
                 ->join('guide_types','guides.guide_type_id','=','guide_types.id')
                 ->select('suppliers.id','suppliers.sup_name','suppliers.sup_s_name','suppliers.code','suppliers.address','suppliers.status','guide_types.g_type','guides.id as gid')  
                 ->where('code','LIKE','%'.$queryd.'%')
                 ->orWhere('sup_name','LIKE','%'.$queryd.'%')
                 ->orWhere('address','LIKE','%'.$queryd.'%')
                 ->orWhere('g_type','LIKE','%'.$queryd.'%')
                 ->get();

                $total_row=$data->count();
                 
              
                    
            }else{
                $data=DB::table('suppliers')
                ->join('guides','Suppliers.id','=','Guides.Supplier_id')
                ->join('guide_types','guides.guide_type_id','=','guide_types.id')
                ->select('suppliers.id','suppliers.sup_name','suppliers.sup_s_name','suppliers.code','suppliers.address','suppliers.status','guide_types.g_type','guides.id as gid')    
                ->get();

                $total_row=$data->count();

            }
           
            
            if($total_row > 0){
                   foreach($data as $row){

                    $output_edit='';
                    $output_del='';

                    $state='';

                    if($row->status==1)
                    {
                        $state='<span class="m-badge m-badge--success m-badge--wide">Active</span>';

                    }
                    else
                    {
                        $state='<span class="m-badge m-badge--danger m-badge--wide">In Active</span>';
                    }
                        if($edit_pv==1){

                            $output_edit='
                                          <a href="'.route('edit_guide',$row->gid).'"
                                          class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                          <i class="la la-edit"></i></a>
                                          </a>
                                          ';   

                        }else{

                            $output_edit='';

                        }if($del_pv==1){

                                $output_del='
                                             <a id= "'.$row->gid.'" onclick="deleteAccept('.$row->gid.')"
                                             class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                             title="Delete details"><i class="la la-trash"></i>
                                             </a>
                                            '; 
                        }else{

                                 $output_del='';

                        } 

                       $output.='<tr>
                       <td style="text-align: center">'.$row->gid.'</td>
                       <td>'.$row->code.'</td>
                       <td>'.$row->sup_name.'</td>
                       <td>'.$row->address.'</td>
                       <td>'.$row->g_type.'</td>
                       <td>'.$state.'</td>
                       <td style="text-align: center">
                       <a href="'.route('load_guid_lanuages',$row->gid).'"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                            title="language">
                            <i class="la la-language"></i>
                            </a>

                            <a href=""  onclick="viewEmail('.$row->gid.')"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                            title="Email">
                            <i class="la la-envelope"></i>
                            </a>

                            <a href=""   onclick="viewTel({{$guide->id}})"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                            title="Phone">
                            <i class="la la-tty"></i>                      
                            </a>

                            <a id="" onclick="viewMobile('.$row->gid.')"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                            title="Phone">
                            <i class="la la-mobile"></i>                 
                            </a>

                       
                                          '.$output_edit.'
                                          '.$output_del.'  
                       

                       </td>
                    </tr>';
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

    function my_email($email)
     {
       
        return filter_var($email, FILTER_VALIDATE_EMAIL);

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit($guide_ID)
    {
         try{

            $country_list = Country::all();
            $district_list = District::all();
            $lanuages=Language::all();
            $city_list = city::all();
            
    
            $guides=DB::table('guides')
            ->join('guide_types','guide_types.id','=','guides.guide_type_id')
            ->select('guide_types.*','guides.guide_type_id')
            ->get();
            
            $supplier=Supplier::find($guide_ID);
            $email_A =Supplier::find($guide_ID)->contacts()->where('type','Email_A')->first();
            $tel =Supplier::find($guide_ID)->contacts()->where('type','Tel')->first();
            $mobile=Supplier::find($guide_ID)->contacts()->where('type','Mobile')->first();
    
            return View('guides.edit_form',compact('country_list','district_list','city_list','guides','supplier','email_A','tel','mobile','lanuages'));

         }catch(\Exception $e){

             return abort(404);
         }
    }

    /**
     * Update the specified resource in storage.
    
     */
    public function update(Request $request)
    {
        //
        try{

            
            $supID=$request->supID;

            //return $supID;
            //Start transaction
            DB::beginTransaction();

            //update Suplier Details
            $supDetails =Supplier::findOrFail($supID);
           // return $supDetails;
                    
                   $supDetails->code = $request->code;
                    $supDetails->sup_s_name =$request->name;
                    $supDetails->address = $request->address;
                    $supDetails->city_id = $request->city;
                    $supDetails->district_id = $request->district;
                    $supDetails->country_id = $request->country;
                    $supDetails->status = $request->status;
                    
             $supDetails->save();

            // Update Supplier Conatct Details
              SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Email_A'])
              ->update(['contact'=>$request->email]);
              SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Tel'])
              ->update(['contact'=>$request->tel]);
              SupContactDetails::where('supplier_id', $supID)->where(['type'=>'Mobile'])
              ->update(['contact'=>$request->mobile]);

            // Update guide Details
            Guide::where('supplier_id', $supID)
            ->update(['guide_type_id' => $request->guide_type,
            'guide_name'=> $request->name]);


            // Commit transaction
            DB::commit();

            // if success return value as response
            return 'updated';
            
            

            }catch(\Exception $e){
                // if transaction faile Rollback and return response
                DB::rollBack();
                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                          );
                return ($data);
                // return "Some fields cannot be null"; 

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try {
            $sup_ID = $request->input('id');

            try{
                   //Start transaction
                   DB::beginTransaction();
                   Supplier::find($sup_ID)->delete();
                   SupContactDetails::where('supplier_id',$sup_ID)->delete();
                   Guide::where('supplier_id',$sup_ID)->delete();

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
