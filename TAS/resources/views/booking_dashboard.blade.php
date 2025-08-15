@extends('layouts.tas_app') 
@section('content')
<meta name="_token" content="{{csrf_token()}}" />

<style>
    .row>a{

        display:grid;
        border: 3px solid #ddd;
        margin-bottom:10px;
        background-color:#fff;
        margin-left:10px;
        
    }.col-xs-6>a{

        margin-bottom:10px;
        border: 3px solid #ddd;
        background-color:#fff;
        margin-left:10px;
        

    }.col-xs-4>a{

        margin-bottom:10px;
        border: 3px solid #ddd;
        background-color:#fff;
        margin-left:10px;
        

    }.col-xs-2>a{

        margin-bottom:10px;
        border: 3px solid #ddd;
        background-color:#fff;
        margin-left:10px;
        

    }.row{

        margin-left:10px;
        
    }
    .footer>a{

        display:flex;
        border: 3px solid #ddd;
        margin-bottom:10px;
        background-color:#fff;
        margin-left:15px;
        position:fixed;
        flex-flow: row wrap;       
    }
        @media screen and (max-width: 430px) {
            .col-xs-6>a{

                width:320px;
                
            }
        }
        @media screen and (min-width: 431px) and (max-width: 630px) {
            
            .conta{
                width:400px;
                }
                #hd_tc{
                    font-size:10px;
                }
        }
        @media screen and (min-width: 631px) and (max-width: 830px) {
            .conta{
                 width:600px;
                }
        }
        @media screen and (min-width: 831px) and (max-width: 1030px) {
            .conta{
                   width:800px;
                }
        }
    
</style>

<div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator ">
                            Tour Booking 
                    </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="/dashboard" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>   
                    <li class="m-nav__item">
                      
                            <span class="m-nav__link-text">
                        Tour Manager
                                                </span>
                       
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Tour Bookings 
                                                </span>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                     
                            <span class="m-nav__link-text">
                                    Reservation 
                                                </span>
                      
                    </li>
                </ul>
            </div>
            <div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
    </div>
    
