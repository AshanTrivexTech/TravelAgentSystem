<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TourQuotationHeader;
use App\Announcement;
use Illuminate\Support\Facades\DB;
use \Carbon;

class dashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         try{
            $dt=Carbon\Carbon::now();     

            $annoucements =DB::table('announcements')
                ->join('users','announcements.user_id','=','users.id')
                ->select('announcements.*','users.name')
                ->where('frm_date','<=',$dt)
                ->where('to_date','>=',$dt)
                ->orderby('announcements.priority','ASC')
                ->get();
              
          return view('dashboard.index',compact('annoucements'));

          
         }catch(\Exception $e){
              
                 return abort(404);
         }
        
    
    }

    public function load_dashbord_data(Request $req){
        
        if($req->ajax()){

          //  $tot_new_quote = TourQuotationHeader::where('confirmed',0)->where('status',1)


            return json_encode('hellow');
        };

    }

    public function gmd_dashboard(){
           
           try{
            return view('general_mdata_dashboard');

           }catch(\Exception $e){

               return abort(404);
           }
         
    }

    public function opmd_dashboard(){

         try{
            return view('operation_mdata_dashboard');

         }catch(\Exception $e){

             return abort(404);
         }
   }

   public function op_dashboard(){

       try{
            return view('operation_dashboard');

       }catch(\Exception $e){

           return abort(404);
       }
          
    
}

    
}
