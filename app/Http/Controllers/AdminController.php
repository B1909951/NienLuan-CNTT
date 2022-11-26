<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;


Session_start();

class AdminController extends Controller
{
    public function index(){

        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_admin = Admin::all();
        $all_product = Product::all();
        $all_order = Order::all();
        $all_customer = Customer::all();
        return view('admin/index')->with('admin',$admin)->with('all_admin',$all_admin)->with('all_product',$all_product)->with('all_order',$all_order)->with('all_customer',$all_customer);
    }
    public function login(){
        if(Session::get('id')){
            return Redirect::to('admin');
        }
        return view('admin/login');
    }
    public function logout(){
        Session::put('id', null);
        Session::put('name', null);
        Session::put('email', null);
        Session::put('level', null);
        Session::put('error_login', null);      
        return Redirect::to('admin-login');
    }
    public function login_test(Request $request){
        if(!empty($_POST)){
            $email = $request->email;
            $password = $request->password;
            $result = DB::table('admins')->where('email',$email)->where('password',$password)->first();
            if($result){
                Session::put('id', $result->id);
                Session::put('name', $result->name);
                Session::put('email', $result->email);
                Session::put('level', $result->level);
                Session::put('error_login', null);
                return Redirect::to('admin');
        }else{
                Session::put('error_login', "Sai tài khoản hoặc mật khẩu");
                return Redirect::to('admin-login');
                }
            
        }
    }
    public function manage(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_admin = Admin::all();
        return view('admin/manage')->with('admin',$admin)->with('all_admin',$all_admin);
    }
    public function add(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        return view('admin/add')->with('admin',$admin);
    }
    public function add_admin(Request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admins = Admin::all();
        $admin = new Admin();
        //kiểm tra email tồn tại
        $result = DB::table('admins')->where('email',$request->email)->first();
            if($result){
                Session::put('error',"Email đã tồn tại!");
                // $this->view('users.add', compact('error'));
                return Redirect::to('admin-add');
            }
        $admin['name'] = $request->name;
        $admin['email'] = $request->email;
        $admin['phone'] = $request->phone;
        $admin['password'] = $request->password;
        $admin['avatar'] = 'no';
        $get_image = $request->avatar;
        if($request->has('avatar')){
            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move(public_path('assets/admin/img/'),$new_image);
            $admin['avatar'] = $new_image;
           
        }
        Session::put('error',null);

        $admin->save();
        
        return Redirect::to('admin-manage');
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::find($id);
        if($admin){
            $admin->delete();
        }
        return Redirect::to('admin-manage');
    }
    public function edit($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin_edit = Admin::find($id);
        $admin = Admin::where('id',Session::get('id'))->get();
        return view('admin/edit')->with('admin',$admin)->with('admin_edit',$admin_edit);
    }
    public function edit_admin(request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admins = Admin::all();
        $admin = Admin::find($request->id);
        $result = DB::table('admins')->where('email',$request->email)->first();
        if($result && $request->id !=($result->id)){
            Session::put('error',"Email đã tồn tại!");
            return Redirect::to('admin-edit/'.$request->id);
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = $request->password;
        $admin->avatar =  $request->now_avatar;
        $get_image = $request->avatar;
        if($request->has('avatar')){
            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move(public_path('assets/admin/img/'),$new_image);
            $admin->avatar  = $new_image;
           
        }
        Session::put('error', null);

        $admin->update();
        return Redirect::to('admin-manage');
    }
    
}
