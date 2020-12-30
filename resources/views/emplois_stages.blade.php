@extends('template')

@section('content')

    @include('commun.menu')

    <section id="jobs">
		<div class="container">
            <h2>Toutes les offres en un seul endroit </h2>
            @foreach ($jobs as $job)
                <div class="company-details">
				<div class="job-update">
					<h4><b> <a href="{{'/voir_offre/'.$job->id}}">{{$job->title}}</a> </b></h4> <br>
					<i class="fa fa-table"></i><span>Publié : le {{date("d/m/Y à h:i",strtotime($job->created_at))}}</span><br>
					<i class="fa fa-building"></i><span>Entreprise : {{$job->company}}</span><br>
					<i class="fa fa-check-square"></i><span>Type de contrat : {{$job->type}}</span><br>
					<i class="fa fa-briefcase"></i><span>Expérience réquise : {{$job->experience}}</span><br>
					<!-- <i class="fa fa-graduation-cap"></i><span>Niveau d'études demandé : Bac+5</span><br> -->
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
            
			<!-- ------------------ Pagination ------------->

			{{ $jobs->links()}}
			<!--
			<ul class="page-link text-center">
				<li class="left-arrow">&#8592;</li>
				<li class="active">1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
				<li class="right-arrow">&#8594;</li>
			</ul>
			-->
		</div>
	</section>
    @include('commun.footer')
    
@endsection