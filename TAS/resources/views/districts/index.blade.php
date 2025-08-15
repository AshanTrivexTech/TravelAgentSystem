@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
               Locations
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
												Locations 
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Districts
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                   @if($add_pv==1)
                 <a href="{{route('district_load')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
										Districts Master File
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
						<form>
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
						</form>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <table class="table table-bordered table-hover table-checkable">
                <thead>
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Code</th>
					    <th>Name</th>
		                <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id='tb_sr'>
                    
                    @foreach($district_view->all() as $district)
                    <tr>
                       <td style="text-align: center">{{$district->id}}</td>
                       <td style="text-align: center">{{$district->code}}</td>
		               <td>{{$district->dist_name}}</td>
		               <td>{{$district->country_name}}</td>
                    
                        <td class="m-datatable__cell--right" style="text-align: center">

                               @if($edit_pv==1)
                            <a href="{{route('edit_district',$district->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                <i class="la la-edit"></i>
                            </a>
                              @endif

                              @if($del_pv==1)
                            <a id="{{$district->id}}" onclick="deleteAccept({{$district->id}})"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                    title="Delete View">
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
                
                                        url: '{{Route('district_delete')}}',
                                        method: "POST",
                                        data: {id:id},
                                        success: function(data) {
                                             //  console.log(data); 
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
                                         
                                         var edit_pv='{{$edit_pv}}';
                                         var del_pv='{{$del_pv}}';

                                        $.getJSON({
                                            
                                    url:'{{Route('district_livesearch')}}',
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
        
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>
@endsection