<form class="cleafix" method="POST">

        <div style="overflow-x:auto;">
               <table class="table table-bordered" width:"100%">                  
                       <thead style="text-align: center;" >
                               <tr>
                                   <td>
                                         <strong>Guides Details</strong>
                                   </td>
                               </tr>
                       </thead>
                        <tbody>  
                              
                            @for ($i = 1; $i <= $noOfDays; $i++)
                                
                                    @php
                                    
                                        $date = date('Y-m-d', strtotime($frmdate. ' + '.($i-1).' days'));
                                        

                                    @endphp

                        <tr  id="gmtr_{{$i}}" >                                                                     
                                   
                                    <td>                                        
                                        
                                        <div style="text-align: left;">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">

                                                    <tr  style="text-align: center;">

                                                            <th style="text-align: center;" width="32%"> 
                                                                    <Strong>Day &nbsp;&nbsp;{{$i}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$date}}   </Strong>                                        
                                                            </th> 

                                                            <th width="8%">
                                                                <select class="form-control m-bootstrap-select m_selectpicker sm" data-live-search="true">
                                                                    <option value="0">Select Guide Type</option>
                                                                </select>

                                                            </th>

                                                            <th colspan="6" width="54%">
                                                                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                                                                   <option value="0">Select Guide Name</option>
                                                                </select>       
                                                            </th>
                                                                                                                                                                                 
                                                            <th  width="6%">
                                                                    <button type="button" class="btn btn-success m-btn btn-sm m-btn--icon">
                                                                            <span>
                                                                                <i class="la la-plus"></i>
                                                                                <span>Add</span>
                                                                            </span>
                                                                    </button>
                                                            </th>
                                                    </tr>

                                                </thead>
                                                <tbody id="gdttb_{{$i}}">
                                                    
                                                    @if ($i ==1)
                                                        
                                                    
                                                        <tr style="text-align: center;">
                                                            
                                                                <td>Guide Name</td>
                                                                <td>Guide type</td>
                                                                <td width="10%">
                                                                        Guide fee :
                                                                        <input style="text-align: center;" type="text" class="form-control m-input sm">
                                                                </td>
                                                                <td>
                                                                    Hotel Name
                                                                    <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                                                                        <option value="0">Hotel Name</option>
                                                                       
                                                                        
                                                                     </select>
                                                                </td>                                                               
                                                                
                                                                <td>
                                                                    Room Type
                                                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                                                                                <option value="0">Room Type</option>
                                                                             </select>
                                                                </td>
                                                                <td width="12%">
                                                                    C.P
                                                                    <input disabled style="text-align: center;" type="text" value="USD" class="form-control m-input sm">
                                                                </td>
                                                                
                                                                <td width="12%">
                                                                        Rate
                                                                    <input style="text-align: center;" type="text" class="form-control m-input sm">
                                                                </td>
                                                                
                                                                <td width="12%">
                                                                        Commission
                                                                         <input style="text-align: center;" type="text" class="form-control m-input sm">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                        <button type="button" class="btn btn-danger m-btn btn-sm m-btn--icon">
                                                                                <span><i class="la la-trash"></i>
                                                                                    <span>Remove</span>
                                                                                </span>
                                                                        </button>
       
                                                                </td>
    
                                                            </tr>
                                                        @endif
                                                
                                                </tbody>
                                            </table>
                                                                                       
    
    
                                        </div>   
                                         
                                    
                                    </td>
                                    
                                  
                            
                           </tr>
                              
                               
                          
                            
                                
                                

                            @endfor
                           
                           
                        </tbody>
                            
               </table>
           </div>
          
           <br>
                   <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                           <div class="m-form__actions m-form__actions--solid">
                               <div class="row">
                                   <div class="col-lg-2">
                                   
                                       <button class="btn btn-primary" type="button" onclick="save_Hotels()" id="save_direction" >Save Hotels Details</button>
                                   
                                   </div>
                               </div>
                           </div>
                   </div>
           
       </form>


     
     