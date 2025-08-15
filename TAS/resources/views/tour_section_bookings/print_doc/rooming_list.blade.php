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
        <div class="col-md-12"><hr style="border-width: 3px"></div>
                    
    </div>



    <div class="row">
            <div style="text-align: center;" class="col-md-12">
              <table width="100%" class="table table-sm table-bordered">
                  <thead>
                      <tr width="200px" style="text-align: center;">
                        <th colspan="4"><h5>ROOMING LIST DATED 07/08/18 GO HOLIDAYS GROUP 200818</h5></th>
                      </tr>
                    
                  </thead>
                  <tbody>

                    <tr>
                        <th><h6>Date</h6></th>
                    <td>{{Carbon\Carbon::now()}}</td>
                    
                    
                    
                    </tr>
                    
                        <tr>
                            <th><h6>NAME OF HOTEL =</h6></th>
                            <td></td>
                        </tr>
                        <tr>
                              <th><h6>ROOM TYPE  =</h6></th>
                              <td></td>
                              
                        </tr>
                        <tr>
                              <th><h6>ARRIVAL DATE =</h6></th>
                              <td></td>
                              
                        </tr>
                        <tr>
                                <th><h6>DEPATURE DATE =</h6></th>
                                <td></td>
                                
                          </tr>
                          <tr>
                                <th><h6>NO OF NIGHTS  =</h6></th>
                                <td></td>
                                
                          </tr>
                          <tr>
                                <th><h6>MEAL PLAN  =</h6></th>
                                <td></td>
                                
                          </tr>
                    </tbody>
              </table>
              <div class="col-md-12"><hr style="border-width: 3px" ></div>
           </div>
           
      </div>
      <br>
      <br>
      <div class="row">
            <div class="col-md-12">
                
                <table width="100%" class="table table-sm table-bordered">
                   
                <tbody>
                        
                            <tr>
                                <th><h6><u><b>SINGLE ROOMS</b></u></h6></th>
                                <td></td>
                                <th><h6><u><b>REMARKS</b></u></h6></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h6>1.Mr Jason Newall</h6></th>
                                <td></td>
                                <th><h6><b>Client is Checking-out on 27/08/18(Monday)</b></h6></th>
                                <td></td>
                                  
                            </tr>
                            <tr>
                                 <th><h6><u><b>DOUBLE ROOMS</b></u></h6></th>
                                  <th><h6></h6></th>
                                  <td></td>
                                  
                            </tr>
                            <tr>
                                <th><h6>1.Mr Paul Smith<br>2.Mrs Karen Smith<br>3.Dr Calvyn Howells<br>4.Ms Christa Eerde</h6></th>
                                <td></td>
                                <th><h6><b>Client is Checking-out on 27/08/18(Monday)</b></h6></th>
                                <td></td>
                                   
                            </tr>
                            <tr>
                                    <th><h6><u><b>SINGLE ROOMS</b></u></h6></th>
                                    <td></td>
                                    
                            </tr>
                            <tr>
                                    <th><h6><u>SINGLE ROOMS</u></h6></th>
                                    <td></td>
                                    
                            </tr>
                   
                </tbody>
            </table>
            </div>
      </div>
      <br>
      <br>
      <br>
      <div class="row">
            <div class="col-lg-12">
                <br>
               
                
                <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                    <thead>
                                <tr class="table-secondary">    
                                         <th style="text-align: center;" colspan="2">SUMMARY</th>
                                         
                                 </tr>
                                 <tr class="table-success" style="text-align: center;">
                                        <th style="text-align: center;" width="80%" ><b>ROOMS</b></th>
                                        
                                        <th  style="text-align: center;" width="20%" ><b>NO OF PAX</b></th>
              
                                        </tr> 
                    </thead>
                </table>
                <table class="table table-bordered table-sm" width="100%">
                      <tbody>
                          {{-- <tr class="table-success" style="text-align: center;">
                          <th style="text-align: center;" width="80%" ><b>ROOMS</b></th>
                          
                          <th  style="text-align: center;" width="20%" ><b>NO OF PAX</b></th>

                          </tr> --}}
                             <tr>           
                                  <td width="20%" style="text-align: center;">1</td>
                                  <td width="60%" style="text-align: center;">SINGLES</td>
                                  <td width="20%" style="text-align: center;">1</td>   
                                   
                                            
                          </tr>                                                                                             
                </tbody>                                                   
            </table>
                  
                
          </div>
        </div>
    <br>
    <br>
    <br>
    <br>
            
        <div class="col-md-12">
            <p><h6>**PLEASE REFER OUR AMENDED VOUCHER SENT ON:- 07/08/18</h6></p>
        </div>
        <div class="col-md-12">
                <p><h6>OTG TOUR LEADER-MR.AKTHAR MOHOMMAD-Mobile No=0776087460</h6></p>
            </div>
    </div>
</div>

@endsection @section('Page_Scripts') @parent

@endsection