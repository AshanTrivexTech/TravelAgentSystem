@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<section id="routedata">
<div class="m-subheader ">  
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
			
				@if($tourQuotHeader->confirmed==1) Tour Booking 
				@else
				Tour Quotations 
				@endif
				</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/dashboard" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>   
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                   
                        <span class="m-nav__link-text">
							Tour Manager
						</span>
                   
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
							Tour Quotation
						</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    
                        <span class="m-nav__link-text">
							Manage Tour Quotation
						</span>
                    
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
			<a href="{{Route('quotation_index')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
						<i class="la la-angle-left"></i>
							<span>
								Back
							</span>
                    </span>
                </a>
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div> 
</div>
</section>
<!-- END: Subheader -->
<?php 

	$currency_tour=$tour_currency->id;
    $noOfDays = ($tourQuotHeader->Days)+1;
	$frmdate = $tourQuotHeader->frm_date;
	$tourCode = $tourQuotHeader->tour_code;
	$tourID = $tourQuotHeader->tour_id;
	$tourVersion =$tourQuotHeader->version_id;
	$tourStDate = $tourQuotHeader->frm_date;
	$tourEnDate = $tourQuotHeader->to_date;
	$tourQuotHeaderId = $tourQuotHeader->id;
	$basecomisionRate = $tourQuotHeader->com_rate;
	$baseCurrncyCode  = $tourQuotHeader->cr_code;
	$totmilageTour = $tourQuotHeader->millage;
	$totaladltPax = $tourQuotHeader->pax_adult;
	$totalChildPax = $tourQuotHeader->pax_child;
	$cur_id= $tourQuotHeader->cur_id;
	
	$gp_paxSltCount=0;
	
	if($tourQuotHeader->qtn_type==2){
		$gp_paxSltCount = $gp_vehivletypeDataSaved->count();
	}


	$tourQuotStatus = $tourQuotHeader->status;
	$tourQuotConf=$tourQuotHeader->confirmed;
	$taxCount = count($Taxs_lisl);

	$ttlRowkms_sm = 0;
                                    
    $gude_fee_day = 0;
    $gude_Acm_day = 0;
    $guidebsRate_sm =0;

    $totHtp_sgl_rate = 0;
    $totHtp_dbl_rate = 0;
    $totHtp_trb_rate = 0;
    $totHtp_qd_rate = 0;

    $totalHotelCost_sm = 0;
    $totalHotelMarkup_sm = 0;
                                    
    $totTrp_Cost_sm = 0;
    $totTrp_Mkp_sm = 0;

    $totMisc_Cost_sm = 0;
    $totMisc_Mkp_sm = 0;

    $totGuideCost = 0;
	$totGuideMarkup = 0;
	$ttype=$tour_types->tour_type;

	 $chld_chk_cls = 'm-checkbox--disabled';
                        $chld_chk_attr = 'disabled';
                        
                        $chk_chld_acmd = 0;
                        $chk_chld_misc = 0;
                        $chk_chld_guide = 0;
                        $chk_chld_trsp = 0;


                        if($totalChildPax>0){
                            $chld_chk_cls = '';
                            $chld_chk_attr='';

                            $chk_chld_acmd = $tourQuotHeader->child_chk_accmd;
                            $chk_chld_misc = $tourQuotHeader->child_chk_misc;
                            $chk_chld_guide = $tourQuotHeader->child_chk_guide;
                            $chk_chld_trsp = $tourQuotHeader->child_chk_trsp;
                        }

	
?>

<div class="m-content">

		<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong><div id="notify"></div>
                <button type="button" class="close" id="notify_close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>

