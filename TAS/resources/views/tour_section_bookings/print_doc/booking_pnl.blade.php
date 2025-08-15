@extends('layouts.print_doc') 
{{-- @section('content') --}}

<style>
   .block{
    width: 150px; 
    min-width:1600px; 
    max-width:1600px;
    margin-right:0px;
    margin-left:30px;
    white-space: nowrap;  
    /* overflow: hidden;     */
            
   } 
</style>


<div id="m_subhead">
    <div class="row">
            <div style="text-align: center;" class="col-md-12">
              <table width="100%" class="table table-sm ">
                  <thead>
                      <tr width="200px" style="text-align: center;">
                          <th colspan="4"><h5>Booking Profit & Loss </h5></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr style="font-size:12px;">
                          <th style="padding-left:30px;" ><h6>Tour No: </h6></th>
                          <td><b>17/357/1</b></td>
                          <th><h6>Market Code: </h6></th>
                          <td>CHN</td>
                      </tr>
                      <tr style="font-size:12px;">
                            <th style="padding-left:30px;"><h6>Operator: </h6></th>
                            <td>COR</td>
                            <th><h6>Tour Created User: </h6></th>
                            <td>OSHADHI</td>
                      </tr>
                      
                      <tr style="font-size:12px;">
                            <th style="padding-left:30px;"><h6>Customer Name : </h6></th>
                            <td>Mr.Ravi</td>
                            <th><h6>Arrrival Date : </h6></th>
                            <td>13-Nov-2017</td>
                      </tr>
                      
                      <tr style="font-size:12px;">
                            <th style="padding-left:30px;"><h6>Depature Date: </h6></th>
                            <td>17-Nov-2017</td>
                            <th><h6>No of Pax : </h6></th>
                            <td>4</td>
                      </tr>
                      <tr style="font-size:12px;">
                        <th style="padding-left:30px;"><h6>Costing Currency: </h6></th>
                        <td>USD</td>
                        <th><h6>Exchange Rate : </h6></th>
                        <td>150.5</td>
                  </tr>
                      <tr>
                            
                            
                      </tr> 
                  </tbody>
              </table>
           </div>
      </div>
