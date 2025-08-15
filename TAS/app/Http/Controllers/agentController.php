<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Market;
use App\AgentContact;
use DB;
use Illuminate\Http\Request;


class agentController extends Controller
{
     private $add_pv_ag;
     private $edit_pv_ag;
     private $del_pv_ag;    

    public function __construct()
    {
        $this->middleware('auth');
        $this->add_pv_ag =1;
        $this->edit_pv_ag=1;
        $this->del_pv_ag =1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
           try{

            $markets = DB::table('agents')
            ->join('markets', 'agents.market_id', '=', 'markets.id')       
            ->select('agents.*', 'markets.market_name')
            ->get();
              
                 $add_pv = $this->add_pv_ag;
                 $edit_pv = $this->edit_pv_ag;
                 $del_pv  = $this->del_pv_ag;  
    
            return view('agents.index',compact('markets','add_pv','edit_pv','del_pv'));
           }catch(\Exception $e){
                 
                return abort(404);
           }

        


    }

    public function view_contacts(Request $request){
        
        $email_A; $email_B; $email_C; $tel; $fax;
        if($request->ajax()){

        $id=$request->id;
        
        $contacts=AgentContact::where('agent_id',$id)->select('type','contact')->get();
        
        foreach($contacts as $contact){
            
            if($contact->type=='Email_A'){
                 
                $email_A=$contact->contact;
                 
            }elseif($contact->type=='Tel'){
            
                 $tel=$contact->contact;

            }elseif($contact->type=='Email_B'){
                $email_B=$contact->contact;

            }elseif($contact->type=='Email_C'){
                $email_C=$contact->contact;

            }elseif($contact->type=='Fax'){
                $fax=$contact->contact;
            }    
        }

        $data=array(
            'email_A'=>$email_A,
            'email_B'=>$email_B,
            'email_C'=>$email_C,
            'tel'=>$tel,
            'fax'=>$fax
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
            $markets=Market::all();

            return view('agents.create',compact('markets'));
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

     
    function my_email($email)
    {
      
       return filter_var($email, FILTER_VALIDATE_EMAIL);

    }
    public function store(Request $request)
    {
        //
          

            if($request->email_1=='')
            {
                return "* Reservation Emai Compulsory";
            }
             elseif( $request->email_1 !='' && $this->my_email($request->email_1)==''){
                     return "* Invalid Email Address : Reservation ";

            }elseif( $request->email_2!='' && $this->my_email($request->email_2)==''){

                    return "* Invalid Email Address : 2";
           
           }elseif( $request->email_3!='' && $this->my_email($request->email_3)==''){
                     return "* Invalid Email Address : 3";

           }
          
           else{

           

        try
        {
            if($request->code==''){
           
                return "* Code cannot be null";

            }
            elseif($request->name==''){
       
                 return "*Agent  Name cannot be null";

       }
       else{

            DB::beginTransaction();

        $agent=new Agent;
        $agent->market_id=$request->market_id;
        $agent->ag_code=$request->code;
        $agent->ag_name=$request->name;
        $agent->address=$request->address;
        $agent->remarks=$request->remarks;
        $agent->save();

        
        $ageentID=DB::table('agents')->orderBy('id', 'DESC')->first();
        $agentContacts = array(
            array('agent_id'=> $ageentID->id, 'type'=>'Email_A','contact'=>$request->email_1),
            array('agent_id'=> $ageentID->id, 'type'=>'Email_B','contact'=>$request->email_2),
            array('agent_id'=> $ageentID->id, 'type'=>'Email_C','contact'=>$request->email_3),
            array('agent_id'=> $ageentID->id, 'type'=>'Fax','contact'=>$request->fax),
            array('agent_id'=> $ageentID->id, 'type'=>'Tel','contact'=>$request->tele),
           
         );

         AgentContact::insert($agentContacts);

        
        

         DB::commit();

         return 'added';
         }
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            $error_des =$e->getMessage();

              $data=array(
                  'Error_code'=>"505",
                  'Exp_dtl'=>$error_des
              );
             return ($data);
            // return "* Some field cannot be empty!, Please check before save".$e; 
        }
    }

    }

    public function selectIndexbyMarket(Request $request){

        if($request->ajax()){            
            $MkrtID = $request->id;
            $Agent_List = Agent::where('market_id',$MkrtID)->select('id','ag_name')->get();            
    		return json_encode($Agent_List);
           
    	}        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
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
               
                       
                $data=DB::table('agents')
                ->join('markets','agents.market_id','=','markets.id')       
                ->select('agents.*','markets.market_name')   
                ->where('ag_name','LIKE','%'.$queryd.'%')
                ->orWhere('ag_code','LIKE','%'.$queryd.'%')
                ->get();

                $total_row=$data->count();
                 
              
                    
            }else{
                $data=DB::table('agents')
                ->join('markets','markets.id','=','agents.market_id')
                ->select('agents.*','markets.market_name')   
                ->get();

                $total_row=$data->count();

            }
           
            
            if($total_row > 0){
                   foreach($data as $row){

                        $output_edit='';
                        $output_del='';
                        
                        if($edit_pv==1){
                             if($row->id!=1){
                                 
                                $output_edit='<a href="'.route('agent_edit',$row->id).'"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                <i class="la la-edit"></i></a>
                                </a>
                                ';
                             }

                        }else{
                            $output_edit='';  
                              

                        }
                        if($del_pv==1){
                              if($row->id!=1){
                                      
                                $output_del='<a id= "'.$row->id.'" onclick="deleteAccept('.$row->id.')"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                             title="Delete details"><i class="la la-trash"></i>
                          </a>
                            ';  
                              }

                        }else{
                               
                            $output_del='';
                        }
                       
                       $output.='<tr>
                       <td style="text-align: center">'.$row->id.'</td>
                       <td style="text-align: center">'.$row->ag_code.'</td>
                       <td>'.$row->ag_name.'</td>
                       <td>'.$row->market_name.'</td>
                       <td>'.$row->address.'</td>
                       <td>'.$row->remarks.'</td>
                       <td style="text-align: center">

                       <a id=""   onclick="viewEmail('.$row->id.')"
                       class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" 
                       title="Email">
                        <i class="la  la-envelope"></i>
                       </a>

                       <a id="" onclick="viewTel('.$row->id.')"
                       class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" 
                       title="Telephone">
                       <i class="la  la-tty"></i>
                       </a>

                      <a id="" onclick="viewFax('.$row->id.')"
                           class="m-portlet__nav-link btn m-btn m-btn--hover-metal m-btn--icon m-btn--icon-only m-btn--pill" 
                           title="Fax">
                           <i class="la  la-fax"></i>
                        </a>

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
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $markets=Market::all();
            $agent=Agent::find($id);
            $email_a=AgentContact::where('type','Email_A')->where('agent_id',$id)->first();
            $email_b=AgentContact::where('type','Email_B')->where('agent_id',$id)->first();
            $email_c=AgentContact::where('type','Email_C')->where('agent_id',$id)->first();
            $agent_fax=AgentContact::where('type','Fax')->where('agent_id',$id)->first();
            $agent_tel=AgentContact::where('type','Tel')->where('agent_id',$id)->first();
    
            return view('agents.edit_form',compact('agent','markets','email_a','email_b','email_c','agent_fax','agent_tel'));
        }catch(\Exception $e){

            return abort(404);
            
        }
          

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if($request->email_1=='')
        {
            return "* Reservation Emai Compulsory";
        }
         elseif( $request->email_1 !='' && $this->my_email($request->email_1)==''){
                 return "* Invalid Email Address : Reservation ";

        }elseif( $request->email_2!='' && $this->my_email($request->email_2)==''){

                return "* Invalid Email Address : 2";
       
       }elseif( $request->email_3!='' && $this->my_email($request->email_3)==''){
                 return "* Invalid Email Address : 3";

       }
      
       else{


           try
            {
            if($request->code==''){
           
                return "* Code cannot be null";

            }
          elseif($request->name==''){
       
                 return "*Agent  Name cannot be null";

              }
          else{

            DB::beginTransaction();
        $agent=Agent::find($request->id);
        $agent->market_id=$request->market_id;
        $agent->ag_code=$request->code;
        $agent->ag_name=$request->name;
        $agent->address=$request->address;
        $agent->remarks=$request->remarks;
        $agent->save();
        $agentID=$request->id;

        AgentContact::where('agent_id', $agentID)->where('type','Email_A')
        ->update(['contact'=>$request->email_1]);
        AgentContact::where('agent_id', $agentID)->where(['type'=>'Email_B'])
        ->update(['contact'=>$request->email_2]);
        AgentContact::where('agent_id', $agentID)->where(['type'=>'Email_C'])
        ->update(['contact'=>$request->email_3]);
        AgentContact::where('agent_id', $agentID)->where(['type'=>'Fax'])
        ->update(['contact'=>$request->fax]);
        AgentContact::where('agent_id', $agentID)->where(['type'=>'Tel'])
        ->update(['contact'=>$request->tel]);


        DB::commit();
        return 'updated';
             }


      }
        catch(\Exception $e)
        {

            DB::rollBack();
            $error_des =$e->getMessage();

              $data=array(
                  'Error_code'=>"505",
                  'Exp_dtl'=>$error_des
              );
             return ($data);
            // return 'Error Something went Wrong';
        }

    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        Agent::find($request->id)->delete();

        return 'deleted';
    }
}
