@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
            <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator ">
                            Transport
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
                                Transport 
                                                    </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                              Create a  Vehicle 
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{Route('vehicles_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Create a Vehicle
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form id="add_Frm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="">
            {{csrf_field()}}
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                            Title :
                        </label>
                         <input required class="form-control" placeholder="unique name" id="title" name="title" type="text" class="validate"maxlength="191" value="">
                         <span class="m-form__help text-danger">
                                * Required
                            </span>                 
                        
                        <div class="form-control-feedback">
                            
                        </div>
                      
                    </div>

                    <div class="col-lg-6">
                        <label class="form-control-label">
                           Vehicle Type :
                        </label>
                        <select required class="form-control" name="vehicle_type" id="vehicle_type">
                              <option value="0">Please Select</option> 
                              @foreach ($vehicleType_list as $vehicletype)
                                <option value="{{$vehicletype->id}}">{{$vehicletype->type}}</option>                                  
                              @endforeach
                      </select> 
                      <span class="m-form__help text-danger">
                            * Required
                        </span>                                            
                    </div>
                </div>

                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                         Supplier :
                        </label>
                        <select required class="form-control" name="supplier" id="supplier">
                            <option value="0">Please Select</option>
                            @foreach ($vehicleSup_List as $suplier)
                                <option value="{{$suplier->id}}">{{$suplier->sup_name}}</option>
                            @endforeach
                        </select>
                        <span class="m-form__help text-danger">
                                * Required
                            </span>
                                   
                    </div>
                    <div class="col-lg-6">
                        <label class="form-control-label">
                        Vehicle Number :
                        </label>
                      
                        <input required class="form-control" placeholder="Unique Vehicle Number" id="vehicle_no" name="vehicle_no" type="text"
                                 maxlength="16" value="">
                                 <span class="m-form__help text-danger">
                                        * Required
                                    </span>     
                        <div class="form-control-feedback">
                            
                        </div>
                     
                       
                    </div>
                </div>
                <div class="form-group m-form__group  row">
                 <div class="col-lg-6">
                        <label class="form-control-label">
                            License Expire Date:
                        </label>
                        <input placeholder="License Expire Date" id="m_datepicker_1_modal"
                                           name="lc_exDate" type="text"
                                           class="form-control dtpic-format" value="">

                                           <span class="m-form__help text-danger">
                                                * Required
                                            </span>
                        <div class="form-control-feedback">
                          
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                            Insurance Expire Date:
                            </label>
                            <input placeholder="Insurance Expire Date" id="m_datepicker_2_modal"
                                               name="ins_exDate" type="text"
                                               class="form-control dtpic-format" value="">
                                   
                                               <span class="m-form__help text-danger">
                                                    * Required
                                                </span>
                            <div class="form-control-feedback">
                              
                            </div>
                            
                        </div>


                    </div>
                    <div class="form-group m-form__group  row">
                            <div class="col-lg-6">
                            <label class="form-control-label">
                            Year of Manufacture:
                            </label>
                            <input placeholder="Year of manufacture" id="year_of_manufacture"
                                            name="year_of_manufacture" type="number"
                                            class="form-control mxl_phone"
                                            maxlength="4" value="">
                                            <span class="m-form__help text-danger">
                                                    * Required
                                                </span>
                                           
                            <div class="form-control-feedback">
                                
                            </div>
                           
                            </div>                            
                            <div class="col-lg-6">
                                    <label class="form-control-label">
                                    Year of Registration (LK):
                                    </label>
                                    <input placeholder="Year of Registration (Sri Lanka)" id="year_of_sl_registration"
                                                    name="year_of_sl_registration" type="number"
                                                    class="form-control mxl_phone"
                                                    maxlength="4" value="">
                                                    
                                                    <span class="m-form__help text-danger">
                                                            * Required
                                                        </span>
                                    <div class="form-control-feedback">
                                   
                                    </div>
                                   
                                </div>

                    </div>
                        <div class="form-group m-form__group  row">
                                <div class="col-lg-6">
                                        <label class="form-control-label">
                                        Remarks:
                                        </label>
                                        <textarea name="remarks" id="remarks" placeholder="remarks" class="form-control" ></textarea>
                                                     
                                             
                                        <span class="m-form__help text-danger">
                                                * Required
                                            </span>
                                        
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
                                <input type="radio" name="status"  value="0"> In-active
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

{{-- <script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script> --}}

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
                    var title = $('#title').val();
                    var vehicle_type = $('#vehicle_type').val();
                    var supplier = $('#supplier').val();
                    var vehicle_no = $('#vehicle_no').val();
                    var lc_exDate = $('#m_datepicker_1_modal').val();
                    var ins_exDate = $('#m_datepicker_2_modal').val();                
                    var mf_year = $('#year_of_manufacture').val();                
                    var reg_year = $('#year_of_sl_registration').val();                              
                    var remarks = $('#remarks').val();
                    var status = $('#status').val();
                    var cur_url=window.location.href;
                        //Send Ajax request 
                      $.ajax({
                        
                        url: '{{Route('vehicle_store')}}',
                        method: "POST",
                        data: {title:title,vehicle_type:vehicle_type,supplier:supplier,
                            vehicle_no:vehicle_no,lc_exDate:lc_exDate,ins_exDate:ins_exDate,
                            mf_year:mf_year,reg_year:reg_year,remarks:remarks,status:status},

                        success: function(data) {
                                
                            console.log(data);
                            //if Added 
                            if(data=='added'){
                                $('.alert').hide();
                                swal("Vehicle Vehicle Added successfully completed!", ""+title, "success");
                                $("#add_Frm")[0].reset();
                                window.location.replace('{{route('vehicles_index')}}');
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

@endsection