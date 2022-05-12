<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_category;
use App\Models\Batch;
use App\Models\Batch_info;

class Batch_infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch_infos=Batch_info::all();
        $courses = Course::all();
        $batches=Batch::all();
        return view('backend.batch_info.show',compact('courses','batches','batch_infos'));
    }

    public function active()
    {
        $batch_infos=Batch_info::all()->where('status','=',1);
        $courses = Course::all();
        $batches=Batch::all();
        return view('backend.batch_info.show',compact('courses','batches','batch_infos'));
    }

    public function inactive()
    {
        $batch_infos=Batch_info::all()->where('status','=',0);
        $courses = Course::all();
        $batches=Batch::all();
        return view('backend.batch_info.show',compact('courses','batches','batch_infos'));
    }

    public function batch($id)
    {
        $courses = Course::all();
        $batch=Batch::find($id);
        return view('backend.batch_info.create',compact('batch','courses'));
    }

    public function changeStatus(Request $request,$id)
    {
        $batch_info = Batch_info::find($request->id); 
        $batch_info->status = '0';
        $batch_info->update();
        return redirect()->route('batch_info.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $batches=Batch::all();
        return view('backend.batch_info.create_batchinfo',compact('batches','courses'));
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
            'avaliable_student' => 'required',
            'start' => 'required',
            'status' => 'required',
            'course_id' => 'required|not_in:0',
            'batch_id' => 'required|not_in:0'
        ]);

        $check=DB::table('batch_infos')->where('course_id',$request->course_id)
                                       ->where('batch_id',$request->batch_id)->exists();
        if (!$check)
        {
            $batch_info = new Batch_info;
            $batch_info->avaliable_student= request('avaliable_student');
            $batch_info->start= request('start');
            $batch_info->status= request('status');
            $batch_info->course_id= request('course_id');
            $batch_info->batch_id= request('batch_id');
            $batch_info->save();
             DB::table('batch_infos')
                ->where('avaliable_student', 0)
                ->update(['status' => 0]);
            $request->session()->flash('success_message', 'Class created successfully');
            return redirect()->route('batch_info.index')
            ->with('success', 'Batch_info created successfully.');
        }
        else
        {   
            return redirect()->route('batch_info.create')
            ->with('alert', 'This class is already exist.Cannot create same class.');
        }
        
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
        $batch_info=Batch_info::find($id);
        $courses = Course::all();
        $batches=Batch::all();
        return view('backend.batch_info.edit',compact('courses','batches','batch_info'));
    }

    //$batch_info = DB::table('batch_infos')->where('batch_id',$batch->id)->get;
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'avaliable_student' => 'required',
            'start' => 'required',
            'status' => 'required',
            'course_id' => 'required|not_in:0',
            'batch_id' => 'required|not_in:0'
        ]);

            $batch_info = Batch_info::find($id);
            $batch_info->avaliable_student= request('avaliable_student');
            $batch_info->start= request('start');
            $batch_info->status= request('status');
            $batch_info->course_id= request('course_id');
            $batch_info->batch_id= request('batch_id');
             $batch_info->save();
            DB::table('batch_infos')
            ->where('avaliable_student', 0)
            ->update(['status' => 0]);
           
            $request->session()->flash('success_message', 'Class updated successfully');
            return redirect()->route('batch_info.index')
            ->with('success', 'Class updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch_info = Batch_info::find($id);
        $batch_info->delete();
        return redirect()->route('batch_info.index')
                        ->with('success','Class deleted successfully');
    }
}
