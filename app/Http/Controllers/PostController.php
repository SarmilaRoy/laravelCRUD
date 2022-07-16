<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('dashboard', compact('posts'));
    }

    public function addpost()
    {
        return view('add_post');
    }

    public function storepost(Request $request)
    {
        $title = $request->title;
        $img = $request->file('img');

        $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        $img_url='upload/'. $img_name;
        $img->move(public_path('upload'),$img_name);

        Post::insert([
            'title'=>$title,
            'img_url'=>$img_url,
        ]);
        return redirect()->route('dashboard');
    }

    public function editpost($id){
        $editPost=Post::where('id',$id)->first();
        return view('edit_post', compact('editPost'));

    }
    public function updatepost(Request $request){
        if($request->file('img')){
            $postid = $request->postid;
            $title = $request->title;
            $img = $request->file('img');

            $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img_url='upload/'. $img_name;
            $img->move(public_path('upload'),$img_name);

            $editPost=Post::where('id',$postid)->update([
                'title'=>$title,
                'img_url'=>$img_url,
            ]);
            return redirect()->route('dashboard');

        }else{
            $postid = $request->postid;
            $title = $request->title;
            $editPost=Post::where('id',$postid)->update([
                'title'=>$title,
                
            ]);
            return redirect()->route('dashboard');

        }
    }

    public function deletepost($id){
        Post::findOrFail($id)->delete();
        return redirect()->back();
    }
}
