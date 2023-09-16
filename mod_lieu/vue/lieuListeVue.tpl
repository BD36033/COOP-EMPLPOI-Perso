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
                                <!------------Tableau---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="card-header">
                            <strong class="card-title"><!-- PLACER LE TITRE DE LA PAGE-->

                                <!-- PLACER LE FORMULAIRE D'AJOUT-->
                                <form class="pos-ajout" method="post" action="index.php">
                                    <input type="hidden" name="gestion" value="lieu">
                                    <input type="hidden" name="action" value="form_ajouter">
                                    <label>Ajouter un produit :
                                        <input type="image"
                                               name="btn_ajouter"
                                               src="images/icones/a16.png">
                                    </label>
                                </form>

                            </strong>
                        </div>

                        <div class="card-body">

                            <div {if LieuTable::getMessageSuccess () neq ''} class="alert alert-success" role="alert" {/if} >
                                {LieuTable::getMessageSuccess ()}
                            </div>

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <!-- PLACER LA LISTE DES LIEUX -->
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Code postal</th>
                                    <th>Ville</th>
                                    <th>Contact</th>
                                    <th>Telephone</th>


                                    <th class="pos-actions">Consulter</th>
                                    <th class="pos-actions">Modifier</th>
                                    <th class="pos-actions">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                {foreach from=$listeLieux item=unLieu}
                                    <tr>
                                        <td>{$unLieu->getId()}</td>
                                        <td>{$unLieu->getNom()}</td>
                                        <td>{$unLieu->getAdresse1()}</td>
                                        <td>{$unLieu->getCodePostal()}</td>
                                        <td>{$unLieu->getTelephone()}</td>
                                        <td>
                                            <form action="index.php" method="post">
                                                <input type="hidden" name="id" value="{$unLieu->getId()}">
                                                <input type="hidden" name="gestion" value="lieu">
                                                <input type="hidden" name="action" value="form_consulter">
                                                <input type="image" name="btn_consulter" src="images/icones/p16.png">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="index.php" method="post">
                                                <input type="hidden" name="id" value="{$unLieu->getId()}">
                                                <input type="hidden" name="gestion" value="lieu">
                                                <input type="hidden" name="action" value="form_modifier">
                                                <input type="image" name="btn_modifier" src="images/icones/m16.png">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="index.php" method="post">
                                                <input type="hidden" name="id" value="{$unLieu->getId()}">
                                                <input type="hidden" name="gestion" value="lieu">
                                                <input type="hidden" name="action" value="form_supprimer">
                                                <input type="image" name="btn_supprimer" src="images/icones/s16.png">
                                            </form>
                                        </td>
                                    </tr>

                                {/foreach}

                                </tbody>
                            </table>
                        </div>
                    </div>








                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">2023 &copy; Coop'Emploi <span class="d-none d-sm-inline-block"> </span> </p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">v0.0.1</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</main>






</body>
