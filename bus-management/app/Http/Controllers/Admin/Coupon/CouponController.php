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

    public function create(Request $request)
    {
        $coupon = Coupon::create([
            'name_coupon' => $request->name_coupon,
            'coupon_code' => $this->autoRandomString(10),
            'coupon_limited_quantity' => $request->coupon_limited_quantity,
            'price_coupon' => $request->price_coupon,
            'valid_from' => $request->valid_from,
            'valid_until' => $request->valid_until,
            'status' => $request->status == TRUE?'1':'0',
        ]);
        return redirect('/admin/coupon')->with('status', 'Coupon Created Successfully');
    }

    // Random string
    private function autoRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
