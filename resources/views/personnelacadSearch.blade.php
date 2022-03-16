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
        <div class="collapse navbar-collapse p-3 mb-2 bg-danger " id="navbarTogglerDemo01">
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
        {{$personnelacad->links()}}
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
    @if(request()->input())
        <h6>{{$personnelacad->total()}} résultat(s) pour la recherche </h6>
    @endif


    <div class="card-body">
        <div id="table" class="table-editable bg-light">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
            <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                <tr>
                    <th class="text-center"> Identifiant de la personne</th>
                    <th class="text-center"> Nom de la personne</th>
                    <th class="text-center"> Prénom de la personne</th>
                    <th class="text-center"> Adresse mail de la personne</th>
                    <th class="text-center"> Discipline enseignée par la personne</th>
                    <th class="text-center"> Adresse de la personne</th>
                    <th class="text-center"> Téléphone de la personne</th>
                    <th class="text-center"> Etablissement de la personne</th>

                </tr>
                </thead>
                <tbody>
                @foreach($personnelacad as $personnelacads)
                    <tr>
                        <td class="pt-3-half" > {{$personnelacads->getKey()}} </td>
                        <td class="pt-3-half" >{{$personnelacads->PANom}}</td>
                        <td class="pt-3-half" >{{$personnelacads->PAPrenom}}</td>
                        <td class="pt-3-half" >{{$personnelacads->PAMail}}</td>
                        <td class="pt-3-half" >{{$personnelacads->PADiscipline}}</td>
                        <td class="pt-3-half" >{{$personnelacads->PAAdressePerso}}</td>
                        <td class="pt-3-half" >{{$personnelacads->PATel}}</td>
                        <td class="pt-3-half" >{{$personnelacads->ETABCode}}</td>
                        <td><a class="btn btn-primary" type="button" href="{{route('goPersonnelacadModifier', ['personnelacad'=>$personnelacads->PACode])}}">
                                Modifier

                            </a></td>
                        <td>
                            <a  href="#" class="btn btn-danger" type="button" onclick="if(confirm('Voulez-vous vraiment supprimer ce personnelacad ?')){document.getElementById('{{$personnelacads->PACode}}').submit() }" >
                                Supprimer

                            </a>
                            <form id="{{$personnelacads->PACode}}" action="{{route('goPersonnelacadSupprimer',['personnelacad'=>$personnelacads->PACode])}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>



