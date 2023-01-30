<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\UserAdress;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        $categories = Category::all();
        $addresses = UserAdress::where('user_id',Auth::id())->orderBy('default','desc')->get();
        return view('front.account.address.index',compact('totalCart','categories','addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        return view('front.account.address.create',compact('categories','totalCart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        if(isset($data['default']) || count(Auth::user()->userAdresses)==0){
            $data['default']=1;
            UserAdress::where('user_id',Auth::id())->update(['default'=>0]);
        }else{
            $data['default']=0;
        }

        UserAdress::create($data);
        return redirect('./account/address');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $totalCart = UserCart::where('user_id',Auth::id())->sum('total');
        $address = UserAdress::find($id);
        return view('front.account.address.edit',compact('categories','totalCart','address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(isset($data['default'])){
            $data['default']=1;
            UserAdress::where('user_id',Auth::id())->update(['default'=>0]);
        }else{
            $data['default']=0;
        }
        UserAdress::where('id',$id)->update($data);
        return redirect('./account/address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address =  UserAdress::find($id);
        if($address->default==1 && Auth::user()->userAdresses->count()>1){
            $setAddressDefault =  Auth::user()->userAdresses->where('default',0)->first();
            $setAddressDefault->default = 1;
            $setAddressDefault->save();
        }
        $address->delete();
        return  redirect('./account/address');
    }
}
