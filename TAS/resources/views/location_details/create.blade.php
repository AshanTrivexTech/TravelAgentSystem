@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
            <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator ">
                    Route
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
                                         Distance Details
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{Route('distance_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                          Add location Distance
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" action="" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
          
            <div class="m-portlet__body">
                <div class="form-group m-form__group has-danger row">
                        <div class="col-lg-6">
                                <label class="form-control-label">
                                    Select Location:
                                </label>
                                <div class="m-input-icon m-input-icon--right">
                                    <select class="form-control" name="sl_location" id="sl_location">
                                        <option value="0">Select location </option>
                                        @foreach ( $location_list as $location)
                                            <option value="{{$location->id}}">{{$location->location_name}}</option>                                            
                                        @endforeach                                        
                                    </select>
                                    <span class="m-form__help text-danger">
                                            * Required
                                        </span>
                                </div>                               
                        </div>

                    
                </div>  

                <div class="form-group m-form__group has-danger row">
                    <div class="col-lg-6">
                    <table class="table table-bordered table-hover" id="dist_table">
                            <thead>
                                <tr><label class="form-control-label">
                                        Location Distance:
                                    </label></tr>   
                                    <br>     
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>From</th>
                                <th>To</th>                   
                                <th>Distance (Km)</th>
                            </tr>
                            </thead>
                            <tbody id="distance_tb" class="DataRow">
                                
                            </tbody>
                        </table>
                        </div>
                </div>
                
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" id="frm_submit" class="btn btn-primary">
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
<script>
        $(document).ready( function(){
          
            //To hide the alert window on load the page
            $('.alert').hide();
            
            //to close the alert window after popup 
            $('#notify_close').click(function(event){
                $('.alert').hide();
            });
    
            $('#sl_location').change(function(event){
               //
                     $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                    });
    
                    var locationId = $('#sl_location').val();
                    var locationName = $('#sl_location option:selected').text();
                    let dis_table = $('#distance_tb');  
                    
                    if(locationId!=0){
                    
                        $.getJSON({
                        
                        url: '{{Route('dis_location_list')}}',
                        method: "POST",
                        data: {locationId:locationId},
                        success: function(data) {
    
                            //console.log(data);
                            $('#distance_tb').empty(); 
                            var i=0;                          
                           $.each(data, function (key, entry) {
                                
                                dis_table.append($('<tr>').attr('id', i));                                
                                dis_table.append($('<td style="text-align: center;"></td>').attr('id','lid_'+i).html(entry.id));
                                dis_table.append($('<td style="text-align: center;"></td>').html(entry.location_name));
                                dis_table.append($('<td style="text-align: center;"></td>').html(locationName));
                                dis_table.append($('<td class="dist" style="text-align: center; width:30px;"></td>')
                                .html('<input required style="text-align: center;" class="form-control dis" placeholder="0" id="dist_'+i+'" type="text"></input>'));                              

                            dis_table.append($('</tr>'));
                            i++;
                          })
                        }                                   
                    }) 
                    }else{
                        $('#distance_tb').empty();
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
                
                    var distanceData = [];
                    var lid, dist;
                    var i=0;
                    var checkFill = true;                    
                    var location = $('#sl_location').val();
                    var cur_url=window.location.href;

                if(location !=0){

                    $("table tbody tr").each(function(index) {

                        lid = $('#lid_'+i).text();
                        dist = $('#dist_'+i).val();
                        if(dist==0){
                            checkFill = false;
                            return false;                    
                        }                       
                        distanceData.push({
                        frm: location,
                        to: lid,
                        distance: dist                        
                      });
                      i++;
                    });
                      //  console.log(i);
                      // console.log(distanceData);  
                    
                    if(checkFill == true){
                        //Send Ajax request 
                      $.ajax({
                        
                        url: '{{Route('distance_store')}}',
                        method: "POST",
                        data: {jsData:JSON.stringify(distanceData),location:location,numrow:i},
                        success: function(data) {                                
                           // console.log(data);
                            //if Added 
                            if(data=='added'){
                                $('.alert').hide();
                                swal("Vehicle Location Details Add successfully completed!", "success");
                                window.location.reload();
                                                             
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
    
                    }else{
                        $('.alert').show();
                        $('#notify').html('Distance Cannot be Blank! Please fill all distance before save.');
                    }
                }else{
                    $('.alert').show();
                        $('#notify').html('Please Select Location!, after Please fill all distance before save.');
                }
                
             });
        });
    </script>
@endsection