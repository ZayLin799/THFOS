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

class StudentFEController extends Controller
{
    //

    public function regData(request $request)
    {
        $request->validate([
            'studentname' => 'required',
            'email' => 'required|email:rfc,dns',
            'viberph' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'age' => 'required',
            'gender' => 'required',
            'course' => 'required',
            'previous_level' => 'required',
            'comment' => 'required'
        ]);
        $batch_info_id = $request->get('course');
        //$batch_info_id->$batch_info->id=request('batch_info');
        $student = new Student;
        $student->studentname= request('studentname');
        $student->viberph= request('viberph');
        $student->email= request('email');
        $student->age= request('age');
        $student->gender= request('gender');
        $student->previous_level= request('previous_level');
        $student->comment= request('comment');
        $student->save();
        $student->batch_infos()->attach($batch_info_id);
        $request->session()->flash('success', 'Thank You For Student Registration. We Will Connect You Soon.');
        return view('frontend.student_register_complete'); 
        //return $request;  
    }

    public function all()
    {
        $batch_infos=Batch_info::all();
        $batches=Batch::all();
        $courses = Course::all();
        return view('frontend.student_registration',compact('batch_infos','batches','courses'));
    }

    public function selected_course($id)
    {
        $batch_infos=Batch_info::all();
        $batches=Batch::all();
        $courses = Course::all();
        $s_info= DB::table('batch_infos')->where('id',$id)->first();
        $s_course= DB::table('courses')->where('id',$s_info->course_id)->first();
        $s_batch= DB::table('batches')->where('id',$s_info->batch_id)->first();
        return view('frontend.course_registration',compact('batch_infos','batches','courses','s_course','s_batch','s_info'));
    }
}