<div class="m-portlet">
<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												
																<h3 class="m-portlet__head-text m--font-info">
																	Tour Code &nbsp;:&nbsp;{{$tourQuotHeader->tour_code}} <span style="text-transform: uppercase;"></span> 
																</h3>
														
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																<h3 class="m-portlet__head-text m--font-success">
																	Tour Title &nbsp;:&nbsp;{{$tourQuotHeader->title}}
																</h3>
												
											</div>
										</div>
									</div>
									
									<div class="m-portlet__body">
										<ul class="nav nav-pills" role="tablist">
										
											<li class="nav-item">
												<a id="tab_index_1" onclick="change_tab(1)" class="nav-link active show" data-toggle="tab" href="#m_tabs_3_1">
													<i class="la la-file-archive-o"></i>
													Quotation
												</a>
											</li>
										
											<li class="nav-item">
													<a id="tab_index_2" onclick="change_tab(2)" class="nav-link" data-toggle="tab" href="#m_tabs_3_2">
														<i class="la la-bars"></i>
														Accommodation/Guides & Miscellaneous
													</a>
											</li>
																															
											<li class="nav-item">
													<a id="tab_index_3" onclick="change_tab(3)" class="nav-link" data-toggle="tab" href="#m_tabs_3_3">
														<i class="la la-file-text"></i>
														Summary
													</a>
											</li>

											@if ($tourQuotHeader->qtn_type == 2)
												<li class="nav-item">
													<a id="tab_index_4" onclick="change_tab(4)" class="nav-link" data-toggle="tab" href="#m_tabs_3_4">
														<i class="la la-file-text"></i>
														Group Summary

													</a>
												</li>
											@endif

												<li class="nav-item">
													<a id="tab_index_5" onclick="change_tab(5)" class="nav-link" data-toggle="tab" href="#m_tabs_3_5">
														<i class="la la-file-word-o"></i>
														Itinerary

													</a>
												</li>
												<li class="nav-item">
													<a id="tab_index_6" onclick="change_tab(6)" class="nav-link" data-toggle="tab" href="#m_tabs_3_6">
														<i class="la la-file-word-o"></i>
														Confirmation
													</a>
												</li>
											
										</ul>

										<div class="tab-content">
											
											<div class="tab-pane active" id="m_tabs_3_1" role="tabpanel"> 
												@include('tour_section.components.document.update_form')
											</div>

											<div class="tab-pane" id="m_tabs_3_2" role="tabpanel">
                                                            
                                                    	@include('tour_section.components.directions.add_form')
                                                   
                                                    <section id="accmddata">
                                                            <br>
                                                            
                                                        <div class="m-separator m-separator--dashed m-separator--lg"></div>
														@include('tour_section.components.hotels.add_form')
													@if($quickQtMode==1)
														@include('tour_section.quick_quote.create_Contract')
														{{-- @include('tour_section.quick_quote.create_conQuick_js') --}}
													@endif
                                                    </section>

                                                    <section id="guidesdata">
                                                            <br>
                                                            
													<div class="m-separator m-separator--dashed m-separator--lg"></div>
															@if ($tourQuotHeader->qtn_type == 1)

																@include('tour_section.components.guides.add_form')

															@elseif($tourQuotHeader->qtn_type == 2)
																
																@include('tour_section.components.guides.gp_guide_form')

															@endif
                                                    </section>

                                                    <section id="transportdataui">
                                                                                                                     
                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
														@if ($tourQuotHeader->qtn_type == 1)
															@include('tour_section.components.transport.add_form')														
														@elseif($tourQuotHeader->qtn_type == 2)
															@include('tour_section.components.transport.add_gp_trans')
														@endif
                                                    </section>

                                                    <section id="micsdataui">
                                                                                                                                                                 
                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                                        @include('tour_section.components.miscellaneous.add_form')
                                                    </section>
											</div>
																														
											<div class="tab-pane" id="m_tabs_3_3" role="tabpanel">
												@include('tour_section.components.summary.view')
											</div>
												@if ($tourQuotHeader->qtn_type == 2)
													<div class="tab-pane" id="m_tabs_3_4" role="tabpanel">
														@include('tour_section.quick_quote.gp_summary')
													</div>
												@endif
											<div class="tab-pane" id="m_tabs_3_5" role="tabpanel">
												@include('tour_section.components.itinerary_doc')
											</div>

											<div class="tab-pane" id="m_tabs_3_6" role="tabpanel">
												@include('tour_section.manage.confirm_tab')
											</div>

										</div>
									</div>
</div>

</div>

@endsection 
@section('Page_Scripts') @parent

@include('tour_section.components.document.quotation_update_js')
@include('tour_section.manage.js_script.route_js')
@include('tour_section.components.hotels.hotels_js')
@include('tour_section.components.hotels.hotel_select_modal_js')
@include('tour_section.components.guides.guide_js')
@include('tour_section.components.transport.transport_js')
@include('tour_section.components.miscellaneous.misc_js')
@include('tour_section.components.summary.summary_js')
@include('tour_section.components.hotels.create_contract_js')

@if($quickQtMode==1)
 @include('tour_section.quick_quote.create_conQuick_js')
@endif

@if ($tourQuotHeader->qtn_type == 2)
	@include('tour_section.components.guides.gp_guide_js')
@endif

@include('tour_section.quick_quote.gp_summary_js')


<script>

		function change_tab(tab_id){
			//alert(tab_id);
			localStorage.setItem('activeTab', tab_id);
		}
			
		$('.onClick_save').click(function (e){

			var current_section = $(this).attr('id');
			
			if(current_section == 'btn_save_tab_1'){
				localStorage.setItem('activeTab_quick', 'routedata');
			}else if(current_section == 'btn_save_tab_2'){
				localStorage.setItem('activeTab_quick', 'accmddata');
			}else if(current_section == 'btn_save_tab_3'){
				localStorage.setItem('activeTab_quick', 'guidesdata');
			}else if(current_section == 'btn_save_tab_4'){
				localStorage.setItem('activeTab_quick', 'transportdataui');
			}else if(current_section == 'btn_save_tab_5'){
				localStorage.setItem('activeTab_quick', 'micsdataui');
			}	


			
			
			//alert(current_section);

		});

		$(document).ready(function () {
			
			var activeTab = localStorage.getItem('activeTab');
			var activeTab_scrl = localStorage.getItem('activeTab_quick');
			localStorage.setItem('activeTab', '');
			if(activeTab){
				$('#tab_index_'+activeTab).tab('show');
				$('#tb_'+activeTab_scrl).click();
				//alert(activeTab_scrl);
			}


	
		});
	
</script>


@endsection