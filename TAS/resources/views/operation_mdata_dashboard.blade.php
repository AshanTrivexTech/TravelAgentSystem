@extends('layouts.tas_app') 
@section('content')
<meta name="_token" content="{{csrf_token()}}" />
  <style>
      .row>a{
    /* border-radius: 15px; */
           border:solid #ddd;
           margin-bottom:10px;
           background-color:#fff;
           margin-left:10px;
           height:10rem;
           width:10rem; 

     }.m-portlet__body{

         padding:10px;
     }
  </style>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        OPERATION MASTER DATA
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
    <div class="row">
        <div class="col-xl-12">
                <div class="form-group m-form__group row">
                    <h5 style="padding-left:50px;">Accommodations</h5>
                </div>
            <div class="form-group m-form__group row" style="padding-left:50px;">
                    <a href="{{route('package_index')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                        <div class="m-widget26">
                                                <div class="m-widget26__number">
                                                </div>
                                                <h6 class="card-title text-center text-success">CONTRACTS</h6>
                                                <i class="la la-file text-success" style="font-size:50px;"></i>
                                                <hr>
                                                {{-- <h6 class="card-subtitle mb-2 text-muted text-success">12</h6>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>  
                
                        <a href="{{route('comsup_index')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:10px 10px 10px 5px;">
                                            <div class="m-widget26">
                                                    <div class="m-widget26__number">
                                                    </div>
                                                    <h6 class="card-title text-center text-accent" style="font-size:13px;" >COM SUPPLIMENT</h6>
                                                    <i class="la la-archive text-accent" style="font-size:50px;"></i>
                                                    <hr>
                                                    {{-- <h6 class="card-subtitle mb-2 text-muted text-accent">12</h6>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
                    
                            <a href="{{route('hotel_index')}}"  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:10px;">
                                                <div class="m-widget26">
                                                        <div class="m-widget26__number">
                                                        </div>
                                                        <h6 class="card-title text-center text-info">HOTELS</h6>
                                                        <i class="la la-hotel text-info" style="font-size:50px;"></i>
                                                        <hr>
                                                        {{-- <h6 class="card-subtitle mb-2 text-muted text-info">12</h6>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a>  
                        
                                <a href="{{route('hotelgroup_index')}}"  class="m-portlet btn">
                                                <div class="m-portlet__body" style="padding:10px;">
                                                    <div class="m-widget26">
                                                            <div class="m-widget26__number">
                                                            </div>
                                                            <h6 class="card-title text-center text-warning">HOTEL GROUPS</h6>
                                                           <i class="la la-group text-warning" style="font-size:50px;"></i>
                                                            <hr>
                                                            {{-- <h6 class="card-subtitle mb-2 text-muted text-warning">12</h6>	 --}}
                                                                                        
                                                    </div>
                                                </div>                      
                                </a>                          
        </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xl-12">
                    <div class="form-group m-form__group row" style="padding-left:50px;">
                            <h5 >Transport</h5>
                    </div>
        <div class="form-group m-form__group row" style="padding-left:50px;">
                
                    <a href="{{route('vehicle_sup_index')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px 10px 10px 1px;">
                                        <div class="m-widget26">
                                                <div class="m-widget26__number">
                                                </div>
                                                <h6 class="card-title text-center text-warning" style="font-size:13.5px;">VEHICLE SUPPLIER</h6>
                                                <i class="la la-building text-warning" style="font-size:50px;"></i>
                                                <hr>
                                                {{-- <h6 class="card-subtitle mb-2 text-muted text-danger">12</h6>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>  
                
                        <a href="{{route('vehicles_index')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:10px;">
                                            <div class="m-widget26">
                                                    <div class="m-widget26__number">
                                                    </div>
                                                    <h6 class="card-title text-center text-danger">VEHICLE</h6>
                                                    <i class="la la-automobile text-danger" style="font-size:50px;"></i>
                                                    <hr>
                                                    {{-- <h6 class="card-subtitle mb-2 text-muted text-warning">12</h6>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
                    
                            <a href="{{route('load_vehcles')}}"  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:10px;">
                                                <div class="m-widget26">
                                                        <div class="m-widget26__number">
                                                        </div>
                                                        <h6 class="card-title text-center text-accent">VEHICLE TYPES</h6>
                                                        <i class="m-menu__link-icon flaticon-car text-accent" style="font-size:40px;"></i>
                                                        <hr>
                                                        {{-- <h6 class="card-subtitle mb-2 text-muted text-info">12</h6>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a>  
                        
                                <a href="{{route('driver_index')}}"  class="m-portlet btn">
                                                <div class="m-portlet__body" style="padding:10px;">
                                                    <div class="m-widget26">
                                                            <div class="m-widget26__number">
                                                            </div>
                                                            <h6 class="card-title text-center text-info">DRIVERS</h6>
                                                            <i class="la la-user text-info" style="font-size:50px;"></i>
                                                            <hr>
                                                            {{-- <h6 class="card-subtitle mb-2 text-muted text-accent">12</h6>	 --}}
                                                                                        
                                                    </div>
                                                </div>
                                                                            
                                                    </a>  
                           
                                    <a href="{{route('transportExpenses_index')}}"  class="m-portlet btn">
                                                    <div class="m-portlet__body" style="padding:10px;">
                                                        <div class="m-widget26">
                                                                <div class="m-widget26__number">
                                                                </div>
                                                                <h6 class="card-title text-center text-success" >EXPENSES</h6>
                                                                <i class="la la-dollar text-success" style="font-size:50px; margin-top:0px;"></i>
                                                                <hr >
                                                                {{-- <h6 class="card-subtitle mb-2 text-muted text-success">12</h6>	 --}}
                                                                                            
                                                        </div>
                                                    </div>
                                                                                
                                                        </a>  
                                
                                            
        </div>
            </div>
    </div>
    <div class="row">
            <div class="col-xl-12">
                    <div class="form-group m-form__group row" style="padding-left:50px;">
                            <h5 >Guide</h5>
                    </div>
        <div class="form-group m-form__group row" style="padding-left:50px;">
                
                    <a href="{{route('index_guide')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                        <div class="m-widget26">
                                                <div class="m-widget26__number">
                                                </div>
                                                <h6 class="card-title text-center text-info">GUIDE</h6>
                                                <i class="la la-user-secret text-info" style="font-size:50px;"></i>
                                                <hr>
                                                {{-- <h6 class="card-subtitle mb-2 text-muted text-danger">12</h6>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>  
               
                        <a href="{{route('language_index')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:10px;">
                                            <div class="m-widget26">
                                                    <div class="m-widget26__number">
                                                    </div>
                                                    <h6 class="card-title text-center text-success " >LANGUAGES</h6>
                                                    <i class="la la-language text-success" style="font-size:50px;"></i>
                                                    <hr>
                                                    {{-- <h6 class="card-subtitle mb-2 text-muted text-warning">12</h6>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
                    
                            <a href="{{route('guideroom_index')}}"  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:10px;">
                                                <div class="m-widget26">
                                                        <div class="m-widget26__number">
                                                        </div>
                                                        <h6 class="card-title text-center text-warning">GUIDE ROOMS</h6>
                                                        <i class="la la-bed text-warning" style="font-size:50px;"></i>
                                                        <hr>
                                                        {{-- <h6 class="card-subtitle mb-2 text-muted text-info">12</h6>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a>  
                        
                                <a href="{{route('guidelanguagerate_index')}}"  class="m-portlet btn">
                                                <div class="m-portlet__body" style="padding:10px;">
                                                    <div class="m-widget26">
                                                            <div class="m-widget26__number">
                                                            </div>
                                                            <h6 class="card-title text-center text-accent">GUIDE FEE</h6>
                                                            <i class="la la-money text-accent" style="font-size:50px;"></i>
                                                            <hr>
                                                            {{-- <h6 class="card-subtitle mb-2 text-muted text-accent">12</h6>	 --}}
                                                                                        
                                                    </div>
                                                </div>
                                                                            
                                                    </a>  
                            
                                            
        </div>
            </div>
    </div>
    <div class="row">
            <div class="col-xl-12">
                    <div class="form-group m-form__group row" style="padding-left:50px;">
                            <h5 >Miscellaneous</h5>
                    </div>
        <div class="form-group m-form__group row" style="padding-left:50px;">
                
                    <a href="{{route('index_miscellanies')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                        <div class="m-widget26">
                                                <div class="m-widget26__number">
                                                </div>
                                                <h6 class="card-title text-center text-accent">SUPPLIER</h6>
                                                <i class="la la-user text-accent" style="font-size:50px;"></i>
                                                <hr>
                                                {{-- <h6 class="card-subtitle mb-2 text-muted text-danger">12</h6>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>  
                
                        <a href="{{route('miscellaneousCategory_index')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:10px;">
                                            <div class="m-widget26">
                                                    <div class="m-widget26__number">
                                                    </div>
                                                    <h6 class="card-title text-center text-warning">ITEM LIST</h6>
                                                    <i class="la la-cubes text-warning" style="font-size:50px;"></i>
                                                    <hr>
                                                    {{-- <h6 class="card-subtitle mb-2 text-muted text-warning">12</h6>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
                    
                                            
        </div>
            </div>
    </div>
</div>
@endsection