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
use App\Models\Notification;

class ShopController extends Controller
{
    public function index(){
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $all_product = DB::table('products')->join('categories','categories.id','=','products.cate_id')->select('products.*','products.id as product_id')->where('products.show','1')->where('categories.show','1')->orderby('product_id','desc')->get();
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $product_genres = Product_genre::All();
        return view('shop/index')->with('all_product',$all_product)->with('product_genres',$product_genres)->with('all_genre',$all_genre)->with('all_category',$all_category)->with('notif',$notif);
    }
    public function search(request $request){
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $all_product = DB::table('products')->where('products.show','1')->get();
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $product_genres = Product_genre::All();
        $keywords = $request->keywords;
        $search_product = DB::table('products')->join('categories','categories.id','=','products.cate_id')->select('products.*','products.id as product_id')->where('products.show','1')->where('categories.show','1')->where('products.name','like','%' .$keywords. '%')->select('products.id as pro_id', 'products.name', 'products.image', 'products.price')->orderby('pro_id','desc')->get();
        return view('shop/search')->with('all_product',$all_product)->with('product_genres',$product_genres)->with('all_genre',$all_genre)->with('all_category',$all_category)->with('search_product',$search_product)->with('keywords',$keywords)->with('notif',$notif);
    }
    public function product_details($id){
        $product = Product::find($id);
        if(isset($product)) {
            $product->view = $product->view + 1 ;
            $product->update();
        }
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $pro_genre = DB::table('product_genres')->join('genres','genres.id','=','product_genres.genre_id')->where('genres.show','1')->where('product_genres.product_id',$id)->select('genres.name', 'product_genres.genre_id')->get();

        $comments = DB::table('rates')->where('rates.product_id',$id)->join('customers','customers.customer_id','=','rates.customer_id')->select('rates.*','customers.name','customers.customer_id')->orderby('rate_id','desc')->get();
        $same_products = DB::table('products')
        ->join('categories','categories.id','=','products.cate_id')
        ->where('categories.id',$product->cate_id)->where('products.show','1')->where('categories.show','1')->whereNotIn('products.id',[$id])->select('products.id as pro_id', 'products.name', 'products.image', 'products.price')->limit(6)->get();

        $exist_rate =  DB::table('rates')->where('rates.product_id',$id)->where('rates.customer_id',Session::get('customer_id'))->first();
        if(!$exist_rate) $exist_rate=null;
        $exist_order = DB::table('details_orders')->where('details_orders.product_id',$id)->where('details_orders.customer_id',Session::get('customer_id'))->first();
        if(!$exist_order) $exist_order=null;

        return view('shop/product_details')->with('product',$product)->with('all_genre',$all_genre)->with('same_products',$same_products)->with('all_category',$all_category)->with('pro_genre',$pro_genre)->with('comments',$comments)->with('exist_rate',$exist_rate)->with('exist_order',$exist_order)->with('notif',$notif);
    }
    public function cate_products($id){
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $cate_name = Category::find($id)->name;
        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $product_genres = Product_genre::All();
        $cate_products = DB::table('products')
        ->where('products.cate_id',$id)->where('products.show','1')->select('products.id as pro_id', 'products.*')->get();
        return view('shop/cate_products')->with('all_genre',$all_genre)->with('cate_products',$cate_products)->with('all_category',$all_category)->with('cate_name',$cate_name)->with('product_genres',$product_genres)->with('notif',$notif);
    }
    public function genre_products($id){
        $genre_name = Genre::find($id)->name;
        $notif = Notification::where('customer_id',Session::get('customer_id'))->orderby('notif_id','desc')->limit(6)->get();

        $all_category = DB::table('categories')->where('categories.show','1')->get();
        $all_genre = DB::table('genres')->where('genres.show','1')->get();
        $product_genres = Product_genre::All();
        $genre_products = DB::table('product_genres')->join('products','products.id','=','product_genres.product_id')
        ->where('product_genres.genre_id',$id)->where('products.show','1')->join('categories','categories.id','=','products.cate_id')->select('products.*','products.id as product_id')->where('categories.show','1')->select('products.id as pro_id', 'products.*')->get();
        return view('shop/genre_products')->with('all_genre',$all_genre)->with('genre_products',$genre_products)->with('all_category',$all_category)->with('genre_name',$genre_name)->with('product_genres',$product_genres)->with('notif',$notif);
    }
}
