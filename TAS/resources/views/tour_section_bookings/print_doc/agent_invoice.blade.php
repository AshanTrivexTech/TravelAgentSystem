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
                      <tr width="200px">
                          <th colspan="4" style="text-align: center; font-size:30px;"><strong>INVOICE</strong></th>
                      </tr>
                      <tr>
                            <th width="18%">Ref No:</th>
                            <td width="40%"></td>
                            <th style="text-align: right;">INVNO# :</th>
                            <td></td>
                        </tr>
                        <tr>
                              <th>PERIOD OF STAY :</th>
                              <td style="text-align: center;"></td>
                              <th style="text-align: right;">DATE :</th>
                              <td style="text-align: center;">{{Carbon\Carbon::now()}}</td>
                        </tr>
                        <tr>                             
                            <th>CLIENT'S NAME :</th>
                              <td colspan="3"></td>
                        </tr>
                        <tr>
                              <th>NO OF PAX :</th>
                              <td>1</td>
                              <td>CURRENCY</td>
                              <td></td>                              
                        </tr>
                  </thead>
                                   
              </table>
              <table class="table table-sm table-bordered">
                  <thead>
                      <tr style="text-align: center;" class="bg-secondary">
                        <th width="70%">Description</th>
                        <th width="10%">Qty</th>
                        <th width="20%">Rates</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>07-Apr / 09-Apr-2018 – 2 Days / 1 Nights Kandy Tour-WINDROSE</td>
                          <td style="text-align: center;">2 PAX</td>
                          <td style="text-align: right;">£ 38,266.80</td>                          
                      </tr>
                      <tr>
                          <td>Single Suppliment</td>
                          <td style="text-align: center;">2 PAX</td>
                          <td style="text-align: right;">£ 450.00</td>                          
                      </tr>
                     
                  </tbody>
                  <tfoot>
                      <tr  class="bg-secondary"  style="text-align: right;">
                          <th  colspan="2">TOTAL NET PAYABLE &nbsp;&nbsp;:&nbsp;&nbsp;</th>
                          <td><strong>38,716.80</strong></td>
                      </tr>
                  </tfoot>
              </table>
           </div>
      </div>
         <div class="row">
                <div class="col-md-12"><hr></div>
         </div>
      <br>
      <div class="col-md-12">
            <p><h5><b>Note:</b> The Invoice should be raised under the name of "Raffles Leisure(PVT)Ltd. "</h5></p>
        </div>
      
    </div>
</div>

@endsection @section('Page_Scripts') @parent

@endsection