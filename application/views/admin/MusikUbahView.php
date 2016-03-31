<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 31, 2016
 Time 9:03:40 AM
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

                            <h2>Ubah Data Musik Aceh</h2>

                            <form method="post" action="<?php echo base_url(); ?>index.php/admin/musik/ubah">

                                <?php foreach ($musik as $k) { ?>

                                    <div class="form-group">
                                        <label>ID Musik</label>
                                        <input value="<?php echo $k->id_musik_aceh; ?>" name="idMusik1" class="form-control" type="text" placeholder="Masukkan Judul Musik Aceh" disabled />
                                        <input value="<?php echo $k->id_musik_aceh; ?>" name="idMusik" class="form-control" type="hidden" />
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Musik</label>
                                        <input value="<?php echo $k->judul_musik; ?>" name="judulMusik" class="form-control" type="text" placeholder="Masukkan Judul Musik Aceh" />
                                    </div>
                                    <div class="form-group">
                                        <label>Musik Aceh</label>
                                        <input value="<?php echo $k->musik_aceh; ?>" name="musikAceh" type="hidden" />
                                        <input value="<?php echo $k->musik_aceh; ?>" name="musikAceh1" class="form-control" type="text" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Musik Aceh</label>
                                        <textarea name="deskripsiMusik" class="form-control"><?php echo $k->deskripsi_musik; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="<?php echo base_url(); ?>index.php/admin/musik">
                                        <button type="button" class="btn btn-warning">Batal</button>
                                    </a>

                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('admin/layout/JsLayout') ?>
    </body>
</html>