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
                          <th colspan="4"><h3>Miscellaneous Requisition Order</h3></th>
                      </tr>
                    
                  </thead>
                  <tbody>
                      <tr>
                      <th width="18%"><h6>Requested By : </h6></th>
                          <td width="40%">{{$tour_data_dt[0]->name}}</td>
                        <th><h6>Date</h6></th>
                        <td>{{Carbon\Carbon::now()}}</td>
                      </tr>
                      <tr>
                            <th><h6>TOUR NO :</h6></th>
                            <td>{{$tour_data_dt[0]->tour_code}}</td>
                            <th><h6>Tour Start Date</h6></th>
                            <td>{{$tour_data_dt[0]->frm_date}}</td>
                      </tr>
                      <tr>
                            <th><h6>Tour Name :</h6></th>
                            <td>{{$tour_data_dt[0]->title}}</td>
                            <th><h6>Tour End Date</h6></th>
                             <td>{{$tour_data_dt[0]->to_date}}</td>
                            
                      </tr>
                      <tr>
                            <th><h6>Requisition No : </h6></th>
                            <td>{{$tour_data_dt[0]->misc_voucher_no}}</td>
                            <th><h6>Tour Ref</h6></th>
                            <td>ANT/08/18/UK-18/52/1</td>
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
                               
                                <th width="15%">Description</th>
                                <th width="20%">Qty</th>
                                <th width="15%">Rates</th>
                                <th width="15%" colspan="2">Pax</th>
                               
                                
                                
                        </tr>
                    </thead>
                
                <tbody style="text-align: center;">
                        @foreach($dt_mis_tbl as $dt)
                    <tr>
                    
                    <td>{{$dt->category}}</td>
                    <td>{{$dt->qty}}</td>
                    <td>{{$dt->rate_lkr}}</td>
                    <td colspan="2">{{$dt->pax}}</td>
                     
                                          
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
      </div>
      <br>
      <br>
      <br>
      <div class="row">
            <div style="text-align: center;" class="col-md-12">
                    <table width="100%" class="table table-sm table-bordered">
                        
                        </thead>
                        <tbody>
                            <tr>
                                <th><h6>Requirement Date: </h6></th>
                                <td>{{$tour_data_dt[0]->confirmed_date}}</td>
                                
                            </tr>
                            <tr>
                                    <th><h6></h6></th>
                                    <td></td>
                                    
                            </tr>
                            <tr>
                                  <th><h6>Operator Name :</h6></th>
                                  <td>{{$tour_data_dt[0]->confirmed_by_name}}</td>
                                  
                            </tr>
                            <tr>
                                    <th><h6></h6></th>
                                    <td></td>
                                    
                            </tr>
                            <tr>
                                  <th><h6>Supplier Name :</h6></th>
                            <td>{{$tour_data_dt[0]->sup_name}}</td>
                                  
                                  
                            </tr>
                            <tr>
                                    <th><h6></h6></th>
                                    <td></td>
                                    
                            </tr>
                            <tr>
                                  <th><h6>Contact Person : </h6></th>
                                  <td>GHC/ANJANA/18/874/1</td>
                                  
                            </tr>
                            <tr>
                                    <th><h6></h6></th>
                                    <td></td>
                                    
                            </tr>
                            <tr>
                                    <th><h6>Address : </h6></th>
                                    <td>GHC/ANJANA/18/874/1</td>
                                    
                              </tr>
                              <tr>
                                    <th><h6></h6></th>
                                    <td></td>
                                    
                            </tr> 
                              <tr>
                                    <th><h6>Req. Customer : </h6></th>
                                    <td>GHC/ANJANA/18/874/1</td>
                                    
                              </tr>
                              <tr>
                                    <th><h6></h6></th>
                                    <td></td>
                                    
                            </tr> 
                              <tr>
                                    <th><h6>Remarks : </h6></th>
                                    <td>{{$tour_data_dt[0]->remarks}}</td>
                                    
                              </tr>
                              <tr>
                                    <th><h6></h6></th>
                                    <td></td>
                                    
                            </tr> 
                              <tr>
                                    <th><h6>Tour Remarks : </h6></th>
                              <td>{{$tour_data_dt[0]->tour_remarks}}</td>
                                    
                              </tr>  
                        </tbody>
                    </table>
                 
                 </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
            <div class="row">
                    <div class="col-md-3">
                            <table width="100%" class="table table-sm ">
                                <thead>
                                    <tr class="" style="text-align: center;">
                                            <th width="15%">
                                                <tr>
                                                        <th><h6>_______________ </h6></th>
                                                    <td></td>
                                                        
                                                </tr>
                                                <tr>
                                                    <th><h6>Approved By<br>Director/Manager</h6></th>
                                                    <td></td>
                                                            
                                                </tr>
                                            </th>
                                    </tr>
                                </thead>
                        </table>
                </div>
                <div class="col-md-3">
                        <table width="100%" class="table table-sm ">
                            <thead>
                                <tr class="" style="text-align: center;">
                                        <th width="15%">
                                            <tr>
                                                   <th><h6>_______________ </h6></th>
                                                   <td></td>
                                                    
                                            </tr>
                                            <tr>
                                                    <th>
                                                     <h6>Authorised By<br>Finance Manager/Accountant</h6>
                                                    </th>
                                                    <td></td>
                                                        
                                            </tr>
                                        </th>
                                </tr>
                            </thead>
                    </table>
            </div>
            <div class="col-md-3">
                    <table width="100%" class="table table-sm ">
                        <thead>
                            <tr class="" style="text-align: center;">
                                    <th width="15%">
                                        <tr>
                                            <th><h6>_______________ </h6></th>
                                            <td></td>
                                                
                                        </tr>
                                        <tr>
                                                <th><h6>Received By<br>Operational Head</h6></th>
                                                <td></td>
                                                    
                                        </tr>
                                    </th>
                            </tr>
                        </thead>
                </table>
        </div>
        <div class="col-md-3">
                <table width="100%" class="table table-sm ">
                    <thead>
                        <tr class="" style="text-align: center;">
                                <th width="15%">
                                    <tr>
                                            <th><h6>_______________ </h6></th>
                                        <td></td>
                                            
                                    </tr>
                                    <tr>
                                        <th><h6 style="text-align: center;">Cashier</h6></th>
                                        <td></td>
                                                
                                    </tr>
                                </th>
                        </tr>
                    </thead>
            </table>
    </div>
                         
            </div>
            
        {{-- <div class="col-md-12">
            <p><h5>Note: The Invoice should be raised under the name of " Company name here "</h5></p>
        </div> --}}
    </div>
</div>

@endsection @section('Page_Scripts') @parent

@endsection