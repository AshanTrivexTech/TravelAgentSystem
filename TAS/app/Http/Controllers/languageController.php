<?php

namespace App\Http\Controllers;

use App\Language;
use App\GuideLanuageRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class languageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
        
        private $del_pv; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_gl =1;
        $this->del_pv =1;
    }
    
    
    
    public function index()
    {
        try{

            $languages=Language::all();
            return view('languages.index',compact('languages'));

        }catch(\Exception $e){

             return abort(404);
        }
        
    }

    public function livesearch_lan(Request $request)
    {
        if($request->ajax()){

            $queryd=$request->get('query');
            $del_pv=$request->get('del_pv');
      
            
            $output='';
            $output_del='';

            if($queryd!=''){
                    
                // $data=DB::table('languages')
                //  ->join('guide_lanuage_rates','guide_lanuage_rates.language_id','=','languages.id')
                //  ->select('languages.*','guide_lanuage_rates.rate')
                //  ->where('lang_name','LIKE','%'.$queryd.'%')
                //  ->get();
                       
                $data=$languages=Language::where('lang_name','LIKE','%'.$queryd.'%')->get();

                $total_row = $data->count();
                
            }else{
                // $data=DB::table('languages')
                // ->join('guide_lanuage_rates','guide_lanuage_rates.language_id','=','languages.id')
                // ->select('languages.*','guide_lanuage_rates.rate')
                // ->get();
                $data=$languages=Language::all();
                   
                $total_row=$data->count();
                
            }
            if($total_row > 0){
                
                foreach($data as $row){

                    $output_del='';
                    $output='';
                    if($del_pv==1){
                           
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
                    <tr style="text-align: center;">
                            <td>'.$row->id.'</td>
                            <td>'.$row->lang_name.'</td>
                            <td>'.$output_del.'</td>
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

            return view('languages.create');

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
        try{
            $language=new Language;
            $language->lang_name=$request->name;
            $language->save();

            return 'added';
        }
        catch(\Exception $e){
                
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "* Language name field cannot be empty!, Please check before save"; 
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }
   



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $language_ID=$request->input('id');
            Language::find($language_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
}
