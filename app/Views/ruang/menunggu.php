<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/navbar') ?>

<div class="container">
     <?= $this->include('layouts/topbar') ?>
     <div class="row mb-5">
          <div class="col bg-white p-3 rounded-bottom">
               <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                         <?= session()->getFlashdata('success') ?>
                    </div>
               <?php endif; ?>
               <div class="table-responsive">
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
</div>




<!-- Modal data -->
<div class="modal" tabindex="-1" id="myModal">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Data Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="<?= base_url('ruang/confirmRuang') ?>" method="post">
                    <div class="modal-body">

                         <div class="container-fluid">

                         </div>

                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <?php if (session()->get('role_id') == 1) : ?>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                         <?php endif; ?>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     // Modal

     const labelModal = [
          "Nama Peminjam",
          "Divisi",
          "No. Telepon",
          "Nama Kegiatan",
          "Jenis Kegiatan",
          "Pihak",
          "Waktu Kegiatan",
          "Jumlah Undangan",
          "Ruang",
          "Proposal",
     ];

     // Get element for modal
     const modalBody = $(".container-fluid");

     // Get all element button for every data that showed
     const dataID = document.querySelectorAll("#btn-data");

     // Add event listener for each button
     dataID.forEach((i) => {
          i.addEventListener("click", function() {
               // Calling data
               $.ajax({
                    type: "get",
                    url: window.location.href,
                    data: {
                         id: i.value
                    },
                    dataType: "json",
                    success: function(response) {
                         console.log(response);

                         // Clear modal body first before write data so it won't be doubled
                         modalBody.html("");

                         modalBody.append(`
        <input type="hidden" name="id" value="${response.id}" >
        `);

                         // This variable will be the index for labelModal array
                         let i = 0;

                         // Rewrite response object that need to be shown on modal
                         let data = {
                              loaner_name: response.loaner_name,
                              division: response.division,
                              phone: response.phone,
                              activity_name: response.activity_name,
                              activity_type: response.activity_type,
                              involved_party: response.involved_party,
                              activity_time: `${response.start_time} s/d ${response.end_time}`,
                              invitation_number: response.invitation_number,
                              room: response.room,
                              proposal: response.proposal != null ?
                                   response.proposal : "Tidak ada proposal",
                         };

                         // Loop rewrited response and create element
                         Object.values(data).forEach((val) => {
                              modalBody.append(
                                   `<div class="row">
                <label for="" class="form-label col-lg-3">${labelModal[i]}</label>
                <div class="col-lg-9">
                  <b>${val}</b>
                </div>
              </div>`
                              );
                              i++;
                         });

                         modalBody.append(
                              <?php if (session()->get('role_id') == 1) : ?> `<div class="row">
            <label for="" class="form-label col-lg-3">Status Persetujuan</label>
            <div class="col-lg-9">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="SETUJU">
              <label class="form-check-label" for="inlineRadio1">Disetujui</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="BATAL">
              <label class="form-check-label" for="status">Tidak Disetujui</label>
            </div>
            </div>
          </div>`
                              <?php endif; ?>
                         );
                         $("#myModal").modal("show");
                    },
                    error: function(error) {
                         console.log(error);
                    },
               });
          });
     });
</script>

<?= $this->endSection() ?>