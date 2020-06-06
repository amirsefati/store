<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function logout_system(){
        Auth::logout();
        return redirect('/signin');
    }
    
    public function islogin(Request $request){
        if(Auth::user()){
            return '100';
        }else{
            return 0;
        }
    }
    public function login_attemp(Request $request){
        $phone = $request->data['phone'];
        $pass= $request->data['pass'];

        if(User::where('phone',$phone)->first()){
            if(User::where('phone',$phone)->where('pass',$pass)->first()){
                $id = User::where('phone',$phone)->first('id');
                Auth::login($id,true);
                return '100';
            }else{
                return '104';
            }
        }else{
            return '103';
        }
    }
    public function send_sms(Request $request){
        $phone = $request->data['phone'];
        $name = $request->data['name'];

        if(User::where('phone',$phone)->first()){
            return '105';
        }else{
            $password = rand(123000,987654);
            User::create([
                'name'=>$name,
                'phone'=>$phone,
                'pass'=>$password
            ]);
            return '100';
        }
    }
    public function verify_sms_register(Request $request){
        $phone = $request->data['phone'];
        $pass = $request->data['pass'];
        
        if(User::where('phone',$phone)->where('pass',$pass)->first())
        {
            $id = User::where('phone',$phone)->first('id');
            Auth::login($id,true);
            return '100';
        }else{  
            return '106';
        }
    }
    public function whologin(Request $request){
        $id = Auth::user()->id;
        $data = User::where('id',$id)->first();
        return ['id'=>$id,'data'=>$data];
    }
    
    public function load(Request $request){
        $user_id = $request->data['user_id'];
        $store_id = $request->data['store_id'];

        $cache = Cart::where('user_id',$user_id)->where('store_id',$store_id)->get();

        $store = Store::where('id',$store_id)->first();
        $items = json_decode($store->items,true);

        $info = [
            'items' => $items,
            'name' => $store->name,
            'desc' => $store->desc,
            'img' => $store->icon_url,
            'cache' => $cache
        ];
        return $info;
    }

    public function update_cart(Request $request){
        $user_id = $request->data['user_id'];
        $store_id = $request->data['store_id'];
        $item_id = $request->data['item_id'];
        $quantity = $request->data['quantity'];

        if(Cart::where('item_id',$item_id)->where('store_id',$store_id)->where('user_id',$user_id)->first()){
            Cart::where('item_id',$item_id)->where('store_id',$store_id)->where('user_id',$user_id)->update([
                'user_id' => $user_id,
                'store_id' => $store_id,
                'item_id' => $item_id,
                'quantity' => $quantity
            ]);
        }else{
            Cart::create([
                'user_id' => $user_id,
                'store_id' => $store_id,
                'item_id' => $item_id,
                'quantity' => $quantity
            ]);
        }
    }
}
