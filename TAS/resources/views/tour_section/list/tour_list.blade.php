
 @extends('layouts.tas_app') @section('content')
 <!-- BEGIN: Subheader -->
 <div class="m-subheader ">
     <div class="d-flex align-items-center">
         <div class="mr-auto">
             <h3 class="m-subheader__title m-subheader__title--separator ">
                         Tour Quotation 
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
                            Tour Quatation
                            </span>
                        </a>
                    </li>
                 <li class="m-nav__separator">
                     -
                 </li>
                 <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Tour Quotation Master Files 
                            </span>
                        </a>
                    </li>
             </ul>
         </div>
         <div>
             <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                 <a href="{{Route('quotation_create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                             Tour Quotations
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
             <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1" id="fit_quote">FIT</a>
                </li>											
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2" id="grp_quote">GROUP</a>
                </li>
            </ul>
            <div class="tab-content">
             <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
             <div style="overflow-x:auto;">
             <table class="table table-bordered table-hover table-checkable" id="" width:"100%">
                 <thead>
                     <tr style="text-align: center;">
                         <th>No</th>
                         <th>Quotaion No</th>                         
                         <th>Pax</th>                         
                         <th>From Date</th>
                         <th>To Date</th>
                         <th>Remarks</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody id="fit_tbdy">
                

                </tbody>
             </table>
             </div>
             <!--end: Datatable -->
         </div>
         <div class="tab-pane " id="m_tabs_1_2" role="tabpanel">
                <div style="overflow-x:auto;">
                <table class="table table-bordered table-hover table-checkable" id="" width:"100%">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>Quotaion No</th>                         
                            <th>Pax</th>                         
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Remarks</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="gp_tbdy">
                   
   
                   </tbody>
                </table>
                </div>
                <!--end: Datatable -->
            </div>
            </div>
     </div>
 
 </div>
 </div>
 
 @endsection @section('Page_Scripts') @parent
  <script>
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

                //  console.log(data);
               $('#fit_tbdy').html(data.table_data);


            }
        })
        }

        $(document).on('keyup','#txsrid',function () {

        var query = $(this).val();
        // var frd  =  $('#odid').val();
        //alert(frd);

        fetch_quotation_data(query);

        });


      $(document).ready(function() {
 
         
 
          fetch_quotation_data('');
 
      });



      function fetch_gpquotation_data(Gpquery = '') {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.getJSON({
                url:'{{Route('Gpquotation_livesearch')}}',
                method:'POST',
                data:{Gpquery:Gpquery},
                //dataType:'json',
                success:function (data) {

                    //  console.log(data);
                    $('#gp_tbdy').html(data.table_data);


                }
            })
            }

            $(document).on('keyup','#txsrid',function () {

            var Gpquery = $(this).val();
            // var frd  =  $('#odid').val();
            //alert(frd);

            fetch_gpquotation_data(Gpquery);

            });


            $(document).ready(function() {

            

            fetch_gpquotation_data('');

            });

      function qouteNewVersion(tour_id){

        swal({
            title: "Are you sure?",
            text: "You want to create a new version of this Quotation!",
            icon: "info",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
        
                    $.getJSON({
                        url:'{{Route('quotation_new_version')}}',
                        method:'POST',
                        data:{tour_id:tour_id},
                        //dataType:'json',
                        success:function (data) {

                              console.log(data);
                           $('tbody').html(data.table_data);
                            if(data=='added'){
                                
                                swal("New Version has been created!", {
                                  icon: "success",
                                });
                                fetch_quotation_data('');
                            }
        
                        }
                    })

               
                
            }
            });
      }
 
  </script>
 
 @endsection
