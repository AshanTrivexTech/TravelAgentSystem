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
												Languages
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
          
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{Route('guid_lanuages_add',$id)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la 	la-plus"></i>
													<span>
														Add
													</span>
                    </span>
                </a> 
                <div class="m-separator m-separator--dashed d-xl-none"></div>
                
            </div>
        </div>
        <div>
          
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                      @if($add_pv==1)
                <a href="{{Route('index_guide')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                                                        <i class="la la-angle-left"></i>
                                                        <span>
                                                            Back
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
                    Guide Language Master File  ID:{{$id}}
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
                    <th>Guide Name</th>
                    <th>Language Name</th>
                   
                    <th>Action</th>

                </tr>
                </thead>
                <tbody >


                          @foreach ($guide_list as $guide)
                              <tr style="text-align: center;">       
                                     

                             
                                <td>{{$guide->g_id}}</td>
                                <td>{{$guide->guide_name}}</td>
                                <td>{{$guide->lang_name}}</td> 
                             
                           <td>
                                          @if($del_pv==1)   
                                       <a id="" onclick="deleteAccept({{$guide->g_l_id}})"
                                               class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                               title="Delete">
                                                <i class="la la-trash"></i>
        
                                  
                                            </a>
                           </td>             @endif
                                 </tr>
                                @endforeach  
                           
                </tbody>
            </table>
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
                
                                        url: '{{Route('guid_lanuages_delete')}}',
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
           
                
        </script>
        

@endsection




