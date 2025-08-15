<div class="row">
    <form class="col s12 ajax-form" method="POST" action="">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="input-field col s12 m6">
                <input readonly id="name" name="name" type="text" value="" autofocus>
                <label for="name" class="active">Title</label>
            </div>
            <div class="input-field col s12 m6">
                <input readonly placeholder="Vehicle Number" id="vehicle_no" name="vehicle_no" type="text"
                       class="validate"
                       maxlength="16" value="">
                <label for="vehicle_no" class="active">Vehicle Number (Should be Unique) *</label>
            </div>
            
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input readonly placeholder="License Expire Date" id="vehicle_lic_exp_date"
                       name="vehicle_lic_exp_date" type="text" class="validate datepicker"
                       maxlength="191" value="">
                <label for="vehicle_lic_exp_date" class="active">License Expire Date *</label>
            </div>
            <div class="input-field col s12 m6">
                <input readonly placeholder="Year of manufacture" id="year_of_manufacture" name="year_of_manufacture"
                       type="number" class="validate" maxlength="4" value="">
                <label for="year_of_manufacture" class="active">Year of manufacture *</label>
            </div>
            
        </div>
        <div class="row">
            
            
        </div>
        <div class="row">
            
            <div class="input-field col s12 m6">
                <input readonly placeholder="Year of Registration (Sri Lanka)" id="year_of_sl_registration"
                       name="year_of_sl_registration" type="number"
                       class="validate"
                       maxlength="4" value="">
                <label for="year_of_sl_registration" class="active">Year of Registration (Sri Lanka) *</label>
                {{--@if ($errors->has('year_of_sl_registration'))--}}
                    {{--<div class="error"> {{ $errors->first('year_of_sl_registration') }}  </div>--}}
                {{--@endif--}}
            </div>
            <div class="input-field col s12 m6">
                <select disabled name="vehicle_type_id" id="vehicle_type_id">
                    <option value="" disabled>Choose your option</option>
                    {{--@if(count($vehicle_types))--}}
                        {{--@foreach($vehicle_types as $vtype)--}}
                            {{--<option value="{{$vtype->id}}"--}}
                                    {{--@if($element->vehicle_type_id == $vtype->id) selected @endif >{{$vtype->code}}--}}
                                {{--- {{$vtype->name}}</option>--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                </select>
                <label for="vehicle_type_id" class="active">Vehicle type</label>
            </div>
        </div>
        <div class="row">
            
            <div class="input-field col s12 m6">
                <select disabled name="supplier_id" id="supplier_id">
                    <option value="" disabled>Choose your option</option>
                    {{--@if(count($suppliers))--}}
                        {{--@foreach($suppliers as $supplier)--}}
                            {{--<option value="{{$supplier->id}}"--}}
                                    {{--@if($element->supplier_id == $supplier->id) selected @endif >{{$supplier->code}}--}}
                                {{--- {{$supplier->name}}</option>--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                </select>
                <label for="supplier_id" class="active">Supplier</label>
            </div>
            <div class="input-field col s12 m6">
                <textarea readonly  name="remarks" id="remarks" placeholder="remarks"
                          class="materialize-textarea"></textarea>
                <label for="remarks" class="active">Remarks</label>
            </div>
        </div>
        <div class="row">
            
            <div class="input-field col s12 m6">
                <select disabled name="status" id="status">
                    <option value="1"  >Active</option>
                    <option value="0" >Inactive</option>
                </select>
                <label for="status" class="active">Status</label>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        format: 'dd-mm-yyyy',
        formatSubmit: 'yyyy/mm/dd',
        closeOnSelect: false// Close upon selecting a date,
    });
</script>