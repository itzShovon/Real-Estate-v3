<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Style CSS --}}
        <link href="{{ asset('css/template.css') }}" rel="stylesheet">

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
        <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="{{url('/')}}/template/master/plugins/toaster/toastr.min.css" rel="stylesheet" />
        <link href="{{url('/')}}/template/master/plugins/nprogress/nprogress.css" rel="stylesheet" />
        <link href="{{url('/')}}/template/master/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
        <link href="{{url('/')}}/template/master/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
        <link href="{{url('/')}}/template/master/plugins/ladda/ladda.min.css" rel="stylesheet" />
        <link href="{{url('/')}}/template/master/plugins/select2/css/select2.min.css" rel="stylesheet" />
        <link href="{{url('/')}}/template/master/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

        {{-- <link href="{{url('/')}}/template/master/css/jquery-linedtextarea.css" type="text/css" rel="stylesheet" /> --}}

        <!-- SLEEK CSS -->
        <link id="sleek-css" rel="stylesheet" href="{{url('/')}}/template/master/css/sleek.css" />

        {{-- Datatables CSS --}}

        <!-- FAVICON -->
        <link href="{{url('/')}}/template/master/img/favicon.png" rel="shortcut icon" />

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{{url('/')}}/template/master/plugins/nprogress/nprogress.js"></script>
    </head>


    <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
        <script>
            NProgress.configure({ showSpinner: false });
            NProgress.start();
        </script>

        <div class="mobile-sticky-body-overlay"></div>

        <div class="wrapper">
            <div class="page-wrapper">
                @include('inc.master.header')

                @include('inc.master.sidebar')

                <div class="">
                    @include('inc.master.messages')
                    @yield('content')
                </div>
                @include('inc.master.footer')
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script> --}}
        {{-- <script src="{{url('/')}}/template/master/plugins/jquery/jquery.min.js"></script> --}}
        <script src="{{url('/')}}/template/master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/toaster/toastr.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/charts/Chart.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/ladda/spin.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/ladda/ladda.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/jquery-mask-input/jquery.mask.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/select2/js/select2.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="{{url('/')}}/template/master/plugins/daterangepicker/moment.min.js"></script>
        <script src="{{url('/')}}/template/master/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="{{url('/')}}/template/master/plugins/jekyll-search.min.js"></script>
        <script src="{{url('/')}}/template/master/js/sleek.js"></script>
        <script src="{{url('/')}}/template/master/js/chart.js"></script>
        <script src="{{url('/')}}/template/master/js/date-range.js"></script>
        <script src="{{url('/')}}/template/master/js/map.js"></script>
        <script src="{{url('/')}}/template/master/js/custom.js"></script>


        @yield('script')
    </body>
</html>
