<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient">
     <div class="container">
          <a class="navbar-brand" href="#">SPRK</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                         <a class="nav-link" href="<?= base_url('/home') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?= base_url('/ruang') ?>">Ruang</a>
                    </li>

                    <li class="nav-item">
                         <a class="nav-link" href="#">Kendaraan</a>
                    </li>

                    <li class="nav-item">
                         <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
                    </li>
               </ul>

          </div>
     </div>
</nav>