<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.show',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          if ($request->hasFile('blog_img')) 
        {
            if ($request->file('blog_img')->isValid()) 
            {
                $validated = $request->validate([
                    'blog_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->blog_img->extension();
                $randomName = rand().".".$extension;
                $request->blog_img->storeAs('/public/img/',$randomName); 
            }
        }
        
         $request->validate([
                'blog_title' => 'required',
                'description' => 'required',
                'blog_img' => 'required'
            ]);

            $blog = new Blog();
            $blog->blog_title = $request->input('blog_title');
            $blog->description = $request->input('description');
            $blog->blog_img = $randomName;
            $blog->save();
            $request->session()->flash('success_message', 'Batch created successfully');
        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=Blog::find($id);
        return view('backend.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_title' => 'required',
            'description' => 'required',
            'blog_img' => 'required'
            ]);
            
         $blog = Blog::find($id);
         if ($request->hasFile('blog_img')) 
        {
            if ($request->file('blog_img')->isValid()) 
            {
                $validated = $request->validate([
                    'blog_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->blog_img->extension();
                $randomName = rand().".".$extension;
                $request->blog_img->storeAs('/public/img/',$randomName);
                  $blog->blog_img = $randomName;
            }
        }
            $blog->blog_title = $request->input('blog_title');
            $blog->description = $request->input('description');
            $blog->save();
            return redirect()->route('blogs.index')
             ->with('success', 'Blog update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog= Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index')
        ->withSuccess('status','Post delete successfully.');
    }
}
        