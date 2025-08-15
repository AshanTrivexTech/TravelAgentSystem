<form class="cleafix" method="POST" action="" id="add-tr-form">
    {{csrf_field()}}
    <div class="row">
        <input type="hidden" name="tour_id" value="{{ '$tour_id' }}">
        <input type="hidden" id="vehicle_rate" name="vehicle_rate" value="0">

        <div class="input-field col s12 m4 l4">
            <select name="vehicle_id" id="vehicle_id">
                <option value=""></option>
                {{--@foreach($vehicle_list as  $vehicle)--}}
                {{--<option value="{{ $vehicle['id'] }}"--}}
                {{--data-rate="{{ $vehicle['rate_per_km'] }}">{{ $vehicle['name'] }} ({{ $vehicle['code'] }})--}}
            {{--</option>--}}
            {{--@endforeach--}}
        </select>
        <label for="vehicle_id"> Vehicle</label>
    </div>
    <div class="input-field col s12 m4 l4">
        <input id="mileage" name="mileage" type="number" value="{{ '$mileage' }}" required>
        <label for="mileage" class="active"> Mileage in KM</label>
    </div>
    <div class="input-field col s12 m4 l4">
        <input id="total_cost" name="total_cost" type="number" disabled value="0">
        <label for="total_cost" class="active"> Total Cost
        in {{ \App\VehicleTransportExpense::getBaseCurrency()  }}</label>
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
            {{--id="expense_{{ $expense->id }}"/>--}}
            {{--<label for="expense_{{ $expense->id }}">{{ $expense->name }}<br>--}}
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


    <div class="input-field col s12 m12 l12">
        <button class="btn waves-effect green dark-2 pull-right" name="action">Save</button>
        <button class="btn waves-effect red accent-2 pull-right reset-button" type="reset" name="action">Reset
        </button>
    </div>

</div>
</form>


<!-- Modal Structure -->
<div id="transport-view-modal" class="modal">
    <div class="modal-content">
        <h4>Transport Details</h4>
        <div id="trs-view-content"></div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

@section('javascript')
@parent
<script type="text/javascript">
    var mileage = parseFloat({{'$mileage'}});
    jQuery(document).ready(function ($) {
        $mileage = $('#mileage');
        $total_cost = $('#total_cost');

        $('.modal').modal({
                inDuration: 300, // Transition in duration
                outDuration: 200 // Transition out duration
            });

        $('body').on('change', '#edit_vehicle_id', function(event) {
            var rate_per_km = $(this).find(':selected').attr('data-rate');
            $('#edit_vehicle_rate').val(rate_per_km);
            var mileage_edit = parseInt($('#edit_mileage').val());
            $('#edit_total_cost').val(mileage_edit * rate_per_km);
        });

        $('body').on('change', '#edit_mileage', function(event) {
            var rate_per_km = $('#edit_vehicle_id').find(':selected').attr('data-rate');
            $('#edit_vehicle_rate').val(rate_per_km);
            var mileage_edit = parseInt($('#edit_mileage').val());
            $('#edit_total_cost').val(mileage_edit * rate_per_km);
        });

        $('#vehicle_id').change(function (event) {
            var rate_per_km = $(this).find(':selected').attr('data-rate');
            $('#vehicle_rate').val(rate_per_km);
            $total_cost.val(mileage * rate_per_km);
        });



        $mileage.change(function (event) {
            var rate_per_km = $('#vehicle_id').find(':selected').attr('data-rate');
            $('#vehicle_rate').val(rate_per_km);
            var mileage = $(this).val();
            $total_cost.val(mileage * rate_per_km);
        });

        $('#add-tr-form').submit(function (event) {
            event.preventDefault();
            var data = $(this).serializeArray();
            $('#reset-button').trigger('click');

            $.ajax({
                url: "{{ route('tour-transport-store') }}",
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (res) {
                   // console.log(res);
                    if (res.success) {
                        $.notify(res.message, "success");
                        tranportGrid();
                        $('.reset-button').trigger('click');
                    } else {
                        $.notify(res.message, "error");
                    }
                },
                error: function (error) {
                    $.notify(error.message, "error");
                }

            });

        });


        tranportGrid();

        $('body').on('click', '.edit-reset-button', function (event) {
            event.preventDefault();
            $('#transport-grid').html('');
            $('#add-tr-form').hide('show');

        });


    });


    function viewExpense(transport_id) {
        $.ajax({
            url: "{{ 'route(tour-transports-show $tour_id' }}",
            type: 'GET',
            dataType: 'html',
            success: function (res) {
                $('#trs-view-content').html(res);
                $('#transport-view-modal').modal('open');
            },
            error: function (res) {
                $.notify("View is not available!", "error");
            }
        });
    }

    function tranportGrid() {
        $.ajax({
            {{--url: "{{ route('tour-transport-grid',$tour_id) }}",--}}
            url: "",
            type: 'GET',
            dataType: 'html',
            success: function (grid) {
                $('#transport-grid').html(grid);
            }
        });
    }



</script>

@endsection