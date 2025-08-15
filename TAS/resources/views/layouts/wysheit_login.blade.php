<html lang="en" >
	<head>
		<meta charset="utf-8" />
        <title>@if(isset($title)) {{$title}} @else {{config('app.name')}}@endif</title>
		<meta name="description" content="TAS by Wysheit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
        <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}"> 
         <script>
        window.Laravel =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?> 
        /*custom*/ 
    </script>  
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="{{ URL::asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{ URL::asset('assets/demo/default/media/img/logo/favicon.ico') }}" />
	</head>
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
        @yield('content')  

        <!--begin::Base Scripts -->
		<script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Snippets -->
		<script src="{{ URL::asset('assets/snippets/pages/user/login.js') }}" type="text/javascript"></script>
		<!--end::Page Snippets -->

	</body>
	<!-- end::Body -->
</html>