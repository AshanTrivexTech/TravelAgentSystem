<?php

namespace App\Http\Controllers;

use App\PackagePeriod;
use App\Package_period_type;
use Illuminate\Http\Request;

class packagePeriodController extends Controller
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
        //

        $periods=PackagePeriod::all();
        return view('package_period.index',compact('periods'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $periods=Package_period_type::all();

        return view('package_period.create',compact('periods'));
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
        // if($request->title==''){
        //     return "*District name cannot be empty ";
        //    }
        //   else if($request->code==''){
        //     return "*District code cannot be empty ";
        //    }
        //    if($request->name==''){
        //     return "*District name cannot be empty ";
        //    }
        //   else if($request->code==''){
        //     return "*District code cannot be empty ";
        //    }

        // try
        // {
        // $period=new PackagePeriod;
        // $period->title=$request->title;
        // $period->type=$request->type;
        // $period->fr_date=$request->m_datepicker_1;
        // $period->to_date=$request->m_datepicker_2;
        // $period->status=$request->status;
        // $period->save();

        // return 'added';
        // }
        // catch(\Exception $e)
        // {
        //     return "* Some field cannot be empty!, Please check before save".$e;
        // }
        try{

            $title_package = $request->input('title');
            
            $package_title =PackagePeriod::where('title',$title_package)->first();
              
               if($request->title==''){
                return "*Title cannot be empty ";
               }
              
               else if($request->m_datepicker_1==''){
                return "*Please select From Date ";
               }
               else if($request->m_datepicker_2==''){
                return "*Please select To Date ";
               }
              elseif($package_title['title'] !='') {

                return "*Package title  already exist!, Please enter unique package title ";

            }else{

                try{

                    $period=new PackagePeriod;
                    $period->title=$request->title;
                    $period->type=$request->type;
                    $period->fr_date=$request->m_datepicker_1;
                    $period->to_date=$request->m_datepicker_2;
                    $period->status=$request->status;
                    $period->save();
       
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
     * @param  \App\PackagePeriod  $packagePeriod
     * @return \Illuminate\Http\Response
     */
    public function show(PackagePeriod $packagePeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackagePeriod  $packagePeriod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
            $period=Package_period_type::all();
            $period_data=PackagePeriod::find($id);
            return view('package_period.edit_period',compact('period','period_data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackagePeriod  $packagePeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {    
        if($request->title==''){
            return "*Title cannot be empty ";
           }
          
           else if($request->m_datepicker_1==''){
            return "*Please select From Date ";
           }
           else if($request->m_datepicker_2==''){
            return "*Please select To Date ";
           }

        try
        {
        $period=PackagePeriod::find($request->id);
        
        $period->title=$request->title;
        $period->type=$request->type;
        $period->fr_date=$request->m_datepicker_1;
        $period->to_date=$request->m_datepicker_2;
        $period->status=$request->status;
        $period->save();

        return 'updated';

        }catch(\Exception $e)
        {
            return "* Some field cannot be empty!, Please check before save";
        }



        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackagePeriod  $packagePeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
          try{
            $period=PackagePeriod::find($request->id)->delete();
            return 'deleted';
          }
        
        catch(\Exception $e){
            return "Exception Error : "; 
         }
    }
}
