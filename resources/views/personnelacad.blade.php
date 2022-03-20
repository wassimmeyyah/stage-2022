<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <!-- si on veut lier à un fichier css -->
    <link rel="stylesheet" type="text/css" href="../../html/css/personnelacad.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  bg-danger " id="navbarTogglerDemo01">
        <a class="navbar-brand text-uppercase text-white " href="{{route('goHome')}}">Accueil</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link  text-white " href="{{route('goHome')}}">Les experimentations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white " href="{{route('goEtablissement')}}">Les etablissements</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link  text-white " href="{{route('goPorteur')}}">Les porteurs </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white " href="{{route('goPersonnelacad')}}">Le personnel</a>
            </li>
        </ul>
    </div>
</nav>
<div  class="card " style="text-align: center;">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4 p-3 mb-2 bg-primary text-white">Le personnel</h3>
</div>
    <div class="d-flex justify-content-between">
        {{$personnelacads->links()}}
        @include('partials.search3')
            <p align="center">
                <a class="btn btn-primary " type="button" href="{{route('goPersonnelacadAjouter')}}">
                    Ajouter une personne

                </a>
            </p>

    </div>

    @if(session()->has("successDelete"))
        <div class="alert alert-success">
            <h3>{{session()->get('successDelete')}}</h3>
        </div>
    @endif
    @if(session()->has("successAjout"))
        <div class="alert alert-success">
            <h3>{{session()->get('successAjout')}}</h3>
        </div>
    @endif
@if(session()->has("successModify"))
    <div class="alert alert-success">
        <h3>{{session()->get('successModify')}}</h3>
    </div>
@endif

    <div class="card-deck">
        @foreach($personnelacads as $personnelacad)

            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250" style="width: 204%">
                        <div class="card-body d-flex flex-column align-items-start">

                            <h3 class="mb-0">
                                <a class="text-dark" href="#">{{$personnelacad->PANom}}</a>
                            </h3>
                            <div class="mb-1 text-muted"> {{$personnelacad->PAPrenom}}</div>
                            <p class="card-text mb-auto">Adresse Mail : {{$personnelacad->PAMail}}</p>
                            <div class="mb-1 text-muted"> {{$personnelacad->PADiscipline}}</div>
                            <p class="card-text mb-auto">{{$personnelacad->PATel}}</p>

                            <td><a href="{{route('goPersonnelacadAffichage', ['personnelacad'=>$personnelacad->PACode])}}">Voir plus </a></td><br>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <td><a class="btn btn-primary" type="button" href="{{route('goPersonnelacadModifier', ['personnelacad'=>$personnelacad->PACode])}}">
                                    Modifier

                                </a></td>
                        <td>
                                <a  href="#" class="btn btn-danger" type="button" onclick="if(confirm('Voulez-vous vraiment supprimer ce personnelacad ?')){document.getElementById('{{$personnelacad->PACode}}').submit() }" >
                                    Supprimer

                                </a>
                            <form id="{{$personnelacad->PACode}}" action="{{route('goPersonnelacadSupprimer',['personnelacad'=>$personnelacad->PACode])}}" method="post">
                                @csrf
                                    <input type="hidden" name="_method" value="delete">
                            </form>

                        </td></div>
                        </div>
                    </div>
                </div>


            </div>

@endforeach



