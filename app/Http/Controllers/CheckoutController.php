<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Carts;
use App\Models\District;
use App\Models\Province;
use App\Models\Voucher;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thanh toán');
        }
        $provinces = Province::all();

        $user = Auth::user();

        $id_user = auth()->id();
        $carts = Carts::where('id_user', $id_user)->get();

        $sub_total = 0;
        foreach ($carts as $prods) {
            $sub_total += $prods->total;
        }

        return view('components.checkout', compact('user', 'provinces', 'carts', 'sub_total'));
    }

    public function getDistrictsByProvince(Request $request)
    {
        $districts = District::where('province_code', $request->province_id)->get();
        return response()->json($districts);
    }


    public function getWardsByDistrict(Request $request)
    {
        $wards = Ward::where('district_code', $request->district_id)->get();
        return response()->json($wards);
    }

    public function calculateShipping(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'pick_province' => 'required|string',
            'pick_district' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'address' => 'required|string',
            'weight' => 'required|integer',
            'transport' => 'required|string',
            'deliver_option' => 'required|string',
        ]);


        // API Endpoint
        $url = 'https://services.giaohangtietkiem.vn/services/shipment/fee';

        // API request
        $response = Http::withHeaders([
            'Token' => '932d278d284dfee79665387098bc2244d9dc2ac5',
        ])->get($url, $validated);

        if ($response->ok()) {
            $data = $response->json();
            return response()->json([
                'success' => true,
                'fee' => $data['fee'] ?? 'Không xác định'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Không thể tính phí vận chuyển',
            ]);
        }
    }


    public function applyVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher');
        $cartTotal = $request->input('cart_total');
        $shippingFee = $request->input('shipping_fee');
        $voucher = Voucher::where('code', $voucherCode)->first();

        if ($voucher && $voucher->is_valid) {
            $discount = $voucher->discount;
            $newTotal = ($cartTotal + $shippingFee) - (($cartTotal + $shippingFee) * ($discount / 100));

            return response()->json([
                'success' => true,
                'new_total' => number_format($newTotal, 0, ',', '.')
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Mã khuyến mãi không hợp lệ']);
        }
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'address' => 'required',
            'shipping' => 'required',
            'payment_method' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'note_order' => 'nullable|string',
        ], [
            'province.required' => 'Vui lòng chọn tỉnh/thành phố.',
            'district.required' => 'Vui lòng chọn quận/huyện.',
            'ward.required' => 'Vui lòng chọn xã/phường.',
            'address.required' => 'Vui lòng nhập số nhà, tên đường.',
            'shipping.required' => 'Vui lòng chọn phương thức giao hàng.',
            'payment_method.required' => 'Vui lòng chọn phương thức thanh toán.',
            'name.required' => 'Vui lòng nhập họ và tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
        ]);

        try {
            $id_bill = Str::random(8) . time();
            $cart = Carts::where('id_user', Auth::id())
                ->select('id_product', 'name_product', 'price', 'img', 'quantity', 'total')
                ->get();

            $province = Province::where('code', $request->province)->first();
            $district = District::where('code', $request->district)->first();
            $ward = Ward::where('code', $request->ward)->first();

            if (!$province || !$district || !$ward) {
                return response()->json(['error' => 'Thông tin địa chỉ không hợp lệ.'], 400);
            }

            $address = $request->address;

            $bill = new Bills();
            $bill->id_bill = $id_bill;
            $bill->id_user = Auth::id();
            $bill->status = 1;
            $bill->product = $cart;
            $bill->name = $request->name;
            $bill->email = Auth::user()->email;
            $bill->phone = $request->phone;
            $bill->address = $address . ',' . $ward->name . ',' . $district->name . ',' . $province->name;
            $bill->totalfinal = $request->totalorder;
            $bill->ship = $request->shipping;
            $bill->shipping_units = 'Giao hàng tiết kiệm';
            $bill->mavandon = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
            $bill->payment_methods = $request->payment_method;
            $bill->note_order = $request->note_order;
            $bill->save();

            Carts::where('id_user', Auth::id())->delete();

            return redirect()->route('checkout.orderSuccess')->with([
                'order_id' => $id_bill,
                'total' => $request->totalorder,
                'payment_date' => now()->format('d/m/Y H:i:s'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đã xảy ra lỗi trong quá trình đặt hàng.'], 500);
        }
    }


    public function checkout_success()
    {
        return view('components.checkout_success');
    }
}
