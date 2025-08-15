<?php

namespace App\Http\Controllers;

use App\miscType;
use Illuminate\Http\Request;

class miscellaneousTypeController extends Controller
{
      private $add_pv_mt;
      private $del_pv_mt;

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_mt=1;
        $this->del_pv_mt=1;
    }
    
    public function index()
    {
        //
        $miscellaneousTypes=miscType::all();

               $add_pv=$this->add_pv_mt;
               $del_pv=$this->del_pv_mt;

        return view('miscellanies.mstype_index',compact('miscellaneousTypes','add_pv','del_pv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('miscellanies.mstype');
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
        if($request->type=='')
        {
            return "* Miscellaneous type Cannot be empty";
        } 
        else
        {        
        try{
             
            $type_msc=$request->type;
            
 
            $msc_type=miscType::where('type',$type_msc)->first();
            
 
            if($msc_type['type']!=''){
             return "*Miscellaneous type  already exist!, Please enter unique type ";
            }
            
            else{
             try{
             
                 $miscType_add =new miscType;
                 $miscType_add->type=$request->type;
                 $miscType_add->save();
                 return 'added';
                 
             }
             catch(\Exception $tr){
                 return "* Some field cannot be empty!, Please check before save"; 
             }
            }
        }
        catch(\Exception $e){

            return "Exception Error : ";

       }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\miscType  $miscType
     * @return \Illuminate\Http\Response
     */
    public function show(miscType $miscType)
    {
        //
    }

    public function livesearch(request $request){
        if($request->ajax()){

            $queryd=$request->get('query');
            $del_pv=$request->get('del_pv');
            
            $output='';
            $output_del='';
        

            if($queryd!=''){
               
                       
                $data=miscType::where('type','LIKE','%'.$queryd.'%')->get();

                $total_row = $data->count();
                 
              
                    
            }else{


                $data=miscType::all();
                
                
                $total_row=$data->count();

            }
           
         
            if($total_row > 0){
                   foreach($data as $row){

                    $output_del='';
                     
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

                    
                                                  
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td style="text-align: center">'.$row->type.'</td>
                       <td style="text-align: center">

                           '.$output_del.'

                       </td>
                    </tr>';
                   }
                   

            }
            else{
                $output='<tr>
                <td align="center" colspan="3">No records found</td>
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
     * @param  \App\miscType  $miscType
     * @return \Illuminate\Http\Response
     */
    public function edit(miscType $miscType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\miscType  $miscType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, miscType $miscType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\miscType  $miscType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $Miscellaneoustype_ID=$request->input('id');
            miscType::find($Miscellaneoustype_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
}
