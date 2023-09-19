<?php
/* Smarty version 4.2.1, created on 2023-09-15 15:13:42
  from '/Users/steven/Library/Mobile Documents/com~apple~CloudDocs/Documents/PHPStorm/coop-emploi/module_accueil/vue/accueilVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65045886440928_39217735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d4d3ccee1e98a9dc5aafa7fcf4ba539103bb418' => 
    array (
      0 => '/Users/steven/Library/Mobile Documents/com~apple~CloudDocs/Documents/PHPStorm/coop-emploi/module_accueil/vue/accueilVue.tpl',
      1 => 1694783621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65045886440928_39217735 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html data-bs-theme="light" lang="fr" dir="ltr">
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
        <?php echo '<script'; ?>
 src="public/assets/js/config.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/vendors/simplebar/simplebar.min.js"><?php echo '</script'; ?>
>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
        <link href="public/assets/vendors/simplebar/simplebar.min.css" rel="stylesheet">
        <link href="public/assets/css/theme.css" rel="stylesheet" id="style-default">
        <link href="public/assets/css/user.css" rel="stylesheet" id="user-style-default">
    </head>
    <body>
        <main class="main" id="top">
            <div class="container" data-layout="container">
                <nav class="navbar bg-dark navbar-dark navbar-glass navbar-top navbar-expand-lg" data-double-top-nav="data-double-top-nav">
                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="navbar-toggle-icon">
                            <span class="toggle-line"></span>
                        </span>
                    </button>
                    <a class="navbar-brand me-1 me-sm-3" href="index.php">
                        <div class="d-flex align-items-center">
                            <img class="me-2" src="" alt="" width="40" />
                            <span class="font-sans-serif text-primary">Coop'Emploi</span>
                        </div>
                    </a>
                    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
                        <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="accueil">Accueil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="reunions">Réunions</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="reunions">
                                    <div class="bg-white dark__bg-1000 rounded-3 py-2">
                                        <a class="dropdown-item link-600 fw-medium" href="../index.html">Default</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="entretiens">Entretiens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="porteurs-de-projet">Porteurs de projet</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="accompagnateurs">Accompagnateurs</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="parametres">Paramètres</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="parametres">
                                    <div class="bg-white dark__bg-1000 rounded-3 py-2">
                                        <a class="dropdown-item link-600 fw-medium" href="../index.html">Default</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="plan-du-site">Plan du site</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                        <li class="nav-item ps-2 pe-0">
                            <div class="dropdown theme-control-dropdown">
                                <a class="nav-link d-flex align-items-center dropdown-toggle fa-icon-wait fs-0 pe-1 py-0" href="#" role="button" id="themeSwitchDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-sun fs-2" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="light"></span>
                                    <span class="fas fa-moon fs-2" data-fa-transform="shrink-3" data-theme-dropdown-toggle-icon="dark"></span>
                                    <span class="fas fa-adjust fs-2" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="auto"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-caret border py-0 mt-3" aria-labelledby="themeSwitchDropdown">
                                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="light" data-theme-control="theme">
                                            <span class="fas fa-sun"></span>
                                            Light
                                            <span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                                        </button>
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="dark" data-theme-control="theme">
                                            <span class="fas fa-moon" data-fa-transform=""></span>
                                            Dark
                                            <span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                                        </button>
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="auto" data-theme-control="theme">
                                            <span class="fas fa-adjust" data-fa-transform=""></span>
                                            Auto
                                            <span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="public/assets/images/defaut.png" alt="" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                    <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Set status</a>
                                    <a class="dropdown-item" href="../pages/user/profile.html">Profile &amp; account</a>
                                    <a class="dropdown-item" href="#!">Feedback</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../pages/user/settings.html">Settings</a>
                                    <a class="dropdown-item" href="../pages/authentication/card/logout.html">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                <br>
                <div class="content">
                    <div class="card">
                        <div class="card-body overflow-hidden p-lg-6">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <img class="img-fluid" src="" alt="" />
                                </div>
                                <div class="col-lg-6 ps-lg-4 my-5 text-center text-lg-start">
                                    <h3 class="text-primary">Test</h3>
                                    <p class="lead">Test2.</p>
                                    <a class="btn btn-falcon-primary" href="#">Première page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">2023 &copy; Coop'Emploi <span class="d-none d-sm-inline-block"> | </span><br class="d-sm-none" /> Réalisé par <a href="https://neon-info.fr/" target="_blank">Néon Info</a></p>
                            </div>
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">v0.0.1</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </main>

        <?php echo '<script'; ?>
 src="public/assets/vendors/popper/popper.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/vendors/bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/vendors/anchorjs/anchor.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/vendors/is/is.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/vendors/fontawesome/all.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/vendors/lodash/lodash.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/vendors/list.js/list.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/theme.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
