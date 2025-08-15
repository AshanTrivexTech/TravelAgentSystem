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
                                User 
						</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                 
                <a href="{{route('user_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la la-angle-left"></i>
													<span>
														Back
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
                    Add User Privileges:{{$id}}
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
            {{-- <div style="overflow-x:auto;"> --}}
            <table class="table table-bordered table-hover table-checkable">
                <thead>  
                    <tr> 
                          <th style="text-align: center">ID</th>
						  <th style="text-align: center">Section Name</th>
		                  <th style="text-align: center">Actions</th> 
                    </tr>
                </thead>
                <tbody id="tb_sr">
                            
                        @foreach($privileges->all() as $privilege)
		           <tr style="text-align:center"> 
                          <td>{{$privilege->id}}</td>
                          <td>{{$privilege->section_name}}</td>
                          <td class="m-datatable__cell--right" style="text-align: center">
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                        <div class="m-form__actions m-form__actions--solid-sm">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <button type="button" class="btn m-btn--pill btn-success" id="frm_submit">
                                                        Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </td>
                  </tr> 
                     @endforeach
                </tbody>
            </table>
        {{-- </div> --}}
            <!--end: Datatable -->
        </div>
    </div>

</div>

@endsection @section('Page_Scripts') @parent

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

        
           $(document).ready(function() {

               $( "#frm_submit").click(function( event ) { 
                
                //setup Ajax token ( without this function cannot pass data to controller)
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                         }
                           });

                //form data to Variable
                var tax_name = $('#tax_name').val();
                var rate = $('#rate').val();
                var status=$('#status').val();
                           
                    //Send Ajax request 
                  $.ajax({
                    
                    url: '{{Route('tax_store')}}',
                    method: "POST",
                    data: {tax_name:tax_name,rate:rate,status,status},
                    success: function(data) {
                            
                        //console.log(data);
                        //if Added 
                        if(data=='added'){
                            $('.alert').hide();
                            swal("Tax Rate Add successfully completed!", ""+tax_name, "success");
                                                           
                        }else{
                            // pop up error
                            $("html, body").animate({
                                scrollTop: 0
                                });
                                
                                
                                
                                                             
                        }
                        
                        
                    }
                    })


            
         });
 
        function fetch_quotation_data(query = '') {

            $.ajaxSetup({
                  headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
             });
               
               

           $.getJSON({
           url:'{{Route('tax_livesearch')}}',
         method:'POST',
         data:{query:query,edit_pv:edit_pv,del_pv:del_pv},
         //dataType:'json',
         success:function (data) {

              //console.log(data);
             $('#tb_sr').html(data.table_data);


            }
            })
            }

$(document).on('keyup','#generalSearch',function () {

           var query = $(this).val();
     // var frd  =  $('#odid').val();
     //alert(frd);

          fetch_quotation_data(query);

          });


        fetch_quotation_data('');

        });
                
        </script>
        
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>
@endsection