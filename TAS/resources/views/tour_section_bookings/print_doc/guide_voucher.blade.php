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
table tr th td{
    border: 0;
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
              <table width="100%" class="table table-sm">
                  <thead>
                      <tr width="200px" style="text-align: center;">
                          <th colspan="4"><h3>Guide Voucher</h3></th>
                      </tr>
                    
                  </thead>
                  <tbody>

                    <tr>
                        <th><h6>Date</h6></th>
                    <td>{{Carbon\Carbon::now()}}</td>
                    
                    
                    
                    </tr>
                    
                        <tr>
                            <th width="18%"><h6>REQUISITION NO : </h6></th>
                            <td width="25%">{{$voucherHead[0]->guide_voucher_no}}</td>
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
                                <th><h6>GUIDE NAME : </h6></th>
                                <td><b>{{strtoupper($voucherData[0]->sup_s_name)}}</b></td>
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
                               
                                <th width="50%">Date</th>
                                <th width="50%">Guide Fee</th> 
                        </tr>
                    </thead>
                @php
                    $total=0;
                @endphp
                <tbody style="text-align: center;">
                        @foreach($voucherData as $guide_details)
                    <tr>
                    
                    <td>{{$guide_details->tour_date}}</td>
                    <td>Rs.{{number_format($guide_details->guide_fee,2)}}</td>
                       <input type="hidden" {{$total+=$guide_details->guide_fee}}>
                        
                    </tr>
                   @endforeach
                </tbody>
            </table>
            <table width="100%" class="table table-sm ">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                          <tr>
                                
                                <th width="50%"></th>
                                <th width="50%"></th>
                          </tr>
                             <tr>
                                 <td></td>
                                 <td style="text-align: center;">____________</td>
                             </tr>
                            <tr>
                                    <td style="text-align: center;">Total Guide Fee</td>
                                    <td style="text-align: center;">Rs.{{number_format($total,2)}}</td>
                            </tr>
                            <tr>
                                    <td ></td>
                                    <td style="text-align: center;">____________</td>
                                </tr>
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
              
            
                <table width="100%" class="table  m-table--head-bg-secondary">
                        <thead>                    
                            <tr>
                            <td style="padding:10px; size:7px;">
                            <p><strong>Rate :&nbsp;&nbsp;</strong>{{$voucherHead[0]->rates}}</p>
                            </td>    
                            </tr>
                        </thead>    
                </table> 
                
          </div>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <br>
                   
                    
                    <table width="100%" class="table  m-table--head-bg-secondary">
                            <thead>                    
                                <tr>
                                <td style="padding:10px; size:7px;">
                                <p><strong>Remarks :&nbsp;&nbsp;</strong>{{$voucherHead[0]->remarks}}</p>
                                </td>    
                                </tr>
                            </thead>    
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
                <table width="100%" class="table table-sm">
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