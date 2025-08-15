@extends('layouts.print_format')
@section('content')
{{-- @include('layouts._layout_header') --}}

    <div class="m-content">
    <div class="m-portlet">
        <div class="m-portlet__head" style="text-align:center">
            <div class="m-portlet__head-caption" style="text-align:center">
                    <div class="m-portlet__head-title" style="text-align:center">
                            <span class="m-portlet__head-icon m--hide">                          
                            </span>
                             {{-- <tr>--}}
                            <div>
                            {{-- <td align="right"> <img src="{{URL::asset('assets/Antiquity Sri Lanka.png')}}" height="120px" width="120px"/></td> --}}
                            {{-- <td align="center">
                            <h4 style="text-align: center; line-height:0.3cm" >Antiquity - (The New Brand Of Raffles Pvt Ltd) </h3>
                            <p style="text-align: center; line-height: 0.02cm">No 144B, 1/1 Vijaya Kumaretunga Mawatha ,Colombo 05, Srilanka</p>
                            <p style="text-align: center; line-height: 0.02cm">Telephone : +94(0) 123456789 +94(0)123456782</p>
                            <p style="text-align: center; line-height: 0.02cm">Fax: +947123456789</p>
                            <p style="text-align: center; line-height: 0.02cm">info@gmail.com</p>
                            <p style="text-align: center; line-height: 0.02cm">www.google.com</p>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </div>                              
                            </tr>  --}}
                        </div>
            </div>
        </div>
        <!--begin::Form-->
        {{ csrf_field() }}  
            <div class="m-portlet__body">
                    <div style="overflow-x:auto;">
                            <tr>          
                            {{-- <td align="right"> <img src="{{URL::asset('assets/Antiquity Sri Lanka.png')}}" height="120px" width="120px"/></td> --}}
                            <td align="center">
                            <h4 style="text-align:center; line-height:0.3cm" >Antiquity - (The New Brand Of Raffles Pvt Ltd) </h4>
                            <p style="text-align: center; line-height: 0.02cm">No 144B, 1/1 Vijaya Kumaratunga Mawatha ,Colombo 05, Srilanka</p>
                            <p style="text-align: center; line-height: 0.02cm">Telephone : +94(0) 123456789 +94(0)123456782</p>
                            <p style="text-align: center; line-height: 0.02cm">Fax: +947123456789</p>
                            <p style="text-align: center; line-height: 0.02cm">info@gmail.com</p>
                            <p style="text-align: center; line-height: 0.02cm">www.google.com</p>
                            </td>                                 
                            </tr>
                            <table width="100%" style="min-width:1000px" class="table table-bordered sm">
                                <thead> 
                                    <tr style="text-align: center;">
                                        <th class="table-success" colspan="3" style="text-align: left;"><Strong>HOTEL RESERVATION</Strong></th>
                                    </tr>
                                        
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                    <th width="20%" class="table-secondary" style="text-align: right;">HOTEL NAME :</th>
                                    <td width="30%"></td>
                                    <th width="30%" class="table-secondary" style="text-align: right;">DATE :</th>
                                    <td width="20%" style="text-align: center;"></td>
                                    </tr>

                                    <tr>
                                            <th width="20%" class="table-secondary" style="text-align: right;">CONFIRMED BY :</th>
                                            <td width="30%"></td>
                                            <th width="30%" class="table-secondary" style="text-align: right;">REQUISITION NUMBER :</th>
                                            <td width="20%" style="text-align: center;"></td>
                                    </tr>

                                    <tr>
                                            <th width="20%" class="table-secondary" style="text-align: right;">CONFIRMED TO :</th>
                                            <td width="30%"></td>
                                            <th width="30%" class="table-secondary" style="text-align: right;">TOUR REF.NUMBER :</th>
                                            <td width="20%" style="text-align: center;"></td>
                                    </tr>

                                    <tr>
                                            <th width="20%" class="table-secondary" style="text-align: right;">CONFIRMED DATE :</th>
                                            <td width="30%"></td>
                                            <th width="30%" class="table-secondary" style="text-align: right;">CLIENT :</th>
                                            <td width="20%" style="text-align: center;"></td>
                                    </tr>

                                    <tr>
                                            <th width="20%" class="table-secondary" style="text-align: right;"></th>
                                            <td width="30%"></td>
                                            <th width="30%" class="table-secondary" style="text-align: right;">MKT :</th>
                                            <td width="20%" style="text-align: center;"></td>
                                    </tr>
                                    <tr>
                                            <td style="vertical-align: top; text-align: left;" colspan="4">
                                                    <table width="100%">
                                                            <thead class="table-primary" colspan="8">
                                                                <tr style="text-align: center;" >
                                                                    <th width="10%">Arrival Date</th>
                                                                    <th width="10%">Depature Date</th>
                                                                    <th width="5%">No of Night/s</th>
                                                                    <th width="10%">Room Type</th>
                                                                    <th width="10%">Single Room/s</th>
                                                                    <th width="10%">Double Room/s</th>
                                                                    <th width="10%">Twin Room/s</th>
                                                                    <th width="10%">Triple Room/s</th>
                                                                    <th width="5%">Quadruple Room/s</th>
                                                                    <th width="5%">Client/s Meal Plan</th>
                                                                    <th width="10%">Guide Room</th>
                                                                    <th width="5%">Guide Meal Plan</th>
                                                                </tr>
                                                                
                                                            </thead>
                                                        <tbody>
                                                            <tr style="text-align: center;" >
                                                             <td>22/08/18</td>
                                                             <td>24/08/18</td>
                                                             <td>02</td>
                                                             <td>SLP-R</td>
                                                             <td>-</td>
                                                             <td>-</td>
                                                             <td>15</td>
                                                             <td>-</td>
                                                             <td>-</td>
                                                             <td>BB</td>
                                                             <td>01</td>
                                                             <td>HB</td>
                                                             </tr>
                                                             <tr style="text-align: center;" >
                                                             <td>22/08/18</td>
                                                             <td>24/08/18</td>
                                                             <td>02</td>
                                                             <td>SLP-R</td>
                                                             <td>-</td>
                                                             <td>-</td>
                                                             <td>15</td>
                                                             <td>-</td>
                                                             <td>-</td>
                                                             <td>BB</td>
                                                             <td>01</td>
                                                             <td>HB</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </td>
                                
                                    </tr>
                                    <tr>
                                    <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REMARKS:</th>
                    
                                    </tr>
                                    <tr>
                                    <th colspan="4" class="border border-dark">RATE:</th>
                        
                                    </tr>
                                    <tr>                  
                                         <td style="vertical-align: top; text-align: left;" colspan="4">
                    
                                            <table width="100%">
                                                <thead class="table-secondary">
                                                    <tr style="text-align: center;" >
                                                            <ul class="m-menu__subnav">
                                                                    <li class="m-menu__item " aria-haspopup="true">
                                                                       <label class="form-control-label font-weight-bold">
                                                                       All Extra to be collected direct from Group/Client
                                                                       </label>
                                                                       <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                       <label class="m-checkbox m-checkbox--solid">
                                                                       <input type="checkbox"> 
                                                                       <span></span>
                                                                       </label>
                                                                    </li>
                                                                    <li class="m-menu__item " aria-haspopup="true">
                                                                       <label class="form-control-label font-weight-bold">
                                                                       All Bills Including Extras
                                                                       </label>
                                                                       <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                       </span>
                                                                       <label class="m-checkbox m-checkbox--solid">
                                                                       <input type="checkbox"> 
                                                                       <span></span>
                                                                       </label>
                                                                   </li> 
                                                                   <li class="m-menu__item " aria-haspopup="true">
                                                                       <label class="form-control-label font-weight-bold">
                                                                       All Payment/s From Direct by Group or Client
                                                                       </label>
                                                                       <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                       <label class="m-checkbox m-checkbox--solid">
                                                                       <input type="checkbox"> 
                                                                       <span></span>
                                                                       </label>
                                                                       </li>  
                                                                   </ul>
                                                    </tr>
                                                    
                                                    
                                                </thead>
                                                <tbody>
                    
                                                        
                                                </tbody>
                                            </table>
                    
                                        </td>                    
                                       
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div> 







                {{-- <div class="form-group m-form__group row">
                    <div class="col-lg-4">
                    <label class="form-control-label font-weight-bold">
                            HOTEL NAME <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                    </label>
                        <br>
                    <label class="form-control-label font-weight-bold">
                            CONFIRMED BY <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                    </label> 
                    <br> 
                    <label class="form-control-label font-weight-bold">
                            CONFIRMED TO <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                    </label> 
                    <br> 
                    <label class="form-control-label font-weight-bold">
                            CONFIRMED DATE <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                    </label>     
                    </div>
                    <div class="col-lg-4">
                            
                    </div>
                    <div class="col-lg-4">
                       <label class="form-control-label font-weight-bold">
                            DATE<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>:
                      </label>
                     <br>
                     <label class="form-control-label font-weight-bold">
                        REQUISITION NUMBER<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:<div class="table-primary"></div>
                     </label>
                     <br>
                     <label class="form-control-label font-weight-bold">
                        TOUR REF.NUMBER<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                     </label> 
                     <br> 
                     <label class="form-control-label font-weight-bold">
                        CLIENT<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                     </label> 
                     <br> 
                     <label class="form-control-label font-weight-bold">
                        MKT<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                     </label> 
                       
                    </div>
                </div>

                        <div style="overflow-x:auto;">
                                <table class="table table-bordered table-hover table-checkable " border="1">
                                    <thead>
                                        <tr class="table-primary">  <th style="text-align: center" width="10%">Arrival Date</th>
                                              <th style="text-align: center" width="10%">Depature Date</th>
                                              <th style="text-align: center" width="10%">Number of Nights/s</th>
                                              <th style="text-align: center" width="10%">Room Type</th>
                                              <th style="text-align: center" width="10%">Single Room/s</th>
                                              <th style="text-align: center" width="10%">Double Room/s</th>
                                              <th style="text-align: center" width="10%">Twin Room/s</th>
                                              <th style="text-align: center" width="10%">Triple Room/s</th> 
                                              <th style="text-align: center" width="10%">Client/s Meal Plan</th>
                                              <th style="text-align: center" width="5%">Guide Room</th>
                                              <th style="text-align: center" width="5%">Guide Meal Plan</th>   
                                        </tr>
                                    </thead>
                                    <tbody id="tb_sr">
                                                
                                        
                                       <tr style="text-align:center"> 
                                              <td>22/08/18</td>
                                              <td>24/08/18</td>
                                              <td>02</td>
                                              <td>SLP-R</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>15</td>
                                              <td>-</td>
                                              <td>BB</td>
                                              <td>01</td>
                                              <td>HB</td>
                                              
                                      </tr>
                                      
                                           
                                    </tbody>
                                </table>
                            </div>
                <div class="form-group m-form__group row ">
                  <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><label class="form-control-label font-weight-bold">
                        REMARKS: ROOMS ARE TAKEN FROM THE "ON THE GO" ROOM ALLOMENT.<br>
                                 ROOMING LIST WILL BE FORWARD CLOSER TO THE DATE.
                     </label>  
                </div>
                <div class="form-group m-form__group row">
                        <label class="form-control-label font-weight-bold">
                                RATE:
                            </label>
                    </div>
                <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            
                             <ul class="m-menu__subnav">
                             <li class="m-menu__item " aria-haspopup="true">
                                <label class="form-control-label font-weight-bold">
                                All Extra to be collected direct from Group/Client
                                </label>
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <label class="m-checkbox m-checkbox--solid">
                                <input type="checkbox"> 
                                <span></span>
                                </label>
                             </li>
                             <li class="m-menu__item " aria-haspopup="true">
                                <label class="form-control-label font-weight-bold">
                                All Bills Including Extras
                                </label>
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                                <label class="m-checkbox m-checkbox--solid">
                                <input type="checkbox"> 
                                <span></span>
                                </label>
                            </li> 
                            <li class="m-menu__item " aria-haspopup="true">
                                <label class="form-control-label font-weight-bold">
                                All Payment/s From Direct by Group or Client
                                </label>
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <label class="m-checkbox m-checkbox--solid">
                                <input type="checkbox"> 
                                <span></span>
                                </label>
                                </li>  
                            </ul>
                        
                             
                        </div>
                </div>
                <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                                <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true">
                                           <label class="form-control-label font-weight-bold">
                                           The invoice should be raised under the name of "Raffles Leisure (Pvt) Ltd"
                                           </label>
                                      </li>
                                </ul>
                            </div>
                </div>   --}}
            </div>
    </div>
</div>
</div>


  
    