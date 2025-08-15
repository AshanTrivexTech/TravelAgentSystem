@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
<meta name="_token" content="{{csrf_token()}}" />

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Supplement Manager:{{$id}}
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
                      Create a Optional Supplement:
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{route('package_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    {{-- Create a Optional Supplement  for Package: {{$id}} --}}
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
    <form  class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  method="POST" id="add_opsfrm">
            {{csrf_field()}}
            
            {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">  --}}
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-2">
                        <label class="form-control-label">
                            Code :
                        </label>
                        <input required placeholder="unique code" id="code" name="code" type="text" class="form-control mxl_code"  value="">
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
                            
                                <option value="0">Per-Person</option>
                                <option value="1">Per-Room</option>
                           
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
                                <input required placeholder="Enter Amount" id="amount" name="amount" type="text"  class="form-control numeric_only" maxlength="150" value="" >
                                <span class="form-group text-danger">
                                        * Required
                                </span>	
                            </div>

                    <div class="col-lg-4">
                        <label class="form-control-label">
                          Description :
                        </label>
                        <textarea placeholder="Description" id="desc" name="desc" class="form-control" required></textarea>                       
                    </div>
                </div>   
           
                {{-- <div class="form-group m-form__group  row">                      
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

                </div> --}}

            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" id="frm_submit"  class="btn btn-primary" >
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
                var amount = $('#amount').val();
                var desc =$('#desc').val();
                var rate_type=$('#rate_type').val();
                var id='{{$id}}';
                
                
              //  console.log(code);
               
                               
                    //Send Ajax request 
                  $.ajax({
                    
                    url: '{{Route('osupplement_store')}}',
                    method: "POST",
                    data: {id:id,code:code,amount:amount,desc:desc,rate_type:rate_type},
                    success: function(data) {
                            
                            
                        console.log(data);
                        //if Added 
                        if(data=='added'){
                            $('.alert').hide();
                            swal("Optional Supplement Add successfully completed!", ""+code, "success");
                            $("#add_opsfrm")[0].reset();
                            $("html, body").animate({
                                    scrollTop: 0
                                });     

                                window.location.replace('{{route('package_index')}}');                          
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