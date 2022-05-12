<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_category;
use App\Models\Volunteer;
use App\Models\Student;

class CourseController extends Controller
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
        $courses = Course::all();
        $course_categories=Course_category::all();
        return view('backend.course.show',compact('courses','course_categories'));
    }

    public function course($id)
    {
        $category = Course_category::find($id);
        return view('backend.course.create',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        $course_categories=Course_category::all();
        return view('backend.course.create_course',compact('courses','course_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('course_img')) 
        {
            if ($request->file('course_img')->isValid()) 
            {
                $validated = $request->validate([
                    'course_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->course_img->extension();
                $randomName = rand().".".$extension;
                $request->course_img->storeAs('/public/img/',$randomName);
                
            }
        }
         $request->validate([
                'coursename'=> 'required',
                'description'=> 'required',
                'duration'=> 'required',
                'course_category_id' => 'required',
                'description' => 'required',
                'level' => 'required',
                'course_img' => 'required'
            ]);

            $course = new Course();
            $course->coursename = $request->input('coursename');
            $course->description = $request->input('description');
            $course->duration = $request->input('duration');
            $course->level = $request->input('level');
            $course->course_img = $randomName;
            $course->course_category_id = $request->input('course_category_id');
            $course->save();
            $request->session()->flash('success_message', 'Course created successfully');

        return redirect()->route('course.index')
            ->with('success', 'Course created successfully.');
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
        $course=Course::find($id);
        $course_categories=Course_category::all();
        return view('backend.course.edit',compact('course','course_categories'));
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
                'coursename'=> 'required',
                'description'=> 'required',
                'duration'=> 'required',
                'course_category_id' => 'required',
                'description' => 'required',
                'level' => 'required',
                'course_img' => 'required'
            ]);
        $course = Course::find($id);
         if ($request->hasFile('course_img')) 
        {
            if ($request->file('course_img')->isValid()) 
            {
                $validated = $request->validate([
                    'course_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->course_img->extension();
                $randomName = rand().".".$extension;
                $request->course_img->storeAs('/public/img/',$randomName);
                  $course->course_img = $randomName;
            }
        }   
        else{
            $course->course_img =$request->input('course_img');
        }
            $course->coursename = $request->input('coursename');
            $course->description = $request->input('description');
            $course->duration = $request->input('duration');
            $course->level = $request->input('level');
            $course->course_category_id = $request->input('course_category_id');
          
            $course->save();
            return redirect()->route('course.index')
             ->with('success', 'Course update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course= Course::find($id);
        $course->delete();
        return redirect()->route('course.index')
        ->withSuccess('status','Course delete successfully.');
    }
}
