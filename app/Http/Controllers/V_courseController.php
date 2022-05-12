<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\V_course;

class V_courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $v_courses = V_course::all();
        return view('backend.v_course.show',compact('v_courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v_course.create');
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
            'v_course_name' => 'required',
            'subject' => 'required'
        ]);
        $v_course = new V_course;
        $v_course->v_course_name= request('v_course_name');
        $v_course->subject= request('subject');
        $v_course->save();
        $request->session()->flash('success_message', 'Volunteer course created successfully');
        return redirect()->route('v_course.index');
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
    public function edit(V_course $v_course)
    {
        return view('backend.v_course.edit',compact('v_course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, V_course $v_course)
    {
        $request->validate([
            'v_course_name' => 'required',
            'subject' => 'required'
        ]);
        
        $v_course->v_course_name= request('v_course_name');
        $v_course->subject= request('subject');
        $v_course->save();
        return redirect()->route('v_course.index')
        ->with('success', 'Volunteer course created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(V_course $v_course)
    {
        $v_course->delete();
        return redirect()->route('v_course.index')
                        ->with('success','Volunteer course deleted successfully');
    }
}
