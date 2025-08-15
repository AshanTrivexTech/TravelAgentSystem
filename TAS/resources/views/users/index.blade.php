@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
 <div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
						Master Data
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
                            Master Data
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                                Currency 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                      Manage Users
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
            <table class="table table-bordered table-hover table-checkable">
                <thead>
                    <tr>  <th style="text-align: center">ID</th>
						  <th style="text-align: center">User Name</th>
                          <th style="text-align: center">Email</th>
		                  <th style="text-align: center">Actions</th> 
                    </tr>
                </thead>
                <tbody id="tb_sr">
                            
                    
                   <tr>
                       @foreach($users->all() as $user) 
                          <td style="text-align:center">{{$user->id}}</td>
                          <td style="text-align:center">{{$user->name}}</td>
                          <td style="text-align:center">{{$user->email}}</td>
                          <td class="m-datatable__cell--right" style="text-align: center">
                            
                          <a href="{{route('load_user_details',$user->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                             title="Add User Privileges">
                             <i class="la la-edit"></i>
                            </a>
                          <a id= "" onclick="deleteAccept()"
                          class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                          title="Delete User"><i class="la la-trash"></i>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                
                                        url: '{{Route('user_delete')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                
                                            console.log(data);
                
                                           // $('#emp_listGrid').append(data);
                                           if(data=='deleted'){
                
                                              swal("Poof! Your imaginary file has been deleted!", {
                                                    icon: "success",
                                                });
                                                window.location.reload();
                                                
                                           }else{
                                            swal("Something went wrong!", "Sorry Cannot Delete", "error");
                                           }
                                        }
                                    })
                              
                                }
                            });
                            
           }

           $(document).ready(function() {

                            
                            function fetch_quotation_data(query = '') {

                                    $.ajaxSetup({
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                    }
                                });

                            $.getJSON({
                            url:'{{Route('user_liveSearch')}}',
                            method:'POST',
                            data:{query:query},
                            //dataType:'json',
                            success:function (data) {

                            // console.log(del_pv);
                            // console.log(edit_pv);
                            $('#tb_sr').html(data.table_data);
                            }
                            })
                            }

                            $(document).on('keyup','#generalSearch',function () {

                            var query = $(this).val();
                            fetch_quotation_data(query);
                            });

                            ; });      
        </script>
        
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>
@endsection