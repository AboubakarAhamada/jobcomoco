<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //list all jobs in the database
    public function index(){
        
        // On effectue une jointure des tables 'jobs' et 'companies' afin de 
        // recuperer le nom de l'entreprise qui se trouve dans la table companies
        $jobs = DB::table('jobs')
            ->join('companies','companies.id','=','jobs.company_id')
            ->select('jobs.*','companies.name')
            ->get();
        //dump($jobs);
        //$job = Job::find(1);
        //dump($job->company->name);
        return view('index',compact('jobs'));
    }

    public function apply($id){
        $job = Job::find($id);
        //dump($job);
        return view('voir_offre', compact('job'));
    }
    
}
