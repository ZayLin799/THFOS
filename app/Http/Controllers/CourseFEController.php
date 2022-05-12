<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course_category;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Batch_info;

class CourseFEController extends Controller
{
    //
    public function index(){
        $cate = Course_category::all();
        $batch_infos=Batch_info::orderBy('status', 'DESC')->orderBy('start','ASC')->get();
        $courses = Course::all();
        $batches=Batch::all();
        return view('frontend.courses',['cate'=>$cate, 'courses'=>$courses, 'batches'=>$batches, 'batch_infos'=>$batch_infos]);
    }

    public function course_detail($id)
    {
        $batch_infos= DB::table('batch_infos')->where('id',$id)->first();
        $courses= DB::table('courses')->where('id',$batch_infos->course_id)->first();
        $batches= DB::table('batches')->where('id',$batch_infos->batch_id)->first();
        return view('frontend.course_detail',compact('courses','batches','batch_infos'));
    }


}
