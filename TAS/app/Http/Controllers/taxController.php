<?php

namespace App\Http\Controllers;

use App\Tax;
use Illuminate\Http\Request;

class taxController extends Controller
{
     private $add_pv_tx;
     private $edit_pv_tx;
     private $del_pv_tx; 

     public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_tx =1;
        $this->edit_pv_tx=1;
        $this->del_pv_tx =1;
    }

    public function index()
    {
        try{

            $taxes=Tax::all();
         
             $add_pv  = $this->add_pv_tx;
             $edit_pv = $this->edit_pv_tx;
             $del_pv  = $this->del_pv_tx;

        return view('Tax.index',compact('taxes','add_pv','edit_pv','del_pv'));

        }catch(\Exception $e){
            
            return abort(404);

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
                
                $data=Tax::where('tax_name','LIKE','%'.$queryd.'%')->get();
                
                              $total_row=$data->count();
                                   
            }else{  
                    $data=Tax::all();
                    

                    $total_row=$data->count();

                }
                
             

            if($total_row >0){
                 foreach($data as $row){

                    $output_edit='';
                    $output_del='';

                    if($row->status==1)
                    {
                        $state='<span class="m-badge m-badge--success m-badge--wide">Active</span>';

                    }
                    else
                    {
                        $state='<span class="m-badge m-badge--danger m-badge--wide">In Active</span>';
                    }
                       if($edit_pv==1){
                           
                        $output_edit='
                                     <a href="'.route('tax_edit',$row->id).'"
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
                                      </a>';

                       }else{

                        $output_del='';

                       } 

                    $output.='
                    
                    <tr style="text-align: center"> 
                    <td>'.$row->id.'</td>
                    <td>'.$row->tax_name.'</td>
                    <td>'.$row->rate.'</td>
                    <td>'.$row->tax_order.'</td>
                    <td>'.$state.'</td>
                   <td class="m-datatable__cell--right" >
                      
                             '.$output_edit.'
                             '.$output_del.'
                      
                  </td>
                  </tr>
                 ';
                 }
                   
            }else{
                     $output='<tr>
                     <td align="center" colspan="6">No records found</td>
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

            return view('Tax.create');

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
         $name_tax =$request->input('tax_name');
         
         $tax_name=Tax::where('tax_name',$name_tax)->first();
         
         if($tax_name['tax_name'] !='') {

            return "*Tax name already exist!, Please enter unique currency type ";
        }

        elseif($request->tax_name==''){

            return "Tax Name Cannot be Empty";
              
       }elseif($request->rate==''){
                
        return "Tax Rate Cannot be Empty";
        }
      else{
              try{
                  
                  $tax =new Tax;
                  $tax->tax_name=$request->tax_name;
                  $tax->rate=$request->rate;
                  $tax->status=$request->status;
                  $tax->tax_order=$request->tax_order;
                  $tax->save();

                  return 'added';

              }catch(\Exception $e){
                 
                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                        );
                return ($data);
                // return "* Some field cannot be empty!, Please check before save"; 
              }


      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{
            $tax_edit=Tax::find($id);

            return view('Tax.edit_form',compact('tax_edit'));

         }catch(\Exception $e){
             
             return abort(404);

         }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->tax_name==''){

            return "Tax Name Cannot be Empty";
              
       }elseif($request->rate==''){
                
        return "Tax Rate Cannot be Empty";
        }
      else{        
                   $tax_id=$request->id;
              try{
                  $tax =Tax::find($tax_id);
                  $tax->tax_name=$request->tax_name;
                  $tax->rate=$request->rate;
                  $tax->status = $request->status;
                  $tax->tax_order=$request->tax_order;
                  $tax->save();

                  return 'updated';

              }catch(\Exception $e){

                $error_des =$e->getMessage();

                $data=array(
                'Error_code'=>"505",
                'Exp_dtl'=>$error_des
                          );
                return ($data);
                 
                // return "* Some field cannot be empty!, Please check before save"; 
              }


      }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $tax=$request->input('id');
            Tax::find($tax)->delete();

            return 'deleted';

        }catch(\Exception $e){

              return 'NotDeleted';
        }
        
    }
}
