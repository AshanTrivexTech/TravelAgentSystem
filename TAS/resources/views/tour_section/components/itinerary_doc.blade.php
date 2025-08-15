<style>
        .tr_itn {
            /* border: 1px solid gray; */
            padding: 8px;
        }
        
        .itn_head {
            text-align: center;
            text-transform: uppercase;
            color: #4CAF50;
        }
        
        .p_itn {
            text-indent: 50px;
            text-align: justify;
            /* letter-spacing: 2px; */
        }
                
</style>
<form class="cleafix" method="POST" id="_tour" >
      
        <div class="m-portlet__body">
          
      
              <div class="form-group m-form__group row">
                    
                  <div class="col-lg-10">
                        
                        
                    <table class="table-sm" width="100%">
                        <thead>
                            <tr>
                            <th class="itn_head" style="text-align: center; padding-bottom: 25px;" colspan="2"><h3><u>{{$tourQuotHeader->title}}</u></h3></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($itenery_data as $int_items)

                            @php
                                
                                $firts_tag =0;
                            @endphp
                            <tr>
                            <th width="10%"><strong>DAY {{sprintf("%02d", $int_items->tour_day)}}</strong></th>
                                <th width="90%">
                                    <strong>
                                            @foreach ($LocationDtList_gp as $day => $LcDist)

                                            @if($day == $int_items->tour_day)
                                                        
                                                        @foreach ($LcDist as $Dist)
                                                            @php
                                                                $firts_tag++;
                                                                
                                                            @endphp                                              
                                                             @if ($firts_tag !=1)
                                                                    &nbsp;/&nbsp;
                                                             @endif
                                                             {{$Dist->lc_name}}
                                                        @endforeach
                                                
                                            @endif
                                    @endforeach                                                                        
                                    </strong>
                                </th>
                            </tr>
                            <tr class="tr_itn">
                            <td>{{date_format(date_create($int_items->tour_date),'d/m/y')}}</td>
                                <td>
                                    <p class="p_itn">
                                        {{$int_items->dec}}
                                    </p>
                                </td>
                            </tr>

                            @endforeach
                                                       
                        </tbody>
                    </table>                   

                  </div>
      
              </div>
      
          
          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
              <div class="m-form__actions m-form__actions--solid">
                  <div class="row">
                         
                      <div class="col-lg-2">
                          
                          {{-- <button class="btn btn-primary" type="button" >Save Quotation Details</button>  --}}
                          
                      </div>
                      
                  </div>
                 
               
              </div>
          </div>
            
       </div>
      
       </form>
      
      
      
      