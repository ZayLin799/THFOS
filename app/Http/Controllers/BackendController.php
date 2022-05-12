<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Batch_info;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function studentRegister($id)
    {
        $batch_infos= DB::table('batch_infos')->where('id',$id)->first();
        $courses= DB::table('courses')->where('id',$batch_infos->course_id)->first();
        $batches= DB::table('batches')->where('id',$batch_infos->batch_id)->first();
        return view('backend.student.create',compact('batch_infos','courses','batches'));
    }
    public function studentFilter(Request $request)
    {
        $student_batch_infos=DB::table('student_batch_infos')->where('batch_info_id',$request->batchinfo_id)->get();
        $students=Student::all();
        $batch_infos=Batch_info::all();
        $courses=Course::all();
        $batches=Batch::all();
        return view('backend.student.show',compact('batch_infos','courses','batches','student_batch_infos','students'));   
    }
}
