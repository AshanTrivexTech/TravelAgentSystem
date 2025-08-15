<?php

namespace App\Http\Controllers;

use App\CurrencyExchangeRate;
use App\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon;

class currencyExchangeRateController extends Controller
{
     private $add_pv_cxr;
     private $edit_pv_cxr;
     private $del_pv_cxr;

     public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_cxr =1;
        $this->edit_pv_cxr=1;
        $this->del_pv_cxr =1;
    }
    
    //private $add_pv_cxr;
    public function index()
    {
        try{
            $currencys=DB::table('currency_exchange_rates')
            ->join('currencies as cur_A','currency_exchange_rates.currency_A','=','cur_A.id')
            ->join('currencies as cur_B','currency_exchange_rates.currency_B','=','cur_B.id')
            ->select('currency_exchange_rates.updated_at','currency_exchange_rates.created_at','currency_exchange_rates.id','cur_A.type as type_A','cur_A.id as A_id','cur_B.type as type_B','cur_B.id as B_id','currency_exchange_rates.amount')
            ->get();

              $add_pv  = $this->add_pv_cxr;
              $edit_pv = $this->edit_pv_cxr;
              $del_pv  = $this->del_pv_cxr;

             return view('currencies.manage_manually.currency_exchange_index',compact('currencys','add_pv','edit_pv','del_pv'));

        }catch(\Exception $e){

            return abort(404);

        }

        
    }

    public function create_excahnge_manage()
    {
        try{
            $currencys=DB::table('currency_exchange_rates')
            ->join('currencies as cur_A','currency_exchange_rates.currency_A','=','cur_A.id')
            ->join('currencies as cur_B','currency_exchange_rates.currency_B','=','cur_B.id')
            ->select('currency_exchange_rates.id','cur_A.type as type_A','cur_A.id as A_id','cur_B.type as type_B','cur_B.id as B_id','currency_exchange_rates.amount','currency_exchange_rates.created_at')
            ->get();

              $cr1=Currency::all();
              $cr2=Currency::all();

              $add_pv  = $this->add_pv_cxr;
              $edit_pv = $this->edit_pv_cxr;
              $del_pv  = $this->del_pv_cxr;

             return view('currencies.manage_manually.currency_exchange_manage',compact('cr2','cr1','currencys','add_pv','edit_pv','del_pv'));

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
                $currencys=Currency::all();
                return view('currencies.manage_manually.currency_exchange_create',compact('currencys'));
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
        DB::beginTransaction();

       
        $cur_A = $request->currency_A;
        $cur_B = $request->currency_B;
        // return $cur_A
       // return 'added';
        $currency_a_data = CurrencyExchangeRate::where('currency_A',$cur_A)
                                            ->where('currency_B',$cur_B)   
                                            ->select('*')
                                            ->orderBy('id','DESC')
                                            ->first();
                                            
        

        if($currency_a_data != '')
        {
           
            $time= Carbon\Carbon::now();

            // return $time;
           
            $currency_a_data_db = CurrencyExchangeRate::find($currency_a_data->id);
                                                         
                                            //  return $currency_a_data_db;           
                  $currency_a_data_db->updated_at=$time;
                  $currency_a_data_db->save();    
                //   return 'added';                                   
          
        }


                                    //  return $currency_a_data;       
        // $currency_b  = CurrencyExchangeRate::where('currency_B',$cur_B)->first();  

          if($request->currency_A==0){
              return "Please Select Currency Type A";
          }elseif($request->currency_B==0){
              return "Please Select Currency Type B";
          }
          elseif($request->amount==''){
                 return "Exchange Rate cannot be empty";
          }
          elseif($request->frm_date==''){
            return "Please Select From Date";
          }
         elseif($request->to_date==''){
           return "Please Select To Date";
          }
        //   elseif($currency_a['currency_A']!='' &&  $currency_b['currency_B']!=''){
        //     return "*Exchange Rate Already Exist ";
        //    }

          else{
              
                    $currency_rate= new CurrencyExchangeRate;
                    $currency_rate->currency_A=$request->currency_A;
                    $currency_rate->currency_B=$request->currency_B;
                    $currency_rate->amount=$request->amount;
                    $currency_rate->frm_date=$request->frm_date;
                    $currency_rate->to_date=$request->to_date;
                    $currency_rate->save();

                    // return "added";
                   
              
             
          }
          DB::commit();

          return "added";
        }
        catch(Exception $e)
        {
            DB::rollBack();
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
             'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "Some files cannot be null please check before save".$ex;

        }

        
                      
    
    }

    public function selectIndexByCurrencyType(Request $request)
    {
        
        if($request->ajax()){            
            $currencyA_ID = $request->currency_A;
            $currencyB_ID = Currency::where('id','!=',$currencyA_ID)->select('id','type')->get();
            
    		return json_encode($currencyB_ID);
           
    	}

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

                $data=DB::table('currency_exchange_rates')
                ->join('currencies as cur_A','currency_exchange_rates.currency_A','=','cur_A.id')
                ->join('currencies as cur_B','currency_exchange_rates.currency_B','=','cur_B.id')
                ->select('currency_exchange_rates.id','cur_A.type as type_A','cur_B.type as type_B','currency_exchange_rates.amount')
                ->where('cur_A.type','LIKE','%'.$queryd.'%')
                ->orWhere('cur_B.type','LIKE','%'.$queryd.'%')
                ->get();

                   $total_row=$data->count();
                
            }else{
                $data=DB::table('currency_exchange_rates')
                ->join('currencies as cur_A','currency_exchange_rates.currency_A','=','cur_A.id')
                ->join('currencies as cur_B','currency_exchange_rates.currency_B','=','cur_B.id')
                ->select('currency_exchange_rates.id','cur_A.type as type_A','cur_B.type as type_B','currency_exchange_rates.amount')
                ->get();

                    $total_row=$data->count();

                }
                
              //  return json_encode($data);

            if($total_row >0){
                 foreach($data as $row){

                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){

                        $output_edit='
                                       <a href="'.route('currencyEx_edit',$row->id).'"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                       <i class="la la-edit"></i>
                                       </a>
                                     ';

                    }else{
                        $output_edit=''; 

                    }if($del_pv==1){

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
                    <td>'.$row->type_A.'</td>
                    <td>'.$row->type_B.'</td>
                    <td>'.$row->amount.'</td>
                   <td class="m-datatable__cell--right" >
                          
                     
                     '.$output_del.'
                      
                  </td>
                  </tr>
                 ';
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
     * Display the specified resource.
     *
     * @param  \App\CurrencyExchangeRate  $currencyExchangeRate
     * @return \Illuminate\Http\Response
     */
    public function show(CurrencyExchangeRate $currencyExchangeRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CurrencyExchangeRate  $currencyExchangeRate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $currency_edit=DB::table('currency_exchange_rates')
            ->join('currencies as cur_A','currency_exchange_rates.currency_A','=','cur_A.id')
            ->join('currencies as cur_B','currency_exchange_rates.currency_B','=','cur_B.id')
            ->select('currency_exchange_rates.id','cur_A.type as type_A','cur_B.type as type_B','currency_exchange_rates.amount')
            ->where('currency_exchange_rates.id',$id)
            ->first();
    
            return view('currencies.manage_manually.currency_exchange_edit',compact('currency_edit'));

        }catch(\Exception $e){

            return abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CurrencyExchangeRate  $currencyExchangeRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        
        if($request->amount==''){
            return "Exchange Rate cannot be empty";
        }
        else{
                       $currency_rate_ID=$request->id;
            try{
                  $currency_rate=CurrencyExchangeRate::find($currency_rate_ID);
                  $currency_rate->amount=$request->amount;
                  $currency_rate->save();

                  return "updated";
            }
            catch(\Exception $e){
                
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
             'Exp_dtl'=>$error_des
                      );
            return ($data);

            //   return "* Some field cannot be empty!, Please check before save"; 
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CurrencyExchangeRate  $currencyExchangeRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $currencyEx_ID=$request->input('id');
            CurrencyExchangeRate::find($currencyEx_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){
            return 'NotDeleted';
        }
        
    }
}
