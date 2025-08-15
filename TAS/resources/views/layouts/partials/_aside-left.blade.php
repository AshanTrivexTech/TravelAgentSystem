		<!-- BEGIN: Left Aside -->
		@php
		use App\Http\Controllers\userController;
		use Illuminate\Support\Facades\Auth;
			// $S_CODE='MF-HT-HP';
			$user=userController::assign_privilages();
			$s_data=userController::check_user(Auth::user()->id);
			
			$user_isGuest =$s_data->status;
			$tour_crea_qoute_create = 1;
			$tour_all_qoute_view = 1;
			$MF_HTL_HTL=1; 
			$MF_HTL_PAC=1; 
			$MF_HTL_GRP=1;
			$MF_HTL_CMPS=1;
			$MF_TRP_VSP=1;
			$MF_TRP_VEHCL=1;
			$MF_TRP_VEHCL_TPY=1;	
			$MF_TRP_DRVR=1;	
			$MF_MISC_MISC=1;	
			$MF_MISC_CAT=1;	
			$MF_GID_GID=1;	
			$MF_GID_GL=1;	
			$MF_GID_GR=1;	
			$MF_GID_GFEE=1;	
			$MF_LOC_COUNTRIES=1;	
			$MF_LOC_DSTRICT=1;	
			$MF_LOC_CITY=1;	
			$MF_RUT_LOC=1;	
			$MF_RUT_DIS=1;	
			$MF_RUT_SS=1;	
			$MF_ITENERY=1;	
			$MF_MD_MKT=1;	
			$MF_MD_AGNT=1;	
			$MF_MD_CRNCY=1;	
			$MF_MD_BRANCH=1;	
			$MF_MD_TAX=1;	


			//  $t_qt_new_qt=0;
			if($user_isGuest!=0)
			{
					foreach ($user as $u ) {
						if($u->pl_st==1){

						if($u->section_code=='TRSQTNEW')
						{
							$tour_crea_qoute_create=1;

						}
						if($u->section_code=='TRQTALL')
						{
							$tour_all_qoute_view=1;
							
						}
						if($u->section_code=='MFHTHTS')
						{
							$MF_HTL_HTL=1;
							
						}
						if($u->section_code=='MFHTPAX')
						{
							$MF_HTL_PAC=1;
							
						}
						if($u->section_code=='MFHTGRP')
						{
							$MF_HTL_GRP=1;
							
						}
						if($u->section_code=='MFHTCMPS')
						{
							$MF_HTL_CMPS=1;
							
						}
						if($u->section_code=='MFTRVHS')
						{
							$MF_TRP_VEHCL=1;
							
						}
						if($u->section_code=='MFTRVTP')
						{
							$MF_TRP_VEHCL_TPY=1;
							
						}
						if($u->section_code=='MFTRDRV')
						{
							$MF_TRP_DRVR=1;
							
						}
						if($u->section_code=='MFMISMISS')
						{
							$MF_MISC_MISC=1;
							
						}
						if($u->section_code=='MFMISMCAT')
						{
							$MF_MISC_CAT=1;
							
						}
						if($u->section_code=='MFGIDGIDS')
						{
							$MF_GID_GID=1;
							
						}
						if($u->section_code=='MFGIDLAN')
						{
							$MF_GID_GL=1;
							
						}
						if($u->section_code=='MFGIDRM')
						{
							$MF_GID_GR=1;
							
						}
						if($u->section_code=='MFGIDDFEE')
						{
							$MF_GID_GFEE=1;
							
						}
						if($u->section_code=='MFLOCCNTR')
						{
							$MF_LOC_COUNTRIES=1;
							
						}
						if($u->section_code=='MFLOCDIS')
						{
							$MF_LOC_DSTRICT=1;
							
						}
						if($u->section_code=='MFLOCCTY')
						{
							$MF_LOC_CITY=1;
							
						}
						if($u->section_code=='MFRTLOC')
						{
							$MF_RUT_LOC=1;
							
						}
						if($u->section_code=='MFLOCDIS')
						{
							$MF_RUT_DIS=1;
							
						}
						if($u->section_code=='MFLOCSS')
						{
							$MF_RUT_SS=1;
							
						}
						if($u->section_code=='MFITNRY')
						{
							$MF_ITENERY=1;
							
						}
						if($u->section_code=='MFMDMKT')
						{
							$MF_MD_MKT=1;
							
						}
						if($u->section_code=='MFMDAGNT')
						{
							$MF_MD_AGNT=1;
							
						}
						if($u->section_code=='MFMDCRNCY')
						{
							$MF_MD_CRNCY=1;
							
						}
						if($u->section_code=='MFMDBRNCH')
						{
							$MF_MD_BRANCH=1;
							
						}
						if($u->section_code=='MFMDTAX')
						{
							$MF_MD_TAX=1;
							
						}


					}

						
					}
			}
		@endphp	


				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
						
					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" 	class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 		data-menu-vertical="true"		 data-menu-scrollable="true" data-menu-dropdown-timeout="500"  		>
						
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
							<a href="/" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph" data-html="true" data-skin="dark" data-placement="left" data-toggle="m-tooltip" data-original-title="Dashboard" style="color:#fff;"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">Dashboard</span>
											<span class="m-menu__link-badge">
												
											</span>
										</span>
									</span>
								</a>
							</li>
							<br>
							@if ($user_isGuest==1)
								
								
									
								<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
									<a href="{{route('operation_dashboard')}}" class="m-menu__link ">
										<i class="m-menu__link-icon flaticon-list" data-html="true" data-skin="dark" data-placement="left" data-toggle="m-tooltip" data-original-title="Operations" style="color:#fff;"></i>
										<span class="m-menu__link-text">Operations</span>
									</a>
								</li>

								
							@endif
								<br>
						   
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
							<a href="{{route('gmd_dashboard')}}" class="m-menu__link">
									<i class="m-menu__link-icon flaticon-file" data-html="true" data-skin="dark" data-placement="left" data-toggle="m-tooltip" data-original-title="General Master Data" style="color:#fff;"></i>
									<span class="m-menu__link-text">General Master Data</span>
								</a>
							</li>

							<br>

							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
									<a href="{{route('opmd_dashboard')}}" class="m-menu__link">
										<i class="m-menu__link-icon flaticon-list-1" data-html="true" data-skin="dark" data-placement="left" data-toggle="m-tooltip" data-original-title="Operation Master Data" style="color:#fff;"></i>
										<span class="m-menu__link-text">Operation Master Data</span>
									</a>
								</li>

								<br>

								<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
										<a href="{{route('load_feedback')}}" class="m-menu__link">
											<i class="m-menu__link-icon flaticon-paper-plane" data-html="true" data-skin="dark" data-placement="left" data-toggle="m-tooltip" data-original-title="Enter FeedBacks" style="color:#fff;"></i>
											<span class="m-menu__link-text">FeedBack</span>
										</a>
									</li>
							
						</ul>
						
					</div>
					
					<!-- END: Aside Menu -->
				</div>
		
				
				<!-- END: Left Aside -->