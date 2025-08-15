@extends('layouts.pdf') @section('content')

<section id="main-content">
    <section class="wrapper">
        <!-- invoice start-->
        <section>
            <div class="panel panel-primary">
                <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                <div class="panel-body">
                    <div class="row invoice-list">
                        <div style="text-align:center;">
                            <h3> <b> Antiquity</b> </h3> No.144 B 1/1, Vijaya Kumaratunga Mawatha, Colombo 05, Sri Lanka.
                            <br> Tel : +94 11 576 7521
                            <br> E-mail:info@antiquitysl.com
                            <br>

                            <h4> <b> INVOICE </b> </h4>
                        </div>
                        @if(isset($agent_details)) @foreach($agent_details as $key=>$ht)
                        <table style="width: 100%;">
                            <tr>
                                @php $tourQ=\App\TourQuotation::where('id',$toure_id)->first(); @endphp
                                <td style="text-align: left;">

                                    Client's Name : <span style="text-transform: uppercase;">	{{$agent_details[$key]['name']}} </span>
                                    <br> Period of Stay: {{$agent_details[$key]['from_date']}} - {{$agent_details[$key]['to_date']}}
                                    <br> No of Pax: {{$agent_details[$key]['pax']}}

                                </td>

                                <td style="text-align: right;">
                                    Ref : <span style="text-transform: uppercase;">	{{ $tourQ->code }} </span>
                                    <br>
                                    <br> Date : @php echo date("Y-m-d"); @endphp
                                    <br>
                                    <br>

                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>

                        <table style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;">
                            <thead style="padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #16aad8;
        color: white;">

                            </thead>
                            <tbody style="border: 1px solid #ddd;padding: 8px;">
                                <tr>
                                    <td>Rates are in {{$agent_details[$key]['currency_name']}}: -</td>
                                </tr>
                                <tr>
                                    @php $a= new DateTime($agent_details[$key]['from_date']); $b=new DateTime($agent_details[$key]['to_date']); $fdate=$a->format('d-M'); $tdate=$b->format('d-M-Y'); $x=date_create($agent_details[$key]['from_date']); $y=date_create($agent_details[$key]['to_date']); $diff=date_diff($x,$y); $d=$diff->format("%a"); $n=(int)($d)-1; @endphp
                                    <td>{{$fdate}} / {{$tdate}} – {{$d}} Days / {{$n}} Nights {{$agent_details[$key]['title']}}-{{$agent_details[$key]['name']}} @ {{$agent_details[$key]['currency_code']}} {{number_format($agent_details[$key]['per_person_price'],2)}} x {{$agent_details[$key]['pax']}} Pax
                                    </td>
                                    @php $total=(double)($agent_details[$key]['per_person_price'])*(int)($agent_details[$key]['pax']); @endphp
                                    <td style="text-align:right;">= {{$agent_details[$key]['currency_code']}} {{number_format($total,2)}}</td>
                                </tr>

                                <tr>
                                    <td>Total Net Payable to antiquity in {{$agent_details[$key]['currency_code']}}:
                                    </td>
                                    <td style="text-align:right;">= {{$agent_details[$key]['currency_code']}} {{number_format($total,2)}}</td>
                                </tr>
                                    @php @endphp

                            </tbody>
                        </table>
                        @endforeach @endif
                    </div>
                </div>
        </section>
    </section>
</section>

@endsection