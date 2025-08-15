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
                          <th colspan="4"><h3>Meal Reservation Order</h3></th>
                      </tr>
                      {{-- <tr>
                          <td colspan="4" rowspan="2"></td>
                      </tr> --}}
                  </thead>
                  <tbody>
                      <tr>
                          <th width="18%"><h6>RESTAURANT NAME : </h6></th>
                          <td width="40%">ELEPHANT BAY RESTAURANT</td>
                          <th width="18%"><h6>REQUISITION NO : </h6></th>
                          <td width="25%">16/364/1</td>
                      </tr>
                      <tr>
                            <th><h6>CONFIRMED BY :</h6></th>
                            <td>THUSHARA</td>
                            <th><h6>TOUR REF NO</h6></th>
                            <td>ANT/07/16/UK-16/50/1</td>
                      </tr>
                      <tr>
                            <th><h6>CONFIRMED TO:</h6></th>
                            <td>SANJAYA</td>
                            <th><h6>CLIENT NAME</h6></th>
                            <td>MR.PROMOD MITRA X 02</td>
                            
                      </tr>
                      <tr>
                            <th><h6>CONFIRMED DATE : </h6></th>
                            <td>29-JUN-2016</td>
                            
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
                                <th width="20%">Required Date</th>
                                <th width="15%">Meal</th>
                                <th width="10%">Adult</th>
                                <th width="15%">Child</th>
                                <th width="10%">TL</th>
                                <th width="15%">Guide</th>
                                <th width="15%">Total</th>
                                
                        </tr>
                    </thead>
                
                <tbody style="text-align: center;">
                    <tr>
                     <td>05-JUL-2016</td>   
                     <td>LUNCH</td>
                     <td>2</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>2</td>                    
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
                                <p>Please reserve and confirm the above arrangements. Clients will arrive for the given meal against the day.</p>
                            </td>    
                        </tr>
    
                    </thead>    
                </table>
                
                <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                        <thead>                    
                            <tr>
                            <td style="padding:10px; size:7px;">
                            <p><strong>PAYMENT :</strong>by us for above meals on set menu.Any other meals or extra will have to be settlrd by clients.</p>
                            </td>    
                            </tr>
                        </thead>    
                </table> 
                <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                        <thead>                    
                            <tr>
                                <td style="padding:10px; size:7px;">
                            <p><strong>Remarks :</strong>LUNCH FOR 02 PAX</p>
                                </td>    
                            </tr>
                            
                        </thead>    
                </table>
                <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                        <thead>                    
                            <tr>
                                <td style="padding:10px; size:7px;">
                            <p><strong>Rate :</strong>PLS PROVIDE LUNCH @ RS.850.00 PER PERSON.</p>
                                </td>    
                            </tr>
                            
                        </thead>    
                </table>             
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
                                                        <input type="checkbox" checked >&nbsp;
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
                                                        <input type="checkbox" checked >&nbsp;
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
                                                        <input type="checkbox" checked >&nbsp;
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
            <br>
            <div class="row">
                    
                    <div class="col-md-3">
                            <table width="100%" class="table table-sm table-bordered">
                                <thead>
                                    <tr class="" style="text-align: center;">
                                            <th width="15%">
                                                <tr>
                                                    <th><h6>_________________ </h6></th>
                                                    <td></td>
                                                        
                                                </tr>
                                                <tr>
                                                    <th><h6 style="text-align: center;">MANAGER</h6></th>
                                                    <td></td>
                                                            
                                                </tr>
                                            </th>
                                    </tr>
                                </thead>
                        </table>
                </div>
             <div class="col-md-9"> 
                    <table width="100%" class="table table-bordered m-table m-table--border-dark m-table--head-bg-secondary">
                            <thead>                    
                                <tr>
                                <td style="padding:10px; size:7px;">
                                <p><strong>NOTE :</strong>The Invoice Should Be Raised under The Name Of "Raffles Leisure(Pvt) Ltd"</p>
                                </td>    
                                </tr>  
                            </thead>    
                    </table>
             </div>
                         
            
            </div>
    </div>


@endsection @section('Page_Scripts') @parent

@endsection