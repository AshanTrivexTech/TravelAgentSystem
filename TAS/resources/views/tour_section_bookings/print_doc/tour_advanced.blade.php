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
                          <th colspan="4"><h3>Tour Advanced Request Form</h3></th>
                      </tr>
                      
                  </thead>
                  @php

                    //  $carbon='';
                    //   $carbon=Carbon\Carbon::today();

                      $all_pax=(($tour_data_dt_advance[0]->pax_adult)+($tour_data_dt_advance[0]->pax_child));
                 
                        $year = Carbon\Carbon::now();
                  @endphp
                  <tbody>
                      <tr>
                          <th width="18%"><h6>Date: </h6></th>
                          <td width="40%">{{$year}}</td>
                          
                      </tr>
                      <tr>
                            <th><h6>Requisition No :</h6></th>
                            <td>{{$tour_data_dt_advance[0]->misc_voucher_no}}</td>
                            
                      </tr>
                      <tr>
                            <th><h6>Pax Adults:</h6></th>
                            <td>{{$tour_data_dt_advance[0]->pax_adult}}</td>
                            <th><h6>Pax Child:</h6></th>
                            <td>{{$tour_data_dt_advance[0]->pax_child}}</td>
                            
                      </tr>
                    
                      <tr>
                            <th><h6>Tour No : </h6></th>
                      <td>{{$tour_data_dt_advance[0]->tour_code}}</td>
                      <th><h6>Requested For : </h6></th>
                      <td>{{$tour_data_dt_advance[0]->Requested_For}}</td>
                            
                      </tr>
                      <tr>
                            <th><h6>Required Date : </h6></th>
                            <td>{{$tour_data_dt_advance[0]->Required_Date}}</td>
                            <th><h6>Tour Start Date : </h6></th>
                            <td>{{$tour_data_dt_advance[0]->frm_date}}</td>
                            
                      </tr>
                      <tr>

                        <th><h6>Settlement Date : </h6></th>
                        <td>{{$tour_data_dt_advance[0]->Settlement_Date}}</td>
                        <th><h6>Tour End Date : </h6></th>
                        <td>{{$tour_data_dt_advance[0]->to_date}}</td>
                                
                      </tr> 
                      <tr>

                            <th><h6>Guid Details : </h6></th>
                            <td>{{$tour_data_dt_advance[0]->sup_s_name}}</td>
                            <th><h6>Code : </h6></th>
                            <td>{{$tour_data_dt_advance[0]->code}}</td>
                                    
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
                                <th width="25%" style="text-align: left;">Description</th>
                                <th width="10%" style="text-align: right;">Amount</th>
                                
                                
                        </tr>
                    </thead>
                @php
                    $tot=0;
                @endphp
                <tbody >

                    @foreach($dt_mis_tbl_advance as $tbl_advance)
                    @php
                         $tot+=$tbl_advance->Rate;
                    @endphp
                    <tr>
                    <td style="text-align: leftt;">{{$tbl_advance->category}}</td>   
                     <td style="text-align: right;">{{number_format($tbl_advance->Rate)}}</td>
                                         
                    </tr>
                    @endforeach
                   <tr>
                       <td colspan="2">&nbsp;</td>
                   </tr>
                    <tr>
                      
                       
                      
                        <td colspan="1" style="text-align: right;"><b>Total</b></td>
                        <td colspan="1" style="text-align: right;">{{ number_format($tot)}}</td>
                     
                    </tr>
                 
                </tbody>
            </table>
            </div>
      </div>
      <br>
      <br>
      <br>
      <div class="row">
            <div class="col-md-12">
                <br>
               
                
                <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                        <thead>                    
                            <tr>
                            <td style="padding:10px; size:7px;">
                            <p><strong>Remarks :</strong>{{$tour_data_dt_advance[0]->remarks}}</p>
                            </td>    
                            </tr>
                        </thead>    
                </table> 
                
          </div>
        </div>
            <br>
            <br>
            <br>
            <div class="row">
                    
                    <div class="col-md-4">
                            <table width="100%" class="table table-sm table-bordered">
                                <thead>
                                    <tr class="" style="text-align: center;">
                                            <th width="15%">
                                                <tr>
                                                    <th><h6>_________________ </h6></th>
                                                    <td></td>
                                                        
                                                </tr>
                                                <tr>
                                                    <th><h6 style="text-align: center;">Authorized By</h6></th>
                                                    <td></td>
                                                            
                                                </tr>
                                            </th>
                                    </tr>
                                </thead>
                        </table>
                </div>
                <div class="col-md-4">
                        <table width="100%" class="table table-sm table-bordered">
                            <thead>
                                <tr class="" style="text-align: center;">
                                        <th width="15%">
                                            <tr>
                                                <th><h6>_________________ </h6></th>
                                                <td></td>
                                                    
                                            </tr>
                                            <tr>
                                                <th><h6 style="text-align: center;">Authorized User</h6></th>
                                                <td></td>
                                                        
                                            </tr>
                                        </th>
                                </tr>
                            </thead>
                    </table>
            </div>
            <div class="col-md-4">
                    <table width="100%" class="table table-sm table-bordered">
                        <thead>
                            <tr class="" style="text-align: center;">
                                    <th width="15%">
                                        <tr>
                                            <th><h6>_________________ </h6></th>
                                            <td></td>
                                                
                                        </tr>
                                        <tr>
                                            <th><h6 style="text-align: center;">Authorized Date</h6></th>
                                            <td></td>
                                                    
                                        </tr>
                                    </th>
                            </tr>
                        </thead>
                </table>
        </div>
                         
            
            </div>
            <br>
            <br>
            <div class="row">
                    
                    <div class="col-md-4">
                            
                </div>
                <div class="col-md-4">
                        <table width="100%" class="table table-sm table-bordered">
                            <thead>
                                <tr class="" style="text-align: center;">
                                        <th width="15%">
                                            <tr>
                                                <th><h6>_________________ </h6></th>
                                                <td></td>
                                                    
                                            </tr>
                                            <tr>
                                                <th><h6 style="text-align: center;">Received By</h6></th>
                                                <td></td>
                                                        
                                            </tr>
                                        </th>
                                </tr>
                            </thead>
                    </table>
            </div>
            <div class="col-md-4">
                    <table width="100%" class="table table-sm table-bordered">
                        <thead>
                            <tr class="" style="text-align: center;">
                                    <th width="15%">
                                        <tr>
                                            <th><h6>_________________ </h6></th>
                                            <td></td>
                                                
                                        </tr>
                                        <tr>
                                            <th><h6 style="text-align: center;">Received Date</h6></th>
                                            <td></td>
                                                    
                                        </tr>
                                    </th>
                            </tr>
                        </thead>
                </table>
        </div>
                         
            
            </div>
    </div>


@endsection @section('Page_Scripts') @parent

@endsection