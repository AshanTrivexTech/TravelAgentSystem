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
                                            Agents 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    @if($add_pv ==1)
            <a href="{{route('agent_create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                        Agents Master File
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
                    <tr style="text-align:center">
                        <th>ID</th>
                        <th>Agent Code</th>
                        <th>Agent Name</th>
                        <th>Market</th>
                        <th>Address</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id='tb_sr'>
                        @foreach($markets->all() as $market)
                    <tr>
                    <td style="text-align:center">{{$market->id}}</td>  
                    <td style="text-align:center">{{$market->ag_code}}</td>
                    <td>{{$market->ag_name}}</td>
                    <td>{{$market->market_name}}</td>
                    <td>@if($market->address=='') Not Available @else {{$market->address}} @endif</td>
                    <td> @if($market->remarks=='') Not Available @else{{$market->remarks}} @endif</td>
                    <td style="text-align: center">

                            <a id=""   onclick="viewEmail({{$market->id}})"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" 
                                    title="Email">
                                     <i class="la  la-envelope"></i>
                            </a>

                            <a id="_mdl" onclick="viewTel({{$market->id}})"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" 
                                    title="Telephone">
                                    <i class="la  la-tty"></i>
                                 </a>

                                 <a id="_mdl" onclick="viewFax({{$market->id}})"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-metal m-btn--icon m-btn--icon-only m-btn--pill" 
                                        title="Fax">
                                        <i class="la  la-fax"></i>
                                     </a>
                             
                            @if ($edit_pv == 1)
                              @if($market->id!=1)
                            <a href="{{route('agent_edit',$market->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                <i class="la la-edit"></i>
                            </a>
                              @endif 
                            @endif
                                 
                               @if ($del_pv == 1)
                                @if($market->id!=1)
                               <a id="{{$market->id}}" onclick="deleteAccept({{$market->id}}) "
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                    title="Edit View">
                                     <i class="la la-trash"></i>
                                 </a>
                                   @endif
                                 @endif

                                
                    </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            </div>
            <!--end Datatable -->
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
        
                                   <div id="contacts_email_A" style="text-align: center"></div>
                                   <div id="contacts_email_B" style="text-align: center"></div>
                                   <div id="contacts_email_C" style="text-align: center"></div>
        
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
            
                                       <div id="contacts_tel" style="text-align: center"></div>
                                       
            
                                </table>     
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="fax_modal" name="fax_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Fax</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table>
                
                                           <div id="contacts_fax" style="text-align: center"></div>
                                           
                
                                    </table>     
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

    </div>
</div>


@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>


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
                         url:'{{Route('agent_livesearch')}}',
                         method:'POST',
                         data:{query:query,del_pv:del_pv,edit_pv:edit_pv},
                         //dataType:'json',
              success:function (data) {

                 //  console.log(data);
                $('tbody').html(data.table_data);
                }
                })
                
                }

                $(document).on('keyup','#generalSearch',function () {

                    var query = $(this).val();
                    fetch_quotation_data(query);
                  });

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
                
                                        url: '{{Route('agent_delete')}}',
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
             function viewEmail(id)
              {
      
                  $.ajaxSetup({
                         headers:{
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                  }
                             });

                        $.getJSON({
                                        url:'{{Route('view_agentcontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data){
                                            
                                            console.log(data.email_A);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#contacts_email_A').html(data.email_A);
                                             $('#contacts_email_B').html(data.email_B);
                                            $('#contacts_email_C').html(data.email_C);

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
                                        url:'{{Route('view_agentcontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data){
                                            
                                            console.log(data.tel);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#contacts_tel').html(data.tel);
                                             

                                              });
                                             $('#tel_modal').modal();
                                      }               
                                 })
                                 } 

                 function viewFax(id)
                            {
      
                               $.ajaxSetup({
                                       headers:{
                                                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                                }
                                           });

                                $.getJSON({

                                        url:'{{Route('view_agentcontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data){
                                            
                                            console.log(data.fax);
                                           
                                             $.each(data, function (key, entry) {

                                             $('#contacts_fax').html(data.fax);
                                             

                                              });
                                             $('#fax_modal').modal();
                                      }               
                                 })
                                 } 
                    
                
        </script>

@endsection






