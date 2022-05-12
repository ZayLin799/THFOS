<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogFEController extends Controller
{
    public function blog_show(){
        $blogs=Blog::latest()->paginate(6);
        return view('frontend.blog', compact('blogs'))
        ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    
    public function blpost_show($id){
        $blogs = DB::table('blogs')->where('id', $id)->first();
        $blogrels = Blog::where('id', '!=', $id)->inRandomOrder()->limit(3)->get(); 
        // $previous = Blog::where('id', '>', $id)->first();
        // $next = Blog::where('id', '<', $id)->first();
        $first_id = Blog::first()->id;
        $last_id = Blog::orderBy('id', 'DESC')->first()->id;
        if($id == $first_id){
            $previous = Blog::where('id', '=', $id+1)->first();
            $next = Blog::where('id', $last_id)->first();
        }else if($id == $last_id){
            $previous = Blog::where('id', $first_id)->first();
            $next = Blog::where('id', '=', $id-1)->first();
        }else{
            $previous = Blog::where('id', '=', $id+1)->first();
            $next = Blog::where('id', '=', $id-1)->first();
        }
        return view('frontend.blog-post',compact('blogs','blogrels','previous','next'));
    }
}
