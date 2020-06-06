<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Store;

class AdminController extends Controller
{
    public function add_product(){
        return view('dashboard.add_product');
    }

    public function add_product_post(Request $request){
        $request->validate([
            'name' => 'required|max:60',
            'desc' => 'required|max:90',
            'cate' => 'required',
            'sub_cate' => 'required',
            'price' => 'required',
            'img' => 'required',
            'relate' => 'required',

        ]);
        $folder = '/assets/products/' . str_replace(" ","_",$request->cate) . "/" . str_replace(" ","_",$request->sub_cate) . "/";
        $imgname = str_replace(" ","_",$request->name);
        $request->img->move(public_path($folder), $imgname . ".png");
        $full = $folder . $imgname . ".png";

        Item::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'cate' => $request->cate,
            'sub_cate' => $request->sub_cate,
            'size' => $request->size,
            'price' => $request->price,
            'per_price' => $request->per_price,
            'img' => $full,
            'relate' => $request->relate,
        ]);

        return redirect('/dashboard/add_product');
    }

    public function add_store(){
        return view('dashboard.add_store');
    }

    public function add_storeTo_system(Request $request){
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'to' => 'required',
            'end' => 'required',
            'icon_link' => 'required',
            'long' => 'required',
            'late' => 'required'
        ]);
        $request->icon_link->move(public_path('/assets/store/'), str_replace(" ","_",$request->name) . ".png");
        $icon_path = "/assets/store/" .  str_replace(" ","_",$request->name) . ".png";
        $loca = ['late' => $request->late , 'long' => $request->long];

        Store::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'icon_url' => $icon_path,
            'time_start' => $request->to,
            'time_end' => $request->end,
            'location' => json_encode($loca),
        ]);
        return redirect("/dashboard/add_store");

    }
    public function add_product_to_store(){
        $store = Store::all();
        $product = Item::all();
        return view('dashboard.addproduct_tostore',compact(['store','product']));
    }
    public function add_product_to_storeTo_system(Request $request){
        $store = $request->store;
        $items = $request->check;
        $product = [];
        foreach($items as $item){
            array_push($product,Item::where('id',$item)->first());
        }
        Store::where('id',$store)->update([
            'items' => json_encode($product) 
        ]);
        return redirect('/dashboard/add_product_to_store');
    }
}
