 <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:<?=base_url('assets/admin')?>/partials/_sidebar.html -->
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?=base_url('assets/admin')?>/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$nama_admin?></p>
                  <div>
                    <small class="designation text-muted"><?=$jabatan_admin?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block" <?php if (isset($btn_tambah)) {?>
                id="<?=$btn_tambah?>"
              <?php } ?>>
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Kasir</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Riwayat Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('admin/kategori')?>">Transaksi Hari Ini</a>
                  <a class="nav-link" href="<?=base_url('admin/product')?>">Semua Transaksi</a>
                  
                  <a class="nav-link" href="<?=base_url('admin/pembelian')?>">Transaksi Belum Selesai</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('admin/supplier')?>/supplier">Transaksi Selesai Hari ini</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/manage_admin')?>">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Rekap Kasir</span>
            </a>
          </li>

        
        </ul>
      </nav>
      
      <!-- partial -->