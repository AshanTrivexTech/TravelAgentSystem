@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
{{-- <meta name="_token" content="{{csrf_token()}}" /> --}}

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
                <a href="{{route('currencyEx_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                     Create a Currency Exchange Rate
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST"  id="add_currencyExFrm" >
                {{-- {{ csrf_field() }} --}}
                 
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-3">
                        <label class="form-control-label">
                          Currency A:
                        </label>
                        <select required name="currency_A" id="currency_A" class="form-control">  
                                <option value="0">Please select... </option>
                                @foreach($currencys->all() as $currency)
                                <option value="{{$currency->id}}">{{$currency->type}}</option>
                                @endforeach
                            </select>
                    
                          <div class="form-control-feedback">
                            
                          </div>
                          <span class="form-group text-danger">
                                * Required
                    </span>
                        
                    </div>

                

                    <div class="col-lg-3">
                        <label class="form-control-label">
                            Currency B :
                        </label>

                        <select required name="currency_B" id="currency_B" class="form-control">  
                                <option value="0">Please select... </option>
                                @foreach($currencys as $currency)
                                <option value="{{$currency->id}}">{{$currency->type}}</option>
                                @endforeach
                            </select>
                      <div class="form-control-feedback">
                            
                        </div>
                        <span class="form-group text-danger">
                              * Required
                  </span>
                       
                    </div>
                    <div class="col-lg-2">
                            <label class="form-control-label">
                                Amount :
                            </label>
    
                          <input required placeholder="Amount" class="form-control numeric_only" id="amount" name="amount" type="text" value="" >
                          <div class="form-control-feedback">
                                
                            </div>
                            <span class="form-group text-danger">
                                  * Required
                      </span>
                           
                        </div>
                        <div class="col-lg-2">
                                <label class="form-control-label">
                                    From Date :
                                </label>
        
                                <input placeholder="From" id="frm_date"
                                name="frm_date" type="text"
                                class="form-control dtpic-format" value="">
                              <div class="form-control-feedback">
                                    
                                </div>
                                <span class="form-group text-danger">
                                      * Required
                          </span>
                               
                            </div>
                            <div class="col-lg-2">
                                    <label class="form-control-label">
                                        To Date:
                                    </label>
            
                                    <input placeholder="To" id="to_date"
                                    name="to_date" type="text"
                                    class="form-control dtpic-format" value="">
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

            $('#currency_A').change(function(event){
           //
                 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

                var currency_A = $('#currency_A').val();
                let currency_B = $('#currency_B');  
                
                if(currency_A!=0){
                
                    $.getJSON({
                    
                    url: '{{Route('select_currencies')}}',
                    method: "POST",
                    data: {currency_A:currency_A},
                    success: function(data) {

                        //console.log(data);
                        $('#currency_B').empty();
                       $('#currency_B').append('<option value="0">Please Select</option>');                      
                       $.each(data, function (key, entry) {
                        currency_B.append($('<option></option>').attr('value', entry.id).text(entry.type));
                      })
                    }                                   
                }) 
                }else{
                    $('#currency_B').empty();
                }
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
                    
                    var currency_A = $('#currency_A').val();
                    var currency_B = $('#currency_B').val();
                    var frm_date = $('#frm_date').val();
                    var to_date = $('#to_date').val();
                    var amount =$('#amount').val();
                    var cur_url=window.location.href;

                    
                                
                        //Send Ajax request 
                      $.ajax({
                        
                        url: '{{Route('currencyEx_store')}}',
                        method: "POST",
                        data: {currency_A:currency_A,currency_B:currency_B,amount:amount,frm_date:frm_date,to_date:to_date},
                        success: function(data) {
                                
                            console.log(data);
                            //if Added 
                            if(data=='added'){
                                $('.alert').hide();
                                swal("Currency Exchange  Rate Add successfully completed!", "success");
                                $("#add_currencyExFrm")[0].reset();
                                 window.location.replace('{{route('currencyEx_index')}}');
                                $("html, body").animate({
                                        scrollTop: 0
                                    });                               
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