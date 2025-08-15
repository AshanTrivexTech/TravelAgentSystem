<?php

namespace App\Http\Controllers;

use App\miscCategory;
use App\Currency;
use App\MiscRateCategory;
use DB;
use Illuminate\Http\Request;

class miscellaneousCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         try{
            $miscellaneousCategories=DB::table('misc_categories')
                                    ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                                    ->select('misc_categories.*','misc_rate_categories.rate_ctgry')
                                    ->orderBy('misc_categories.id','ASC')
                                    ->get();

            return view('miscellanies.mscat_index',compact('miscellaneousCategories'));

         }catch(\Exception $e){

            return abort(404);
         }
        
    }

    public function liveSearch(Request $request)
    {

        if($request->ajax()){

            $queryd=$request->get('query');
            
            //  return json_encode($queryd);
            
            $output='';


            if($queryd!=''){
               
        $data=DB::table('misc_categories')
                ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                ->select('misc_categories.*','misc_rate_categories.rate_ctgry')
                ->where('category','LIKE','%'.$queryd.'%')
                ->get();    
                
                $total_row = $data->count();
               
                 
             
                    
            }else{

        $data=DB::table('misc_categories')
                ->join('misc_rate_categories','misc_rate_categories.id','=','misc_categories.misc_rate_categorie_id')
                ->select('misc_categories.*','misc_rate_categories.rate_ctgry')
                ->orderBy('misc_categories.id','ASC')
                ->get();
                   
                $total_row=$data->count();
                

            }


               
            if($total_row > 0){
                

                foreach($data as $row){

                    $state='';

                    if($row->misc_rate_categorie_id == 1){
                        $state ='<span class="m-badge m-badge--brand m-badge--wide">Both</span>';
                    }elseif($row->misc_rate_categorie_id == 2){
                        $state ='<span class="m-badge m-badge--success m-badge--wide">Adults Only</span>';
                    }elseif($row->misc_rate_categorie_id == 3){
                        $state ='<span class="m-badge m-badge--warning m-badge--wide">Childs Only</span>';
                    }
                                       
                    $output.='
                    <tr style="text-align: center">
                    <td>'.$row->id.'</td>
                    <td>'.$row->category.'</td>
                    <td>'.$row->mc_pax.'</td>
                    <td>'.$row->Rate.'</td>
                    <td>'.$state.'</td>
                        <td>
                            <a href="'.route('miscellaneousCategory_edit',$row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i></a>
                            <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                    title="Edit View">
                                     <i class="la la-trash"></i>
                                </a>
                        </td>
                    </tr> 
             ';
                }
                

         }
         else{
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

            $currencys=Currency::all();
            $misRatectgrys=MiscRateCategory::all();
            return view('miscellanies.mscat',compact('currencys','misRatectgrys'));

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
        if($request->mcat_name=='')
        {
            return "* Miscellaneous category name Cannot be empty";
        } 
        elseif($request->mcat_pax=='')
        {
            return "* Miscellaneous category PAX Cannot be empty";
        }
        elseif($request->rate_ctgry==0)
        {
            return "* Please Select Rate Category";
        }
        elseif($request->mcat_rate=='')
        {
            return "* Miscellaneous category Rate Cannot be empty";
        }
        else if($request->crncy_rt == 0)
        {
            return "*  Please Select Currency Type";
        }
        else
        {        
        try{
             
            $name_mscCategory=$request->mcat_name;
            
 
            $mscCategory_name=miscCategory::where('category',$name_mscCategory)->first();
            
 
            if($mscCategory_name['category']!=''){
             return "*Miscellaneous Category  already exist!, Please enter unique category ";
            }
            
            else{
             try{
             
                 $misCategory_add =new miscCategory;
                 $misCategory_add->category=$request->mcat_name;
                 $misCategory_add->mc_pax=$request->mcat_pax;
                 $misCategory_add->Rate=$request->mcat_rate;
                 $misCategory_add->misc_rate_categorie_id=$request->rate_ctgry;
                 $misCategory_add->currencie_id=$request->crncy_rt;
                
                 $misCategory_add->save();
                 return 'added';
                 
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\miscCategory  $miscCategory
     * @return \Illuminate\Http\Response
     */
    public function show(miscCategory $miscCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\miscCategory  $miscCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{

            $misCategory_edit=miscCategory::findOrFail($id);
            return view('miscellanies.mscatedit_form',compact('misCategory_edit'));

         }catch(\Exception $e){
                
            return abort(404);
         }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\miscCategory  $miscCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->mcat_name==''){
            return "* Micelleneous Category name cannot be empty ";
           }
          else if($request->mcat_pax==''){
            return "*Micelleneous Category Pax cannot be empty ";
           }else if($request->mcat_rate==''){
               return "*Rate Cannot be empty ";
           }

           
                  $misCategory_id=$request->id;

            try{
             
                $misCategory_Details=miscCategory::find($misCategory_id);
                $misCategory_Details->category=$request->mcat_name;
                $misCategory_Details->mc_pax=$request->mcat_pax;      
                $misCategory_Details->Rate=$request->mcat_rate;     
                $misCategory_Details->save();

                     return 'updated';
     
                }
           catch(\Exception $e){
                       
            $error_des =$e->getMessage();

            $data=array(
            'Error_code'=>"505",
            'Exp_dtl'=>$error_des
                      );
            return ($data);
            //   return "Exception Error : ";
     
           }
           
        
           
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\miscCategory  $miscCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $MiscellaneousCategory_ID=$request->input('id');
            miscCategory::find($MiscellaneousCategory_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
}
