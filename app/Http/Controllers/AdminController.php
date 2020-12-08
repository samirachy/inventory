<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function admin(){
    return view('layout.admin-master');
}
public function dashboard(){
    return view('admin.category.dashboard');
}
public function category(){
    $cat = category::all();
    return view('admin.category.category', compact('cat'));
}
public function create_category(){
    return view('admin.category.create_category');
}
public function update_category($id){
    $category = category::find($id);
    return view('admin.category.update_category', compact('category'));
}

public function update(Request $request)
    {
        //dd($request->all());
        $category = category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return redirect()->to('category');
    }

public function save(Request $request){
    // model used = eloquent-ORM
    //return $request->name;
    // dd($request->all());
     $category = new category();
     $category->name = $request->name;
     $category->save();
     return 'ok';
     //return redirect()->to('admin/category');
}
 //query builder

 /*DB::table('categories')->insert([
    'name' => $request->name
 ]);*/
 //return "successful";

//$cat = new category();
//$cat->name = 'Done';
//$cat->save();//


public function delete($id){
   //DB::table('categories')->where('id',$samira)->delete();
   $category = category::find($id);
        $category->delete();
       return redirect()->back();
}

public function get_cat(){
//$users = DB::table('users')->select('name')->where('id',1)->get();
$users = user::select('name')->get();
return Auth::user()->name;
}
}
