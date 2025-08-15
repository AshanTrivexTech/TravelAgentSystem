@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
					Tour Booking Manager
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
							Manage Tour
						</span>
                  
                </li>
            </ul>
        </div>  
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('tour-Booking-List')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
						<i class="la la-angle-left"></i>
							<span>
								Back
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
<div class="m-portlet">
<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Tour Number : {{$element->code}}
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<ul class="nav nav-pills" role="tablist">
											{{-- <li class="nav-item ">
												<a class="nav-link active show" data-toggle="tab" href="#m_tabs_3_1">
													<i class="la la-file-archive-o"></i>
													Booking
												</a>
											</li>
											<li class="nav-item ">
												<a class="nav-link show" data-toggle="tab" href="#m_tabs_3_2">
													<i class="la la-compass"></i>
													Locations
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_3_3">
													<i class="la la-hotel"></i>
													Hotels
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_3_4">
													<i class="la la-car"></i>
													Transport
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_3_5">
													<i class="la la-cog"></i>
													Miscellaneous
												</a>
											</li> --}}
											{{-- <li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_3_6">
													<i class="la la-file-text"></i>
													Summary
												</a>
											</li> --}}
										</ul>
										<div class="">
												@include('tour_section.components.summary.view')
											{{-- <div class="tab-pane active" id="m_tabs_3_1" role="tabpanel">
												@include('tour_section.components.document.update_form')
											</div>
											<div class="tab-pane" id="m_tabs_3_2" role="tabpanel">
											@include('tour_section.components.directions.add_form')
											</div>
											<div class="tab-pane" id="m_tabs_3_3" role="tabpanel">
											    @include('tour_section.components.hotels.add_form')
											</div>
											<div class="tab-pane" id="m_tabs_3_4" role="tabpanel">
											<div id="transport-grid">
                                            @include('tour_section.components.transport.added_list')
                                            </div>
											@include('tour_section.components.transport.add_form')
											</div>
											<div class="tab-pane" id="m_tabs_3_5" role="tabpanel">
											<div id="miscellaneous-grid">
                                            @include('tour_section.components.miscellaneous.added_list')
                                            </div>
											@include('tour_section.components.miscellaneous.add_form')
											</div> --}}
											<div class="tab-pane" id="m_tabs_3_6" role="tabpanel">
											{{-- @include('tour_section.components.summary.view') --}}
											</div>
										</div>
									</div>
								</div>



</div>

@endsection 
@section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

@endsection