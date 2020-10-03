<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->orderBy('id', 'desc')->get();
        return view('posts')->with(['posts' => $posts]);
    }

    public function manage_posts(){
        $posts = Post::all();
        return view('managePost')->with(['posts' => $posts]);
    }

    public function store(Request $request)
    {
        if(request()->hasFile('image')){
            request()->validate([

                'image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
           'title' => ['required', 'string', 'max:255', 'unique:posts'],
           'content' => ['required', 'string', 'max:255'],
        ]);


        $image = $request->file('image');
        $name = time().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('images'), $name);
        $post = new Post();
        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        $post -> image = $name;
        $post -> save();

        if($post){
            return back()->with('success', "Posted successfully");
        };
    }

    public function destroy(Post $post){

        $post->delete();
        if ($post){
            return back()->with('success', "Post Deleted successfully");
        }

    }

    public function update(Request $request, $id){

        if(request()->hasFile('image')){
            request()->validate([

                'image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:posts'],
            'content' => ['required', 'string', 'max:255'],
        ]);

        if(request()->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $img = Post::find($id);
            $img->image = $filename;
            $img->save();
        }

        $update = Post::find($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        if($update){
            return back()->with('success', "Post updated successfully");
        }
        if($img){
            return back()->with('success', "Post updated successfully");
        }
    }

    public function single_post($id){
        $post = Post::find($id);
        return view('singlePost')->with(['post' => $post]);
    }
}
