@extends('layouts.tas_app') @section('content')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                Quick Quotation
				</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/dashboard" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    
                </li>
                <li class="m-nav__item">
                    
                        <span class="m-nav__link-text">
										Tour Manager
											</span>
                   
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Tour Quotations
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <span class="m-nav__link-text">
                        Create a Quick Quotation
											</span>
                   
                </li>
            </ul>
        </div>
        <div> 
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{Route('quotation_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
													Create a Quotation
												</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->

 <form id="add_holetFrm" class="" method="POST" action="">
                            {{-- {{csrf_field()}} --}}
                            
   <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label class="form-control-label">
                    Title:
                </label>
                <input id="title" name="title" type="text"  class="form-control m-input"
                                           value=""  placeholder="Enter Tour Title">
                                  
                <span class="m-form__help">
			
				</span>
            </div>
            <div class="col-lg-2">
                <label class="form-control-label">
                    Quotation type:
                </label>
                <select  class="form-control"  id="qt_type">
                    <option selected value="1">FIT</option>
                    <option value="2">Group</option>
                </select>
                                  
                <span class="m-form__help">
			
				</span>
            </div>
            <div class="col-lg-1">
               <div class="m-form__group form-group">
					<label>
						Days / Date
					</label>
					<div class="m-radio-list">
                            <label class="m-radio m-radio--state-success">
                                <input type="radio" class="with-gap" name="date_range" value="days" id="date_range1">
                                    Days
                                <span></span>
                            </label>
                                <label class="m-radio m-radio--state-brand">
                                    <input type="radio" checked class="with-gap" name="date_range" value="dates" type="radio">
                                            Date
                                            <span></span>
                            </label>
					</div>						
				</div>
                <span class="m-form__help">
				</span>
            </div>
            <div class="col-lg-3">
               <div class="m-form__group form-group">
					<label>
                    No Of Days
					</label>
                    <input  placeholder="0"  disabled type="number" id="no_of_days" onchange="getdate()"   class="form-control m-input num-only" name="no_of_days"/>
                                      <label for="no_of_days" class="active num-only"></label>
                
                    <span class="m-form__help">
			
            </span>
        </div>
        </div>                   


        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label id="lbl_stdate" class="form-control-label">
                    Start Date:
                </label>
                <input name="start_date" type="text"  class="form-control dtpic-format" placeholder="Select date" id="m_datetimepicker_6">
             
                <span class="m-form__help">
			
				</span>
            </div>

            <div class="col-lg-6">
                <label id="lbl_eddate" class="form-control-label">
                 End Date:
                </label>
                <input  name="end_date" type="text"  class="form-control dtpic-format" placeholder="Select date" id="m_datetimepicker_8">
               
                <span class="m-form__help">
					
				</span>
            </div>
        </div>
        
		
		 <div class="form-group m-form__group row">
          
            <div class="col-lg-6">
                <label class="form-control-label">
                 Mark Up Rate:
                </label>
                <input  name="commission_rate" id="commission_rate"  type="text"  class="form-control m-input numeric_only" placeholder="0.00">
               
                <span class="m-form__help">
					
				</span>
            </div>

            <div class="col-lg-6">
                <label class="form-control-label">
                 Base Currency:
                </label>
                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="base_currencies"  id="base_currencies">
                    <option value="0">Please Select</option>
                    @foreach ($currency_list as $item)
                    
                     <option value="{{$item->id}}">{{$item->code.' - '.$item->type}}</option>
                        
                    @endforeach
                 </select>
               
                <span class="m-form__help">
					
				</span>
            </div>
        </div>

         <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label class="form-control-label">
                    Market:
                </label>
                {{-- <div class="m-input-icon m-input-icon--right"> --}}
                <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="market_id"  id="market_id">
                      
                    <option value="0">Please Select</option>
                    @foreach ($maket_list  as $item)
                    
                     <option value="{{$item->id}}">{{$item->m_code.' - '.$item->market_name}}</option>
                        
                    @endforeach


                </select>
                    {{-- <span class="m-input-icon__icon m-input-icon__icon--right">
						<span>
						<i class="la la-map-marker"></i>
						</span>
                    </span> --}}
                {{-- </div> --}}
                
                <span class="m-form__help">
				
				</span>
            </div>

            <div class="col-lg-4">
                <label class="form-control-label">
                    Agent :
                </label>
                <select  class="form-control"  id="agent_id">
                        <option value="0">Please Select</option>
                    @foreach($agents as $agent)
                <option value="{{$agent->id}}">{{$agent->ag_name}}</option>
                    @endforeach
                </select>
                
                <div class="form-control-feedback">
                   
                </div>
                
                <span class="m-form__help">
				
				</span>
            </div>

              <div class="col-lg-4">
                <label class="form-control-label">
                    Branch :
                </label>
                <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="branch_id" id="branch_id">
                    <option value="0">Please Select</option>
                    @foreach ($branch_list  as $item)
                    
                     <option value="{{$item->id}}">{{$item->branch_code.' - '.$item->branch_name}}</option>
                        
                    @endforeach
                </select>
                <span class="m-form__help">
				
				</span>
            </div>

        </div>

        <div class="form-group m-form__group row">
            
            <div class="col-lg-4">
                <label class="form-control-label">
                    Number of Pax (Adult):
                </label>
                <input type="number"  class="form-control m-input num-only" min="1" value="0"  id="no_of_packs_adult" name="pax">
                <span class="m-form__help">
		
				</span>
            </div>

            <div class="col-lg-4">
                <label class="form-control-label">
                    Number of Pax (Children):
                </label>
                <input id="no_of_packs_children" name="pax_children" min="0" type="number" class="form-control m-input num-only" value="0">
               
                <span class="m-form__help">
					
				</span>
            </div>
          
            <div class="col-lg-4">
                <label class="form-control-label">
                 Tour Type:
                </label>
                <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="tourType" id="tourType">
                        @foreach ( $tourType as $t_type)
                          <option value="{{$t_type->id}}">{{$t_type->tour_type_name}}</option>
                        @endforeach                        
                </select>
                <span class="m-form__help">
					
				</span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12"> 
            <label class="form-control-label">
            Remarks :
                </label>                    
            <textarea name="remarks" id="remarks" placeholder="Enter some remarks here"
            class="form-control m-input"></textarea>
                                  

            </div>
        </div>   

        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                    
                        <button class="btn btn-primary" type="button" id="frm_submit" >Submit</button>
                        <button type="reset" class="btn btn-secondary">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

 </div>
           
        </form>

    </div>
</div>
@endsection @section('Page_Scripts') @parent

<script>

    
    function getdate() {
        
        
         if(document.getElementById('m_datetimepicker_6').value)
         {
             var tt = document.getElementById('m_datetimepicker_6').value;
             var aa=Number(document.getElementById('no_of_days').value);
             var startDate=new Date(tt);
             var returnDate = new Date(
             startDate.getFullYear(),
             startDate.getMonth(),
             startDate.getDate()+aa,
             startDate.getHours(),
             startDate.getMinutes(),
             startDate.getSeconds());
             var x= moment(returnDate).format('YYYY-MM-DD');
             document.getElementById('m_datetimepicker_8').value =x;
             }
    }
    
    $(document).ready( function(){
      
        //To hide the alert window on load the page
        $('.alert').hide();
        
        //to close the alert window after popup 
        $('#notify_close').click(function(event){
            $('.alert').hide();
        });
        
        $('#qt_type').change(function () {

            if (this.value == 2) {
                $('#no_of_days').prop('disabled', false);
                $('#m_datetimepicker_8').prop('disabled', false);
                // $('input[type=radio][name=date_range]').prop('disable',true);
                
                
                $('#no_of_packs_adult').val(1);
                $('#no_of_packs_children').val(0);

                $('#no_of_packs_adult').prop('disabled', true);
                $('#no_of_packs_children').prop('disabled', true);
            }else{

                
                $('#no_of_packs_adult').val(1);
                $('#no_of_packs_children').val(0);

                 $('#no_of_packs_adult').prop('disabled', false);
                $('#no_of_packs_children').prop('disabled', false);
            }
        
        });

        $('#m_datetimepicker_8').change(function () {
            
            
                if(base_on == "date")
                {   
                    
                    var startdate = moment($('#m_datetimepicker_6').val());
                    var endDate = moment($('#m_datetimepicker_8').val());
                    var noOfDays = endDate.diff(startdate,'days');
                    $('#no_of_days').val(noOfDays);
                    
                }
                            

            });
        


        //to change day/date and enable disable attr date & no of day
        $('input[type=radio][name=date_range]').change(function(event){
            // if($('#qt_type').val() == 1){
                if (this.value == 'days') {
                    $('#no_of_days').prop('disabled', false);
                    // $('#m_datetimepicker_8').prop('disabled', true);
                    base_on = 'day';
                    $('#no_of_days').val(0);
                    $('#lbl_eddate').html('Valid to');
                    $('#lbl_stdate').html('Valid from');
                }
                else if (this.value == 'dates') {
                    $('#no_of_days').prop('disabled', true);
                    // $('#m_datetimepicker_8').prop('disabled', false);
                    base_on = 'date';
                    
                    $('#lbl_eddate').html('Start Date');
                    $('#lbl_stdate').html('End Date');
                }
            // }
        });        


         $('#market_id').change(function(event){
           //
                 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

                var id = $('#market_id').val();
                let dd_agent = $('#agent_id');  
                
                if(id!=0){
                
                    $.getJSON({
                    
                    url: '{{Route('agent_filter_by_market')}}',
                    method: "POST",
                    data: {id:id},
                    success: function(data) {

                        //console.log(data);
                        $('#agent_id').empty();
                       $('#agent_id').append('<option value="0">Please Select</option>');                      
                       $.each(data, function (key, entry) {
                        dd_agent.append($('<option></option>').attr('value', entry.id).text(entry.ag_name));
                      })
                    }                                   
                }) 
                }else{
                    $('#agent_id').empty();
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
                var title = $('#title').val();
                var days = $('#no_of_days').val();
                var frm_date = $('#m_datetimepicker_6').val(); //start date
                var to_date = $('#m_datetimepicker_8').val(); //end date
                var com_rate = $('#commission_rate').val();
                var base_cr = $('#base_currencies').val();                
                var market_id = $('#market_id').val();                
                var agent_id = $('#agent_id').val();                              
                var branch_id = $('#branch_id').val();
                var pax_adult = $('#no_of_packs_adult').val();
                var pax_child = $('#no_of_packs_children').val();
                var tourType = $('#tourType').val();
                var version_no = 0;      
                var remarks = $('#remarks').val();
                
                var qtType = $('#qt_type').val();
                
                
                    //Send Ajax request 

                    // alert(base_on);

                  $.ajax({
                    
                    url: '{{Route('quotation_store')}}',
                    method: "POST",
                    data: {title:title,days:days,frm_date:frm_date,to_date:to_date,com_rate:com_rate,
                             base_cr:base_cr,market_id:market_id,agent_id:agent_id,branch_id:branch_id,
                             pax_adult:pax_adult,pax_child:pax_child,tourType:tourType,remarks:remarks,
                             qtType:qtType,version_no:version_no,base_on:base_on},
                    success: function(data) {
                            
                        //console.log(data);
                        //if Added 
                        if(data=='added'){
                            $('.alert').hide();
                            // window.location.replace('{{route('quotation_index')}}');
                            swal("Tour Created successfully!", " "+title, "success");                          
                             window.location.replace('{{route('quotation_index')}}');                          
                            $("#add_holetFrm")[0].reset();
                            // $("html, body").animate({
                            //         scrollTop: 0
                            //     });                               
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
@endsection