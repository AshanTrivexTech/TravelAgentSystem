@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
{{-- <meta name="_token" content="{{csrf_token()}}" /> --}}

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Guide Manager
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
                      Guide 
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Create a  Guide 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{Route('index_guide')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Create a   Guide 
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
       
    <form id="add_guideFrm" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >
          
            
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-2">
                        <label class="form-control-label">
                            Code :
                        </label>

                        <input required placeholder="unique code" id="code" name="code" type="text" class="form-control mxl_code"  value="">
                          <span class="form-group text-danger"> * Required</span>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-control-label">
                          Name :
                        </label>
                    <input required placeholder=" name" id="g_name" name="g_name" type="text"  class="form-control mxl_name"  value="">
                        <span class="form-group text-danger"> * Required</span>
                    </div>
                    <div class="col-lg-4">
                            <label class="form-control-label">
                            Guide Type :
                            </label>
                            <select required name="g_type" id="g_type" class="form-control">
                                  @foreach($guide_types->all() as $guide_type)
                                     <option value="{{$guide_type->id}}">{{$guide_type->g_type}}</option>
                                  @endforeach
                             </select>
                             <span class="form-group text-danger"> * Required</span>
                        </div>
                </div>

                <div class="form-group m-form__group  row">
                    <div class="col-lg-4">
                        <label class="form-control-label">
                          Address :
                        </label>
                        <textarea placeholder="Address" id="address" name="" class="form-control" required></textarea>                       
                    </div>
                    
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                Country :
                                </label>
                                <select required name="country" id="country" class="form-control">  
                               <option value="0" selected>Please Select...</option>
                                @foreach($countries->all() as $country)

                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                 @endforeach  
                                
    
     
                                </select>
                                <span class="form-group text-danger"> * Required</span>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-control-label">
                            District :
                            </label>
                            <select required name="district" id="district" class="form-control"> 
                                
                                    <option value="0">Please Select</option> 


                            </select>
                            <span class="form-group text-danger"> * Required</span>
                    </div>
                        <div class="col-lg-3">
                                <label class="form-control-label">
                                City :
                                </label>
                                <select required name="city" id="city" class="form-control">
                                    
                                        <option value="0">Please Select</option>
                                        
                                </select>
                                <span class="form-group text-danger"> * Required</span>
                        </div>
                </div>

                   <div class="form-group m-form__group  row">
                    <div class="col-md-6">
                            <span class="form-group text-danger"> * Required</span>
                    <table class="table table-bordered table-hover table-checkable">
                        <thead>
                            <tr style="text-align: center;">
                                    <th>Language</th>
                                  
                                    <th style="width:10%; text-align: center;"><button type="button" id="load_row"  class="btn btn-primary">Add</button></th>
                             </tr>
                        </thead>



                        <tbody id="t_a">
                        <tr>                               
                            <td class="col-lg-4">                                   
                                         
                                            <select required id="l1" class="form-control">
                                                <option value="0" selected >Please Select</option>
                                                @foreach($lanuages->all() as $language)
                                                    <option value="{{$language->id}}"> {{$language->lang_name}} </option>
                                                @endforeach                   
                    
                                            </select>                
                                   
                            </td>
                           
                        </tr>                      
                    </tbody>
                    
                    </table>   
                    <button type="button"  id="remove_row" class="btn btn-danger">Remove</button>
                </div>
                                  
                                      
                </div>
                <div class="form-group m-form__group  row">
                        <div class="col-lg-4">
                                <label class="form-control-label">
                                Email  :
                                </label>
                              <input placeholder="Email" id="email" name="email" type="email" class="form-control" value="" required>
                              <span class="form-group text-danger"> * Required</span> 
                              <br>                       
                        </div>
                </div>
                


                <div class="form-group m-form__group  row">
                    <div class="col-lg-6">
                        <label class="form-control-label">
                        Tel :
                        </label>
                      <input placeholder="011XXXXXXXX" id="tel" name="tel" type="tel" class="form-control mxl_phone"  value="" required >
                    </div>
                    <div class="col-lg-6">
                            <label class="form-control-label">
                            Mobile :
                            </label>
                          <input placeholder="011XXXXXXXX" id="mobile" name="mobile" type="tel" class="form-control mxl_phone"  value="" required >
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

            var Language_list;

           // function loadlang(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });
                      
                      $.getJSON({
                      
                      url: '{{Route('guide_lang_list')}}',
                      method: "POST",
                      data: {id:1},
                      success: function(data) {
                        //console.log(data);
                        Language_list=data;
                      }                                   
                  }) 




                  
           // }

        
            
            let tbr =$('#t_a');
            var i =2;
                
                  
            $('#load_row').click(function(event){
                
                    var opList;
                    $.each(Language_list, function (key, entry) {

                        opList+='<option id="op_'+i+'" value="'+entry.id+'">'+entry.lang_name+'</option>'

                    })

                tbr.append($('<tr>').attr('id','tr_id_'+i)); 
                        
                tbr.append($('<td class="col-lg-4"></td>').attr('id','td_id_'+i).html('<select required id="l'+i+'" class="form-control">'+'<option>Please Select</option> '+opList+'</select>'));

               // tbr.append($('<td class="col-lg-4"></td>').attr('id','td2_id_'+i).html('<input placeholder="Enter Amount" id="r'+i+'" type="text" class="form-control"></input>'));
                //tbr.append($('<td class="col-lg-4"></td>').html('<input placeholder="Enter Amount" id="r'+i+'" type="text" class="form-control"></input>'));
                   
                tbr.append($('</tr>'));         
                i++;
            });

            $('#remove_row').click(function(event){
                    
                   if(i!=2){
               
                     $('#tr_id_'+(i-1)).remove();
                     $('#td_id_'+(i-1)).remove();
                     //$('#td2_id_'+(i-1)).remove();

                     $('#r'+(i-1)).remove();
                     $('#l'+(i-1)).remove();
                     $('#op_'+(i-1)).remove();

                     i--;
                   }else{

                    $('#tr_id_'+(i)).remove();
                    $('#r'+(i)).remove();
                    $('#l'+(i)).remove();
                    $('#op_'+(i)).remove();
                    $('#td_id_'+(i)).remove();
                     //$('#td2_id_'+(i)).remove();
                   }

            });




            $('#country').change(function(event){
           
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
                    var code = $('#code').val();
                    var g_name = $('#g_name').val();
                    var gtype = $('#g_type').val();

                    var address = $('#address').val();
                    var country = $('#country').val(); 
                    var district = $('#district').val();
                    var city = $('#city').val();
                                   
                    var email = $('#email').val();                              
                    var tel = $('#tel').val();
                    var mobile = $('#mobile').val();
                    var status = $('#status').val();
                                      
                    var langs = []; 
                    //var lnId,amt;
                    var j=1;
                    var checkFill = true; 
                    var cur_url=window.location.href;

                  //  $("table tbody tr").each(function(index) {
                      
                    for(j=1;j<i;j++){
                        lnId = $('#l'+j).val();
                      //  amt = parseFloat($('#r'+j).val());

                        /*if(amt == ''){
                            checkFill = false;
                            return false;                    
                        }  */                     
                        langs.push({
                        language_id: lnId,
                        //amount: amt                                               
                      });
                    }
                 //   });
                    
                   // console.log(langs);


                      
                    if(checkFill == true){
                        //Send Ajax request 
                      $.ajax({
                        
                        url: '{{Route('store_guide')}}',
                        method: "POST",
                        data: {jsData:JSON.stringify(langs),code:code,g_name:g_name,gtype:gtype,address:address,country:country,
                                district:district,city:city,email:email,tel:tel,mobile:mobile,status:status},
                        success: function(data) {                                
                            console.log(data);
                            //if Added 
                            if(data=='added'){
                                $('.alert').hide();
                                swal("Guide  Details Add successfully completed!", ""+g_name, "success");
                                window.location.reload();
                                $("#add_guideFrm")[0].reset(); 
                                window.location.replace('{{route('index_guide')}}');                               
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
                    }
                    else{
                          $('.alert').show();
                        $('#notify').html('Please select lanuages');
                        $("html, body").animate({
                                        scrollTop: 0
                                    });
                                  

                    }

             });
        });
</script>
<script>

</script>
@endsection