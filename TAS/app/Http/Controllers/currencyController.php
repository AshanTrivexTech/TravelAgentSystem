<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use DB;

class currencyController extends Controller
{
     private $add_pv_cry;
     private $edit_pv_cry;
     private $del_pv_cry; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_cry =1;
        $this->edit_pv_cry=1;
        $this->del_pv_cry =1;
    }
    
    public function index()
    {
        
               try{
                $currency=Currency::all();
        
                $add_pv = $this->add_pv_cry;
                $edit_pv = $this->edit_pv_cry;
                $del_pv  = $this->del_pv_cry;
   
                 return view('currencies.manage_manually.index',compact('currency','add_pv','edit_pv','del_pv'));

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
            return view('currencies.manage_manually.create');

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

            $type_currency = $request->input('type');
            $code_currency = $request->input('code');

            $currency_type =Currency::where('type',$type_currency)->first();
            $currency_code = Currency::where('code', $code_currency)->first();
              
            if($request->type==''){
                return "*Currency Name cannot be empty ";
               }
              else if($request->code==''){
                return "*Currency code cannot be empty ";
               }
            elseif($currency_type['code'] !='') {

                return "*Currency type  already exist!, Please enter unique currency type ";

            }elseif($currency_code['type'] !=''){   
                return "*Currency code already exist!, Please enter unique code ";               
            }else{

                try{

                    $currency_Details = new Currency();
                    $currency_Details->type=$request->type;
                    $currency_Details->code=$request->code;
                    $currency_Details->symbol=$request->symbol;      
                    $currency_Details->save();
       
                    return 'added';
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
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
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

                $data=DB::select('SELECT id,code,symbol,type FROM currencies
                                   WHERE code LIKE ?
                                   OR type LIKE ?',['%'.$queryd.'%','%'.$queryd.'%']);

                                   $total_row=count((array)$data);
            }else{
                    $data=DB::table('currencies')
                                    ->select('id','code','symbol','type')
                                    ->orderBy('id','ASC')->get();

                    $total_row=$data->count();

                }
                
              //  return json_encode($data);

            if($total_row >0){
                 foreach($data as $row){

                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){
                             
                        $output_edit='
                                       <a href="'.route('currency_edit',$row->id).'"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                       <i class="la la-edit"></i></a>
                                     ';

                    }else{
                             $output_edit='';
                    }

                    if($del_pv==1){
                           
                        $output_del='
                                      <a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                      class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                      title="Delete details"><i class="la la-trash"></i>
                                      </a>
                                     ';
                    }else{
                             $output_del='';
                             
                             
                    }
                        
                    $output.='
                    
                    <tr style="text-align: center"> 
                    <td>'.$row->id.'</td>
                    <td>'.$row->code.'</td>
                    <td>'.$row->type.'</td>
                    <td>'.$row->symbol.'</td>
                   <td class="m-datatable__cell--right" >
                  
                   '.$output_edit.'
                   '.$output_del.'
                  
                   </td>
                  </tr>';
                 }
                   
            }else{
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
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          try{
            $currency_edit=Currency::findOrFail($id);
            return view('currencies.manage_manually.edit_form',compact('currency_edit'));
            
          }catch(\Exception $e){

              return abort(404);
          }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         
        if($request->type==''){
            return "*Currency type cannot be empty ";
           }
          else if($request->code==''){
            return "*Currency code cannot be empty ";
           }
       $currency_id=$request->id;

       try{
        
                $currency_Details =Currency::find($currency_id);
                $currency_Details->type=$request->type;
                $currency_Details->code=$request->code;
                $currency_Details->symbol=$request->symbol;       
                $currency_Details->save();
   
                return 'updated';

           }
      catch(\Exception $e){

           $error_des=$e->getMessage();

        $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
        );
       return ($data);

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        try{
            $currency_ID=$request->input('id');
            Currency::find($currency_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
        
    }
}
