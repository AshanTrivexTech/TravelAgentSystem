<div class="row">
    <form class="col s12 ajax-form" method="POST" action="{{route('market-update', $element->id)}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div class="input-field col s12 m6">
                <input readonly placeholder="unique code" id="code" name="code" type="text" class="validate"
                       maxlength="16" value="{{ $element->code }}">
                <label for="code" class="active">Code (Should be Unique) *</label>
            </div>
            <div class="input-field col s12 m6">
                <input readonly placeholder="unique name" id="name" name="name" type="text" class="validate"
                       maxlength="191" value="{{ $element->name }}">
                <label for="name" class="active">Title (Should be Unique) *</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m12">
                <select disabled multiple="multiple" name="country_id[]" id="country_id">
                    <option value=""></option>
                    @foreach($countries as $key => $country)
                        @if(count($element->countries) > 0)
                            @foreach($element->countries as $market_country)
                                <option value="{{$country->id}}"
                                        @if($country->id == $market_country->country_id)selected="selected"@endif>{{$country->name}}</option>
                            @endforeach
                        @else
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endif
                    @endforeach
                </select>

                <label for="country_id" class="active">Countries</label>
            </div>
        </div>

    </form>
</div>   