<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        return view('checkout.review_order',compact('shipping_address','cart_datas','total_price'));
    }
    public function order(Request $request){
        $input_data=$request->all();
        $payment_method=$input_data['payment_method'];
        Order::create($input_data);
        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod(){
        $user_order=Order::where('users_id',Auth::id())->first();
        return view('payment.cod',compact('user_order'));
    }
    public function paypal(Request $request){
        $who_buying=Order::where('users_id',Auth::id())->first();
        return view('payment.paypal',compact('who_buying'));
    }
}
