@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
<meta name="_token" content="{{csrf_token()}}" />

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
                       Hotel Edit
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
                    Update Hotel Packages :{{$hotel_data->id."-".$hotel_data->supplier_id}} 
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
                        <input type="hidden" id="supID" value="{{$supplier->id}}">
                        <label class="form-control-label">
                            Code :
                        </label>
                        <input required placeholder="unique code" id="code" name="code" type="text" class="form-control" maxlength="16" value="{{$supplier->code}}">
                        <span class="m-form__help text-danger">
                                * Required
                             </span>
                    </div>

                    
                    <div class="col-lg-3">
                            <label class="form-control-label">
                            Long  Name :
                            </label>
                            <input required placeholder="unique name" id="l_name" name="l_name" type="text"  class="form-control" disabled maxlength="191" value="{{$supplier->sup_name}}" >
                        </div>
                    <div class="col-lg-3">
                            <label class="form-control-label">
                            Short  Name :
                            </label>
                            <input required placeholder="unique name" id="s_name" name="s_name" type="text"  class="form-control" maxlength="191"  value="{{$supplier->sup_s_name}}" >
                        </div>

                    <div class="col-lg-4">
                            <label class="form-control-label">
                            Hotel  Type :
                            </label>
                            <select required name="type" id="hotel_type" class="form-control">                                
                            @foreach ($hotel_type_list->all() as $hotel_type)
                            <option value="{{ $hotel_type->id }}" @if($hotel_data->hotel_type == $hotel_type->id) selected @endif >{{ $hotel_type->type_name }}</option>                               
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
                        <textarea placeholder="Address" id="address" name="" class="form-control" >{{$supplier->address}}</textarea>                       
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                              Description :
                            </label>
                            <textarea placeholder="Description" id="desc"name="desc" class="form-control" >{{$hotel_data->desc}}</textarea>                       
                    </div>
                    
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-2">
                                <label class="form-control-label">
                                  Postal Code :
                                </label>
                                <input placeholder="" id="postal_code" name="postal_code" type="text" class="form-control  mxl_phone" maxlength="191" value="{{$hotel_data->postal_code}}"  >                      
                        </div>
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                Conuntry :
                                </label>
                                <select required name="country" id="country" class="form-control">
                                    @foreach ($country_list as $country)
                                        <option value="{{$country->id}}" @if($supplier->country_id == $country->id) selected @endif >{{$country->country_name}}</option>
                                        
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
                               
                                @foreach ($district_list->all() as $district)
                                    <option value="{{ $district->id }}" @if($supplier->district_id == $district->id) selected @endif >{{ $district->dist_name }}</option>
                                @endforeach   
     
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
                                @foreach ($city_list->all() as $city)
                                    <option value="{{ $city->id }}" @if($supplier->city_id == $city->id) selected @endif >{{$city->city_name}}</option>                                    
                                @endforeach 
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
                            @foreach ($hotel_group->all() as $hotel_gp)
                                <option value="{{$hotel_gp->id}}" @if($hotel_data->hotel_group_id == $hotel_gp->id) selected @endif >{{$hotel_gp->hotel_gp_name}}</option>                                
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
                                
                                <option value="1" @if ($hotel_data->star_rate == 1) selected  @endif >1 Start</option>
                                <option value="2" @if ($hotel_data->star_rate == 2) selected  @endif>2 Stars</option>
                                <option value="3" @if ($hotel_data->star_rate == 3) selected  @endif>3 Stars</option>
                                <option value="4" @if ($hotel_data->star_rate == 4) selected  @endif>4 Stars</option>
                                <option value="5" @if ($hotel_data->star_rate == 5) selected  @endif>5 Stars</option>
                                <option value="7" @if ($hotel_data->star_rate == 7) selected  @endif>7 Stars</option>
                                 
                      </select>
                      <span class="m-form__help text-danger">
                            * Required
                         </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-control-label">
                        Website Url :
                        </label>
                      <input placeholder="Web url" id="website_url" name="website_url" type="url" class="form-control" value="{{ $hotel_data->web_url }}">                     
                    </div>
                                      
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-4">
                                <label class="form-control-label">
                               Reservation :<span class="m-form__help text-danger">
                                    * Required
                                 </span>
                                </label>
                              <input placeholder="Main" id="email_one" name="email_one" type="email" class="form-control" value="{{ $email_A->contact }}" required> 
                              
                              <br>
                              <label class="form-control-label">
                                    Email 2 :
                               </label>
                                 <input placeholder="Secondary" id="email_two" name="email_two" type="email" class="form-control" value="{{$email_B->contact}}">   
                               <br>
                                 <label class="form-control-label">
                                   Email 3 :
                                 </label>
                                 <input placeholder="Other" id="email_three" name="email_three" type="email" class="form-control" value="{{$email_C->contact}}">                                                      
                        </div>
                </div>

                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                        Fax :
                        </label>
                      <input placeholder="011XXXXXXXX" id="fax" name="fax" type="tel" class="form-control mxl_phone"  value="{{$fax->contact}}" >
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                            Tel :
                            </label>
                          <input placeholder="011XXXXXXXX" id="tel" name="tel" type="tel" class="form-control mxl_phone"  value="{{$tel->contact}}" required >
                    </div>
                   
                </div>

           
                <div class="form-group m-form__group  row">                      
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Status:
                        </label>
                        <div class="m-radio-list">
                            <label class="m-radio m-radio--state-success">
                                <input type="radio" name="status" id="active" @if(($supplier->status)==1) checked  @endif > Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--state-brand">
                                <input type="radio" name="status" id="inactive" @if(($supplier->status)==0) checked  @endif > In-active
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
                var s_name = $('#s_name').val();
                var sup_ID = $('#supID').val();
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
                var cur_url=window.location.href;

                var status;
                 if($('#active').prop('checked') == true)
                 {
                    status=1;
                 }
                 else
                 {
                    status = 0;
                 }
                  
                    $.ajax({
                    
                        url: '{{Route('hotel_update')}}',
                        method: "POST",
                            data: {s_name:s_name,sup_ID:sup_ID,hotel_type:hotel_type,address:address,city:city,district_id:district_id,postal_code:postal_code,
                            desc:desc,country:country,hotel_group:hotel_group,star_rate:star_rate,website_url:website_url,
                                email_one:email_one,email_two:email_two,email_three:email_three,Hotel_features:Hotel_features,
                                fax:fax,tel:tel,status:status},
                            success: function(data) {
                                
                            //console.log(data);
                            //if Added 
                                if(data=='updated'){
                                    $('.alert').hide();
                                    swal("Hotel Updated successfully!", ""+s_name, "success");
                                    window.location.replace('{{Route('hotel_index')}}');

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