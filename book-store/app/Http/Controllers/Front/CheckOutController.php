<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function index(){
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        $cartProducts = UserCart::where('user_id',Auth::id())->get();
        $user_address = Auth::user()->userAdresses->where('default',1)->first();
        if($user_address==null){
            return redirect('./account/address/create')->with('notification','Need 1 more address to receive goods!');
        }
        return view('front.checkout.index',compact('cartProducts','totalCart','user_address'));
    }
    public function checkout(Request $request){
        $type_payment = $request->get('payment-method');
        $user_address_id = Auth::user()->userAdresses->where('default',1)->first();
        if($user_address_id==null){
            return redirect('./account/address/create')->with('notification','Need 1 more address to receive goods!');
        }
        if($type_payment=='pay_later'){
            $newOrder = Order::create([
                'user_id'=>Auth::id(),
                'payment_type'=>$type_payment,
                'email'=>$user_address_id->email,
                'status'=>0,
                'user_address_id'=>$user_address_id->id
            ]);
            $cartItems = Auth::user()->cart;
            foreach ($cartItems as $cartItem){
                $cartItem['order_id']=$newOrder->id;
                OrderDetail::create([
                    'order_id'=>$newOrder->id,
                    'product_id'=>$cartItem->product_id,
                    'qty'=>$cartItem->qty,
                    'total'=>$cartItem->total,
                    'amount'=>$cartItem->total
                ]);
            }
            $this->sendMail($newOrder,$cartItem->total);
            UserCart::where('user_id',Auth::id())->delete();

            return redirect('./cart')->with('notification','Order confirmation successful. We have sent you an order confirmation email!');
        }

    }

    private function sendMail($order,$total){
        $email_to = $order->email;
        Mail::send('front.checkout.email',compact('order','total'),function($message) use ($email_to){
            $message->from('vuvietquyacn@gmail.com','BookStore');
            $message->to($email_to,$email_to);
            $message->subject('Order Notification');
        });
    }

}
