@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
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
                      Hotel Feature
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('feature_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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

    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                    <h3 class="m-portlet__head-text">
                    Update a  Hotel Feature
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong><div id="notify"></div>
                <button type="button" class="close" id="notify_close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
    <form  method="POST"  class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed ajax-form" id="update_feature" >
       
         
        
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Code :
                        </label>
                    <input placeholder="unique code" id="code" name="code" value="{{$features->code}}" type="text" class="form-control mxl_code" value="" >
                    <span class="m-form__help text-danger">
                            * Required
                        </span>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-control-label">
                          Name :
                        </label>
                        <input placeholder="unique name"  value="{{$features->hotel_fe_name}}"  id="name" name="name" type="text"  class="form-control mxl_name"  value="" >
                        <span class="m-form__help text-danger">
                                * Required
                            </span>
                    </div>
                </div>

                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                          Feature Type :
                        </label>
                        <select class="form-control" name="type" id="type">
                            <option value="0">Please select...</option>
                            @foreach($features->all() as $feature)
                            <option value="{{$feature->id}}" selected>{{$feature->type}}</option>
                            @endforeach
                        </select>
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
                            <button type="button" class="btn btn-primary" id="frm_submit">
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

    </div>
</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>



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
				   // var code = $('#code').val();
				   // var name = $('#name').val();
					// var id = $();
					var id =  '{{$features->id}}';
					var code = $('#code').val();
					var name = $('#name').val();
					var type = $('#type').val();
					//console.log('checked');
				
					//console.log(id);		  
						//Send Ajax r;equest 
						$.ajax({
							// console.log("a");
						
							url: '{{Route('feature_update')}}',
							method: "POST",
								data: {id:id,code:code,name:name,type:type},
								
								success: function(data) {
									
								console.log(data);
								
								
								//if Added 
									if(data=='updated'){
										$('.alert').hide();
										swal("Hotel Features Updated successfully!", ""+name, "success");
										window.location.replace('{{Route('feature_index')}}');
	
									}else{
										// pop up error
											$("html, body").animate({
												scrollTop: 0
											});
											$('.alert').show();
											$('#notify').html(data);
											
											//$('#emp_listGrid').append(data);
																		
									}
								
							 } 
						 })

			 });
		});
	
	</script>
@endsection