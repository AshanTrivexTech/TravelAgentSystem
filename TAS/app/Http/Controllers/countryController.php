<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class countryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    
          try{
            $countries= Country::all();
            return view('countries.index',compact('countries'));

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
       // return view('countries.create');
       return view('countries.create');
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
    }


    public function liveSearch(Request $request)
    {

        if($request->ajax()){
            

            $queryd=$request->get('query');
            
            if($queryd!=''){
               
                       
                $data=Country::where('c_code','LIKE','%'.$queryd.'%')->get();
                   

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data=Country::all();
                   

                $total_row=$data->count();
                

            }


             
            if($total_row > 0){
                

                //return json_encode('abc');
                $output="";
                foreach($data as $row){
              
        
                                        
                    $output.='
                    <tr>
                    <td style="text-align: center">'.$row->id.'</td>
                    <td style="text-align: center">'.$row->c_code.'</td>
                    <td style="text-align: center">'.$row->country_name.'</td>  
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
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
