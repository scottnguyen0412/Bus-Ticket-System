@extends('layouts.admin')
@section('content')
                <div class="container-fluid">
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">View All Account
                                <button class=" btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal"> Create New Account</button>
                            </h6>
                        </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.account.create') }}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label @error('name') is-invalid @enderror" role="alert">Full Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name: Nguyen Van A...">
                                            @error('name')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label @error('email') is-invalid @enderror" role="alert">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com...">
                                            @error('email')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="123 Da Nang, VietNam">
                                        </div>
                                        <div class="form-group">
                                            <legend class="@error('email') is-invalid @enderror" role="alert">Choose your gender:</legend>
                                            {{-- <label for="name" class="col-form-label">Male</label> --}}
                                            <input type="radio" class="" name="gender" id="gender" value="M" {{old('gender') == 'M' ? 'checked':''}}> Male |
                                            <input type="radio" class="" name="gender" id="gender" value="F" {{old('gender') == 'F' ? 'checked':''}}> Female |
                                            <input type="radio" class="" name="gender" id="gender" value="O" {{old('gender') == 'O' ? 'checked':''}}> Other
                                            @error('gender')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number" class="col-form-label">Phone Number</label>
                                            <input type="number" class="form-control @error('phone_number') is-invalid @enderror" role="alert" name="phone_number" id="phone_number" placeholder="0123456789...">
                                            @error('phone_number')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_birth" class="col-form-label">Birthday</label>
                                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" role="alert" name="date_of_birth" id="date_of_birth">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="avatar" class="col-form-label">Avatar</label>
                                            <input type="file" name="avatar" class=" form-control @error('avatar') is-invalid @enderror" role="alert" >
                                            @error('avatar')
                                                <span class="invalid-feedback ">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="role" class="col-form-label">Role</label>
                                            <select class="form-control" name="role_id" id="role">
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Birthday</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
    
                                    <tfoot>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Birthday</th>
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
                ajax: '{{ url('/admin/get-all-account')}}',
                columns: [
                    {
                        data: 'avatar',
                        name: 'avatar'
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role',
                    },
                    {
                        data: 'gender',
                        name: 'gender',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }
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