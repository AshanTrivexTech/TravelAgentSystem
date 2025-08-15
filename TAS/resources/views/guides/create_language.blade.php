@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">


<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
				Guide {{$id}}
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
                      Guides 
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Guides 
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{route('load_guid_lanuages',$id)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                    Edit a languages 
												</h3>
                </div>
            </div>
        </div>
       
        <!--begin::Form-->
       
    <form id="add_guideFrm" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >
          
            
            <div class="m-portlet__body">
                   <div class="form-group m-form__group  row">
                    <div class="col-md-6">
                    <table class="table table-bordered table-hover table-checkable">
                        <thead>
                            <tr style="text-align: center;">
                                    <th>Language</th>
                                    <th>Guiding Rate</th>
                                    <th style="width:10%; text-align: center;"><button type="button" id="load_row"  class="btn btn-primary">Add</button></th>
                             </tr>
                        </thead>



                        <tbody id="t_a">
                        <tr>                               
                            <td class="col-lg-4">                                   
                                         
                                            <select required id="l1" class="form-control">
                                                <option value="0" selected >Please Select</option>
                                                @foreach($languages->all() as $language)
                                                    <option value="{{$language->id}}"> {{$language->lang_name}} </option>
                                                @endforeach                   
                    
                                            </select>                
                                   
                            </td>
                            <td  class="col-lg-4">
                                    
                                  <div>                                        
                                       <input placeholder="Enter Amount" id="r1" name="r1" type="text" class="form-control">                     
                                  </div>    
                             </td>
                        </tr>                      
                    </tbody>
                    
                    </table>   
                    <button type="button"  id="remove_row" class="btn btn-danger">Remove</button>
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
                        
                tbr.append($('<td class="col-lg-4"></td>').attr('id','td_id_'+i).html('<select required id="l'+i+'" class="form-control">'+opList+'</select>'));

                tbr.append($('<td class="col-lg-4"></td>').attr('id','td2_id_'+i).html('<input placeholder="Enter Amount" id="r'+i+'" type="text" class="form-control"></input>'));
                //tbr.append($('<td class="col-lg-4"></td>').html('<input placeholder="Enter Amount" id="r'+i+'" type="text" class="form-control"></input>'));
                   
                tbr.append($('</tr>'));         
                i++;
            });

            $('#remove_row').click(function(event){
                    
                   if(i!=2){
               
                     $('#tr_id_'+(i-1)).remove();
                     $('#td_id_'+(i-1)).remove();
                     $('#td2_id_'+(i-1)).remove();

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
                     $('#td2_id_'+(i)).remove();
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

                       // console.log(data);
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
           
                                      
                    var langs = []; 
                    var lnId,amt;
                    var j=1;
                    var checkFill = true; 
                    // console.log('ok');
                    
                  //  $("table tbody tr").each(function(index) {
                      
                    for(j=1;j<i;j++){
                        lnId = $('#l'+j).val();
                        amt = $('#r'+j).val();

                        if(amt==0){
                            checkFill = false;
                            return false;                    
                        }                       
                        langs.push({
                        language_id: lnId,
                        amount: amt                                               
                      });
                    }
                 //   });
                    
                   // console.log(langs);
                   var id='{{$id}}';



                      
                    if(checkFill == true){
                        //Send Ajax request 
                      $.ajax({
                        
                        url: '{{Route('guid_lanuages_store')}}',
                        method: "POST",
                        data: {jsData:JSON.stringify(langs),id:id},
                        success: function(data) {                                
                           console.log(data);
                            //if Added 
                            if(data=='added'){
                                $('.alert').hide();
                                swal("Guide  Languages Add successfully completed!", "Lanuage", "success");
                                window.location.replace('{{route('load_guid_lanuages',$id)}}');   
                                $("#add_guideFrm")[0].reset(); 
                                                          
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
                    }

             });
        });
</script>
<script>
$(".My").select2();
</script>
@endsection