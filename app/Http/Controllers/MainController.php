<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Job;

class MainController extends Controller
{
    //list all jobs in the database
    public function index(){
        $jobs = Job::all();
        $job = Job::find(1);
        //dump($job->company->name);
        return view('index',compact('jobs'));
    }

    public function apply($id){
        $job = Job::find($id);
        //dump($job);
        return view('voir_offre', compact('job'));
    }
    
}
