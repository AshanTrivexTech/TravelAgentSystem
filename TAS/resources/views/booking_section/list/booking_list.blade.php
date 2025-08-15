@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
            Tour Bookings
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
                      Tour  Bookings
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                  
                        <span class="m-nav__link-text">
                       Tour Booking  Master File
											</span>
                 
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('tour-create-booking')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Booking Master Files
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
                    <th>Booking No</th>
                    <th>Market </th>
                    <th>Pax</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Action</th>
                 </tr>               
                </thead>
                <tbody>
                {{--@foreach($quotation as $element)--}}
                               {{----}}
                    {{--<tr>--}}
                    {{--<td>--}}
                           {{----}}
                        {{--@if($element->tour_type == 'ROUND')--}}
                        {{--<span class="m-badge m-badge--focus m-badge--wide" style="color:white;"  title="Round Tour">--}}
                            {{--<span style="text-transform: uppercase;"> {{$element->code}} </span>--}}
                                {{--</span>--}}
                        {{--@endif--}}
                        {{--@if($element->tour_type == 'HOTELONLY')--}}
                        {{--<span class="m-badge m-badge--accent m-badge--wide" style="color:white;"  title="Accomodation Only Tour">--}}
                            {{--<span style="text-transform: uppercase;"> {{$element->code}} </span>--}}
                                {{--</span>--}}
                        {{--@endif--}}

                        {{--@if($element->tour_type == 'TRANSPORTONLY')--}}
                        {{--<span class="m-badge m-badge--primary m-badge--wide" style="color:white;" title="Transport Only Tour">--}}
                            {{--<span style="text-transform: uppercase;"> {{$element->code}} </span>--}}
                                {{--</span>--}}
                        {{--@endif--}}

                    {{--</td>--}}
                    {{--@php--}}
                    {{--$market=\App\Market::where('id',$element->market_id)->first();--}}
                    {{--@endphp--}}
                    {{--<td>{{$market->name}}</td>--}}
                    {{--<td>{{$element->pax+$element->pax_children}}</td>--}}
                    {{--<td>{{$element->from_date}}</td>--}}
                    {{--<td>{{$element->to_date}}</td>--}}
                    {{--<td>--}}
                            {{--<a href="/booking/{{$element->id}}/summary" class="btn btn-warning m-btn m-btn--icon btn-sm m-btn--icon-only" title="Manage Booking!" >--}}
                                {{--<i class="la la-edit"></i>--}}
                            {{--</a>--}}
                    {{--<a href="/booking/guest/list/{{$element->id}}" class="btn btn-accent m-btn m-btn--icon btn-sm m-btn--icon-only" title="Add Guests!" >--}}
                        {{--<i class="la la-user"></i>--}}
                    {{--</a>--}}
                    {{--<a href="/tours/booking/add-vehicle/{{$element->id}}" class="btn  btn-success m-btn m-btn--icon btn-sm m-btn--icon-only" title="Add Vehicle!" >--}}
                        {{--<i class="la la-car"></i>--}}
                    {{--</a>--}}
                    {{--<a href="/tours/booking/add-guides/{{$element->id}}" class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only" title="Add Guides!">--}}
                        {{--<i class="la la-user-secret"></i>--}}
                    {{--</a>--}}
                {{----}}
                    {{--<a href="{{route('hotel-reservation', $element->id )}}" class="btn btn-primary m-btn m-btn--icon btn-sm m-btn--icon-only" title="Hotel Reservation!" >--}}
                            {{--<i class="la la-hotel"></i>--}}
                        {{--</a>--}}
                        {{--<a href="{{route('vehicle-reservation', $element->id )}}" class="btn btn-brand m-btn m-btn--icon btn-sm m-btn--icon-only" title="Vehicle Reservation!" >--}}
                                {{--<i class="la la-train"></i>--}}
                            {{--</a>--}}
                            {{--<a href="{{route('guide-reservation', $element->id )}}" class="btn btn-accent m-btn m-btn--icon btn-sm m-btn--icon-only"  title="Guide Reservation!" >--}}
                                    {{--<i class="la la-smile-o"></i>--}}
                                {{--</a>--}}
                            {{--<a href="/booking/invoice/{{$element->id}}/{{$element->agent_id}}" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only"  title="Invoice!" >--}}
                                    {{--<i class="la la-dollar"></i>--}}
                                {{--</a>--}}


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
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/booking-table.js') }}" type="text/javascript"></script>
@endsection