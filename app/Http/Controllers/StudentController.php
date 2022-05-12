<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Batch_info;
use App\Models\Course;
use App\Models\Batch;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
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
        $student_batch_infos= DB::table('student_batch_infos')->get();
        $students=Student::with('batch_infos')->get();
        $batch_infos=Batch_info::all();
        $courses=Course::all();
        $batches=Batch::all();
        return view('backend.student.show',compact('student_batch_infos','students','batch_infos','courses','batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students=Student::all();
        $batch_infos=Batch_info::where('status', 1)->get();
        $courses=Course::all();
        $batches=Batch::all();
        return view('backend.student.create_student',compact('students','batch_infos','courses','batches'));
    }

    public function changeStatus($id,$batch_info_id)
    {
        $student = Student::find($id); 
        $student->status = '1';
        $student->update();
        $batch_info= Batch_info::find($batch_info_id)->decrement('avaliable_student' , 1);
        DB::table('batch_infos')
        ->where('avaliable_student', 0)
        ->update(['status' => 0]);
        return redirect()->route('student.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_student(Request $request)
    {
        $request->validate([
            'studentname' => 'required',
            'viberph' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'email' => 'required|email:rfc,dns',
            'age' => 'required',
            'gender' => 'required',
            'previous_level' => 'required',
            'batch_info_id' => 'required|not_in:0',
            'comment' => 'required'
        ]);
        $batch_info_id=$request->batch_info_id;
        $student = new Student;
        $student->studentname= request('studentname');
        $student->viberph= request('viberph');
        $student->email= request('email');
        $student->age= request('age');
        $student->gender= request('gender');
        $student->previous_level= request('previous_level');
        $student->comment= request('comment');
        $student->status= request('status');
        $student->save();
        $student->batch_infos()->attach($batch_info_id);
        $request->session()->flash('success_message', 'Student added successfully');
        return redirect()->route('student.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'studentname' => 'required',
            'email' => 'required|email:rfc,dns',
            'viberph' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'age' => 'required',
            'gender' => 'required',
            'previous_level' => 'required',
            'batch_info_id' => 'required|not_in:0',
            'comment' => 'required'
        ]);
        $batch_info_id=$request->batch_info_id;
        $student = new Student;
        $student->studentname= request('studentname');
        $student->viberph= request('viberph');
        $student->email= request('email');
        $student->age= request('age');
        $student->gender= request('gender');
        $student->previous_level= request('previous_level');
        $student->comment= request('comment');
        $student->status= request('status');
        $student->save();
        $student->batch_infos()->attach($batch_info_id);
        $request->session()->flash('success_message', 'Student added successfully');
        // if ($request->status=='1') {
        //     Batch_info::where('id',$request->batch_info_id)->decrement('avaliable_student' , 1);
        // }

        if(Batch_info::where('id', $batch_info_id)->first()->avaliable_student<=0){
            DB::table('batch_infos')
              ->where('id', $batch_info_id)
              ->update(['status' => 0]);
        }

        return redirect()->route('student.index')->with('successmessage', 'Student created successfully.')
       ;
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
        $student=Student::find($id);
        $courses = Course::all();
        $batches=Batch::all();
        $batch_infos=Batch_info::where('status', 1)->get();
        $students=Student::all();
        return view('backend.student.edit',compact('courses','batches','batch_infos','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $request->validate([
            'studentname' => 'required',
            'viberph' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'email' => 'required|email:rfc,dns',
            'age' => 'required',
            'gender' => 'required',
            'previous_level' => 'required',
            'batch_info_id' => 'required|not_in:0',
            'comment' => 'required'
        ]);

        $batch_info_id=$request->batch_info_id;
        $student->studentname= request('studentname');
        $student->viberph= request('viberph');
        $student->email= request('email');
        $student->age= request('age');
        $student->gender= request('gender');
        $student->previous_level= request('previous_level');
        $student->comment= request('comment');
        $student->status= request('status');
        $student->save();
        // $student->batch_infos()->attach($batch_info_id);
        $request->session()->flash('success_message', 'Student Updated successfully');
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {   $batch_info_id=$request->batch_info_id;
        $student=Student::find($id);
        $student->batch_infos()->detach($batch_info_id);
        $student->delete();
        return redirect()->route('student.index')
                        ->with('deleted_message','Student deleted successfully');
    }
}
