<h5 class="breadcrumbs-title"><i class="material-icons">insert_drive_file</i>  Invoice</h5>
<br>
<form class="cleafix" method="POST" action="{{url('tours/update/$tour_id)}}">
    {{csrf_field()}}
 
    <div class="row">
        <div class="input-field col s12 m6">
            <select name="market_id" id="market_id">

                {{--@if(count($markets))--}}
                    {{--@foreach($markets as $market)--}}
                        {{--<option value="{{$market->id}}"--}}
                                {{--@if($element->market_id == $market->id) selected @endif >{{$market->code}}--}}
                            {{--- {{$market->name}}</option>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            </select>
            <label for="market_id">Market</label>
            {{--@if ($errors->has('market_id'))--}}
                {{--<div class="error"> {{ $errors->first('market_id') }}  </div>--}}
            {{--@endif--}}
        </div>
        <div class="input-field col s12 m6">
            <select name="agent_id" id="agent_id">

                {{--@if(count($agents))--}}
                    {{--@foreach($agents as $agent)--}}
                        {{--<option value="{{$agent->id}}"--}}
                                {{--@if($element->agent_id == $agent->id) selected @endif >{{$agent->code}}--}}
                            {{--- {{$agent->name}}</option>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            </select>
            <label for="agent_id">Agent</label>
            {{--@if ($errors->has('agent_id'))--}}
                {{--<div class="error"> {{ $errors->first('agent_id') }}  </div>--}}
            {{--@endif--}}
        </div>
        <div class="input-field col s12 m12 l6">
            <select name="branch_id" id="branch_id">

                {{--@if(count($branches))--}}
                    {{--@foreach($branches as $branch)--}}
                        {{--<option value="{{$branch->id}}"--}}
                                {{--@if(old('branch_id') == $branch->id) selected @endif >{{$branch->code}}--}}
                            {{--- {{$branch->name}}</option>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            </select>
            <label for="branch_id">Branch</label>
            {{--@if ($errors->has('branch_id'))--}}
                {{--<div class="error"> {{ $errors->first('branch_id') }}  </div>--}}
            {{--@endif--}}
        </div>

        <div class="clearfix"></div>
        <div class="input-field col s12 m6">
            <input id="title" name="title" type="text" class="validate" value="{{ '$element->title' }}">
            <label for="name">Title</label>
            {{--@if ($errors->has('title'))--}}
                {{--<div class="error"> {{ $errors->first('title') }}  </div>--}}
            {{--@endif--}}
        </div>
        <div class="input-field col s6 m6 ">
            @php
                $array =[
                'ROUND'=>'Round Tour',
                'HOTELONLY'=>'Accommodation Only',
                'TRANSPORTONLY'=>'Transport Only',
                ];


            @endphp

            <select name="tourType" id="tourType">

                {{--@foreach($array as $key=>$value)--}}

                    {{--@if($element->tour_type==$key)--}}
                        {{--<option selected value="{{$element->tour_type}}">{{$value}}</option>--}}
                    {{--@elseif($element->tour_type!=$key)--}}
                    {{--<option value="{{$key}}">{{$value}}</option>--}}
                    {{--@endif--}}
                {{--@endforeach--}}

            </select>
            <label for="tourType">Tour Type</label>
            {{--@if ($errors->has('tourType'))--}}
                {{--<div class="error"> {{ $errors->first('tourType') }}  </div>--}}
            {{--@endif--}}
        </div>
        <div class="input-field col s12 m12 l6">
            <input type="text" id="start_date" name="start_date" class="datepicker" value="{{'$element->from_date'}}">
            <label for="start_date">Start Date</label>
            {{--@if ($errors->has('start_date'))--}}
                {{--<div class="error"> {{ $errors->first('start_date') }} </div>--}}
            {{--@endif--}}
        </div>

        <div class="input-field col s12 m12 l6">
            <input type="text" id="end_date" name="end_date" class="datepicker" value="{{'$element->to_date'}}">
            <label for="end_date">End Date</label>
            {{--@if ($errors->has('end_date'))--}}
                {{--<div class="error"> {{ $errors->first('end_date') }} </div>--}}
            {{--@endif--}}
        </div>

        <div class="clearfix"></div>

        <div class="input-field col s12 m6">
            <input id="no_of_packs_adult" name="no_of_packs_adult" type="number" class="validate"
                   value="{{'$element->pax'}}">
            <label for="name">Number of pax (Adult)</label>
            {{--@if ($errors->has('no_of_packs_adult'))--}}
                {{--<div class="error"> {{ $errors->first('no_of_packs_adult') }}  </div>--}}
            {{--@endif--}}
        </div>
        <div class="input-field col s12 m6">
            <input id="no_of_packs_children" name="no_of_packs_children" type="number" class="validate"
                   value="{{ '$element->pax_children' }}">
            <label for="name">Number of pax (Children)</label>
            {{--@if ($errors->has('no_of_packs_children'))--}}
                {{--<div class="error"> {{ $errors->first('no_of_packs_children') }}  </div>--}}
            {{--@endif--}}
        </div>

        <div class="clearfix"></div>

      
        <div class="clearfix"></div>
        <div class="input-field col s12 m12">
            <textarea name="remarks" id="remarks" placeholder=""
                      class="materialize-textarea">{{ '$element->remarks' }}</textarea>
            <label for="name">Remarks</label>
            {{--@if ($errors->has('remarks'))--}}
                {{--<div class="error"> {{ $errors->first('remarks') }}  </div>--}}
            {{--@endif--}}
        </div>
        <div class="clearfix"></div>

    
        <div class="clearfix"></div>

        <div class="input-field col s12 m12 form-submit-btns-wrap">
            <button class="btn waves-effect red accent-2 pull-right" type="reset" name="action">Reset</button>
            <button class="btn waves-effect waves-light pull-right" type="submit" name="action">Submit</button>
        </div>
    </div>
</form>