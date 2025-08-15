

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
														Countries 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
             
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
												Countries Master File
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
                    <tr style="text-align: center">
                        <th>ID</th>
						<th>Code</th>
						<th>Name</th>						
                    </tr>
                </thead>
                <tbody id="tb_sr">

                    @foreach($countries->all() as $country)
									
						<tr>
                        <td style="text-align: center">{{$country->id}}</td>
                        <td style="text-align: center">{{$country->c_code}}</td>
                        <td style="text-align: center">{{$country->country_name}}</td>  
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
<script>

                    $(document).ready(function() {
 
                          function fetch_quotation_data(query = '') {

                                 $.ajaxSetup({
                                 headers: {
                                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                 }
                                });

                     $.getJSON({
                     url:'{{Route('search_country')}}',
                 method:'POST',
                 data:{query:query},
                 //dataType:'json',
                 success:function (data) {
                   // console.log(data);

                     $('#tb_sr').html(data.table_data);
                     
                       }
                     })
                     }

             $(document).on('keyup','#generalSearch',function () {

                var query = $(this).val();
            
                 fetch_quotation_data(query);
                     });
              
                 });       




</script>
@endsection