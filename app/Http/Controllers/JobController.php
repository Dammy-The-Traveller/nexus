<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use \App\Models\User;
use \Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;
class JobController extends Controller
{
    public function index(){

        $jobs =Job::with('employer')->latest()->cursorPaginate(3);
        return view('jobs.index', [
            "jobs" => $jobs
        ]);
    }

    public function Create(){
        return view('jobs.create');
    }

    public function Show(Job $job){
        return view('jobs.show', [
            'job' => $job
        ]);
    }


    public function Store(){
           //validation
    request()->validate([
        //we can provided a minimum of what the user supposed to enter like :
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    Mail::to($job->employer->user)->queue(
        new  JobPosted($job)
    );

    return redirect('/jobs');
    }

    public function Edit(JOB $job){
     
      
        // this would check if you can edit the job or cannot edit it
    //    if( Auth::user()->cannot('edit-job', $job)){
    //     };

        // if(Auth::guest()){
        //     return redirect('/login');
        // }

        Gate::authorize('edit', $job);
        // this is use to personally handle a response if gate denies an access to d=edit a job
    //    if( Gate::denies('edit-job', $job)){

    //    };
  

        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function Update(JOB $job){
           //validate first
    request()->validate([
        //we can provided a minimum of what the user supposed to enter like :
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    //authorize 
    //update the job
    //$job = Job::find($id);

    // this also same as the one down
    // $job-> title = request('title');
    // $job-> salary = request('salary');
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),

    ]);


    // and persist
    //redirect to the job page
    return redirect('/jobs/'. $job->id);
    }

    public function Destroy(JOB $job){
        $job->delete();

        // redirect
        return redirect('/jobs');
    }
}
