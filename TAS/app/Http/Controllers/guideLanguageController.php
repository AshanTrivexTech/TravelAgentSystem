<?php

namespace App\Http\Controllers;

use App\GuideLanguage;
use App\Language;
use Illuminate\Http\Request;
use \DB;
class guideLanguageController extends Controller
{
     private $add_pv_gl;
     private $del_pv_gl; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_gl =1;
        $this->del_pv_gl =1;
    }
    
    public function index($id)
    {
             try{
 
                $guide_list = DB::table('guide_languages')
                ->join('guides','guides.id','=','guide_languages.guide_id')
                ->join('languages','languages.id','=','guide_languages.language_id')
                ->select('guide_languages.id as g_l_id','guides.id as g_id','guides.guide_name','languages.id as l_id','languages.lang_name')->where('guides.id','=',$id)
                ->get();
    
             $add_pv  = $this->add_pv_gl;
             $del_pv  = $this->del_pv_gl;
                
    
             return view('guides.guide_lanuage_index',compact('guide_list','id','add_pv','del_pv'));

             }catch(\Exception $e){

                 return abort(404);
             }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try{

            $languages=Language::all();
            return view('guides.create_language',compact('languages','id'));

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
        try
        {

          $g_id=  $request->id;
            
        $Guide_lang=json_decode($request->jsData);
                 
        foreach($Guide_lang as $item ){

            $glan = new GuideLanguage();
            $glan->guide_id = $g_id;
            $glan->language_id = $item->language_id;
            $glan->save();         
         }
         return 'added';

     
        }
        catch(\Exception $e)
        {    
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "* Something went wrong Please check again g!!";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GuideLanguage  $guideLanguage
     * @return \Illuminate\Http\Response
     */
    public function show(GuideLanguage $guideLanguage)
    {
        //
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GuideLanguage  $guideLanguage
     * @return \Illuminate\Http\Response
     */
    public function edit(GuideLanguage $guideLanguage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GuideLanguage  $guideLanguage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuideLanguage $guideLanguage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GuideLanguage  $guideLanguage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        
        try
        {

            $g_id=$request->id;
            GuideLanguage::where('id',$g_id)->delete();
            return 'deleted';



        }
        catch(\Exception $e)
        
        {
            return "* Something went wrong Please Check again!";
        }


    }
}
