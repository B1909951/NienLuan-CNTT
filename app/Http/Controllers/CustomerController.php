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
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Admin;

class CustomerController extends Controller
{
    public function index(){

        if(!Session::get('customer_id')){
            return Redirect::to('customer-login');
        }
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $customer = Customer::find(Session::get('customer_id'));
        return view('shop/customer/index')->with('customer',$customer)->with('all_genre',$all_genre)->with('all_category',$all_category)->with('notif',$notif);
    }
    public function login(){
        if(Session::get('customer_id')){
            return Redirect::to('customer');
        }
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        return view('shop/customer/login')->with('all_genre',$all_genre)->with('all_category',$all_category)->with('notif',$notif);
    }

    public function logout(){
        Session::put('customer_id', null);
        Session::put('email', null);
        Session::put('error_login', null);
        Session::put('error', null);      
        return Redirect::to('customer-login');
    }
    public function login_test(Request $request){
        if(!empty($request)){
            $email = $request->email;
            $password = $request->password;
            $result = DB::table('customers')->where('email',$email)->where('password',$password)->where('status',1)->first();
            if($result){
                Session::put('customer_id', $result->customer_id);
                Session::put('email', $result->email);
                Session::put('error_login', null);
                return Redirect::to('customer');
        }else{
                Session::put('error_login', "Sai tài khoản hoặc mật khẩu");
                return Redirect::to('customer-login');
            }    
        }
    }
    public function signup(Request $request){
        $customer = new Customer();
        //kiểm tra email tồn tại
        $result = DB::table('customers')->where('email',$request->email)->first();
            if($result){
                Session::put('error',"Email đã tồn tại!");
                // $this->view('users.add', compact('error'));
                return Redirect::to('customer-login');
            }
        if(!$request) return Redirect::to('customer-login');
        $customer['name'] = $request->name;
        $customer['email'] = $request->email;
        $customer['phone'] = $request->phone;
        $customer['password'] = $request->password;
        $customer->save();
        Session::put('customer_id', $customer->customer_id);
        Session::put('email', $customer->email);
        Session::put('error_login', null);
        Session::put('error',null);
     
        return Redirect::to('customer');
    }
    public function edit(Request $request){
        $edit_customer = Customer::find(Session::get('customer_id'));
        //kiểm tra email tồn tại
        if(!$edit_customer){
            Session::put('message',"Không thể cập nhật");
            return Redirect::to('customer');
        }
        if(!$request){
            return Redirect::to('customer');
            Session::put('error',"Không thể cập nhật");
        } 
        $edit_customer['name'] = $request->name;
        $edit_customer['phone'] = $request->phone;
        $edit_customer['password'] = $request->password;
        $edit_customer->update();
        Session::put('message',"Cập nhật thành công");

        return Redirect::to('customer');
    }
    //admin
    public function manage(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_customer = Customer::all();
        return view('admin/customer/manage')->with('admin',$admin)->with('all_customer',$all_customer);
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $customer = customer::find($id);
        if($customer){
            $customer['status'] = 2;
            $customer->update();
        }
        return Redirect::to('admin/customer-manage');
    }
    public function recover($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $customer = Customer::find($id);
        if($customer){
            $customer['status'] = 1;
            $customer->update();
        }
        return Redirect::to('admin/customer-manage');
    }
    public function deletedb($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $customer = Customer::find($id);
        if($customer){
            $customer->delete();
        }
        return Redirect::to('admin/customer-manage');
    }
    
}
