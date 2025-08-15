<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	@include('layouts.partials._header-base')
	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		
		@include('layouts.partials._aside-left')
		<div class="m-grid__item m-grid__item--fluid m-wrapper">
		 
			@yield('content')  
			
		</div>
	</div>
	<!-- end:: Body -->
	@include('layouts.partials._footer-default')			
</div>
<!-- end:: Page -->    		        
	@include('layouts.partials._layout-scroll-top')	
