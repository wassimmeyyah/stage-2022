<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <!-- si on veut lier à un fichier css -->
    <link rel="stylesheet" type="text/css" href="../../html/css/etablissement.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>

<form class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  bg-danger " id="navbarTogglerDemo01">
            <a class="navbar-brand text-uppercase text-white " href="{{route('goHome')}}">Accueil</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link  text-white " href="{{route('goExperimentation2')}}">Les experimentations</a>
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
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4 p-3 mb-2 bg-primary text-white">Les Etablissements</h3>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif

        <form method="get" action="{{route('goPersonnelacadAffichage',['personnelacad'=>$personnelacad->PACode])}}">


            <main role="main" class="container">
                <div class="row">
                    <div class="col-md-8 blog-main">
                        <h3 class="pb-3 mb-4 font-italic border-bottom">
                             {{$personnelacad->PANom}} {{$personnelacad->PAPrenom}}
                        </h3>

                        <div class="blog-post">
                            <h2 class="blog-post-title">{{$personnelacad->PAMail}}</h2>
                            <p class="blog-post-meta">{{$personnelacad->PATel}}<a href="#">Appeler</a></p>
                            <p>Ce membre de l'académie provient de l'etablissement {{$personnelacad->ETABCode}}. Le membre est spécialisé en {{$personnelacad->PADiscipline}}.

                            </p>

                            <p></p>
                            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" src="/Image/imageacadlyon.png" width="120" height="120" alt="/Image/imageacadlyon.png">
                            <hr>
                            <a type="submit" id="id3" class="btn btn-secondary btn-sm" href="{{route("goPersonnelacadPDF", ['personnelacad'=>$personnelacad->PACode])}}">Telecharger en PDF</a>
                        </div>
                    </div>
                </div>
            </main>
        </form>
    </div>
</form>
