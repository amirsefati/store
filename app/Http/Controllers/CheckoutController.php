<?php

namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function getdata_checkout(Request $request){
        $user_id = Auth::user()->id;
        $data_user = User::where('id',$user_id)->first();
        $cart = Cart::where('user_id',$user_id)->get();
        $cart_user_id = Cart::where('user_id',$user_id)->pluck('item_id');
        $item = Item::whereIn('id',$cart_user_id)->get();
        $address = Address::where('user_id',Auth::user()->id)->get();
        return ['user_info' => $data_user , 'cart' => $cart , 'address' => $address , 'item'=> $item];
    }

    public function add_address_touser(Request $request){
        $region = $request->data['region'];
        $address = $request->data['address'];
        $code = $request->data['code'];
        $etc = $request->data['etc'];
        $user_id = Auth::user()->id;

        Address::create([
            'user_id' => $user_id ,
            'region' => $region ,
            'address' => $address ,
            'code' => $code ,
            'etc' => $etc
        ]);
        
        return '100';
    }
}
