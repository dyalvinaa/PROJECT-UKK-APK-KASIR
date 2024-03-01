<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

<section class="section">
<div class="col-lg-6">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Form Tambah Kategori Produk</h5>

    <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php foreach (session('errors') as $error): ?>
                <?= $error; ?>
              <?php endforeach; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif ?>

    <!-- Vertical Form -->
    <form action="<?= site_url('simpan-kategori') ?>" method="post" class="row g-3">
    <? csrf_field(); ?>
      <div class="col-12">
      <div class="form-floating">
        <input type="text" class="form-control" name="txtKategori" id="txtKategori" placeholder="Satuan Produk">
        <label for="inputNanme4" class="form-label">Jenis Kategori</label>
        
      </div>
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