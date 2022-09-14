@extends('layouts.frontend')
@section('custom-css')
    
@endsection
@section('content')
    <div class="hero-wrap js-fullheight image_container"
	style="background-image: url('https://images.pexels.com/photos/21014/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); ">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Show Map</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Location</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-md-last ftco-animate">
                    <a class="btn rounded text-white" style="background:#2F3C7E" href="{{url('/schedules')}}"><i class="fa-solid fa-square-caret-left"></i> Back</a>
                    <div class="card mt-2">
                        <div class="card-body mt-2">
                            <form method="Post" action="{{url('/booking')}}">
                            @csrf
                            <h5 class="card-title font-weight-bold text-center">Detail Booking</h5>
                            <div class="form-group">
                                <input type="hidden" name="schedule_id" value="{{$schedule->id}}"/>
                            </div>
                            <div class="form-group">
                                <label>Bus Name</label>
                                <input type="text" class="form-control" placeholder="bus name" value="{{$schedule->bus->bus_name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quantiy of seats</label>
                                <input type="number" min="0" name="choose_seats" 
                                            value="{{request()->input('choose_seats')}}"
                                            placeholder="Quantity of seats" 
                                            class="form-control text-secondary rounded border border-success font-weight-bold choose_seats" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Start Destination</label>
                                <input type="text" id="start_dest" name="start_dest" class="form-control" 
                                    value="{{$schedule->start_dest->name}}"
                                    autocomplete="off" placeholder="Date" readonly>
                            </div>
                            <div class="form-group">
                                <label>Destination</label>
                                <input type="text" id="dest" name="dest" class="form-control" 
                                    value="{{$schedule->destination->name}}"
                                    autocomplete="off" placeholder="Date" readonly>
                            </div>
                            <div class="form-group">
                                <label>Estimated Arrival Time</label>
                                <input type="text" value="{{$schedule->estimated_arrival_time}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="datetime-local" id="start_day" name="start_day" class="form-control" 
                                    value="{{$schedule->start_at}}"
                                    autocomplete="off" placeholder="Date" readonly>
                            </div>

                            <button type="submit" class="btn btn-success">Next</button>
                            @php $total = 0; @endphp
                            @php $total =  request()->input('choose_seats') * $schedule->price_schedules; @endphp
                            </form>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9">
                    <div>
                        <div class="card-header text-white bg-primary font-weight-bold rounded-top">Detail Place (Pick up & Drop off)</div>
                        <div id="map">
                        </div>
                        <hr/>
                            <form action="{{url('/check-coupon-code')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                        Coupon Code
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control coupon_code" placeholder="Enter Coupon Code" name="coupon_code">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary apply_coupon_code_btn" type="submit">Apply</button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                            @if(Session::get('coupon'))
                                <a class="btn btn-primary" href="{{url('/remove-coupon')}}">Remove Coupon</a>
                            @endif
                        <ul>
                            <li>Total Price: <span>{{number_format($total,0,',','.')}}</span></li>
                                @if(Session::get('coupon'))
                                    <li>
                                        @foreach (Session::get('coupon') as $key => $count)
                                            Coupon: {{number_format($count['price_coupon'],0,',','.')}} USD
                                            <p>
                                                @php
                                                $total_coupon = $total-$count['price_coupon'];
                                                @endphp
                                            </p>
                                            <p><li>Total amount after applying coupon: {{number_format($total_coupon,0,','.'.')}} USD</li></p>
                                        @endforeach
                                    </li>
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

<script>
        var mapCenter = [{{ config('leaflet.map_center_latitude') }},
                    {{ config('leaflet.map_center_longitude') }},
                ];
        var map = L.map('map').setView(mapCenter,{{ config('leaflet.detail_zoom_level') }});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);
        var routing = L.Routing.control({
            waypoints: [
                L.latLng({{$schedule->start_dest->latitude}}, {{$schedule->start_dest->longitude}}),
                L.latLng({{$schedule->destination->latitude}}, {{$schedule->destination->longitude}})
            ]
            }).addTo(map);

        // Get Km and time
        routing.on('routesfound', function(e) {
            var routes = e.routes;
            var summary = routes[0].summary;
            var time = routes[0].summary;
            // alert time and distance in km and minutes
            console.log('Total distance is ' + summary.totalDistance / 1000 + ' km and total time is ' + Math.floor(time.totalTime / 3600) +"h"+ Math.floor(time.totalTime % 3600 / 60) + ' minutes');
            });
        // Show name and address of start destination 
        axios.get('{{ route('api.places.index') }}')
            .then(function (response) {
                //console.log(response.data);
                L.geoJSON(response.data,{
                    pointToLayer: function(geoJsonPoint,latlng) {
                        return L.marker(latlng);
                    }
                })
                .bindPopup(function(layer) {
                    //return layer.feature.properties.map_popup_content;
                    return ('<div class="my-2"><strong>Start Destination Name</strong>: '+layer.feature.properties.name+'<div class="my-2"><strong>Address</strong>: '+layer.feature.properties.address+'</div>');
                }).addTo(map);
                // console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
            // Show name and address of destination
             axios.get('{{ route('api.destination.index') }}')
            .then(function (response) {
                //console.log(response.data);
                L.geoJSON(response.data,{
                    pointToLayer: function(geoJsonPoint,latlng) {
                        return L.marker(latlng);
                    }
                })
                .bindPopup(function(layer) {
                    //return layer.feature.properties.map_popup_content;
                    return ('<div class="my-2"><strong>Destination Name</strong>: '+layer.feature.properties.name+'<div class="my-2"><strong>Address</strong>: '+layer.feature.properties.address+'</div>');
                }).addTo(map);
                // console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });

        
</script>
@endsection