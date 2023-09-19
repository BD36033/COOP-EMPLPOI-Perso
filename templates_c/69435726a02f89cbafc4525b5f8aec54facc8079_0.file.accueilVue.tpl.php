<?php
/* Smarty version 4.2.1, created on 2023-09-19 13:39:14
  from 'C:\laragon\www\COOP-EMPLOI\module_accueil\vue\accueilVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6509a482dbde29_55032230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69435726a02f89cbafc4525b5f8aec54facc8079' => 
    array (
      0 => 'C:\\laragon\\www\\COOP-EMPLOI\\module_accueil\\vue\\accueilVue.tpl',
      1 => 1695129143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6509a482dbde29_55032230 (Smarty_Internal_Template $_smarty_tpl) {
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
               <!-- INCLUDE NAV -->


                <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <br>
                <div class="content">
                    <div class="card">
                        <div class="card-body overflow-hidden p-lg-6">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                </div>

                                <div class="col-lg-6 ps-lg-4 my-5  text-lg-start">

                                    <h3 class="font-sans-serif text-warning">Accueil</h3>
                                    <p>Outil de gestion Coop'emploi</p>


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
