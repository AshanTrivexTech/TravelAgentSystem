<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>@if(isset($title)) {{$title}} @else {{'Travel Mate'}}@endif</title>
		<meta name="description" content="TAS by Wysheit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		{{--  <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">   --}}
		<meta name="_token" content="{{csrf_token()}}" />
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
		<!--end::Web font -->  
	
		<script>
        window.Laravel =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?> 
        /*custom*/
	 
        var image_upload_route = "route('upload-post')";
        var image_delete_route = "route('upload-remove')";
	</script>
	

		<!-- vue js -->
	 <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->


		<!--begin::Base Styles -->                           
		<!--begin::Page Vendors -->
		<!--end::Page Vendors -->
		<link href="{{ URL::asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		
		<!--end::Base Styles -->
		@section('Page_Styles')
	   @show 
		<link rel="shortcut icon" href="{{ URL::asset('assets/demo/default/media/img/logo/favicon.ico') }}" />
		 
	</head>
	<!-- end::Head -->        <!-- end::Body -->
	<body class="m-page--fluid m--skin- m-page--loading-enabled m-page--loading m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
			
		
		
		@section('Page_Scripts')
		<!--begin::Base Scripts -->
		<script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
		

		
		<!--end::Base Scripts -->   
		
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 
		
		<script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
	
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
				toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

	

@if (count($errors) > 0)

@if ($errors->any())
 <script type="text/javascript"> </script>
    <div id="val_msgs_wrap">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<script type="text/javascript">
		$(document).ready(function(){
		    setTimeout(function() {
		    	var msg = $('#val_msgs_wrap').html();
					  toastr.error( msg,"Oops");
		       	console.log(msg);
		    }, 10);
		});
	</script> 


@endif   





		
	
		<script src="{{ URL::asset('assets/demo/default/custom/components/base/bootstrap-notify.js') }}" type="text/javascript"></script>
		<script src={{URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js') }} type="text/javascript"></script>
		<script src="{{URL::asset('assets/alert/sweetalert.min.js')}}"></script>
		
		<script>
				$(".dtpic-format").datepicker({format: 'yyyy-mm-dd'});
        
			            $(window).on('load', function() { 
							$('body').removeClass('m-page--loading'); 
							});        
		</script>
		<!-- end::Page Loader -->


		@section('Vue_js')
		@show

	</body>
	<!-- end::Body -->
</html>
