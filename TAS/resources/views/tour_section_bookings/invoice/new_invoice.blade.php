@extends('layouts.tas_app') 
@section('content')
@php
    
    $noOfDays = ($tourQuotHeader->Days)+1;
	$frmdate = $tourQuotHeader->frm_date;
	$tourCode = $tourQuotHeader->tour_code;
	$tourID = $tourQuotHeader->tour_id;
	$tourVersion =$tourQuotHeader->version_id;
	$tourStDate = $tourQuotHeader->frm_date;
    $tourEnDate = $tourQuotHeader->to_date;
    
@endphp
 
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                        INVOICE 
            </h3>
           
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
                           
                              
                            Tour Code : {{$tourCode}}
                            
                       </h3>
                </div>
              
            </div>

            <div class="m-portlet__head-tools">
                        <a href="{{route('load_dashboard',$tourID)}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-angle-left"></i>
                                <span>
                                    Back
                                </span>
                            </span>
                        </a>
            </div>

        </div>
        
        <div class="m-portlet__body">
                       
                <div class="form-group m-form__group row">
                    <div class="col-sm-12">
                       
                                    <table class="table table-bordered table-hover" width="100%">
                                        <thead>                                            
                                                <tr style="text-align: center;">
                                                        <th class="bg-secondary" colspan="5" style="font-size:15px;">INVOICE</th>
                                                </tr>
                                                <tr style="text-align: center;">
                                                    <th style="text-align: right;">Invoice to &nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                                    <th></th>
                                                    <th style="text-align: right;">Currency &nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr style="text-align: center;">
                                                    <th>Select Item :</th>
                                                    <th>
                                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                                                            
                                                            {{--  @foreach ($tourQuotHeader as $tourQuotHeader_item)  --}}
                                                            
                                                                <option value="{{$tourQuotHeader->tour_id}}">{{$tourQuotHeader->title}}</option>
                                                            
                                                            {{--  @endforeach  --}}
                                                            
                                                        </select>
                                                    </th>
                                                    <th>
                                                            <button onclick="add_to_list()" type="button" class="btn btn-success m-btn m-btn--icon">
                                                                    <span>
                                                                        <i class="la la-plus"></i>
                                                                        <span>Add</span>
                                                                    </span>
                                                            </button>
                                                    </th>
                                                    <th></th>
                                                </tr>
                                                <tr class="bg-secondary" style="text-align: center;">
                                                    <th width="8%">NO</th>
                                                    <th width="64%">Description</th>
                                                    <th width="8%">PAX</th>
                                                    <th width="10%">Rate</th>
                                                    <th width="10%">Total</th>
                                                </tr>
                                        </thead>
                                        <tbody id="inv_body">

                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">&nbsp;</td>
                                            </tr>
                                            <tr class="bg-secondary">
                                                
                                                    <th style="text-align: right;" colspan="4"><strong>Net Total &nbsp;&nbsp;:&nbsp;&nbsp;</strong></th>
                                                    <td style="text-align: right;" >
                                                        <strong>
                                                            <label id="inv_total">00.00</label>
                                                        </strong>
                                                    </td>
                                                
                                            </tr>
                                            <tr>
                                                    <td colspan="5">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                 <td colspan="5">
                                                        <div class="form-group m-form__group">
                                                                <label for="exampleTextarea"><strong>Remarks:</strong></label>
                                                                <textarea class="form-control m-input" id="remarks_1" style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                                                        </div>
                                                 </td>
                                            </tr>
                                            <tr class="bg-secondary">
                                                
                                                        <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="12">
                                                                
                                                                <button  type="button" class="btn btn-primary m-btn m-btn--icon">
                                                                        <span>
                                                                            <i class="la la-level-up"></i>
                                                                            <span>Proceed Invoce</span>
                                                                        </span>
                                                                </button>
                                                                
                                                                <a href="" disabled type="button" class="btn btn-warning m-btn m-btn--icon">
                                                                        <span>
                                                                            <i class="la la-print"></i>
                                                                            <span>Print Invoice</span>
                                                                        </span>
                                                                </a>
                                                                
                                                                <button onclick="save_as_pdf()" disabled="" type="button" class="btn btn-info m-btn m-btn--icon">
                                                                        <span>
                                                                            <i class="la la-floppy-o"></i>
                                                                            <span>Save as PDF</span>
                                                                        </span>
                                                                </button>                                                             
                                                                                                               
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>                               
                           
                    </div>      
                                                                      
             </div>                    
                
             <div class="form-group m-form__group row">
                    <div class="col-sm-12">
                       
                                    <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                    <th class="bg-secondary" colspan="7" style="font-size:15px;">INVOICE HISTORY</th>
                                            </tr>
                                            <tr class="table-secondary" style="text-align: center;">
                                                <th width="8%">Amended</th>
                                                <th width="10%">Invoice No</th>
                                                <th width="10%">Proceed Date Time</th>
                                                <th width="15%">Net Total Amount</th>
                                                <th width="35%">Remarks</th>
                                                <th width="10%">User</th>                                                    
                                                <th width="12%">Status</th>                                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: left;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: right;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: right;"></td>
                                                <td style="text-align: center;"></td>
                                                

                                            </tr>
                                        </tbody>
                                        
                                        
                                    </table>                               
                           
                    </div>      
                                                                      
             </div>  
       </div>
                   
       
        </div>
    </div>

</div>
@endsection @section('Page_Scripts') @parent
@include('tour_section_bookings.js.agen_inv_js')

@endsection
