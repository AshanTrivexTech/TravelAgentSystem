@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
            Guests Allocation :<span style="text-transform: uppercase;"> {{'$tour->code'}} </span>
				</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/dashboard" class="m-nav__link m-nav__link--icon">
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
                        Guests Allocation
											</span>
                   
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{url('tours/booking/add-guest/$tour->id)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la 	la-plus"></i>
													<span>
														Create
													</span>
                    </span>
                </a>
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                     Allocated Guests
										</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">

                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <table class="m-datatable" id="" width:"100%">
                <thead>
                  <tr>
                      <!-- <th>ID</th> -->
                      <th>Name</th>
                      <th>Passport</th>
                      <th>Arr: Date</th>
                      <th>Dep: Date</th>
                      <th title="Arrival Flight No">AFN</th>
                      <th title="Departure Flight No">DFN </th>
                      <th>Contact</th>
                      <th>Email</th>          
                      <th>Action</th>
                  </tr>               
                </thead>
                <tbody>
                {{--@foreach($booked_guests as $guest)--}}
                    {{--<tr>--}}
             {{--<!--          <td>{{$guest->guest_id}}</td> -->--}}
                      {{--<td>{{$guest->name_on_passport}}</td>--}}
                      {{--<td>{{$guest->passport_no}}</td>--}}
                      {{--<td>{{$guest->arrival_date}}</td>--}}
                      {{--<td>{{$guest->departure_date}}</td>--}}
                      {{--<td>{{$guest->arrival_flight}}</td>--}}
                      {{--<td>{{$guest->departure_flight}}</td>--}}
                      {{--<td>{{$guest->contact_no}}</td>--}}
                      {{--<td>{{$guest->email}}</td> --}}
                      {{--<td>--}}
                          {{--<a href="/tours/booking/edit-guest/{{$tour->id}}/{{$guest->guest_id}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Customize Package"><i style="color: purple;" class="la 	la-magic"></i></a>--}}
                      {{--</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/guest-table.js') }}" type="text/javascript"></script>
@endsection