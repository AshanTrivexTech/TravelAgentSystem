@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<meta name="_token" content="{{csrf_token()}}" />
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
												Hotels
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                @if($add_pv==1)
            <a href="{{Route('add_hotel')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Hotel Master File
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


             
                
                    <th >ID</th>
                    <th>CODE</th>
                    <th>SHORT NAME</th>
                    <th>LONG NAME</th>
                    <th>RATINGS</th>                   
                    <th>TYPE</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody id="emp_listGrid">
                    @foreach ($hotelsAll->all() as $hotel)                               
                    <tr>
                            <td style="text-align: center">{{$hotel->id}}</td>
                            <td style="text-align: center">{{$hotel->code}}</td>
                            <td>  {{$hotel->sup_s_name}}</td>
                            <td>{{$hotel->sup_name}}</td> 
                            <td style="text-align: center;">

                                @if($hotel->star_rate==0)
                                None
                                @else

                                @for ($i = 0; $i < $hotel->star_rate; $i++)

                                
                                <i class="la la-star"></i>
                                
                                @endfor 
                                @endif                          
                            </td>     
                            <td style="text-align: center;">{{$hotel->type_name}}</td>
                            <td style="text-align: center;">
                                @if ($hotel->status == 1)
                                <span class="m-badge m-badge--success m-badge--wide">Active</span>
                                @else
                                <span class="m-badge m-badge--danger m-badge--wide">In Active</span>
                                @endif
                            
                            </td>
                            
                            <td style="text-align: center;">

                                    <a href="{{$hotel->web_url}}"
                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                             title="Vist Web">
                                             <i class="la la-chrome"></i>
     
                                    </a>

                                    <a id=""  onclick="viewEmail({{$hotel->id}})"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Email">
                                         <i class="la la-envelope"></i>
 
                                    </a>
                                    <a id="" onclick="viewTel({{$hotel->id}})"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                         title="Phone">
                                         <i class="la la-tty"></i>
                                        
                                    </a>

                                    <a id="" onclick="viewFax({{$hotel->id}})"
                                            class="m-portlet__nav-link btn m-btn m-btn--hover-metal m-btn--icon m-btn--icon-only m-btn--pill" 
                                            title="Fax">
                                            <i class="la  la-fax"></i>
                                         </a>
                                    @if ($edit_pv == 1)
                                    <a href="{{Route('add_edit',$hotel->id)}}" id="{{$hotel->id}}"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Edit View">
                                        <i class="la la-edit"></i>

                                    </a>

                                    @endif

                                    @if ($del_pv == 1)
                                     <a id="{{$hotel->id}}" onclick="deleteAccept({{$hotel->id}}) "
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="Edit View">
                                        <i class="la la-trash"></i>

                                    </a>
                                    @endif

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

                                var edit_pv='{{$edit_pv}}';
                                var del_pv='{{$del_pv}}';

                     $.getJSON({
                     url:'{{Route('hotel_live_search')}}',
                 method:'POST',
                 data:{query:query,edit_pv:edit_pv,del_pv:del_pv},
                 //dataType:'json',
                 success:function (data) {

                  //console.log(data);
                     $('#emp_listGrid').html(data.table_data);
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
                
                                        url: '{{Route('hotel_delete')}}',
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
                         headers:{
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                  }
                             });

                        $.getJSON({
                                        url:'{{Route('view_hotelcontacts')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data){
                                            
                                            //console.log(data.email_A);
                                           
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
                                        url:'{{Route('view_hotelcontacts')}}',
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

                                        url:'{{Route('view_hotelcontacts')}}',
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




