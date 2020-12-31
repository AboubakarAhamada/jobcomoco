<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     *  Cette méthode doit plutot recuperer : 
     * 1) les 5 dernières offres (les plus récentes)
     * 2) le nombre d'emplois et companies enregistrés
     * @return void
     */
    
    public function index(){
        
        $jobs = DB::table('jobs')
            ->join('companies','companies.id','=','jobs.company_id')
            ->join('categories','categories.id','=', 'jobs.category_id')
            ->select('jobs.*','companies.name as company','categories.name as type')
            ->orderBy('created_at', 'DESC')->limit(3)
            ->get();
        //dump($jobs);

        $nbCompanies = Company::count();
        $nbJobs = Job::count();
        
        return view('index',compact('jobs','nbCompanies','nbJobs'));
    }

    /**
     * findJob
     * Cette méthode recupère l'empoi en fonction de son id 
     *
     * @param [type] $id
     * @return view with an model of Job
     */
    public function findJob($id){
        $job = Job::find($id);
        return view('voir_offre', compact('job'));
    }

    /**
     * findJobByKeyWords()
     * 
     *Cette fonction permet de chercher un emploi par un ou plusieurs mots clés 
     * @return void
     */
    public function findJobByKeyWords(Request $request){
        //$keywords = $request->all();
        $keyword = $request->keyword;
        $local = $request->local;
       
        $jobs = DB::table('jobs')
                ->join('companies','companies.id','=','jobs.company_id')
                ->join('categories','categories.id','=', 'jobs.category_id')
                ->where('title','LIKE',"%$keyword%")
                ->orWhere('description','LIKE',"%$keyword%")
                ->where('jobs.location','LIKE',"%$local%")
                ->select('jobs.*','companies.name as company','categories.name as type')
                ->get();
            
        //dump($jobs);
        return view('index',compact('jobs'));
    }

    /**
     * showJobs()
     * Cette méthode recupère toutes les offres (emplois CDI et CDD) qui sont dans la BD
     * l'affichage doit se faire du plus récentes aux enciennes offres
     *
     * @return void
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

     /**
      * showInternships
      * Cette méthode recupère toutes les offres de stages qui sont dans la BD
      * l'affichage doit se faire du plus récentes aux enciennes offres
      * @return view
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

    /**
     * showCompanies
     * Cette methode liste toutes les entreprises enrégistre dans la base de données
     *
     * @return view
     */
    public function showCompanies(){
        $companies = Company::all();
        return view('entreprises',compact('companies'));
    }

    /**
     * apply 
     * La fonction apply gère la soumission d'un candidature à un emploi
     * Stock le fichier (cv) uploadé dans le dossier store/uploads
     * Et enregistre les infos du candidat dans la base de données
     *
     * @param Request $request
     * @return void
     */
    public function apply(Request $request){
        
        $application = new Application;  // Not god at all. I must use Dependancy Injection

        $request->validate([
            'cv_path' => 'required|mimes:pdf,docs,doc|max:2048',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i'
        ]);
        
        if($request->hasFile('cv_path')) {
            $fileName = time().'_'.$request->cv_path->getClientOriginalName();
            $filePath = $request->file('cv_path')->storeAs('uploads', $fileName, 'public');

            $application->cv_path = '/storage/' . $filePath;
        }
       
        //$application->cv_path = $request->cv_path;
        $application->firstName = $request->firstName;
        $application->lastName = $request->lastName;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->job_id = $request->job_id;
        
        $application->save();
        return back()
            ->with('success','Votre candidature a été bien envoyée au recruteur');
   
    }

    /**
     * showPosts function
     *Affiche tous les articles de la rubrique 'DIVERS'
     * @return view
     */
    public function showPosts(){
        return view('postes.index');
    }
    
}
