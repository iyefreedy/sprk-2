<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-center mt-5 py-3 bg-primary bg-gradient col-lg-4 rounded">
     <div class="row">
          <h1>SPRK</h1>
          <p>Sistem Peminjaman Ruangan dan Kendaraan</p>
          <h3>Universitas Al-Azhar Indonesia</h3>
     </div>
     <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success" role="alert">
               <?= session()->getFlashdata('success') ?>
          </div>
     <?php elseif (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger" role="alert">
               <?= session()->getFlashdata('error') ?>
          </div>
     <?php endif; ?>
     <form action="<?= route_to('login') ?>" method="post">
          <?= csrf_field() ?>

          <div class="form-group mb-3">
               <label for="login">Username</label>
               <input type="text" class="form-control text-center" name="username" placeholder="Username">
          </div>


          <div class="form-group mb-3">
               <label for="password">Password</label>
               <input type="password" name="password" class="form-control text-center" placeholder="Password">
          </div>


          <div class="form-check">
               <label class="form-check-label">
                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                    Remember me
               </label>
          </div>


          <br>

          <button type="submit" class="btn btn-warning btn-block">Login</button>
     </form>

     <hr>


     <p><a class="text-white" href="<?= route_to('register') ?>">Need an Account ?</a></p>


     <p><a class="text-white" href="<?= route_to('forgot') ?>">Forgot Password ?</a></p>

</div>

<?= $this->endSection(); ?>