
<h5 class="breadcrumbs-title"><i class="material-icons">directions_car</i>  Transports</h5>
<br>
<table id="data-table" class="small-table data-table display bordered striped highlight" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Vehicle</th>
        <th class="right-align">Unit Price</th>
        <th>Mileage</th>
        <th class="right-align">Total Cost</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>


    {{--@if(isset($tour_transport) && $tour_transport->count() > 0)--}}
        {{--@foreach($tour_transport as $transport)--}}
            {{--<tr>--}}
                {{--<td>{{ \App\Vehicle::find($transport->vehicle_id)->name }} ({{ \App\Vehicle::find($transport->vehicle_id)->code  }})</td>--}}
                {{--<td class="right-align">{{ number_format($transport->vehicle_rate, 2) .' '. \App\VehicleTransportExpense::getBaseCurrency() }}</td>--}}
                {{--<td class="center-align">{{ $transport->mileage }} KM</td>--}}
                {{--<td class="right-align">{{ number_format(($transport->vehicle_rate * $transport->mileage), 2) .' '. \App\VehicleTransportExpense::getBaseCurrency() }}</td>--}}
                {{--<td>--}}
                    {{--<a href="javascript:;"--}}
                       {{--class="btn-floating waves-effect waves-light deep-orange darken-2" title="edit" onclick="editExpense({{ $transport->id }})">--}}
                        {{--<i class="material-icons">mode_edit</i>--}}
                    {{--</a>--}}
                    {{--<a href="javascript:;" data-href="{{route('tour-transport-edit', $transport->id )}}" class="btn-floating waves-effect waves-light deep-orange darken-2  js_edit_btn " title="edit">--}}
                        {{--<i class="material-icons">mode_edit</i>--}}
                    {{--</a>--}}
                    {{--<a href="javascript:;"--}}
                       {{--class="btn-floating waves-effect waves-light deep-blue darken-2" title="view" onclick="viewExpense({{ $transport->id }})">--}}
                        {{--<i class="material-icons">visibility</i>--}}
                    {{--</a>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
    {{--@else--}}
        {{--<tr>--}}
            {{--<td colspan="5" class="center-align">No records found.</td>--}}
        {{--</tr>--}}
    {{--@endif--}}
    </tbody>
</table>