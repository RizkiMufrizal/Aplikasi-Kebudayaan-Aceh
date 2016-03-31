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
        <?php $this->load->view('admin/layout/JsLayout') ?>
    </body>
</html>
