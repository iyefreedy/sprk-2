<div class="row mt-5">

     <div class="d-flex flex-row justify-content-around p-2 bg-primary rounded-top">

          <div class="bd-highlight">
               <a href="<?= base_url('ruang') ?>" id="room-link" class="text-white text-decoration-none">
                    <i class="fas fa-calendar-alt fa-2x d-block text-center"></i>
                    <span>Jadwal Ruangan</span>
               </a>
          </div>

          <div class="bd-highlight">
               <a href="<?= base_url('ruang/pinjam-ruang') ?>" id="room-link" class="text-white text-decoration-none">
                    <i class="fas fa-calendar-plus fa-2x d-block text-center"></i>
                    <span>Pinjam Ruang</span>
               </a>
          </div>

          <div class="bd-highlight">
               <a href="<?= base_url('ruang/menunggu') ?>" id="room-link" class="text-white text-decoration-none">
                    <i class="fas fa-clock fa-2x d-block text-center"></i>
                    <span>Menunggu</span>
               </a>
          </div>

          <div class="bd-highlight">
               <a href="<?= base_url('ruang/setuju') ?>" id="room-link" class="text-white text-decoration-none">
                    <i class="fas fa-check-circle fa-2x d-block text-center"></i>
                    <span>Setuju</span>
               </a>
          </div>

          <div class="bd-highlight">
               <a href="<?= base_url('ruang/batal') ?>" class="text-white text-decoration-none">
                    <i class="fas fa-times-circle fa-2x d-block text-center"></i>
                    <span>Batal</span>
               </a>
          </div>
          <script>
               const roomLink = document.querySelectorAll("#room-link");

               roomLink.forEach((i) => {
                    if (i.getAttribute("href") == window.location.href) {
                         i.classList.remove("text-white");
                         i.classList.add("text-warning");
                    }
               });
          </script>
     </div>

</div>