</div>
      <div class="block">
      <div class="row">
            <div class="col-lg-8">
                
                <table width="100%" class="table table-sm table-bordered">
                    <thead>
                        <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                                
                                <th>Hot Req</th>
                                <th>Arr Date</th>
                                <th>Dept Date</th>
                                <th width="20%">Hotel</th>
                                <th>Hotel Code</th>
                                <th>Basis</th>
                                <th>SGL</th>
                                <th>DBL</th>
                                <th>TWIN</th>
                                <th>TPL</th>
                                <th>QRD</th>
                                <th>EXB</th>
                                <th>GR</th>
                        </tr>
                    </thead>
                <tbody style="text-align: center;">
                       <tr style="font-size:11px;">
                           
                           <td style="text-align:center;">17/1650/2</td>
                           <td style="text-align:center;">13-Nov-17</td>
                           <td style="text-align:center;">14-Nov-17</td>
                           <td style="text-align:rightr;">Saunter</td>
                           <td style="text-align:center;">STD</td>
                           <td style="text-align:center;">HB</td>
                           <td style="text-align:center;">3</td>
                           <td style="text-align:left;">75.0</td>
                           <td style="text-align:left;"></td>
                           <td style="text-align:left;"></td>
                           <td style="text-align:left;"></td>
                           <td style="text-align:left;"></td>
                           <td style="text-align:left;"></td>
                       </tr>

                </tbody>
            </table>
            </div>
            <div class="col-lg-4">
                
                    <table width="100%" class="table table-sm table-bordered">
                        <thead>
                            <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                                    
                                    <th>Accom Amt($)</th>
                                    <th>Accom Amt(Rs.)</th>
                                    <th>Accom Tax Amt($)</th>
                                    <th>Accom Tax Amt(Rs.)</th>
                                    <th>Accom Total Amt($)</th>
                                    <th>Accom Total Amt(Rs.)</th>
                            </tr>
    
                        </thead>
                    
                    <tbody style="text-align: right;">
                           <tr style="font-size:11px">
                               
                               <td>195.66</td>
                               <td>29,446.83</td>
                               <td>29.34</td>
                               <td>4415.67</td>
                               <td>225.00</td>
                               <td>33,862.5</td>
                           </tr>
                           <tr style="font-size:11px">
                               
                            <td>195.66</td>
                            <td>29,446.83</td>
                            <td>29.34</td>
                            <td>4415.67</td>
                            <td>225.00</td>
                            <td>33,862.5</td>
                        </tr>
                    </tbody>
                </table>
                </div>

      </div>
  <div class="row">
    <div class="col-lg-8">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th>Tran Req</th>
                        <th>Bag</th>
                        <th>Trans Mode</th>
                        <th>Vehicle</th>
                        <th>Pax</th>
                        <th>No of Vehicle</th>
                        <th>Est.KM</th>
                        <th>Buy Rate With Tax</th>
                        <th>No of Drivers</th>
                        <th>No of Cleaner</th>
                        <th>Dri Buy With Tax</th>
                        <th>Clr Buy With Tax</th>
                        <th>Expense Code</th>
                        <th>Expense Rate With Tax</th>
                        
                </tr>

            </thead>
        
        <tbody>
               <tr style="font-size:11px;">
                   
                   <td>17/1282/1</td>
                   <td style="text-align:center;">N</td>
                   <td style="text-align:left;">ROAD</td>
                   <td style="text-align:left;">MICRO</td>
                   <td style="text-align:center;">2</td>
                   <td style="text-align:center;">1</td>
                   <td style="text-align:center;">876</td>
                   <td style="text-align:rightr;">.23</td>
                   <td style="text-align:center;">1</td>
                   <td style="text-align:center;">0</td>
                   <td style="text-align:right;">3.32</td>
                   <td style="text-align:right;">0.00</td>
                   <td>E200</td>
                   <td style="text-align:right;"></td>
                   
               </tr>

        </tbody>
    </table>
    </div>
    <div class="col-lg-4">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Trans Amt($)</th>
                        <th>Trans Amt(Rs.)</th>
                        <th>Trans Tax Amt($)</th>
                        <th>Trans Tax Amt(Rs.)</th>
                        <th>Trans Total Amt($)</th>
                        <th>Trans Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align: right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               <tr style="font-size:11px">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
            </tr>
            

        </tbody>
    </table>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th>Misc Req</th>
                        <th>Event Date</th>
                        <th>Misc Description</th>
                        <th>Audult</th>
                        <th>Adult Buy With Tax</th>
                        <th>Child</th>
                        <th>Child Buy With Tax</th>
                        <th>Guides</th>
                        <th>Guide Buy</th>
                        
                </tr>

            </thead>
        
        <tbody>
               <tr style="font-size:11px;">
                   
                   <td>17/1281/1</td>
                   <td style="text-align:center;">13-Nov-17</td>
                   <td>SRI LANKA VISA</td>
                   <td style="text-align:center;">6</td>
                   <td style="text-align:right;">35.00</td>
                   <td>2</td>
                   <td style="text-align:right;">25.00</td>
                   <td>1</td>
                   <td style="text-align:right;">50.00</td>
                   
               </tr>

        </tbody>
    </table>
    </div>
    <div class="col-md-4">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Misc Amt($)</th>
                        <th>Misc Amt(Rs.)</th>
                        <th>Misc Tax Amt($)</th>
                        <th>Misc Tax Amt(Rs.)</th>
                        <th>Misc Total Amt($)</th>
                        <th>Misc Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align:right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               <tr style="font-size:11px">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
            </tr>
            

        </tbody>
    </table>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md-8">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th>Ride Req</th>
                        <th>Event Date</th>
                        <th>Ride Code</th>
                        <th>Adults</th>
                        <th>Child</th>
                        <th>No of</th>
                        <th>Buy Rate With Tax</th>
                        
                </tr>

            </thead>
        
        <tbody >
               <tr style="font-size:11px;">
                   
                   <td>17/1234/67</td>
                   <td style="text-align: center;">13-Nov-17</td>
                   <td>R34</td>
                   <td style="text-align: center;">5</td>
                   <td style="text-align: center;">2</td>
                   <td style="text-align: center;">4</td>
                   <td style="text-align:right;">450.00</td>
                   
               </tr>

        </tbody>
    </table>
    </div>
    <div class="col-md-4">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Ride Amt($)</th>
                        <th>Ride Amt(Rs.)</th>
                        <th>Ride Tax Amt($)</th>
                        <th>Ride Tax Amt(Rs.)</th>
                        <th>Ride Total Amt($)</th>
                        <th>Ride Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align: right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               <tr style="font-size:11px">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
            </tr>
            

        </tbody>
    </table>
    </div>
</div> --}}

