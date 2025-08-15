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
    .wrapper>div{
        background: #fff;
    }
    .wrapper{
        display:grid;
        grid-template-columns: 15% 80%;
        border:solid #ddd;
    }
    /* .wrapper>div:nth-child(odd){
        background: #fff;
    } */
    
    </style>

<div  id="m_subhead" class="m-subheader ">
        <div class="wrapper">
              <div style="width:110px; height:1000px; background-color:#3A2314;  ">
                         
              </div>
              <div>
                    <table width="100%" class="table table-sm table-bordered" >
                        <thead>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                
                                <td style="vertical-align:top; text-align:left;"> --}}
                                    <br><br>
                                      <div class="row">
                                            &nbsp;&nbsp;
                                              <div width="200px" class="col-md-3">
                                                      <img width="200px" src="{{URL::asset('assets/app/media/img/logos/logo1.png')}}">
                                              </div>
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              <div style="text-align: left;" class="col-md-8">
                                                  <h1 class="m-subheader__title">
                                                      {{$companyName}}
                                                  </h1>
                                      
                                                      <h6>{{$address}}</h6>
                                                      <h6>{{$telephone}}</h6>
                                                      <h6>{{$web_mail}}</h6>
                                              </div>
                                                 
                                          </div>
                                          <div class="col-md-12"><hr></div>
                                          <br>

                                          
                          </tbody>
                    </table>
                    <table width="100%" class="table table-sm" >
                            <thead>
                                 <div class="row">
                                        <div class="col-md-4">
                                                <h5>{{Carbon\Carbon::today()}}</h5>
                                           <h3 style="background-color:#3A2314; vertical-align:top; height:50px; width:200px; text-align:center; color:#fff; font-size:45px;  ">INVOICE</h3>
                                         </div>
                                         <div class="col-md-8" style="padding-left:200px;">
                                                      <h5 style="text-align:left;">Core Developers Information Pvt(Ltd)</h5>
                                                      <h5 style="padding-left:230px;">No 425/11A,</h5>
                                                      <h5 style="padding-left:210px;">Havelock Rd,</h5>
                                                      <h5 style="padding-left:210px;">Colombo 06.</h5>
                                            </div>
                                 </div>
                                  
                                 
                                    
                                    
                            </thead>
                        
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
                                             
                                       </th>
                                       
                                   </tr>
                                                 
                            </tbody>
                        </table>
                        <div class="row">
                                <div class="col-md-8">
                                         
                                </div>
                                <div class="col-md-4" style="padding-left:70px;">
                                         <h5>Subtotal :&nbsp;&nbsp;&nbsp;$2545.00</h5>
                                         <h5>Tax 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $2545.00</h5>
                                         <h5>Tax 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $2545.00</h5>
                                         <h5 style="background-color:#3A2314; color:#fff; text-align:center; height:30px; width:175px;  "><b> $2545.00</b></h5>
                                         <h5>Paid :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 00.00</h5>
                                         <h5><b>Due Sum :&nbsp;&nbsp;&nbsp; $2545.00</b></h5>
                                </div> 
                            </div>
                            <br>
                            <div class="row">
                                <h5><b>Terms</b></h5><br>
                                
                                
                            </div>
                            <div class="row">
                                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia </h5>
                            </div>
                            <br><br>
                            <div class="row">
                                <h5><b>Payments</b></h5><br>
                                
                                
                            </div>
                            <div class="row">
                                    <h5>Account Number :&nbsp;&nbsp;07737463</h5>
                            </div>
                    
            </div>
        </div>

    </div>
    
    
    
@endsection @section('Page_Scripts') @parent

@endsection