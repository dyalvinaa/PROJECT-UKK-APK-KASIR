<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <section class="section">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Edit Satuan Produk</h5>

          <!-- Vertical Form -->
          <form action="<?= site_url('perbarui-satuan') ?>" method="post" class="row g-3">
            <? csrf_field(); ?>
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Jenis Satuan</label>
              <input type="hidden" name="id_satuan" class="form-control" id="inputJenis" value="<?= $detailSatuan[0]['id_satuan']; ?>">
              <input type="text" name="nama_satuan" class="form-control" id="inputJenis" required name="satuan" value="<?= $detailSatuan[0]['nama_satuan']; ?>">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
      </div>
      </form><!-- End Horizontal Form -->
</main>
<?= $this->endSection(); ?>