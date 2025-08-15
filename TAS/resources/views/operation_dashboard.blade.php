@extends('layouts.tas_app') 
@section('content')
<meta name="_token" content="{{csrf_token()}}" />
  <style>
      .block>a{
    /* border-radius: 15px; */
          border:solid #ddd;
          margin-bottom:10px;
          background-color:#fff;
          margin-left:10px;
          height:10.5rem;
          width:10.5rem;

     }.m-widget26>i{

         font-size:40px;

     }.m-widget26>h6{

         font-size:13.5px;

     }
     .block{

          display:inline-block;
     }
     .m-content{

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
  </style>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        OPERATIONS
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
                    <h5 style="padding-left:50px;">Quotation</h5>
                </div>
            <div class="block" style="padding-left:50px;">
            {{-- <a href="{{Route('quotation_create_quick')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:5px;">
                                        <div class="m-widget26">
                                                <h6 class="card-title text-center text-success">Create Quick<br>Quotation</h6>
                                                <i class="m-menu__link-icon flaticon-file text-success "></i> --}}
                                                {{-- <hr>
                                                <h6 class="card-subtitle mb-2 text-muted text-success">12</h6>	 --}}
{{--                                                                             
                                        </div>
                                    </div>
                                                                
                                        </a>   --}}
                
                        <a href="{{Route('quotation_create')}}"  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:5px;">
                                            <div class="m-widget26">
                                                    <h6 class="card-title text-center text-accent" >Create a<br>Quotation</h6>
                                                    <i class="m-menu__link-icon flaticon-file text-accent" ></i>
                                                    {{-- <hr> --}}
                                                    {{-- <h6 class="card-subtitle mb-2 text-muted text-accent">12</h6>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
                    
                            <a href="{{Route('quotation_index')}}"  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:5px;">
                                                <div class="m-widget26">
                                                        <h6 class="card-title text-center text-info">Manage<br>Quotation</h6>
                                                        <i class="m-menu__link-icon flaticon-file text-info" ></i>
                                                        {{-- <hr> --}}
                                                        {{-- <h6 class="card-subtitle mb-2 text-muted text-info">12</h6>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a>  
                                                        
        </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xl-12">
                    <div class="form-group m-form__group row" style="padding-left:50px;">
                            <h5 >Bookings</h5>
                    </div>
        <div class="block" style="padding-left:50px;">
                
                    <a href="{{Route('tour_booking_index')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:5px;">
                                        <div class="m-widget26">
                                                <h6 class="card-title text-center text-danger">Manage<br>Bookings</h6>
                                                <i class="m-menu__link-icon flaticon-list text-danger" ></i>
                                                {{-- <hr> --}}
                                                {{-- <h6 class="card-subtitle mb-2 text-muted text-danger">12</h6>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>  
                
                        <a href=""  class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:5px;">
                                            <div class="m-widget26">
                                                    <h6 class="card-title text-center text-warning">Confirmed<br>Bookings</h6>
                                                    <i class="m-menu__link-icon flaticon-list text-warning" ></i>
                                                    {{-- <hr> --}}
                                                    {{-- <h6 class="card-subtitle mb-2 text-muted text-warning">12</h6>	 --}}
                                                                                
                                            </div>
                                        </div>
                                                                    
                                            </a>  
                    
                            <a href=""  class="m-portlet btn">
                                            <div class="m-portlet__body" style="padding:5px;">
                                                <div class="m-widget26">
                                                        <h6 class="card-title text-center text-info">Closed<br>Bookings</h6>
                                                        <i class="m-menu__link-icon flaticon-list text-info" ></i>
                                                        {{-- <hr> --}}
                                                        {{-- <h6 class="card-subtitle mb-2 text-muted text-info">12</h6>	 --}}
                                                                                    
                                                </div>
                                            </div>
                                                                        
                                                </a>  
                        
                                <a href=""  class="m-portlet btn">
                                                <div class="m-portlet__body" style="padding:5px;">
                                                    <div class="m-widget26">
                                                            <h6 class="card-title text-center text-accent" >Canceled<br>Bookings</h6>
                                                            <i class="m-menu__link-icon flaticon-list text-accent" ></i>
                                                            {{-- <hr> --}}
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
                            <h5 >Transport</h5>
                    </div>
        <div class="block" style="padding-left:50px;">
                
                    <a href="{{route('tourtransport_load')}}"  class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:5px;">
                                        <div class="m-widget26">
                                                <h6 class="card-title text-center text-info" >Manage<br>Transport<br>Requests</h6>
                                                <i class="m-menu__link-icon flaticon-car text-info" ></i>
                                                {{-- <hr> --}}
                                                {{-- <h6 class="card-subtitle mb-2 text-muted text-danger">12</h6>	 --}}
                                                                            
                                        </div>
                                    </div>
                                                                
                                        </a>                                 
        </div>
            </div>
    </div>
    
</div>
@endsection
