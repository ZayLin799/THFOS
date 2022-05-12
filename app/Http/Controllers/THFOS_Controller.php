<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Volunteer;
use App\Models\Blog;
use App\Models\Student;
use App\Models\Batch_info;

class THFOS_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function count()
    {
        $total_course = Course::count();
        $total_student = Student::count();
        $total_volunteer = Volunteer::count();
        $total_blog = Blog::count();
        $available_batchinfo = Batch_info::count()->where('status',1)->count();
        return view('backend.index_backend',compact('total_blog','total_volunteer','total_course','total_student','available_batchinfo'));
    }
}
