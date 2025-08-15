@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<meta name="_token" content="{{csrf_token()}}" />
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
						Guides
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
                        Guides
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
												Guides
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                 @if($add_pv==1)
            <a href="{{Route('create_guide')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Guide Master File
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
            
            <table class="table table-bordered table-hover" id="emp_tabel">
                <thead>

                <tr style="text-align: center;">

                    <th>ID</th>
                    <th>CODE</th>
                    <th>NAME</th>
                    <th>Address</th>                   
                    <th>TYPE</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody id='tb_sr'>
                                @foreach ($guide_list->all() as $guide)
                                <tr style="text-align: center;">
                                    <td>{{$guide->id}}</td>
                                    <td>{{$guide->code}}</td>
                                    <td>{{$guide->sup_s_name}}</td> 
                                    <td>{{$guide->address}}</td> 
                                    <td>{{$guide->g_type}}</td>
                                    <td style="text-align: center;">
                                        @if ($guide->status == 1)
                                        <span class="m-badge m-badge--success m-badge--wide">Active</span>
                                        @else
                                        <span class="m-badge m-badge--danger m-badge--wide">In Active</span>
                                        @endif
                                    
                                    </td>
                                    <td style="text-align: center;">
                                            
                                        
                                    <a href="{{route('load_guid_lanuages',$guide->gid)}}"
                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                             title="language">
                                             <i class="la la-language"></i>
     
                                            </a>

                                            <a id="" onclick="viewEmail({{$guide->id}})"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                     title="Email">
                                                     <i class="la la-envelope"></i>
             
                                            </a>
                                                <a id=""  onclick="viewTel({{$guide->id}})"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                     title="Mobile">
                                                     <i class="la la-tty"></i>
                                                    
                                                </a>

                                            </a>
                                            <a id=""   onclick="viewMobile({{$guide->id}})"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                 title="Phone">
                                                 <i class="la la-mobile"></i>
                                                
                                            </a>

                                               @if($edit_pv==1)
                                            <a href="{{route('edit_guide',$guide->id)}}" id=""
                                               class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="Edit View">
                                                <i class="la la-edit"></i>
        
                                            </a>
                                                @endif

                                                @if($del_pv==1)
                                             <a id="{{$guide->id}}" onclick="deleteAccept({{$guide->id}})"
                                               class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                               title="Delete">
                                                <i class="la la-trash"></i>
        
                                            </a>
                                               @endif()
                                </td>
                                 </tr>
                                @endforeach  
                           
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
    
                               <div id="email" style="text-align: center"></div>
    
                        </table>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="tel_modal" name="email_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

    <div class="modal fade" id="mobile_modal" name="email_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    
                               <div  id="mobile" style="text-align: center"></div>
    
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
                
                                        url: '{{Route('delete_guide')}}',
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

           function viewEmail(id)
             {
      
              $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
               });

                       $.getJSON({
                                        url: '{{Route('view_guidecontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                                            
                                             //console.log(data.email);
                                           
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
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
               });

                       $.getJSON({
                                        url: '{{Route('view_guidecontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                                            
                                             //console.log(data.email);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#tel').html(data.tel);

                                             });
                                             $('#tel_modal').modal();
                                 }               
    })
    }

        function viewMobile(id)
             {
      
              $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
               });

                       $.getJSON({
                                        url: '{{Route('view_guidecontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                                            
                                             //console.log(data.email);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#mobile').html(data.mobile);

                                             });
                                             $('#mobile_modal').modal();
                                 }               
    })
    }


                                   $(document).ready(function() {
                    
                    function fetch_quotation_data(query = '') {

                                $.ajaxSetup({
                                        headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                                }
                                    });

                                        var edit_pv='{{$edit_pv}}';
                                        var del_pv='{{$del_pv}}';

                                        $.getJSON({
                                        url:'{{Route('guide_livesearch')}}',
                                    method:'POST',
                                    data:{query:query,edit_pv:edit_pv,del_pv:del_pv},
                                    //dataType:'json',
                                    success:function (data) {

                                    //  console.log(data);
                                        $('#tb_sr').html(data.table_data);
                                        }
                                        })
                                        }

                        $(document).on('keyup','#generalSearch',function () {

                            var query = $(this).val();
                            fetch_quotation_data(query);
                                        });
                                    //fetch_quotation_data('')
                                    ; });
                
        </script>
        

@endsection




