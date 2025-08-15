{{--@php--}}
    {{--$total_vehicle_cost = $tour_transport['mileage'] * $tour_transport['vehicle_rate'];--}}
    {{--$expenses_cost = 0;--}}
{{--@endphp--}}
<table>
    <thead class="blue darken-1">
    <tr>
        <th colspan="2">Vehicle Information</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <th>Vehicle Type</th>
        <td class="right-align"></td>
        {{--{{ $tour_transport['vehicle_info']['name'] }} ({{ $tour_transport['vehicle_info']['code'] }})--}}
    </tr>
    <tr>
        <th>Passengers</th>
        <td class="right-align">{{ '$pax' }}</td>
    </tr>
    <tr>
        <th>Mileage</th>
        <td class="right-align">{{  }} KM</td>
        {{--$tour_transport['mileage']--}}
    </tr>
    <tr class="right-align">
        <th>Vehicle Rate</th>
        <td class="right-align">{{  }}</td>
{{--        number_format($tour_transport['vehicle_rate'],2) }} {{ \App\VehicleTransportExpense::getBaseCurrency()--}}
    </tr>
    <tr class="right-align blue lighten-5">
        <th>Total Mileage Cost</th>
        <td class="right-align">{{  }}</td>
{{--        number_format($total_vehicle_cost,2) }} {{ \App\VehicleTransportExpense::getBaseCurrency()--}}
    </tr>


    </tbody>
</table>
<hr>
<table>
    <thead class="blue darken-1">
    <tr>
        <th colspan="2">Vehicle Expenses</th>
    </tr>

    </thead>
    <tbody>

    {{--@foreach($tour_transport['expenses'] as $expense)--}}
        {{--@php--}}
            {{--$expense_info = \App\VehicleTransportExpense::find($expense['expense_id']);--}}
            {{--$expenses_cost += floatval($expense_info->pp_rate);--}}
        {{--@endphp--}}
        {{--<tr>--}}
            {{--<th>{{ $expense_info->name }} ({{ $expense_info->code }})</th>--}}
            {{--<td class="right-align">{{ number_format($expense_info->pp_rate,2) }} {{ \App\VehicleTransportExpense::getBaseCurrency() }}</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
    <tr class="blue lighten-5">
        <th>Total Vehicle Expense Cost</th>
        <td class="right-align">{{  }}</td>
{{--        number_format($expenses_cost,2 )  }} {{ \App\VehicleTransportExpense::getBaseCurrency()--}}
    </tr>
    </tbody>
</table>
<hr>
<table>
    <thead class="blue darken-1">
    <tr>
        <th  colspan="2">Total Cost per person</th>
        {{--title="{{ $total_vehicle_cost }} X {{ $expenses_cost }} / {{ $pax }}"--}}
    </tr>

    </thead>
    <tbody>
    <tr class="blue lighten-5">
        <th>Cost per person</th>
        <td class="right-align"></td>
        {{--{{ number_format(($total_vehicle_cost + $expenses_cost) /$pax, 2)  }} {{ \App\VehicleTransportExpense::getBaseCurrency() }}--}}
    </tr>
    </tbody>
</table>