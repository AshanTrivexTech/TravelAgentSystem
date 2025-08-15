@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
						Hotel
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
                                Master File 
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
						 Hotel
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
						Package Period
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
               <a href="{{route('create_period')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                   
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
                            Package Period Master File
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
            <table class="table table-bordered table-hover table-checkable">
                    <thead>
                        <tr style="text-align: center">
                            <th>ID</th>
                            <th>Period Title</th>
                            <th>Period Type</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($periods->all() as $period)
                        <tr>
                        <td style="text-align: center">{{$period->id}}</td>   
                        <td>{{$period->title}}</td>
                        <td>{{$period->type}}</td>
                        <td style="text-align: center">{{$period->fr_date}}</td>
                        <td style="text-align: center">{{$period->to_date}}</td>
                            <td style="text-align: center">
    
                                    <a href="{{route('edit_period',$period->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i></a> 
                              
    
                                   <a id="{{$period->id}}" onclick="deleteAccept({{$period->id}}) "
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Edit View">
                                         <i class="la la-trash"></i>
    
                                     </a>
    
    
                            </td>
                        </tr> 
    
                        @endforeach
                    </tbody>
                </table>
            <!--end: Datatable -->
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




<script>
    $(document).ready(function() {




    });

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

                        url: '{{Route('delete_period')}}',
                        method: "POST",
                        data: {id:id},
                        success: function(data) {

                            console.log(data);

                            
                            if(data=='deleted'){

                               window.location.reload();
                            

                            }
                            
                            else{
                                            swal("Something went wrong!", "Sorry Cannot Delete", "error");
                              }
                        }
                    })
                }
            });

    }


</script>


@endsection


