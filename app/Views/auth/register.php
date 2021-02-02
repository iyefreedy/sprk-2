<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container text-center mt-3 py-3 bg-primary col-lg-4 rounded">
     <div class="row">
          <h1>SPRK</h1>
          <p>Sistem Peminjaman Ruangan dan Kendaraan</p>
          <h3>Universitas Al-Azhar Indonesia</h3>
     </div>
     <form action="<?= base_url('register') ?>" method="post">
          <?= csrf_field() ?>

          <div class="form-group">
               <label for="nip">NIP</label>
               <input type="text" class="form-control text-center <?= ($validation->getError('nip')) ? 'is-invalid' : ''; ?>" name="nip" placeholder="Your NIP" value="<?= old('nip') ?>">
               <div class="invalid-feedback bg-danger text-light">
                    <?= $validation->getError('nip') ?>
               </div>
          </div>

          <div class="form-group">
               <label for="username">Username</label>
               <input type="text" class="form-control text-center <?= ($validation->getError('username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="Create Username" value="<?= old('username') ?>">
               <div class="invalid-feedback bg-danger text-light">
                    <?= $validation->getError('username') ?>
               </div>
          </div>

          <div class="form-group">
               <label for="password">Password</label>
               <input type="password" name="password" class="form-control text-center <?= ($validation->getError('password')) ? 'is-invalid' : ''; ?>" autocomplete="off">
               <div class="invalid-feedback bg-danger text-light">
                    <?= $validation->getError('password') ?>
               </div>
          </div>

          <div class="form-group">
               <label for="pass_confirm">Repeat Password</label>
               <input type="password" name="confirm_password" class="form-control text-center <?= ($validation->getError('confirm_password')) ? 'is-invalid' : ''; ?>" autocomplete="off">
               <div class="invalid-feedback bg-danger text-light">
                    <?= $validation->getError('confirm_password') ?>
               </div>
          </div>

          <br>

          <button type="submit" class="btn btn-warning btn-block">Register</button>
     </form>

     <hr>

     <p><a class="text-white" href="<?= base_url('login') ?>">Already have an account ?</a></p>

</div>

<?= $this->endSection() ?>