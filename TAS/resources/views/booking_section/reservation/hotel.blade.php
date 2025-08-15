
@extends('layouts.tas_app') @section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        @php
        $tourQ=\App\TourQuotation::where('id',$toure_id)->first();
        @endphp
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Hotel Reservation :  <span style="text-transform: uppercase;"> {{$tourQ->code}} </span>
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
                                    Hotel Reservation
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
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{route('hotel-reservation-list',$toure_id)}}">
                                    {{csrf_field()}}
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group has-danger row">
                                                <div class="col-lg-6">
                                                        <label class="form-control-label">
                                                            Tour Quotation Number :<br>
                                                        </label>
                  
                                                        <input style="text-transform: uppercase;" readonly placeholder="" id="tour_id" name="tour_id" type="text" class="form-control m-input" maxlength="191" value="{{ $tourQ->code }}"> 
                                                       
                                                    </div>
                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Hotel Name :
                                                </label>
                                                <select required class="form-control" name="hotel_id" id="hotel_id">
                                                        <option value="" disabled @if(is_null(old('hotel_id'))) selected @endif >Choose your option</option>       
                                                    @if(count($hotel))
                                                            @foreach($hotel as $ht)
                                                              <option value="{{$ht->id}}">{{$ht->code}} - {{$ht->name}}</option>
                                                            @endforeach 
                                                    @endif
                                                </select>
                                                @if ($errors->has('name'))
                                                <div class="form-control-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                                @endif
                                                <span class="m-form__help">
                                                                                Please enter unique name 
                                                                            </span>
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
                                                    <h3 style="text-align:center;"> Hotel Reservation</h3>


                                                </div>					 	
                                            </div>
                                            <table class="table m-table m-table--head-bg-brand">
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align:center;" colspan="6" class="m-table__row--primary">
                                                         Tour Number : <span style="text-transform: uppercase;">{{ $tourQ->code }}</span>
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
                                                                <th>
                                                                    Hotel Name
                                                                </th>
                                                                <th>Market 
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
                                                                <td>
                                                                 @if(isset($hotel_res))
                                                                   {{$hotel_name->name}}
                                                                @endif  
                                                                </td>
                                                                @php
                                                                $market_name=DB::table('markets')->join('tour_quotations','markets.id','=','tour_quotations.market_id')->select('markets.name')->where('tour_quotations.id',$toure_id)->first();
                                                                @endphp
                                                                <td>
                                                                    {{$market_name->name}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            <table class="table table-sm m-table m-table--head-bg-brand">
                                                    <thead class="thead-inverse">
                                                      <tr>
                                                            <th>Arrival Date</th>
                                                            <th>Departure Date</th>
                                                            <th>No Of Night's</th>
                                                            <th>Room Type</th>
                                                            <th>Single Room</th>
                                                            <th>Double Room</th>
                                                            <th>Triple Room</th>
                                                            <th>Client Meal Plan</th>
                                                      </tr>
                                                    </thead>
                                           
                                                       <tbody>
                                    @if(isset($hotel_res))
                                 
                                          @foreach($hotel_res as $key=>$ht)
                                            <tr>
                                            <th>{{$hotel_res[$key]['arrival_date']}}</th>
                                            <td>{{$hotel_res[$key]['departure_date']}}</td>
                                            <td>{{$hotel_res[$key]['no_of_night']}}</td>
                                            @php
                                            $room_type_name=DB::table('room_types')->where('id',$hotel_res[$key]['room_type_id'])->first();
                                            $meal_type_name=DB::table('hotel_packages')->where('id',$hotel_res[$key]['package_id'])->first();
                                            @endphp
                                            <td>{{$room_type_name->room_name}}</td>
                                            <td>{{$hotel_res[$key]['single_count']}}</td>
                                            <td>{{$hotel_res[$key]['double_count']}}</td>
                                            <td>{{$hotel_res[$key]['triple_count']}}</td>
                                            <td>{{$meal_type_name->package_name}}</td>
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

<details>
    <summary> REMARKS :</summary>
    <p> 	THE ROOMS ARE TAKEN FROM THE "ON THE GO" ROOM ALLOTMENT <br>
      THE ROOMING LIST WILL BE FORWARD CLOSER TO THE DATE
  </p>
  
  </details>
@endsection