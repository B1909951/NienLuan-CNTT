<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Genre;

class GenreController extends Controller
{
    public function manage(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        $all_genre = Genre::all();
        return view('admin/genre/manage')->with('admin',$admin)->with('all_genre',$all_genre);
    }
    public function add(){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $admin = Admin::where('id',Session::get('id'))->get();
        return view('admin/genre/add')->with('admin',$admin);
    }
    public function add_genre(Request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $genre = new Genre();
        $result = DB::table('genres')->where('name',$request->name)->first();
            if($result){
                Session::put('error',"Thể loại đã tồn tại!");
                return Redirect::to('admin/genre-add');
            }
        $genre['name'] = $request->name;
        $genre['desc'] = $request->desc;
        Session::put('error',null);
        $genre->save();
        
        return Redirect::to('admin/genre-manage');
    }
    public function delete($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $genre = Genre::find($id);
        if($genre){
            $genre['show']=2;
            $genre->update();
        }
        return Redirect::to('admin/genre-manage');
    }
    public function recover($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $genre = Genre::find($id);
        if($genre){
            $genre['show']=1;
            $genre->update();
        }
        return Redirect::to('admin/genre-manage');
    }
    public function deletedb($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $genre = Genre::find($id);
        if($genre){
            $genre->delete();
        }
        return Redirect::to('admin/genre-manage');
    }
    
    public function edit($id){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $genre_edit = Genre::find($id);
        $admin = Admin::where('id',Session::get('id'))->get();

        return view('admin/genre/edit')->with('admin',$admin)->with('genre_edit',$genre_edit);
    }
    public function edit_genre(request $request){
        if(!Session::get('id')){
            return Redirect::to('admin-login');
        }
        $genre = Genre::find($request->id);
        $result = DB::table('genres')->where('name',$request->name)->first();
            if($result && ($request->id !=($result->id))) {
                Session::put('error',"Thể loại đã tồn tại!");
                return Redirect::to('admin/genre-edit/'.$request->id);
            }
        $genre['name'] = $request->name;
        $genre['desc'] = $request->desc;
        $genre['show'] = $request->show;
        Session::put('error',null);
        $genre->update();
        return Redirect::to('admin/genre-manage');
    }

}
