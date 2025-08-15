<?php

namespace App\Http\Controllers;

use App\Hotel_feature;
use Illuminate\Http\Request;

use Response;
use Log;
use Alert;
class hotel_featureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $hotel_features=Hotel_feature::all();

        return view('hotel_features.index',compact('hotel_features'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            return view('hotel_features.create');

            
            
        
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
            $code_hotelfeature=$request->input('code');
            $name_hotelfeature=$request->input('name');
    
            $hotelfeature_code=Hotel_feature::where('code',$code_hotelfeature)->first();
            $hotelfeature_name=Hotel_feature::where('hotel_fe_name',$name_hotelfeature)->first();
    
            if($hotelfeature_code['code']!=''){
    
                return "*Hotel Feature code  already exist!, Please enter unique code ";
            }
            elseif($hotelfeature_name['hotel_fe_name']!='')
            {
                return "*Hotel Feature Name  already exist!, Please enter unique name ";
            }
              else if($request->code==''){
                return "*Hotel Feature code cannot be empty ";
               }
              else if($request->name==''){
                return "*Hotel Feature Name cannot be empty ";
               }
              else if($request->type==0){
                return "*Please select feature type ";
               }

            else{
                try{
                    $hotelfeature_details=new Hotel_feature;
                    $hotelfeature_details->code=$request->code;
                    $hotelfeature_details->hotel_fe_name=$request->name;
                    $hotelfeature_details->type=$request->type; 
                    $hotelfeature_details->save();
        
                    return 'added';
                }
                catch(\Exception $tr){

                    return "* Some field cannot be empty!, Please check before save"; 

            }    
                
            }

        }
        catch(\Exception $e){
            return "Exception Error : ";

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel_feature  $hotel_feature
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel_feature $hotel_feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel_feature  $hotel_feature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $features=Hotel_feature::findOrFail($id);
        return view('hotel_features.edit_form',compact('features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel_feature  $hotel_feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        if($request->code==''){
            return "*Hotel Group code cannot be empty ";
           }
          else if($request->name==''){
            return "*Hotel Group name cannot be empty ";
           }
           else if($request->type==0){
            return "*Please select feature type ";
           }

            $hotelfeature_id=$request->id;

            try{
                 
                $hotelfeature_details=Hotel_feature::find($hotelfeature_id);
                $hotelfeature_details->code=$request->code;
                $hotelfeature_details->hotel_fe_name=$request->name;
                $hotelfeature_details->type=$request->type;
                $hotelfeature_details->save();
        
                   return 'updated';
                            
                 }
                catch(\Exception $e){
        
                      return "Exception Error : ";
        
                }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel_feature  $hotel_feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    
          $features = $request->input('id');

        Hotel_feature::find($features)->delete();

    return 'deleted';
        
        
    }
}
