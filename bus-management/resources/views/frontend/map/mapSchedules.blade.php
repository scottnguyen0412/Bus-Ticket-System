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
                                <label for="exampleFormControlInput1">Quantiy of seats</label>
                                <input type="number" min="0" name="choose_seats" 
                                            value="{{request()->input('choose_seats')}}"
                                            placeholder="Quantity of seats" 
                                            class="form-control text-secondary rounded border border-success font-weight-bold choose_seats" readonly>
                            </div>
                            {{-- <div class="form-group">
                                
                            </div> --}}
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
                            <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div>
                        <div class="card-header text-white bg-primary font-weight-bold rounded-top">Detail Place (Pick up & Drop off)</div>
                        <div id="map">
                        </div>
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