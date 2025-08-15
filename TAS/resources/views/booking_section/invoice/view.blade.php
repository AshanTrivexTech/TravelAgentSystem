
@extends('layouts.tas_app') @section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
       
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Invoice :  <span style="text-transform: uppercase;"> </span>
                    </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                            <li class="m-nav__item m-nav__item--home">
                                <a href="#" class="m-nav__link m-nav__link--icon">
                                    <i class="m-nav__link-icon la la-home"></i>
                                </a>
                            </li>
                            <li class="m-nav__separator">
                                -    
                            </li>
                            <li class="m-nav__item">
                                
                                    <span class="m-nav__link-text">
                                      Tour Manager
                                    </span>
                                
                            </li>
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
                                    <span class="m-nav__link-text">
                                      Tour Bookings
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                
                                    <span class="m-nav__link-text">
                                      Invoice
                                    </span>
                               
                            </li>
                        </ul>
                </div>
                <div>
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-lg-12">
                        <div class="m-portlet">	 
                                <div class="m-portlet__body m-portlet__body--no-padding">
                                    <div class="m-invoice-2">
                                        <div class="m-invoice__wrapper">
                                            <div class="m-invoice__head" style="background-image: url(./assets/app/media/img//logos/bg-6.jpg);">	
                                                <div class="m-invoice__container m-invoice__container--centered">	
                                                        <br>
                                                        <h3 style="text-align:center;"> Invoice</h3>
    
                                                </div>					 	
                                            </div>
                                         @if(isset($agent_details))
                                        @foreach($agent_details as $key=>$ht)
                                            <table class="table m-table m-table--head-bg-brand">
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align:center;" colspan="6" class="m-table__row--primary">
                                                            
                                                            Tour Number :  {{$agent_details[$key]['id']}}
                                                           
                                                      
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                                <table class="table table-sm">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>
                                                                
                                                            </th>
                                                           
                                                            <th style="text-align:right;">
                                                                Ref: {{$agent_details[$key]['code']}}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row">
                                                                {{$agent_details[$key]['name']}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">
                                                                Date : {{$agent_details[$key]['created_at']}}
                                                            </td>
                                                            <td>
                                                               
                                                            </td>
                                                            <td>
                                                               
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <table class="table table-sm m-table">
                                                  
                                                    <tbody>
                                                      <tr>
                                                      <td>Client's Name: </td>
                                                      <td>{{$agent_details[$key]['name']}}</td>
                                                      </tr>
                                                      <tr>
                                                        <td>No of Pax: </td>
                                                      <td>{{$agent_details[$key]['pax']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Period of stay: </td>
                                                        <td>{{$agent_details[$key]['from_date']}} - {{$agent_details[$key]['to_date']}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Destination: </td>
                                                                <td>Sri Lanka</td>
                                                                </tr>
                                                     
                                                            
                                                    </tbody>
                                              </table>

                                              <table class="table table-sm m-table">
                                                  
                                                <tbody>
                                                  <tr>
                                                  <td>Rates are in {{$agent_details[$key]['currency_name']}}: -</td>
                                                  <td></td>
                                                  </tr>
                                                  <tr>
                                                @php
                                                      $a= new DateTime($agent_details[$key]['from_date']);
                                                      $b=new DateTime($agent_details[$key]['to_date']);
                                                      $fdate=$a->format('d-M');
                                                      $tdate=$b->format('d-M-Y');
                                                    $x=date_create($agent_details[$key]['from_date']);
                                                    $y=date_create($agent_details[$key]['to_date']);
                                                    $diff=date_diff($x,$y);
                                                    $d=$diff->format("%a");
                                                    $n=(int)($d)-1;
                                                @endphp
                                                    <td>{{$fdate}} / {{$tdate}} – {{$d}} Days / {{$n}} Nights {{$agent_details[$key]['title']}}-{{$agent_details[$key]['name']}}
                                                        @ {{$agent_details[$key]['currency_code']}} {{number_format($agent_details[$key]['per_person_price'],2)}} x {{$agent_details[$key]['pax']}} Pax	
                                                    </td>
                                                    @php
                                                 
                                                    $total=(double)($agent_details[$key]['per_person_price'])*(int)($agent_details[$key]['pax']);
                                        
                                                    @endphp
                                                    <td style="text-align:right;">= {{$agent_details[$key]['currency_code']}} {{number_format($total,2)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Net Payable to antiquity in {{$agent_details[$key]['currency_code']}}:
                                                        </td>
                                                        <td style="text-align:right;">= {{$agent_details[$key]['currency_code']}} {{number_format($total,2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            @php
                                                            @endphp
                                                            <td> <b></b>
                                                            </td>
                                                            <td style="text-align:right;"></td>
                                                            </tr>

                                                       
                                                </tbody>
                                          </table>
                                          @endforeach
                                          @endif

                                     

                                        </div>	 
                                    </div>
                                </div>
                            </div>
               
            </div>
        </div>
    </div>
</div>


@endsection