@extends('layouts.app')

@section('content')

  <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Update Guest for Quotation : </h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Tour Manager</a></li>
                    <li class="active">Update Guest</li>
                  </ol>
                </div>

                <div class="col s2 m6 l6">
                  <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" href="{{route('tour-list')}}">
                    <i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Tour Quotation List</span>
                  </a>

                 <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" href="{{route('tour-Tours-Guest-List')}}">
                    <i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Added Guests List</span>
                  </a>





                </div>
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
        <div class="container">
        <div class="section">

            <div id="row-grouping" class="section">
              
                <div class="row">
                    <div class="col s12">

                        <form class="cleafix" method="POST" action="">
                            {{csrf_field()}}
                            <div class="row">
                                 <div class="input-field col s12 m6">
                                    <input id="name" name="name" type="text" class="validate"
                                           value="{{ old('name') }}" placeholder="Ex:Your Name">
                                    <label for="name" class="active">Name on Passport</label>
                                    {{--@if ($errors->has('name'))--}}
                                        {{--<div class="error"> {{ $errors->first('name') }}  </div>--}}
                                    {{--@endif--}}
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="passport_no" name="passport_no" type="text" class="validate"
                                           value="{{ old('passport_no') }}" placeholder="0">
                                    <label for="passport_no" class="active">Passport No</label>
                                    {{--@if ($errors->has('passport_no'))--}}
                                        {{--<div class="error"> {{ $errors->first('passport_no') }}  </div>--}}
                                    {{--@endif--}}
                                </div>

                                <div class="clearfix"></div>

                                <div class="input-field col s12 m12 l6">
                                    <input type="text" id="arrival_date" name="arrival_date" class="datepicker"
                                           value="{{old('arrival_date')}}" placeholder="DD MONTH,YYYY"/>
                                    <label id="lblstart" for="arrival_date">Arrival Date</label>
                                    {{--@if ($errors->has('arrival_date'))--}}
                                        {{--<div class="error"> {{ $errors->first('arrival_date') }} </div>--}}
                                    {{--@endif--}}
                                </div>

                                <div class="input-field col s12 m12 l6">
                                    <input type="text" id="departure_date" name="departure_date" class="datepicker"
                                           value="{{old('departure_date')}}" placeholder="DD MONTH,YYYY">
                                    <label id="lblend" for="departure_date">Departure Date</label>
                                    {{--@if ($errors->has('departure_date'))--}}
                                        {{--<div class="error"> {{ $errors->first('departure_date') }} </div>--}}
                                    {{--@endif--}}
                                </div>

                                <div class="clearfix"></div>

                                <div class="input-field col s12 m6">
                                    <input id="arrival_flight_no" name="arrival_flight_no" type="text" class="validate"
                                           value="{{ old('arrival_flight_no') }}" placeholder="0">
                                    <label for="arrival_flight_no" class="active">Arrival Flight No</label>
                                    {{--@if ($errors->has('arrival_flight_no'))--}}
                                        {{--<div class="error"> {{ $errors->first('arrival_flight_no') }}  </div>--}}
                                    {{--@endif--}}
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="depature_flight_no" name="depature_flight_no" type="text" class="validate"
                                           value="{{ old('depature_flight_no') }}" placeholder="0">
                                    <label for="depature_flight_no" class="active">Depature Flight No</label>
                                    {{--@if ($errors->has('depature_flight_no'))--}}
                                        {{--<div class="error"> {{ $errors->first('depature_flight_no') }}  </div>--}}
                                    {{--@endif--}}
                                </div>

                                <div class="clearfix"></div>

                                <div class="input-field col s12 m6">
                                    <input id="mobile_phone" name="mobile_phone" type="tel" class="validate"
                                           value="{{ old('mobile_phone') }}" placeholder="071XXXXXXXX">
                                    <label for="mobile_phone" class="active">Contact No</label>
                                    {{--@if ($errors->has('mobile_phone'))--}}
                                        {{--<div class="error"> {{ $errors->first('mobile_phone') }}  </div>--}}
                                    {{--@endif--}}
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="email" name="email" type="email" class="validate"
                                           value="{{ old('email') }}" placeholder="Ex:john@gmail.com">
                                    <label for="email" class="active">Email Address</label>
                                    {{--@if ($errors->has('email'))--}}
                                        {{--<div class="error"> {{ $errors->first('email') }}  </div>--}}
                                    {{--@endif--}}
                                </div>

                                <div class="clearfix"></div>
                                
                                <div class="input-field col s12 m12">
                                    <textarea name="remarks" id="remarks" placeholder="Enter some remarks here"
                                              class="materialize-textarea">{{ old('remarks') }}</textarea>
                                    <label for="name">Remarks</label>
                                    {{--@if ($errors->has('remarks'))--}}
                                        {{--<div class="error"> {{ $errors->first('remarks') }}  </div>--}}
                                    {{--@endif--}}
                                </div>
                                <div class="clearfix"></div>
                      

                                <div class="input-field col s12 m12 form-submit-btns-wrap">
                                    <button class="btn waves-effect red accent-2 pull-right" type="reset" name="action">
                                        Reset
                                    </button>
                                    <button class="btn waves-effect waves-light pull-right" type="submit" name="action">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
    @parent
    
    <script type="text/javascript">


$(document).ready(function () {

    tourCreateFFormInit();

});

$('input[type=radio][name=date_range]').change(function () {
    if (this.value == 'days') {
        $('#lblstart').html('Estimated Start Date');
        $('#lblend').html('Estimated End Date');
        $('#no_of_days').removeAttr('disabled');

    } else if (this.value == 'dates') {
        $('#no_of_days').prop('disabled',true);

    }

});
$('#end_date').change(function () {
    var startdate = moment($('#start_date').val());
    var endDate = moment($('#end_date').val());
    var noOfDays = endDate.diff(startdate,'days');

    $('#no_of_days').val(noOfDays);
;
;





});
</script>
@endsection