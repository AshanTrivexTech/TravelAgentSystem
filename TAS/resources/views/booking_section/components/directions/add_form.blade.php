<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ URL::asset('/js/module/routemanage.js') }}"></script>


<h5 class="breadcrumbs-title"><i class="material-icons">directions_car</i>  Routes / Locations</h5>
<br>

{{--<form class="cleafix" method="POST" action="{{route('tour-add-direction', $tour_id)}}">--}}
{{--{{csrf_field()}}--}}
<div class="row">

    {{--<div class="input-field col s12 m4 l4">--}}
    {{--<input type="text" id="tagstext"/>--}}
    {{--<label for="direction_date"> Date</label>--}}
    {{--@if ($errors->has('direction_date'))--}}
    {{--<div class="error"> {{ $errors->first('direction_date') }} </div>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--<div class="input-field col s12 m4 l4">--}}
    {{--<select  name="direction_id" id="direction_id">--}}

    {{--<option value="" disabled @if(is_null(old('direction_id'))) selected @endif >Choose Direction</option>--}}
    {{--@if(count($directions))--}}
    {{--@foreach($directions as $direction)--}}
    {{--<option value="{{$direction->id}}" @if(old('direction_id') == $direction->id) selected @endif >{{$direction->fromLocation->code}} - {{$direction->toLocation->code}}</option>--}}
    {{--@endforeach--}}
    {{--@endif--}}
    {{--</select>--}}
    {{--<label for="direction_id"> Direction</label>--}}
    {{--</div>--}}


    <form id="frmtoursroutes" name="frmtoursroutes" action="/tour-route/store" method="POST">
        <input type="hidden" name="tourId" id="tourId" value="{{$tour_id}}"/>
        <div class="col s12">
            <table>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Days</th>
                    <th>Destination</th>
                    <th>Milage</th>
                </tr>
                </thead>
                <tbody>

                {{--@php--}}

                    {{--$x=0;--}}
                        {{--for ($i = strtotime($quatation['from_date']); $i <= strtotime($quatation['to_date']); $i += 86400) {--}}
                            {{--$timestamp = strtotime(date("Y-m-d", $i));--}}
                            {{--$day = date("Y-m-d", $timestamp);--}}
                {{--@endphp--}}
                <tr>
                    <td>Day {{$x+1}}</td>
                    <td id="day{{$x}}"><input type="text" value="{{$day}}" readonly name="data[{{$x}}][txtday]"
                                              id="txtday{{$x}}"/></td>

                    <td>
                        {{csrf_field()}}
                        <select multiple name="data[{{$x}}][route]" id="route{{$x}}" index="0"
                                onchange="getRouteValue({{$x}})" class="routelist col s3 routelist">

                            {{--@foreach($location as $locationData)--}}
                                {{--<option value="{{$locationData['id']}}">{{$locationData['code']}}</option>--}}
                            {{--@endforeach--}}


                        </select>
                        <input type="hidden" name="data[{{$x}}][destination_array]" id="destination_array{{$x}}">
                    </td>

                    <td><input id="destination{{$x}}" name="data[{{$x}}][destination]" type="text"/></td>
                </tr>
                {{--@php--}}
                    {{--$x++;--}}
                    {{--}--}}

                {{--@endphp--}}
                </tbody>
            </table>
        </div>
        <div class="input-field col s12 m4 l4 pull-right">
            <button class="btn waves-effect green dark-2 pull-right" type="submit" name="action">Save</button>
        </div>
    </form>

</div>
</form>
<script>

    $(document).ready(function () {
        var xh = $.ajax({
            url: '/direction/get-route-direction/{{'$tour_id'}}',
            type: "GET",
            // data: {data:array,_token:token},
            success: function (data) {

                for (i = 0; i < data.length; i++) {

                   var destination = data[i].destination;
                    var html ='';
                    for (x = 0; x < destination.length; x++){
                            html+='<option selected value="'+destination[x].id+'">'+destination[x].code+'</option>';
                    }

                    $('#route'+i).append(html);
                    $('#destination_array'+i).val(data[i].array);
                    $('#destination'+i).val(data[i].distance);
                    $('select').material_select();
                }
               // console.log(html);

            }

        })
    });
</script>