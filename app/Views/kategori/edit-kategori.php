<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <section class="section">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Edit Kategori Produk</h5>

          <!-- Vertical Form -->
          <form action="<?= site_url('perbarui-kategori') ?>" method="post" class="row g-3">
            <? csrf_field(); ?>
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Jenis Kategori</label>
              <input type="hidden" name="id_kategori" class="form-control" id="inputJenis" value="<?= $detailKategori[0]['id_kategori']; ?>">
              <input type="text" name="nama_kategori" class="form-control" id="inputJenis" required name="kategori" value="<?= $detailKategori[0]['nama_kategori']; ?>">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-secondary">Submit</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
      </div>
      </form><!-- End Horizontal Form -->
</main>
<?= $this->endSection(); ?>