{{--@php--}}

{{--$tour_routes = \App\TourQuotaionRoutes::where('tour_quotation_routes.tour_id',$tour_id)->orderBy('tour_quotation_routes.date', 'asc')->get();--}}

{{--@endphp--}}
<h5 class="breadcrumbs-title"><i class="material-icons">all_inclusive</i>  Summary</h5>
<br>
<div class="row">
    <div class="col s12 m12">
        <table class="bordered">
            <tbody>
            <tr>
                <th colspan="6" class="center-align">
                    {{ '$element->title' }}
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <strong>Agent Name: </strong> <br>
                    {{ '\App\Agent::find($element->agent_id)->name' }}
                </th>
                <td colspan="2">
                    <strong>Period of stay: </strong> <br>
                    {{--{{ \Carbon\Carbon::parse($element->from_date)->format('jS, F Y') }}--}}
                    {{--- {{ \Carbon\Carbon::parse($element->to_date)->format('jS, F Y') }}--}}
                </td>
                <td colspan="2">
                    <strong>No.of packs</strong> <br>
                    {{ '$packs' }}
                </td>
            </tr>
             <tr>
                <th colspan="6" class="center-align">
                    ACCOMMODATION
                </th>
            </tr>
            <tr>
                <td colspan="8">
                    <table >
                        <thead>
                        <tr>
                            <th>Day</th>
                            <th>Route</th>
                            <th>Mileage</th>
                            <th>Hotel</th>
                            <th>RoomType</th>
                            <th>Package</th>
                            <th style="width:10%">DBL</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@php--}}
                        {{--$total=0;--}}
                        {{--@endphp--}}
                        {{--@foreach($tour_routes as $tour_route)--}}
                            {{--<tr>--}}
                                {{--<td>{{ $tour_route->day }}</td>--}}
                                {{--@php--}}
                                    {{--$destinations = explode(',', $tour_route->destination);--}}
                                    {{--$locations = \App\Location::select('name')->whereIn('id', $destinations)->get()->toArray();--}}

                                {{--@endphp--}}
                                {{--<td>{{ \App\Location::listLocation($locations) }}</td>--}}
                                {{--<td>{{ $tour_route->distance }}</td>--}}

                                {{--@php--}}
                                {{--$quotation_hotel =  \App\TourQuotationHotel::where('date', $tour_route->date)->where('tour_id', $tour_id)->first();--}}
                                {{--@endphp--}}

                                {{--<td>{{ $quotation_hotel->hotel->name}}</td>--}}
                                {{--<td>{{ $quotation_hotel->package->RoomType->room_name }}</td>--}}
                                {{--<td>{{ $quotation_hotel->package->package_name}}</td>--}}
                                {{--@php--}}
                                    {{--$hotel_prices=\App\TourQuotationHotel::where('hotel_id',$quotation_hotel->hotel->id)--}}
                                    {{--->where('package_id',$quotation_hotel->package->id)->where('tour_id',$tour_id)->where('roomtype_id',$quotation_hotel->package->RoomType->id)->where('date',$tour_route->date)->first();--}}
                                    {{--$total=$total+$hotel_prices->price;--}}
                                {{--@endphp--}}
                                {{--<td class="right-align">USD {{ $hotel_prices->price }}.00</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                            {{--<tr>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{----}}
                               {{--<th>Accomadation Total Price</th>--}}
                            {{--<th class="right-align">USD {{ number_format($total, 2)}}</th>--}}
                   {{----}}
                           {{----}}
                            {{--</tr>--}}
                             {{--<tr>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                            {{--<th>Accomadation Per Person Price</th>--}}
                            {{--<th class="right-align">USD {{number_format($total/2,2)}}</th>--}}
                   {{----}}
                        </tbody>
                    </table>
                </td>
            </tr>
           
            <tr>
                <th colspan="6" class="center-align">
                    TRANSPORTATIONs
                </th>
            </tr>
            <tr>
                <td colspan="6">
                    <table>
                        <thead>
                        <tr>
                            <th>Vehicle Type</th>
                            <th>Unit Price</th>
                            <th>Mileage</th>
                            <th style="width:10%">Total Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                      
                          
                            <tr>
                                <td></td>
                                <td>USD </td>
                                <td>KM</td>
                                <td></td>
                            </tr>
                      
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Transport Total</th>
                            <th>USD </th>
                        </tr>
                           <tr>
                            <th></th>
                            <th></th>
                            <th>Per Person Price for Transport</th>
                            <th>USD </th>
                        </tr>
                      
                        </tbody>
                    </table>
                </td>
            </tr>
         <tr>     
            <tr>
                <th colspan="6" class="center-align">
                    MISCELLANEOUS
                </th>
            </tr>
            <tr>
                <td colspan="6">

                    <table class="table m-table">
                        <thead>
                        <tr>
                            <th>Miscellaneous</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th style="width:10%">Total Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                           
                                <td></td>
                                <td></td>
                                <td> </td>
                                <td class="right-align">USD</td>
                            </tr>
                           
                        </tbody>

                        <tfooter>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Miscellaneous Total</th>
                            <th class="right-align">USD </th>
                        </tr>
                           <tr>
                            <th></th>
                            <th></th>
                            <th>Per Person Price for Miscellaneous</th>
                            <th class="right-align">USD </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th class="right-align">USD </th>
                        </tr> 
                           <tr class="m-table__row--warning">
                            <th></th>
                            <th></th>
                            <th>Total Per Person Price</th>
                            <th class="right-align">USD </th>
                        </tr>
                        </tfooter>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>