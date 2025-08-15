<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>DMC - Login</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Web font -->

		<!--begin::Base Styles -->
    <link href="{{URL::asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="{{URL::asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Base Styles -->
    <link rel="shortcut icon" href="{{URL::asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        <!-- begin:: Page -->
        
        
        <main>  

						@yield('content')
					
				</main>
      

		<!--begin::Base Scripts -->
    <script src="{{URL::asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

		<!--end::Base Scripts -->

		<!--begin::Page Snippets -->
    <script src="{{URL::asset('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>

		<!--end::Page Snippets -->
	</body>

	<!-- end::Body -->
</html>