<!-- END: Subheader -->
      <br>
      <div class="conta">
            <div class="row" >
                    <a  style="width: 73rem; height: 6.7rem; " class="m-portlet" id="hd_tc">
                            <div class="m-portlet__body" style="padding:3px;">
                                <br>
                                  <h5 style="text-align:left;">Tour Code  : CHN/AG-23/CMB/102018-2-V1
	
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tour Title  :England Cricket Tour</h5>
                                  <hr>          
                                                                    
                            </div>
                                                        
                    </a>  
             </div>
            <div class="row" >
    
                    <a href="" style="width: 20rem; height: 12.5rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                                <h6 class="card-title text-center text-primary" style="font-size:15px;">GUEST ALLOCATION</h6>
                                                <i class="la la-users text-primary" style="font-size:50px;"></i>
                                                <hr>
                                                <h6 class="card-subtitle mb-2 text-muted text-success" style="font-size:15px;">12</h6>	
                                                                            
                                    </div>
                                                                
                    </a>  
                    <a href="" style="width: 20rem; height: 12.5rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                                    <h6 class="card-title text-center text-success" style="font-size:15px;">GUIDES</h6>
                                                    <i class="la la-user-secret text-success" style="font-size:50px;"></i>
                                                    <hr>
                                                    <h6 class="card-subtitle mb-2 text-muted text-success" style="font-size:15px;">10</h6>             
                                    </div>
                                                                    
                    </a> 
                                             
                   
                    <a href="" style="width: 20rem; height: 12.5rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                                    <h6 class="card-title text-center text-warning" style="font-size:15px;">TRANSPORT</h6>
                                                    <i class="la la-car text-warning" style="font-size:50px;"></i>
                                                    <hr>
                                                    <h6 class="card-subtitle mb-2 text-muted text-warning" style="font-size:15px;">15</h6> 
                                    </div>
                                                                        
                    </a>  
                        
                    <a href="" style="width: 11rem; height: 12.5rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                                    <h6 class="card-title text-center text-success" style="font-size:15px;">AMENDMENT</h6>
                                                    <i class="m-menu__link-icon flaticon-file text-success" style="font-size:50px;"></i>
                                                    <br><br>
                                                    <h6 class="card-title text-center text-accent" style="font-size:15px;">Booking</h6>
                                                    
                                    </div>
                                                                            
                    </a>  
                                                        
        </div>
        <div class="row" >
                <div class="col-xs-4">
                        <a href="" style="width: 20rem; height: 6rem; " class="m-portlet btn">
                                <div class="m-portlet__body" style="padding:10px;">
                                    <div class="row">
                                            <h6 class="card-title text-left text-success" style="font-size:15px;">ITINERARY</h6>
                                            <i class="la la-file text-success" style="font-size:45px;  margin-left:80px; "></i>
                                    </div>
                                           
                                                
                                                                        
                                </div>
                                                            
                         </a>
                         <div class="col-xs-6">
                                <a href="" style="width: 9.5rem; height: 6rem; " class="m-portlet btn">
                                        <div class="m-portlet__body" style="padding:5px;">
                                                    <i class="m-menu__link-icon flaticon-route text-center text-primary" style="font-size:45px;"></i>
                                            </div>
                                                                                  
                                </a> 
                <a href="" style="width: 9.5rem; height: 6rem; " class="m-portlet btn">
                        <div class="m-portlet__body" style="padding:5px;">
                                <i class="m-menu__link-icon flaticon-file text-success" style="font-size:45px;"></i>
                                                              
                        </div>                      
                </a> 
                         </div>
                         
                </div>
                <div class="col-xs-6" id="asd">
                        <a href="" style="width: 35rem; height: 12.7rem;  " class="m-portlet btn" id="acc">
                                <div class="m-portlet__body" style="padding:10px;">
                                    
                                            <h6 class="card-title text-left text-info" style="font-size:15px;">ACCOMODATION</h6>
                                            <i class="la la-hotel text-left text-info" style="font-size:45px; margin-left:0px;"></i>
                                            <br><br>
                                            <hr>
                                            <h6 class="card-subtitle mb-2 text-muted text-accent" style="font-size:15px;">12</h6>	
                                                                               
                                </div>                          
                        </a> 
                </div>
    
                <div class="col-xs-2">
                            <a href="" style="width: 16.8rem; height: 12.7rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                        
                                                <h6 class="card-title text-center text-primary" style="font-size:15px;">MISCELLANEOUS</h6>
                                                <i class="la la-paperclip text-primary" style="font-size:48px;"></i><br><br>
                                                <hr>
                                                <h6 class="card-subtitle mb-2 text-accent text-accent" style="font-size:15px;">Manage</h6>	                                           
                                       
                                    </div>                             
                            </a> 
                </div>
                                                      
            </div>
            <div class="row" >
    
                    <a href="" style="width: 16.5rem; height: 6rem; " class="m-portlet btn">
                            <div class="m-portlet__body" style="padding:10px;">
                                <div class="row">
                                        <h6 class="card-title text-left text-warning" style="font-size:15px;">INVOICE</h6>
                                        <i class="la la-file-picture-o text-warning" style="font-size:40px;  margin-left:50px; margin-top:0px;"></i>
                                </div>
                                                                          
                            </div>                            
                     </a> 
                    <a href="" style="width: 16.5rem; height: 6rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:10px;">
                                        <div class="row">
                                                <h6 class="card-title text-center text-info" style="font-size:15px;">FINALIZE</h6>
                                                <i class="la la-check-circle text-info" style="font-size:40px; margin-left:50px;"></i>
                                        </div>                     
                                    </div>                              
                    </a> 
                                             
                   
                    <a href="" style="width: 28rem; height: 6rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:5px;">
                                                    <h6 class="card-title text-left text-success" style="font-size:15px;">OPERATION CHECKLIST</h6>
                                                    <i class="la la-users text-success text-right" style="font-size:30px;"></i>
                                                    <i class="la la-car text-success text-right" style="font-size:30px;"></i>
                                                    <i class="la la-hotel text-success text-right" style="font-size:30px;"></i>
                                                    <i class="la la-file-text-o text-success text-right" style="font-size:30px;"></i>
                                                     
                                    </div>
                                                                        
                    </a>  
                        
                    <a href="" style="width: 10.3rem; height: 6rem; " class="m-portlet btn">
                                    <div class="m-portlet__body" style="padding:2px;">
                                                    <h6 class="card-title text-center text-accent" style="font-size:15px;">Comment List</h6>
                                                    <i class="la la-comment-o text-accent" style="font-size:30px;"></i>
                                                         
                                    </div>                                       
                    </a>  
                                                        
        </div>
        <div class="row" >
                <a style="width: 73.5rem; height: 6.7rem;" class="m-portlet">
                        <div class="m-portlet__body" style="padding:5px;">
                                        <h6 class="card-title text-left text-accent" style="font-size:15px;">Tour Remarks:</h6>
                                        <hr>
                                        <span style="text-indent:50px; text-align:left;" class="text-mute">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium iusto quas hic distincti.<br>
                                            {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium iusto quas hic distincti.<br> --}}
                                            {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium iusto quas hic distincti.  --}}
                                        </span>																			                                 
                        </div>                           
                 </a>  
         </div>
      </div>
 
@endsection