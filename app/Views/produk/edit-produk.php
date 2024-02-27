<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <section class="section">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">From Edit Data Produk</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" action="<?=site_url('update-produk/') . $produk['id_produk']; ?>" method="POST">
          <?csrf_field(); ?>
            <div class="col-md-12">
              <div class="form-floating">
              <input type="hidden" class="form-control" id="inputProduk" name="id_produk">
                <input type="text" class="form-control" name="nama_produk" required name="produk" placeholder="Nama Produk" value="<?= $produk['nama_produk'];?>">
                <label for="nama_produk">Nama Produk</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="kode_produk" required name="produk" value="<?= $produk['kode_produk']; ?>" disabled>
                <label for="kode_produk">Kode produk</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control uang" id="inputHB" name="harga_beli" required name="produk" placeholder="harga" value="<?= $produk['harga_beli']; ?>">
                <label for="harga_beli">Harga Beli</label>
              </div>
</div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control uang" id="inputHB" name="harga_jual" required name="produk" placeholder="harga" value="<?= $produk['harga_jual']; ?>">
                <label for="harga_jual">Harga Jual</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-select" id="inputSatuan" name="jenis_satuan" required name="produk" aria-label="State">
                    <option selected>Pilih Kategori Produk</option>
                    <?php foreach ($satuan as $value): ?>
                        <option value="<?= $value['id_satuan']; ?>"
                        <?= ($produk['id_satuan'] == $value['id_satuan']) ? 'selected' : '' ?>>
                        <?= $value['nama_satuan']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label for="floatingSelect">Satuan Produk</label>
                    </div>
                    </div>

            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-select" id="inputSatuan" name="jenis_kategori" required name="produk" aria-label="State">
                    <option selected>Pilih Kategori Produk</option>
                    <?php foreach ($kategori as $value): ?>
                        <option value="<?= $value['id_kategori']; ?>"
                        <?= ($produk['id_kategori'] == $value['id_kategori']) ? 'selected' : '' ?>>
                        <?= $value['nama_kategori']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label for="floatingSelect">Kategori Produk</label>
                    </div>
                    </div>
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control barang" id="inputStok" name="stok" name="stok" value="<?= $produk['stok']; ?>">
                  <label for="stok">Stok</label>
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