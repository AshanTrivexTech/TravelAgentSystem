
 @extends('layouts.tas_app') @section('content')
 <!-- BEGIN: Subheader -->
 <div class="m-subheader ">
     <div class="d-flex align-items-center">
         <div class="mr-auto">
             <h3 class="m-subheader__title m-subheader__title--separator ">
                         Tour Section 
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
                   
                         <span class="m-nav__link-text">
                   Bookings
                                             </span>
                    
                 </li>
                 <li class="m-nav__separator">
                     -
                 </li>
                 <li class="m-nav__item">
                     <a href="" class="m-nav__link">
                         <span class="m-nav__link-text">
                         Tour Section 
                                             </span>
                     </a>
                 </li>
                 <li class="m-nav__separator">
                     -
                 </li>
                 <li class="m-nav__item">
                  
                         <span class="m-nav__link-text">
                         Tour Section   Master Files
                                             </span>
                   
                 </li>
             </ul>
         </div>
         <div>
             <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                 <a href="" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                     <span>
                                                     <i class="la 	la-plus"></i>
                                                     <span>
                                                         Create
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
 
     <div class="m-portlet m-portlet--mobile">
         <div class="m-portlet__head">
             <div class="m-portlet__head-caption">
                 <div class="m-portlet__head-title">
                     <h3 class="m-portlet__head-text">
                             Allocate Guest
                                         </h3>
                 </div>
             </div>
             <div class="m-portlet__head-tools">
                 <ul class="m-portlet__nav">
                     <li class="m-portlet__nav-item">
 
                     </li>
                 </ul>
             </div>
         </div>
         <div class="m-portlet__body">
             <!--begin: Search Form -->
             <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                         <div class="form-group m-form__group  row">
                             <div class="col-lg-4">
                                    <label class="form-control-label">
                                        Select Guest :
                                    </label>
                            <select class="form-control" id="Guest_add" name="Guest_add">
                                <option value="0">Please select...</option>
                            </select>    
                            </div>
                                <div class="col-lg-6">
                                        <label class="form-control-label">
                                          Remarks :
                                        </label>
                                        <textarea placeholder="Remarks" id="remarks" name="remarks" class="form-control" ></textarea>                       
                                </div>
                                <div class="col-lg-2">
                                        <div class="m-form__actions">
												<div class="row">
														<button type="button" class="btn btn-success" id="frm_submit">
															Add
														</button>
												</div>
											</div>
                                    </div> 
                               </div>
                            </div>
             <!--end: Search Form -->
             <!--begin: Datatable -->
             
             <table class="table table-bordered table-hover table-checkable" id="" width:"100%">
                 <thead>
                     <tr style="text-align: center;">
                         <th>Guest ID</th>
                         <th>Name</th>
                         <th>Type</th>
                         <th>Remarks</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                            <td style="text-align: center">
    
                            <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add Vehicle"><i class="la la-edit"></i></a> 
                            {{-- <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add Guide"><i class="la la-edit"></i></a> 
                            <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add Hotel"><i class="la la-edit"></i></a>
                            <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Guest Allocation"><i class="la la-edit"></i></a>
                            <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add Micelleneous"><i class="la la-edit"></i></a>    --}}
                            {{-- <a id="" onclick="deleteAccept()"
                               class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                               title="Edit View">
                            <i class="la la-trash"></i>
                            </a> --}}

                            </td>
                        </tr> 
                </tbody>
             </table>
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
             <!--end: Datatable -->
         </div>
     </div>
 
 </div>
 
 @endsection @section('Page_Scripts') @parent
  {{-- <script>
      $(document).ready(function() {
 
          function fetch_quotation_data(query = '') {
 
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
 
              $.getJSON({
                  url:'{{Route('quotation_livesearch')}}',
                  method:'POST',
                  data:{query:query},
                  //dataType:'json',
                  success:function (data) {
 
                      // console.log(data);
                      $('tbody').html(data.table_data);
 
 
                  }
              })
          }
 
          $(document).on('keyup','#txsrid',function () {
 
              var query = $(this).val();
              // var frd  =  $('#odid').val();
              //alert(frd);
 
              fetch_quotation_data(query);
 
          });
 
 
          fetch_quotation_data('');
 
      });
 
  </script> --}}
 
 @endsection
 