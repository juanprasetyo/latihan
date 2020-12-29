  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
              <div class="pull-left image" id="prev-image">
                  <img src="<?= base_url('assets/upload/profile/').$account['image'] ?>" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                  <p><?= $account['name'] ?></p>
                  <!-- Status -->
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
              <!-- Optionally, you can add icons to the links -->
              <li><a href="<?= ($account['role_id'] == 1)? base_url() : base_url('admin') ?>"><i class="fa fa-home"></i>
                      <span>Home</span></a></li>
              <li class="treeview">
                  <a href="#"><i class="fa fw fa-briefcase"></i> <span>Data Barang</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?= base_url('DataBarang/listBarang') ?>">List Barang</a></li>
                      <li><a href="<?= base_url('DataBarang/cariDataBarang') ?>">Cari Barang</a></li>
                      <li><a href="<?= base_url('cetakSurat') ?>" target="_blank">Surat</a></li>
                  </ul>
              </li>
          </ul>
          <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
  </aside>