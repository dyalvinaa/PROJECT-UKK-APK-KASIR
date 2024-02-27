<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <section class="section">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Tambah Produk</h5>

          <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php foreach (session('errors') as $error): ?>
                <?= $error; ?>
              <?php endforeach; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif ?>

          <!-- Floating Labels Form -->
          <form class="row g-3" action="<?= site_url('simpan-produk'); ?>" method="post">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required name="namaproduk"
                  placeholder="Nama Produk">
                <label for="floatingNama">Nama Produk</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="hidden" name="kode_produk" value="<?= $kodeProduk; ?>">
                <input type="text" class="form-control" value="<?= $kodeProduk; ?>" disabled>
                <label for="floatingStok">Kode produk</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control uang" id="inputHB" name="harga_beli" required name="produk"
                  placeholder="harga">
                <label for="floatingStok">Harga Beli</label>
                <?php if (session()->has('errors') && session('errors.harga_beli')): ?>
                  <div class="invalid-feedback">
                    <p>
                      <?= session('errors.harga_beli'); ?>
                    </p>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control uang" id="inputHB" name="harga_jual" required name="produk"
                  placeholder="harga">
                <label for="floatingStok">Harga Jual</label>
                <?php if (session()->has('errors') && session('errors.harga_jual')): ?>
                  <div class="invalid-feedback">
                    <p>
                      <?= session('errors.harga_jual'); ?>
                    </p>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-select" id="inputSatuan" name="jenis_satuan" required name="produk"
                  aria-label="State">
                  <?php
                  if (isset($listSatuan)) {
                    $no = null;
                    foreach ($listSatuan as $row) {
                      $no++;
                      echo '<option value="' . $row['id_satuan'] . '">' . $row['nama_satuan'] . '</option>';
                    }
                  }
                  ?>
                </select>
                <label for="floatingSelect">Satuan Produk</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-select" id="inputJenis" name="jenis_kategori" required name="produk"
                  aria-label="State">
                  <?php
                  if (isset($listKategori)) {
                    $no = null;
                    foreach ($listKategori as $row) {
                      $no++;

                      echo '<option value="' . $row['id_kategori'] . '">' . $row['nama_kategori'] . '</option>';
                    }
                  }
                  ?>
                </select>
                <label for="floatingSelect">Kategori Produk</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control barang" id="inputStok" name="stok" required name="produk"
                    placeholder="City">
                  <label for="floatingStok">Stok</label>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
      </div>

    </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>