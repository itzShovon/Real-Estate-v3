<!DOCTYPE HTML>
<html>
	<head>
		<title>{{ config('app.name', 'Laravel') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{url('/')}}/template/css/main.css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body class="subpage">

        @include('inc.header')

		<div class="">
            @include('inc.messages')
            @yield('content')
        </div>

		<!-- Footer -->
        @include('inc.footer')

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
        <script src="{{url('/')}}/template/js/jquery.min.js"></script>
        <script src="{{url('/')}}/template/js/jquery.scrollex.min.js"></script>
        <script src="{{url('/')}}/template/js/skel.min.js"></script>
        <script src="{{url('/')}}/template/js/util.js"></script>
        <script src="{{url('/')}}/template/js/main.js"></script>

        @yield('script')

	</body>
</html>
