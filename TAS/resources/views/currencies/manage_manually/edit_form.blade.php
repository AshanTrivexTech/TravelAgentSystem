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
                                        Currency
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('currency_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                     Update a Currency
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" id="Edit_currencyfrm" >
                {{ csrf_field() }}
             
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                          Currency Type:
                        </label>
                        <input id="type" name="type"class="form-control"  type="text" value="{{ $currency_edit->type}}" autofocus >
                        <span class="form-group text-danger">
                                * Required
                    </span>	    
                          <div class="form-control-feedback">
                            
                          </div>
                        
                    </div>

                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Code :
                        </label>

                      <input class="form-control mxl_code" id="code" name="code" type="text" value="{{ $currency_edit->code}}" >
                      <span class="form-group text-danger">
                            * Required
                      </span>	
                       
                    </div>
                </div>

                <div class="form-group m-form__group  row">
                        <div class="col-lg-6">
                                <label class="form-control-label">
                                    Currency Symbol :
                                </label>
        
                              <input class="form-control " id="symbol" name="symbol" type="text" value="{{ $currency_edit->symbol}}" >
                              <div class="form-control-feedback">
                                    
                                </div>
                                <span class="form-group text-danger">
                                      * Required
                          </span>
                               
                        </div>
                </div>

            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-primary" id="frm_submit" >
                                Save
                            </button>
                            <button type="reset" class="btn btn-secondary" id="cl_btn">
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
                
                var type = $('#type').val();
                var code = $('#code').val();
                var symbol=$('#symbol').val();
                var cur_url=window.location.href;
                var id='{{$currency_edit->id}}';
                //   console.log(currency_type);
                    //Send Ajax request 
                    $.ajax({
                    
                        url: '{{Route('currency_update')}}',
                        method: "POST",
                        data: {type:type,code:code,symbol:symbol,id:id},
                            success: function(data) {
                                
                            //console.log(data);
                            //if Added 
                                if(data=='updated'){
                                    $('.alert').hide();
                                    swal("Currency Updated successfully!", ""+type, "success");
                                    window.location.replace('{{Route('currency_index')}}');

                                }else{
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