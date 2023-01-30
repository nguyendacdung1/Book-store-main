<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\SearchHistory;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request){
        $totalCart = UserCart::where('user_id',Auth::id()??1)->sum('total');
        $search = $request->get('search');
        $categories = Category::all();
        $authors  = Author::all();
        $author = Author::find($request->author);
        $products = Product::where('name','like','%'.$search.'%');
        $products = $this->filter($products,$request);

        if($search!=null && Auth::id()){
            $searches_by_key = SearchHistory::where('search',$search)->where('user_id',Auth::id());
            if(count($searches_by_key->get())>0){
                $searches_by_key->delete();
            }
            SearchHistory::create([
                'user_id'=>Auth::id(),
                'search'=>$search
            ]);
        }
        return view('front.shop.index',compact('categories','authors','products','author','totalCart'));
    }
    public function show($id){
        $categories = Category::all();
        $totalCart = UserCart::where('user_id',Auth::id()??1)->sum('total');
        $product = Product::find($id);
        $suggest_products = Product::where('author_id',$product->author_id)->take(6)->get();
        return view('front.shop.show',compact('categories','totalCart','product','suggest_products'));
    }

    public function category(Request $request,$categoryName){
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        $author = Author::find($request->get('author'));
        $categoryId = Category::where('name',$categoryName)->first()->id;
        $products = Product::where('product_category_id',$categoryId);
        $authors = Author::all();
        $categories = Category::all();
        $products = $this->filter($products,$request);

        return view('front.shop.index',compact('products','categories','authors','author','totalCart'));
    }

    protected function filter($products,$request){
        $priceMin = $request->price_min;
        $priceMax = $request->price_max;
        $author = $request->author;
        //Price
        $products = ($priceMax!=null && $priceMin!=null) ? $products->whereBetween('price',[$priceMin,$priceMax]) : $products;
        //Author
        $products =($author!=0 && $author!=null) ? $products->where('author_id',$request->author) : $products;

        $products = $products->paginate(5);
        $products->appends(['price_min'=>$priceMin,'price_max'=>$priceMax,'author'=>$request->author]);
        return $products;
    }
    public function postComment(Request $request,$id){
        $data = $request->all();
        $data['product_id'] = $id;
        $data['user_id']=Auth::id();
        ProductComment::create($data);
        return back()->with('thank','Thanks for your feedback');
    }

}
