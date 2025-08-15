<script>
	var route_day_id = 0;

	function addRoute(rtday){
		route_day_id = rtday;
	}

	function totalSum(){
			var noofDays = '{{$noOfDays}}';
			var countRw = parseFloat(noofDays);
			var totalSumKmlb=0;
			var totalSumKmtb=0;
			var i=0;
	
			//console.log(countRw);
	
			for(i=1; i<=countRw; i++){
	
				var lc_count = 0;
	
				$("#dist_"+i+" span").each(function(index) {
	
						lc_count++;				
				});
	
				if(lc_count <= 1){
					
					$('#tottb_'+i).prop('disabled', true);
					
				}else{
					$('#tottb_'+i).prop('disabled', false);
				}
				
				if(lc_count==0){
					
					$('#btn_rmall'+i).prop('disabled', true);
					$('#btn_rm'+i).prop('disabled', true);
					
					$('#add_route'+i).prop('disabled', false);	
				}else{
	
					$('#btn_rmall'+i).prop('disabled', false);
					$('#btn_rm'+i).prop('disabled', false);
					$('#add_route'+i).prop('disabled', true);
				}
				
				if(isNaN($('#totlb_'+i).val())==false){
	
					if(parseFloat($('#totlb_'+i).html()) != 0){
						totalSumKmtb+=  parseFloat($('#tottb_'+i).val());
					}
				}
	
				totalSumKmlb+= parseFloat($('#totlb_'+i).html());
			}
	
			//console.log(totalSumKmtb);
			
			$('#totlb_a').html(parseFloat(totalSumKmlb).toFixed(2));
			
			// var tour_milage = parseFloat('{{$totmilageTour}}');
			// var rounof = tour_milage-totalSumKmlb;

			// if(isNaN(rounof)==true){
			// 	rounof = 0;
			// }

			//$('#round_of').val(rounof.toFixed(2));
			
			var totalkml = parseFloat($('#round_of').val());
			
				
			if(isNaN(totalkml)==true){
				totalkml = 0;
			}

			//var totalkml = parseFloat($('#round_of').val());			
			$('#totlb').html(parseFloat(totalSumKmtb+totalkml).toFixed(2));
			
	}
	
	function removeLocation(id){
		var noofDays = '{{$noOfDays}}';
		var countRw = parseFloat(noofDays);
		var lc_count=0;
		var totalKm=0;
		var j=1;
		$("#dist_"+id+" span").each(function(index) {
	
			lc_count++;	
			totalKm += parseFloat($('#hdLC_id'+(j)+'_'+id).val());
			j++;
	
		});
		
		var thtotal = $('#hdLC_id'+lc_count+'_'+id).val()
			
		$('#totlb_'+id).html(parseFloat(totalKm-thtotal).toFixed(2));
		$('#tottb_'+id).val(parseFloat(totalKm-thtotal).toFixed(2));
	
		if(lc_count!=0){
			$('#i'+lc_count+'_'+id).remove();
			$('#sp'+lc_count+'_'+id).remove();
			$('#hdLC_id'+lc_count+'_'+id).remove();
			
			// $('#tottb_'+id).val('0.00')
			// $('#totlb_'+id).html('0.00')
		}else{
			//$('#'+id).prop('disabled', true);
		}
		totalSum();
	}
	
	function removeLocationAll(id){
		var noofDays = '{{$noOfDays}}';
		var countRw = parseFloat(noofDays);
		var lc_count=1;
		var totalKm=0;
		var j=1;
		
		$("#dist_"+id+" span").each(function(index) {
	
			
			
			$('#i'+lc_count+'_'+id).remove();
			$('#sp'+lc_count+'_'+id).remove();
			$('#hdLC_id'+lc_count+'_'+id).remove();
			
			lc_count++;	
		});
		
			$('#totlb_'+id).html('0.00');
			$('#tottb_'+id).val('0.00');		
	
		totalSum();
	}
	
	
	function OnChagedselect(id){
		
		//alert('asdsa');
		var locationId = $('#m_select2_'+id+'_dir').val();
		
		let dirDiv = $('#dist_'+id);
		var count_sp=0;
		
	
			//table tbody tr
		$("#dist_"+id+" span").each(function(index) {
	
			count_sp++;
	
		});
	
		
	
						var langs = [];
						var totalKm=0;                     
						var j=1;
						//count_sp=count_sp/2;
						//console.log(count_sp+1);
						
					   if(count_sp!= 0){					
						
	
						for(j=1; j < count_sp+1; j++){                      
							
							
							langs.push($('#hdLC_id'+(j)+'_'+id).attr('name'));
							totalKm += parseFloat($('#hdLC_id'+(j)+'_'+id).val());
						}	
					   }
						
						//console.log(totalKm);
					   
				var lc_id_last=0;
				var Last_B_location_id = 0;
		// alert(lc_id_last);
	
	
			
	
				if(count_sp!=0){
	
					lc_id_last = $('#hdLC_id'+(count_sp)+'_'+id).attr('name');
					if(count_sp >1){
						Last_B_location_id = parseInt($('#hdLC_id'+(count_sp-1)+'_'+id).attr('name'));
					}	
				}
								//alert(locationId);
					$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						}
					});
	
				$.getJSON({
						
						url: '{{Route('location_checkdistance')}}',
						method: "POST",
						data: {lc_id_last:lc_id_last,lc_id_next:locationId,langs:langs,llBid:Last_B_location_id},
						success: function(data) {
								
							   // console.log(data);

							   $('#totlb_'+id).html('0.00');
							   $('#tottb_'+id).val('0.00');
	
							if(lc_id_last==0){	
								dirDiv.append($('<span id="sp1_'+id+'" class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"></span>')
											.attr('title',data.location_name).html('<input id="hdLC_id1_'+id+'" value="0" type="hidden" name="'+data.id+'">'+data.location_code));
											dirDiv.append($('<i id="i1_'+id+'" name="'+data.location_code+'">&nbsp</i>'));
											totalSum();	

								$('#m_select2_'+id+'_dir').val('0').trigger("change");

							}else{
								if(lc_id_last !=data.id){
									
									var GrtotalKm = totalKm + data.distance;
									
									dirDiv.append($('<span id="sp'+(count_sp+1)+'_'+id+'" class="m-badge m-badge--secondary m-badge--wide m-badge--rounded"></span>')
											 .attr('title',data.location_name).html('<input id="hdLC_id'+(count_sp+1)+'_'+id+'" value="'+data.distance+'" type="hidden" name="'+data.id+'">'+data.location_code));	
											 dirDiv.append($('<i id="i'+(count_sp+1)+'_'+id+'" name="'+data.location_code+'" >&nbsp</i>'));
									
									$('#totlb_'+id).html(parseFloat(GrtotalKm).toFixed(2));
									$('#tottb_'+id).val(parseFloat(GrtotalKm).toFixed(2));
																
									$('#m_select2_'+id+'_dir').val('0').trigger("change");

									totalSum();
								}else{
										//alert('sorry');
								}
							}						
						}                                   
					})

		
								
	}
	
	

