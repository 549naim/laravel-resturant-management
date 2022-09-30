<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\foodcheif;
use App\Models\Order;

class Homecontroller extends Controller
{
    function index() {
        $data=Food::all();
        $cheifs=foodcheif::all();
        return view('home',compact('data','cheifs'));
    }

    function redirect(){
        $data=Food::all();
        $cheifs=foodcheif::all();
        $usertype=Auth::user()->usertype;
        if ($usertype=='1'){
            return view('admin.adminhome');
        }
        else{

            $user_id=Auth::id();
            $count=Cart::where('user_id',$user_id)->count();  


            return view('home',compact('data','cheifs','count'));
        }
    }

    public function addcart(Request $request,$id){
        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $quantity=$request->quantity;

            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();          
            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }


    public function showcart(Request $request,$id){
        $user_id=Auth::id();
        $count=Cart::where('user_id',$user_id)->count(); 
        $data=Cart::where('user_id',$id)->join('Food','carts.food_id','=','food.id')->get();
        $data2=Cart::select('*')->where('user_id','=',$id)->get();

        return view('showcart', compact('count','data','data2'));
    }

    public function deleteproduct($id) {
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function orderconfirm(Request $request){
       foreach($request->foodname as $key => $foodname) {
        $data=new Order;
         $data->foodname = $foodname;
         $data->price = $request->price[$key];
         $data->quantity = $request->quantity[$key];
         $data->name = $request->name;
         $data->phone = $request->phone;
         $data->address = $request->address;
          $data->save();
        }
       return redirect()->back();
    }



}
