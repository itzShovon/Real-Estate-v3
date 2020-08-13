@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default" data-scroll-height="500">
                    <div class="card-header justify-content-between align-items-center card-header-border-bottom">
                        <h2>{{$post->title}}</h2>

                        <input type="date" name="validity" id="validity" value="{{ date('Y-m-d', strtotime($post->validity)) }}">
                        <input type="hidden" name="post" id="post" value="{{ $post->id }}">
                        <p id="status">{{$post->status}} [Change]</p>
                    </div>

                    <div>
                        <div id="carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <div class="view">
                                        <img class="d-block w-100" src="{{url('/')}}/storage/{{$post->image}}" alt="{{$post->title}}">
                                        <div class="mask rgba-black-light"></div>
                                    </div>
                                </div>
                                @foreach ($gallery as $row)
                                    <div class="carousel-item">
                                        <div class="view">
                                            <img class="d-block w-100" src="{{url('/')}}/storage/{{$row->image}}" alt="{{$post->title}}">
                                            <div class="mask rgba-black-light"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                        <hr />


                        <p>{{$post->body}}</p>
                        @if ($post->seat_type != "")
                            <h5>seat type: {{$post->seat_type}}</h5>
                        @endif
                        @if ($post->bedroom != "")
                            <h5>bedroom: {{$post->bedroom}}</h5>
                        @endif
                        @if ($post->drawing != "")
                            <h5>drawing room : {{$post->drawing}}</h5>
                        @endif
                        @if ($post->url != "")
                            <a href="{{$post->url}}">domain : {{$post->url}}</a>
                        @endif
                        @if ($post->dining != "")
                            <h5>dining room: {{$post->dining}}</h5>
                        @endif
                        @if ($post->bathroom != "")
                            <h5>bath room : {{$post->bathroom}}</h5>
                        @endif
                        @if ($post->corridor != "")
                            <h5>corridor : {{$post->corridor}}</h5>
                        @endif
                        @if ($post->kitchen != "")
                            <h5>Kitchen room : {{$post->kitchen}}</h5>
                        @endif
                        @if ($post->floor != "")
                            <h5>Floor : {{$post->floor}}</h5>
                        @endif
                        @if ($post->parking != "")
                            <h5>garrege : {{$post->parking}}</h5>
                        @endif
                        @if ($post->area != "")
                            <h5><area ="" coords="" href="" alt="">: {{$post->area}}</h5>
                        @endif
                        @if ($post->road != "")
                            <h5>road: {{$post->road}}</h5>
                        @endif
                        @if ($post->price_flag == 1)
                            @if ($post->option == "sell")
                                <h4>price : {{$post->price}}</h4>
                            @else
                                <h4>rent: {{$post->price}}</h4>
                            @endif
                        @endif
                        @if ($post->location_flag == 1)
                            <h5>address : {{$post->address}}</h5>
                            <h5>{{$post->ward}}, {{$post->city}} : {{$post->partial}}</h5>
                            <h5>district : {{$post->district}}, division: {{$post->division}}</h5>
                        @endif

                        @if ($post->map_status == 1)
                            <button type="button" id="showMapButton" class="btn btn-info">Show Map</button>
                            <div id="showMap" style="display: none;">
                                {!! $map['html'] !!}
                            </div>
                        @endif

                        @if ($post->advance != "")
                            <h5>advance : {{$post->advance}}</h5>
                        @endif
                        @if ($post->availability != "")
                            <h5>property  released: {{ date('d-M-Y', strtotime($post->availability)) }}</h5>
                        @endif



                        <!-- Text stuff -->
                            <hr />
                            {{-- <header>
                                <h2>About</h2>
                                <p>advertiser: {{$user->name}}</p>
                                <p>{{$user->category}}</p>
                                <p>contact no : {{$user->contact}}</p>
                            </header> --}}


                    </div>

                    <div class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{!! $map['js'] !!}

<script>
    $(document).ready(function(){
        $("button#showMapButton").click(function(){
            $("div#showMap").show();
            $("button#showMapButton").hide();
        });

        $("input#validity").on('change', function(){
            $.ajax({
                url     :   '{{ route('fetches.validity') }}',
                data    :   { validity:$('input#validity').val(), id:$('input#post').val() },
                method  :   'GET',
                success :   function(data){
                    $('input#validity').val(data);
                    alert('Updated to ' + data)
                    // $('p#status').html('Date Updated');
                }
            });
        });

        $("p#status").click(function(){
            $('p#status').html('Changing');
            $.ajax({
                url     :   '{{ route('fetches.status') }}',
                data    :   { id:$('input#post').val() },
                method  :   'GET',
                success :   function(data){
                    $('p#status').html(data);
                }
            });
        });
    });
</script>
@endsection
