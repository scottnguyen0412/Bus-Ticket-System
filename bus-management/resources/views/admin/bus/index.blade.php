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
                            <h6 class="mt-0 font-weight-bold text-primary"><i class="fa fa-eye"> View All Bus</i>
                                <button class=" btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> Add New Bus</i></button>
                            </h6>
                        </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Bus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.bus.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="bus_name" class="col-form-label @error('bus_name') is-invalid @enderror" role="alert">Bus Name*</label>
                                            <input type="text" class="form-control" name="bus_name" id="bus_name" placeholder="Enter Bus Name...">
                                            @error('bus_name')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bus_number" class="col-form-label @error('bus_number') is-invalid @enderror" role="alert">Bus Number(license plates)*</label>
                                            <input type="text" class="form-control" name="bus_number" id="bus_number" placeholder="Example: 43-C122345">
                                            @error('bus_number')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <legend class="@error('bus_status') is-invalid @enderror" role="alert">Status*</legend>
                                            <input type="checkbox" class="" name="bus_status" id="bus_status"> Checked=Shown/Not Checked=Not Shown
                                            @error('bus_status')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="number_of_seats" class="col-form-label">Amount of Seats*</label>
                                            <input type="number" class="form-control" name="number_of_seats" id="number_of_seats" placeholder="Enter amount of seat in bus">
                                        </div>
                                        <div class="form-group">
                                            <label for="image_bus" class="col-form-label">Image Bus*</label>
                                            <input type="file" multiple name="image_bus[]" class=" form-control @error('image_bus') is-invalid @enderror" role="alert" >
                                            @error('avatar')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="driver" class="col-form-label">Driver</label>
                                            <select class="form-control" name="driver_id" id="driver">
                                                @foreach ($user as $users)
                                                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Bus Name</th>
                                            <th>Bus Number(license plates)</th>
                                            <th>Bus Status</th>
                                            <th>Amount of Seats</th>
                                            <th>Image of Bus</th>
                                            <th>Driver</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
    
                                    <tfoot>
                                        <tr>
                                            
                                            <th>Bus Name</th>
                                            <th>Bus Number(license plates)</th>
                                            <th>Bus Status</th>
                                            <th>Amount of Seats</th>
                                            <th>Image of Bus</th>
                                            <th>Driver</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('scripts')

{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/admin/get-all-bus')}}',
                columns: [
                    {
                        data: 'bus_name',
                        name: 'bus_name',
                    },
                    {
                        data: 'bus_number',
                        name: 'bus_number',
                    },
                    {
                        data: 'bus_status',
                        name: 'bus_status'
                    },
                    {
                        data: 'number_of_seats',
                        name: 'number_of_seats',
                    },
                    {
                        data: 'image_bus',
                        name: 'image_bus',
                    },
                    {
                        data: 'driver_id',
                        name: 'driver_id',
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
    @if ($errors->has('name')||$errors->has('email')||$errors->has('avatar')||$errors->has('gender')
        ||$errors->has('phone_number')||$errors->has('date_of_birth'))
        var delayInMilliseconds = 1000;
        setTimeout(function() {
        $("#exampleModal").modal('show');
        }, delayInMilliseconds);
    @endif
</script>   
@endsection