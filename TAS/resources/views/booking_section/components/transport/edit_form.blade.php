<div class="row">
    {{--{{route('tour-transport-update', $tour_transport->id)}}--}}
    <form class="col s12 ajax-form" method="POST" action="">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <input type="hidden" name="tour_id" value="{{ '$tour_transport->tour_id' }}">
            <input type="hidden" name="transport_id" id="edit_transport_id" value="{{ '$tour_transport->id' }}">
            <input type="hidden" id="edit_vehicle_rate" name="vehicle_rate" value="{{ '$tour_transport->vehicle_rate' }}">

            <div class="input-field col s12 m4 l4">
                <select name="vehicle_id" id="edit_vehicle_id">
                    <option value=""></option>
                    {{--@foreach($vehicle_list as  $vehicle)--}}
                        {{--<option value="{{ $vehicle['id'] }}"--}}
                                {{--data-rate="{{ $vehicle['rate_per_km'] }}"--}}
                                {{--{{ ($tour_transport->vehicle_id == $vehicle['id']) ? 'selected' : '' }}--}}
                        {{-->{{ $vehicle['name'] }} ({{ $vehicle['code'] }})--}}
                        {{--</option>--}}
                    {{--@endforeach--}}
                </select>
                <label for="vehicle_id" class="active"> Vehicle</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <input id="edit_mileage" name="mileage" type="number" value="{{ '$tour_transport->mileage' }}" required>
                <label for="mileage" class="active"> Mileage in KM</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <input id="edit_total_cost" name="total_cost" type="number" disabled
                       value="{{ '$tour_transport->mileage * $tour_transport->vehicle_rate' }}">
                <label for="total_cost" class="active"> Total Cost
                    in {{ '\App\VehicleTransportExpense::getBaseCurrency() ' }}</label>
            </div>
        </div>

        {{--@if(count($transport_expenses) > 0)--}}
            {{--<div class="row">--}}
                {{--<div class="col s12 m12">--}}
                    {{--<h6>Transport Expenses --}}{{--({{ $packs }} Packs)--}}{{--</h6>--}}
                {{--</div>--}}
                {{--@foreach($transport_expenses as $expense)--}}
                    {{--<div class="col s6 m3">--}}
                        {{--<p>--}}
                            {{--<input type="checkbox" name="expense[{{ $expense->id }}]" value="{{ $expense->pp_rate }}"--}}
                                   {{--id="edit_expense_{{ $expense->id }}" {{ (in_array($expense->id, $tour_expenses)) ? 'checked' : '' }} />--}}
                            {{--<label for="edit_expense_{{ $expense->id }}">{{ $expense->name }}<br>--}}
                                {{--<small>{{ number_format($expense->pp_rate, 2) .' '. \App\VehicleTransportExpense::getBaseCurrency() }}--}}
                                    {{--/ pack--}}
                                {{--</small>--}}
                            {{--</label>--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--@else--}}
            {{--<p>No Transport Expenses are available.</p>--}}
        {{--@endif--}}

        <div class="row">
            <div class="input-field col s12">
                <button class="btn deep-orange darken-2 waves-effect waves-light right ajax_form_submit" type="button"
                        type="submit" name="action" data-submit_type='edit'>Update
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
</div>