<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Product_genre;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Details_order;
use App\Models\Notification;
class CartController extends Controller
{
    public function index(Request $request){

        if(!Session::get('customer_id')){
            return Redirect::to('customer-login');
        }
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();
        
        $customer = Customer::find(Session::get('customer_id'));
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $coupon = null;
        if($request){
            $coupon = DB::table('coupons')->where('coupons.code',$request->code)->where('coupons.status', 1)->first();
        }
        $carts = DB::table('carts')->join('products','products.id','=','carts.product_id')->where('carts.customer_id',Session::get('customer_id'))->where('products.show','1')->select('carts.cart_id', 'carts.product_id','carts.count','products.name','products.price','products.image')->get();
        return view('shop/cart/index')->with('carts',$carts)->with('coupon',$coupon)->with('all_genre',$all_genre)->with('all_category',$all_category)->with('customer',$customer)->with('notif',$notif);
    }
    
    public function add(Request $request){

        if(!Session::get('customer_id')){
            return Redirect::to('customer-login');
        }
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $cart = DB::table('carts')->where('carts.product_id',$request->id)->where('carts.customer_id',Session::get('customer_id'))->first();
        if($cart){
            $update_cart = Cart::find($cart->cart_id);
            $update_cart->count = $update_cart->count + $request->count;
            $update_cart->update();

        }else{
            $cart = new Cart();
            if(!$request) return Redirect->back();
            $cart['customer_id'] = Session::get('customer_id');
            $cart['product_id'] = $request->id;
            $cart['count'] = $request->count;
            $cart->save();      
        }
        
        
        return Redirect::to('cart');
    }
    public function edit_count(Request $request){
        $cart = Cart::find($request->cart_id);
        if($cart){
            $cart->count = $request->count;
            $cart->update();
            return Redirect::to('cart');
        }
    }
    public function delete($id){
        $cart = Cart::find($id);
        $cart->delete();
        return Redirect::to('cart');

    }
    public function add_order(Request $request){
        if(!Session::get('customer_id')){
            return Redirect::to('customer-login');
        }
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $carts = DB::table('carts')->join('products','products.id','=','carts.product_id')->where('carts.customer_id',Session::get('customer_id'))->where('products.show','1')->select('carts.cart_id', 'carts.product_id','carts.count','products.name','products.price','products.image')->get();
        $customer = Customer::find(Session::get('customer_id'));
        $order = new Order();
        $order->customer_id= $request->customer_id;
        $order->sub_total= $request->sub_total;
        $order->coupon_id= $request->coupon_id;
        $order->total= $request->total;
        $order->type= $request->type;
        $order->address= $request->address;

        $order->save();
        $customer->address = $request->address;
        $customer->update();
        foreach ($carts as $cart){
            $cart = Cart::find($cart->cart_id);
            $add_details_order = new Details_order();
            $add_details_order->customer_id = Session::get('customer_id');
            $add_details_order->product_id =  $cart->product_id;
            $add_details_order->count =  $cart->count;
            $add_details_order->order_id =  $order->order_id;
            $add_details_order->save();
            $cart->delete();
        }
        $coupon = null;
        $carts = [];
        return Redirect::to('orders');
    }
    public function orders(){

        if(!Session::get('customer_id')){
            return Redirect::to('customer-login');
        }
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();
        
        $customer = Customer::find(Session::get('customer_id'));
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $coupons = DB::table('coupons')->get();
        $orders = DB::table('orders')->where('orders.customer_id',Session::get('customer_id'))->orderby('order_id','desc')->get();
        return view('shop/orders/index')->with('coupons',$coupons)->with('all_genre',$all_genre)->with('orders',$orders)->with('all_category',$all_category)->with('customer',$customer)->with('notif',$notif);
    }
    public function order_details($id){
        if(!Session::get('customer_id')){
            return Redirect::to('customer-login');
        }
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $customer = Customer::find(Session::get('customer_id'));
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $coupons = DB::table('coupons')->get();
        $products = DB::table('details_orders')->where('details_orders.order_id',$id)->join('products','products.id','=','details_orders.product_id')->get();
        $order= Order::find($id);
        $customer = DB::table('details_orders')->where('details_orders.order_id',$id)->join('customers','customers.customer_id','=','details_orders.customer_id')->first();
        return view('shop/orders/details')->with('coupons',$coupons)->with('all_genre',$all_genre)->with('order',$order)->with('all_category',$all_category)->with('customer',$customer)->with('products',$products)->with('notif',$notif);
    }
}
