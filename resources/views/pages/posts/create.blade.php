@extends('layouts.template')

@section('content')

<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            {{-- <p>Eleifend vitae urna</p> --}}
            {{-- <h2>Generic Page Template</h2> --}}
        </header>
    </div>
</section>


<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- {{csrf_field()}} --}}
                    <div class="row uniform">
                        <div class="col-12">
                            <input type="text" name="title" id="title" placeholder="Title"/>
                        </div>
                        <div class="col-6">
                            <label for="image">Cover</label>
                            <input type="file" accept="image/*" class="form-control-file" name="image" id="image">
                        </div>

                        <div class="col-6">
                            <label for="gallery">Gallery</label>
                            <input type="file" accept="image/*" class="form-control-file" name="gallery[]" id="gallery" multiple>
                        </div>

                        <div class="col-6">
                            <div class="select-wrapper">
                                <select class="form-control" id="option" name="option" onchange="showHide()" required>
                                    <option value="">Buy /  Sell / Rent / Project</option>
                                    <option value="Sell">Sell</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Project">Project</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="select-wrapper">
                                <select class="form-control" id="category" name="category" style="display: none;" onchange="showHide()" required>
                                    <option value="">Choose Property Category</option>
                                    <option value="Plot" id="plot">Plot</option>
                                    <option value="Independent House" id="independentHouse">Independent House</option>
                                    <option value="Agriland" id="agriLand">Agriland</option>
                                    <option value="Apartment" id="apartment">Apartment</option>
                                    <option value="Independent Floor" id="independentFloor">Independent Floor</option>
                                    <option value="Shop Showroom" id="shopShowroom">Shop Showroom</option>
                                    <option value="Office Space" id="officeSpace">Office Space</option>
                                    <option value="Boys Hostel" id="boysHostel">Boys Hostel</option>
                                    <option value="Girls Hostel" id="girlsHostel">Girls Hostel</option>
                                    <option value="Residence Project" id="residenceProject">Residence Project</option>
                                    <option value="Business Project" id="businessProject">Business Project</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <input type="text" id="bedroom" name="bedroom" style="display: none" placeholder="Bedroom">
                        </div>
                        <div class="col-4">
                            <input type="url" class="form-control" id="url" name="url" style="display: none" placeholder="Domain (https://example.com)">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="drawing" name="drawing" style="display: none" placeholder="Drawing Room">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="dining" name="dining" style="display: none" placeholder="Dining Room">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="bathroom" name="bathroom" style="display: none" placeholder="Bath Room">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="seatType" name="seatType" style="display: none" placeholder="Seat Type">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="kitchen" name="kitchen" style="display: none" placeholder="Kitchen">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="corridor" name="corridor" style="display: none" placeholder="Corridor">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="floor" name="floor" style="display: none" placeholder="Floor">
                        </div>
                        <div class="col-2">
                            <input type="text" id="parking" name="parking" style="display: none" placeholder="Parking">
                        </div>
                        <div class="col-2">
                            <input type="text" id="area" name="area" style="display: none" placeholder="Area">
                        </div>
                        <div class="col-2">
                            <input type="text" id="road" name="road" style="display: none" placeholder="Road">
                        </div>
                        <div class="col-2">
                            <input type="text" id="advance" name="advance" style="display: none" placeholder="Advance">
                        </div>
                        <div class="col-12">
                            <textarea name="body" id="body" placeholder="Short Description"></textarea>
                        </div>
                        <div class="col-3">
                            <input type="text" id="price" name="price" style="display: none" placeholder="Price / Rent" required>
                        </div>
                        <div class="col-3">
                            <div class="select-wrapper">
                                <select id="price_flag" name="price_flag" style="display: none;" required>
                                    <option value="">Do you want to show price / rent?</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="select-wrapper">
                                <select id="location_flag" name="location_flag" style="display: none;" required>
                                    <option value="">Do you want to show address?</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="text" name="address" id="address" style="display: none" placeholder="Holding No. etc."/>
                        </div>
                        <div class="col-4">
                            <div class="select-wrapper">
                                <select id="division" name="division" style="display: none">
                                    <option value="">Division</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    {{-- <option value="বরিশাল">বরিশাল</option>
                                    <option value="বরিশাল">বরিশাল</option>
                                    <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                                    <option value="ঢাকা">ঢাকা</option>
                                    <option value="খুলনা">খুলনা</option>
                                    <option value="ময়মনসিংহ">ময়মনসিংহ</option>
                                    <option value="রাজশাহী">রাজশাহী</option>
                                    <option value="সিলেট">সিলেট</option>
                                    <option value="রংপুর">রংপুর</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="select-wrapper">
                                <select id="district" name="district" style="display: none">
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="select-wrapper">
                                <select id="city" name="city" style="display: none">
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="select-wrapper">
                                <select id="partial" name="partial" style="display: none">
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="select-wrapper">
                                <select id="ward" name="ward" style="display: none">
                                </select>
                            </div>
                        </div>

                        <div class="6u 12u$">
                            <input type="date" class="form-control mb-4" id="availability" name="availability" style="display: none" placeholder="">
                        </div>

                        <div class="6u 12u$">
                            <select class="form-control" id="map_status" name="map_status" style="display: none" required>
                                <option>Do you want to show in map?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <input type="text" id="longitude" name="longitude" hidden>
                        <input type="text" id="latitude" name="latitude" hidden>

                        {!! $map['html'] !!}





                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Add" /></li>
                                <li><input type="reset" value="Reset" class="alt" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function updateDatabase(newLat, newLng)
    {
        // make an ajax request to a PHP file
        // on our site that will update the database
        // pass in our lat/lng as parameters
        $("input#longitude").val(newLng);
        $("input#latitude").val(newLat);
        // alert(newLat);
        // alert(newLng);
        $.post(
            "/my_controller/update_coords",
            { 'newLat': newLat, 'newLng': newLng, 'var1': 'value1' }
        )
        .done(function(data) {
            alert("Database updated");
        });
    }
</script>
{!! $map['js'] !!}


<script>
    $(document).ready(function(){
        $("select#option").change(function(){
            var value = $(this).val();

            if(value=="Sell"){
                    $("select#category").show();

                    $("option#plot").show();
                    $("option#independentHouse").show();
                    $("option#agriLand").show();
                    $("option#apartment").show();
                    $("option#independentFloor").hide();
                    $("option#shopShowroom").show();
                    $("option#officeSpace").show();
                    $("option#boysHostel").hide();
                    $("option#girlsHostel").hide();
                    $("option#residenceProject").hide();
                    $("option#businessProject").hide();

                    $("select#map_status").show();

                    $("input#price").attr("placeholder", "Price");
                }
                else if(value=="Rent"){
                    $("select#category").show();
                    $("option#plot").hide();
                    $("option#independentHouse").show();
                    $("option#agriLand").hide();
                    $("option#apartment").show();
                    $("option#independentFloor").show();
                    $("option#shopShowroom").show();
                    $("option#officeSpace").show();
                    $("option#boysHostel").show();
                    $("option#girlsHostel").show();
                    $("option#residenceProject").hide();
                    $("option#businessProject").hide();

                    $("select#map_status").show();

                    $("input#price").attr("placeholder", "Rent");
                }
                else if(value=="Project"){
                    $("select#category").show();
                    $("option#plot").hide();
                    $("option#independentHouse").hide();
                    $("option#agriLand").hide();
                    $("option#apartment").hide();
                    $("option#independentFloor").hide();
                    $("option#shopShowroom").hide();
                    $("option#officeSpace").hide();
                    $("option#boysHostel").hide();
                    $("option#girlsHostel").hide();
                    $("option#residenceProject").show();
                    $("option#businessProject").show();

                    $("select#map_status").show();

                    // $("input#price").attr("placeholder", "মাসিক ভাড়া");
                }
                else{
                    $("select#category").show();
                    $("option#plot").hide();
                    $("option#independentHouse").hide();
                    $("option#agriLand").hide();
                    $("option#apartment").hide();
                    $("option#independentFloor").hide();
                    $("option#shopShowroom").hide();
                    $("option#officeSpace").hide();
                    $("option#boysHostel").hide();
                    $("option#girlsHostel").hide();

                    $("select#map_status").hide();

                    $("option#residenceProject").hide();
                    $("option#businessProject").hide();

                    $("select#price_flag").hide();
                    $("input#price").hide();
                    $("input#area").hide();
                    $("input#road").hide();
                    $("select#location_flag").hide();
                    $("input#address").hide();
                    $("input#division").hide();
                    $("input#district").hide();
                    $("input#city").hide();
                    $("select#partial").hide();
                    $("input#ward").hide();
                    $("input#bedroom").hide();
                    $("input#bathroom").hide();
                    $("input#corridor").hide();
                    $("input#kitchen").hide();
                    $("input#floor").hide();
                    $("input#parking").hide();
                    $("input#drawing").hide();
                    $("input#advance").hide();
                    $("input#dining").hide();
                    $("input#availability").hide();
                }
            });
            $("select#category").change(function(){
                var value = $(this).val();

                if(value=="Plot"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").hide();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bedroom").hide();
                    $("input#bathroom").hide();
                    $("input#corridor").hide();
                    $("input#kitchen").hide();
                    $("input#floor").hide();
                    $("input#parking").hide();
                    $("input#drawing").hide();
                    $("input#advance").hide();
                    $("input#dining").hide();
                    $("input#area").show();
                    $("input#road").show();
                    $("input#availability").show();
                }
                else if(value=="Apartment"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").hide();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bedroom").show();
                    $("input#bathroom").show();
                    $("input#seatType").hide();
                    $("input#corridor").show();
                    $("input#kitchen").show();
                    $("input#floor").show();
                    $("input#parking").show();
                    $("input#drawing").show();
                    $("input#advance").show();
                    $("input#dining").show();
                    $("input#area").show();
                    $("input#road").show();
                    $("input#availability").show();
                }
                else if(value=="Independent Floor"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").hide();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#seatType").hide();
                    $("input#floor").show();
                    $("input#parking").show();
                    $("input#drawing").hide();
                    $("input#advance").show();
                    $("input#dining").hide();
                    $("input#area").show();
                    $("input#road").show();
                    $("input#availability").show();
                }
                else if(value=="Independent House"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").hide();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bedroom").show();
                    $("input#bathroom").show();
                    $("input#seatType").hide();
                    $("input#corridor").show();
                    $("input#kitchen").show();
                    $("input#floor").show();
                    $("input#parking").show();
                    $("input#drawing").show();
                    $("input#advance").show();
                    $("input#dining").show();
                    $("input#area").show();
                    $("input#road").show();
                    $("input#availability").show();
                }
                else if(value=="Agriland"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").hide();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bedroom").hide();
                    $("input#bathroom").hide();
                    $("input#seatType").hide();
                    $("input#corridor").hide();
                    $("input#kitchen").hide();
                    $("input#floor").hide();
                    $("input#parking").hide();
                    $("input#drawing").hide();
                    $("input#advance").hide();
                    $("input#dining").hide();
                    $("input#area").show();
                    $("input#road").show();
                    $("input#availability").show();
                }
                else if(value=="Shop Showroom" || value=="Office Space"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").hide();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bathroom").hide();
                    $("input#seatType").hide();
                    $("input#floor").show();
                    $("input#parking").show();
                    $("input#drawing").hide();
                    $("input#advance").show();
                    $("input#dining").hide();
                    $("input#area").show();
                    $("input#road").show();
                    $("input#availability").show();
                }
                else if(value=="Boys Hostel" || value=="Girls Hostel"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").hide();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bathroom").show();
                    $("input#seatType").show();
                    $("input#floor").show();
                    $("input#parking").show();
                    $("input#drawing").show();
                    $("input#advance").show();
                    $("input#dining").show();
                    $("input#area").show();
                    $("input#road").show();
                    $("input#availability").show();
                }
                else if(value=="Residence Project" || value=="Business Project"){
                    $("select#price_flag").show();
                    $("input#price").show();
                    $("input#url").show();
                    $("select#location_flag").show();
                    $("input#address").show();
                    $("select#division").show();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bathroom").hide();
                    $("input#seatType").hide();
                    $("input#floor").hide();
                    $("input#parking").hide();
                    $("input#drawing").hide();
                    $("input#advance").hide();
                    $("input#dining").hide();
                    $("input#area").hide();
                    $("input#road").hide();
                    $("input#availability").show();
                }
                else{
                    $("select#price_flag").hide();
                    $("input#price").hide();
                    $("input#url").hide();
                    $("input#area").hide();
                    $("input#road").hide();
                    $("select#location_flag").hide();
                    $("input#address").hide();
                    $("select#division").hide();
                    $("select#district").hide();
                    $("select#city").hide();
                    $("select#partial").hide();
                    $("select#ward").hide();
                    $("input#bedroom").hide();
                    $("input#bathroom").hide();
                    $("input#seatType").hide();
                    $("input#corridor").hide();
                    $("input#kitchen").hide();
                    $("input#floor").hide();
                    $("input#parking").hide();
                    $("input#drawing").hide();
                    $("input#advance").hide();
                    $("input#dining").hide();
                    $("input#availability").hide();
                }
            });

            $('select#division').on('change', function(){
                $.ajax({
                    url     :   '{{ route('fetches.district') }}',
                    data    :   { division:$(this).val() },
                    method  :   'GET',
                    success :   function(data){
                        $('select#district').html(data);
                        $('select#district').show();
                    }
                });
            });

            $('select#district').on('change', function(){
                $.ajax({
                    url     :   '{{ route('fetches.city') }}',
                    data    :   { division:$("select#division").val(), district:$(this).val() },
                    method  :   'GET',
                    success :   function(data){
                        $('select#city').html(data);
                        $('select#city').show();
                    }
                });
            });

            $('select#city').on('change', function(){
                $.ajax({
                    url     :   '{{ route('fetches.partial') }}',
                    data    :   { division:$("select#division").val(), district:$("select#district").val(), city:$(this).val() },
                    method  :   'GET',
                    success :   function(data){
                        $('select#partial').html(data);
                        $('select#partial').show();
                    }
                });
            });

            $('select#partial').on('change', function(){
                $.ajax({
                    url     :   '{{ route('fetches.ward') }}',
                    data    :   { division:$("select#division").val(), district:$("select#district").val(), city:$("select#city").val(), partial:$(this).val() },
                    method  :   'GET',
                    success :   function(data){
                        $('select#ward').html(data);
                        $('select#ward').show();
                    }
                });
            });

    });
</script>
@endsection
