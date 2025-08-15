<?php

namespace App\Http\Controllers;

use App\ExceptionReturn;
use Illuminate\Http\Request;

class exceptionreturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {    

          $error_des = $req->error_details;
          $current_url =$req->curnt_url;

          return view('exception_return.report_page',compact('error_des','current_url'));

    }

    public function view_404page(){

        return view('exception_return.404report_page');
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

            $exp_details =new ExceptionReturn;
            $exp_details->cur_url=$request->c_url;
            $exp_details->error_des=$request->exp_dtl;
            $exp_details->remark=$request->remark;
            $exp_details->save();
                 
               return 'added';
          }
         
          catch(\Exception $e){

            return "Exception Error : ";
       }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ExceptionReturn  $exceptionReturn
     * @return \Illuminate\Http\Response
     */
    public function show(ExceptionReturn $exceptionReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExceptionReturn  $exceptionReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(ExceptionReturn $exceptionReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExceptionReturn  $exceptionReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExceptionReturn $exceptionReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExceptionReturn  $exceptionReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExceptionReturn $exceptionReturn)
    {
        //
    }
}
