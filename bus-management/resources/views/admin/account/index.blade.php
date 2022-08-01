@extends('layouts.admin')
@section('content')
                <div class="container-fluid">
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">View All Account</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Birthday</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Birthday</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                            <td>$137,500</td>
                                            <td>$137,500</td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                            <td>$137,500</td>
                                            <td>$137,500</td>
                                            <td>$137,500</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>       
@endsection