<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Zarinpal\Zarinpal;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function insert(Request $request, Zarinpal $zarinpal){
        $total = 0;
        $products = [];
        $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
        foreach($userBasket as $row){
            array_push($products, [
                'details'   => Product::find($row->productId)->toArray(),
                'count'     => $row->count,
                'total'     => $row->price * $row->count,
                'day'       => $row->day,
            ]);
            $total += $row->price * $row->count;
        }
        $final = $total + 10000;
        $shipping = 10000;

        $order = new Order();
        $order->ownerId = Auth::id();
        $order->products = $products;
        $order->total = $final;
        $order->address = $request->address;
        $order->description = $request->description;
        $order->shippingFee = $shipping;
        $order->ProductFee = $total;
        $order->status = 2;
        $order->isPaid = false;
        $order->save();
        Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->delete();
        $request->session()->put('orderId', $order->_id);
        $payment = [
            'callback_url' => route('payment.verify'), 
            'amount'       => $order->total * 10,             
            'description'  => 'a short description'
        ];
        try {
          $response = $zarinpal->request($payment);
          $code = $response['data']['code'];
          $message = $zarinpal->getCodeMessage($code);
          if($code === 100) {
              $authority = $response['data']['authority'];
              return $zarinpal->redirect($authority);
          }
          $request->session()->forget('orderId');
          return view('paymentbug');
        } catch (RequestException $exception) {
            $request->session()->forget('orderId');
            return view('paymentbug');
        }
    }
    public function all(){
        $orders = Order::where('ownerId', Auth::id())->orderBy('created_at','DESC')->get();
        //dd($orders);
        return view('user.orders')->with('orders',$orders);
    }
    public function showMore(Request $request){
        $order = Order::find($request->orderId);
        return view('partials.showmore')->with('order',$order);
    }
    public function verifyPayment(Zarinpal $zarinpal,Request $request){
        $orderId = $request->session()->get('orderId');
        $request->session()->forget('orderId');
        $order = Order::find($orderId);
        $payment = [
            'authority' => $request->input('Authority'), // $_GET['Authority']
            'amount'    => $order->total * 10
        ];
        if ($request->input('Status') !== 'OK'){
            return view('paymentbug');
        } 
        try {
          $response = $zarinpal->verify($payment);
          $code = $response['data']['code'];
          $message = $zarinpal->getCodeMessage($code);
          if($code === 100) {
              $refId = $response['data']['ref_id'];
              $order->update([
                'isPaid'          => true,
                'paymentDetails'  => $refId
              ]);
              return view('success');
          }else{
              return view('paymentbug');
          }
          
        } catch (RequestException $exception) {
            return view('paymentbug');
        }
    }
}
