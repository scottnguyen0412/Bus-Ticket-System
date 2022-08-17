<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Coupon;


class CouponController extends Controller
{
    public function index()
    {
        return view('admin.coupon.index');
    }

    // Show coupon
    public function getAllRowData(Request $request)
    {
        $coupon = Coupon::all();
        return Datatables::of($coupon)
            ->editColumn('action', function ($data) {
                return '';
            })
            ->rawColumns(['avatar', 'action'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }


}
