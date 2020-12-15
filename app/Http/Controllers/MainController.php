<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /*
    Cette méthode doit plutot recuperer les 5 dernières offres (les plus récentes)
    */
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

    /*
     Cette méthode recupère l'empoi en fonction de l'id
    */
    public function findJob($id){
        $job = Job::find($id);
        //dump($job);
        return view('voir_offre', compact('job'));
    }

    /* 
    Cette méthode recupère toutes les offres (emplois et stages) qui sont dans la BD
    l'affichage doit se faire du plus récentes aux enciennes offres
    */
    public function showJobs(){
        // On effectue une jointure des tables 'jobs' et 'companies' afin de 
        // recuperer le nom de l'entreprise qui se trouve dans la table companies
        $jobs = DB::table('jobs')
            ->join('companies','companies.id','=','jobs.company_id')
            ->select('jobs.*','companies.name')
            ->get();
        return view('emplois_stages', compact('jobs'));
    }

    public function showCompanies(){
        $companies = Company::all();
        return view('entreprises',compact('companies'));
    }
    
}
