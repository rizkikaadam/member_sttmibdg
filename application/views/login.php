<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Admin STTMI Bandung</title>

    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">

    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/bootstrap/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/metismenu/metisMenu.css">

    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/animate.css/animate.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login">

<div class="form-signin">
    <div class="text-center">
        <img src="assets/img/logo.png" alt="" width="40%">
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="<?php echo base_url(); ?>Login/aksi_login" method="post">
              <?php
              $pesan=$this->session->flashdata('message');
              if ($pesan == "0") {
                echo "<blockquote>
                    <p>
                        Harus Login Terlebih Dahulu
                    </p>
                </blockquote>";
              }
              ?>
              <?php
            $pesan=$this->session->flashdata('message');
               if ($pesan == "berhasil") {
                 echo "<p class='bg-info'>Data Berhasil Ditambahkan, Login dengan NIM & Password</p>";
               }
               elseif ($pesan == "hapus") {
                 echo "<p class='bg-info'>Data Berhasil Dihapus</p>";
               }
               elseif ($pesan == "tambah") {
                 echo "<p class='bg-info'>Data Berhasil Diubah</p>";
               }
              ?>
                <p class="text-muted text-center">
                    Masukan Username dan Password
                </p>
                <input type="text" placeholder="Masukan Username/Email/NIM" class="form-control top" name="username" required="required">
                <br/>
                <input type="password" placeholder="Masukan Password" class="form-control bottom" name="password" required="required">
                <div class="checkbox">
                <label><input class="uniform" type="radio" name="member" value="dosen" required="required">Dosen</label>
                <label><input class="uniform" type="radio" name="member" value="Mahasiswa" required="required">Mahasiswa</label>
		</div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
            </form>
        </div>
        <div id="daftar" class="tab-pane">
            <form action="<?php echo base_url(); ?>Login/daftar" method="post">
                <p class="text-muted text-center">
                    Daftar Mahasiswa
                </p>
                <input type="text" placeholder="NIM" name="nim" class="form-control top" required=""><br/>
                <input type="text" placeholder="Nama" name="nama_mahasiswa" class="form-control top" required=""><br/>
                <input type="email" placeholder="mail@domain.com" name="email" class="form-control middle" required=""><br/>
                <input type="password" placeholder="password" name="password" class="form-control middle" required=""><br/>
                <input type="password" placeholder="re-password" class="form-control bottom" required=""><br/>
                <button class="btn btn-lg btn-success btn-block" type="submit">Daftar</button>
            </form>
        </div>
    </div>
    <hr>
        <div class="text-center">
            <ul class="list-inline">
                <li><a class="text-muted" href="#daftar" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>&nbsp;Daftar Mahasiswa</a></li>
                <li>|</li>
                <li><a class="text-muted" href="#login" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>&nbsp;Login</a></li>
            </ul>
        </div>
  </div>


    <!--jQuery -->
    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.js"></script>


    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);
    </script>
</body>

</html>
