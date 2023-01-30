<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\UserCart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        $categories = Category::all();
        $authors  = Author::limit(4)->get();
        $products = Product::all();
        return view('front.index',compact('categories','authors','products','totalCart'));
    }
}
