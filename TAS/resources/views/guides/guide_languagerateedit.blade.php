@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
{{-- <meta name="_token" content="{{csrf_token()}}" /> --}}

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Guide 
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
                      Guide language Rate 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{route('guidelanguagerate_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Create a   Guide language Rate
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
       
    <form id="add_guidlangrateFrm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >
          
            
            <div class="m-portlet__body">
                <div class="form-group m-form__group  row">
                        <div class="col-lg-6">
                                <label class="form-control-label">
                                Language :
                                </label>
                    <input  disabled placeholder="" id="language" name="language" type="text" class="form-control "  value="{{$language->lang_name}}">            
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">
                            Guide Type :
                            </label>
                    <input  disabled placeholder="" id="guide_type" name="guide_type" type="text" class="form-control "  value="{{$guide_type->g_type}}">    
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label class="form-control-label">
                                Amount :
                            </label>
                            <input required placeholder="Amount" id="amount" name="amount" type="text" class="form-control numeric_only"  value="{{$guide_lang_edit->rate}}">  
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
             
<form method="POST" id="frm_report" action="{{route('report_page')}}">
    {{ csrf_field() }}
    <input type="hidden"  id="error_details" name="error_details" value="" >
    <input type="hidden"  id="curnt_url"  name="curnt_url" value="">
  </form>
    </div>
</div>

@endsection @section('Page_Scripts') @parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
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
                     //alert("jhfgj");
                    //setup Ajax token ( without this function cannot pass data to controller)
                    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                    });
    
                    //form data to Variable
                    var language = $('#language').val();
                    var guide_type =$('#guide_type').val();
                    var amount=$('#amount').val();
                    var id='{{$guide_lang_edit->id}}';
                    var cur_url=window.location.href;     
                        //Send Ajax request 
                      $.ajax({
                        
                          
                        url: '{{Route('guidelangrate_update')}}',
                        method: "POST",
                        data: {language:language,guide_type:guide_type,amount:amount,id:id},
                               
                        success: function(data) {
                            
                            console.log(data);
                            //if Added 
                            if(data=='updated'){
                                $('.alert').hide();
                                swal("Guide language  Amount update successfully completed!", "success");
                                window.location.replace('{{route('guidelanguagerate_index')}}');
                                                               
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
<script>
$(".My").select2();
</script>
@endsection