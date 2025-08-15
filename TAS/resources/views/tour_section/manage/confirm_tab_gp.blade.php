{{-- <form class="cleafix" method="POST" action="">
    
        @php
           
        @endphp
        
        <div class="m-portlet__body">      
            <div class="row">
                <div class="col-md-6">
                    <div style="overflow-x:auto;">
                    <table width="100%" class="table table-bordered table-sm">
                            <thead style="text-align: center;">
                                <tr>
                                    <th class="table-success" colspan="4">Room Allocation</th>
                                </tr>
                                <tr>
                                    <th class="bg-secondary" width="30%">Number of Pax (Adult) :</th>
                                    <td width="20%">{{$tourQuotHeader->pax_adult}}</td>
                                    <th class="bg-secondary" width="30%">Number of Pax (Children)</th>
                                    <td width="20%">{{$tourQuotHeader->pax_child}}</td>
                                </tr>
                                <tr class="table-warning" >
                                    <th  colspan="2">Room</th><th colspan="2">Qty</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr>
                                    <th  colspan="2">Single Room</th>
                                    <td colspan="2">
                                    <input @if ($tourQuotHeader->qtn_type == 2) disabled @endif id="sgl_room_al" style="text-align: center;" value="{{$al_sgl}}" maxlength="4" class="form-control m-input sm numeric_only" type="text">    
                                    </td>                        
                                </tr>
                                <tr>
                                    <th colspan="2">Double Room</th>
                                    <td colspan="2">
                                            <input @if ($tourQuotHeader->qtn_type == 2) disabled @endif id="dbl_room_al" style="text-align: center;" value="{{$al_dbl}}" maxlength="4" class="form-control m-input sm numeric_only" type="text">        
                                    </td>                        
                                </tr>
                                <tr>
                                    <th colspan="2">Twin Room</th>
                                    <td colspan="2">
                                            <input @if ($tourQuotHeader->qtn_type == 2) disabled @endif id="twn_room_al" style="text-align: center;" value="{{$al_twn}}" maxlength="4" class="form-control m-input sm numeric_only" type="text">        
                                    </td>                        
                                </tr>
                                <tr>
                                    <th colspan="2">Trible Room</th>
                                    <td colspan="2">
                                            <input @if ($tourQuotHeader->qtn_type == 2) disabled @endif id="tbl_room_al" style="text-align: center;" value="{{$al_tbl}}" maxlength="4" class="form-control m-input sm numeric_only" type="text">    
                                    </td>                        
                                </tr>
                                <tr>
                                    <th colspan="2">Quadruple Room</th>
                                    <td colspan="2">
                                            <input @if ($tourQuotHeader->qtn_type == 2) disabled @endif id="qd_room_al" style="text-align: center;" value="{{$al_qd}}" maxlength="4" class="form-control m-input sm numeric_only" type="text">    
                                    </td>                        
                                </tr>
                            </tbody>
                    </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                    <div class="col-md-4">               
                           
                            <button @if($tourQuotStatus!=2) disabled @endif class="btn btn-brand m-btn m-btn--icon m-btn--wide" type="button" id="_b_final" >
                                    <span>
                                            <i class="la la-check-circle-o"></i>
                                            <span>&nbsp;Finalize Quotation</span>
                                    </span>
                            </button>
                                                   
                    </div>                  
            </div>
            <br>
            <div class="row">
                    <div class="col-md-4">
                            
                            <button @if($tourQuotStatus!=3&&$tourQuotConf!=1) disabled @endif    class="btn btn-success m-btn m-btn--icon m-btn--wide" type="button" id="_b_confirm" >
                                    <span>
                                            <i class="la la-check-circle-o"></i>
                                            <span>Confirm Quotation</span>
                                    </span>
                            </button>
                               
                    </div>
            </div>
        </div>
          </div>
          
          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-2">               
                           
                            <button @if ($tourQuotHeader->qtn_type == 2) disabled @endif onclick="save_roomAllocation()" class="btn btn-primary" type="button" >Save Room Allocation</button>
                       
                        </div>
                       
                       
                    </div>
                </div>
            </div>
    
        </div>
    </form> --}}