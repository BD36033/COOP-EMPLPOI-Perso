<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil | Coop'Emploi</title>
    <link rel="apple-touch-icon" sizes="180x180" href="public/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="public/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#ffffff">
    <script src="public/assets/js/config.js"></script>
    <script src="public/assets/vendors/simplebar/simplebar.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="public/assets/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="public/assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="public/assets/css/user.css" rel="stylesheet" id="user-style-default">
</head>


<body>

<main class="main" id="top">
    <div class="container" data-layout="container">
        <!-- INCLUDE NAV -->


        {include file='public/header.tpl'}
        <br>
        <div class="content">
            <div class="card">
                <div class="card-body overflow-hidden p-lg-6">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="" alt="" />
                        </div>

                        <!------------Formulaire-------------------------------------------------------------------->
                        <div {if LieuTable::getMessageErreur() neq ''} class="alert alert-danger" role="alert"{/if}>
                            {LieuTable::getMessageErreur()}
                        </div>

                        <div class="card">
                            <div class="card-header"><strong></strong></div>

                            <form action="index.php" method="POST">
                                <!------------Formulaire consultation-->


                                <input type="hidden" name="gestion" value="lieu">

                                <input type="hidden" name="action" value="{$action}">

                                <div class="card-body card-block">

                                    {if $action neq 'ajouter'}


                                        <div class="form-group">
                                            <label for="text" class=" form-control">
                                                Identifiant
                                            </label>
                                            <input type="text" name="id" class="form-control"
                                                   value="{$unLieu->getId()}"
                                                   readonly>
                                        </div>

                                    {/if}

                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Nom <sup>*</sup>:
                                        </label>
                                        <input type="text" name="nom" class="form-control" value="{$unLieu->getNom()}"

                                                {$readonly}>
                                    </div>


                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Service, N° bureau ou d'étage <sup>*</sup>:
                                        </label>
                                        <input type="text" name="adresse1" class="form-control" value="{$unLieu->getAdresse1()}"

                                                {$readonly}>
                                    </div>



                                    <div class="form-group">
                                    <label for="text" class=" form-control">
                                        Résidence, Immeuble, Bâtiment, ZI <sup>*</sup>:
                                    </label>
                                    <input type="text" name="adresse2" class="form-control" value="{$unLieu->getAdresse2()}"

                                            {$readonly}>
                                </div>





                                <div class="form-group">
                                <label for="text" class=" form-control">
                                    Numéro de voie, type, nom de la voie <sup>*</sup>:
                                </label>
                                <input type="text" name="adresse3" class="form-control" value="{$unLieu->getAdresse3()}"

                                        {$readonly}>
                                </div>




                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Mention de la distribution, lieu-dit <sup>*</sup>:
                                        </label>
                                        <input type="text" name="adresse4" class="form-control" value="{$unLieu->getAdresse4()}"

                                                {$readonly}>
                                    </div>





                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Code postal <sup>*</sup>:
                                        </label>
                                        <input type="text" name="codepostal" class="form-control" value="{$unLieu->getCodePostal()}"

                                                {$readonly}>
                                    </div>

                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Localité de destination cédex <sup>*</sup>:
                                        </label>
                                        <input type="text" name="ville" class="form-control" value="{$unLieu->getVille()}"

                                                {$readonly}>
                                    </div>


                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Contact <sup>*</sup>:
                                        </label>
                                        <input type="text" name="contact" class="form-control" value="{$unLieu->getContact()}"

                                                {$readonly}>
                                    </div>




                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Telephone <sup>*</sup>:
                                        </label>
                                        <input type="text" name="telephone" class="form-control" value="{$unLieu->getTelephone()}"

                                                {$readonly}>
                                    </div>




                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Capacite accueil <sup>*</sup>:
                                        </label>
                                        <input type="text" name="capaciteaccueil" class="form-control" value="{$unLieu->getCapaciteAccueil()}"

                                                {$readonly}>
                                    </div>


                                    <div class="card-body card-block">

                                        <div class="col-md-6">
                                            {if $action !='consulter'}
                                                <input type="submit"
                                                       class="btn btn-submit"
                                                        name="btn-valider"
                                                       value="{$action|capitalize}">

                                            {/if}

                                        </div>
                                        <br>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                     {include file='public/footer.tpl'}
    </main>
 </body>