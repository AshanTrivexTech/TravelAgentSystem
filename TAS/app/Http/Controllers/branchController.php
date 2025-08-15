<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class branchController extends Controller
{
     private $add_pv_br;
     private $edit_pv_br;
     private $del_pv_br; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_br =1;
        $this->edit_pv_br=1;
        $this->del_pv_br =1;
    }
    
    public function index()
    {
        //
        try{
             $branches=DB::table('branches')
             ->join('countries','countries.id','=','branches.country_id')
             ->join('companies','companies.id','=','branches.company_id')
             ->select('branches.*','companies.company_name','countries.country_name')
                        
              ->get();

             $add_pv  = $this->add_pv_br;
             $edit_pv = $this->edit_pv_br;
             $del_pv  = $this->del_pv_br;

              return view('branches.index', compact('branches','add_pv','edit_pv','del_pv'));
        }
        catch(\Exception $e){
            return "Exception Error : ";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $company_id=Company::all();
        $country_id=Country::all();
        return view('branches.create',compact('company_id','country_id'));
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
        //
        if($request->code  =='')
        {
            return "* Code Cannot be Null";
        } elseif($request->name=='')
        {
            return "* Name Cannot be Null";
        }
        elseif($request->company==0)
        {
            return "* Please Select Company";
        }
        elseif($request->country==0)
        {
            return "* Please Select Country";
        }
        else
        {        
        try{
             
            $code_branch=$request->code;
            $name_branch=$request->name;
 
            $branch_code=Branch::where('branch_code',$code_branch)->first();
            $branch_name=Branch::where('branch_name',$name_branch)->first();
 
            if($branch_code['branch_code']!=''){
             return "*Branch code  already exist!, Please enter unique Branch code ";
            }
            else if($branch_name['branch_name']!=''){
             return "*Branch name  already exist!, Please enter unique Branch name ";
            }
           
            else{
             try{
             
                 $branch_add =new Branch;
                 $branch_add->company_id=$request->company;
                 $branch_add->country_id=$request->country;
                 $branch_add->City_name=$request->city;
                 $branch_add->branch_code=$request->code;
                 $branch_add->branch_name=$request->name;
                 $branch_add->branch_address=$request->address;                 
                 $branch_add->contact_details=$request->contact_details;
                 $branch_add->description=$request->description;
                 $branch_add->status=$request->status;
                 $branch_add->save();
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
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    public function view_contacts(Request $request){
          
        
        if($request->ajax()){

        $id=$request->id;
        
        $contacts=Branch::where('id',$id)->select('contact_details')->get();
           
       
            return json_encode($contacts);
                
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
                           
                    $data=DB::table('branches')
                    ->join('countries','countries.id','=','branches.country_id')
                    ->join('companies','companies.id','=','branches.company_id') 
                    ->select('branches.*','companies.company_name','countries.country_name')   
                    ->where('branch_name','LIKE','%'.$queryd.'%' )
                    ->orWhere('branch_code','LIKE','%'.$queryd.'%')
                    ->orWhere('branch_address','LIKE','%'.$queryd.'%')
                    ->orWhere('country_name','LIKE','%'.$queryd.'%')
                    ->get();

                    $total_row = $data->count();

                }else{
                    $data=DB::table('branches')
                    ->join('countries','countries.id','=','branches.country_id')
                    ->join('companies','companies.id','=','branches.company_id') 
                    ->select('branches.*','companies.company_name','countries.country_name')  
                    ->get();

                    $total_row = $data->count();

                }
                if($total_row > 0){
                       foreach($data as $row){

                         $output_edit='';
                         $output_del='';

                         if($edit_pv==1){

                            $output_edit='<a href="'.route('branch_edit',$row->id).'"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                            <i class="la la-edit"></i></a>
                            </a>      
                            ';

                         }else{
                            $output_edit='';  

                         }if($del_pv==1){
                                
                            $output_del='<a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                             title="Delete details"><i class="la la-trash"></i>
                          </a>
                            '; 

                         }else{

                            $output_del='';
                            
                         }


                        $state ='';

                        if($row->status == 1){
                            $state ='<span class="m-badge m-badge--success m-badge--wide">Active</span>';
                        }
                        else{
                            $state ='<span class="m-badge m-badge--danger m-badge--wide">Inactive</span>';
                        }
                                                      
                           $output.='
                           <tr>
                           <td style="text-align: center">'.$row->id.'</td>
                           <td style="text-align: center">'.$row->branch_code.'</td>
                           <td>'.$row->branch_name.'</td>
                           <td>'.$row->branch_address.'</td>
                           <td>'.$row->company_name .'</td>
                           <td>'.$row->country_name .'</td>
                           <td>'.$row->City_name .'</td>
                           <td>'.$row->description .'</td>
                           <td style="text-align: center">'.$state.'</td>
                           <td style="text-align: center">
                                
                           <a id="" onclick="viewContacts('.$row->id.')"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" 
                            title="Contact details">
                            <i class="la  la-phone"></i>
                           </a>

                                      '.$output_edit.'
                                      '.$output_del.'
                           
                           </td>
                        </tr>     
                           ';
                       }
                       

                }
                else{
                    $output='<tr>
                    <td align="center" colspan="10">No records found</td>
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
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $branch=DB::table('branches')
        // ->join('countries','countries.id','=','branches.country_id')
        // ->join('companies','companies.id','=','branches.company_id')
        // ->select('branches.*','companies.company_name','countries.country_name' )
        // ->where('branches.id',$id)
        // ->first();
           $branch=Branch::findOrFail($id);
           $companys=Company::all();
           $countries=Country::all();
        return view('branches.edit_form',compact('branch','companys','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //





        if($request->code  =='')
        {
            return "* Code Cannot be Null";
        } elseif($request->name=='')
        {
            return "* Name Cannot be Null";
        }
        elseif($request->company==0)
        {
            return "* Please Select Company";
        }
        elseif($request->country==0)
        {
            return "* Please Select Country";
        }
        else
        {

        $branch_id=$request->id;

        try{
                    $branch_Details=Branch::find($branch_id);
                    $branch_Details->branch_address=$request->address;
                    $branch_Details->company_id=$request->company;
                    $branch_Details->country_id=$request->country;
                    $branch_Details->branch_name=$request->name;
                    $branch_Details->branch_code=$request->code;
                    $branch_Details->City_name=$request->city; 
                    $branch_Details->contact_details=$request->contact_details;
                    $branch_Details->description=$request->description;      
                    $branch_Details->status=$request->status;   
                    $branch_Details->save();
       
                    return 'updated';
        
           }
          catch(\Exception $e){
    
             return "Exception Error : ";
    
        }
    }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $branch_ID=$request->id;
            Branch::find($branch_ID)->delete();

            return 'deleted';
        }
        catch(\Exception $e){

            return 'NotDeleted';
            
        }
    }
}
