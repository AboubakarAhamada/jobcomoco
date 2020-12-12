<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class MainController extends Controller
{
    //list all jobs in the database

    public function getAllJobs(){
        $jobs = Job::all();
        dump($jobs);
        return view('index',compact($jobs));
    }
    
}
