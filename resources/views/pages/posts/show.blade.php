@extends('layouts.template')
@section('content')

<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>{{$post->body}}</p>
            <h2>{{$post->title}}</h2>
        </header>
    </div>
</section>

<!-- Main -->
<div id="main" class="container">

<!-- Elements -->
{{-- <h2 id="elements">Elements</h2> --}}
<div class="row 200%">
    <div class="12u 12u$(medium)">
        <div id="carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                        <img class="d-block w-100" src="{{url('/')}}/storage/{{$post->image}}" alt="{{$post->title}}">
                        <div class="mask rgba-black-light"></div>
                    </div>
                </div>
                @foreach ($gallery as $image)
                    <div class="carousel-item">
                        <div class="view">
                            <img class="d-block w-100" src="{{url('/')}}/storage/{{$image->image}}" alt="{{$post->title}}">
                            <div class="mask rgba-black-light"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">next</span>
            </a>
            <!--/.Controls-->
        </div>
        <hr />

        @if ($post->seat_type != "")
            <h5>Seat type : {{$post->seat_type}}</h5>
        @endif
        @if ($post->bedroom != "")
            <h5>Bedroom : {{$post->bedroom}}</h5>
        @endif
        @if ($post->drawing != "")
            <h5>Drawing/Comon room : {{$post->drawing}}</h5>
        @endif
        @if ($post->url != "")
            <a href="{{$post->url}}">Domain: {{$post->url}}</a>
        @endif
        @if ($post->dining != "")
            <h5>Dining : {{$post->dining}}</h5>
        @endif
        @if ($post->bathroom != "")
            <h5>Bathroom: {{$post->bathroom}}</h5>
        @endif
        @if ($post->corridor != "")
            <h5>Coordori : {{$post->corridor}}</h5>
        @endif
        @if ($post->kitchen != "")
            <h5>Kitchen : {{$post->kitchen}}</h5>
        @endif
        @if ($post->floor != "")
            <h5>Floor : {{$post->floor}}</h5>
        @endif
        @if ($post->parking != "")
            <h5>Grrage : {{$post->parking}}</h5>
        @endif
        @if ($post->area != "")
            <h5>Area: {{$post->area}}</h5>
        @endif
        @if ($post->road != "")
            <h5>Road: {{$post->road}}</h5>
        @endif
        @if ($post->price_flag == 1)
            @if ($post->option == "sell")
                <h4>Price : {{$post->price}}</h4>
            @else
                <h4>Rent : {{$post->price}}</h4>
            @endif
        @endif
        @if ($post->location_flag == 1)
            <h5>Address : {{$post->address}}</h5>
            <h5>{{$post->ward}}, {{$post->city}} : {{$post->partial}}</h5>
            <h5>Districr: {{$post->district}}, Division: {{$post->division}}</h5>
        @endif

        @if ($post->map_status == 1)
            <button type="button" id="showMapButton" class="btn btn-info">Show Map</button>
            <div id="showMap" style="display: none;">
                {!! $map['html'] !!}
            </div>
        @endif

        @if ($post->advance != "")
            <h5>Advance: {{$post->advance}}</h5>
        @endif
        @if ($post->availability != "")
            <h5>Property released: {{ date('d-M-Y', strtotime($post->availability)) }}</h5>
        @endif



        <!-- Text stuff -->
        <hr />
        <header>
            <h2>Contact</h2>
            <h5>Advertiser Name : {{$user->name}}</h5>
            <h5>{{$user->category}}</h5>
            <h5>Contact no : {{$user->contact}}</h5>
        </header>


    </div>

            </div>
        </div>

</div>

@endsection

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{!! $map['js'] !!}

<script>
    $(document).ready(function(){
        $("button#showMapButton").click(function(){
            $("div#showMap").show();
            $("button#showMapButton").hide();
        });
    });
</script>
@endsection
