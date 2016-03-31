<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 30, 2016
 Time 10:34:09 PM
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
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/admin/wisata"><i class="glyphicon glyphicon-dashboard"></i> Wisata Aceh</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/admin/musik"><i class="glyphicon glyphicon-dashboard"></i> Musik Aceh</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/admin/tarian"><i class="glyphicon glyphicon-dashboard"></i> Tarian Aceh</a>
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
                                    <i class="glyphicon glyphicon-dashboard"></i> Wisata Aceh
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <a href="<?php echo base_url(); ?>index.php/admin/wisata/tambah">
                                <button class="btn btn-primary">
                                    Tambah Data <i class="glyphicon glyphicon-plus"></i>
                                </button>
                            </a>

                            <?php if (sizeof($wisata) == 0) { ?>
                                <h2>Data Wisata Masih Kosong</h2>
                            <?php } else { ?>
                                <h2>Daftar Wisata Aceh</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id Wisata Aceh</th>
                                                <th>Judul Wisata</th>
                                                <th>Gambar Wisata</th>
                                                <th>Deskripsi Wisata</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($wisata as $w) { ?>
                                                <tr>
                                                    <td><?php echo $w->id_wisata_aceh ?></td>
                                                    <td><?php echo $w->judul_wisata ?></td>
                                                    <td><?php echo $w->gambar_wisata ?></td>
                                                    <td><?php echo $w->deskripsi_wisata ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>index.php/admin/wisata/ubah/<?php echo $w->id_wisata_aceh; ?>">
                                                            <button class="btn btn-success">
                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                            </button>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>index.php/admin/wisata/hapus/<?php echo $w->id_wisata_aceh; ?>">
                                                            <button class="btn btn-danger">
                                                                <i class="glyphicon glyphicon-trash"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/bundle.min.js" type="text/javascript"></script>
    </body>
</html>
