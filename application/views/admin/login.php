<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo site_url('login/validate/')?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
            <br>
          <input class="btn btn-primary btn-block" type="submit">
        </form>
      </div>
    </div>
      <?php if($this->session->flashdata('wrong')) {
          echo "
            <div class=\"card card-login bg-danger mx-auto mt-5\">
                <div class=\"card-body text-white\">Username/Password Salah</div>
            </div>
          ";
      } if($this->session->flashdata('passupdate')) {
          echo "
            <div class=\"card card-login bg-success mx-auto mt-5\">
                <div class=\"card-body text-white\">Ganti password berhasil. Silahkan login kembali</div>
            </div>
          ";
      }
      ?>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo site_url('assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo site_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

</body>

</html>
