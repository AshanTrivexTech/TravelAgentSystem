<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Messages;
class sendMessageController extends Controller
{
    //

    public function session_user(Request $request){

            if($request ->ajax()){

            
                Session::put('un',Auth::user()->name);


              

            }


    }


    public function store(Request $request)
    {
       if($request->ajax()){

                
         

                $mes_dt = new Messages;
                $mes_dt->send_to = Auth::user()->name;
                $mes_dt->send_by =Auth::user()->name;
                $mes_dt->msg = $request->mes;
                $mes_dt->status = 0;
                $mes_dt->save();
                return json_encode('success');


            



       }


    }



    public function chat_live(Request $request)
    {

        $mes='';


            if($request->ajax()){

                $usr_nme=Auth::user()->name;

                // $data=Messages::all();
               $data=messages::orderBy('id','ASC')->take(100)->get();
//                return json_encode($data);

//                return json_encode($data);
              if($data != '' ){

                  foreach ($data as $item) {

                      if($item->send_by == $usr_nme)
                      {
                          $mes.='
                   
                <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--out">
               
                    <div class="m-messenger__message-body">
                        <div class="m-messenger__message-arrow"></div>
                        <div class="m-messenger__message-content">
                            <div class="m-messenger__message-text">
                            '.$item->msg.' 
                            </div>
                        </div>
                    </div>
                </div>
            </div>


               
               ';

                      }
                      else{
                          $mes.='

                <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--in">
                     <div class="m-messenger__message-no-pic m--bg-fill-danger">
                        '.strtoupper(str_limit($item->send_by,1)).'
                    </div>
                    <div class="m-messenger__message-body">
                        <div class="m-messenger__message-arrow"></div>
                        <div class="m-messenger__message-content">
                            <div class="m-messenger__message-username">
                            '.$item->send_by.'
                            </div>
                            <div class="m-messenger__message-text">
                            '.$item->msg.'
                            </div>
                        </div>
                    </div>
                </div>
            </div>

               
               ';

                      }


                  }


        $mes_data=array(

            'mes_dt'=>$mes
        );





                  return json_encode($mes_data);



              }




            }

    }
}
