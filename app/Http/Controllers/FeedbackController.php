<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Batch_info;
use App\Models\Batch;
use App\Models\Course;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::all();
        $batches = Batch::all();
        $batch_infos = Batch_info::all();
        $feedbacks = Feedback::all();
        return view('backend.feedback.show',compact('feedbacks','batch_infos','courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch_infos = Batch_info::all();
        return view('backend.feedback.create',compact('batch_infos'));
    }

    public function changeStatus(Request $request,$id)
    {
        $feedback = Feedback::find($request->id); 
        $feedback->status = '1';
        $feedback->update();
        return redirect()->route('feedbacks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) 
        {
            if ($request->file('image')->isValid()) 
            {
                $validated = $request->validate([
                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->image->extension();
                $randomName = rand().".".$extension;
                $request->image->storeAs('/public/img/',$randomName);
            }
        }
        else
        { 
            $randomName ='a';
        }
         $request->validate([
                'name'=> 'required',
                'batch_info_id'=> 'required',
                'feedback'=> 'required'
            ]);

            $feedback = new Feedback();
            $feedback->name = $request->input('name');
            $feedback->batch_info_id = $request->input('batch_info_id');
            $feedback->feedback = $request->input('feedback');
            $feedback->status= $request->input('status');
            $feedback->image = $randomName;
            $feedback->save();
           
        return redirect()->route('feedbacks.index')
             ->with('success', 'Feedback create successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->route('feedbacks.index')
                        ->with('success','Feedback deleted successfully');
    }

}
