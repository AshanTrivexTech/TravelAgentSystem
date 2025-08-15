@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
{{-- <meta name="_token" content="{{csrf_token()}}" /> --}}

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
                        Hotels 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{Route('hotel_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Create a   Hotel 
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
    <form id="add_holetFrm" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >
            {{csrf_field()}}
            
            {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">  --}}
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-2">
                        <label class="form-control-label">
                            Code :
                        </label>
                        <input required placeholder="unique code" id="code" name="code" type="text" class="form-control" maxlength="16" value="">
                        <span class="m-form__help text-danger">
                               * Required
                            </span>
                    </div>
                    <div class="col-lg-3">
                            <label class="form-control-label">
                              Long Name:
                            </label>
                            <input required placeholder="unique name" id="l_name" name="l_name" type="text"  class="form-control" maxlength="191" value="" >
                            <span class="m-form__help text-danger">
                                    * Required
                                 </span>
                        </div>
                    <div class="col-lg-3">
                            <label class="form-control-label">
                              Short Name :
                            </label>
                            <input required placeholder="unique name" id="s_name" name="s_name" type="text"  class="form-control" maxlength="191" value="" >
                            <span class="m-form__help text-danger">
                                    * Required
                                 </span>
                        </div>

                  
                    <div class="col-lg-4">
                            <label class="form-control-label">
                            Hotel  Type :
                            </label>
                            <select required name="type" id="hotel_type" class="form-control">
                           
                            @foreach ($hotel_type_list as $hotel_type)
                            <option value="{{ $hotel_type->id }}">{{ $hotel_type->type_name }}</option>                               
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
                        <textarea placeholder="Address" id="address" name="" class="form-control" ></textarea>  
                                           
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                              Description :
                            </label>
                            <textarea placeholder="Description" id="desc"name="desc" class="form-control" ></textarea>    
                            
                         
                    </div>
                    
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-2">
                                <label class="form-control-label">
                                  Postal Code :
                                </label>
                                <input placeholder="" id="postal_code" name="postal_code" type="tex" class="form-control mxl_phone" maxlength="191" value=""  >   
                                <span class="m-form__help text-danger">
                                        * Required
                                     </span>       
                        </div>
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                Conuntry :
                                </label>
                                <select required name="country" id="country" class="form-control">
                                    <option value="0">Please Select</option>
                                    @foreach ($country_list as $country)
                                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                                        
                                    @endforeach
                                </select>
                                <span class="m-form__help text-danger">
                                        * Required
                                     </span>
                        </div>                        
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                District :
                                </label>
                                <select required name="district" id="district" class="form-control">  
                                <option value="0" id="d_0">Please Select</option>
                                
                                </select>
                                <span class="m-form__help text-danger">
                                        * Required
                                     </span>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-control-label">
                            City :
                            </label>
                            <select required name="city" id="city" class="form-control">  
                                
                                <option value="0">Please Select</option>
                                

 
                            </select>
                            <span class="m-form__help text-danger">
                                    * Required
                                 </span>
                    </div>
                        
                </div>

                   <div class="form-group m-form__group  row">
                    <div class="col-lg-2">
                        <label class="form-control-label">
                          Hotel Group :
                        </label>
                        <select required name="hotel_group" id="hotel_group" class="form-control">
                           @foreach ($hotel_gp_list as $hotelgp)
                             <option value="{{$hotelgp->id}}">{{$hotelgp->hotel_gp_name}}</option> 
                                                          
                           @endforeach
                        </select> 
                        <span class="m-form__help text-danger">
                                * Required
                             </span>                  
                    </div>
                    <div class="col-lg-2">
                        <label class="form-control-label">
                        Hotel Star Rate :
                        </label>
                        <select required class="form-control" name="star_rate" id="star_rate">

                           
                               
                                @foreach($hotel_starts->all() as $star)
                                  <option @if($star->star_rate==0)  value="0" @else     value="{{$star->star_rate}}" @endif> @if($star->star_rate==0) None @else {{$star->star_rate}}  @endif Stars</option>
                              @endforeach
                              
                      </select>
                      <span class="m-form__help text-danger">
                            * Required
                         </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-control-label">
                        Website Url :
                        </label>
                      <input placeholder="Web url" id="website_url" name="website_url" type="url" class="form-control">   
                      <span class="m-form__help text-danger">
                            * Required
                         </span>                 
                    </div>
                                      
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-4">
                                <label class="form-control-label">
                            Reservation Email:   <span class="m-form__help text-danger">
                                    * Required
                                 </span>
                                </label>
                              <input placeholder="Main" id="email_one" name="email_one" type="email" class="form-control" value="" required> 
                            
                              <br>
                              <label class="form-control-label">
                                    Email 2 :
                               </label>
                                 <input placeholder="Secondary" id="email_two" name="email_two" type="email" class="form-control" value="">   
                               <br>
                                 <label class="form-control-label">
                                   Email 3 :
                                 </label>
                                 <input placeholder="Other" id="email_three" name="email_three" type="email" class="form-control" value="">  
                                                  
                        </div>
                </div>
                
              


                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                        Fax :
                        </label>
                      <input placeholder="011XXXXXXXX" id="fax" name="fax" type="tel" class="form-control mxl_phone" maxlength="191" value="" >
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                            Tel :
                            </label>
                          <input placeholder="011XXXXXXXX" id="tel" name="tel" type="tel" class="form-control mxl_phone" maxlength="191" value=""  >
                    </div>
                   
                </div>

           
                <div class="form-group m-form__group  row">                      
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
                            <span class="m-form__help text-danger">
                                    * Required
                                 </span>
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
        $('#country').change(function(event){
            //
                  $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   }
                 });
 
                 var country = $('#country').val();
                 let dd_district = $('#district');  
                 
                 if(country!=0){
                 
                     $.getJSON({
                     
                     url: '{{Route('select_districts')}}',
                     method: "POST",
                     data: {country:country},
                     success: function(data) {
 
                         //console.log(data);
                         $('#district').empty();
                        $('#district').append('<option value="0">Please Select</option>');                      
                        $('#city').empty();
                        $('#city').append('<option value="0">Please Select</option>');
                        $.each(data, function (key, entry) {
                         dd_district.append($('<option></option>').attr('value', entry.id).text(entry.dist_name));
                       })
                     }                                   
                 }) 
                 }else{
                     $('#district').empty();
                     $('#city').empty();
                     $('#district').append('<option value="0">Please Select</option>');  
                     $('#city').append('<option value="0">Please Select</option>');   
                   
                 }
             });
             
 
             // City dropdown Load data
             $('#district').change(function(event){
                 //
                       $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                      });
      
                      var district = $('#district').val();
                      let dd_city = $('#city');  
                      
                      if(country!=0){
                      
                          $.getJSON({
                          
                          url: '{{Route('select_city')}}',
                          method: "POST",
                          data: {district:district},
                          success: function(data) {
 
                              //console.log(data);
                              $('#city').empty();
                             $('#city').append('<option value="0">Please Select</option>');                      
                             $.each(data, function (key, entry) {
                                 dd_city.append($('<option></option>').attr('value', entry.id).text(entry.city_name));
                            })
                          }                                   
                      }) 
                      }else{
                          $('#city').empty();
                          $('#city').append('<option value="0">Please Select</option>');   
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
                var code = $('#code').val();
                var s_name = $('#s_name').val();
                var l_name = $('#l_name').val();
                var hotel_type = $('#hotel_type').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var district_id = $('#district').val();
                var postal_code = $('#postal_code').val();
                var desc = $('#desc').val();                
                var country = $('#country').val();
                var hotel_group = $('#hotel_group').val();
                var star_rate = $('#star_rate').val();
                var website_url = $('#website_url').val();
                var email_one = $('#email_one').val();
                var email_two = $('#email_two').val();
                var email_three = $('#email_three').val();
                var Hotel_features = "";
                var fax = $('#fax').val();
                var tel = $('#tel').val();
                var status = $('#status').val();
                var cur_url=window.location.href;                  
                    //Send Ajax request 
                  $.ajax({
                    
                    url: '{{Route('add_store')}}',
                    method: "POST",
                    data: {code:code,s_name:s_name,l_name:l_name,hotel_type:hotel_type,address:address,city:city,district_id:district_id,postal_code:postal_code,
                           desc:desc,country:country,hotel_group:hotel_group,star_rate:star_rate,website_url:website_url,
                            email_one:email_one,email_two:email_two,email_three:email_three,Hotel_features:Hotel_features,
                             fax:fax,tel:tel,status:status},
                    success: function(data) {
                            
                       console.log(data);
                        //if Added 
                        if(data=='added'){
                            $('.alert').hide();
                            swal("Hotel Add successfully completed!", ""+s_name, "success");
                            $("#add_holetFrm")[0].reset();
                            window.location.replace('{{route('hotel_index')}}');
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