<table class="table table-sm table-bordered" width="100%">                                           
    <thead class="text-center table-secondary">
        <th width="5%">No</th>                                      
        <th width="90%">Hotel Name</th>
        
        
    </thead>                                            
    <tbody>
        @php
            $noofhotels=0;
        @endphp

    @foreach ($reservation_voucher_list_gp as $sup_id => $reserv)
        @php
            $noofhotels++;
        @endphp

        <tr class="table-secondary">
            <th rowspan="2" class="text-center">{{$noofhotels}}</th>
            <th width="65%">{{$reserv[0]->sup_s_name}}</th>            
        </tr>

        @php
        $rowCount_voucher =0;
        $voucher_no_vc=0;
        $Remarks_vc = '';
        $rates_vc = '';
        $condition_vc =1;
        $conf_to_vc = Auth::user()->name;
        $conf_by_vc = '';
        $conf_date_vc = '-';
        $noofPax_vc = 0;
        $client_name_vc ='';
        $status_vc =0;
        $Submited_AT ='-';
        $amnd_no ='-';

        foreach ($hasVoucher_list as $voucherheadDt) {
            
            if($reserv[0]->supid == $voucherheadDt->supplier_id){
                
                if($reserv[0]->status == $voucherheadDt->status){
                     
                     $voucher_no_vc = $voucherheadDt->hotel_voucher_no;
                     $Remarks_vc = $voucherheadDt->remarks;
                     $rates_vc = $voucherheadDt->rates;
                     $condition_vc = $voucherheadDt->condi;
                     $conf_to_vc = $voucherheadDt->user_name;
                     $conf_by_vc = $voucherheadDt->confirmed_by_name;
                     $conf_date_vc = $voucherheadDt->confirmed_date;
                     $noofPax_vc = $voucherheadDt->pax;
                     $client_name_vc = $voucherheadDt->client_name;
                     $status_vc = $voucherheadDt->status;
                     $Submited_AT = $voucherheadDt->created_at;
                     $amnd_no = $voucherheadDt->amnd;
                }
                
            }

        }
        
                 $state ='';
                 $state_name ='';
            
                 if($reserv[0]->status == 1){
                     $state ='brand';
                     $state_name = 'New';
                 }elseif($reserv[0]->status == 2){
                     $state ='metal';
                     $state_name = 'Pending';
                     // $state ='<span class="m-badge m-badge--metal m-badge--wide">Pending</span>';
                 }elseif($reserv[0]->status == 3){
                     $state ='success';
                     $state_name = 'Confirmed';
                     // $state ='<span class="m-badge m-badge--metal m-badge--wide"></span>';
                 }elseif($reserv[0]->status == 4){
                     $state ='danger';
                     $state_name = 'Canceled';
                     // $state ='<span class="m-badge m-badge--danger m-badge--wide">Canceled</span>';
                 }

    @endphp

        <tr>
            <td>
                <table class="table table-sm table-bordered" width="100%">
                    <thead>
                        <tr class="table-secondary text-center">
                            <th width="10%">Voucher No</th>
                            <th width="5%">Amendment</th>
                            <td width="30%">Client Name</td>
                            <th width="10%">Submitted At</th>
                            <th width="10%">Confirm Date</th>
                            <th width="15%">Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                             
                                <td>{{$voucher_no_vc}}</td>
                                <td>{{$amnd_no}}</td>
                                <td>{{$client_name_vc}}</td>
                                <td>{{$Submited_AT}}</td>
                                <td>{{$conf_date_vc}}</td>
                                <td>
                                        <span class="m-badge m-badge--{{$state}} m-badge--wide">{{$state_name}}</span>
                                </td>
                                <td>
                                <button type="button" class="btn btn-info m-btn btn-sm" data-toggle="modal" data-target="#m_modal_vch_{{$noofhotels}}">
                                        <span>
                                            <i class="fa fa-folder-open"></i>
                                            <span>Open</span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-danger m-btn btn-sm">
                                            <span>
                                                <i class="la la-times-circle"></i>
                                                <span>Cancel</span>
                                            </span>
                                    </button>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        
        {{-- @include('tour_section_bookings.components.hotel_voucher_view_modal') --}}
        

        @endforeach
    </tbody>
    
</table>
