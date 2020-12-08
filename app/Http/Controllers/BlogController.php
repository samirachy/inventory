<?php

namespace App\Http\Controllers;
use Illuminate\Http\DB;
use App\category;
use App\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
      $blog = blog::all();
      return view('admin.blog.blog', compact('blog')); 
}
    public function create_blog(){
        $cat = category::all();
        return view('admin.blog.create_blog', compact('cat')); 
      }

      public function save(Request $request){
        //return str_slug($request->title).'_'.md5(date('Y-m-d H:i:s'));
        //dd($request->all());
        $blog = new blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->categoryID = $request->categoryID;
    
        //img upload
        if($request->hasFile('imageName')){
            $extension = $request->imageName->extension();
            $fileName = str_slug($request->title,'_').'_'.md5(date('Y-m-d H:i:s'));
            $fileName = $fileName.'.'.$extension;
    
            $post->imageName = $fileName;
    
            $request->imageName->move('public/uploads/blog',$fileName);
    
        }
    
        $blog->save();
        //return redirect()->back();
        //return redirect()->to('blog');
        return 'ok';
        }
    
        public function update_blog($id){
            $blog = blog::find($id);
            $cat = category::all();
            return view('admin.blog.update_blog',compact('blog','cat'));
        }
    
        public function update(Request $request)
        {
            //dd($request->all());
            $blog = blog::find($request->id);
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->categoryID = $request->categoryID;
    
            $path = public_path('uploads/blog/'.$blog->imageName);
            if(file_exists($path)){
                unlink($path);
            }
            //img upload
        if($request->hasFile('imageName')){
            $extension = $request->imageName->extension();
            $fileName = str_slug($request->title,'_').'_'.md5(date('Y-m-d H:i:s'));
            $fileName = $fileName.'.'.$extension;
    
            $blog->imageName = $fileName;
    
            $request->imageName->move('public/uploads/blog',$fileName);
    
        }
    
            $blog->save();
            return redirect()->to('blog');
            
        }
    
        public function delete($id){
            $blog = blog::find($id);
            $path = public_path('uploads/blog/'.$blog->imageName);
            if(file_exists($path)){
                unlink($path);
            }
            $blog->delete();
            return back();
        }


}
