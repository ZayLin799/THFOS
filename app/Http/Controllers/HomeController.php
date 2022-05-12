<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Volunteer;
use App\Models\Blog;
use App\Models\Student;
use App\Models\Batch_info;
use App\Models\Batch;
use App\Models\Course_category;
use App\Models\User;
use App\Models\Position;
use App\Models\Feedback;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         
    }

    public function main()
    {
        $total_course = Course::count();
        $total_student = Student::where('status','=',1)->count();
        $students= Student::where('status','=',0)->count();
        $total_volunteer = Volunteer::where('status','=',1)->count();
        $volunteers = Volunteer::where('status','=',0)->count();
        $total_blog = Blog::count();
        $total_batch = Batch::count();
        $total_position = Position::count();
        $available_batchinfo = Batch_info::where('status','=',1)
                                            ->count();
        $available_batchinfos=Batch_info::all()->where('status','=',1);
        $categories = Course_category::all();
        $total_feedback = Feedback::where('status','=',1)->count();
        $feedbacks= Feedback::where('status','=',0)->count();
        return view('backend.index_backend',compact('total_blog','total_volunteer','total_course','total_student','available_batchinfo','available_batchinfos','categories','total_position','volunteers','students','total_feedback','feedbacks','total_batch'));
       
    }
}
