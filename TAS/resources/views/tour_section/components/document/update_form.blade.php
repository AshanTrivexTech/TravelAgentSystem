<form class="cleafix" method="POST" id="_tour" >
      
  <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            <div class="col-md-6">
                    <div  @if($tourQuotStatus==1) hidden @endif class="col-md-10">
                            <span class="m-badge m-badge--warning"></span>&nbsp;
                            <span class="m--font-warning"> &nbsp;&nbsp;You can only change this details before assign any Quotation details</span>
                    </div>
            </div>
        </div>   

        <div class="form-group m-form__group row">
               
              
            <div class="col-lg-4">
                <label class="form-control-label">
                    Market:
                </label>
                <div class="m-input-icon m-input-icon--right">
                <input type="text" disabled value="{{$tourQuotHeader->market_name}}" class="form-control m-input" id="market_v" name="market_v">
                    
                </div>                
            </div>

            <div class="col-lg-4">
                <label class="form-control-label">
                    Agent :
                </label>
                <input type="text" disabled value="{{$tourQuotHeader->ag_name}}" class="form-control m-input" id="t_agent" name="t_agent">
               
            </div>

              <div class="col-lg-4">
                <label class="form-control-label">
                    Branch :
                </label>
                <input type="text" disabled value="{{$tourQuotHeader->branch_code.'-'.$tourQuotHeader->branch_name}}" id="t_branch" name="t_branch" class="form-control m-input">
            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label class="form-control-label">
                    Number of Pax (Adult):
                </label>
                <input @if($tourQuotStatus !=1) disabled @endif  @if($tourQuotHeader->qtn_type ==2) disabled @endif type="number" value="{{$tourQuotHeader->pax_adult}}" class="form-control m-input num-only" placeholder="0"  id="no_of_packs_adult" name="no_of_packs_adult">
                <span class="m-form__help">		
				</span>
            </div>

            <div class="col-lg-4">
                <label class="form-control-label">
                Number of Pax (Children):
                </label>
                        <input @if($tourQuotStatus !=1) disabled @endif @if($tourQuotHeader->qtn_type ==2) disabled @endif id="no_of_packs_children" name="no_of_packs_children" type="number"  value="{{$tourQuotHeader->pax_child}}" class="form-control m-input num-only" placeholder="0" >               
                <span class="m-form__help">
					
				</span>
            </div>
           
            <div class="col-lg-4">
                <label class="form-control-label">
                 Tour Type:
                </label>
                <input disabled id="tourType" type="text"  value="{{$tourQuotHeader->tour_type_name}}" class="form-control m-input" placeholder="0" id="t_type" name="t_type">

            </div>
            
        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-3">
                <label class="form-control-label">
                    Start Date:
                </label>
            <input  disabled type="text" value="{{$tourQuotHeader->frm_date}}" class="form-control m-input" placeholder="Select date" id="start_date" name="start_date">
             
                <span class="m-form__help">

				</span>
            </div>

            <div class="col-lg-3">
                <label class="form-control-label">
                 End Date:
                </label>
                <input  name="end_date" disabled type="text" value="{{$tourQuotHeader->to_date}}" class="form-control m-input" placeholder="Select date" id="end_date">
               
                <span class="m-form__help">
					
				</span>
            </div>
            <div class="col-lg-6">
              
                {{-- <br><br>
                    <label class="form-control-label">
                     End Date:
                    </label>
                    
                    <label style="padding-left: 20px; margin-bottom: 0px; padding-top:0px;" class="m-checkbox m-checkbox--success">
                            <input id="row_chk" onchange="" type="checkbox">&nbsp;
                                    <span></span>
                    </label>                   
                    <span class="m-form__help">
                        
                    </span> --}}
                    {{-- <label class="form-control-label">
                            End Date:&nbsp;
                    </label> --}}
                   
                    
                    <div class="m-form__group form-group">
                            <label for="">Child Cost Applicable for</label>
                            <div class="m-checkbox-inline">
                                <label class="m-checkbox {{$chld_chk_cls}}" >
                                    <input @if($chk_chld_acmd==1)  checked @endif {{$chld_chk_attr}} id="child_accmd_chkb" type="checkbox"> Accommodation
                                    <span></span>
                                </label>
                                <label class="m-checkbox {{$chld_chk_cls}}">
                                    <input @if($chk_chld_trsp==1)  checked @endif {{$chld_chk_attr}} id="child_trp_chkb" type="checkbox"> Transport
                                    <span></span>
                                </label>
                                <label class="m-checkbox {{$chld_chk_cls}}">
                                    <input @if($chk_chld_guide==1)  checked @endif {{$chld_chk_attr}} id="child_guide_chkb" type="checkbox"> Guides
                                    <span></span>
                                </label>
                                <label class="m-checkbox {{$chld_chk_cls}}">
                                    <input @if($chk_chld_misc==1)  checked @endif {{$chld_chk_attr}} id="child_misc_chkb" type="checkbox"> Miscellaneous 
                                    <span></span>
                                </label>
                            </div>
                            {{-- <span class="m-form__help">Some help text goes here</span> --}}
                        </div>
                   
            </div>
        </div>
    <div class="form-group m-form__group row">
       
            
            <div class="col-lg-6">
                <label class="form-control-label">
                 Mark Up Rate:
                </label>
                <input @if($tourQuotStatus!=1) disabled @endif   name="commission_rate" id="commission_rate" type="text" value="{{$tourQuotHeader->com_rate}}" class="form-control m-input" placeholder="">
                
                <span class="m-form__help">
					
				</span>
            </div>
           
            <div class="col-lg-4">
                <label class="form-control-label">
                 Base Currency:
                </label>
                <input disabled name="base_currencies" id="base_currencies" type="hidden" value="{{$currency_tour}}" class="form-control m-input" placeholder="">
                <input disabled  name="base_currenciess" id="base_currenciess" type="text" value="{{$baseCurrncyCode}}" class="form-control m-input" placeholder="">
               
                <span class="m-form__help">
                    
                </span>
            </div>
            <div class="col-lg-2">
                <label class="form-control-label">
                 To LKR:
                </label>
                <input id="bc_toLKR" type="text"  value="{{$tourQuotHeader->bc_to_lkr}}" class="form-control m-input" placeholder="0.00"  name="bc_toLKR">

            </div>
        </div>
		
        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label class="form-control-label">
                    Remarks:
                </label>
                <textarea  @if($tourQuotStatus!=1) disabled @endif type="text"  class="form-control m-input" name="remarks" id="remarks" >{{$tourQuotHeader->remarks}}</textarea>

                <span class="m-form__help">
			
				</span>
            </div>
        </div>

        
       
    
    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                   
                <div class="col-lg-2">
                    {{-- @if($tourQuotStatus!=1) disabled @endif --}}
                    <button  class="btn btn-primary" type="button" id="frm_submit" >Save Quotation Details</button> 
                    
                </div>
                
            </div>
           
         
        </div>
    </div>
      
 </div>

 </form>



