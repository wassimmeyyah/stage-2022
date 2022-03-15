<!-- create.blade.php -->



    <head>
        <meta charset="UTF-8">
        <!-- si on veut lier à un fichier css -->
        <link rel="stylesheet" type="text/css" href="../../html/css/etablissement.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>

    <div class="card uper">
        <div class="card-header">
            Ajouter un etablissement
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


            <form method="post" action="{{ route('goEtablissementAjouter') }}">
                .         @csrf
                <div class="form-group">
                    <label for="ETABCode">Ajouter un identifiant d'etablissement' :</label>
                    <input type="text" class="form-control" name="ETABCode"/>
                </div>

                <div class="form-group">
                    <label for="ETABNom">Nom de l'etablissement :</label>
                    <input type="text" class="form-control" name="ETABNom"/>
                </div>
                <div class="form-group">
                    <label for="ETABMail">Adresse Mail de l'etablissement :</label>
                    <input type="text" class="form-control" name="ETABMail"/>
                </div>
                <div class="form-group">
                    <label for="ETABChef">Nom du chef d'etablissement :</label>
                    <input type="text" class="form-control" name="ETABChef"/>
                </div>
                <div class="form-group">
                    <label for="ETABAdresse">Adresse de l'etablissement :</label>
                    <input type="text" class="form-control" name="ETABAdresse"/>
                </div>
                <div class="form-group">
                    <label for="ETABTel">Telephone de l'etablissement :</label>
                    <input type="text" class="form-control" name="ETABTel"/>
                </div>

                <div class="form-group">
                    <label for="TERRCode">Departement :</label>
                    <input type="text" class="form-control" name="TERRCode"/>
                </div>
                <div class="form-group">
                    <label for="TYPCode">Type de l'etablissment :</label>
                    <input type="text" class="form-control" name="TYPCode"/>
                </div>
                <div class="form-group">
                    <label for="SPECode">Spécialité de l'etablissement :</label>
                    <input type="text" class="form-control" name="SPECode"/>
                </div>
                <div class="form-group">
                    <label for="VILCode">Ville de l'etablissement :</label>
                    <input type="text" class="form-control" name="VILCode"/>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a class="btn btn-danger" href="{{route('goEtablissement')}}">Annuler</a>
            </form>
        </div>
    </div>