{{-- <div class="row">
    <div class="col-md-8">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th>Group Req</th>
                        <th>Event Date</th>
                        <th>Group Code</th>
                        <th>Adult</th>
                        <th>Child</th>
                        <th>Buy Rate with Tax</th>
                        
                </tr>

            </thead>
        
        <tbody>
               <tr style="font-size:11px;">
                   
                   <td>17/1284/1</td>
                   <td style="text-align: center;">13-Nov-17</td>
                   <td>CHINEESE GUIDE TIP</td>
                   <td style="text-align: center;">6</td>
                   <td></td>
                   <td style="text-align:right;">240.00</td>
                   
                   
               </tr>

        </tbody>
    </table>
    </div>
    <div class="col-md-4">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Group Amt($)</th>
                        <th>Group Amt(Rs.)</th>
                        <th>Group Tax Amt($)</th>
                        <th>Group Tax Amt(Rs.)</th>
                        <th>Group Total Amt($)</th>
                        <th>Group Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align: right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               <tr style="font-size:11px">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
            </tr>
            

        </tbody>
    </table>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-8">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th>Guide Class</th>
                        <th>No of Guide</th>
                        <th>Days</th>
                        <th>Buy Rate With Tax</th>
                        
                </tr>

            </thead>
        
        <tbody >
               <tr style="font-size:11px;">
                   
                   <td>CFGUIDE</td>
                   <td style="text-align: center;">1</td>
                   <td style="text-align: center;">5</td>
                   <td style="text-align:right;">9.97</td>
                   
               </tr>

        </tbody>
    </table>
    </div>
    <div class="col-md-4">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Guide Amt($)</th>
                        <th>Guide Amt(Rs.)</th>
                        <th>Guide Tax Amt($)</th>
                        <th>Guide Tax Amt(Rs.)</th>
                        <th>Guide Total Amt($)</th>
                        <th>Guide Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align: right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               <tr style="font-size:11px">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
            </tr>
            

        </tbody>
    </table>
    </div>
</div> 
{{-- <div class="row">
    <div class="col-md-8">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th width="15%">Activity Type</th>
                        <th width="15%">Activity Code</th>
                        <th width="70%">Description</th>
                        
                </tr>

            </thead>
        
        <tbody>
               <tr style="font-size:11px;">
                   
                   <td>Group</td>
                   <td>APT-(ENT)</td>
                   <td style="text-align:left">AIRPORT ENTRANCE FEE</td>
                  
               </tr>
               <tr style="font-size:11px;">
                   
                <td>Group</td>
                <td>APT-(ENT)</td>
                <td style="text-align:left">AIRPORT ENTRANCE FEE</td>
               
            </tr>
            <tr style="font-size:11px;">
                   
                <td>Group</td>
                <td>APT-(ENT)</td>
                <td style="text-align:left">AIRPORT ENTRANCE FEE</td>
               
            </tr>

        </tbody>
    </table>
    </div>
    <div class="col-md-4">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Adv Amt($)</th>
                        <th>Adv Amt(Rs.)</th>
                        <th>Adv Tax Amt($)</th>
                        <th>Adv Tax Amt(Rs.)</th>
                        <th>Adv Total Amt($)</th>
                        <th>Adv Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align: right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               <tr style="font-size:11px">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
            </tr>
            

        </tbody>
    </table>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-8">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th>Conf Inv No</th>
                        <th>Inv Date</th>
                        <th>Inv Currency</th>
                        <th>Inv Type</th>
                        <th>Ex Rate To Base</th>
                        
                </tr>

            </thead>
        
        <tbody >
               <tr style="font-size:11px;">
                   
                   <td>17/358</td>
                   <td style="text-align: center;">04-DEC-17</td>
                   <td style="text-align: center;">USD</td>
                   <td style="text-align: center;">INV</td>
                   <td style="text-align:right;">150.5</td>
                   
               </tr>

        </tbody>
    </table>
    </div>
    <div class="col-md-4">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Inv Amt($)</th>
                        <th>Inv Amt(Rs.)</th>
                        <th>Inv Tax Amt($)</th>
                        <th>Inv Tax Amt(Rs.)</th>
                        <th>Inv Total Amt($)</th>
                        <th>Inv Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align: right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               <tr style="font-size:11px">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
            </tr>
            

        </tbody>
    </table>
    </div>
</div> 

<div class="row">
    <div class="col-md-6">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align:center; font-size:11px;">
                        
                        <th>Exp Amt($)</th>
                        <th>Exp Amt(Rs.)</th>
                        <th>Exp Tax Amt($)</th>
                        <th>Exp Tax Amt(Rs.)</th>
                        <th>Exp Total Amt($)</th>
                        <th>Exp Total Amt(Rs.)</th>
                        
                </tr>

            </thead>
        
        <tbody style="text-align:right;">
               <tr style="font-size:11px;">
                   
                <td>195.66</td>
                <td>29,446.83</td>
                <td>29.34</td>
                <td>4415.67</td>
                <td>225.00</td>
                <td>33,862.5</td>
                   
               </tr>

        </tbody>
    </table>
    </div>
    <div class="col-md-4" style="padding-left:30px;">
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Inv Amt($)</th>
                        <th>Inv Amt(Rs.)</th>
                        <th>Inv Tax Amt($)</th>
                        <th>Inv Tax Amt(Rs.)</th>
                        <th>Inv Total Amt($)</th>
                        <th>Inv Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align:right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
                   <td>29.34</td>
                   <td>4415.67</td>
                   <td>225.00</td>
                   <td>33,862.5</td>
               </tr>
               

        </tbody>
    </table>
    </div>
    <div class="col-md-2" style="padding-left:60px;" >
        
        <table width="100%" class="table table-sm table-bordered">
            <thead>
                <tr class="bg-secondary" style="text-align: center; font-size:11px;">
                        
                        <th>Pro Total Amt($)</th>
                        <th>Pro Total Amt(Rs.)</th>
                </tr>

            </thead>
        
        <tbody style="text-align:right;">
               <tr style="font-size:11px">
                   
                   <td>195.66</td>
                   <td>29,446.83</td>
               </tr>
               

        </tbody>
    </table>
    </div>
</div>
<br>
<br> 
    <div class="row">
            <div class="col-md-2" style="padding-left:90px;">
                                    <table width="100%" class="table table-sm" style="border:0px;">
                                            <thead>
                                                <tr class="" style="text-align: center;">
                                                        <th width="15%">
                                                            <tr>
                                                                   <th><h6>_______________ </h6></th>
                                                                   <td></td>
                                                                    
                                                            </tr>
                                                            <tr style="text-align: center;">
                                                                    <th>
                                                                     <h6>Date</h6>
                                                                    </th>
                                                                    <td></td>
                                                                        
                                                            </tr>
                                                        </th>
                                                </tr>
                                            </thead>
                                    </table>
                                
                            </div>
                            <div class="col-md-2" style="padding-left:100px;">
                                <table width="100%" class="table table-sm" style="border:0px;">
                                        <thead>
                                            <tr class="" style="text-align: center;">
                                                    <th width="15%">
                                                        <tr>
                                                               <th><h6>_______________ </h6></th>
                                                               <td></td>
                                                                
                                                        </tr>
                                                        <tr style="text-align: center;">
                                                                <th>
                                                                 <h6>Prepared By</h6>
                                                                </th>
                                                                <td></td>
                                                                    
                                                        </tr>
                                                    </th>
                                            </tr>
                                        </thead>
                                </table>
                            
                        </div>
                        <div class="col-md-2" style="padding-left:100px;">
                            <table width="100%" class="table table-sm" style="border:0px;">
                                    <thead>
                                        <tr class="" style="text-align: center;">
                                                <th width="15%">
                                                    <tr>
                                                           <th><h6>_______________ </h6></th>
                                                           <td></td>
                                                            
                                                    </tr>
                                                    <tr style="text-align: center;">
                                                            <th>
                                                             <h6  >Checked By</h6>
                                                            </th>
                                                            <td></td>
                                                                
                                                    </tr>
                                                </th>
                                        </tr>
                                    </thead>
                            </table>
                        
                    </div>
                    <div class="col-md-2" style="padding-left:100px;">
                        <table width="100%" class="table table-sm" style="border:0px;">
                                <thead>
                                    <tr class="" style="text-align: center;">
                                            <th width="15%">
                                                <tr>
                                                       <th><h6>_______________ </h6></th>
                                                       <td></td>
                                                        
                                                </tr>
                                                <tr style="text-align: center;">
                                                        <th>
                                                         <h6>Approved By</h6>
                                                        </th>
                                                        <td></td>
                                                            
                                                </tr>
                                            </th>
                                    </tr>
                                </thead>
                        </table>
                    
                </div>
                <div class="col-md-2" style="padding-left:100px;">
                    <table width="100%" class="table table-sm" style="border:0px;">
                            <thead>
                                <tr class="" style="text-align: center;">
                                        <th width="15%">
                                            <tr style="border:none;">
                                                   <th><h6>_______________ </h6></th>
                                                   <td></td>
                                                    
                                            </tr>
                                            <tr style="text-align: center;">
                                                    <th>
                                                     <h6>Accounts</h6>
                                                    </th>
                                                    <td></td>
                                                        
                                            </tr>
                                        </th>
                                </tr>
                            </thead>
                    </table>
                
            </div>
                        </div>
                        </div>
                        