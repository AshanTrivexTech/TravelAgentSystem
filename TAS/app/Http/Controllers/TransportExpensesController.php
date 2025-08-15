<?php

namespace App\Http\Controllers;

use App\TransportExpenses;
use Illuminate\Http\Request;

class TransportExpensesController extends Controller
{
     private $add_pv_te;
     private $edit_pv_te;
     private $del_pv_te;

     public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_te =1;
        $this->edit_pv_te=1;
        $this->del_pv_te =1;
    }

    public function index()
    {
             
           try{

            $transExp_cat=TransportExpenses::all();
            $add_pv  = $this->add_pv_te;
            $edit_pv = $this->edit_pv_te;
            $del_pv  = $this->del_pv_te;
    
            return view('transport_expenses.index',compact('transExp_cat','add_pv','edit_pv','del_pv'));

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
              
            return view('transport_expenses.create');

         }catch(\Exception $e){

               return abort(404);
         }
        
    }
    public function find_expences(Request $request)
    {
        try{
        if($request->ajax())
        {
            $id=$request->expencesTypeID;
            $data=TransportExpenses::where('id',$id)
                ->select('id','category','amount')
                ->first();
            
             
                return json_encode($data);


        }
    }
    catch(\Exception $e)
    {
        return json_encode("Error");
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
             


            $category_transportExp=$request->input('category');
            
 
            $transportExp_category=TransportExpenses::where('category',$category_transportExp)->first();
            
 
            if($transportExp_category['category']!=''){
             return "*Category  already exist!, Please enter unique Category ";
            }
            
            else{
             try{
                 
                if($request->category==''){

                    return "* Category cannot be empty!, Please check before save"; 
                }elseif($request->amount==''){

                    return "*Amount Cannot be empty";
                }
                else{
             
                  $transport_exp =new TransportExpenses;
                  $transport_exp->category=$request->category;
                  $transport_exp->amount=$request->amount;
                  $transport_exp->save();
                  return 'added';
                }   
                 
             }
             catch(\Exception $tr){

                // $error_des =$tr->getMessage();

                // $data=array(
                // 'Error_code'=>"505",
                // 'Exp_dtl'=>$error_des
                //           );
                // return ($data); 
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
            // return "Exception Error : ";

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransportExpenses  $transportExpenses
     * @return \Illuminate\Http\Response
     */
    public function show(TransportExpenses $transportExpenses)
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
               
                 
                $data=$transportExp=TransportExpenses::where('category','LIKE','%'.$queryd.'%')->get();

                $total_row = $data->count();
                 
              
                    
            }else{
                
                $data=$transportExp=TransportExpenses::all(); 

                $total_row=$data->count();

            }
           
            
            if($total_row > 0){
                   foreach($data as $row){
                         
                    $output_edit='';
                    $output_del='';

                    if($edit_pv==1){

                        $output_edit='
                                      <a href="'.route('transportExpenses_edit',$row->id).'"
                                      class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                      <i class="la la-edit"></i></a>
                                      </a>';

                    }else{

                        $output_edit='';

                    }if($del_pv==1){

                        $output_del='
                                      <a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                      class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                      title="Delete details"><i class="la la-trash"></i>
                                      </a>';

                    }else{
                            
                        $output_del='';
                    }
                                                  
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td style="text-align: center">'.$row->category.'</td>
                       <td style="text-align: right">'.$row->amount.'</td>
                       <td style="text-align: center">

                             '.$output_edit.'
                             '.$output_del.'

                       

                       </td>
                    </tr>';
                   }
                   

            }
            else{
                $output='<tr>
                <td align="center" colspan="4">No records found</td>
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
     * @param  \App\TransportExpenses  $transportExpenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
         try{
              
            $transExp_data=TransportExpenses::findOrFail($id);
            return view('transport_expenses.edit_form',compact('transExp_data'));

         }catch(\Exception $e){

               return abort(404);
         }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransportExpenses  $transportExpenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
                 
            if($request->category==''){

            return "* Category cannot be empty!, Please check before save"; 
           }elseif($request->amount==''){

            return "*Amount Cannot be empty";
           }

            try{
                   $id=$request->id;
         
                $transport_exp =TransportExpenses::find($id);
                $transport_exp->category=$request->category;
                $transport_exp->amount=$request->amount;
                $transport_exp->save();
                return 'updated';
            }   
             
         
         catch(\Exception $tr){

            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            // return "Exception Error : "; 
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransportExpenses  $transportExpenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $tec_id=$request->id;
            TransportExpenses::find($tec_id)->delete();
        
           return 'deleted';
          }
          catch(\Exception $e){
            return "Exception Error : "; 
         }
    }
}
