@extends('layouts.print_doc') 
@section('content')

<style>
    #m_subhead {
  /* width: 150px; */
  min-width: 1000px;
  max-width: 1000px;
  white-space: nowrap; 
  overflow: hidden;
}
</style>


<div id="m_subhead" class="m-subheader ">
    <br>
    <br>
    <div class="row">
        <div width="200px" class="col-md-3">
                <img width="200px" src="{{URL::asset('assets/app/media/img/logos/logo1.png')}}">
        </div>
        <div style="text-align: left;" class="col-md-8">
            <h1 class="m-subheader__title">
                {{$companyName}}
            </h1>

                <h5>{{$address}}</h5>
                <h5>{{$telephone}}</h5>
                <h5>{{$web_mail}}</h5>  
        </div>
        <div class="col-md-12"><hr></div>
                    
    </div>
    <div class="row">
            <div style="text-align: center;" class="col-md-12">
              <table width="100%" class="table table-sm table-bordered">
                  <thead>
                      <tr width="200px" style="text-align: center;">
                          <th colspan="4"><h3>HOTEL RESERVATION VOUCHER @if($voucherHead[0]->amnd > 0)- AMENDMENT {{$voucherHead[0]->amnd}} @endif</h3></th>
                      </tr>
                      {{-- <tr>
                          <td colspan="4" rowspan="2"></td>
                      </tr> --}}
                  </thead>
                  <tbody>
                      <tr>
                          <th width="18%"><h6>HOTEL NAME : </h6></th>
                          <td width="40%">{{$voucherHead[0]->sup_s_name}}</td>
                          <th width="18%"><h6>REQUISITION NO : </h6></th>
                          <td width="25%">{{$voucherHead[0]->hotel_voucher_no}}@if($voucherHead[0]->amnd > 0)/{{$voucherHead[0]->amnd}} @endif</td>
                      </tr>
                      <tr>
                            <th><h6>CONFIRMED BY : </h6></th>
                            <td>{{$voucherHead[0]->confirmed_by_name}}</td>
                            <th><h6>TOUR REF NO : </h6></th>
                            <td>{{$voucherHead[0]->tour_code}}</td>
                      </tr>
                      <tr>
                            <th><h6>CONFIRMED TO : </h6></th>
                            <td>{{$voucherHead[0]->user_name}}</td>
                            <th><h6>CONFIRMED DATE : </h6></th>
                            <td>{{$voucherHead[0]->confirmed_date}}</td>
                      </tr>
                      <tr>
                            <th><h6>CLIENT NAME : </h6></th>
                            <td>{{$voucherHead[0]->client_name}}</td>
                            <th><h6>NO OF PAX : </h6></th>
                            <td>{{$voucherHead[0]->pax}}</td>
                      </tr> 
                  </tbody>
              </table>
           </div>
      </div>
      <br>
      <br>
      <div class="row">
            <div class="col-md-12">
                
                <table width="100%" class="table table-sm table-bordered">
                    <thead>
                        <tr class="bg-secondary" style="text-align: center;">
                                <th width="12%">Air Date</th>
                                <th width="12%">Dep Date</th>
                                <th>Wing</th>
                                <th width="5%">Basis</th>
                                <th width="5%">SGL</th>
                                <th width="5%">DBL</th>
                                <th width="5%">TWIN</th>
                                <th width="5%">TPL</th>
                                <th width="5%">QD</th>
                                <th width="5%">Guide</th>
                                <th width="12%">No of Night</th>
                        </tr>
                    </thead>
                
                <tbody style="text-align: center;">
                    @php
                        $tourDay_lst =0;
                        $dep_date = '';
                        $air_date = '';
                        $table_out='';

                            $tourDay = 0;
                            $sgl_qty = 0;
                            $dbl_qty = 0;
                            $twn_qty = 0;
                            $tbl_qty = 0;
                            $qd_qty = 0;
                            $pkgid =0;
                            $no_of_nights=1;

                            $room_type = '';
                            $mealPlane ='';

                           // $lastRow = count((array)$voucherData);
                            $nowRow =0;

                            $rowCount = $voucherData->count();
                            //echo $rowCount ;
                    @endphp 
                    
                    {{-- @foreach ($voucherData as $item) --}}
                        
                    @php

                    foreach ($voucherData as $item) {
                        
                        $nowRow++;

                        //$air_date = $item->tour_date;
                        
                        //echo $tourDay_lst;
                        
                        if($tourDay_lst==0){     
                            $no_of_nights=1;
                            $tourDay_lst = $item->tour_day; 
                            $pkgid = $item->pkgid;
                            $air_date = $item->tour_date;
                            $dep_date = date('Y-m-d', strtotime($air_date. ' + '.(1).' days'));
                            $room_type =  $item->r_type;
                            $mealPlane = $item->meal_plane;

                            $tourDay = $item->tour_day;

                            $sgl_qty = $item->sgl_qty;
                            $dbl_qty = $item->dbl_qty;
                            $twn_qty = $item->twn_qty;
                            $tbl_qty = $item->tbl_qty;
                            $qd_qty = $item->qd_qty;  

                             $table_out='<tr>
                                        <td>'.$air_date.'</td>   
                                        <td>'.$dep_date.'</td>
                                        <td style="text-align: left;">'.$room_type.'</td>
                                        <td>'.$mealPlane.'</td>
                                        <td>'.$sgl_qty.'</td>
                                        <td>'.$dbl_qty.'</td>
                                        <td>'.$twn_qty.'</td>
                                        <td>'.$tbl_qty.'</td>
                                        <td>'.$qd_qty.'</td>
                                        <td>0</td>                                        
                                        <td>'.$no_of_nights.'</td>  

                                        </tr>';

                        }else
                        {

                            //echo $item->tour_date;;
                            
                            //$checklastday = 0;

                            //  if($nowRow==1){
                            //     $checklastday = ($tourDay_lst);
                            //  }else
                            //  {
                            //     $checklastday = $tourDay_lst+1;
                            //  }
                            //echo $table_out; 
                           
                                $nextrow = 0;

                            // echo ($tourDay_lst+1).'  = '.$item->tour_day.', ';
                            
                            if(($tourDay_lst+1) == ($item->tour_day)){
                                
                                    
                                if($pkgid != $item->pkgid){
                                    $nextrow++;
                                }
                                if ($sgl_qty != $item->sgl_qty) {
                                    $nextrow++;
                                }
                                if($dbl_qty != $item->dbl_qty){
                                    $nextrow++;
                                }
                                if($twn_qty != $item->twn_qty){
                                    $nextrow++;
                                }
                                if($tbl_qty != $item->tbl_qty){
                                    $nextrow++;
                                }
                                if($qd_qty != $item->qd_qty){
                                    $nextrow++;
                                }
                                  

                                   // echo 'nxtrow'.$nextrow.' - '; 
                                  
                                if($nextrow == 0){  
                                   // echo ' new :'.$checklastday.'  = '.$item->tour_day.', ';
                                    $no_of_nights++;                                 
                                    
                                    $dep_date = date('Y-m-d', strtotime($item->tour_date. ' + '.(1).' days'));                                   
                                    
                                    $tourDay_lst = $item->tour_day;     

                                     $table_out='<tr>
                                        <td>'.$air_date.'</td>   
                                        <td>'.$dep_date.'</td>
                                        <td style="text-align: left;">'.$room_type.'</td>
                                        <td>'.$mealPlane.'</td>
                                        <td>'.$sgl_qty.'</td>
                                        <td>'.$dbl_qty.'</td>
                                        <td>'.$twn_qty.'</td>
                                        <td>'.$tbl_qty.'</td>
                                        <td>'.$qd_qty.'</td>
                                        <td>0</td>
                                        <td>'.$no_of_nights.'</td>  

                                        </tr>';
                                    
                                }else{
                                    
                                        echo $table_out; 
                                        
                                        $no_of_nights=1;

                                        $tourDay_lst = $item->tour_day;  
                                        $pkgid = $item->pkgid;
                                        $air_date = $item->tour_date;
                                        $dep_date = date('Y-m-d', strtotime($air_date. ' + '.(1).' days'));
                                        $room_type =  $item->r_type;
                                        $mealPlane = $item->meal_plane;

                                        $tourDay = $item->tour_day;

                                        $sgl_qty = $item->sgl_qty;
                                        $dbl_qty = $item->dbl_qty;
                                        $twn_qty = $item->twn_qty;
                                        $tbl_qty = $item->tbl_qty;
                                        $qd_qty = $item->qd_qty;
                                    
                                        $table_out='<tr>
                                        <td>'.$air_date.'</td>   
                                        <td>'.$dep_date.'</td>
                                        <td style="text-align: left;">'.$room_type.'</td>
                                        <td>'.$mealPlane.'</td>
                                        <td>'.$sgl_qty.'</td>
                                        <td>'.$dbl_qty.'</td>
                                        <td>'.$twn_qty.'</td>
                                        <td>'.$tbl_qty.'</td>
                                        <td>'.$qd_qty.'</td>
                                        <td>0</td>
                                        <td>'.$no_of_nights.'</td>  

                                        </tr>';
                                        
                                    //  if($lastRow== $nowRow){
                                       
                                    //  }

                                } 
                                

                            }else{
                            
                            echo $table_out;
                            
                            $no_of_nights=1;
                            $tourDay_lst = $item->tour_day; 
                            $pkgid = $item->pkgid;
                            $air_date = $item->tour_date;
                            $dep_date = date('Y-m-d', strtotime($air_date. ' + '.(1).' days'));
                            $room_type =  $item->r_type;
                            $mealPlane = $item->meal_plane;

                            $tourDay = $item->tour_day;

                            $sgl_qty = $item->sgl_qty;
                            $dbl_qty = $item->dbl_qty;
                            $twn_qty = $item->twn_qty;
                            $tbl_qty = $item->tbl_qty;
                            $qd_qty = $item->qd_qty;
                                  
                            
                            $table_out='<tr>
                            <td>'.$air_date.'</td>   
                            <td>'.$dep_date.'</td>
                            <td style="text-align: left;">'.$room_type.'</td>
                            <td>'.$mealPlane.'</td>
                            <td>'.$sgl_qty.'</td>
                            <td>'.$dbl_qty.'</td>
                            <td>'.$twn_qty.'</td>
                            <td>'.$tbl_qty.'</td>
                            <td>'.$qd_qty.'</td>
                            <td>0</td>
                            <td>'.$no_of_nights.'</td>  
                            </tr>';

                             //echo $table_out;

                            
                            }

                               
                            
                                                                   
                        
                        


                        // if($tourDay == ($tourDay_lst+1)){
                        //     $dep_date='';
                        //     $air_date ='';   
                        // }else{
                        //     $dep_date = date('Y-m-d', strtotime($air_date. ' + '.(1).' days'));
                        // }
                        
                      
                        }
                        
                       // $tourDay_lst=$item->tour_day;     
                    }
                    
                    echo $table_out;
                    
                    @endphp
                    
                    {{-- @endforeach --}}

                        {{-- <tr>
                            <td>12-APR-2018</td>   
                            <td>12-APR-2018</td>
                            <td style="text-align: left;">Delux</td>
                            <td>BB</td>
                            <td>1</td>
                            <td>3</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>2</td>   

                        </tr> --}}
                    

                </tbody>
            </table>
            </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <br>
            <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                <thead>                    
                    <tr>
                        <td style="padding:10px; size:7px;">
                            <strong>Rates :</strong>
                            <p>{{$voucherHead[0]->rates}}</p>
                        </td>    
                    </tr>

                </thead>    
            </table>
            <br>
            <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                    <thead>                    
                        <tr>
                            <td style="padding:10px; size:7px;">
                                <strong>Remarks :</strong><p>{{$voucherHead[0]->remarks}}</p>
                            </td>    
                        </tr>
                        
                    </thead>    
            </table> 
            <hr>            
      </div>
    </div>
    <div class="row">
        <div class="col-md-8">
                <table width="100%" class="table table-bordered">
                        <thead>                    
                            <tr>
                                <th style="padding-left:20px;" width="95%">
                                    All Extras to be collected direct from Group/Clien.
                                </th>
                                <th width="5%">
                                        <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                <input disabled type="checkbox"  @if($voucherHead[0]->condi == 1) checked @endif >&nbsp;
                                                <span></span>
                                        </label>
                                </th>
                            </tr>
                             <tr>
                                <th style="padding-left:20px;" width="95%">
                                    All Bill Including Extras.
                                </th>
                                <th width="5%">
                                        <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                <input disabled type="checkbox" @if($voucherHead[0]->condi == 2) checked @endif >&nbsp;
                                                <span></span>
                                        </label>
                                </th>
                            </tr>
                             <tr>
                                <th style="padding-left:20px;" width="95%">
                                    All Payment/s from direct by Group or Clien.
                                </th>
                                <th width="5%">
                                        <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                                <input disabled type="checkbox" @if($voucherHead[0]->condi == 3) checked @endif >&nbsp;
                                                <span></span>
                                        </label>
                                </th>
                            </tr>
                            
                        </thead>    
                </table>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p><h5>Note: The Invoice should be raised under the name of " Company name here "</h5></p>
        </div>
    </div>
</div>
{{-- <div class="m-content">
       
</div> --}}
@endsection @section('Page_Scripts') @parent
{{-- <script>

window.print();</script> --}}
@endsection