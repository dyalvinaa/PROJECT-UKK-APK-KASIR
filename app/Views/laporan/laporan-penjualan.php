<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laporan Penjualan</h1>
    <nav>
      <p>Berikut ini adalah Laporan Penjualan</p>
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
              <a class="btn btn-danger" href="<?= site_url('/pdf/generate-penjualan'); ?>">
                <span class="text">Download PDF</span>
              </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No. </th>
                  <th>No. Faktur</th>
                  <th>Tanggal Penjualan</th>
                  <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($listPenjualan as $row): ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    <td>
                      <?= $row['no_faktur']; ?>
                    </td>
                    <td>
                      <?= $row['tgl_penjualan']; ?>
                    </td>
                    <td>
                      <?= $row['total']; ?>
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