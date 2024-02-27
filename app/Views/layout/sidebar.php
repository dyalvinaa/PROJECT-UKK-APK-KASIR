<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">

      <?php if (session()->get('level') == 'admin'): ?>
        <a class="nav-link " href="<?= site_url('dashboard-admin'); ?>">
          <i class="bi bi-speedometer"></i>
          <span>Dashboard</span>
        </a>
      <?php endif; ?>

      <?php if (session()->get('level') == 'kasir'): ?>
        <a class="nav-link " href="<?= site_url('dashboard-kasir'); ?>">
          <i class="bi bi-speedometer"></i>
          <span>Dashboard</span>
        </a>
      <?php endif; ?>


    </li><!-- End Dashboard Nav -->
    <?php if (session()->get('level') == 'admin'): ?>
    <li class="nav-heading">Master Data</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('kategori-produk'); ?>">
        <i class="bi bi-tag"></i><span>Kategori Produk</span></i>
      </a>
      <a class="nav-link collapsed" href="<?= site_url('satuan-produk'); ?>">
        <i class="bi bi-box"></i><span>Satuan Produk</span></i>
      </a>
      <a class="nav-link collapsed" href="<?= site_url('data-produk'); ?>">
        <i class="bi bi-clipboard2"></i><span>Data Produk</span></i>
      </a>
      <?php endif; ?>

      <?php if (session()->get('level') == 'kasir'): ?>
    <li class="nav-heading">Penjualan</li>

    <a class="nav-link collapsed" href="<?= site_url('transaksi'); ?>">
      <i class="bi bi-coin"></i><span>Transaksi</span></i>
    </a>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin'): ?>
    <li class="nav-heading">Laporan</li>

    <a class="nav-link collapsed" href="<?= site_url('laporan-stok'); ?>">
      <i class="bi bi-coin"></i><span>Stok Produk</span></i>
    </a>
    <a class="nav-link collapsed" href="<?= site_url('laporan-penjualan'); ?>">
      <i class="bi bi-coin"></i><span>Penjualan</span></i>
    </a>
    <?php endif; ?>
    <!-- <a class="nav-link collapsed" href="<?= site_url('data-pembelian'); ?>">
          <i class="bi bi-cart3"></i><span>Pembelian</span></i>
        </a> -->
        <?php if (session()->get('level') == 'kasir'): ?>
    <li class="nav-heading">Pengguna</li>

    <a class="nav-link collapsed" href="<?= site_url('data-user'); ?>">
      <i class="bi bi-person-circle"></i><span>Data Pengguna</span></i>
    </a>
    <?php endif; ?>
        <?php if (session()->get('level') == 'admin'): ?>
    <li class="nav-heading">Pengguna</li>

    <a class="nav-link collapsed" href="<?= site_url('data-user'); ?>">
      <i class="bi bi-person-circle"></i><span>Data Pengguna</span></i>
    </a>
    <?php endif; ?>
  </ul>

</aside><!-- End Sidebar-->