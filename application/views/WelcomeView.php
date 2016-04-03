<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Apr 3, 2016
 Time 10:11:35 AM
 Encoding UTF-8
 Project Aplikasi-Kebudayaan-Aceh
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.

-->
<html lang="en" ng-app="Aplikasi-Kebudayaan-Aceh">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>Parallax Template - Materialize</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bundle-user.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="green z-depth-2" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" ui-sref="home" class="brand-logo">
                    <img style="width: 150px; width: 150px" src="<?php echo base_url(); ?>assets/img/logo.png" />
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="white-text" ui-sref="kuliner">Kuliner</a>
                    </li>
                    <li>
                        <a class="white-text" href="#">Wisata</a>
                    </li>
                    <li>
                        <a class="white-text" href="#">Tarian</a>
                    </li>
                    <li>
                        <a class="white-text" href="#">Musik</a>
                    </li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <a ui-sref="kuliner">Kuliner</a>
                    </li>
                    <li>
                        <a href="#">Wisata</a>
                    </li>
                    <li>
                        <a href="#">Tarian</a>
                    </li>
                    <li>
                        <a href="#">Musik</a>
                    </li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div ui-view="lazyLoadView"></div>

        <footer class="page-footer teal">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">About Me</h5>
                        <p class="grey-text text-lighten-4">
                            Developer bernama Rizki Mufrizal, berasal dari aceh. Sekarang developer sebagai mahasiswa aktif jurusan teknik informatika di Universitas Gunadarma. Di sela - sela kesibukan sebagai asisten laboratorium teknik informatika, developer juga aktif dalam mempelajari berbagai teknologi open source terutama di bidang pemrograman Java, Javascript dan Linux.
                        </p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Contact Us</h5>
                        <ul>
                            <li>
                                <a class="white-text" href="#!">Link 1</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>

        <!--  Scripts-->
        <script src="<?php echo base_url(); ?>assets/js/bundle-user.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/app/scripts/app.js"></script>

    </body>
</html>
