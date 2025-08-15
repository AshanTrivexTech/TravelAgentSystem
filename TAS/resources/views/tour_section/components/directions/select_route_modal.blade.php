<style>
        /* .slmd-header{
               
               background-color: #282a3c;
               text-align: center;
        }
        .mdsp-header{
                padding-top: 5px;
                padding-left: 10px;
                text-align: center;
                color: white;
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
       
    } */

      </style>

<div class="modal" id="m_modal_6_route" tabindex="-1" role="dialog">
        <div class="slmd-main modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header slmd-header">
                                
                                    <span class="mdsp-header"><h6 class="mdsp-header">Select Route</h6></span>
                              
                                <input type="hidden" id="route_mod_hidden">
                                <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                                <i class="fa fa-close"></i>
                                </a>
                        </div>
                        <div class="modal-body slmd-body">
                                        <div class="form-group m-form__group row">
                                                 <div class="col-lg-4">
                                                  <label class="form-control-label">Enter Route Name/Code</label>                                                   
                                                  <input type="text" class="form-control m-input" placeholder="Search Route by Name/Code" id="search_route_txt">

                                                 </div>
                                              
                                        </div>
                                        <div style="overflow-x:auto; overflow-y:auto;">
                                                <table class="table table-bordered table-hover table table-sm" width="100%">
                                                       <thead>
                                                               <tr style="text-align: center;">
                                                                       <th width="6%">ID</th>
                                                                       <th width="10%">Route Code</th>
                                                                       <th width="20%">Starting Tag</th>
                                                                       <th width="54%">Route Name</th>                                                                                                                                                                                                          
                                                                       <th width="10%">Action</th>
                                                               </tr>  
                                                       </thead>
                                                       <tbody id="route_list_data">
                                                             
                                                       </tbody>
               
                                               </table>
                                              </div>
                        </div>
                        
        


                        <div class="footer">
                                &nbsp;
                                {{-- <button type="button" class="btn btn-success">Select</button> --}}
                        </div>
                </div>
        </div>
</div>
