<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 30, 2016
 Time 9:35:54 PM
 Encoding UTF-8
 Project Aplikasi-Kebudayaan-Aceh
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.
  
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Aplikasi Kebudayaan Aceh</title>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link href="<?php echo base_url(); ?>assets/css/bundle.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet" type="text/css" />

    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Aplikasi Kebudayaan Aceh</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/admin"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/admin/kuliner"><i class="glyphicon glyphicon-dashboard"></i> Kuliner Aceh</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Dashboard
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="glyphicon glyphicon-dashboard"></i> Dashboard
                                </li>
                                <li class="active">
                                    <i class="glyphicon glyphicon-pencil"></i> Forms
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                            <h2>Ubah Data Kuliner Aceh</h2>

                            <form method="post" action="<?php echo base_url(); ?>index.php/admin/kuliner/ubah">

                                <?php foreach ($kuliner as $k) { ?>

                                    <div class="form-group">
                                        <label>ID Kuliner</label>
                                        <input value="<?php echo $k->id_kuliner_aceh; ?>" name="idKuliner1" class="form-control" type="text" placeholder="Masukkan Judul Kuliner Aceh" disabled />
                                        <input value="<?php echo $k->id_kuliner_aceh; ?>" name="idKuliner" class="form-control" type="hidden" />
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Kuliner</label>
                                        <input value="<?php echo $k->judul_kuliner; ?>" name="judulKuliner" class="form-control" type="text" placeholder="Masukkan Judul Kuliner Aceh" />
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Kuliner Aceh</label>
                                        <input value="<?php echo $k->gambar_kuliner; ?>" name="gambarKuliner" type="hidden" />
                                        <input value="<?php echo $k->gambar_kuliner; ?>" name="gambarKuliner1" class="form-control" type="text" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Kuliner Aceh</label>
                                        <textarea name="deskripsiKuliner" class="form-control"><?php echo $k->deskripsi_kuliner; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="<?php echo base_url(); ?>index.php/admin/kuliner">
                                        <button type="button" class="btn btn-warning">Batal</button>
                                    </a>

                                <?php } ?>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <script src="<?php echo base_url(); ?>assets/js/bundle.min.js" type="text/javascript"></script>
    </body>
</html>