{{--@php--}}
{{--$company=App\TourQuotation::find($tour_id);--}}

{{--@endphp--}}
<form class="cleafix" method="POST">
    {{--{{csrf_field()}}--}}
    <input type="hidden" name="txttourid" value="" id="txttourid"/>
    <div class="">
            <!--begin: Search Form -->
      {{--@php--}}
                        {{--$currency=App\CurrencyRate::find($company->base_currencies);--}}
                        {{--@endphp--}}
            <!--end: Search Form -->
            <!--begin: Datatable  table m-table m-table--head-bg-brand-->
            <div style="overflow-x:auto;">
            <table class="table" style="width:100%;">
                <thead>
                    <tr>
                    <th style="width:2%">Day</th>
                    <th style="width:10%">Date</th>
                    <th style="width:20%">Hotel</th> 
                    <th style="width:10%">Room Type</th>
                    <th style="width:10%">Package</th>
                    <th style="width:3%">Currency</th>
                    <th style="width:3%"></th>
                    <th style="width:10%">Double Price</th>
                    <th style="width:3%">Double Commission</th>
                    <th style="width:10%">Single Price</th>
                    <th style="width:3%">Single Commission</th>
                    <th style="width:10%">Triple Price</th>
                    <th style="width:3%">Triple Commission</th>
                    </tr>  
                    <button type="button" ></button>
                </thead>
                <tbody>
                    {{--@php--}}
                            {{--$x=0;--}}
                            {{--for ($i = strtotime($quatation['from_date']); $i <= strtotime($quatation['to_date']); $i += 86400) {--}}
                            {{--$timestamp = strtotime(date("Y-m-d", $i));--}}
                            {{--$day = date("Y-m-d", $timestamp);--}}
                    {{--@endphp       --}}
                    
                    <tr>
                    <td></td>
                    <td id="day"><input style="width:110px;" class="form-control" type="text" value="" readonly name="data[txtday]"
                                              id="txtday"/></td>
                    <td>
                        {{--{{csrf_field()}}--}}

                        <select style="width:200px;font-size:0.8em"   name="data[hotel]" onchange="getHotelRooms" id="hotel"
                                class="hotellist  form-control">
                                    <option value="">Select a Hotel</option>
                                {{--@foreach($hotelList as $hotel)--}}
                                    {{--<option value="{{$hotel['id']}}"><span style="font-size:0.8em">{{$hotel['name']}}</span></option>--}}
                                {{--@endforeach--}}
                        </select>
                    </td>
                    <td>
                        <select style="width:80px;font-size:0.8em "  name="data[roomtype]" onchange="getPackages" id="roomtype"
                                class="roomType form-control">
                        </select>
                    </td>
                    <td>
                        <select style="width:110px;font-size:0.8em"  name="data[packages]" onchange="getPackagePrice" id="packages"
                                class="form-control ">
                        </select>
                    </td>
                    <input type="hidden" name="data[maxCount]" id="maxCount}" />
                    <td> 
                        <input type="text" class="form-control" style="width:60px;" name="data[packageCur]" id="packageCur" value="" />
                        
                    </td>
                     <td> 
                        <input type="text" class="form-control" onkeyup="rateChanged" style="width:80px;" name="data[curRate]" id="curRate" value="1" />
                        
                    </td>
                    <td> 
                    <input type="hidden" name="data[actPrice]" id="actPrice" />
                    <input type="hidden" name="data[actPriceSingle]" id="actPriceSingle" />
                    <input type="hidden" name="data[actPriceTriple]" id="actPriceTriple" />
                    <input  class="form-control" onkeyup="priceChanged" id="price" name="data[price]" type="text" />
                    </td>
                   
                    <td> 
                    <input  class="form-control" onkeyup="commisionChanged" id="accComm" name="data[commission]" type="text"/>
                    <input id="ppAccrate" name="data[pprate]" type="hidden"/>
                    <input id="singlePPR" name="data[ppr_single_price]" type="hidden"/>
                    <input id="triplePPR" name="data[ppr_triple_price]" type="hidden"/>
                    <input id="max_count" name="data[max_count]" type="hidden"/>
                    </td>
                    <td> 
                       <input class="form-control" type="text"  onkeyup="SinglepriceChanged"  name="data[singlePrice]" id="singlePrice" />
                        
                    </td>
                     <td> 
                        <input class="form-control" type="text" onkeyup="commisionChanged"  id="singleAccComm" name="data[singleAccComm]" />
                        
                    </td>
                    <td> 
                        <input type="text" class="form-control" onkeyup="TriplepriceChanged" name="data[triplePrice]" id="triplePrice}" />
                        
                    </td>
                     <td> 
                        <input type="text" onkeyup="commisionChanged" class="form-control" id="tripleAccComm" name="data[tripleAccComm]" />
                        
                    </td>
                    </tr>
                    {{--@php--}}
                    {{--$x++;--}}
                    {{--}--}}
                    {{--@endphp--}}
                
                </tbody>
            </table>
            <table class="table" style="width:100%;">
               </tbody>
            <tr style="boder:2px;">
                <td></td>
                <td></td>
              
                <td></td>
                <td></td>
                <td><b></b></td>
                <td style="text-align:center;"><b>Double</b></td>
                <td style="text-align:center;"><b>Single</b></td>
                <td style="text-align:center;"><b>Triple</b></td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total Markup Amount</b></td>
                <td><b><input style="width:100%;" class="form-control" readonly type="text" name="totAcComm" id="totAcComm" value="" /></b></td>
                 <td><b><input style="width:100%;" class="form-control" readonly type="text" id="totAcCommSingle" name="totAcCommSingle" value="" /></b></td>
                <td><b><input style="width:100%;" class="form-control" readonly type="text" id="totAcCommTriple" name="totAcCommTriple" value="" /></b></td>
               
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total Selling Price</b></td>
                <td><b><input style="width:100%;" class="form-control" readonly type="text" name="total" id="total"value="" /></b></td>
                 <td><b><input style="width:100%;" class="form-control" readonly type="text" id="totalSingle" name="totalSingle" value="" /></b></td>
                <td><b><input style="width:100%;" class="form-control" readonly type="text" id="totalTriple" name="totalTriple" value="" /></b></td>
               
            </tr>
             <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Per Person Selling Price</b></td>
                <td><b><input style="width:100%;" class="form-control" readonly type="text" name="perPerson" id="perPerson" value="" /></b></td>
                 <td><b><input style="width:100%;" class="form-control" readonly type="text" id="perPersonSingle" name="perPersonSingle" value="" /></b></td>
                <td><b><input style="width:100%;" class="form-control" readonly type="text" id="perPersonTriple" name="perPersonTriple" value="" /></b></td>
               
            </tr>
           
                </tbody>
            </table>
        </div>
       <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                <div class="col-lg-6">
                
                    <button class="btn btn-primary" type="submit" name="action">Submit</button>
                    <button type="reset" class="btn btn-secondary">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
      
    </div>
