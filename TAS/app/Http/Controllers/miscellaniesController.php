<?php

namespace App\Http\Controllers;

use App\Miscellanie;
use App\miscType;
use App\Supplier;
use App\miscCategory;
use App\Country;
use App\SupContactDetails;
use DB;
use Illuminate\Http\Request;

class miscellaniesController extends Controller
{
    private $add_pv_mis;
    private $edit_pv_mis;
    private $del_pv_mis; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_mis=1;
        $this->edit_pv_mis=1;
        $this->del_pv_mis=1;
    }
    
    public function index()
    {
        try{
              
            $miscellanies = DB::table('miscellanies')
            ->join('suppliers', 'miscellanies.supplier_id', '=', 'suppliers.id')
          
            ->join('misc_categories', 'miscellanies.misc_categorie_id', '=', 'misc_categories.id')
            
            ->select('suppliers.id as sup_id','suppliers.sup_name','misc_categories.mc_pax','misc_categories.Rate','misc_categories.category','miscellanies.id')
            ->get();


           // return  $miscellanies;
           $add_pv  = $this->add_pv_mis;
           $edit_pv = $this->edit_pv_mis;
           $del_pv  = $this->del_pv_mis;

        return view('miscellanies.index',compact('miscellanies','add_pv','edit_pv','del_pv')); 

        }catch(\Exception $e){

             return abort(404); 
        }

    }

    public function live_search(Request $request)
    {

        if($request->ajax()){

            $queryd=$request->get('query');
            $edit_pv=$request->get('edit_pv');
            $del_pv=$request->get('del_pv');
            
       
            
            $output='';
            $output_edit='';
            $output_del='';


            if($queryd!=''){
               
                  
                $data=DB::table('miscellanies')
                ->join('suppliers','miscellanies.supplier_id','=','suppliers.id')
               ->join('misc_categories','miscellanies.misc_categorie_id','=','misc_categories.id')
                ->select('suppliers.id as sup_id','suppliers.sup_name','misc_categories.mc_pax','misc_categories.Rate','misc_categories.category','miscellanies.id')
                ->where('sup_name','LIKE','%'.$queryd.'%')
                ->get();
                   

               
                $total_row = $data->count();
          
                 
             
                    
            }else{
                $data=DB::table('miscellanies')
                ->join('suppliers','miscellanies.supplier_id','=','suppliers.id')
                ->join('misc_types','miscellanies.misc_type_id','=','misc_types.id')
                ->join('misc_categories','miscellanies.misc_categorie_id','=','misc_categories.id')
                ->select('suppliers.id as sup_id','suppliers.sup_name','misc_categories.mc_pax','misc_categories.Rate','misc_categories.category','miscellanies.id')
                ->get();

                $total_row=$data->count();
               

            }

                
            if($total_row > 0){
                
                  
           

                foreach($data as $row){
                          
                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){
                            
                        $output_edit='
                                       <a href="'.route('edit_miscellanies',$row->sup_id).'" 
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Edit details"><i class="la la-edit"></i>
                                       </a> ';

                    }else{
                            
                        $output_edit='';

                    }if($del_pv==1){

                        $output_del='
                                       <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.') "
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Edit View">
                                       <i class="la la-trash"></i>
                                       </a>';

                    }else{
                           
                        $output_del='';
                    }
                                        
                    $output.='
                    <tr>
                    <td style="text-align: center">'.$row->id.'</td>
                    <td>'.$row->sup_name.'</td>
                    <td style="text-align: center">'.$row->mc_pax.'</td>
                    <td style="text-align: center">'.$row->Rate.'</td>
                  
                        <td style="text-align: center">

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

            $misc=miscType::all();
            $supplier=Supplier::where('type','Misc')->get();
            $categorys=miscCategory::all();
            $countries=Country::all();

            return view('miscellanies.create',compact('misc','supplier','categorys','countries'));

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
        //

        if($request->code=='')
        {
            return " * Code Cannot be Null";

        }
        elseif($request->name=='')
        {
            return " * Name Cannot Be null";

        }
        
        else if(($this->my_email($request->email)=='') && (($request->email) !='')){
            return "* Invalid Email Address ";
       }
        else{

        try{

            $code_h = $request->code;
            $name_g = $request->name;
           // return 'added';
            $sup_code = Supplier::where('code',$code_h)->first();
            $sup_name = Supplier::where('sup_name',$name_g)->first();
            
            //return 'added';
            
            if($sup_code['code'] !=''){

                return "* Code already exist!, Please enter unique code ";

            }elseif($sup_name['sup_name'] !=''){   
                return "* Name already exist!, Please enter unique name "; 

            }
            
            else{

                DB::beginTransaction();

                $supDetails =new Supplier();
                $supDetails->code=$request->code;
                $supDetails->sup_name=$request->name;
                $supDetails->sup_s_name=$request->name;
                $supDetails->type='Misc';
                $supDetails->address=$request->address;
                $supDetails->status = 1;
                $supDetails->save();

                $sup_id=Supplier::select('id')->orderBy('id','DESC')->first();
                
              $supContacts = array(
                array('supplier_id'=>$sup_id->id, 'type'=>'Email_A','contact'=>$request->email),                
                array('supplier_id'=>$sup_id->id, 'type'=>'Mobile','contact'=>$request->mobile),             
                               
                );

             SupContactDetails::insert($supContacts);
          

        try
        {
            $miscellanies=new Miscellanie;
            $miscellanies->supplier_id=$sup_id->id;
            //$miscellanies->misc_type_id=$request->msc_type;
            $miscellanies->misc_categorie_id=$request->msc_cat;
          
            $miscellanies->save();

            

            DB::commit();

            return 'added';
        }
        catch(\Exception $tr)
        {  
            DB::rollBack();
            // $error_des =$tr->getMessage();

            // $data=array(
            // 'Error_code'=>"505",
            // 'Exp_dtl'=>$error_des
            //           );
            // return ($data);
            return "Some field cannot be empty!, Please check before save";
        }
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Miscellanie  $miscellanie
     * @return \Illuminate\Http\Response
     */
    public function show(Miscellanie $miscellanie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Miscellanie  $miscellanie
     * @return \Illuminate\Http\Response
     */
    public function edit($sup_id)
    {
        
             try{
                  
                $misc_type=miscType::all();
                // $supplier=Supplier::where('type','Miscellanies')->where('id',$id)->first();
                     $categorys=miscCategory::all();
                // $mis=Miscellanie::find($id);
                $countries=Country::all();
                $supplier = Supplier::find($sup_id);
              
                $misce=Miscellanie::where('supplier_id',$sup_id)->first();
                $sup=Supplier::where('id',$sup_id)->first();
                $email_A=SupContactDetails::where('supplier_id',$sup_id)->where('type','Email_A')->first();
                $fax=SupContactDetails::where('supplier_id',$sup_id)->where('type','Fax')->first();
                $tel=SupContactDetails::where('supplier_id',$sup_id)->where('type','Mobile')->first();
                
        //return $tel;
          
            return view('miscellanies.edit_form',compact('supplier','email_A','fax','tel','misce','sup','countries','misc_type','categorys'));

             }catch(\Exception $e){

                  return abort(404);
             }

    //return $sup;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Miscellanie  $miscellanie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        if($request->code=='')
        {
            return " * Code Cannot be Null";


        }
        elseif($request->name=='')
        {
            return " * Name Cannot Be null";

        }
        elseif($request->email=='')
        {
            return '* Email cannot be null';
        }
       
        else{


        try{


        
            
            $code_h = $request->code;
            $name_g = $request->name;
           // return 'added';
            $sup_code = Supplier::where('code',$code_h)->first();
            $sup_name = Supplier::where('sup_name',$name_g)->first();
            
            //return 'added';
           if($this->my_email($request->email)==''){
                return "* Invalid Email Address";

            }
            elseif((strlen($request->tel)) >0 && (strlen($request->tel)) <10  ){ 
                
                return "* Invalied Telephone Number!, Please enter again";  
                             
            }
            elseif((strlen($request->mobile)) >0 && (strlen($request->mobile)) <10  ){ 
                
                return "* Invalied Mobile Number!, Please enter again";  
                             
            }
            
            else{

                DB::beginTransaction();

                $supDetails =Supplier::find($request->s_id);
                 
             //   $supDetails->code = $request->code;
                $supDetails->sup_s_name = $request->g_name;
                $supDetails->type = 'Misc';
                $supDetails->address = $request->address;
                $supDetails->city_id = $request->city;
                $supDetails->district_id = $request->district;
                $supDetails->country_id = $request->country;
                $supDetails->status = 1;
                
                
                $supDetails->save();
                $sup_id=Supplier::select('id')->orderBy('id','DESC')->first();
                //return $sup_id;


                
              $supContacts = array(
                array('supplier_id'=>$sup_id->id, 'type'=>'Email_A','contact'=>$request->email),                
                array('supplier_id'=>$sup_id->id, 'type'=>'Mobile','contact'=>$request->mobile),
                          
                
                                 
              );

             SupContactDetails::insert($supContacts);
          

                




        try
        {
            $miscellanies=Miscellanie::find($request->id);
            $miscellanies->supplier_id=$sup_id->id;
            $miscellanies->misc_categorie_id=$request->msc_cat;
         
            $miscellanies->save();

            

            DB::commit();

            return 'updated';
        }
        catch(\Exception $e)
        {  
  
            DB::rollBack();
            return 'Some field cannot ne bull';
        }
    }

    }
    catch(\Exception $r)
    {           
        $error_des =$e->getMessage();

        $data=array(
        'Error_code'=>"505",
        'Exp_dtl'=>$error_des
                  );
        return ($data);
        // return 'An error occured !';
    }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Miscellanie  $miscellanie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try
        {

            DB::beginTransaction();
           $misc_id= Miscellanie::find($request->id)->select('supplier_id')->first();
            $sup_id=$misc_id->supplier_id;
            Miscellanie::where('supplier_id',$sup_id)->delete();

            SupContactDetails::where('supplier_id',$sup_id)->delete();
        
            Supplier::find($sup_id)->delete();
               
            DB::commit();
            return 'deleted';
      
        }
        catch(\Exception $e)
        {
           // DB::rollBack();
            return "Error";
        }


    }
}
