@extends('template')

@section('content')
    @include('commun.menu')

    <div class="container" id="voir_offre">
    <h1 align="center"> {{$job->title}} </h1>
    {!! $job->description !!}

    <div class="postuler-btn">
        <!-- Appuyer ce bouton ouvrira le modal qui se trouve dans le view 'postuler' -->
        <input type="button" class="btn btn-primary"data-toggle="modal" data-target="#myModal"  value="Envoyer ma candidature">
    </div>
    </div>
    
@include('postuler')
@include('commun.footer')
@endsection