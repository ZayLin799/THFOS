<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_category;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Batch_info;
use App\Models\Blog;
use App\Models\Student;
use App\Models\Volunteer;
use App\Models\Position;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class HomeFEController extends Controller
{
    //
    public function index(){
        $cate = Course_category::all();
        $batch_infos=Batch_info::orderBy('status', 'DESC')->orderBy('start','ASC')->take(3)->get();
        $courses = Course::all();
        $batches=Batch::all();
        $stu_count = Student::where('status','=','1')->count();
        
        $teacher_count = DB::table('volunteers')
                ->join('positions', function($join){
                    $join->on('volunteers.position_id', '=', 'positions.id');
                })
                ->where('volunteers.status','=','1') 
                ->where('positions.role',  '=', '1')
                ->get()
                ->count();

        $vol_other_count = DB::table('volunteers')
                ->join('positions', function($join){
                    $join->on('volunteers.position_id', '=', 'positions.id');
                })
                ->where('volunteers.status','=','1') 
                ->where('positions.role',  '=', '0')
                ->get()
                ->count();
        
        $feedbacks = Feedback::where('status','=','1')->get();

        $blogs=Blog::latest()->take(3)->get();
        
        return view('frontend.home',compact('cate','batch_infos','courses','batches','stu_count','teacher_count','vol_other_count','feedbacks','blogs'));
    }

    // public function blpost_show($id){
    //     $blogs = DB::table('blogs')->where('id', $id)->first();
    //     return view('frontend.blog-post',compact('blogs'));
    // }

    
}