function addtoroute(route_id)
{		
	//alert(route_id);
		if(route_id!=0)
		{			

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});	
			$.getJSON({
			
			url: '{{Route('quotation_route_select_itinerary')}}',
			method: "POST",
			data: {intid:route_id,day_id:route_day_id},
			success: function(data) {
	
				//console.log(data.row_data);

			$('#add_route_id_'+route_day_id).val(route_id);	
			$('#dist_'+route_day_id).html(data.row_data);

			$('#totlb_'+route_day_id).html(parseFloat(data.tot_kms).toFixed(2));
			$('#tottb_'+route_day_id).val(parseFloat(data.tot_kms).toFixed(2));
			totalSum();								
			}                                   
		})
}


}
	
	$(document).ready(function() {
		
		$('.alert').hide();
				
				//to close the alert window after popup 
		$('#notify_close').click(function(event){
					$('.alert').hide();
		});
	
		$("input[type='text']").click(function (event) {
			   $(this).select();
		});
	
		
		totalSum();
		
	
	
		$('#save_direction').click(function(event){
			
			var noofDays = '{{$noOfDays}}';
			var countRw = parseFloat(noofDays);
			
			var dist_details = [];
			var dist_updatedkms = [];
			
			var i=0;
			var totalsp=0;
			
		 for(i= 1; i <=countRw; i++){
			 
			 var ttkmspd = 0;
			 var route_id_added = parseInt($('#add_route_id_'+i).val());
			 
			 if(isNaN(route_id_added)){
				route_id_added=0;
			 }

			 if(isNaN($('#totlb_'+i).val())==false){
				
				if(parseFloat($('#totlb_'+i).html()) != 0){
					ttkmspd =  parseFloat($('#tottb_'+i).val());
				}
				
			}

				
			dist_updatedkms.push({
				day_a:i,
				ttkms:ttkmspd,
				route_id_added:route_id_added
			});
			 
			 var count_spn = 1;		
			$("#dist_"+i+" span").each(function(index) {
				
				var lcId=0; 
				var lcnm=''; 
				var lccd=''; 
				var km = 0;
							
				lcnm = $('#sp'+count_spn+'_'+i).attr('title');
				lccd = $('#i'+count_spn+'_'+i).attr('name');
				lcId = $('#hdLC_id'+count_spn+'_'+i).attr('name');	
				km = $('#hdLC_id'+count_spn+'_'+i).val();	
	
				dist_details.push({
					day_b:i,
					pos: count_spn,
					location_id: lcId,
					lc_name: lcnm,
					lc_code: lccd,
					kms: km								                                               
				});		
			
				count_spn++;
				totalsp++;
			});	
			
			
		 }
		 
			// console.log(dist_updatedkms);
				var totalkm = parseFloat($('#totlb').html());
				var tourID = '{{$tourID}}';
				var tourVersion ='{{$tourVersion}}';
				var tourStDate = '{{$tourStDate}}';
				var qoutheaderId ='{{$tourQuotHeaderId}}';
				//alert(totalkm);
				if(totalsp == 0){
					$('.alert').show();
					$('#notify').html('Nothing to save');
	
				}else if(totalkm !=0){
	
				$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							}
						});
						
						$.getJSON({
							
							url: '{{Route('location_updatelocation')}}',
							method: "POST",
							data: {dist_details:JSON.stringify(dist_details),
								dist_updatedkms:JSON.stringify(dist_updatedkms),
								tourID:tourID,totalkm:totalkm,tourVersion:tourVersion,
								tourStDate:tourStDate,
								qoutheaderId:qoutheaderId},
							success: function(data) {
	
								//console.log(data);
	
								if(data=='saved'){
									$('.alert').hide();
									swal("Location Details Updated successfully!","Tour Code  :  {{$tourCode}}"+'', "success");
									//localStorage.setItem('activeTab', (tab_id+1));
									location.reload();
								}else{
									$('.alert').show();
									$('#notify').html(data);
								}
							}                                   
						})
				}else{
					$('.alert').show();
					$('#notify').html('Please Check the details before save.');
				}
	
		});
		//search_route_txt

function route_itn_search(sql_qry =''){

	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	}
	});

	  $.getJSON({
	  url:'{{Route('quotation_route_itinerary_search')}}',
		method:'POST',
		data:{querys:sql_qry},
		//dataType:'json',
		success:function (data) {

		//console.log(data);

		if(data=='no_data')
		{
		//    window.location.reload();
		}else{
			$('#route_list_data').html(data.table_data);
		}
	
	}
})


}

$(document).on('keyup','#search_route_txt',function () {

var queryq = $('#search_route_txt').val();
route_itn_search(queryq);

});

	route_itn_search('');
});	

// $('.newmpikdir').select2({
//   ajax: {
//     url: 'https://api.github.com/orgs/select2/repos',
//     data: function (params) {
//       var query = {
//         search: params.term,
//         page: params.page || 1
//       }

//       // Query parameters will be ?search=[term]&page=[page]
//       return query;
//     }
//   }
// });

$('.newmpikdir').select2({
    minimumResultsForSearch: 20 // at least 20 results must be displayed
});

	// var data = {
	// 	id: 1,
	// 	text: 'Barn owl'
	// };

	// var newOption = new Option(data.text, data.id, false, false);
	// $('.newmpikdir').append(newOption).trigger('change');

	</script>