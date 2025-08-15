@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                    Transport
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
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                        Master Files
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                        Transport 
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                        Vehicles 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
               <a href="{{Route('vehicle_create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la 	la-plus"></i>
													<span>
														Create
													</span>
                    </span>
                </a> 
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
										Supplier ID &nbsp :&nbsp{{$VehicleSupDetails->id}} &nbsp;&nbsp; - &nbsp;&nbsp; Name&nbsp:&nbsp{{$VehicleSupDetails->sup_name}} 
										</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">

                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <div style="overflow-x:auto;">
            <table class="table table-bordered table-hover table-checkable" id="" width: "100%">
                <thead>
                    <tr>
                            <th>ID</th>                            
                            <th>Vehicle Type</th>
                            <th>Title</th>
                            <th>Vehicle No</th>
                            <th>LC EXPD</th>
                            <th>IN EXPD</th>
                            <th style="width:8%">Rate (LKR)</th>
                            <th>Status</th>
                            <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($vehicle_list as $vehicle)
                        <tr>
                            <td style="text-align: center;">{{$vehicle->id}}</td>                            
                            <td>{{$vehicle->type}}</td>
                            <td>{{$vehicle->title}}</td>
                            <td style="text-align: center;">{{$vehicle->reg_no}}</td>
                            <td>{{$vehicle->licence_exp_date}}</td>
                            <td>{{$vehicle->insurance_exp_date}}</td>
                            <td style="text-align: center;">{{$vehicle->rate_per_km}}</td>
                            <td style="text-align: center;">
                                    @if ($vehicle->status == 1)
                                    <span class="m-badge m-badge--success m-badge--wide">Active</span>
                                    @else
                                    <span class="m-badge m-badge--danger m-badge--wide">In Active</span>
                                    @endif                            
                                </td>
                            <td style="text-align: center;">                                
                                    
                                    <a href="{{Route('vehicle_edit',$vehicle->id)}}"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Edit View">
                                        <i class="la la-edit"></i>
    
                                    </a>
                                     <a id="{{$vehicle->id}}" onclick="deleteAccept({{$vehicle->id}}) "
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Delete">
                                        <i class="la la-trash"></i>
    
                                    </a>
                                </td>
    
                        
                        </tr>                     
                     @endforeach			

                          
                </tbody>
            </table>
        </div>
            <!--end: Datatable -->
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent
{{-- <script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script> --}}

<script>

        function deleteAccept(id){
                       
               
                     
                               swal({
                                   title: "Are you sure you want to delete?",
                                   text: "Once deleted, you will not be able to recover this imaginary file!",
                                   icon: "warning",
                                   buttons: true,
                                   dangerMode: true,
                               })
                                   .then((willDelete) => {
                                       if (willDelete) {
       
                                           
       
                                           $.ajaxSetup({
                                               headers: {
                                                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                               }
                                             });
                                           
                                           $.ajax({
                       
                                               url: '{{Route('vehicle_delete')}}',
                                               method: "POST",
                                               data: {id:id},
                                               success: function(data) {
                       
                                                  console.log(data);
                       
                                                  // $('#emp_listGrid').append(data);
                                                  if(data=='deleted'){               
                                                     window.location.reload();                                               
                                                  }else{
                                                   swal("Something went wrong Sorry Cannot Delete!", "This Supplier has already added vehicles", "error");
                                                  }
                                               }
                                           })
                                     
                                       }
                                   });
                                   
                  }
                       
               </script>


@endsection


