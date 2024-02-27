<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laporan Stok</h1>
    <nav>
      <p>Berikut ini adalah Laporan Stok Produk</p>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
          <div class="mt-4 col">
          <?php if (session()->getFlashdata('pesan')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= session()->getFlashdata('pesan'); ?>
              </div>
            <?php endif ?>
          </div>
            <div class="mt-4 col-3">
              <a class="btn btn-danger" href="<?= site_url('/pdf'); ?>">
                <span class="text">Download PDF</span>
              </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No </th>
                  <th>Nama Produk</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Stok</th>
                  </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($listLaporan as $row): ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    <td>
                      <?= $row['nama_produk']; ?>
                    </td>
                    <td>
                      <?= $row['harga_beli']; ?>
                    </td>
                    <td>
                      <?= $row['harga_jual']; ?>
                    </td>
                    <td>
                      <?= $row['stok']; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
<?= $this->endSection(); ?>