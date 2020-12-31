@extends('template')

@section('content')
	<!------------------- Header ------------------------>
	<section id="header">
		@include('commun.menu')
		
		<div class="banner text-center">
			<h1>DECROCHEZ VOTRE JOB DE REVE</h1>
			<p> Bienvenu sur Jobcomoco, votre site pour trouver votre job de rêve.</p>
		</div>

	</section>

	<div class="seach-job text-center">
		<form action="{{route('search')}}" method="GET">
		<input type="text" name="keyword" class="form-control" placeholder="Recherchez par mots clés">
		<!--<input type="text" name="" class="form-control" placeholder="Entreprise"> -->
		<input type="text" name="local" class="form-control" placeholder="Localité">
		<button type="submit" class="btn btn-success">Trouver un emploi</button>
		</form>
	</div>

	<!------------------------ TOP RECRUITERS ------------------->
	<section id="top-recruters">
		<div class="container text-center">
			<h3>LES TOPES ENTREPRISES QUI RECRUTENT</h3>
			<div>
				<img src="images/bbc.jpg">
				<img src="images/comores-telecom.png" >
				<img src="images/ci.png">
				<img src="images/eda.jpg">
			</div>
			<div>
				<img src="images/nassib.png">
				<img src="images/exim-bank.jpg" >
				<img src="images/colas.png">
				<img src="images/cbe.jpg">
			</div>
			<div>
				<img src="images/comores-entreprise.jpg">
				<img src="images/meck.jpg" >
				<img src="images/telma.jpg">
				<img src="images/plan.jpg">
			</div>
		</div>
	</section>

	<!------------------------- RENCENTS JOBS ---------------->
	<section id="jobs">
		<div class="container">
            <h4>Publiés recement </h4>
            @foreach ($jobs as $job)
                <div class="company-details">
				<div class="job-update">
					<h4><b> <a href="{{'/voir_offre/'.$job->id}}">{{$job->title}}</a> </b></h4> <br>
					<i class="fa fa-table"></i><span>Publié : le {{date("d/m/Y à h:i",strtotime($job->created_at))}}</span><br>
					<i class="fa fa-building"></i><span>Entreprise : {{$job->company}}</span><br>
					<i class="fa fa-check-square"></i><span>Type de contrat : {{$job->type}}</span><br>
					<i class="fa fa-briefcase"></i><span>Expérience réquise : {{$job->experience}}</span><br>
					<!--<i class="fa fa-graduation-cap"></i><span>Niveau d'études demandé : Bac+5</span><br> -->
					<i class="fa fa-money"></i><span> Salaire : {{$job->salary}} </span><br>
					<i class="fa fa-map-marker"></i><span> {{$job->location}}</span><br>
					<!--
					<p>Skills <i class="fa fa-angle-double-right"></i> <small> Java </small> <small> .Net </small>
						<small> HTML5 </small><small> MySQL </small>
					</p>  
					-->                   
				</div>
				<div class="voir-btn">
						<!--<input type="button" name="" class="btn btn-primary" value="Voir l'offre"> -->
						<button class="btn btn-primary"> 
							<a href="{{'/voir_offre/'.$job->id}}" style="text-decoration: none; color:#fff">
							Voir l'offre</a> </button>
				</div>
			</div>
            @endforeach
            
		</div>
	</section>

	<!----------------------- Site stats------------------------------>
	<section id="site-stats">
		<div class="container text-center">
			<h3>JOBCOMOCO SITE STATS</h3>
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-6">
							<div class="stats-box">
								<i class="fa fa-user-o"></i><span><small>10k +</small></span>
								<p>Job Seekers</p>
							</div>
						</div>
						<div class="col-6">
							<div class="stats-box">
								<i class="fa fa-slideshare"></i><span><small>5000 </small></span>
								<p>Employers</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="row">
						<div class="col-6">
							<div class="stats-box">
								<i class="fa fa-hand-peace-o"></i><span><small>{{$nbJobs}} +</small></span>
								<p>Offres d'emploi actifs</p>
							</div>
						</div>
						<div class="col-6">
							<div class="stats-box">
								<i class="fa fa-building-o"></i><span><small>{{$nbCompanies}} +</small></span>
								<p>Entreprises</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>

<!----------------------- App banner ------------------------>

<section id="app-banner" class="text-center">
	<h1>Find Job On Mobile, Download Jobcomoco App</h1>
	<img src="images/app-store.png">
	<img src="images/google-play.png">
	
</section>

<!-------------------- Footer --------------------->

@include('commun.footer')
@endsection
