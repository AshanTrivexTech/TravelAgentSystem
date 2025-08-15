@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
<meta name="_token" content="{{csrf_token()}}" />

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Supplement Manager
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
                      Optional Supplement
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Edit a Optional Supplement
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Edit a Optional Supplement
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
    <form id="add_holetFrm" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  >
            {{csrf_field()}}
            
    
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-2">
                        <label class="form-control-label">
                            Code :
                        </label>
                        <input required disabled placeholder="unique code" id="code" name="code" type="text" class="form-control mxl_code"  value="{{$op_suplyment->code}}">
                        <span class="form-group text-danger">
                                * Required
                        </span>	
                    </div>
                    <div class="col-lg-4">
                            <label class="form-control-label">
                                Rate Type:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                    <select class="form-control" id="rate_type" name="rate_type">
                            
                            <option value="0" @if ($op_suplyment->rate_type == 0) Selected  @endif>Per-Person</option>
                            <option value="1" @if ($op_suplyment->rate_type == 1) Selected  @endif>per-Room</option>
                           
                    </select>
                                
                    <span class="form-group text-danger">
                            * Required
                    </span>	
                            </div>
                                    <div class="form-control-feedback">
                                            
                                    </div>
                        </div>
                    
                   
                </div>

                <div class="form-group m-form__group  row">
                        <div class="col-lg-6">
                                <label class="form-control-label">
                                  Amount :
                                </label>
                                <input required placeholder="unique name" id="amount" name="amount" type="text"  class="form-control numeric_only"  value="{{$op_suplyment->amt}}" >
                                <span class="form-group text-danger">
                                        * Required
                                </span>	
                            </div>

                    <div class="col-lg-4">
                        <label class="form-control-label">
                          Description :
                        </label>
                        <input placeholder="Description" id="desc" name="desc" class="form-control" required value="{{$op_suplyment->des}}"/>
                        <span class="form-group text-danger">
                                * Required
                        </span>	                       
                    </div>
                </div>   
           
                <div class="form-group m-form__group  row">                      
                    <div class="col-lg-4">
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
                            <button type="button" id="frm_submit"  class="btn btn-primary">
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
               // var code = $('#code').val();
               // var name = $('#name').val();
                var code = $('#code').val();
                var amount = $('#amount').val();
                var description = $('#desc').val();
                var rate_type=$('#rate_type').val();
                var id='{{$op_suplyment->id}}';
                console.log();
                    //Send Ajax request 
                    $.ajax({
                    
                        url: '{{Route('osupplement_update')}}',
                        method: "POST",
                            data: {code:code,amount:amount,description:description,rate_type:rate_type,id:id},
                            success: function(data) {
                                
                            //console.log(data);
                            //if Added 
                                if(data=='updated'){
                                    $('.alert').hide();
                                    swal(" Updated successfully!", "<h4>"+code+"</h4>", "success");
                                    window.location.replace('{{Route('osupplement_index')}}');

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