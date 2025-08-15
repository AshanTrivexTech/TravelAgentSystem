<?php

namespace App\Http\Controllers;

use App\CompulsorySupliment;
use App\HotelPackage;
use App\Hotel;
use DB;
use App\Currency;
use Illuminate\Http\Request;
use App\Supplier;


class compulsorySuplimentController extends Controller
{         
     private $add_pv_cs;
     private $edit_pv_cs;
     private $del_pv_cs; 
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_cs=1;
        $this->edit_pv_cs=1;
        $this->del_pv_cs=1;
    }
    
    public function index()
    {
         try{
            $cmps = DB::table('compulsory_supliments')
            ->join('suppliers', 'suppliers.id', '=', 'compulsory_supliments.supplier_id')
            ->join('currencies','compulsory_supliments.currency_id', '=','currencies.id')
            ->select('suppliers.sup_s_name', 'compulsory_supliments.*','currencies.type')
            ->get();


            $add_pv=$this->add_pv_cs;
            $edit_pv=$this->edit_pv_cs;
            $del_pv=$this->del_pv_cs;

        return view('compulsory_supplement.index',compact('cmps','add_pv','edit_pv','del_pv'));

         }catch(\Exception $e){

             return abort(404);
         }
      

  
    }

    public function liveSearch(Request $request)
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
               
                       
                $data= DB::table('compulsory_supliments')
                ->join('suppliers', 'compulsory_supliments.supplier_id', '=', 'suppliers.id')
                ->join('currencies','compulsory_supliments.currency_id', '=','currencies.id')
                ->select('suppliers.sup_s_name', 'compulsory_supliments.*','currencies.type')
                ->where('compulsory_supliments.cs_code','LIKE','%'.$queryd.'%')
                ->orWhere('suppliers.sup_s_name','LIKE','%'.$queryd.'%')
                ->get();
                   

               
                $total_row = $data->count();
               
                 
             
                    
            }else{

                $data= DB::table('compulsory_supliments')
                        ->join('suppliers', 'compulsory_supliments.supplier_id', '=', 'suppliers.id')
                        ->join('currencies','compulsory_supliments.currency_id', '=','currencies.id')
                        ->select('suppliers.sup_s_name', 'compulsory_supliments.*','currencies.type')
                        ->get();
                                           

                $total_row=$data->count();
                

            }
            if($total_row > 0){
                

           

                foreach($data as $row){

                    $rate_type='';

                    $output_edit='';
                    $output_del='';
                     
                    if($row->rate_type==0){

                        $rate_type='<span>Per-Person</span>';
                    }else{

                        $rate_type='<span>Per-Room</span>';
                    }

                    if($edit_pv==1){

                        $output_edit='
                                       <a  href="'.route('comsup_edit',$row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                       <i class="la la-edit"></i>
                                       </a>
                                     ';

                    }else{
                        $output_edit=''; 

                    }if($del_pv==1){

                        $output_del='
                                      <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                      class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                      title="Delete View">
                                      <i class="la la-trash"></i>
                                      </a>
                                     ';

                    }else{

                        $output_del='';
                    }
                    
                                        
                    $output.=' 
                    <tr>
                    <td style="text-align:center">'.$row->id.'</td>
                    <td style="text-align:center">'.$row->cs_code.'</td>
                    <td>'.$row->sup_s_name.'</td>
                    <td style="text-align:center">'.$row->type.'</td>
                    <td style="text-align:center">'.$rate_type.'</td>
                    <td style="text-align:right">'.number_format($row->amt,2).'</td>
                    <td style="text-align:right">'.$row->des.'</td>
                    <td class="m-datatable__cell--right" style="text-align:center">
                        
                         '.$output_edit.'
                         '.$output_del.'
                     
                  </td>
              </tr>  
             ';
                }
                

         }
         else{
             $output='<tr>
             <td align="center" colspan="7">No records found</td>
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
            $hotels=Supplier::where('type','Hotel')->select('id','sup_s_name')->get();
            $currencys=Currency::all();
            
             return view('compulsory_supplement.create',compact('hotels','currencys'));

        }catch(\Exceptio $e){

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

            $comp_supplement = $request->code;
             // $id=$request->id;

            //return  $request->all();
            
            $compulsory_supliment = CompulsorySupliment::where('cs_code', $comp_supplement)->first();

            if($compulsory_supliment['cs_code'] !='') {

                return "*Compulsory Supplement code  already exist!, Please enter unique code";

            }
            elseif($request->hotel=='')
            {
                return "* Hotel Cannot Be Null";
            }
             else if($request->code==''){
                return "*Code cannot be empty ";
               }
            else if($request->amount==''){
                return "*Amount cannot be empty ";
               }
               elseif($request->from_date=='')
               {
                   return "* From Date Cannot Be null";
               }
               elseif($request->to_date=='')
               {
                   return "* To Date Cannot Be Null";
               }
               elseif($request->desc=='')
               {
                   return "* Please Enter Some Description";
               }elseif($request->currency==0){

                  return "* Please Select currency";
               }
           
            else
            {
                try{

                    $compulsorySupliment_Details = new CompulsorySupliment;
                    $compulsorySupliment_Details ->cs_code = $request->code;
                    $compulsorySupliment_Details ->des = $request->desc;  
                    $compulsorySupliment_Details ->amt = $request->amount;     
                    $compulsorySupliment_Details ->fr_date = $request->from_date;     
                    $compulsorySupliment_Details ->to_date = $request->to_date;     
                    $compulsorySupliment_Details ->supplier_id = $request->hotel;
                    $compulsorySupliment_Details ->currency_id =$request->currency;     
                    $compulsorySupliment_Details ->rate_type=$request->rate_type;    
                    //$compulsorySupliment_Details ->save();
                   // HotelPackage::find($id)->compulsory_sup()->save($compulsorySupliment_Details);
                    $compulsorySupliment_Details->save();
                   // $package->

                    return 'added';
                   //return $package;
                }
                      catch(\Exception $tr){

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
            //  return "Exception Error : ";

        }
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompulsorySupliment  $compulsorySupliment
     * @return \Illuminate\Http\Response
     */
    public function show(CompulsorySupliment $compulsorySupliment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompulsorySupliment  $compulsorySupliment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{
            $compulsory_supplement=CompulsorySupliment::findOrFail($id);
            $currencies=Currency::all();
            return view('compulsory_supplement.edit_form',compact('compulsory_supplement','currencies'));

         }catch(\Exception $e){

              return abort(404);
         }
        
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompulsorySupliment  $compulsorySupliment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // 
        //  if($request->code==''){
        //     return "*Code cannot be empty ";
        //    }
         if($request->amount==''){
            return "*Amount cannot be empty ";
           }
           
           elseif($request->from_date=='')
           {
               return "* From Date Cannot Be null";
           }
           elseif($request->to_date=='')
           {
               return "* To Date Cannot Be Null";
           }
           elseif($request->desc=='')
           {
               return "* Please Enter Some Description";

           }elseif($request->currency==0){

              return "* Please Select currency";
           }
        $compulsorySupliment_id=$request->id;

        try{
             
            $compulsorySupliment_Details =CompulsorySupliment::find($compulsorySupliment_id);
            //$compulsorySupliment_Details ->cs_code = $request->code;
            $compulsorySupliment_Details ->amt = $request->amount;
            $compulsorySupliment_Details ->des = $request->desc;
            $compulsorySupliment_Details ->fr_date = $request->from_date;     
            $compulsorySupliment_Details ->to_date = $request->to_date;
            $compulsorySupliment_Details ->currency_id =$request->currency;
            $compulsorySupliment_Details ->rate_type=$request->rate_type;        
            $compulsorySupliment_Details->save();
                    return 'updated';
                                
            
        
    }
          catch(\Exception $e){
                       
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            //  return "Exception Error : ";
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompulsorySupliment  $compulsorySupliment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $compulsorySupliment_ID=$request->id;
            CompulsorySupliment::find($compulsorySupliment_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }

}