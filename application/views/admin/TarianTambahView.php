<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 31, 2016
 Time 9:29:53 AM
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
                                    <i class="glyphicon glyphicon-pencil"></i> Forms
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                            <h2>Input Data Tarian Aceh</h2>

                            <?php echo $error; ?>

                            <form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>index.php/admin/tarian/simpan">
                                <div class="form-group">
                                    <label>Judul Tarian</label>
                                    <input name="judulTarian" class="form-control" type="text" placeholder="Masukkan Judul Tarian Aceh" />
                                </div>
                                <div class="form-group">
                                    <label>Tarian Aceh</label>
                                    <input class="form-control" type="file" name="video" />
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Tarian Aceh</label>
                                    <textarea name="deskripsiTarian" class="form-control" placeholder="Masukkan Keterangan Tarian Aceh"></textarea>
                                </div>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url(); ?>index.php/admin/tarian">
                                    <button type="button" class="btn btn-warning">Batal</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('admin/layout/JsLayout') ?>
    </body>
</html>
