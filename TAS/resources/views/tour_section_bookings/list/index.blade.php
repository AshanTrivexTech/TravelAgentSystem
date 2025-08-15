
 @extends('layouts.tas_app') @section('content')
 <!-- BEGIN: Subheader -->
 <div class="m-subheader ">
     <div class="d-flex align-items-center">
         <div class="mr-auto">
             <h3 class="m-subheader__title m-subheader__title--separator ">
                         Tour Booking 
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
                          Tour Manager 
                  </span>
                  </a>
                  </li>
                 <li class="m-nav__separator">
                     -
                 </li>
                 <li class="m-nav__item">
                   <a href="" class="m-nav__link">
                   <span class="m-nav__link-text">
                           Tour Bookings 
                   </span>
                   </a>
                   </li>
                 <li class="m-nav__separator">
                     -
                 </li>
                 <li class="m-nav__item">
                  <a href="" class="m-nav__link">
                  <span class="m-nav__link-text">
                          Tour Bookings  
                  </span>
                  </a>
                  </li>
             </ul>
         </div>
         <div>
             <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                
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
                             Tour Booking List
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
                 <div class="row align-items-center">
                     <div class="col-xl-8 order-2 order-xl-1">
                         <div class="form-group m-form__group row align-items-center">
                             <div class="col-md-4">
                                 <div class="m-input-icon m-input-icon--left">
                                     <input type="text" class="form-control m-input" placeholder="Search..." id="txsrid">
                                     <span class="m-input-icon__icon m-input-icon__icon--left">
                                                             <span>
                                                                 <i class="la la-search"></i>
                                                             </span>
                                     </span>
                                 </div>
                             </div>
                         </div>
                     </div>
 
                 </div>
             </div>
             
             <div style="overflow-x:auto;">
             <table class="table table-bordered table-hover table-checkable" id="" width:"100%">
                 <thead>
                     <tr style="text-align: center;">
                         <th>No</th>
                         <th>Title</th>                         
                         <th>Pax</th>                         
                         <th>From Date</th>
                         <th>To Date</th>
                         <th>Excursion</th>
                         <th>Remarks</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                  
                </tbody>
             </table>
             <!--end: Datatable -->
             </div>
         </div>
     </div>
 
 </div>
 
 @endsection @section('Page_Scripts') @parent
 
  <script>
      $(document).ready(function() {
 
          function fetch_quotation_data(query = '') {
 
              $.ajaxSetup({
                  
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
 
              $.getJSON({
                  url:'{{Route('tour_booking_livesearch')}}',
                  method:'POST',
                  data:{query:query},
                  //dataType:'json',
                  success:function (data) {
                        
                      console.log(data);
                      $('tbody').html(data.table_data);
 
 
                  }
              })
          }
 
          $(document).on('keyup','#txsrid',function () {
 
              var query = $(this).val();
              // var frd  =  $('#odid').val();
              //alert(query);
          
              fetch_quotation_data(query);
            
          });
 
 
          fetch_quotation_data('');
 
      });
 
  </script>
 
 @endsection
