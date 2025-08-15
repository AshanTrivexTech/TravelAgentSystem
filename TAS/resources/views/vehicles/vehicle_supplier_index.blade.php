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
                        Vehicle Suppliers
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                  @if($add_pv==1)
               <a href="{{Route('vehicle_sup_create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la 	la-plus"></i>
													<span>
														Create
													</span>
                    </span>
                </a> 
                  @endif
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
										Vehicle Suppliers Master File
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
            <table class="table table-bordered table-hover table-checkable" id="" width: "100%">
                <thead>
                    <tr  style="text-align: center;" >            
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="vsup_srch">
                    @foreach ($VehiclesSup->all() as $Vehicle_Sup)
                        <tr>
                            <td  style="text-align: center;" >{{$Vehicle_Sup->id}}</td>
                            <td  style="text-align: center;" >{{$Vehicle_Sup->code}}</td>
                            <td>{{$Vehicle_Sup->sup_name}}</td>
                            <td>{{$Vehicle_Sup->address}}</td>
                            <td>{{$Vehicle_Sup->city_name}}</td>                            
                            <td style="text-align: center;">
                                @if ($Vehicle_Sup->status == 1)
                                <span class="m-badge m-badge--success m-badge--wide">Active</span>
                                @else
                                <span class="m-badge m-badge--danger m-badge--wide">In Active</span>
                                @endif                            
                            </td>
                            
                            <td style="text-align: center;">
                                    <a href="{{Route('vehicle_index',$Vehicle_Sup->id)}}"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill"
                                     title="View Vehicles">
                                     <i class="la la-automobile"></i>
                                            
                                    </a>
                                    <a id="" onclick="viewEmail({{$Vehicle_Sup->id}})"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Email">
                                         <i class="la la-envelope"></i>
 
                                    </a>
                                    <a id=""  onclick="viewTel({{$Vehicle_Sup->id}})"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Phone">
                                         <i class="la la-tty"></i>
                                        
                                    </a>
                                          @if($edit_pv==1)
                                    <a href="{{Route('vehicle_sup_edit',$Vehicle_Sup->id)}}"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Edit View">
                                        <i class="la la-edit"></i>

                                    </a>
                                      @endif

                                      @if($del_pv==1)
                                     <a id="{{$Vehicle_Sup->id}}" onclick="deleteAccept({{$Vehicle_Sup->id}}) "
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Delete">
                                        <i class="la la-trash"></i>

                                    </a>
                                      @endif
                                </td>                            
                        </tr>                        
                    @endforeach                         
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
 <div class="modal fade" id="email_modal" name="email_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table>
    
                               <div id="email" style="text-align: center"></div>
                               
    
                        </table>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
    </div>
 <div class="modal fade" id="tel_modal" name="tel_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Telephone</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table>
        
                                   <div id="tel" style="text-align: center"></div>
                                   
        
                            </table>     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
  </div>

</div>

@endsection @section('Page_Scripts') @parent

<script>


                $(document).ready(function() {
                
                function fetch_quotation_data(query = ''){

                        $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                        var edit_pv='{{$edit_pv}}';
                        var del_pv='{{$del_pv}}';

                $.getJSON({
                url:'{{Route('v_sup_liveSearch')}}',
                method:'POST',
                data:{query:query,edit_pv:edit_pv,del_pv:del_pv},
                //dataType:'json',
                success:function (data) {

                // console.log(data);
                $('#vsup_srch').html(data.table_data);
                }
                })
                }

                $(document).on('keyup','#generalSearch',function () {

                var query = $(this).val();
                fetch_quotation_data(query);
                });

                ; });



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
                
                                        url: '{{Route('vehicle_sup_delete')}}',
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


           function viewEmail(id)
              {
      
                  $.ajaxSetup({
                         headers:{
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                 }
                             });

                        $.getJSON({
                                        url:'{{Route('view_vehicleSuppliercontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data){
                                            
                                            console.log(data.email);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#email').html(data.email);
                                             

                                              });
                                             $('#email_modal').modal();
                                      }               
                                 })
                                 }  
                    
             function viewTel(id)
                     {
      
                      $.ajaxSetup({
                            headers:{
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                    }
                                 });

                           $.getJSON({
                                        url:'{{Route('view_vehicleSuppliercontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data){
                                            
                                            console.log(data.tel);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#tel').html(data.tel);
                                             

                                              });
                                             $('#tel_modal').modal();
                                      }               
                                 })
                                 } 
                
        </script>
        
@endsection