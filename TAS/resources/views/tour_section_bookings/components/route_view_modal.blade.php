{{-- @extends('layouts.tas_app') 
@section('content') --}}
{{-- @php
    
    $noOfDays = ($tourQuotHeader->Days)+1;
	$frmdate = $tourQuotHeader->frm_date;
	$tourCode = $tourQuotHeader->tour_code;
	$tourID = $tourQuotHeader->tour_id;
	$tourVersion =$tourQuotHeader->version_id;
	$tourStDate = $tourQuotHeader->frm_date;
    $tourEnDate = $tourQuotHeader->to_date;
    $total=0;
@endphp --}}
<style>
    .slmd-header{
           
           background-color: #282a3c;
           text-align: center;
    }
    .mdsp-header{
            padding-top: 5px;
            padding-left: 10px;
            text-align: center;
            color: white;
    }
   .slmd-body{
           /* background-color: #f4f5f6; */
   }
   .slmd-footer{
           display: flex;
           align-items: center;
           justify-content: flex-end;
           padding: 10px;
           border-top: 1px solid #e9ecef;
   }
   .slmd-main{
           max-width: 1200px;
           margin: 1.75rem auto;
   }
   .center-text{
    text-align: center;
   }

  tr.selectedTr {
    background-color: lightskyblue;
}

  </style>
<div class="modal" id="m_modal_1" tabindex="-1" role="dialog">
    <div class="slmd-main modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header slmd-header">
                            <input type="hidden" id="mod_hidden">
                            <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                            <i class="fa fa-close"></i>
                            </a>
                    </div>
                    <div class="modal-body slmd-body">
                        
                                    
                    </div>
                    
            </div>
    </div>
</div>


{{-- @endsection --}}
