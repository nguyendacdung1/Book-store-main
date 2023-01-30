<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        $categories = Category::all();
        $cart_products = Auth::user()->cart;
        return view('front.shop.cart',compact('categories','cart_products','totalCart'));
    }

    public function add($id){
        $userId = Auth::id();
        $data=[
            'user_id'=>$userId,
            'product_id'=>$id,
            'price'=>Product::find($id)->price,
            'total'=>Product::find($id)->price,
            'qty'=>1
        ];
        if(count(Auth::user()->cart->where('product_id',$id))>0){
            $cart = Auth::user()->cart->where('product_id',$id)->first();
            $cart->qty = $cart->qty+1;
            $cart->total = $cart->qty*$cart->price;
            $cart->save();
            return 0;
        }
        $cart = UserCart::create($data);
        return 1;
    }
    public function delete($id){
        UserCart::find($id)->delete();
        return 1;
    }

    public  function update(Request $request){
        $id = $request->id;
        $itemCart = UserCart::find($id);
        $itemCart->qty = $request->qty;
        $itemCart->total = $request->qty * $itemCart->price;
        $itemCart->save();
        return back();
    }
    public function postAdd(Request $request){
        $id = $request->id;
        $userId = Auth::id();
        $data=[
            'user_id'=>$userId,
            'product_id'=>$id,
            'qty'=>$request->qty,
            'price'=>Product::find($id)->price,
            'total'=>Product::find($id)->price
        ];
        if(count(Auth::user()->cart->where('product_id',$id))==0){
            $cart = UserCart::create($data);
        }else{
            $cart = Auth::user()->cart->where('product_id',$id)->first();
            $cart->qty = $cart->qty+1;
            $cart->total = $cart->qty*$cart->price;
            $cart->save();
        }
        return redirect('./cart');
    }
}
