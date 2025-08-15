@extends('layouts.tas_app') 
@section('content')
<meta name="_token" content="{{csrf_token()}}" />
<style>
       .block>a{

            border-radius: 5px;
            border:solid #ddd; 
            background-color:#fff;
            margin-left:15px;
            margin-bottom:15px;
            height:10rem;
            width:10rem;
        
        }.block{
                       
            display:inline-block;

        }.m-content{

              width:1000px;
        }
        @media screen and (max-width: 430px) {
            .m-content{
                width:200px;
               }
        }

        @media screen and (min-width: 431px) and (max-width: 630px) {
            .m-content{
                width:400px;
                }
        }
        @media screen and (min-width: 631px) and (max-width: 830px) {
            .m-content{
                 width:600px;
                }
        }
        @media screen and (min-width: 831px) and (max-width: 1030px) {
            .m-content{
                   width:800px;
                }
        }
        /* hr{
            background-color:white;
        } */
        p{
            font-size:13px;
            /* color:#fff; */
        }
        i{
            font-size:45px; 
        }
       
        /* #323c48 */
    </style>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        GENERAL MASTER DATA
                </h3>
            
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">
        {{-- <div class="m-portlet"> --}}
            <br>
            <div class="block">
                    <a href="{{route('market_index')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                        <div class="m-widget26">
                                                <div class="m-widget26__number">
                                                </div>
                                                <h6 class="card-title text-center text-success" style="font-size:13px;">MARKETS</h6>
                                                <i class="la la-globe text-success" style="font-size:45px;"></i>
                                                <hr>
                                                {{-- <p class="card-subtitle mb-2 " style="font-size:13px;">12</p>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>
            </div>
            <div class="block">                             
                        <a href="{{route('agent_index')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:10px;">
                                            <div class="m-widget26">
                                                    <div class="m-widget26__number">
                                                    </div>
                                                    <h6 class="card-title text-center text-accent">AGENTS</h6>
                                                    <i class="fa fa-user text-accent" style="font-size:45px;"></i>
                                                    <hr>
                                                    {{-- <p class="card-subtitle mb-2 ">20</p>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
            </div>
            <div class="block">      
                            <a href="{{route('currency_index')}}"  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:10px;">
                                                <div class="m-widget26">
                                                        <div class="m-widget26__number">
                                                        </div>
                                                        <h6 class="card-title text-center text-info">CURRENCY</h6>
                                                        <i class="la la-money text-info" style="font-size:45px;"></i>
                                                        <hr>
                                                        {{-- <p class="card-subtitle mb-2 ">12</p>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a> 
            </div>
            <div class="block">                                     
                        
                                <a href="{{route('currencyEx_index')}}" class="m-portlet btn">
                                                <div class="m-portlet__body" style="padding:10px 10px 10px 1px;">
                                                    <div class="m-widget26" style="padding:0px 0px 0px 0px;">
                                                            <div class="m-widget26__number">
                                                            </div>
                                                            <h6 class="text-center text-warning" style="font-size:13px; ">EXCHANGE RATE</h6>
                                                            <i class="fa fa-gg-circle text-warning" style="font-size:45px;"></i>
                                                            <hr>
                                                            {{-- <p class="card-subtitle mb-2 ">12</p>	 --}}                          
                                                    </div>
                                                </div>                           
                                </a> 
            </div>
            <div class="block">                                         
                            
                                    <a href="{{route('tax_index')}}"  class="m-portlet btn">
                                                    <div class="m-portlet__body" style="padding:10px;">
                                                        <div class="m-widget26">
                                                                <div class="m-widget26__number">
                                                                </div>
                                                                <h6 class="card-title text-center text-brand">TAXATION</h6>
                                                                <i class="fa fa-money text-brand" style="font-size:45px;"></i>
                                                                <hr>
                                                                {{-- <p class="card-subtitle mb-2 ">12</p>	 --}}
                                                                                            
                                                        </div>
                                                    </div>
                                                                                
                                                        </a>  
                               
                                            
        </div>
        <div class="block">
                
                    <a href="{{route('itineray_index')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                        <div class="m-widget26">
                                                <div class="m-widget26__number">
                                                </div>
                                                <h6 class="card-title text-center text-danger">ITINERARY</h6>
                                                <i class="la la-arrows text-danger" style="font-size:45px;"></i>
                                                <hr>
                                                {{-- <p class="card-subtitle mb-2 ">12</p>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>  
        </div>
        <div class="block">                               
                
                        <a href="{{route('siteSeen_create')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:10px;">
                                            <div class="m-widget26">
                                                    <div class="m-widget26__number">
                                                    </div>
                                                    <h6 class="card-title text-center text-warning">SITE SEEN</h6>
                                                    <i class="la la-photo text-warning" style="font-size:45px;"></i>
                                                    <hr>
                                                    {{-- <p class="card-subtitle mb-2 ">78</p>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>
        </div>
        <div class="block">                                      
                    
                            <a href="{{route('location_index')}}"  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:10px;">
                                                <div class="m-widget26">
                                                        <div class="m-widget26__number">
                                                        </div>
                                                        <h6 class="card-title text-center text-info">LOCATIONS</h6>
                                                        <i class="la la-map text-info" style="font-size:45px;"></i>
                                                        <hr>
                                                        {{-- <p class="card-subtitle mb-2">175</p>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a> 
        </div>
        <div class="block">                                         
                        
                                <a href="{{route('distance_index')}}"  class="m-portlet btn">
                                                <div class="m-portlet__body" style="padding:10px;">
                                                    <div class="m-widget26">
                                                            <div class="m-widget26__number">
                                                            </div>
                                                            <h6 class="card-title text-center text-danger">DISTANCE</h6>
                                                            <i class="m-menu__link-icon flaticon-route text-danger" style="font-size:40px;"></i>
                                                            <hr>
                                                            {{-- <p class="card-subtitle mb-2 text-muted text-accent">12</p>	 --}}
                                                                                        
                                                    </div>
                                                </div>
                                                                            
                                                    </a> 
        </div>
        <div class="block">                                             
                           
                                    <a href="{{route('city_index')}}"  class="m-portlet btn">
                                                    <div class="m-portlet__body" style="padding:10px;">
                                                        <div class="m-widget26">
                                                                <div class="m-widget26__number">
                                                                </div>
                                                                <h6 class="card-title text-center text-success">CITIES</h6>
                                                                <i class="la la-bank text-success" style="font-size:45px;"></i>
                                                                <hr >
                                                                {{-- <p class="card-subtitle mb-2">54</p>	 --}}
                                                                                            
                                                        </div>
                                                    </div>
                                                                                
                                                        </a>  

                                
                                            
        </div>
        <div class="block">
               
                        <a href="{{route('district_index')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:10px;">
                                            <div class="m-widget26">
                                                    <div class="m-widget26__number">
                                                    </div>
                                                    <h6 class="card-title text-center text-primary">DISTRICTS</h6>
                                                    <i class="la la-location-arrow text-primary" style="font-size:45px;"></i>
                                                    <hr>
                                                    {{-- <p class="card-subtitle mb-2 ">26</p>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
        </div> 
        <div class="block">                                   
                    
                            <a href="{{route('load_country')}}"  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:10px;">
                                                <div class="m-widget26">
                                                        <div class="m-widget26__number">
                                                        </div>
                                                        <h6 class="card-title text-center text-accent">COUNTRIES</h6>
                                                        <i class="la la-flag text-accent" style="font-size:45px;"></i>
                                                        <hr>
                                                        {{-- <p class="card-subtitle mb-2 ">5</p>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a>      
        </div>
            {{-- </div> --}}

</div>
@endsection