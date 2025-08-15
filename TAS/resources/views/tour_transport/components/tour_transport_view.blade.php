@extends('layouts.tas_app') 
@section('content')

<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        Tour Accommodation
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
{{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong><div id="notify"></div>
        <button type="button" class="close" id="notify_close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
<div class="m-content">

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                
                <div class="m-portlet__head-title">
                     
                    <h3 class="m-portlet__head-text">
                           
                              
                            Tour Code : {{$id}}
                                   
                            
                            
                       </h3>
                </div>
              
            </div>
            <div class="m-portlet__head-tools">
                    <a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-angle-left"></i>
                                <span>
                                    Back
                                </span>
                            </span>
                        </a>
            </div>
        </div>
        {{-- {{$tbpos}} --}}
        <div class="m-portlet__body">           
            <div class="form-group m-form__group row">
                <div class="col-sm-12">
                        <ul class="nav nav-tabs" role="tablist">
                           
                                <li class="nav-item">
                                    <a     class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1"  >YTour Transport Details</a>
                                </li>											
                                <li class="nav-item">
                                    <a     class="nav-link " f  data-toggle="tab" href="#m_tabs_1_2" >Voucher</a>
                                </li>
                                <li class="nav-item">
                                    <a      class="nav-link"    data-toggle="tab" href="#m_tabs_1_3">Status</a>
                                </li>
                              
                            </ul>
                            <div class="tab-content">




                        
                             

                        <div   class="tab-pane"   id="m_tabs_1_1" role="tabpanel">
                            <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
                            </div>
                        </div>
                       


                            {{-- Voucher --}}
                            
                            <div    class="tab-pane"  id="m_tabs_1_2" role="tabpanel">
                                     
                                <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
                                        
                                    </div>

                        </div>


                        {{-- advance --}}

                

                        
                        <div    class="tab-pane"  id="m_tabs_1_3" role="tabpanel">
                                     
                            <div style="overflow-x:auto; overflow:scroll; height:700px;"> 
                                       
                                                    
                                </div>

                    </div>




                        </div>  
                    </div>
                        
                </div>
        </div>
    </div>

</div>

@endsection
@section('Page_Scripts') @parent

@endsection