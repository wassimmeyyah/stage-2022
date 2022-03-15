<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <!-- si on veut lier à un fichier css -->
    <link rel="stylesheet" type="text/css" href="../../html/css/porteur.css" />
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
                <a class="nav-link  text-white " href="#">Les porteurs </a>
            </li>

        </ul>
    </div>
</nav>
<div  class="card " style="text-align: center;">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4 p-3 mb-2 bg-primary text-white">Les porteurs</h3>
</div>
    <div class="d-flex justify-content-between">
        {{$porteurs->links()}}
            <p align="center">
                <a class="btn btn-primary " type="button" href="{{route('goPorteurAjouter')}}">
                    Ajouter un porteur

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

    <div class="card-body">
        <div id="table" class="table-editable bg-light">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
            <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                <tr>
                    <th class="text-center"> Identifiant du porteur</th>
                    <th class="text-center"> Nom du porteur</th>
                    <th class="text-center"> Adresse mail du porteur</th>


                </tr>
                </thead>
                <tbody>
                @foreach($porteurs as $porteur)
                    <tr>
                        <td class="pt-3-half" > {{$porteur->getKey()}} </td>
                        <td class="pt-3-half" >{{$porteur->PORTNom}}</td>
                        <td class="pt-3-half" >{{$porteur->PORTMail}}</td>
                        <td><a class="btn btn-primary" type="button" href="{{route('goPorteurModifier', ['porteur'=>$porteur->PORTCode])}}">
                                    Modifier

                                </a></td>
                        <td>
                                <a  href="#" class="btn btn-danger" type="button" onclick="if(confirm('Voulez-vous vraiment supprimer ce porteur ?')){document.getElementById('{{$porteur->PORTCode}}').submit() }" >
                                    Supprimer

                                </a>
                            <form id="{{$porteur->PORTCode}}" action="{{route('goPorteurSupprimer',['porteur'=>$porteur->PORTCode])}}" method="post">
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



