@extends('template')

@section('content')
    @include('commun.menu')
    <div class="container" id="companies">
        
            @foreach ($companies as $company)
            <div id="logo_company">
                <img src="{{'../storage/logos_entreprises/'.$company->logo}}" alt="">
            </div>
            <div id="info_company">
                {{$company->name}} <br> {{$company->location}} <br>
                {{$company->email}} <br> {{$company->phone}} <br>
                 {{$company->website}} 
            </div>
        
            @endforeach
        
    </div>
    @include('commun.footer')
@endsection