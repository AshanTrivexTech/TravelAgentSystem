<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Hashan kulasinghe">
    <meta name="keywords" content="hashan kulasinghe, hashk99@gmail.com">
    <meta name="author" content="hashk99@gmail.com">
    <title>@if(isset($title)) {{$title}} @else {{config('app.name')}}@endif</title>
    <!-- Favicons-->
    <link rel="icon" href="{{asset('/images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{asset('/images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{asset('/images/favicon/mstile-144x144.png')}}">
    <!-- For Windows Phone -->
    <!-- CSRF Token -->
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}"> 
    @section('head')
        @include('includes.main_css') 
    @show

    <script>
        window.Laravel =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?> 
        /*custom*/ 
    </script>  
  </head> 
         
    <body class="cyan">
        <div id="app" ></div> 
   
        <!-- Start Page Loading -->
        <div id="loader-wrapper">
          <div id="loader"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->
  
        <div id="login-page" class="row"> 
            <!--  put @ here if needed include('includes.visitor_main_menu') -->
            @yield('content')  
        </div> 

        @include('includes.footer')

        @section('javascript')
         @include('includes.main_js')  
        @show
 
    </body>
</html>