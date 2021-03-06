<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 30, 2016
 Time 8:11:15 PM
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

        <?php $this->load->view('admin/layout/CssLayout') ?>
    </head>
    <body>

        <div id="wrapper">

            <?php $this->load->view('admin/layout/HeaderLayout') ?>

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
                                    <i class="glyphicon glyphicon-dashboard"></i> Kuliner Aceh
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <a href="<?php echo base_url(); ?>index.php/admin/kuliner/tambah">
                                <button class="btn btn-primary">
                                    Tambah Data <i class="glyphicon glyphicon-plus"></i>
                                </button>
                            </a>

                            <?php if (sizeof($kuliner) == 0) { ?>
                                <h2>Data Kuliner Masih Kosong</h2>
                            <?php } else { ?>
                                <h2>Daftar Kuliner Aceh</h2>
                                <div class="table-responsive">
                                    <table id="kuliner" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id Kuliner Aceh</th>
                                                <th>Judul Kuliner</th>
                                                <th>Gambar Kuliner</th>
                                                <th>Deskripsi Kuliner</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($kuliner as $k) { ?>
                                                <tr>
                                                    <td><?php echo $k->id_kuliner_aceh ?></td>
                                                    <td><?php echo $k->judul_kuliner ?></td>
                                                    <td><?php echo $k->gambar_kuliner ?></td>
                                                    <td><?php echo $k->deskripsi_kuliner ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>index.php/admin/kuliner/ubah/<?php echo $k->id_kuliner_aceh; ?>">
                                                            <button class="btn btn-success">
                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                            </button>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>index.php/admin/kuliner/hapus/<?php echo $k->id_kuliner_aceh; ?>">
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
        <?php $this->load->view('admin/layout/JsLayout') ?>
    </body>
</html>

