@extends('layouts.admin')

@section('content')
                <div class="d-sm-flex align-items-center mb-4">
                    <a class="h5 mb-0 mr-2 text-blue-800" href="{{url('admin/dashboard')}}">Dashboard</a> /
                    <p class="h5 mb-0 ml-2 text-gray-800">Coupon</p>
                </div>
                <div class="">
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="mt-0 font-weight-bold text-primary"><i class="fa fa-eye"> View All Coupon</i>
                                {{-- <a class=" btn btn-primary btn-sm float-right" href="{{url('admin/schedule/create')}}"><i class="fa fa-plus"> Add New Schedule</i></a> --}}
                            </h6>
                        </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Coupon Name</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Limited Quantity	</th>
                                            <th>Price Coupon</th>
                                            <th>Start Day</th>
                                            <th>Expiration Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
    
                                    <tfoot>
                                        <tr>
                                            <th>Coupon Name</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Limited Quantity	</th>
                                            <th>Price Coupon</th>
                                            <th>Start Day</th>
                                            <th>Expiration Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{url('/admin/get-all-coupon')}}',
                columns: [
                    {
                        data: 'name_coupon',
                        name: 'name_coupon'
                    },
                    {
                        data: 'coupon_code',
                        name: 'coupon_code',
                    },
                    {
                        data: 'coupon_limited_quantity',
                        name: 'coupon_limited_quantity'
                    },
                    {
                        data: 'price_coupon',
                        name: 'price_coupon',
                    },
                    {
                        data: 'valid_from',
                        name: 'valid_from',
                    },
                    {
                        data: 'valid_until',
                        name: 'valid_until',
                    },
                    {
                        data: 'status',
                        name: 'status',
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
    @if ($errors->has('name_coupon')||$errors->has('valid_from')||$errors->has('coupon_limited_quantity')||$errors->has('price_coupon')
        ||$errors->has('phone_number')||$errors->has('date_of_birth'))
        var delayInMilliseconds = 1000;
        setTimeout(function() {
        $("#exampleModal").modal('show');
        }, delayInMilliseconds);
    @endif
    </script>   
@endsection