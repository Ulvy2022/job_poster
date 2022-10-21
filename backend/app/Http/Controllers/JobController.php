<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    public function index()
    {
        return Job::get();
    }


    public function store(Request $request)
    {
        $job = new Job();
        $job->user_id = $request->user_id;
        $job->job_title = $request->job_title;
        $job->company_location = $request->company_location;
        $job->job_type = $request->job_type;
        $job->job_closedate = $request->job_closedate;
        $job->company_name = $request->company_name;
        $job->salary = $request->salary;
        $job->contact_name = $request->contact_name;
        $job->contact_email = $request->contact_email;
        $job->job_description = $request->job_description;
        $job->job_requirement = $request->job_requirement;
        $job->save();
        return response()->json(['msg'=>'success']);
    }


    public function show($id)
    {
        return Job::with(['user'])->where('id',$id)->get();
    }


    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->job_title = $request->job_title;
        $job->job_location = $request->job_location;
        $job->job_type = $request->job_type;
        $job->job_closedate = $request->job_closedate;
        $job->company_name = $request->company_name;
        $job->salary = $request->salary;
        $job->contact_name = $request->contact_name;
        $job->contact_email = $request->contact_email;
        $job->job_description = $request->job_description;
        $job->job_requirement = $request->job_requirement;
        $job->save();
        return response()->json(['msg'=>'updated']);
    }


    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->json(['msg'=>'deleted']);
    }
}
