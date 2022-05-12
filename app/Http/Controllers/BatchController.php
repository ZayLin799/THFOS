<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        return view('backend.batch.show',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.batch.create');
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
                'batch_name'=> 'required'
            ]);

        $batch   = new Batch;
        $batch->batch_name = request('batch_name');
        $batch->save();
        $request->session()->flash('success_message', 'Batch created successfully');
        return redirect()->route('batch.index')
        ->with('success', 'Batch created successfully.');
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
         $batch=Batch::find($id);
        return view('backend.batch.edit',compact('batch'));    
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
        $request->validate(
        [
            "batch_name"=>'required',
        ]);

        $batch = Batch::find($id);
        $batch->batch_name=request('batch_name');
        $batch->save();
        return redirect()->route('batch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch= Batch::find($id);
        $batch->delete();
        return redirect()->route('batch.index')
        ->withSuccess('status','Batch delete successfully.');    
    }
}
