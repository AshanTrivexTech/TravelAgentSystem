@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
						Guide Allocation : <span style="text-transform: uppercase;"> {{'$tour->code'}} </span>
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
									Allocate a Guide
											</span>
                   
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <!--  <a href="{{route('agents-create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la 	la-plus"></i>
													<span>
														Create
													</span>
                    </span>
                </a> -->
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
           
            </div>
            <div class="m-portlet__head-tools">

            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <table class="table" id="" width: "100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Guide License Number</th>
                    <th>NIC</th>
                    <th>Per Day Rate</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    {{--@foreach($allocated_guides as $allocated)--}}
                    {{--<tr>--}}
                        {{--<td>{{$allocated->first_name.' '.$allocated->last_name}}</td>--}}
                        {{--<td>{{$allocated->license_no}}</td>--}}
                        {{--<td>{{$allocated->nic_no}}</td>--}}
                        {{--<td>{{$allocated->guide_fee_rate}}</td>--}}
                        {{--<td> --}}
                        {{--<a href="/guide/remove-to-booking/{{$allocated->id}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                </tbody>
            </table>
            <!--end: Datatable -->
             <form method="post" action="{{url('guide/allocate-to-booking')}}">
                              {{csrf_field()}}
             <div class="form-group m-form__group row">
                 <div class="col-lg-4">
                    <label class="form-control-label">
                        Guide Name :
                    </label>                 
                 <select style="width:200px;" class="form-control" name="guide" >
                         {{--@foreach($guides as $guide)--}}
                         {{--<option value="">Select a Guide </option>--}}
                                                    {{--<option value="{{$guide->id}}" @if(is_null(old('Guide'))) selected @endif >--}}
                                                    {{--{{$guide->first_name.' '.$guide->last_name}} - {{$guide->license_no}}--}}
                                                    {{--</option>--}}
                                                {{--@endforeach--}}
                   </select>
                <input type="hidden" name="tour" value="{{'$tour->id'}}" />
                </div>
                
                </div>
 <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                            <div class="m-form__actions m-form__actions--solid">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="submit" class="btn btn-primary">
                                                            Save
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                 

                        </div>
                    </div>
                </form>



        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>
@endsection

