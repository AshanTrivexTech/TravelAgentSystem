<h5 class="breadcrumbs-title"><i class="material-icons">shopping_basket </i> Miscellaneous</h5>
<br>
<table id="data-table" class="small-table data-table display bordered striped highlight" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Type</th>
        <th>Unit Price</th>
        <th>QTY</th>
        <th>Total Cost</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>


    {{--@if(isset($miscellaneous) && $miscellaneous->count() > 0)--}}
        {{--@foreach($miscellaneous as $misc)--}}
            {{--<tr>--}}
                {{--<td class="center-align">{{ $misc->name }}</td>--}}
                {{--<td class="right-align">{{ number_format(($misc->unit_price), 2) .' '. \App\VehicleTransportExpense::getBaseCurrency() }}</td>--}}
                {{--<td class="center-align">{{ $misc->quantity }} KM</td>--}}
                {{--<td class="right-align">{{ number_format(($misc->quantity * $misc->unit_price), 2) .' '. \App\VehicleTransportExpense::getBaseCurrency() }}</td>--}}
                {{--<td>--}}
                    {{--<a href="javascript:;" data-href="{{route('tour-miscellaneous-edit', $misc->id )}}"--}}
                       {{--class="btn-floating waves-effect waves-light deep-orange darken-2  js_edit_btn " title="edit">--}}
                        {{--<i class="material-icons">mode_edit</i>--}}
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