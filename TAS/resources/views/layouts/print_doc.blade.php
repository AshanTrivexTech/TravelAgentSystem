<html>
    <head>
        <title>@if(isset($title)) {{$title}} @else {{'Travel Mate'}}@endif</title>
        <meta charset="utf-8">
        <meta name="description" content="TAS by Wysheit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="_token" content="{{csrf_token()}}" />
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

        <script>
                WebFont.load({ 
                    google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                    active: function() {  
                        sessionStorage.fonts = true; 
                        } 
                  }); 
                  
      
                  
         </script> 
        
        <link href="{{ URL::asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        @section('sidebar')
            
        
            
        @show

        <div class="container">
            @yield('content')
        </div>





        @section('Page_Scripts')
        <script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>		
        @show
    </body>
</html>