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



class ProductController extends Controller
{
    public function manage(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_product = Product::orderby('id','desc')->get();
        $pro_genres = Product_genre::all();
        $categories = Category::all();
        return view('admin/product/manage')->with('admin',$admin)->with('categories',$categories)->with('all_product',$all_product)->with('pro_genres',$pro_genres);
    }
    public function add(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $categories = Category::all();
        $all_genre = Genre::all();
        return view('admin/product/add')->with('admin',$admin)->with('all_genre',$all_genre)->with('categories',$categories);
    }
    public function add_product(Request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $product = new Product();
        $result = DB::table('products')->where('name',$request->name)->first();
            if($result){
                Session::put('error',"Sản phẩm đã tồn tại!");
                return Redirect::to('admin/product-add');
            }
        $product['name'] = $request->name;
        $product['price'] = $request->price;
        $product['cate_id'] = $request->cate;
        $product['desc'] = $request->desc;
        $product['detail'] = $request->detail;
        $product['image'] = 'no';
        $get_image = $request->image;
        if($request->has('image')){
            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move(public_path('assets/clients/pro_img/'),$new_image);
            $product['image'] = $new_image;
        }
        Session::put('error',null);
        $product->save();
        $pro_id = $product->id;
        $genres = $request->genres;
        if(!empty($genres)){
            $N = count($genres);
            for($i=0; $i < $N; $i++){
                $genre = Genre::find($genres[$i]);
                $product_genre = new Product_genre();
                $product_genre['product_id'] = $pro_id;
                $product_genre['genre_id'] = $genre->id;
                $product_genre['name'] = $genre->name;
                $product_genre->save();
            }
        }
        return Redirect::to('admin/product-manage');
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $product = Product::find($id);
        if($product){
            $product['show']=2;
            $product->update();
        }
        return Redirect::to('admin/product-manage');
    }
    public function recover($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $product = Product::find($id);
        if($product){
            $product['show']=1;
            $product->update();
        }
        return Redirect::to('admin/product-manage');
    }
    public function deletedb($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $product = Product::find($id);
        if($product){
            $product->delete();
        }
        return Redirect::to('admin/product-manage');
    }
    public function edit($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $product_edit = Product::find($id);
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_genre = Genre::all();
        $categories = Category::all();

        $pro_genres = Product_genre::all();
        return view('admin/product/edit')->with('admin',$admin)->with('product_edit',$product_edit)->with('all_genre',$all_genre)->with('pro_genres',$pro_genres)->with('categories',$categories);
    }
    public function edit_product(request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $product = Product::find($request->id);
        $result = DB::table('products')->where('name',$request->name)->first();
            if($result && $request->id !=($result->id)){
                Session::put('error',"Sản phẩm đã tồn tại!");
                return Redirect::to('admin/product-edit/'.$request->id);
            }
        $product['name'] = $request->name;
        $product['price'] = $request->price;
        $product['cate_id'] = $request->cate;

        $product['desc'] = $request->desc;
        
        $product['detail'] = $request->detail;
        $product['image'] =$request->now_image;
        $get_image = $request->image;
        if($request->has('image')){
            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move(public_path('assets/clients/pro_img/'),$new_image);
            $product['image'] = $new_image;
        }
        Session::put('error',null);
        $product->save();
        $pro_id = $product->id;
        $genres = $request->genres;
        $product_genres =  DB::table('product_genres')->where('product_id',$pro_id)->get();
        foreach($product_genres as $product_genre){
            $product_genre = Product_genre::find($product_genre->id);
            $product_genre->delete();
        }
        if(!empty($genres)){
            $N = count($genres);
            for($i=0; $i < $N; $i++){
                $genre = Genre::find($genres[$i]);
                $product_genre = new Product_genre();
                $product_genre['product_id'] = $pro_id;
                $product_genre['genre_id'] = $genre->id;
                $product_genre['name'] = $genre->name;
                $product_genre->save();
            }
        }
        return Redirect::to('admin/product-manage');
    }

}
