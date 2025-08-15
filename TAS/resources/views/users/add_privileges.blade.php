@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
						User Privileges
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
                                User
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{route('privilege_create',$id)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                                <span>
                                    Add
                                </span>
                            </span>
                        </a>
                        
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{route('user_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                        User ID:{{$id}} User Name:      User Type:
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
                                        <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
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
                
                <table class="table table-bordered table-hover" id="emp_tabel">
                    <thead>
    
                    <tr style="text-align: center">
    
                        <th>ID</th>
                        <th>Section Name</th>
                        <th>Description</th>
                        <th>Action</th>
    
                    </tr>
                    </thead>
                    <tbody id="emp_listGrid"> 
                               @foreach($user_list->all() as $user_lists)                         
                              <tr>  
                              
                               <td style="text-align: center">{{$user_lists->id}}</td>
                               <td style="text-align: center">{{$user_lists->section_name}}</td>
                               <td>{{$user_lists->description}}</td> 
                                {{-- <td style="text-align: center">
                                        {{-- @if($status == 1)
                                        <span class="m-badge m-badge--success m-badge--wide" id="active">Active</span>
                                        @else
                                        <span class="m-badge m-badge--danger m-badge--wide" id="inactive">In Active</span>
                                        @endif --}}
                                {{-- </td> --}}
                                <td style="text-align:center">
								{{-- <div class="col-3"> --}}
								<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                <label>
                                <input checked="checked" name="" type="checkbox" id="status" @if($user_lists->status==1) value=0  @endif>
                                <span></span>
                                </label>
                                </span>
								{{-- </div--}}
                                </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    
    </div>
    

@endsection @section('Page_Scripts') @parent

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
// $(document).ready( function(){ 

// //To hide the alert window on load the page
// $('.alert').hide();  

// //to close the alert window after popup 
// $('#notify_close').click(function(event){
//     $('.alert').hide();
// });

// submit the form
$("#status").change(function(event) {
        
        //setup Ajax token ( without this function cannot pass data to controller)
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });

        //form data to Variable
        
        var status=$('#status').val();
        var id='{{$id}}';
        //   

            //Send Ajax request 
            $.ajax({
            
                url: '{{Route('privilege_update')}}',
                method: "POST",
                data: {status:status,id:id},
                    success: function(data) {
                        
                    console.log(data);
                    //if Added 
                        if(data=='updated'){
                            $('.alert').hide();
                            
                        }else{
                            // pop up error
                                
                                //$('#emp_listGrid').append(data);
                                                            
                        }
                    
            
                 } 
             })


     
 });
// });
    

   </script>
        
<script src="{{ URL::asset('assets/demo/default/custom/components/datatables/base/html-table.js') }}" type="text/javascript"></script>
@endsection