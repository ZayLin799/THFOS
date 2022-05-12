<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Batch_info;
use App\Models\Batch;
use App\Models\Course;

class FeedbackFEController extends Controller
{
    //

    public function index()
    {
        $courses = Course::all();
        $batches = Batch::all();
        $batch_infos = Batch_info::all();
        $feedbacks = Feedback::all();
        return view('frontend.feedback',compact('feedbacks','batch_infos','courses'));

    }

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
            $request->session()->flash('success', 'Thank you for your feedback.');
            $feedback->save();
           
        return redirect()->route('feedback.index');
    }
}