</form>

<input type="hidden" id="company_commission" value=""/>

@section('hotel_Scripts')
<script>

    $(document).ready(function () {
        //var commission_rate={{$company->commission}};
        var xh = $.ajax({
            url: '/tours/get-tour-hotel/',
            type: "GET",
            // data: {data:array,_token:token},
            success: function (data) {
             console.log(data)
                for (i = 0; i < data.length; i++) { 
                    $('#hotel'+i).append('<option selected value="'+data[i].hotel_id+'">'+data[i].name+'</option>');
                    $('#roomtype'+i).append('<option selected value="'+data[i].room_type_id+'">'+data[i].room_name+'</option>');
                    $('#packages'+i).append('<option selected value="'+data[i].package_id+'">'+data[i].package_code+'</option>');
                    $('#price'+i).val(parseFloat(data[i].price)-parseFloat(data[i].commission));
                    $('#singlePrice'+i).val(parseFloat(data[i].single_price)-parseFloat(data[i].single_commission));
                    $('#triplePrice'+i).val(parseFloat(data[i].triple_price)-parseFloat(data[i].triple_commission));
                    $('#actPrice' + i).val($('#price'+i).val());
                    $('#actPriceSingle' + i).val($('#singlePrice'+i).val());
                    $('#actPriceTriple' + i).val($('#triplePrice'+i).val());
                    $('#accComm'+i).val(data[i].commission);
                    $('#singleAccComm'+i).val(data[i].single_commission);
                    $('#tripleAccComm'+i).val(data[i].triple_commission);
                    $('#curRate'+i).val(parseFloat(data[i].currency_rate).toFixed(2));
                    $('#max_count'+i).val(data[i].max_count);
                    $('#ppAccrate'+i).val(parseFloat(data[i].ppr));
                    $('#singlePPR'+i).val(parseFloat(data[i].ppr_single_price).toFixed(2));
                    $('#triplePPR'+i).val(parseFloat(data[i].ppr_triple_price).toFixed(2));
                    $('#packageCur'+i).val(data[i].currency_code);
                    //packagePrice({{$tour_id}},data[i].hotel_id,data[i].package_id,i);
                    $('select').select2();
                }
                calculateAccTotal();
                calculateAccCommission();
                calculateAccPersonRate();
            }
        })
    });

    function getHotelRooms(id) {
        var hotelId = $('#hotel' + id).val();
        var xh = $.ajax({
            url: '/tours/get-hotel-rooms/' + hotelId + '',
            type: "GET",
            success: function (data) {
                if (data.length > 0) {
                    var html = '';
                    html += '<option selected value="">--SELECT--</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].room_id + '">' + data[i].room_name + '</option>';
                    }
                    $('#roomtype' + id).html(html);
                    $('select').select();
                }
            }
        });
    }

    function getPackages(id) {
        var hotelId = $('#hotel' + id).val();
        var roomId = $('#roomtype' + id).val();
        var tourId = $('#txttourid').val();
        var xh = $.ajax({
            url: '/tours/get-hotel-packages/' + hotelId + '/' + roomId+'/'+tourId,
            type: "GET",
            success: function (data) {
                console.log(data);
                if (data.length > 0) {
                    var html = '';
                    html += '<option selected value="">--SELECT--</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].package_id + '">'+ data[i].package_code + '</option>';
                    }
                    $('#packages' + id).html(html);
                    $('select').select();
                }else{
                    html += '<option selected value="">--No Available Packages--</option>';
                    $('#packages' + id).html(html);
                    $('#price' + id).val(0);
                    $('select').select();
                }
            }
        });
    }

    function getPackagePrice(id) {
        var packageId = $('#packages' + id).val();
        var hotelId = $('#hotel' + id).val();
        var tourId = $('#txttourid').val();
        var xh = $.ajax({
            url: '/tours/get-package-price/' + hotelId + '/'+packageId+'/'+tourId,
            type: "GET",
            success: function (data) {
                console.log(data);
                if(data.offer_rate){
                    getCurrency(data.currencies_id,id)
                    $('#price' + id).val(data.offer_rate);
                    $('#singlePrice' + id).val(data.single_rate);
                    $('#triplePrice' + id).val(data.triple_rate);
                    $('#actPrice' + id).val(data.offer_rate);
                    $('#actPriceSingle' + id).val(data.single_rate);
                    $('#actPriceTriple' + id).val(data.triple_rate);
                    $('#max_count'+id).val(data.max_count);
                }
                else if(data.standard_rate){
                    getCurrency(data.currencies_id,id)
                    $('#price' + id).val(data.standard_rate);
                    $('#singlePrice' + id).val(data.single_rate);
                    $('#triplePrice' + id).val(data.triple_rate);
                    $('#actPrice' + id).val(data.standard_rate);
                    $('#actPriceSingle' + id).val(data.single_rate);
                    $('#actPriceTriple' + id).val(data.triple_rate);
                     $('#max_count'+id).val(data.max_count);
                }else{
                    $('#price' + id).val('0.00');
                    $('#actPrice' + id).val('0.00');
                    $('#singlePrice' + id).val('0.00');
                    $('#triplePrice' + id).val('0.00');
                }
                $('#max_count'+id).val(data.max_count);
                $('#accComm'+id).val( parseFloat($('#company_commission').val()*1) * parseFloat($('#price' + id).val()*1));
                $('#singleAccComm'+id).val( parseFloat($('#company_commission').val()*1) * parseFloat($('#singlePrice' + id).val()*1));
                $('#tripleAccComm'+id).val( parseFloat($('#company_commission').val()*1) * parseFloat($('#triplePrice' + id).val()*1));
                $('#ppAccrate'+id).val(parseFloat($('#price'+id).val()/2)+parseFloat($('#accComm'+id).val()/2));
                $('#singlePPR'+id).val(parseFloat($('#singlePrice'+id).val()/1)+parseFloat($('#singleAccComm'+id).val()/1));
                $('#triplePPR'+id).val(parseFloat($('#triplePrice'+id).val()/3)+parseFloat($('#tripleAccComm'+id).val()/3));
                calculateAccTotal();
                calculateAccCommission();
                calculateAccPersonRate();
            }
        });
    }
    function packagePrice(tourId,hotelId,packageId,id) {
        
        var xh = $.ajax({
            url: '/tours/get-package-price/' + hotelId + '/'+packageId+'/'+tourId,
            type: "GET",
            success: function (data) {
              //  console.log(data);
                getCurrency(data.currencies_id,id);
            }
        });
    }

    function getCurrency(id,index) {
        
        var xh = $.ajax({
            url: '/currency/get/' + id,
            type: "GET",
            success: function (data) {
              //  console.log(data);
                $('#packageCur'+index).val(data.code);
            }
        });
    }

    function calculateAccTotal() {
        var total = 0;
        $('[id^="price"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("price", "");
            var price = (($('#price' + elementIndex).val()*1)+($('#accComm' + elementIndex).val()*1));
            total += parseFloat(price*1);
        });
        $('#total').val(parseFloat(total).toFixed(2));
        var total = 0;
        $('[id^="singlePrice"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("singlePrice", "");
            var price = (($('#singlePrice' + elementIndex).val()*1)+($('#singleAccComm' + elementIndex).val()*1));
            total += parseFloat(price*1);
        });
        $('#totalSingle').val(parseFloat(total).toFixed(2));
        var total = 0;
        $('[id^="triplePrice"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("triplePrice", "");
            var price = (($('#triplePrice' + elementIndex).val()*1)+($('#tripleAccComm' + elementIndex).val()*1));
            total += parseFloat(price*1);
        });
        $('#totalTriple').val(parseFloat(total).toFixed(2));
    }
    function calculateAccCommission() {
        var total = 0;
        $('[id^="accComm"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("accComm", "");
            var price = $('#accComm' + elementIndex).val();
            total += parseFloat(price*1);
        });
        $('#totAcComm').val(parseFloat(total).toFixed(2));
        var total = 0;
        $('[id^="singleAccComm"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("singleAccComm", "");
            var price = $('#singleAccComm' + elementIndex).val();
            total += parseFloat(price*1);
        });
        $('#totAcCommSingle').val(parseFloat(total).toFixed(2));
        var total = 0;
        $('[id^="tripleAccComm"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("tripleAccComm", "");
            var price = $('#tripleAccComm' + elementIndex).val();
            total += parseFloat(price*1);
        });
        $('#totAcCommTriple').val(parseFloat(total).toFixed(2));
    }
    function calculateAccPersonRate() {
        var total = 0;
        $('[id^="ppAccrate"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("ppAccrate", "");
            var price = $('#ppAccrate' + elementIndex).val();
            total += parseFloat(price*1);
        });
        $('#perPerson').val(parseFloat(total).toFixed(2));

        var total = 0;
        $('[id^="singlePPR"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("singlePPR", "");
            var price = $('#singlePPR' + elementIndex).val();
            total += parseFloat(price*1);
        });
        $('#perPersonSingle').val(parseFloat(total).toFixed(2));

        var total = 0;
        $('[id^="triplePPR"]').each(function () {
            var elementIndex = $(this).attr("id");
            elementIndex = elementIndex.replace("triplePPR", "");
            var price = $('#triplePPR' + elementIndex).val();
            total += parseFloat(price*1);
        });
        $('#perPersonTriple').val(parseFloat(total).toFixed(2));
    }
    function priceChanged(id){
        $('#accComm'+id).val(parseFloat(parseFloat($('#price'+id).val())*parseFloat().toFixed(2));
        $('#ppAccrate'+id).val(($('#price'+id).val()/2)+($('#accComm'+id).val()/2));
        calculateAccTotal();
        calculateAccCommission();
        calculateAccPersonRate();
    }
    function SinglepriceChanged(id){
        $('#singleAccComm'+id).val(parseFloat(parseFloat($('#singlePrice'+id).val())*parseFloat().toFixed(2));
        $('#singlePPR'+id).val(($('#singlePrice'+id).val()/1)+($('#singleAccComm'+id).val()/1));
        calculateAccTotal();
        calculateAccCommission();
        calculateAccPersonRate();
    }
    function TriplepriceChanged(id){
        $('#tripleAccComm'+id).val(parseFloat(parseFloat($('#triplePrice'+id).val())*parseFloat().toFixed(2));
        $('#triplePPR'+id).val(($('#triplePrice'+id).val()/3)+($('#tripleAccComm'+id).val()/3));
        calculateAccTotal();
        calculateAccCommission();
        calculateAccPersonRate();
    }
    function tripleCommisionChanged(id){
        
        $('#triplePPR'+id).val(($('#triplePrice'+id).val()/3)+($('#tripleAccComm'+id).val()/3));
        calculateAccTotal();
        calculateAccCommission();
        calculateAccPersonRate();
    }

    function commisionChanged(id){
        
        $('#ppAccrate'+id).val(($('#price'+id).val()/2)+($('#accComm'+id).val()/2));
        calculateAccTotal();
        calculateAccCommission();
        calculateAccPersonRate();
    }

    function singleCommisionChanged(id){
                
        $('#singlePPR'+id).val(($('#singlePrice'+id).val()/1)+($('#singleAccComm'+id).val()/1));
        calculateAccTotal();
        calculateAccCommission();
        calculateAccPersonRate();
    }

    function rateChanged(id){
        if($('#curRate' + id).val()!=0){
            $('#price' + id).val($('#actPrice' + id).val()/$('#curRate' + id).val());
            $('#singlePrice' + id).val($('#actPriceSingle' + id).val()/$('#curRate' + id).val());
            $('#triplePrice' + id).val($('#actPriceTriple' + id).val()/$('#curRate' + id).val());
        }
        else{
            $('#price' + id).val($('#actPrice' + id).val());
            $('#singlePrice' + id).val($('#actPriceSingle' + id).val());
            $('#triplePrice' + id).val($('#actPriceTriple' + id).val());
        }
            
        $('#accComm'+id).val( parseFloat($('#company_commission').val()*1) * parseFloat($('#price' + id).val()*1));
        $('#singleAccComm'+id).val( parseFloat($('#company_commission').val()*1) * parseFloat($('#singlePrice' + id).val()*1));
        $('#tripleAccComm'+id).val( parseFloat($('#company_commission').val()*1) * parseFloat($('#triplePrice' + id).val()*1));
        $('#ppAccrate'+id).val(parseFloat($('#price'+id).val()/2)+parseFloat($('#accComm'+id).val()/2));
        $('#singlePPR'+id).val(parseFloat($('#singlePrice'+id).val()/1)+parseFloat($('#singleAccComm'+id).val()/1));
        $('#triplePPR'+id).val(parseFloat($('#triplePrice'+id).val()/3)+parseFloat($('#tripleAccComm'+id).val()/3));
        calculateAccTotal();
        calculateAccCommission();
        calculateAccPersonRate();
    }

</script>
@endsection