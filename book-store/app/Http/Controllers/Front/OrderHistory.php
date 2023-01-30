<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\UserCart;
use Mail;
use Auth;
use Illuminate\Http\Request;

class OrderHistory extends Controller
{
    public function index(Request $request){
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        $categories = Category::all();
        $orders = Auth::user()->orders;
        if($orders->count()>0){
            $orders = $orders->toQuery()->orderBy('created_at','desc')->get();
        }
        if($request->get('status')!=4 && $request->get('status')!=null){
            $orders = $orders->where('status',$request->get('status'));
        }
        return view('front.account.my-order.index',compact('totalCart','categories','orders'));
    }
    public function cancel(Request $request,$id){
        $data = $request->all();
        $item = Auth::user()->orders->find($id);
        $item->update($data);
        $this->sendMail($item,$item->total);
        return back()->with('cancel','Canceled order successfully. Check email '.$item->email.' for more details.');
    }
    private function sendMail($order,$total){
        $email_to = $order->email;
        Mail::send('front.account.my-order.email-cancel',compact('order','total'),function($message) use ($email_to){
            $message->from('vuvietquyacn@gmail.com','BookStore');
            $message->to($email_to,$email_to);
            $message->subject('Order Notification');
        });
    }
}
