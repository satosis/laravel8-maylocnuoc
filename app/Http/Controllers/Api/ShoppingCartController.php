<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction as Trans;
use Auth;
use Cart;
use Config;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Notification;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PPConnectionException;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

/** All Paypal Details class **/
class ShoppingCartController extends Controller
{
    public function __construct()
    {
        //paypal
        $paypal_conf = Config::get('paypal');
        $this->apiContext = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->apiContext->setConfig($paypal_conf['settings']);
    }

    public function index()
    {
        $category = Category::all();
        $shopping = Cart::content();
        $total = 0;
        $viewData = [
            'total' => $total,
            'category' => $category,
            'shopping' => $shopping
        ];
        return response()->json($viewData);
    }

    public function add($id)
    {
        $product = Product::find($id);
        if (!$product) return false;
        $cart = Cart::add([
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
        return $cart;
        return true;
    }

    public function delete($rowId)
    {
        Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Xóa thành công'
        ]);
        Cart::remove($rowId);
        return true;
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
            return response()->json([
                'messages' => 'Cập nhật thành công',
                'totalMoney' => Cart::subtotal(0),
                'totalItem' => number_price($product->pro_price * $qty, $product->pro_sale, 0, ', ', '.'),
                'number' => Cart::count()
            ]);
        }
    }

    public function postPay(Request $request)
    {
        $data = $request->except('_token', 'submit');
        //Thanh toán khi nhận hàng
        if ($request->submit == 1) {
            $this->storeTransaction($data, 1, 1);
        }

        //Thanh toán bằng paypal
        if ($request->submit == 2) {
            $data['tst_type'] = 2;
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $shopping = Cart::content();
            $listItem = [];
            foreach ($shopping as $key => $list) {
                $item = new Item();
                $item->setName($list->name)
                    ->setCurrency('USD')
                    ->setQuantity($list->qty)
                    ->setPrice($list->price * $list->qty / 23000);
                array_push($listItem, $item);
            }

            $item_list = new ItemList();
            $item_list->setItems($listItem);
            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($request->amount / 23000);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('/'))/** Specify return URL **/
            ->setCancelUrl(URL::to('/'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            try {
                $payment->create($this->apiContext);
                $data['tst_code'] = $payment->id;
                $this->storeTransaction($data, 5, 2);
            } catch (PPConnectionException $ex) {
                if (Config::get('app.debug')) {
                    Session::flash('toastr', [
                        'type' => 'error',
                        'message' => 'Quá thời gian kết nối'
                    ]);
                    return false;
                } else {
                    Session::flash('toastr', [
                        'type' => 'error',
                        'message' => 'Đã xảy ra lỗi ,xin lỗi vì sự bất tiện này'
                    ]);
                    return false;
                }
            }

            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            /** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());

            if (isset($redirect_url)) {
                return Redirect::away($redirect_url);
            }

            Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Lỗi không xác định'
            ]);
            return false;
        }
        return true;
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
            // Mail::to($data['tst_email'])->send(new TransactionSuccess($shopping));
            foreach ($shopping as $key => $item) {
                Order::insert([
                    'od_transaction_id' => $transactionId->id,
                    'od_product_id' => $item->id,
                    'od_sale' => $item->options->sale,
                    'od_qty' => $item->qty,
                    'od_price' => $item->price
                ]);
                //Tăng số lượt mua của sản phẩm
                DB::table('products')
                    ->where('id', $item->id)
                    ->increment("pro_pay");
                DB::table('products')
                    ->where('id', $item->id)
                    ->decrement("pro_amount");
            }
        }

        Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Đặt hàng thành công'
        ]);
        Cart::destroy();
        return true;
    }

    //check status payment of paypal
    public function getPaymentStatus()
    {
        $request = request();//try get from method

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        //if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        if (empty($request->PayerID) || empty($request->token)) {
            Session::put('error', 'Thanh toán thất bại');
            return Redirect::to('/');
        }

        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        //$execution->setPayerId(Input::get('PayerID'));
        $execution->setPayerId($request->PayerID);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {

            Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Thanh toán thành công'
            ]);
            //add update record for cart
            return false; //back to product page

        }
        Session::put('error', 'Thanh toán thất bại');
        return false;

    }

    public function orders(Request $request, $status)
    {
        $category = Category::all();
        $transaction = Trans::where('tst_user_id', Auth::user()->id)
            ->where('tst_status', '!=', '5')
            ->select('transactions.*', 'products.*', 'orders.*', 'products.id as pro_id', 'transactions.created_at as time', 'transactions.id as trans_id',)
            ->leftJoin('orders', 'orders.od_transaction_id', 'transactions.id')
            ->leftjoin('products', 'products.id', 'orders.od_product_id')
            ->orderBy('transactions.id', 'desc');
        if ($status != 0) {
            $transaction->where('tst_status', $status);
        }
        $transaction = $transaction->paginate(15);
        $defaultTransaction = Trans::where('tst_status', '1')->where('tst_user_id', Auth::user()->id)->count();
        $allTransaction = Trans::where('tst_status', '!=', '5')->where('tst_user_id', Auth::user()->id)->count();
        $deletedTransaction = Trans::where('tst_status', '-1')->where('tst_user_id', Auth::user()->id)->count();
        $successTransaction = Trans::where('tst_status', '3')->where('tst_user_id', Auth::user()->id)->count();
        $processTransaction = Trans::where('tst_status', '2')->where('tst_user_id', Auth::user()->id)->count();
        $viewData = [
            'status' => $status,
            'category' => $category,
            'transaction' => $transaction,
            'allTransaction' => $allTransaction,
            'defaultTransaction' => $defaultTransaction,
            'deletedTransaction' => $deletedTransaction,
            'successTransaction' => $successTransaction,
            'processTransaction' => $processTransaction,
        ];
        return response()->json($viewData);
    }
}
