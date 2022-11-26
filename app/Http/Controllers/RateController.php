<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rate;
use App\Models\Product;
use App\Models\Admin;

class RateController extends Controller
{
    public function add_rate(request $request){
        $update_rate = DB::table('rates')
        ->where('rates.customer_id',$request->customer_id)->where('rates.product_id',$request->product_id)->first();
        if($update_rate){
            $rate = Rate::find($update_rate->rate_id);
            $data=$_POST;
            $rate->fill($data);
            $rate->update();
            $product = DB::table('rates')->where('rates.product_id',$request->product_id)->get();
            $total = 0;
            $n = 0;
            foreach($product as $pro) {
                $total+=$pro->rating;
                $n++;
            }
            $product_rating = Product::find($request->product_id);
            $product_rating->star = $total/$n;
            $product_rating->update();
            return Redirect()->back();
        }
        $rate = new Rate();
        $data=$_POST;
        $rate->fill($data);
        $rate->save();
        $product = DB::table('rates')
        ->where('rates.product_id',$request->product_id)->get();
        $total = 0;
        $n = 0;
        foreach($product as $pro) {
            $total+=$pro->rating;
            $n++;
        }
        $product_rating = Product::find($request->product_id);
        $product_rating->star = $total/$n;
        $product_rating->update();
        return Redirect()->back();
    }
    //admin
    public function manage(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_rate = Rate::join('customers','customers.customer_id','=','rates.customer_id')->join('products','products.id','=','rates.product_id')->select('rates.*','customers.email as customer_email','products.name as product_name', 'products.image as product_image')->orderby('rate_id','desc')->get();
        return view('admin/rate/manage')->with('admin',$admin)->with('all_rate',$all_rate);
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $rate = rate::find($id);
        if($rate){
            $rate['status'] = 2;
            $rate->update();
        }
        
        return Redirect::to('admin/rate-manage');
    }
    public function recover($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $rate = rate::find($id);
        if($rate){
            $rate['status'] = 1;
            $rate->update();
        }
        return Redirect::to('admin/rate-manage');
    }
    public function deletedb($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $rate = Rate::find($id);
        if($rate){
            $rate->delete();
        }
        return Redirect::to('admin/rate-manage');
    }
}
