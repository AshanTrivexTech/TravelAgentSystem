@php
		use App\Http\Controllers\userController;
		use Illuminate\Support\Facades\Auth;
			// $S_CODE='MF-HT-HP';
			$user=userController::assign_privilages();
			$s_data=userController::check_user(Auth::user()->id);
			$user_isGuest =$s_data->status;
			$tour_crea_qoute_create = 0;
			$tour_all_qoute_view = 0;
			$MF_HTL_HTL=0; 
			$MF_HTL_PAC=0; 
			$MF_HTL_GRP=0;
			$MF_HTL_CMPS=0;
			$MF_TRP_VSP=0;
			$MF_TRP_VEHCL=0;
			$MF_TRP_VEHCL_TPY=0;	
			$MF_TRP_DRVR=0;	
			$MF_MISC_MISC=0;	
			$MF_MISC_CAT=0;	
			$MF_GID_GID=0;	
			$MF_GID_GL=0;	
			$MF_GID_GR=0;	
			$MF_GID_GFEE=0;	
			$MF_LOC_COUNTRIES=0;	
			$MF_LOC_DSTRICT=0;	
			$MF_LOC_CITY=0;	
			$MF_RUT_LOC=0;	
			$MF_RUT_DIS=0;	
			$MF_RUT_SS=0;	
			$MF_ITENERY=0;	
			$MF_MD_MKT=0;	
			$MF_MD_AGNT=0;	
			$MF_MD_CRNCY=0;	
			$MF_MD_BRANCH=0;	
			$MF_MD_TAX=0;	


			//  $t_qt_new_qt=0;
			if($user_isGuest!=0)
			{
					foreach ($user as $u ) {
						if($u->pl_st==1){

						if($u->section_code=='MF-HT-HP')
						{
							$tour_crea_qoute_create=1;

						}
						if($u->section_code=='MF-HT-HP')
						{
							$tour_all_qoute_view=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_HTL_HTL=1;
							
						}
						if($u->section_code=='MF-HT-HP ')
						{
							$MF_HTL_PAC=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_HTL_GRP=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_HTL_CMPS=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_TRP_VEHCL=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_TRP_VEHCL_TPY=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_TRP_DRVR=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_MISC_MISC=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_MISC_CAT=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_GID_GID=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_GID_GL=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_GID_GR=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_GID_GFEE=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_LOC_COUNTRIES=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_LOC_DSTRICT=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_LOC_CITY=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_RUT_LOC=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_RUT_DIS=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_RUT_SS=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_ITENERY=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_MD_MKT=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_MD_AGNT=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_MD_CRNCY=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_MD_BRANCH=1;
							
						}
						if($u->section_code=='MF-HT-HP')
						{
							$MF_MD_TAX=1;
							
						}


					}

						
					}
			}
		@endphp	

