<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\PrivilegeAction;
use App\PrivilegeSection;
use App\PrivilegeList;
use App\UserPrivilege;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public static function check_user($id)
        {
            $us=User::where('id',$id)->select('status')->first();

            return $us;


        }

    public static function assign_privilages()
    {
        $user=Auth::user()->id;

        $user_data = DB::table('users')
        ->join('user_privileges','users.id','=','user_privileges.user_id')
        ->join('user_types','user_privileges.user_type_id','=','user_types.id')
        ->join('privilege_lists','user_privileges.privilege_list_id','=','privilege_lists.id')
        ->join('privilege_actions','privilege_lists.privilege_action_id','=','privilege_actions.id')
        ->join('privilege_sections','privilege_lists.privilege_section_id','=','privilege_sections.id')
        ->select('users.name as uer_name','users.email','users.status','privilege_lists.status as pl_st','user_privileges.status as up_st','privilege_lists.privilege_section_id','privilege_sections.section_code')
        ->where('users.id','=',$user)
        ->where('privilege_lists.status',1)
        ->get();
      
       return $user_data;
    }   

    public function index()
    {
         try{

            $users=User::all();

            return view('users.index',compact('users'));

         }catch(\Exception $e){

              return abort(404);
         }
        
    }


    public function check_privilage($id,$s_code)
    {
            return $id;
    }

    public function load_user_privileges($id)
    {    
         try{
            $privileges = DB::table('users')
            ->join('user_privileges','users.id','=','user_privileges.user_id')
            ->join('user_types','user_privileges.user_type_id','=','user_types.id')
            ->join('privilege_lists','user_privileges.privilege_list_id','=','privilege_lists.id')
            ->join('privilege_actions','privilege_lists.privilege_action_id','=','privilege_actions.id')
            ->join('privilege_sections','privilege_lists.privilege_section_id','=','privilege_sections.id')
            ->select('user_privileges.status as up_st','privilege_lists.id','privilege_sections.section_name')
            ->get();

        return view('users.indexprivileges',compact('id','privileges'));  
              
         }catch(\Exception $e){

             return abort(404);
         }
    }

    // public function asign_user_privileges(){
        
    //     $privileges = DB::table('users')
    //     ->join('user_privileges','users.id','=','user_privileges.user_id')
    //     ->join('user_types','user_privileges.user_type_id','=','user_types.id')
    //     ->join('privilege_lists','user_privileges.privilege_list_id','=','privilege_lists.id')
    //     ->join('privilege_actions','privilege_lists.privilege_action_id','=','privilege_actions.id')
    //     ->join('privilege_sections','privilege_lists.privilege_section_id','=','privilege_sections.id')
    //     ->select('user_privileges.status as up_st','privilege_lists.id','privilege_sections.section_name')
    //     ->get();
      
    //     return view('users.indexprivileges',compact('privileges'));


    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         try{
            return view('users.index');   

         }catch(\Exception $e){

              return abort(404);
         }
       
    }
    public function add_privileges($id)
    {
           try{
            return view('users.create',compact('op_suplyment','id'));
             
           }catch(\Exception $e){
                   
                return abort(404);
           }
    
    }

    public function liveSearch(Request $request)
    {
        
        if($request->ajax()){
           $queryd=$request->get('query');
        
            
        //return json_encode($queryd);
             
             $output='';
             

             if($queryd!=''){
               
                       
                $data=User::where('name','LIKE','%'.$queryd.'%')->get();

               
                $total_row = $data->count();
               
                 
             
                    
            }else{
                $data=User::all();
                   

                $total_row=$data->count();
                

            }
            if($total_row > 0){
                
                foreach($data as $row){
                                     
                    $output.='
                    <tr>
                    <td style="text-align: center">'.$row->id.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->email.'</td> 
                    <td style="text-align: center">

                    <a href="'.route('load_user_details',$row->id).'" id=""
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                     title="Add User Privileges">
                     <i class="la la-edit"></i>
                      </a>

                      <a id="'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                      class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                      title="Delete Users">
                       <i class="la la-trash"></i>
                    </a>
                              
                </td>
            </tr>  
             ';
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
       $privilege_id=$request->id;

       try{
        
                $privilege_status =UserPrivilege::find($privilege_id);
                $privilege_status->status=$request->status;       
                $privilege_status->save();
   
                return 'updated';

           }
      catch(\Exception $e){

         return "Exception Error : ";

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
              $user_ID=$request->input('id');
              User::find($user_ID)->delete();
              
              return 'deleted';

        }catch(\Exception $e){
             
            return 'NotDeleted';
        }

          
    }
         
     public function add_user_privileges($id){

          try{

            $user_list= DB::table('users')
            ->join('user_privileges','users.id','=','user_privileges.user_id')
            ->join('user_types','user_privileges.user_type_id','=','user_types.id')
            ->join('privilege_lists','user_privileges.privilege_list_id','=','privilege_lists.id')
            ->join('privilege_actions','privilege_lists.privilege_action_id','=','privilege_actions.id')
            ->join('privilege_sections','privilege_lists.privilege_section_id','=','privilege_sections.id')
            ->select('users.name as uer_name','user_privileges.id','users.email','users.status','privilege_lists.status as pl_st','user_privileges.status as up_st','privilege_lists.description','privilege_sections.section_name')
            ->where('user_privileges.user_id','=',$id)
            ->where('user_privileges.status',1)
            ->get();
              
            return view('users.add_privileges',compact('user_list','id'));

          }catch(\Exception $e){

              return abort(404);
          }
          
     }

}
