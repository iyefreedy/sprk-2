<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/navbar') ?>

<div class="container">
     <?= $this->include('layouts/topbar') ?>
     <div class="row mb-5">
          <div class="col bg-white p-3 rounded-bottom">
               <table class="table">
                    <thead>
                         <tr>
                              <th>Tanggal Peminjaman</th>
                              <th>Nama Kegiatan</th>
                              <th>Mulai Kegiatan</th>
                              <th>Akhir Kegiatan</th>
                              <th>Status</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($ruang as $r) : ?>
                              <tr class="table-warning">
                                   <td><?= $r['created_at'] ?></td>
                                   <td><?= $r['activity_name'] ?></td>
                                   <td><?= $r['start_time'] ?></td>
                                   <td><?= $r['end_time'] ?></td>
                                   <td><button type="button" class="btn btn-warning text-white" id="btn-data" value="<?= $r['id'] ?>"><?= $r['status'] ?></button></td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
               </table>

          </div>
     </div>
</div>




<!-- Modal data -->
<div class="modal" tabindex="-1" id="myModal">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Data Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <div class="container-fluid">

                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
               </div>
          </div>
     </div>
</div>


<?= $this->endSection() ?>