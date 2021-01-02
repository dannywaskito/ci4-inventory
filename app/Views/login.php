<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login E-Inventory</title>
  <link rel="stylesheet" href="<?= base_url() ?>/template-login/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
<link rel="shortcut icon" href="<?=base_url() ?>/template-login/img/clipart3475225.png">
     <!-- End Favicon -->
</head>
<body>
  <section>
    <div class="container">
      <div class="user singinBx">
        <div class="imgBx">
          <img src="<?= base_url() ?>/template-login/img/keyboard.jpg">
        </div>
        <div class="formBx">
      <?php 
      echo form_open('auth/cek_login'); 
      ?>
          <form>
                                        <?php 
      $errors = session()->getFlashdata('errors'); 

      if (!empty($errors)) { ?>
       <div class="alert alert-danger" role="alert">
        <ul>
      <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
     <?php }?>
     <?php 
          if (session()->getFlashdata('pesan')) {
           echo '<div class="alert alert-danger" role="alert">';
           echo session()->getFlashdata('pesan');
           echo '</div>';
          }
      ?>
            <h2>Login E-Inventory</h2>
            <input type="text" name="nama_user" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Login">
            <p class="signup">Belum Punya Akun ?<a href="#" onclick="toggleForm();"> Daftar</a></p>
          </form>
          <?php echo form_close(); ?>
        </div>
      </div>
      <!-- Sign Up -->
      <div class="user singupBx">
        <div class="formBx">
          <form action="">
            <h2>Coming Soon</h2>
            <p>Default Login <br> Username: danny <br> password: danny</p>
            <p class="signup">Sudah Punya Akun ?<a href="#" onclick="toggleForm();"> Login</a></p>
          </form>
        </div>
        <div class="imgBx"><img src="<?= base_url() ?>/template-login/img/laptop.jpg"></div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    function toggleForm(){
      var container = document.querySelector('.container');
      container.classList.toggle('active');
    }
  </script>
  <!-- Alert timeout -->
<script>
  window.setTimeout(function(){
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 3000);
</script> 
<!-- EndAlert timeout -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
</body>
</html>