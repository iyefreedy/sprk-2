<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/navbar') ?>

<div class="container">
     <?= $this->include('layouts/topbar') ?>
     <div class="row mb-5">
          <div class="col bg-white p-3 rounded-bottom">
               <h1 class="text-center my-2">Form Peminjaman</h1>
               <hr>
               <form action="<?= base_url('ruang/pinjam-ruang') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="loaner_id" value="<?= session()->get('id') ?>">
                    <div class="mb-3 row">
                         <label for="loaner_name" class="col-sm-2 col-form-label">Nama Peminjam</label>
                         <div class="col-sm-10">
                              <input type="text" readonly class="form-control <?= ($validator->getError('loaner_name')) ? 'is-invalid' : ''; ?>" name="loaner_name" value="<?= session()->get('fullname') ?>">
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="division" class="col-sm-2 col-form-label">Divisi</label>
                         <div class="col-sm-10">
                              <input type="text" readonly class="form-control <?= ($validator->getError('division')) ? 'is-invalid' : ''; ?>" name="division" value="<?= session()->get('division') ?>">
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="phone" class="col-sm-2 col-form-label">Kontak</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validator->getError('phone')) ? 'is-invalid' : ''; ?>" name="phone" value="<?= session()->get('phone') ?>">
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="activity_name" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validator->getError('activity_name')) ? 'is-invalid' : ''; ?>" name="activity_name">
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="activity_type" class="col-sm-2 col-form-label">Jenis Kegiatan</label>
                         <div class="col-sm-10">
                              <select name="activity_type" class="form-select <?= ($validator->getError('activity_type')) ? 'is-invalid' : ''; ?>">
                                   <option value="">-- Pilih --</option>
                                   <option value="Seminar">Seminar</option>
                                   <option value="Rapat">Rapat</option>
                                   <option value="Training">Training</option>
                                   <option value="Lomba">Lomba</option>
                                   <option value="Lainnya">Lainnya</option>
                              </select>
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label class="col-sm-2 col-form-label">Waktu Kegiatan</label>
                         <div class="col">
                              <input type="text" id="startTime" readonly class="form-control <?= ($validator->getError('start_time')) ? 'is-invalid' : ''; ?>" name="start_time" placeholder="Waktu mulai kegiatan">
                         </div>
                         <div class="col">
                              <input type="text" id="endTime" readonly class="form-control <?= ($validator->getError('end_time')) ? 'is-invalid' : ''; ?>" name="end_time" placeholder="Waktu berakhirnya kegiatan">
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="involved_party" class="col-sm-2 col-form-label">Melibatkan Pihak</label>
                         <div class="col-sm-10">
                              <select name="involved_party" class="form-select <?= ($validator->getError('involved_party')) ? 'is-invalid' : ''; ?>">
                                   <option value="">-- Pilih --</option>
                                   <option value="Internal">Internal</option>
                                   <option value="Eksternal">Eksternal</option>
                                   <option value="Keduanya">Keduanya</option>
                              </select>
                              <div class="invalid-feedback">
                                   <?= $validator->getError('involved_party') ?>
                              </div>
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="invitation_number" class="col-sm-2 col-form-label">Jumlah Undangan</label>
                         <div class="col-sm-10">
                              <input type="number" min="3" max="500" class="form-control <?= ($validator->getError('invitation_number')) ? 'is-invalid' : ''; ?>" name="invitation_number">
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="room" class="col-sm-2 col-form-label">Ruang</label>
                         <div class="col-sm-10">
                              <select name="room" class="form-select <?= ($validator->getError('room')) ? 'is-invalid' : ''; ?>">
                                   <option value="">-- Pilih --</option>
                                   <option value="Serbaguna CIMB Niaga">Serbaguna CIMB Niaga</option>
                                   <option value="Auditorium Arifin Panigoro">Auditorium Arifin Panigoro</option>
                                   <option value="Selasar Auditorium">Selasar Auditorium</option>
                              </select>
                         </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <label for="proposal" class="col-sm-2 col-form-label">Proposal</label>
                         <div class="col-sm-10">
                              <input type="file" accept=".pdf, .doc, .docx" class="form-control <?= ($validator->getError('proposal')) ? 'is-invalid' : ''; ?>" name="proposal">
                              <div class="invalid-feedback">
                                   <?= $validator->getError('proposal') ?>
                              </div>
                         </div>

                    </div>
                    <hr>
                    <div class="mb-3 row">
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>


<?= $this->endSection() ?>