<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Currency;

class marketController extends Controller
{
     private $add_pv_mkt;
     private $edit_pv_mkt;
     private $del_pv_mkt;

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_mkt =1;
        $this->edit_pv_mkt=1;
        $this->del_pv_mkt =1;
    }
    
    public function index()
    {
        try{
            $mkt=Market::all();

            $add_pv  = $this->add_pv_mkt;
            $edit_pv = $this->edit_pv_mkt;
            $del_pv  = $this->del_pv_mkt;
    
           return view('markets.index',compact('mkt','add_pv','edit_pv','del_pv')); 


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

                return view('markets.create');

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
        try{
             


            $code_market=$request->input('code');
            $title_market=$request->input('name');
 
            $market_code=Market::where('m_code',$code_market)->first();
            $market_title=Market::where('market_name',$title_market)->first();
 
            if($market_code['m_code']!=''){
             return "*Market code  already exist!, Please enter unique Market code ";
            }
            else if($market_title['market_name']!=''){
             return "*Market title  already exist!, Please enter unique Market tilte ";
            }
            else{
             try{
                 
                if($request->code==''){
                    return "* Code cannot be empty!, Please check before save"; 
                }
                elseif($request->name==''){
                    return "* Title cannot be empty!, Please check before save"; 
                }
                else{
             
                 $market_add =new Market;
                 $market_add->m_code=$request->code;
                 $market_add->market_name=$request->name;
                //  $market_add->currency_id=$request->currency;
                 $market_add->save();
                 return 'added';
                }   
                 
             }
             catch(\Exception $tr){
                      
            //     $error_des =$tr->getMessage();

            //     $data=array(
            //         'Error_code'=>"505",
            //         'Exp_dtl'=>$error_des
            //     );
            //    return ($data);
                 return "* Some field cannot be empty!, Please check before save"; 
             }
            }
        }
        catch(\Exception $e){

            $error_des =$e->getMessage();

              $data=array(
                  'Error_code'=>"505",
                  'Exp_dtl'=>$error_des
              );
             return ($data);

       }
                    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
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
               
                       
                // $data=DB::table('markets')
                // ->join('currencies','currencies.id','=','markets.currency_id')
                // ->select('markets.*','currencies.code')   
                // ->where('market_name','LIKE','%'.$queryd.'%')
                // ->orWhere('m_code','LIKE','%'.$queryd.'%')
                // ->get();
                 
                $data=$market=Market::where('market_name','LIKE','%'.$queryd.'%')->get();

                $total_row = $data->count();
                 
              
                    
            }else{
                // $data=DB::table('markets')
                // ->join('currencies','currencies.id','=','markets.currency_id')
                // ->select('markets.*','currencies.code')  
                // ->get();
                $data=$market=Market::all(); 

                $total_row=$data->count();

            }
           
            
            if($total_row > 0){
                   foreach($data as $row){
                         
                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){
                            if($row->id!=1){
                                   
                                $output_edit='
                                <a href="'.route('market_edit',$row->id).'"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                <i class="la la-edit"></i></a>
                                </a>';
                            }
                        

                    }else{

                        $output_edit='';

                    }if($del_pv==1){
                                
                              if($row->id!=1){
                                   
                                $output_del='
                                <a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                title="Delete details"><i class="la la-trash"></i>
                                </a>';
                              }
                        

                    }else{
                            
                        $output_del='';
                    }
                                                  
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td style="text-align: center">'.$row->m_code.'</td>
                       <td>'.$row->market_name.'</td>
                       <td style="text-align: center">

                             '.$output_edit.'
                             '.$output_del.'

                       

                       </td>
                    </tr>';
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
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           try{

            $market_data=Market::findOrFail($id);
            return view('markets.edit_form',compact('market_data'));

        }catch(\Exception $e){

             return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        if($request->m_code== ''){
            return "* code cannot be empty!, Please check before save"; 
        }
        elseif($request->m_name== ''){
            return "*  name cannot be empty!, Please check before save"; 
        }
        else{ 


         try{

           

            $m_id=$request->id;

            $mkt=Market::find($m_id);
             $mkt->m_code=$request->m_code;
             $mkt->market_name=$request->m_name;
            //  $mkt->currency_id=$request->currency;
             $mkt->save();
    
             return 'updated';
            
         }
         catch(\Exception $e){
             
            $error_des =$e->getMessage();

              $data=array(
                  'Error_code'=>"505",
                  'Exp_dtl'=>$error_des
              );
             return ($data);
         }
        }
        
     

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
          try{
            $m_id=$request->id;
            Market::find($m_id)->delete();
        
           return 'deleted';
          }
          catch(\Exception $e){
            return "Exception Error : "; 
         }
        
    }
}
