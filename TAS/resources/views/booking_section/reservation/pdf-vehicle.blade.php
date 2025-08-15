
@extends('layouts.pdf')

@section('content')

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
    
                                <h4> <b> VEHICLE RESERVATION </b> </h4>
                            </div>
    
                            <table style="width: 100%;">
                                <tr>
                                    @php $tourQ=\App\TourQuotation::where('id',$toure_id)->first(); @endphp
                                    <th style="text-align: left;">
                                        Tour Number : <span style="text-transform: uppercase;">	{{ $tourQ->code }} </span>
                                     
                                    </th>
                                    <th style="text-align: right;">
    
                                        Date :    @php echo  date("Y-m-d"); @endphp
                                       
                                      
                                    </th>
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
                                    <tr>
                                        <th>Supplier Name</th>
                                        <th>Vehicle Number</th>
                                        <th>From Date</th>
                                        <th>To date</th>
                                        <th>Mileage</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid #ddd;padding: 8px;">
                                        @if(isset($get_vehicle))
                                            @foreach($get_vehicle as $key=>$veh)      
                                                    <tr>
                                                    <td>{{$veh->name}}</td>
                                                    <td>{{$veh->vehicle_no}}</td>
                                                    <td>{{$veh->from_date}}</td>
                                                    <td>{{$veh->to_date}}</td>
                                                    <td>{{$veh->mileage}}</td>
                                                </tr>
                                            @endforeach 
                                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
        </section>
    </section>
    
    @endsection