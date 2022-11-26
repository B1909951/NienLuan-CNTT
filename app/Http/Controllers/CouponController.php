<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Product_genre;
use App\Models\Category;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function check(Request $request)
    {
        $coupon = DB::table('coupons')->where('coupons.code',$request->code)->where('coupons.status', 1)->first();
        return Redirect::to('cart')->with('coupon',$coupon);
    }
    public function manage(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_coupon = Coupon::all();
        return view('admin/coupon/manage')->with('admin',$admin)->with('all_coupon',$all_coupon);
    }
    public function add(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        return view('admin/coupon/add')->with('admin',$admin);
    }
    public function add_coupon(Request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $coupon = new Coupon();
        $result = DB::table('coupons')->where('code',$request->code)->first();
            if($result){
                Session::put('error',"Coupon đã tồn tại!");
                return Redirect::to('admin/coupon-add');
            }
        $coupon['code'] = $request->code;
        $coupon['value'] = $request->value;
        Session::put('error',null);
        $coupon->save();
        
        return Redirect::to('admin/coupon-manage');
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $coupon = Coupon::find($id);
        if($coupon){
            $coupon['status'] = 2;
            $coupon->update();
        }
        return Redirect::to('admin/coupon-manage');
    }
    public function recover($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $coupon = Coupon::find($id);
        if($coupon){
            $coupon['status'] = 1;
            $coupon->update();
        }
        return Redirect::to('admin/coupon-manage');
    }
    public function deletedb($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $coupon = Coupon::find($id);
        if($coupon){
            $coupon->delete();
        }
        return Redirect::to('admin/coupon-manage');
    }
    public function edit($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $coupon_edit = Coupon::find($id);
        $admin = Admin::where('id',Session::get('id'))->get();

        return view('admin/coupon/edit')->with('admin',$admin)->with('coupon_edit',$coupon_edit);
    }
    public function edit_coupon(request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $coupon = Coupon::find($request->id);
        $result = DB::table('coupons')->where('code',$request->code)->first();
            if($result && ($request->id !=($result->coupon_id))) {
                Session::put('error',"Coupon đã tồn tại!");
                return Redirect::to('admin/coupon-edit/'.$request->id);
            }
        $coupon['code'] = $request->code;
        $coupon['value'] = $request->value;
        $coupon['status'] = $request->status;
        Session::put('error',null);
        $coupon->update();
        return Redirect::to('admin/coupon-manage');
    }
}
