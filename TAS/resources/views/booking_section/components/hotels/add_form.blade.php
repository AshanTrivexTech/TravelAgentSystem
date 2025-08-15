<form class="cleafix" method="POST" action="/tour-hotel/store">
    {{csrf_field()}}
    <div class="row">
<input type="hidden" name="txttourid" value="{{'$tour_id'}}" id="txttourid"/>
        <div class="col s12 m12 ">
            <table>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Days</th>
                    <th>Hotel</th>
                    <th>Room Type</th>
                    <th>Package</th>
                    <th>Price($)</th>
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

                        <select name="data[{{$x}}][hotel]" onchange="getHotelRooms({{$x}})" id="hotel{{$x}}"
                                class="hotellist  ">

                            {{--@foreach($hotelList as $hotel)--}}
                                {{--<option value="{{$hotel['id']}}">{{$hotel['name']}}</option>--}}
                            {{--@endforeach--}}


                        </select>
                    </td>
                    <td>

                        <select name="data[{{$x}}][roomtype]" onchange="getPackages({{$x}})" id="roomtype{{$x}}"
                                class="roomType">


                        </select>


                    </td>
                    <td>
                        <select name="data[{{$x}}][packages]" onchange="getPackagePrice({{$x}})" id="packages{{$x}}"
                                class="">


                        </select>
                    </td>

                    <td><input onkeyup="calculateTotal()" id="price{{$x}}" name="data[{{$x}}][price]" type="text"/></td>
                </tr>
                {{--@php--}}
                    {{--$x++;--}}
                    {{--}--}}

                {{--@endphp--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Price</td>
                    <td><input type="text" name="total" id="total"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Per Person Price</td>
                    <td><input type="text" name="perPerson" id="perPerson"/></td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="clearfix"></div>
        <div class="input-field col s12 m12 l12 pull-right">
            <button class="btn waves-effect green dark-2 pull-right" type="submit" name="action">Save</button>
        </div>

    </div>
</form>


<script>

    $(document).ready(function () {
        var xh = $.ajax({
            url: '/tours/get-tour-hotel/{{'$tour_id'}}',
            type: "GET",
            // data: {data:array,_token:token},
            success: function (data) {
               // console.log(data);

                for (i = 0; i < data.length; i++) {





                    $('#hotel'+i).append('<option selected value="'+data[i].hotel_id+'">'+data[i].name+'</option>');
                    $('#roomtype'+i).append('<option selected value="'+data[i].room_type_id+'">'+data[i].room_name+'</option>');
                    $('#packages'+i).append('<option selected value="'+data[i].package_id+'">'+data[i].package_name+'</option>');
                    $('#price'+i).val(data[i].price);
//
                    $('select').material_select();
                    calculateTotal();

                }


            }

        })
    });

    function getHotelRooms(id) {
        var hotelId = $('#hotel' + id).val();

        var xh = $.ajax({
            url: '/tours/get-hotel-rooms/' + hotelId + '',
            type: "GET",
            //data: $("#frmeditdevsignoff").serialize(),
            success: function (data) {
                if (data.length > 0) {
                    var html = '';
                    // html+= '<select name="data['+id+'][roomtype]" id="roomtype'+id+'" class="roomType">';
                    html += '<option selected value="">--SELECT--</option>';

                    for (i = 0; i < data.length; i++) {

                        html += '<option value="' + data[i].room_id + '">' + data[i].room_name + '</option>';
                    }


                    // html+='</select>';

                    $('#roomtype' + id).html(html);
                    $('select').material_select();
                }

            }

        })
    }

    function getPackages(id) {

        var hotelId = $('#hotel' + id).val();
        var roomId = $('#roomtype' + id).val();
        var tourId = $('#txttourid').val();
        var xh = $.ajax({
            url: '/tours/get-hotel-packages/' + hotelId + '/' + roomId+'/'+tourId,
            type: "GET",
            //data: $("#frmeditdevsignoff").serialize(),
            success: function (data) {
              //  console.log(data);
                if (data.length > 0) {
                    var html = '';
                    // html+= '<select name="data['+id+'][roomtype]" id="roomtype'+id+'" class="roomType">';
                    html += '<option selected value="">--SELECT--</option>';
                    for (i = 0; i < data.length; i++) {

                        html += '<option value="' + data[i].package_id + '">' + data[i].package_name + '</option>';
                    }
//
//
//                    // html+='</select>';
//                    console.log(html);
                    $('#packages' + id).html(html);
                    $('select').material_select();


                }else{
                    html += '<option selected value="">--No Available Packages--</option>';
                    $('#packages' + id).html(html);
                    $('#price' + id).val(0);
                    $('select').material_select();
                }

            }


        })
    }

    function getPackagePrice(id) {
        var packageId = $('#packages' + id).val();

        var xh = $.ajax({
            url: '/tours/get-package-price/' + packageId + '',
            type: "GET",
            //data: $("#frmeditdevsignoff").serialize(),
            success: function (data) {
               // console.log(data);

                $('#price' + id).val(data.default_price);
                calculateTotal();
            }


        })

    }



    function calculateTotal() {
        var total = 0;
        $('[id^="price"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("price", "");
            var price = $('#price' + elementIndex).val();
            total += parseFloat(price*1);


        });

        $('#total').val(total);
        $('#perPerson').val(parseFloat(total/2));


    }
</script>