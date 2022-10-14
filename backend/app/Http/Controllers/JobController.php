<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Job::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->user_id = $request->user_id;
        $job->job_title = $request->job_title;
        $job->job_location = $request->job_location;
        $job->job_type = $request->job_type;
        $job->job_closedate = $request->job_closedate;
        // $job->company_details = $request->company_details;
        $job->salary = $request->salary;
        $job->contact_name = $request->contact_name;
        $job->contact_email = $request->contact_email;
        // $job->subjects = $request->subjects;
        $job->job_description = $request->job_description;
        $job->save();
        return response()->json(['msg'=>'success']);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->job_title = $request->job_title;
        $job->job_location = $request->job_location;
        $job->job_type = $request->job_type;
        $job->job_closedate = $request->job_closedate;
        // $job->company_details = $request->company_details;
        $job->salary = $request->salary;
        $job->contact_name = $request->contact_name;
        $job->contact_email = $request->contact_email;
        // $job->subjects = $request->subjects;
        $job->job_description = $request->job_description;
        $job->save();
        return response()->json(['msg'=>'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->json(['msg'=>'deleted']);
    }
}
