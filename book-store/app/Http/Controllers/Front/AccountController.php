<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;
use function Sodium\compare;

class AccountController extends Controller
{
    public function checkLogin(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' =>$request->password,
            'level' => [1,2] //Tk cấp độ bình thường
        ];
        $remember = $request->remember;

        if(Auth::attempt($credentials,$remember)){
            return redirect()->intended();
        }else{
            return back()->with('notification','Wrong login information');
        }

    }
    public function logout(){
        Auth::logout();
        return back();
    }
    public function register(Request $request){
        if($request->password==$request->re_password){
            $data = [
                'name' => $request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'level'=>2
            ];
            User::create($data);
            return redirect('./');
        }else{
            return back()->with(['register'=>'Entered password does not match']);
        }
    }
}
