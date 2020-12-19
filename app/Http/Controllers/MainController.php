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
        
        $jobs = DB::table('jobs')
            ->join('companies','companies.id','=','jobs.company_id')
            ->join('categories','categories.id','=', 'jobs.category_id')
            ->select('jobs.*','companies.name as company','categories.name as type')
            ->orderBy('created_at', 'DESC')->limit(3)
            ->get();
        //dump($jobs);
        
        return view('index',compact('jobs'));
    }

    /*
     Cette méthode recupère l'empoi en fonction de l'id
    */
    public function findJob($id){
        $job = Job::find($id);
        return view('voir_offre', compact('job'));
    }

    /* 
    Cette méthode recupère toutes les offres (emplois CDI et CDD) qui sont dans la BD
    l'affichage doit se faire du plus récentes aux enciennes offres
    */
    public function showJobs(){
        
        $jobs = DB::table('jobs')
        ->join('companies','companies.id','=','jobs.company_id')
        ->join('categories','categories.id','=', 'jobs.category_id')
        ->select('jobs.*','companies.name as company','categories.name as type')
        ->where('categories.name','CDI')
        ->orWhere('categories.name','CDD')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        return view('emplois_stages', compact('jobs'));
    }

     /* 
    Cette méthode recupère toutes les offres de stages qui sont dans la BD
    l'affichage doit se faire du plus récentes aux enciennes offres
    */
    public function showInternships(){
        
        $jobs = DB::table('jobs')
        ->join('companies','companies.id','=','jobs.company_id')
        ->join('categories','categories.id','=', 'jobs.category_id')
        ->select('jobs.*','companies.name as company','categories.name as type')
        ->where('categories.name','Stage')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        return view('emplois_stages', compact('jobs'));
    }

    public function showCompanies(){
        $companies = Company::all();
        return view('entreprises',compact('companies'));
    }

    public function apply(Request $request){

   
    }
    
}
