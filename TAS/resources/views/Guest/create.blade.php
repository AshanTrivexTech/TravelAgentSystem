@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
{{-- <meta name="_token" content="{{csrf_token()}}" /> --}}

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Guest Manager
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
                      Guest 
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Create a  Guest 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{route('guest_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Create a   Guest 
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
    <form id="add_holetFrm" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="add_guestfrm">
            {{csrf_field()}}
            
            
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                        <div class="col-lg-1">
                                <label class="form-control-label">
                                Mr/Mrs :
                                </label>
                                <select required name="type" id="type" class="form-control">
                                        <option value="1">Mr</option>
                                        <option value="2">Mrs</option>
                                        <option value="3">Miss</option>
                                        <option value="4">Dr</option>
                                        <option value="5">Rev</option>                    
                                </select>
                            </div>
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Name :
                        </label>
                        <input required placeholder="name" id="name" name="name" type="text" class="form-control mxl_name"  value="">
                        <span class="m-form__help text-danger">
                                * Required
                        </span>  
                    </div>
                    <div class="col-lg-3">
                            <label class="form-control-label">
                            Country :
                            </label>
                            <select required name="country" id="country" class="form-control">  
                                @foreach($country_id as $country)
                                <option value="{{$country->id}}">{{$country->country_name}} </option>
                                @endforeach
                            </select>
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                    </div>
                    
                </div>

                <div class="form-group m-form__group  row">
                    <div class="col-lg-4">
                        <label class="form-control-label">
                          Address :
                        </label>
                        <textarea placeholder="Address" id="address" name="address" class="form-control" required></textarea>
                        <span class="m-form__help text-danger">
                                * Required
                            </span>                       
                    </div>
                    
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-4">
                                <label class="form-control-label">
                                Tel :
                                </label>
                              <input placeholder="011XXXXXXXX" id="tel" name="tel" type="tel" class="form-control mxl_phone"  value="" required >
                              
                            </div>
                            <div class="col-lg-4">
                                    <label class="form-control-label">
                                    Mobile :
                                    </label>
                                  <input placeholder="011XXXXXXXX" id="mobile" name="mobile" type="tel" class="form-control mxl_phone"  value="" required >
                                  
                                </div>
                                <div class="col-lg-4">
                                        <label class="form-control-label">
                                        Email  :
                                        </label>
                                      <input placeholder="Email" id="email" name="email" type="email" class="form-control" value="" required>
                                      <span class="m-form__help text-danger">
                                            * Required
                                        </span> 
                                      <br>                       
                                </div>
                        
                </div>
                   <div class="form-group m-form__group  row">
                        
                        <div class="col-lg-4">
                                <label class="form-control-label">
                                Date of Birth  :
                                </label>
                                <input placeholder="Date of Birth" id="dob"
                                name="dob" type="text"
                                class="form-control dtpic-format" value="">
                                <span class="m-form__help text-danger">
                                        * Required
                                    </span>
                              <br>                       
                        </div>
                        <div class="col-lg-4">
                                <label class="form-control-label">
                                Passport No  : 
                                </label>
                              <input placeholder="Passport number" id="passport_no" name="passport_no" type="text" class="form-control" value="" required>
                              <span class="m-form__help text-danger">
                                    * Required
                                </span> 
                              <br>                       
                        </div>
                                      
                </div>

                <div class="form-group m-form__group  row">
                        <div class="col-lg-12">
                            <label class="form-control-label">
                              Remarks :
                            </label>
                            <textarea placeholder="Remarks" id="remarks" name="remarks" class="form-control" required></textarea>                       
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
                
                //setup Ajax token ( without this function cannot pass data to controller)
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

                //form data to Variable
                var name = $('#name').val();
                var country =$('#country').val();
                var address=$('#address').val();
                var dob=$('#dob').val();
                var passport_no=$('#passport_no').val();
                var remarks=$('#remarks').val();
                var tel=$('#tel').val();
                var mobile=$('#mobile').val();
                var email=$('#email').val();
                

                    //console.log(data);               
                    //Send Ajax request 
                  $.ajax({
                    
                    url: '{{Route('guest_store')}}',
                    method: "POST",
                    data: {name:name,country:country,address:address,
                           dob:dob,passport_no:passport_no,remarks:remarks,tel:tel,mobile:mobile,email:email},
                    success: function(data) {
                            
                        console.log(data);
                        //if Added 
                        if(data=='added'){
                            $('.alert').hide();
                            swal("Guest Add successfully completed!", ""+name, "success");
                            $("#add_guestfrm")[0].reset();
                            window.location.replace('{{route('guest_index')}}');
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