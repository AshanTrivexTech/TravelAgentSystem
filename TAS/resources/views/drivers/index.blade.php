@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<meta name="_token" content="{{csrf_token()}}" />
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
												Drivers
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">

                  @if($add_pv==1)
            <a href="{{route('driver_create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Drivers Master File
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
            
            <table class="table table-bordered table-hover"  id="">
                <thead>

                <tr style="text-align: center">
                 
                    <th>ID</th>
                    <th>Name</th>
                    <th>Licence No</th>
                    <th>Address</th>                   
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody id="d_search">
                    @foreach($driver_view as $driver)     
                                <tr> 
                                        <td style="text-align: center">{{$driver->id}}</td>
                                        <td>{{$driver->driver_name}}</td>
                                        <td>{{$driver->licence_no}}</td> 
                                        <td>{{$driver->driver_address}}</td> 
                                        <td style="text-align: center">
            
                                                <a id="_mdl"   onclick="loadEmail({{$driver->id}})"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" 
                                                    
                                                    title="Email">
                                                     <i class="la  la-envelope"></i>
             
                                                 </a>
            
                                                 <a id="_mdl" onclick="loadTel({{$driver->id}})"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" 
                                                    title="Telephone">
                                                    <i class="la  la-tty"></i>
                                                 </a>
                                                  
                                                     @if($edit_pv==1)
                                                 <a href="{{route('driver_edit',$driver->id)}}" id=""
                                                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                         title="Edit View">
                                                         <i class="la la-edit"></i>
                 
                                                </a>
                                                    @endif
            
                                                    @if($del_pv==1)
                                                    <a id="{{$driver->id}}" onclick="deleteAccept({{$driver->id}})"
                                                        class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                                        title="Delete details">
                                                         <i class="la la-trash"></i>
                 
                                                   </a>
                                                      @endif
                                    </td>
                                </tr>
                             
                    @endforeach()
                </tbody>
            </table>
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

                           <div id="contacts_div" style="text-align: center"></div>

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
                        <h5 class="modal-title" id="exampleModalLongTitle">Mobile</h5>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>

                                

        $(document).ready(function() {

                            
                            function fetch_quotation_data(query = '') {

                                    $.ajaxSetup({
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                    }
                                });

                            var del_pv='{{$del_pv}}';
                            var edit_pv='{{$edit_pv}}';

                            $.getJSON({
                            url:'{{Route('driver_liverSearch')}}',
                            method:'POST',
                            data:{query:query,edit_pv:edit_pv,del_pv:del_pv},
                            //dataType:'json',
                            success:function (data) {

                            // console.log(del_pv);
                            // console.log(edit_pv);
                            $('#d_search').html(data.table_data);
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
                
                                        url: '{{Route('driver_delete')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                
                                            //console.log(data);
                
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


           function loadEmail(id)
             {
      
              $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
               });

                      
                   
                       $.getJSON({
                                        url: '{{Route('view_contacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                                            
                                             console.log(data.email);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#contacts_div').html(data.email);

                                             });
                                             $('#email_modal').modal();
                                 }               
    })
    }
    function loadTel(id)
             {
      
              $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
               });

                     // let contact = $('#contacts_div');
                    //   var abc=id;
                   
                       $.getJSON({
                                        url: '{{Route('view_contacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                                            //data.email
                                            // console.log(data.tel);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#tel').html(data.tel);

                                             });
                                             $('#tel_modal').modal();
                                 }               
    })
    }

     
        </script>
@endsection




