<!DOCTYPE HTML>
<html>
	<head>
		<title>{{ config('app.name', 'Laravel') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{url('/')}}/template/css/main.css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>

		<!-- Header -->
        @include('inc.header')



        @include('inc.messages')



		<!-- Banner -->
        <section class="banner full">
            <article>
                <img src="images/slide01.jpg" alt="" />
                <div class="inner">
                    <header>
                        <p>Welcome to our Realestate Website</p>
                        <h2>Realestate</h2>
                    </header>
                </div>
            </article>
            <article>
                <img src="images/slide02.jpg" alt="" />
                <div class="inner">
                    <header>
                        <p>Welcome to our Realestate Website</p>
                        <h2>Realestate</h2>
                    </header>
                </div>
            </article>
            <article>
                <img src="images/slide03.jpg"  alt="" />
                <div class="inner">
                    <header>
                        <p>Welcome to our Realestate Website</p>
                        <h2>Realestate</h2>
                    </header>
                </div>
            </article>
            <article>
                <img src="images/slide04.jpg"  alt="" />
                <div class="inner">
                    <header>
                        {{-- <p>Adipiscing lorem ipsum feugiat sed phasellus consequat</p> --}}
                        {{-- <h2>Etiam feugiat</h2> --}}
                    </header>
                </div>
            </article>
            <article>
                <img src="images/slide05.jpg"  alt="" />
                <div class="inner">
                    <header>
                        {{-- <p>Ipsum dolor sed magna veroeros lorem ipsum</p> --}}
                        {{-- <h2>Lorem adipiscing</h2> --}}
                    </header>
                </div>
            </article>
        </section>

		<!-- One -->
        <section id="one" class="wrapper style2">
            <div class="inner">
                <div class="grid-style">

                    <div>
                        <div class="box">
                            <div class="image fit">
                                <img src="images/pic02.jpg" alt="" />
                            </div>
                            <div class="content">
                                <header class="align-center">
                                    {{-- <p>maecenas sapien feugiat ex purus</p> --}}
                                    <h2>Home Details</h2>
                                </header>
                                {{-- <p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p> --}}
                                {{-- <footer class="align-center"> --}}
                                    <a href="#" class="button alt">Learn More</a>
                                </footer>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="box">
                            <div class="image fit">
                                <img src="images/pic03.jpg" alt="" />
                            </div>
                            <div class="content">
                                <header class="align-center">
                                    {{-- <p>mattis elementum sapien pretium tellus</p> --}}
                                    <h2>Apartment details</h2>
                                </header>
                                {{-- <p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p> --}}
                                <footer class="align-center">
                                    <a href="#" class="button alt">Learn More</a>
                                </footer>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



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
