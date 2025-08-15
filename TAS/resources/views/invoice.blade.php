@extends('layouts.print_doc') 
@section('content')

<style>
    #m_subhead {
  /* width: 150px; */
  min-width: 1000px;
  max-width: 1000px;
  white-space: nowrap; 
  overflow: hidden;
  /* border:solid #ddd; */
}
.block>h3{
    display:inline-block;
}
</style>

<div id="m_subhead" class="m-subheader ">
    <div class="row" >
              <table width="100%" class="table table-sm table-bordered" style="border:solid #ddd;">
                  <thead>
                  </thead>
                  <tbody>
                      <tr>
                          <td style="width:100px; height:1000px; background-color:#3A2314;  ">
                                
                          </td>
                          <td style="vertical-align:top; text-align:left;">
                                <div class="row">
                                        <div width="200px" class="col-md-3">
                                                <img width="200px" src="{{URL::asset('assets/app/media/img/logos/logo1.png')}}">
                                        </div>
                                        <div style="text-align: left;" class="col-md-8">
                                            <h1 class="m-subheader__title">
                                                {{$companyName}}
                                            </h1>
                                
                                                <h6>{{$address}}</h6>
                                                <h6>{{$telephone}}</h6>
                                                <h6>{{$web_mail}}</h6>
                                        </div>
                                           
                                    </div>
                                    <br>
                                    
                                <table width="100%" class="table table-sm" >
                                    <thead>
                                         <div class="row">
                                                <div class="col-md-4">
                                                        <h5>{{Carbon\Carbon::now()}}</h5>
                                                   <h3 style="background-color:#3A2314; vertical-align:top; height:50px; width:200px; text-align:center; color:#fff; font-size:45px;">INVOICE</h3>
                                                 </div>
                                                 <div class="col-md-8" style="padding-left:250px;">
                                                              <p style="text-align:left;">Core Developers Information Pvt(Ltd)</p>
                                                              <p tyle="margin-left:50px;">No 425/11A,</p>
                                                              <p>Havelock Rd,</p>
                                                              <p>Colombo 06.</p>
                                                    </div>
                                         </div>
                                          
                                         
                                            
                                            
                                    </thead>
                                <br>
                                    <tbody>
                                           <tr>
                                               <th>
                                                    <div class="row">
                                                            <tr class="bg-secondary" style="text-align: center;">
                                           
                                                                    <th width="20%" style="text-align: center; ">ITEM</th>
                                                                    <th width="20%" style="text-align: center; ">QUANTITY</th> 
                                                                    <th width="20%" style="text-align: center; ">PRICE</th> 
                                                                    <th width="20%" style="text-align: center; ">TAX</th> 
                                                                    <th width="20%" style="text-align: center; ">TOTAL</th> 
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                    <td>1</td>
                                                                    <td>1</td>
                                                                    <td>1</td>
                                                                    <td>1</td>
                                                                    <td>1</td>
                                                                    
                                                                </tr> 
                                                      </div>
                                               </th>
                                               <th>
                                                    <div class="row">
                                                            <div class="col-md-8">
                                                                     
                                                            </div>
                                                            <div class="col-md-4">
                                                                     <p>Subtotal:$2545.00</p>
                                                                     <p>Subtotal:&nbsp;&nbsp;&nbsp; $2545.00</p>
                                                                     <p>Subtotal:&nbsp;&nbsp;&nbsp; $2545.00</p>
                                                                     
                                                            </div> 
                                                        </div> 
                                               </th>
                                               
                                           </tr>
                                                         
                                    </tbody>
                                </table>
                                   
                                
                          </td>
                      </tr>
                      
                    </tbody>
              </table>
              
      </div>
</div>    
             
      
      
                    
                                       

@endsection @section('Page_Scripts') @parent

@endsection