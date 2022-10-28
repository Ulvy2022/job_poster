<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JobsPoster;
use App\Models\Subscribsion;

class JobsPosterController extends Controller
{
    public function index()
    {
        return JobsPoster::get();
    }

    public function store(Request $request)
    {
        $validated = $request->validateWithBag('JobsPoster', [
            'user_id' => 'required',
            'job_title' => 'required|min:5|max:30|',
            'company_location' => 'required|min:5|max:50|',
            'job_type'=>'required|min:2|max:20',
            'company_name'=>'required|min:5|max:30',
            'contact_name'=>'required|min:2|max:20',
            'contact_email'=> 'required',
            'job_description'=>'required|min:10|max:500',
            'job_requirement'=>'required|min:10|max:500',
        ]);

        $job = new JobsPoster();
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
        return JobsPoster::with(['user'])->where('id',$id)->get();
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validateWithBag('JobsPoster', [
            'user_id' => 'required',
            'job_title' => 'required|min:5|max:30|',
            'company_location' => 'required|min:5|max:50|',
            'job_type'=>'required|min:2|max:20',
            'company_name'=>'required|min:5|max:30',
            'contact_name'=>'required|min:2|max:20',
            'contact_email'=> 'required',
            'job_description'=>'required|min:10|max:500',
            'job_requirement'=>'required|min:10|max:500',
        ]);
        $job = JobsPoster::findOrFail($id);
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
        return response()->json(['msg'=>'updated']);
    }
    public function destroy($id)
    {
        $job = JobsPoster::findOrFail($id);
        $job->delete();
        return response()->json(['msg'=>'deleted']);
    }

    public function getJobById($id)
    {
        return JobsPoster::findOrFail($id);
    }
}
