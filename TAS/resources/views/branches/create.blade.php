

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
												 Branches
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('branch_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Create a Branch
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->

        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="" id="frm_addbrch">
            {{csrf_field()}}
            <div class="m-portlet__body">
                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Branch Code :
                        </label>
                        <input placeholder="unique code" id="code" name="code" type="text" class="form-control m-input mxl_code" value="">
                        <span class="m-form__help text-danger">
                                * Required
                             </span>
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <label class="form-control-label">
                           Branch Name :
                        </label>
                        <input placeholder="unique name" id="name" name="name" type="text" class="form-control m-input mxl_name"  value="">
                        <span class="m-form__help text-danger">
                                * Required
                             </span>
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>
                </div>

                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-4">
                        <label class="form-control-label">
                            Company  :
                        </label>
                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="company" id="company">
                        <option selected value="0">Please select...</option>
                        @foreach($company_id as $company)
                        <option value="{{$company->id}}">{{$company->company_name}}</option>
                        @endforeach
                          </select>
                          <span class="m-form__help text-danger">
                                * Required
                             </span>
                         
                    </div>
                    <div class="col-lg-4">
                        <label class="form-control-label">
                           Country  :
                        </label>
                        <select class="form-control" name="country" id="country">
                        <option value="0">Please select....</option>
                        @foreach($country_id as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option> 
                        @endforeach
                          </select>
                          <span class="m-form__help text-danger">
                                * Required
                             </span>
                        
                    </div>
                    <div class="col-lg-4">
                            <label class="form-control-label">
                               City Name :
                            </label>
                            <input placeholder="unique name" id="city" name="city" type="text" class="form-control m-input mxl_cityname"  value="">
                            <span class="m-form__help text-danger">
                                    * Required
                                 </span>
                            <div class="form-control-feedback">  
                            </div>
                            
                        </div>
                        
                
                </div>
                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-4">
                        <label class="form-control-label">
                            Contact Details :
                        </label>
                        <textarea placeholder="contact details" id="contact_details" name="contact_details" class="form-control m-input "  ></textarea>
                        <span class="m-form__help text-danger">
                                * Required
                             </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-control-label">
                           Description :
                        </label>
                        <textarea placeholder="Description" id="description" name="description" class="form-control m-input" ></textarea>
                       
                    </div>
                    <div class="col-lg-4">
                            <label class="form-control-label">
                               Address :
                            </label>
                            <textarea placeholder="Address" id="address" name="address" class="form-control m-input" ></textarea>
                            <span class="m-form__help text-danger">
                                    * Required
                                 </span>
                        </div>
                </div>

                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Status:
                        </label>
                        <div class="m-radio-list">
                            <label class="m-radio m-radio--state-success">
                                <input type="radio" name="status" id="status" value="1" checked> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--state-brand">
                                <input type="radio" name="status" id="status" value="0"> In-active
                                <span></span>
                            </label>
                        </div>
                        
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
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
<script>
    $(document).ready( function(){
      
        //To hide the alert window on load the page
        $('.alert').hide();
        
        //to close the alert window after popup 
        $('#notify_close').click(function(event){
            $('.alert').hide();
        });
        // submit the form
        $( "#frm_submit").click(function( event ) {
                
                //setup Ajax token ( without this function cannot pass data to controller)
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

                //form data to Variable
                var code = $('#code').val();
                var name = $('#name').val();
                var address = $('#address').val();
                var company =$('#company').val();
                var country =$('#country').val();
                var city =$('#city').val();
                var status=$('#status').val();
                var contact_details =$('#contact_details').val();
                var description =$('#description').val();
                
                            
                    //Send Ajax request 
                  $.ajax({
                    
                    url: '{{Route('branch_store')}}',
                    method: "POST",
                    data: {status:status,code:code,name:name,address:address,company:company,country:country,city:city,contact_details:contact_details,description:description},
                    success: function(data) {
                            
                        //console.log(data);
                        //if Added 
                        if(data=='added'){
                            $('.alert').hide();
                            swal("Branch Add successfully completed!", ""+name, "success");
                            $("#frm_addbrch")[0].reset();
                            window.location.replace('{{route('branch_index')}}');
                            $("html, body").animate({
                                    scrollTop: 0
                                });                               
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
<script>
$(".My").select2();
</script>
@endsection