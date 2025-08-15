<style>
        .slmd-header{
               
               background-color:cadetblue;
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
        /* color:#fff; */
        /* vertical-align: middle; */
        /* padding: 1.5em; */
    }

      </style>

     

<div class="modal" id="m_modal_10" tabindex="-1" role="dialog">
        <div class="slmd-main modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header slmd-header">
                                
                                    <span class="mdsp-header" id="qk_mod_title"><h5 class="mdsp-header">Report Error</h5></span>

                                <input type="hidden" id="mod_hidden">
                                <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-dismiss="modal">
                                                <i class="fa fa-close"></i>
                                </a>
                        </div>
                        <div class="modal-body slmd-body">
                                <input type="hidden" id="model_date" value="">
                                {{-- <div id="qk_alert_con" class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Warning!</strong><div id="qk_notify_con"></div>
                                        <button type="button" class="close" id="qk_notify_close_con">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                </div> --}}
                                        <div class="form-group m-form__group row">
                                                <div class="col-md-12">
                                                <label class="form-control-label">
                                                       Remarks :
                                                </label>
                                                <textarea placeholder="Enter Remarks" id="des" name="des" class="form-control" cols="50" rows="7" ></textarea> 

                                                </div>
                                                                                               
                                                                                                
                                        </div>
                                        
                        </div>
                        
                        <div class="slmd-footer">
                                 {{-- &nbsp; --}}
                                <button type="button" class="btn btn-success" onclick="" >Submit</button>
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                </div>
        </div>
</div>
