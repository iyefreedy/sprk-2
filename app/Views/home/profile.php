<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/navbar') ?>
<div class="container my-5 bg-white rounded p-5">
     <form action="<?= base_url('profile') ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="mb-3 text-center">
               <div class="mx-auto d-inline-block position-relative image-wrapper">
                    <img class="img-card-thumbnail border border-3 border-dark" id="image" src="<?= base_url() ?>/img/<?= session()->get('photo') ?>" alt="User Image">

                    <input type="file" accept="image/*" id="inputFile" name="photo" class="position-absolute bottom-0 end-0" style="visibility: hidden;">
                    <input type="hidden" name="old_image" value="<?= session()->get('photo') ?>">
                    <button type="button" id="chooseFile" class="btn btn-primary position-absolute bottom-0 end-0"><i class="fas fa-camera fa-sm fa-fw"></i></button>
               </div>
          </div>

          <div class="mb-3 row">
               <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validator->getError('fullname')) ? 'is-invalid' : ''; ?>" name="fullname" value="<?= session()->get('fullname') ?>">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="division" class="col-sm-2 col-form-label">Divisi</label>
               <div class="col-sm-10">
                    <select class="form-select" name="division">
                         <option value="">-- Pilih Divisi --</option>
                         <option value="Rektor dan Wakil Rektor" <?= (session()->get('division') == "Rektor dan Wakil Rektor") ? 'selected' : '';  ?>>Rektor dan Wakil Rektor</option>
                         <option value="Badan Penjamin Mutu Universitas" <?= (session()->get('division') == "Badan Penjamin Mutu Universitas") ? 'selected' : '';  ?>>Badan Penjamin Mutu Universitas</option>
                         <option value="Lembaga Penelitian & Pengabdian Masyarakat" <?= (session()->get('division') == "Lembaga Penelitian & Pengabdian Masyarakat") ? 'selected' : '';  ?>>Lembaga Penelitian & Pengabdian Masyarakat</option>
                         <option value="Fakultas Sains & Teknologi" <?= (session()->get('division') == "Fakultas Sains & Teknologi") ? 'selected' : '';  ?>>Fakultas Sains & Teknologi</option>
                         <option value="Fakultas Ekonomi & Bisnis" <?= (session()->get('division') == "Fakultas Ekonomi & Bisnis") ? 'selected' : '';  ?>>Fakultas Ekonomi & Bisnis</option>
                         <option value="Fakultas Ilmu Pengetahuan Budaya" <?= (session()->get('division') == "Fakultas Ilmu Pengetahuan Budaya") ? 'selected' : '';  ?>>Fakultas Ilmu Pengetahuan Budaya</option>
                         <option value="Fakultas Psikolgi & Pendidikan" <?= (session()->get('division') == "Fakultas Psikolgi & Pendidikan") ? 'selected' : '';  ?>>Fakultas Psikolgi & PEndidikan</option>
                         <option value="Fakultas Hukum" <?= (session()->get('division') == "Fakultas Hukum") ? 'selected' : '';  ?>>Fakultas Hukum</option>
                         <option value="Fakultas Ilmu Sosial & Ilmu Politik" <?= (session()->get('division') == "Fakultas Ilmu Sosial & Ilmu Politik") ? 'selected' : '';  ?>>Fakultas Ilmu Sosial & Ilmu Politik</option>
                         <option value="Sekretariat Universitas" <?= (session()->get('division') == "Sekretariat Universitas") ? 'selected' : '';  ?>>Sekretariat Universitas</option>
                         <option value="Direktorat Administrasi Bidang Akademik, Promosi & PMB" <?= (session()->get('division') == "Direktorat Administrasi Bidang Akademik, Promosi & PMB") ? 'selected' : '';  ?>>Direktorat Administrasi Bidang Akademik, Promosi & PMB</option>
                         <option value="Pusat Kajian Strategis Nilai-Nilai Islam & Kewirausahaan" <?= (session()->get('division') == "Pusat Kajian Strategis Nilai-Nilai Islam & Kewirausahaan") ? 'selected' : '';  ?>>Pusat Kajian Strategis Nilai-Nilai Islam & Kewirausahaan</option>
                         <option value="Unit Pelaksana Teknis Perpustakaan" <?= (session()->get('division') == "Unit Pelaksana Teknis Perpustakaan") ? 'selected' : '';  ?>>Unit Pelaksana Teknis Perpustakaan</option>
                         <option value="Direktorat Kerjasama" <?= (session()->get('division') == "Direktorat Kerjasama") ? 'selected' : ''; ?>>Direktorat Kerjasama</option>
                         <option value="Direktorat Keuangan" <?= (session()->get('division') == "Direktorat Keuangan") ? 'selected' : ''; ?>>Direktorat Keuangan</option>
                         <option value="Direktorat Sumber Daya Manusia" <?= (session()->get('division') == "Direktorat Sumber Daya Manusia") ? 'selected' : ''; ?>>Direktorat Sumber Daya Manusia</option>
                         <option value="Direktorat Fasilitas Pendukung" <?= (session()->get('division') == "Direktorat Fasilitas Pendukung") ? 'selected' : ''; ?>>Direktorat Fasilitas Pendukung</option>
                         <option value="Direktorat Kemahasiswaan & Alumni" <?= (session()->get('division') == "Direktorat Kemahasiswaan & Alumni") ? 'selected' : ''; ?>>Direktorat Kemahasiswaan & Alumni</option>
                         <option value="Direktorat Etika, Kebangsaan & Ke Al Azhar an" <?= (session()->get('division') == "Direktorat Etika, Kebangsaan & Ke Al Azhar an") ? 'selected' : ''; ?>>Direktorat Etika, Kebangsaan & Ke Al Azhar an</option>
                         <option value="Direktorat Bisnis Inovasi & Sistem Inkubasi" <?= (session()->get('division') == "Direktorat Bisnis Inovasi & Sistem Inkubasi") ? 'selected' : ''; ?>>Direktorat Bisnis Inovasi & Sistem Inkubasi</option>
                         <option value="Direktorat Manajemen Inovasi & Program" <?= (session()->get('division') == "Direktorat Manajemen Inovasi & Program") ? 'selected' : ''; ?>>Direktorat Manajemen Inovasi & Program</option>
                         <option value="Unit Pelaksana Teknis Pusat Data Komputer & Sistem Informasi" <?= (session()->get('division') == "Unit Pelaksana Teknis Pusat Data Komputer & Sistem Informasi") ? 'selected' : ''; ?>>Unit Pelaksana Teknis Pusat Data Komputer & Sistem Informasi</option>
                    </select>
               </div>
          </div>
          <div class="mb-3 row">
               <label for="level" class="col-sm-2 col-form-label">Level</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validator->getError('level')) ? 'is-invalid' : ''; ?>" name="level" value="<?= session()->get('level') ?>">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="email" class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-10">
                    <input type="email" name="email" class="form-control <?= ($validator->getError('email')) ? 'is-invalid' : ''; ?>" value="<?= session()->get('email') ?>">
               </div>
          </div>
          <div class="row mb-3">
               <label for="phone" class="col-sm-2 col-form-label">No. Telp</label>
               <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control <?= ($validator->getError('phone')) ? 'is-invalid' : ''; ?>" value="<?= session()->get('phone') ?>">
               </div>
          </div>
          <div class="row mx-auto">
               <div class="col text-center">
                    <button type="submit" class="btn btn-warning">Ubah Profil</button>
               </div>
          </div>
     </form>
</div>

<?= $this->endSection() ?>