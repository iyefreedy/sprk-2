<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/navbar') ?>

<div class="container">
     <?= $this->include('layouts/topbar') ?>
     <div class="row mb-5">
          <div class="col bg-white p-3 rounded-bottom">
               <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                         <?= session()->getFlashdata('success'); ?>
                    </div>
               <?php endif ?>

               <table class="table-calendar mx-auto text-center">
                    <thead class="head-calendar">
                         <tr>
                              <th colspan="2"><i id="beforeMonth" role="button" class="fas fa-chevron-circle-left fa-lg fa-fw cursor-pointer"></i></th>
                              <th class="month" colspan="3"></th>
                              <th colspan="2" id="nextMonth"><i id="nextMonth" role="button" class="fas fa-chevron-circle-right fa-lg fa-fw"></i></th>
                         </tr>
                         <tr>
                              <th colspan="7">
                                   <hr>
                              </th>
                         </tr>
                    </thead>
                    <thead class="days-calendar">
                         <tr>
                              <th>Senin</th>
                              <th>Selasa</th>
                              <th>Rabu</th>
                              <th>Kamis</th>
                              <th>Jum'at</th>
                              <th>Sabtu</th>
                              <th>Minggu</th>
                         </tr>
                    </thead>
                    <tbody class="body-calendar">

                    </tbody>

               </table>
          </div>
     </div>
</div>
<div class="modal" tabindex="-1" id="detailModal">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Detail Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">

               </div>
          </div>
     </div>
</div>


<?= $this->endSection() ?>