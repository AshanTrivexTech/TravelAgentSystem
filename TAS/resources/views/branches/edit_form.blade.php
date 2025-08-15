
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
													Update a Branch
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->

        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST">
            <input type="hidden" name="_method" value="PUT">

          {{csrf_field()}}
           
            <div class="m-portlet__body">
                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Branch Code :
                        </label>
                        <input placeholder="unique name"  id="code" name="code" type="text" class="form-control m-input mxl_code"  value="{{$branch->branch_code}}">
                        <div class="form-control-feedback">
                                <span class="m-form__help text-danger">  * Required     </span>
                                        
                                    
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <label class="form-control-label">
                           Branch Name :
                        </label>
                        <input placeholder="unique code"  id="name" name="name" type="text" class="form-control m-input" maxlength="16" value="{{$branch->branch_name}}">
                        <span class="m-form__help text-danger">  * Required     </span>
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>
                </div>

                <div class="form-group m-form__group has-danger row">
                        <div class="col-lg-4">
                                <label class="form-control-label">
                                    Company :
                                </label>
                                <select class="form-control" name="company" id="company">
                                        @foreach($companys->all() as $company)
                                     <option value="{{$company->id}}"  @if($company->id==$branch->company_id) selected @endif   >{{$company->company_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help text-danger">  * Required     </span>
                                <div class="form-control-feedback">
                                    
                                </div>
                                
                            </div>
                            <div class="col-lg-4">
                                    <label class="form-control-label">
                                        Country :
                                    </label>
                                    <select class="form-control" name="country" id="country">
                                    @foreach($countries->all() as $country)
                                     <option value="{{$country->id}}"  @if($country->id==$branch->country_id) selected @endif   >{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help text-danger">  * Required     </span>
                                    <div class="form-control-feedback">
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-lg-4">
                                        <label class="form-control-label">
                                            City Name :
                                        </label>
                                        <input placeholder="unique name"  id="city" name="city" type="text" class="form-control m-input" maxlength="191" value="{{$branch->City_name}}">
                                        <span class="m-form__help text-danger">  * Required     </span>
                                        <div class="form-control-feedback">
                                        </div>
                                    </div>
                                </div>

                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Contact Details :
                        </label>
                        <textarea placeholder="contact details" id="contact_details" name="contact_details" class="form-control m-input">{{$branch->contact_details}}</textarea>
                        <span class="m-form__help text-danger">  * Required     </span>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-control-label">
                           Description :
                        </label>
                        <textarea placeholder="Description" id="description" name="description" class="form-control m-input" >{{$branch->description}}</textarea>
                       
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                               Address :
                            </label>
                            <textarea placeholder="" id="address" name="address" class="form-control m-input" >{{$branch->branch_address}}</textarea>
                            <span class="m-form__help text-danger">  * Required     </span>
                        </div>
                </div>

                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Status:
                        </label>
                        <div class="m-radio-list">
                            <label class="m-radio m-radio--state-success">
                                <input type="radio" name="status" id="active" @if(($branch->status)==1) checked @endif > Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--state-brand">
                                <input type="radio" name="status" id="inactive" @if(($branch->status)==0) checked @endif > In-active
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
                            <button type="Button" class="btn btn-primary" id="frm_submit">
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
        $("#frm_submit").click(function(event) {
                
                //setup Ajax token ( without this function cannot pass data to controller)
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

                //form data to Variable
                var code=$('#code').val();
                var city=$('#city').val();
                var company=$('#company').val();
                var country=$('#country').val();
                var name=$('#name').val();
                var address=$('#address').val();
                var contact_details=$('#contact_details').val();
                var description=$('#description').val();
                var id='{{$branch->id}}';
                

                //alert(status_st);
                
                if($('#active').attr('checked')==true)
                 {
                    status=1
                 }
                 else
                 {
                    status=0;
                 }

                //console.log();


                    //Send Ajax request 
                    $.ajax({
                    
                        url: '{{Route('branch_update')}}',
                        method: "POST",
                            data: {status:status,address:address,contact_details:contact_details,description:description,code:code,name:name,city:city,company:company,country:country,id:id},
                            success: function(data) {
                                
                            console.log(data);
                            //if Added 
                                if(data=='updated'){
                                    $('.alert').hide();
                                    swal("Branch Updated successfully!", ""+name, "success");
                                    window.location.replace('{{Route('branch_index')}}');

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