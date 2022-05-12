<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\V_course;
use App\Models\Position;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = Volunteer::all();
        $positions = Position::all();
        $v_courses=V_course::all();
        return view('backend.volunteer.show',compact('volunteers','positions','v_courses'));
    }

    public function active()
    {
        $volunteers = Volunteer::all()->where('status','=',1);
        $positions = Position::all();
        $v_courses=V_course::all();
        return view('backend.volunteer.show',compact('volunteers','positions','v_courses'));
    }

    public function inactive()
    {
         $volunteers = Volunteer::all()->where('status','=',0);
        $positions = Position::all();
        $v_courses=V_course::all();
        return view('backend.volunteer.show',compact('volunteers','positions','v_courses'));
    }

    public function changeStatus(Request $request,$id)
    {
        $volunteer = Volunteer::find($request->id); 
        $volunteer->status = '1';
        $volunteer->update();
        return redirect()->route('volunteer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $volunteers = Volunteer::all();
        $positions = Position::all();
        $v_courses=V_course::all();
        return view('backend.volunteer.create',compact('volunteers','positions','v_courses'));
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
        $request->session()->flash('success_message', 'Volunteer added successfully');
        return redirect()->route('volunteer.index')
        ->with('success', 'Volunteer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        $positions = Position::all();
        $v_courses=V_course::all();
        return view('backend.volunteer.edit',compact('volunteer','positions','v_courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Volunteer $volunteer)
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
        return redirect()->route('volunteer.index')
        ->with('success', 'Volunteer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteer.index')
                        ->with('success','Volunteer deleted successfully');
    }
}
