<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">

      <!-- card pendapatan hari ini -->
      <div class="col-lg-8">
        <div class="row">
          <div class="col-xxl-5 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Pendapatan <span>/ hari</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-2">
                    <h6>Rp.
                      <?php echo number_format($pendapatan_harian, 0, ',', '.'); ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card pendapatan hari ini-->

          <!-- End penjualan bulan ini Card -->
          <div class="card col-lg-10">
          <div class="pagetitle">
            <div class="my-3">
              <h1>Stok Kosong</h1>
            </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($dataStok as $row): ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    <td>
                      <?= $row['kode_produk']; ?>
                    </td>
                    <td>
                      <?= $row['nama_produk']; ?>
                    </td>
                    <td>
                      <?= $row['stok']; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
  </section>
</main><!-- End #main -->

<?= $this->endSection(); ?>