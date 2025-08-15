
@extends('layouts.tas_app') @section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
                @php
                $tourQ=\App\TourQuotation::where('id',$toure_id)->first();
                @endphp

            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Vehicle Reservation :  <span style="text-transform: uppercase;"> {{$tourQ->code}} </span>
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
                                <a href="{{route('tour-Booking-List')}}" class="m-nav__link">
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
                                        Vehicle Reservation
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
                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{route('vehical-reservation-list',$toure_id)}}">
                                    {{csrf_field()}}
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group has-danger row">
                                                <div class="col-lg-6">
                                                        <label class="form-control-label">
                                                            Tour Quotation Number :<br>
                                                        </label>
                                                      
                                                        <input style="text-transform: uppercase;" readonly placeholder="" id="toure_id" name="toure_id" type="text" class="form-control m-input" maxlength="191" value="{{ $tourQ->code }}"> 
                                       
                                                    </div>
                                            <div class="col-lg-6">
                                              
                                            </div>
                                           
                                        </div>
                                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                                <div class="m-form__actions m-form__actions--solid">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <button type="submit" name="download" value="view" class="btn btn-primary">
                                                                Generate Reservation Slip
                                                            </button>
                                                            <button type="reset" class="btn btn-secondary">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" name="download" value="pdf" class="btn btn-secondary">
                                                                    Download
                                                                </button>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                </form>
                                
                                </div>
                                </div>

                        <div class="m-portlet">	 
                                <div class="m-portlet__body m-portlet__body--no-padding">
                                    <div class="m-invoice-2">
                                        <div class="m-invoice__wrapper">
                                                <div class="m-invoice__head" style="background-image: url(./assets/app/media/img//logos/bg-6.jpg);">	
                                                    <div class="m-invoice__container m-invoice__container--centered">	
                                                        <br>
                                                        <h3 style="text-align:center;"> Vehicle Reservation</h3>
    
    
                                                    </div>					 	
                                                </div>
                                                <table class="table m-table m-table--head-bg-brand">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align:center;" colspan="6" class="m-table__row--primary">
                                                             Tour Number : <span style="text-transform: uppercase;"> {{ $tourQ->code }} </span>
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                    <table class="table table-sm">
                                                            <thead class="thead-inverse">
                                                                <tr>
                                                                    <th>
                                                                        Date
                                                                    </th>
                                                                    <th>
                                                                        Operator
                                                                    </th>
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">
                                                                        @php echo  date("Y-m-d"); @endphp
                                                                    </th>
                                                                    <td>
                                                                        {{ Auth::user()->name }}
                                                                    </td>
                                                                  
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                            <table class="table table-sm m-table m-table--head-bg-brand">
                                                    <thead class="thead-inverse">
                                                      <tr>
                                                            
                                                            <th>Supplier Name</th>
                                                            <th>Vehicle Number</th>
                                                            <th>From Date</th>
                                                            <th>To date</th>
                                                            <th>Mileage</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody> 
                                            @if(isset($get_vehicle))
                                                @foreach($get_vehicle as $key=>$veh)      
                                                        <tr>
                                                        <td>{{$veh->name}}</td>
                                                        <td>{{$veh->vehicle_no}}</td>
                                                        <td>{{$veh->from_date}}</td>
                                                        <td>{{$veh->to_date}}</td>
                                                        <td>{{$veh->mileage}}</td>
                                                      </tr>
                                                @endforeach 
                                            @endif
                                                    </tbody>
                                              </table>
                                        </div>	 
                                    </div>
                                </div>
                            </div>
               
            </div>
        </div>
    </div>
</div>


@endsection