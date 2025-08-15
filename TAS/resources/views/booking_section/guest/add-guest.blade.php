@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                Guest Allocation : <span style="text-transform: uppercase;"> {{'$tour->code'}} </span>
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
                            Tour Bookings
                        		</span>
                    
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('booking/guest/list/$tour->id)}}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Guests Allocation
                    	</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                  
                        <span class="m-nav__link-text">
                     Allocate a Guest
											</span>
                    
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{url('booking/guest/list/$tour->id)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    <span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                    <h3 class="m-portlet__head-text">
												Allocate a Guest
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{url('guest/allocate-to-booking')}}">
          {{csrf_field()}}
            <input type="hidden" name="tour" value="{{$tour->id}}"/>

            <div class="m-portlet__body">
                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Name on passport:
                        </label>
                        <input required id="name" name="name" type="text" class="form-control m-input" value="{{  }}" placeholder="Ex:Your Name">
                        {{--@if ($errors->has('name'))--}}
                        {{--<div class="form-control-feedback">--}}
                            {{--{{ $errors->first('name') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Passport No :
                        </label>
                        <input required id="passport_no" name="passport_no" type="text" class="form-control m-input"
                                           value="{{ old('passport_no') }}" placeholder="0000000000000">
                        {{--@if ($errors->has('passport_no'))--}}
                        {{--<div class="form-control-feedback">--}}
                            {{--{{ $errors->first('passport_no') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Arrival Date :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                        <input type="text" id="start_date" name="arrival_date" class="form-control m-input" value="{{$tour->from_date}}">
                        </div>
                        {{--@if ($errors->has('start_date'))--}}
                        {{--<div class="form-control-feedback">--}}
                            {{--{{ $errors->first('start_date') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>   
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Departure Date :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                        <input type="text" id="end_date" name="departure_date" class="form-control m-input" value="{{$tour->to_date}}">
                        </div>
                        {{--@if ($errors->has('start_date'))--}}
                        {{--<div class="form-control-feedback">--}}
                            {{--{{ $errors->first('start_date') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                </div>

                   <div class="form-group m-form__group row">
                    <div class="col-lg-4">
                        <label class="form-control-label">
                            Arrival Flight No (AFN) :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                        <input id="arrival_flight_no" name="arrival_flight" type="text" class="form-control m-input"
                                           value="{{ old('arrival_flight_no') }}" placeholder="0">
                 
                        </div>
                        {{--@if ($errors->has('start_date'))--}}
                        {{--<div class="form-control-feedback">--}}
                            {{--{{ $errors->first('start_date') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>   
                    <div class="col-lg-4">
                        <label class="form-control-label">
                            Departure Flight No (DFN) :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                        <input id="depature_flight_no" name="depature_flight" type="text" class="form-control m-input"
                                           value="{{ old('depature_flight_no') }}" placeholder="0">
                        </div>
                        {{--@if ($errors->has('start_date'))--}}
                        {{--<div class="form-control-feedback">--}}
                            {{--{{ $errors->first('start_date') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                    <div class="col-lg-4">
                        <label class="form-control-label">
                         Room Size:
                        </label>
                        <select class="form-control"  name="gust_plan" id="gust_plan">
                              <option value="single">Single</option>
                              <option selected value="double">Double</option>
                              <option value="triple">Triple</option>
                         </select>
                       
                        <span class="m-form__help">
                            
                        </span>
                    </div>
                </div>

                

                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Mobile No :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                       
                        <input id="mobile_phone" name="contact" type="tel" class="form-control m-input"
                                           value="{{ old('mobile_phone') }}" placeholder="071XXXXXXXX">
                        </div>
                    </div>   
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            E-mail Address :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                        <input id="email" name="email" type="email" class="form-control m-input" value="{{ old('email') }}" placeholder="Ex:john@gmail.com">
                        </div>
                        
                    </div>
                </div>

                 <div class="form-group m-form__group  row">
                    <div class="col-lg-12">
                        <label class="form-control-label">
                            Remarks :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                       
                        <textarea name="remarks" id="remarks" placeholder="Enter some remarks here"
                        class="form-control">{{ old('remarks') }}</textarea>
                                   </div>
                        {{--@if ($errors->has('start_date'))--}}
                        {{--<div class="form-control-feedback">--}}
                            {{--{{ $errors->first('start_date') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>  
                </div>  
            </div>
            <div class="form-group m-form__group  row">
            <div class="col-lg-12">
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

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

@endsection

@section('Guest_Scripts')
    @parent
    
<script type="text/javascript">


$(document).ready(function () {

$('#arrival_date').val({{'$tour->start_date'}});
$('#departure_date').val({{'$tour->start_date'}});
    

});

$('#end_date').change(function () {
    var startdate = moment($('#arrival_date').val());
    var endDate = moment($('#departure_date').val());
});
</script>
@endsection