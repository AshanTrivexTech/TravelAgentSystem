
@extends('layouts.tas_app')
@section('content')
<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ URL::asset('/js/module/routemanage.js') }}"></script>

{{--@php--}}
{{--$company=App\TourQuotation::find($tour->id);--}}
{{--$company_profile=App\Company::find(1);--}}
{{--$tour_routes = \App\TourQuotaionRoutes::where('tour_quotation_routes.tour_id',$tour->id)->orderBy('tour_quotation_routes.date', 'asc')->get();--}}
{{--@endphp--}}
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                CG Package for Tour :<span style="text-transform: uppercase;"> {{'$tour->code'}} </span>
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
							Master Data
						</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
							Tour Quotation 
						</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
							
						</span>
                    </a>
                </li>
            </ul>
        </div>
    <div>
        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="/booking/guest/list/{{'$tour->id'}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
{{--@php--}}
{{--$currency=App\CurrencyRate::find($tour->base_currencies);--}}
{{--@endphp--}}
<div class="m-content">
    <div class="m-portlet">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
						Customised Guest Package
					</h3>
                </div>
            </div>
		</div>
	<div class="m-portlet__body">
        <table class="table m-table m-table--head-bg-brand">
            <thead>
                <tr>
                    <th style="text-align:center;" colspan="6" class="m-table__row--primary">
                        TOUR DETAILS
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table table-sm">
			<thead class="thead-inverse">
				<tr>
					<th>
                         Guest Name
					</th>
					<th>
                        Agent Name
					</th>
					<th>
                        Period of Stay
					</th>
					<th>
                        Number of Pax
					</th>
				</tr>
			</thead>
			<tbody>
			    {{--<tr>--}}
				    {{--<th scope="row">--}}
                        {{--{{($tour->title)?''.$tour->title.' -'.$guest->name_on_passport:''.$guest->name_on_passport}}--}}
					{{--</th>--}}
					{{--<td>--}}
                        {{--@php--}}
                            {{--$agent=\App\Agent::where('id',$tour->agent_id)->first();--}}
                        {{--@endphp   --}}
                        {{--{{$agent->name}}--}}
					{{--</td>--}}
					{{--<td>--}}
                        {{--{{$tour->from_date}} - {{$tour->to_date}}--}}
					{{--</td>--}}
					{{--<td>--}}
                    {{--@php--}}
        {{--$guests=$tour->pax+$tour->pax_children;--}}
        {{--@endphp--}}
                        {{--{{ $guests }}--}}
					{{--</td>--}}
				{{--</tr>--}}
			</tbody>
		</table>
        {{--@php--}}
        {{--$guests=$tour->pax+$tour->pax_children;--}}
        {{--@endphp--}}
        <form action="{{url('/gust-booking-details/update/')}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="guest_id" value="{{'$guest->id'}}"/>
        <input type="hidden" name="tour_id" value="{{'$tour->id'}}"/>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <tr>
                        <th style="text-align:center;" colspan="6" class="m-table__row--primary">
                            ACCOMMODATION
                        </th>
                    </tr>
                    </thead>
                </table>
                <table class="table m-table">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Date</th>
                            <th>Hotel</th>
                            <th>Room Type</th>
                            <th>Package</th>
                            <th>Currency</th>
                            <th>Currency Rate</th>
                            <th>Price({{'$currency->code'}})</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{--@php--}}
                        {{--$hotelList=App\Hotel::get();--}}
                        {{--$x=0;--}}
                        {{--for ($i = strtotime($tour->from_date); $i <= strtotime($tour->to_date); $i += 86400) {--}}
                            {{--$timestamp = strtotime(date("Y-m-d", $i));--}}
                            {{--$day = date("Y-m-d", $timestamp);   --}}
                    {{--@endphp--}}
                        {{--<tr>--}}
                            {{--<td><input disabled name="data[{{$x}}][day]" style="width:30px;" type="text" value="{{$x+1}}" readonly name=""--}}
                                    {{--id="day{{$x}}"/></td>--}}
                            {{--<td id="day{{$x}}"><input type="text" style="width:100px;" value="{{$day}}" readonly name="data[{{$x}}][txtday]"--}}
                                    {{--id="txtday{{$x}}"/></td>--}}
                            {{--<td>--}}
                                {{--<select disabled name="data[{{$x}}][hotel]" onchange="getHotelRooms({{$x}})" id="hotel{{$x}}"--}}
                                    {{--class="hotellist  ">--}}
                                    {{--@foreach($hotelList as $hotel)--}}
                                        {{--<option value="{{$hotel['id']}}">{{$hotel['name']}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<select disabled name="data[{{$x}}][roomtype]" style="width:80px;" onchange="getPackages({{$x}})" id="roomtype{{$x}}"--}}
                                    {{--class="roomType">--}}
                                    {{--<option value="selected Value" selected>Selected Value</value>--}}
                                {{--</select>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<select disabled name="data[{{$x}}][packages]" style="width:80px;" onchange="getPackagePrice({{$x}})" id="packages{{$x}}"--}}
                                    {{--class="">--}}
                                    {{--<option value="selected Value" selected>Selected Value</value>--}}
                                {{--</select>--}}
                                {{--<input type="hidden" name="data[{{$x}}][actPrice]" id="actPrice{{$x}}" />--}}
                            {{--</td>--}}
                            {{--<td><input disabled style="width:80px;" readonly id="currency{{$x}}" name="data[{{$x}}][currency]" type="text"/></td>--}}
                            {{--<td><input disabled style="width:80px;" value="1" onkeyup="rateChanged({{$x}})" id="currencyRate{{$x}}" name="data[{{$x}}][currencyRate]" type="text"/></td>--}}
                        {{----}}
                            {{--<td><input disabled style="width:80px;" readonly onkeyup="calculateTotal()" id="price{{$x}}" name="data[{{$x}}][price]" type="text"/></td>--}}
                        {{--</tr>--}}
                        {{--@php--}}
                            {{--$x++;--}}
                        {{--}--}}
                        {{--@endphp--}}
                            {{--<tr class="">--}}
                                {{--<td colspan="7" style="text-align:right;">Accomadation Price according to Rates </td>--}}
                                {{--<td class=""><input style="width:90px" type="text" readonly name="total" id="total"/></td>--}}
                            {{--</tr>--}}
                        </tbody>
                    </table>
                    <table class="table m-table m-table--head-bg-brand">
                        <thead>
                        <tr>
                            <th style="text-align:center;" colspan="5" class="m-table__row--primary">
                             TRANSPORTATION
                            </th>
                        </tr>
                        </thead>
                    </table>

                    <table class="table m-table">
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Vehicle Type</th>--}}
                            {{--<th>Unit Price({{$currency->code}})</th>--}}
                            {{--<th>Mileage(KM)</th>--}}
                            {{--<th>Total Cost({{$currency->code}})</th>--}}
                        {{--</thead>--}}

                        {{--<tbody>--}}
                        {{--@php--}}
                            {{--$transports = App\TourQuotationTransport::where('tour_id', $tour->id)->get();--}}
                            {{--$transport_total=0;--}}
                        {{--@endphp--}}
                        {{--@php--}}
                        {{--$vehicle_list=App\VehicleType::get();--}}
                        {{----}}
                        {{--@endphp--}}
                            {{--@foreach($transports as $transport)--}}
                            {{--<tr>--}}
                            {{--@php--}}
                                {{--$vehicle_type=\App\VehicleType::find($transport->vehicle_id);--}}
                                {{--$vehicle_type_code=\App\VehicleType::find($transport->vehicle_id)->code;--}}
                            {{--@endphp--}}
                                {{--<td><select name="vehicle_id" id="vehicle_id">--}}
                                    {{--<option value=""></option>--}}
                                    {{--@foreach($vehicle_list as  $vehicle)--}}
                                    {{--<option value="{{ $vehicle['id'] }}" @if($vehicle_type->id==$vehicle['id']) selected @endif data-rate="{{ $vehicle['rate_per_km'] }}">{{ $vehicle['name'] }} ({{ $vehicle['code'] }})</option>--}}
                                    {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</td>--}}
                                {{--<td><input id="rate_per_km" value="{{$transport->vehicle_rate}}" name="rate_per_km" type="text" placeholder="0" required></td>--}}
                                {{--<td><input id="mileage" name="mileage" type="number" value="{{ bcadd($transport->mileage,0,2) }}" required></td>--}}
                                {{--<td><input id="total_cost" name="total_cost" type="text" disabled value="{{ bcadd($transport->vehicle_rate * $transport->mileage+$transport->commission,0,2)}}"></td>--}}
                            {{--</tr>--}}
                            {{--@php--}}
                            {{--$transport_total=$transport_total+(($transport->vehicle_rate * $transport->mileage)+$transport->commission);--}}
                            {{--@endphp--}}
                            {{--@endforeach--}}
                        {{--<tr class="">--}}
                            {{--  <td colspan="3" style="text-align:right;">Transport Total </td>--}}
                            {{--<th style="text-align:right;">USD {{number_format($transport_total,2)}}</th>--}}
                            {{--<th> </th>  --}}
                        {{--</tr class="">--}}
                           {{--<tr>--}}
                            {{--<td colspan="3" style="text-align:right;">Per Person Price for Transport </td>--}}
                            {{--<input type="hidden" name="tot_tr" id="tot_tr" value="{{bcadd(($transport_total),0,2)}}"/>--}}
                            {{--<th style="text-align:right;"><input type="text" id="trans_total" name="trans_total" value="{{bcadd(($transport_total)/$guests,0,2)}}" readonly /></th>--}}
                            {{--<th> </th>--}}
                        {{--</tr>--}}
                      {{----}}
                        {{--</tbody>--}}
                    </table>
                    <table class="table m-table m-table--head-bg-brand">
                        <thead>
                        <tr>
                            <th style="text-align:center;" colspan="5" >
                            MISCELLANEOUS
                            </th>
                        </tr>
                        </thead>
                    </table>
                    <table class="table m-table" id="misc">
                        
                            {{--@php--}}
                                {{--$miscellaneous_total=0;--}}
                                {{--$misc_index=0;--}}
                            {{--@endphp--}}
                  {{----}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Miscellaneous</th>--}}
                            {{--<th>Unit Price({{$currency->code}})</th>--}}
                            {{--<th>Quantity</th>--}}
                            {{--<th>Total Cost({{$currency->code}})</th>--}}
                            {{--<th style="width:10%">Action</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach($miscellaneous as $key=>$misc)--}}
                            {{--<tr id="misc_table{{$misc_index}}">--}}
                            {{--@php--}}
                                {{--$miscellan=App\Miscelloneous::find($misc->miscellaneous);--}}
                                {{--$extra_expenses=App\Miscelloneous::get();--}}
                            {{--@endphp--}}
                                {{--<td><select onchange="getExtraData({{$misc_index}})" id="misc{{$misc_index}}" name="misc[{{$misc_index}}][miscellanious]">--}}
                                    {{--@foreach($extra_expenses as $extra)--}}
                                        {{--<option value="{{$extra->id}}" @if($misc->miscellanious==$extra->id) selected @endif>{{$extra->name}}</option>--}}
                                    {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</td>--}}
                                {{--<td><input id="unit_price{{$misc_index}}" name="misc[{{$misc_index}}][unit_price]" type="text" value="{{ bcadd(($misc->unit_price),0,2)}}"></td>--}}
                                {{--<td><input id="total_quantity{{$misc_index}}" onchange="check_misc_total({{$misc_index}})" name="misc[{{$misc_index}}][unit_quantity]" type="number" value="{{ $misc->quantity }}"></td>--}}
                                {{--<td class="right-align"><input style="width:100px;" type="text" name="misc[{{$misc_index}}][total_misc]" id="total_misc{{$misc_index}}" value="{{bcadd(($misc->quantity * $misc->unit_price)+$misc->commission,0,2)}}" readonly/></td>--}}
                                {{--<td>--}}
                                {{--<a href="#misc" onclick="add_record({{$misc_index}})" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add"><i class="la la-plus"></i></a>--}}
                                {{--<a href="#misc" onclick="delete_record({{$misc_index}})" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{----}}
                            {{--@php--}}
                            {{--$miscellaneous_total=$miscellaneous_total+($misc->quantity * $misc->unit_price);--}}
                            {{--$misc_index++;--}}
                            {{--@endphp--}}
                            {{--@endforeach--}}
                            
                        </tbody>

                      
                </table>
<table class="table m-table">
<tbody>
<tr>
    {{--<td> 1 {{$currency->code}} = <input type="text" name="misc_currRate" id="misc_currRate" value="{{$miscellaneous[0]->currency_rate}}"/> LKR</td>--}}
</tr>
</tbody>
</table>
                   <table class="table m-table" id="">
                    <tbody>
                      {{--<b>  <tr class="m-table__row--warning">--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                            {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Miscellaneous Total </td>--}}
                            {{--<td class="right-align"><b> <input type="text" id="misc_total" value="{{bcadd($miscellaneous_total,0,2)}}" readonly style="background: #ffb822;text-align:  right;" /></b> </td>--}}
                        {{--</tr>--}}
                        {{--<tr style="background: lightyellow;">--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Per Person Price for Miscellaneous </td>--}}
                            {{--<td class="right-align"><b> <input type="text" id="misc_perPerson" value="{{bcadd(($miscellaneous_total)/$guests,0,2)}}" readonly style="background:lightyellow;text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="m-table__row--warning">--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Total for Transport and Miscellanious </td>--}}
                            {{--<td class="right-align"><b> <input type="text" id="tot_tr_misc" value="{{bcadd(($transport_total+$miscellaneous_total),0,2)}}" readonly style="background: #ffb822;text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                        {{--<tr style="background: bisque;">--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">VAT Amount </td>--}}
                            {{--<td class="right-align"><b> <input type="text" id="vat_tr_misc" value="{{bcadd(($transport_total+$miscellaneous_total)*$company->vat_rate,0,2)}}" readonly  style="background: bisque;text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                        {{--<tr style="background: oldlace;">--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Commission Amount </td>--}}
                            {{--<td class="right-align"><b> <input type="text" id="com_tr_misc" value="{{bcadd((($transport_total+$miscellaneous_total)+(($transport_total+$miscellaneous_total)*$company->vat_rate))*$company->tour_commission_rate,0,2)}}" readonly  style="background: oldlace;text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="m-table__row--warning">--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Total for Transport and Miscellaneous Amount </td>--}}
                            {{--<td class="right-align"><b> <input type="text" id="sub_tot_tr_misc" value="{{bcadd(($transport_total+$miscellaneous_total)+(($transport_total+$miscellaneous_total)*$company->vat_rate)+(($transport_total+$miscellaneous_total)+(($transport_total+$miscellaneous_total)*$company->vat_rate))*$company->tour_commission_rate,0,2)}}" readonly style="background: #ffb822;text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                        {{--<tr style="background: lightyellow;">--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                          {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Per Person price for Transport and Miscellaneous</td>--}}
                            {{--<td class="right-align"><b> <input type="text" id="ppr_tr_misc" value="{{bcadd((($transport_total+$miscellaneous_total)+(($transport_total+$miscellaneous_total)*$company->vat_rate)+(($transport_total+$miscellaneous_total)+(($transport_total+$miscellaneous_total)*$company->vat_rate))*$company->tour_commission_rate)/$guests,0,2)}}" readonly style="background: lightyellow;text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                        {{--<tr style="background: antiquewhite;">--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Sub Total </td>--}}
                            {{--<td class="right-align"><b><input type="text" name="sub_total" id="sub_total" value="" readonly style="background: antiquewhite;text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                        {{--<tr style="background: bisque;">--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">NBT Amount </td>--}}
                            {{--<td class="right-align"><b><input type="text" name="nbt_amnt" id="nbt_amnt" value="" readonly style="background: bisque; text-align:  right;" /></b></td>--}}
                        {{--</tr>--}}
                           {{--<tr class="m-table__row--warning">--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                             {{--<td> </td>--}}
                            {{--<td colspan="3" style="text-align:right;">Total Per Person Price </td>--}}
                            {{--<td class="right-align"><b><input type="text" name="grand_total" id="grand_total" value="" readonly style="background: #ffb822; text-align:  right;" /></b></td>--}}
                        {{--</tr> </b>--}}
                    </tbody>
                </table>

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
        </form>
        </div>
</div>
</div>


@endsection
@section('Guest_Scripts')
@parent
<script>
{{--var mileage = parseFloat({{$transports[0]->mileage}});--}}
    {{--$(document).ready(function () {--}}


        {{--$mileage = $('#mileage');--}}
        {{--$total_cost = $('#total_cost');--}}
        {{--var xh = $.ajax({--}}
            {{--url: '{{url("tours/get-guest-hotel/".$tour->id."/".$guest->id)}}',--}}
            {{--type: "GET",--}}
            {{--success: function (data) {--}}
                {{--//console.log(data);--}}
                {{--for (i = 0; i < data.length; i++) {--}}
                    {{--$('#hotel'+i).append('<option selected value="'+data[i].hotel+'">'+data[i].name+'</option>');--}}
                    {{--$('#roomtype'+i).append('<option selected value="'+data[i].room_type_id+'">'+data[i].room_name+'</option>');--}}
                    {{--$('#packages'+i).append('<option selected value="'+data[i].package+'">'+data[i].package_name+'</option>');--}}
                    {{--$('#price'+i).val(parseFloat(data[i].package_price).toFixed(2));--}}
                    {{--$('#currencyRate'+i).val(parseFloat(data[i].currency_rate).toFixed(2));--}}
                    {{--$('#actPrice'+i).val(parseFloat(data[i].package_price).toFixed(2));--}}
                    {{--$('select').select();--}}
                    {{--packagePrice({{$tour->id}},data[i].hotel,data[i].package,i);--}}
                    {{--calculateTotal();--}}
                    {{--cal_grand_total();--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}

        {{--$('body').on('change', '#edit_vehicle_id', function(event) {--}}
            {{--var rate_per_km = $(this).find(':selected').attr('data-rate');--}}
            {{--$('#edit_total_cost').val(rate_per_km);--}}
            {{--$('#edit_vehicle_rate').val(rate_per_km);--}}
            {{--var mileage_edit = parseInt($('#edit_mileage').val());--}}
            {{--$('#edit_total_cost').val(mileage_edit * rate_per_km);--}}
        {{--});--}}

        {{--$('body').on('change', '#edit_mileage', function(event) {--}}
            {{--var rate_per_km = $('#edit_vehicle_id').find(':selected').attr('data-rate');--}}
            {{--$('#rate_per_km').val(rate_per_km);--}}
            {{--var mileage_edit = parseInt($('#edit_mileage').val());--}}
            {{--$('#edit_total_cost').val(mileage_edit * rate_per_km);--}}
        {{--});--}}

        {{--$('#vehicle_id').change(function (event) {--}}
            {{--var rate_per_km = $(this).find(':selected').attr('data-rate');--}}
            {{--$('#vehicle_rate').val(rate_per_km);--}}
            {{--$('#rate_per_km').val(rate_per_km);--}}
            {{--$total_cost.val(mileage * rate_per_km);--}}
        {{--});--}}



        {{--$mileage.change(function (event) {--}}
            {{--var rate_per_km = $('#vehicle_id').find(':selected').attr('data-rate');--}}
            {{--$('#vehicle_rate').val(rate_per_km);--}}
            {{--$('#rate_per_km').val(rate_per_km);--}}
            {{--var mileage = $(this).val();--}}
            {{--$total_cost.val(mileage * rate_per_km);--}}
        {{--});--}}

        {{--$('body').on('click', '.edit-reset-button', function (event) {--}}
            {{--event.preventDefault();--}}
            {{--$('#transport-grid').html('');--}}
            {{--$('#add-tr-form').hide('show');--}}

        {{--});--}}


    {{--});--}}

    {{--function getHotelRooms(id) {--}}
        {{--var hotelId = $('#hotel' + id).val();--}}

        {{--var xh = $.ajax({--}}
            {{--url: '/tours/get-hotel-rooms/' + hotelId + '',--}}
            {{--type: "GET",--}}
            {{--success: function (data) {--}}
                {{--if (data.length > 0) {--}}
                    {{--var html = '';--}}
                    {{--html += '<option selected value="">--SELECT--</option>';--}}
                    {{--for (i = 0; i < data.length; i++) {--}}
                        {{--html += '<option value="' + data[i].room_id + '">' + data[i].room_name + '</option>';--}}
                    {{--}--}}
                    {{--$('#roomtype' + id).html(html);--}}
                    {{--$('select').select();--}}
                {{--}--}}

            {{--}--}}

        {{--})--}}
    {{--}--}}

    {{--function getPackages(id) {--}}
        {{----}}
        {{--var hotelId = $('#hotel' + id).val();--}}
        {{--var roomId = $('#roomtype' + id).val();--}}
        {{--var xh = $.ajax({--}}
            {{--url: '/tours/get-hotel-packages/' + hotelId + '/' + roomId+'/{{$tour->id}}',--}}
            {{--type: "GET",--}}
            {{--success: function (data) {--}}
                {{--//console.log(data);--}}
                {{--if (data.length > 0) {--}}
                    {{--var html = '';--}}
                    {{--html += '<option selected value="">--SELECT--</option>';--}}
                    {{--for (i = 0; i < data.length; i++) {--}}

                        {{--html += '<option value="' + data[i].package_id + '">' + data[i].package_name + '</option>';--}}
                    {{--}--}}
                    {{--$('#packages' + id).html(html);--}}
                    {{--$('select').select();--}}
                {{--}else{--}}
                    {{--html += '<option selected value="">--No Available Packages--</option>';--}}
                    {{--$('#packages' + id).html(html);--}}
                    {{--$('#price' + id).val(0);--}}
                    {{--$('select').select();--}}
                {{--}--}}
            {{--}--}}
        {{--})--}}
    {{--}--}}

    {{--function getPackagePrice(id) {--}}
        {{--var hotelId = $('#hotel' + id).val();--}}
        {{--var roomId = $('#roomtype' + id).val();--}}
        {{--var packageId = $('#packages' + id).val();--}}
        {{--var xh = $.ajax({--}}
            {{--url: '/tours/get-package-price/' + hotelId+'/'+packageId + '/{{$tour->id}}',--}}
            {{--type: "GET",--}}
            {{--success: function (data) {--}}
                {{--//console.log(data)--}}
                {{--if(data.offer_rate){--}}
                    {{--$('#price' + id).val(parseFloat(parseFloat(parseFloat(data.offer_rate/data.max_count)+(parseFloat(data.offer_rate/data.max_count)*parseFloat({{$company->tour_commission_rate}})))*parseFloat( $('#currencyRate'+i).val())).toFixed(2));--}}
                    {{--$('#actPrice' + id).val($('#price' + id).val());--}}
                {{--}--}}
                {{--else if(data.standard_rate){--}}
                    {{--//$('#price' + id).val(parseFloat(data.standard_rate/data.max_count).toFixed(2));--}}
                    {{--$('#price' + id).val(parseFloat(parseFloat(parseFloat(data.standard_rate/data.max_count)+(parseFloat(data.standard_rate/data.max_count)*parseFloat({{$company->tour_commission_rate}})))*parseFloat( $('#currencyRate'+i).val())).toFixed(2));--}}
                    {{--$('#actPrice' + id).val($('#price' + id).val());--}}
                {{----}}
                {{--}else{--}}
                    {{--$('#price' + id).val('0.00');--}}
                    {{--$('#actPrice' + id).val($('#price' + id).val());--}}
                {{--}--}}
                {{--calculateTotal();--}}
                {{--cal_grand_total();--}}
            {{--}--}}
        {{--})--}}

    {{--}--}}

    {{--function packagePrice(tourId,hotelId,packageId,id) {--}}
        {{----}}
        {{--var xh = $.ajax({--}}
            {{--url: '/tours/get-package-price/' + hotelId + '/'+packageId+'/'+tourId,--}}
            {{--type: "GET",--}}
            {{--success: function (data) {--}}
                {{--//console.log('Package: ',data);--}}
                {{--getCurrency(data.currencies_id,id)--}}
                {{--calculateTotal();--}}
                {{--cal_grand_total();--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
    {{--function rateChanged(id){--}}
        {{--if($('#currencyRate' + id).val()!=0)--}}
           {{--$('#price' + id).val($('#actPrice' + id).val()*$('#currencyRate' + id).val());--}}
        {{--else--}}
            {{--$('#price' + id).val($('#actPrice' + id).val());--}}

        {{--calculateTotal();--}}
        {{--cal_grand_total();--}}
    {{----}}
    {{--}--}}
    {{--function getCurrency(id,index) {--}}
        {{----}}
        {{--var xh = $.ajax({--}}
            {{--url: '/currency/get/' + id,--}}
            {{--type: "GET",--}}
            {{--success: function (data) {--}}
                {{--//console.log(data);--}}
                {{--$('#currency'+index).val(data.code);--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
    {{--function calculateTotal() {--}}
        {{--var total = 0;--}}
        {{--$('[id^="price"]').each(function () {--}}
            {{--var elementIndex = $(this).attr("id");--}}
            {{--elementIndex = elementIndex.replace("price", "");--}}
            {{--var price = $('#price' + elementIndex).val();--}}
            {{--total += parseFloat(price*1);--}}
        {{--});--}}

        {{--$('#total').val(parseFloat(total).toFixed(2));--}}
        {{--$('#perPerson').val(parseFloat(total/{{$guests}}).toFixed(2));--}}
    {{--}--}}
    {{--function getExtraData(id) {--}}
        {{--var misc_id = $('#misc' + id).val();--}}

        {{--var xh = $.ajax({--}}
            {{--url: '/tours/get-extra-price/' + misc_id + '',--}}
            {{--type: "GET",--}}
            {{--success: function (data) {--}}
                {{--//console.log(data);--}}
                {{--$('#unit_price' + id).val(parseFloat(parseFloat(parseFloat(data.unit_price)+parseFloat(data.unit_price)*parseFloat({{$company->tour_commission_rate}}))/parseFloat($('#misc_currRate').val())).toFixed(2));--}}
                {{--$('#total_misc' + id).val(parseFloat(parseFloat(parseFloat(data.unit_price*$('#total_quantity' + id).val())+parseFloat(parseFloat(data.unit_price*$('#total_quantity' + id).val())*parseFloat({{$company->tour_commission_rate}})))/parseFloat($('#misc_currRate').val())).toFixed(2));--}}
                {{--calculateExtraTotal();--}}
                {{--cal_grand_total();--}}
            {{--}--}}

        {{--})--}}
    {{--}--}}

    {{--function calculateExtraTotal() {--}}
        {{--var total = 0;--}}
        {{--$('[id^="total_misc"]').each(function () {--}}
            {{--var elementIndex = $(this).attr("id");--}}
            {{--elementIndex = elementIndex.replace("total_misc", "");--}}
            {{--var price = $('#total_misc' + elementIndex).val();--}}
            {{--total += parseFloat(price*1);--}}
        {{--});--}}

        {{--$('#misc_total').val(parseFloat(total).toFixed(2));--}}
        {{--$('#misc_perPerson').val(parseFloat(parseFloat(total)/parseFloat({{$guests}})).toFixed(2));--}}
        {{--$('#tot_tr_misc').val(parseFloat(parseFloat($('#misc_total').val())+parseFloat($('#tot_tr').val())).toFixed(2));--}}
        {{--$('#vat_tr_misc').val(parseFloat(parseFloat($('#tot_tr_misc').val())*parseFloat({{$company->vat_rate}})).toFixed(2));--}}
        {{--$('#com_tr_misc').val(parseFloat(parseFloat(parseFloat($('#tot_tr_misc').val())+parseFloat($('#vat_tr_misc').val()))*parseFloat({{$tour->tour_commission_rate}})).toFixed(2));--}}
        {{--$('#sub_tot_tr_misc').val(parseFloat(parseFloat($('#tot_tr_misc').val())+parseFloat($('#vat_tr_misc').val())+parseFloat($('#com_tr_misc').val())).toFixed(2));--}}
        {{--$('#ppr_tr_misc').val(parseFloat($('#sub_tot_tr_misc').val())/parseInt({{$guests}}));--}}
        {{--cal_grand_total();--}}
    {{--}--}}

    {{--function add_record(id){--}}
		{{--id=id+1;--}}
        {{--$('#misc > tbody:last-child').append('<tr id="misc_table'+id+'">@php $miscellan=App\Miscelloneous::find($misc->miscellaneous);$extra_expenses=App\Miscelloneous::get(); @endphp <td><select onchange="getExtraData('+id+')" id="misc'+id+'" name="misc['+id+'][miscellanious]"> @foreach($extra_expenses as $extra)<option value="{{$extra->id}}">{{$extra->name}}</option>@endforeach</select></td><td><input id="unit_price'+id+'" name="misc['+id+'][unit_price]" type="text" value=""></td><td><input id="total_quantity'+id+'" name="misc['+id+'][unit_quantity]" type="number" value="1"></td><td class="right-align"><input type="text" name="misc['+id+'][total_misc]" id="total_misc'+id+'" value="" readonly/></td><td><a href="#misc" onclick="add_record('+id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add"><i class="la la-plus"></i></a><a href="#misc" onclick="delete_record('+id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></a></td></tr>@php $misc_index++; @endphp');--}}
    {{--}--}}
    {{--function delete_record(id){--}}
        {{--$('#misc_table'+id).remove();--}}
        {{--calculateExtraTotal();--}}
        {{--cal_grand_total();--}}
    {{--}--}}

    {{--function check_misc_total(id){--}}
        {{--$('#total_misc' + id).val($('#unit_price' + id).val()*$('#total_quantity' + id).val());--}}
        {{--calculateExtraTotal()--}}
        {{--cal_grand_total()--}}
    {{--}--}}

    {{--function cal_grand_total(){--}}

        {{--$('#sub_total').val(parseFloat(Number($('#total').val())+Number($('#ppr_tr_misc').val())).toFixed(2));--}}
        {{--$('#nbt_amnt').val(parseFloat(Number($('#sub_total').val())*Number({{$company->nbt_rate}})).toFixed(2));--}}
        {{--$('#grand_total').val(parseFloat(Number($('#sub_total').val())+Number($('#nbt_amnt').val())).toFixed(2));--}}
    {{--}--}}


    {{--function viewExpense(transport_id) {--}}
        {{--$.ajax({--}}
            {{--url: "{{ route('tour-transports-show',$tour->id) }}",--}}
            {{--type: 'GET',--}}
            {{--dataType: 'html',--}}
            {{--success: function (res) {--}}
                {{--$('#trs-view-content').html(res);--}}
                {{--$('#transport-view-modal').modal('open');--}}
            {{--},--}}
            {{--error: function (res) {--}}
                {{--$.notify("View is not available!", "error");--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
</script>
@endsection