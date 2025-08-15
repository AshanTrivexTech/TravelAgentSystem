<script>
function load_pkgs_rmlist(){

var sup_id_rmlst = parseInt($('#rm_list_supid').val());
var tour_id_rmlst = '{{$tourID}}';
//alert(sup_id_rmlst);
if(sup_id_rmlst >0){
    
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('reservation_find_rmlst_pkgs')}}',
                method: "POST",
                data: {tour_id:tour_id_rmlst,sup_id:sup_id_rmlst},
                success: function(data) {
                        
                    console.log(data);
                    $('#pkg_tbody_rmlst').html(data);
                   
                }                                   
        })
}

}

function pkgs_modela_rmlst_search(){

var sql_qry = $('#search_guest_mddata_txt').val();
var tour_id_rmlst = '{{$tourID}}';

    
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.getJSON({ 
                
                url: '{{Route('reservation_search_rm_list_data')}}',
                method: "POST",
                data: {tour_id:tour_id_rmlst,sql_qry:sql_qry},
                success: function(data) {
                        
                    console.log(data);
                    $('#modal_guest_rm_list_data').html(data);
                   
                }                                   
        })


}

pkgs_modela_rmlst_search();

function add_clients_to_lst(){
    var cl_row_mdCount = 0;
    var output_guestData = '';
    var adtoRowCount =0;
    $('clients_tbody_rmlst tr').each(function(index) {
        
        adtoRowCount++;
    
    });

    $('#modal_guest_rm_list_data tr').each(function(index) {
        cl_row_mdCount++;
        if($('#rm_guetsmd_chk_'+cl_row_mdCount).prop('checked')==true){
            adtoRowCount++;
            
            var guestid = parseInt($('#guest_id_'+cl_row_mdCount).val());
            var guestName = $('#guest_name_'+cl_row_mdCount).html();
            var guestRemarks = $('#guest_remarks_'+cl_row_mdCount).html();

            output_guestData+=' <tr class="rmv_guestRow_'+adtoRowCount+'">'+
                                    '<td class="rmv_guestRow_'+adtoRowCount+'" style="text-align: center;">'+adtoRowCount+'</td>'+
                                    '<input class="rmv_guestRow_'+adtoRowCount+'" id="guest_added_id_'+adtoRowCount+'" type="hidden" value="'+guestid+'">'+
                                    '<td class="rmv_guestRow_'+adtoRowCount+'">'+guestName+'</td>'+
                                    '<td class="rmv_guestRow_'+adtoRowCount+'">'+
                                            '<textarea class="form-control m-input rmv_guestRow_'+adtoRowCount+'" id="guest_added_rmk_'+adtoRowCount+'" style="margin-top: 0px; margin-bottom: 0px; height: 40px;">'+guestRemarks+'</textarea>'+
                                    '</td>'+
                                    '<td class="rmv_guestRow_'+adtoRowCount+'" style="text-align: center;">'+                               
                                            '<button onclick="remove_rm_lst_guest('+adtoRowCount+')" type="button"'+
                                            'class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only rmv_guestRow_'+adtoRowCount+'" title="Remove">'+                                
                                            '<i class="la la-trash rmv_guestRow_'+adtoRowCount+'"></i>'+
                                            '</button>'+
                                    '</td>'+                    
                                '</tr>';
        }

    });

    $('#clients_tbody_rmlst').html(output_guestData);

    //alert(cl_row_mdCount);
}


function remove_rm_lst_guest(rowId_guest){

    var count_added = 0;
    $('#clients_tbody_rmlst tr').each(function(index) {
        
        count_added++;
    
    });

    // alert(count_added);    
    
    
    if(count_added == rowId_guest){
       
        $('.rmv_guestRow_'+rowId_guest).remove();
        
    }else{
        //alert('Sorry! You cannt remove this item');
        swal("Sorry! you cannot remove this row without remove last row.",""+'', "error");
    }
    
}

</script>