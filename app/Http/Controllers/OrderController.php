<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Notification;
use App\Models\Genre;
use App\Models\Category;

Session_start();

class OrderController extends Controller
{
    public function index(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_order = DB::table('orders')->where('orders.status',0)->join('customers','customers.customer_id','=','orders.customer_id')->join('coupons', 'coupons.coupon_id','=','orders.coupon_id','left outer')->select('orders.*','customers.name','customers.phone','coupons.code','coupons.value')->get();
        return view('admin/order/index')->with('admin',$admin)->with('all_order',$all_order);
    }
    public function transport(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_order = DB::table('orders')->where('orders.status',1)->join('customers','customers.customer_id','=','orders.customer_id')->join('coupons', 'coupons.coupon_id','=','orders.coupon_id','left outer')->select('orders.*','customers.name','customers.phone','coupons.code','coupons.value')->get();
        return view('admin/order/transport')->with('admin',$admin)->with('all_order',$all_order);
    }
    public function completed(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_order = DB::table('orders')->where('orders.status',2)->join('customers','customers.customer_id','=','orders.customer_id')->join('coupons', 'coupons.coupon_id','=','orders.coupon_id','left outer')->select('orders.*','customers.name','customers.phone','coupons.code','coupons.value')->get();
        return view('admin/order/completed')->with('admin',$admin)->with('all_order',$all_order);
    }
    public function comfim($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $order = Order::find($id);
        $order->status += 1;
        $order->update();
        $model = new Notification();
        $model->admin_id = Session::get('id');
        $model->customer_id = $order->customer_id;
        if( $order->status==1) {
            $model->message = "Đơn hàng có mã ".$id." của bạn đang được vận chuyển";
        }
        else {
            $model->message = "Đơn hàng có mã ".$id." của bạn đã được ký nhận";

        }
        $model->save();
        
        
        
        return redirect()->back();
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $order = Order::find($id);

        $model = new Notification();
        $model->admin_id = Session::get('id');
        $model->customer_id = $order->customer_id;   
        $model->message = "Đơn hàng có mã ".$id." của bạn đã bị hủy";
        $order->status=4;          
        $model->save();
        $order->update();
        return redirect()->back();
    }
    public function details($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $order_details = DB::table('details_orders')->where('order_id',$id)->join('products','products.id','=','details_orders.product_id')->select('products.*','products.id as product_id')->get();
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_genre = DB::table('product_genres')->distinct()->get(['product_id','name']);
        $all_category = Category::all();
        return view('admin/order/details')->with('admin',$admin)->with('order_details',$order_details)->with('all_genre',$all_genre)->with('all_category',$all_category);
    }
}
