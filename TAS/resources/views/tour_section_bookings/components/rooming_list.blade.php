<table class="table table-sm table-bordered" width="100%">
<thead>
     <tr style="text-align: center;">
             <th class="bg-secondary" colspan="10">Rooming List</th>
    </tr>
    <tr>
        <th style="text-align: right;" width="10%">
            Hotel Name :
        </th>
        <th width="90%" colspan="9">
            <select onchange="load_pkgs_rmlist()" id="rm_list_supid"  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                    <option value="0" selected>Please Select</option>
                    @foreach ($reservation_voucher_list_gp as $sup_id => $reserv)
                        <option value="{{$sup_id}}">{{$reserv[0]->sup_s_name}}</option>
                    @endforeach
            </select>
        </th>             
    </tr>
    <tr>
        <th style="text-align: right;" width="10%">
                    Package :
        </th>
        <td width="90%" colspan="9">
            <table width="100%">
                <thead>
                    <tr style="text-align: center;">
                            <th width="4%">
                                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                                            <input id="" onchange="" type="checkbox" >&nbsp;
                                                    <span></span>
                                    </label>
                            </th>
                            <th width="5%">No</th>
                            <th width="60%">Description</th>
                            <th width="10%">Date</th>                                         
                            <th width="4%">MP</th>
                            <th width="4%">SGL</th>
                            <th width="4%">DBL</th>
                            <th width="4%">TWIN</th>
                            <th width="4%">TBL</th>
                            <th width="4%">&nbsp;QD&nbsp;</th>
                            
                    </tr>
                </thead>
                <tbody id="pkg_tbody_rmlst">
                    
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="bg-secondary">
        <th width="70%" style="text-align: center;" colspan="7">Guest Details</th>
        <th style="text-align: center;" width="8%">
            Passport No :
        </th>
        <th style="text-align: center;" width="12%">
                <input type="text" style="text-align: center;" class="form-control form-control-sm" value="">
        </th>
        <th style="text-align: center;" width="10%">
                <button type="button" class="btn btn-success m-btn m-btn--icon" data-toggle="modal" data-target="#m_modal_6">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Select Guest&nbsp;</span>
                        </span>
                </button>
        </th>
    </tr>
    <tr>
        <td colspan="10">
            <table width="100%">
                <thead>
                    <tr style="text-align: center;">
                            <th width="5%">No</th>
                            <th width="20%">Guest Name</th>                           
                            <th width="70%">Remarks</th>
                            <th width="05%">Action</th>
                    </tr>
                </thead>
                   <tbody id="clients_tbody_rmlst">
                        {{-- <tr>
                                <td style="text-align: center;">01</td>
                                <td>Mr.Jhone smith</td>
                                <td>
                                     <textarea class="form-control m-input" id="" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">test remarks</textarea>
                                </td>
                                <td style="text-align: center;">
                                    
                                     <button type="button"
                                     class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" 
                                     title="Remove">
                                     <i class="la la-trash"></i>
                                     </button>
                                </td>
                         
                            </tr> --}}
                       
                   </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr class="bg-secondary" >
            {{-- <td colspan=""></td> --}}
            <td style="text-align: right; white-space: nowrap; overflow: hidden;" colspan="10">
                    
                            <button onclick="" type="button" class="btn btn-primary m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-level-up"></i>
                                        <span>Submit</span>
                                    </span>
                            </button>
                            {{-- {{Route('reservation_voucher_accmd',$voucher_no_vc)}} --}}
                            <a href="" type="button" class="btn btn-warning m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-print"></i>
                                        <span>Print</span>
                                    </span>
                            </a>
                            
                            <button type="button" class="btn btn-info m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-floppy-o"></i>
                                        <span>Save PDF</span>
                                    </span>
                            </button>
                            {{-- <button type="button" class="btn btn-success m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-calendar-check-o"></i>
                                        <span>Confirm</span>
                                    </span>
                            </button> --}}
                            <button type="button" class="btn btn-danger m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-times-circle"></i>
                                        <span>Cancel</span>
                                    </span>
                            </button>
                    
            </td>
    </tr>
</thead>
</table>
