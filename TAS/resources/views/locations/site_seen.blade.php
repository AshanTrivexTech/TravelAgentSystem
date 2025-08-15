@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
<meta name="_token" content="{{csrf_token()}}" />

<div class="m-subheader ">
    <div class="d-flex align-items-center">
            <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator ">
                    Routes
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
                                        Routes
                                                    </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                        Site Seen
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{Route('gmd_dashboard')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Create Site Seen location
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" action="" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="add_locationfrm">
            {{csrf_field()}}
            <div class="m-portlet__body">
                <div class="form-group m-form__group has-danger row">
                   
                    <div class="col-lg-4">
                        <label class="form-control-label">
                         Location Name :
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                            <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="site" id="site">

                                <option selected value="0">Please select...</option>
                                @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->location_name}} </option>
                                @endforeach
                            </select>
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <label class="form-control-label">
                            SS Code:
                        </label>
                        <input required placeholder="unique code" id="code" name="code" type="text" class="form-control m-input mxl_code"  value="">
                        <span class="m-form__help text-danger">
                                * Required
                            </span>
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>

                    <div class="col-lg-4">
                        <label class="form-control-label">
                        SS Location Name :
                        </label>
                        <input required placeholder="unique name" id="name" name="name" type="text" class="form-control m-input mxl_name"  value="">
                        <span class="m-form__help text-danger">
                                * Required
                            </span>
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>
                </div>

                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                         Long Name :
                        </label>
                        <input  placeholder="long name" id="long_name" name="long_name" type="text" class="form-control m-input mxl_name"  value="">
                       
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>
               
                    <div class="col-lg-6">
                        <label class="form-control-label">
                         Geo Name :
                        </label>
                        <input  placeholder="geo name" id="geo_name" name="geo_name" type="text" class="form-control m-input mxl_name"  value="">
                      
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>
                 </div>

                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Country:
                        </label>
                        <div class="m-input-icon m-input-icon--right">
                            <select class="form-control" name="country" id="country">

                                <option selected value="0">Please select...</option>
                                @foreach($country_id as $country)
                                <option value="{{$country->id}}">{{$country->country_name}} </option>
                                @endforeach
                            </select>
                            <span class="m-form__help text-danger">
                                    * Required
                                </span>
                            </div>
                        
                        <div class="form-control-feedback">
                            
                        </div>
                        
                    </div>

                    
                        <div class="col-lg-6">
                            <label class="form-control-label">
                                District:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <select class="form-control" name="district" id="district">
                                    @foreach($district_id as $district)
                                    <option value="{{$district->id}}">{{$district->dist_name}} </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help text-danger">
                                        * Required
                                    </span>
                            </div>
                            
                            <div class="form-control-feedback">
                                
                            </div>
                            
                    </div>
                </div>

                    <div class="form-group m-form__group has-danger row">
                            

                            <div class="col-lg-6">
                                <label class="form-control-label">
                                 Short Description:
                                </label>
                                <input  placeholder="short description" id="short_discription" name="short_discription" type="text" class="form-control m-input" maxlength="191" value="">
                                <div class="form-control-feedback">
                                    
                                </div>
                               
                                
                            </div>
                            <div class="col-lg-6">
                                <label class="form-control-label">
                                Milage  KM:
                                </label>
                                <input  placeholder="Milage" id="milage" name="milage" type="text" class="form-control numeric_only" maxlength="191" value="">
                                <div class="form-control-feedback">
                                    
                                    <span class="m-form__help text-danger">
                                        * Required
                                    </span>
                                </div>
                               
                                
                            </div>
                    </div>

                    <div class="form-group m-form__group has-danger row">

                            <div class="col-lg-6">
                                <label class="form-control-label">
                                Narration:
                                </label>
                                
                                <textarea  placeholder="Narration" name="narration" id="narration" cols="15" rows="3" class="form-control textarea"></textarea>
                                <div class="form-control-feedback">
                                    
                                </div>
                                
                                
                            </div>
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
                        </div>
                        
                        <div class="form-control-feedback">
                            
                        </div>
                        
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
                       $('#district').append('<option value="0">Please select...</option>');                      
                       $('#city').empty();
                       $('#city').append('<option value="0">Please select...</option>');
                       $.each(data, function (key, entry) {
                        dd_district.append($('<option></option>').attr('value', entry.id).text(entry.dist_name));
                      })
                    }                                   
                }) 
                }else{
                    $('#district').empty();
                    $('#district').append('<option value="0">Please select...</option>');
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
                            $('#city').append('<option value="0">Please select...</option>');                      
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
                var code = $('#code').val();
                var name =$('#name').val();
                var long_name=$('#long_name').val();
                var geo_name=$('#geo_name').val();
                var country=$('#country').val();
                var district=$('#district').val();
                var milage=$('#milage').val();
                var site=$('#site').val();
                
                var short_discription=$('#short_discription').val();
                var narration=$('#narration').val();
                var cur_url=window.location.href;
                                  
                    //Send Ajax request 
                  $.ajax({
                    
                    url: '{{Route('siteSeen_store')}}',
                    method: "POST",
                    data: {code:code,name:name,long_name:long_name,geo_name:geo_name,country:country,district:district,
                    short_discription:short_discription,narration:narration,milage:milage,site:site},
                    success: function(data) {
                            
                        console.log(data);
                        //if Added 
                        if(data=='added'){
                            $('.alert').hide();
                            swal("Location Add successfully completed!", ""+name, "success");
                            $("#add_locationfrm")[0].reset();
                            window.location.replace('{{route('location_index')}}');
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