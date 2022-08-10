@extends('layouts.admin')

@section('content')
    <div class="d-sm-flex align-items-center mb-4">
                    <a class="h5 mb-0 mr-2 text-blue-800" href="{{url('admin/dashboard')}}">Dashboard</a> /
                    <p class="h5 mb-0 ml-2 text-gray-800">Bus</p>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="">
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="mt-0 font-weight-bold text-primary"><i class="fa fa-eye"> View All Schedule</i>
                                <button class=" btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> Add New Schedule</i></button>
                            </h6>
                        </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Schedule</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- <form action="{{ route('admin.bus.create') }}" method="POST" enctype="multipart/form-data"> --}}
                                    {{-- @csrf --}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="bus_id" class="col-form-label">Bus Name*</label>
                                            <select class="form-control" name="bus_id" id="bus_id">
                                                {{-- @foreach ($user as $users) --}}
                                                    <option value=""></option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_at" class="col-form-label @error('start_at') is-invalid @enderror" role="alert">Departure Time*</label>
                                            <input type="datetime-local" class="form-control" name="start_at" id="start_at">
                                            @error('start_at')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="start_destination" class="col-form-label @error('start_destination') is-invalid @enderror" role="alert">Start Point*</label>
                                            <input type="text" class="form-control" name="start_destination" id="start_destination" placeholder="Location: Da Nang, Ha Noi, HCM...">
                                            @error('start_destination')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="destination" class="col-form-label @error('destination') is-invalid @enderror" role="alert">Destination*</label>
                                            <input type="text" class="form-control" name="destination" id="destination" placeholder="Location: Da Nang, Ha Noi, HCM...">
                                            @error('destination')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="estimated_arrival_time" class="col-form-label">Estimated Arrival Time*</label>
                                            <input type="datetime-local" class="form-control" name="estimated_arrival_time" id="estimated_arrival_time">
                                        </div>
                                        <div class="form-group">
                                            <label for="notes" class="col-form-label">Notes</label>
                                            <textarea type="text" multiple name="notes" class=" form-control @error('notes') is-invalid @enderror" role="alert"></textarea>
                                            @error('notes')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                {{-- </form> --}}
                                </div>
                            </div>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Bus Name</th>
                                            <th>Departure Time</th>
                                            <th>Start Point</th>
                                            <th>Destination</th>
                                            <th>Estimated Arrival Time</th>
                                            <th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
    
                                    <tfoot>
                                        <tr>
                                            <th>Bus Name</th>
                                            <th>Departure Time</th>
                                            <th>Start Point</th>
                                            <th>Destination</th>
                                            <th>Estimated Arrival Time</th>
                                            <th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        <div id="map"></div>
@endsection

@section('scripts')
        <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/admin/get-all-schedule')}}',
                columns: [
                    {
                        data: 'bus_id',
                        name: 'bus_id',
                    },
                    {
                        data: 'start_at',
                        name: 'start_at'
                    },
                    {
                        data: 'start_destination',
                        name: 'start_destination',
                    },
                    {
                        data: 'destination',
                        name: 'destination',
                    },
                    {
                        data: 'estimated_arrival_time',
                        name: 'estimated_arrival_time',
                    },
                    {
                        data: 'notes',
                        name: 'notes',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });
        });
    </script>
    <script>
        // var map = L.map('map').setView([16.1261,108.2376], 10);
        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        // maxZoom: 19,
        // attribution: '© OpenStreetMap'
        // }).addTo(map);
        
        // var popup = L.popup();
        // function onMapClick(e) {
        //     popup
        //     .setLatLng(e.latlng)
        //     .setContent("You clicked the map at " + e.latlng.toString())
        //     .openOn(map);
        // }
        // map.on('click', onMapClick);
        // var marker = L.marker([16.1261,108.2376]).addTo(map);
        // marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
    </script>
@endsection