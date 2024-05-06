<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction as Trans;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Notification;
use Redirect;
use Session;
use URL;
use Illuminate\Support\Facades\Config;
use Str;

class ShoppingCartController extends Controller
{

    public function index()
    {
        $category = Category::all();
        $shopping = Cart::content();
        $total = 0;
        $viewData = [
            'total' => $total,
            'category' => $category,
            'title_page' => 'Giỏ hàng'
        ];
        return view('layout.pages.cart.index', $viewData, compact('shopping'));
    }

    public function add(Request $request, $id)
    {
        $type = $request->type;
        $product = Product::find($id);
        if (!$product) return redirect()->to('/');
        Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $product->pro_price,
            'weight' => '1',
            'options' => [
                'image' => $product->pro_avatar,
                'sale' => $product->pro_sale,
            ]
        ]);
        if ($type == 2) {
        return redirect()->route('get.shopping.index');
    }
        return redirect()->back();
    }

    public function delete($rowId)
    {
        Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Xóa thành công'
        ]);
        Cart::remove($rowId);
        return redirect()->back();
    }

    //update cart
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $qty = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            if (!$product) return response(['messages' => 'Không tồn tại sản phẩm']);

            if ($product->pro_amount < $qty) {
                return response([
                    'messages' => 'Hiện tại chúng tôi không đủ số lượng',
                    'error' => true
                ]);
            }
            Cart::update($id, $qty); //update the quantity
            return response([
                'messages' => 'Cập nhật thành công',
                'totalMoney' => Cart::subtotal(0),
                'totalItem' => number_price($product->pro_price * $qty, $product->pro_sale, 0, ',', '.'),
                'number' => Cart::count()
            ]);
        }
    }

    public function postPay(Request $request)
    {
        $data = $request->except('_token', 'submit');
        if ($request->amount == 0) {
            Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Giỏ hàng không có sản phẩm nào'
            ]);
            return redirect()->back();
        }
        $code = 'SA'. strtoupper(Str::random(10));
        //Thanh toán khi nhận hàng
        if ($request->submit == 1) {
            $this->storeTransaction($data, 1, 1);
        }

        //Thanh toán bằng vnpay
        if ($request->submit == 2) {
            $data['tst_type'] = 2;
            $data['tst_code'] = $code;
            $this->storeTransaction($data, 1, 2);
            $vnp_TmnCode = Config::get('env.vnpay.code');
            $vnp_HashSecret = Config::get('env.vnpay.secret');
            $vnp_Url = Config::get('env.vnpay.url');
            $vnp_Returnurl = Config::get('env.vnpay.callback');
            $vnp_TxnRef = $code;
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $request->amount * 100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();
            $startTime = date("YmdHis");
            $inputData = array(
                "vnp_Version" => "2.1.0",
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
                "vnp_ExpireDate"=> date('YmdHis',strtotime('+15 minutes',strtotime($startTime)))
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
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            return redirect()->to($vnp_Url);
        }
        return redirect()->intended('/');
    }

    //store transaction to database
    public function storeTransaction($data, $status, $type)
    {
        $transactionId = Trans::create([
            'tst_user_id' => Auth::id(),
            'tst_total_money' => $data['amount'],
            'tst_name' => $data['tst_name'],
            'tst_email' => $data['tst_email'],
            'tst_phone' => $data['tst_phone'],
            'tst_address' => $data['tst_address'],
            'tst_note' => $data['tst_note'],
            'tst_code' => $data['tst_code'] ?? '',
            'tst_status' => $status,
            'tst_type' => $type,
        ]);
        if ($transactionId) {
            $shopping = Cart::content();
            foreach ($shopping as $key => $item) {
                Order::insert([
                    'od_transaction_id' => $transactionId->id,
                    'od_product_id' => $item->id,
                    'od_sale' => $item->options->sale,
                    'od_qty' => $item->qty,
                    'od_price' => $item->price
                ]);
                //Tăng số lượt mua của sản phẩm
                $product = Product::find($item->id);
                $product->pro_pay = $product->pro_pay + 1;
                $product->pro_amount = $product->pro_amount - $item->qty;
            }
        }

        Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Đặt hàng thành công'
        ]);
        // Cart::destroy();
        return 1;
    }

    public function callback(Request $request)
    {
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        $vnp_TmnCode = Config::get('env.vnpay.code');
        $vnp_TransactionDate = $request->vnp_PayDate;
        $vnp_HashSecret = Config::get('env.vnpay.secret');
        $vnp_RequestId = rand(1,10000);
        $vnp_Command = "querydr";
        $vnp_TxnRef = $request->vnp_TxnRef;
        $vnp_OrderInfo = "Query transaction";
        $vnp_CreateDate = date('YmdHis');
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $datarq = array(
            "vnp_RequestId" => $vnp_RequestId,
            "vnp_Version" => "2.1.0",
            "vnp_Command" => $vnp_Command,
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            //$vnp_TransactionNo= ;
            "vnp_TransactionDate" => $vnp_TransactionDate,
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_IpAddr" => $vnp_IpAddr
        );

        $format = '%s|%s|%s|%s|%s|%s|%s|%s|%s';

        $dataHash = sprintf(
            $format,
            $datarq['vnp_RequestId'], //1
            $datarq['vnp_Version'], //2
            $datarq['vnp_Command'], //3
            $datarq['vnp_TmnCode'], //4
            $datarq['vnp_TxnRef'], //5
            $datarq['vnp_TransactionDate'], //6
            $datarq['vnp_CreateDate'], //7
            $datarq['vnp_IpAddr'], //8
            $datarq['vnp_OrderInfo']//9
        );

        $checksum = hash_hmac('SHA512', $dataHash, $vnp_HashSecret);
        $datarq["vnp_SecureHash"] = $checksum;
        $txnData = $this->callAPI_auth("POST", $apiUrl, json_encode($datarq));
        $ispTxn = json_decode($txnData, true);
        $pay = Trans::where('tst_code', $request->vnp_TxnRef)->first();
        if ($pay) {
            if($ispTxn['vnp_ResponseCode'] == "00") {
                $pay->tst_status = 2;
            } else {
                $pay->tst_status = -1;
            }
            $pay->update();
        }
        return redirect()->to('/');
    }

    public function callAPI_auth($method, $url, $data) {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }
}
