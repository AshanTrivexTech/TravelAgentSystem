


@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
            <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator ">
                                Vehicle Type Manager
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
                                 Vehicle Types
                                                    </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                        Update a Vehicle Type
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('load_vehcles')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong><div id="notify"></div>
                <button type="button" class="close" id="notify_close">
                <span aria-hidden="true">&times;</span>
                </button>
               </div>
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                    <h3 class="m-portlet__head-text">
                    Update a Vehicle Type
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed ajax-form" method="POST"  >
 
 

            <div class="m-portlet__body">
                <div class="form-group m-form__group row">

                        <div class="col-lg-6">
                                <label class="form-control-label">
                                  Type
                                </label>
                                <input class="form-control m-input" id="type" name="type" type="text" value="{{$vehicles_type->type}}">
                                <span class="m-form__help text-danger">
                                        * Required
                                    </span>
                                <div class="form-control-feedback">
                                   
                                </div>
                                
                            </div>
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Number Of Seats :
                        </label>
                          <input class="form-control mxl_phone" id="nos" name="nos" type="text"  value="{{$vehicles_type->no_of_seats}}" >
                          <span class="m-form__help text-danger">
                                * Required
                            </span>
                        <div class="form-control-feedback">
                          
                        </div>
                    </div> 
                </div>

                <div class="form-group m-form__group  row">
                        <div class="col-lg-6">
                                <label class="form-control-label">
                                  Rate Per 1 KM
                                </label>
                                <input  class="form-control numeric_only" id="rpkm" name="rpkm" type="text" value="{{$vehicles_type->rate_per_km}}" >
                                <span class="m-form__help text-danger">
                                        * Required
                                    </span>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-primary"  id="frm_submit">
                                Save
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form method="POST" id="frm_report" action="{{route('report_page')}}">
            {{ csrf_field() }}
            <input type="hidden"  id="error_details" name="error_details" value="" >
            <input type="hidden"  id="curnt_url"  name="curnt_url" value="">
          </form>
    </div>
</div>

@endsection @section('Page_Scripts') @parent

<script>
		$(document).ready( function(){ 
	
			//To hide the alert window on load the page
			$('.alert').hide();  
			
			//to close the alert window after popup 
			$('#notify_close').click(function(event){
				$('.alert').hide();
			});
	
			// submit the form
			$("#frm_submit").click(function(event) {
					
					//setup Ajax token ( without this function cannot pass data to controller)
					$.ajaxSetup({
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					  }
					});
	
					//form data to Variable
					var id =  '{{$vehicles_type->id}}';
					var nos = $('#nos').val();
					var rpkm = $('#rpkm').val();
					var type = $('#type').val();
                    var cur_url=window.location.href;
					//console.log('checked');
				
					//console.log(id);		  
						//Send Ajax r;equest 
						$.ajax({
							// console.log("a");
						
							url: '{{Route('update_vehicle')}}',
							method: "POST",
								data: {id:id,nos:nos,rpkm:rpkm,type:type},
								
								success: function(data) {
									
								console.log(data);
								
								
								//if Added 
									if(data=='updated'){
										$('.alert').hide();
										swal("Vehicle Types Updated successfully!", ""+type, "success");
										window.location.replace('{{Route('load_vehcles')}}');
	
									}else{
										// pop up error
                                        if(data.Error_code=='505'){

                                            $('#error_details').val(data.Exp_dtl);
                                            $('#curnt_url').val(cur_url);
                                                                                    
                                            $('#frm_report').submit();
                                            }else{
                                                                                    
                                            $("html, body").animate({
                                            scrollTop: 0
                                                });
                                            $('.alert').show();
                                            $('#notify').html(data);
                                            }
																		
									}
								
						
							 } 
						 })
	
	
				
			 });
		});
	
	</script>
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
@endsection