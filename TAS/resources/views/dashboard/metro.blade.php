@extends('layouts.tas_app') @section('content')

<div class="m-subheader ">
        <div class="d-flex align-items-center">
                <div class="mr-auto">
                        <h3 class="m-subheader__title m-subheader__title--separator ">
                                    Dashboard
                        </h3>
                </div>
        </div>
</div>

<div class="m-content">

    {{-- <div class="m-portlet m-portlet--mobile"> --}}
        
        <div class="m-portlet__body">
                             
                        <div class="form-group m-form__group row">
                                <div class="col-lg-10">
                            <div class="card-deck">
                                    <div class="card" style="width: 25rem;">
                                            <div class="card-body text-success">
                                              <h5 class="card-title">CREATE NEW POST</h5>
                                              {{-- <p class="card-text-success">With supporting text below as a natural lead-in to additional content.</p>
                                              <a href="#" class="btn btn-success">Go somewhere</a> --}}
                                              <h1 style="text-align:center" ><i class="la la-edit"></i></h1>
                                            </div>
                                    </div>
                            
                                    <div class="card" style="width: 25rem;">
                                            <div class="card-body">
                                              <h5 class="card-title">Special title treatment</h5>
                                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                              <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                    </div>
                            
                                    <div class="card" style="width: 25rem;">
                                            <div class="card-body">
                                              <h5 class="card-title">Special title treatment</h5>
                                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                              <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                    </div>
                            </div>
                                </div>
                                {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                <div class="col-lg-2">
                            <div class="card">
                                    <div class="card text-white bg-dark mb-3" style="width: 15rem;">
                                            <div class="card-body">
                                              <h5 class="card-title">Special title treatment</h5>
                                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                              <a href="#" class="btn btn-primary">Go </a>
                                            </div>
                                    </div>
                            </div>
                                </div>   
                        </div>
      
               </div>
               <div class="form-group m-form__group row">
               <div class="col-lg-4">
               <div class="form-group m-form__group row">
                    
                <div class="card-deck">
                        <div class="card" style="width: 32rem;">
                                <div class="card-body">
                                  <h5 class="card-title">Special title treatment</h5>
                                  <p class="card-text-success">With supporting text below as a natural lead-in to additional content.</p>
                                  <a href="#" class="btn btn-success">Go somewhere</a>
                                </div>
                        </div>
                
                </div>   
            </div>
            <div class="form-group m-form__group row">
                    
                    <div class="card-deck">
                            <div class="card" style="width: 15rem;">
                                    <div class="card-body">
                                      <h5 class="card-title">Special title treatment</h5>
                                      <p class="card-text-success">With supporting text below as a natural lead-in to additional content.</p>
                                      <a href="#" class="btn btn-success">Go somewhere</a>
                                    </div>
                            </div>
                    
                            <div class="card" style="width: 15rem;">
                                    <div class="card-body">
                                      <h5 class="card-title">Special title treatment</h5>
                                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                            </div>
                    
                            
                    </div>
                           
                </div>
               </div>
               <div class="col-lg-6">
                    <div class="card-deck">
                            <div class="card" style="width: 48rem ;">
                                    <div class="card-body">
                                      <h5 class="card-title">Special title treatment</h5>
                                      <p class="card-text-success">With supporting text below as a natural lead-in to additional content.</p>
                                      <a href="#" class="btn btn-success">Go somewhere</a>
                                      <div class="card-body">
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                            </div>
                       
                    </div>
               </div>
               <div class="col-lg-2">
                    {{-- <div class="card-deck"> --}}
                            <div class="card" style="width: 15rem;">
                                    <div class="card-body">
                                      <h5 class="card-title">Special title treatment</h5>
                                      <p class="card-text-success">With supporting text below as a natural lead-in to additional content.</p>
                                      <a href="#" class="btn btn-success">Go somewhere</a>
                                    </div>
                            </div>
                       
                    {{-- </div> --}}
               </div>
   </div>
                           
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent

        
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>
@endsection