<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Category;

class CategoryController extends Controller
{
    public function manage(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_cate = Category::all();
        return view('admin/cate/manage')->with('admin',$admin)->with('all_cate',$all_cate);
    }
    public function add(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        return view('admin/cate/add')->with('admin',$admin);
    }
    public function add_cate(Request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $cate = new Category();
        $result = DB::table('categories')->where('name',$request->name)->first();
            if($result){
                Session::put('error',"Danh mục đã tồn tại!");
                return Redirect::to('admin/cate-add');
            }
        $cate['name'] = $request->name;
        $cate['desc'] = $request->desc;
        Session::put('error',null);
        $cate->save();
        
        return Redirect::to('admin/cate-manage');
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $cate = Category::find($id);
        if($cate){
            $cate['show'] = 2;
            $cate->update();
        }
        return Redirect::to('admin/cate-manage');
    }
    public function recover($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $cate = Category::find($id);
        if($cate){
            $cate['show'] = 1;
            $cate->update();
        }
        return Redirect::to('admin/cate-manage');
    }
    public function deletedb($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $cate = Category::find($id);
        if($cate){
            $cate->delete();
        }
        return Redirect::to('admin/cate-manage');
    }
    public function edit($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $cate_edit = Category::find($id);
        $admin = Admin::where('id',Session::get('id'))->get();

        return view('admin/cate/edit')->with('admin',$admin)->with('cate_edit',$cate_edit);
    }
    public function edit_cate(request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $cate = Category::find($request->id);
        $result = DB::table('categories')->where('name',$request->name)->first();
            if($result && ($request->id !=($result->id))) {
                Session::put('error',"Danh mục đã tồn tại!");
                return Redirect::to('admin/cate-edit/'.$request->id);
            }
        $cate['name'] = $request->name;
        $cate['desc'] = $request->desc;
        $cate['show'] = $request->show;
        Session::put('error',null);
        $cate->update();
        return Redirect::to('admin/cate-manage');
    }

}
