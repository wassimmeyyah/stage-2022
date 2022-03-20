<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <!-- si on veut lier à un fichier css -->
    <link rel="stylesheet" type="text/css" href="../../html/css/etablissement.css" />

</head>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                {{$porteur->PORTNom}}
            </h3>

            <div class="blog-post">
                <h2 class="blog-post-title">{{$porteur->PORTMail}}</h2>
                <p class="blog-post-meta">{{$porteur->PORTTel}}</p>
                <p>Le porteur provient de l'etablissement {{$porteur->ETABCode}}

                </p>

                <p> </p>

                <hr>

            </div>
        </div>
    </div>
</main>
