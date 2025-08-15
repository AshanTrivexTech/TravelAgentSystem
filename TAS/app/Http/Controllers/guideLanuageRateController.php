<?php

namespace App\Http\Controllers;

use App\GuideLanuageRate;
use App\Language;
use App\GuideType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class guideLanuageRateController extends Controller
{
    private $add_pv_glr;
    private $edit_pv_glr;
    private $del_pv_glr;
     
    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_glr =1;
        $this->edit_pv_glr=1;
        $this->del_pv_glr =1;
    }

    public function index()
    {
          try{

            $guide_lang_rates=DB::table('guide_lanuage_rates')
            ->join('languages','languages.id','=','guide_lanuage_rates.language_id')
            ->join('guide_types','guide_types.id','=','guide_lanuage_rates.guide_type_id')
            ->select('guide_lanuage_rates.id','guide_lanuage_rates.rate','languages.lang_name','guide_types.g_type')
            ->get();

 
             $add_pv  = $this->add_pv_glr;
             $edit_pv = $this->edit_pv_glr;
             $del_pv  = $this->del_pv_glr;

             return view('guides.guide_languagerateindex',compact('guide_lang_rates','add_pv','edit_pv','del_pv'));

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
              
            $languages=Language::all();
            $guide_types=GuideType::all();
    
            return view('guides.guide_languagerate',compact('languages','guide_types')); 

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
    if($request->language==0){

        return "Please Select Language";
    }elseif($request->guide_type==0){

         return "Please Select Guide Type";
    }elseif($request->amount==''){
        
        return "please Enter Amount";
    }
    try{
            $guidelang_rate=new GuideLanuageRate;
            $guidelang_rate->language_id=$request->language;
            $guidelang_rate->guide_type_id=$request->guide_type;
            $guidelang_rate->rate=$request->amount;
            $guidelang_rate->save();

            return 'added';
        }
    catch(\Exception $e){

        $error_des =$e->getMessage();

        $data=array(
        'Error_code'=>"505",
        'Exp_dtl'=>$error_des
                  );
        return ($data);
        // return "* Some field cannot be empty!, Please check before save";
    }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\GuideLanuageRate  $guideLanuageRate
     * @return \Illuminate\Http\Response
     */
    public function show(GuideLanguage $guideLanguage)
    {
        //
    }
       
    public function livesearch(Request $request)
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
                    
                $data=DB::table('guide_lanuage_rates')
                ->join('languages','languages.id','=','guide_lanuage_rates.language_id')
                ->join('guide_types','guide_types.id','=','guide_lanuage_rates.guide_type_id')
                ->select('guide_lanuage_rates.id','guide_lanuage_rates.rate','languages.lang_name','guide_types.g_type')
                ->where('lang_name','LIKE','%'.$queryd.'%')
                ->orWhere('g_type','LIKE','%'.$queryd.'%')
                ->get();
                       
                $total_row = $data->count();
                
            }else{
                $data=DB::table('guide_lanuage_rates')
                ->join('languages','languages.id','=','guide_lanuage_rates.language_id')
                ->join('guide_types','guide_types.id','=','guide_lanuage_rates.guide_type_id')
                ->select('guide_lanuage_rates.id','guide_lanuage_rates.rate','languages.lang_name','guide_types.g_type')
                ->get();
                  
                $total_row=$data->count();
                
            }
            if($total_row > 0){
                
                foreach($data as $row){
                    $output_edit='';
                    $output_del='';
                         
                    if($edit_pv==1){
                            
                        $output_edit='
                                       <a href="'.route('guidelangrate_edit',$row->id).'" 
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Edit details"><i class="la la-edit"></i>
                                       </a>
                                      ';


                    }else{

                        $output_edit='';   

                    }if($del_pv==1){

                        $output_del='
                                    <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                    title="Delete details">
                                    <i class="la la-trash"></i>
                                    </a>
                                    ';
                    }else{

                        $output_del='';

                    }
                                 
                    $output.='
                    <tr style="text-align:center">
                            <td>'.$row->id.'</td>
                            <td>'.$row->lang_name.'</td>
                            <td>'.$row->g_type.'</td>
                            <td>'.$row->rate.'</td>
                            <td>
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\GuideLanuageRate  $guideLanuageRate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{
        
            $guide_lang_edit=GuideLanuageRate::find($id);
            $lang_id=GuideLanuageRate::where('id',$id)->select('language_id')->get();
            $language=Language::find($lang_id)->first();
            $guide_type_id=GuideLanuageRate::where('id',$id)->select('guide_type_id')->get();
            $guide_type=GuideType::find($guide_type_id)->first();
    
            return view('guides.guide_languagerateedit', compact('guide_lang_edit','language','guide_type'));     

         }catch(\Exception $e){

              return abort(404);

         }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GuideLanuageRate  $guideLanuageRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->amount==''){
            return "Please Enter Amount";
        }
        else{
                 $guidelangrate_id=$request->id;
            try{
                    $guidelang_rate=GuideLanuageRate::find($guidelangrate_id);
                    $guidelang_rate->rate=$request->amount;
                    $guidelang_rate->save();
        
                    return 'updated';
                }
            catch(\Exception $e){

                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                          );
                return ($data);
                // return "*Exception Error:";
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GuideLanuageRate  $guideLanuageRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $guidelang_rate=$request->input('id');
            GuideLanuageRate::find($guidelang_rate)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return "Exception Error : ";      
        }
        
    }
}
