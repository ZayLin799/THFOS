<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_category;
use App\Models\Course;

class Course_categoryController extends Controller
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
         $categories = Course_category::all();
        return view('backend.course_category.show',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
                'course_category_name' => 'required'
            ]);
        $category   = new Course_category;
        $category->course_category_name = request('course_category_name');
        $category->save();
        $request->session()->flash('success_message', 'Course Category created successfully');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Course_category::find($id);
        return view('backend.course_category.edit',compact('category'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
        [
            "course_category_name"=>'required',
        ]);

        $category = Course_category::find($id);
        $category->course_category_name=request('course_category_name');
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Course_category::find($id);
        $category->delete();
        return redirect()->route('category.index')
        ->withSuccess('status','Post delete successfully.');    }
}
