
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
    
                                <h4> <b> HOTEL RESERVATION </b> </h4>
                            </div>
    
                            <table style="width: 100%;">
                                <tr>
                                    @php $tourQ=\App\TourQuotation::where('id',$toure_id)->first(); @endphp
                                    <th style="text-align: left;">
                                        Tour Number : <span style="text-transform: uppercase;">	{{ $tourQ->code }} </span>
                                        <br> Hotel Name : {{$hotel_name->name}}
                                        <br> Hotel Address :   {{$hotel_name->address}}  
    
                                    </th>
                                    <th style="text-align: right;">
    
                                        Date :    @php echo  date("Y-m-d"); @endphp
                                        <br> Hotel Email : {{$hotel_name->email}}
                                        <br> Hotel Contact Number :{{$hotel_name->contact_details}}  
    
                                      
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
                                        <th> Arrival Date</th>
                                        <th> Departure Date</th>
                                        <th> No Of Night's</th>
                                        <th>Room Type</th>
                                        <th>Single </th>
                                        <th>Double </th>
                                        <th>Triple </th>
                                        <th> Client Meal Plan </th>
                                       
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid #ddd;
        padding: 8px;">
    
                                    
                                        	@if(isset($hotel_res))
                                 
                                                                    @foreach($hotel_res as $key=>$ht)
                                                                      <tr>
                                                                      <td>{{$hotel_res[$key]['arrival_date']}}</td>
                                                                      <td>{{$hotel_res[$key]['departure_date']}}</td>
                                                                      <td>{{$hotel_res[$key]['no_of_night']}}</td>
                                                                      @php
                                                                      $room_type_name=DB::table('room_types')->where('id',$hotel_res[$key]['room_type_id'])->first();
                                                                      $meal_type_name=DB::table('hotel_packages')->where('id',$hotel_res[$key]['package_id'])->first();
                                                                      @endphp
                                                                      <td>{{$room_type_name->room_name}}</td>
                                                                      <td>{{$hotel_res[$key]['single_count']}}</td>
                                                                      <td>{{$hotel_res[$key]['double_count']}}</td>
                                                                      <td>{{$hotel_res[$key]['triple_count']}}</td>
                                                                      <td>{{$meal_type_name->package_name}}</td>
                                                                      </tr>
                                                                   @endforeach 
                                                              @endif  
    
                                   
    
                                </tbody>
                            </table>
    
                            <br>
                            <table style="width: 100%;">
                            <br><br>

                                <tr>
                                        <td width='0' align='left' valign='top' >
                                            <strong>All extras to be collected direct from Group/Client :</strong>  <input type="checkbox">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                            <td width='0' align='left' valign='top' >
                                                <strong>All bills including extras :</strong>   <input type="checkbox">
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                                <td width='0' align='left' valign='top'>
                                                    <strong>All payment's from direct by group or client :</strong>  <input type="checkbox">
                                                </td>
                                               
                                            </tr>						
                                    
                            </table>
                        </div>
                    </div>
            </section>
        </section>
    </section>
    
    @endsection