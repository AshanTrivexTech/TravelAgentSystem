<div class="modal" id="m_modal_7" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="slmd-main modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header slmd-header">
                                
                                    <span class="mdsp-header" id="mod_title"><h6 class="mdsp-header" id="md_header_2"></h6></span>

                                <input type="hidden" id="mod_hidden_2">
                                <input type="hidden" id="sup_hid_pkgid" value="0">
                                <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                                <i class="fa fa-close"></i>
                                </a>
                        </div>
                        <div class="modal-body slmd-body">
                                <input type="hidden" id="model_date_2" value="">
                                        
                               <div>
                                    <table width="100%" class="table table-bordered table table-sm">
                                        <tbody>
                                        <tr class="table-danger">
                                            <th colspan="2">Compulsory Supliments :</th>
                                            <th colspan="2">
                                                    <input type="text" class="form-control form-control-sm">
                                            </th>
                                        </tr>
                                      <tr>  
                                          <td colspan="4">
                                        <div style="overflow-x:auto; overflow-y:auto;">
                                            <table class="table table-bordered table-hover table-sm" width="100%">
                                                    <thead>
                                                            <tr style="text-align: center;">
                                                                    <th width="6%">ID</th>
                                                                    <th>Code</th>
                                                                    <th>Description</th>
                                                                    <th>Rate Type</th>
                                                                    <th width="10%">Rate</th>
                                                                    <th width="6%">Currency</th>
                                                                    <th style="text-align: center;">1 {{$baseCurrncyCode}}</th>                                                                    
                                                                    <th width="20%">Validity Period</th>
                                                                    <th width="10%">Acction</th>
                                                            </tr> 
                                                    </thead>
                                                    <tbody id="cp_supliment_body">
                                                           
                                                    </tbody>
                                            </table>
                                        </div>
                                        </td>
                                    </tr>

                                    <tr class="table-warning">
                                        <th colspan="2">Optional Supliments :</th>
                                        <th colspan="2">
                                                <input type="text" class="form-control form-control-sm">
                                        </th>
                                    </tr>

                                    <tr>
                                        <td colspan="4">
                                                <div style="overflow-x:auto; overflow-y:auto;">
                                                <table class="table table-bordered table-hover table-sm" width="100%">
                                                        <thead>
                                                                <tr style="text-align: center;">
                                                                        <th width="6%">ID</th>
                                                                        <th>Code</th>
                                                                        <th>Description</th>
                                                                        <th>Rate Type</th>
                                                                        <th width="6%">Currency</th>
                                                                        <th width="10%">Rate</th>                                                                                                                                                                                                                                                                                      
                                                                        <th width="10%">Acction</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody id="op_supliment_body">
                                                                
                                                        </tbody>
                                                </table>
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                            <th style="text-align: right;" colspan="3">Total Compulsory :</th>
                                            <td style="text-align: right;">0.00</td>
                                    </tr>
                                    <tr>
                                                <th style="text-align: right;" colspan="3">Total Optional :</th>
                                                <td style="text-align: right;">0.00</td>
                                    </tr>
                                    <tr>
                                            <th style="text-align: right;" colspan="3">Total :</th>
                                            <td style="text-align: right;">0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                               </div>
                        </div>

                        <div class="slmd-footer">
                                {{-- &nbsp; --}}
                                <button type="button" class="btn btn-success" onclick="addSuplimentToList()" >Apply</button>
                            <span>&nbsp;</span>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>

                </div>
        </div>
</div>
