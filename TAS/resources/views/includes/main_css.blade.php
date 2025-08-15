<link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
<!-- <link rel="stylesheet" href=" URL::asset(mix('/css/app-less.css')) ">  -->

<link rel="stylesheet" href="{{ URL::asset('/css/theme-styles.css') }}">
@if(Auth::user())
@endif
<link rel="stylesheet" href="{{ URL::asset('/css/override-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/css/select2.min.css') }}">
{{--  <link rel="stylesheet" href="{{ URL::asset('/alert/animate.min.css') }}">  --}}




<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->