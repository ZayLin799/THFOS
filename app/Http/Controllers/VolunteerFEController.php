<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\Course_category;
use App\Models\Course;
use App\Models\Position;
use App\Models\V_course;
use Illuminate\Support\Facades\DB;

class VolunteerFEController extends Controller
{
    //
    public function index()
    {
        $volunteers = Volunteer::all();
        $positions = Position::all();
        //$course_categories=Course_category::all();
        $v_courses = V_course::all();
        return view('frontend.volunteer_registration',compact('volunteers','positions','v_courses'));
    }

    public function store(request $request)
    {
        $request->validate([
            'volunteername' => 'required',
            'viberph' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'skill' => 'required',
            'email' => 'required|email:rfc,dns',
            'age' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'tele_name' => 'required',
            'pos' => 'required',
            'teacher_role' => 'required_if:pos,==,teacher',
            'v_course_id' => 'required_if:pos,==,teacher',
            'subject' => 'required_with:v_course_id',
            'teaching_time' => 'required_if:pos,==,teacher',
            'other_position' => 'required_if:pos,==,other',
            'reason' => 'required',
        ]);

        $volunteer = new Volunteer;
        $volunteer->volunteername= request('volunteername');
        $volunteer->viberph= request('viberph');
        $volunteer->skill= request('skill');
        $volunteer->email= request('email');
        $volunteer->age= request('age');
        $volunteer->gender= request('gender');
        $volunteer->education= request('education');
        $volunteer->experience= request('experience');
        $volunteer->tele_name= request('tele_name');
        $volunteer->reason= request('reason');
        $volunteer->teaching_time= request('teaching_time');
        $volunteer->position_id= request('teacher_role')|request('other_position');
        $volunteer->v_course_id= request('v_course_id');
        if(request('subject')){
            $volunteer->subject= implode(",",request('subject'));
        }else{
            $volunteer->subject= request('subject');
        }
        
        $volunteer->save();
        $request->session()->flash('success', 'Thank You For Volunteer Registration. We Will Connect You Soon.');
        return view('frontend.volunteer_register_complete'); 
        //return $request;  
    }

    function fetch(Request $request)
    {
   
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $array = ["N5", "N4", "N3"];
     $v_courses = DB::table('v_courses')
       ->where('id', $value)
       ->get();
    //    dd($v_courses);

     $output = '';
     //$old = old('subject');
     foreach ($v_courses as $v_course){
     if ( $v_course->$dependent != ""){ 
       foreach(explode(',', $v_course->$dependent) as $sub){
        
        //if(is_array($array) and in_array($sub, $array)){
            //$checked = (is_array(old("'.$dependent.'")) and in_array($sub, old("'.$dependent.'"))) ? ' checked' : '';
            $output .= '<div class="form-check form-check-inline"> 
            <input class="form-check-input checked-sub" type="checkbox" id="'.$sub.'" name="subject[]" value="'.$sub.'" > 
            <label class="form-check-label" for="'.$sub.'">'.$sub.'</label> 
            </div>' ;
            
     }
    }
    }
     echo $output;
    }
}
//'.(is_array(old("subject")) and in_array($sub, old("subject"))) ? ' checked' : '' .'