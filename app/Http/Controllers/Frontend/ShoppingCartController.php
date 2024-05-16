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
        if (strlen($request->tst_phone) < 10 || strlen($request->tst_phone) > 11) {
            Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Số điện thoại không hợp lệ'
            ]);
            return redirect()->back();
        }
        if (strlen($request->tst_name) > 255) {
            Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Tên người nhận không hợp lệ'
            ]);
            return redirect()->back();
        }
        if (strlen($request->tst_address) > 255) {
            Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Địa chỉ không hợp lệ'
            ]);
            return redirect()->back();
        }
        $amount = $request->amount;
        if ($amount == 0) {
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

        //Thanh toán bằng momo
        if ($request->submit == 2) {
            $data['tst_type'] = 2;
            $data['tst_code'] = $code;
            $latestId = $this->storeTransaction($data, 1, 2);
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = Config::get('env.momo.partner_code');
            $accessKey = Config::get('env.momo.access_key');
            $secretKey = Config::get('env.momo.secret_key');
            $orderId = $latestId . '-SA'. strtoupper(Str::random(10));
            $orderInfo = "Thanh toán qua MoMo";
            $ipnUrl = Config::get('env.momo.callback_url');
            $redirectUrl = Config::get('env.momo.callback_url');
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);
            return redirect()->to($jsonResult['payUrl']);
        }
        return redirect()->intended('/');
    }

    //store transaction to database
    public function storeTransaction($data, $status, $type)
    {
        $transaction = Trans::create([
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
        if ($transaction) {
            $shopping = Cart::content();
            foreach ($shopping as $key => $item) {
                Order::insert([
                    'od_transaction_id' => $transaction->id,
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
        Cart::destroy();
        return $transaction->id;
    }

    public function callback(Request $request)
    {
        $orderId = $request->orderId;
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/query";
        $partnerCode = Config::get('env.momo.partner_code');
        $accessKey = Config::get('env.momo.access_key');
        $secretKey = Config::get('env.momo.secret_key');
        $requestId = time()."";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=".$accessKey."&orderId=".$orderId."&partnerCode=".$partnerCode."&requestId=".$requestId;
        // echo "<script>console.log('Debug Objects: " . $rawHash . "' );</script>";

        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array('partnerCode' => $partnerCode,
            'requestId' => $requestId,
            'orderId' => $orderId,
            'requestType' => "payWithATM",
            'signature' => $signature,
            'lang' => 'vi');
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        $resultCode = $jsonResult['resultCode'];

        $explode = explode('-SA', $orderId);
        $id = $explode[0];
        $pay = Trans::where('id',$id)->first();
        if ($pay) {
            if($resultCode == 0) {
                $pay->tst_status = 2;
            } else {
                $pay->tst_status = -1;
            }
            $pay->update();
        }
        return redirect()->to('/');
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}
