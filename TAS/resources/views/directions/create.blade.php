

@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
            <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator ">
                            Directions Manager
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
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                                    Destinations
                                                    </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                                        Directions Manager
                                                    </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                        Create a Direction
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                      Create a Direction
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="">
            {{--{{csrf_field()}}--}}
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            From :
                        </label>
                          <select class="form-control" name="from_location_id" id="from_location_id">
                        {{--<option value="" disabled @if(is_null(old('from_location_id'))) selected @endif >Choose your option</option>--}}
                        {{--@if(count($locations))--}}
                            {{--@foreach($locations as $location)--}}
                              {{--<option value="{{$location->id}}" @if(old('from_location_id') == $location->id) selected @endif >{{$location->code}} - {{$location->name}}</option>--}}
                            {{--@endforeach --}}
                        {{--@endif--}}
                      </select>
                      {{--@if ($errors->has('from_location_id'))--}}
                        <div class="form-control-feedback">
                            {{--{{ $errors->first('from_location_id') }}--}}
                        </div>
                        {{--@endif--}}
                    </div>

                    <div class="col-lg-6">
                        <label class="form-control-label">
                            To :
                        </label>
                        <select class="form-control" name="to_location_id" id="to_location_id">
                        {{--<option value="" disabled @if(is_null(old('to_location_id'))) selected @endif >Choose your option</option>--}}
                        {{--@if(count($locations))--}}
                            {{--@foreach($locations as $location)--}}
                              {{--<option value="{{$location->id}}" @if(old('to_location_id') == $location->id) selected @endif >{{$location->code}} - {{$location->name}}</option>--}}
                            {{--@endforeach --}}
                        {{--@endif--}}
                      </select>
                      {{--@if ($errors->has('to_location_id'))--}}
                        {{--<div class="error"> {{ $errors->first('to_location_id') }}  </div>--}}
                      {{--@endif--}}
                       
                    </div>
                </div>

                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Distance:
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                        <input  class="form-control m-input" placeholder="distance" id="distance" name="distance" type="text" value="">
                            <span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<i class="la la-map-marker"></i>
															</span>
                            </span>
                        </div>
                        {{--@if ($errors->has('distance'))--}}
                        <div class="form-control-feedback">
                            {{--{{ $errors->first('distance') }}--}}
                        </div>
                        {{--@endif--}}
                        
                    </div>

                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Via:
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                        <input  class="form-control m-input" placeholder="Via path" id="via_path" name="via_path" type="text" class="validate" maxlength="191" value="">
                            <span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<i class="la la-map-marker"></i>
															</span>
                            </span>
                        </div>
                        {{--@if ($errors->has('via_path'))--}}
                        <div class="form-control-feedback">
                            {{--{{ $errors->first('via_path') }}--}}
                        </div>
                        {{--@endif--}}
                       
                    </div>
                   </div>
                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Status:
                        </label>
                        <div class="m-radio-list">
                            <label class="m-radio m-radio--state-success">
                                <input type="radio" name="status" id="status" value="1" checked> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--state-brand">
                                <input type="radio" name="status" id="status" value="0"> In-active
                                <span></span>
                            </label>
                        </div>
                        {{--@if ($errors->has('status'))--}}
                        <div class="form-control-feedback">
                            {{--{{ $errors->first('status') }}--}}
                        </div>
                        {{--@endif--}}
                    </div>

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
        </form>

    </div>
</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
@endsection