@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
{{-- <meta name="_token" content="{{csrf_token()}}" /> --}}

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Transport Manager
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
                      Vehicle
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Update Vehicle Supplier 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{Route('vehicle_sup_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Update Vehicle Supplier :{{$vehicleSupplier->id}}
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
    <form id="add_holetFrm" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >
            {{csrf_field()}}
                      
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-2">
                        <label class="form-control-label">
                            Code :
                        </label>
                        <input required  placeholder="unique code" id="code" name="code" type="text" class="form-control mxl_code"  value="{{$vehicleSupplier->code}}">
                        <span class="m-form__help text-danger">
                                * Required
                            </span>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-control-label">
                          Name :
                        </label>
                        <input required  placeholder="unique name" id="name" name="name" type="text"  class="form-control mxl_name" value="{{$vehicleSupplier->sup_name}}" >
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
                        <textarea placeholder="Address" id="address" name="" class="form-control" required>{{$vehicleSupplier->address}}</textarea>
                        <span class="m-form__help text-danger">
                                * Required
                            </span>                       
                    </div>
                    
                    
                </div>
                <div class="form-group m-form__group  row">
                      <div class="col-lg-3">
                                <label class="form-control-label">
                                Conuntry :
                                </label>
                                <select required name="country" id="country" class="form-control">
                                 <option value="0">Please Select</option>
                                    @foreach ($country_list as $country)
                                    <option value="{{ $country->id }}" 
                                        @if ($country->id == $vehicleSupplier->country_id) Selected  @endif> 
                                        {{$country->country_name}} </option>                                                                        
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
                                    <option value="0">Please Select</option> 
                                    @foreach($district_list as $district)
                                    <option value="{{ $district->id }}" 
                                            @if ($district->id == $vehicleSupplier->district_id) Selected  @endif> 
                                            {{$district->dist_name}} </option>                                                                        
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
                                    <option value="0">Please Select</option>
                            @foreach($city_list as $city)
                            <option value="{{$city->id}}"@if ($city->id==$vehicleSupplier->city_id) Selected @endif>{{$city->city_name}}</option>
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
                            Tel :
                            </label>
                          <input placeholder="011XXXXXXXX" id="tel" name="tel" type="tel" class="form-control mxl_phone"  value="{{$vehicleSupTel->contact}}" required >
                          <span class="m-form__help text-danger">
                                * Required
                            </span>
                    </div>
                      
                    <div class="col-lg-4">
                        <label class="form-control-label">
                        Email :
                        </label>
                      <input placeholder="enter email" id="email" name="email" type="email" class="form-control" value="{{$vehicleSupEmail->contact}}" > 
                      <span class="m-form__help text-danger">
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
                                <input type="radio" name="status" id="active" @if(($vehicleSupplier->status)==1) checked  @endif > Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--state-brand">
                                <input type="radio" name="status" id="inactive"  @if(($vehicleSupplier->status)==0) checked  @endif > In-active
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
                            <button type="reset" class="btn btn-secondary" >
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
                var id ='{{$vehicleSupplier->id}}';
                var code = $('#code').val();
                var name = $('#name').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var district_id = $('#district').val();
                var desc = $('#desc').val();                
                var country = $('#country').val();                
                var email = $('#email').val();                              
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
                    //Send Ajax request 
                  $.ajax({
                    
                    url: '{{Route('vehicle_sup_update')}}',
                    method: "POST",
                    data: {id:id,code:code,name:name,address:address,city:city,district_id:district_id,
                            desc:desc,country:country,email:email,tel:tel,status:status},
                    success: function(data) {
                            
                        //console.log(data);
                        //if Added 
                        if(data=='Updated'){
                            $('.alert').hide();
                            swal("Vehicle Supplier Updated successfully completed!", ""+name, "success");
                            window.location.replace('{{Route('vehicle_sup_index')}}');
                                                           
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
@endsection