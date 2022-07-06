<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\delivery;
use App\Models\order;
use App\Models\ship;
use App\Models\order_detail;
use App\Models\star_rating;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class cartController extends Controller
{
    public function dat_hang(Request $request){
        $this->validate($request, [
            'receiver' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'location' => 'required',
        ]);
        if (Cart::count() == 0) {
            return 0;
        }
        session()->put('receiver',$request->receiver);
        session()->put('phone',$request->phone);
        session()->put('city',$request->city);
        session()->put('location',$request->location);
        return 1;
    }
    public function giohang()
    {
        // $delivery = delivery::where('city', $request->city)->first();
        // session()->put('fee', $delivery->price);
        return view('public/cart/poper')->render();
    }
    public function star_store(Request $request)
    {
        $star_rating = star_rating::where('product_id', $request->product_id)
            ->where('order_id', $request->order_id)->where('customer_id', Auth::user()->id)->first();
        if ($star_rating) {
            $star_rating->star = $request->star;
            $star_rating->save();
        } else {
            $new = new star_rating();
            $new->product_id = $request->product_id;
            $new->order_id = $request->order_id;
            $new->star = $request->star;
            $new->customer_id = Auth::user()->id;
            $new->save();
        }
    }
    public function status($id)
    {
        $order = order::find($id);
        if (Auth::user()->id == $order->user_id) {
            if ($order->status == 0) {
                $order->status = 3;
                $order->save();
            }
        }
        return redirect('/cart/history');
    }
    public function history_detail($id)
    {
        $ship = ship::where('order_id', $id)->first();
        $order = order::where('id', $id)->first();
        $order_detail = order_detail::where('order_id', $id)->with('product')->with('gallery')->orderBy('id', 'DESC')->get();
        return view('public.cart.history_detail')->with(compact('order', 'ship', 'order_detail'));
    }
    public function history()
    {
        $order = order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('public.cart.history')->with(compact('order'));
    }
    public function order(Request $request)
    {
        if (Cart::count() == 0) {
            return 0;
        }
        $order = new order();
        $order->user_id = Auth::user()->id;
        $order->status = 0;
        $order->payment_type = "Trả tiền mặt";
        $order->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $order->save();
        foreach (Cart::content() as $key => $val) {
            $order_detail = new order_detail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $val->id;
            $order_detail->quantity = $val->qty;
            $order_detail->price = $val->price;
            $order_detail->created_at = Carbon::now('Asia/Ho_Chi_Minh');;
            $order_detail->save();
        }
        $ship = new ship();
        $ship->order_id = $order->id;
        $ship->name = session()->get('receiver');
        $ship->phone = session()->get('phone');
        $ship->note = session()->get('note');
        $ship->city = session()->get('city');
        $ship->price = session()->get('fee');
        $ship->address = session()->get('location');
        $ship->save();
        session()->forget('fee');
        Cart::destroy();
        return 1;
    }
    public function delivery(Request $request)
    {
        $delivery = delivery::where('city', $request->city)->first();
        session()->put('fee', $delivery->price);
        return view('public/cart/cart_ajax')->render();
    }
    public function index()
    {
        $delivery = delivery::get();
        return view('public/cart/index')->with(compact('delivery'));
    }
    public function store(Request $request)
    {
        $Cart = Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->quantity,
            'weight' => 0,
            'options' => array(
                'image' => $request->image,
                'slug' => $request->slug,
            )
        ]);
    }
    public function update(Request $request, $rowId)
    {
        foreach (Cart::content() as $key => $val) {
            if ($val->rowId == $rowId) {
                $qty = $val->qty;
            }
        }
        if ($request->number == -1) {
            $number = $qty - 1;
        } else {
            $number = $qty + 1;
        }
        Cart::update($rowId, $number);
        return view('public/cart/cart_ajax')->render();
    }
    function delete(Request $request, $rowId)
    {
        if ($request->ajax()) {
            Cart::remove($rowId);
            return view('public/cart/cart_ajax')->render();
        }
    }
    public function vnpay(Request $request)
    {
        $Amount=0;
        foreach (Cart::content() as $key => $val) {
            $Amount+=$val->qty*$val->price;
        }
        $Amount+=session()->get('fee');
        // session(['cost_id' => Str::random(32)]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('/return-vnpay');
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $Amount* 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function return_vnpay(Request $request)
    {
        $url = session('url_prev', '/');
        if ($request->vnp_ResponseCode == "00") {
            // $this->apSer->thanhtoanonline(session('cost_id'));
            $order = new order();
            $order->user_id = Auth::user()->id;
            $order->status = 0;
            $order->payment_type = "VNPAY";
            $order->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $order->save();
            foreach (Cart::content() as $key => $val) {
                $order_detail = new order_detail();
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $val->id;
                $order_detail->quantity = $val->qty;
                $order_detail->price = $val->price;
                $order_detail->created_at = Carbon::now('Asia/Ho_Chi_Minh');;
                $order_detail->save();
            }
            $ship = new ship();
            $ship->order_id = $order->id;
            $ship->name = session()->get('receiver');
            $ship->phone = session()->get('phone');
            $ship->note = session()->get('note');
            $ship->city = session()->get('city');
            $ship->price = session()->get('fee');
            $ship->address = session()->get('location');
            $ship->save();
            session()->forget('fee');
            Cart::destroy();
            return redirect('/')->with('alert', 'Bạn đã thanh toán thành công');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
}
