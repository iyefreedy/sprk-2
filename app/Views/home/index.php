<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/navbar') ?>
<div class="container">
     <div class="card mx-auto mt-5 p-3">
          <div class="row mb-3">
               <h1 class="text-center">Dashboard</h1>
          </div>
          <?php if (session()->getFlashdata('success')) : ?>
               <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
               </div>
          <?php endif; ?>
          <div class="row mb-3">
               <img src="<?= base_url() ?>/img/<?= session()->get('photo') ?>" alt="user-image" class="img-card-thumbnail rounded-circle border border-3 border-dark">
          </div>
          <div class="row">
               <div class="col-3 mx-auto">
                    <table class="table table-striped">
                         <tbody>
                              <tr>
                                   <td>Nama</td>
                                   <td><?= session()->get('fullname') ?></td>
                              </tr>
                              <tr>
                                   <td>Email</td>
                                   <td><?= session()->get('email') ?></td>
                              </tr>
                              <tr>
                                   <td>Role</td>
                                   <td><?= session()->get('level') ?></td>
                              </tr>
                              <tr>
                                   <td>Divisi</td>
                                   <td><?= session()->get('division') ?></td>
                              </tr>
                         </tbody>
                    </table>
               </div>
               <div class="row">
                    <div class="col text-center">
                         <a class="btn btn-primary mx-auto" href="<?= base_url('profile') ?>" role="button">Profil</a>
                    </div>
               </div>
          </div>
     </div>
     <?= $this->endSection() ?>