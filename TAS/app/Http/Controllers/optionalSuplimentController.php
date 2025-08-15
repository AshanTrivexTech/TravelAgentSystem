<?php

namespace App\Http\Controllers;

use App\OptionalSupliment;
use App\HotelPackage;
use Illuminate\Http\Request;
use DB;
class optionalSuplimentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index($id)
    {

        $optional_suplyment=DB::table('optional_supliments')
                                ->join('hotel_package_optional_supliment','hotel_package_optional_supliment.optional_supliment_id','=','optional_supliments.id')
                                ->select('optional_supliments.*','hotel_package_optional_supliment.hotel_package_id')
                                ->where('hotel_package_optional_supliment.hotel_package_id','=',$id)
                                ->get();

       return view('optional_supplement.index',compact('optional_suplyment','id'));
    }

 
    public function create($id)
    {
        //
        //$op_suplyment=OptionalSupliment::where($id);
        return view('optional_supplement.create',compact('op_suplyment','id'));
      
    }
       
   
    public function store(Request $request)
    {
      
        
        try{

            $op_supplement = $request->code;
           
               $id=$request->id;
            $optional_supliment = OptionalSupliment::where('ops_code', $op_supplement)->first();

            if($optional_supliment['ops_code'] !='') {

                return "*Optional Supplement code  already exist!, Please enter unique code";

            }
            else if($request->code==''){
                return "*Code cannot be empty ";
               }
            else if($request->amount==''){
                return "*Amount cannot be empty ";
            }

            else
            {
                try{

                    $optionalSupliment_Details = new OptionalSupliment;
                    $optionalSupliment_Details ->ops_code = $request->code;
                    $optionalSupliment_Details ->des = $request->desc;  
                    $optionalSupliment_Details ->amt = $request->amount;     
                    $optionalSupliment_Details ->rate_type= $request->rate_type; 

                    HotelPackage::find($id)->optional_sup()->save($optionalSupliment_Details);
                                    

                    return 'added';
                }catch(Exception $tr){

                        return "* Some field cannot be empty!, Please check before save"; 
                }                      
            
        }

        }catch(Exception $e){

                return "Exception Error : ";

        }
               
    }
   
    public function show(OptionalSupliment $optionalSupliment)
    {
        //
    }


    public function edit($id)
    {
        //
        $op_suplyment=OptionalSupliment::find($id);
        return view('optional_supplement.edit_form',compact('op_suplyment'));

        
    }

    
    public function update(Request $request)
    {
    
    if($request->code==''){
        return "*Code cannot be empty ";
       }
    else if($request->amount==''){
        return "*Amount cannot be empty ";
       }
       
          $optionalSupliment_id=$request->id;

    try{
         
        $optionalSupliment_Details =OptionalSupliment::find($optionalSupliment_id);
        $optionalSupliment_Details->code = $request->code;
        $optionalSupliment_Details->amt = $request->amount;
        $optionalSupliment_Details->des = $request->description;
        $optionalSupliment_Details ->rate_type= $request->rate_type;       
        $optionalSupliment_Details->save();
        return 'updated';
                            
        
    
    }
      catch(\Exception $e){

         return "Exception Error : ";

    }

    
    }
    
    public function destroy(Request $request)
    {
        //
        try{
            $optionalSupliment_ID=$request->input('id');
            OptionalSupliment::find($optionalSupliment_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
}
