<div class="row">
    <form class="col s12 ajax-form" method="POST" action="">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div class="input-field col s12 m12">
                <input readonly placeholder="unique code" id="code" name="code" type="text" class="validate"
                       maxlength="16" value="">
                <label for="code" class="active">Code (Should be Unique) *</label>
            </div>
            <div class="input-field col s12 m12">
                <input readonly placeholder="unique name" id="name" name="name" type="text" class="validate"
                       maxlength="191" value="">
                <label for="name" class="active">Title (Should be Unique) *</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m12">
                <select disabled  name="market_id" id="market_id">
                    <option value=""></option>
                    {{--@foreach($markets as $key => $market)--}}
                        {{--<option value="{{$market->id}}"--}}
                                {{--@if($element->market_id == $market->id)selected="selected"@endif>{{$market->name}}</option>--}}
                    {{--@endforeach--}}
                </select>

                <label for="market_id" class="active">Market</label>
            </div>
        </div>
    </form>
</div>   